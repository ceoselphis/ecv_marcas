<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
    <script>
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
    </script>

    <script>
         // ---------------------------------- Mostrar Anexo -----------------------------------------------
        // Cambio Domicilio------------------------------------------------------
        
        Cesion()
        CambioDomicilio();
        CambioNombre();
        Fusion();
        Licencia();
        Eventos();
        Tareas();
        Documentos();
        
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

        //Cambio Domicilio
        function CambioDomicilio(){
            let url = '<?php echo admin_url("pi/MarcasDomicilioController/showCambioDomicilio/$id");?>';
            let body= ``; //data-toggle="modal" data-target="#EditCambioDomicilio"
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
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
                                        <td class="text-center">
                                            <a class="editCamDom btn btn-light" style= "background-color: white;"  ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cambio-Domicilio-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_domicilio').html(body);     
                })
                
        }
      
        // Cambio de Nombre
        function CambioNombre(){
            let url = '<?php echo admin_url("pi/CambioNombreController/showCambioNombre/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
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
                                        <td class="text-center">
                                            <a class="editCamNom btn btn-light" style= "background-color: white;" ></i>Editar</a>
                                            <button class="Cambio-Nombre-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_cambio_nombre').html(body);     
                })
        }
        
       // Fusion
        function Fusion(){
            let url = '<?php echo admin_url("pi/FusionController/showFusion/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
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
                                        <td class="text-center">
                                            <a class="editFusion btn btn-light" style= "background-color: white;" data-toggle="modal" data-target="#EditFusion"><i class="fas fa-edit"></i>Editar</a>
                                            <button class="fusion-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                  
                                </tr>
                            `
                         
                    });
                    $('#body_fusion').html(body);   
                })
        }
        
         // Licencia
        function Licencia(){
            let url = '<?php echo admin_url("pi/LicenciaController/showLicencia/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
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
                                        <td class="text-center">
                                            <a class="EditLicencia btn btn-light" style= "background-color: white; "  data-toggle="modal" data-target="#EditLicencia"><i class="fas fa-edit"></i>Editar</a>
                                            <button class="licencia-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                    
                                </tr>
                            `
                        });
                        $('#body_licencia').html(body);     
                    })
        }
        // Cesion
        function Cesion(){
            let url = '<?php echo admin_url("pi/CesionController/showCesion/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                         body += `<tr Cesionid = "${item.id}" > 
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
                                        <td class="text-center">
                                            <a class="EditCesion btn btn-light" style= "background-color: white; " data-toggle="modal" data-target="#EditCesion"><i class="fas fa-edit"></i>Editar</a>
                                            <button class="cesion-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                   
                                </tr>
                            `
                    });
                       $('#body_cesion').html(body);   
                })
        }

        // Eventos
        function Eventos(){
            let url = '<?php echo admin_url("pi/EventosController/showEventos/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    listadomicilio.forEach(item => {
                        body += `<tr eventosid = "${item.id}" > 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.tipo_evento}</td>
                                    <td class="text-center">${item.comentarios}</td>
                                    <td class="text-center">${item.fecha}</td>
                                        <td class="text-center">
                                            <a class="editeventos btn btn-light" style= "background-color: white; " data-toggle="modal" data-target="#eventoModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                            <button class="evento-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>  
                                </tr>
                            `
                    });
                    $('#body_eventos').html(body);   
                })
        }

        // Tareas
        function Tareas(){
            let url = '<?php echo admin_url("pi/TareasController/showTareas/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                        listadomicilio.forEach(item => {
                            body += `<tr taskId = "${item.id}">
                                            <td class="text-center">${item.id}</td>
                                            <td class="text-center">${item.tipo_tarea}</td>
                                            <td class="text-center">${item.descripcion}</td>
                                            <td class="text-center">${item.fecha}</td>
                                            <td class="text-center">
                                                <a  class="editTareas btn btn-light"  data-toggle="modal" data-target="#EditTask"><i class="fas fa-edit"></i>Editar</a>
                                                <button class="tarea-delete btn btn-danger">
                                                <i class="fas fa-trash"></i>Borrar
                                                </button>
                                            </td>  
                                    </tr>
                                `
                        });
                    
                    $('#body_tareas').html(body);   
                })
        }
        // Documentos
        function Documentos(){
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/showDocumentos/$id");?>';
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                        listadomicilio.forEach(item => {
                            body += `  <tr docid = "${item.id}">
                                            <td class="text-center">${item.id}</td>
                                            <td class="text-center">${item.marcas_id}</td>
                                            <td class="text-center">${item.descripcion}</td>
                                            <td class="text-center">${item.comentario}</td>
                                            <td class="text-center">${item.path}</td>
                                            <td class="text-center">
                                                <a class="editdoc btn btn-light"  data-toggle="modal" data-target="#docModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                                <button class="documentos-delete btn btn-danger">
                                                <i class="fas fa-trash"></i>Borrar
                                                </button>
                                            </td>  
                                    </tr>
                                `
                        });
                    $('#body_documentos').html(body);   
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
            //         console.log(response);
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
            //                                 <a class="editeventos btn btn-light"  data-toggle="modal" data-target="#eventoModalEdit"><i class="fas fa-edit"></i>Editar</a>
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
         //Modal Edit Cesion 
        $(document).on('click','.EditCesion',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('cesionid');
            console.log(id);
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
         //Modal Edit Documento
         $(document).on('click','.editdoc',function(){
            let element = $(this)[0].parentElement.parentElement;
            console.log(element);
            let id = $(element).attr('docid');
            console.log(id);
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/EditDoc/");?>';
            url = url + id;
            console.log(url);
            $.post(url,{id},function(response){
            //console.log(response);
            let doc =JSON.parse(response);
            console.log("id ",doc[0]['id']);
            $('#Documento_id').val(doc[0]['id']);
            $('#editdoc_descripcion').val(doc[0]['descripcion']);
            $('#editcomentario_archivo').val(doc[0]['comentario']);
            $('#editdoc_archivo').val(doc[0]['path']);
            })
        })
        //Modal Edit Tareas 
        $(document).on('click','.editTareas',function(){
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
            console.log(element);
            let id = $(element).attr('eventosid');
            console.log(id);
            let url = '<?php echo admin_url("pi/EventosController/EditEventos/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            console.log(response);
            let eventos =JSON.parse(response);
            console.log("Tipo Evento ",eventos[0]['tipo_evento_id']);
            $('#edittipo_evento').val(eventos[0]['tipo_evento_id']);
            $('#editevento_comentario').val(eventos[0]['comentarios']);
            $('#Eventoid').val(eventos[0]['id']);
            })
        })

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

        //----------------------------------- Modad Para Añadir, Editar y Eliminar -----------------------------------------------
            //Alerta Error para cambio de domicilio Actual
            $(document).on('click','#Alertacambio_domicilioactual',function(e){
                e.preventDefault();
                alert_float('danger', "Primero guarde antes de entrar aqui");
            });
            //Alerta Error para cambio de domicilio Anterior
            $(document).on('click','#Alertacambio_domicilioanterior',function(e){
                e.preventDefault();
                alert_float('danger', "Primero guarde antes de entrar aqui");
            });

            
             //--------Cambiar de Editar Fusion a Crear o Editar Fusion Actual y Anterior ---------------
            // Cambiar de Modal de Editar Fusion por Editar Fusion Actual 
            $(document).on('click','#EditbtnFusionActual',function(e){
                e.preventDefault();
                console.log("Fusion Actual");
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('FusionActualid');
                $('#FusionActual_id').val(id);
                $("#EditFusion").modal('hide');
                $("#EditFusionActualModal").modal('show');

            });
            // Cambiar de Modal de Editar Fusion por Editar Fusion Anterior 
            $(document).on('click','#EditbtnFusionAnterior',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomAnteriorid');
                $('#FusionAnterior_id').val(id);
                $("#EditFusion").modal('hide');
                $("#EditarFusionAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Editar Fusion por Añadir Fusion Actual 
            $(document).on('click','#btnFusionActual',function(e){
                console.log("Fusion Actial")
                e.preventDefault();
                $("#EditFusion").modal('hide');
                $("#FusionActualModal").modal('show');
            });
            // Cambiar de Modal de Editar Cambio Domiclio por Añadir Cambio Domicilio Anterior 
            $(document).on('click','#btnFusionAnterior',function(e){
                e.preventDefault();
                $("#EditFusion").modal('hide');
                $("#FusionAnteriorModal").modal('show');
            });
            //--------Cambiar de Editar Domicilio a Crear o Editar Cambio de Domicilio Actual y Anterior ---------------
            // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Actual 
            $(document).on('click','#EditbtnCambioDomicilioActual',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomActualid');
                $('#CamDomActual_id').val(id);
                $("#EditCambioDomicilio").modal('hide');
                $("#EditCambioDomicilioActualModal").modal('show');

            });
            // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Anterior 
            $(document).on('click','#EditbtnCambioDomicilioAnterior',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomAnteriorid');
                $('#CamDomAnterior_id').val(id);
                $("#EditCambioDomicilio").modal('hide');
                $("#EditarCambioDomicilioAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Editar Cambio Domiclio por Añadir Cambio Domicilio Actual 
            $(document).on('click','#btnCambioDomicilioActual',function(e){
                e.preventDefault();
                $("#EditCambioDomicilio").modal('hide');
                $("#CambioDomicilioActualModal").modal('show');
            });
            // Cambiar de Modal de Editar Cambio Domiclio por Añadir Cambio Domicilio Anterior 
            $(document).on('click','#btnCambioDomicilioAnterior',function(e){
                e.preventDefault();
                $("#EditCambioDomicilio").modal('hide');
                $("#CambioDomicilioAnteriorModal").modal('show');
            });
              //--------Cambiar de Editar Nombre a Crear o Editar Cambio de Nombre Actual y Anterior ---------------
            // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Actual 
            $(document).on('click','#EditbtnCambioNombreActual',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamNomActualid');
                $('#CamNomActual_id').val(id);
                $("#EditCambioNombre").modal('hide');
                $("#EditCambioNombreActualModal").modal('show');

            });
            // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Anterior 
            $(document).on('click','#EditbtnCambioNombreAnterior',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamNomAnteriorid');
                $('#CamNomAnterior_id').val(id);
                $("#EditCambioNombre").modal('hide');
                $("#EditarCambioNombreAnteriorModal").modal('show');
            });

             // Cambiar de Modal de Editar Cambio Nombre por Añadir Cambio Nombre Actual 
             $(document).on('click','#btnCambioNombreActual',function(e){
                e.preventDefault();
                $("#EditCambioNombre").modal('hide');
                $("#CambioNombreActualModal").modal('show');
            });
            // Cambiar de Modal de Editar Cambio Nombre por Añadir Cambio Nombre Anterior 
            $(document).on('click','#btnCambioNombreAnterior',function(e){
                e.preventDefault();
                $("#EditCambioNombre").modal('hide');
                $("#CambioNombreAnteriorModal").modal('show');
            });
           //  -----------------------------------------------------------------------------------------------------
            //Añadir Fusion Anterior  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirFusionAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#fusionid').val();
            var propietarios =  $('#propietariosfusionanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambionombre',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoFusionController/addFusionAnterior");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#FusionAnteriorModal").modal('hide');
                 $("#EditFusion").modal('show');
                 FusionAnterior(id_cambio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
          //Editar Fusion Anterior  ---------------------------------------------------------------------------
          $(document).on('click','#EditarFusionAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamNomAnterior_id').val();
            console.log("id de Domiclio anterior", id );
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#Editarpropietarioscamnomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditarCambioNombreAnteriorModal").modal('hide');
                $("#EditCambioNombre").modal('show');
                CambioNombreAnterior(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
        //Añadir Fusion Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirFusionActualfrmsubmit',function(e){
            e.preventDefault();
            console.log("Añadir Fusion Actual");
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#fusionid').val();
            var propietarios =  $('#propietariosfusionactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambio',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoFusionController/addFusionActual");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#FusionActualModal").modal('hide');
                 $("#EditFusion").modal('show');
                 FusionActual(id_cambio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
         //Editar Fusion Actual  ---------------------------------------------------------------------------
         $(document).on('click','#EditarFusionActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamNomActual_id').val();
            console.log("id =",id );
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#Editpropietarioscamnomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditCambioNombreActualModal").modal('hide');
                $("#EditCambioNombre").modal('show');
                CambioNombreActual(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
              //Añadir Cambio de Nombre Anterior  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirCamNomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#propietarioscamnomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambionombre',id_cambionombre);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambionombre',id_cambionombre);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/addCambioNombreAnterior");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#CambioNombreAnteriorModal").modal('hide');
                 $("#EditCambioNombre").modal('show');
                 CambioNombreAnterior(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
          //Editar Cambio de Nombre Anterior  ---------------------------------------------------------------------------
          $(document).on('click','#EditarCamNomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamNomAnterior_id').val();
            console.log("id de Domiclio anterior", id );
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#Editarpropietarioscamnomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditarCambioNombreAnteriorModal").modal('hide');
                $("#EditCambioNombre").modal('show');
                CambioNombreAnterior(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
        //Añadir Cambio de Nombre Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirCamNomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#propietarioscamnomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambionombre',id_cambionombre);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambionombre',id_cambionombre);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/addCambioNombreActual");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#CambioNombreActualModal").modal('hide');
                 $("#EditCambioNombre").modal('show');
                 CambioNombreActual(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
         //Editar Cambio de Nombre Actual  ---------------------------------------------------------------------------
         $(document).on('click','#EditarCamNomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamNomActual_id').val();
            console.log("id =",id );
            var id_cambionombre = $('#camnomid').val();
            var propietarios =  $('#Editpropietarioscamnomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditCambioNombreActualModal").modal('hide');
                $("#EditCambioNombre").modal('show');
                CambioNombreActual(id_cambionombre);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

             //Añadir Cambio de Domiclio Anterior  ---------------------------------------------------------------------------
             $(document).on('click','#AñadirCamDomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambiodomiclio = $('#camdomid').val();
            var propietarios =  $('#propietarioscamdomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambiodomiclio',id_cambiodomiclio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/addCambioDomicilioAnterior");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#CambioDomicilioAnteriorModal").modal('hide');
                 $("#EditCambioDomicilio").modal('show');
                 CambioDomicilioAnterior(id_cambiodomiclio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

         //Editar Cambio de Domiclio Anterior  ---------------------------------------------------------------------------
         $(document).on('click','#EditarCamDomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamDomAnterior_id').val();
            console.log("id de Domiclio anterior", id );
            var id_cambiodomiclio = $('#camdomid').val();
            var propietarios =  $('#Editarpropietarioscamdomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/UpdateTipoCambioDomicilio/");?>';
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditarCambioDomicilioAnteriorModal").modal('hide');
                $("#EditCambioDomicilio").modal('show');
                CambioDomicilioAnterior(id_cambiodomiclio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
            //Añadir Cambio de Domiclio Actual  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirCamDomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambiodomiclio = $('#camdomid').val();
            var propietarios =  $('#propietarioscamdomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambiodomiclio',id_cambiodomiclio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/addCambioDomicilioActual/");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#CambioDomicilioActualModal").modal('hide');
                 $("#EditCambioDomicilio").modal('show');
                 CambioDomicilioActual(id_cambiodomiclio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
         //Editar Cambio de Domiclio Actual  ---------------------------------------------------------------------------
        $(document).on('click','#EditarCamDomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CamDomActual_id').val();
            var id_cambiodomiclio = $('#camdomid').val();
            var propietarios =  $('#Editpropietarioscamdomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/UpdateTipoCambioDomicilio/");?>';
            url = url+id;
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#EditCambioDomicilioActualModal").modal('hide');
                $("#EditCambioDomicilio").modal('show');
                CambioDomicilioActual(id_cambiodomiclio);
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
            //Añadir Cesion ---------------------------------------------------------------------------
            $(document).on('click','#AddCesionfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
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
            formData.append('id_marcas',id_marcas);
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
            const id_marcas = '<?php echo $id?>';
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
            formData.append('id_marcas',id_marcas);
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
            const id_marcas = '<?php echo $id?>';
            var oficina = $('#oficinaFusion').val();
            var estado =  $('#estadoFusion').val();
            var nro_solicitud =  $('#nro_solicitudFusion').val();
            var fecha_solicitud = $('#fecha_solicitudFusion').val();
            var nro_resolucion =  $('#nro_resolucionFusion').val();
            var fecha_resolucion = $('#fecha_resolucionFusion').val();
            var referenciacliente =  $('#referenciaclienteFusion').val();
            var comentario =  $('#comentarioFusion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
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
            const id_marcas = '<?php echo $id?>';
            var oficina = $('#oficinaCamNom').val();
            var estado =  $('#estadoCamNom').val();
            var nro_solicitud =  $('#nro_solicitudCamNom').val();
            var fecha_solicitud = $('#fecha_solicitudCamNom').val();
            var nro_resolucion =  $('#nro_resolucionCamNom').val();
            var fecha_resolucion = $('#fecha_resolucionCamNom').val();
            var referenciacliente =  $('#referenciaclienteCamNom').val();
            var comentario =  $('#comentarioCamNom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
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
            const id_marcas = '<?php echo $id?>';
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
            formData.append('id_marcas',id_marcas);
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
        //Añadir Documento ---------------------------------------------------------------------------
        $(document).on('click','#documentofrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var description =  $('#doc_descripcion').val();
            var comentario_archivo = $('#comentario_archivo').val();
            var doc_archivo = $('#doc_archivo')[0].files[0];
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('id_marcas',id_marcas);
            formData.append('doc_descripcion' , description);
            formData.append('comentario_archivo', comentario_archivo);
            formData.append('doc_archivo', doc_archivo);
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/addSolicitudDocumento");?>';
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#docModal").modal('hide');
                Documentos();
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
            formData.append('csrf_token_name', csrf_token_name);
            formData.append('id',id);
            formData.append('doc_descripcion' , description);
            formData.append('comentario_archivo', comentario_archivo);
            formData.append('doc_archivo', doc_archivo);
            console.log("id ",id);
            console.log("descripcion ",description);
            console.log("Comentario archivo ",comentario_archivo);
            console.log("Documento Archivo ",doc_archivo );
            console.log("csrf_token_name", csrf_token_name); 
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/UpdateDocumento/");?>'
            url = url+id;
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){ 
                alert_float('success', "Actualizado Correctamente");
                $("#docModalEdit").modal('hide');
                Documentos();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Añadir Evento ---------------------------------------------------------------------------
        $(document).on('click','#eventosfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var tipo_evento =  $('#tipo_evento').val();
            var evento_comentario = $('#evento_comentario').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
            formData.append('tipo_evento' , tipo_evento);
            formData.append('evento_comentario', evento_comentario);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/EventosController/addEvento");?>';
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Insertado Correctamente");
                $("#eventoModal").modal('hide');
                Eventos();
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
            formData.append('id', id); 
            formData.append('tipo_evento' , tipo_evento);
            formData.append('comentarios', comentarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/EventosController/UpdateEventos/");?>';
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
                Eventos();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });

        //Añadir Tareas ---------------------------------------------------------------------------
        $(document).on('click','#tareasfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var tipo_tarea =  $('#tipo_tarea').val();
            var descripcion = $('#descripcion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas' , id_marcas);
            formData.append('tipo_tarea' , tipo_tarea);
            formData.append('descripcion', descripcion);
            formData.append('csrf_token_name', csrf_token_name);
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
                Tareas();
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
                Tareas();
            }).catch(function(response){
                alert("No puede agregar un Documento sin registro de la solicitud");
            });
        });
        // ------Eliminar  
        //Eliminar Nombre Anterior
        $(document).on('click','.Cambio-Nombre-Anterior-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamNomAnteriorid');
                let id_cambio = $('#camnomid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoCambioNombreController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    CambioNombreActual(id_cambio);
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
            }
        });
        //Eliminar Nombre Actual
        $(document).on('click','.Cambio-Nombre-Actual-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamNomActualid');
                let id_cambio = $('#camnomid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoCambioNombreController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    CambioNombreActual(id_cambio);
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
            }
        });
        //Eliminar Domicilio Anterior
        $(document).on('click','.CambioDomicilioAnteriordelete',function(){
            //$("#EditCambioDomicilio").modal('hide');
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomAnteriorid');
                let id_cambiodomiclio = $('#camdomid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                //$("#EditCambioDomicilio").modal('show');
                CambioDomicilioActual(id_cambiodomiclio);
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
            }
        });
        //Eliminar Domicilio Actual
        $(document).on('click','.Cambio-Domicilio-Actual-delete',function(){
            //$("#EditCambioDomicilio").modal('hide');
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomActualid');
                let id_cambiodomiclio = $('#camdomid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                //$("#EditCambioDomicilio").modal('show');
                CambioDomicilioActual(id_cambiodomiclio);
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
            }
        });
        //Eliminar Cesion
        $(document).on('click','.cesion-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('Cesionid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/CesionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                Cesion();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
            }
        });
         //Eliminar Licencia
         $(document).on('click','.licencia-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('Licenciaid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/LicenciaController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                Licencia();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
         //Eliminar Fusion
         $(document).on('click','.fusion-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('Fusionid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/FusionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                Fusion();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
        //Eliminar Cambio Nombre
        $(document).on('click','.Cambio-Nombre-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamNomid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/CambioNombreController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                CambioNombre();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
          //Eliminar Eventos
          $(document).on('click','.evento-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('eventosid');
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/EventosController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    Eventos();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
         //Eliminar Tareas
         $(document).on('click','.tarea-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('taskId');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TareasController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    Tareas();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
         //Eliminar Documentos
         $(document).on('click','.documentos-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('docid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    Documentos();
                }).catch(function(response){
                    alert("No puede agregar un Documento sin registro de la solicitud");
                });
           }
        });
        //-----------------------------------------------
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
    <script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        })
        $("select[multiple=multiple]").selectpicker({
            liveSearch:true,
            virtualScroll: 600
        });
    </script>
    <script>
        $("#solicitudfrm").on('submit', function(e)
        {
            e.preventDefault();
            formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
            formData.append('id' , $("input[name=id]").val());
            formData.append('tipo_registro_id', $("select[name=tipo_registro_id]").val());
            formData.append('client_id', $("select[name=client_id]").val());
            formData.append('oficina_id', $("select[name=oficina_id]").val());
            formData.append('staff_id', $("select[name=staff_id]").val());
            //Pais_id fill
            pais_id = JSON.stringify($("select[name=pais_id]").val());
            formData.append('pais_id', pais_id);
            //Clase_niza_id fill
            clase_niza = JSON.stringify($("select[name=clase_niza_id]").val());
            formData.append('clase_niza', clase_niza);
            //solicitantes fill
            solicitantes = JSON.stringify($("select[name=solicitantes_id]").val());
            formData.append('solicitantes_id', solicitantes);
            formData.append('tipo_solicitud_id', $("select[name=tipo_solicitud_id]").val());
            formData.append('ref_interna', $("input[name=ref_interna]").val());
            formData.append('ref_cliente', $('input[name=ref_cliente]').val());
            formData.append('primer_uso', $('input[name=primer_uso').val());
            formData.append('prueba_uso', $('input[name=prueba_uso]').val());
            formData.append('carpeta', $("input[name=carpeta]").val());
            formData.append('libro', $("input[name=libro]").val());
            formData.append('tomo', $("input[name=tomo]").val());
            formData.append('folio', $("input[name=folio]").val());
            formData.append('comentarios', $("textarea[name=comentarios]").val());
            formData.append('estado_id', $("select[name=estado_id]").val());
            formData.append('solicitud', $("input[name=num_solicitud]").val());
            formData.append('fecha_solicitud', $("input[name=fecha_solicitud]").val());
            formData.append('registro', $("input[name=num_registro]").val());
            formData.append('fecha_registro', $("input[name=fecha_registro]").val());
            formData.append('certificado', $("input[name=num_certificado]").val());
            formData.append('fecha_certificado', $("input[name=fecha_certificado]").val());
            formData.append('fecha_vencimiento', $("input[name=fecha_vencimiento]").val());
            formData.append('signo_archivo', $('input[name=signo_archivo]')[0].files[0]);
            formData.append('signonom', $("input[name=signonom]").val());
            formData.append('descripcion_signo', $("textarea[name=descripcion_signo]").val());
            formData.append('comentario_signo', $("input[name=comentario_signo]").val());
            formData.append('tipo_signo_id', $('select[name=tipo_signo_id]').val());
            $.ajax({
                url:'<?php echo admin_url("pi/MarcasSolicitudesController/update/{$id}");?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(response)
                {
                    data = JSON.parse(response);
                    <?php if(ENVIRONMENT == 'production') { ?>
                        location.reload();
                    <?php } else { ?>
                        alert_float('success', data.message);
                    <?php } ?>
                },
                fail: function(request)
                {
                        <?php if(ENVIRONMENT != 'production') { ?>
                            alert(response);
                            <?php } else { ?>
                                alert('ha ocurrido un error');
                        <?php } ?>
                }
            });
        });


        $("#prioridadfrmsubmit").on('click', function(e){
            e.preventDefault();
            data = {
                'pais_prioridad' : $("select[name=pais_prioridad").val(),
                'fecha_prioridad': $("input[name=fecha_prioridad]").val(),
                'nro_prioridad'  : $("input[name=nro_prioridad").val(),
                'solicitud_id'   : $("input[name=id").val(),
            }
            $.ajax({
                url: '<?php echo admin_url("pi/MarcasPrioridadController/addPrioridad");?>',
                method: 'POST',
                data : data,
            }).then(function(response){
                $.ajax({
                    url: "<?php echo admin_url('pi/MarcasPrioridadController/getAllPrioridades/'.$id);?>",
                    method: "GET",
                    success: function(response)
                    {
                        table = JSON.parse(response);
                        $("#prioridadTbl").DataTable({
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                            },
                            data: table,
                            destroy: true,
                            dataSrc: '',
                            columns : [
                                { data: 'fecha_prioridad'},
                                { data: 'nombre'},
                                { data: 'numero'},
                                { data: 'acciones'},
                            ],
                            width: "100%"
                        });
                    }
                });
                $("#prioridadfrmsubmit")[0].reset();
                $("#prioridadModal").modal('hide');
            });
        });

        $(".deletePrioridad").on('click', function(e){
            e.preventDefault();
            id = $(this).attr('id');
            $.ajax(
            {
                url: "<?php echo admin_url("pi/MarcasPrioridadController/destroy/{$id}");?>",
                method: 'POST',
                success: function(response)
                {
                    $.ajax({
                        url: "<?php echo admin_url('pi/MarcasPrioridadController/getAllPrioridades/'.$id);?>",
                        method: "GET",
                        success: function(response)
                        {
                            table = JSON.parse(response);
                            $("#prioridadTbl").DataTable({
                                language: {
                                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                                },
                                data: table,
                                destroy: true,
                                dataSrc: '',
                                columns : [
                                    { data: 'fecha_prioridad'},
                                    { data: 'nombre'},
                                    { data: 'numero'},
                                    { data: 'acciones'},
                                ],
                                width: "100%"
                            });
                        }
                    })        
                }
            })
        })

        $(document).ready(function(){
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasPrioridadController/getAllPrioridades/'.$id);?>",
                method: "GET",
                success: function(response)
                {
                    table = JSON.parse(response);
                    $("#prioridadTbl").DataTable({
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                        },
                        data: table,
                        destroy: true,
                        dataSrc: '',
                        columns : [
                            { data: 'fecha_prioridad'},
                            { data: 'nombre'},
                            { data: 'numero'},
                            { data: 'acciones'},
                        ],
                        width: "100%"
                    });
                }
            })
        });

        








        // ------------step-wizard-------------
        $(document).ready(function () {
            getAllPublicaciones();
            $('.nav-tabs > li a[title]').tooltip();
            
            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);
            
                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

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

        
        
        

       

    </script>

    <script>
        $(document).on('click',"#publicacionfrmsubmit" , function(e)
        {
            e.preventDefault();
            var data = {
                'csrf_token_name'    : $("input[name=csrf_token_name]").val(),
                'tipo_publicacion'   : $("select[name=tipo_publicacion]").val(),
                'boletin_publicacion': $("select[name=boletin_publicacion]").val(),
                'tomo_publicacion'   : $("input[name=tomo_publicacion]").val(),
                'pag_publicacion'    : $("input[name=pag_publicacion]").val(),
            }
            $.ajax({
                url: "<?php echo admin_url('pi/PublicacionesMarcasController/addPublicacionMarcas/'.$id);?>",
                method: 'POST',
                data: data,
                success: function(response)
                {
                    alert_float('success', 'Publicacion cargada exitosamente');
                    getAllPublicaciones();
                    $("#publicacionModal").modal('hide');
                }
            });
        });

        function getAllPublicaciones()
        {
            $.ajax({
                url:"<?php echo admin_url('pi/PublicacionesMarcasController/getAllPublicacionesByMarca/'.$id);?>",
                method: "POST",
                success: function(response)
                {
                    table = JSON.parse(response);
                    console.log(table.data);
                    $("#publicacionTbl").DataTable({
                        language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                            },
                            destroy: true,
                            data: table.data,
                            columns : [
                                { data: 'fecha'},
                                { data: 'nombre'},
                                { data: 'boletin_id'},
                                { data: 'tomo'},
                                { data: 'pagina'},
                                { data: 'acciones'}
                            ]
                    });
                }
            });
        }
    </script>
    

    <script>
        $(document).on('click', '.editPublicacion', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo admin_url('pi/PublicacionesMarcasController/show/');?>"+id,
                method: "POST",
                success:function(response)
                {
                    data = JSON.parse(response);
                    $("input[name=pub_id_edit]").val(data.id);
                    $("select[name=tipo_publicacion_edit]").val(data.tipo_pub_id);
                    $("select[name=boletin_publicacion_edit]").val(data.boletin_id);
                    $("input[name=tomo_publicacion_edit]").val(data.tomo);
                    $("input[name=pag_publicacion_edit]").val(data.pagina);
                }
            });
            $("#publicacionEditModal").modal('show');
        });

        $(document).on('click', '#publicacionfrmsubmitEdit', function(e)
        {
            e.preventDefault();
            var data = {
                'csrf_token_name'   : $("input[name=csrf_token_name]").val(),
                'tipo_pub_id'       : $("select[name=tipo_publicacion_edit]").val(),
                'boletin_id'        : $("select[name=boletin_publicacion_edit]").val(),
                'tomo'              : $("input[name=tomo_publicacion_edit]").val(),
                'pagina'            : $("input[name=pag_publicacion_edit]").val(),
                'marcas_id'         : $("input[name=id]").val(),
                'id'                : $("input[name=pub_id_edit]").val()
            }
            $.ajax({
                url: "<?php echo admin_url('pi/PublicacionesMarcasController/updatePublicacionByMarca/');?>",
                method: 'POST',
                data: data,
                success: function(response)
                {
                    alert_float('success', 'Publicacion editada exitosamente');
                    getAllPublicaciones();
                    $("#publicacionEditModal").modal('hide');
                }
            });
        });

        $(document).on('click', '.deletePublicacion', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            if(confirm("¿Esta seguro de eliminar este registro?"))
            {
                $.ajax({
                    url: "<?php echo admin_url('pi/PublicacionesMarcasController/deletePublicacionByMarca/');?>"+id,
                    method: "POST",
                    success: function(response)
                    {
                        getAllPublicaciones();
                    }
                });
            }            
        });
    </script>