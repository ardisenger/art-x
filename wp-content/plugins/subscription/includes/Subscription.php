<?php

include_once 'SubscriptionController.php';
include_once 'MacWapController.php';
include_once 'CoreController.php';

use Subscription\SubscriptionController;
use MacWap\MacWapController;
use CoreSubscriptions\CoreController;


class Subscription
{
    protected $request;
    protected $msisdn;
    protected $subscription_id = '';
    protected $sms_code = '';
    protected $host;


    public function __construct()
    {
        $this->request = $_REQUEST;
 
        $this->msisdn = $this->request['masked_pan'];
        $this->host = $this->request['host'];
        $this->sms_code = $this->request['code'];
        $this->subscription_id = $this->request['subscription_id'];
    }

    /**
     * Проверка запроса (MACWAP)
     * @return bool
     */
    private function host_verification()
    {
        $request = $this->host;
        $host = ($request) ? $request : false;

        return $host;
    }


    /**
     * Проверка подписки
     */
    public function check_subscription()
    {


        $msisdn = $this->msisdn($this->msisdn);
        $host = $this->host_verification();

        #Если есть номер
        if ($msisdn and empty($this->sms_code)) {
            #Если запрос с сайта
            if (empty($host)) {

                #Проверим подписку
                $idSubscription = $this->statusSubscription($msisdn);
                #Если активная
                if ($idSubscription) {
                    setcookie('idSubscription', $idSubscription, strtotime('+30 days'), COOKIEPATH, COOKIE_DOMAIN, false, false);
                    wp_redirect('/');
                } else {
                    #Создание новой подписки с сайта
                    $subscriptionController = new SubscriptionController($msisdn);
                    $subscriptionController->newSubscription();
                }
            }
		
            #Если запрос с MacWap
            $subscription = new MacWapController($this->msisdn, $this->request);
            $subscription->newSubscriptionMacWap();
        }
        if(!empty($this->sms_code) and !empty($this->subscription_id)){
            $new_code = new CoreController();
            $new_code->code($this->subscription_id, $this->sms_code);
            exit();
        }
        #Абонент зашел впервые на сайт
        wp_redirect(plugins_url('subscription/landings/land1'));
    }


    /**
     * Check subscription
     * @param $masked_pan
     * @return bool
     */
    public function statusSubscription($masked_pan)
    {

        #Глобальная область подключения к БД
        global $wpdb;

        $create = $wpdb->get_results('SELECT id, subscription_id FROM  subscribe_notifies  WHERE  1
                    AND masked_pan = \'' . $masked_pan . '\' AND (`type`=\'SUBSCRIPTION_ACTIVATED\')
                        ORDER BY `create_at` desc limit 1');

        foreach ($create as $subscription) {
            $create_id = $subscription->id;
            $subscription_id = $subscription->subscription_id;
        }

        $close = $wpdb->get_results('SELECT id,subscription_id FROM subscribe_notifies WHERE  1 
                    AND `masked_pan` = \'' . $masked_pan . '\'
                        AND (`type`=\'ATTACH_REFUSAL\')
                            ORDER BY `create_at` desc limit 1');

        foreach ($close as $subscription_closed) {
            $closed_id = $subscription_closed->id;
            $subscription_id = $subscription_closed->subscription_id;
        }

        $check = ($create_id > $closed_id) ? true : false;

        #Значени подписки в шаблон
        return $check;
    }

    public function msisdn($masked_pan)
    {
        if(array_key_exists('msisdn', $_COOKIE)){
            $msisdn = $_SESSION['msisdn'];
        }
        $msisdn = $masked_pan;

        return $msisdn;
    }


}

$subscription = new Subscription();
$subscription->check_subscription();
