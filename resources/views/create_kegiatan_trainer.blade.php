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
                    Program Kebugaran, Thenmust
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kegiatan Baru</h4>
                </div>
                <div class="modal-body">
                    <!-- Date -->
                    <div class="form-group">
                        <label>Tanggal Mulai</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepickerStart">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <!-- Date -->
                    <div class="form-group">
                        <label>Tanggal Selesai</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepickerEnd">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <!-- Textbox -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sesi Program Kegiatan</label>
                        <input type="text" class="form-control">
                    </div>
                    <!-- /.form group -->
                    <!-- checkbox -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Program Kegiatan</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Full Body
                            </label>
                            <label class="col-md-4">
                                <input type="checkbox"> Tricep
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Pull
                            </label>
                            <label class="col-md-4">
                                <input type="checkbox"> Shoulder
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Push
                            </label>
                            <label class="col-md-4">
                                <input type="checkbox"> Chest
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Legs
                            </label>
                            <label class="col-md-4">
                                <input type="checkbox"> Back
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Bicep
                            </label>
                            <label class="col-md-4">
                                <input type="checkbox"> ABS
                            </label>
                        </div>
                    </div>
                    <!-- /.form group -->
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
