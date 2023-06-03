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
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Telepon</th>
              <th>Gender</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($show_pengguna as $pengguna)
              <tr>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->tlpn }}</td>
                <td>{{ $pengguna->gender }}</td>
                <td>
                  {{-- <a type="button" class="btn btn-primary btn-sm" href="{{ route('showKegiatan', $pengguna->id) }}">Kegiatan</a>
                  <a type="button" class="btn btn-default btn-sm profile-button" data-toggle="modal" 
                  data-target="#modal-default-profile" data-id="{{ $pengguna->id }}" style="margin-left: 8px">Profil</a> --}}
                  <a class="btn btn-app" type="button" href="{{ route('showKegiatan', $pengguna->id) }}">
                    @if ($pengguna->jmlh_status_proses !=0)
                      <span class="badge bg-yellow">{{ $pengguna->jmlh_status_proses }}</span>
                    @endif
                    <i class="fa fa-calendar"></i> Kegiatan
                  </a>
                  <a class="btn btn-app profile-button" type="button" data-toggle="modal" 
                  data-target="#modal-default-profile" data-id="{{ $pengguna->id }}">
                    <i class="fa fa-user-circle"></i> Profil
                  </a>
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
            <h4 class="modal-title" style="margin-top: -5%"><b id='nama'></b></h4>
          </div>
        
        
        <div style="display: grid; place-items: center; margin-top: 8px; margin-bottom: 8px;">
          <img id="gambar" class="img-circle" style="width: 160px; height: 160px;">
          {{-- <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" id="gambar" class="img-circle" alt="User Image"> --}}
        </div>
      </div>
      <div class="modal-body">
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
                    $('#nama').text(response.name);
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
</body>
</html>