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

        public function onAfterRoute()
        {
            require_once JPATH_ROOT . '/plugins/system/zt/core/bootstrap.php';
            ZtFramework::registerExtension(__DIR__ . '/extension.json');
            if (ZtonepageHelperVirtuemart::isCartpage())
            {
                $extension = ZtFramework::getExtension('Ztonepage');
                $extension->init();
                ZtonepageHelperVirtuemart::initVirtueMart();
                ZtonepageHelperVirtuemart::overrideView();
            }
        }

    }

}
