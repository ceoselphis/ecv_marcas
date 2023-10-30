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

        //Cesion Actual
        function CesionActual(id_cambio){
            let url = '<?php echo admin_url("pi/TipoCesionController/showCesionActual/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr CesionActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cesion}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class=" btn btn-light" id ="EditbtnCesionActual" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cesion-Actual-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Cesion_actual').html(body);   
                        $('#body_add_Cesion_actual').html(body);   
                })
        }

        // Cesion Anterior
        function CesionAnterior(id_cambio){
            let url = '<?php echo admin_url("pi/TipoCesionController/showCesionAnterior/");?>';
            url = url+id_cambio;
            console.log(url);
            let body= ``;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                    console.log(listadomicilio);
                    listadomicilio.forEach(item => {
                        body += `<tr CesionAnteriorid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.cesion}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" style= "background-color: white;" 
                                            id ="EditbtnCesionAnterior" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Cesion-Anterior-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Cesion_anterior').html(body);  
                        $('#body_add_Cesion_anterior').html(body);    
                })
        }
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
                        body += `<tr LicenciaActualid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.licencia}</td>
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
                        $('#body_add_Licencia_anterior').html(body);     
                        
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
                    listadomicilio.forEach(item => {
                        body += `<tr LicenciaAnteriorid = "${item.id}"> 
                                    <td class="text-center">${item.id}</td>
                                    <td class="text-center">${item.licencia}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.propietario}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" style= "background-color: white;" 
                                            id ="EditbtnLicenciaAnterior" ><i class="fas fa-edit"></i>Editar</a>
                                            <button class="Licencia-Anterior-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
                        });
                        $('#body_Licencia_anterior').html(body);   
                        $('#body_add_Licencia_actual').html(body);    
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
                        $('#body_add_Fusion_actual').html(body);   
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
                        $('#body_add_Fusion_anterior').html(body);    
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
                        $('#body_add_cambio_domicilio_actual').html(body);     
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
                        $('#body_add_cambio_domicilio_anterior').html(body);     
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
                        $('#body_add_cambio_nombre_actual').html(body);    
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
                        $('#body_add_cambio_nombre_anterior').html(body);  
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
            console.log("Pruebas");
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
            let archivo = `<?php echo site_url('uploads/marcas/documentos/');?>`;
                $.get(url, function(response){
                    let listadomicilio = JSON.parse(response);
                        listadomicilio.forEach(item => {
                            let 
                            archivofinal= archivo + item.path;
                            body += `  <tr docid = "${item.id}">
                                            <td class="text-center">${item.id}</td>
                                            <td class="text-center">${item.marcas_id}</td>
                                            <td class="text-center">${item.descripcion}</td>
                                            <td class="text-center">${item.comentario}</td>
                                            <td class="text-center">
                                            <a href="${archivofinal}" target="_blank"> 
                                            ${item.path}
                                            </a> 
                                            </td>
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

         //----------------------------------- Funciones que trae la Informacion de la Base de Datos -----------------------------------------------
         function MostrarCesion(id){
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
            CesionActual(id);
            CesionAnterior(id);
         }

         //Modal Edit Cesion 
        $(document).on('click','.EditCesion',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('cesionid');
            MostrarCesion(id);
            
        })

         function MostrarLicencia(id){
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
        }

           //Modal Edit Licencia
           $(document).on('click','.EditLicencia',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('licenciaid');
            MostrarLicencia(id);
        })

        function MostrarFusion(id){
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
        }
            //Modal Edit Fusion
        $(document).on('click','.editFusion',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('fusionid');
            MostrarFusion(id);
        })

        function MostrarCambioNombre(id){
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
            });
            $("#EditCambioNombre").modal('show'); 
                CambioNombreActual(id);
                CambioNombreAnterior(id);
        }

        //Modal Edit Cambio Nombre
        $(document).on('click','.editCamNom',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('CamNomid');
            MostrarCambioNombre(id);
        })

        function MostrarCambioDomicilio(id) {
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
        }

        //Modal Edit Cambio de Domicilio
        $(document).on('click','.editCamDom',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('CamDomid');
            MostrarCambioDomicilio(id);
        });

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
                console.log(response);
                let doc =JSON.parse(response);
                console.log("id ",doc[0]['id']);
                $('#Documento_id').val(doc[0]['id']);
                $('#editdoc_descripcion').val(doc[0]['descripcion']);
                $('#editcomentario_archivo').val(doc[0]['comentarios']);
                //$('#editdoc_archivo').val(doc[0]['path']);
            })
        });

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

             //--------Cambiar de Editar Cesion a Crear o Editar Cesion Actual y Anterior ---------------
            // Cambiar de Modal de Editar Cesion por Editar Cesion Actual 
            $(document).on('click','#EditbtnCesionActual',function(e){
                e.preventDefault();
                console.log("Cesion Actual");
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CesionActualid');
                $('#CesionActual_id').val(id);
                $("#EditCesion").modal('hide');
                $("#EditCesionActualModal").modal('show');

            });
            // Cambiar de Modal de Editar Cesion por Editar Licencia Anterior 
            $(document).on('click','#EditbtnCesionAnterior',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CesionAnteriorid');
                $('#CesionAnterior_id').val(id);
                $("#EditCesion").modal('hide');
                $("#EditarCesionAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Editar Cesion por Añadir Cesion Actual 
            $(document).on('click','#btnCesionActual',function(e){
                console.log("Cesion Actual")
                e.preventDefault();
                $("#EditCesion").modal('hide');
                $("#CesionActualModal").modal('show');
            });
            // Cambiar de Modal de Editar Cesion por Añadir Cesion Anterior 
            $(document).on('click','#btnCesionAnterior',function(e){
                e.preventDefault();
                $("#EditCesion").modal('hide');
                $("#CesionAnteriorModal").modal('show');
            });

            // Cambiar de Modal de Añadir Cesion por Añadir Cesion Actual 
            $(document).on('click','#addbtnCesionActual',function(e){
                console.log("Cesion Actual")
                e.preventDefault();
                ActualizarCesion();
                $("#AddCesion").modal('hide');
                $("#CesionActualModal").modal('show');
            });
            // Cambiar de Modal de Añadir Cesion por Añadir Cesion Anterior 
            $(document).on('click','#addbtnCesionAnterior',function(e){
                e.preventDefault();
                ActualizarCesion();
                $("#AddCesion").modal('hide');
                $("#CesionAnteriorModal").modal('show');
            });
             //--------Cambiar de Editar Licencia a Crear o Editar Licencia Actual y Anterior ---------------
            // Cambiar de Modal de Editar Licencia por Editar Licencia Actual 
            $(document).on('click','#EditbtnLicenciaActual',function(e){
                e.preventDefault();
                console.log("Licencia Actual");
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('LicenciaActualid');
                $('#LicenciaActual_id').val(id);
                $("#EditLicencia").modal('hide');
                $("#EditLicenciaActualModal").modal('show');

            });
            // Cambiar de Modal de Editar Licencia por Licencia Licencia Anterior 
            $(document).on('click','#EditbtnLicenciaAnterior',function(e){
                e.preventDefault();
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('LicenciaAnteriorid');
                $('#LicenciaAnterior_id').val(id);
                $("#EditLicencia").modal('hide');
                $("#EditarLicenciaAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Editar Licencia por Añadir Licencia Actual 
            $(document).on('click','#btnLicenciaActual',function(e){
                console.log("Licencia Actual")
                e.preventDefault();
                $("#EditLicencia").modal('hide');
                $("#LicenciaActualModal").modal('show');
            });
            // Cambiar de Modal de Editar Licencia por Añadir Licencia Anterior 
            $(document).on('click','#btnLicenciaAnterior',function(e){
                e.preventDefault();
                $("#EditLicencia").modal('hide');
                $("#LicenciaAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Añadir Licencia por Añadir Licencia Actual 
            $(document).on('click','#addbtnLicenciaActual',function(e){
                console.log("Licencia Actual")
                e.preventDefault();
                ActualizarLicencia();
                $("#AddLicencia").modal('hide');
                $("#LicenciaActualModal").modal('show');
            });
            // Cambiar de Modal de Añadir Licencia por Añadir Licencia Anterior 
            $(document).on('click','#addbtnLicenciaAnterior',function(e){
                e.preventDefault();
                ActualizarLicencia();
                $("#AddLicencia").modal('hide');
                $("#LicenciaAnteriorModal").modal('show');

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
                let id = $(element).attr('FusionAnteriorid');
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
            // Cambiar de Modal de Editar Fusion por Añadir Fusion Anterior 
            $(document).on('click','#btnFusionAnterior',function(e){
                e.preventDefault();
                $("#EditFusion").modal('hide');
                $("#FusionAnteriorModal").modal('show');
            });
            // Cambiar de Modal de Añadir Fusion por Añadir Fusion Actual 
            $(document).on('click','#addbtnFusionActual',function(e){
                console.log("Fusion Actual")
                e.preventDefault();
                ActualizarFusion();
                $("#AddFusion").modal('hide');
                $("#FusionActualModal").modal('show');
            });
            // Cambiar de Modal de Añadir Fusion por Añadir Fusion Anterior 
            $(document).on('click','#addbtnFusionAnterior',function(e){
                e.preventDefault();
                ActualizarFusion();
                $("#AddFusion").modal('hide');
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
            // Cambiar de Modal de Añadir Cambio Domiclio por Añadir Cambio Domicilio Actual 
            $(document).on('click','#addbtnCambioDomicilioActual',function(e){
                e.preventDefault();
                ActualizarCambioDomicilio();
                $("#AddCambioDomicilio").modal('hide');
                $("#CambioDomicilioActualModal").modal('show');
            });
            // Cambiar de Modal de Añadir Cambio Domiclio por Añadir Cambio Domicilio Anterior 
            $(document).on('click','#addbtnCambioDomicilioAnterior',function(e){
                e.preventDefault();
                ActualizarCambioDomicilio();
                $("#AddCambioDomicilio").modal('hide');
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
             // Cambiar de Modal de Añadir Cambio Nombre por Añadir Cambio Nombre Actual 
             $(document).on('click','#addbtnCambioNombreActual',function(e){
                e.preventDefault();
                ActualizarCambioNombre();
                $("#AddCambioNombre").modal('hide');
                $("#CambioNombreActualModal").modal('show');
            });
            // Cambiar de Modal de Añadir Cambio Nombre por Añadir Cambio Nombre Anterior 
            $(document).on('click','#addbtnCambioNombreAnterior',function(e){
                e.preventDefault();
                ActualizarCambioNombre();
                $("#AddCambioNombre").modal('hide');
                $("#CambioNombreAnteriorModal").modal('show');
            });
           //  --------------------------------Añadir y Editar los siguientes Modulos---------------------------------------------
             //Añadir Cesion Anterior  ---------------------------------------------------------------------------
             $(document).on('click','#AñadirCesionAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#cesionid').val();
            var propietarios =  $('#propietarioscesionanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambio',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCesionController/addCesionAnterior");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#CesionAnteriorModal").modal('hide');
                 $("#EditCesion").modal('show');
                 MostrarCesion(id_cambio);
                 CesionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cesion Anterior");
            });
        });
          //Editar Cesion Anterior  ---------------------------------------------------------------------------
          $(document).on('click','#EditarCesionAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CesionAnterior_id').val();
            console.log("id de Cesion anterior", id );
            var id_cambio = $('#cesionid').val();
            var propietarios =  $('#Editarpropietarioscesionanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCesionController/UpdateTipoCesion/");?>';
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
                $("#EditarCesionAnteriorModal").modal('hide');
                $("#EditCesion").modal('show');
                CesionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Cesion Anterior");
            });
        });
        //Añadir Cesion Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirCesionActualfrmsubmit',function(e){
            e.preventDefault();
            console.log("Añadir Cesion Actual");
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#cesionid').val();
            var propietarios =  $('#propietarioscesionactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambio',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCesionController/addCesionActual");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Insertado Correctamente");
                $("#CesionActualModal").modal('hide');
                $("#EditCesion").modal('show');
                MostrarCesion(id_cambio);
                CesionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cesion Actual");
            });
        });
         //Editar Cesion Actual  ---------------------------------------------------------------------------
         $(document).on('click','#EditarCesionActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#CesionActual_id').val();
            console.log("id =",id );
            var id_cambio = $('#cesionid').val();
            var propietarios =  $('#Editpropietarioscesionactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoCesionController/UpdateTipoCesion/");?>';
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
                $("#EditCesionActualModal").modal('hide');
                $("#EditCesion").modal('show');
                CesionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Cesion Actual");
            });
        });
            //Añadir Licencia Anterior  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirLicenciaAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#licenciaid').val();
            var propietarios =  $('#propietarioslicenciaanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambio',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoLicenciaController/addLicenciaAnterior");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                 alert_float('success', "Insertado Correctamente");
                 $("#LicenciaAnteriorModal").modal('hide');
                 $("#EditLicencia").modal('show');
                 MostrarLicencia(id_cambio);
                 LicenciaAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Licencia Anterior");
            });
        });
          //Editar Licencia Anterior  ---------------------------------------------------------------------------
          $(document).on('click','#EditarLicenciaAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#LicenciaAnterior_id').val();
            console.log("id de Cesion anterior", id );
            var id_cambio = $('#licenciaid').val();
            var propietarios =  $('#Editarpropietarioslicenciaanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoLicenciaController/UpdateTipoLicencia/");?>';
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
                $("#EditarLicenciaAnteriorModal").modal('hide');
                $("#EditLicencia").modal('show');
                LicenciaAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Licencia Anterior");
            });
        });
        //Añadir Licencia Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirLicenciaActualfrmsubmit',function(e){
            e.preventDefault();
            console.log("Añadir Licencia Actual");
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#licenciaid').val();
            var propietarios =  $('#propietarioslicenciaactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambio Licencia Actual',id_cambio);
            console.log('propietarios',propietarios);
            console.log('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoLicenciaController/addLicenciaActual");?>'
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                console.log(response);
                alert_float('success', "Insertado Correctamente");
                $("#LicenciaActualModal").modal('hide');
                $("#EditLicencia").modal('show');
                MostrarLicencia(id_cambio);
                LicenciaActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Licencia Actual");
            });
        });
         //Editar Licencia Actual  ---------------------------------------------------------------------------
         $(document).on('click','#EditarLicenciaActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#LicenciaActual_id').val();
            console.log("id =",id );
            var id_cambio = $('#licenciaid').val();
            var propietarios =  $('#Editpropietarioslicenciaactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoLicenciaController/UpdateTipoLicencia/");?>';
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
                $("#EditLicenciaActualModal").modal('hide');
                $("#EditLicencia").modal('show');
                LicenciaActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Licencia Actual");
            });
        });
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
                MostrarFusion(id_cambio);
                FusionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Fusion Anterior");
            });
        });
          //Editar Fusion Anterior  ---------------------------------------------------------------------------
          $(document).on('click','#EditarFusionAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#FusionAnterior_id').val();
            console.log("id de fusion anterior", id );
            var id_cambio = $('#fusionid').val();
            var propietarios =  $('#Editarpropietariosfusionanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoFusionController/UpdateTipoFusion/");?>';
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
                $("#EditarFusionAnteriorModal").modal('hide');
                $("#EditFusion").modal('show');
                FusionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Fusion Anterior");
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
                MostrarFusion(id_cambio);
                FusionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Fusion Actual");
            });
        });
         //Editar Fusion Actual  ---------------------------------------------------------------------------
         $(document).on('click','#EditarFusionActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#FusionActual_id').val();
            console.log("id =",id );
            var id_cambio = $('#fusionid').val();
            var propietarios =  $('#Editpropietariosfusionactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoFusionController/UpdateTipoFusion/");?>';
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
                $("#EditFusionActualModal").modal('hide');
                $("#EditFusion").modal('show');
                FusionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Editar Fusion Actual");
            });
        });
            //Añadir Cambio de Nombre Anterior  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirCamNomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#camnomid').val();
            var propietarios =  $('#propietarioscamnomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambionombre',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambionombre',id_cambio);
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
                CambioNombreAnterior(id_cambio);
                MostrarCambioNombre(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cambio de Nombre Anterior");
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
                alert("No se pudo Editar Cambio de Nombre Anterior");
            });
        });
        //Añadir Cambio de Nombre Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirCamNomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#camnomid').val();
            var propietarios =  $('#propietarioscamnomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambionombre',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_cambionombre',id_cambio);
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
                CambioNombreActual(id_cambio);
                MostrarCambioNombre(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cambio de Nombre Actual");
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
                alert("No se pudo Editar Cambio de Nombre Actual");
            });
        });

             //Añadir Cambio de Domiclio Anterior  ---------------------------------------------------------------------------
             $(document).on('click','#AñadirCamDomAnteriorfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#camdomid').val();
            var propietarios =  $('#propietarioscamdomanterior').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambiodomiclio',id_cambio);
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
                 CambioDomicilioAnterior(id_cambio);
                 MostrarCambioDomicilio(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cambio de Domiclio Anterior");
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
                alert("No se pudo Añadir Cambio de Domiclio Anterior");
            });
        });
        //Añadir Cambio de Domiclio Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirCamDomActualfrmsubmit',function(e){
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            var id_cambio = $('#camdomid').val();
            var propietarios =  $('#propietarioscamdomactual').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_cambiodomicilio',id_cambio);
            formData.append('propietarios',propietarios);
            formData.append('csrf_token_name', csrf_token_name);
            let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/addCambioDomicilioActual");?>'
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
                CambioDomicilioActual(id_cambio);
                MostrarCambioDomicilio(id_cambio);
            }).catch(function(response){
                alert("No se pudo Añadir Cambio de Domiclio Anterior");
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
                alert("No se pudo Editar Cambio de Domiclio Actual ");
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
                alert("No se pudo Añadir Cesion");
            });
        });

         //Añadir Cesion Cuando Abre el Modal
         $(document).on('click','#AddCesionAbrirModal',function(e){
                e.preventDefault();
                var formData = new FormData();
                var data = getFormData(this);
                const id_marcas = '<?php echo $id?>';
                const csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('id_marcas',id_marcas);
                formData.append('csrf_token_name', csrf_token_name);
                console.log('id_marcas',id_marcas);
                console.log('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/CesionController/addCesionShowModal");?>';
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    console.log("response ",response);
                    $('#cesionid').val(response);
                    CesionActual(response);
                    CesionAnterior(response);

                }).catch(function(response){
                    alert("No se pudo Añadir Cesion");
                });
                

        });
        function LimpiarCesion(){
            var cliente =  $('#clienteCesion').val("");
            var oficina = $('#oficinaCesion').val("");
            var staff =  $('#staffCesion').val("");
            var estado =  $('#estadoCesion').val("");
            var nro_solicitud =  $('#nro_solicitudCesion').val("");
            var fecha_solicitud = $('#fecha_solicitudCesion').val("");
            var nro_resolucion =  $('#nro_resolucionCesion').val("");
            var fecha_resolucion = $('#fecha_resolucionCesion').val("");
            var referenciacliente =  $('#referenciaclienteCesion').val("");
            var comentario =  $('#comentarioCesion').val("");
        }
        function ActualizarCesion(){
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#cesionid').val();
            //const id_marcas = '<?php echo $id?>';
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
            //formData.append('id_marcas',id_marcas);
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
            let url = '<?php echo admin_url("pi/CesionController/UpdateCesion/");?>';
            url = url+id;
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
                alert("No se pudo Actualizar Cesion");
            });
        }
        //Editar Licencia Cuando Abre el Modal---------------------------------------------------------------------------
        $(document).on('click','#EditcesionAbrirModalfrmsubmit',function(e){
            e.preventDefault();
            ActualizarCesion();
            LimpiarCesion();
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
                alert("No se pudo Editar Cesion");
            });
        });
        //Añadir Licencia Cuando Abre el Modal
        $(document).on('click','#AddLicenciaAbrirModal',function(e){
                e.preventDefault();
                var formData = new FormData();
                var data = getFormData(this);
                const id_marcas = '<?php echo $id?>';
                const csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('id_marcas',id_marcas);
                formData.append('csrf_token_name', csrf_token_name);
                console.log('id_marcas',id_marcas);
                console.log('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/LicenciaController/addLicenciaShowModal");?>';
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    console.log("response ",response);
                    $('#licenciaid').val(response);
                    LicenciaActual(response);
                    LicenciaAnterior(response);

                }).catch(function(response){
                    alert("No se pudo Añadir Licencia");
                });
                

        });
        function LimpiarLicencia(){
            var cliente =  $('#clientelicencia').val("");
            var oficina = $('#oficinalicencia').val("");
            var staff =  $('#stafflicencia').val("");
            var estado =  $('#estadolicencia').val();
            var nro_solicitud =  $('#nro_solicitudlicencia').val("");
            var fecha_solicitud = $('#fecha_solicitudlicencia').val("");
            var nro_resolucion =  $('#nro_resolucionlicencia').val("");
            var fecha_resolucion = $('#fecha_resolucionlicencia').val("");
            var referenciacliente =  $('#referenciaclientelicencia').val("");
            var comentario =  $('#comentariolicencia').val("");
        }
        function ActualizarLicencia(){
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#licenciaid').val();
            //const id_marcas = '<?php //echo $id?>';
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
            //formData.append('id_marcas',id_marcas);
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
                $("#AddLicencia").modal('hide');
                Licencia();
            }).catch(function(response){
                alert("No se pudo ActualizarLicencia");
            });
        }

          //Editar Licencia Cuando Abre el Modal---------------------------------------------------------------------------
          $(document).on('click','#EditlicenciaAbrirModalfrmsubmit',function(e){
            e.preventDefault();
            ActualizarLicencia();
            LimpiarLicencia();
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
                alert("No se pudo Añadir Licencia");
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
                alert("No se pudo Editar Licencia");
            });
        });

        //Añadir Fusion Cuando Abre el Modal
        $(document).on('click','#AddFusionAbrirModal',function(e){
                e.preventDefault();
                var formData = new FormData();
                var data = getFormData(this);
                const id_marcas = '<?php echo $id?>';
                const csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('id_marcas',id_marcas);
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/FusionController/addFusionShowModal");?>';
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    $('#fusionid').val(response);
                    FusionActual(response);
                    FusionAnterior(response);

                }).catch(function(response){
                    alert("No se pudo Añadir Fusion");
                });
                

        });

        function LimpiarFusion(){
            $('#oficinaFusion').val("");
            $('#estadoFusion').val("");
            $('#nro_solicitudFusion').val("");
            $('#fecha_solicitudFusion').val("");
            $('#nro_resolucionFusion').val("");
            $('#fecha_resolucionFusion').val("");
            $('#referenciaclienteFusion').val("");
            $('#comentarioFusion').val("");
        }

        function ActualizarFusion(){
            var formData = new FormData();
            var data = getFormData(this);
            //const id_marcas = '<?php //echo $id?>';
            var id = $('#fusionid').val();
            var oficina = $('#oficinaFusion').val();
            var estado =  $('#estadoFusion').val();
            var nro_solicitud =  $('#nro_solicitudFusion').val();
            var fecha_solicitud = $('#fecha_solicitudFusion').val();
            var nro_resolucion =  $('#nro_resolucionFusion').val();
            var fecha_resolucion = $('#fecha_resolucionFusion').val();
            var referenciacliente =  $('#referenciaclienteFusion').val();
            var comentario =  $('#comentarioFusion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            //formData.append('id_marcas',id_marcas);
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
            console.log(url);
            $.ajax({
                url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                alert_float('success', "Actualizado Correctamente");
                $("#AddFusion").modal('hide');
                Fusion();
            }).catch(function(response){
                alert("No se pudo Actualizar Fusion");
            });
        }

          //Editar Fusion Cuando Abre el Modal---------------------------------------------------------------------------
          $(document).on('click','#EditfusionAbrirModalfrmsubmit',function(e){
            e.preventDefault();
            ActualizarFusion();
            LimpiarFusion();
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
                alert("No se pudo Añadir Fusion");
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
                alert("No se pudo Editar Fusion");
            });
            
        });
        
        //Añadir Cambio de Nombre Cuando Abre el Modal
        $(document).on('click','#AddCambioNombreAbrirModal',function(e){
            e.preventDefault();
            console.log("LLegue a Cambio de Nombre modal")
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            const csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_marcas',id_marcas);
                console.log('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/CambioNombreController/addCambioNombreShowModal");?>';
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    console.log("response ",response);
                    $('#camnomid').val(response);
                    CambioNombreActual(response);
                    CambioNombreAnterior(response);

                }).catch(function(response){
                    alert("No se pudo Añadir Cambio de Nombre");
                });
                
                
        });

        function ActualizarCambioNombre() {
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camnomid').val();
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
                $("#AddCambioNombre").modal('hide');
                CambioNombre();
            }).catch(function(response){
                alert("No se pudo Editar Cambio de Nombre");
            });
        }

        function LimpiarCambioNombre(){
            $('#oficinaCamNom').val("");
            $('#estadoCamNom').val("");
            $('#nro_solicitudCamNom').val("");
            $('#fecha_solicitudCamNom').val("");
            $('#nro_resolucionCamNom').val("");
            $('#fecha_resolucionCamNom').val("");
            $('#referenciaclienteCamNom').val("");
            $('#comentarioCamNom').val("");
        }
        
        //Editar Cambio Nombre Cuando Abre el Modal---------------------------------------------------------------------------
        $(document).on('click','#EditCambioNombreAbrirModalfrmsubmit',function(e){
            e.preventDefault();
            ActualizarCambioNombre();
            LimpiarCambioNombre();
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
                alert("No se pudo Añadir Cambio de Nombre");
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
                alert("No se pudo Editar Cambio de Nombre");
            });
        }); 

        //Añadir Cambio de Domicilio Cuando Abre el Modal
        $(document).on('click','#AddCambioDomicilioAbrirModal',function(e){
            e.preventDefault();
            console.log("LLegue a Cambio de Domicilio modal")
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            const csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
            formData.append('csrf_token_name', csrf_token_name);
            console.log('id_marcas',id_marcas);
                console.log('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/MarcasDomicilioController/addCambioDomicilioShowModal");?>';
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    console.log("response ",response);
                    $('#camdomid').val(response);
                    CambioDomicilioActual(response);
                    CambioDomicilioAnterior(response);
                }).catch(function(response){
                    alert("No se pudo Añadir Cambio de Nombre");
                });
                
                
        });

        function ActualizarCambioDomicilio(){
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camdomid').val();
            //const id_marcas = '<?php echo $id?>';
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
           // formData.append('id_marcas',id_marcas);
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
                alert("No se pudo Editar Cambio Domicilio");
            });
        }

        function LimpiarCambioDomicilio(){
            $('#oficinaCamDom').val("");
            $('#staffCamDom').val("");
            $('#estadoCamDom').val("");
            $('#nro_solicitudCamDom').val("");
            $('#fecha_solicitudCamDom').val("");
            $('#nro_resolucionCamDom').val("");
            $('#fecha_resolucionCamDom').val("");
            $('#referenciaclienteCamDom').val("");
            $('#comentarioCamDom').val("");
        }

         //Editar Cambio Nombre Cuando Abre el Modal---------------------------------------------------------------------------
         $(document).on('click','#EditCambioDomicilioAbrirModalfrmsubmit',function(e){
            e.preventDefault();
            ActualizarCambioDomicilio();
            LimpiarCambioDomicilio();
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
                alert("No se pudo Añadir Cambio Domicilio");
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
                alert("No se pudo Editar Cambio Domicilio");
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
            if (doc_archivo['type'] != 'application/pdf'){
                alert("Solamente se pueden subir archivos PDF");
            }else {

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
                    console.log(response);
                    alert_float('success', "Insertado Correctamente");
                    $("#docModal").modal('hide');
                    Documentos();
                }).catch(function(response){
                    alert("Error al Subir el Archvio ",response.name);
                });
            }
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
                console.log(response);
                alert_float('success', "Actualizado Correctamente");
                $("#docModalEdit").modal('hide');
                Documentos();
            }).catch(function(response){
                alert("No se pudo Editar Documento");
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
                alert("No se pudo Añadir Evento");
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
                alert("No se pudo Editar Evento");
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
                alert("No se pudo Añadir Tareas");
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
                alert("No se pudo Editar Tareas");
            });
        });
        // ------------------------------------------- Eliminar Registros ----------------------------------------------------------------------------------------------------------
          //Eliminar Fusion Anterior
          $(document).on('click','.Fusion-Anterior-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('FusionAnteriorid');
                let id_cambio = $('#fusionid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoFusionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    FusionAnterior(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Fusion Anterior");
                });
            }
        });
        //Eliminar Fusion Actual
        $(document).on('click','.Fusion-Actual-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('FusionActualid');
                let id_cambio = $('#fusionid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoFusionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    FusionActual(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Fusion Actual");
                });
            }
        });
        //Eliminar Licencia Anterior
        $(document).on('click','.Licencia-Anterior-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('LicenciaAnteriorid');
                let id_cambio = $('#cesionid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoCesionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    CesionAnterior(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Licencia Anterior");
                });
            }
        });
        //Eliminar Licencia Actual
        $(document).on('click','.Licencia-Actual-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('LicenciaActualid');
                let id_cambio = $('#licenciaid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoLicenciaController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    LicenciaActual(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Licencia Actual");
                });
            }
        });
        //Eliminar Cesion Anterior
        $(document).on('click','.Cesion-Anterior-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CesionAnteriorid');
                let id_cambio = $('#cesionid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoCesionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    CesionAnterior(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Cesion Anterior");
                });
            }
        });
        //Eliminar Cesion Actual
        $(document).on('click','.Cesion-Actual-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CesionActualid');
                let id_cambio = $('#cesionid').val();
                console.log(id);
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/TipoCesionController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                    alert_float('success', "Eliminado Correctamente");
                    CesionActual(id_cambio);
                }).catch(function(response){
                    alert("No se pudo Eliminar Cesion Actual");
                });
            }
        });

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
                    alert("No se pudo Eliminar Nombre Anterior");
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
                    alert("No se pudo Eliminar Nombre Actual");
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
                    alert("No se pudo Eliminar Domicilio Anterior");
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
                    alert("No se pudo Eliminar Domicilio Actual");
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
                    alert("No se pudo Eliminar Cesion");
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
                    alert("No se pudo Eliminar Licencia");
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
                    alert("No se pudo Eliminar Fusion");
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
                    alert("No se pudo Eliminar Cambio Nombre");
                });
           }
        });

        //Eliminar Cambio Domicilio
        $(document).on('click','.Cambio-Domicilio-delete',function(){
            if (confirm("Quieres eliminar este registro?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('CamDomid');
                var csrf_token_name = $("input[name=csrf_token_name]").val();
                formData.append('csrf_token_name', csrf_token_name);
                let url = '<?php echo admin_url("pi/MarcasDomicilioController/destroy/");?>';
                url= url+id;
                $.ajax({
                    url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                }).then(function(response){
                alert_float('success', "Eliminado Correctamente");
                CambioDomicilio();
                }).catch(function(response){
                    alert("No se pudo Eliminar Cambio Domicilio");
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
                    alert("No se pudo Eliminar Eventos");
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
                    alert("No se pudo Eliminar Tareas");
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
                    alert("No se pudo Eliminar Documentos");
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

    <script>
        /***
         * funcion para guardar el formulario de la clase
         * 
         * 
         */
        $(document).on('click', '#claseNizaFrmSubmit', function(e)
        {
            e.preventDefault();
            var clase_id = $("select[name=clase_niza]").val();
            var clase_descripcion = $("input[name=clase_niza_descripcion]").val();
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasSolicitudesController/insertClases')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'clase_id' : clase_id,
                    'clase_descripcion': clase_descripcion,
                    'marcas_id' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#claseNizaFrm")[0].reset();
                    $("#claseNizaModal").modal('hide');
                    TablaClases();
                }
            });
        });
    </script>

    <script>
        function TablaClases()
        {
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasSolicitudesController/getClasesMarcas/'.$id);?>",
                method: "POST",
                success: function(response){
                    res = JSON.parse(response);
                    data = res.data;
                    console.log(res);
                    $('#claseTbl').DataTable( {
                        destroy: true,
                        data: data,
                        columns: [
                            { data: 'clase' },
                            { data: 'descripcion' },
                            { data: 'acciones' }
                        ],
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                        }
                    } );
                }
            });
        }
    </script>

    <script>
        /***
         * funcion para obtener la descripcion de la clase
         * 
         * 
         */
        $(document).on('change', 'select[name=clase_niza_edit]', function(e)
        {
            e.preventDefault();
            var clase_niza = $("select[name=clase_niza_edit]").val();
            $.ajax({
                url: "<?php echo admin_url('pi/ClasesController/getDescription');?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'clase_id': clase_niza
                },
                success: function(response)
                {
                    res = JSON.parse(response);
                    $("input[name=clase_niza_descripcion_edit]").val(res.data);
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.editarClase', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasClasesController/getClaseByMarcas');?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'id': id
                },
                success: function(response)
                {
                    res = JSON.parse(response);
                    $("input[name=marcas_clase_id").val(res.data.id);
                    $("select[name=clase_niza_edit]").val(res.data.clase_id);
                    $("input[name=clase_niza_descripcion_edit]").val(res.data.descripcion);
                }
            });
            $("#claseNizaEditModal").modal('show');
        })
    </script>
    <script>
        $(document).on('click', '#claseNizaEditFrmSubmit', function(e)
        {
            e.preventDefault();
            var data = {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                'clase_niza'     : $("select[name=clase_niza_edit]").val(),
                'descripcion'    : $("input[name=clase_niza_descripcion_edit]").val(),
                'id'             : $("input[name=marcas_clase_id]").val(),
            }
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasClasesController/update/');?>",
                method: "POST",
                data: data,
                success: function(response)
                {
                    $("#claseNizaEditModal").modal('hide');
                    alert_float('success', 'Clase editada exitosamente');
                }
            });
            TablaClases();
        });
    </script>

    <script>
        $(document).on('click', '.borrarClase', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            if(confirm('¿Esta seguro de eliminar este registro?'))
            {
                $.ajax({
                url: "<?php echo admin_url('pi/MarcasClasesController/delete/');?>"+id,
                method: "POST",
                success: function(response)
                {
                    alert_float('success', 'Clase borrada exitosamente');
                }
            });
            TablaClases();
            }
            
        })
    </script>

    <script>
        $(document).on('ready', function(e){
            e.stopImmediatePropagation();
            TablaClases();
        })
    </script>