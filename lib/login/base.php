<?php
session_start();
include "../../lib/db/base.php";

class Login_Base
{
    private static $login;

    public static function getLoginStatus()
    {
        if (empty($_SESSION["login"])){
            return false;
        }else{
            return $_SESSION["login"];
        }
    }


    public static function login($user="",$password="")
    {
        if (empty($user) || empty($password)) return false;
        $db = Db_Base::getDb();
        $sql = 'SELECT * FROM T_USER where mail_address = ? and password = ?';
        $sth = $db->prepare($sql);
        $stmt = $sth->execute(array($user,Md5($password)));
        if ($rows = $sth->fetch()){
            $_SESSION["login"] = $rows;
            return $_SESSION["login"];
        }else{
            return false;
        }
    }

    public static function logout()
    {
        session_destroy();
    }
    
    public static function getUserList()
    {
        if (empty($_SESSION["login"]) || empty($_SESSION["login"]["admin"])) return array();
        $db = Db_Base::getDb();
        $sql = 'SELECT * FROM T_USER';
        $sth = $db->query($sql);
        return $sth->fetchAll();

    }
}

?>