<?php
/**
 *
 */
$class = 'zt-opc-cart';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title" style="background-color:#327BAA;  padding-left: 10px;
  padding-top: 5px;  padding-bottom: 0px; ">
        <div class="zt-opc-step <?php echo $class; ?>-step" style="  background-color: transparent; width: auto;">
            <i class="fa fa-check-circle-o" style="font-size: 20px;"></i>
            <span style="  text-transform: uppercase;
  font-weight: bold;
  font-size: 20px;"><?php echo ZtonepageHelperText::_('CART'); ?></span>
        </div>
    </h3>

    <!-- @todo Show sort information here -->

    <!-- BT address -->
    <div class="inner-wrap" style="padding:0px;">
        <?php echo $this->loadTemplate("cartsummary"); ?>
    </div>
    <?php echo $this->loadTemplate("coupon"); ?>
</div>

