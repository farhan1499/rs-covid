<?= $this->extend('layouts/main'); ?>
<?= $this->section('content') ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-center"></h1>
                        <!-- <hr class="mb-4"> -->
                        <?php if(in_groups('admin')) : ?>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-header">
                                            <h5>Data Dokter</h5>
                                        </div>
                                        <div class="card-body text-end">
                                            <h5><?= $dataAllDokter; ?></h5>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/data/dokter">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-header">
                                            <h5>Data Perawat</h5>
                                        </div>
                                        <div class="card-body text-end">
                                            <h5><?= $dataAllPerawat; ?></h5>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?= base_url(); ?>/data/perawat">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-header">
                                            <h5>Data Pasien Rawat</h5>
                                        </div>
                                        <div class="card-body text-end">
                                            <h5><?= $dataAllRawat; ?></h5>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                    <div class="card-header">
                                            <h5>Data Pasien Covid-19</h5>
                                        </div>
                                        <div class="card-body text-end">
                                            <h5><?= $dataAllPasien; ?></h5>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4 shadow mb-5 bg-body rounded">
                                        <div class="card-header">
                                            <i class="fas fa-chart-area me-1"></i>
                                            Grafik Data Pasien 
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mb-4 shadow mb-5 bg-body rounded">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Grafik Pasien Rawat Inap
                                        </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </main>

                <script>
            $(function() {
                

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';




// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php foreach($grafik1 as $d )  { echo '"' . $d['date'] . '",';} ?>],
    datasets: [{
      label: "Pasien",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [<?php foreach($grafik1 as $d )  { echo '"' . $d['jml'] . '",';} ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?= $dataAllPasien; ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
            })
        </script>


<script>
    $(function(){
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php foreach($grafik2 as $d )  { echo '"' . $d['date'] . '",';} ?>],
    datasets: [{
      label: "Pasien Rawat Inap",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php foreach($grafik2 as $d )  { echo '"' . $d['jml'] . '",';} ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?= $dataAllRawat ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

    })
</script>
                <?= $this->endSection(); ?>
