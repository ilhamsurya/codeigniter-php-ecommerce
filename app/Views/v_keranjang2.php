<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
 $keranjang = $cart->contents();
 $jml_item = 0;
 foreach($keranjang as $key => $value){
    $jml_item = $jml_item + $value['qty'];
 }
 ?>
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span>
                                    :
                                    <?php echo $jml_item ?> barang dalam keranjang</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    if(empty($keranjang)){
                    ?>
                    <p>Keranjang Anda Kosong</p>
                    <?php    
                    }else {
                    foreach ($keranjang as $key => $value) {
                        ?>

                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive"
                                src="<?=base_url('assets/images/'.$value['options']['gambar']); ?>">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong>
                                    <?php echo $value['name'] ?></strong></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>
                                        Rp. <?php echo $value['subtotal'] ?><span class="text-muted"></span></strong>
                                </h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value=<?php echo $value['qty'] ?>>
                                <input type="text" class="form-control input-sm" value=<?php echo $value['price'] ?>>
                            </div>

                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }?>
                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">Added items?</h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-default btn-sm btn-block">
                                    Update cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    <hr>
                    <hr>

                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total Rp.<strong>
                                </strong> <?= $cart->total() ?></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>