<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperAjax'))
{

    /**
     * Ajax execute class
     */
    class ZtonepageHelperAjax
    {

        /**
         * Execute Joomla login
         */
        public static function userLogin()
        {
            $input = JFactory::getApplication()->input;
            $username = $input->get('username');
            $password = $input->get('password');
            if (ZtHelperJoomlaUser::login($username, $password) || JFactory::getUser()->guest == false)
            {
                // Login success than we need reload this html
                $ajax = ZtAjax::getInstance();
                $ajax->addExecute('zt.onepagecheckout.display();');
                $ajax->response();
            } else
            {
                /**
                 * @todo Show error message
                 */
            }
        }

        /**
         * Display whole form view
         */
        public static function display()
        {
            // Get view class
            $view = new VirtueMartViewCart();
            /**
             * @todo What am i dong here ? !!!
             */
            ob_start();
            $html = $view->display();
            $html = ob_get_contents();
            ob_end_clean();
            $ajax = ZtAjax::getInstance();
            /**
             * @todo We need replaceHtml function
             */
            $ajax->addHtml($html, '#zt-opc-plugin');
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
            $ajax->addMessage(ZtonepageHelperText::_('UPDATE_SUCCESSED'));
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

        public static function updateCartQuantity()
        {
            $input = JFactory::getApplication()->input;
            $quantity[$input->getInt('pKey')] = $input->get('quantity');
            $input->set('quantity', $quantity);
            $model = ZtonepageModelVirtuemart::getInstance();
            $model->updateCart();
            $ajax = ZtAjax::getInstance();
            $ajax->addExecute('zt.onepagecheckout.display();');
            $ajax->response();
        }

        public static function updatePurchaseConfirm()
        {
            $model = ZtonepageModelVirtuemart::getInstance();
            $model->confirm();
            $view = new VirtueMartViewCart();
            /**
             * @todo What am i dong here ? !!!
             */
            ob_start();
            $view->setLayout('order_done');
            $html = $view->display();
            $html = ob_get_contents();
            ob_end_clean();
            $ajax = ZtAjax::getInstance();
            $ajax->addHtml($html, '#zt-opc-plugin');
            $ajax->addExecute('zt.onepagecheckout._rebind();');
            $ajax->response();
        }

        /**
         * Register new user
         */
        public static function registerUser()
        {
            /**
             * @todo Use JInput instead
             */
            $return = ZtHelperJoomlaUser::registerUser($_REQUEST);
            $ajax = ZtAjax::getInstance();

            if ($return === false)
            {
                $ajax->addMessage('Failed');
            } else
            {
                $message = implode(PHP_EOL, $return['message']);
                $ajax->addMessage($message);
            }
            $ajax->response();
        }

    }

}
