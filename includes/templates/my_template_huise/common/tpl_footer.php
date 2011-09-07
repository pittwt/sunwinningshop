<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 15511 2010-02-18 07:19:44Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));

?>

<div class="bottom">
    <div class="letter">
        <div class="letter_con">
            <span>Alphabetical Brand Index　#</span>
            <!-- bof productTags-->
            <?php
                // display productTagList
                foreach(range('a', 'z') as $letter) {
                    echo '<a  href="' . HTTP_SERVER.DIR_WS_CATALOG.'producttags/'.strtoupper($letter).'.html" >'.strtoupper($letter).'</a>';
                }
                echo '<a href="' . HTTP_SERVER.DIR_WS_CATALOG.'tags/0-9.html" >0-9</a>';
            ?>
            <!-- eof productTags-->
        </div>
    </div>
    <div class="ser_list">
        <div class="list_left">
            <dl class="list_one">
                <dt>Customer Service</dt>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
            </dl>
            <dl class="list_one">
                <dt>Customer Service</dt>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
            </dl>
            <dl class="list_one">
                <dt>Customer Service</dt>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
                <dd><a href="###">Why buy form us</a></dd>
            </dl>
        </div>
        <div class="list_right">
            <span class="friend">Tall a friend</span>
            <div class="fd_in"><form><input class="fd_text" type="text"/><input class="fd_sub" type="submit" value="" id="fd_submit"/></form></div>
        </div>
    </div>
    <div class="pic_link">
        <div class="a_link"><a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/a_one.gif" alt="图片"/></a><a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/a_two.gif" alt="图片"/></a><a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/a_thr.gif" alt="图片"/></a><a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/a_for.gif" alt="图片"/></a></div>
        <p class="p_word"><a href="###" class="bot_a">Home</a>-<a href="###" class="bot_a">Conditions of Use</a>-<a href="###" class="bot_a">Shipping</a>-<a href="###" class="bot_a">Privacy</a>　<a href="###"><img src="<?php echo DIR_WS_TEMPLATE;?>images/rss.gif" alt="图片"/></a><a href="###" class="bot_a">RSS</a>　<a href="###" class="bot_a">Site Map</a></p>
        <p>Copyright&copy;2011 ******Powered by*****</p>
    </div>
</div>