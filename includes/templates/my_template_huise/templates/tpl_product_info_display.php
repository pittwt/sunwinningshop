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
		$the_button = '<span class="jer_size"><label>Quantity:</label>' . '<input type="text"  name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '</span><br/>' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']).'<input type="image" title=" Add to Cart " alt="Add to Cart"  src="'.DIR_WS_TEMPLATE.'images/add2cart.gif" />';
				}
                $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
				//echo $the_button;
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
<!--==============================-->

<?php
if ($reviews_split->number_of_rows > 0) {
	if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>
<?php //echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?>
<?php //echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'main_page'))); ?>
<?php
	}
?>

<?php
	foreach ($reviewsArray as $reviews) {
?>
<p class="infor_p">
<?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews['reviewsRating'] . '.gif', sprintf("", $reviews['reviewsRating'])), sprintf("", $reviews['reviewsRating']); ?>
</p>
<p class="infor_p">
<?php echo sprintf(TEXT_REVIEW_DATE_ADDED, zen_date_short($reviews['dateAdded'])); ?>,
<?php echo sprintf(TEXT_REVIEW_BY, zen_output_string_protected($reviews['customersName'])); ?>
<?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . (int)$_GET['products_id'] . '&reviews_id=' . $reviews['id']) . '"></a>'; ?>
</p>
<p class="infor_p"><?php echo zen_break_string(zen_output_string_protected(stripslashes($reviews['reviewsText'])), 60, '-<br />') . ((strlen($reviews['reviewsText']) >= 100) ? '...' : ''); ?></p>
<hr style="border:none;border-top:1px solid #408fcc;
height:0;
" />
<?php
    }
?>
<?php
} else {
?>

<p class="infor_p"><?php echo TEXT_NO_REVIEWS . (REVIEWS_APPROVAL == '1' ? '': ''); ?></p>
<?php
}
if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<?php
}
?>
<!--==============================-->
<?php echo zen_draw_form('product_reviews_write', zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $_GET['products_id'], 'SSL'), 'post', 'onsubmit="return checkForm(product_reviews_write);"'); ?>
<p class="infor_p"><font style="font-size:13px; font-weight:bold;">Choose a ranking for this item. 1 star is the worst and 5 stars is the best.</font></p>
<p class="infor_p">
	<?php echo zen_draw_radio_field('rating', '1', '', 'id="rating-1"'); ?>
    <?php echo '<label class="" for="rating-1">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, OTHER_REVIEWS_RATING_STARS_ONE_ALT) . '</label> '; ?>
    
    <?php echo zen_draw_radio_field('rating', '2', '', 'id="rating-2"'); ?>
    <?php echo '<label class="" for="rating-2">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, OTHER_REVIEWS_RATING_STARS_TWO_ALT) . '</label>'; ?>
    
    <?php echo zen_draw_radio_field('rating', '3', '', 'id="rating-3"'); ?>
    <?php echo '<label class="" for="rating-3">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, OTHER_REVIEWS_RATING_STARS_THREE_ALT) . '</label>'; ?>
    
    <?php echo zen_draw_radio_field('rating', '4', '', 'id="rating-4"'); ?>
    <?php echo '<label class="" for="rating-4">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, OTHER_REVIEWS_RATING_STARS_FOUR_ALT) . '</label>'; ?>
    
    <?php echo zen_draw_radio_field('rating', '5', '', 'id="rating-5"'); ?>
    <?php echo '<label class="" for="rating-5">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, OTHER_REVIEWS_RATING_STARS_FIVE_ALT) . '</label>'; ?>
</p>
<p class="infor_p"><font style="font-size:13px; font-weight:bold;">Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.</font></p>
<p class="infor_p"><?php echo zen_draw_textarea_field('review_text', 60, 5, '', 'id="review-text"'); ?></p>
<p class="infor_p"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?></p>
</form>
<p class="infor_p"><font style="font-size:12px; font-weight:bold;">NOTE: Reviews require prior approval before they will be displayed</font></p>
<!--==============================-->
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
        <div class="close" id="close"></div>
    </div>
    <?
    }
    ?>
    <div id="mask">&nbsp;</div>
    <script type="text/javascript" src="<?php echo DIR_WS_TEMPLATE;?>jscript/xiangce.js"></script>
    <?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
    <?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
</div>