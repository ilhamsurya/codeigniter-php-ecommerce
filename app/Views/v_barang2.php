<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/news.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4accff97b9.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="searchb" method="get">
        <div class="input-group mb-3" style="width: 500px">
            <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian" name="cari"
                autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <a href="<?php echo base_url('barang/tambah'); ?>" class="btn btn-success float-right mb-3">Tambah Barang</a>
    <a href="<?php echo base_url('barang/keranjang'); ?>" class="btn btn-warning float-right mb-3">Lihat Keranjang</a>
    <br>
    <br>
    <div class="site-section bg-light">
        <!-- CONTENT SECTION -->
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">
                        <div class="logo">
                        </div> Barang Section
                        <?php
                        if(session()->getFlashdata('pesan')){
                            echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="true">
                                   &times;
                                </button>';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                         ?>
                    </h2>
                    <p class="lead">Menampilkan Daftar Barang</p>

                </div>
            </div>
            <div class="row">
                <?php foreach ($barang as $key => $row) {?>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <?php
                     echo form_open('barang/beli');
                     echo form_hidden('id', $row->id_barang);
                     echo form_hidden('price', $row->harga);
                     echo form_hidden('name', $row->nama_barang);
                     echo form_hidden('gambar', $row->gambar);
                     echo form_hidden('berat', $row->berat);
                     echo form_hidden('stok', $row->stok);
                     ?>

                    <img class="img-thumbnail" style="width:200px"
                        src="<?=base_url('assets/images/'.$row->gambar);?>" />
                    <h2><a href="#"><?=$row->nama_barang?></a></h2>
                    <p>
                        <h5>Rp. <?php echo number_format($row->harga,0,",",".");?></h5>
                        <h5><?php echo number_format($row->berat,0,",",".");?> Kg</h5>
                    </p>
                    <a href="<?php echo base_url();?>barang/detail_produk/<?php echo $row->id_barang;?>"
                        class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a>
                    <button type="submit" class="btn btn-sm btn-success"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Beli</button>

                    <?php form_close(); ?>
                </div>


            </div>
        </div>
    </div>
    <?php }?>
    </div>

    </div>
    </div>
    <br>
    <br>



</body>
</div>
<?= $this->endSection() ?>