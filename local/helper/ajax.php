<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperAjax'))
{

    class ZtonepageHelperAjax
    {

        public static function userLogin()
        {
            $input = JFactory::getApplication()->input;
            $username = $input->get('username');
            $password = $input->get('password');
            if (ZtHelperJoomlaUser::login($username, $password) || JFactory::getUser()->guest == false)
            {
                $ajax = ZtAjax::getInstance();
                $ajax->addExecute('zt.onepagecheckout.display();');
                $ajax->response();
            } else
            {
                self::display();
            }
        }

        /**
         * Display whole form view
         */
        public static function display()
        {
            $view = new VirtueMartViewCart();
            /**
             * @todo What am i dong here ? !!!
             */
            ob_start();
            $html = $view->display();
            $html = ob_get_contents();
            ob_end_clean();
            $ajax = ZtAjax::getInstance();
            $ajax->addHtml($html, '#zt-opc-plugin');
            $ajax->addExecute('zt.onepagecheckout._rebind();');
            $ajax->response();
        }

        public static function updateBillTo()
        {
            $model = ZtonepageModelVirtuemart::getInstance();
            $model->updateAddress();
            /**
             * @todo Actually we no need to refresh page. Just show message as respond
             */
            $ajax = ZtAjax::getInstance();
            //$ajax->addExecute('zt.onepagecheckout.display();');
            $ajax->response();
        }

        public static function updateShipTo()
        {
            self::updateBillTo();
        }

        public static function updateCouponCode()
        {
            $model = ZtonepageModelVirtuemart::getInstance();
            $model->updateCoupon(JFactory::getApplication()->input->get('coupon_code'));
        }

        /**
         * Register new user
         */
        public static function registerUser()
        {
            $return = ZtHelperJoomlaUser::registerUser($_REQUEST);
            if ($return === false)
            {
                
            } else
            {
                switch ($return)
                {
                    case 'useractivate':
                        /**
                         * @todo Show notice message
                         */
                        break;
                    case 'adminactivate':
                        /**
                         * @todo Show notice message
                         */
                        break;
                    default:
                    //self::display();
                }
            }
        }

    }

}
