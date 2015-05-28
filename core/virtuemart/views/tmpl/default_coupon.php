<?php
/**
 *
 */
$class = 'zt-opc-coupon';
$ship['name'] = (isset($ship['name']) ? $ship['name'] : '');
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">5</div><?php echo ZtonepageHelperText::_('COUPON'); ?>
    </h3>
    <div class="inner-wrap">
        <div class="edit-address">

            <div id="<?php echo $ship['name']; ?>-group" class="form-group">
                <div class="inner">
                    <input type="text" class="form-control" id="<?php echo $class; ?>-code">
                </div>
            </div>
            <button type="submit" class="btn btn-default"><?php echo ZtonepageHelperText::_('APPLY'); ?></button>

        </div>
    </div>
</div>
