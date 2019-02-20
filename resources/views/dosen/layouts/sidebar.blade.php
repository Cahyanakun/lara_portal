 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth()->user()->image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth()->user()->name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li>
          <a href="{{ route('beranda')}}">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="{{ route('homedosen')}}">
            <i class="fa fa-dashboard"></i> <span>Panel</span>
          </a>
        </li>
        <li>
          <a href="{{ route('vdosen')}}">
            <i class="fa fa-user-o"></i> <span>Dosen</span>
          </a>
        </li>
        <li>
          <a href="{{ route('vmahasiswa')}}">
            <i class="fa fa-user-o"></i> <span>Mahasiswa</span>
          </a>
        </li>
        <li>
          <a href="{{ route('postviewdosen')}}">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
          </a>
        </li>
        <li>
          <a href="{{ route('home')}}">
            <i class="fa fa-envelope-o"></i> <span>Perpesanan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>