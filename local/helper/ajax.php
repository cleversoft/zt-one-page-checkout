<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperAjax'))
{

    class ZtonepageHelperAjax
    {

        public static function getCart()
        {
            $ajax= ZtAjax::getInstance();
            $ajax->add('xxx');          
        }

    }

}