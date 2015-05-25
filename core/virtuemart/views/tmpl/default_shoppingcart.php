<?php
/**
 *
 */
$class = 'zt-opc-cart';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
<h3 class="<?php echo $class; ?>-title zt-opc-title">
    <div class="zt-opc-step <?php echo $class; ?>-step">6</div><?php echo ZtonepageHelperText::_('CART'); ?>
</h3>

<!-- @todo Show sort information here -->

<!-- BT address -->
<div class="inner-wrap">
<fieldset class="vm-fieldset-pricelist">
<table class="cart-summary table">
<!-- Begin Heading -->
<thead>
    <tr>
        <th colspan="3"><?php echo vmText::_('COM_VIRTUEMART_CART_NAME') ?></th>
        <th colspan="2"><?php echo vmText::_('COM_VIRTUEMART_CART_QUANTITY') ?></th>
        <th colspan="5" style="text-align: right"><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL') ?></th>
    </tr>
</thead>
<!-- End heading -->
<?php
$i = 1;

foreach ($this->cart->products as $pKey => $prow) {
    ?>

    <tr valign="top" class="sectiontableentry<?php echo $i ?>">
        <input type="hidden" name="cartpos[]" value="<?php echo $pKey ?>">
        <!-- Name -->
        <th colspan="3">
            <?php
            if ($prow->virtuemart_media_id) {
                ?>
                <span class="cart-images">
                        <?php
                        if (!empty($prow->images[0])) {
                            echo $prow->images[0]->displayMediaThumb('', FALSE);
                        }
                        ?>
                    </span>
            <?php } ?>
            <?php
            echo JHtml::link($prow->url, $prow->product_name);
            echo $this->customfieldsModel->CustomsFieldCartDisplay($prow);
            ?>
            <span><?php echo vmText::_('COM_VIRTUEMART_CART_SKU') ?>: <?php echo $prow->product_sku ?></span><br />
            <span><span class="pull-left"><?php echo vmText::_('COM_VIRTUEMART_CART_PRICE') ?>: </span>
            <?php
            if (VmConfig::get('checkout_show_origprice', 1) && $prow->prices['discountedPriceWithoutTax'] != $prow->prices['priceWithoutTax']) {
                echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv('basePriceVariant', '', $prow->prices, TRUE, FALSE) . '</span><br />';
            }

            if ($prow->prices['discountedPriceWithoutTax']) {
                echo $this->currencyDisplay->createPriceDiv('discountedPriceWithoutTax', '', $prow->prices, FALSE, FALSE);
            } else {
                echo $this->currencyDisplay->createPriceDiv('basePriceVariant', '', $prow->prices, FALSE, FALSE);
            }
            ?>
            </span>
        </th>
        <!-- Quantity -->
        <th colspan="2" style="text-align: center"><?php
            if ($prow->step_order_level)
                $step = $prow->step_order_level;
            else
                $step = 1;
            if ($step == 0)
                $step = 1;
            ?>
            <input type="text"
                   title="<?php echo vmText::_('COM_VIRTUEMART_CART_UPDATE') ?>"
                   class="quantity-input js-recalculate"
                   id="zt-opc-shoppingcart-pid-<?php echo $pKey; ?>"
                   size="3" maxlength="4" name="quantity[<?php echo $pKey; ?>]" value="<?php echo $prow->quantity ?>"/>
        </th>

        <th colspan="5" style="text-align: right">
            <?php
            if (VmConfig::get('checkout_show_origprice', 1) && !empty($prow->prices['basePriceWithTax']) && $prow->prices['basePriceWithTax'] != $prow->prices['salesPrice']) {
                echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv('basePriceWithTax', '', $prow->prices, TRUE, FALSE, $prow->quantity) . '</span><br />';
            } elseif (VmConfig::get('checkout_show_origprice', 1) && empty($prow->prices['basePriceWithTax']) && $prow->prices['basePriceVariant'] != $prow->prices['salesPrice']) {
                echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv('basePriceVariant', '', $prow->prices, TRUE, FALSE, $prow->quantity) . '</span><br />';
            }
            echo $this->currencyDisplay->createPriceDiv('salesPrice', '', $prow->prices, FALSE, FALSE, $prow->quantity)
            ?></th>
    </tr>
    <?php
    $i = ($i == 1) ? 2 : 1;
}
?>
<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
<?php
if (VmConfig::get('show_tax')) {
    $colspan = 3;
} else {
    $colspan = 2;
}
?>
<tr class="sectiontableentry1 price-nomal">
    <td colspan="3"><?php echo vmText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_PRICES_TOTAL'); ?></td>

    <?php
    if (VmConfig::get('show_tax')) {
        ?>
        <td colspan="1"><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('taxAmount', '', $this->cart->cartPrices, FALSE) . "</span>" ?></td>
    <?php } ?>
    <td colspan="1"><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('discountAmount', '', $this->cart->cartPrices, FALSE) . "</span>" ?></td>
    <td colspan="5"><?php echo $this->currencyDisplay->createPriceDiv('salesPrice', '', $this->cart->cartPrices, FALSE) ?></td>
</tr>

<?php
if (VmConfig::get('coupons_enable')) {
    ?>
    <tr class="sectiontableentry2">
        <td colspan="4">
            <?php
            if (!empty($this->layoutName) && $this->layoutName == 'default') {
                //echo $this->loadTemplate('coupon');
            }
            ?>

            <?php
            if (!empty($this->cart->cartData['couponCode']))
            {
            ?>
            <?php
            echo $this->cart->cartData['couponCode'];
            echo $this->cart->cartData['couponDescr'] ? (' (' . $this->cart->cartData['couponDescr'] . ')') : '';
            ?>
        </td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td><?php echo $this->currencyDisplay->createPriceDiv('couponTax', '', $this->cart->cartPrices['couponTax'], FALSE); ?> </td>
        <?php } ?>
        <td></td>
        <td><?php echo $this->currencyDisplay->createPriceDiv('salesPriceCoupon', '', $this->cart->cartPrices['salesPriceCoupon'], FALSE); ?> </td>
        <?php
        } else {
            ?>
            <td colspan="6">&nbsp;</td>
        <?php
        }
        ?>
    </tr>
<?php } ?>
<?php
foreach ($this->cart->cartData['DBTaxRulesBill'] as $rule) {
    ?>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="4"><?php echo $rule['calc_name'] ?> </td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>
        <?php } ?>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?></td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    <?php
    if ($i) {
        $i = 1;
    } else {
        $i = 0;
    }
}
?>

<?php
foreach ($this->cart->cartData['taxRulesBill'] as $rule) {
    ?>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="4"><?php echo $rule['calc_name'] ?> </td>
        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
        <?php } ?>
        <td><?php ?> </td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    <?php
    if ($i) {
        $i = 1;
    } else {
        $i = 0;
    }
}

foreach ($this->cart->cartData['DATaxRulesBill'] as $rule) {
    ?>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="4"><?php echo $rule['calc_name'] ?> </td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>

        <?php } ?>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?>  </td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    <?php
    if ($i) {
        $i = 1;
    } else {
        $i = 0;
    }
}
?>

<?php
if (VmConfig::get('oncheckout_opc', true) or !VmConfig::get('oncheckout_show_steps', false) or (!VmConfig::get('oncheckout_opc', true) and VmConfig::get('oncheckout_show_steps', false) and !empty($this->cart->virtuemart_shipmentmethod_id))
) {
    ?>
    <tr class="sectiontableentry1">
        <?php
        if (!$this->cart->automaticSelectedShipment) {
            ?>
            <td colspan="4">
            <?php
            echo '<h3>' . vmText::_('COM_VIRTUEMART_CART_SELECTED_SHIPMENT') . '</h3>';
            echo $this->cart->cartData['shipmentName'] . '<br/>';

            if (!empty($this->layoutName) and $this->layoutName == 'default') {
                if (VmConfig::get('oncheckout_opc', 0)) {
                    $previouslayout = $this->setLayout('select');
                    //echo $this->loadTemplate('shipment');
                    $this->setLayout($previouslayout);
                } else {
                    echo JHtml::_('link', JRoute::_('index.php?option=com_virtuemart&view=cart&task=edit_shipment', $this->useXHTML, $this->useSSL), $this->select_shipment_text, 'class=""');
                }
            } else {
                echo vmText::_('COM_VIRTUEMART_CART_SHIPPING');
            }
            echo '</td>';
        } else {
            ?>
            <td colspan="4">
                <?php echo '<h4>' . vmText::_('COM_VIRTUEMART_CART_SELECTED_SHIPMENT') . '</h4>'; ?>
                <?php echo $this->cart->cartData['shipmentName']; ?>
            </td>
        <?php } ?>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('shipmentTax', '', $this->cart->cartPrices['shipmentTax'], FALSE) . "</span>"; ?> </td>
        <?php } ?>
        <td><?php if ($this->cart->cartPrices['salesPriceShipment'] < 0) echo $this->currencyDisplay->createPriceDiv('salesPriceShipment', '', $this->cart->cartPrices['salesPriceShipment'], FALSE); ?></td>
        <td><?php echo $this->currencyDisplay->createPriceDiv('salesPriceShipment', '', $this->cart->cartPrices['salesPriceShipment'], FALSE); ?> </td>
    </tr>
<?php } ?>
<?php
if ($this->cart->pricesUnformatted['salesPrice'] > 0.0 and (VmConfig::get('oncheckout_opc', true) or !VmConfig::get('oncheckout_show_steps', false) or ((!VmConfig::get('oncheckout_opc', true) and VmConfig::get('oncheckout_show_steps', false)) and !empty($this->cart->virtuemart_paymentmethod_id))
    )
) {
    ?>
    <tr class="sectiontableentry1">
        <?php
        if (!$this->cart->automaticSelectedPayment) {
            ?>
            <td colspan="4">
                <?php
                echo '<h3>' . vmText::_('COM_VIRTUEMART_CART_SELECTED_PAYMENT') . '</h3>';
                echo $this->cart->cartData['paymentName'] . '<br/>';

                if (!empty($this->layoutName) && $this->layoutName == 'default') {
                    if (VmConfig::get('oncheckout_opc', 0)) {
                        $previouslayout = $this->setLayout('select');
                        //echo $this->loadTemplate('payment');
                        $this->setLayout($previouslayout);
                    } else {
                        echo JHtml::_('link', JRoute::_('index.php?option=com_virtuemart&view=cart&task=editpayment', $this->useXHTML, $this->useSSL), $this->select_payment_text, 'class=""');
                    }
                } else {
                    echo vmText::_('COM_VIRTUEMART_CART_PAYMENT');
                }
                ?> </td>

        <?php
        } else {
            ?>
            <td colspan="4">
                <?php echo '<h4>' . vmText::_('COM_VIRTUEMART_CART_SELECTED_PAYMENT') . '</h4>'; ?>
                <?php echo $this->cart->cartData['paymentName']; ?> </td>
        <?php } ?>
        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('paymentTax', '', $this->cart->cartPrices['paymentTax'], FALSE) . "</span>"; ?> </td>
        <?php } ?>
        <td><?php if ($this->cart->cartPrices['salesPricePayment'] < 0) echo $this->currencyDisplay->createPriceDiv('salesPricePayment', '', $this->cart->cartPrices['salesPricePayment'], FALSE); ?></td>
        <td><?php echo $this->currencyDisplay->createPriceDiv('salesPricePayment', '', $this->cart->cartPrices['salesPricePayment'], FALSE); ?> </td>
    </tr>
<?php } ?>
<tr class="sectiontableentry2">
    <td colspan="2"><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL') ?>:</td>

    <?php
    if (VmConfig::get('show_tax')) {
        ?>
        <td colspan="4"> <?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('billTaxAmount', '', $this->cart->cartPrices['billTaxAmount'], FALSE) . "</span>" ?> </td>
    <?php } ?>
    <td colspan="0" style="display: none"> <?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('billDiscountAmount', '', $this->cart->cartPrices['billDiscountAmount'], FALSE) . "</span>" ?> </td>
    <td colspan="4">
        <strong><?php echo $this->currencyDisplay->createPriceDiv('billTotal', '', $this->cart->cartPrices['billTotal'], FALSE); ?></strong>
    </td>
</tr>
<?php
if ($this->totalInPaymentCurrency) {
    ?>

    <tr class="sectiontableentry2">
        <td colspan="4"><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL_PAYMENT') ?>:</td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>
        <?php } ?>
        <td colspan="3"></td>
        <td colspan="3"><strong><?php echo $this->totalInPaymentCurrency; ?></strong></td>
    </tr>
<?php
}
?>

</table>
</fieldset>
</div>
</div>

