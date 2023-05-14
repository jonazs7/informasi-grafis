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
        Daftar Anggota Gym
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
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" 
            data-target="#modal-default-anggota">+ Tambah Anggota</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Thenmust</td>
              <td>thenmust_pro</td>
              <td>Pria</td>
              <td>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>Andriene Watson</td>
              <td>andrienewatson82</td>
              <td>Wanita</td>
              <td>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
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
<div class="modal fade" id="modal-default-anggota">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Anggota Gym Baru</h4>
          </div>
          <div class="modal-body">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Lengkap</label>
                <input type="text" class="form-control">
            </div>
            <!-- end text input -->
            <!-- text input -->
            <div class="form-group">
              <label>Email</label>
                <input type="text" class="form-control">
            </div>
            <!-- end text input -->
            <!-- text input -->
            <div class="form-group">
              <label>Password</label>
                <input type="password" class="form-control">
            </div>
            <!-- end text input -->
            <!-- text input -->
            <div class="form-group">
              <label>Password Konfirmasi</label>
                <input type="password" class="form-control">
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
</body>
</html>