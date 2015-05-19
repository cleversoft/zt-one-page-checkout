<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperVirtuemart'))
{

    class ZtonepageHelperVirtuemart
    {

        /**
         * Verify we are landing on virtuemart cart page
         * @return boolean
         */
        public static function isCartpage()
        {
            $input = JFactory::getApplication()->input;
            return ($input->get('option') == 'com_virtuemart' && $input->get('view') == 'cart') && ($input->get('task') != 'addJS');
        }

        public static function is3rdInstalled()
        {
            
        }

        /**
         * Init Virtuemart
         * @todo Replace by Joomla! standard way
         */
        public static function initVirtueMart()
        {
            /* Require the config */
            defined('DS') or define('DS', DIRECTORY_SEPARATOR);
            if (!class_exists('VmConfig'))
                require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'helpers' . DS . 'config.php');

            VmConfig::loadConfig();

            VmConfig::loadJLang('com_virtuemart', true);

            // Front-end helpers
            if (!class_exists('VmImage'))
                require(VMPATH_ADMIN . DS . 'helpers' . DS . 'image.php'); //dont remove that file it is actually in every view except the state view
            if (!class_exists('shopFunctionsF'))
                require(VMPATH_SITE . DS . 'helpers' . DS . 'shopfunctionsf.php'); //dont remove that file it is actually in every view
            if (!class_exists('VirtueMartCart'))
                ZtFramework::import('Ztonepage://virtuemart/cart.php');
        }

        /**
         * Override view class
         */
        public static function overrideView()
        {
            $input = JFactory::getApplication()->input;

            $input->set('view', 'cart');
            $input->set('option', 'com_virtuemart');
            $view = $input->get('view');
            ZtFramework::import('Ztonepage://virtuemart/views/' . $view . '.html.php');
        }

    }

}
