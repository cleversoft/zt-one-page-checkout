<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ZtonepageModelVirtuemart')) {

    class ZtonepageModelVirtuemart
    {
        public $cart;
        public function __construct()
        {
            if (!class_exists('VmConfig'))
                require(JPATH_ROOT . '/administrator/components/com_virtuemart/helpers/config.php');

            if (!class_exists('VirtueMartCart'))
                require(VMPATH_SITE . '/helpers/cart.php');

            if (!class_exists('CurrencyDisplay'))
                require(VMPATH_ADMIN . '/helpers/currencydisplay.php');

            VmConfig::loadConfig();
            //$currencyDisplay = CurrencyDisplay::getInstance( );
            $this->cart = VirtueMartCart::getCart();
        }

        /**
         *
         * @staticvar ZtonepageModelVirtuemart $instance
         * @return \ZtonepageModelVirtuemart
         */
        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance)) {
                $instance = new ZtonepageModelVirtuemart();
            }
            return $instance;
        }

        public function getCart()
        {

            $data = $this->cart->prepareAjaxData();
            return $data->products;
        }

        public function getBillTo()
        {
            $this->cart->_fromCart = true;
            $this->cart->setCartIntoSession();
            return isset($this->cart->BTaddress) ? $this->cart->BTaddress : $this->_getAddress();
        }

        public function getShipto()
        {
            $this->cart->_fromCart = true;
            $this->cart->setCartIntoSession();
            return isset($this->cart->STaddress) ? $this->cart->STaddress : $this->_getAddress();
        }

        public function getShipment()
        {

        }

        public function getPayment()
        {

        }

        public function getCoupon()
        {
            return $this->cart->couponCode;
        }

        public function getShoppingCart()
        {

        }

        public function getConfirm()
        {

        }


        public function _getAddress()
        {
            //return address object default
            return ;

        }
    }

}