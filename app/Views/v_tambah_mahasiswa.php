<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>

    <div class="container mt-5 mb-5 text-center">
        <a href="<?= base_url('mahasiswa');?>" class="btn btn-secondary mb-2">Kembali</a>
    </div>
    <!-- cek validasi -->
    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    if(!empty($errors)){ ?>
    <div class="alert alert-danger" role="alert">
        Whoops! Ada kesalahan saat input data, yaitu:
        <ul>
            <?php foreach ($errors as $error) : ?>
            <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php
                    }
                    if(!empty($success)){ ?>
    <div class="alert alert-success" role="alert">
        Sukses! Berhasil melakukan registrasi.
    </div>
    <?php } 
                ?>
    <div class="container">
        <h4>Form Tambah Mahasiswa</h4>
        <hr>
        <form method="post" action="<?= base_url('mahasiswa/add');?>">
            <div class="form-group">
                <label for="">NIM Mahasiswa</label>
                <input type="text" name="nim" class="form-control" placeholder="Nim Mahasiswa">
            </div>
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa">
            </div>
            <div class="form-group">
                <label for="">Email Mahasiswa</label>
                <input type="text" name="email" class="form-control" placeholder="Email Mahasiswa"></textarea>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan:</label>
                <select class="form-control" id="pendidikan" name="pendidikan">
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                    <option value="kuliah">KULIAH</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Umur Mahasiswa</label>
                <input type="number" name="umur" class="form-control" placeholder="Umur Mahasiswa"></textarea>
            </div>

            <div class="form-group">
                <label for="jk">Jenis Kelamin</label><br>
                <input type="radio" name="jk" value="laki-laki"> Laki Laki </label><br>
                <input type="radio" name="jk" value="perempuan"> Perempuan </label>

            </div>
            <div class="form-group">
                <label for="hobby">Hobby</label><br>
                <label class="checkbox-inline"><input type="checkbox" value="main game"> Main Game </label><br>
                <label class="checkbox-inline"><input type="checkbox" value="nonton"> Nonton </label><br>
                <label class="checkbox-inline"><input type="checkbox" value="makan"> Makan </label><br>
                <label class="checkbox-inline"><input type="checkbox" value="musik"> Musik </label><br>
                <label class="checkbox-inline"><input type="checkbox" value="olahraga"> Olahraga </label>
            </div>
            <div class="form-group">
                <label for="">Foto Mahasiswa</label>
                <input type="file" name="file_upload" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>


<?= $this->endSection() ?>