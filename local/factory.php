<?php

/**
 * {$id}
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