<?php
session_start();
$db_user = "root";
$db_pass = "root";
$db_name = "php_homework03";

//mysqlに接続 
$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);

	//ログインフォームの値がデータベースの内容と一致するか調べる
$login_data[0]=$_POST["login_address"];
$login_data[1]=$_POST["login_pass"];
$_SESSION['login_check']="failed";

$sql = "SELECT * FROM `user_info`;";
foreach ($mysqli->query($sql) as $row){
	if($row["mail_address"] !== $login_data[0]){
		$_SESSION["login_check"]="failed";
		
	}else if($row["pass"] !== md5($login_data[1])){ 
		$_SESSION["login_check"]="failed";
	}else{
		$_SESSION["login_check"] ="success";
	}
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>ログイン後のページ</title>
	<?php
	if($_SESSION["login_check"]=="failed")
		echo "<meta http-equiv="refresh" content='0;URL=../php_homework03/top.php'>";
	?>
</head>
<body>
	ログイン成功
	<form method="post" action="logout.php">
		<input type="hidden" name = "flag" value ="logout">
		<input type ="submit" value="ログアウト">
	</form>
</body>
</html>


