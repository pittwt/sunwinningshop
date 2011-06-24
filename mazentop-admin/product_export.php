<?php
/**
 * @package product_export
 * Author Anton
 * 商品批量导出 csv
 */

require('includes/application_top.php');

$filename = (isset($_POST['filename']) ? $_POST['filename'] : '');
$chartset = (isset($_POST['chartset']) ? $_POST['chartset'] : '');
if($filename && $chartset){
	require('includes/classes/phpzip.php');
	$zip = new PHPZip;
	
	$sql = "select p.* ,pd.*
          from " . TABLE_PRODUCTS . " p, " .
                   TABLE_PRODUCTS_DESCRIPTION . " pd
          where    p.products_id = pd.products_id";
	
	//$sql = "SELECT * FROM " . TABLE_CUSTOMERS . " WHERE customerS_id = ".$_SESSION['customer_id'];
	//$user_query = $db->bindVars($user_query, ':customersID', $_SESSION['customer_id'], 'integer');
	//echo $sql."<br>";
	$product_info = $db->Execute($sql);
	/*foreach($product_info->fields as $item){
		print_r($item);
	}*/
	while($product_info->EOF){
		
		print_r($product_info->fileds);
		
		$product_info->MoveNext();
	}
}

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
  if (typeof _editor_url == "string") HTMLArea.replaceAll();
  }
  // -->
</script>
<?php if ($editor_handler != '') include ($editor_handler); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onLoad="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<div class="maincontent">
	<div class="content_title">商品批量导出</div>
    <div class="content">
    	<div class="product_export">
        	<table>
            <form method="post" action="">
                <tr>
                	<td class="txtright">导出文件名称：</td>
                    <td><input type="text" name="filename"></td>
                </tr>
                <tr>
                	<td class="txtright">编码格式：</td>
                    <td><select name="chartset">
                    <option value="utf-8">utf-8</option>
                    <option value="gb2312">gb2312</option>
                    <option value="gbk">gbk</option>
                	</select></td>
                </tr>
                <tr><td colspan="2" class="txtcenter"><input type="submit" value="导出"></td></tr>
            </form>
            </table>
        </div>
    </div>
</div>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>