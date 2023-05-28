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
          {{-- @foreach ($show_capaian as $capaian)
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/' . $capaian->foto) }}" 
                  style="width: 100px; height: 100px;">
                  <h3 class="profile-username text-center">{{ $capaian->name }}</h3>
                  <p class="text-muted text-center">{{ $capaian->level }}</p>
                  <table class="table text-center">
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" 
                        data-target="#modal-default-data-fisik" data-id="{{ $capaian->id }}">Tambah Data</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-default btn-sm">Detail Info</button>
                    </td>
                  </table>
                  <div style="margin-top: 12px; margin-bottom: 12px">
                    <b style="font-size: 18px">Informasi Kontak</b>
                  </div>           
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b class="fa fa-envelope"></b> <a style="margin-left: 12px">{{ $capaian->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-phone"></b> <a style="margin-left: 12px">{{ $capaian->tlpn }}</a>
                    </li>
                    <li class="list-group-item">
                      <b class="fa fa-intersex"></b> <a style="margin-left: 12px">{{ $capaian->gender }}</a>
                    </li>
                  </ul>

                  <div class="row" style="display: flex; justify-content: center">
                    <div class="chart col-md-6" id="sales-chart1" style="height: 150px; width: 150px;"></div>
                    <div class="chart col-md-6" id="sales-chart2" style="height: 150px; width: 150px;"></div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          @endforeach --}}
            
            {{-- <div class="col-md-3">
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

                  <div class="row" style="display: flex; justify-content: center">
                    <div class="chart col-md-6" id="sales-chart3" style="height: 150px; width: 150px;"></div>
                    <div class="chart col-md-6" id="sales-chart4" style="height: 150px; width: 150px;"></div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col --> --}}
        </div>
        <!-- /.row -->

        <!-- Data table -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Rincian Capaian</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Nama</th>
                <th>Gender</th>
                <th>Rerata BMI</th>
                <th>Status BMI</th>
                <th>Rerata BFP</th>
                <th>Status BFP</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($show_capaian as $capaian)
              <tr>
                <td>{{ $capaian->name }}</td>
                <td>{{ $capaian->gender }}</td>
                <td>{{ $capaian->rerata_bmi }}</td>
                <td>isi ktrng bmi</td>
                <td>{{ $capaian->rerata_bfp }}</td>
                <td>isi ktrng bfp</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm create-data-fisik" data-toggle="modal" 
                  data-target="#modal-default-data-fisik" data-id="{{ $capaian->id }}">Tambah Data</button>
                  <button type="button" class="btn btn-default btn-sm">Detail Info</button>
                </td>
              </tr>
              @endforeach
              {{-- <tr>
                <td>thenmust</td>
                <td>pria</td>
                <td>20</td>
                <td>BMI Kurang</td>
                <td>52</td>
                <td>BFP Bagus</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
                  data-target="#modal-default-data-fisik">Tambah Data</button>
                  <button type="button" class="btn btn-default btn-sm">Detail Info</button>
                </td>
              </tr> --}}
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


<!-- modal tambah data fisik -->
<div class="modal fade" id="modal-default-data-fisik">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Data Fisik Baru</h4>
          </div>
          <form method="POST" action="{{ route('saveDataFisik') }}"> 
            @csrf
            <div class="modal-body">  
                <!-- Input field untuk data -->
                <input type="text" name="kode_pengguna" id="kode_pengguna">         
                <div style="display: flex; justify-content: space-around">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" id="tanggal" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                    </div>
                  </div>
                  <!-- /.form group -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tinggi (m)</label>
                      <input type="text" name="tinggi" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Bisep (cm)</label>
                      <input type="text" name="lingkar_bisep" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Berat (kg)</label>
                      <input type="text" name="berat" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Dada (cm)</label>
                      <input type="text" name="lingkar_dada" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Leher (cm)</label>
                      <input type="text" name="lingkar_leher" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Pantat (cm)</label>
                      <input type="text" name="lingkar_pantat" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Pinggang (cm)</label>
                      <input type="text" name="lingkar_pinggang" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Paha Bawah (cm)</label>
                      <input type="text" name="lingkar_paha_bawah" class="form-control">
                  </div>
                  <!-- end text input -->
                </div>
                <div style="display: flex; justify-content: space-around;">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Paha Atas (cm)</label>
                      <input type="text" name="lingkar_paha_atas" class="form-control">
                  </div>
                  <!-- end text input -->
                  <!-- text input -->
                  <div class="form-group">
                    <label>Lingkar Betis (cm)</label>
                      <input type="text" name="lingkar_betis" class="form-control">
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
<!-- /.modal -->


<!-- page script -->
{{-- <script>
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
</script> --}}

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
                    // $('#status').val(response.status);
                    // $('#goal').val(response.goal);
                    // $('#tanggal_mulai').val(response.tgl_mulai);
                    // $('#tanggal_selesai').val(response.tgl_selesai);
                    // $('#sesi_latihan').val(response.sesi_latihan);

                    console.log(url);
                    console.log(response.id);
    
                },
                error: function(xhr) {
                    // Tangani jika terjadi kesalahan pada permintaan AJAX
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>

