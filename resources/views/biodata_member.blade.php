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
        Biodata
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ubah Profil</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" style="width: 25%">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="datepicker" placeholder="dd/mm/yyy" style="width: 8%">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                          Pria
                        </label>
                        <label style="margin-left: 12px">
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                          Wanita
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telepon</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" style="width: 12%">
                      <p class="help-block">Contoh: 08xx-xxxx-xxxx</p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." style="width: 25%"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Lama pengalaman</label>
                      <select class="form-control" style="width: 25%">
                        <option>Belum pernah</option>
                        <option>< 3 Bulan</option>
                        <option>> 3 Bulan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Goal</label>
                      <select class="form-control" style="width: 25%">
                        <option>Increase muscle size</option>
                        <option>Lose body fat</option>
                        <option>Sport spesific training</option>
                        <option>Rehabilitate an injury</option>
                        <option>Nutrition education</option>
                        <option>Start an work out train</option>
                        <option>Fan</option>
                        <option>Motivation</option>
                        <option>Lainnya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File Foto</label>
                      <input type="file" id="exampleInputFile"> 
                      <p class="help-block">Anda dapat unggah foto profil anda.</p>
                    </div>
                    <div style="margin-top: 5%">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
                <!-- end form start -->
            </div>
            <!-- /.col-lg-6 -->
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

</body>
</html>