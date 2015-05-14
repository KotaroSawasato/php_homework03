<?php
session_start();
require_once('db_access.php');
$dbh = accessDB();

//ログインフォームの値がデータベースの内容と一致するか調べる
$login_data['mail_address']=$_POST["login_address"];
$login_data['pass'] = md5($_POST["login_pass"]);
//フォームの値でデータベース検索	
$sql = "SELECT * FROM `user_info` where mail_address='".$login_data['mail_address']."' AND pass='".$login_data['pass']."';";

$stmt = $dbh->query($sql);

if(empty($stmt->fetch_assoc())){
		$_SESSION["login_check"] ="failed";
}else{
	$_SESSION["login_check"] ="success";
}

?>
<html>
<head>
	<meta charset="UTF-8">
	<?php
	if($_SESSION["login_check"]=="success") {?>
	<meta http-equiv="refresh" content="0;URL=../php_homework03/index.php">
	<?php }else if($_SESSION["login_check"]=="failed"){ ?>
	<meta http-equiv="refresh" content="0;URL=../php_homework03/top.php">
	<?php } ?>
</head>
<body>
</body>
</html>
