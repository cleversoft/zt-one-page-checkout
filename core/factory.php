<?php

/**
 * ZT Onepage Checkout
 * 
 * @version     1.0.0
 * @link        http://www.zootemplate.com
 * @link        https://github.com/cleversoft/
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

defined('_JEXEC') or die();

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
