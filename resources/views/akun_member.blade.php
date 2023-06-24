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
        Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      @if(session('success'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('success') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-warning alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i>Peringatan !</h4>
          @foreach ($errors->all() as $error)
          {{ $error }}
          @endforeach
        </div> 
      @endif
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ubah Kata Sandi</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('updateAkun') }}" method="POST" enctype='multipart/form-data'>
                  @csrf
                  <div class="box-body" style="margin-top: 2%; margin-left: -1%;">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Email :</label>
                      <div class="col-sm-3">
                        <input type="text" name="nama_lengkap" value="{{ $pengguna->email }}" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">Kata Sandi Baru :</label>
                      <div class="col-sm-3">
                        <div class="input-group">
                            <input type="password" name="new_password" id="new-password-input" class="form-control" required>
                            <span class="input-group-addon">
                              <i class="fa fa-eye" id="toggle-new-password-icon" style="cursor: pointer;"></i>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">Kata Sandi Konfirmasi :</label>
                      <div class="col-sm-3">
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password-confirm-input" class="form-control" required>
                            <span class="input-group-addon">
                                <i class="fa fa-eye" id="toggle-password-confirm-icon" style="cursor: pointer;"></i>
                            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- box-footer -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
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


<!-- New pasword -->
<script>
    // Dapatkan elemen input dan ikon mata
    var passwordInput = document.getElementById('new-password-input');
    var togglePasswordIcon = document.getElementById('toggle-new-password-icon');
  
    // Tambahkan event listener untuk mengubah visibilitas password saat ikon mata diklik
    togglePasswordIcon.addEventListener('click', function() {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordIcon.className  = 'fa fa-eye-slash';
      } else {
        passwordInput.type = 'password';
        togglePasswordIcon.className  = 'fa fa-eye';
      }
    });
</script>
<!-- New pasword end -->

<!-- Pasword confirmation -->
<script>
    // Dapatkan elemen input dan ikon mata
    var passwordInput2 = document.getElementById('password-confirm-input');
    var togglePasswordIcon2 = document.getElementById('toggle-password-confirm-icon');
  
    // Tambahkan event listener untuk mengubah visibilitas password saat ikon mata diklik
    togglePasswordIcon2.addEventListener('click', function() {
      if (passwordInput2.type === 'password') {
        passwordInput2.type = 'text';
        togglePasswordIcon2.className  = 'fa fa-eye-slash';
      } else {
        passwordInput2.type = 'password';
        togglePasswordIcon2.className  = 'fa fa-eye';
      }
    });
</script>
<!-- Pasword confirmation end -->
  
</body>
</html>

