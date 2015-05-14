<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$shipModel = $modelVM->getShipto();
$shipTo = $shipModel['fields'];

$class = 'zt-opc-purchase';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">7</div>Confirm Purchase
    </h3>
    <div class="inner-wrap">

        <div class="customer-comment-group">
            <label class="comment" for="<?php echo $class; ?>-field">Notes and special requests</label>
            <textarea class="customer-comment inputbox" rows="3" cols="60" name="customer_note" id="<?php echo $class; ?>-field"></textarea>				
        </div>
        <div class="cart-tos-group">
            <label class="checkbox <?php echo $class; ?>-tos-label <?php echo $class; ?>-row" for="tos">
                <input type="hidden" value="0" name="tos"><input type="checkbox" value="1" name="tos" class="terms-of-service">
                <div class="terms-of-service-cont">
                    <a data-tos="fancybox" class="terms-of-service" href="#<?php echo $class; ?>-tos-fancy">Click here to read terms of service and check the box to accept them.</a>
                </div>
            </label>
        </div>

        <div class="<?php echo $class; ?>-row <?php echo $class; ?>-checkout-box">
            <button 
                id="<?php echo $class; ?>-order-submit" 
                class="<?php echo $class; ?>-btn btn btn-info" 
                type="submit"
                onclick="zt.onepagecheckout.updatePurchaseConfirm(); return false;"
                >Confirm Purchase
            </button>
        </div>

    </div>
</div>
