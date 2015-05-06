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
            /* Require the config */
            defined('DS') or define('DS', DIRECTORY_SEPARATOR);
            if (!class_exists('VmConfig'))
                require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'helpers' . DS . 'config.php');

            VmConfig::loadConfig();

            vmRam('Start');
            vmSetStartTime('Start');

            VmConfig::loadJLang('com_virtuemart', true);

            // Front-end helpers
            if (!class_exists('VmImage'))
                require(VMPATH_ADMIN . DS . 'helpers' . DS . 'image.php'); //dont remove that file it is actually in every view except the state view
            if (!class_exists('shopFunctionsF'))
                require(VMPATH_SITE . DS . 'helpers' . DS . 'shopfunctionsf.php'); //dont remove that file it is actually in every view

            $_controller = vRequest::getCmd('view', vRequest::getCmd('controller', 'virtuemart'));
            $trigger = 'onVmSiteController';
// 	$task = vRequest::getCmd('task',vRequest::getCmd('layout',$_controller) );		$this makes trouble!
            $task = vRequest::getCmd('task', '');

            $session = JFactory::getSession();
            $manage = vRequest::getCmd('manage', $session->get('manage', false, 'vm'));
            if (!$manage)
                $session->set('manage', 0, 'vm');

            $feViews = array('askquestion', 'cart', 'invoice', 'pdf', 'pluginresponse', 'productdetails', 'recommend', 'vendor', 'vmplg');
            if ($manage and ! in_array($_controller, $feViews))
            {

                $app = JFactory::getApplication();

                $user = JFactory::getUser();
                $vendorIdUser = VmConfig::isSuperVendor();

                if ($vendorIdUser)
                {
                    VmConfig::loadJLang('com_virtuemart');
                    $jlang = JFactory::getLanguage();
                    $tag = $jlang->getTag();
                    $jlang->load('', JPATH_ADMINISTRATOR, $tag, true);
                    VmConfig::loadJLang('com_virtuemart');
                    $basePath = VMPATH_ADMIN;
                    $trigger = 'onVmAdminController';
                    vmdebug('$vendorIdUser use FE managing ' . $vendorIdUser);


                    $session->set('manage', 1, 'vm');
                    vRequest::setVar('manage', '1');

                    vmJsApi::jQuery(false);
                    vmJsApi::loadBECSS();

                    $app = JFactory::getApplication();
                    $router = $app->getRouter();
                    $router->setMode(0);
                } else
                {
                    $session->set('manage', 0, 'vm');
                    vRequest::setVar('manage', 0);
                    $basePath = VMPATH_SITE;
                    $app->redirect('index.php?option=com_virtuemart', vmText::_('COM_VIRTUEMART_RESTRICTED_ACCESS'));
                }
                vRequest::setVar('tmpl', 'component');
            } elseif ($_controller)
            {
                if ($_controller != 'productdetails')
                {
                    $session->set('manage', 0, 'vm');
                    vRequest::setVar('manage', '0');
                }
                vmJsApi::jQuery();
                vmJsApi::jSite();
                vmJsApi::cssSite();
                $basePath = VMPATH_SITE;
            }
        }

        public static function overrideView()
        {
            $input = JFactory::getApplication()->input;
            $view = $input->get('view');
            if (ZtFramework::isAjax())
            {
                ZtFramework::import('Ztonepage://views/' . $view . '.json.php');
            } else
            {
                ZtFramework::import('Ztonepage://views/' . $view . '.html.php');
            }
        }

    }

}
