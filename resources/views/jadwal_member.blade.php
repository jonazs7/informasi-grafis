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
        Jadwal Kebugaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      @if(session('berhasil'))
      <div class="alert alert-success alert-dismissible" style="margin-top: 8px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
        {{ session('berhasil') }}
      </div>
      @endif
      {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default-tambah-goal"
      style="margin-top: 12px">+ Tambah Goal</button> --}}
      {{-- @if ($show_jadwal->contains('status', 'Proses'))
        <a class="btn btn-app" type="button" style="width: 140px; margin-top: 8px;" 
        data-toggle="modal" data-target="#modal-default-alert-goal" disabled>
            <i class="fa fa-plus"></i>Tambah Goal
        </a>
      @else
        <a class="btn btn-app" type="button" style="width: 140px; margin-top: 8px;" 
        data-toggle="modal" data-target="#modal-default-tambah-goal">
            <i class="fa fa-plus"></i>Tambah Goal
        </a>
      @endif --}}
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Data Table -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rincian Kegiatan</h3>
              <!-- button tambah goal -->
              @if ($show_jadwal->contains('status', 'Proses'))
                <a type="button" data-toggle="modal" data-target="#modal-default-alert-goal" disabled style="position: relative;
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
              @else
                <a type="button" data-toggle="modal" data-target="#modal-default-tambah-goal" style="position: relative;
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
              @endif
              <!-- end tambah goal -->       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Goal</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Sesi Latihan Tiap Bulan</th>
                  <th>Program Latihan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody> 
                @foreach ($show_jadwal as $no => $jadwal)
                <tr>
                  <td>{{ $no + 1 }}</td>
                  <td>{{ $jadwal->goal }}</td>
                  <td>{{ $jadwal->tgl_mulai }}</td>
                  <td>{{ $jadwal->tgl_selesai }}</td>
                  <td>{{ $jadwal->sesi_latihan }}</td>
                  <td>{{ $jadwal->jenis_latihan }}</td>
                  <td>
                    <div class="label {{ $jadwal->status === 'Proses' ? 'bg-yellow' : 'bg-green' }}">
                      {{ $jadwal->status }}
                    </div>
                  </td>        
                </tr>
                @endforeach
                {{-- <tr>
                  <td>2023-02-02</td>
                  <td>2023-02-02</td>
                  <td>2023-03-02</td>
                  <td>6 kali</td>
                  <td>Push, Pull</td>
                  <td>Selesai</td>
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


<!-- modal tambah goal -->
<div class="modal fade" id="modal-default-tambah-goal">
  <div class="modal-dialog" style="width: 20%">
      <div class="modal-content">
          <form method="POST" action="{{ route('saveGoal') }}">
              @csrf
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Goal Baru</h4>
              </div>
              <div class="modal-body">
                  <!-- Input field untuk data -->
                  <input type="hidden" name="kode_pengguna" value="{{ $pengguna->id }}">
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

<!-- modal alert goal -->
<div class="modal fade" id="modal-default-alert-goal">
  <div class="modal-dialog" style="width: 30%">
      <div class="modal-content">
          <form method="POST" action="{{ route('saveGoal') }}">
              @csrf
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Peringatan</h4>
              </div>
              <div class="modal-body">
                <p>Anda tidak dapat menambahkan jadwal, selagi ada jadwal training Anda yang <b>sedang berlangsung</b></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              </div>
          </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>