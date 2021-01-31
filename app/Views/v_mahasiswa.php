<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title><?= $title ?></title>
</head>

<body>
    <form action="<?php echo base_url('search'); ?>" method="POST">
        <input name="search" id="search" type="text" placeholder="Masukan Nama">
        <input id="submit" type="submit" value="Search">
    </form>
    <a href="<?php echo base_url('mahasiswa/tambah'); ?>" class="btn btn-success float-right mb-3">Tambah Mahasiswa</a>
    <a href="<?php echo base_url('mahasiswa/import'); ?>" class="btn btn-warning float-right mb-3">Import Mahasiswa</a>
    <a href="<?php echo base_url('mahasiswa/grafik'); ?>" class="btn btn-primary float-right mb-3">Lihat Grafik
        Mahasiswa</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Umur</th>
                <th>Tinggi</th>
                <th>Aksi</th>

            </tr>
            <?php  foreach ($mahasiswa as $no => $mhs) { ?>
            <tr>
                <td><?= $no+1;?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['umur']?></td>
                <td><?= $mhs['tinggi']?></td>
                <td>
                    <a class="btn btn-primary" href="/mahasiswa/detail/<?=$mhs['nim']?>">View</a>
                    <a class="btn btn-warning" href="/mahasiswa/edit/<?=$mhs['nim']?>">Edit</a>
                    <a class="btn btn-danger" href="/mahasiswa/delete/<?=$mhs['nim']?>">Delete</a>
                </td>
            </tr>
            <?php  $no++;} ?>
        </table>
        <div class="content-wrapper">
    <?php 
if(isset($grafik)){
foreach($grafik as $data){
    $total[] = $data['tinggi'];
    $month[] = $data['nama'];
}
}
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">Grafik Tinggi Mahasiswa</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="100%" height="45"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/filter.js"></script>
<?php if(isset($grafik)){?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>
    var chart = document.getElementById("myChart").getContext('2d');
    var areaChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($month); ?> ,
            datasets : [{
                label: "Grafik Tinggi Mahasiswa",
                data: <?php echo json_encode($total); ?> ,
                backgroundColor : [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 253, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 255, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 253, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 255, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginZero: true
                    }
                }]
            }
        }
    });
</script>
<?php } ?>
        <?= $pager->links() ?>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

</body>

</html>

<?= $this->endSection() ?>