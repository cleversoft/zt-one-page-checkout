<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

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
