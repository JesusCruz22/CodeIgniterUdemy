<section id="main-content">
    <section class="wrapper">
        <table id="table_alumnos" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Username</th>
                    <th>Curso</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($alumnos as $alumno) {
                ?>
                    <tr id="row-alumno-<?= $alumno->Id ?>">
                        <td><?= $alumno->Nombre ?></td>
                        <td><?= $alumno->Apellidos ?></td>
                        <td><?= $alumno->Username ?></td>
                        <td><?= $alumno->Curso ?></td>
                        <td><i id="alumno-<?= $alumno->Id ?>" class="eliminar fa fa-trash-o " style="cursor: pointer;"></i></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</section>

<script>
    $(".eliminar").click(function() {
        var idAlumno = this.id;
        var idArray = idAlumno.split('-');
        var id = idArray[1];

        $.post("<?= base_url() ?>Dashboard/eliminarAlumno", {idAlumno: id}).done(function(data) {
            $('#row-alumno-'+id).fadeOut();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#table_alumnos').DataTable();
    });
</script>