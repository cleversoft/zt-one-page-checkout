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
            <table class="cart-summary">
                <!-- Begin Heading -->
                <thead>
                <tr>
                    <th align="left" class="col-name"><?php echo vmText::_('COM_VIRTUEMART_CART_NAME') ?></th>
                    <th align="center" class="col-qty"><?php echo vmText::_('COM_VIRTUEMART_CART_QUANTITY') ?></th>
                    <th align="right" class="col-total" colspan="4"
                        style="text-align: right"><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL') ?></th>
                </tr>
                </thead>
                <!-- End heading -->
                <?php
                $i = 1;

                foreach ($this->cart->products as $pKey => $prow)
                {
                ?>
                <?php
                $model = ZtonepageModelVirtuemart::getInstance();
                $media = $model->getMedia($prow->virtuemart_product_id);
                ?>
                <tbody>
                <tr valign="top" class="sectiontableentry<?php echo $i ?>">
                    <input type="hidden" name="cartpos[]" value="<?php echo $pKey ?>">
                    <!-- Name -->
                    <td class="col-name">
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
                        <span><?php echo vmText::_('COM_VIRTUEMART_CART_SKU') ?>
                            : <?php echo $prow->product_sku ?></span><br/>
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
                    </td>
                    <!-- Quantity -->
                    <td align="center" class="col-qty"><?php
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
                               size="3" maxlength="4" name="quantity[<?php echo $pKey; ?>]"
                               value="<?php echo $prow->quantity ?>"/>
                    </td>

                    <td class="col-total nowrap" align="right" colspan="2">
                        <?php
                        if (VmConfig::get('checkout_show_origprice', 1) && !empty($prow->prices['basePriceWithTax']) && $prow->prices['basePriceWithTax'] != $prow->prices['salesPrice']) {
                            echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv('basePriceWithTax', '', $prow->prices, TRUE, FALSE, $prow->quantity) . '</span><br />';
                        } elseif (VmConfig::get('checkout_show_origprice', 1) && empty($prow->prices['basePriceWithTax']) && $prow->prices['basePriceVariant'] != $prow->prices['salesPrice']) {
                            echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv('basePriceVariant', '', $prow->prices, TRUE, FALSE, $prow->quantity) . '</span><br />';
                        }
                        echo $this->currencyDisplay->createPriceDiv('salesPrice', '', $prow->prices, FALSE, FALSE, $prow->quantity)
                        ?></td>
                </tr>
                <tr class="product-hover soft-hide">
                    <td colspan="4">
                        <div class="<?php echo $class; ?>-arrow-box">
                            <div class="<?php echo $class; ?>-p-info-table">
                                <div class="row">
                                    <?php if ($media) : ?>
                                        <div class="<?php echo $class; ?>-product-image col-sm-6 col-md-6">
                                            <div class="p-info-inner">
                                                <img class="img-reponsive" alt="image1xxl83"
                                                     src="<?php echo $media->imageUrl; ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="<?php echo $class; ?>-p-info col-sm-6 col-md-6">
                                        <div class="p-info-inner">
                                            <div class="<?php echo $class; ?>-product-name">
                                                <?php echo JHtml::link($prow->url, $prow->product_name); ?>
                                            </div>
                                        </div>
                                        <div class="add-padding">
                                            <?php
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
                                                   size="3" maxlength="4" name="quantity[<?php echo $pKey; ?>]"
                                                   value="<?php echo $prow->quantity ?>"/>

                                            <button
                                                type="button"
                                                class="vmicon vm2-add_quantity_cart"
                                                title="<?php echo vmText::_('COM_VIRTUEMART_CART_UPDATE') ?>"
                                                onClick="zt.onepagecheckout.updateCartQuantity(<?php echo $pKey; ?>);"
                                                />
                                            <button
                                                type="button"
                                                class="vmicon vm2-remove_from_cart"
                                                title="<?php echo vmText::_('COM_VIRTUEMART_CART_DELETE') ?>"
                                                onClick="zt.onepagecheckout.removeCartItem(<?php echo $pKey; ?>);"
                                                />
                                        </div>
                                    </div>
                                </div>
                                <p><span class="pull-left">Price</span><span class="pull-right PricediscountedPriceWithoutTax">$202.70</span></p>
                                <div class="clearfix"></div>
                                <p><span class="pull-left">Total</span><span class="pull-right PricesalesPrice">$810.82</span></p>
                    </td>
    </div>
</div>
    </td>
    </tr>
    </tbody>
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
<tbody>
<tr class="sectiontableentry1 price-nomal">
    <td colspan="1"><?php echo vmText::_('COM_VIRTUEMART_ORDER_PRINT_PRODUCT_PRICES_TOTAL'); ?></td>

    <?php
    if (VmConfig::get('show_tax')) {
        ?>
        <td><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('taxAmount', '', $this->cart->cartPrices, FALSE) . "</span>" ?></td>
    <?php } ?>
    <td><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('discountAmount', '', $this->cart->cartPrices, FALSE) . "</span>" ?></td>
    <td><?php echo $this->currencyDisplay->createPriceDiv('salesPrice', '', $this->cart->cartPrices, FALSE) ?></td>
</tr>
</tbody>

<?php
if (VmConfig::get('coupons_enable')) {
    ?>
    <tbody>
    <tr class="sectiontableentry2">
        <td colspan="1">
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
            <td>&nbsp;</td>
        <?php
        }
        ?>
    </tr>
    </tbody>
<?php } ?>
<?php
foreach ($this->cart->cartData['DBTaxRulesBill'] as $rule) {
    ?>
    <tbody>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="1"><?php echo $rule['calc_name'] ?> </td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>
        <?php } ?>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?></td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    </tbody>
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
    <tbody>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="1"><?php echo $rule['calc_name'] ?> </td>
        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
        <?php } ?>
        <td><?php ?> </td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    </tbody>
    <?php
    if ($i) {
        $i = 1;
    } else {
        $i = 0;
    }
}

foreach ($this->cart->cartData['DATaxRulesBill'] as $rule) {
    ?>
    <tbody>
    <tr class="sectiontableentry<?php echo $i ?>">
        <td colspan="1"><?php echo $rule['calc_name'] ?> </td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>

        <?php } ?>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?>  </td>
        <td><?php echo $this->currencyDisplay->createPriceDiv($rule['virtuemart_calc_id'] . 'Diff', '', $this->cart->cartPrices[$rule['virtuemart_calc_id'] . 'Diff'], FALSE); ?> </td>
    </tr>
    </tbody>
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
    <tbody>
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
    </tbody>
<?php } ?>
<?php
if ($this->cart->pricesUnformatted['salesPrice'] > 0.0 and (VmConfig::get('oncheckout_opc', true) or !VmConfig::get('oncheckout_show_steps', false) or ((!VmConfig::get('oncheckout_opc', true) and VmConfig::get('oncheckout_show_steps', false)) and !empty($this->cart->virtuemart_paymentmethod_id))
    )
) {
    ?>
    <tbody>
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
    </tbody>
<?php } ?>
<tbody>
<tr class="sectiontableentry2">
    <td colspan="1"><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL') ?>:</td>

    <?php
    if (VmConfig::get('show_tax')) {
        ?>
        <td> <?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('billTaxAmount', '', $this->cart->cartPrices['billTaxAmount'], FALSE) . "</span>" ?> </td>
    <?php } ?>
    <td> <?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv('billDiscountAmount', '', $this->cart->cartPrices['billDiscountAmount'], FALSE) . "</span>" ?> </td>
    <td>
        <strong><?php echo $this->currencyDisplay->createPriceDiv('billTotal', '', $this->cart->cartPrices['billTotal'], FALSE); ?></strong>
    </td>
</tr>
</tbody>
<?php
if ($this->totalInPaymentCurrency) {
    ?>
    <tbody>
    <tr class="sectiontableentry2">
        <td><?php echo vmText::_('COM_VIRTUEMART_CART_TOTAL_PAYMENT') ?>:</td>

        <?php
        if (VmConfig::get('show_tax')) {
            ?>
            <td></td>
        <?php } ?>
        <td></td>
        <td><strong><?php echo $this->totalInPaymentCurrency; ?></strong></td>
    </tr>
    </tbody>
<?php
}
?>

</table>
</fieldset>
</div>
</div>

