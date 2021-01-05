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
        <table class="table table-striped">
            <tr>
                <th>Id Invoice</th>
                <th>Nama Pemesan</th>
                <th>Nomor HP</th>
                <th>Alamat Pengiriman</th>
                <th>Kecamtan Pengiriman</th>
                <th>Kota Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Aksi</th>

            </tr>
            <?php  foreach ($order as $no => $value) { ?>

            <td>
                <?=$value->id_penjualan?>
            </td>
            <td>
                <?=$value->nama?>

            </td>
            <td>
                <?=$value->telp?>

            </td>
            <td>
                <?=$value->alamat?>

            </td>
            <td>
                <?=$value->kecamatan?>

            </td>
            <td>
                <?=$value->kota_tujuan?>

            </td>
            <td>
                <?=$value->tanggal?>

            </td>
            <td>
                <a class="btn btn-primary" href="/cart/detail/<?=$value->id_penjualan?>">View</a>

            </td>

            <td>

            </td>
            </tr>
            <?php  $no++;} ?>
        </table>
    </div>
</div>



<?= $this->endSection() ?>