<?php
/**
 *
 */
$class = 'zt-opc-coupon';
$ship['name'] = (isset($ship['name']) ? $ship['name'] : '');
?>
<div id="<?php echo $class; ?>-wrap">
    <div class="edit-address">
        <div id="<?php echo $ship['name']; ?>-group" class="form-group">
            <div class="inner">
                <input type="text" class="form-control" name="coupon_code" id="<?php echo $class; ?>-code">
            </div>
        </div>
        <button type="button" class="btn btn-default"><?php echo ZtonepageHelperText::_('APPLY'); ?></button>
    </div>
</div>
