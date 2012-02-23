<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_time_out_default.php 6620 2007-07-17 05:52:19Z drbyte $
 */
?>
<div class="centerColumn" id="timeoutDefault">
<?php
    if ($_SESSION['customer_id']) {
?>
<h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE_LOGGED_IN; ?></h1>
<div id="timeoutDefaultContent" class="content"><?php echo TEXT_INFORMATION_LOGGED_IN; ?></div>
<?php
  } else {
?>
<h1 id="timeoutDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="timeoutDefaultContent" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>

<h1 class="mark_tit"><?php echo HEADING_RETURNING_CUSTOMER; ?></h1>
<div class="enter_box">
<label class="reg_enter" for="login-email-address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="reg_text" id="login-email-address"'); ?>
<br class="clearBoth" />

<label class="reg_enter" for="login-password"><?php echo ENTRY_PASSWORD; ?></label>
<!-- modified by zen-cart.cn //-->
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '40') . '  class="reg_pass" id="login-password"'); ?>
<br class="clearBoth" />
<?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>

<span class="reg_forget"><?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?></span>
<input class="reg_sub" type="submit" value=""/>
</form>
<br class="clearBoth" />
<?php
 }
 ?>
</div>
</div>
