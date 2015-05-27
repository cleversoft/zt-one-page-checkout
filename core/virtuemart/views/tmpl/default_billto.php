<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$billModel = $modelVM->getBillTo();
$billTo = $billModel['fields'];
$class = 'zt-opc-billto';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">1</div><?php echo ZtonepageHelperText::_('BILL_TO'); ?>
    </h3>

    <!-- @todo Show sort information here -->

    <!-- BT address -->
    <div class="inner-wrap">
        <span class="label label-info"><?php echo JFactory::getUser()->email; ?></span>
        <button type="button" class="btn btn-primary btn-small" onClick="jQuery('.edit-address #zt-opc-billto-form').toggle();"><?php echo ZtonepageHelperText::_('EDIT_BILL_TO'); ?></button>
        <!-- @todo Show Edit button to expand below form -->
        <div class="edit-address billto" >
            <form autocomplete="off" id="<?php echo $class; ?>-form" style="display:none;" data-validation-error="<?php echo ZtonepageHelperText::_('FORM_VALIDATION_ERROR'); ?>">
                <?php foreach ($billTo as $bill) : ?>
                    <div id="<?php echo $bill['name']; ?>-group" class="form-group">
                        <div class="inner">
                            <label for="<?php echo $bill['name']; ?>_field" class="<?php echo $bill['name']; ?>"><?php echo $bill['title']; ?> <?php echo ($bill['required'] == 1) ? '<span class="required">*</span>' : ''; ?></label>
                            <?php echo $bill['formcode']; ?>
                            <?php //echo ZtonepageHelperVirtuemart::formField($bill); ?>
                        </div>
                    </div>
                <?php endforeach; ?>   
                <fieldset>
                    <input type="hidden" name="address_type" value="BT">
                </fieldset>
                <button type="submit" class="btn btn-primary btn-small"><?php echo ZtonepageHelperText::_('SAVE'); ?></button>
                <button type="button" class="btn btn-danger btn-small" onClick="jQuery('.edit-address #zt-opc-billto-form').toggle();"><?php echo ZtonepageHelperText::_('CANCEL'); ?></button>
            </form>
        </div>
    </div>
</div>
