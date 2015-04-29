<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperVirtuemart'))
{

    class ZtonepageHelperVirtuemart
    {

        public static function isCartpage()
        {
            $input = JFactory::getApplication()->input;
            if ($input->get('option') == 'com_virtuemart' && $input->get('view') == 'cart')
            {
                return true;
            }
            return false;
        }

        public static function initVirtueMart()
        {
            if (!class_exists('VmConfig'))
                require(JPATH_ROOT . DIRECTORY_SEPARATOR . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_virtuemart' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'config.php');
        }

        public static function overrideView()
        {
            $input = JFactory::getApplication()->input;
            $view = $input->get('view');
            ZtFramework::import('Ztonepage://views/' . $view . '.html.php');
        }

    }

}