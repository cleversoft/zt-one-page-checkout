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
        <div class="zt-opc-step <?php echo $class; ?>-step">1</div>Bill To
    </h3>
    <div class="inner-wrap">
        <div class="edit-address">
            <form autocomplete="off" id="<?php echo $class; ?>-form">
                <?php foreach($billTo as $bill) : ?>
                    <div id="<?php echo $bill['name']; ?>-group" class="form-group">
                        <div class="inner">
                            <label for="<?php echo $bill['name']; ?>_field" class="<?php echo $bill['name']; ?>"><?php echo $bill['title']; ?> <?php echo ($bill['required'] == 1) ? '<span class="required">*</span>' : ''; ?></label>
                            <?php echo $bill['formcode']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>