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
        Jadwal Kebugaran Anggota Gym
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
       <!-- Data Table -->
       <div class="box">
        <div class="box-header">
          <h3 class="box-title">Rincian Kegiatan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Telepon</th>
              <th>Gender</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Thenmust</td>
              <td>thenmust_pro</td>
              <td>0821-3113-4354</td>
              <td>Pria</td>
              <td>Proses</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">Kegiatan</button>
                <button type="button" class="btn btn-default btn-sm" style="margin-left: 8px">profil</button>
              </td>
            </tr>
            <tr>
              <td>Andriene Watson</td>
              <td>andrienewatson82</td>
              <td>0816-1312-2334</td>
              <td>Wanita</td>
              <td>Selesai</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">Kegiatan</button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default" style="margin-left: 8px">profil</button>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- end Data Table -->
      
    
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog" style="width: 30%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Profil Thenmust</h4>
        <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
      </div>
      <div class="modal-body">
        <p>Tanggal lahir : 21 Maret 2002</p>
        <p>Gender : Pria</p>
        <p>No Telepon : 0821-3113-4354</p>
        <p>Alamat : Banguntapan, Jalan Pasar Telo</p>
        <p>Kidal : Ya</p>
        <p>Lama pengalaman : < 3 Bulan</p>
        <p>Goal : Increase Muscle Size</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>