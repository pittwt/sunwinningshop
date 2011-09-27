<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// | Simplified Chinese version   http://www.zen-cart.cn                  |
// +----------------------------------------------------------------------+
//  $Id: ECPSS.php v1.0 2008-03-20 zhangMR $
//

  define('MODULE_PAYMENT_ECPSS_TEXT_ADMIN_TITLE', 'E汇通');
  define('MODULE_PAYMENT_ECPSS_TEXT_CATALOG_TITLE', 'E汇通支付');
  define('MODULE_PAYMENT_ECPSS_TEXT_DESCRIPTION', 'E汇通支付');

  define('MODULE_PAYMENT_ECPSS_MARK_BUTTON_IMG', DIR_WS_MODULES . '/payment/ecpss/ecpss.png');
  define('MODULE_PAYMENT_ECPSS_MARK_BUTTON_ALT', 'E汇通支付');
  define('MODULE_PAYMENT_ECPSS_ACCEPTANCE_MARK_TEXT', 'E汇通支付<br/>');

  define('MODULE_PAYMENT_ECPSS_TEXT_CATALOG_LOGO', '<img src="' . MODULE_PAYMENT_ECPSS_MARK_BUTTON_IMG . '" alt="' . MODULE_PAYMENT_ECPSS_MARK_BUTTON_ALT . '" title="' . MODULE_PAYMENT_ECPSS_MARK_BUTTON_ALT . '" /> &nbsp;' .  '<span class="smallText">' . MODULE_PAYMENT_ECPSS_ACCEPTANCE_MARK_TEXT . '</span>');

  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_1_1', '打开E汇通支付模块');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_1_2', '您要使用E汇通支付吗?');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_2_1', '商户编号');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_2_2', '以初始单上所填商户编号为准');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_3_1', '加密密钥');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_3_2', '该密钥由商户生成，建议为16个字符，字母数字的组合。并通知E汇通支付相关人员。');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_4_1', '支付币种');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_4_2', '1.美元-USD,2.欧元-EUR,3.人民币-CNY,4.英镑-GBP');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_5_1', '语言');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_5_2', '选项:1-中文, 2-English, 3-Français,4-Español,5-Deutsch');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_6_1', '付款地区');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_6_2', '如果选择了付款地区，仅该地区可以使用该支付模块。');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_7_1', '设置订单状态');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_7_2', '设置采用E汇通支付的订单状态<br />(推荐状态:处理中)');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_8_1', '显示顺序');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_8_2', '显示顺序：数值小的显示在前。');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_9_1', 'E汇通支付的网址<br />缺省：<code>https://security.sslepay.com/sslpayment</code><br />');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_9_2', 'E汇通支付交易的网址');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_10_1', 'E汇通支付返回网址');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_10_2', 'E汇通支付返回网址');

  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_11_1', '订单完成状态');
  define('MODULE_PAYMENT_ECPSS_TEXT_CONFIG_11_2', '查看订单完成后的状态');

?>