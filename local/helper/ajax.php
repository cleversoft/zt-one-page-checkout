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
                $ajax->addExecute('alert("Login fail !.");');
            }
        }

        public static function display()
        {
            $view = new VirtueMartViewCart();
            $html = $view->display();
            $ajax = ZtAjax::getInstance();
            $ajax->addHtml($html, '#zt-opc-plugin');
            $ajax->response();
        }

    }

}
