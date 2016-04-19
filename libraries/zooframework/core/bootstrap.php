<?php

/**
 * {$id}
 */

defined('_JEXEC') or die('Restricted access');

require_once __DIR__ . '/includes/defines.php';
require_once __DIR__ . '/includes/path.php';

require_once __DIR__ . '/includes/extensions.php';
require_once __DIR__ . '/extension.php';
require_once __DIR__ . '/assets.php';
require_once __DIR__ . '/includes/loader.php';
require_once __DIR__ . '/includes/framework.php';

if (JFactory::getApplication()->input->get('zt_debug') == 1) {
    ZtFramework::restart();
}
/* Register Zt autoloading by Psr2 */
ZtFramework::registerExtension(__DIR__ . '/../extension.json');

spl_autoload_register(array('ZtLoader', 'autoloadZtPsr2'));

/* Include JS Framework core */
JHtml::_('bootstrap.framework');

/* Extension init */
$extension = ZtFramework::getExtension('Zt');
$extension->init();
