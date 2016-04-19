<?php

/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zooframework'))
{

    /**
     * Zoo Framework entrypoint plugin
     */
    class Zooframework
    {

        public function afterDispatch()
        {
            $input = JFactory::getApplication()->input;
            $ztCommand = $input->getCmd('zt_cmd');

            if ($ztCommand)
            {
                switch ($ztCommand)
                {
                    case 'ajax':
                        $class = $input->get('zt_namespace') . 'HelperAjax';
                        $task = $input->get('zt_task');
                        if (class_exists($class))
                        {
                            call_user_func(array($class, $task));
                            $ajax = ZtAjax::getInstance();
                            $ajax->response();
                        }
                        break;
                }
            }
        }

    }

}
