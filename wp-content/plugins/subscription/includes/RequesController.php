<?php
/**
 * Created by PhpStorm.
 * User: Ardisenger
 * Date: 18.04.2019
 * Time: 15:35
 * Контроллер проверяет запрос и отдает подготовленый ответ
 */

namespace RequestClass;

class RequestController
{
    protected $request;
    protected $actions = [];

    public $data;
    public $code;
    public $masked_pan;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->actions = $this->getRequestParam('act');
    }


    /**
     * Проверка запроса
     * Возможные варианты: MacWap, подписка, смскод
     * @param $name
     * @return string|null
     */
    protected function getRequestParam($name)
    {
        if (array_key_exists($name, $this->request)){
            return trim($this->request[$name]);
        }
        return null;
    }

    /**
     * Логирование ошибок запроса
     * @param $name
     * @param $message
     */
    protected function setFieldError($name, $message)
    {
        $message = $name . ' - ' . $message."\r\n";
        $file_name = date("Y_m_d") . "_log.log";

        $file = fopen('../errors/logs/'.$file_name, 'a+');
        fwrite($file, $message);
    }

    /**
     * Dизуализируем в строку массив
     * @param $data
     * @return false|mixed|string|void
     */
//    protected function renderToString($data)
//    {
//
//
//        return json_encode($data, ENT_NOQUOTES);
//    }
}