<?php

include "../../lib/login/base.php";
include '../../lib/login/error.php';

$error = new Error();

//var_dump($_POST);

if (isset($_POST)){
    if (empty($_POST['emailaddress'])){
        $error->set('メールアドレスが未入力です。');
    }
    if (empty($_POST['password'])){
        $error->set('パスワードが未入力です。');
    }

    var_dump($error->get());

    if (count($error->get()) > 0){
        header('Location : index.html', true);   
        //exit(); 
    }else{
        //ログインオブジェクト発行
        if(!$login = Login_Base::login($_POST["email_address"],$_POST["password"])){
            $error -> set('メールアドレス、もしくはパスワードが違います。');
            // exit();
        } else{
            header('Location : ../menu', true);   
            // exit();
        }
    }

    
}



// if (!empty($_POST["email_address"]) && !empty($_POST["password"])){
// //var_dump($_POST["pass"],$_POST["username"]);
//     $login = Login_Base::login($_POST["email_address"],$_POST["password"]);
// } else{
//     $error -> set('メールアドレス、もしくはパスワードが違います。');
// 	header('Location : ../login', true);   
//     exit();   
// }
	

// if ($login = Login_Base::getLoginStatus()){

// header('Location : ../menu', true);   
//     exit();   


// }else{
// 	$error -> set('メールアドレス、もしくはパスワードが違います。');
// 	header('Location : ../login', true);   
//     exit();   

// }