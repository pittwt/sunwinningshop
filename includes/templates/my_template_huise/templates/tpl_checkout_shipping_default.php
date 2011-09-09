<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_shipping.<br />
 * Displays allowed shipping modules for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_shipping_default.php 14807 2009-11-13 17:22:47Z drbyte $
 */
?>
<?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>
<div class="shop_car">
    <div class="car_tit"><span class="car_list"><a href="###">Your Shopping Cart Contents</a></span><span class="car_list cart_special"><a href="###">Shipping and Payment Confirmation</a></span><span class="car_last"><a href="###">Order Confirmation</a></span></div>
    <div class="cart_terms"> <strong class="cart_terms_tit">Terms and Conditions</strong>
        <p class="terms_inf">Please acknowledge the terms and conditions bound to this order by ticking the following box.The terms and conditions can be read here.</p>
        <div class="terms_deal">
            <input type="checkbox" value=""/>
            <span>I have read and agreed to the terms and conditions bound to this order.</span></div>
    </div>
    <div class="ship_inf">
        <div class="ship_inf_lf"> <strong class="infor_tit">Shipping Information</strong>
            <ul class="infor_conent">
                <li><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?></li>
            </ul>
        </div>
        <div class="ship_inf_rg"> <span><?php echo '<a href="' . $editShippingButtonLink . '" class="ship_address">' . zen_image_button(BUTTON_IMAGE_CHANGE_ADDRESS, BUTTON_CHANGE_ADDRESS_ALT) . '</a>'; ?></span>
            <p class="ship_word">Your order will be shipped to the address at the left of you may change the shipping address by clicking the Change Address button.</p>
        </div>
    </div>
    <div class="ship_method"> <strong class="infor_tit">Shipping Method:</strong>
        <p class="method_word">This is currently the only shipping method available to use on this order.</p>
        <div class="ship_choose"> <span class="choose_lf"><span class="infor_tit">Free Shipping Options:</span>
            <input type="radio" name="free" value=""/>
            <span class="infor_tit">Free Shipping</span></span><span class="choose_rg">$0.00</span> 
        </div>
        <div class="method_tot"> <span class="infor_tit">Your Toyal</span>
            <dl class="method_dl">
                <dd>Sub-Total:$282.60</dd>
                <dd>Free Shipping Options(Free Shipping):$0.00</dd>
                <dd>Total:$282.60</dd>
            </dl>
        </div>
        <div class="method_tot method_cou"> <span class="infor_tit">Discount Coupon</span>
            <p class="discount_inf">Please type your coupon code into the box next to Redemption Code.Your coupon will be applied to the total and reflected in your cart affter you click continue.</p>
            <p class="discount_note">Please note:you may inly use one coupon order.</p>
            <div class="discount_code"><span class="code_tit">Redemption Code</span>
                <input class="code_text" type="text" value=""/>
            </div>
        </div>
        <div class="method_tot"> <span class="infor_tit">Payment Method</span>
            <div class="shop_pay"> <a href="###"><img src="images/shop_payone.gif" alt="tp"/></a><a href="###"><img src="images/shop_paytwo.gif" alt="tp"/></a><span class="pay_words">ECPSS Pay,emt Gateway</span> </div>
        </div>
        <div class="method_order"> <span class="infor_tit">Special Instructions or Order Comments</span>
            <textarea class="shop_discuss">&nbsp;</textarea>
            <div class="discuss_check"><a href="###" class="check_sp">Go to checkout</a></div>
        </div>
    </div>
</div>
</form>
<!------------------------------>
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
1111111111111111111
    <?php echo HEADING_TITLE; ?>
22222222222 
    <?php if ($messageStack->size('checkout_shipping') > 0) echo $messageStack->output('checkout_shipping'); ?>
  3333333333333333  
    
    <?php echo TITLE_SHIPPING_ADDRESS; ?>
    444444444444444444
    
    
        <?php if ($displayAddressEdit) { ?>
        555555555555555555
        <?php echo '<a href="' . $editShippingButtonLink . '">' . zen_image_button(BUTTON_IMAGE_CHANGE_ADDRESS, BUTTON_CHANGE_ADDRESS_ALT) . '</a>'; ?>
        666666666666666
        <?php } ?>
       6667777777777777777777
       
        <?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?>
        
        8888888888888888888
    
    
    
    <?php echo TEXT_CHOOSE_SHIPPING_DESTINATION; ?>
    99999999999999999999999
    
    
    <?php
  if (zen_count_shipping_modules() > 0) {
?>000000000000000000000000
   
   <?php echo TABLE_HEADING_SHIPPING_METHOD; ?>
   aaaaaaaaaaaaaaaaaa
    <?php
    if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {
?>bbbbbbbbbbbbbbbb
    <?php echo TEXT_CHOOSE_SHIPPING_METHOD; ?>
    cccccccccccccccccccc
    <?php
    } elseif ($free_shipping == false) {
?>
    dddddddddddddddddd
    <?php echo TEXT_ENTER_SHIPPING_INFORMATION; ?>
    eeeeeeeeeeeeeeeeeee
    <?php
    }
?>ffffffffffffffffff
    <?php
    if ($free_shipping == true) {
?>gggggggggggggggggg
    
    <?php echo FREE_SHIPPING_TITLE; ?>&nbsp;<?php echo $quotes[$i]['icon']; ?>
    
    hhhhhhhhhhhhhhhhhhhhhhhhh
    <?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) . zen_draw_hidden_field('shipping', 'free_free'); ?>
    jjjjjjjjjjjjjjjjjjjjjj
    <?php
    } else {
      $radio_buttons = 0;
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
      // bof: field set
// allows FedEx to work comment comment out Standard and Uncomment FedEx
//      if ($quotes[$i]['id'] != '' || $quotes[$i]['module'] != '') { // FedEx
      if ($quotes[$i]['module'] != '') { // Standard
?>
    <fieldset>
        <legend><?php echo $quotes[$i]['module']; ?>&nbsp;
        <?php if (isset($quotes[$i]['icon']) && zen_not_null($quotes[$i]['icon'])) { echo $quotes[$i]['icon']; } ?>
        </legend>
        <?php
        if (isset($quotes[$i]['error'])) {
?>
        <div><?php echo $quotes[$i]['error']; ?></div>
        <?php
        } else {
          for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
// set the radio button to be checked if it is the method chosen
            $checked = (($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $_SESSION['shipping']['id']) ? true : false);

            if ( ($checked == true) || ($n == 1 && $n2 == 1) ) {
              //echo '      <div id="defaultSelected" class="moduleRowSelected">' . "\n";
            //} else {
              //echo '      <div class="moduleRow">' . "\n";
            }
?>
        <?php
            if ( ($n > 1) || ($n2 > 1) ) {
?>
        kkkkkkkkkkkkkkkkkkkkkk
        <?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))); ?>
        
        <?php
            } else {
?>
        lllllllllllllllllllllllll
        <?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])) . zen_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']); ?>
        mmmmmmmmmmmmmmmmmmmmmmmmm
        <?php
            }
?>nnnnnnnnnnnnnnnnnnnnnnnn
        <?php echo zen_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked, 'id="ship-'.$quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']) .'"'); ?>
        <label for="ship-<?php echo $quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']); ?>" class="checkboxLabel" ><?php echo $quotes[$i]['methods'][$j]['title']; ?></label>
        <!--</div>-->
        oooooooooooooooooooooo
        
        <?php
            $radio_buttons++;
          }
        }
?>
    </fieldset>
    <?php
    }
// eof: field set
      }
    }
?>
    <?php
  } else {
?>
    ppppppppppppppp
    <?php echo TITLE_NO_SHIPPING_AVAILABLE; ?>
    
    qqqqqqqqqqqqqqq
    <?php echo TEXT_NO_SHIPPING_AVAILABLE; ?>
    
    <?php
  }
?>rrrrrrrrrrrrrrrrrr
    <fieldset class="shipping" id="comments">
        <legend><?php echo TABLE_HEADING_COMMENTS; ?></legend>
        <?php echo zen_draw_textarea_field('comments', '45', '3'); ?>
    </fieldset>
    ssssssssssssssssss
    <?php echo zen_image_submit(BUTTON_IMAGE_CONTINUE_CHECKOUT, BUTTON_CONTINUE_ALT); ?>
    
tttttttttttttttt
    <?php echo '<strong>' . TITLE_CONTINUE_CHECKOUT_PROCEDURE . '</strong><br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
    </form>

