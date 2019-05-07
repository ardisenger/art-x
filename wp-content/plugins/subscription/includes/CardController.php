<?php
if (!isset($wpdb)) {
    require_once('../../../../wp-config.php');
    require_once('../../../../wp-includes/wp-db.php');
}



class CardController
{

    private $request;
    private $msisdn;
    private $service_id = '77336';
    private $payment_method = '81';
    private $summ = '1.00';
    private $currency = 'RUB';
    private $secret_key = 'cS4DzDr6JBl15rpAKWNn';
    private $order_id;

    public function __construct()
    {
        $this->request = $_POST;
        $this->msisdn = $this->request['msisdn'];
        $this->order_id = $this->orderId();
    }

    public function index()
    {
        global $wpdb;

        $subscription_id = $this->statusSubscription($this->msisdn);

        echo $subscription_id;
        if(empty($subscription_id)){

            $url = 'https://pay.flexidengi.ru';
            $msisdn = preg_replace('![^0-9]+!', '', $this->msisdn);
            $hash = $this->hash();

            $query = 'INSERT INTO subscribe_notifies(`create_at`,`service_id`, `order_id`, `masked_pan`, `hash`)
            VALUE (NOW(), \'' . $this->service_id . '\', \'' . $this->order_id . '\',  \'' . $msisdn . '\', \'' . $hash . '\')';

            $insert = $wpdb->query($query);

            if ($insert) {
                echo '<form id="idRecirectForm" method="get" action="' . $url . '">
                <input type="hidden" name="service_id" value="' . $this->service_id . '">
                <input type="hidden" name="order_id" value="' . $this->order_id . '">
                <input type="hidden" name="payment_method_id" value="' . $this->payment_method . '">
                <input type="hidden" name="hash" value="' . $hash . '">
                <input type="hidden" name="summ" value="' . $this->summ . '">
                <input type="hidden" name="currency" value="' . $this->currency . '">
                <input type="hidden" name="msisdn" value="' . $msisdn . '">
            </form>
            <script type="text/javascript">document.getElementById("idRecirectForm").submit();</script>';
                exit();
            }
        }else{
            setcookie('idSubscription', 'card', strtotime('+30 days'), COOKIEPATH, COOKIE_DOMAIN, false, false);
            wp_redirect('/');
        }



    }

    /**
     * Check subscription
     * @param $masked_pan
     * @return bool
     */
    private function statusSubscription($masked_pan)
    {

        #Глобальная область подключения к БД
        global $wpdb;

        $create = $wpdb->get_results('SELECT id, subscription_id FROM  subscribe_notifies  WHERE  1
                    AND masked_pan = \'' . $masked_pan . '\' AND `type`=\'SUBSCRIPTION_ACTIVATED\'
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

    /**
     * order_id
     * @return mixed
     */
    public function orderId()
    {
        $length = 10;
        $order_id = '';
        for ($i = 0; $i < $length; ++$i) {
            $first = $i ? 0 : 1;
            $n = mt_rand($first, 9);
            $order_id .= $n;
        }
        $_SESSION['order_id'] = $order_id;
        return $order_id;
    }

    /**
     * hash для подписки
     * @return mixed
     */
    protected function hash()
    {

        $order_id = $_SESSION['order_id'];

        $hash = md5($this->service_id .
            $order_id .
            $this->summ .
            $this->currency .
            $this->payment_method .
            $this->secret_key);

        return $hash;
    }
}


if (array_key_exists('card', $_POST)) {
    $new_card = new CardController();
    $new_card->index();
}



