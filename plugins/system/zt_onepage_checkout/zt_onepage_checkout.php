<?php

/**
 * One Page Checkout For VirtueMart
 *
 * @version     1.0.2
 * @link        http://www.zootemplate.com
 * @author      ZooTemplate
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
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

        public function onAfterInitialise() {
            require_once JPATH_ROOT . '/libraries/zooframework/core/bootstrap.php';

            if (JFactory::getApplication()->isSite()){
                ZtAssets::getInstance()->loadVendor('font-awesome', array(
                    'css/font-awesome.css'
                ));
            }
        }

        /**
         * We'll catch before request dispatched to component
         * @link https://docs.joomla.org/Plugin/Events/System#onAfterRoute
         */
        public function onAfterRoute()
        {
            // Asked for Zt Framework
            require_once JPATH_ROOT . '/libraries/zooframework/core/bootstrap.php';
            // Register this plugin
            ZtFramework::registerExtension(__DIR__ . '/extension.json');
            // Check to hook into Virtuemart Cartpage
            if (ZtonepageHelperVirtuemart::isVirtuemart())
            {
                if ($this->params->get('assets_bs3', 1))
                {
                    ZtAssets::getInstance()->loadVendor('bootstrap', array(
                        'css/bootstrap.css',
                        'js/bootstrap.js'
                    ));
                }

                // Init this plugin
                $extension = ZtFramework::getExtension('Ztonepage');
                $extension->init();
                // Init virtuemart
                ZtonepageHelperVirtuemart::initVirtueMart();
                // Override with our custom view
                ZtonepageHelperVirtuemart::overrideView();
                //
                ZtonepageHelperVirtuemart::is3rdAround();
            }
        }

        public function onAfterDispatch() {
            require_once JPATH_ROOT . '/libraries/zooframework/zooframework.php';
            $zooframework  = new Zooframework();
            $zooframework->afterDispatch();
        }

    }

}
