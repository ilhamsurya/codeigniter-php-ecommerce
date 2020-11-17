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
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <title><?= $title ?></title>
</head>
<body>
    <form action="<?php echo base_url('search'); ?>" method="GET">
        <input name="search" id="search" type="text" placeholder="Masukan Nama">
        <input id="submit" type="submit" value="Search">
    </form>
    <a href="<?php echo base_url('mahasiswa/tambah'); ?>" class="btn btn-success float-right mb-3">Tambah Mahasiswa</a>
        <div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
            <th>Umur</th>
            <th>Aksi</th>
           
        </tr>
        <?php  $no=1; foreach ($mahasiswa as $mhs) { ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $mhs->nim ?></td>
            <td><?= $mhs->nama ?></td>
            <td><?= $mhs->umur?></td>
            <td>
            <a  class="btn btn-primary" href="/mahasiswa/detail/<?=$mhs->nim?>">View</a>
            <a  class="btn btn-warning" href="/mahasiswa/edit/<?=$mhs->nim?>">Edit</a>
            <a  class="btn btn-danger" href="/mahasiswa/delete/<?=$mhs->nim?>">Delete</a>
            </td>

        </tr>
        <?php  $no++;} ?>
    </table>

 
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?= $this->endSection() ?>