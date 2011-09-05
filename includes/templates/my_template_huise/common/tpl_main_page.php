<?php
/**
 * Common Template - tpl_main_page.php
 *
 * Governs the overall layout of an entire page<br />
 * Normally consisting of a header, left side column. center column. right side column and footer<br />
 * For customizing, this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * - make a directory /templates/my_template/privacy<br />
 * - copy /templates/templates_defaults/common/tpl_main_page.php to /templates/my_template/privacy/tpl_main_page.php<br />
 * <br />
 * to override the global settings and turn off columns un-comment the lines below for the correct column to turn off<br />
 * to turn off the header and/or footer uncomment the lines below<br />
 * Note: header can be disabled in the tpl_header.php<br />
 * Note: footer can be disabled in the tpl_footer.php<br />
 * <br />
 * $flag_disable_header = true;<br />
 * $flag_disable_left = true;<br />
 * $flag_disable_right = true;<br />
 * $flag_disable_footer = true;<br />
 * <br />
 * // example to not display right column on main page when Always Show Categories is OFF<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 * <br />
 * example to not display right column on main page when Always Show Categories is ON and set to categories_id 3<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '' or $cPath == '3') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_main_page.php 7085 2007-09-22 04:56:31Z ajeh $
 */

// the following IF statement can be duplicated/modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'list_pages_to_skip_all_right_sideboxes_on_here,separated_by_commas,and_no_spaces')) ) {
    $flag_disable_right = true;
  }


  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
?>
<body>
<div class="hd_long">
	<div class="hd_one">
		<div class="one_left">We offer <em class="hd_color">20$ off</em>,7*24h Service for you,free shipping</div>
			<!-- AddThis Button BEGIN -->
			<!-- <div class="addthis_toolbox addthis_default_style " style="float:right;width:138px;margin-top:8px;">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
			</div>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e40fdac6104affb"></script> -->
			<!-- AddThis Button END -->
			<div class="one_center">Welcome.
 Please <a href="###" class="hd_create_color">create an account</a> or <a href="###" class="hd_color">Sign in</a>.<a class="account" href="###">My Account</a><a class="account" href="###">Track Your Order</a><a href="###" class="account">Blog</a> </div>
		</div>
	</div>
    
<div class="home">
    <?php
     /**
      * prepares and displays header output
      *
      */
      if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
        $flag_disable_header = true;
      }
      require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>
    <div class="conment">
		<div class="con_left">
    <?php
    if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
      // global disable of column_left
      $flag_disable_left = true;
    }
    if (!isset($flag_disable_left) || !$flag_disable_left) {
    ?>

    <?php
     /**
      * prepares and displays left column sideboxes
      *
      */
    ?>
    <?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?>
    <?php
    }
    ?>
	</div>
    
    <div class="con_center">
    <!-- bof  breadcrumb -->
    <?php if (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page) ) { ?>
        <div id="navBreadCrumb"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div>
    <?php } ?>
    <!-- eof breadcrumb -->
    
   
    <!-- bof upload alerts -->
    <?php if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); ?>
    <!-- eof upload alerts -->
    
    <?php
     /**
      * prepares and displays center column
      *
      */
     require($body_code); ?>
    

    </div>
    <?php
     /**
      * prepares and displays footer output
      *
      */
      if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
        $flag_disable_footer = true;
      }
      require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
    ?>
    
    </div>


</div>
</body>