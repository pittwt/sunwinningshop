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
									echo '<td><a href="#"><img class="special_img" src="/'.$images_array_contain_all[$i].'" alt=""/></a></td>';
								}else{
									echo '<td><a href="#"><img src="/'.$images_array_contain_all[$i].'" alt=""/></a></td>';
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
            <label>Please Choose:</label>
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
                $the_button = PRODUCTS_ORDER_QTY_TEXT . '<input type="text"  name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '<br />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
                        }
                $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
            ?>
            <!--<a href="###" class="jer_cart">Add this to my cart</a>-->
            <?php if ($display_qty != '' or $display_button != '') { ?>
            <div id="cartAdd">
			<?php
			echo $display_qty;
			echo $display_button;
            ?>
            </div>
            <?php } // display qty and button ?>
            <?php } // CUSTOMERS_APPROVAL == 3 ?>


        
            
            <!--eof Add to Cart Box-->
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
                <p class="infor_p">Wholesale Jerseys online,Wlecome For Wholesale,Retail and Dropship Orders,We are glad to provide high quality 100% stitched(not printed) authentic Jersey.This replica authentic jersey is craffed just like Authentic jerseys width oddical team color and logo.It feayures durabe,quick-drying fabric slightly heavier than other Washington Redskins Jerseys.All graphics are sewn-on.The jersey is designed width the team nam stitched on the chest and full-button front.The player's nam is stitched at the upper back in authentic-like font and the team specific jocktag is stitched on tail.</p>
                <p class="infor_p">Model:JS5142</p>
                <p class="infor_p">200 Units in Stock</p>
            </div>
            <div class="pro_infor_con">
                <p class="infor_p">Wholesale Jerseys online,Wlecome For Wholesale,Retail and Dropship Orders,We are glad to provide high quality 100% stitched(not printed) authentic Jersey.This replica authentic jersey is craffed just like Authentic jerseys width oddical team color and logo.It feayures durabe,quick-drying fabric slightly heavier than other Washington Redskins Jerseys.All graphics are sewn-on.The jersey is designed width the team nam stitched on the chest and full-button front.The player's nam is stitched at the upper back in authentic-like font and the team specific jocktag is stitched on tail.</p>
                <!-- <p class="infor_p">Model:JS5142</p> -->
                <p class="infor_p">200 Units in Stock</p>
            </div>
            <div class="pro_infor_con">
                <!-- <p class="infor_p">Wholesale Jerseys online,Wlecome For Wholesale,Retail and Dropship Orders,We are glad to provide high quality 100% stitched(not printed) authentic Jersey.This replica authentic jersey is craffed just like Authentic jerseys width oddical team color and logo.It feayures durabe,quick-drying fabric slightly heavier than other Washington Redskins Jerseys.All graphics are sewn-on.The jersey is designed width the team nam stitched on the chest and full-button front.The player's nam is stitched at the upper back in authentic-like font and the team specific jocktag is stitched on tail.</p> -->
                <p class="infor_p">Model:JS5142</p>
                <p class="infor_p">200 Units in Stock</p>
            </div>
            <div class="pro_infor_con">
                <p class="infor_p">Wholesale Jerseys online,Wlecome For Wholesale,Retail and Dropship Orders,We are glad to provide high quality 100% stitched(not printed) authentic Jersey.This replica authentic jersey is craffed just like Authentic jerseys width oddical team color and logo.It feayures durabe,quick-drying fabric slightly heavier than other Washington Redskins Jerseys.All graphics are sewn-on.The jersey is designed width the team nam stitched on the chest and full-button front.The player's nam is stitched at the upper back in authentic-like font and the team specific jocktag is stitched on tail.</p>
                <!-- <p class="infor_p">Model:JS5142</p>
							<p class="infor_p">200 Units in Stock</p> -->
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
    <?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
    <?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
</div>


===================================================================
<div class="centerColumn" id="productGeneral">
1111111111111111111111111111111111
    <!--bof Form start-->
    <?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product', $request_type), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
    <!--eof Form start-->
    2222222222222222222222222222222222222
    <!--bof Product Name-->
    <h1 id="productName" class="productGeneral"><?php echo $products_name; ?></h1>
    <!--eof Product Name-->
    3333333333333333333333333333333333333
    <!--bof Product Price block -->
    <h2 id="productPrices" class="productGeneral">
        <?php
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br />';
  } else {
    $one_time = '';
  }
  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
?>
    </h2>
    <!--eof Product Price block -->
    4444444444444444444444444444444444
    <!--bof free ship icon  -->
    <?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
    <div id="freeShippingIcon"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
    <?php } ?>
    <!--eof free ship icon  -->
    555555555555555555555555555555555555555555555
    <!--bof Product description -->
    <?php if ($products_description != '') { ?>
    <div id="productDescription" class="productGeneral biggerText"><?php echo stripslashes($products_description); ?></div>
    <?php } ?>
    <!--eof Product description -->
    <br class="clearBoth" />
    66666666666666666666666666666666666666
    <!--bof Add to Cart Box -->
    <?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
    <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            } else {
              // show the quantity box
    $the_button = PRODUCTS_ORDER_QTY_TEXT . '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '<br />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            }
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
    <?php if ($display_qty != '' or $display_button != '') { ?>
    <div id="cartAdd">
        <?php
      echo $display_qty;
      echo $display_button;
            ?>
    </div>
    <?php } // display qty and button ?>
    <?php } // CUSTOMERS_APPROVAL == 3 ?>
    <!--eof Add to Cart Box-->
    777777777777777777777777777777777777777777777
    <!--bof Product details list  -->
    <?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
    <ul id="productDetailsList" class="floatingBox back">
        <?php echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li>' . TEXT_PRODUCT_MODEL . $products_model . '</li>' : '') . "\n"; ?> <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li>' . TEXT_PRODUCT_WEIGHT .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?> <?php echo (($flag_show_product_info_quantity == 1) ? '<li>' . $products_quantity . TEXT_PRODUCT_QUANTITY . '</li>'  : '') . "\n"; ?> <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
    </ul>
    <br class="clearBoth" />
    <?php
  }
?>
    <!--eof Product details list -->
    8888888888888888888888888888888888888888
    <!--bof Attributes Module -->
    <?php
  if ($pr_attr->fields['total'] > 0) {
?>
    <?php
/**
 * display the product atributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
    <?php
  }
?>
    <!--eof Attributes Module -->
    999999999999999999999999999999999999999
    <!--bof Quantity Discounts table -->
    <?php
  if ($products_discount_type != 0) { ?>
    <?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
    <?php
  }
?>
    <!--eof Quantity Discounts table -->
    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    <!--bof Additional Product Images -->
    <?php
/**
 * display the products additional images
 */
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php'); ?>
    <!--eof Additional Product Images -->
    bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
    <!--bof Prev/Next bottom position -->
    <?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
    <?php
/**
 * display the product previous/next helper
 */
 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
    <?php } ?>
    <!--eof Prev/Next bottom position -->
    ccccccccccccccccccccccccccccccccccccccccccccccccccccccc
    <!--bof Tell a Friend button -->
    <?php
  if ($flag_show_product_info_tell_a_friend == 1) { ?>
    <div id="productTellFriendLink" class="buttonRow forward"><?php echo ($flag_show_product_info_tell_a_friend == 1 ? '<a href="' . zen_href_link(FILENAME_TELL_A_FRIEND, 'products_id=' . $_GET['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_TELLAFRIEND, BUTTON_TELLAFRIEND_ALT) . '</a>' : ''); ?></div>
    <?php
  }
?>
    <!--eof Tell a Friend button -->
    ddddddddddddddddddddddddddddddddddddddddddddddddddd
    <!--bof Reviews button and count-->
    <?php
  if ($flag_show_product_info_reviews == 1) {
    // if more than 0 reviews, then show reviews button; otherwise, show the "write review" button
    if ($reviews->fields['count'] > 0 ) { ?>
    <div id="productReviewLink" class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?></div>
    <br class="clearBoth" />
    <p class="reviewCount"><?php echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?></p>
    <?php } else { ?>
    <div id="productReviewLink" class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?></div>
    <br class="clearBoth" />
    <?php
  }
}
?>
    <!--eof Reviews button and count -->
    eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
    <!--bof Product date added/available-->
    <?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
    <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
    <?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
    <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p>
    <?php
    } // $flag_show_product_info_date_added
  }
?>
    <!--eof Product date added/available -->
    ggggggggggggggggggggggggggggggggggggggggggggggggggggggg
    <!--bof Product URL -->
    <?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
    <p id="productInfoLink" class="productGeneral centeredContent"><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($products_url), 'NONSSL', true, false)); ?></p>
    <?php
    } // $flag_show_product_info_url
  }
?>
    <!--eof Product URL -->
    hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
    <!--bof also purchased products module-->
    <?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
    <!--eof also purchased products module-->
    jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
    <!--bof Form close-->
    </form>
    <!--bof Form close-->
</div>
