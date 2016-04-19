<?php
/**
 * @package      Zo2
 *
 * @author       ZooTemplate.com
 * @copyright    Copyright (C) 2008 - 2015. All rights reserved.
 * @license      GPL v2 or later
 */
defined('_JEXEC') or die();

class pkg_OnepageCheckoutInstallerScript {
    public function postflight($route, JAdapterInstance $adapter)
    {
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query
            ->update('#__extensions')
            ->set("`enabled`='1'")
            ->where("`type`='plugin'")
            ->where("`folder`='system'")
            ->where("`element`='zt_onepage_checkout'");
        $db->setQuery($query);
        $db->execute();

        return true;
    }

}