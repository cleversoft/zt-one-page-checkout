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
         * @todo Remember me
         */
        public static function userLogin()
        {
            $input = JFactory::getApplication()->input;
            $ajax = ZtAjax::getInstance();
            $username = $input->get('username');
            $password = $input->get('password');
            $options = array();
            $options['remember'] = JFactory::getApplication()->input->getBool('remember', false);
            if (ZtHelperJoomlaUser::login($username, $password, '', '', $options) || JFactory::getUser()->guest == false)
            {
                // Login success than we need reload this html
                $ajax->addExecute('zt.joomla.updateToken("' . JSession::getFormToken() . '")');
                $ajax->addExecute('zt.onepagecheckout.display();');
            } else
            {
                $ajax->addMessage('Wrong username / password');
            }
            $ajax->response();
        }

        public static function guestCheckout()
        {
            $input = JFactory::getApplication()->input;
            $ajax = ZtAjax::getInstance();

            if (ZtHelperJoomlaUser::quickLogin($input->getString('email')))
            {
                $ajax->addExecute('zt.onepagecheckout.display();');
            } else
            {
                $ajax->addMessage('Something wrong');
            }
            $ajax->response();
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

        public static function updateShipment()
        {
            $model = ZtonepageModelVirtuemart::getInstance();
            $model->updateShipment();
            $ajax = ZtAjax::getInstance();
            $ajax->addExecute('zt.onepagecheckout.display();');
            $ajax->response();
        }

        public static function updatePurchaseConfirm()
        {
            $model = ZtonepageModelVirtuemart::getInstance();
            $ajax = ZtAjax::getInstance();
            $confirmed = $model->confirm();
            $view = new VirtueMartViewCart();
            if ($confirmed)
            {
                /**
                 * @todo What am i dong here ? !!!
                 */
                ob_start();
                $view->setLayout('order_done');
                $html = $view->display();
                $html = ob_get_contents();
                ob_end_clean();

                $ajax->addHtml($html, '#zt-opc-plugin');
                $ajax->addExecute('zt.onepagecheckout._rebind();');
            } else
            {
                $ajax->addMessage(ZtonepageHelperText::_('INVALID_DATA'));
            }
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
