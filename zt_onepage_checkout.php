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
            require_once JPATH_ROOT . '/plugins/system/zt/framework/bootstrap.php';
            ZtFramework::registerExtension('plugin.system.zt_onepage_checkout', 'Ztonepage');
            if (ZtonepageHelperVirtuemart::isCartpage())
            {
                ZtonepageHelperVirtuemart::initVirtueMart();
                ZtonepageHelperVirtuemart::overrideView();
            }
        }

    }

}