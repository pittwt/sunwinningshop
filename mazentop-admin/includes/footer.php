<?php
/**
 * @package admin
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: footer.php 14876 2009-11-21 05:18:06Z drbyte $
 */

// check and display zen cart version and history version in footer
  $current_sinfo = PROJECT_VERSION_NAME . ' v' . PROJECT_VERSION_MAJOR . '.' . PROJECT_VERSION_MINOR . '/';
  $check_hist_query = "SELECT * from " . TABLE_PROJECT_VERSION . " WHERE project_version_key = 'Zen-Cart Database' ORDER BY project_version_date_applied DESC LIMIT 1";
  $check_hist_details = $db->Execute($check_hist_query);
  if (!$check_hist_details->EOF) {
    $current_sinfo .=  'v' . $check_hist_details->fields['project_version_major'] . '.' . $check_hist_details->fields['project_version_minor'];
    if (zen_not_null($check_hist_details->fields['project_version_patch1'])) $current_sinfo .= '&nbsp;&nbsp;Patch: ' . $check_hist_details->fields['project_version_patch1'];
  }
?>
<table border="0" width="100%" cellspacing="10" cellpadding="10">
  <tr>
    <td align="center" class="smallText" height="100" valign="bottom">
    <div style="height:30px; width:100%; clear:both;"></div>
<?php 
/*$file_buttom_title=$url_string_connection.'cart'.'_BV.jpg';

if(@file_exists(DIR_WS_IMAGES .$file_buttom_title)){
echo '<a target="_blank" href="http://www.'.$url_string_connection.'-cart.cn/"><img border="0" src="'.DIR_WS_IMAGES .$file_buttom_title.'"></a>';
}else{
if(!empty($file_string[2])){
	 echo $file_string[2];	
	}
}
	
	*/?> <div style="height:20px; width:100px; clear:both;"></div>
    <br /><br />版权所有 &copy; 2003-<?php echo date('Y'); ?> <a href="" target="_blank">Zen Cart中文版</a><br /><?php echo '<a href="' . zen_href_link(FILENAME_SERVER_INFO) . '">' . $current_sinfo . '</a>'; ?></td>
  </tr>
</table>
