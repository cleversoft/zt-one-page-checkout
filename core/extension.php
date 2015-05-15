<?php

if (!class_exists('ZtonepageExtension'))
{

    class ZtonepageExtension extends JObject
    {

        public function init()
        {
            $lang = JFactory::getLanguage();
            $extension = 'plg_system_zt_onepage_checkout';
            $base_dir = JPATH_SITE;
            $language_tag = 'en-GB';
            $reload = true;
            $lang->load($extension, JPATH_ADMINISTRATOR);
        }

    }

}
