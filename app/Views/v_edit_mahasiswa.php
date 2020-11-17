<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body>

<div class="container p-5">
    <a href="<?= base_url('mahasiswa');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-warning text-black">
            <h4 class="card-title">Edit Mahasiswa : <?= $mahasiswa->nim;?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('mahasiswa/update');?>">
              <div class="form-group" >
                    <label for="">NIM</label>
                    <input type="number" value="<?= $mahasiswa->nim;?>" name="nim" required class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" value="<?= $mahasiswa->nama;?>" name="nama" required class="form-control">
                </div>
         
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" value="<?= $mahasiswa->umur;?>" name="umur" required class="form-control">
                </div>
           
  
                <button class="btn btn-success">Edit Data</button>
            </form>
            
        </div>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?= $this->endSection() ?>