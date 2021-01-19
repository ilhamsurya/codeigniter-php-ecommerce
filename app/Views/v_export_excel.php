<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>

            <th>Id Invoice</th>
            <th>Nama Pemesan</th>

            <th>Alamat Pengiriman</th>
            <th>Total Penjualan</th>
            <th>Total Ongkir</th>
            <th>Tanggal Pemesanan</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($order as $no => $value) { ?>
        <tr>
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
        </tr>
        <?php  } ?>

    </tbody>

</table>