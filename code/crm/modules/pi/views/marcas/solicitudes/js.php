<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    /*Inicializamos el localstorage*/
    localStorage.setItem("clase_niza", JSON.stringify([]));
    localStorage.setItem("prioridad", JSON.stringify([]));
    localStorage.setItem("publicacion", JSON.stringify([]));
    localStorage.setItem('eventos', JSON.stringify([]));
    localStorage.setItem('tareas', JSON.stringify([]));
    localStorage.setItem('facturas', JSON.stringify([]));
</script>
<script>
    Cesion()
    CambioDomicilio();
    CambioNombre();
    Fusion();
    Licencia();
    // $(document).on('click','#step5',function(e){
    //     console.log("Click");
    //     $("#ErrorModal").modal('show');

    // });
    // $(document).on('click','#step6',function(e){
    //     console.log("Click");
    //     $("#ErrorModal").modal('show');
    // });
    // $(document).on('click','#step7',function(e){
    //     console.log("Click");
    //     $("#ErrorModal").modal('show');
    // });
    // $(document).on('click','#step8',function(e){
    //     console.log("Click");
    //     $("#ErrorModal").modal('show');
    // });

    // ---------------------------------- Mostrar Anexo -----------------------------------------------
    // Cambio Domicilio------------------------------------------------------
    function CambioDomicilio() {
        let url = '<?php echo admin_url("pi/MarcasDomicilioController/showCambioDomicilio/"); ?>';
        let eliminar = '<?php echo admin_url("pi/MarcasDomicilioController/destroy/"); ?>';
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                body += `<tr CamDomid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.oficina}</td>
                                    <td class="text-center">${item.staff}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.num_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.num_resolucion}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.referencia_cliente}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                   
                                </tr>
                            `
            });
            $('#body_cambio_domicilio').html(body);
        })
    }
    // Cambio de Nombre
    function CambioNombre() {
        let url = '<?php echo admin_url("pi/CambioNombreController/showCambioNombre/"); ?>';
        let eliminar = '<?php echo admin_url("pi/CambioNombreController/destroy/"); ?>';
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                body += `<tr CamNomid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.oficina}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.num_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.num_resolucion}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.referencia_cliente}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    
                                </tr>
                            `
            });
            $('#body_cambio_nombre').html(body);
        })
    }

    // Fusion
    function Fusion() {
        let url = '<?php echo admin_url("pi/FusionController/showFusion/"); ?>';
        let eliminar = '<?php echo admin_url("pi/FusionController/destroy/"); ?>';
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                body += `<tr Fusionid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.oficina}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.num_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.num_resolucion}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.referencia_cliente}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                   
                                </tr>
                            `

            });
            $('#body_fusion').html(body);
        })
    }

    // Licencia
    function Licencia() {
        let url = '<?php echo admin_url("pi/LicenciaController/showLicencia/"); ?>';
        let eliminar = '<?php echo admin_url("pi/LicenciaController/destroy/"); ?>';
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                body += `<tr Licenciaid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cliente}</td>
                                    <td class="text-center">${item.oficina}</td>
                                    <td class="text-center">${item.staff}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.num_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.num_resolucion}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.referencia_cliente}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    
                                </tr>
                            `
            });
            $('#body_licencia').html(body);
        })
    }
    // Cesion
    function Cesion() {
        let url = '<?php echo admin_url("pi/CesionController/showCesion/"); ?>';
        let eliminar = '<?php echo admin_url("pi/CesionController/destroy/"); ?>';
        let body = ``;
        $.get(url, function(response) {
            let listadomicilio = JSON.parse(response);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                body += `<tr Cesionid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cliente}</td>
                                    <td class="text-center">${item.oficina}</td>
                                    <td class="text-center">${item.staff}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.num_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.num_resolucion}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.referencia_cliente}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    
                                </tr>
                            `

            });
            $('#body_cesion').html(body);
        })
    }

    // Renovacion
    $('#renovacion').on('click', function() {
        let title = `Renovacion`;
        $('#anexotitulo').html(title);
        let template = `
                <tr >
                    <th>Nº</th>
                    <th>Cliente</th>
                    <th>Oficina</th>
                    <th>Staff</th>
                    <th>Estado</th>
                    <th>Nº de Solicitud</th>
                    <th>Fecha de Solicitud</th>
                    <th>Nº de Resolucion</th>
                    <th>Fecha de Resolucion</th>
                    <th>Referencia Cliente</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            `;
        $('#anexohead').html(template);
        $('#anexobody').html(``);

    })

    //----------------------------------- Funciones de la Informacion que Trae desde la Base de Datos -----------------------------------------------
    //Modal Edit Documento
    $(document).on('click', '.editdoc', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('docid');
        let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/EditDoc/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let doc = JSON.parse(response);
            $('#Documento_id').val(doc[0]['id']);
            $('#editdoc_descripcion').val(doc[0]['descripcion']);
            $('#editcomentario_archivo').val(doc[0]['comentario']);
            $('#editdoc_archivo').val(doc[0]['path']);
        })
    })
    //Modal Edit Tareas 
    /*$(document).on('click','.edit',function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        let url = '<?php echo admin_url("pi/TareasController/EditTareas/"); ?>';
        url = url + id;
        $.post(url,{id},function(response){
        let tareas =JSON.parse(response);
        $('#edittipo_tarea').val(tareas[0]['tipo_tareas_id']);
        $('#editdescripcion').val(tareas[0]['descripcion']);
        $('#Tareaid').val(tareas[0]['id']);
        })
    })*/

    //Modal Edit Eventos
    $(document).on('click', '.editeventos', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('eventosid');
        let url = '<?php echo admin_url("pi/EventosController/EditEventos/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let eventos = JSON.parse(response);
            $('#edittipo_evento').val(eventos[0]['tipo_evento_id']);
            $('#editevento_comentario').val(eventos[0]['comentarios']);
            $('#Eventoid').val(eventos[0]['id']);
        })
    })

    //Modal Edit Cesion
    $(document).on('click', '.EditCesion', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('cesionid');
        let url = '<?php echo admin_url("pi/CesionController/EditCesion/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let cesion = JSON.parse(response);
            $('#cesionid').val(cesion[0]['id']);
            $('#editclienteCesion').val(cesion[0]['client_id']);
            $('#editoficinaCesion').val(cesion[0]['oficina_id']);
            $('#editstaffCesion').val(cesion[0]['staff_id']);
            $('#editnro_solicitudCesion').val(cesion[0]['solicitud_num']);
            $('#editfecha_solicitudCesion').val(cesion[0]['fecha_solicitud']);
            $('#editnro_resolucionCesion').val(cesion[0]['resolucion_num']);
            $('#editfecha_resolucionCesion').val(cesion[0]['fecha_resolucion']);
            $('#editreferenciaclienteCesion').val(cesion[0]['referencia_cliente']);
            $('#editcomentarioCesion').val(cesion[0]['comentarios']);

        })
    })

    //Modal Edit Licencia
    $(document).on('click', '.EditLicencia', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('licenciaid');
        let url = '<?php echo admin_url("pi/LicenciaController/EditLicencia/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let licencia = JSON.parse(response);
            $('#licenciaid').val(licencia[0]['id']);
            $('#editclientelicencia').val(licencia[0]['client_id']);
            $('#editoficinalicencia').val(licencia[0]['oficina_id']);
            $('#editstafflicencia').val(licencia[0]['staff_id']);
            $('#editestadolicencia').val(licencia[0]['estado_id']);
            $('#editnro_solicitudlicencia').val(licencia[0]['num_solicitud']);
            $('#editfecha_solicitudlicencia').val(licencia[0]['fecha_solicitud']);
            $('#editnro_resolucionlicencia').val(licencia[0]['num_resolucion']);
            $('#editfecha_resolucionlicencia').val(licencia[0]['fecha_resolucion']);
            $('#editreferenciaclientelicencia').val(licencia[0]['referencia_cliente']);
            $('#editcomentariolicencia').val(licencia[0]['comentarios']);

        })
    })

    //Modal Edit Fusion
    $(document).on('click', '.editFusion', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('fusionid');
        let url = '<?php echo admin_url("pi/FusionController/EditFusion/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let fusion = JSON.parse(response);
            $('#fusionid').val(fusion[0]['id']);
            $('#editoficinaFusion').val(fusion[0]['oficina_id']);
            $('#editestadoFusion').val(fusion[0]['estado_id']);
            $('#editnro_solicitudFusion').val(fusion[0]['num_solicitud']);
            $('#editfecha_solicitudFusion').val(fusion[0]['fecha_solicitud']);
            $('#editnro_resolucionFusion').val(fusion[0]['num_resolucion']);
            $('#editfecha_resolucionFusion').val(fusion[0]['fecha_resolucion']);
            $('#editreferenciaclienteFusion').val(fusion[0]['referencia_cliente']);
            $('#editcomentarioFusion').val(fusion[0]['comentarios']);

        })
    })

    //Modal Edit Cambio Nombre
    $(document).on('click', '.editCamNom', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('CamNomid');
        let url = '<?php echo admin_url("pi/CambioNombreController/EditCambioNombre/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let fusion = JSON.parse(response);
            $('#camnomid').val(fusion[0]['id']);
            $('#editoficinaCamNom').val(fusion[0]['oficina_id']);
            $('#editestadoCamNom').val(fusion[0]['estado_id']);
            $('#editnro_solicitudCamNom').val(fusion[0]['num_solicitud']);
            $('#editfecha_solicitudCamNom').val(fusion[0]['fecha_solicitud']);
            $('#editnro_resolucionCamNom').val(fusion[0]['num_resolucion']);
            $('#editfecha_resolucionCamNom').val(fusion[0]['fecha_resolucion']);
            $('#editreferenciaclienteCamNom').val(fusion[0]['referencia_cliente']);
            $('#editcomentarioCamNom').val(fusion[0]['comentarios']);

        })
    })
    //Modal Edit Cambio de Domicilio
    $(document).on('click', '.editCamDom', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('CamDomid');
        let url = '<?php echo admin_url("pi/MarcasDomicilioController/EditCambioDomicilio/"); ?>';
        url = url + id;
        $.post(url, {
            id
        }, function(response) {
            let fusion = JSON.parse(response);
            $('#camdomid').val(fusion[0]['id']);
            $('#editoficinaCamDom').val(fusion[0]['oficina_id']);
            $('#editestadoCamDom').val(fusion[0]['estado_id']);
            $('#editnro_solicitudCamDom').val(fusion[0]['num_solicitud']);
            $('#editfecha_solicitudCamDom').val(fusion[0]['fecha_solicitud']);
            $('#editnro_resolucionCamDom').val(fusion[0]['num_resolucion']);
            $('#editfecha_resolucionCamDom').val(fusion[0]['fecha_resolucion']);
            $('#editreferenciaclienteCamDom').val(fusion[0]['referencia_cliente']);
            $('#editcomentarioCamDom').val(fusion[0]['comentarios']);

        })
    })
    //----------------------------------- Modal Para Añadir y Editar -----------------------------------------------

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
        let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/addSolicitudDocumento"); ?>'
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


    //Editar Documento ---------------------------------------------------------------------------
    $(document).on('click', '#documentoeditfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#Documento_id').val();
        var description = $('#editdoc_descripcion').val();
        var comentario_archivo = $('#editcomentario_archivo').val();
        var doc_archivo = $('#editdoc_archivo')[0].files[0];
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('id', id);
        formData.append('doc_descripcion', description);
        formData.append('comentario_archivo', comentario_archivo);
        formData.append('doc_archivo', doc_archivo);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/UpdateDocumento/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#docModalEdit").modal('hide');
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Añadir Cesion ---------------------------------------------------------------------------
    $(document).on('click', '#AddCesionfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var cliente = $('#clienteCesion').val();
        var oficina = $('#oficinaCesion').val();
        var staff = $('#staffCesion').val();
        var estado = $('#estadoCesion').val();
        var nro_solicitud = $('#nro_solicitudCesion').val();
        var fecha_solicitud = $('#fecha_solicitudCesion').val();
        var nro_resolucion = $('#nro_resolucionCesion').val();
        var fecha_resolucion = $('#fecha_resolucionCesion').val();
        var referenciacliente = $('#referenciaclienteCesion').val();
        var comentario = $('#comentarioCesion').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('cliente', cliente);
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/CesionController/addCesion"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#AddCesion").modal('hide');
            Cesion()
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Editar Cesion ---------------------------------------------------------------------------
    $(document).on('click', '#EditCesionfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#cesionid').val();
        var cliente = $('#editclienteCesion').val();
        var oficina = $('#editoficinaCesion').val();
        var staff = $('#editstaffCesion').val();
        var estado = $('#editestadoCesion').val();
        var nro_solicitud = $('#editnro_solicitudCesion').val();
        var fecha_solicitud = $('#editfecha_solicitudCesion').val();
        var nro_resolucion = $('#editnro_resolucionCesion').val();
        var fecha_resolucion = $('#editfecha_resolucionCesion').val();
        var referenciacliente = $('#editreferenciaclienteCesion').val();
        var comentario = $('#editcomentarioCesion').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('cliente', cliente);
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/CesionController/UpdateCesion/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#EditCesion").modal('hide');
            Cesion()
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Añadir Licencia ---------------------------------------------------------------------------
    $(document).on('click', '#addlicenciafrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var cliente = $('#clientelicencia').val();
        var oficina = $('#oficinalicencia').val();
        var staff = $('#stafflicencia').val();
        var estado = $('#estadolicencia').val();
        var nro_solicitud = $('#nro_solicitudlicencia').val();
        var fecha_solicitud = $('#fecha_solicitudlicencia').val();
        var nro_resolucion = $('#nro_resolucionlicencia').val();
        var fecha_resolucion = $('#fecha_resolucionlicencia').val();
        var referenciacliente = $('#referenciaclientelicencia').val();
        var comentario = $('#comentariolicencia').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('cliente', cliente);
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/LicenciaController/addLicencia"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#AddLicencia").modal('hide');
            Licencia()
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Editar Licencia ---------------------------------------------------------------------------
    $(document).on('click', '#editlicenciafrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#licenciaid').val();
        var cliente = $('#editclientelicencia').val();
        var oficina = $('#editoficinalicencia').val();
        var staff = $('#editstafflicencia').val();
        var estado = $('#editestadolicencia').val();
        var nro_solicitud = $('#editnro_solicitudlicencia').val();
        var fecha_solicitud = $('#editfecha_solicitudlicencia').val();
        var nro_resolucion = $('#editnro_resolucionlicencia').val();
        var fecha_resolucion = $('#editfecha_resolucionlicencia').val();
        var referenciacliente = $('#editreferenciaclientelicencia').val();
        var comentario = $('#editcomentariolicencia').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('id', id);
        formData.append('cliente', cliente);
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/LicenciaController/UpdateLicencia/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#EditLicencia").modal('hide');
            Licencia()
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });



    //Añadir Fusion ---------------------------------------------------------------------------
    $(document).on('click', '#addfusionfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var oficina = $('#oficinaFusion').val();
        var estado = $('#estadoFusion').val();
        var nro_solicitud = $('#nro_solicitudFusion').val();
        var fecha_solicitud = $('#fecha_solicitudFusion').val();
        var nro_resolucion = $('#nro_resolucionFusion').val();
        var fecha_resolucion = $('#fecha_resolucionFusion').val();
        var referenciacliente = $('#referenciaclienteFusion').val();
        var comentario = $('#comentarioFusion').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('oficina', oficina);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/FusionController/addFusion"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#AddFusion").modal('hide');
            Fusion()
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Editar Fusion ---------------------------------------------------------------------------
    $(document).on('click', '#editfusionfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#fusionid').val();
        var oficina = $('#editoficinaFusion').val();
        var estado = $('#editestadoFusion').val();
        var nro_solicitud = $('#editnro_solicitudFusion').val();
        var fecha_solicitud = $('#editfecha_solicitudFusion').val();
        var nro_resolucion = $('#editnro_resolucionFusion').val();
        var fecha_resolucion = $('#editfecha_resolucionFusion').val();
        var referenciacliente = $('#editreferenciaclienteFusion').val();
        var comentario = $('#editcomentarioFusion').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('id', id);
        formData.append('oficina', oficina);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/FusionController/UpdateFusion/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#EditFusion").modal('hide');
            Fusion();
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });
    //Añadir Cambio de Nombre -----------------------------------------------------------------
    $(document).on('click', '#AddCambioNombrefrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var oficina = $('#oficinaCamNom').val();
        var estado = $('#estadoCamNom').val();
        var nro_solicitud = $('#nro_solicitudCamNom').val();
        var fecha_solicitud = $('#fecha_solicitudCamNom').val();
        var nro_resolucion = $('#nro_resolucionCamNom').val();
        var fecha_resolucion = $('#fecha_resolucionCamNom').val();
        var referenciacliente = $('#referenciaclienteCamNom').val();
        var comentario = $('#comentarioCamNom').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('oficina', oficina);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/CambioNombreController/addCambioNombre"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#AddCambioNombre").modal('hide');
            CambioNombre();
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Editar Cambio de Nombre -----------------------------------------------------------------
    $(document).on('click', '#EditCambioNombrefrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#camnomid').val();
        var oficina = $('#editoficinaCamNom').val();
        var estado = $('#editestadoCamNom').val();
        var nro_solicitud = $('#editnro_solicitudCamNom').val();
        var fecha_solicitud = $('#editfecha_solicitudCamNom').val();
        var nro_resolucion = $('#editnro_resolucionCamNom').val();
        var fecha_resolucion = $('#editfecha_resolucionCamNom').val();
        var referenciacliente = $('#editreferenciaclienteCamNom').val();
        var comentario = $('#editcomentarioCamNom').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('id', id);
        formData.append('oficina', oficina);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/CambioNombreController/UpdateCambioNombre/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#EditCambioNombre").modal('hide');
            CambioNombre();
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Añadir Cambio Domicilio ----------------------------------------------------------------------
    $(document).on('click', '#AddCambioDomiciliofrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var oficina = $('#oficinaCamDom').val();
        var staff = $('#staffCamDom').val();
        var estado = $('#estadoCamDom').val();
        var nro_solicitud = $('#nro_solicitudCamDom').val();
        var fecha_solicitud = $('#fecha_solicitudCamDom').val();
        var nro_resolucion = $('#nro_resolucionCamDom').val();
        var fecha_resolucion = $('#fecha_resolucionCamDom').val();
        var referenciacliente = $('#referenciaclienteCamDom').val();
        var comentario = $('#comentarioCamDom').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/MarcasDomicilioController/addCambioDomicilio"); ?>'
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Insertado Correctamente");
            $("#AddCambioDomicilio").modal('hide');
            CambioDomicilio();
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Editar Cambio Domicilio ----------------------------------------------------------------------
    $(document).on('click', '#EditCambioDomiciliofrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#camdomid').val();
        var oficina = $('#editoficinaCamDom').val();
        var staff = $('#editstaffCamDom').val();
        var estado = $('#editestadoCamDom').val();
        var nro_solicitud = $('#editnro_solicitudCamDom').val();
        var fecha_solicitud = $('#editfecha_solicitudCamDom').val();
        var nro_resolucion = $('#editnro_resolucionCamDom').val();
        var fecha_resolucion = $('#editfecha_resolucionCamDom').val();
        var referenciacliente = $('#editreferenciaclienteCamDom').val();
        var comentario = $('#editcomentarioCamDom').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('id', id);
        formData.append('oficina', oficina);
        formData.append('staff', staff);
        formData.append('estado', estado);
        formData.append('nro_solicitud', nro_solicitud);
        formData.append('fecha_solicitud', fecha_solicitud);
        formData.append('nro_resolucion', nro_resolucion);
        formData.append('fecha_resolucion', fecha_resolucion);
        formData.append('referenciacliente', referenciacliente);
        formData.append('comentario', comentario);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/MarcasDomicilioController/UpdateCambioDomicilio/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#EditCambioDomicilio").modal('hide');
            CambioDomicilio();
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });

    //Añadir Evento ---------------------------------------------------------------------------
    $(document).on('click', '#eventosfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=tipo_evento]").val() && $("input[name=fecha_evento]").val() && $("textarea[name=evento_comentario]").val()) {
            
            var eventos = JSON.parse(localStorage.getItem("eventos"));
            var data = {
                "fecha": $("input[name=fecha_evento]").val(),
                "tipo_evento_id": $("select[name=tipo_evento]").val(),
                'tipo_evento_name': $("select[name=tipo_evento] option:selected").text(),
                "comentarios": $("textarea[name=evento_comentario]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (eventos.length) + "' class='btn btn-danger col-mrg deleteEvento'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            eventos.push(data);

            try {
                localStorage.setItem("eventos", JSON.stringify(eventos));
                $("#eventoFrm")[0].reset();
                $('select[name=tipo_evento]').prop('selectedIndex', 0);
                $('select[name=tipo_evento]').selectpicker('refresh'); 
                $("#eventoModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
                TablaEventos();
            } catch (error) {
                alert(error);
            }

        }else{
            alert_float('danger', 'Debe seleccionar los datos para el Evento');
        }

    });

    function TablaEventos() {
        tabla = JSON.parse(localStorage.getItem("eventos"));
        $("#eventosTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '35%', targets: 0 },
                { width: '40%', targets: 1 },
                { width: '10%', targets: 2 },
                { width: '15%', targets: 3 }
            ],
            columns: [
                {
                    data: 'tipo_evento_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }

    $(document).on('click', '.deleteEvento', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var eventos = JSON.parse(localStorage.getItem("eventos"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            eventos.length == 1 ? eventos = [] : eventos.splice(id, 1);
            localStorage.setItem("eventos", JSON.stringify(eventos));
            alert_float('success', 'Evento borrado exitosamente');
            TablaEventos();
        }
    })


    //Editar Evento ---------------------------------------------------------------------------
    $(document).on('click', '#editeventosfrmsubmit', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#Eventoid').val();
        var tipo_evento = $('#edittipo_evento').val();
        var comentarios = $('#editevento_comentario').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        formData.append('tipo_evento', tipo_evento);
        formData.append('comentarios', comentarios);
        formData.append('id', id);
        let url = '<?php echo admin_url("pi/EventosController/UpdateEventos/"); ?>'
        url = url + id;
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response) {
            alert_float('success', "Actualizado Correctamente");
            $("#eventoModalEdit").modal('hide');
        }).catch(function(response) {
            alert("No puede agregar un Documento sin registro de la solicitud");
        });
    });


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
    $(document).on('submit', "#solicitudfrm", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id', $("input[name=id]").val());
        formData.append('cod_contador', $("input[name=cod_contador]").val());
        formData.append('tipo_registro_id', $("select[name=tipo_registro_id]").val());
        formData.append('client_id', $("select[name=client_id]").val());
        formData.append('oficina_id', $("select[name=oficina_id]").val());
        formData.append('staff_id', $("select[name=staff_id]").val());
        //Pais_id fill
        pais_id = JSON.stringify($("select[name=pais_id]").val());
        formData.append('pais_id', pais_id);
        //solicitantes_id fill
        solicitantes_id = JSON.stringify($("select[name=solicitantes_id]").val());
        formData.append('solicitantes_id', solicitantes_id);
        formData.append('tipo_solicitud_id', $("select[name=tipo_solicitud_id]").val());
        formData.append('ref_interna', $("input[name=ref_interna]").val());
        formData.append('ref_cliente', $('input[name=ref_cliente]').val());
        //formData.append('primer_uso', $('input[name=primer_uso').val());
        formData.append('prueba_uso', $('input[name=prueba_uso]').val());
        formData.append('carpeta', $("input[name=carpeta]").val());
        formData.append('libro', $("input[name=libro]").val());
        formData.append('tomo', $("input[name=tomo]").val());
        formData.append('folio', $("input[name=folio]").val());
        formData.append('comentarios', $("textarea[name=comentarios]").val());
        formData.append('estado_id', $("select[name=estado_id]").val());
        formData.append('solicitud', $("input[name=solicitud]").val());
        formData.append('fecha_solicitud', $("input[name=fecha_solicitud]").val());
        formData.append('registro', $("input[name=registro]").val());
        formData.append('fecha_registro', $("input[name=fecha_registro]").val());
        formData.append('certificado', $("input[name=certificado]").val());
        formData.append('fecha_certificado', $("input[name=fecha_certificado]").val());
        formData.append('fecha_vencimiento', $("input[name=fecha_vencimiento]").val());
        formData.append('signo_archivo', $('input[name=signo_archivo]')[0].files[0]);
        formData.append('signonom', $("input[name=signonom]").val());
        formData.append('descripcion_signo', $("textarea[name=descripcion_signo]").val());
        formData.append('comentario_signo', $("input[name=comentario_signo]").val());
        formData.append('tipo_signo_id', $('select[name=tipo_signo_id]').val());
        formData.append('clase_niza_id', localStorage.getItem("clase_niza"));
        formData.append('prioridad_id', localStorage.getItem("prioridad"));
        formData.append("publicacion_id", localStorage.getItem("publicacion"));
        formData.append("eventos_id", localStorage.getItem("eventos"));
        formData.append("tareas_id", localStorage.getItem("tareas"));

        $.ajax({
            url: '<?php echo admin_url('pi/MarcasSolicitudesController/store'); ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                
                const obj = JSON.parse(response);
                if (obj.code == 201) {
                    alert_float('danger', 'Se han encontrado errores en la Solicitud!');
                    jQuery.each(obj.error, function(item, val) {
                        $('.' + item + '_error').html(val);
                    });
                }else if (obj.code == 500){
                    alert_float('danger', obj.error);
                }else{
                    alert_float('success', 'Solicitud guardada con éxito!');
                    location.replace('<?php echo admin_url("pi/MarcasSolicitudesController/edit/{$id}"); ?>');
                }
                
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
        TablaClases();
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


    /* function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    } */
    //---------------------
    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>

<script>
    /***
     * funcion para obtener la descripcion de la clase
     * 
     * 
     */
    $(document).on('change', 'select[name=clase_niza]', function(e) {
        e.preventDefault();
        var clase_niza = $("select[name=clase_niza]").val();
        $.ajax({
            url: "<?php echo admin_url('pi/ClasesController/getDescription'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                'clase_id': clase_niza
            },
            success: function(response) {
                res = JSON.parse(response);
                $("input[name=clase_niza_descripcion]").val(res.data);
            }
        });
    });
</script>

<script>
    /***
     * funcion para guardar el formulario de la clase
     * 
     * 
     */
    $(document).on('click', '#claseNizaFrmSubmit', function(e) {
        e.preventDefault();
        if ($("select[name=clase_niza]").val() && $("input[name=clase_niza_descripcion]").val()) {
            var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
            var data = {
                'clase_id': $("select[name=clase_niza]").val(),
                'descripcion': $("input[name=clase_niza_descripcion]").val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (claseNiza.length) + "' class='btn btn-danger col-mrg borrarClase'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }

            claseNiza.push(data);
            try {
                localStorage.setItem("clase_niza", JSON.stringify(claseNiza));
                $("#claseNizaFrm")[0].reset();
                $('select[name=clase_niza]').prop('selectedIndex', 0);
                $('select[name=clase_niza]').selectpicker('refresh'); 
                $("#claseNizaModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
                TablaClases();
            } catch (error) {
                alert(error);
            }
            
        }else{
            alert_float('danger', 'Debe seleccionar la Clase');
        }


        /*$.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/insertClases') ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                'clase_id': $("select[name=clase_niza]").val(),
                'clase_descripcion': $("input[name=clase_niza_descripcion]").val(),
                'marcas_id': $("input[name=id]").val()
            },
            success: function(response) {
                $("#claseNizaFrm")[0].reset();
                $("#claseNizaModal").modal('hide');
                TablaClases();
            }
        });*/
    });
</script>

<script>
    $(document).on('click', '.borrarClase', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            claseNiza.length == 1 ? claseNiza = [] : claseNiza.splice(id, 1);
            localStorage.setItem("clase_niza", JSON.stringify(claseNiza));
            alert_float('success', 'Clase borrada exitosamente');
            /*$.ajax({
                url: "<?php echo admin_url('pi/MarcasClasesController/delete/'); ?>" + id,
                method: "POST",
                success: function(response) {
                    alert_float('success', 'Clase borrada exitosamente');
                }
            });*/
            TablaClases();
        }
    })
</script>

<script>
    function TablaClases() {
        var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
        $('#claseTbl').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
            },
            data: claseNiza,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '10%', targets: 0 },
                { width: '80%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [{
                    data: 'clase_id',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'descripcion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                }
            ]
        });
        /*$.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/getClasesMarcas/' . $id); ?>",
            method: "POST",
            success: function(response) {
                res = JSON.parse(response);
                data = res.data;
                console.log(res);
                $('#claseTbl').DataTable({
                    destroy: true,
                    data: data,
                    columns: [{
                            data: 'clase'
                        },
                        {
                            data: 'descripcion'
                        },
                        {
                            data: 'acciones'
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    }
                });
            }
        });*/
    }
</script>

<script>
    function TablaPrioridad() {
        table = JSON.parse(localStorage.getItem("prioridad"));
        $("#prioridadTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: table,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '15%', targets: 0 },
                { width: '55%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '15%', targets: 3 }
            ],
            columns: [
                {
                    data: 'fecha_prioridad',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'pais_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'numero_prioridad',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
            ],
            width: "100%"
        });
        /*$.ajax({
            url: "<?php echo admin_url('pi/MarcasPrioridadController/getAllPrioridades/' . $id); ?>",
            method: "GET",
            success: function(response) {
                table = JSON.parse(response);
                $("#prioridadTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    data: table,
                    destroy: true,
                    dataSrc: '',
                    columns: [{
                            data: 'fecha_prioridad'
                        },
                        {
                            data: 'nombre'
                        },
                        {
                            data: 'numero'
                        },
                        {
                            data: 'acciones'
                        },
                    ],
                    width: "100%"
                });
            }
        })*/
    }
</script>

<script>
    $("#prioridadfrmsubmit").on('click', function(e) {
        e.preventDefault();
        if ($("select[name=pais_prioridad]").val() && $("input[name=fecha_prioridad]").val()
            && $("input[name=nro_prioridad]").val()) {
            
            prioridad = JSON.parse(localStorage.getItem('prioridad'));
            data = {
                'pais_id': $("select[name=pais_prioridad]").val(),
                'pais_name': $("select[name=pais_prioridad] option:selected").text(),
                'fecha_prioridad': $("input[name=fecha_prioridad]").val(),
                'numero_prioridad': $("input[name=nro_prioridad").val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (prioridad.length) + "' class='btn btn-danger col-mrg borrarPrioridad'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            prioridad.push(data);

            try {
                localStorage.setItem("prioridad", JSON.stringify(prioridad));
                $("#prioridadFrm")[0].reset();
                $('select[name=pais_prioridad]').prop('selectedIndex', 0);
                $('select[name=pais_prioridad]').selectpicker('refresh'); 
                $("#prioridadModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
                TablaPrioridad();
            } catch (error) {
                alert(error);
            }


        }else{
            alert_float('danger', 'Debe seleccionar los datos para la Prioridad');
        }

        
        
        
        /*$.ajax({
            url: '<?php echo admin_url("pi/MarcasPrioridadController/addPrioridad"); ?>',
            method: 'POST',
            data: data,
            success: function(response) {
                TablaPrioridad();
                $("#prioridadModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            }
        });*/
    });
</script>

<script>
    $(document).on('click', '.borrarPrioridad', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var prioridad = JSON.parse(localStorage.getItem("prioridad"));
        if (confirm("¿Esta seguro de eliminar este registro?")) {
            prioridad.length == 1 ? prioridad = [] : prioridad.splice(id, 1);
            console.log(prioridad);
            localStorage.setItem("prioridad", JSON.stringify(prioridad));
            alert_float('success', 'Registro eliminado exitosamente');
            /*$.ajax({
                url: "<?php echo admin_url("pi/MarcasPrioridadController/destroy/"); ?>" + id,
                method: "POST",
                success: function(response) {
                    alert_float('success', 'Registro eliminado exitosamente');
                }
            });*/
        }
        TablaPrioridad();
    });
</script>

<script>
    $(document).on('click', "#publicacionfrmsubmit", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("input[name=fecha_publicacion]").val() && $("select[name=tipo_publicacion]").val() && $("select[name=boletin_publicacion]").val()
            && $("input[name=tomo_publicacion]").val() && $("input[name=pag_publicacion]").val()) {
            
            var publicacion = JSON.parse(localStorage.getItem("publicacion"));
            var data = {
                "fecha": $("input[name=fecha_publicacion]").val(),
                "tipo_pub_id": $("select[name=tipo_publicacion]").val(),
                'tipo_pub_name': $("select[name=tipo_publicacion] option:selected").text(),
                "boletin_id": $("select[name=boletin_publicacion]").val(),
                'boletin_name': $("select[name=boletin_publicacion] option:selected").text(),
                "tomo": $("input[name=tomo_publicacion]").val(),
                "pagina": $("input[name=pag_publicacion]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (publicacion.length) + "' class='btn btn-danger col-mrg deletePublicacion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            publicacion.push(data);

            try {
                localStorage.setItem("publicacion", JSON.stringify(publicacion));
                $("#publicacionFrm")[0].reset();
                $('select[name=tipo_publicacion]').prop('selectedIndex', 0);
                $('select[name=tipo_publicacion]').selectpicker('refresh'); 
                $('select[name=boletin_publicacion]').prop('selectedIndex', 0);
                $('select[name=boletin_publicacion]').selectpicker('refresh'); 
                $("#publicacionModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
                TablaPublicacion();
            } catch (error) {
                alert(error);
            }

        }else{
            alert_float('danger', 'Debe seleccionar los datos para la Publicación');
        }

        

        
        
        /*$.ajax({
            url: "<?php echo admin_url('pi/PublicacionesMarcasController/addPublicacionMarcas/' . $id); ?>",
            method: "POST",
            data: data,
            success: function(response) {
                alert_float('success', 'Publicacion cargada exitosamente');
                $("#publicacionModal").modal('hide');
            }
        });*/
    });
</script>

<script>
    function TablaPublicacion() {
        tabla = JSON.parse(localStorage.getItem("publicacion"));
        $("#publicacionTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '10%', targets: 0 },
                { width: '30%', targets: 1 },
                { width: '30%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '10%', targets: 5 }
            ],
            columns: [
                {
                    data: 'fecha',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'tipo_pub_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'boletin_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'tomo',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'pagina',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }
</script>

<script>
    $(document).on('click', '.deletePublicacion', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var id = parseInt($(this).attr('id'));
        var publicacion = JSON.parse(localStorage.getItem("publicacion"));
        if (confirm("¿Desea eliminar este registro?")) {
            publicacion.length == 1 ? publicacion = [] : publicacion.splice(id, 1);
            localStorage.setItem("publicacion", JSON.stringify(publicacion));
            alert_float('success', 'Publicacion eliminada exitosamente');
            TablaPublicacion();
            /*$.ajax({
                url: "<?php admin_url('pi/PublicacionesMarcasController/updatePublicacionByMarca'); ?>",
                method: "POST",
                success: function(response) {
                    alert_float('success', 'Registro eliminado exitosamente');
                }
            });*/
        }
    });
</script>

<script>
    function mostrar_tarea() {
        event.preventDefault();
        event.stopImmediatePropagation();
        $.ajax({
            url: "<?php admin_url('pi/TareasController/showTareas/' . $id); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val()
            },
            success: function(response) {
                res = JSON.parse(response);
                console.log(res.data);
                $("#tareas").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    data: res.data,
                    destroy: true,
                    dataSrc: '',
                    columns: [{
                            data: 'fecha'
                        },
                        {
                            data: 'boletin_id'
                        },
                        {
                            data: 'tomo'
                        },
                        {
                            data: 'pagina'
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
</script>

<script>
    $(document).on('click', '#tareasfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("input[name=fecha_tarea]").val() && $("select[name=project_id]").val() && $("select[name=tipo_tarea]").val()
            && $("textarea[name=descripcion]").val()) {
            
            var tareas = JSON.parse(localStorage.getItem("tareas"));
            var data = {
                "fecha": $("input[name=fecha_tarea]").val(),
                "project_id": $("select[name=project_id]").val(),
                'project_id_name': $("select[name=project_id] option:selected").text(),
                "tipo_tareas_id": $("select[name=tipo_tarea]").val(),
                'tipo_tareas_id_name': $("select[name=tipo_tarea] option:selected").text(),
                "descripcion": $("textarea[name=descripcion]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tareas.length) + "' class='btn btn-danger col-mrg deleteTarea'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            tareas.push(data);

            try {
                localStorage.setItem("tareas", JSON.stringify(tareas));
                $("#tareasfrm")[0].reset();
                $('select[name=project_id]').prop('selectedIndex', 0);
                $('select[name=project_id]').selectpicker('refresh'); 
                $('select[name=tipo_tarea]').prop('selectedIndex', 0);
                $('select[name=tipo_tarea]').selectpicker('refresh'); 
                $("#addTask").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
                TablaTareas();
            } catch (error) {
                alert(error);
            }

        }else{
            alert_float('danger', 'Debe seleccionar los datos para la Tarea');
        }

        /* e.preventDefault();
        e.stopImmediatePropagation();
        var data = {
            "project_id": $("#project_id").val(),
            "tipo_tarea": $("#tipo_tarea").val(),
            "descripcion": $("#descripcion").val(),
            "fecha_limite": $("#fecha_limite").val(),
            "marcas_id": $("input[name=id]").val(),
        }
        $.ajax({
            url: "<php echo admin_url('pi/TareasController/addTaskToMarcasAndProject'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                "data": JSON.stringify(data),
            },
            success: function(response) {
                $("#addTask").modal('hide');
                alert_float('success', "Tarea asignada exitosamente");
                $.ajax({
                    url: "<php echo admin_url('pi/TareasController/showTareas/' . $id); ?>",
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
        }) */

    })


    function TablaTareas() {
        tabla = JSON.parse(localStorage.getItem("tareas"));
        $("#tareasTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '22%', targets: 0 },
                { width: '22%', targets: 1 },
                { width: '24%', targets: 2 },
                { width: '22%', targets: 3 },
                { width: '10%', targets: 4 }
            ],
            columns: [
                {
                    data: 'project_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'tipo_tareas_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'descripcion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }

    $(document).on('click', '.deleteTarea', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var tareas = JSON.parse(localStorage.getItem("tareas"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            tareas.length == 1 ? tareas = [] : tareas.splice(id, 1);
            localStorage.setItem("tareas", JSON.stringify(tareas));
            alert_float('success', 'Tarea borrada exitosamente');
            TablaTareas();
        }
    })


</script>

<script>
    $(document).on('click', '#tareasfrmeditsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        e.preventDefault();
        var data = {
            "project_id": $("#project_id").val(),
            "tipo_tarea": $("#tipo_tarea").val(),
            "descripcion": $("#descripcion").val(),
            "fecha_limite": $("#fecha_limite").val(),
            "marcas_id": $("input[name=id]").val(),
        }
        $.ajax({
            url: "<?php echo admin_url('pi/TareasController/addTaskToMarcasAndProject'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                "data": JSON.stringify(data),
            },
            success: function(response) {
                $("#addTask").modal('hide');
                alert_float('success', "Tarea asignada exitosamente");
                mostrar_tarea();
            }
        })
    })
</script>

<script>
    $(document).on('click', "#invoiceMarcaSubmit", function() {
        e.preventDefault()
        let data = {
            "invoiceID": $("select[name=invoiceID]").val(),
            "marcaID": $("input[name=id]").val()
        }
        $.ajax({
            url: "<?php echo admin_url("pi/MarcasSolicitudesController/addInvoice"); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                "data": JSON.stringify(data)
            },
            success: function(response) {
                $("facturaModal").modal('hide');
                alert_float('success', "Factura asignada exitosamente");
            }
        })
    });
</script>