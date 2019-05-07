<?php

namespace CoreSubscriptions;

class CoreController
{

    private $masked_pan;
    private $options = [];
    private $service_id = '77284';
    private $secret_key = 'cS4DzDr6JBl15rpAKWNn';


    public function __construct($masked_pan = false, $options = [])
    {
        $this->masked_pan = $masked_pan;
        $this->options = $options;
    }

    /**
     * Подписка с сайта
     * @return mixed
     */
    public function subscribeWap()
    {
        #Строка запроса на платформу
        $request = $this->options;

        if (!empty($request)) {

            #Первый запрос на платформу
            $successfully = $this->init($request);

            #Успешный первый этап
            if($successfully){

                #Получили id подписки
                $subscription_id = $successfully['subscription_id'];

                #Отправляем запрос на странциу смс
                if($subscription_id){
                    $this->sendSubscriptionPost($subscription_id);
                }
            }
        }
    }

    /**
     * Инициализация подписки на платформе Flexi
     * @param $data
     * @return string
     */
    public function init($request, $flag = false)
    {

        #Передаем строку с параметрами в curl
        $response = $this->curl($request);

        $processingStatus = $response['processing_status'];

        #Успешная подписка
        if ($processingStatus == 'CONFIRMATION') {
            return $response;
        }

        # Если подписка с macwap пришла с
        # ошибкой редирект на их урл ошибок
        if(!empty($flag)){
            return $response;
        }

        #Подпсика с сайта с ошибкой
        $this->debugError($request, $response['error_code']);
        return wp_redirect(plugins_url('subscription/500.php'));
    }

    /**
     * Второй запрос к платформе
     *
     */
    public function code($subscription_id, $code)
    {

        $anny = [];

        if ($subscription_id && $code) {
            $strIsArr = [
                'service_id' => $this->service_id,
                'type' => 'CONFIRMATION',
                'subscription_id' => $subscription_id,
                'confirmation' => $code
            ];

            $hash = md5($code . $strIsArr['type'] . $this->service_id . $subscription_id . $this->secret_key);

            foreach ($strIsArr as $item => $value) {
                $anny[] = "$item=$value";
            }

            $convert = implode('&', $anny);
            $str = $convert . '&hash=' . $hash;

            $response = $this->curl($str);

            $processing_status = $response['processing_status'];

            if (!empty($processing_status)) {

                if($processing_status == 'ACCEPTED'){
                    setcookie('idSubscription', $subscription_id, strtotime('+30 days'), COOKIEPATH, COOKIE_DOMAIN, false, false);
                    wp_redirect(home_url());
                    exit();
                }else{
                    $subErrors = 'subscription_id - ' . $response['subscription_id'];
                    $subErrorsCode = 'код ошибки - ' . $response['error_code'];
                    $this->debugError('Неверно введен код СМС - ', $subErrors . ' ' . $subErrorsCode);
                    echo "<script>history.back()</script>";
                }
            }
        }
        return 'err';
    }

    /**
     * Отправка запроса на FLEXI
     * @param $str
     * @return bool|mixed|string
     */
    public function curl($str)
    {
        $err = '';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://payments.flexidengi.ru/noform/?' . $str,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) return $this->errCurl($err);
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * @param $idSubscription
     */
    public function sendSubscriptionPost($idSubscription, $masked_pan = false)
    {
        if ($idSubscription != '') {
            echo "<form id='redirect' action='../landings/land1/sms.php' method='post'>
                    <input type='hidden' name='subscription_id' value='$idSubscription'>
                    <input type='hidden' name='service_id' value='$this->service_id'>
                    <input type='hidden' name='service_id' value='$masked_pan'>
                    <script>
                        document.getElementById('redirect').submit();
                    </script>
                   </form>";
            exit();
        }
    }

    /**
     * Logs file
     * @param $error
     * @param bool $response]
     */
    public static function debugError($error, $response = false)
    {

        $message = 'ЗАПРОС - ' .$error.' : ОШИБКА - '.$response."\r\n";
        $file_name = date("Y_m_d") . "_log.log";

        $file = fopen('../errors/logs/'.$file_name, 'a+');
        fwrite($file, $message);
    }

}