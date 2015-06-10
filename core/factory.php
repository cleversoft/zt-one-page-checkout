<?php

/**
 * One Page Checkout For VirtueMart
 *
 * @version     1.0.0
 * @link        http://www.zootemplate.com
 * @author      ZooTemplate
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageFactory'))
{

    class ZtonepageFactory
    {

        public static function isLogged()
        {
            return ZtHelperJoomlaUser::isLogged();
        }

        public static function isCartPage()
        {
            
        }

        public static function html()
        {
            if (self::isLogged())
            {
                $html = new ZtHtml();
                return $html->fetch('Ztonepage://html/logged.php');
            } else
            {
                $html = new ZtHtml();
                return $html->fetch('Ztonepage://html/guest.php');
            }
        }

    }

}
