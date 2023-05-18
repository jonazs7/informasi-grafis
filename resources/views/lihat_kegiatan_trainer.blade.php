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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default-kegiatan"
                    style="margin-top: 12px">+ Tambah Kegiatan</button>
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
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Sesi Latihan</th>
                                    <th>Program Latihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_kegiatan as $kegiatan)
                                <tr>
                                    <td>{{ $kegiatan->tgl_mulai }}</td>
                                    <td>{{ $kegiatan->tgl_selesai }}</td>
                                    <td>{{ $kegiatan->sesi_latihan }}</td>
                                    <td>{{ $kegiatan->jenis_latihan }}</td>
                                    <td>{{ $kegiatan->status }}</td>
                                    <td>
                                        <form action="{{ route('deleteKegiatan', $kegiatan->id_jadwal) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
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


    <!-- modal -->
    <div class="modal fade" id="modal-default-kegiatan">
        <div class="modal-dialog" style="width: 20%">
            <div class="modal-content">
                <form method="POST" action="{{ route('save_kegiatan') }}">
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
    <!-- /.modal -->

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
            <form action="{{ route('deleteKegiatan') }}" method="post">
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
</body>
</html>
