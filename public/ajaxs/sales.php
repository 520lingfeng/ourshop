<?php

	try {
		
		// 连接数据库
		$pdo = new PDO('mysql:host=localhost;dbname=ourshop;charset=utf8','root','');

	} catch (PDOException $e) {
		
		die('连接数据库失败'.$e->getMessage());
	}

	$sql = "update sales set discount='{$_GET['inps']}' where id = {$_GET['id']}";

	$num = $pdo->exec($sql); 

	if ($num) {

		echo $_GET['inps'];
	} else {

		echo '0';
	}