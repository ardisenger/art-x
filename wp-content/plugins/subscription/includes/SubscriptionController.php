<?php
/**
 * Class for subscription
 */

namespace Subscription;

#Connection $wpdb
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/wp-config.php';

include_once 'CoreController.php';

use CoreSubscriptions\CoreController;

class SubscriptionController
{

    private $masked_pan;
    private $data = [];
    private $service_id = '77284';
    private $payment_method = '90';
    private $product_id = '386';
    private $is_recurrent = 'true';
    private $secret_key = 'cS4DzDr6JBl15rpAKWNn';


    public function __construct($masked_pan)
    {
        $this->masked_pan = $masked_pan;
    }

    /**
     * New subscription
     */
    public function newSubscription()
    {
        $options = $this->options();
        $newSubscription = new CoreController($this->masked_pan, $options);
        $newSubscription->subscribeWap();
    }


    private function options()
    {
        $this->data['service_id'] = $this->service_id;
        $this->data['order_id'] = $this->getOrder();
        $this->data['product_id'] = $this->product_id;
        $this->data['payment_method_id'] = $this->payment_method;
        $this->data['hash'] = $this->hash();
        $this->data['msisdn'] = $this->masked_pan;
        $this->data['is_recurrent'] = $this->is_recurrent;

        foreach ($this->data as $datum => $val) {
            $ally[] = "$datum=$val";
        }

        $str = implode('&', $ally);

        return $str;
    }


    /**
     * Проверка куки
     * @return string
     */
    protected function cookie()
    {
        $cookie = ($_COOKIE['s_id']) ? $_COOKIE['s_id'] : '';
        return $cookie;
    }

    /**
     * order_id
     * @return mixed
     */
    private function orderId()
    {
        $length = 10;
        $order_id = '';
        for ($i = 0; $i < $length; ++$i) {
            $first = $i ? 0 : 1;
            $n = mt_rand($first, 9);
            $order_id .= $n;
        }
        session_start();
        $_SESSION['order_id'] = $order_id;
        return $order_id;
    }

    /**
     * Получаем order_id
     * @return mixed
     */
    private function getOrder()
    {
        if (empty($_SESSION)) {
            $this->orderId();
        }
        $order_id = $_SESSION['order_id'];
        return $order_id;

    }

    /**
     * hash для подписки
     * @return mixed
     */
    protected function hash()
    {
        $hash = md5($this->service_id .
            $this->getOrder() .
            $this->product_id .
            $this->payment_method .
            $this->secret_key);

        return $hash;
    }

}























