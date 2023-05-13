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
                <form action="{{ route('update_biodata') }}" method="POST" enctype='multipart/form-data'>
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" name="nama" value="{{ $pengguna->name }}" class="form-control" style="width: 25%">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal_lahir" value="{{ $pengguna->tgl_lahir }}" style="width: 8%" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="option" value="Pria" {{ old('option', $pengguna->gender) == 'Pria' ? 'checked' : '' }}> Pria
                        </label>
                        <label style="margin-left: 12px">
                          <input type="radio" name="option" value="Wanita" {{ old('option', $pengguna->gender) == 'Wanita' ? 'checked' : '' }}> Wanita
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telepon</label>
                      <input type="text" name="no_telepon" value="{{ $pengguna->tlpn }}" class="form-control" style="width: 12%">
                      <p class="help-block">Contoh: 08xx-xxxx-xxxx</p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" value="{{ $pengguna->alamat }}" class="form-control" style="width: 60%">
                      {{-- <textarea class="form-control" name="alamat" rows="3" placeholder="Enter ..." style="width: 25%; text-align: left padding: 0;">
                        {{ trim($pengguna->alamat) }}
                      </textarea> --}}
                      {{-- <div contenteditable="true" name="alamat" style="width: 300px; height: 150px; border: 1px solid #ccc; overflow: auto; padding:8px 8px 8px 8px;">
                        {{ trim($pengguna->alamat) }}
                      </div> --}}
                    </div>
                    <div class="form-group" style="width: 10%">
                      <label>Kidal</label>
                      <select class="form-control" name="kidal">
                        <option value="Tidak" <?php if($pengguna->kidal == 'Tidak') echo 'selected'; ?>>Tidak</option>
                        <option value="Ya" <?php if($pengguna->kidal == 'Ya') echo 'selected'; ?>>Ya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Lama pengalaman</label>
                      <select class="form-control" name="lama_pengalaman" value="{{ $pengguna->lama_pnglmn }}" style="width: 15%">
                        <option value="Belum pernah" <?php if($pengguna->lama_pnglmn == 'Belum pernah') echo 'selected'; ?>>Belum pernah</option>
                        <option value="< 3 Bulan" <?php if($pengguna->lama_pnglmn == '< 3 Bulan') echo 'selected'; ?>>< 3 Bulan</option>
                        <option value="> 3 Bulan" <?php if($pengguna->lama_pnglmn == '> 3 Bulan') echo 'selected'; ?>>> 3 Bulan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Goal</label>
                      <select class="form-control" style="width: 25%" name="goal">
                        <option value="Increase muscle size" <?php if($pengguna->goal == 'Increase muscle size') echo 'selected'; ?>>Increase muscle size</option>
                        <option value="Lose body fat" <?php if($pengguna->goal == 'Lose body fat') echo 'selected'; ?>>Lose body fat</option>
                        <option value="Sport spesific training" <?php if($pengguna->goal == 'Sport spesific training') echo 'selected'; ?>>Sport spesific training</option>
                        <option value="Rehabilitate an injury" <?php if($pengguna->goal == 'Rehabilitate an injury') echo 'selected'; ?>>Rehabilitate an injury</option>
                        <option value="Nutrition education" <?php if($pengguna->goal == 'Nutrition education') echo 'selected'; ?>>Nutrition education</option>
                        <option value="Start an work out train" <?php if($pengguna->goal == 'Start an work out train') echo 'selected'; ?>>Start an work out train</option>
                        <option value="Fan" <?php if($pengguna->goal == 'Fan') echo 'selected'; ?>>Fan</option>
                        <option value="Motivation" <?php if($pengguna->goal == 'Motivation') echo 'selected'; ?>>Motivation</option>
                        <option value="Lainnya" <?php if($pengguna->goal == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>File Foto</label>
                      <input type="file" name="foto"> 
                      <p class="help-block">Anda dapat unggah foto profil anda.</p>
                    </div>
                    <div style="margin-top: 5%">
                      <button type="submit" class="btn btn-block btn-primary">Simpan</button>
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