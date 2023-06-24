<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- end Sidebar user panel (optional) -->

      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree" style="margin-top: 50px">
        <li class="{{ request()->is('beranda', 'home') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li class="{{ request()->is('jadwal') ? 'active' : '' }}"><a href="/jadwal"><i class="fa fa-tasks"></i> <span>Jadwal</span></a></li>
        <li class="{{ request()->is('biodata') ? 'active' : '' }}"><a href="/biodata"><i class="fa fa-user"></i> <span>Biodata</span></a></li>
        <li class="{{ request()->is('akunMember') ? 'active' : '' }}"><a href="/akunMember"><i class="fa fa-gear"></i> <span>Akun</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>