<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_header = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $
 */
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message']);
} else {

}
?>
<div class="head">
    <div class="hd_two">
        <div class="logo"><a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/logo.jpg" alt="图片"/></a></div>
        <div class="two_center">
            <div class="search"><form><input class="text" type="text"/><input class="sub" type="submit" value="" id="search_sub"/></form></div>
            <span><var style="font-weight:bold;">Search by:</var><a class="a_color" href="###">Size,</a><a href="###" class="a_color">Narrow Shoes,</a><a href="###" class="a_color">Wide Shoes,</a><a href="###" class="a_color">Popular Searches</a></span>
        </div>
        <div class="hd_pic">
        	<a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/days.jpg" alt="图片"/></a>
            <a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/free.jpg" alt="图片"/></a>
        </div>
    </div>
                                                                    <!-- nav -->
    <div class="hd_nav">
        <div class="nav_left"><a href="###">HOME</a></div>
        <ul class="nav">
            <li class="nav_li">
                <a href="###" class="nav_a">fenlei1</a>
                <div class="li_one">
                    <ol class="nav_one">
                        <li><a href="###">Wholesale NHL Jerseys</a></li>
                        <li><a href="###">Wholesale NHL Jerseys</a></li>
                    </ol>
                </div>
            </li>
            <li class="nav_li">
                <a href="###" class="nav_a">New Products</a>
                <div class="li_one li_two">
                    <div class="li_bot">
                        <ol class="nav_one">
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                        </ol>
                    </div>
                </div>
            </li>
            <li class="nav_li">
                <a href="###" class="nav_a">fenlei1</a>
                <div class="li_one li_thr">
                    <div class="li_bot">
                        <ol class="nav_one">
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                        </ol>
                    </div>
                </div>
            </li>
            <li class="nav_li">
                <a href="###" class="nav_a">Blog</a>
                <div class="li_one li_for">
                    <div class="li_bot">
                        <ol class="nav_one">
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                        </ol>
                    </div>
                </div>
            </li>
            <li class="nav_li">
                <a href="###" class="nav_a">fenlei4</a>
                <div class="li_one li_fiv">
                    <div class="li_bot">
                        <ol class="nav_one">
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                            <li><a href="###">Wholesale NHL Jerseys</a></li>
                        </ol>
                    </div>
                </div>
            </li>
            <li class="nav_li"><a href="###" class="nav_a">fenlei4</a></li>
            <li class="nav_li"><a href="###" class="nav_a">fenlei4</a></li>
        </ul>
        <div class="nav_right"><a href="javascript:;" id="strike">ALL CATEGORIES</a></div>
    </div>
    <div class="cate_list" id="memu">
        <ul>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
            <li><a href="###">Wholesale NHL Jerseys</a></li>
        </ul>
    </div>


    <div class="hd_for">
        <span class="cart_left">Search　Search by:<a class="a_color" href="###">Size,</a><a href="###" class="a_color">Narrow Shoes,</a><a href="###" class="a_color">Wide Shoes,</a><a href="###" class="a_color">Popular Searches</a></span>
        <a href="###" class="cart">Shopping Cart</a>
    </div>
</div>




<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

<div id="headerWrapper">
<!--bof-navigation display-->
<div id="navMainWrapper">
<div id="navMain">
    <ul class="back">
    <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
<?php if ($_SESSION['customer_id']) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
<?php } } ?>

<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></li>
<?php }?>
</ul>
</div>
<div id="navMainSearch"><?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?></div>
<br class="clearBoth" />
</div>
<!--eof-navigation display-->

<!--bof-branding display-->
<div id="logoWrapper">
    <div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?></div>
<?php if (HEADER_SALES_TEXT != '' || (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2))) { ?>
    <div id="taglineWrapper">
<?php
              if (HEADER_SALES_TEXT != '') {
?>
      <div id="tagline"><?php echo HEADER_SALES_TEXT;?></div>
<?php
              }
?>
<?php
              if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
<?php
                }
              }
?>
    </div>
<?php } // no HEADER_SALES_TEXT or SHOW_BANNERS_GROUP_SET2 ?>
</div>
<br class="clearBoth" />
<!--eof-branding display-->

<!--eof-header logo and navigation display-->

<!--bof-optional categories tabs navigation display-->
<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
<!--eof-optional categories tabs navigation display-->

<!--bof-header ezpage links-->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!--eof-header ezpage links-->
</div>
<?php } ?>