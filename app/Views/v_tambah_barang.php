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
        <a href="<?= base_url('barang');?>" class="btn btn-secondary mb-2">Kembali</a>
    </div>
    <div class="container">

        <h4>Form Tambah Barang</h4>
        <hr>
        <form method="post" action="<?= base_url('barang/add');?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Barang </label>
                <input type="text" name="namabarang" class="form-control" placeholder="nama barang">
            </div>
            <div class="form-group">
                <label for="">Upload Gambar</label>
                <input type="file" name="file_upload" class="form-control" placeholder="file_upload">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsibarang" placeholder="Deskripsi barang" maxlength="255"
                    rows="4" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="number" name="kategoribarang" class="form-control" placeholder="kategori barang">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="hargabarang" class="form-control" placeholder="harga barang (RP)">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="number" name="stokbarang" class="form-control" placeholder="stok barang">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

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