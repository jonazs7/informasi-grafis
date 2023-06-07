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
                    Program Kebugaran, {{ $nama_pengguna->name }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
                @if(session('hapusKegiatan'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
                  {{ session('hapusKegiatan') }}
                </div>
                @endif
                @if(session('updateKegiatan'))
                <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
                  {{ session('updateKegiatan') }}
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
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default-tambah-kegiatan"
                    style="margin-top: 12px">+ Tambah Kegiatan</button> --}}
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
                                    <th>No</th>
                                    <th>Goal</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Sesi Latihan Tiap Bulan</th>
                                    <th>Program Latihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_kegiatan as $no => $kegiatan)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $kegiatan->goal }}</td>
                                    <td>{{ $kegiatan->tgl_mulai }}</td>
                                    <td>{{ $kegiatan->tgl_selesai }}</td>
                                    <td>{{ $kegiatan->sesi_latihan }}</td>
                                    <td>{{ $kegiatan->jenis_latihan }}</td>
                                    <td>
                                        <div class="label {{ $kegiatan->status === 'Proses' ? 'bg-yellow' : 'bg-green' }}">
                                        {{ $kegiatan->status }}
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <form action="{{ route('deleteKegiatan', $kegiatan->id_jadwal) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="id" value="{{ $kegiatan->id_jadwal }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form> --}}
                                        {{-- <button type="button" class="btn btn-danger btn-sm" 
                                        data-toggle="modal" data-target="#modal-default-hapus-kegiatan" 
                                        data-id="{{ $kegiatan->id_jadwal }}">Hapus
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm update-jadwal" 
                                        data-toggle="modal" data-target="#modal-default-ubah-kegiatan" 
                                        style="margin-left: 8px;"
                                        data-id="{{ $kegiatan->id_jadwal }}">Ubah
                                        </button> --}}
                                        {{-- <a class="btn btn-app update-jadwal" type="button" data-toggle="modal" 
                                        data-target="#modal-default-ubah-kegiatan" data-id="{{ $kegiatan->id_jadwal }}">
                                          <i class="fa fa-pencil"></i> Ubah
                                        </a>
                                        <a class="btn btn-app" type="button" data-toggle="modal" 
                                        data-target="#modal-default-hapus-kegiatan" data-id="{{ $kegiatan->id_jadwal }}">
                                          <i class="fa fa-trash"></i> Hapus
                                        </a> --}}
                                        <!-- button ubah kegiatan -->
                                        <a class="update-jadwal" type="button" data-toggle="modal" 
                                        data-target="#modal-default-ubah-kegiatan" data-id="{{ $kegiatan->id_jadwal }}" style="position: relative;
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
                                            <i class="fa fa-edit"></i>
                                        </a>     
                                        <!-- end ubah kegiatan -->
                                        <!-- button hapus kegiatan -->
                                        <a type="button" data-toggle="modal" 
                                        data-target="#modal-default-hapus-kegiatan" data-id="{{ $kegiatan->id_jadwal }}" style="position: relative;
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
                                        <!-- end hapus kegiatan -->
                                    </td>
                                </tr>
                                @endforeach
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


    {{-- <!-- modal tambah kegiatan -->
    <div class="modal fade" id="modal-default-tambah-kegiatan">
        <div class="modal-dialog" style="width: 20%">
            <div class="modal-content">
                <form method="POST" action="{{ route('saveKegiatan') }}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kegiatan Baru</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Input field untuk data -->
                        <input type="hidden" name="kode_pengguna" value="{{ $nama_pengguna->id }}">
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal_mulai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal_selesai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Textbox -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sesi Program Kegiatan</label>
                            <input type="text" name="sesi_latihan" class="form-control">
                        </div>
                        <!-- /.form group -->
                        <!-- checkbox -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Program Kegiatan</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Full Body"> Full Body
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Tricep"> Tricep
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Pull"> Pull
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Shoulder"> Shoulder
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Push"> Push
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Chest"> Chest
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Legs"> Legs
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Back"> Back
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Bicep"> Bicep
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="ABS"> ABS
                                </label>
                            </div>
                        </div>
                        <!-- /.form group -->
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

    <!-- modal hapus kegiatan -->
    <div class="modal fade" id="modal-default-hapus-kegiatan">
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
            <form action="" id="deleteFormKegiatan" method="post">
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

    <!-- modal ubah kegiatan -->
    <div class="modal fade" id="modal-default-ubah-kegiatan">
        <div class="modal-dialog" style="width: 20%">
            <div class="modal-content">
                {{-- <form method="POST" action="{{ route('updateKegiatan', ['id_jadwal' => $kegiatan->id_jadwal]) }}"> --}}
                <form method="POST" action="{{ route('updateKegiatan', ['kode_jadwal' => ':id_jadwal']) }}" id="update-form">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kegiatan</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="jadwal_id" id="jadwal_kode"> <!-- Hidden field untuk ID jadwal -->
                        <!-- Status -->
                        <div class="form-group">
                            <label>Status Kegiatan Berjalan</label>
                            <select class="form-control" name="status" id="status">
                              <option value="Proses">Proses</option>
                              <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <!-- /.Status -->
                        <!-- Goal -->
                        <div class="form-group">
                            <label>Goal</label>
                            <select class="form-control" name="goal" id="goal">
                              <option value="Increase muscle size">Increase muscle size</option>
                              <option value="Lose body fat">Lose body fat</option>
                              <option value="Sport spesific training">Sport spesific training</option>
                              <option value="Rehabilitate an injury">Rehabilitate an injury</option>
                              <option value="Nutrition education">Nutrition education</option>
                              <option value="Start an work out train">Start an work out train</option>
                              <option value="Fan">Fan</option>
                              <option value="Motivation">Motivation</option>
                              <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <!-- /.Goal -->
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Textbox -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sesi Program Kegiatan</label>
                            <input type="text" name="sesi_latihan" id="sesi_latihan" class="form-control"
                            pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="2">
                        </div>
                        <!-- /.form group -->
                        <!-- checkbox -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Program Kegiatan</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Full Body"> Full Body
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Tricep"> Tricep
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Pull"> Pull
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Shoulder"> Shoulder
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Push"> Push
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Chest"> Chest
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Legs"> Legs
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="Back"> Back
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="jenis_latihan[]" value="Bicep"> Bicep
                                </label>
                                <label class="col-md-4">
                                    <input type="checkbox" name="jenis_latihan[]" value="ABS"> ABS
                                </label>
                            </div>
                        </div>
                        <!-- /.form group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


<script>
    $('#modal-default-hapus-kegiatan').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var form = $('#deleteFormKegiatan');
        var url = '{{ route("deleteKegiatan", ":id") }}';
        url = url.replace(':id', id);
        form.attr('action', url);
        console.log(url);
    });
</script>

<script>
  $(document).ready(function() {
    //   $('.update-jadwal').click(function() {   
        // beda on click dengan clik, kalau clik mengikat 
        // elemen dihalaman itu saja, kalau on click tetap terikat 
        // dan berlaku untuk elemen-elemen yang muncul secara dinamis, termasuk 
        // elemen .update-jadwal pada halaman paginasi selanjutnya.    
    // Fungsi untuk membuka form modal    
      $(document).on('click', '.update-jadwal', function() {
        // Hapus data lama yang mungkin tersisa sebelum membuka modal
        $('input[type=checkbox]').prop('checked', false);
          var userId = $(this).data('id');
          var url = "{{ route('editKegiatan', ':id') }}".replace(':id', userId);
          
      // Mengirim permintaan AJAX ke backend Laravel
      $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    // Mengisi nilai-nilai kontrol form modal dengan data yang diterima
                    $('#jadwal_kode').val(response.id_jadwal);
                    $('#status').val(response.status);
                    $('#goal').val(response.goal);
                    $('#tanggal_mulai').val(response.tgl_mulai);
                    $('#tanggal_selesai').val(response.tgl_selesai);
                    $('#sesi_latihan').val(response.sesi_latihan);

                    // Mengisi nilai checkbox
                    var dataLama = response.jenis_latihan; // Array yang berisi nilai terpisah
                    var checkboxes = $('[name="jenis_latihan[]"]');
                    checkboxes.each(function() {
                        var value = $(this).val();
                        if (dataLama.includes(value)) {
                            $(this).prop('checked', true);
                        }
                    });
  
                    console.log(url);
                    console.log(response.jenis_latihan);
                },
                error: function(xhr) {
                    // Tangani jika terjadi kesalahan pada permintaan AJAX
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
$(document).ready(function() {
// $(document).on('click', function() { // negbug anjr pas diupdate malah ikut dinamis
  var form = $('#update-form');
  var originalAction = form.attr('action'); // Simpan URL action asli

  // Fungsi untuk membuka form modal
//   $('.update-jadwal').click(function() {
  $(document).on('click', '.update-jadwal', function() {
    $('input[type=checkbox]').prop('checked', false);
    var jadwalId = $(this).data('id');
    form.attr('action', originalAction.replace(':id_jadwal', jadwalId));
  });

  // Fungsi untuk menutup form modal
  $('#modal-default-ubah-kegiatan').on('hidden.bs.modal', function() {
    form.attr('action', originalAction); // Mengembalikan URL action ke nilai asli
  });
});
</script>

{{-- <script>
$(document).ready(function() {
    var form = $('#update-form');
    var originalAction = form.attr('action'); // Simpan URL action asli

    // Fungsi untuk membuka form modal
    $(document).on('click', '.update-jadwal', function() {
    $('input[type=checkbox]').prop('checked', false);
    var jadwalId = $(this).data('id');
    // var newAction = form.attr('action').replace(':id_jadwal', jadwalId);
    // form.attr('action', newAction);
    form.attr('action', originalAction.replace(':id_jadwal', jadwalId));
    });

    // Fungsi untuk menutup form modal
    $('#modal-default-ubah-kegiatan').on('hidden.bs.modal', function() {
    form.attr('action', originalAction); // Mengembalikan URL action ke nilai asli
    });
});
</script> --}}
    
{{-- Kaya gini bisa, tapi harus make document ready  PENJELASAN :
    Dalam contoh skrip yang Anda berikan, fungsi $('.update-jadwal').click(function() { ... }); akan dieksekusi ketika 
    elemen dengan kelas "update-jadwal" diklik. Namun, jika Anda menutup formulir dan membukanya kembali, fungsi 
    tersebut tidak akan dieksekusi lagi. Oleh karena itu, nilai jadwalId tidak akan diperbarui.
    Untuk mengatasi masalah ini, Anda dapat memindahkan kode yang terdapat dalam 
    fungsi $('.update-jadwal').click(function() { ... }); ke 
    dalam fungsi $(document).ready(function() { ... });. Dengan demikian, ketika halaman dimuat, kode 
    tersebut akan dieksekusi dan akan mengikat fungsi klik ke elemen "update-jadwal" yang ada pada saat 
    itu maupun yang akan muncul di kemudian hari. Dengan memindahkan kode ke dalam 
    fungsi $(document).ready(), Anda memastikan bahwa fungsi klik akan selalu 
    terikat ke elemen dengan kelas "update-jadwal" pada saat halaman selesai dimuat.--}}
{{-- <script>
$(document).ready(function(){
    $('.update-jadwal').click(function() {
    $('input[type=checkbox]').prop('checked', false);
    var jadwalId = $(this).data('id');
    $('#update-form').attr('action', $('#update-form').attr('action').replace(':id_jadwal', jadwalId));
    });
});
</script> --}}

{{-- Kalau ga make document ready kaga bisa, aneh anjr --}}
{{-- <script>
$('.update-jadwal').click(function() {
    $('input[type=checkbox]').prop('checked', false);
    var jadwalId = $(this).data('id');
    $('#update-form').attr('action', $('#update-form').attr('action').replace(':id_jadwal', jadwalId));
    });
</script> --}}
</body>
</html>
