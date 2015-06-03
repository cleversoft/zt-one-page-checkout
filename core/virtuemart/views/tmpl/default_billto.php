<?php
/**
 *
 */
$modelVM = ZtonepageModelVirtuemart::getInstance();
$billModel = $modelVM->getBillTo();
$billTo = $billModel['fields'];
$class = 'zt-opc-billto';
foreach(array('username', 'password', 'password2', 'delimiter_userinfo', 'agreed') as $item){
    unset($billTo[$item]);
}
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">1</div><?php echo ZtonepageHelperText::_('BILL_TO'); ?>
    </h3>

    <!-- @todo Show sort information here -->

    <!-- BT address -->
    <div class="inner-wrap">
        <span class="label label-info"><?php echo JFactory::getUser()->email; ?></span>
        <p></p>
        <!-- @todo Show Edit button to expand below form -->
        <div class="edit-address billto" >

            <?php foreach ($billTo as $bill) : ?>
                        <div id="<?php echo $bill['name']; ?>-group" class="form-group">
                            <div class="inner">
                                <label for="<?php echo $bill['name']; ?>_field" class="<?php echo $bill['name']; ?>"><?php echo $bill['title']; ?> <?php echo ($bill['required'] == 1) ? '<span class="required">*</span>' : ''; ?></label>
                                <?php echo $bill['formcode']; ?>
                            </div>
                        </div>
            <?php endforeach; ?>
            <fieldset>
                <input type="hidden" name="address_type" value="BT">
            </fieldset>

        </div>
    </div>
</div>
