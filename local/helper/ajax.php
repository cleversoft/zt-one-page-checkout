<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageHelperAjax')) {

    class ZtonepageHelperAjax {

        public static function userLogin() {
            $input = JFactory::getApplication()->input;
            $username = $input->get('username');
            $password = $input->get('password');
            if (ZtHelperJoomlaUser::login($username, $password)) {
                $ajax = ZtAjax::getInstance();
                $ajax->addExecute('alert("Login successful !.");');
            } else {
                $ajax->addExecute('alert("Login fail !.");');
            }
        }

    }

}
