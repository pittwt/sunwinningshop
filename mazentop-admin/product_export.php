<?php
/**
 * @package product_export
 * Author Anton
 * 商品批量导出 csv
 */

require('includes/application_top.php');

$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
$charset = isset($_POST['charset']) ? $_POST['charset'] : '';
if($filename && $charset){
	require('includes/classes/phpzip.php');
	$zip = new PHPZip;
	
	$sql = "select p.* ,pd.*
          from " . TABLE_PRODUCTS . " p, " .
                   TABLE_PRODUCTS_DESCRIPTION . " pd
          where    p.products_id = pd.products_id";
	$product_info = $db->Execute($sql);
	
	$replace_foundarr = array("\r",'"',"\n");
	$replace_arr = array("",'""',"");
	/* 导出内容 */
	$product_arr = array(
		'products_id' => 0,
		'products_type' => 0,
		'products_quantity' => '""',
		'products_model' => '""',
		'products_image' => '""',
		'products_price' => 0,
		'products_virtual' => 0,
		'products_date_added' => 0,
		'products_last_modified' => 0,
		'products_date_available' => 0,
		'products_weight' => 0,
		'products_status' => 0,
		'products_tax_class_id ' => 0,
		'manufacturers_id ' => 0,
		'products_ordered' => 0,
		'products_quantity_order_min' => 0,
		'products_quantity_order_units' => 0,
		'products_priced_by_attribute' => 0,
		'product_is_free ' => 0,
		'product_is_call' => 0,
		'products_quantity_mixed' => 0,
		'product_is_always_free_shipping' => 0,
		'products_qty_box_status' => 0,
		'products_quantity_order_max' => 0,
		'products_sort_order ' => 0,
		'products_discount_type' => 0,
		'products_discount_type_from' => 0,
		'products_price_sorter' => 0,
		'master_categories_id' => 0,
		'products_mixed_discount_quantity' => 0,
		'metatags_title_status' => 0,
		'metatags_products_name_status' => 0,
		'metatags_model_status' => 0,
		'metatags_price_status' => 0,
		'metatags_title_tagline_status' => 0,
		'language_id' => 0,
		'products_name' => '""',
		'products_description' => '""',
		'products_url' => '""',
		'products_viewed' => 0
	);
	print_r($product_info->recordCount);
	$content = '"' . implode('","', array_keys($product_arr)) . "\"\n";
	//while($row = mysql_fetch_array($product_info->resource)){
	while(!$product_info->EOF){
		//echo $row['products_id']."<br>";
		$row = $product_info->fields;	
		$product_arr['products_id'] = '"' . $row['products_id'] . '"';
		$product_arr['products_type'] = '"' . $row['products_type'] . '"';
		$product_arr['products_quantity'] = '"' . $row['products_quantity'] . '"';
		$product_arr['products_model'] = '"' . $row['products_model'] . '"';
		$product_arr['products_image'] = '"' . $row['products_image'] . '"';
		$product_arr['products_price'] = '"' . $row['products_price'] . '"';
		$product_arr['products_virtual'] = '"' . $row['products_virtual'] . '"';
		$product_arr['products_date_added'] = '"' . $row['products_date_added'] . '"';
		$product_arr['products_last_modified'] = '"' . $row['products_last_modified'] . '"';
		$product_arr['products_date_available'] = '"' . $row['products_date_available'] . '"';
		$product_arr['products_weight'] = '"' . $row['products_weight'] . '"';
		$product_arr['products_status'] = '"' . $row['products_status'] . '"';
		$product_arr['products_tax_class_id'] = '"' . $row['products_tax_class_id'] . '"';
		$product_arr['manufacturers_id'] = '"' . $row['manufacturers_id'] . '"';
		$product_arr['products_ordered'] = '"' . $row['products_ordered'] . '"';
		$product_arr['products_quantity_order_min'] = '"' . $row['products_quantity_order_min'] . '"';
		$product_arr['products_quantity_order_units'] = '"' . $row['products_quantity_order_units'] . '"';
		$product_arr['products_priced_by_attribute'] = '"' . $row['products_priced_by_attribute'] . '"';
		$product_arr['product_is_free '] = '"' . $row['product_is_free '] . '"';
		$product_arr['product_is_call'] = '"' . $row['product_is_call'] . '"';
		$product_arr['products_quantity_mixed'] = '"' . $row['products_quantity_mixed'] . '"';
		$product_arr['product_is_always_free_shipping'] = '"' . $row['product_is_always_free_shipping'] . '"';
		$product_arr['products_qty_box_status'] = '"' . $row['products_qty_box_status'] . '"';
		$product_arr['products_quantity_order_max'] = '"' . $row['products_quantity_order_max'] . '"';
		$product_arr['products_sort_order '] = '"' . $row['products_sort_order '] . '"';
		$product_arr['products_discount_type'] = '"' . $row['products_discount_type'] . '"';
		$product_arr['products_discount_type_from'] = '"' . $row['products_discount_type_from'] . '"';
		$product_arr['products_price_sorter'] = '"' . $row['products_price_sorter'] . '"';
		$product_arr['master_categories_id'] = '"' . $row['master_categories_id'] . '"';
		$product_arr['products_mixed_discount_quantity'] = '"' . $row['products_mixed_discount_quantity'] . '"';
		$product_arr['metatags_title_status'] = '"' . $row['metatags_title_status'] . '"';
		$product_arr['metatags_products_name_status'] = '"' . $row['metatags_products_name_status'] . '"';
		$product_arr['metatags_model_status'] = '"' . $row['metatags_model_status'] . '"';
		$product_arr['metatags_price_status'] = '"' . $row['metatags_price_status'] . '"';
		$product_arr['metatags_title_tagline_status'] = '"' . $row['metatags_title_tagline_status'] . '"';
		$product_arr['language_id'] = '"' . $row['language_id'] . '"';
		$product_arr['products_name'] = '"' . str_replace($replace_foundarr,$replace_arr,"{$row['products_name']}") . '"';
		$product_arr['products_description'] = '"' . str_replace($replace_foundarr,$replace_arr,"{$row['products_description']}") . '"';
		$product_arr['products_url'] = '"' . $row['products_url'] . '"';
		$product_arr['products_viewed'] = '"' . $row['products_viewed'] . '"';

		$content .= implode(",", $product_arr) . "\n";
		
		/* 压缩图片 */
		$img = explode(",", $row['products_image']);
		if(is_array($img)){
			foreach($img as $item){
				if (!empty($item) && is_file(DIR_FS_CATALOG . DIR_WS_IMAGES . $item))
				{
					$zip->add_file(file_get_contents(DIR_FS_CATALOG . DIR_WS_IMAGES . $item), $item);
				}
			}
		}
		$product_info->MoveNext();
	}
	//print_r($content);exit;
	$charset = empty($charset) ? 'utf-8' : trim($charset);
	$content = iconv('utf-8', $charset, $content);
    $zip->add_file($content, $filename.'.csv');

    header("Content-Disposition: attachment; filename=". $filename .".zip");
    header("Content-Type: application/unknown");
    die($zip->file());
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
            <form method="post" action="" onSubmit="return chckform(this)">
                <tr>
                	<td class="txtright">导出文件名称：</td>
                    <td><input type="text" name="filename"></td>
                </tr>
                <tr>
                	<td class="txtright">编码格式：</td>
                    <td><select name="charset">
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
<script type="text/javascript">
function chckform(fm){
	if(fm.filename.value == ''){
		alert('请输入导出的文件名');
		return false;
	}
	return true;
}
</script>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>