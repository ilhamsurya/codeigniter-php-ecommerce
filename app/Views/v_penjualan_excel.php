<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            background-color: green;
            font-family: Arial;
        }

        main {
            width: 80%;
            padding: 20px;
            background-color: white;
            min-height: 300px;
            border-radius: 5px;
            margin: 30px auto;
        }

        table {
            border-top: solid thin #000;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <main>
        <h1>Laporan Excel</h1>
        <p><a href="<?php echo base_url('cart/export_excel') ?>">Export ke Excel</a></p>
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
    </main>
</body>

</html>