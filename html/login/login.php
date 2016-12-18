<?php

include "../../lib/login/base.php";
require '../../lib/login/error.php';

$error = new Error();

var_dump($_POST);

if (!empty($_POST["email_address"]) && !empty($_POST["password"])){
//var_dump($_POST["pass"],$_POST["username"]);
    $login = Login_Base::login($_POST["email_address"],$_POST["password"]);
}
	

if ($login = Login_Base::getLoginStatus()){

header('Location : ../menu', true);   
    exit();   


}else{
	$error -> set('メールアドレス、もしくはパスワードが違います。');
	header('Location : ../login', true);   
    exit();   

}