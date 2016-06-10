  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() .'assets/dist/img/avatar5.png'?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nombre'); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="treeview <?= ($active == "administrador") ? "active" : "" ?>">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Administrador</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($sub_active == "usuario") ? "active" : "" ?>"><a href="<?php echo base_url() .'admin/usuario'?>"><i class="fa fa-users"></i>Usuarios</a></li>
            
          </ul>
        </li>
        <li class="<?= ($active == "empresa") ? "active" : "" ?>">
          <a href="<?php echo base_url() .'admin/empresa'?>">
            <i class="fa fa-building-o"></i>
            <span><Charts>Empresas</Charts></span>
          </a>
        </li>
        <li class="treeview <?= ($active == "programa") ? "active" : "" ?>">
          <a href="#">
            <i class="fa fa-tasks"></i>
            <span><Charts>Programas</Charts></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($sub_active == "seguridad") ? "active" : "" ?>">
              <a href="#"><i class="fa fa-circle-o"></i>Seguridad<i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <li class="<?= ($sub_active == "tipos_programa") ? "active" : "" ?>"><a href="<?php echo base_url() .'admin/tipos_programas'?>">Tipos de Programa</a></li>
              </ul>
            </li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Plan de Capacitación</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
