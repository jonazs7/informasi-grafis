<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('structure/asset')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('structure/header')
  <!-- end Main Header -->

  <!-- Left side column. contains the logo and sidebar -->
  @include('structure/sidebar_trainer')
  <!-- end Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Anggota Gym Bulanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <canvas id="jumlah-anggota-gym-chart" style="width: 200px; height: 40px;"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->

        <div class="col-md-4">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Status Training <?php echo date('Y'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <canvas id="status-training-chart"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->

        <div class="col-md-8">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Goal Anggota Gym <?php echo date('Y'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive" style="width: 95%; height: 0; padding-bottom: 47%;">
              <canvas id="goal-anggota-gym-chart"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('structure/footer')
  <!-- end Main Footer -->

</div>
<!-- ./wrapper -->


<!-- graphic script -->
<script>
  // LINE CHART
  // Mendapatkan data dari PHP dan mengonversi ke dalam variabel JavaScript
  var totalMember = @json($total_member);
  var bulan = @json($bulan);

  console.log(totalMember);
  console.log(bulan);

  // Konfigurasi grafik
  var ctx = document.getElementById('jumlah-anggota-gym-chart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: bulan,  // Data untuk sumbu x (bulan)
      datasets: [{
        label: '',
        data: totalMember,  // Data untuk sumbu y (total member)
        borderColor: '#4B94C0',
        fill: true
      }]
    },
    options: {
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Bulan'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Jumlah Anggota'
          },
          ticks: {
            precision: 0
          }
        }
      }
    }
  });
</script>

<script>
  // PIE CHART
  // Mendapatkan data dari PHP dan mengonversi ke dalam variabel JavaScript
  var totalStatus = @json($total_status);
  var status = @json($status);

  console.log(totalStatus);
  console.log([status]);

  // Memisahkan data status "Proses" dan "Selesai"
  var statusProses = [];
  var statusSelesai = [];

  for (var i = 0; i < status.length; i++) {
    if (status[i] === 'Proses') {
      statusProses.push(totalStatus[i]);
    } else if (status[i] === 'Selesai') {
      statusSelesai.push(totalStatus[i]);
    }
  }

  // Konfigurasi grafik
  var ctx = document.getElementById('status-training-chart').getContext('2d');
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Proses', 'Selesai'],  // Data untuk sumbu x (status)
      datasets: [{
        label: '',
        data: totalStatus,  // Data untuk sumbu y (total status)
        // borderColor: ['#F39C12', '#00A65A'],
        backgroundColor: ['#FFCD56', '#4BC0C0'],
        fill: true
      }]
    },
    options: {
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Status'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Jumlah Status'
          },
          ticks: {
            precision: 0
          }
        }
      }
    }
  });
</script>

<script>
  // BAR CHART
  // Mendapatkan data dari PHP dan mengonversi ke dalam variabel JavaScript
  var totalGoal = @json($total_goal);
  var goal = @json($goal);

  console.log(totalGoal);
  console.log(goal);

  // Konfigurasi grafik
  var ctx = document.getElementById('goal-anggota-gym-chart').getContext('2d');
  // Daftar warna border
  var borderColorList = ['#4B94C0', '#FF6384', '#36A2EB', '#FFCE56', '#8CFF40', '#FF9F40', '#A854D4', '#FF4D4D', '#00C9A7'];
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: goal,  // Data untuk sumbu x (goal)
      datasets: [{
        label: '',
        data: totalGoal,  // Data untuk sumbu y (total goal)
        borderColor: borderColorList,
        backgroundColor: borderColorList.map(color => color + '80'), // Menambahkan transparansi pada warna latar belakang
        fill: false
      }]
    },
    options: {
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Jenis Goal'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Jumlah Goal'
          },
          ticks: {
            precision: 0
          }
        }
      }
    }
  });
</script>
<!-- end graphic script -->
</body>
</html>