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
                <h3 class="pull-right"><?=$order->id_penjualan ?></h3>
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
                        Kecamatan: <?=$order->kecamatan ?><br>
                        Kota tujuan: <?=$order->kota_tujuan ?><br>


                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Metode Pembayaran</strong><br>
                        Total
                        Pembelian:<strong>Rp.<?php echo number_format($invoice->total, 0, ',', '.'); ?></strong><br>
                        Bank: Bank Indonesia<br>
                        Ongkir:<strong>Rp. <?php echo number_format($invoice->biaya_ongkir, 0, ',', '.'); ?></strong>
                        <?php
                        $subtotal =  $invoice->total + $invoice->biaya_ongkir ?>
                        <br>
                        Total:<strong>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></strong>

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


</div>
<?= $this->endSection() ?>