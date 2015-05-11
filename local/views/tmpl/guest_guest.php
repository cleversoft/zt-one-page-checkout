<?php
$class = 'zt-opc';
?>
<div id="<?php echo $class; ?>-wrap" class="zt-opc-element">
    <!-- Title -->
    <h3 class="<?php echo $class; ?>-title zt-opc-title">
        Checkout as Guest or Register
    </h3>
    <div class="inner-wrap">
        <!-- Guest checkout -->
        <h4 class="<?php echo $class; ?>-subtitle">Register with us for future convenience:</h4>
        <label class="<?php echo $class; ?>-switch">
            <input type="radio" autocomplete="off" checked="checked" value="guest" name="<?php echo $class; ?>-method">
            Checkout as Guest
        </label>
        <div class="<?php echo $class; ?>-guest-form">
            <div class="<?php echo $class; ?>-inner with-switch">
                <form autocomplete="off" id="<?php echo $class; ?>-user" method="post">
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-email" class="email full-input">
                                <span>E-Mail</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="text" maxlength="100" class="required" value="" size="30" name="email"
                                   id="<?php echo $class; ?>-email" style="width: 279px;">
                        </div>
                    </div>
                    <div class="<?php echo $class; ?>-login-inputs">
                        <div class="form-group">
                            <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-prepend">
                                <button type="submit" class="btn btn-info">Checkout as Guest</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Register form -->
        <label class="<?php echo $class; ?>-switch">
            <input type="radio" autocomplete="off" value="register" name="<?php echo $class; ?>-method">
            Register
        </label>

        <div class="<?php echo $class; ?>-reg-form soft-hide">
            <div class="<?php echo $class; ?>-inner with-switch">
                <form autocomplete="off" name="userForm" id="<?php echo $class; ?>-registration">
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-email-regis" class="email full-input">
                                <span>E-Mail</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="text" maxlength="100" class="required" value="" size="30" name="email1" id="<?php echo $class; ?>-email-regis">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-username" class="username full-input">
                                <span>Username</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="text" maxlength="25" value="" size="30" name="username" id="<?php echo $class; ?>-username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-name" class="name full-input">
                                <span>Displayed Name</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="text" maxlength="25" value="" size="30" name="name" id="<?php echo $class; ?>-name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-password" class="password full-input">
                                <span>Password</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="password" class="inputbox" size="30" name="password1" id="<?php echo $class; ?>-password">
                            <div class="strength-meter">
                                <div id="meter-status"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="<?php echo $class; ?>-input-group-level">
                            <label for="<?php echo $class; ?>-password2" class="password2 full-input">
                                <span>Confirm Password</span>
                            </label>
                        </div>
                        <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-append">
                            <input type="password" class="inputbox" size="30" name="password2" id="<?php echo $class; ?>-password2">
                        </div>
                    </div>

                    <div class="<?php echo $class; ?>-login-inputs">
                        <div class="form-group">
                            <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-prepend">
                                <button type="submit" class="btn btn-info">Register And Checkout </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="<?php echo $class; ?>-reg-advantages">
            <h4>Register and save time!</h4>

            <p>Register with us for future convenience:</p>
            <ul>
                <li>Fast and easy checkout</li>
                <li>Easy access to your order history and status</li>
            </ul>
        </div>
    </div>
</div>
