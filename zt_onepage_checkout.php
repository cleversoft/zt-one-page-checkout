<?php

/**
 * {$id}
 */
error_reporting(E_ALL);
defined('_JEXEC') or die('Restricted access');
require_once 'local/model/virtuemart.php';
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

        public function onAfterDispatch()
        {
            //require_once JPATH_ROOT . '/plugins/system/zt/framework/bootstrap.php';
            //ZtFramework::registerExtension('plugin.system.zt_onepage_checkout', 'Ztonepage');
            //ZtonepageFactory::isLogged();
        }

        public function onBeforeRender() {

            $vmModel = ZtonepageModelVirtuemart::getInstance();
            $vmModel->getBillTo();
        }

    }

}