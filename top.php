<?php
session_start();
require_once('db_access.php');
$dbh = accessDB();

$data[0]=$_POST["h_name"];
$data[1]=$_POST["entry_address"];
$data[2]=$_POST["sex"];
$data[3]=$_POST["entry_pass1"];
$data[4]=$_POST["entry_pass2"];


?>
<html>
<head>
	<meta charset="UTF-8">
	<?php
	if($_SESSION['login_check']=="success")
		echo '<meta http-equiv="refresh" content="0;URL=../php_homework03/index.php"/>';
	?>


	<title>ログイン・新規登録</title>
</head>
<body>
	<h2>ログイン</h2>
	<?php
	if($_SESSION['login_check']=="failed"){ ?>
	<font color="red">メールアドレス・パスワードが間違っています</font>
	<?php } ?>
	<form method="post" action="login_check.php">
		メールアドレス：<input type="text" name="login_address"><br>
		パスワード：<input type="pass" name ="login_pass"><br>
		<input type="submit" value="ログイン"><br>
	</form>
	<hr>
	<h2>新規登録</h2>
	<?php

	if($data[3] !== $data[4]){ ?>

	<font color="red">パスワードが一致しません</font>

	<?php }else if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4])){ ?>
	<font color="red">入力していないフォームがあります</font>

	<?php }else if(!empty($data[0]) && !empty($data[1]) && !empty($data[2]) && !empty($data[3])){
		$change_pass = md5($data[3]);
		echo $change_pass;
		$sql = "INSERT INTO `user_info` (`h_name`,`mail_address`,`sex`,`pass`) 
		VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$change_pass."');";
		$stmt = $dbh -> query($sql);
		echo "登録完了";
	} ?>

	<form method="post" action = "top.php">
		ハンドルネーム：<input type="text" name="h_name"><br>
		メールアドレス：<input type = "text" name ="entry_address"><br>
		性別：<input type="radio" name="sex" value="男" checked="checked">男
		<input type="radio" name="sex" value="女">女<br>
		パスワード：<input type="password" name ="entry_pass1"><br>
		パスワード(確認用)：<input type="password" name ="entry_pass2"><br>
		<input type="submit" value="新規登録"><br>
	</form>
</body>
</html>
