<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>

    function fecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if (dd < 10) {
            dd = '0' + dd;
        }
        else if (mm < 10) {
            mm = '0' + mm;
        }
        fecha = dd + "/" + mm + "/" + yy;
        return fecha;
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

    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });


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

    function getFormData() {
        var config = {};
        $('input').each(function() {
            config[this.name] = this.value;
        });
        $("select").each(function() {
            config[this.name] = this.value;
        });
        return config;
    }

    //Añadir Evento ---------------------------------------------------------------------------
    $(document).on('click', '#eventosfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var tipo_evento = $('#tipo_evento').val();
        var evento_comentario = $('#evento_comentario').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_evento', tipo_evento);
        formData.append('evento_comentario', evento_comentario);
        let url = '<?php echo admin_url("pi/AutoresEventosController/addEvento"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#eventoModal").modal('hide');
        }).catch(function(response) {
            alert("No puede agregar un Evento sin registro de la solicitud");
        });
    });

    $(document).on('click', '#tareasfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var data = {
            "project_id": $("#project_id").val(),
            "tipo_tarea": $("#tipo_tarea").val(),
            "descripcion": $("#descripcion").val(),
            "fecha_limite": $("#fecha_limite").val(),
            "solicitud_id": $("input[name=id]").val(),
        }
        $.ajax({
            url: "<?php echo admin_url('pi/AutorTareasController/addTaskToMarcasAndProject'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                "data": JSON.stringify(data),
            },
            success: function(response) {
                $("#addTask").modal('hide');
                alert_float('success', "Tarea asignada exitosamente");
                $.ajax({
                    url: "<?php echo admin_url('pi/AutorTareasController/showTareas/' . $id); ?>",
                    method: "POST",
                    data: {
                        'csrf_token_name': $("input[name=csrf_token_name]").val()
                    },
                    success: function(response) {
                        res = JSON.parse(response);
                        $("#tareas").DataTable({
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                            },
                            data: res,
                            destroy: true,
                            dataSrc: '',
                            columns: [{
                                    data: 'id'
                                },
                                {
                                    data: 'tipo_tarea'
                                },
                                {
                                    data: 'descripcion'
                                },
                                {
                                    data: "fecha"
                                },
                                {
                                    data: 'acciones'
                                },
                            ],
                            width: "100%"
                        });
                    }
                })
            }
        })

    })


    //Añadir Documento ---------------------------------------------------------------------------
    $(document).on('click', '#documentofrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var description = $('#doc_descripcion').val();
        var comentario_archivo = $('#comentario_archivo').val();
        var doc_archivo = $('#doc_archivo')[0].files[0];
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('doc_descripcion', description);
        formData.append('comentario_archivo', comentario_archivo);
        formData.append('doc_archivo', doc_archivo);
        let url = '<?php echo admin_url("pi/AutoresSolicitudesDocumentoController/addSolicitudDocumento"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#docModal").modal('hide');
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });


    $("#solicitudfrmOLD").on('submit', function(e) {
        var formData = new FormData();
        e.preventDefault();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id', $("input[name=id]").val());
        formData.append('cod_contador', $("input[name=cod_contador]").val());
        formData.append('tipo_registro_id', $("select[name=tipo_registro_id]").val());
        formData.append('client_id', $("select[name=client_id]").val());
        formData.append('oficina_id', $("select[name=oficina_id]").val());
        formData.append('staff_id', $("select[name=staff_id]").val());
        formData.append('id_pais', $("select[name=id_pais]").val());
        formData.append('titulo', $("input[name=titulo]").val());
        formData.append('descripcion', $("textarea[name=descripcion]").val());
        id_autor = JSON.stringify($("select[name=id_autor]").val());
        formData.append('id_autor', id_autor);
        id_propietario = JSON.stringify($("select[name=id_propietario]").val());
        formData.append('id_propietario', id_propietario);
        formData.append('clasificacion', $("select[name=clasificacion]").val());
        formData.append('origen', $("select[name=origen]").val());
        formData.append('titulo_clasif', $("input[name=titulo_clasif]").val());
        formData.append('autor_clasif', $("input[name=autor_clasif]").val());
        formData.append('fecha_clasif', $("input[name=fecha_clasif]").val());
        formData.append('ref_interna', $("input[name=ref_interna]").val());
        formData.append('ref_cliente', $('input[name=ref_cliente]').val());
        formData.append('carpeta', $("input[name=carpeta]").val());
        formData.append('libro', $("input[name=libro]").val());
        formData.append('tomo', $("input[name=tomo]").val());
        formData.append('folio', $("input[name=folio]").val());
        formData.append('comentarios', $("textarea[name=comentarios]").val());
        formData.append('id_estado', $("select[name=id_estado]").val());
        formData.append('solicitud', $("input[name=num_solicitud]").val());
        formData.append('fecha_solicitud', $("input[name=fecha_solicitud]").val());
        formData.append('registro', $("input[name=num_registro]").val());
        formData.append('fecha_registro', $("input[name=fecha_registro]").val());
        formData.append('certificado', $("input[name=num_certificado]").val());
        formData.append('fecha_vencimiento', $("input[name=fecha_vencimiento]").val());

        $.ajax({
            url: '<?php echo admin_url('pi/AutoresSolicitudesController/store'); ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                location.replace('<?php echo admin_url("pi/AutoresSolicitudesController/edit/{$id}"); ?>');
            },
            fail: function(request) {
                <?php if (ENVIRONMENT != 'production') { ?>
                    alert(response);
                <?php } else { ?>
                    alert('ha ocurrido un error');
                <?php } ?>
            }
        });
    });


</script>