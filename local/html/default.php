<?php
// Html For zt onepage checkout

$class = 'zt-opc-';
?>

<style type="text/css" rel="stylesheet">
    .zt-opc-element {
        background-color: #fff;
        border: 1px solid #ddd;
        margin-bottom: 15px;
    }
    .zt-opc-element .inner-wrap{
        padding: 10px;
    }
    .zt-opc-title{
        background-color: #fafafa;
        font-size: 16px;
        font-weight: 400;
        padding: 10px 15px;
        margin-bottom: 0;
    }
    .zt-opc-step{
        background-color: #000;
        border-radius: 50%;
        color: #fff;
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        height: 18px;
        line-height: 18px;
        margin-right: 7px;
        text-align: center;
        vertical-align: 1px;
        width: 18px;
    }
    .zt-opc-element .form-group{
        margin-bottom: 5px;
    }
    .zt-opc-element .form-group label{
        display: block;
    }
    .zt-opc-element .form-group input[type="text"],
    .zt-opc-element .form-group input[type="tel"],
    .zt-opc-element .form-group input[type="password"],
    .zt-opc-element .form-group input[type="email"],
    .zt-opc-element .form-group select{
        width: 100%;
    }
</style>

<div id="<?php echo $class; ?>plugin">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <?php require_once "guest.php"; ?>
            </div>
            <div class="col-sm-6 col-md-6">
                <?php require_once "user.php"; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <?php require_once "billto.php"; ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?php require_once "shipto.php"; ?>
                <?php require_once "shipment.php"; ?>
                <?php require_once "payment.php"; ?>
                <?php require_once "coupon.php"; ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?php require_once "shoppingcart.php"; ?>
                <?php require_once "confirmpurchase.php"; ?>
            </div>
        </div>
    </div>
</div>
