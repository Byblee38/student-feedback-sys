<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url(); ?>assets/index3.html" class="brand-link">
    <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php if ($this->session->userdata('role') == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>Aspirasi" class="nav-link <?php if ($menu == 'm1') {
                                                                    echo 'active';
                                                                  } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Aspirasi
              </p>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role') == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>Kategori" class="nav-link <?php if ($menu == 'm2') {
                                                                    echo 'active';
                                                                  } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role') == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>Siswa" class="nav-link <?php if ($menu == 'm3') {
                                                                echo 'active';
                                                              } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role') == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>Admin" class="nav-link <?php if ($menu == 'm4') {
                                                                echo 'active';
                                                              } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a href="<?= base_url(); ?>Pelaporan" class="nav-link <?php if ($menu == 'm5') {
                                                                  echo 'active';
                                                                } ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Pelaporan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>