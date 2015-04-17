<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageModelVirtuemart'))
{

    class ZtonepageModelVirtuemart
    {

        /**
         * 
         * @staticvar ZtonepageModelVirtuemart $instance
         * @return \ZtonepageModelVirtuemart
         */
        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new ZtonepageModelVirtuemart();
            }
            return$instance;
        }

        public function getCart()
        {
            
        }

        public function getBillTo()
        {
            
        }

        public function getShipto()
        {
            
        }

        public function getShipment()
        {
            
        }

        public function getPayment()
        {
            
        }

        public function getCoupon()
        {
            
        }

        public function getShoppingCart()
        {
            
        }

        public function getConfirm()
        {
            
        }

    }

}