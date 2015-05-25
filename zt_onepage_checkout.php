<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('plgSystemZt_onepage_checkout'))
{

    /**
     * Zoo Framework entrypoint plugin
     */
    class plgSystemZt_onepage_checkout extends JPlugin
    {

        /**
         * We'll catch before request dispatched to component
         * @link https://docs.joomla.org/Plugin/Events/System#onAfterRoute
         */
        public function onAfterInitialise()
        {            
            // Asked for Zt Framework
            require_once JPATH_ROOT . '/plugins/system/zooframework/core/bootstrap.php';            
            // Register this plugin
            ZtFramework::registerExtension(__DIR__ . '/extension.json');
            // Check to hook into Virtuemart Cartpage
            //if (ZtonepageHelperVirtuemart::isCartpage())
                           
                // Init this plugin
                $extension = ZtFramework::getExtension('Ztonepage');
                $extension->init();
                // Init virtuemart
                ZtonepageHelperVirtuemart::initVirtueMart();
                // Override with our custom view
                ZtonepageHelperVirtuemart::overrideView();             
            
        }

    }

}
