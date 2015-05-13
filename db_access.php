<?php

function accessDB(){
	try {
		return new mysqli("localhost","root","root","php_homework03");
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit;
	}


}


?>
