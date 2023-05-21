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
        <li class="{{ request()->is('jadwalTrainer','showKegiatan/*') ? 'active' : '' }}"><a href="/jadwalTrainer"><i class="fa fa-tasks"></i> <span>Jadwal</span></a></li>
        <li class="{{ request()->is('hasilCapaian',  'detailInfo') ? 'active' : '' }}"><a href="/hasilCapaian"><i class="fa fa-bar-chart"></i> <span>Hasil Capaian</span></a></li>
        <li class="{{ request()->is('anggotaGym') ? 'active' : '' }}"><a href="/anggotaGym"><i class="fa fa-users"></i> <span>Anggota gym</span></a></li>
        <li class="{{ request()->is('profilTrainer') ? 'active' : '' }}"><a href="/profilTrainer"><i class="fa fa-user"></i> <span>Profil</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>