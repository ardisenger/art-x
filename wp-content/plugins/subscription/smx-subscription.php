<?php
/**
 * Plugin Name: subscription
 * Description: ВАП - подписки
 * Author:      Latypov
 * Version:     1.0
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly.

#Подключение файлов подписки
include_once plugin_dir_path(__FILE__) . "includes/SubscriptionController.php";
include_once plugin_dir_path(__FILE__) . "widget/trueTopPostsWidget.php";
include_once plugin_dir_path(__FILE__) . "functions.php";
include_once plugin_dir_path(__FILE__) . "shortcode/short-code.php";
include_once plugin_dir_path(__FILE__) . "shortcode/short-popUp.php";
include_once plugin_dir_path(__FILE__) . "auth/classes/Auth.class.php";

#Стили плагина
add_action('wp_enqueue_scripts', 'themeslug_enqueue_file');
add_action('wp_footer', 'addPopUpCard');

#Добавление в панель администратора страниц плагина
function sub_admin_menu()
{
    add_menu_page('Подписка', 'Подписка', 8, 'admin_page_subscription', 'admin_page_subscription');
    add_submenu_page('admin_page_subscription', 'Нотификации', 'Нотификации', 8, 'page_notify', 'get_notify');
}

add_action('admin_menu', 'sub_admin_menu');

#Активация и деактивация плагина
register_activation_hook(__FILE__, 'smx_subscription_activation');
register_deactivation_hook(__FILE__, 'smx_subscription_deactivation');

#Ajax запросы
add_action('wp_ajax_(action)', 'betaSubscription');
add_action('wp_ajax_nopriv_(action)', 'betaSubscription');
add_action('wp_footer', 'includeAjaxSript');

#Регистрация виджета
add_action('widgets_init', 'true_top_posts_widget_load');

#Регистрация функций
add_action('pre_get_posts', 'check');
add_action('init', 'redirectStatus');

#Шорткод
add_shortcode('formGetContent', 'conclusion_form_content');
add_shortcode('popUpPremium', 'popUp');

