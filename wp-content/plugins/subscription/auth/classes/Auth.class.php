<?php

namespace Auth;

class User
{
    private $id;
    private $username;
    private $db;
    private $user_id;

    private $db_host = "127.0.0.1";
    private $db_name = "wordpress-art-x";
    private $db_user = "wordpress_u";
    private $db_pass = "HhdcnRtedk!dn#w";

    private $is_authorized = false;

    public function __construct($username = null)
    {
        $this->username = $username;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public static function isAuthorized()
    {
        if (!empty($_COOKIE["user_id"])) {
            return (bool) $_SESSION["user_id"];
        }
        return false;
    }


    public function authorize($username, $remember=false)
    {
        $query = "select id, phone from wp_subscribe_noty where
            phone = :username limit 1";
        $sth = $this->db->prepare($query);


        $sth->execute(
            array(
                ":username" => $username
            )
        );
        $this->user = $sth->fetch();

        if (!$this->user) {
            $this->is_authorized = false;
        } else {
            $this->is_authorized = true;
            $this->user_id = $this->user['id'];
            $this->saveSession($remember);
        }

        return $this->is_authorized;
    }

    public function logout()
    {
        if (!empty($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
        }
    }

    public function saveSession($remember = false, $http_only = true, $days = 7)
    {
        $_COOKIE["user_id"] = $this->username;

        if ($remember) {
            // Save session id in cookies
            $sid = session_id();

            $expire = time() + $days * 24 * 3600;
            $domain = ""; // default domain
            $secure = false;
            $path = "/";

            $cookie = setcookie("sid", $sid, $expire, $path, $domain, $secure, $http_only);
        }
    }

    public function connectdb($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            $this->db = new \pdo("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\pdoexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }
}


