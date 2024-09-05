<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Al hacer clic en el botón de "Añadir"
    $('#eventosfrmsubmit').click(function() {
        // Obtener los valores de los campos del formulario
        var tipoEvento = $('#tipo_evento').val();
        var eventoComentario = $('#evento_comentario').val();

        // Validar que los campos no estén vacíos (opcional)
        if(tipoEvento === "" || eventoComentario === "") {
            alert("Por favor, complete todos los campos.");
            return;
        }
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Meses comienzan en 0, así que se le suma 1
        const day = String(today.getDate()).padStart(2, '0');

        const formattedDateString = `${year}-${month}-${day}`;
        const formattedDate = new Date(formattedDateString);

        console.log(formattedDate);
       // console.log("Hoy ",hoy)
        // Realizar la petición AJAX para enviar los datos al servidor
        $.ajax({
            url:'<?php echo admin_url('pi/EventosController/addEvento');?>',  // Cambiar por la ruta correcta en tu aplicación
            type: 'POST',
            data: {
                tipo_evento: tipoEvento,
                comentarios: eventoComentario,
                id_marcas : 31687,
                fecha : formattedDateString
            },
            success: function(response) {
                // Manejar la respuesta del servidor
                if(response.success) {
                    alert("Evento guardado con éxito.");
                    $('#eventoModal').modal('hide'); // Cerrar el modal
                    // Limpiar los campos del formulario si es necesario
                    $('#eventoFrm')[0].reset();
                } else {
                    alert("Error al guardar el evento: " + response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejar errores de la petición
                alert("Error en la petición AJAX: " + textStatus);
            }
        });
    });
});
</script>



<script>
    $("#pais_id option[value=226]");
</script>
<script>
    function fecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if (dd < 10) {
            dd = '0' + dd;
            var formData = new FormData();

            function fecha() {
                var hoy = new Date();
                var dd = hoy.getDate();
                var mm = hoy.getMonth() + 1;
                var yy = hoy.getFullYear();
                var fecha = '';
                if (dd < 10) {
                    dd = '0' + dd;
                } else if (mm < 10) {
                    mm = '0' + mm;
                }
                fecha = dd + "/" + mm + "/" + yy;
                return fecha;
            }
        }
    }

    $(".calendar").on('keyup', function(e) {
        e.preventDefault();
        $(".calendar").val('');
    })
    $(function() {
        $(".calendar").datetimepicker({
            maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker: false,
        });
    });
</script>
<script>
    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
</script>
<script>
    // ------------step-wizard-------------
    $(document).ready(function() {
      
        

        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });
    });

    // $(".next-step").click(function (e) {

    //     var $active = $('.wizard .nav-tabs li.active');
    //     $active.next().removeClass('disabled');
    //     nextTab($active);

    // });
    // $(".prev-step").click(function (e) {

    //     var $active = $('.wizard .nav-tabs li.active');
    //     prevTab($active);

    // });


    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    //---------------------
    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>

<script>
    $("#marcas_id").on('change', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            url: "<?php echo admin_url('pi/AccionesTerceroController/findDenominacion'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                'marcas_id' : $("#marcas_id").val(),
            },
            success: function(response)
            {
                res = JSON.parse(response);
                console.log(res);
                $("#clase_niza").val(res.data.clase);
                $("#nro_solicitud").val(res.data[0].solicitud);
                $("#nro_registro").val(res.data[0].registro);
                $("#fecha_solicitud").val(res.data[0].fecha_solicitud);
                $("#fecha_vencimiento").val(res.data[0].fecha_vencimiento);
                $("#fecha_registro").val(res.data[0].fecha_registro);
                $("#propietario_id").val(res.data[0].client_id);
            }
        });
    });
    
</script>