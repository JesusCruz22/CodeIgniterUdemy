<section id="main-content">
    <section class="wrapper">
        <!-- CREAR TAREA FORM ELELEMNTS -->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> CREAR TAREA</h4>
                    <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Titulo de la tarea</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="descripcion" style="resize: vertical;" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Fecha de finalizacion</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control round-form" name="fecha" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Archivos adjuntos</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="archivo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Curso</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="curso" required>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-theme" type="submit" value="Enviar">
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div><!-- /row -->
    </section>
</section>