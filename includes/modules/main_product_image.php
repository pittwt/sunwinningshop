<?php
/**
 * main_product_image module
 *
 * @package templateSystem
 * @copyright Copyright 2005-2006 breakmyzencart.com
 * @copyright Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: main_product_image.php,v 1.2 2006/04/11 22:00:55 tim Exp $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
$imgsrcs_s = array();
$imgsrcs_v = array();
$imgsrcs_l = array();

//多图处理
if (is_int ( strpos ( $products_image, ',' ) )) {
	$imgsrcs = split ( ',', $products_image );
	$imgsrcs_image_extension = array();
	for($i = 0; $i < count ( $imgsrcs ); $i ++) {
		$imgsrcs_image_extension[$i] = substr($imgsrcs[$i], strrpos($imgsrcs[$i], '.'));
		if(substr($imgsrcs[$i],0,1)=='/'){
			$imgsrcs[$i]=substr($imgsrcs[$i],1);
		}
		$imgsrcs_s[$i] = DIR_WS_IMAGES . substr_replace(substr($imgsrcs[$i], 0, strrpos($imgsrcs[$i], '.')),'s/',0,2) . $imgsrcs_image_extension[$i];
		$imgsrcs_v[$i] = DIR_WS_IMAGES . substr_replace(substr($imgsrcs[$i], 0, strrpos($imgsrcs[$i], '.')),'v/',0,2) . $imgsrcs_image_extension[$i];
		$imgsrcs_l[$i] = DIR_WS_IMAGES . substr_replace(substr($imgsrcs[$i], 0, strrpos($imgsrcs[$i], '.')),'l/',0,2) . $imgsrcs_image_extension[$i];
	}
} else {
	$products_image_extension[0] = substr($products_image, strrpos($products_image, '.'));
	$imgsrcs_s[0] = DIR_WS_IMAGES . substr_replace(substr($products_image, 0, strrpos($products_image, '.')),'s/',0,2) . $products_image_extension[0];
	$imgsrcs_v[0] = DIR_WS_IMAGES . substr_replace(substr($products_image, 0, strrpos($products_image, '.')),'v/',0,2) . $products_image_extension[0];
	$imgsrcs_l[0] = DIR_WS_IMAGES . substr_replace(substr($products_image, 0, strrpos($products_image, '.')),'l/',0,2) . $products_image_extension[0];

}

//var_dump($imgsrcs_s, $imgsrcs_v, $imgsrcs_l);
  /*
    echo
    'Base ' . $imgsrcs_s . '<br>' .
    'Large ' . $imgsrcs_v . '<br><br>' .
    'Medium ' . $imgsrcs_l . '<br><br>';
  */
// to be built into a single variable string