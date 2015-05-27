<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperVirtuemart'))
{

    class ZtonepageHelperVirtuemart
    {

        public static function isVirtuemart()
        {
            $input = JFactory::getApplication()->input;
            return ($input->get('option') == 'com_virtuemart' && $input->get('view') == 'cart') && ($input->get('task') != 'addJS');
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
            $input->get('option', 'com_virtuemart');
            $view = $input->get('view', 'cart');
            ZtFramework::import('Ztonepage://virtuemart/views/' . $view . '.html.php');
        }

        public static function is3rdAround()
        {
            // Check view class
            $view = new ReflectionClass('VirtueMartViewCart');
            $cart = new ReflectionClass('VirtueMartCart');

            $_viewFilePath = ZtPath::getInstance()->getPath('Ztonepage://virtuemart/views/cart.html.php');
            $_cartFilePath = ZtPath::getInstance()->getPath('Ztonepage://virtuemart/cart.php');

            if ($view->getFileName() != $_viewFilePath || $cart->getFileName() != $_cartFilePath)
            {
                JError::raiseNotice( 100, 'You are overrided our OPC' );
            }
        }

    }

}
