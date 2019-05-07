<?php
/**
 * Created by PhpStorm.
 * User: Ardisenger
 * Date: 05.04.2019
 * Time: 13:24
 */

namespace MacWap;

use CoreSubscriptions\CoreController;
use Subscription;

class MacWapController
{
    private $masked_pan;
    private $data = [];
    private $service_id;
    private $payment_method;
    private $product_id;
    private $order_id;
    private $options;
    private $hash;
    private $is_recurrent;


    /**
     * MacWapController constructor.
     * @param $masked_pan
     * @param $options
     */
    public function __construct($masked_pan, $options)
    {
        $this->masked_pan = $masked_pan;
        $this->service_id = $options['service_id'];
        $this->order_id = $options['order_id'];
        $this->product_id = $options['product_id'];
        $this->payment_method = $options['payment_method_id'];
        $this->hash = $options['hash'];
        $this->is_recurrent = $options['is_recurrent'];
    }

    /**
     * Создание подписки
     * @return string
     */
    public function newSubscriptionMacWap()
    {

        $check = new Subscription();

        #Проверка подписки
        $subscription_id = $check->statusSubscription($this->masked_pan);

        #Если нет подиски
        if (empty($subscription_id)) {

            #Сбор параметров
            $options = $this->options();
            #Установим флаг для функции init
            $flag = 'macwap';

            #Отправка на платформу первого запроса
            $newSubscription = new CoreController($this->masked_pan, $options);
            $processing = $newSubscription->init($options, $flag);

            #Получим статус первого запроса
            $processingStatus = $processing['processing_status'];

            #Если произошла ошибка
            #Запишем в лог и вернем на урл ошибки MacWap
            if($processingStatus == 'DENIED'){

                CoreController::debugError('Номер телефона: '.$this->masked_pan,
                    $processingStatus.' - '.$processing['error_code]']);

                $this->redirectMacWap($processing);

            }

            #Успех
            $processingSubscriptionId = $processing['subscription_id'];

            #Отправим на сраницу sms
            if($processingSubscriptionId){
                $newSubscription->sendSubscriptionPost($processingSubscriptionId, $this->masked_pan);
            }
            exit();
        }

        setcookie('idSubscription', $subscription_id, strtotime('+30 days'), COOKIEPATH, COOKIE_DOMAIN, false, false);
        wp_redirect(home_url());
        exit();
    }

    /**
     * Разбор парраметров для подписки
     * @return string
     */
    private function options()
    {
        $this->data['service_id'] = $this->service_id;
        $this->data['order_id'] = $this->order_id;
        $this->data['product_id'] = $this->product_id;
        $this->data['payment_method_id'] = $this->payment_method;
        $this->data['hash'] = $this->hash;
        $this->data['msisdn'] = $this->masked_pan;
        $this->data['is_recurrent'] = $this->is_recurrent;

        foreach ($this->data as $datum => $val) {
            $ally[] = "$datum=$val";
        }

        $str = implode('&', $ally);

        return $str;
    }

    /**
     * Перенаправление при ошибки попдиски
     * @param $response
     */
    public function redirectMacWap($response)
    {

        #Отправляем на адрес macwap
        $t = $_SERVER['HTTP_REFERER'];
        $ref = stristr($t, '/web', true);

        #Отправляем на адрес macwap
        $url = $_SERVER['HTTP_ORIGIN'];

        $r = $url . '/go/away?click_id=';
        $r .= $this->order_id . '&_key=click_id&';
        $r .= 'service_id=' . $this->service_id . '&';
        $r .= 'product_id=' . $this->product_id . '&';
        $r .= 'payment_method_id=' . $this->payment_method . '&';
        $r .= 'is_recurrent=' . $this->is_recurrent . '&';
        $r .= 'msisdn=' . $this->masked_pan . '&';
        $r .= 'error_code=' . $response['error_code'];

        header('location:' . $r);
        exit();
    }


}