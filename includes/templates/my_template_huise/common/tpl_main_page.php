<?php
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
            Please <a href="###" class="hd_create_color">create an account</a> or <a href="###" class="hd_color">Sign in</a>.<a class="account" href="###">My Account</a><a class="account" href="###">Track Your Order</a><a href="/blog" class="account">Blog</a> </div>
        </div>
    </div>
    <div class="home">
        <?php require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>
        <div class="conment">
        	<div class="con_left">
            	<?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?>
            </div>
            <div class="con_center">
            	<?php require($body_code); ?>
			</div>
        </div>
        <?php require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php'); ?>
    </div>
</body>