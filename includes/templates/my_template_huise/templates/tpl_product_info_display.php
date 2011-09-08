<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 16242 2010-05-08 16:05:40Z ajeh $
 */
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<?php
	require(DIR_WS_MODULES . zen_get_module_directory('sam_product_images.php'));
?>

<div class="mav_jersey">
    <div class="jersey_pro">
        <div class="jersey_pic">
		<?
        if(count($images_array_contain_all)>0){
        ?>
            <div class="div_one">
                <div class="top_one" ><img id="top_pic" src="/<?php echo $images_array_contain_all[0];?>" alt=""/></div>
                <div class="bottom_one">
                    <input type="button" value="<" id="lf_one"/>
                    <div class="out_one" id="father_one">
                        <table class="main_one" id="two" cellspacing=5 cellpadding=0>
                            <tr>
							<?
							for($i=0;$i<count($images_array_contain_all);$i++){
								if($i == 0){
									echo '<td><a href="javascript:;"><img class="special_img" src="/'.$images_array_contain_all[$i].'" alt=""/></a></td>';
								}else{
									echo '<td><a href="javascript:;"><img src="/'.$images_array_contain_all[$i].'" alt=""/></a></td>';
								}
							}
							?>
                            </tr>
                        </table>
                    </div>
                    <input type="button" value=">" id="rig_one"/>
                </div>
                <div class="share">
                	<span class="share_span">share:</span>                        
                    <!--<a class="addthis_button_preferred_1" class="share_link"></a>
                    <a class="addthis_button_preferred_2" class="share_link"></a>
                    <a class="addthis_button_preferred_3" class="share_link"></a>
                    <a class="addthis_button_preferred_4" class="share_link"></a>
                    <a class="addthis_button_compact" class="share_link"></a>
                    <a class="addthis_counter addthis_bubble_style" class="share_link"></a>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e40fdac6104affb"></script>      -->          
                </div>
            </div>
		<?
        }
        ?>
        </div>
        <!--bof Form start-->
        <?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product', $request_type), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
        <!--eof Form start-->
        <div class="jersey_rg">
        	<span class="pro_num"><? if($flag_show_product_info_model == 1 and $products_model !=''){echo $products_model;}?></span>
            <p class="jer_pro_inf"><?php echo $products_name; ?></p>
            <!--bof Product Price block -->
			<?php $price_info_sam = zen_get_products_display_price_content((int)$_GET['products_id']);?>
            <span class="jer_price"><var><?=$price_info_sam['normal_price']?></var><em><?=$price_info_sam['special_price']?></em></span> 
            <span class="jer_save_price"><?=$price_info_sam['sale_discount']?></span>
            <!--eof Product Price block -->
            <!--bof Attributes Module -->
            <span class="jer_size">
            
            <?php
			if ($pr_attr->fields['total'] > 0) {require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); 
			 }
            ?>
            </span>
            <!--eof Attributes Module -->
            <!--bof Add to Cart Box -->
			<?php
            if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
              // do nothing
            } else {
            
                $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
				if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
				  // hide the quantity box and default to 1
				  $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
				} else {
				  // show the quantity box
		$the_button = "Quantity:" . '<input type="text"  name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '<br />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']).'<input type="image" title=" Add to Cart " alt="Add to Cart"  src="'.DIR_WS_TEMPLATE.'images/add2cart.gif" />';
				}
                $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
				if ($display_qty != '' or $display_button != '') { 
					echo $display_qty;
					echo $the_button;
				} 
			}
			?>
            <!--eof Add to Cart Box-->
            <!--<a href="###" class="jer_cart">Add this to my cart</a>-->
            <div class="jer_free">&nbsp;</div>
        </div>
        </form>
    </div>
    <div class="pro_information">
        <ol class="pro_infor_tit">
            <li class="li_change"><a href="javascript:;">Product Description</a></li>
            <li><a href="javascript:;">Reviews</a></li>
            <li><a href="javascript:;">Payment &amp; Shipping</a></li>
            <li class="inf_last"><a href="javascript:;">After-sales srrvice</a></li>
        </ol>
        <div class="pro_inf_con">
            <div class="pro_infor_con pro_infor_block">
            <!--bof Product description -->
			<?php if ($products_description != '') { ?>
            <p class="infor_p"><?php echo stripslashes($products_description); ?></p>
            <?php } ?>
            <!--eof Product description -->
            </div>
            <div class="pro_infor_con">
                <p class="infor_p">Wholesale Jerseys online,Wlecome For Wholesale,Retail and Dropship Orders,We are glad to provide high quality 100% stitched(not printed) authentic Jersey.This replica authentic jersey is craffed just like Authentic jerseys width oddical team color and logo.It feayures durabe,quick-drying fabric slightly heavier than other Washington Redskins Jerseys.All graphics are sewn-on.The jersey is designed width the team nam stitched on the chest and full-button front.The player's nam is stitched at the upper back in authentic-like font and the team specific jocktag is stitched on tail.</p>
                <!-- <p class="infor_p">Model:JS5142</p> -->
                <p class="infor_p">200 Units in Stock</p>
            </div>
            <div class="pro_infor_con">
                <p class="infor_p">Model:JS5142</p>
                <p class="infor_p">200 Units in Stock</p>
            </div>
            <div class="pro_infor_con">
                <p class="infor_p">200 Units in Stock</p>
            </div>
        </div>
    </div>
	<script type="text/javascript">
        (function($){
            $(document).ready(function(){
                $(".pro_infor_tit li").click(function(){
                    $(this).addClass("li_change").siblings().removeClass("li_change");;
                    $($(".pro_inf_con .pro_infor_con")[$(".pro_infor_tit li").index(this)]).show().siblings().hide();
                })
            })
        })(jQuery);
    </script>
    <?
    if(count($images_array_contain_all)>0){
    ?>
    <div class="tanchu" id="tanchu" >
        <div class="top"><img id="change" src="/<?php echo $images_array_contain_all[0];?>" alt=""/></div>
        <div class="bottom_two">
            <input type="button" value="<" id="lf"/>
            <div class="out" id="father">
                <table class="main" id="one" cellspacing=0 cellpadding=0>
                    <tr>
					<?
                    for($i=0;$i<count($images_array_contain_all);$i++){
                        if($i == 0){
                            echo '<td><img class="special" src="/'.$images_array_contain_all[$i].'" alt=""/></td>';
                        }else{
                            echo '<td><img src="/'.$images_array_contain_all[$i].'" alt=""/></td>';
                        }
                    }
                    ?>
                    </tr>
                </table>
            </div>
            <input type="button" value=">" id="rig"/>
        </div>
        <div class="close" id="close">Close</div>
    </div>
    <?
    }
    ?>
    <div id="mask">&nbsp;</div>
    <script type="text/javascript" src="<?php echo DIR_WS_TEMPLATE;?>jscript/xiangce.js"></script>
    <?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
    <?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
</div>