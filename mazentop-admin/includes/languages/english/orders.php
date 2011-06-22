<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: orders.php 6214 2007-04-17 02:24:25Z ajeh $
 */

define('HEADING_TITLE', '订单管理');
define('HEADING_TITLE_SEARCH', '订单号码:');
define('HEADING_TITLE_STATUS', '状态:');
define('HEADING_TITLE_SEARCH_DETAIL_ORDERS_PRODUCTS', '按商品名称搜索或<strong>ID:XX</strong>或型号');
define('TEXT_INFO_SEARCH_DETAIL_FILTER_ORDERS_PRODUCTS', '搜索选项: ');
define('TABLE_HEADING_PAYMENT_METHOD', '付款<br />配送');
define('TABLE_HEADING_ORDERS_ID','订单号');

define('TEXT_BILLING_SHIPPING_MISMATCH','帐单地址和送货地址不同 ');

define('TABLE_HEADING_COMMENTS', '备注');
define('TABLE_HEADING_CUSTOMERS', '客户');
define('TABLE_HEADING_ORDER_TOTAL', '订单总额');
define('TABLE_HEADING_DATE_PURCHASED', '购买日期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_TYPE', '订单类型');
define('TABLE_HEADING_ACTION', '操作');
define('TABLE_HEADING_QUANTITY', '数量');
define('TABLE_HEADING_PRODUCTS_MODEL', '型号');
define('TABLE_HEADING_PRODUCTS', '商品');
define('TABLE_HEADING_TAX', '税');
define('TABLE_HEADING_TOTAL', '总额');
define('TABLE_HEADING_PRICE_EXCLUDING_TAX', '单价 (不含税)');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', '单价 (含税)');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', '总额 (不含税)');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', '总额 (含税)');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', '客户通知');
define('TABLE_HEADING_DATE_ADDED', '加入日期');

define('ENTRY_CUSTOMER', '客户:');
define('ENTRY_SOLD_TO', '售于:');
define('ENTRY_DELIVERY_TO', '交付:');
define('ENTRY_SHIP_TO', '运到:');
define('ENTRY_SHIPPING_ADDRESS', '送货地址:');
define('ENTRY_BILLING_ADDRESS', '帐单地址:');
define('ENTRY_PAYMENT_METHOD', '支付方式:');
define('ENTRY_CREDIT_CARD_TYPE', '信用卡类型:');
define('ENTRY_CREDIT_CARD_OWNER', '信用卡人:');
define('ENTRY_CREDIT_CARD_NUMBER', '信用卡号码:');
define('ENTRY_CREDIT_CARD_CVV', '信用卡CVV校验码:');
define('ENTRY_CREDIT_CARD_EXPIRES', '信用卡有效期:');
define('ENTRY_SUB_TOTAL', '小计:');
define('ENTRY_TAX', '税:');
define('ENTRY_SHIPPING', '运费:');
define('ENTRY_TOTAL', '总额:');
define('ENTRY_DATE_PURCHASED', '购买日期:');
define('ENTRY_STATUS', '状态:');
define('ENTRY_DATE_LAST_UPDATED', '最后更新日期:');
define('ENTRY_NOTIFY_CUSTOMER', '通知客户:');
define('ENTRY_NOTIFY_COMMENTS', '增加备注:');
define('ENTRY_PRINTABLE', '打印发票');

define('TEXT_INFO_HEADING_DELETE_ORDER', '删除订单');
define('TEXT_INFO_DELETE_INTRO', '您确认要删除该订单吗?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', '恢复商品数量');
define('TEXT_DATE_ORDER_CREATED', '创建日期:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', '最后修改:');
define('TEXT_INFO_PAYMENT_METHOD', '支付方式:');
define('TEXT_PAID', '已付');
define('TEXT_UNPAID', '未付');

define('TEXT_ALL_ORDERS', '所有订单');
define('TEXT_NO_ORDER_HISTORY', '没有订单历史');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Order Update');
define('EMAIL_TEXT_ORDER_NUMBER', 'Order Number:');
define('EMAIL_TEXT_INVOICE_URL', 'Detailed Invoice:');
define('EMAIL_TEXT_DATE_ORDERED', 'Date Ordered:');
define('EMAIL_TEXT_COMMENTS_UPDATE', '<em>The comments for your order are:  </em>');
define('EMAIL_TEXT_STATUS_UPDATED', 'Your order has been updated to the following status:' . "\n");
define('EMAIL_TEXT_STATUS_LABEL', '<strong>New status:</strong> %s' . "\n\n");
define('EMAIL_TEXT_STATUS_PLEASE_REPLY', 'Please reply to this email if you have any questions.' . "\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: Order does not exist.');
define('SUCCESS_ORDER_UPDATED', 'Success: Order has been successfully updated.');
define('WARNING_ORDER_NOT_UPDATED', 'Warning: Nothing to change. The order was not updated.');

define('ENTRY_ORDER_ID','Invoice No. ');
define('TEXT_INFO_ATTRIBUTE_FREE', '&nbsp;-&nbsp;<span class="alert">FREE</span>');

define('TEXT_DOWNLOAD_TITLE', 'Order Download Status');
define('TEXT_DOWNLOAD_STATUS', 'Status');
define('TEXT_DOWNLOAD_FILENAME', 'Filename');
define('TEXT_DOWNLOAD_MAX_DAYS', 'Days');
define('TEXT_DOWNLOAD_MAX_COUNT', 'Count');

define('TEXT_DOWNLOAD_AVAILABLE', 'Available');
define('TEXT_DOWNLOAD_EXPIRED', 'Expired');
define('TEXT_DOWNLOAD_MISSING', 'Not on Server');

define('IMAGE_ICON_STATUS_CURRENT', 'Status - Available');
define('IMAGE_ICON_STATUS_EXPIRED', 'Status - Expired');
define('IMAGE_ICON_STATUS_MISSING', 'Status - Missing');

define('SUCCESS_ORDER_UPDATED_DOWNLOAD_ON', 'Download was successfully enabled');
define('SUCCESS_ORDER_UPDATED_DOWNLOAD_OFF', 'Download was successfully disabled');
define('TEXT_MORE', '... more');

define('TEXT_INFO_IP_ADDRESS', 'IP Address: ');
define('TEXT_DELETE_CVV_FROM_DATABASE','Delete CVV from database');
define('TEXT_DELETE_CVV_REPLACEMENT','Deleted');
define('TEXT_MASK_CC_NUMBER','Mask this number');

define('TEXT_INFO_EXPIRED_DATE', 'Expired Date:<br />');
define('TEXT_INFO_EXPIRED_COUNT', 'Expired Count:<br />');

define('TABLE_HEADING_CUSTOMER_COMMENTS', 'Customer<br />Comments');
define('TEXT_COMMENTS_YES', 'Customer Comments - YES');
define('TEXT_COMMENTS_NO', 'Customer Comments - NO');
?>