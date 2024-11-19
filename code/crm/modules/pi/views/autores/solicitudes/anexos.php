
<script>

    let derecho_autor_id = '<?php echo $id ?>';
    console.log(" Derecho de Autor ", derecho_autor_id);
    Eventos(derecho_autor_id);
    Tareas(derecho_autor_id);
    Documentos(derecho_autor_id);

    function Tareas(id){
        let url = '<?php echo admin_url("pi/AutorTareasController/showTareas/"); ?>';
        url += encodeURIComponent(id.trim());
      
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('Data retrieved:', data);
                $("#tareaTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: data,
                    destroy: true,
                    columnDefs: [
                        {
                            width: '5%',
                            targets: 0
                        },
                        {
                            width: '30%',
                            targets: 1
                        },
                        {
                            width: '10%',
                            targets: 2
                        },
                        {
                            width: '30%',
                            targets: 3
                        },
                        {
                            width: '10%',
                            targets: 4
                        }
                      
                    ],
                    columns: [{
                            data: 'id',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'tipo_tarea',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'descripcion',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <td class="text-center">
                                        <button class="btn btn-danger delete-tares" data-tareas="${row.id}">
                                        <i class="fas fa-trash"></i> Borrar
                                        </button>
                                    </td>`;
                            }
                        },
                    ],
                    width: "100%"
                });
                $('#tareaTbl').on('click', '.delete-tareas', function (e) {
                    e.preventDefault();
                    let pubid = $(this).data('tareas');
                    console.log("ID para Eliminar: " + pubid);
                    console.log("Legue a elimar la publicacion ");
                    if (confirm("Quieres eliminar este registro?")) {
                        var formData = new FormData();
                        var csrf_token_name = $("input[name=csrf_token_name]").val();
                        formData.append('csrf_token_name', csrf_token_name);
                        let url = '<?php echo admin_url("pi/AutorTareasController/destroy/"); ?>';
                        url = url + pubid;
                        console.log("url ", url);
                        $.ajax({
                            url,
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false
                        }).then(function (response) {
                            alert_float('success', "Evento Eliminado Correctamente");
                            Eventos(id);
                        }).catch(function (response) {
                            alert_float('danger',"No se pudo Eliminar el Evento");
                        });
                    }
                });
                
            },
            error: function (xhr, status, error) {
                console.log('Error al cargar el documento:');
            }
        });
    }



    function Eventos(id){
        let url = '<?php echo admin_url("pi/AutoresEventosController/showEventos/"); ?>';
        url += encodeURIComponent(id.trim());
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('Data retrieved:', data);
                $("#eventosTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: data,
                    destroy: true,
                    columnDefs: [
                        {
                            width: '5%',
                            targets: 0
                        },
                        {
                            width: '30%',
                            targets: 1
                        },
                        {
                            width: '10%',
                            targets: 2
                        },
                        {
                            width: '30%',
                            targets: 3
                        },
                        {
                            width: '10%',
                            targets: 4
                        }
                      
                    ],
                    columns: [{
                            data: 'id',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'tipo_evento',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentarios',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <td class="text-center">
                                        <button class="btn btn-danger delete-evento" data-evento="${row.id}">
                                        <i class="fas fa-trash"></i> Borrar
                                        </button>
                                    </td>`;
                            }
                        },
                    ],
                    width: "100%"
                });
                $('#eventosTbl').on('click', '.delete-evento', function (e) {
                    e.preventDefault();
                    let pubid = $(this).data('evento');
                    console.log("ID para Eliminar: " + pubid);
                    console.log("Legue a elimar la publicacion ");
                    if (confirm("Quieres eliminar este registro?")) {
                        var formData = new FormData();
                        var csrf_token_name = $("input[name=csrf_token_name]").val();
                        formData.append('csrf_token_name', csrf_token_name);
                        let url = '<?php echo admin_url("pi/AutoresEventosController/destroy/"); ?>';
                        url = url + pubid;
                        console.log("url ", url);
                        $.ajax({
                            url,
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false
                        }).then(function (response) {
                            alert_float('success', "Evento Eliminado Correctamente");
                            Eventos(id);
                        }).catch(function (response) {
                            alert_float('danger',"No se pudo Eliminar el Evento");
                        });
                    }
                });
                
            },
            error: function (xhr, status, error) {
                console.log('Error al cargar el documento:');
            }
        });
    }

    function Documentos(id) {
        let url = '<?php echo admin_url("pi/AutoresSolicitudesDocumentoController/showDocumentos/"); ?>';
        url += encodeURIComponent(id.trim());
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('Data retrieved:', data);
                $("#docTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: data,
                    destroy: true,
                    columnDefs: [
                        {
                            width: '5%',
                            targets: 0
                        },
                        {
                            width: '30%',
                            targets: 1
                        },
                        {
                            width: '10%',
                            targets: 2
                        },
                        {
                            width: '30%',
                            targets: 3
                        },
                        {
                            width: '10%',
                            targets: 4
                        }
                      
                    ],
                    columns: [{
                            data: 'id',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'descripcion',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentario',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'path',
                            render: function (data, type, row) {
                                return "<div class='col-md-12 text-center'>" + data + "</div>"
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <td class="text-center">
                                        <button class="btn btn-danger delete-documento" data-documento="${row.id}">
                                        <i class="fas fa-trash"></i> Borrar
                                        </button>
                                    </td>`;
                            }
                        },
                    ],
                    width: "100%"
                });
                $('#docTbl').on('click', '.delete-documento', function (e) {
                    e.preventDefault();
                    let pubid = $(this).data('documento');
                    console.log("ID para Eliminar: " + pubid);
                    console.log("Legue a elimar la publicacion ");
                    if (confirm("Quieres eliminar este registro?")) {
                        var formData = new FormData();
                        var csrf_token_name = $("input[name=csrf_token_name]").val();
                        formData.append('csrf_token_name', csrf_token_name);
                        let url = '<?php echo admin_url("pi/AutoresSolicitudesDocumentoController/destroy/"); ?>';
                        url = url + pubid;
                        console.log("url ", url);
                        $.ajax({
                            url,
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false
                        }).then(function (response) {
                            alert_float('success', "Evento Eliminado Correctamente");
                            Documentos(id);
                        }).catch(function (response) {
                            alert_float('danger',"No se pudo Eliminar el Evento");
                        });
                    }
                });
                
            },
            error: function (xhr, status, error) {
                console.log('Error al cargar el documento:');
            }
        });
    }

  
  

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
        if ($('#id_tipo_evento').val() && $('#fecha_evento').val() && $('#evento_comentario').val()) {  
            var tipo_evento = $('#id_tipo_evento').val();
            var evento_comentario = $('#evento_comentario').val();
            let fecha_evento = $('#fecha_evento').val(); 
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            let id_solicitud = '<?php echo $id ?>';
            console.log(" tipo_evento ", tipo_evento , " evento_comentario ", evento_comentario , ' fecha_evento ', fecha_evento , ' derecho_autor_id ', derecho_autor_id ) ; 
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('tipo_evento', tipo_evento);
            formData.append('fecha_evento', fecha_evento);
            formData.append('evento_comentario', evento_comentario);
            formData.append('id_solicitud', id_solicitud);
            let url = '<?php echo admin_url("pi/AutoresEventosController/addEvento"); ?>';
            console.log('url ', url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response) {
                console.log(" Response ", response );
                $("#eventoModal").modal('hide');
                alert_float('success', "Evento Insertado Correctamente");
                Eventos(derecho_autor_id);
            
            }).catch(function(response) {
            console.log(" Response ",response );
            alert("No puede agregar un Evento sin registro de la solicitud");
            });

        } else {
            $("#lbltipo_evento").css('color', $('#tipo_evento').val() ? color_lbl : 'red');
            $("#lblfecha_evento").css('color', $('#fecha_evento').val() ? color_lbl : 'red');
            $("#lblevento_comentario").css('color', $('#evento_comentario').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Evento');
        }
       
    });


     //Añadir Tareas  ---------------------------------------------------------------------------
     $(document).on('click', '#tareasfrmsubmit', function(e) {
        e.preventDefault();
        console.log(" Llegue a Tareas ");
        var formData = new FormData();
        if ($('#fecha_limite').val() && $('#project_id').val() && $('#tipo_tarea').val() && $('#descripcion').val()) { 
            let project = $('#project_id').val();
            let fecha_limite = $('#fecha_limite').val(); 
            var tipo_tarea = $('#tipo_tarea').val();
            var descripcion = $('#descripcion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            let id_solicitud = '<?php echo $id ?>';
            console.log(" project ", project , " tipo_tarea ", tipo_tarea , ' descripcion ', descripcion , ' fecha_limite ', fecha_limite , ' id_solicitud ' , id_solicitud) ; 
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('project', project);
            formData.append('fecha_limite', fecha_limite);
            formData.append('tipo_tarea', tipo_tarea);
            formData.append('descripcion', descripcion);
            formData.append('id_solicitud', id_solicitud);
            let url = '<?php echo admin_url("pi/AutorTareasController/addTareas"); ?>';
            console.log('url ', url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response) {
                console.log(" Response ", response );
                $("#addTask").modal('hide');
                alert_float('success', "Tarea Insertada Correctamente");
                Tareas(derecho_autor_id); 
            }).catch(function(response) {
                console.log(" Response ",response );
                alert_float('danger',"No puede agregar un Evento sin registro de la solicitud");
            });
        } else {
            let color_lbl = '';
            $("#lblfecha_tarea").css('color', $('#fecha_limite').val() ? color_lbl : 'red');
            $("#lblproject_id").css('color', $('#project_id').val() ? color_lbl : 'red');
            $("#lbltipo_tarea").css('color', $('#tipo_tarea').val() ? color_lbl : 'red');
            $("#lbldescripcion").css('color', $('#descripcion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar los datos para para Añadir la Tarea');
        }
       
    });

     //Añadir Documentos  ---------------------------------------------------------------------------
     $(document).on('click', '#documentofrmsubmit', function(e) {
        e.preventDefault();
        console.log(" Llegue a Documentos ");
        var formData = new FormData();
        let id_solicitud = '<?php echo $id ?>';
        var descripcion = $('#doc_descripcion').val();
        var comentario_archivo = $('#comentario_archivo').val();
        var doc_archivo = $('#doc_archivo')[0].files[0];
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('id_solicitud', id_solicitud);
        formData.append('doc_descripcion', descripcion);
        formData.append('comentario_archivo', comentario_archivo);
        formData.append('doc_archivo', doc_archivo);
        let url = '<?php echo admin_url("pi/AutoresSolicitudesDocumentoController/addSolicitudDocumento"); ?>';
        console.log(' id_solicitud ', id_solicitud, ' descripcion ', descripcion, ' comentario_archivo ',
        comentario_archivo , ' doc_archivo ', doc_archivo);
        console.log(" url " , url);
        $.ajax({
            url : url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            console.log(" Response ", response);
            $("#docModal").modal('hide');
            alert_float('success', "Documento Insertado Correctamente");
            Documentos(id);
        }).catch(function (response) {
            console.log(response);
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

