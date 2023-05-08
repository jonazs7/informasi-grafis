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
        Hasil Capaian Anggota Gym
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">

            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('lte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">Thenmust</h3>
                  <p class="text-muted text-center">Member</p>
                  <table class="table text-center">
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-tambah">Tambah Data</button>
                        
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-default btn-sm">Detail Info</button>
                    </td>
                  </table>
                  {{-- <div style="display: flex; justify-content: center">
                    <button type="button" class="btn btn-primary btn-sm" style="">Tambah Data</button>
                    <button type="button" class="btn btn-default btn-sm">Detail Info</button>
                  </div> --}}
                  <div style="margin-top: 12px; margin-bottom: 12px">
                    <b style="font-size: 18px">Informasi Kontak</b>
                  </div>
                 
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b class="fa fa-envelope"></b> <a style="margin-left: 12px">thenmust_pro</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-phone"></b> <a style="margin-left: 12px">0812-3113-4354</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-map-pin"></b> <a style="margin-left: 12px">Banguntapan, Jalan Pasar Telo</a>
                    </li>
                  </ul>

                  <div class="row">
                    <div class="chart col-md-6" id="sales-chart1" style="height: 150px; width: 150px;"></div>
                    <div class="chart col-md-6" id="sales-chart2" style="height: 150px; width: 150px;"></div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('lte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                  <h3 class="profile-username text-center">Thenmust</h3>
                  <p class="text-muted text-center">Member</p>
                  <table class="table text-center">
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm">Tambah Data</button>
                        
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-default btn-sm">Detail Info</button>
                    </td>
                  </table>
                  {{-- <div style="display: flex; justify-content: center">
                    <button type="button" class="btn btn-primary btn-sm" style="">Tambah Data</button>
                    <button type="button" class="btn btn-default btn-sm">Detail Info</button>
                  </div> --}}
                  <div style="margin-top: 12px; margin-bottom: 12px">
                    <b style="font-size: 18px">Informasi Kontak</b>
                  </div>
                 
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b class="fa fa-envelope"></b> <a style="margin-left: 12px">thenmust_pro</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-phone"></b> <a style="margin-left: 12px">0812-3113-4354</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-map-pin"></b> <a style="margin-left: 12px">Banguntapan, Jalan Pasar Telo</a>
                    </li>
                  </ul>

                  <div class="row">
                    <div class="chart col-md-6" id="sales-chart3" style="height: 150px; width: 150px;"></div>
                    <div class="chart col-md-6" id="sales-chart4" style="height: 150px; width: 150px;"></div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
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


<!-- modal -->
<div class="modal fade" id="modal-default-tambah">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kegiatan Baru</h4>
          </div>
          <div class="modal-body">
              <!-- Date -->
              <div class="form-group">
                  <label>Tanggal Mulai</label>

                  <div class="input-group date">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepickerStart" placeholder="dd/mm/yyyy">
                  </div>
                  <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- text input -->
              <div class="form-group">
              <label>Tinggi (m)</label>
                <input type="text" class="form-control">
              </div>
              <!-- end text input -->
              
          
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary">Tambah</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- page script -->
<script>
  $(function () {
    "use strict";

   //DONUT CHART
   var donut = new Morris.Donut({
      element: 'sales-chart1',
      resize: true,
      colors: ["#f56954"],
      data: [
        {label: "BMI", value: 30}
      ],
      hideHover: 'auto'
    });

   //DONUT CHART
   var donut = new Morris.Donut({
      element: 'sales-chart2',
      resize: true,
      colors: ["#00a65a"],
      data: [
        {label: "BFP", value: 20}
      ],
      hideHover: 'auto'
    });

   //DONUT CHART
   var donut = new Morris.Donut({
      element: 'sales-chart3',
      resize: true,
      colors: ["#f56954"],
      data: [
        {label: "BMI", value: 30}
      ],
      hideHover: 'auto'
    });

   //DONUT CHART
   var donut = new Morris.Donut({
      element: 'sales-chart4',
      resize: true,
      colors: ["#00a65a"],
      data: [
        {label: "BFP", value: 20}
      ],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>

