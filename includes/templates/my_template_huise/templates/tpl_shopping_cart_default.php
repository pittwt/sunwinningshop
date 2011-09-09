<?php echo zen_draw_form('cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product', $request_type)); ?>
<div class="shop_car">
    <div class="car_tit"><span class="car_list cart_special"><a href="###">Your Shopping Cart Contents</a></span><span class="car_list"><a href="###">Shipping and Payment Confirmation</a></span><span class="car_last"><a href="###">Order Confirmation</a></span></div>
    
    <?php if (!empty($totalsDisplay_data)) { ?>
    <div class="statistics"><span>Total Items:</span><var><?=$totalsDisplay_data['count_contents']?></var><span>Weight:</span><var><?=$totalsDisplay_data['shipping_weight']?></var><span>Amount:</span><var><?=$totalsDisplay_data['show_total']?></var></div>
    <?php } ?>  
    
    <ul class="cart_ul_one">
        <li class="pro_num">Qty</li>
        <li class="pro_name">Item Name</li>
        <li class="pro_unit">Unit</li>
        <li class="pro_tot">Total</li>
    </ul>
    <?php
    foreach ($productArray as $product) {
    ?>
    <ul class="cart_ul_two">	
        <li class="pro_num">
        <!-- quantity field start -->
		<?php
        if ($product['flagShowFixedQuantity']) {
			echo $product['showFixedQuantityAmount'];
        } else {
			echo $product['quantityField'];
        }
        ?>                                
        <!-- quantity field end -->
        <!-- button Update start -->
        <?php
        if ($product['buttonUpdate'] == '') {
			echo '' ;
        } else {
			echo $product['buttonUpdate'];
        }
        ?>								
        <!-- button Update end -->
       </li>
        <li class="pro_name">
       
			<a href="<?php echo $product['linkProductsName']; ?>"><?php echo $product['productsImage']; ?></a>
			<a href="<?php echo $product['linkProductsName']; ?>"><?php echo $product['productsName'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>'; ?></a>
			<?php
              echo $product['attributeHiddenField'];
              if (isset($product['attributes']) && is_array($product['attributes'])) {
                reset($product['attributes']);
                foreach ($product['attributes'] as $option => $value) {
            ?>
			<?php echo "(".$value['products_options_name'] . TEXT_OPTION_DIVIDER . nl2br($value['products_options_values_name']).")"; ?>          
            <?php
                }
              }
            ?>
       </li>
        <li class="pro_unit"><?php echo $product['productsPriceEach']; ?></li>
        <li class="pro_tot">
        	<span><?php echo $product['productsPrice']; ?></span>
            <!--<a class="num_tot" href="###"><img src="images/shuaxin2.gif" alt="tp"/><input class="num_check" type="checkbox" value=""/></a>-->
			<?php
              if ($product['buttonDelete']) {
            ?>
                       <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, 'action=remove_product&product_id=' . $product['id']); ?>"><?php echo zen_image($template->get_template_dir(ICON_IMAGE_TRASH, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_TRASH, ICON_TRASH_ALT); ?></a>
            <?php
              }
              if ($product['checkBoxDelete'] ) {
                echo zen_draw_checkbox_field('cart_delete[]', $product['id']);
              }
            ?>
        </li>
    </ul>
    
    <?php
    } // end foreach ($productArray as $product)
    ?>                       
    <ul class="cart_ul_one">
        <li class="cart_total">Sub-Total:<em><?php echo $cartShowTotal; ?></em></li>
    </ul>
    <div class="cart_inf">
    	<span class="cart_inf_lf">
        	<a href="/" class="cart_back">Back to shopping</a>
            <?php echo '<a class="cart_est" href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_SHIPPING_ESTIMATOR) . '\')">Estimate shipping</a>'; ?>
         </span>
         <span class="cart_inf_rg">
            <?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '"  class="cart_back">Go to checkout</a>'; ?>
         </span>
    </div>
</div>
</form>                