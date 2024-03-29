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
        //Licencia Actual
        function LicenciaActual(id_cambio){
            let url = '<?php echo admin_url("pi/TipoLicenciaController/showLicenciaActual/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr FusionActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.fusion}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnLicenciaActual" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Licencia-Actual-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Licencia_actual').html(body);     
                })
        }
        // Licencia Anterior
        function LicenciaAnterior(id_cambio){
            let url = '<?php echo admin_url("pi/TipoLicenciaController/showLicenciaAnterior/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    // listadomicilio.forEach(item => {
                    //     body += `<tr FusionAnteriorid = "${item.id}"> 
                    //                 <td class="text-center">${item.id}</td>
                    //                 <td class="text-center">${item.fusion}</td>
                    //                 <td class="text-center">${item.tipo_participante}</td>
                    //                 <td class="text-center">${item.propietario}</td>
                    //                     <td class="text-center">
                    //                         <a class="btn btn-light" style= "background-color: white;" 
                    //                         id ="EditbtnFusionAnterior" ><i class="fas fa-edit"></i>Editar</a>
                    //                         <button class="Fusion-Anterior-delete btn btn-danger">
                    //                         <i class="fas fa-trash"></i>Borrar
                    //                         </button>
                    //                     </td>
                    //             </tr>
                    //         `
                    //     });
                    //     $('#body_Licencia_anterior').html(body);     
                })
        }
         //Fusion Actual
         function FusionActual(id_cambio){
            let url = '<?php echo admin_url("pi/TipoFusionController/showFusionActual/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr FusionActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.fusion}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnFusionActual" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Fusion-Actual-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Fusion_actual').html(body);     
                })
        }
        // Fusion Anterior
        function FusionAnterior(id_cambio){
            let url = '<?php echo admin_url("pi/TipoFusionController/showFusionAnterior/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr FusionAnteriorid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.fusion}</td>
                                    <td class="text-center">${item.tipo_participante}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" style= "background-color: white;" 
                                            id ="EditbtnFusionAnterior" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Fusion-Anterior-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Fusion_anterior').html(body);     
                })
        }

        //Cambio Domicilio Actual
        function CambioDomicilioActual(id_cambiodomiclio){
            console.log("domicilio",id_cambiodomiclio);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/showCambioDomicilioActual/");?>';
            url = url+id_cambiodomiclio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        body += `<tr CamDomActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cambio_domicilio}</td>
                                    <td class="text-center">${item.tipo_domicilio}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnCambioDomicilioActual" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cambio-Domicilio-Actual-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_domicilio_actual').html(body);     
                })
        }
        //Cambio Domicilio Anterior
        function CambioDomicilioAnterior(id_cambiodomiclio){
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/showCambioDomicilioAnterior/");?>';
            url = url+id_cambiodomiclio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        body += `<tr CamDomAnteriorid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cambio_domicilio}</td>
                                    <td class="text-center">${item.tipo_domicilio}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class="editCamDomAnterior btn btn-light" style= "background-color: white;" 
                                            id ="EditbtnCambioDomicilioAnterior" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="CambioDomicilioAnteriordelete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_domicilio_anterior').html(body);     
                })
        }

        //Cambio Nombre Actual
        function CambioNombreActual(id_cambionombre){
            console.log("domicilio",id_cambionombre);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/showCambioNombreActual/");?>';
            url = url+id_cambionombre;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr CamNomActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cambio_nombre}</td>
                                    <td class="text-center">${item.tipo_nombre}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnCambioNombreActual" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cambio-Nombre-Actual-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_nombre_actual').html(body);     
                })
        }
        //Cambio Nombre Anterior
        function CambioNombreAnterior(id_cambionombre){
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/showCambioNombreAnterior/");?>';
            url = url+id_cambionombre;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        body += `<tr CamNomAnteriorid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cambio_nombre}</td>
                                    <td class="text-center">${item.tipo_nombre}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class="editCamDomAnterior btn btn-light" style= "background-color: white;" 
                                            id ="EditbtnCambioNombreAnterior" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cambio-Nombre-Anterior-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_nombre_anterior').html(body);     
                })
        }

        // Cambio Domicilio------------------------------------------------------
        function CambioDomicilio(){
            let url = '<?php echo admin_url("pi/MarcasDomicilioController/showCambioDomicilio/");?>';
            let eliminar = '<?php echo admin_url("pi/MarcasDomicilioController/destroy/");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        eliminar = eliminar+item.id;
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
        function CambioNombre(){
            let url = '<?php echo admin_url("pi/CambioNombreController/showCambioNombre/");?>';
            let eliminar = '<?php echo admin_url("pi/CambioNombreController/destroy/");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        eliminar = eliminar+item.id;
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
        function Fusion(){
            let url = '<?php echo admin_url("pi/FusionController/showFusion/");?>';
            let eliminar = '<?php echo admin_url("pi/FusionController/destroy/");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        eliminar = eliminar+item.id;
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
        function Licencia(){
            let url = '<?php echo admin_url("pi/LicenciaController/showLicencia/");?>';
            let eliminar = '<?php echo admin_url("pi/LicenciaController/destroy/");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        eliminar = eliminar+item.id;
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
        function Cesion(){
            let url = '<?php echo admin_url("pi/CesionController/showCesion/");?>';
            let eliminar = '<?php echo admin_url("pi/CesionController/destroy/");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        eliminar = eliminar+item.id;
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
        $('#renovacion').on('click',function(){
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
            // let url = '<?php //echo admin_url("pi/CesionController/showCesion/");?>';
            // let eliminar = '<?php //echo admin_url("pi/CesionController/destroy/");?>';
            //     $.get(url, function(response){
            //         let listadomicilio = JSON.parse(response);
            //         listadomicilio.forEach(item => {
            //             eliminar = eliminar+item.id;
            //             let body = `<tr Licenciaid = "${item.id}"> 
            //                         <td class="text-center">${item.id}</td>
            //                         <td class="text-center">${item.cliente}</td>
            //                         <td class="text-center">${item.oficina}</td>
            //                         <td class="text-center">${item.staff}</td>
            //                         <td class="text-center">${item.estado}</td>
            //                         <td class="text-center">${item.num_solicitud}</td>
            //                         <td class="text-center">${item.fecha_solicitud}</td>
            //                         <td class="text-center">${item.num_resolucion}</td>
            //                         <td class="text-center">${item.fecha_solicitud}</td>
            //                         <td class="text-center">${item.referencia_cliente}</td>
            //                         <td class="text-center">${item.comentarios}</td>
            //                         <form method="DELETE" action="${eliminar}" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
            //                             <td class="text-center">
            //                                 <a class="editeventos btn btn-light" style= "background-color: white; " data-toggle="modal" data-target="#eventoModalEdit"><i class="fas fa-edit"></i>Editar</a>
            //                                 <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
            //                             </td>
            //                         </form> 
            //                     </tr>
            //                 `
            //             $('#anexobody').html(body);     
            //         });
            //     })
        })

         //----------------------------------- Funciones de la Informacion que Trae desde la Base de Datos -----------------------------------------------
         //Modal Edit Documento
         $(document).on('click','.editdoc',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('docid');
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/EditDoc/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let doc =JSON.parse(response);
            $('#Documento_id').val(doc[0]['id']);
            $('#editdoc_descripcion').val(doc[0]['descripcion']);
            $('#editcomentario_archivo').val(doc[0]['comentario']);
            $('#editdoc_archivo').val(doc[0]['path']);
            })
        })
        //Modal Edit Tareas 
        $(document).on('click','.edit',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            let url = '<?php echo admin_url("pi/TareasController/EditTareas/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let tareas =JSON.parse(response);
            $('#edittipo_tarea').val(tareas[0]['tipo_tareas_id']);
            $('#editdescripcion').val(tareas[0]['descripcion']);
            $('#Tareaid').val(tareas[0]['id']);
            })
        })

        //Modal Edit Eventos
        $(document).on('click','.editeventos',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('eventosid');
            let url = '<?php echo admin_url("pi/EventosController/EditEventos/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let eventos =JSON.parse(response);
            $('#edittipo_evento').val(eventos[0]['tipo_evento_id']);
            $('#editevento_comentario').val(eventos[0]['comentarios']);
            $('#Eventoid').val(eventos[0]['id']);
            })
        })

        //Modal Edit Cesion
        $(document).on('click','.EditCesion',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('cesionid');
            let url = '<?php echo admin_url("pi/CesionController/EditCesion/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let cesion =JSON.parse(response);
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
            $(document).on('click','.EditLicencia',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('licenciaid');
            let url = '<?php echo admin_url("pi/LicenciaController/EditLicencia/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let licencia =JSON.parse(response);
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
            LicenciaActual(id);
            LicenciaAnterior(id);
        })

               //Modal Edit Fusion
        $(document).on('click','.editFusion',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('fusionid');
            let url = '<?php echo admin_url("pi/FusionController/EditFusion/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let fusion =JSON.parse(response);
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
            FusionActual(id);
            FusionAnterior(id);
        })

          //Modal Edit Cambio Nombre
          $(document).on('click','.editCamNom',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('CamNomid');
            console.log(id);
            let url = '<?php  echo admin_url("pi/CambioNombreController/EditCambioNombre/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let fusion =JSON.parse(response);
            console.log(fusion[0])
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
            $("#EditCambioNombre").modal('show');
           
                CambioNombreActual(id);
                CambioNombreAnterior(id);
        })
            //Modal Edit Cambio de Domicilio
            $(document).on('click','.editCamDom',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('CamDomid');
            let url = '<?php  echo admin_url("pi/MarcasDomicilioController/EditCambioDomicilio/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let fusion =JSON.parse(response);
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
                $("#EditCambioDomicilio").modal('show');
                CambioDomicilioActual(id);
                CambioDomicilioAnterior(id);
        })
        function getFormData(){
            var config = {};
            $('input').each(function () {
                config[this.name] = this.value;
            });
            $("select").each(function()
            {
                config[this.name] = this.value;
            });
            return config;
        }
        //----------------------------------- Modal Para Añadir y Editar -----------------------------------------------

        //Añadir Documento ---------------------------------------------------------------------------
        $(document).on('click','#documentofrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var description =  $('#doc_descripcion').val();
            var comentario_archivo = $('#comentario_archivo').val();
            var doc_archivo = $('#doc_archivo')[0].files[0];
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('doc_descripcion' , description);
            formData.append('comentario_archivo', comentario_archivo);
            formData.append('doc_archivo', doc_archivo);
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/addSolicitudDocumento");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#docModal").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        
        //Editar Documento ---------------------------------------------------------------------------
        $(document).on('click','#documentoeditfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#Documento_id').val();
            var description =  $('#editdoc_descripcion').val();
            var comentario_archivo = $('#editcomentario_archivo').val();
            var doc_archivo = $('#editdoc_archivo')[0].files[0];
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('doc_descripcion' , description);
            formData.append('comentario_archivo', comentario_archivo);
            formData.append('doc_archivo', doc_archivo);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/UpdateDocumento/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#docModalEdit").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
        
        //Añadir Cesion ---------------------------------------------------------------------------
        $(document).on('click','#AddCesionfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var cliente =  $('#clienteCesion').val();
            var oficina = $('#oficinaCesion').val();
            var staff =  $('#staffCesion').val();
            var estado =  $('#estadoCesion').val();
            var nro_solicitud =  $('#nro_solicitudCesion').val();
            var fecha_solicitud = $('#fecha_solicitudCesion').val();
            var nro_resolucion =  $('#nro_resolucionCesion').val();
            var fecha_resolucion = $('#fecha_resolucionCesion').val();
            var referenciacliente =  $('#referenciaclienteCesion').val();
            var comentario =  $('#comentarioCesion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('cliente',cliente);
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/CesionController/addCesion");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#AddCesion").modal('hide');
                Cesion()
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Cesion ---------------------------------------------------------------------------
        $(document).on('click','#EditCesionfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#cesionid').val();
            var cliente =  $('#editclienteCesion').val();
            var oficina = $('#editoficinaCesion').val();
            var staff =  $('#editstaffCesion').val();
            var estado =  $('#editestadoCesion').val();
            var nro_solicitud =  $('#editnro_solicitudCesion').val();
            var fecha_solicitud = $('#editfecha_solicitudCesion').val();
            var nro_resolucion =  $('#editnro_resolucionCesion').val();
            var fecha_resolucion = $('#editfecha_resolucionCesion').val();
            var referenciacliente =  $('#editreferenciaclienteCesion').val();
            var comentario =  $('#editcomentarioCesion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('cliente',cliente);
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/CesionController/UpdateCesion/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#EditCesion").modal('hide');
                Cesion()
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

         //Añadir Licencia ---------------------------------------------------------------------------
         $(document).on('click','#addlicenciafrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var cliente =  $('#clientelicencia').val();
            var oficina = $('#oficinalicencia').val();
            var staff =  $('#stafflicencia').val();
            var estado =  $('#estadolicencia').val();
            var nro_solicitud =  $('#nro_solicitudlicencia').val();
            var fecha_solicitud = $('#fecha_solicitudlicencia').val();
            var nro_resolucion =  $('#nro_resolucionlicencia').val();
            var fecha_resolucion = $('#fecha_resolucionlicencia').val();
            var referenciacliente =  $('#referenciaclientelicencia').val();
            var comentario =  $('#comentariolicencia').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('cliente',cliente);
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/LicenciaController/addLicencia");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#AddLicencia").modal('hide');
                Licencia()
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Licencia ---------------------------------------------------------------------------
         $(document).on('click','#editlicenciafrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#licenciaid').val();
            var cliente =  $('#editclientelicencia').val();
            var oficina = $('#editoficinalicencia').val();
            var staff =  $('#editstafflicencia').val();
            var estado =  $('#editestadolicencia').val();
            var nro_solicitud =  $('#editnro_solicitudlicencia').val();
            var fecha_solicitud = $('#editfecha_solicitudlicencia').val();
            var nro_resolucion =  $('#editnro_resolucionlicencia').val();
            var fecha_resolucion = $('#editfecha_resolucionlicencia').val();
            var referenciacliente =  $('#editreferenciaclientelicencia').val();
            var comentario =  $('#editcomentariolicencia').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('cliente',cliente);
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/LicenciaController/UpdateLicencia/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#EditLicencia").modal('hide');
                Licencia()
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        

        //Añadir Fusion ---------------------------------------------------------------------------
        $(document).on('click','#addfusionfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var oficina = $('#oficinaFusion').val();
            var estado =  $('#estadoFusion').val();
            var nro_solicitud =  $('#nro_solicitudFusion').val();
            var fecha_solicitud = $('#fecha_solicitudFusion').val();
            var nro_resolucion =  $('#nro_resolucionFusion').val();
            var fecha_resolucion = $('#fecha_resolucionFusion').val();
            var referenciacliente =  $('#referenciaclienteFusion').val();
            var comentario =  $('#comentarioFusion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('oficina',oficina);
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php  echo admin_url("pi/FusionController/addFusion");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#AddFusion").modal('hide');
                Fusion()
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Fusion ---------------------------------------------------------------------------
        $(document).on('click','#editfusionfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#fusionid').val();
            var oficina = $('#editoficinaFusion').val();
            var estado =  $('#editestadoFusion').val();
            var nro_solicitud =  $('#editnro_solicitudFusion').val();
            var fecha_solicitud = $('#editfecha_solicitudFusion').val();
            var nro_resolucion =  $('#editnro_resolucionFusion').val();
            var fecha_resolucion = $('#editfecha_resolucionFusion').val();
            var referenciacliente =  $('#editreferenciaclienteFusion').val();
            var comentario =  $('#editcomentarioFusion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('oficina',oficina);
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php  echo admin_url("pi/FusionController/UpdateFusion/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#EditFusion").modal('hide');
                Fusion();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
         //Añadir Cambio de Nombre -----------------------------------------------------------------
         $(document).on('click','#AddCambioNombrefrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var oficina = $('#oficinaCamNom').val();
            var estado =  $('#estadoCamNom').val();
            var nro_solicitud =  $('#nro_solicitudCamNom').val();
            var fecha_solicitud = $('#fecha_solicitudCamNom').val();
            var nro_resolucion =  $('#nro_resolucionCamNom').val();
            var fecha_resolucion = $('#fecha_resolucionCamNom').val();
            var referenciacliente =  $('#referenciaclienteCamNom').val();
            var comentario =  $('#comentarioCamNom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('oficina',oficina);
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php  echo admin_url("pi/CambioNombreController/addCambioNombre");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#AddCambioNombre").modal('hide');
                CambioNombre();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        }); 

         //Editar Cambio de Nombre -----------------------------------------------------------------
         $(document).on('click','#EditCambioNombrefrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camnomid').val();
            var oficina = $('#editoficinaCamNom').val();
            var estado =  $('#editestadoCamNom').val();
            var nro_solicitud =  $('#editnro_solicitudCamNom').val();
            var fecha_solicitud = $('#editfecha_solicitudCamNom').val();
            var nro_resolucion =  $('#editnro_resolucionCamNom').val();
            var fecha_resolucion = $('#editfecha_resolucionCamNom').val();
            var referenciacliente =  $('#editreferenciaclienteCamNom').val();
            var comentario =  $('#editcomentarioCamNom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('oficina',oficina);
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php  echo admin_url("pi/CambioNombreController/UpdateCambioNombre/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#EditCambioNombre").modal('hide');
                CambioNombre();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        }); 

         //Añadir Cambio Domicilio ----------------------------------------------------------------------
         $(document).on('click','#AddCambioDomiciliofrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var oficina = $('#oficinaCamDom').val();
            var staff =  $('#staffCamDom').val();
            var estado =  $('#estadoCamDom').val();
            var nro_solicitud =  $('#nro_solicitudCamDom').val();
            var fecha_solicitud = $('#fecha_solicitudCamDom').val();
            var nro_resolucion =  $('#nro_resolucionCamDom').val();
            var fecha_resolucion = $('#fecha_resolucionCamDom').val();
            var referenciacliente =  $('#referenciaclienteCamDom').val();
            var comentario =  $('#comentarioCamDom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/MarcasDomicilioController/addCambioDomicilio");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#AddCambioDomicilio").modal('hide');
                CambioDomicilio();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Cambio Domicilio ----------------------------------------------------------------------
        $(document).on('click','#EditCambioDomiciliofrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camdomid').val();
            var oficina = $('#editoficinaCamDom').val();
            var staff =  $('#editstaffCamDom').val();
            var estado =  $('#editestadoCamDom').val();
            var nro_solicitud =  $('#editnro_solicitudCamDom').val();
            var fecha_solicitud = $('#editfecha_solicitudCamDom').val();
            var nro_resolucion =  $('#editnro_resolucionCamDom').val();
            var fecha_resolucion = $('#editfecha_resolucionCamDom').val();
            var referenciacliente =  $('#editreferenciaclienteCamDom').val();
            var comentario =  $('#editcomentarioCamDom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('oficina',oficina);
            formData.append('staff',staff );
            formData.append('estado',estado );
            formData.append('nro_solicitud',nro_solicitud );
            formData.append('fecha_solicitud',fecha_solicitud);
            formData.append('nro_resolucion',nro_resolucion );
            formData.append('fecha_resolucion',fecha_resolucion);
            formData.append('referenciacliente',referenciacliente );
            formData.append('comentario',comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/MarcasDomicilioController/UpdateCambioDomicilio/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#EditCambioDomicilio").modal('hide');
                CambioDomicilio();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Añadir Evento ---------------------------------------------------------------------------
        $(document).on('click','#eventosfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var tipo_evento =  $('#tipo_evento').val();
            var evento_comentario = $('#evento_comentario').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('tipo_evento' , tipo_evento);
            formData.append('evento_comentario', evento_comentario);
            let url = '<?php echo admin_url("pi/EventosController/addEvento");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#eventoModal").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Evento ---------------------------------------------------------------------------
        $(document).on('click','#editeventosfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#Eventoid').val();
            var tipo_evento =  $('#edittipo_evento').val();
            var comentarios = $('#editevento_comentario').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('tipo_evento' , tipo_evento);
            formData.append('comentarios', comentarios);
            formData.append('id', id);
            let url = '<?php echo admin_url("pi/EventosController/UpdateEventos/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#eventoModalEdit").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Añadir Tareas ---------------------------------------------------------------------------
        $(document).on('click','#tareasfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var tipo_tarea =  $('#tipo_tarea').val();
            var descripcion = $('#descripcion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('tipo_tarea' , tipo_tarea);
            formData.append('descripcion', descripcion);
            let url = '<?php echo admin_url("pi/TareasController/addTareas");?>';
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#addTask").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Editar Tareas ---------------------------------------------------------------------------
        $(document).on('click','#tareaseditfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#Tareaid').val();
            var tipo_tarea =  $('#edittipo_tarea').val();
            var descripcion = $('#editdescripcion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id',id);
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('tipo_tarea' , tipo_tarea);
            formData.append('descripcion', descripcion);
            let url = '<?php echo admin_url("pi/TareasController/UpdateTareas/");?>'
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
               alert_float('success', "Actualizado Correctamente");
                $("#EditTask").modal('hide');
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
        
        

        function fecha(){
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1;
            var yy = hoy.getFullYear();
            var fecha = '';
            if(dd<10){
                dd = '0'+dd;
            var formData = new FormData();
            function fecha(){
                var hoy = new Date();
                var dd = hoy.getDate();
                var mm = hoy.getMonth()+1;
                var yy = hoy.getFullYear();
                var fecha = '';
                if(dd<10){
                    dd = '0'+dd;
                }
                else if(mm<10){
                    mm = '0'+mm;
                }
                fecha = dd+"/"+mm+"/"+yy;
                return fecha;
            }
        }
        }

        $(".calendar").on('keyup', function(e){
            e.preventDefault();
            $(".calendar").val('');
        })
        $( function() {
            $(".calendar").datetimepicker({
                maxDate: fecha(),
                weeks: true,
                format: 'd/m/Y',
                timepicker:false,
            });
        });
    </script>