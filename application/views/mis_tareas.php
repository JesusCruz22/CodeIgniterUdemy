<section id="main-content">
    <section class="wrapper">

        <div class="row"></div>
        <?php
        if ($tareas) {
            foreach ($tareas as $tarea) {
        ?>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h4><?= $tarea->Titulo ?></h4>
                        </div>
                        <div class="row" style="height: 50%;">
                            <?= $tarea->Descripcion ?>
                        </div>
                        <div class="row align-items-end" style="margin-bottom: .1em;">
                            <small>Fecha Limite:</small><?= date('d-m-Y', strtotime($tarea->FechaFinal)) ?>
                        </div>
                        <div class="row align-items-end">
                            <?php if ($tarea->Archivo != "") { ?>
                                <a class="btn btn-default" href="<?= base_url() . 'uploads/' . $tarea->Archivo ?>" download="">
                                    <i class="fa fa-download"></i>
                                    Descargar Archivo Adjunto
                                </a>
                            <?php } else { ?>
                                <div>"Sin Archivo Adjunto"</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div>
                <h3>No hay tareas asignadas.</h3>
            </div>
        <?php
        }
        ?>
    </section>
</section>