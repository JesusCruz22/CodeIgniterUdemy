<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="<?= base_url() ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">
                <?php
                if (isset($_SESSION['Nombre']) && isset($_SESSION['Apellidos'])) {
                    echo strtoupper($_SESSION['Nombre'] . " " . $_SESSION['Apellidos']);
                }
                ?>
            </h5>

            <li class="mt">
                <a href="<?= base_url() ?>Dashboard">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php
            if ($_SESSION['tipo'] == 'Profesor') {
            ?>
                <li class="sub-menu">
                    <a href="<?= base_url() ?>Dashboard/gestionAlumnos">
                        <i class="fa fa-list"></i>
                        <span>Gestión de Alumnos</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?= base_url() ?>Dashboard/crearTareas">
                        <i class="fa fa-plus"></i>
                        <span>Crear Tareas</span>
                    </a>
                </li>
            <?php
            }
            ?>

            <li class="sub-menu">
                <a href="<?= base_url() ?>Dashboard/misTareas">
                    <i class="fa fa-book"></i>
                    <span>Mis Tareas</span>
                </a>
            </li>
            
            <li class="sub-menu">
                <a href="<?= base_url() ?>Dashboard/mensajes">
                    <i class="fa fa-comment"></i>
                    <span>Mensajes</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->