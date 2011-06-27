<?php
/**
 * paypal.php payment module class for Paypal IPN payment method
 *
 * @package paymentMethod
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: paypal.php 4835 2006-10-25 04:45:40Z drbyte $
 */

define('MODULE_PAYMENT_PAYPAL_RM', '2');

if (IS_ADMIN_FLAG === true) {
  include_once(DIR_FS_CATALOG_MODULES . 'payment/paypal/paypal_functions.php');
} else {
  include_once(DIR_WS_MODULES . 'payment/paypal/paypal_functions.php');
}
/**
 * paypal IPN pyment method class
 *
 */
class paypal extends base {
  /**
   * string repesenting the payment method
   *
   * @var string
   */
  var $code;
  /**
   * $title is the displayed name for this payment method
   *
   * @var string
    */
  var $title;
  /**
   * $description is a soft name for this payment method
   *
   * @var string
    */
  var $description;
  /**
   * $enabled determines whether this module shows or not... in catalog.
   *
   * @var boolean
    */
  var $enabled;
  /**
    * constructor
    *
    * @param int $paypal_ipn_id
    * @return paypal
    */
  function paypal($paypal_ipn_id = '') {
    global $order, $messageStack;
    $this->code = 'paypal';
    if (IS_ADMIN_FLAG === true) {
      $this->title = MODULE_PAYMENT_PAYPAL_TEXT_ADMIN_TITLE; // Payment Module title in Admin
    } else {
      $this->title = MODULE_PAYMENT_PAYPAL_TEXT_CATALOG_TITLE; // Payment Module title in Catalog
    }
    $this->description = MODULE_PAYMENT_PAYPAL_TEXT_DESCRIPTION;
    $this->sort_order = MODULE_PAYMENT_PAYPAL_SORT_ORDER;
    $this->enabled = ((MODULE_PAYMENT_PAYPAL_STATUS == 'True') ? true : false);
    if ((int)MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID > 0) {
      $this->order_status = MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID;
    }
    if (is_object($order)) $this->update_status();
    if (MODULE_PAYMENT_PAYPAL_TESTING == 'Test') {
      if (!file_exists(DIR_WS_CATALOG . 'ipn_test.php')) {
        $messageStack->add('header', 'WARNING: PayPal TEST mode enabled but ipn_test*.php files not found', 'caution');
      }
      $this->form_action_url = DIR_WS_CATALOG . 'ipn_test.php';
    } else {
      $this->form_action_url = 'https://' . MODULE_PAYMENT_PAYPAL_HANDLER;
    }
  }
  /**
   * calculate zone matches and flag settings to determine whether this module should display to customers or not
    *
    */
  function update_status() {
    global $order, $db;

    if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYPAL_ZONE > 0) ) {
      $check_flag = false;
      $check_query = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYPAL_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
      while (!$check_query->EOF) {
        if ($check_query->fields['zone_id'] < 1) {
          $check_flag = true;
          break;
        } elseif ($check_query->fields['zone_id'] == $order->billing['zone_id']) {
          $check_flag = true;
          break;
        }
        $check_query->MoveNext();
      }

      if ($check_flag == false) {
        $this->enabled = false;
      }
    }
  }
  /**
   * JS validation which does error-checking of data-entry if this module is selected for use
   * (Number, Owner, and CVV Lengths)
   *
   * @return string
    */
  function javascript_validation() {
    return false;
  }
  /**
   * Displays Credit Card Information Submission Fields on the Checkout Payment Page
   * In the case of paypal, this only displays the paypal title
   *
   * @return array
    */
  function selection() {
    return array('id' => $this->code,
                 'module' => $this->title);
  }
  /**
   * Normally evaluates the Credit Card Type for acceptance and the validity of the Credit Card Number & Expiration Date
   * Since paypal module is not collecting info, it simply skips this step.
   *
   * @return boolean
   */
  function pre_confirmation_check() {
    return false;
  }
  /**
   * Display Credit Card Information on the Checkout Confirmation Page
   * Since none is collected for paypal before forwarding to paypal site, this is skipped
   *
   * @return boolean
    */
  function confirmation() {
    return false;
  }
  /**
   * Build the data and actions to process when the "Submit" button is pressed on the order-confirmation screen.
   * This sends the data to the payment gateway for processing.
   * (These are hidden fields on the checkout confirmation page)
   *
   * @return string
    */
  function process_button() {
    global $db, $order, $currencies, $currency;

    $this->totalsum = $order->info['total'];

    // save the session stuff permanently in case paypal loses the session
    $db->Execute("delete from " . TABLE_PAYPAL_SESSION . " where session_id = '" . session_id() . "'");

    $sql = "insert into " . TABLE_PAYPAL_SESSION . " (session_id, saved_session, expiry) values (
            '" . session_id() . "',
            '" . base64_encode(serialize($_SESSION)) . "',
            '" . (time() + (1*60*60*24*2)) . "')";

    $db->Execute($sql);


    if (MODULE_PAYMENT_PAYPAL_CURRENCY == '前台货币') {
      $my_currency = $_SESSION['currency'];
    } else {
      $my_currency = substr(MODULE_PAYMENT_PAYPAL_CURRENCY, 0);
    }
    if (!in_array($my_currency, array('CNY', 'CAD', 'EUR', 'GBP', 'JPY', 'USD', 'AUD'))) {
      $my_currency = 'CNY';
    }
    $telephone = preg_replace('/\D/', '', $order->customer['telephone']);
    $process_button_string = zen_draw_hidden_field('business', MODULE_PAYMENT_PAYPAL_BUSINESS_ID) .
                             zen_draw_hidden_field('cmd', '_ext-enter') .
                             zen_draw_hidden_field('return', zen_href_link(FILENAME_CHECKOUT_PROCESS, 'referer=paypal', 'SSL')) .
                             zen_draw_hidden_field('cancel_return', zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL')) .
                             zen_draw_hidden_field('notify_url', zen_href_link('ipn_main_handler.php', '', 'SSL',false,false,true)) .
                             zen_draw_hidden_field('rm', MODULE_PAYMENT_PAYPAL_RM) .
                             zen_draw_hidden_field('currency_code', $my_currency) .
    //                              zen_draw_hidden_field('address_override', MODULE_PAYMENT_PAYPAL_ADDRESS_OVERRIDE) .
    //                              zen_draw_hidden_field('no_shipping', MODULE_PAYMENT_PAYPAL_ADDRESS_REQUIRED) .
                             zen_draw_hidden_field('bn', 'zencart') .
                             zen_draw_hidden_field('mrb', 'R-6C7952342H795591R') .
                             zen_draw_hidden_field('pal', '9E82WJBKKGPLQ') .
                             zen_draw_hidden_field('cbt', MODULE_PAYMENT_PAYPAL_CBT) .
    //                              zen_draw_hidden_field('handling', MODULE_PAYMENT_PAYPAL_HANDLING) .
                             zen_draw_hidden_field('image_url', MODULE_PAYMENT_PAYPAL_IMAGE_URL) .
                             zen_draw_hidden_field('page_style', MODULE_PAYMENT_PAYPAL_PAGE_STYLE) .
                             zen_draw_hidden_field('item_name', MODULE_PAYMENT_PAYPAL_PURCHASE_DECRIPTION_TITLE ) .
                             zen_draw_hidden_field('item_number', '1') .
    //                               zen_draw_hidden_field('invoice', '') .
    //                               zen_draw_hidden_field('num_cart_items', '') .
                             zen_draw_hidden_field('lc', $order->customer['country']['iso_code_2']) .
    //                               zen_draw_hidden_field('amount', number_format(($order->info['total'] - $order->info['shipping_cost']) * $currencies->get_value($my_currency), $currencies->get_decimal_places($my_currency))) .
    //                               zen_draw_hidden_field('shipping', number_format($order->info['shipping_cost'] * $currencies->get_value($my_currency), $currencies->get_decimal_places($my_currency))) .
                             zen_draw_hidden_field('amount', number_format(($this->totalsum) * $currencies->get_value($my_currency), $currencies->get_decimal_places($my_currency))) .
                             zen_draw_hidden_field('shipping', '0.00') .
                             zen_draw_hidden_field('custom', zen_session_name() . '=' . zen_session_id() ) .
                             zen_draw_hidden_field('upload', sizeof($order->products) ) .
                             zen_draw_hidden_field('redirect_cmd', '_xclick') .
                             zen_draw_hidden_field('first_name', $order->customer['firstname']) .
                             zen_draw_hidden_field('last_name', $order->customer['lastname']) .
                             zen_draw_hidden_field('address1', $order->customer['street_address']) .
//                             ($order->customer['suburb'] != '' ? zen_draw_hidden_field('address2', $order->customer['suburb']) : '' ) .
                             zen_draw_hidden_field('city', $order->customer['city']) .
//                             zen_draw_hidden_field('state',strtoupper(substr($order->customer['state'],0,2))) .
                             zen_draw_hidden_field('state',zen_get_zone_code($order->customer['country']['id'], $order->customer['zone_id'],$order->customer['zone_id'])) .
                             zen_draw_hidden_field('zip', $order->customer['postcode']) .
                             zen_draw_hidden_field('country', $order->customer['country']['iso_code_2']) .
                             zen_draw_hidden_field('charset', CHARSET) .
//                             zen_draw_hidden_field('lc', $_SESSION['languages_code']) .
                             zen_draw_hidden_field('email', $order->customer['email_address']) .
                             zen_draw_hidden_field('night_phone_a',$telephone) .
                             zen_draw_hidden_field('day_phone_a',$telephone) .
                             zen_draw_hidden_field('paypal_order_id', $paypal_order_id)
                             ;

    return $process_button_string;
  }
  /**
   * Store transaction info to the order and process any results that come back from the payment gateway
    *
    */
  function before_process() {
    global $order_total_modules;
    if (isset($_GET['referer']) && $_GET['referer'] == 'paypal') {
      $this->notify('NOTIFY_PAYMENT_PAYPAL_RETURN_TO_STORE');
      if (MODULE_PAYMENT_PAYPAL_TESTING == 'Test') {
        // simulate call to ipn_handler.php here
        ipn_simulate_ipn_handler((int)$_GET['count']);
      }
      $_SESSION['cart']->reset(true);
      unset($_SESSION['sendto']);
      unset($_SESSION['billto']);
      unset($_SESSION['shipping']);
      unset($_SESSION['payment']);
      unset($_SESSION['comments']);
      unset($_SESSION['cot_gv']);
      $order_total_modules->clear_posts();//ICW ADDED FOR CREDIT CLASS SYSTEM
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL'));
    } else {
      $this->notify('NOTIFY_PAYMENT_PAYPAL_CANCELLED_DURING_CHECKOUT');
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
    }
  }
  /**
    * Checks referrer
    *
    * @param string $zf_domain
    * @return boolean
    */
  function check_referrer($zf_domain) {
    return true;
  }
  /**
    * Build admin-page components
    *
    * @param int $zf_order_id
    * @return string
    */
  function admin_notification($zf_order_id) {
    global $db;
    $output = '';
    $sql = "select * from " . TABLE_PAYPAL . " where zen_order_id = '" . (int)$zf_order_id . "' order by paypal_ipn_id DESC LIMIT 1";
    $ipn = $db->Execute($sql);
    if ($ipn->RecordCount() > 0) require(DIR_FS_CATALOG. DIR_WS_MODULES . 'payment/paypal/paypal_admin_notification.php');
    return $output;
  }
  /**
   * Post-processing activities
   *
   * @return boolean
    */
  function after_process() {
    $_SESSION['order_created'] = '';
    return false;
  }
  /**
   * Used to display error message details
   *
   * @return boolean
    */
  function output_error() {
    return false;
  }
  /**
   * Check to see whether module is installed
   *
   * @return boolean
    */
  function check() {
    global $db;
    if (!isset($this->_check)) {
      $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYPAL_STATUS'");
      $this->_check = $check_query->RecordCount();
    }
    return $this->_check;
  }
  /**
   * Install the payment module and its configuration settings
    *
    */
  function install() {
    global $db;
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('打开贝宝支付模块', 'MODULE_PAYMENT_PAYPAL_STATUS', 'True', '您要使用贝宝支付方式吗?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('商业编号', 'MODULE_PAYMENT_PAYPAL_BUSINESS_ID','".STORE_OWNER_EMAIL_ADDRESS."', '您的贝宝帐号的首选电子邮件地址<br />说明：该地址必须与贝宝上设置的首选电子邮件地址<strong>完全一致</strong>，并且要注意<strong>大小写</strong>。', '6', '2', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('交易货币', 'MODULE_PAYMENT_PAYPAL_CURRENCY', 'CNY', '选择您要接受的货币', '6', '3', 'zen_cfg_select_option(array(\'前台货币\',\'CNY\',\'USD\',\'CAD\',\'EUR\',\'GBP\',\'JPY\',\'AUD\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('付款地区', 'MODULE_PAYMENT_PAYPAL_ZONE', '0', '如果选择了付款地区，仅该地区可以使用该支付模块。', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('设置通知状态', 'MODULE_PAYMENT_PAYPAL_PROCESSING_STATUS_ID', '" . DEFAULT_ORDERS_STATUS_ID .  "', '设置通过该支付方式付款，但还没有完成的订单状态为<br />(推荐状态\'等待中\')', '6', '5', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('设置订单状态', 'MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID', '2', '设置通过该支付方式付款的订单状态<br />(推荐状态\'处理中\')', '6', '6', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('设置退款订单状态', 'MODULE_PAYMENT_PAYPAL_REFUND_ORDER_STATUS_ID', '1', '设置通过该支付方式退款的订单状态<br />(推荐状态\'等待中\')', '6', '7', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('显示顺序', 'MODULE_PAYMENT_PAYPAL_SORT_ORDER', '0', '显示顺序：小的显示在前。', '6', '8', now())");
    //     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Charge', 'MODULE_PAYMENT_PAYPAL_HANDLING', '0', 'The cost of handling. This is not quantity specific. The same handling will be charged regardless of the number of items purchased. If omitted or 0, no handling charges will be assessed.', '6', '15', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('地址替代', 'MODULE_PAYMENT_PAYPAL_ADDRESS_OVERRIDE', '', '如果设置为 1，Zen Cart输入的地址会替代客户在贝宝上储存的地址。客户将看到Zen Cart的地址，但不能修改。如果地址不正确(例如：缺少必要的字段，包括国家)或没有，将不显示地址。<br />Empty=不替代<br />1=传递的地址替代客户在贝宝上的地址', '6', '18', 'zen_cfg_select_option(array(\'\',\'1\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('送货地址选项', 'MODULE_PAYMENT_PAYPAL_ADDRESS_REQUIRED', '1', '送货地址。如果设置为 0，将提示您的客户输入送货地址。如果设置为 1，将不提示客户输入送货地址。如果设置为 2，客户必须输入送货地址。<br />0=提示<br />1=不询问<br />2=必须<br /><br /><strong>提示: 如果允许客户输入自己的送货地址，您一定要核对贝宝确认信息上地址无误。Zen Cart 不知道客户是否会选择和订单上不同的送货地址。</strong>', '6', '20', 'zen_cfg_select_option(array(\'0\',\'1\',\'2\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Continue按钮文字', 'MODULE_PAYMENT_PAYPAL_CBT', '', '设置贝宝付款完成页面上的Continue按钮的文字。<br />需要设置返回网址。<br />如果不需要定制就留空。', '6', '22', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('图像网址', 'MODULE_PAYMENT_PAYPAL_IMAGE_URL', '', '您的150x50图标点阵图像的网址。省略的话，如果您有商业帐号，客户看到的是您的商业名称；如果您有普通帐号，显示的是您的电子邮件地址。', '6', '24', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('页面风格', 'MODULE_PAYMENT_PAYPAL_PAGE_STYLE', 'paypal', '定制付款页面的风格。页面风格的值是您添加或编辑页面风格时输入的名字。您可以在贝宝网站上，添加或修改客户定制的付款页面风格，位于我的帐号选项下面。如果您要使用主要风格，设置为\"primary.\" 如果要使用缺省风格，设置为\"paypal\".', '6', '25', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('贝宝服务的模式<br /><br />缺省:<br /><code>www.paypal.com/cgi-bin/webscr</code>', 'MODULE_PAYMENT_PAYPAL_HANDLER', 'www.paypal.com/cgi-bin/webscr', '选择贝宝正式交易的网址', '6', '73', '', now())");

    // Paypal testing options go here
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('调试模式', 'MODULE_PAYMENT_PAYPAL_IPN_DEBUG', 'Off', '打开调试模式吗? <br />说明: 会发送大量用于调试的邮件!<br />记录文件位于/includes/modules/payment/paypal/logs 目录<br />电子邮件发送到店主的邮箱。<strong>通常设置为OFF。</strong>', '6', '71', 'zen_cfg_select_option(array(\'Off\',\'Log File\',\'Log and Email\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('在线/测试状态', 'MODULE_PAYMENT_PAYPAL_TESTING', 'Live', '设置贝宝为在线或测试模式', '6', '1', 'zen_cfg_select_option(array(\'Live\', \'Test\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('调试电子邮件地址', 'MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS','".STORE_OWNER_EMAIL_ADDRESS."', '用于接收调试信息的电子邮件地址', '6', '72', now())");

    $this->notify('NOTIFY_PAYMENT_PAYPAL_INSTALLED');
  }
  /**
   * Remove the module and all its settings
    *
    */
  function remove() {
    global $db;
    $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE  'MODULE_PAYMENT_PAYPAL%'");
    $this->notify('NOTIFY_PAYMENT_PAYPAL_UNINSTALLED');
  }
  /**
   * Internal list of configuration keys used for configuration of the module
   *
   * @return array
    */
  function keys() {
    $keys_list = array(
                       'MODULE_PAYMENT_PAYPAL_STATUS',
                       'MODULE_PAYMENT_PAYPAL_BUSINESS_ID',
                       'MODULE_PAYMENT_PAYPAL_CURRENCY',
                       'MODULE_PAYMENT_PAYPAL_ZONE',
                       'MODULE_PAYMENT_PAYPAL_PROCESSING_STATUS_ID',
                       'MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID',
                       'MODULE_PAYMENT_PAYPAL_REFUND_ORDER_STATUS_ID',
                       'MODULE_PAYMENT_PAYPAL_SORT_ORDER',
                       //         'MODULE_PAYMENT_PAYPAL_HANDLING' ,
                       //         'MODULE_PAYMENT_PAYPAL_ADDRESS_OVERRIDE' ,
                       //         'MODULE_PAYMENT_PAYPAL_ADDRESS_REQUIRED' ,
                       'MODULE_PAYMENT_PAYPAL_CBT' ,
                       //         'MODULE_PAYMENT_PAYPAL_IMAGE_URL' ,
                       'MODULE_PAYMENT_PAYPAL_PAGE_STYLE' ,
                       'MODULE_PAYMENT_PAYPAL_HANDLER');

    // Paypal testing/debug options go here:
    $keys_list[]='MODULE_PAYMENT_PAYPAL_IPN_DEBUG';
    if (isset($_GET['debug']) && $_GET['debug']=='on' && !isset($_GET['main_page'])) {
      $keys_list[]='MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS';  /* this defaults to store-owner-email-address */
      $keys_list[]='MODULE_PAYMENT_PAYPAL_TESTING';  /* this is for ipn_test tools, for developers only */
    }
    return $keys_list;
  }
}
?>