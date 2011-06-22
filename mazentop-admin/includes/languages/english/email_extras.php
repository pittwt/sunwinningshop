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
// $Id: email_extras.php 5454 2006-12-29 20:10:17Z drbyte $
//

// office use only
  define('OFFICE_FROM','来自:');
  define('OFFICE_EMAIL','电子邮件:');

  define('OFFICE_SENT_TO','发给:');
  define('OFFICE_EMAIL_TO','电子邮件:');
  define('OFFICE_USE','网站专用:');
  define('OFFICE_LOGIN_NAME','登录名:');
  define('OFFICE_LOGIN_EMAIL','电子邮件:');
  define('OFFICE_LOGIN_PHONE','<strong>电话号码:</strong>');
  define('OFFICE_IP_ADDRESS','IP地址:');
  define('OFFICE_HOST_ADDRESS','主机地址:');
  define('OFFICE_DATE_TIME','日期和时间:');

// email disclaimer
  define('EMAIL_DISCLAIMER', 'This email address was given to us by you or by one of our customers. If you feel that you have received this email in error, please send an email to %s');
  define('EMAIL_SPAM_DISCLAIMER','This e-mail is sent in accordance with the US CAN-SPAM Law in effect 01/01/2004. Removal requests can be sent to this address and will be honored and respected.');
  define('EMAIL_FOOTER_COPYRIGHT','Copyright &copy; ' . date('Y') . ' <a href="http://www.zen-cart.cn" target="_blank">Zen Cart 中文版</a>。Powered by <a href="http://www.zen-cart.cn" target="_blank">Zen Cart</a>');
  define('SEND_EXTRA_GV_ADMIN_EMAILS_TO_SUBJECT','[管理员已发GV]');
  define('SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_SUBJECT','[优惠券]');
  define('SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_SUBJECT','[订单状态]');
  define('TEXT_UNSUBSCRIBE', "\n\nTo 如要退订电子商情和促销邮件, 请点击以下链接: \n");

// for whos_online when gethost is off
  define('OFFICE_IP_TO_HOST_ADDRESS', '关闭');
?>