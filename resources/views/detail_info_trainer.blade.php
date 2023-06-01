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
                <canvas id="areaChart" style="height:250px"></canvas>
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
                <canvas id="lineChart" style="height:250px"></canvas>
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
              <th>Aksi</th>
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
                <td><button type="button" class="btn btn-danger btn-sm" 
                  data-toggle="modal" data-target="#modal-default-hapus-data_fisik" data-id="{{ $data_fisik->id_data_fisik }}">Hapus</button>
                </td>
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
              <th>BFP(%)</th>
              <th>Aksi</th>
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

<!-- page script -->
<script>
  $(function() {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      var areaChart = new Chart(areaChartCanvas)

      var areaChartData = {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
                  label: 'Electronics',
                  fillColor: 'rgba(210, 214, 222, 1)',
                  strokeColor: 'rgba(210, 214, 222, 1)',
                  pointColor: 'rgba(210, 214, 222, 1)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [65, 59, 80, 81, 56, 55, 40]
              },
              {
                  label: 'Digital Goods',
                  fillColor: 'rgba(60,141,188,0.9)',
                  strokeColor: 'rgba(60,141,188,0.8)',
                  pointColor: '#3b8bba',
                  pointStrokeColor: 'rgba(60,141,188,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data: [28, 48, 40, 19, 86, 27, 90]
              }
          ]
      }

      var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
      }

      //Create the line chart
      areaChart.Line(areaChartData, areaChartOptions)

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChart = new Chart(lineChartCanvas)
      var lineChartOptions = areaChartOptions
      lineChartOptions.datasetFill = false
      lineChart.Line(areaChartData, lineChartOptions)
  })
</script>
</body>
</html>