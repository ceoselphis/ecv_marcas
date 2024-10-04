<style>
    th,
    td {
        text-align: center;
    }
</style>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

</script>
<script>
    id = '<?php echo $cod_id ?>';


    //-------------------------- Mostra Datos ----------------------
    Eventos(id);
    Publicaciones(id);
    Tareas(id);
    Documentos(id);

    //-------------------------- Lista de datos --------------------------------

    function Publicaciones(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/showPublicaciones/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
            $("#publicacionTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                destroy: true,
                data: lista,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'tipo_publicacion'
                    },
                    {
                        data: 'boletin'
                    },
                    {
                        data: 'tomo'
                    },
                    {
                        data: 'pagina'
                    },
                    {
                        data: 'fecha'
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <td class="text-center">
                                <a class="btn btn-light edit-publicacion" data-publicacionid="${row.id}" style="background-color: white;">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-danger delete-publicacion" data-publicacionid="${row.id}">
                                    <i class="fas fa-trash"></i> Borrar
                                </button>
                            </td>`;
                        }
                    }
                ]
            });

            // Evento para el botón de Editar
            $('#publicacionTbl').on('click', '.edit-publicacion', function (e) {
                e.preventDefault();
                let pubid = $(this).data('publicacionid');
                console.log("ID para editar: " + pubid);
                console.log(" LLegar a Modal Editar Publicaciones ");
                let url =
                    '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/findPublicacion/"); ?>';
                url = url + pubid;
                console.log(url);
                $.get(url, function (response) {
                    let lista = JSON.parse(response);
                    console.log(lista);
                    $('#tomo_publicacionEdit').val(lista[0].tomo);
                    $('#pag_publicacionEdit').val(lista[0].pagina);
                    $('#id_modal_publicacionEdit').val(publicacionid);
                });
                $("#publicacionModalEdit").modal('show');
            });

            // Evento para el botón de Editar
            $('#publicacionTbl').on('click', '.delete-publicacion', function (e) {
                e.preventDefault();
                let pubid = $(this).data('publicacionid');
                console.log("ID para editar: " + pubid);
                console.log("Legue a elimar la publicacion ");
                if (confirm("Quieres eliminar este registro?")) {
                    var formData = new FormData();
                    var csrf_token_name = $("input[name=csrf_token_name]").val();
                    formData.append('csrf_token_name', csrf_token_name);
                    let url =
                        '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/destroy/"); ?>';
                    url = url + pubid;
                    console.log("url ", url);
                    $.ajax({
                        url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    }).then(function (response) {
                        Publicaciones(id);
                        alert_float('success', "Eliminado Publicacion Correctamente");
                    }).catch(function (response) {
                        alert("No se pudo Eliminar el Publicacion");
                    });
                }
            });
        });
    }




    //Mostrar Eventos
    function Eventos(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/showEventos/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log("lista eventos ", lista);
            $("#eventoTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                destroy: true,
                data: lista,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'tipo_evento'
                    },
                    {
                        data: 'comentarios'
                    },

                    {
                        data: 'fecha'
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <td class="text-center">
                            <a class=" btn btn-light edit-evento"  data-eventoid="${row.id}" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                            <button  class="btn btn-danger delete-evento" data-eventoid="${row.id}">
                            <i class="fas fa-trash"></i>Borrar</button>
                            </td>`;
                        }
                    }
                ]
            });

            // Evento para el botón de Editar
            $('#eventoTbl').on('click', '.edit-evento', function (e) {
                e.preventDefault();
                let eventoid = $(this).data('eventoid');
                let url =
                    '<?php echo admin_url("pi/AccionesTercerosEventosController/findEvento/"); ?>';
                console.log('Evento id', eventoid);
                url = url + eventoid;
                console.log(url);
                $.get(url, function (response) {
                    let lista = JSON.parse(response);
                    console.log(lista);
                    $('#evento_comentarioEdit').val(lista[0].comentarios);
                    $('#id_modal_eventoEdit').val(eventoid);
                });
                $("#eventoModalEdit").modal('show');

            });

            // Evento para el botón de Editar
            $('#publicacionTbl').on('click', '.delete-evento', function (e) {
                e.preventDefault();
                let eventoid = $(this).data('publicacionid');
                console.log("ID para editar: " + id);
                console.log("Legue a elimar la eliminar ");
                if (confirm("Quieres eliminar este registro?")) {
                    var formData = new FormData();
                    var csrf_token_name = $("input[name=csrf_token_name]").val();
                    formData.append('csrf_token_name', csrf_token_name);
                    let url =
                        '<?php echo admin_url("pi/AccionesTercerosEventosController/destroy/"); ?>';
                    url = url + eventoid;
                    console.log("url ", url);
                    $.ajax({
                        url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    }).then(function (response) {
                        Eventos(id);
                        alert_float('success', "Evento Elimando Correctamente");
                    }).catch(function (response) {
                        alert("No se pudo Eliminar el Evento");
                    });
                }
            });

        })
    }

    //Mostrar Tareas
    function Tareas(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/showTareas/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('lista tareas ', lista);
            $("#tareaTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                destroy: true,
                data: lista,
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
                        data: 'fecha'
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                        <td class="text-center">
                                            <a class=" btn btn-light edit-tarea" data-tareaid="${row.id}" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="btn btn-danger delete-tarea" data-tareaid="${row.id}">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>`;
                        }
                    }
                ]
            });

            // Evento para el botón de Editar
            $('#tareaTbl').on('click', '.edit-tarea', function () {
                let tareasid = $(this).data('tareaid');
                console.log("ID para editar: " + tareasid);
                console.log(" LLegar a Modal Editar Tareas ");
                let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/findTareas/"); ?>';
                url = url + tareasid;
                console.log(url);
                $.get(url, function (response) {
                    let lista = JSON.parse(response);
                    console.log('lista tareas ', lista);
                    $('#tarea_fechaEdit').val(lista[0].fecha);
                    $('#tarea_descripcionEdit').val(lista[0].descripcion);
                    $('#id_modal_tareaEdit').val(tareasid);
                });
                $("#tareaModalEdit").modal('show');

            });

            // Evento para el botón de Editar
            $('#tareaTbl').on('click', '.delete-tarea', function (e) {
                e.preventDefault();
                let tareaid = $(this).data('tareaid');
                console.log("ID para editar: " + tareaid);
                console.log("Legue a elimar la tarea  ");
                if (confirm("Quieres eliminar este registro?")) {
                    var formData = new FormData();
                    var csrf_token_name = $("input[name=csrf_token_name]").val();
                    formData.append('csrf_token_name', csrf_token_name);
                    let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/destroy/"); ?>';
                    url = url + tareaid;
                    console.log("url ", url);
                    $.ajax({
                        url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    }).then(function (response) {
                        Tareas(id);
                        alert_float('success', "Tarea Eliminada Correctamente");
                    }).catch(function (response) {
                        alert("No se pudo Eliminar la Tarea");
                    });
                }
            });

        })
    }

    //Mostrar Documentos
    function Documentos(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/showDocumentos/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('Lista Documentos ', lista);
            $("#documentoTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                destroy: true,
                data: lista,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'descripcion'
                    },
                    {
                        data: 'comentarios'
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                                <a href="${row.archivo}" target="_blank">Ver Archivo</a>`;
                        }
                    },

                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <td class="text-center">
                                <a class="btn btn-light edit-documento" data-documentoid="${row.id}" style="background-color: white;">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-danger delete-documento" data-documentoid="${row.id}">
                                    <i class="fas fa-trash"></i> Borrar
                                </button>
                            </td>`;
                        }
                    }
                ]
            });

            // Evento para Editar el Documento
            $('#documentoTbl').on('click', '.edit-documento', function () {
                let docid = $(this).data('documentoid');
                console.log("ID para editar: " + docid);
                console.log(" LLegar a Modal Editar Documento ");
                let url =
                    '<?php echo admin_url("pi/AccionesTerceroDocumentosController/findDocumentos/"); ?>';
                url = url + docid;
                console.log(url);
                $.get(url, function (response) {
                    let lista = JSON.parse(response);
                    console.log('lista tareas ', lista);
                    $('#doc_descripcionEdit').val(lista[0].descripcion);
                    $('#comentario_archivoEdit').val(lista[0].comentarios);
                    $('#id_modal_documentoEdit').val(docid);
                });
                $("#documentoModalEdit").modal('show');
            });

            // Eliminar Documento
            $('#documentoTbl').on('click', '.delete-documento', function (e) {
                e.preventDefault();
                let documentoid = $(this).data('documentoid');
                console.log("ID para editar: " + documentoid);
                console.log("Legue a elimar la tarea  ");
                if (confirm("Quieres eliminar este registro?")) {
                    var formData = new FormData();
                    var csrf_token_name = $("input[name=csrf_token_name]").val();
                    formData.append('csrf_token_name', csrf_token_name);
                    let url =
                        '<?php echo admin_url("pi/AccionesTerceroDocumentosController/destroy/"); ?>';
                    url = url + documentoid;
                    console.log("url ", url);
                    $.ajax({
                        url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false
                    }).then(function (response) {
                        Documentos(id);
                        alert_float('success', "Documento Eliminado Correctamente");
                    }).catch(function (response) {
                        alert("No se pudo Eliminar el Documento");
                    });
                }
            });


        })
    }

    //--------------------------------------------------------------------------------

    //------------------------- Crear Datos -----------------------------------

    //Crear Evento
    $(document).on('click', '#eventosfrmsubmit', function (e) {
        console.log("Click Evento");
        e.preventDefault();
        var formData = new FormData();
        var tipo_evento = $('#tipo_evento').val();
        var evento_comentario = $('#evento_comentario').val();
        var acc_ter_id = id;
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_evento', tipo_evento);
        formData.append('evento_comentario', evento_comentario);
        formData.append('acc_ter_id', acc_ter_id);
        console.log("tipo_evento ", tipo_evento, "evento_comentario ", evento_comentario,
            " Acciones Tercero ID ", acc_ter_id);
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/addEvento"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Eventos(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#eventoModal").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });

    //Crear Publicaciones
    $(document).on('click', '#publicacionfrmsubmit', function (e) {
        console.log("Click Evento");
        e.preventDefault();
        var formData = new FormData();
        var tipo_publicacion = $('#tipo_publicacion').val();
        var boletin_publicacion = $('#boletin_publicacion').val();
        var tomo = $('#tomo_publicacion').val();
        var pagina = $('#pag_publicacion').val();
        var acc_ter_id = id;
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_publicacion', tipo_publicacion);
        formData.append('acc_ter_id', acc_ter_id);
        formData.append('boletin_publicacion', boletin_publicacion);
        formData.append('tomo', tomo);
        formData.append('pagina', pagina);
        console.log(" acc_ter_id ", acc_ter_id, " tipo_publicacion ", tipo_publicacion, " boletin_publicacion ",
            boletin_publicacion, " tomo ", tomo, ' pagina ', pagina);
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/addPublicacion"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Publicaciones(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#publicacionModal").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });

    //Crear Tareas
    $(document).on('click', '#tareasfrmsubmit', function (e) {
        console.log("Click Tareas");
        e.preventDefault();
        var formData = new FormData();
        var tipo_tarea = $('#tipo_tarea').val();
        var tarea_descripcion = $('#tarea_descripcion').val();
        var tarea_fecha = $('#tarea_fecha').val();
        var acc_ter_id = id;
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_tarea', tipo_tarea);
        formData.append('tarea_descripcion', tarea_descripcion);
        formData.append('tarea_fecha', tarea_fecha);
        formData.append('acc_ter_id', acc_ter_id);
        console.log("tipo_tarea ", tipo_tarea, "tarea_descripcion ", tarea_descripcion, " fecha ", tarea_fecha,
            "Acciones Tercero ID ", acc_ter_id);
        let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/addTareas"); ?>'
        console.log('url ', url)
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Tareas(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $('#tareaModal').modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });

    // Añadir Documento 
    $(document).on('click', '#documentofrmsubmit', function (e) {
        e.preventDefault();
        var formData = new FormData();
        var acc_ter_id = id;
        var descripcion = $('#doc_descripcion').val();
        var comentario_archivo = $('#comentario_archivo').val();
        var doc_archivo = $('#doc_archivo')[0].files[0];
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('acc_ter_id', acc_ter_id);
        formData.append('doc_descripcion', descripcion);
        formData.append('comentario_archivo', comentario_archivo);
        formData.append('doc_archivo', doc_archivo);
        let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/addDocumentos"); ?>';
        console.log(' descripcion ', descripcion, ' comentario_archivo ', comentario_archivo, ' doc_archivo ',
            doc_archivo);
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Documentos(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#documentoModal").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });



    //------------------------------------------------------------------------------

    // -------------------------- Accion Para abrir Modal para Editar ---------------
    //Accion para Abrir Modal para Editar Evento
    $(document).on('click', '#EditbtnEvento', function (e) {
        console.log(" LLegar a Modal Editar Eventos ");
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/findEvento/"); ?>';
        let element = $(this)[0].parentElement.parentElement;
        let eventoid = $(element).attr('Eventoid');
        console.log('Evento id', eventoid);
        url = url + eventoid;
        console.log(url);
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
            $('#evento_comentarioEdit').val(lista[0].comentarios);
            $('#id_modal_eventoEdit').val(eventoid);
        });
        $("#eventoModalEdit").modal('show');
    });

    //Accion para Abrir Modal para Editar Publicaciones
    $(document).on('click', '#EditbtnPublicaciones', function (e) {
        console.log(" LLegar a Modal Editar Publicaciones ");
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/findPublicacion/"); ?>';
        let element = $(this)[0].parentElement.parentElement;
        let publicacionid = $(element).attr('Publicacionesid');
        console.log('Evento id', publicacionid);
        url = url + publicacionid;
        console.log(url);
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
            $('#tomo_publicacionEdit').val(lista[0].tomo);
            $('#pag_publicacionEdit').val(lista[0].pagina);
            $('#id_modal_publicacionEdit').val(publicacionid);
        });
        $("#publicacionModalEdit").modal('show');
    });

    //Accion para Abrir Modal para Editar Tareas
    $(document).on('click', '#EditbtnTareas', function (e) {
        console.log(" LLegar a Modal Editar Tareas ");
        let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/findTareas/"); ?>';
        let element = $(this)[0].parentElement.parentElement;
        let tareasid = $(element).attr('Tareasid');
        console.log('Tareas id', tareasid);
        url = url + tareasid;
        console.log(url);
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('lista tareas ', lista);
            $('#tarea_fechaEdit').val(lista[0].fecha);
            $('#tarea_descripcionEdit').val(lista[0].descripcion);
            $('#id_modal_tareaEdit').val(tareasid);
        });
        $("#tareaModalEdit").modal('show');
    });

    //Accion para Abrir Modal para Editar Documento
    $(document).on('click', '#EditbtnDocumento', function (e) {
        console.log(" LLegar a Modal Editar Documento ");
        let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/findDocumentos/"); ?>';
        let element = $(this)[0].parentElement.parentElement;
        let docid = $(element).attr('Documentoid');
        console.log('Tareas id', docid);
        url = url + docid;
        console.log(url);
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('lista tareas ', lista);
            $('#doc_descripcionEdit').val(lista[0].descripcion);
            $('#comentario_archivoEdit').val(lista[0].comentarios);
            $('#id_modal_documentoEdit').val(docid);
        });
        $("#documentoModalEdit").modal('show');
    });

    //-------------------------------------------------------------------------------
    // ----------------------- Accion para Editar Datos -------------------------
    //Editar Evento
    $(document).on('click', '#eventosfrmsubmitEdit', function (e) {
        e.preventDefault();
        var formData = new FormData();
        const id_evento = $('#id_modal_eventoEdit').val();
        var tipo_evento = $('#tipo_eventoEdit').val();
        var evento_comentario = $('#evento_comentarioEdit').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_evento', tipo_evento);
        formData.append('evento_comentario', evento_comentario);
        console.log("tipo_evento ", tipo_evento, "evento_comentario ", evento_comentario);
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/UpdateEventos/"); ?>'
        url = url + id_evento;
        console.log("ul ", url);
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Eventos(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#eventoModalEdit").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });

    //Editar Publicaciones
    $(document).on('click', '#publicacionfrmsubmitEdit', function (e) {
        console.log("Click Editar Publicacion");
        e.preventDefault();
        var formData = new FormData();
        const id_publicacion = $('#id_modal_publicacionEdit').val();
        var tipo_publicacion = $('#tipo_publicacionEdit').val();
        var boletin_publicacion = $('#boletin_publicacionEdit').val();
        var tomo = $('#tomo_publicacionEdit').val();
        var pagina = $('#pag_publicacionEdit').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_publicacion', tipo_publicacion);
        formData.append('boletin_publicacion', boletin_publicacion);
        formData.append('tomo', tomo);
        formData.append('pagina', pagina);
        console.log("tipo_publicacion ", tipo_publicacion, " boletin_publicacion ", boletin_publicacion,
            " tomo ", tomo, ' pagina ', pagina);
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/UpdatePublicaciones/"); ?>'
        url = url + id_publicacion;
        console.log('url ', url);
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Publicaciones(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#publicacionModalEdit").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    })

    //Editar Tareas
    $(document).on('click', '#tareasfrmsubmitEdit', function (e) {
        e.preventDefault();
        console.log("Click Editar Tareas");
        var formData = new FormData();
        const id_tarea = $('#id_modal_tareaEdit').val();
        var tipo_tarea = $('#tipo_tareaEdit').val();
        var tarea_descripcion = $('#tarea_descripcionEdit').val();
        var tarea_fecha = $('#tarea_fechaEdit').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_tarea', tipo_tarea);
        formData.append('tarea_descripcion', tarea_descripcion);
        formData.append('tarea_fecha', tarea_fecha);
        console.log("tipo_tarea ", tipo_tarea, "tarea_descripcion ", tarea_descripcion, " fecha ", tarea_fecha,
            "id tarea ", id_tarea);
        let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/UpdateTareas/"); ?>'
        url = url + id_tarea;
        console.log("ul ", url);
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Tareas(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#tareaModalEdit").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });

    //Editar Documentos
    $(document).on('click', '#documentofrmsubmitEdit', function (e) {
        e.preventDefault();
        console.log("Click Editar Tareas");
        var formData = new FormData();
        var acc_ter_id = id;
        const id_documento = $('#id_modal_documentoEdit').val();
        var descripcion = $('#doc_descripcionEdit').val();
        var comentario_archivo = $('#comentario_archivoEdit').val();
        var doc_archivo = $('#doc_archivoEdit')[0].files[0];
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('acc_ter_id', acc_ter_id);
        formData.append('doc_descripcion', descripcion);
        formData.append('comentario_archivo', comentario_archivo);
        formData.append('doc_archivo', doc_archivo);
        console.log("id Documento ", id_documento);
        let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/UpdateDocumentos/"); ?>'
        url = url + id_documento;
        console.log("ul ", url);
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            Documentos(id);
            console.log(response);
            alert_float('success', "Insertado Correctamente");
            $("#documentoModalEdit").modal('hide');
        }).catch(function (response) {
            console.log(response);
            alert("No puede agregar el Evento sin registro");
        });
    });
    //-----------------------------------------------------------------------------------
    // ----------------------------- Accion para Eliminar Datos -------------------------
    //Eliminar Evento
    $(document).on('click', '#Evento-delete', function (e) {
        e.preventDefault();
        if (confirm("Quieres eliminar este registro?")) {

            var formData = new FormData();

            let element = $(this)[0].parentElement.parentElement;
            let eventoid = $(element).attr('Eventoid');
            console.log(eventoid)
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/destroy/"); ?>';
            url = url + eventoid;
            console.log("url ", url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                Eventos(id);
                alert_float('success', "Eliminado Evento Correctamente");
            }).catch(function (response) {
                alert("No se pudo Eliminar el Evento");
            });
        }
    });

    //Eliminar Publicacion
    // $(document).on('click', '#Publicaciones-delete', function (e) {
    //     e.preventDefault();
    //     if (confirm("Quieres eliminar este registro?")) {

    //         var formData = new FormData();

    //         let element = $(this)[0].parentElement.parentElement;
    //         let pubid = $(element).attr('Publicacionesid');
    //         console.log(pubid)
    //         var csrf_token_name = $("input[name=csrf_token_name]").val();
    //         formData.append('csrf_token_name', csrf_token_name);
    //         let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/destroy/"); ?>';
    //         url = url + pubid;
    //         console.log("url ", url);
    //         $.ajax({
    //             url,
    //             method: 'POST',
    //             data: formData,
    //             processData: false,
    //             contentType: false
    //         }).then(function (response) {
    //             Publicaciones(id);
    //             alert_float('success', "Eliminado Publicacion Correctamente");
    //         }).catch(function (response) {
    //             alert("No se pudo Eliminar el Publicacion");
    //         });
    //     }
    // });

    //Eliminar Tarea
    $(document).on('click', '#Tareas-delete', function (e) {
        e.preventDefault();
        if (confirm("Quieres eliminar este registro?")) {

            var formData = new FormData();

            let element = $(this)[0].parentElement.parentElement;
            let tareaid = $(element).attr('Tareasid');
            console.log(tareaid)
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/destroy/"); ?>';
            url = url + tareaid;
            console.log("url ", url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                Tareas(id);
                alert_float('success', "Tarea Eliminado Correctamente");
            }).catch(function (response) {
                alert("No se pudo Eliminar la Tarea");
            });
        }
    });

    //Eliminar Documento
    $(document).on('click', '#Documento-delete', function (e) {
        e.preventDefault();
        if (confirm("Quieres eliminar este registro?")) {
            var formData = new FormData();
            let element = $(this)[0].parentElement.parentElement;
            let documentoid = $(element).attr('Documentoid');
            console.log(documentoid)
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/destroy/"); ?>';
            url = url + documentoid;
            console.log("url ", url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                Documentos(id);
                alert_float('success', "Documento Eliminado Correctamente");
            }).catch(function (response) {
                alert("No se pudo Eliminar el Documento");
            });
        }
    });

    /*
    
   // Mostrar Publicaciones
    function Publicaciones(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/showPublicaciones/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
            if (lista.length === 0) {
                $('#body_publicaciones').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                body += `<tr Publicacionesid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.tipo_publicacion}</td>
                                    <td class="text-center">${item.boletin}</td>
                                    <td class="text-center">${item.tomo}</td>
                                    <td class="text-center">${item.pagina}</td>
                                    <td class="text-center">${item.fecha}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" id ="EditbtnPublicaciones" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="Publicaciones-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_publicaciones').html(body);
        })
    }
    
    //Mostrar Eventos
    function Eventos(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/showEventos/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log(lista);
            if (lista.length === 0) {
                $('#body_eventos').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                body += `<tr Eventoid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.tipo_evento}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    <td class="text-center">${item.fecha}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnEvento" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="Evento-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_eventos').html(body);
        })
    }
    //Mostrar Tareas
    function Tareas(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTerceroTareasController/showTareas/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('lista tareas ',lista);
            if (lista.length === 0) {
                $('#body_tareas').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                body += `<tr Tareasid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.tipo_tarea}</td>
                                    <td class="text-center">${item.descripcion}</td>
                                    <td class="text-center">${item.fecha}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnTareas" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="Tareas-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_tareas').html(body);
        })
    }

    //Mostrar Eventos
    function Documentos(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTerceroDocumentosController/showDocumentos/"); ?>';
        url = url + id_cambio;
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let lista = JSON.parse(response);
            console.log('Lista Documentos ',lista);
            if (lista.length === 0) {
                $('#body_documentos').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                body += `<tr Documentoid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.descripcion}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    <td class="text-center">
                                    <a href="${item.archivo}" target="_blank">Ver Archivo</a>
                                    </td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnDocumento" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="Documento-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_documentos').html(body);
        })
    }
    */
</script>