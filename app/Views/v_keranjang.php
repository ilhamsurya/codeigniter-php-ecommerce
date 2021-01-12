<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- Font Awesome -->
<!-- Custom fonts for this theme -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php echo form_open('barang/update'); ?>
<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-shopping-cart"></i> Keranjang Anda
                <small class="pull-right">Date: </small>
            </h2>
        </div>
        <!-- /.col -->
    </div>

    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th width="300px">Nama Barang</th>
                        <th>Harga</th>
                        <th width="100px">Berat</th>
                        <th width="100px">Gambar</th>
                        <th width="100px">Qty</th>
                        <th>Subtotal</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $keranjang = $cart->contents();
                        $tot_berat = 0;
                        $i = 1;
                        foreach($keranjang as $key => $value){
                            $tot_berat = $tot_berat + ($value['qty'] * $value['options']['berat']); ?>
                    <tr>

                        <td><?= $value['name']?></td>
                        <td>Rp.<?= $value['price']?></td>
                        <td><?= $value['qty'] * $value['options']['berat']?> Kg</td>
                        <td><img class="img-responsive"
                                src="<?=base_url('assets/images/'.$value['options']['gambar']); ?>"></td>
                        <td><input type="number" name="qty<?= $i++ ?>" min="1" class="form-control"
                                value="<?= $value['qty']?>"></td>
                        <td>Rp.<?= $value['subtotal']?></td>
                        <td>
                            <a href="<?= base_url('barang/delete/'.$value['rowid']) ?>" class="btn btn-sm btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
            <div class="table-responsive ">
                <table class="table pull-right">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp.<?= $cart->total()?></td>
                    </tr>
                    <tr>
                        <th>Total Berat</th>
                        <?php $temp = fmod ( $tot_berat , 1.0 ) ;
                                    if ($temp<=0.3){
                                     $tot_berat = $tot_berat-$temp;
                                    }
                                    else{
                                        $tot_berat = $tot_berat-$temp;
                                        $tot_berat++;
                                    }?>
                        <td><?= $tot_berat ?>Kg</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('barang/checkout') ?>"><i class="fa fa-credit-card">Checkout</i></a>

            <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-save"></i> Update
            </button>
        </div>
    </div>
    <?php echo form_close(); ?>
</section>
<?= $this->endSection() ?>