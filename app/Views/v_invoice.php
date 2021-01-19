<?= $this->extend('v_template2') ?>

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
                <th>Alamat Pengiriman</th>
                <th>Total Penjualan</th>
                <th>Total Ongkir</th>
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
                <?=$value->alamat?>

            </td>
            <td>
                <?=$value->total?>

            </td>
            <td>
                <?=$value->total_ongkir?>

            </td>
            <td>
                <?=$value->tanggal?>

            </td>


            <td>

            </td>
            </tr>
            <?php  $no++;} ?>
        </table>
    </div>
</div>



<?= $this->endSection() ?>