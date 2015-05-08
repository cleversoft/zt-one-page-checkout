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

    <div class="inner-wrap">
        <span class="label label-info"><?php echo JFactory::getUser()->email; ?></span>
        <button type="button" class="btn btn-primary btn-small" onClick="jQuery('.edit-address').toggle();">Edit Bill to</button>
        <!-- @todo Show Edit button to expand below form -->
        <div class="edit-address" style="display:none;">
            <form autocomplete="off" id="<?php echo $class; ?>-form">
                <?php foreach ($billTo as $bill) : ?>
                    <div id="<?php echo $bill['name']; ?>-group" class="form-group">
                        <div class="inner">
                            <label for="<?php echo $bill['name']; ?>_field" class="<?php echo $bill['name']; ?>"><?php echo $bill['title']; ?> <?php echo ($bill['required'] == 1) ? '<span class="required">*</span>' : ''; ?></label>
                            <?php echo $bill['formcode']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary btn-small">Save</button>
                <button type="button" class="btn btn-danger btn-small">Cancel</button>
            </form>
        </div>
    </div>
</div>
