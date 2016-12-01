<?php
include "/var/www/lib/login/base.php";
$login = Login_Base::getLoginStatus();
?>

<html>
    <head>
        <title>ログイン</title>
    </head>
    <body>
<?php
if (empty($login["admin"])){
  echo "not admin";exit;
}
$userList = Login_Base::getUserList();

echo "<table border=1>\n";
echo " <tr><th>id</th><th>ニックネーム</th><th>パスワード</th><th>アドミン</th></tr>\n";

foreach ($userList as $user) {
echo "<tr><form action='user_edit.php' method = 'post'>";
echo "<td>" .$user["id"] ."</td>";
echo "<td>" .$user["nickname"] ."</td>";
echo "<td><input type='password' name='password' value=''></td>";
echo "<td>" .$user["admin"] ."</td>";
echo "<td><input type=\"submit\" name =\"login\" value = \"編集\"></td>";
echo "</form></tr>\n";
}

echo "</table>\n";

?>
ユーザー追加

    </body>
</html>