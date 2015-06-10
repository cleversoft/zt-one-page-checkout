<?php

/**
 * ZT Onepage Checkout
 * 
 * @version     1.0.0
 * @link        http://www.zootemplate.com
 * @link        https://github.com/cleversoft/
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

defined('_JEXEC') or die();
// Html For zt onepage checkout

$class = 'zt-opc-';
?>

<div id="<?php echo $class; ?>plugin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 span6">
                <?php echo $this->loadTemplate('guest'); ?>
            </div>
            <div class="col-sm-6 col-md-6 span6">
                <?php echo $this->loadTemplate('login'); ?>
            </div>
        </div>
    </div>   
</div>
