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

        public function onAfterDispatch()
        {
            require_once JPATH_ROOT . '/plugins/system/zt/framework/bootstrap.php';
            ZtFramework::registerExtension('plugin.system.zt_onepage_checkout', 'Ztonepage');
            ZtonepageFactory::isLogged();
            if (JFactory::getApplication()->input->get('zt_debug'))
            {
                $this->_debugMode();
            }
        }

        private function _debugMode()
        {
            $html = new ZtHtml();
            $input = JFactory::getApplication()->input;
            $assets = ZtAssets::getInstance();
            $assets->addStyleSheet('Ztonepage://assets/css/style.css');
            echo $html->fetch('Ztonepage://html/' . $input->get('layout', 'default') . '.php');
        }

    }

}