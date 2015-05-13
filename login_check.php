<?php
session_start();
require_once('db_access.php');
$dbh = accessDB();
//ログインフォームの値がデータベースの内容と一致するか調べる
$login_data[0]=$_POST["login_address"];
$login_data[1]=$_POST["login_pass"];

//フォームの値でデータベース検索に変更
$sql = "SELECT * FROM `user_info`;";
foreach ($mysqli_query($dbh,$sql) as $row){
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
	<?php
	if($_SESSION["login_check"]=="success"){
		echo '<meta http-equiv="refresh" content="0;URL=../php_homework03/top.php">';
	}else if($_SESSION["login_check"]=="failed"){
		echo '<meta http-equiv="refresh" content="0;URL=../php_homework03/index.php">';
	}
	?>
	<title>ログイン後のページ</title>
</head>
<body>
</body>
</html>
