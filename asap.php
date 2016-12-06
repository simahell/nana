<?php
	if (!include_once("/server/server_config.php"))
		die("server_config.phpの読み取り失敗");
	
	$management_db = "management2";
	$host = SERVER_NAME.":".MYSQL_PORT;
	$db = new mysqli($host, MYSQL_USER, MYSQL_PASS, $management_db);
	
	if($db->connect_errno > 0){
		die('データベース接続エラー['.$db->connect_error.']');
	}
	$db->set_charset("utf8");
	$sql = "SELECT * FROM pre_order_list WHERE 希望納期 COLLATE utf8_unicode_ci LIKE '%ASAP%'";
	if(!$res = $db->query($sql)){
		die('データベース接続エラー['.$db->error.']');
	}
	
	$asap = $res->num_rows;
	echo "$asap";
?>