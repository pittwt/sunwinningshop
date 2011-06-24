<?php
/** 
 * 判断ip地址是否为中国 对中国的ip需要确认通行证
 * ipstring.php  ip地址字符串（序列化）
 * province.php  省份字符串（序列化）
 * passport.php  通行证
 */
header("Content-type: text/html; charset=utf-8");
//require_once('./includes/configure.php');



//print_r(unserialize($ip_array));
//echo $userip = getIp();
//echo "<br>";
//echo getclientip()."<br>";
//echo ip2long('21.234.255.255')."<br>";
//echo long2ip(992109566)."<br>";
//echo 367722495 - 367656960;
$userip = '58.16.210.0';
//$ip_arr=explode(".",$userip);
//$ip_num=$ip_arr[0]*256*256*256+$ip_arr[1]*256*256+$ip_arr[2]*256+$ip_arr[3];

/**
 * 确认密码
 */
if(isset($_GET['password']) && $_GET['password'])
{
	$passport = require('passport.php');
	if($_GET['password'] == $passport['password']){
		$_SESSION['status'] = 'pass';
	}
}
/**
 * 第一次登录 判断ip所在地址
 */
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'pass'){
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

	if(isset($is_china) && $is_china){
		$forminfo = '<form action="" method="get">通行证：<input type="text" name="password" value=""><input type="submit" value="提交"></form>';
		echo mb_convert_encoding($forminfo, "utf-8", 'gb2312');
		exit;
	}else{
		/* 无法确认ip所在地区 */
		$_SESSION['status'] = 'pass';
	}
}
//else{
	//echo 'Not from China';	
//}
/*$sql = "select * FROM `ipaddress`";
$dblink = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
$zone_sql = "select * from `zc_zones` where zone_country_id = 44";
mysql_select_db(DB_DATABASE, $dblink);
mysql_query("SET NAMES 'gbk'");
$result = mysql_query($sql);
$ip_arr = array();
while($row = mysql_fetch_array($result)){
	$ip_arr[] = $row;
}
*/

//print_r($str);exit;
//echo '<textarea style="width:800px; height:400px;">'. serialize($ip_arr) .'</textarea>';
//file_put_contents('a.php', '<?php  $ip_array=\''.serialize($ip_arr).'\'; ? > ');
//print_r(get_ip_arr());
//echo "<br>";
//print_r(get_ip_place());

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

function getClientIp()
{
	if (getenv('HTTP_CLIENT_IP')) {
	  $ip = getenv('HTTP_CLIENT_IP');
	} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
	  $ip =getenv('HTTP_X_FORWARDED_FOR');
	} else {
	  $ip = getenv('REMOTE_ADDR');
	}
	return $ip;
}
/*
class CheckClientIp
{
	
	public function __construct($ipstring, $province)
	{
		$userip = '12.13.177.0';
		$ipnum = ip2long($userip);
		$ipcountry = '';
		
		foreach(unserialize($ip_string) as $item){
			if($ipnum >= $item['ip1'] and $ipnum <= $item['ip2']){
				$ipcountry = $item['country'];
				break;
			}
		}
		$is_china = false;
		foreach(unserialize($province_str) as $item){
			if(substr($ipcountry, 0, 4) == substr($item['zone_name'], 0, 4)){
				$is_china = true;
				break;
			}
		}
		return $is_china;
	}
	
	public static function getIP()
	{
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
	
	public static function getClientIp()
	{
		if (getenv('HTTP_CLIENT_IP')) {
		  $ip = getenv('HTTP_CLIENT_IP');
		} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
		  $ip =getenv('HTTP_X_FORWARDED_FOR');
		} else {
		  $ip = getenv('REMOTE_ADDR');
		}
		return $ip;
	}
	
}
$ip = new CheckClientIp($ipstring, $province);
exit;*/

?>