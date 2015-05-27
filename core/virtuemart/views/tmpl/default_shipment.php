<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$shipMentModel = $modelVM->getShipments();
$class = 'zt-opc-shipment';

?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">3</div>
        <?php echo ZtonepageHelperText::_('SHIPIMENT'); ?>
    </h3>
    <div class="inner-wrap">
        <form id="<?php echo $class; ?>-form">
            <fieldset>
                <?php $i = 0; foreach($shipMentModel as $shipMent) : ?>
                <input type="radio" checked="checked" value="<?php echo $i; ?>" id="shipment_id_<?php echo $i; ?>"
                       onclick="" name="virtuemart_shipmentmethod_id">
                <label for="shipment_id_<?php echo $i; ?>"><span class="vmshipment"><span class="vmshipment_name"><?php echo $shipMent->shipment_name; ?></span></span></label>

                <div class="clear"></div>
                <?php $i++; endforeach; ?>
                <button type="submit" class="btn btn-primary btn-small"><?php echo ZtonepageHelperText::_('SAVE'); ?></button>
            </fieldset>
        </form>
    </div>
</div>
