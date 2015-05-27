<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$shipModel = $modelVM->getShipto();

$shipTo = $shipModel['fields'];

$class = 'zt-opc-shipto';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">2</div><?php echo ZtonepageHelperText::_('SHIP_TO'); ?>
    </h3>
    <div class="inner-wrap">
        <label class="<?php echo $class; ?>-extend" for="<?php echo $class; ?>-extend-input">
            <input 
                type="checkbox" checked="checked" id="<?php echo $class; ?>-extend-input" name="<?php echo $class; ?>-extend-input" onClick="jQuery('.edit-address #zt-opc-shipto-form').toggle();">
            Use for the shipto same as billto address</label>
        <div class="edit-address">
            <form autocomplete="off" id="<?php echo $class; ?>-form" style="display:none;" data-validation-error="<?php echo ZtonepageHelperText::_('FORM_VALIDATION_ERROR'); ?>">
                <?php foreach ($shipTo as $ship) : ?>
                    <div id="<?php echo $ship['name']; ?>-group" class="form-group">
                        <div class="inner">
                            <label for="<?php echo $ship['name']; ?>_field" class="<?php echo $ship['name']; ?>"><?php echo $ship['title']; ?> <?php echo ($ship['required'] == 1) ? '<span class="required">*</span>' : ''; ?></label>
                            <?php echo $ship['formcode']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <fieldset>
                    <input type="hidden" name="address_type" value="ST">
                </fieldset>                
                <button type="submit" class="btn btn-primary btn-small"><?php echo ZtonepageHelperText::_('SAVE'); ?></button>
                <button type="button" class="btn btn-danger btn-small" onClick="jQuery('.edit-address #zt-opc-shipto-form').toggle();"><?php echo ZtonepageHelperText::_('CANCEL'); ?></button>                
            </form>
        </div>
    </div>
</div>
