<?php
/** 
 * 判断ip地址是否为中国 对中国的ip需要确认通行证
 * ipstring.php  ip地址字符串（序列化）
 * province.php  省份字符串（序列化）
 * passport.php  通行证
 * Author Anton
 */
header("Content-type: text/html; charset=utf-8");

$userip = '58.16.210.0';
//$userip = getClientIp();

/**
 * 确认密码
 */
if(isset($_POST['password']) && $_POST['password']){
	$passport = require('passport.php');
	if(md5($_POST['password']) == $passport['password']){
		$_SESSION['customer_status'] = 'pass';
	}
}

/**
 * 第一次登录 判断ip所在地址
 */
if(!isset($_SESSION['customer_status']) || $_SESSION['customer_status'] != 'pass'){
	require('ipstring.php');
	require('province.php');
	$ipcountry = '';
	$ipnum = ip2long($userip);
	foreach(unserialize($ip_string) as $item){
		if($ipnum >= $item['ip1'] && $ipnum <= $item['ip2']){
			$ipcountry = $item['country'];
			break;
		}
	}

	foreach(unserialize($province_str) as $item){
		if(substr($ipcountry, 0, 4) == substr($item['zone_name'], 0, 4)){
			$is_china = true;
			break;
		}
	}

	if(isset($is_china) && $is_china && $ipcountry){
		$forminfo = '<form action="" method="post">通行证：<input type="password" name="password" value=""><input type="submit" value="提交"></form>';
		echo mb_convert_encoding($forminfo, "utf-8", 'gb2312');
		exit;
	}else{
		/* 无法确认ip所在地区 */
		$_SESSION['customer_status'] = 'pass';
	}
}

function mb_unserialize($serial_str) {
     $out = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $serial_str );
     return unserialize($out);
 }

function getIP() {  
	if (! empty ( $_SERVER ["HTTP_CLIENT_IP"] )) {  
		$cip = $_SERVER ["HTTP_CLIENT_IP"];  
	} else if (! empty ( $_SERVER ["HTTP_X_FORWARDED_FOR"] )) {  
		$cip = $_SERVER ["HTTP_X_FORWARDED_FOR"];  
	} else if (! empty ( $_SERVER ["REMOTE_ADDR"] )) {  
		$cip = $_SERVER ["REMOTE_ADDR"];  
	} else {  
		$cip = '';  
	}  
	preg_match ( "/[\d\.]{7,15}/", $cip, $cips );
	$cip = isset ( $cips [0] ) ? $cips [0] : 'unknown';  
	unset ( $cips );
	return $cip;
} 

function getClientIp(){
	if (getenv('HTTP_CLIENT_IP')) {
	  $ip = getenv('HTTP_CLIENT_IP');
	} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
	  $ip =getenv('HTTP_X_FORWARDED_FOR');
	} else {
	  $ip = getenv('REMOTE_ADDR');
	}
	return $ip;
}

?>