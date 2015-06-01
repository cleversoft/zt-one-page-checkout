<?php
/**
 * {$id}
 */
defined('_JEXEC') or die('Restricted access');
/**
 * @todo All html must be wrapped under form
 */
?>
<div id="zt-opc-plugin">    
    <div class="row">
        <?php if (JFactory::getUser()->guest) : ?>
            <div class="col-md-12">
                <span class="">Already registered? Click here to login</span>
                <div class="zt-opc-form-login" style="">
                    <?php
                    $class = 'zt-opc';
                    ?>
                    <div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
                        <h3 class="<?php echo $class; ?>-title zt-opc-title">Login And Checkout</h3>
                        <div class="inner-wrap">
                            <h4 class="<?php echo $class; ?>-subtitle">Already registered? Then login here:</h4>
                            <form autocomplete="off" id="<?php echo $class; ?>-login" name="<?php echo $class; ?>-login">
                                <div class="form-group">
                                    <div class="<?php echo $class; ?>-input-group-level">
                                        <label for="<?php echo $class; ?>-username" class="full-input">Username / Email</label>
                                    </div>
                                    <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                                        <input type="text" size="18" class="inputbox input-medium" name="username" id="<?php echo $class; ?>-username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="<?php echo $class; ?>-input-group-level">
                                        <label for="<?php echo $class; ?>-passwd" class="full-input">Password</label>
                                    </div>
                                    <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                                        <input type="password" size="18" class="inputbox input-medium" name="password" id="<?php echo $class; ?>-passwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                                        <label class="<?php echo $class; ?>-checkbox inline" for="<?php echo $class; ?>-remember">
                                            <input type="checkbox" alt="Remember me" value="1" class="inputbox" name="remember" id="<?php echo $class; ?>-remember"><?php echo ZtonepageHelperText::_('REMEMBER_ME'); ?></label>
                                    </div>
                                </div>
                                <div class="<?php echo $class; ?>-login-inputs">
                                    <div class="form-group">
                                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-prepend">
                                            <button class="btn btn-info" type="submit"><?php echo ZtonepageHelperText::_('LOGIN_AND_CHECKOUT'); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?php echo $class; ?>-login-inputs">
                                    <div class="form-group">
                                        <div class="<?php echo $class; ?>-input">
                                            <ul class="<?php echo $class; ?>-ul">
                                                <li><a href="#"><?php echo ZtonepageHelperText::_('FORGOT_YOUR_USERNAME'); ?></a></li>
                                                <li><a href="#"><?php echo ZtonepageHelperText::_('FORGOT_YOUR_PASSWORD'); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>        
        <?php endif; ?>
        <form id="zt-opc-cart-form" data-validation-error="<?php echo ZtonepageHelperText::_('FORM_VALIDATION_ERROR'); ?>">
            <div class="col-sm-4 col-md-4 billto">
                <div id="zt-opc-billto">
                    <?php echo $this->loadTemplate("billto"); ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div id="zt-opc-shipto">
                    <?php echo $this->loadTemplate("shipto"); ?>
                </div>
                <div id="zt-opc-shipment">
                    <?php echo $this->loadTemplate("shipment"); ?>
                </div>
                <div id="zt-opc-payment">
                    <?php echo $this->loadTemplate("payment"); ?>
                </div>
                <div id="zt-opc-coupon">
                    <?php echo $this->loadTemplate("coupon"); ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 span12">

                <div id="zt-opc-shoppingcart">
                    <?php echo $this->loadTemplate("shoppingcart"); ?>
                </div>
                <div id="zt-opc-confirmpurchase">
                    <?php echo $this->loadTemplate("confirmpurchase"); ?>
                </div>

            </div>

            <fieldset>
                <input type="hidden" name="task" value="updatecart">
                <input type="hidden" name="option" value="com_virtuemart">
                <input type="hidden" name="view" value="cart">
            </fieldset>
        </form>
    </div>
</div>
