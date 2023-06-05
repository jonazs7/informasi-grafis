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
        Detail Informasi Capaian, {{ $nama_pengguna->name }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      @if(session('delete'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('delete') }}
      </div>
      @endif
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
          <table id="example1" class="table table-bordered table-hover">
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
              <th>Status BMI</th>
              <th>BFP(%)</th>
              <th>Status BFP</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($show_data_fisik as $data_fisik)
              <tr>
                <td><a href="" type="button" data-toggle="modal" data-target="#modal-default-hapus-data_fisik" 
                  data-id="{{ $data_fisik->id_data_fisik }}">{{ $data_fisik->tgl }}</a></td>
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
                <td>
                  @php
                    $bmiLabel = '';
                    $bmiColor = '';

                    if($data_fisik->body_mass < 18.5) {
                        $bmiLabel = 'Underweight';
                        $bmiColor = '#3C8DBC';
                    } elseif ($data_fisik->body_mass >= 18.5 && $data_fisik->body_mass <= 24.9) {
                        $bmiLabel = 'Normal weight';
                        $bmiColor = '#00A65A';
                    } elseif ($data_fisik->body_mass >= 25 && $data_fisik->body_mass <= 29.9) {
                        $bmiLabel = 'Overweight';
                        $bmiColor = '#F39C12';
                    } elseif ($data_fisik->body_mass >= 30 && $data_fisik->body_mass <= 35) {
                        $bmiLabel = 'Obese';
                        $bmiColor = '#DD4B39';
                    } else {
                        $bmiLabel = 'Morbid obesity';
                        $bmiColor = '#504C8C';
                    }
                  @endphp
                  @if ($data_fisik->body_mass !== NULL)
                    <div class="badge" style="background-color: {{ $bmiColor }};">
                      {{ $bmiLabel }}
                    </div>
                  @endif  
                </td>
                <td>{{ $data_fisik->body_fat }} %</td>
                <td>
                  @php
                    $bfpLabel = '';
                    $bfpColor = '';
                    // WANITA
                    if($data_fisik->body_fat < 10 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Unknown';
                        $bfpColor = '#d2d6de';
                    } elseif($data_fisik->body_fat >= 10 && $data_fisik->body_fat <= 13.49 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Essential Fat';
                        $bfpColor = '#3c8dbc';
                    } elseif ($data_fisik->body_fat >= 13.50 && $data_fisik->body_fat <= 20.49 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Athletes';
                        $bfpColor = '#00c0ef';
                    } elseif ($data_fisik->body_fat >= 20.50 && $data_fisik->body_fat <= 24.49 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Fitness';
                        $bfpColor = '#00a65a';  
                    } elseif ($data_fisik->body_fat >= 24.50 && $data_fisik->body_fat <= 31.49 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Acceptable';
                        $bfpColor = '#f39c12';
                    } elseif ($data_fisik->body_fat >= 31.50 && $data_fisik->gender ==='Wanita') {
                        $bfpLabel = 'Obese';
                        $bfpColor = '#f56954';
                    }
                    // PRIA
                    if($data_fisik->body_fat < 2 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Unknown';
                        $bfpColor = '#d2d6de';
                    } elseif($data_fisik->body_fat >= 2 && $data_fisik->body_fat <= 5.49 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Essential Fat';
                        $bfpColor = '#3c8dbc';
                    } elseif ($data_fisik->body_fat >= 5.50 && $data_fisik->body_fat <= 13.49 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Athletes';
                        $bfpColor = '#00c0ef';
                    } elseif ($data_fisik->body_fat >= 13.50 && $data_fisik->body_fat <= 17.49 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Fitness';
                        $bfpColor = '#00a65a';  
                    } elseif ($data_fisik->body_fat >= 17.50 && $data_fisik->body_fat <= 24.49 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Acceptable';
                        $bfpColor = '#f39c12';
                    } elseif ($data_fisik->body_fat >= 24.50 && $data_fisik->gender ==='Pria') {
                        $bfpLabel = 'Obese';
                        $bfpColor = '#f56954';
                    }
                  @endphp
                  @if ($data_fisik->body_fat !== NULL)
                    <div class="badge" style="background-color: {{ $bfpColor }};">
                      {{ $bfpLabel }}
                    </div>
                  @endif  
                </td>
                {{-- <td>
                  <button type="button" class="btn btn-danger btn-sm" 
                  data-toggle="modal" data-target="#modal-default-hapus-data_fisik" data-id="{{ $data_fisik->id_data_fisik }}">Hapus
                  </button>
                  <a class="btn btn-app" type="button" data-toggle="modal" data-target="#modal-default-hapus-data_fisik" 
                  data-id="{{ $data_fisik->id_data_fisik }}">
                    <i class="fa fa-trash"></i>Hapus
                  </a>
                </td> --}}
              </tr>
              @endforeach
            {{-- <tr>
              <td>2023-03-21</td>
              <td>1,63</td>
              <td>55,2</td>
              <td>35</td>
              <td>70</td>
              <td>52</td>
              <td>27</td>
              <td>84</td>
              <td>89</td>
              <td>37</td>
              <td>32</td>
              <td>15</td>
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
              <th>Status BMI</th>
              <th>BFP(%)</th>
              <th>Status BFP</th>
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


<!-- modal hapus data fisik -->
<div class="modal fade" id="modal-default-hapus-data_fisik">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Peringatan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini&hellip;?</p>
      </div>
      <div class="modal-footer">
        <form action="" id="deleteFormDataFisik" method="post">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
  $('#modal-default-hapus-data_fisik').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var form = $('#deleteFormDataFisik');
      var url = '{{ route("deleteDataFisik", ":id") }}';
      url = url.replace(':id', id);
      form.attr('action', url);
      console.log(url);
  });
</script>

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