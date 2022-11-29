<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dashboard School</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?= base_url() ?>assets/js/chart-master/Chart.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-1.8.3.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container">
        <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>CODEIGNITER COURSE</b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <div class="nav notify-row" id="top_menu">
                            <!--  notification start -->
                            <ul class="nav top-menu">
                                <!-- tasks start -->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                        <i class="fa fa-book"></i>
                                        <?php
                                        if ($tareas) {
                                        ?>
                                            <span class="badge bg-theme"><?= count($tareas) ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="badge bg-theme">0</span>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu extended tasks-bar">
                                        <div class="notify-arrow notify-arrow-green"></div>
                                        <li>
                                            <?php
                                            if ($tareas) {
                                            ?>
                                                <p class="green">Tienes <?= count($tareas) ?> tareas pendientes</p>
                                            <?php
                                            } else {
                                            ?>
                                                <p class="green">No tienes tareas pendientes</p>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <?php
                                        if ($tareas) {
                                            $count = 0;
                                            foreach ($tareas as $tarea) {
                                                $count++;
                                                if ($count > 5) break;
                                        ?>

                                                <li>
                                                    <a href="<?= base_url() ?>Dashboard/misTareas">
                                                        <div class="task-info">
                                                            <div class="desc"><strong><?= $tarea->Titulo ?></strong></div>
                                                            <div class="percent"><small>Fecha Final: <?= $tarea->FechaFinal ?></small></div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                            <li class="external">
                                                <a href="<?= base_url() ?>Dashboard/misTareas">Todas mis tareas</a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <!-- tasks end -->


                                <!-- inbox dropdown start-->
                                <li id="header_inbox_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                        <i class="fa fa-envelope-o"></i>
                                        <?php
                                        if ($mensajes) {
                                        ?>
                                            <span class="badge bg-theme"><?= count($mensajes) ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="badge bg-theme">0</span>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu extended inbox">
                                        <div class="notify-arrow notify-arrow-green"></div>
                                        <li>
                                            <?php
                                            if ($mensajes) {
                                            ?>
                                                <p class="green">Tienes <?= count($mensajes) ?> mensajes</p>
                                            <?php
                                            } else {
                                            ?>
                                                <p class="green">No tienes mensajes</p>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            if ($mensajes) {
                                                foreach ($mensajes as $mensaje) {
                                            ?>
                                                    <a id="<?php echo $mensaje->Id_From ?>" class="desc" onclick="setIdTo(this.id)">
                                                        <span class="photo"><img alt="avatar" src="<?= base_url() ?>assets/img/ui-sam.jpg"></span>
                                                        <span class="subject">
                                                            <span id="nombre-<?php echo $mensaje->Id_From ?>" class="from"><?= $mensaje->Nombre_From ?></span>
                                                        </span>
                                                        <span class="time"><?= $mensaje->Fecha ?></span>
                                                        <span class="message"><?= $mensaje->Texto ?></span>
                                                    </a>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </li>
                                <!-- inbox dropdown end -->

                            </ul>
                            <!--  notification end -->
                        </div>
                    </li>
                    <li>
                        <a class="logout" href="<?= base_url() ?>Dashboard/logout">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->