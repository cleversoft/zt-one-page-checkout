<?php
/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');
/**
 * @todo All html must be wrapped under form
 */
?>
<div class="container-fluid" id="zt-opc-plugin">
    <div class="row">
        <div class="col-sm-4 col-md-4 span6 billto">
            <div id="zt-opc-billto">
                <?php echo $this->loadTemplate("billto"); ?>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 span6">
            <div id="zt-opc-shipto">
                <?php echo $this->loadTemplate("shipto"); ?>
            </div>
            <div id="zt-opc-shipment">
                <?php echo $this->loadTemplate("shipment"); ?>
            </div>
            <div id="zt-opc-payment">
                <?php echo $this->loadTemplate("payment"); ?>
            </div>
            <div id="zt-opc-coupon">
                <?php echo $this->loadTemplate("coupon"); ?>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4 span12">
            <div id="zt-opc-shoppingcart">
                <?php echo $this->loadTemplate("shoppingcart"); ?>
            </div>
            <div id="zt-opc-confirmpurchase">
                <?php echo $this->loadTemplate("confirmpurchase"); ?>
            </div>
        </div>
    </div>
</div>