<section id="main-content">
    <section class="wrapper">

        <div class="row"></div>
        <?php
        foreach ($tareas as $tarea) {
        ?>
            <div class="col-md-4 tarea">
                <div class="row">
                    <strong><?= $tarea->Titulo ?></strong>
                </div>
                <div class="row">
                    <?= $tarea->Descripcion ?>
                </div>
                <div class="row">
                    <?= date('d-m-Y', strtotime($tarea->FechaFinal)) ?>
                </div>
                <div class="row">
                    <a href="<?= base_url() . 'uploads/' . $tarea->Archivo ?>" download="">Descargar Archivo Adjunto</a>
                </div>
                <div class="row">
                    <?= $tarea->Curso ?>
                </div>
            </div>
        <?php
        }
        ?>

    </section>
</section>