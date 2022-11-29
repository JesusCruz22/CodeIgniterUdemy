<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        The School - 2022
        <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url() ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="<?= base_url() ?>assets/js/common-scripts.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="<?= base_url() ?>assets/js/sparkline-chart.js"></script>
<script src="<?= base_url() ?>assets/js/zabuto_calendar.js"></script>

<!--
<script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido!',
            // (string | mandatory) the text inside the notification
            text: 'Puedes esconder el menu lateral haciendo clic en el boton junto al logo. Pasa el mouse por encima para cerrar este dialogo.',
            // (string | optional) the image to display on the left
            image: '<?= base_url() ?>assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
    $.extend($.gritter.options, {
        position: 'bottom-right', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right' (added in 1.7.1)
        fade_in_speed: 'medium', // how fast notifications fade in (string or int)
        fade_out_speed: 1000, // how fast the notices fade out
        time: 3000 // hang on the screen for...
    });
</script>
-->

<script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            language: "es"
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

<script>
    const messagesContainer = document.getElementById("messages-container");
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    function setIdTo(id) {
        const elementoNombre = document.getElementById('nombre-' + id);
        const textoElementoNombre = elementoNombre.innerHTML;
        const arrayElementoNombre = textoElementoNombre.split('<br>');
        const nombreCompleto = arrayElementoNombre[0];

        $.post("<?= base_url() ?>Dashboard/mensajes", {
            idChat: id,
            nombreChat: nombreCompleto
        }).done(function(data) {
            location.href = "<?= base_url() ?>Dashboard/mensajes";
        });

        /*
        const idToInput = document.getElementById("id-to-input");
        idToInput.setAttribute('value', id);
        console.log(idToInput.getAttribute('value'));
        */
    }
</script>

</body>

</html>