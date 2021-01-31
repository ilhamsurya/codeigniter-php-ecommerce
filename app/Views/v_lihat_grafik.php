<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
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
<?= $this->endSection() ?>