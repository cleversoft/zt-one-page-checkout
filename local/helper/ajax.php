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
            if (ZtHelperJoomlaUser::login($username, $password))
            {
                self::display();
            } else
            {
                //$ajax->addExecute('alert("Login fail !.");');
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
            echo $html;
            $html = ob_get_contents();
            ob_end_clean();
            $ajax = ZtAjax::getInstance();
            $ajax->addHtml($html, '#zt-opc-plugin');
            $ajax->response();
        }

    }

}
