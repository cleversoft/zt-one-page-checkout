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

/**
 * Class exists checking
 */
if (!class_exists('plgSystemZt_onepage_checkout')) {

    /**
     * Zoo Framework entrypoint plugin
     */
    class plgSystemZt_onepage_checkout extends JPlugin {

        public function __construct(&$subject, $config = array()) {
            parent::__construct($subject, $config);

            // ZooFramework
            require_once __DIR__ . '/zooframework/core/bootstrap.php';

            if (JFactory::getApplication()->isSite()) {
                // Load BS3
                if ($this->params->get('assets_bs3', 0)) {
                    ZtAssets::getInstance()->loadVendor('bootstrap', array(
                        'css/bootstrap.css',
                        'js/bootstrap.js'
                    ));
                }
                // Load Fontawesome
                ZtAssets::getInstance()->loadVendor('font-awesome', array(
                    'css/font-awesome.css'
                ));
            }
        }

        /**
         * We'll catch before request dispatched to component
         * @link https://docs.joomla.org/Plugin/Events/System#onAfterRoute
         */
        public function onAfterRoute() {
            // Asked for Zt Framework
            require_once __DIR__ . '/zooframework/core/bootstrap.php';
            // Register this plugin
            ZtFramework::registerExtension(__DIR__ . '/extension.json');
            // Check to hook into Virtuemart Cartpage
            if (ZtonepageHelperVirtuemart::isVirtuemart()) {
                if ($this->params->get('assets_bs3', 1)) {
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

        /**
         * 
         */
        public function onAfterDispatch() {
            $input = JFactory::getApplication()->input;
            $ztCommand = $input->getCmd('zt_cmd');

            if ($ztCommand) {
                switch ($ztCommand) {
                    case 'ajax':
                        $class = $input->get('zt_namespace') . 'HelperAjax';
                        $task = $input->get('zt_task');
                        if (class_exists($class)) {
                            call_user_func(array($class, $task));
                            $ajax = ZtAjax::getInstance();
                            $ajax->response();
                        }
                        break;
                }
            }
        }

    }

}
