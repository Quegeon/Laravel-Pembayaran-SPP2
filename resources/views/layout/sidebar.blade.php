@if (Auth()->user()->level === 'admin')
  <!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="/dashboard" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Menu Utama
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/user" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelola Data User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/siswa" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelola Data Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/kelas" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelola Data Kelas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pembayaran" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelola Data Pembayaran</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-search"></i>
        <p>
          Setting
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
@else ()
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="/dashboard" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Menu Utama
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/pembayaran" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelola Data Pembayaran</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-search"></i>
        <p>
          Setting
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
@endif