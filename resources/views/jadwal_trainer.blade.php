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
        Agenda dan Capaian Anggota Gym
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      {{-- @if(session('error'))
      <div class="alert alert-warning alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i>Peringatan !</h4>
        {{ session('error') }}
      </div>
      @endif
      @if(session('successTambahData'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Berhasil !</h4>
        {{ session('successTambahData') }}
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
      @endif --}}
      @if(session('successTambahAnggota'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('successTambahAnggota') }}
      </div>
      @endif
      @if(session('successHapusAnggota'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('successHapusAnggota') }}
      </div>
      @endif
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
       <!-- Data Table -->
       <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Anggota Gym</h3>
           <!-- button tambah anggota -->
           <a type="button" data-toggle="modal" 
           data-target="#modal-default-tambah-anggota" style="position: relative;
             background-color: #3C8DBC;
             border: none;
             color: white;
             text-align: center;
             text-decoration: none;
             display: inline-flex;
             justify-content: center;
             align-items: center;
             font-size: 16px;
             cursor: pointer;
             width: 30px;
             height: 30px;
             border-radius: 5px;
             padding: 0;
             margin-left: 4px;">
           <i class="fa fa-plus"></i>
           </a>      
           <!-- end tambah anggota -->       
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Gender</th>
              <th>Rerata BMI</th>
              <th>Status Rerata BMI</th>
              <th>Rerata BFP(%)</th>
              <th>Status Rerata BFP</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($show_pengguna as $pengguna)
              <tr>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->gender }}</td>
                <td>{{ number_format($pengguna->rerata_bmi, 2) }}</td>
                <td>
                  @php
                    $bmiLabel = '';
                    $bmiColor = '';

                    if($pengguna->rerata_bmi < 18.5) {
                        $bmiLabel = 'Underweight';
                        $bmiColor = '#3C8DBC';
                    } elseif ($pengguna->rerata_bmi >= 18.5 && $pengguna->rerata_bmi <= 24.9) {
                        $bmiLabel = 'Normal weight';
                        $bmiColor = '#00A65A';
                    } elseif ($pengguna->rerata_bmi >= 25 && $pengguna->rerata_bmi <= 29.9) {
                        $bmiLabel = 'Overweight';
                        $bmiColor = '#F39C12';
                    } elseif ($pengguna->rerata_bmi >= 30 && $pengguna->rerata_bmi <= 35) {
                        $bmiLabel = 'Obese';
                        $bmiColor = '#DD4B39';
                    } else {
                        $bmiLabel = 'Morbid obesity';
                        $bmiColor = '#504C8C';
                    }
                  @endphp
                  @if ($pengguna->rerata_bmi !== NULL)
                    <div class="badge" style="background-color: {{ $bmiColor }};">
                      {{ $bmiLabel }}
                    </div>
                  @endif  
                </td>
                <td>{{ number_format($pengguna->rerata_bfp) }} %</td>
                <td>
                  @php
                    $bfpLabel = '';
                    $bfpColor = '';
                    // WANITA
                    if($pengguna->rerata_bfp < 10 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Unknown';
                        $bfpColor = '#d2d6de';
                    } elseif($pengguna->rerata_bfp >= 10 && $pengguna->rerata_bfp <= 13.49 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Essential Fat';
                        $bfpColor = '#3c8dbc';
                    } elseif ($pengguna->rerata_bfp >= 13.50 && $pengguna->rerata_bfp <= 20.49 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Athletes';
                        $bfpColor = '#00c0ef';
                    } elseif ($pengguna->rerata_bfp >= 20.50 && $pengguna->rerata_bfp <= 24.49 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Fitness';
                        $bfpColor = '#00a65a';  
                    } elseif ($pengguna->rerata_bfp >= 24.50 && $pengguna->rerata_bfp <= 31.49 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Acceptable';
                        $bfpColor = '#f39c12';
                    } elseif ($pengguna->rerata_bfp >= 31.50 && $pengguna->gender ==='Wanita') {
                        $bfpLabel = 'Obese';
                        $bfpColor = '#f56954';
                    }
                    // PRIA
                    if($pengguna->rerata_bfp < 2 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Unknown';
                        $bfpColor = '#d2d6de';
                    } elseif($pengguna->rerata_bfp >= 2 && $pengguna->rerata_bfp <= 5.49 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Essential Fat';
                        $bfpColor = '#3c8dbc';
                    } elseif ($pengguna->rerata_bfp >= 5.50 && $pengguna->rerata_bfp <= 13.49 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Athletes';
                        $bfpColor = '#00c0ef';
                    } elseif ($pengguna->rerata_bfp >= 13.50 && $pengguna->rerata_bfp <= 17.49 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Fitness';
                        $bfpColor = '#00a65a';  
                    } elseif ($pengguna->rerata_bfp >= 17.50 && $pengguna->rerata_bfp <= 24.49 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Acceptable';
                        $bfpColor = '#f39c12';
                    } elseif ($pengguna->rerata_bfp >= 24.50 && $pengguna->gender ==='Pria') {
                        $bfpLabel = 'Obese';
                        $bfpColor = '#f56954';
                    }
                  @endphp
                  @if ($pengguna->rerata_bfp !== NULL)
                    <div class="badge" style="background-color: {{ $bfpColor }};">
                      {{ $bfpLabel }}
                    </div>
                  @endif  
                </td>
                <td>
                  {{-- <a type="button" class="btn btn-primary btn-sm" href="{{ route('showKegiatan', $pengguna->id) }}">Kegiatan</a>
                  <a type="button" class="btn btn-default btn-sm profile-button" data-toggle="modal" 
                  data-target="#modal-default-profile" data-id="{{ $pengguna->id }}" style="margin-left: 8px">Profil</a> --}}
                  <!-- button profil -->
                  <a class="profile-button" type="button" data-toggle="modal" data-target="#modal-default-profile" 
                  data-id="{{ $pengguna->id }}" style="position: relative;
                    background-color: #3C8DBC;
                    border: none;
                    color: white;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 16px;
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    border-radius: 5px;
                    padding: 0;
                    margin-left: 4px;">
                  <i class="fa fa-user-circle"></i>
                  </a>
                  <!-- end button profil -->
                  <!-- button kegiatan -->
                  <a type="button" href="{{ route('showKegiatan', $pengguna->id) }}" style="position: relative;
                    background-color: #3C8DBC;
                    border: none;
                    color: white;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 16px;
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    border-radius: 5px;
                    padding: 0;
                    margin-left: 4px;">
                    <i class="fa fa-calendar"></i>
                    @if ($pengguna->jmlh_status_proses !=0)
                      <span style="background-color: #F39C12;
                        color: white;
                        text-align: center;
                        border-radius: 50%;
                        width: 15px;
                        height: 15px;
                        line-height: 15px;
                        font-size: 10px;
                        position: absolute;
                        top: -5px;
                        right: -5px;">{{ $pengguna->jmlh_status_proses }}
                      </span>
                    @endif
                  </a>     
                  <!-- end button kegiatan -->
                  {{-- <!-- button tambah data fisik -->
                  <a class="create-data-fisik" type="button" data-toggle="modal" data-target="#modal-default-data-fisik" 
                  data-id="{{ $pengguna->id }}" style="position: relative;
                    background-color: #3C8DBC;
                    border: none;
                    color: white;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 16px;
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    border-radius: 5px;
                    padding: 0;
                    margin-left: 4px;">
                  <i class="fa fa-plus"></i>
                  </a>    
                  <!-- end button tambah data fisik -->   --}}
                  <!-- button detail info -->
                  <a type="button" href="{{ route('detailInfo', $pengguna->id) }}" style="position: relative;
                    background-color: #3C8DBC;
                    border: none;
                    color: white;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 16px;
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    border-radius: 5px;
                    padding: 0;
                    margin-left: 4px;">
                  <i class="fa fa-info"></i>
                  </a>      
                  <!-- end button detail info -->           
                  <!-- button hapus anggota -->
                  <a type="button" data-toggle="modal" data-target="#modal-default-hapus-anggota" 
                  data-id="{{ $pengguna->id }}" style="position: relative;
                    background-color: #3C8DBC;
                    border: none;
                    color: white;
                    text-align: center;
                    text-decoration: none;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 16px;
                    cursor: pointer;
                    width: 30px;
                    height: 30px;
                    border-radius: 5px;
                    padding: 0;
                    margin-left: 4px;">
                  <i class="fa fa-trash"></i>
                  </a>      
                  <!-- end hapus anggota -->                         
                </td>
              </tr>
              @endforeach
            {{-- <tr>
              <td>Andriene Watson</td>
              <td>andrienewatson82</td>
              <td>0816-1312-2334</td>
              <td>Wanita</td>
              <td>Selesai</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm">Kegiatan</button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-default" style="margin-left: 8px">profil</button>
              </td>
            </tr> --}}
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


<!-- modal profil -->
<div class="modal fade" id="modal-default-profile">
  <div class="modal-dialog" style="width: 25%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <div style="display: flex; flex-direction: column; align-items: center;">
            <h4 class="modal-title"></h4>&nbsp;&nbsp;
            <h4 class="modal-title" style="margin-top: -5%"><b id='nama_profil'></b></h4>
          </div>
        
        
        <div style="display: grid; place-items: center; margin-top: 8px; margin-bottom: 8px;">
          <img id="gambar" class="img-circle" style="width: 160px; height: 160px;">
          {{-- <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" id="gambar" class="img-circle" alt="User Image"> --}}
        </div>
      </div>
      <div class="modal-body">
        <div style="display: flex;">
          <b><p>Email &nbsp;:</p></b><p style="margin-left: 4px" id='email'>Email :</p>
        </div>
        <div style="display: flex;">
          <b><p>Tanggal lahir &nbsp;:</p></b><p style="margin-left: 4px" id='tanggal_lahir'>Tanggal lahir :</p>
        </div>
        <div style="display: flex;">
          <b><p>Gender &nbsp;:</p></b><p style="margin-left: 4px" id='gender'></p>
        </div>
        <div style="display: flex;">
          <b><p>No Telepon &nbsp;:</p></b><p style="margin-left: 4px" id='telepon'></p>
        </div>
        <div style="display: flex;">
          <b><p>Alamat &nbsp;:</p></b><p style="margin-left: 4px" id='alamat'></p>
        </div>
        <div style="display: flex;">
          <b><p>Kidal &nbsp;:</p></b><p style="margin-left: 4px" id='kidal'></p>
        </div>
        <div style="display: flex;">
          <b><p>Lama pengalaman &nbsp;:</p></b><p style="margin-left: 4px" id='lama_pengalaman'></p>
        </div>
        <div style="display: flex;">
          <b><p>Goal &nbsp;:</p></b><p style="margin-left: 4px" id='goal'></p>
        </div>
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

{{-- <!-- modal tambah data fisik -->
<div class="modal fade" id="modal-default-data-fisik">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <div style="display: flex; flex-direction: column">
                <h4 class="modal-title">Tambah Data Fisik Baru,&nbsp;</h4>
                <h4 class="modal-title"><b id="nama_tambah"></b></h4>
              </div>
          </div>
          <form method="POST" action="{{ route('saveDataFisik') }}"> 
            @csrf
            <div class="modal-body">  
                <!-- Input field untuk data id pengguna -->
                <input type="hidden" name="kode_pengguna" id="kode_pengguna">  
                <!-- Input field untuk data gender -->       
                <input type="hidden" name="jekel" id="jekel">         
                <div style="display: flex; justify-content: space-around">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" required class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                  </div>
                  <!-- /.form group -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tinggi (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="tinggi" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Bisep (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_bisep" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Berat (kg)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="berat" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Dada (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_dada" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Leher (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_leher" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Pantat (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_pantat" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Pinggang (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_pinggang" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Paha Bawah (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_paha_bawah" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Paha Atas (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_paha_atas" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Betis (cm)</label>
                      <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" maxlength="5" required
                      name="lingkar_betis" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>  
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> --}}

<!-- modal tambah anggota -->
<div class="modal fade" id="modal-default-tambah-anggota">
  <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('save_anggotaGym') }}">
          @csrf
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Anggota Gym Baru</h4>
          </div>
            <div class="modal-body">
              <!-- text input -->
              <div class="form-group">
                <label>Nama Lengkap</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <!-- end text input -->
              <!-- text input -->
              <div class="form-group">
                <label>Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <!-- end text input -->
              <!-- text input -->
              <div class="form-group">
                <label>Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <!-- end text input -->
              <!-- text input -->
              <div class="form-group">
                <label>Password Konfirmasi</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <!-- end text input -->
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal hapus anggota -->
<div class="modal fade" id="modal-default-hapus-anggota">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Peringatan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data anggota gym ini&hellip;?</p>
      </div>
      <div class="modal-footer">
        <form action="{{ route('deleteAnggotaGym', $pengguna->id) }}" id="deleteFormAnggota" method="post">
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
  $(document).ready(function() {
      $('.profile-button').click(function() {
          var userId = $(this).data('id');
          var url = "{{ route('showProfileAnggota', ':id') }}".replace(':id', userId);
          
      // Mengirim permintaan AJAX ke backend Laravel
      $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    //  Untuk menggabungkan jalur relatif ke folder "images" dengan ID gambar dan ekstensi file
                    var imageUrl = '/images/' + response.foto; // Ganti dengan logika Anda

                    // Mengisi nilai-nilai kontrol form modal dengan data yang diterima
                    $('#gambar').attr('src', imageUrl);
                    $('#nama_profil').text(response.name);
                    $('#email').text(response.email);
                    $('#tanggal_lahir').text(response.tgl_lahir);
                    $('#gender').text(response.gender);
                    $('#telepon').text(response.tlpn);
                    $('#alamat').text(response.alamat); // --> make .text kalau dalam bentuk tag p html, .val dalam tag inputan form
                    $('#kidal').text(response.kidal);
                    $('#lama_pengalaman').text(response.lama_pnglmn);
                    $('#goal').text(response.goal);
                    // Isikan dengan data profil pengguna lainnya

                    console.log(url);
                    console.log(response.foto);
                },
                error: function(xhr) {
                    // Tangani jika terjadi kesalahan pada permintaan AJAX
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

{{-- <script>
  $(document).ready(function() {
      // Fungsi untuk membuka form modal
      $('.create-data-fisik').click(function() {
          var userId = $(this).data('id');
          var url = "{{ route('createDataFisik', ':id') }}".replace(':id', userId);
          
      // Mengirim permintaan AJAX ke backend Laravel
      $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Mengisi nilai-nilai kontrol form modal dengan data yang diterima
                     $('#kode_pengguna').val(response.id);
                     $('#nama_tambah').text(response.name);
                     $('#jekel').val(response.gender);

                    console.log(response.id);
                    console.log(url);
                    console.log(response.name);
                    console.log(response.gender);
                },
                error: function(xhr) {
                    // Tangani jika terjadi kesalahan pada permintaan AJAX
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script> --}}

<script>
  $('#modal-default-hapus-anggota').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var form = $('#deleteFormAnggota');
      var url = '{{ route("deleteAnggotaGym", ":id") }}';
      url = url.replace(':id', id);
      form.attr('action', url);
      console.log(url);
  });
</script>
</body>
</html>