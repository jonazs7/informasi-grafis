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
      @if(session('deleteDataFisik'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('deleteDataFisik') }}
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-warning alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i>Peringatan !</h4>
        {{ session('error') }}
      </div>
      @endif
      @if(session('errorAngka'))
      <div class="alert alert-warning alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i>Peringatan !</h4>
        {{ session('errorAngka') }}
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
      @endif
      <div style="margin-top: 8px;">
        <form action="{{ route('filterTanggalAnggota', ['kode_pengguna' => $nama_pengguna->id]) }}" method="GET" class="form-inline">
          <div class="form-group">
              <label class="control-label">Tanggal Mulai :</label>
              <div>
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal_mulai" class="form-control" style="width: 120px" 
                          data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div>
              </div>
          </div>
          <div class="form-group" style="margin-left: 40px">
              <label class="control-label">Tanggal Selesai :</label>
              <div>
                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal_selesai" class="form-control" style="width: 120px"
                          data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-left: 40px; width: 56.2px; height: 34px;">
            <i class="fa fa-filter"></i>
          </button>
          <a type="button" href="" onclick="history.back();" id="dynamicLink" class="btn btn-default" style="margin-top: 20px; margin-left: 8px; width: 56.2px; height: 34px;">
            <i class="fa fa-refresh"></i>
          </a>
        </form>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Progres BMI</h3>

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
              <h3 class="box-title">Grafik Progres BFP</h3>

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
          <!-- button tambah data fisik -->
          <a class="create-data-fisik" type="button" data-toggle="modal" data-target="#modal-default-data-fisik" 
          data-id="{{ $nama_pengguna->id }}" style="position: relative;
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
          <!-- end button tambah data fisik -->  
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Tgl</th>
              <th>Ti<br>(cm)</th>
              <th>Be<br>(kg)</th>
              <th>LL<br>(cm)</th>
              <th>LP<br>(cm)</th>
              <th>LPA<br>(cm)</th>
              <th>LPB<br>(cm)</th>
              <th>LB<br>(cm)</th>
              <th>LD<br>(cm)</th>
              <th>LPT<br>(cm)</th>
              <th>LBS<br>(cm)</th>
              <th>BMI</th>
              {{-- <th>Status<br>BMI</th> --}}
              <th>BFP(%)</th>
              {{-- <th>Status BFP</th> --}}
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($show_data_fisik as $data_fisik)
              <tr>
                <td><a href="" class="info-analisis-data_fisik" data-toggle="modal" data-target="#modal-default-info-data_fisik" 
                  data-id="{{ $data_fisik->id_data_fisik }}" type="button">{{ $data_fisik->tgl }}</a></td>
                <td>{{ $data_fisik->tinggi }}</td>
                <td>{{ $data_fisik->berat }}</td>
                <td>{{ $data_fisik->neck }}</td>
                <td>{{ $data_fisik->waist}}</td>
                <td>{{ $data_fisik->hip }}</td>
                <td>{{ $data_fisik->paha_bwh }}</td>
                <td>{{ $data_fisik->bisep }}</td>
                <td>{{ $data_fisik->dada }}</td>
                <td>{{ $data_fisik->pantat }}</td>
                <td>{{ $data_fisik->betis }}</td>
                <td>{{ $data_fisik->body_mass }}</td>
                {{-- <td>
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
                </td> --}}
                <td>{{ $data_fisik->body_fat }} %</td>
                {{-- <td>
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
                </td> --}}
                <td>
                  <!-- button hapus data fisik -->
                  <a type="button" data-toggle="modal" data-target="#modal-default-hapus-data_fisik" 
                  data-id="{{ $data_fisik->id_data_fisik }}" style="position: relative;
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
                  <!-- end hapus data fisik -->                        
                </td>
              </tr>
              @endforeach
            </tbody>
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

<!-- modal tambah data fisik -->
<div class="modal fade" id="modal-default-data-fisik">
  <div class="modal-dialog" style="width: 30%;">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <div style="display: flex;">
                <h4 class="modal-title">Tambah Data Fisik&nbsp;</h4>
                {{-- <h4 class="modal-title"><b id="nama_tambah"></b></h4> --}}
              </div>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('saveDataFisik') }}">
            @csrf
            <div class="box-body" style="margin-top: 2%; margin-left: 5%;">
              <div class="form-group">
                  <!-- Input field untuk data id pengguna -->
                  <input type="hidden" name="kode_pengguna" id="kode_pengguna">  
                  <!-- Input field untuk data gender -->       
                  <input type="hidden" name="jekel" id="jekel">      
                  <label class="control-label col-sm-4">Tanggal: </label>
                  <div class="col-sm-6">
                    <div class="input-group">                       
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        @php
                          $tanggal = date("Y m d");
                        @endphp
                        <input type="text" name="tanggal" value="<?php echo $tanggal; ?>" required class="form-control" 
                        data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                  </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-sm-4">Tinggi:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="tinggi" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Berat:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="berat" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Kg</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Leher:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_leher" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Pinggang:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_pinggang" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Paha Atas:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_paha_atas" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Paha Bawah:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_paha_bawah" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Bisep:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_bisep" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Dada:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_dada" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Pantat:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" 
                  maxlength="5" required name="lingkar_pantat" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Lingkar Betis:</label>
                <div class="col-sm-3">
                  <input type="text" pattern="[0-9.]*" oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  maxlength="5" required name="lingkar_betis" class="form-control">
                </div>
                <div class="col-sm-3">
                  <p class="help-block">Cm</p>
                </div>
              </div>
            </div>
            <!-- box-footer -->
            <div class="modal-footer">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal informasi analisis data fisik -->
<div class="modal fade" id="modal-default-info-data_fisik">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hasil Analisa Kegiatan Kebugaran</h4>
      </div>
      {{-- <input type="text" name="idDataFisik" id="idDataFisik"> <!-- Hidden field untuk ID jadwal --> --}}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <!-- /.box-header -->
            <div class="box-body" style="margin-left: -36px">
              <dl class="dl-horizontal">
                <dt>Nama Anggota Gym :</dt>
                <dd id='namaAnggotaGym'></dd>
                <dt>Tanggal Lahir :</dt>
                <dd id='tanggalLahir'></dd>
                <dt>Gender :</dt>
                <dd id='genderAnggotaGym'></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="col-md-6">
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Tanggal Ukur :</dt>
                <dd id='tglUkur'></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- Data table -->
          <div class="row" style="padding: 12px; 12px; 12px; 12px;">
            <div class="col-xs-12">
              <div class="box">
                {{-- <div class="box-header">
                  <h3 class="box-title">Responsive Hover Table</h3>
                </div> --}}
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Parameter</th>
                      <th>Hasil</th>
                      <th>Satuan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                    </tr>
                    <tr>
                      <td>BMI</td>
                      <td id='bmi'></td>
                      <td>kg/m<sup>2</sup></td>
                      <td class="bmi-cell"></td>
                      <td class="bmi-ktrngn"></td>
                    </tr>
                    <tr>
                      <td>BFP</td>
                      <td id='bfp'></td>
                      <td>%</td>
                      <td class="bfp-cell"></td>
                      {{-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                      <td class="bfp-ktrngn"></td>
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <!-- end Data table -->
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


<!-- hapus data fisik script -->
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
<!-- end hapus data fisik script -->

<!-- create data fisik script -->
<script>
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
</script>
<!-- end create data fisik script -->

<!-- analisis data fisik script -->
<script>
  $(document).ready(function() {
      // Fungsi untuk membuka form modal
      $('.info-analisis-data_fisik').on('click', function() {
          var userId = $(this).data('id');
          var url = "{{ route('showAnalisis', ':id') }}".replace(':id', userId);
          
      // Mengirim permintaan AJAX ke backend Laravel
      $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Mengisi nilai-nilai kontrol form modal dengan data yang diterima
                     $('#idDataFisik').val(response.id_data_fisik);
                     $('#namaAnggotaGym').text(response.name);
                     $('#tanggalLahir').text(response.tgl_lahir);
                     $('#genderAnggotaGym').text(response.gender);
                     $('#tglUkur').text(response.tgl);
                     $('#bmi').text(response.body_mass);
                     $('#bfp').text(response.body_fat);

                      // BMI Kategorisasi
                      var bmiLabel = 'No data';
                      var bmiColor = '#AAAAAA';

                      if (response.body_mass !== null) {
                        if (response.body_mass < 18.5) {
                          bmiLabel = 'Underweight';
                          bmiColor = '#3C8DBC';
                        } else if (response.body_mass >= 18.5 && response.body_mass <= 24.9) {
                          bmiLabel = 'Normal weight';
                          bmiColor = '#00A65A';
                        } else if (response.body_mass >= 25 && response.body_mass <= 29.9) {
                          bmiLabel = 'Overweight';
                          bmiColor = '#F39C12';
                        } else if (response.body_mass >= 30 && response.body_mass <= 35) {
                          bmiLabel = 'Obese';
                          bmiColor = '#DD4B39';
                        } else {
                          bmiLabel = 'Morbid obesity';
                          bmiColor = '#504C8C';
                        }
                      }

                      $('.bmi-cell').html(`
                          <div class="badge" style="background-color: ${bmiColor};">
                            ${bmiLabel}
                          </div>
                        `);

                      // BFP Kategorisasi
                      var bfpLabel = 'No data';
                      var bfpColor = '#AAAAAA';
                      // Wanita
                      if (response.body_fat !== null) {
                        if(response.body_fat < 10 && response.gender ==='Wanita') {
                            bfpLabel = 'Unknown';
                            bfpColor = '#d2d6de';
                        } else if (response.body_fat >= 10 && response.body_fat <= 13.49 && response.gender ==='Wanita') {
                            bfpLabel = 'Essential Fat';
                            bfpColor = '#3c8dbc';
                        } else if (response.body_fat >= 13.50 && response.body_fat <= 20.49 && response.gender ==='Wanita') {
                            bfpLabel = 'Athletes';
                            bfpColor = '#00c0ef';
                        } else if (response.body_fat >= 20.50 && response.body_fat <= 24.49 && response.gender ==='Wanita') {
                            bfpLabel = 'Fitness';
                            bfpColor = '#00a65a';  
                        } else if (response.body_fat >= 24.50 && response.body_fat <= 31.49 && response.gender ==='Wanita') {
                            bfpLabel = 'Acceptable';
                            bfpColor = '#f39c12';
                        } else if (response.body_fat >= 31.50 && response.gender ==='Wanita') {
                            bfpLabel = 'Obese';
                            bfpColor = '#f56954';
                        }
                      }
                      // Pria
                      if (response.body_fat !== null) {
                        if(response.body_fat < 2 && response.gender ==='Pria') {
                            bfpLabel = 'Unknown';
                            bfpColor = '#d2d6de';
                        } else if (response.body_fat >= 2 && response.body_fat <= 5.49 && response.gender ==='Pria') {
                            bfpLabel = 'Essential Fat';
                            bfpColor = '#3c8dbc';
                        } else if (response.body_fat >= 5.50 && response.body_fat <= 13.49 && response.gender ==='Pria') {
                            bfpLabel = 'Athletes';
                            bfpColor = '#00c0ef';
                        } else if (response.body_fat >= 13.50 && response.body_fat <= 17.49 && response.gender ==='Pria') {
                            bfpLabel = 'Fitness';
                            bfpColor = '#00a65a';  
                        } else if (response.body_fat >= 17.50 && response.body_fat <= 24.49 && response.gender ==='Pria') {
                            bfpLabel = 'Acceptable';
                            bfpColor = '#f39c12';
                        } else if (response.body_fat >= 24.50 && response.gender ==='Pria') {
                            bfpLabel = 'Obese';
                            bfpColor = '#f56954';
                        }
                      }

                      $('.bfp-cell').html(`
                          <div class="badge" style="background-color: ${bfpColor};">
                            ${bfpLabel}
                          </div>
                        `);

                    // BMI Keterangan
                    var bmiKtrngn = 'No data';
                      if (response.body_mass !== null) {
                        if (response.body_mass < 18.5) {
                          bmiKtrngn = 'Berat badan dibawah normal atau kurang ideal';
                        } else if (response.body_mass >= 18.5 && response.body_mass <= 24.9) {
                          bmiKtrngn = 'Berat badan berada pada batas ideal';
                        } else if (response.body_mass >= 25 && response.body_mass <= 29.9) {
                          bmiKtrngn = 'Berat badan melebihi batas ideal';
                        } else if (response.body_mass >= 30 && response.body_mass <= 35) {
                          bmiKtrngn = 'Berat badan sudah mencapai obesitas tingkat I';
                        } else {
                          bmiKtrngn = 'Berat badan sudah mencapai obesitas tingkat I';
                        }
                      }

                      $('.bmi-ktrngn').html(`
                          <div>
                            ${bmiKtrngn}
                          </div>
                        `);
                    
                    // BFP Keterangan
                    var bfpKtrngn = 'No data';
                    // Wanita
                    if (response.body_fat !== null) {
                      if(response.body_fat < 10 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Unknown';
                      } else if (response.body_fat >= 10 && response.body_fat <= 13.49 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Persentase ini adalah yang terendah yang seharusnya dimiliki seorang wanita. Pada persentase ini, vaskularisasi dan lurik wanita terlihat';
                      } else if (response.body_fat >= 13.50 && response.body_fat <= 20.49 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Lemak tubuh didistribusikan secara merata ke seluruh tubuh. Otot mungkin sedikit terlihat, tetapi tidak terlalu jelas';
                      } else if (response.body_fat >= 20.50 && response.body_fat <= 24.49 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Lemak tubuh lebih terlihat, terutama di sekitar pinggang dan paha. Otot mungkin tidak terlihat';
                      } else if (response.body_fat >= 24.50 && response.body_fat <= 31.49 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Lemak tubuh lebih menonjol, terutama di perut, pinggul, dan paha. Otot tidak terlalu terlihat';
                      } else if (response.body_fat >= 31.50 && response.gender ==='Wanita') {
                          bfpKtrngn = 'Lemak tubuh sangat terlihat di seluruh tubuh. Otot tidak didefinisikan sama sekali';
                      }
                    }
                     // Pria
                     if (response.body_fat !== null) {
                      if(response.body_fat < 2 && response.gender ==='Pria') {
                          bfpKtrngn = 'Unknown';
                      } else if (response.body_fat >= 2 && response.body_fat <= 5.49 && response.gender ==='Pria') {
                          bfpKtrngn = 'Sangat kurus. Banyak binaragawan turun ke persentase lemak tubuh sekitar 2-4% saat mereka bersiap untuk kompetisi';
                      } else if (response.body_fat >= 5.50 && response.body_fat <= 13.49 && response.gender ==='Pria') {
                          bfpKtrngn = 'Otot tubuh sangat jelas dan perut terlihat. Vaskularitas juga menonjol';
                      } else if (response.body_fat >= 13.50 && response.body_fat <= 17.49 && response.gender ==='Pria') {
                          bfpKtrngn = 'Otot Perut masih terlihat, tetapi tidak begitu jelas. Vaskularisasi kurang menonjol dibandingkan persentase lemak tubuh yang lebih rendah';
                      } else if (response.body_fat >= 17.50 && response.body_fat <= 24.49 && response.gender ==='Pria') {
                          bfpKtrngn = 'Otot Perut kurang terlihat, dan sebagian lemak tubuh mungkin terlihat di sekitar pinggang';
                      } else if (response.body_fat >= 24.50 && response.gender ==='Pria') {
                          bfpKtrngn = 'Garis pinggang terasa lebih tebal, dan lemak tubuh mungkin terlihat di area lain seperti dada dan punggung';
                      }
                    }

                    $('.bfp-ktrngn').html(`
                          <div>
                            ${bfpKtrngn}
                          </div>
                        `);

                        
                    console.log(response.id_data_fisik);
                    console.log(url);
                    console.log(response.name);
                    console.log(response.tgl_lahir);
                    console.log(response.gender);
                    console.log(response.tgl);
                    console.log(response.body_mass);
                    console.log(response.body_fat);
                },
                error: function(xhr) {
                    // Tangani jika terjadi kesalahan pada permintaan AJAX
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<!-- end analisis data fisik script -->

<!-- Refresh filtering-->
<script>
  // Mendapatkan parameter query string berdasarkan nama
  function getQueryStringValue(key) {
      var urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(key);
  }

  // Mendapatkan id halaman dari parameter query string
  var pageId = getQueryStringValue('id');

  // Mendapatkan elemen tautan berdasarkan id
  var link = document.getElementById('dynamicLink');

  // Mengubah tautan href dengan id halaman dari parameter query string
  if (pageId) {
      var href = '/detailInfo/' + pageId;
      link.href = href;
  }
  // link.href = '/detailInfo/' + pageId;
</script>
<!-- Refresh filtering end -->

<!-- Orderby descending datatable -->
<script>
  $(document).ready(function() {
     if ($.fn.DataTable.isDataTable('#example1')) {
         $('#example1').DataTable().destroy();
     }
   
     $('#example1').DataTable({
         "order": [[ 0, "desc" ]]
     });
 });
</script>
<!-- Orderby descending datatable end -->

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
<!-- end graphic script -->
</body>
</html>