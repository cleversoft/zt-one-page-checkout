<?php
// Html For zt onepage checkout

$class = 'zt-opc-';
?>

<div id="<?php echo $class; ?>plugin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 span6">
                <?php echo $this->loadTemplate('guest'); ?>
            </div>
            <div class="col-sm-6 col-md-6 span6">
                <?php echo $this->loadTemplate('login'); ?>
            </div>
        </div>
    </div>   
</div>
