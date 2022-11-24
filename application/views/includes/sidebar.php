<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                <p class="centered"><a href="profile.html"><img src="<?= base_url() ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	<h5 class="centered">
                    <?php
                        if (isset($_SESSION['Nombre']) && isset($_SESSION['Apellidos'])) {
                            echo strtoupper($_SESSION['Nombre']." ".$_SESSION['Apellidos']);
                        }
                    ?>
                </h5>
              	  	
                <li class="mt">
                    <a class="active" href="<?= base_url() ?>Dashboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php
                    if ($_SESSION['tipo'] == 'Profesor') {
                ?>
                        <li class="sub-menu">
                            <a href="<?= base_url() ?>Dashboard/gestionAlumnos" >
                                <i class="fa fa-tasks"></i>
                                <span>Gestión de Alumnos</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="<?= base_url() ?>Dashboard/crearTareas">
                                <i class="fa fa-desktop"></i>
                                <span>Crear Tareas</span>
                            </a>
                        </li>
                <?php
                    }
                ?>

                <li class="sub-menu">
                    <a href="<?= base_url() ?>Dashboard/misTareas" >
                        <i class="fa fa-cogs"></i>
                        <span>Mis Tareas</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Mensajes</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="blank.html">Blank Page</a></li>
                        <li><a  href="login.html">Login</a></li>
                        <li><a  href="lock_screen.html">Lock Screen</a></li>
                    </ul>
                </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->