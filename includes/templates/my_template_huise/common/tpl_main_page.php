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
            	<?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); 
				echo DIR_WS_MODULES . zen_get_module_directory('column_left.php');
				?>
            </div>
            <div class="con_center">
            	<?php //require($body_code); ?>
                <div class="con_center">
				<div class="active" id="getout">
					<div class="act_border">
						<table id="mm" cellspacing=0 cellpadding=0>
							<tr>
								<td><a href="###"><img src="images/act_pic.jpg" alt="ͼƬ"/></a></td>
								<td><a href="###"><img src="images/act_pic.jpg" alt="ͼƬ"/></a></td>
								<td><a href="###"><img src="images/act_pic.jpg" alt="ͼƬ"/></a></td>
								<td><a href="###"><img src="images/act_pic.jpg" alt="ͼƬ"/></a></td>
							</tr>
						</table>
						<div id="number" class="number">
							<a class="first"href="###">1</a>
							<a href="###">2</a>
							<a href="###">3</a>
							<a href="###">4</a>
						</div> 
					</div>
				</div>
												<!-- new products-->

				<div class="new_pro">
					<h1 class="h1_tit">New Products</h1>
					<div class="pro_con">
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="new">&nbsp;</dd>
						</dl>
					</div>
				</div>
																		<!-- special product -->
			
				<div class="new_pro">
					<h1 class="h1_tit">Special Products</h1>
					<div class="pro_con">
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
						<dl class="pro_list">
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
						<dl class="pro_list" >
							<dt><a href="###" class="a_pic"><img src="images/pro_pic.jpg" alt="ͼƬ"/></a></dt>
							<dd><a class="pro_inf" href="###">NBA Denver Nuggets 15 Carmelo<br/>Anthony Blue Basketball Jersey</a></dd>
							<dd><var>$156.25</var><em>$50.00</em></dd>
							<dd><span class="pro_inf">Save:68% off</span></dd>
							<dd><a class="cart_one" href="##">Add to cart</a></dd>
							<dd class="special">&nbsp;</dd>
						</dl>
					</div>
				</div>
			</div>
			</div>
        </div>
        <?php require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php'); ?>
    </div>
</body>