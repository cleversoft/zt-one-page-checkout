<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$payMentModel = $modelVM->getPayments();
$class = 'zt-opc-payment';

?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">4</div>
        <?php echo ZtonepageHelperText::_('PAYMENT'); ?>
    </h3>
    <div class="inner-wrap">
        <fieldset>
            <?php $i = 0;
            foreach ($payMentModel as $payMent) : ?>
                <input type="radio" checked="checked" value="<?php echo $i; ?>" id="payment_id_<?php echo $i; ?>"
                       onclick="" name="virtuemart_paymentmethod_id">
                <label for="payment_id_<?php echo $i; ?>"><span class="vmpayment"><span
                            class="vmpayment_name"><?php echo $payMent->payment_name; ?></span></span></label>

                <div class="clear"></div>
                <?php $i++; endforeach; ?>
        </fieldset>
    </div>
</div>
