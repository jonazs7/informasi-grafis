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
  @include('structure/sidebar_member')
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
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik BMI Mingguan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="bmi-chart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik BFP Mingguan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="bfp-chart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
      <!-- Data table -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Riwayat Perkembangan Kebugaran</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Tanggal</th>
              <th>Ti(cm)</th>
              <th>Be(kg)</th>
              <th>LL(cm)</th>
              <th>LP(cm)</th>
              <th>LPA(cm)</th>
              <th>LB(cm)</th>
              <th>LD(cm)</th>
              <th>LPT(cm)</th>
              <th>LPB(cm)</th>
              <th>LBS(cm)</th>
              <th>BMI</th>
              <th>BFP(%)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($show_data_fisik as $data_fisik)
            <tr>
              <td>{{ $data_fisik->tgl }}</td>
              <td>{{ $data_fisik->tinggi }}</td>
              <td>{{ $data_fisik->berat }}</td>
              <td>{{ $data_fisik->neck }}</td>
              <td>{{ $data_fisik->waist}}</td>
              <td>{{ $data_fisik->hip }}</td>
              <td>{{ $data_fisik->bisep }}</td>
              <td>{{ $data_fisik->dada }}</td>
              <td>{{ $data_fisik->pantat }}</td>
              <td>{{ $data_fisik->paha_bwh }}</td>
              <td>{{ $data_fisik->betis }}</td>
              <td>{{ $data_fisik->body_mass }}</td>
              <td>{{ $data_fisik->body_fat }} %</td>
            </tr>         
            @endforeach
            {{-- <tr>
              <td>2023-02-15</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
              <td>20</td>
            </tr> --}}
            </tbody>
            <tfoot>
            <tr>
              <th>Tanggal</th>
              <th>Ti(cm)</th>
              <th>Be(kg)</th>
              <th>LL(cm)</th>
              <th>LP(cm)</th>
              <th>LPA(cm)</th>
              <th>LB(cm)</th>
              <th>LD(cm)</th>
              <th>LPT(cm)</th>
              <th>LPB(cm)</th>
              <th>LBS(cm)</th>
              <th>BMI</th>
              <th>BFP(%)</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- end Data table -->
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
var yBmi = @json($y_bmi);
var xBmi = @json($x_bmi);

console.log(yBmi);
console.log(xBmi);

// Konfigurasi grafik
var ctx = document.getElementById('bmi-chart').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: xBmi,  // Data untuk sumbu x (mingguan)
    datasets: [{
      label: '',
      data: yBmi,  // Data untuk sumbu y (BMI)
      borderColor: '#4B94C0',
      fill: false
    }]
  },
  options: {
    scales: {
      x: {
        display: true,
        title: {
          display: true,
          text: ''
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'B M I'
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
// LINE CHART
// Mendapatkan data dari PHP dan mengonversi ke dalam variabel JavaScript
var yBfp = @json($y_bfp);
var xBfp = @json($x_bfp);

console.log(yBfp);
console.log(xBfp);

// Konfigurasi grafik
var ctx = document.getElementById('bfp-chart').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: xBfp,  // Data untuk sumbu x (mingguan)
    datasets: [{
      label: '',
      data: yBfp,  // Data untuk sumbu y (BFP)
      borderColor: '#4B94C0',
      fill: false
    }]
  },
  options: {
    scales: {
      x: {
        display: true,
        title: {
          display: true,
          text: ''
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'B F P'
        },
        ticks: {
          precision: 0
        }
      }
    }
  }
});
</script>
</body>
</html>