<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if ($_SESSION['Id_Chat'] == null) {
                        ?>
                            <div class="border-head">
                                <h3>Selecciona un usuario para chatear <i class="fa fa-arrow-right"></i></h3>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="border-head">
                                <h3>Mensajes de <?= $_SESSION['Nombre_Chat'] ?></h3>
                            </div>
                            <div id="messages-container" class="form-panel" style="max-height: 580px; overflow-y: scroll; overflow-x: hidden;">
                                <?php
                                if (!$mensajesChat) {
                                ?>
                                    <h4>No Hay Mensajes</h4>
                                    <?php
                                } else {
                                    foreach ($mensajesChat as $mensaje) {

                                        if ($mensaje->Id_To == $_SESSION['Id_Mensajes']) {
                                    ?>
                                            <div class="row mt">
                                                <div class="col-lg-10">
                                                    <div class="pn darkblue-panel">
                                                        <?php echo $mensaje->Texto ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else if ($mensaje->Id_From == $_SESSION['Id_Mensajes']) {
                                        ?>
                                            <div class="row mt">
                                                <label class="col-lg-2 control-label">Yo</label>
                                                <div class="col-lg-10">
                                                    <div class="pn grey-panel">
                                                        <?php echo $mensaje->Texto ?>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <form class="form-horizontal style-form" action="<?= base_url() ?>Dashboard/insertarMensaje" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Mensaje</label>
                                    <div class="col-sm-11">
                                        <textarea name="texto" class="form-control" style="resize: vertical;" required></textarea>
                                        <input id="id-to-input" name="id_to" type="hidden" value="<?php echo $_SESSION['Id_Chat'] ?>"></input>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">Enviar</button>
                            </form>
                        </div>

                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            <!-- **********************************************************************************************************************************************************
RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->

            <div class="col-lg-3 ds">
                <!--COMPLETED ACTIONS DONUTS CHART-->
                <h3>PROFESORES</h3>
                <!-- Fill profesors -->
                <?php
                foreach ($profesores as $profesor) {
                    if ($profesor->Id_Mensajes != $_SESSION['Id_Mensajes']) {
                ?>
                        <div id="<?php echo $profesor->Id_Mensajes ?>" name="" class="desc" onclick="setIdTo(this.id)">
                            <div class="thumb">
                                <img class="img-circle" src="<?= base_url() ?>assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                                <p id="nombre-<?php echo $profesor->Id_Mensajes ?>"><?= $profesor->Nombre . " " . $profesor->Apellidos ?><br>
                                    <muted><?= $profesor->Username ?></muted>
                                </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <!-- USERS ONLINE SECTION -->
                <h3>ALUMNOS</h3>
                <!-- Fill alumns -->
                <?php
                foreach ($alumnos as $alumno) {
                    if ($alumno->Id_Mensajes != $_SESSION['Id_Mensajes']) {
                ?>
                        <div id="<?php echo $alumno->Id_Mensajes ?>" name="" class="desc" onclick="setIdTo(this.id)">
                            <div class="thumb">
                                <img class="img-circle" src="<?= base_url() ?>assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                                <p id="nombre-<?php echo $alumno->Id_Mensajes ?>"><?= $alumno->Nombre . " " . $alumno->Apellidos ?><br>
                                    <muted><?= $alumno->Username ?></muted>
                                </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <br>
            </div>
        </div>

    </section>
</section>
<!--main content end-->