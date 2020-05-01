
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4 sidebar-dark-danger">
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard'); ?>" class="brand-link navbar-lightblue">
      <img src="<?= base_url(); ?>assets/dist/img/default.png"
           alt="AdminLTE Logo"
           class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E <i>Kontrak</i></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/dist/img/<?php echo $userdata->foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $userdata->nama; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">MEMU UTAMA</li>
          <li class="nav-item">
            <a href="<?php echo site_url('Dashboard'); ?>" class="nav-link">
              <span class="nav-icon fa fa-home"> </span>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Data_latih'); ?>" class="nav-link">
              <span class="nav-icon fa fa-list-alt"></span>
              <p>
                Data Latih
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fa fa-stethoscope"></i>
              <p>
                Prediksi Kontrak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Data_selkaryawan'); ?>" class="nav-link">
              <i class="nav-icon fa fa-newspaper"></i>
              <p>
                Data Karyawan Terseleksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Surat Kontrak Masuk
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-male"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Tambah Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>List Admin</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>