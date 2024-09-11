<script>
    id = '<?php echo $cod_id ?>';
    //-------------------------- Mostra Datos ----------------------
    Eventos(id);
    Publicaciones(id);

    //-------------------------- Lista de datos --------------------------------

    //Mostrar Publicaciones
    function Publicaciones(id_cambio) {
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/showPublicaciones/");?>';
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
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/showEventos/");?>';
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

    //--------------------------------------------------------------------------------

    //------------------------- Crear Datos -----------------------------------

    //Cear Evento
    $(document).on('click', '#eventosfrmsubmit', function (e) {
        console.log("Click Evento");
        e.preventDefault();
        var formData = new FormData();
        //var data = getFormData(this);
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
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/addEvento");?>'
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

    //Cear Publicaciones
    $(document).on('click', '#publicacionfrmsubmit', function (e) {
        console.log("Click Evento");
        e.preventDefault();
        var formData = new FormData();
       // var data = getFormData(this);
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
        console.log("tipo_publicacion ", tipo_publicacion, " boletin_publicacion ", boletin_publicacion," tomo ", tomo, ' pagina ',pagina);
        let url = '<?php echo admin_url("pi/AccionesTercerosPublicacionesController/addPublicacion");?>'
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



    //------------------------------------------------------------------------------


    //Accion para Abrir Modal para Editar Evento
    $(document).on('click', '#EditbtnEvento', function (e) {
        console.log(" LLegar a Modal Editar Eventos ");
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/findEvento/");?>';
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

    //Editar Evento
    $(document).on('click', '#eventosfrmsubmitEdit', function (e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        const id_evento = $('#id_modal_eventoEdit').val();
        var tipo_evento = $('#tipo_eventoEdit').val();
        var evento_comentario = $('#evento_comentarioEdit').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_evento', tipo_evento);
        formData.append('evento_comentario', evento_comentario);
        console.log("tipo_evento ", tipo_evento, "evento_comentario ", evento_comentario);
        let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/UpdateEventos/");?>'
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
    })

    //Eliminar Evento
    $(document).on('click', '#Evento-delete', function (e) {
        e.preventDefault();
        if (confirm("Quieres eliminar este registro?")) {

            var formData = new FormData();
            var data = getFormData(this);
            let element = $(this)[0].parentElement.parentElement;
            let eventoid = $(element).attr('Eventoid');
            console.log(eventoid)
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/AccionesTercerosEventosController/destroy/");?>';
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
    
</script>