<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Belanja</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
                    <a class="btn btn-success btn-sm ml-3" href="<?php echo base_url('barang/keranjang'); ?>">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <span class="badge badge-light">3</span>
                    </a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($barang as $key => $value) {?>

        <div class="col-12 col-md-6 col-lg-4">
            <?php
                     echo form_open('barang/beli');
                     echo form_hidden('id', $value['id_barang']);
                     echo form_hidden('price', $value['harga']);
                     echo form_hidden('name', $value['nama_barang']);
                     echo form_hidden('gambar', $value['gambar']);
                     echo form_hidden('berat', $value['berat']);
                     echo form_hidden('stok', $value['stok']);
                     ?>
            <div class="card">
                <img class="card-img-top" style="height:150px; width:100px; align-items:center"
                    src="<?=base_url('assets/images/'.$value['gambar']);?>" alt="Card image cap">
                <h4 class="card-title"><a href="product.html" title="View Product"><?=$value['nama_barang']?></a>
                </h4>
                <p class="card-text"><?=$value['deskripsi']?></p>
                <p class="card-text">Stok: <?=$value['stok']?> PCS</p>
                <p class="card-text">Berat: <?=$value['berat']?> kg</p>
                <p class="btn btn-danger btn-block">Rp.
                    <?php echo number_format($value['harga'],0,",",".");?></p>
            </div>
            <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-shopping-cart"></i>
                Beli</button>

            <?php echo form_close(); ?>
        </div>

        <?php }?>
    </div>
</div>



<?= $this->endSection() ?>