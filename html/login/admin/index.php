<?php
include "/var/www/lib/login/base.php";
$login = Login_Base::getLoginStatus();
?>

<html>
    <head>
        <title>管理ツール</title>
    </head>
    <body>
<?php
if (empty($login["admin"])){
  echo "not admin";exit;
}
?>
<a href="./user_list.php">ユーザー一覧</a><br />
<a href="./user_create.php">ユーザー作成</a>

    </body>
</html>