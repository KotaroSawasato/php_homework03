<?php
session_start();
require_once('db_access.php');
$dbh = accessDB();


?>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン後のページ</title>
</head>
<body>
 	ログイン成功
 	<form method="post" action="logout.php">
	<input type="hidden" name = "flag" value ="logout">
 		<input type ="submit" value="ログアウト">
 	</form>
 </body>
 </html>
