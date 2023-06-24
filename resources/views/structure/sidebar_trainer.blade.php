<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- end Sidebar user panel (optional) -->

      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree" style="margin-top: 50px">
        <li class="{{ request()->is('berandaTrainer', 'home') ? 'active' : '' }}"><a href="/berandaTrainer"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li class="{{ request()->is('jadwalCapaianTrainer','showKegiatan/*', 'detailInfo/*', 'filterTanggalAnggota') ? 'active' : '' }}"><a href="/jadwalCapaianTrainer"><i class="fa fa-flag"></i> <span>Agenda & Capaian</span></a></li>
        {{-- <li class="{{ request()->is('hasilCapaian',  ) ? 'active' : '' }}"><a href="/hasilCapaian"><i class="fa fa-bar-chart"></i> <span>Hasil Capaian</span></a></li> --}}
        {{-- <li class="{{ request()->is('anggotaGym') ? 'active' : '' }}"><a href="/anggotaGym"><i class="fa fa-users"></i> <span>Anggota gym</span></a></li> --}}
        <li class="{{ request()->is('profilTrainer') ? 'active' : '' }}"><a href="/profilTrainer"><i class="fa fa-user"></i> <span>Profil</span></a></li>
        <li class="{{ request()->is('akunTrainer') ? 'active' : '' }}"><a href="/akunTrainer"><i class="fa fa-gear"></i> <span>Akun</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>