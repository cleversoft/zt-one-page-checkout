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

if (!class_exists('ZtonepageHelperText'))
{

    class ZtonepageHelperText
    {

        public static function _($text)
        {
            $extension = ZtFramework::getExtension('Ztonepage');
            $text = $extension->text . $text;
            return JText::_($text);
        }

    }

}
