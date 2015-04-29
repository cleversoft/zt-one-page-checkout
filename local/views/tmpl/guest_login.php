<?php
$class = 'zt-opc-';
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
                        <input type="checkbox" alt="Remember me" value="yes" class="inputbox" name="remember" id="<?php echo $class; ?>-remember">Remember me</label>
                </div>
            </div>
            <div class="<?php echo $class; ?>-login-inputs">
                <div class="form-group">
                    <div class="<?php echo $class; ?>-input <?php echo $class; ?>-input-prepend">
                        <button class="btn btn-info" type="submit">Login And Checkout</button>
                    </div>
                </div>
            </div>
            <div class="<?php echo $class; ?>-login-inputs">
                <div class="form-group">
                    <div class="<?php echo $class; ?>-input">
                        <ul class="<?php echo $class; ?>-ul">
                            <li><a href="#">Forgot your username?</a></li>
                            <li><a href="#">Forgot your password?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>