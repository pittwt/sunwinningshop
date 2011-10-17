<?php 
require('../includes/configure.php');
ini_set('include_path', DIR_FS_CATALOG . PATH_SEPARATOR . ini_get('include_path'));
chdir(DIR_FS_CATALOG);
require_once('includes/application_top.php');
if($_REQUEST['type'] == 'checkout_shipping_address') {
	$filename = FILENAME_CHECKOUT_SHIPPING_ADDRESS;
} else if ($_REQUEST['type'] == 'checkout_payment_address') {
	$filename = FILENAME_CHECKOUT_PAYMENT_ADDRESS;
}
$flag_show_pulldown_states = ((($process == true || $entry_state_has_zones == true) && $zone_name == '') || ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN == 'true' || $error_state_input) ? true : false;
echo zen_draw_form('checkout_address', zen_href_link($filename, '', 'SSL'), 'post', 'id="checkout_address"');
$addresses_count = zen_count_customer_address_book_entries();
require($template->get_template_dir('tpl_modules_fec_change_checkout_address.php', DIR_WS_TEMPLATE, $current_page_base,'templates/fec'). '/' . 'tpl_modules_fec_change_checkout_address.php');
?>
</form>
<script type="text/javascript"><!--//
$(document).ready(function() {
  $('#facebox').bgiframe();
  update_zone(document.checkout_address);
});
--></script>