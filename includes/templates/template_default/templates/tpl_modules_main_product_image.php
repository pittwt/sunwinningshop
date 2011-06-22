<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_main_product_image.php 3208 2006-03-19 16:48:57Z birdbrain $
 */
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); ?>

<link rel="stylesheet" href="style/jqzoom.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/jqzoomimages.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.jqzoom.min.js"></script>
<script type="text/javascript" src="js/jquery.jqzoomimages.js"></script>

<script type="text/javascript">

$(document).ready(function(){
$(".jqzoom").jqueryzoom({
	xzoom: 282, //zooming div default width(default width value is 200)
	yzoom: 282, //zooming div default width(default height value is 200)
	offset: 5, //zooming div default offset(default offset value is 10)
	position: "right", //zooming div position(default position value is "right")
	preload:1,
	lens:1
});

$("#jqzoomimages").jqzoomimages({
	sImgList: ["<?php echo implode('","', $imgsrcs_s);?>"],
	lImgList: ["<?php echo implode('","', $imgsrcs_l);?>"],
	vImgList: ["<?php echo implode('","', $imgsrcs_v);?>"],
	pageNo: 1,
	pagesize: 4,
	imgWidth: 55,
	imgHeight: 55,
	bigImageId: "jqzoomimg"
});




});
</script>

<div id="productMainImage" class="centeredContent back">
<?php
//放大镜图片
?>
<div class="jqzoom"><img src="<?php echo $imgsrcs_l[0];?>"  alt="<?php echo addslashes($products_name);?>"  jqimg="<?php echo $imgsrcs_v[0];?>" id="jqzoomimg"></div>
<div style="clear:both;"></div>
<?php
//小图列表
?>
<div id='jqzoomimages' class="smallimages"></div>


<noscript>
<?php
  //echo '<a href="' . zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']) . '" target="_blank">' . zen_image($products_image_medium, $products_name, MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT) . '<br /><span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span></a>';
?>
</noscript>
</div>