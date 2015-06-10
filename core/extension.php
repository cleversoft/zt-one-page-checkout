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

if (!class_exists('ZtonepageExtension'))
{

    class ZtonepageExtension extends JObject
    {

        public function init()
        {
            $lang = JFactory::getLanguage();
            $extension = 'plg_system_zt_onepage_checkout';
            $base_dir = JPATH_SITE;
            $language_tag = 'en-GB';
            $reload = true;
            $lang->load($extension, JPATH_ADMINISTRATOR);
            $lang->load($extension, __DIR__.'/../');
        }

    }

}
