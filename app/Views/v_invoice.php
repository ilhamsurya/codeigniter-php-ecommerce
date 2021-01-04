<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .invoice-title h2,
    .invoice-title h3 {
        display: inline-block;
    }

    .table>tbody>tr>.no-line {
        border-top: none;
    }

    .table>thead>tr>.no-line {
        border-bottom: none;
    }

    .table>tbody>tr>.thick-line {
        border-top: 2px solid;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2>
                <h3 class="pull-right"><?=$order->id_order ?></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Tagihan Kepada:</strong><br>
                        Nama: <?=$order->nama ?><br>
                        Alamat: <?=$order->alamat ?><br>
                        HP: <?=$order->telp ?><br>

                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Akan Dikirim Kepada:</strong><br>
                        Nama: <?=$order->nama ?><br>
                        Alamat: <?=$order->alamat ?><br>
                        HP: <?=$order->telp ?><br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Metode Pembayaran</strong><br>
                        Bank Indonesia<br>
                        lolmastah@gmail.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <?=$order->tanggal ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>No</strong></td>
                                    <td class="text-center"><strong>Nama</strong></td>
                                    <td class="text-center"><strong>Harga</strong></td>
                                    <td class="text-right"><strong>Jumlah</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$15</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$685.99</td>
                                </tr> -->
                                <?php 
                            $total = 0;
                            foreach($invoice as $key => $value) :
                                $subtotal = $value->qty * $value->harga;
                                $total += $subtotal
                            
                            ?>
                                <tr>
                                    <td><?php $value->id_brg ?></td>
                                    <td class="text-center"><?php $value->nama_brg ?></td>
                                    <td class="text-right"><?php  $value->harga ?></td>
                                    <td class="text-center"><?php  $value->qty ?></td>

                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?php echo $subtotal ?></td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Grand Total</strong></td>
                                    <td class="thick-line text-right"><?php echo $total ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>