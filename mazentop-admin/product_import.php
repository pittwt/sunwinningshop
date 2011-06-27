<?php
/**
 * @package product_export
 * Author Anton
 * 商品批量导入 csv
 */

require('includes/application_top.php');

$charset = isset($_POST['charset']) ? $_POST['charset'] : '';
if($_POST['import']){
	
	//取得上传的csv文件
	$res = fopen($_FILES['filename']['tmp_name'],"r");
	while ($arr2 = fgetcsv($res)) {
		$arr[]=$arr2;
	}
	array_shift($arr);
	$arrobj = new arrayiconv();
	$arr = $arrobj->Conversion($arr,$charset,"utf-8");
	foreach($arr as $item){
		$product_info=array(
			//'products_id'=>'',
			'products_type' 			=> $item[1],
			'products_quantity' 		=> $item[2],
			'products_model' 			=> $item[3],
			'products_image' 			=> $item[4],
			'products_price' 			=> $item[5],
			'products_virtual' 			=> $item[6],
			'products_date_added' 		=> $item[7],
			'products_last_modified'	=> $item[8],
			'products_date_available' 	=> $item[9],
			'products_weight' 			=> $item[10],
			'products_status' 			=> $item[11],
			'products_tax_class_id ' 	=> $item[12],
			'manufacturers_id ' 		=> $item[13],
			'products_ordered' 			=> $item[14],
			'products_quantity_order_min' => $item[15],
			'products_quantity_order_units' => $item[16],
			'products_priced_by_attribute' => $item[17],
			'product_is_free ' 			=> $item[18],
			'product_is_call' 			=> $item[19],
			'products_quantity_mixed' 	=> $item[20],
			'product_is_always_free_shipping' => $item[21],
			'products_qty_box_status' 	=> $item[22],
			'products_quantity_order_max' => $item[23],
			'products_sort_order ' 		=> $item[24],
			'products_discount_type' 	=> $item[25],
			'products_discount_type_from' => $item[26],
			'products_price_sorter' 	=> $item[27],
			'master_categories_id'		=> $item[28],
			'products_mixed_discount_quantity' => $item[29],
			'metatags_title_status' 	=> $item[30],
			'metatags_products_name_status' => $item[31],
			'metatags_model_status' 	=> $item[32],
			'metatags_price_status' 	=> $item[33],
			'metatags_title_tagline_status' => $item[34]
			
		);
		//print_r($item);exit;
		zen_db_perform(TABLE_PRODUCTS, $product_info);
		$insert_id = $db->Insert_ID();
		$product_desc = array(
			'products_id' => $insert_id,
			'language_id' => $item[35],
			'products_name' => $item[36],
			'products_description' => $item[37],
			'products_url' => $item[38],
			'products_viewed' => $item[39]
		);
		zen_db_perform(TABLE_PRODUCTS_DESCRIPTION, $product_desc);
		echo $insert_id;
		//exit;
	}

}

class arrayiconv
{
	static protected $in;
	static protected $out;
	/**
	  * 静态方法,该方法输入数组并返回数组
	  *
	  * @param unknown_type $array 输入的数组
	  * @param unknown_type $in 输入数组的编码
	  * @param unknown_type $out 返回数组的编码
	  * @return unknown 返回的数组
	  */
	static public function Conversion($array,$in,$out)
	{
	  self::$in=$in;
	  self::$out=$out;
	  return self::arraymyicov($array);
	}
	/**
	  * 内部方法,循环数组
	  *
	  * @param unknown_type $array
	  * @return unknown
	  */
	static private function arraymyicov($array)
	{
	  foreach ($array as $key=>$value)
	  {
	   $key=self::myiconv($key);
	   if (!is_array($value)) {
		$value=self::myiconv($value);
	   }else {
		$value=self::arraymyicov($value);
	   }
	   $temparray[$key]=$value;
	  }
	  return $temparray;
	}
	/**
	  * 替换数组编码
	  *
	  * @param unknown_type $str
	  * @return unknown
	  */
	static private function myiconv($str)
	{
		if(self::$in==self::$out){
			return $str;
		}else{
			return iconv(self::$in,self::$out,$str);
		}
	
	}
}

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <form method="post" action="" enctype="multipart/form-data">
                <tr>
                	<td class="txtright">导出文件名称：</td>
                    <td><input type="file" name="filename"></td>
                </tr>
                <tr>
                	<td class="txtright">编码格式：</td>
                    <td><select name="charset">
                    <option value="utf-8">utf-8</option>
                    <option value="gb2312">gb2312</option>
                    <option value="gbk">gbk</option>
                	</select></td>
                </tr>
                <tr><td colspan="2" class="txtcenter"><input type="submit" name="import" value="导入"></td></tr>
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