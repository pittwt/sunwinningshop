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
        <div class="logo"><a href="<?php echo HTTP_SERVER . DIR_WS_CATALOG;?>"><img src="<?php echo DIR_WS_TEMPLATE;?>images/logo.jpg" alt="<?php echo HTTP_SERVER . DIR_WS_CATALOG;?>"/></a></div>
        <div class="two_center">
            <div class="search">
                <form action="index.php?main_page=advanced_search_result" method="get" name="quick_find_header">
                    <input type="hidden" value="advanced_search_result" name="main_page">
                    <input type="hidden" value="1" name="search_in_description">
                    <input class="text" name="keyword" type="text"  value="<?php //echo HEADER_SEARCH_DEFAULT_TEXT;?>" onFocus="if (this.value == '<?php //echo HEADER_SEARCH_DEFAULT_TEXT;?>') this.value ='';" onBlur="if (this.value == '') this.value = '<?php //echo HEADER_SEARCH_DEFAULT_TEXT;?>';" />
                    <input id="search_sub" class="sub" type="submit" value="" />
                </form>
            </div>
            <span><var style="font-weight:bold;">Hot Tags:</var><a class="a_color" href="###">Size,</a><a href="###" class="a_color">Narrow Shoes,</a><a href="###" class="a_color">Wide Shoes,</a><a href="###" class="a_color">Popular Searches</a></span>
        </div>
        <div class="hd_pic">
        	<img src="<?php echo DIR_WS_TEMPLATE;?>images/days.jpg" alt=""/>&nbsp;&nbsp;
            <img src="<?php echo DIR_WS_TEMPLATE;?>images/free.jpg" alt=""/>
        </div>
    </div>
                                                                    <!-- nav -->
    <div class="hd_nav">
        <div class="nav_left"><a href="<?php echo HTTP_SERVER . DIR_WS_CATALOG;?>">HOME</a></div>
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
        <!--<a href="###" class="cart">Shopping Cart</a>-->
        <span class="span_cart">
    		<?php require($template->get_template_dir('tpl_shopping_cart_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_shopping_cart_header.php'); 
				echo $content;?>
			<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
				&nbsp;| <a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a>
			<?php }?>
         </span>
    </div>
</div>
