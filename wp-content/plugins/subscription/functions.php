<?php

include_once 'includes/SubscriptionController.php';

use Subscription\SubscriptionController;


#Стили плагина
function themeslug_enqueue_file()
{
    wp_enqueue_style('style', plugins_url('/auth/css/style_form.css', __FILE__), false);
    wp_enqueue_style('reset', plugins_url('/auth/css/reset.css', __FILE__), false);
    wp_enqueue_script('ajax-js', plugins_url('/auth/vendor/jquery-2.0.3.min.js', __FILE__), false);
    #Стили для popUp cards
    wp_enqueue_style('popUp', plugins_url('shortcode/assets/css/style.css', __FILE__), false);
}

#Подключение стилей для popUp cards
function addPopUpCard()
{
    #Стили для оплаты картами
    wp_enqueue_script('popUp', plugins_url('shortcode/assets/js/index.js', __FILE__), false);
}

#Подключение ajax обработки формы "Получить контент"
function includeAjaxSript()
{
    wp_enqueue_script('ajax-form', plugins_url('/auth/js/ajax-form.js', __FILE__), false);
}

/**
 * Редирект на страницу ввода номера
 * если подписка активна
 */
function redirectStatus()
{
    $page = 'http://art-x.pro/получить-контент/';

    if (isset($_GET['statusCode'])) {
        $code = '16';
        $statusCode = ($_GET['statusCode'] == $code) ? true : false;
        if ($statusCode) {
            wp_redirect($page);
        }
    }
}

/**
 * Функция проверки подписки
 */
function check()
{
    #Если страница не главная и пользователь не авторизирован
    #Вызываем функцию проверки подписки
    $page = 'получить-контент';

    if (!is_front_page() && !is_user_logged_in() && is_page() != $page) {
        if (!isset($_COOKIE['idSubscription'])) {
            include_once plugin_dir_path(__FILE__) . "includes/Subscription.php";
        }
    }
}


/**
 * Запрос от MacWap
 */
//function mac_wap()
//{
//
//    $url = $_SERVER['HTTP_REFERER'];
//
//    #GET запрос от маквапа
//    $data = query_formation($_GET);
//    #Определение landing
//    $land = definition_landing($_SERVER);
//
//    if ($data) {
//
//        foreach ($data as $datum => $val) {
//            $ally[] = "$datum=$val";
//        }
//
//        $str = implode('&', $ally);
//
//        header('location:' . plugins_url('subscription/landings/' . $land) . '?' . $str);
//        exit();
//
//    }
//}

/**
 * Запись ошибок в файл
 * @param $file
 * @param $error
 */
function fail_Error($file, $error)
{
    $fp = fopen('../errors/logs/errors.log', 'a');
    fputs($fp, implode(': ', [date('Y-m-d H:i:s'), $file, "Ошибка" => $error]) . PHP_EOL);

}

/**
 * definition landing
 * @param $request
 * @return mixed
 */
function definition_landing($request)
{
    $response = urldecode($request['REQUEST_URI']);

    $path = parse_url($response, PHP_URL_PATH);
    $landing = pathinfo($path, PATHINFO_FILENAME);

    // $_SESSION['land'] = $landing;

    return $landing;
}

/**
 * Формирование запроса для подписки
 * @param $get
 * @return mixed
 */
function query_formation($get)
{

    $productId = $_GET['product_id'];

    if (!empty($productId) && !array_key_exists('click_id', $_GET)) {
        $data['service_id'] = $get['service_id'];
        $data['order_id'] = $get['order_id'];
        $data['product_id'] = $get['product_id'];
        $data['payment_method_id'] = $get['payment_method_id'];
        $data['hash'] = $get['hash'];
        $data['is_recurrent'] = $get['is_recurrent'];
    }

    if (!empty($data)) {
        foreach ($data as $item => $v) {
            if (array_key_exists($item, $data) && is_null($data[$item])) {

                #Запишем ошибку, если параметров не достаточно от MacWap
                $error = fail_Error('order_id = ' . $data['order_id'], $item . " - exists with a value of NULL");
                wp_redirect(plugins_url('subscription/500.php'));
                exit();

            }
        }
    }

    return $data;
}
