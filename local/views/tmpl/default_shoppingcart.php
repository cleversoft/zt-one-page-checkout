<?php
/**
 *
 */
$class = 'zt-opc-cart';
?>

<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        <div class="zt-opc-step <?php echo $class; ?>-step">6</div>Shopping cart
    </h3>
    <div class="inner-wrap">
        <table width="100%" cellspacing="0" cellpadding="0" class="<?php echo $class; ?>-summery">
            <thead>
                <tr>
                    <th align="left" class="col-name">Name</th>
                    <th align="center" class="col-qty">Quantity</th>
                    <th align="right" class="col-total">Total</th>
                </tr>
            </thead>
            <tbody data-details="<?php echo $class; ?>-details1" class="<?php echo $class; ?>-product">
                <?php // Foreach To Get Data Cart  ?>
                <tr valign="top" class="<?php echo $class; ?>-cart-entry1 <?php echo $class; ?>-p-list">
                    <td class="col-name">
                        <a href="#">Lorem ipsum dolor sit amet</a>
                        <div class="<?php echo $class; ?>-p-price">
                            <span>Price: </span>
                            <span class="price-discounted price-without-tax nowrap">250,00 €</span>
                        </div>
                        <div class="<?php echo $class; ?>-p-sku">SKU: 001</div>
                    </td>
                    <td align="center" class="col-qty">1</td>
                    <td align="right" colspan="1" class="col-total nowrap">
                        <div class="price-sales vm-display vm-price-value"><span class="vm-price-desc"></span><span>250,00 €</span></div>
                    </td>
                </tr>
                <tr class="<?php echo $class; ?>-product-hover soft-hide" id="<?php echo $class; ?>-product-details1"  style="opacity: 0; top: 0px; display: none;">
                    <td colspan="4">
                        <div class="<?php echo $class; ?>_arrow_box">
                            <table class="<?php echo $class; ?>-p-info-table">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="<?php echo $class; ?>-p-info noimage">
                                                <div class="p-info-inner">
                                                    <div class="<?php echo $class; ?>-product-name"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing 001</a>
                                                        <div class="vm-customfield-cart"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="add-padding">
                                        <td width="35%" class="<?php echo $class; ?>-qty-title">Quantity</td>
                                        <td width="65%">
                                            <div class="<?php echo $class; ?>-qty-update">
                                                <div class="<?php echo $class; ?>-input-append">
                                                    <input type="text" value="1" name="quantity[0]" maxlength="4" size="1" class="inputbox <?php echo $class; ?>-qty-input" title="Update Quantity In Cart">
                                                    <button title="Update Quantity In Cart" name="updatecart" class="<?php echo $class; ?>-btn"><i class="<?php echo $class; ?>-icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <span class="<?php echo $class; ?>-delete-product">
                                                <button title="Delete Product From Cart" name="delete.0" class="remove_from_cart <?php echo $class; ?>-btn"><i class="<?php echo $class; ?>-icon-trash"></i></button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="add-padding add-padding-top">
                                        <td width="35%">Price</td>
                                        <td width="65%" align="right" class="col-price nowrap">
                                            <span class="price-discounted price-without-tax">250,00 €</span>
                                        </td>
                                    </tr>
                                    <tr class="add-padding add-padding-bottom">
                                        <td width="35%">Total</td>
                                        <td width="65%" align="right" class="col-total-price nowrap">
                                            <div class="price-sales vm-display vm-price-value"><span
                                                    class="vm-price-desc"></span><span>250,00 €</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <?php //--> Foreach To Get Data Cart  ?>
            </tbody>

            <?php // Product prices result  ?>
            <tbody class="<?php echo $class; ?>-subtotal">
                <tr class="<?php echo $class; ?>-cart-sub-total">
                    <td align="left" colspan="2" class="sub-headings">Product prices result</td>
                    <td align="right" class="col-total">
                        <div class="price-sales vm-display vm-price-value"><span class="vm-price-desc"></span><span>500,00 €</span></div>
                    </td>
                </tr>
            </tbody>

            <?php // Shipment Method  ?>
            <tbody class="<?php echo $class; ?>-shipment-table">
                <tr>
                    <td align="left" colspan="2" class="shipping-heading">
                        <span class="vmshipment_name">ATM</span>
                    </td>
                    <td align="right" class="col-total">
                    </td>
                </tr>
            </tbody>

            <?php // Payment Method  ?>
            <tbody class="<?php echo $class; ?>-payment-table">
                <tr>
                    <td align="left" colspan="2" class="payment-heading">No payment selected</td>
                    <td align="right" class="col-total nowrap"></td>
                </tr>
            </tbody>

            <?php // Total Price  ?>
            <tbody class="<?php echo $class; ?>-grand-total">
                <tr class="grand-total">
                    <td align="left" colspan="2" class="sub-headings">Total</td>
                    <td align="right" class="col-total nowrap">
                        <div class="price-bill-total vm-display vm-price-value"><span class="vm-price-desc"></span><span>500,00 €</span></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>