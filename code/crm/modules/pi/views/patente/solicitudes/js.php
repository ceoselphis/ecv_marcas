<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    $('#modal-loading').modal('show');

    
    /* Declaramos las variables de Datatable para iniciaizarlas*/
    var tblClaseDT;
    var tblPrioridadDT;
    var tblPublicacionDT;
    var tblEventosDT;
    var tblTareasDT;
    var tblCesionesDT;
    var tblCesionesAnteDT;
    var tblCesionesActDT;
    var tblLicenciasDT;
    var tblLicenciasAnteDT;
    var tblLicenciasActDT;
    var tblFusionesDT;
    var tblFusionesAnteDT;
    var tblFusionesActDT;
    var tblCamNomDT;
    var tblCamNomAnteDT;
    var tblCamNomActDT;
    var tblCamDomDT;
    var tblCamDomAnteDT;
    var tblCamDomActDT;
    var tblDocumentosDT;
    var tblFacturasDT;

    /*var invoicesExtra = <?php echo json_encode($invoicesExtra); ?>;*/
    var invoicesExtra = [];

    /* Para cambiar el color de los Label  luego de una error*/
    const color_lbl = 'rgb(71 85 105)';

    /* FUNCION PARA HACER ENCODE DE UN ARCHIVO A BASE64 */
    function setBase64(file) {
        return new Promise((resolve,reject)=>{
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
            resolve(reader.result)
        };
        reader.onerror = reject
        })
    }
    /* FUNCION PARA HACER DECODE DE UN ARCHIVO A BASE64 */
    const getBase64 = (base64, type, name) =>
        fetch(base64)
            .then(res => res.blob())
            .then((blob) => {
                return new File([blob], name, { type })
            })
   

    /* ####################################################################### */
    /* **********             FUNCIONES SIGNO                       ********** */
    /* ####################################################################### */

    /***
     * funcion para hacer encode y decode a base64 de archivos
     */
    document.querySelector('#signo_archivo').addEventListener('change', async(e)=>{
        
        /* console.log('Archivo Original', e.target.files[0]);
        const data = await setBase64(e.target.files[0])
        console.log('Archivo Base64', data);

        archivo = await getBase64(data, 'application/pdf', 'Archivo.pdf');
        console.log('Archivo Base64 Decoded', archivo); */

    })

    /***
     * funcion para guardar el formulario de la clase
     */
    $('#signofrmsubmit').on('click', function(e) {

        if ($('#signo_archivo').val() && $('#descripcion_signo').val() && $('#signo_archivo').get(0).files[0].type == 'image/png' || $("#signo_archivo").get(0).files[0].type == 'image/gif' || $("#signo_archivo").get(0).files[0].type == 'image/jpeg'){

            $('#SignoFileName').html( 'Archivo → (' + $('#signo_archivo').get(0).files[0].name + ')');
            $('#DescFileName').html( 'Descripción → (' + $('#descripcion_signo').val() + ')');
            $("#signoModal").modal('hide');
            $("#lblsigno_archivo").css('color', color_lbl);
            $("#lbldescripcion_signo").css('color', color_lbl);
        }else if ($('#signo_archivo').val() && $('#signo_archivo').get(0).files[0].type != 'image/png' || $("#signo_archivo").get(0).files[0].type != 'image/gif' || $("#signo_archivo").get(0).files[0].type != 'image/jpeg'){
            $("#lblsigno_archivo").css('color', 'red');
            $("#lbldescripcion_signo").css('color', $('#descripcion_signo').val() ? color_lbl : 'red');
            alert_float('danger', 'Solamente se pueden subir imágenes');
        }else{
            $("#lblsigno_archivo").css('color', $('#signo_archivo').val() ? color_lbl : 'red');
            $("#lbldescripcion_signo").css('color', $('#descripcion_signo').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Signo');
        }
    })


    /* ####################################################################### */
    /* **********             FUNCIONES CLASE NIZA                  ********** */
    /* ####################################################################### */
    
    /***
     * funcion para obtener la descripcion de la clase
     */
    $('#clase_niza').on('change', function(e) {
        e.preventDefault();
        var clase_niza = $('#clase_niza').val();
        $.ajax({
            url: "<?php echo admin_url('pi/ClasesController/getDescription'); ?>",
            method: "POST",
            data: {
                'csrf_token_name': $("input[name=csrf_token_name]").val(),
                'clase_id': clase_niza
            },
            success: function(response) {
                res = JSON.parse(response);
                $('#clase_niza_descripcion').val(res.data);
            }
        });
    });

    /***
     * funcion para guardar el formulario de la clase
     */
    $('#claseNizaFrmSubmit').on('click', function(e) {    
        e.preventDefault();
        if ($('#clase_niza').val() && $('#clase_niza_descripcion').val()) {
            var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
            var data = {
                'idRow': tblClaseDT.rows().count() + 1,
                'clase_id': $('#clase_niza').val(),
                'clase_id_name': $("#clase_niza option[value=" + $( "#clase_niza").val() + "]").text(),
                'descripcion': $('#clase_niza_descripcion').val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='claseNiza_" + (tblClaseDT.rows().count()) + "' class='btn btn-danger col-mrg deleteClase'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }

            claseNiza.push(data);
            console.log('claseNiza', claseNiza);
            try {
                localStorage.setItem("clase_niza", JSON.stringify(claseNiza));
                tblClaseDT.clear();
                tblClaseDT.rows.add(JSON.parse(localStorage.getItem("clase_niza")));
                tblClaseDT.columns.adjust().draw();
                ResetTablaClases();
                $("#claseNizaModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }
            
        }else{
            $("#lblclase_niza").css('color', $('#clase_niza').val() ? color_lbl : 'red');
            $("#lblclase_niza_descripcion").css('color', $('#clase_niza_descripcion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Clase');
        }
    });

    /***
     * funcion para borrar una clase
     */
    $(document).on('click', '.deleteClase', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            claseNiza.length == 1 ? claseNiza = [] : claseNiza.splice(id, 1);
            localStorage.setItem("clase_niza", JSON.stringify(UpdtIdRow(claseNiza, 'claseNiza_')));
            console.log('claseNiza', JSON.parse(localStorage.getItem("clase_niza")));
            tblClaseDT.clear();
            tblClaseDT.rows.add(JSON.parse(localStorage.getItem("clase_niza")));
            tblClaseDT.columns.adjust().draw();
            alert_float('success', 'Clase borrada exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#claseNizaModal').on('hidden.bs.modal', function (e) {
        ResetTablaClases();
    })

    /***
     * funcion que hace reset del Modal de clase
     */
    function ResetTablaClases() {
        $("#claseNizaFrm")[0].reset();
        $('#clase_niza').prop('selectedIndex', 0);
        $('#clase_niza').selectpicker('refresh'); 
        $("#lblclase_niza").css('color', color_lbl);
        $("#lblclase_niza_descripcion").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las clase Niza
     */
    function TablaClases() {
        var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
        tblClaseDT = 
        new $('#claseTbl').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
            },
            autoWidth: false,
            data: claseNiza,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '10%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '65%', targets: 2 },
                { width: '10%', targets: 3 }
            ],
            columns: [{
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'clase_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'descripcion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-break'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********             FUNCIONES PRIORIDAD                   ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las prioridades
     */
    $("#prioridadfrmsubmit").on('click', function(e) {
        e.preventDefault();
        if ($('#pais_prioridad').val() && $('#fecha_prioridad').val()
            && $('#nro_prioridad').val()) {
                
            prioridad = JSON.parse(localStorage.getItem('prioridad'));
            data = {
                'idRow': tblPrioridadDT.rows().count() + 1,
                'pais_id': $('#pais_prioridad').val(),
                'pais_name': $('#pais_prioridad option[value=' + $('#pais_prioridad').val() + ']').text(),
                'fecha_prioridad': $('#fecha_prioridad').val(),
                'numero_prioridad': $('#nro_prioridad').val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='prioridad_" + (tblPrioridadDT.rows().count()) + "' class='btn btn-danger col-mrg deletePrioridad'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            prioridad.push(data);
            console.log('prioridad', prioridad);
            try {
                localStorage.setItem("prioridad", JSON.stringify(prioridad));
                tblPrioridadDT.clear();
                tblPrioridadDT.rows.add(JSON.parse(localStorage.getItem("prioridad")));
                tblPrioridadDT.columns.adjust().draw();
                ResetTablaPrioridad();
                $("#prioridadModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }
        }else{
            $("#lblpais_prioridad").css('color', $('#pais_prioridad').val() ? color_lbl : 'red');
            $("#lblfecha_prioridad").css('color', $('#fecha_prioridad').val() ? color_lbl : 'red');
            $("#lblnro_prioridad").css('color', $('#nro_prioridad').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Prioridad');
        }
    });

    /***
     * funcion para borrar una Prioridad
     */
    $(document).on('click', '.deletePrioridad', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var prioridad = JSON.parse(localStorage.getItem("prioridad"));
        if (confirm("¿Esta seguro de eliminar este registro?")) {
            prioridad.length == 1 ? prioridad = [] : prioridad.splice(id, 1);
            localStorage.setItem("prioridad", JSON.stringify(UpdtIdRow(prioridad, 'prioridad_')));
            console.log('prioridad', JSON.parse(localStorage.getItem("prioridad")));
            tblPrioridadDT.clear();
            tblPrioridadDT.rows.add(JSON.parse(localStorage.getItem("prioridad")));
            tblPrioridadDT.columns.adjust().draw();
            alert_float('success', 'Prioridad eliminada exitosamente');
        }
     });

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#prioridadModal').on('hidden.bs.modal', function (e) {
        ResetTablaPrioridad();
    })

    /***
     * funcion que hace reset del Modal de Prioridades
     */
    function ResetTablaPrioridad() {
        $("#prioridadFrm")[0].reset();
        $('#pais_prioridad').prop('selectedIndex', 0);
        $('#pais_prioridad').selectpicker('refresh'); 
        $("#lblpais_prioridad").css('color', color_lbl);
        $("#lblfecha_prioridad").css('color', color_lbl);
        $("#lblnro_prioridad").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Prioridades
     */
    function TablaPrioridad() {
        table = JSON.parse(localStorage.getItem("prioridad"));
        tblPrioridadDT = 
        new $("#prioridadTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: table,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '10%', targets: 1 },
                { width: '55%', targets: 2 },
                { width: '15%', targets: 3 },
                { width: '15%', targets: 4 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
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
    }



    /* ####################################################################### */
    /* **********             FUNCIONES PUBLICACION                 ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Publicaciones
     */
    $('#publicacionfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#fecha_publicacion').val() && $('#tipo_publicacion').val() && $('#boletin_publicacion').val()
            && $('#tomo_publicacion').val() && $('#pag_publicacion').val()) {
                
            var publicacion = JSON.parse(localStorage.getItem("publicacion"));
            var data = {
                'idRow': tblPublicacionDT.rows().count() + 1,
                "fecha": $('#fecha_publicacion').val(),
                "tipo_pub_id": $('#tipo_publicacion').val(),
                'tipo_pub_name': $('#tipo_publicacion option[value=' + $('#tipo_publicacion').val() + ']').text(),
                "boletin_id": $('#boletin_publicacion').val(),
                'boletin_name': $('#boletin_publicacion option[value=' + $('#boletin_publicacion').val() + ']').text(),
                "tomo": $('#tomo_publicacion').val(),
                "pagina": $('#pag_publicacion').val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='publicacion_" + (tblPublicacionDT.rows().count()) + "' class='btn btn-danger col-mrg deletePublicacion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            publicacion.push(data);
            console.log('publicacion', publicacion);
            try {
                localStorage.setItem("publicacion", JSON.stringify(publicacion));
                tblPublicacionDT.clear();
                tblPublicacionDT.rows.add(JSON.parse(localStorage.getItem("publicacion")));
                tblPublicacionDT.columns.adjust().draw();
                ResetTablaPublicacion();
                $("#publicacionModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }
        }else{
            $("#lblfecha_publicacion").css('color', $('#fecha_publicacion').val() ? color_lbl : 'red');
            $("#lbltipo_publicacion").css('color', $('#tipo_publicacion').val() ? color_lbl : 'red');
            $("#lblboletin_publicacion").css('color', $('#boletin_publicacion').val() ? color_lbl : 'red');
            $("#lbltomo_publicacion").css('color', $('#tomo_publicacion').val() ? color_lbl : 'red');
            $("#lblpag_publicacion").css('color', $('#pag_publicacion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para la Añadir la Publicación');
        }
    });

    /***
     * funcion para borrar una Publicación
     */
    $(document).on('click', '.deletePublicacion', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var publicacion = JSON.parse(localStorage.getItem("publicacion"));
        if (confirm("¿Desea eliminar este registro?")) {
            publicacion.length == 1 ? publicacion = [] : publicacion.splice(id, 1);
            localStorage.setItem("publicacion", JSON.stringify(UpdtIdRow(publicacion, 'publicacion_')));
            console.log('publicacion', JSON.parse(localStorage.getItem("publicacion")));
            tblPublicacionDT.clear();
            tblPublicacionDT.rows.add(JSON.parse(localStorage.getItem("publicacion")));
            tblPublicacionDT.columns.adjust().draw();
            alert_float('success', 'Publicacion eliminada exitosamente');
         }
    });

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#publicacionModal').on('hidden.bs.modal', function (e) {
        ResetTablaPublicacion();
    })

    /***
     * funcion que hace reset del Modal de Publicaciones
     */
    function ResetTablaPublicacion() {
        $("#publicacionFrm")[0].reset();
        $('#tipo_publicacion').prop('selectedIndex', 0);
        $('#tipo_publicacion').selectpicker('refresh'); 
        $('#boletin_publicacion').prop('selectedIndex', 0);
        $('#boletin_publicacion').selectpicker('refresh'); 
        $("#lblfecha_publicacion").css('color', color_lbl);
        $("#lbltipo_publicacion").css('color', color_lbl);
        $("#lblboletin_publicacion").css('color', color_lbl);
        $("#lbltomo_publicacion").css('color', color_lbl);
        $("#lblpag_publicacion").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Publicaciones
     */
    function TablaPublicacion() {
        tabla = JSON.parse(localStorage.getItem("publicacion"));
        tblPublicacionDT = 
        new $("#publicacionTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '10%', targets: 1 },
                { width: '30%', targets: 2 },
                { width: '30%', targets: 3 },
                { width: '2.5%', targets: 4 },
                { width: '2.5%', targets: 5 },
                { width: '10%', targets: 6 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********             FUNCIONES EVENTOS                     ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Eventos
     */
    $('#eventosfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#tipo_evento').val() && $('#fecha_evento').val() && $('#evento_comentario').val()) {
            
            var eventos = JSON.parse(localStorage.getItem("eventos"));
            var data = {
                'idRow': tblEventosDT.rows().count() + 1,
                "fecha": $('#fecha_evento').val(),
                "tipo_evento_id": $('#tipo_evento').val(),
                'tipo_evento_name': $('#tipo_evento option[value=' + $('#tipo_evento').val() + ']').text(),
                "comentarios": $('#evento_comentario').val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='eventos_" + (tblEventosDT.rows().count()) + "' class='btn btn-danger col-mrg deleteEvento'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            eventos.push(data);
            console.log('eventos', eventos);
            try {
                localStorage.setItem("eventos", JSON.stringify(eventos));
                tblEventosDT.clear();
                tblEventosDT.rows.add(JSON.parse(localStorage.getItem("eventos")));
                tblEventosDT.columns.adjust().draw();
                ResetTablaEventos();
                $("#eventoModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbltipo_evento").css('color', $('#tipo_evento').val() ? color_lbl : 'red');
            $("#lblfecha_evento").css('color', $('#fecha_evento').val() ? color_lbl : 'red');
            $("#lblevento_comentario").css('color', $('#evento_comentario').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Evento');
        }

    });

    /***
     * funcion para borrar un Evento
     */
    $(document).on('click', '.deleteEvento', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var eventos = JSON.parse(localStorage.getItem("eventos"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            eventos.length == 1 ? eventos = [] : eventos.splice(id, 1);
            localStorage.setItem("eventos", JSON.stringify(UpdtIdRow(eventos, 'eventos_')));
            console.log('eventos', JSON.parse(localStorage.getItem("eventos")));
            tblEventosDT.clear();
            tblEventosDT.rows.add(JSON.parse(localStorage.getItem("eventos")));
            tblEventosDT.columns.adjust().draw();
            alert_float('success', 'Evento borrado exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#eventoModal').on('hidden.bs.modal', function (e) {
        ResetTablaEventos();
    })

    /***
     * funcion que hace reset del Modal de Eventos
     */
    function ResetTablaEventos() {
        $("#eventoFrm")[0].reset();
        $('#tipo_evento').prop('selectedIndex', 0);
        $('#tipo_evento').selectpicker('refresh'); 
        $("#lbltipo_evento").css('color', color_lbl);
        $("#lblfecha_evento").css('color', color_lbl);
        $("#lblevento_comentario").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de los Eventos
     */
    function TablaEventos() {
        tabla = JSON.parse(localStorage.getItem("eventos"));
        tblEventosDT = 
        new $("#eventosTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '45%', targets: 1 },
                { width: '30%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
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



    /* ####################################################################### */
    /* **********             FUNCIONES TAREAS                      ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Tareas
     */
    $('#tareasfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#fecha_tarea').val() && $('#project_id').val() && $('#tipo_tarea').val()
            && $('#descripcion').val()) {
                
            var tareas = JSON.parse(localStorage.getItem("tareas"));
            var data = {
                'idRow': tblTareasDT.rows().count() + 1,
                "fecha": $('#fecha_tarea').val(),
                "project_id": $('#project_id').val(),
                'project_id_name': $('#project_id option[value=' + $('#project_id').val() + ']').text(),
                "tipo_tareas_id": $('#tipo_tarea').val(),
                'tipo_tareas_id_name': $('#tipo_tarea option[value=' + $('#tipo_tarea').val() + ']').text(),
                "descripcion": $('#descripcion').val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='tareas_" + (tblTareasDT.rows().count()) + "' class='btn btn-danger col-mrg deleteTarea'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            tareas.push(data);
            console.log('tareas', tareas);
            try {
                localStorage.setItem("tareas", JSON.stringify(tareas));
                tblTareasDT.clear();
                tblTareasDT.rows.add(JSON.parse(localStorage.getItem("tareas")));
                tblTareasDT.columns.adjust().draw();
                ResetTablaTareas();
                $("#addTask").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblfecha_tarea").css('color', $('#fecha_tarea').val() ? color_lbl : 'red');
            $("#lblproject_id").css('color', $('#project_id').val() ? color_lbl : 'red');
            $("#lbltipo_tarea").css('color', $('#tipo_tarea').val() ? color_lbl : 'red');
            $("#lbldescripcion").css('color', $('#descripcion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar los datos para para Añadir la Tarea');
        }
    })
 
    /***
     * funcion para borrar una Tarea
     */
    $(document).on('click', '.deleteTarea', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var tareas = JSON.parse(localStorage.getItem("tareas"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            tareas.length == 1 ? tareas = [] : tareas.splice(id, 1);
            localStorage.setItem("tareas", JSON.stringify(UpdtIdRow(tareas, 'tareas_')));
            console.log('tareas', JSON.parse(localStorage.getItem("tareas")));
            tblTareasDT.clear();
            tblTareasDT.rows.add(JSON.parse(localStorage.getItem("tareas")));
            tblTareasDT.columns.adjust().draw();
            alert_float('success', 'Tarea borrada exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#addTask').on('hidden.bs.modal', function (e) {
        ResetTablaTareas();
    })

    /***
     * funcion que hace reset del Modal de Tareas
     */
    function ResetTablaTareas() {
        $("#tareasfrm")[0].reset();
        $('#project_id').prop('selectedIndex', 0);
        $('#project_id').selectpicker('refresh'); 
        $('#tipo_tarea').prop('selectedIndex', 0);
        $('#tipo_tarea').selectpicker('refresh'); 
        $("#lblfecha_tarea").css('color', color_lbl);
        $("#lblproject_id").css('color', color_lbl);
        $("#lbltipo_tarea").css('color', color_lbl);
        $("#lbldescripcion").css('color', color_lbl);
    }
    
    /***
     * funcion que configura el Datatable de las Tareas
     */
    function TablaTareas() {
        tabla = JSON.parse(localStorage.getItem("tareas"));
        tblTareasDT = 
        new $("#tareasTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '33%', targets: 1 },
                { width: '28%', targets: 2 },
                { width: '24%', targets: 3 },
                { width: '5%', targets: 4 },
                { width: '5%', targets: 5 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
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



    /* ####################################################################### */
    /* **********             FUNCIONES CESION                      ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Cesiones
     */
    $('#cesionesfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        let start = new Date();
        let end; 
        console.log('Comienzo = ' + start.getHours() + ":" + start.getMinutes() + ":" + start.getSeconds());
        if ($('#oficinaCesion').val() && 
            $('#estadoCesion').val() && 
            $('#nro_solicitudCesion').val() && 
            $('#fecha_solicitudCesion').val() &&
            $('#nro_resolucionCesion').val() &&
            $('#fecha_resolucionCesion').val() &&
            $('#referenciaclienteCesion').val() &&
            $('#comentarioCesion').val()) 
            {
                
            var cesiones = JSON.parse(localStorage.getItem("cesiones"));
            var data = {
                'idRow': tblCesionesDT.rows().count() + 1,
                "tmp_cesion_id": tblCesionesDT.rows().count() + 1,
                "client_id": $('#clienteCesion').val(),
                'client_id_name': $('#clienteCesion option[value=' + $('#clienteCesion').val() + ']').text(),
                "oficina_id": $('#oficinaCesion').val(),
                'oficina_id_name': $('#oficinaCesion option[value=' + $('#oficinaCesion').val() + ']').text(),
                "staff_id": $('#staffCesion').val(),
                'staff_id_name': $('#staffCesion option[value=' + $('#staffCesion').val() + ']').text(),
                "estado_id": $('#estadoCesion').val(),
                'estado_id_name': $('#estadoCesion option[value=' + $('#estadoCesion').val() + ']').text(),
                "solicitud_num": $('#nro_solicitudCesion').val(),
                "fecha_solicitud": $('#fecha_solicitudCesion').val(),
                "resolucion_num": $('#nro_resolucionCesion').val(),
                "fecha_resolucion": $('#fecha_resolucionCesion').val(),
                "referencia_cliente": $('#referenciaclienteCesion').val(),
                "comentarios": $('#comentarioCesion').val(),
                "cesionesanteriores": localStorage.getItem("cesionesanteriores"),
                "cesionesactuales": localStorage.getItem("cesionesactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='cesiones_" + (tblCesionesDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCesion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            end = new Date(); console.log(`Asignada la Data en ${end.getTime() - start.getTime()} msec`); start = new Date();
            cesiones.push(data);
            console.log('cesiones', cesiones);
            try {
                localStorage.setItem("cesiones", JSON.stringify(cesiones));
                tblCesionesDT.clear();
                tblCesionesDT.rows.add(JSON.parse(localStorage.getItem("cesiones")));
                tblCesionesDT.columns.adjust().draw();
                tblCesionesAnteDT.clear().draw();
                tblCesionesActDT.clear().draw();
                ResetTablaCesiones();
                $("#AddCesion").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbloficinaCesion").css('color', $('#oficinaCesion').val() ? color_lbl : 'red');
            $("#lblestadoCesion").css('color', $('#estadoCesion').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCesion").css('color', $('#nro_solicitudCesion').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCesion").css('color', $('#fecha_solicitudCesion').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCesion").css('color', $('#nro_resolucionCesion').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCesion").css('color', $('#fecha_resolucionCesion').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCesion").css('color', $('#referenciaclienteCesion').val() ? color_lbl : 'red');
            $("#lblcomentarioCesion").css('color', $('#comentarioCesion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Cesión');
        }
    })
    
    /***
     * funcion para borrar una Cesion
     */
    $(document).on('click', '.deleteCesion', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var cesiones = JSON.parse(localStorage.getItem("cesiones"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesiones.length == 1 ? cesiones = [] : cesiones.splice(id, 1);
            localStorage.setItem("cesiones", JSON.stringify(UpdtIdRow(cesiones, 'cesiones_')));
            console.log('cesiones', JSON.parse(localStorage.getItem("cesiones")));
            tblCesionesDT.clear();
            tblCesionesDT.rows.add(JSON.parse(localStorage.getItem("cesiones")));
            tblCesionesDT.columns.adjust().draw();
            alert_float('success', 'Cesión borrada exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#AddCesion').on('hidden.bs.modal', function (e) {
        ResetTablaCesiones();
        $('#AddCesion a[data-toggle="tab"]')[0].click();
        tblCesionesAnteDT.clear().draw();
        tblCesionesActDT.clear().draw();
        localStorage.setItem('cesionesanteriores', JSON.stringify([]));
        localStorage.setItem('cesionesactuales', JSON.stringify([]));
    })

    /***
     * funcion que se ejecuta antes de cerrar el Modal
     */
    $('#AddCesion').on('hide.bs.modal', function (e) {
        if (!($('#clienteCesion').val() || '') == '' || 
            !($('#oficinaCesion').val() || '') == '' || 
            !($('#staffCesion').val() || '') == '' || 
            !($('#estadoCesion').val() || '') == '' || 
            !($('#nro_solicitudCesion').val() || '') == '' || 
            !($('#fecha_solicitudCesion').val() || '') == '' ||
            !($('#nro_resolucionCesion').val() || '') == '' ||
            !($('#fecha_resolucionCesion').val() || '') == '' ||
            !($('#referenciaclienteCesion').val() || '') == '' ||
            !($('#comentarioCesion').val() || '') == '' ||
            tblCesionesAnteDT.rows().count() > 0 || tblCesionesActDT.rows().count() > 0) 
        {
            if (!confirm('Hay datos sin guardar. ¿Esta seguro que desea salir?')) {
                e.preventDefault();
            }
        }
    })

    /***
     * funcion que hace reset del Modal de Cesiones
     */
    function ResetTablaCesiones() {
        $("#cesionesfrm")[0].reset();
        $('#clienteCesion').prop('selectedIndex', 0);
        $('#clienteCesion').selectpicker('refresh'); 
        $('#oficinaCesion').prop('selectedIndex', 0);
        $('#oficinaCesion').selectpicker('refresh'); 
        $('#staffCesion').prop('selectedIndex', 0);
        $('#staffCesion').selectpicker('refresh'); 
        $('#estadoCesion').prop('selectedIndex', 0);
        $('#estadoCesion').selectpicker('refresh'); 
        $("#lbloficinaCesion").css('color', color_lbl);
        $("#lblestadoCesion").css('color', color_lbl);
        $("#lblnro_solicitudCesion").css('color', color_lbl);
        $("#lblfecha_solicitudCesion").css('color', color_lbl);
        $("#lblnro_resolucionCesion").css('color', color_lbl);
        $("#lblfecha_resolucionCesion").css('color', color_lbl);
        $("#lblreferenciaclienteCesion").css('color', color_lbl);
        $("#lblcomentarioCesion").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Cesiones
     */
    function TablaCesiones() {
        tabla = JSON.parse(localStorage.getItem("cesiones"));
        tblCesionesDT = 
        new $("#CesionTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '5%', targets: 5 },
                { width: '5%', targets: 6 },
                { width: '5%', targets: 7 },
                { width: '5%', targets: 8 },
                { width: '5%', targets: 9 },
                { width: '15%', targets: 10 },
                { width: '5%', targets: 11 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'client_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'oficina_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'staff_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'estado_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'solicitud_num',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'resolucion_num',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'referencia_cliente',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********             FUNCIONES CESION ANTERIOR             ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Cesiones Anteriores
     */
    $('#AñadirCesionAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscesionanterior').val() || []) == '')) 
        {
            var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
            rowCount = tblCesionesAnteDT.rows().count();
            const valuesSelect = $('#propietarioscesionanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscesionanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "cedente_id": parseInt($(this).val()),
                        'cedente_id_name': $(this).text(),
                        "tipo_cedente": 1,
                        "cesion_id": tblCesionesDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='cesionesanteriores_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCesionAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    cesionesanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('cesionesanteriores', cesionesanteriores);
            try {
                $("#CesionAnteriorModal").modal('hide');
                localStorage.setItem("cesionesanteriores", JSON.stringify(cesionesanteriores));
                tblCesionesAnteDT.clear();
                tblCesionesAnteDT.rows.add(JSON.parse(localStorage.getItem("cesionesanteriores")));
                tblCesionesAnteDT.columns.adjust().draw();
                ResetTablaCesionesAnteriores();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscesionanterior").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Cesión Anterior');
        }
    })
 
    /***
     * funcion para borrar una Cesion Anterior
     */
    $(document).on('click', '.deleteCesionAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesanteriores.length == 1 ? cesionesanteriores = [] : cesionesanteriores.splice(id, 1);
            localStorage.setItem("cesionesanteriores", JSON.stringify(UpdtIdRow(cesionesanteriores, 'cesionesanteriores_')));
            console.log('cesionesanteriores', JSON.parse(localStorage.getItem("cesionesanteriores")));
            tblCesionesAnteDT.clear();
            tblCesionesAnteDT.rows.add(JSON.parse(localStorage.getItem("cesionesanteriores")));
            tblCesionesAnteDT.columns.adjust().draw();
            alert_float('success', 'Cesión Anterior borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Cesion Anterior
     */
    $('#addbtnCesionAnterior').on('click', function(e) {
        $("#CesionAnteriorModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Cesion Anterior
     */
    $('#CesionAnteriorModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCesionesAnteriores();
    })
 
    /***
     * funcion que hace reset del Modal de Cesiones Anteriores
     */
    function ResetTablaCesionesAnteriores() {
        $('#propietarioscesionanterior').prop('selectedIndex', -1);
        $('#propietarioscesionanterior').selectpicker('refresh'); 
        $("#lblpropietarioscesionanterior").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las Cesiones Anteriores
     */
    function TablaCesionesAnteriores() {
        tabla = JSON.parse(localStorage.getItem("cesionesanteriores"));
        tblCesionesAnteDT = 
        new $("#CesionesAnterioresTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'cedente_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES CESION ACTUAL               ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Cesiones Actuales
     */
    $('#AñadirCesionActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscesionactual').val() || []) == '')) 
        {
            var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
            rowCount = tblCesionesActDT.rows().count();
            const valuesSelect = $('#propietarioscesionactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscesionactual option[value=' + value + ']').each(function() {
                    var data = {
                    'idRow': rowCount + 1,
                    "cedente_id": parseInt($(this).val()),
                    'cedente_id_name': $(this).text(),
                    "tipo_cedente": 2,
                    "cesion_id": tblCesionesDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='cesionesactuales_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCesionActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    cesionesactuales.push(data);
                    rowCount++;
                });
            });

            console.log('cesionesactuales', cesionesactuales);
            try {
                $("#CesionActualModal").modal('hide');
                localStorage.setItem("cesionesactuales", JSON.stringify(cesionesactuales));
                tblCesionesActDT.clear();
                tblCesionesActDT.rows.add(JSON.parse(localStorage.getItem("cesionesactuales")));
                tblCesionesActDT.columns.adjust().draw();
                ResetTablaCesionesActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscesionactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Cesión Actual');
        }
    })

    /***
     * funcion para borrar una Cesion Actual
     */
    $(document).on('click', '.deleteCesionActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesactuales.length == 1 ? cesionesactuales = [] : cesionesactuales.splice(id, 1);
            localStorage.setItem("cesionesactuales", JSON.stringify(UpdtIdRow(cesionesactuales, 'cesionesactuales_')));
            console.log('cesionesactuales', JSON.parse(localStorage.getItem("cesionesactuales")));
            tblCesionesActDT.clear();
            tblCesionesActDT.rows.add(JSON.parse(localStorage.getItem("cesionesactuales")));
            tblCesionesActDT.columns.adjust().draw();
            alert_float('success', 'Cesión Actual borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Cesion Actual
     */
    $('#addbtnCesionActual').on('click', function(e) {
        $("#CesionActualModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Cesion Actual
     */
    $('#CesionActualModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCesionesActuales();
    })
 
    /***
     * funcion que hace reset del Modal de Cesiones Actuales
     */
    function ResetTablaCesionesActuales() {
        $('#propietarioscesionactual').prop('selectedIndex', -1);
        $('#propietarioscesionactual').selectpicker('refresh'); 
        $("#lblpropietarioscesionactual").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Cesiones Actuales
     */
    function TablaCesionesActuales() {
        tabla = JSON.parse(localStorage.getItem("cesionesactuales"));
        tblCesionesActDT = 
        new $("#CesionesActualesTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'cedente_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA                    ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Licencias
     */
    $('#licenciasfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#oficinaLicencia').val() && 
            $('#estadoLicencia').val() && 
            $('#nro_solicitudLicencia').val() && 
            $('#fecha_solicitudLicencia').val() &&
            $('#nro_resolucionLicencia').val() &&
            $('#fecha_resolucionLicencia').val() &&
            $('#referenciaclienteLicencia').val() &&
            $('#comentarioLicencia').val()) 
            {
                
            var licencias = JSON.parse(localStorage.getItem("licencias"));
            var data = {
                'idRow': tblLicenciasDT.rows().count() + 1,
                "tmp_licencia_id": tblLicenciasDT.rows().count() + 1,
                "client_id": $('#clienteLicencia').val(),
                'client_id_name': $('#clienteLicencia option[value=' + $('#clienteLicencia').val() + ']').text(),
                "oficina_id": $('#oficinaLicencia').val(),
                'oficina_id_name': $('#oficinaLicencia option[value=' + $('#oficinaLicencia').val() + ']').text(),
                "staff_id": $('#staffLicencia').val(),
                'staff_id_name': $('#staffLicencia option[value=' + $('#staffLicencia').val() + ']').text(),
                "estado_id": $('#estadoLicencia').val(),
                'estado_id_name': $('#estadoLicencia option[value=' + $('#estadoLicencia').val() + ']').text(),
                "num_solicitud": $('#nro_solicitudLicencia').val(),
                "fecha_solicitud": $('#fecha_solicitudLicencia').val(),
                "num_resolucion": $('#nro_resolucionLicencia').val(),
                "fecha_resolucion": $('#fecha_resolucionLicencia').val(),
                "referencia_cliente": $('#referenciaclienteLicencia').val(),
                "comentarios": $('#comentarioLicencia').val(),
                "licenciasanteriores": localStorage.getItem("licenciasanteriores"),
                "licenciasactuales": localStorage.getItem("licenciasactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='licencias_" + (tblLicenciasDT.rows().count()) + "' class='btn btn-danger col-mrg deleteLicencia'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            licencias.push(data);
            console.log('licencias', licencias);
            try {
                localStorage.setItem("licencias", JSON.stringify(licencias));
                tblLicenciasDT.clear();
                tblLicenciasDT.rows.add(JSON.parse(localStorage.getItem("licencias")));
                tblLicenciasDT.columns.adjust().draw();
                tblLicenciasAnteDT.clear().draw();
                tblLicenciasActDT.clear().draw();
                ResetTablaLicencias();
                $("#AddLicencia").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbloficinaLicencia").css('color', $('#oficinaLicencia').val() ? color_lbl : 'red');
            $("#lblestadoLicencia").css('color', $('#estadoLicencia').val() ? color_lbl : 'red');
            $("#lblnro_solicitudLicencia").css('color', $('#nro_solicitudLicencia').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudLicencia").css('color', $('#fecha_solicitudLicencia').val() ? color_lbl : 'red');
            $("#lblnro_resolucionLicencia").css('color', $('#nro_resolucionLicencia').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionLicencia").css('color', $('#fecha_resolucionLicencia').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteLicencia").css('color', $('#referenciaclienteLicencia').val() ? color_lbl : 'red');
            $("#lblcomentarioLicencia").css('color', $('#comentarioLicencia').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Licencia');
        }
    })
 
    /***
     * funcion para borrar una Licencia
     */
    $(document).on('click', '.deleteLicencia', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var licencias = JSON.parse(localStorage.getItem("licencias"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licencias.length == 1 ? licencias = [] : licencias.splice(id, 1);
            localStorage.setItem("licencias", JSON.stringify(UpdtIdRow(licencias, 'licencias_')));
            console.log('licencias', JSON.parse(localStorage.getItem("licencias")));
            tblLicenciasDT.clear();
            tblLicenciasDT.rows.add(JSON.parse(localStorage.getItem("licencias")));
            tblLicenciasDT.columns.adjust().draw();
            alert_float('success', 'Licencia borrada exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#AddLicencia').on('hidden.bs.modal', function (e) {
        ResetTablaLicencias();
        $('#AddLicencia a[data-toggle="tab"]')[0].click();
        tblLicenciasAnteDT.clear().draw();
        tblLicenciasActDT.clear().draw();
        localStorage.setItem('licenciasanteriores', JSON.stringify([]));
        localStorage.setItem('licenciasactuales', JSON.stringify([]));
    })

    /***
     * funcion que se ejecuta antes de cerrar el Modal
     */
    $('#AddLicencia').on('hide.bs.modal', function (e) {
        if (!($('#clienteLicencia').val() || '') == '' || 
            !($('#oficinaLicencia').val() || '') == '' || 
            !($('#staffLicencia').val() || '') == '' || 
            !($('#estadoLicencia').val() || '') == '' || 
            !($('#nro_solicitudLicencia').val() || '') == '' || 
            !($('#fecha_solicitudLicencia').val() || '') == '' ||
            !($('#nro_resolucionLicencia').val() || '') == '' ||
            !($('#fecha_resolucionLicencia').val() || '') == '' ||
            !($('#referenciaclienteLicencia').val() || '') == '' ||
            !($('#comentarioLicencia').val() || '') == '' ||
            tblLicenciasAnteDT.rows().count() > 0 || tblLicenciasActDT.rows().count() > 0) 
        {
            if (!confirm('Hay datos sin guardar. ¿Esta seguro que desea salir?')) {
                e.preventDefault();
            }
        }
    })

    /***
     * funcion que hace reset del Modal de Licencias
     */
    function ResetTablaLicencias() {
        $("#licenciasfrm")[0].reset();
        $('#clienteLicencia').prop('selectedIndex', 0);
        $('#clienteLicencia').selectpicker('refresh'); 
        $('#oficinaLicencia').prop('selectedIndex', 0);
        $('#oficinaLicencia').selectpicker('refresh'); 
        $('#staffLicencia').prop('selectedIndex', 0);
        $('#staffLicencia').selectpicker('refresh'); 
        $('#estadoLicencia').prop('selectedIndex', 0);
        $('#estadoLicencia').selectpicker('refresh'); 
        $("#lbloficinaLicencia").css('color', color_lbl);
        $("#lblestadoLicencia").css('color', color_lbl);
        $("#lblnro_solicitudLicencia").css('color', color_lbl);
        $("#lblfecha_solicitudLicencia").css('color', color_lbl);
        $("#lblnro_resolucionLicencia").css('color', color_lbl);
        $("#lblfecha_resolucionLicencia").css('color', color_lbl);
        $("#lblreferenciaclienteLicencia").css('color', color_lbl);
        $("#lblcomentarioLicencia").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Licencias
     */
    function TablaLicencia() {
        tabla = JSON.parse(localStorage.getItem("licencias"));
        tblLicenciasDT = 
        new $("#LicenciaTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '5%', targets: 5 },
                { width: '5%', targets: 6 },
                { width: '5%', targets: 7 },
                { width: '5%', targets: 8 },
                { width: '5%', targets: 9 },
                { width: '15%', targets: 10 },
                { width: '5%', targets: 11 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'client_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'oficina_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'staff_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'estado_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'referencia_cliente',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA ANTERIOR           ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Licencias Anteriores
     */
    $('#AñadirLicenciaAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioslicenciaanterior').val() || []) == '')) 
        {
            var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
            rowCount = tblLicenciasAnteDT.rows().count();
            const valuesSelect = $('#propietarioslicenciaanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioslicenciaanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_licenciante": 1,
                        "licencia_id": tblLicenciasDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='licenciasanteriores_" + (rowCount) + "' class='btn btn-danger col-mrg deleteLicenciaAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    licenciasanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('licenciasanteriores', licenciasanteriores);
            try {
                $("#LicenciaAnteriorModal").modal('hide');
                localStorage.setItem("licenciasanteriores", JSON.stringify(licenciasanteriores));
                tblLicenciasAnteDT.clear();
                tblLicenciasAnteDT.rows.add(JSON.parse(localStorage.getItem("licenciasanteriores")));
                tblLicenciasAnteDT.columns.adjust().draw();
                ResetTablaLicenciasAnteriores();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioslicenciaanterior").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Licencia Anterior');
        }
    })
 
    /***
     * funcion para borrar una Licencia Anterior
     */
    $(document).on('click', '.deleteLicenciaAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasanteriores.length == 1 ? licenciasanteriores = [] : licenciasanteriores.splice(id, 1);
            localStorage.setItem("licenciasanteriores", JSON.stringify(UpdtIdRow(licenciasanteriores, 'licenciasanteriores_')));
            console.log('licenciasanteriores', JSON.parse(localStorage.getItem("licenciasanteriores")));
            tblLicenciasAnteDT.clear();
            tblLicenciasAnteDT.rows.add(JSON.parse(localStorage.getItem("licenciasanteriores")));
            tblLicenciasAnteDT.columns.adjust().draw();
            alert_float('success', 'Licencia Anterior borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Licencia Anterior
     */
    $('#addbtnLicenciaAnterior').on('click', function(e) {
        $("#LicenciaAnteriorModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Licencia Anterior
     */
    $('#LicenciaAnteriorModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaLicenciasAnteriores();
    })
 
    /***
     * funcion que hace reset del Modal de Licencias Anteriores
     */
    function ResetTablaLicenciasAnteriores() {
        $('#propietarioslicenciaanterior').prop('selectedIndex', 1);
        $('#propietarioslicenciaanterior').selectpicker('refresh'); 
        $("#lblpropietarioslicenciaanterior").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las Licencias Anteriores
     */
    function TablaLicenciasAnteriores() {
        tabla = JSON.parse(localStorage.getItem("licenciasanteriores"));
        tblLicenciasAnteDT = 
        new $("#LicenciasAnterioresTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA ACTUAL             ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Licencias Actuales
     */
    $('#AñadirLicenciaActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioslicenciaactual').val() || []) == '')) 
        {
            var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
            rowCount = tblLicenciasActDT.rows().count();
            const valuesSelect = $('#propietarioslicenciaactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioslicenciaactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_licenciante": 2,
                        "licencia_id": tblLicenciasDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='licenciasactuales_" + (rowCount) + "' class='btn btn-danger col-mrg deleteLicenciaActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    licenciasactuales.push(data);
                    rowCount++;
                });
            });
            console.log('licenciasactuales', licenciasactuales);
            try {
                $("#LicenciaActualModal").modal('hide');
                localStorage.setItem("licenciasactuales", JSON.stringify(licenciasactuales));
                tblLicenciasActDT.clear();
                tblLicenciasActDT.rows.add(JSON.parse(localStorage.getItem("licenciasactuales")));
                tblLicenciasActDT.columns.adjust().draw();
                ResetTablaLicenciasActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioslicenciaactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Licencia Actual');
        }
    })
 
    /***
     * funcion para borrar una Licencia Actual
     */
    $(document).on('click', '.deleteLicenciaActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasactuales.length == 1 ? licenciasactuales = [] : licenciasactuales.splice(id, 1);
            localStorage.setItem("licenciasactuales", JSON.stringify(UpdtIdRow(licenciasactuales, 'licenciasactuales_')));
            console.log('licenciasactuales', JSON.parse(localStorage.getItem("licenciasactuales")));
            tblLicenciasActDT.clear();
            tblLicenciasActDT.rows.add(JSON.parse(localStorage.getItem("licenciasactuales")));
            tblLicenciasActDT.columns.adjust().draw();
            alert_float('success', 'Licencia Actual borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Licencia Actual
     */
    $('#addbtnLicenciaActual').on('click', function(e) {
        $("#LicenciaActualModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Licencia Actual
     */
    $('#LicenciaActualModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaLicenciasActuales();
    })
 
    /***
     * funcion que hace reset del Modal de Licencias Actuales
     */
    function ResetTablaLicenciasActuales() {
        $('#propietarioslicenciaactual').prop('selectedIndex', -1);
        $('#propietarioslicenciaactual').selectpicker('refresh'); 
        $("#lblpropietarioslicenciaactual").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Licencias Actuales
     */
    function TablaLicenciasActuales() {
        tabla = JSON.parse(localStorage.getItem("licenciasactuales"));
        tblLicenciasActDT = 
        new $("#LicenciasActualesTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES FUSION                      ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Fusiones
     */
    $('#fusionesfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#oficinaFusion').val() && 
            $('#estadoFusion').val() && 
            $('#estadoFusion').val() && 
            $('#fecha_solicitudFusion').val() &&
            $('#nro_resolucionFusion').val() &&
            $('#fecha_resolucionFusion').val() &&
            $('#referenciaclienteFusion').val() &&
            $('#comentarioFusion').val()) 
            {
                
            var fusiones = JSON.parse(localStorage.getItem("fusiones"));
            var data = {
                'idRow': tblFusionesDT.rows().count() + 1,
                "tmp_fusion_id": tblFusionesDT.rows().count() + 1,
                "client_id": $('#clienteFusion').val(),
                'client_id_name': $('#clienteFusion option[value=' + $('#clienteFusion').val() + ']').text(),
                "oficina_id": $('#oficinaFusion').val(),
                'oficina_id_name': $('#oficinaFusion option[value=' + $('#oficinaFusion').val() + ']').text(),
                "staff_id": $('#staffFusion').val(),
                'staff_id_name': $('#staffFusion option[value=' + $('#staffFusion').val() + ']').text(),
                "estado_id": $('#estadoFusion').val(),
                'estado_id_name': $('#estadoFusion option[value=' + $('#estadoFusion').val() + ']').text(),
                "num_solicitud": $('#estadoFusion').val(),
                "fecha_solicitud": $('#fecha_solicitudFusion').val(),
                "num_resolucion": $('#nro_resolucionFusion').val(),
                "fecha_resolucion": $('#fecha_resolucionFusion').val(),
                "referencia_cliente": $('#referenciaclienteFusion').val(),
                "comentarios": $('#comentarioFusion').val(),
                "fusionesanteriores": localStorage.getItem("fusionesanteriores"),
                "fusionesactuales": localStorage.getItem("fusionesactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='fusiones_" + (tblFusionesDT.rows().count()) + "' class='btn btn-danger col-mrg deleteFusion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            fusiones.push(data);
            console.log('fusiones', fusiones);
            try {
                localStorage.setItem("fusiones", JSON.stringify(fusiones));
                tblFusionesDT.clear();
                tblFusionesDT.rows.add(JSON.parse(localStorage.getItem("fusiones")));
                tblFusionesDT.columns.adjust().draw();
                tblFusionesAnteDT.clear().draw();
                tblFusionesActDT.clear().draw();
                ResetTablaFusiones();
                $("#AddFusion").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbloficinaFusion").css('color', $('#oficinaFusion').val() ? color_lbl : 'red');
            $("#lblestadoFusion").css('color', $('#estadoFusion').val() ? color_lbl : 'red');
            $("#lblnro_solicitudFusion").css('color', $('#estadoFusion').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudFusion").css('color', $('#fecha_solicitudFusion').val() ? color_lbl : 'red');
            $("#lblnro_resolucionFusion").css('color', $('#nro_resolucionFusion').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionFusion").css('color', $('#fecha_resolucionFusion').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteFusion").css('color', $('#referenciaclienteFusion').val() ? color_lbl : 'red');
            $("#lblcomentarioFusion").css('color', $('#comentarioFusion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion');
        }
    })
 
    /***
     * funcion para borrar una Fusion
     */
    $(document).on('click', '.deleteFusion', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var fusiones = JSON.parse(localStorage.getItem("fusiones"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusiones.length == 1 ? fusiones = [] : fusiones.splice(id, 1);
            localStorage.setItem("fusiones", JSON.stringify(UpdtIdRow(fusiones, 'fusiones_')));
            console.log('fusiones', JSON.parse(localStorage.getItem("fusiones")));
            tblFusionesDT.clear();
            tblFusionesDT.rows.add(JSON.parse(localStorage.getItem("fusiones")));
            tblFusionesDT.columns.adjust().draw();
            alert_float('success', 'Fusion borrada exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#AddFusion').on('hidden.bs.modal', function (e) {
        ResetTablaFusiones();
        $('#AddFusion a[data-toggle="tab"]')[0].click();
        tblFusionesAnteDT.clear().draw();
        tblFusionesActDT.clear().draw();
        localStorage.setItem('fusionesanteriores', JSON.stringify([]));
        localStorage.setItem('fusionesactuales', JSON.stringify([]));
    })

    /***
     * funcion que se ejecuta antes de cerrar el Modal
     */
    $('#AddFusion').on('hide.bs.modal', function (e) {
        if (!($('#clienteFusion').val() || '') == '' || 
            !($('#oficinaFusion').val() || '') == '' || 
            !($('#staffFusion').val() || '') == '' || 
            !($('#estadoFusion').val() || '') == '' || 
            !($('#estadoFusion').val() || '') == '' || 
            !($('#fecha_solicitudFusion').val() || '') == '' ||
            !($('#nro_resolucionFusion').val() || '') == '' ||
            !($('#fecha_resolucionFusion').val() || '') == '' ||
            !($('#referenciaclienteFusion').val() || '') == '' ||
            !($('#comentarioFusion').val() || '') == '' ||
            tblFusionesAnteDT.rows().count() > 0 || tblFusionesActDT.rows().count() > 0) 
        {
            if (!confirm('Hay datos sin guardar. ¿Esta seguro que desea salir?')) {
                e.preventDefault();
            }
        }
    })

    /***
     * funcion que hace reset del Modal de Fusiones
     */
    function ResetTablaFusiones() {
        $("#fusionesfrm")[0].reset();
        $('#clienteFusion').prop('selectedIndex', 0);
        $('#clienteFusion').selectpicker('refresh'); 
        $('#oficinaFusion').prop('selectedIndex', 0);
        $('#oficinaFusion').selectpicker('refresh'); 
        $('#staffFusion').prop('selectedIndex', 0);
        $('#staffFusion').selectpicker('refresh'); 
        $('#estadoFusion').prop('selectedIndex', 0);
        $('#estadoFusion').selectpicker('refresh'); 
        $("#lbloficinaFusion").css('color', color_lbl);
        $("#lblestadoFusion").css('color', color_lbl);
        $("#lblnro_solicitudFusion").css('color', color_lbl);
        $("#lblfecha_solicitudFusion").css('color', color_lbl);
        $("#lblnro_resolucionFusion").css('color', color_lbl);
        $("#lblfecha_resolucionFusion").css('color', color_lbl);
        $("#lblreferenciaclienteFusion").css('color', color_lbl);
        $("#lblcomentarioFusion").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Fusiones
     */
    function TablaFusion() {
        tabla = JSON.parse(localStorage.getItem("fusiones"));
        tblFusionesDT = 
        new $("#FusionTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '5%', targets: 5 },
                { width: '5%', targets: 6 },
                { width: '5%', targets: 7 },
                { width: '5%', targets: 8 },
                { width: '5%', targets: 9 },
                { width: '15%', targets: 10 },
                { width: '5%', targets: 11 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'client_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'oficina_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'staff_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'estado_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'referencia_cliente',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********             FUNCIONES FUSION ANTERIOR             ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las Fusiones Anteriores
     */
    $('#AñadirFusionAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietariosfusionanterior').val() || []) == '')) 
        {
            var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
            rowCount = tblFusionesAnteDT.rows().count();
            const valuesSelect = $('#propietariosfusionanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietariosfusionanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_participante": 1,
                        "fusion_id": tblCesionesDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='fusionesanteriores_" + (rowCount) + "' class='btn btn-danger col-mrg deleteFusionAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    fusionesanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('fusionesanteriores', fusionesanteriores);
            try {
                $("#FusionAnteriorModal").modal('hide');
                localStorage.setItem("fusionesanteriores", JSON.stringify(fusionesanteriores));
                tblFusionesAnteDT.clear();
                tblFusionesAnteDT.rows.add(JSON.parse(localStorage.getItem("fusionesanteriores")));
                tblFusionesAnteDT.columns.adjust().draw();
                ResetTablaFusionesAnteriores();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietariosfusionanterior").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion Anterior');
        }
    })
 
    /***
     * funcion para borrar una Fusion Anterior
     */
    $(document).on('click', '.deleteFusionAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesanteriores.length == 1 ? fusionesanteriores = [] : fusionesanteriores.splice(id, 1);
            localStorage.setItem("fusionesanteriores", JSON.stringify(UpdtIdRow(fusionesanteriores, 'fusionesanteriores_')));
            console.log('fusionesanteriores', JSON.parse(localStorage.getItem("fusionesanteriores")));
            tblFusionesAnteDT.clear();
            tblFusionesAnteDT.rows.add(JSON.parse(localStorage.getItem("fusionesanteriores")));
            tblFusionesAnteDT.columns.adjust().draw();
            alert_float('success', 'Fusion Anterior borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Fusion Anterior
     */
    $('#addbtnFusionAnterior').on('click', function(e) {
        $("#FusionAnteriorModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Fusion Anterior
     */
    $('#FusionAnteriorModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaFusionesAnteriores();
    })
 
    /***
     * funcion que hace reset del Modal de Fusiones Anteriores
     */
    function ResetTablaFusionesAnteriores() {
        $('#propietariosfusionanterior').prop('selectedIndex', -1);
        $('#propietariosfusionanterior').selectpicker('refresh'); 
        $("#lblpropietariosfusionanterior").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las Fusiones Anteriores
     */
    function TablaFusionesAnteriores() {
        tabla = JSON.parse(localStorage.getItem("fusionesanteriores"));
        tblFusionesAnteDT = 
        new $("#FusionesAnterioresTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES FUSION ACTUAL               ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de las fusiones Actuales
     */
    $('#AñadirFusionActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietariosfusionactual').val() || []) == '')) 
        {
            var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
            rowCount = tblFusionesActDT.rows().count();
            const valuesSelect = $('#propietariosfusionactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietariosfusionactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_participante": 2,
                        "fusion_id": tblFusionesDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='fusionesactuales_" + (rowCount) + "' class='btn btn-danger col-mrg deleteFusionActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    fusionesactuales.push(data);
                    rowCount++;
                });
            });
            console.log('fusionesactuales', fusionesactuales);
            try {
                $("#FusionActualModal").modal('hide');
                localStorage.setItem("fusionesactuales", JSON.stringify(fusionesactuales));
                tblFusionesActDT.clear();
                tblFusionesActDT.rows.add(JSON.parse(localStorage.getItem("fusionesactuales")));
                tblFusionesActDT.columns.adjust().draw();
                ResetTablaFusionesActuales();
                alert_float('success', 'Registro guardado exitosamente');
                console.log('fusionesactuales', fusionesactuales);
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietariosfusionactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion Actual');
        }
    })
 
    /***
     * funcion para borrar una Fusion Actual
     */
    $(document).on('click', '.deleteFusionActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesactuales.length == 1 ? fusionesactuales = [] : fusionesactuales.splice(id, 1);
            localStorage.setItem("fusionesactuales", JSON.stringify(UpdtIdRow(fusionesactuales, 'fusionesactuales_')));
            console.log('fusionesactuales', JSON.parse(localStorage.getItem("fusionesactuales")));
            tblFusionesActDT.clear();
            tblFusionesActDT.rows.add(JSON.parse(localStorage.getItem("fusionesactuales")));
            tblFusionesActDT.columns.adjust().draw();
            alert_float('success', 'Fusion Actual borrada exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal Fusion Actual
     */
    $('#addbtnFusionActual').on('click', function(e) {
        $("#FusionActualModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal Fusion Actual
     */
    $('#FusionActualModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaFusionesActuales();
    })
 
    /***
     * funcion que hace reset del Modal de Fusiones Actuales
     */
    function ResetTablaFusionesActuales() {
        $('#propietariosfusionactual').prop('selectedIndex', 1);
        $('#propietariosfusionactual').selectpicker('refresh'); 
        $("#lblpropietariosfusionactual").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Fusiones Actuales
     */
    function TablaFusionesActuales() {
        tabla = JSON.parse(localStorage.getItem("fusionesactuales"));
        tblFusionesActDT = 
        new $("#FusionesActualesTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE NOMBRE            ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Nombre
     */
    $('#camnomfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#oficinaCamNom').val() && 
            $('#estadoCamNom').val() && 
            $('#nro_solicitudCamNom').val() && 
            $('#fecha_solicitudCamNom').val() &&
            $('#nro_resolucionCamNom').val() &&
            $('#fecha_resolucionCamNom').val() &&
            $('#referenciaclienteCamNom').val() &&
            $('#comentarioCamNom').val()) 
            {
                
            var camnom = JSON.parse(localStorage.getItem("camnom"));
            var data = {
                'idRow': tblCamNomDT.rows().count() + 1,
                "tmp_camnom_id": tblCamNomDT.rows().count() + 1,
                "client_id": $('#clienteCamNom').val(),
                'client_id_name': $('#clienteCamNom option[value=' + $('#clienteCamNom').val() + ']').text(),
                "oficina_id": $('#oficinaCamNom').val(),
                'oficina_id_name': $('#oficinaCamNom option[value=' + $('#oficinaCamNom').val() + ']').text(),
                "staff_id": $('#staffCamNom').val(),
                'staff_id_name': $('#staffCamNom option[value=' + $('#staffCamNom').val() + ']').text(),
                "estado_id": $('#estadoCamNom').val(),
                'estado_id_name': $('#estadoCamNom option[value=' + $('#estadoCamNom').val() + ']').text(),
                "num_solicitud": $('#nro_solicitudCamNom').val(),
                "fecha_solicitud": $('#fecha_solicitudCamNom').val(),
                "num_resolucion": $('#nro_resolucionCamNom').val(),
                "fecha_resolucion": $('#fecha_resolucionCamNom').val(),
                "referencia_cliente": $('#referenciaclienteCamNom').val(),
                "comentarios": $('#comentarioCamNom').val(),
                "camnomanteriores": localStorage.getItem("camnomanteriores"),
                "camnomactuales": localStorage.getItem("camnomactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camnom_" + (tblCamNomDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCamNom'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            camnom.push(data);
            console.log('camnom', camnom);
            try {
                localStorage.setItem("camnom", JSON.stringify(camnom));
                tblCamNomDT.clear();
                tblCamNomDT.rows.add(JSON.parse(localStorage.getItem("camnom")));
                tblCamNomDT.columns.adjust().draw();
                tblCamNomAnteDT.clear().draw();
                tblCamNomActDT.clear().draw();
                ResetTablaCamNom();
                $("#AddCamNom").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbloficinaCamNom").css('color', $('#oficinaCamNom').val() ? color_lbl : 'red');
            $("#lblestadoCamNom").css('color', $('#estadoCamNom').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamNom").css('color', $('#nro_solicitudCamNom').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamNom").css('color', $('#fecha_solicitudCamNom').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamNom").css('color', $('#nro_resolucionCamNom').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamNom").css('color', $('#fecha_resolucionCamNom').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamNom").css('color', $('#referenciaclienteCamNom').val() ? color_lbl : 'red');
            $("#lblcomentarioCamNom").css('color', $('#comentarioCamNom').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos el Cambio de Nombre');
        }
    })
 
    /***
     * funcion para borrar una CamNom
     */
    $(document).on('click', '.deleteCamNom', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camnom = JSON.parse(localStorage.getItem("camnom"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnom.length == 1 ? camnom = [] : camnom.splice(id, 1);
            localStorage.setItem("camnom", JSON.stringify(UpdtIdRow(camnom, 'camnom_')));
            console.log('camnom', JSON.parse(localStorage.getItem("camnom")));
            tblCamNomDT.clear();
            tblCamNomDT.rows.add(JSON.parse(localStorage.getItem("camnom")));
            tblCamNomDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Nombre borrado exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#AddCamNom').on('hidden.bs.modal', function (e) {
        ResetTablaCamNom();
        $('#AddCamNom a[data-toggle="tab"]')[0].click();
        tblCamNomAnteDT.clear().draw();
        tblCamNomActDT.clear().draw();
        localStorage.setItem('camnomanteriores', JSON.stringify([]));
        localStorage.setItem('camnomactuales', JSON.stringify([]));
    })

    /***
     * funcion que se ejecuta antes de cerrar el Modal
     */
    $('#AddCamNom').on('hide.bs.modal', function (e) {
        if (!($('#clienteCamNom').val() || '') == '' || 
            !($('#oficinaCamNom').val() || '') == '' || 
            !($('#staffCamNom').val() || '') == '' || 
            !($('#estadoCamNom').val() || '') == '' || 
            !($('#nro_solicitudCamNom').val() || '') == '' || 
            !($('#fecha_solicitudCamNom').val() || '') == '' ||
            !($('#nro_resolucionCamNom').val() || '') == '' ||
            !($('#fecha_resolucionCamNom').val() || '') == '' ||
            !($('#referenciaclienteCamNom').val() || '') == '' ||
            !($('#comentarioCamNom').val() || '') == '' ||
            tblCamNomAnteDT.rows().count() > 0 || tblCamNomActDT.rows().count() > 0) 
        {
            if (!confirm('Hay datos sin guardar. ¿Esta seguro que desea salir?')) {
                e.preventDefault();
            }
        }
    })

    /***
     * funcion que hace reset del Modal de CamNom
     */
    function ResetTablaCamNom() {
        $("#camnomfrm")[0].reset();
        $('#clienteCamNom').prop('selectedIndex', 0);
        $('#clienteCamNom').selectpicker('refresh'); 
        $('#oficinaCamNom').prop('selectedIndex', 0);
        $('#oficinaCamNom').selectpicker('refresh'); 
        $('#staffCamNom').prop('selectedIndex', 0);
        $('#staffCamNom').selectpicker('refresh'); 
        $('#estadoCamNom').prop('selectedIndex', 0);
        $('#estadoCamNom').selectpicker('refresh'); 
        $("#lbloficinaCamNom").css('color', color_lbl);
        $("#lblestadoCamNom").css('color', color_lbl);
        $("#lblnro_solicitudCamNom").css('color', color_lbl);
        $("#lblfecha_solicitudCamNom").css('color', color_lbl);
        $("#lblnro_resolucionCamNom").css('color', color_lbl);
        $("#lblfecha_resolucionCamNom").css('color', color_lbl);
        $("#lblreferenciaclienteCamNom").css('color', color_lbl);
        $("#lblcomentarioCamNom").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las CamNom
     */
    function TablaCamNom() {
        tabla = JSON.parse(localStorage.getItem("camnom"));
        tblCamNomDT = 
        new $("#CamNomTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '5%', targets: 5 },
                { width: '5%', targets: 6 },
                { width: '5%', targets: 7 },
                { width: '5%', targets: 8 },
                { width: '5%', targets: 9 },
                { width: '15%', targets: 10 },
                { width: '5%', targets: 11 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'client_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'oficina_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'staff_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'estado_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'referencia_cliente',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********       FUNCIONES CAMBIO DE NOMBRE ANTERIOR         ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Nombre Anteriores
     */
    $('#AñadirCamNomAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscamnomanterior').val() || []) == '')) 
        {
            var camnomanteriores = JSON.parse(localStorage.getItem("camnomanteriores"));
            rowCount = tblCamNomAnteDT.rows().count();
            const valuesSelect = $('#propietarioscamnomanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscamnomanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_nombre": 1,
                        "cambio_nombre_id": tblCamNomDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camnomanteriores_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamNomAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    camnomanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('camnomanteriores', camnomanteriores);
            try {
                $("#CamNomAnteriorModal").modal('hide');
                localStorage.setItem("camnomanteriores", JSON.stringify(camnomanteriores));
                tblCamNomAnteDT.clear();
                tblCamNomAnteDT.rows.add(JSON.parse(localStorage.getItem("camnomanteriores")));
                tblCamNomAnteDT.columns.adjust().draw();
                ResetTablaCamNomAnteriores();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscamnomanterior").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos para el Cambio de Nombre Anterior');
        }
    })
 
    /***
     * funcion para borrar una CamNom Anterior
     */
    $(document).on('click', '.deleteCamNomAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camnomanteriores = JSON.parse(localStorage.getItem("camnomanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnomanteriores.length == 1 ? camnomanteriores = [] : camnomanteriores.splice(id, 1);
            localStorage.setItem("camnomanteriores", JSON.stringify(UpdtIdRow(camnomanteriores, 'camnomanteriores_')));
            console.log('camnomanteriores', JSON.parse(localStorage.getItem("camnomanteriores")));
            tblCamNomAnteDT.clear();
            tblCamNomAnteDT.rows.add(JSON.parse(localStorage.getItem("camnomanteriores")));
            tblCamNomAnteDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Nombre Anterior borrado exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal CamNom Anterior
     */
    $('#addbtnCamNomAnterior').on('click', function(e) {
        $("#CamNomAnteriorModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal CamNom Anterior
     */
    $('#CamNomAnteriorModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCamNomAnteriores();
    })
 
    /***
     * funcion que hace reset del Modal de CamNom Anteriores
     */
    function ResetTablaCamNomAnteriores() {
        $('#propietarioscamnomanterior').prop('selectedIndex', -1);
        $('#propietarioscamnomanterior').selectpicker('refresh'); 
        $("#lblpropietarioscamnomanterior").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las CamNom Anteriores
     */
    function TablaCamNomAnteriores() {
        tabla = JSON.parse(localStorage.getItem("camnomanteriores"));
        tblCamNomAnteDT = 
        new $("#CamNomAnterioresTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********       FUNCIONES CAMBIO DE NOMBRE ACTUAL           ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Nombre Actuales
     */
    $('#AñadirCamNomActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscamnomactual').val() || []) == '')) 
        {
            var camnomactuales = JSON.parse(localStorage.getItem("camnomactuales"));
            rowCount = tblCamNomActDT.rows().count();
            const valuesSelect = $('#propietarioscamnomactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscamnomactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_nombre": 2,
                        "cambio_nombre_id": tblCamNomDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camnomactuales_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamNomActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    camnomactuales.push(data);
                    rowCount++;
                });
            });
            console.log('camnomactuales', camnomactuales);
            try {
                $("#CamNomActualModal").modal('hide');
                localStorage.setItem("camnomactuales", JSON.stringify(camnomactuales));
                tblCamNomActDT.clear();
                tblCamNomActDT.rows.add(JSON.parse(localStorage.getItem("camnomactuales")));
                tblCamNomActDT.columns.adjust().draw();
                ResetTablaCamNomActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscamnomactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos para el Cambio de Nombre Actual');
        }
    })
 
    /***
     * funcion para borrar una CamNom Actual
     */
    $(document).on('click', '.deleteCamNomActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camnomactuales = JSON.parse(localStorage.getItem("camnomactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnomactuales.length == 1 ? camnomactuales = [] : camnomactuales.splice(id, 1);
            localStorage.setItem("camnomactuales", JSON.stringify(UpdtIdRow(camnomactuales, 'camnomactuales_')));
            console.log('camnomactuales', JSON.parse(localStorage.getItem("camnomactuales")));
            tblCamNomActDT.clear();
            tblCamNomActDT.rows.add(JSON.parse(localStorage.getItem("camnomactuales")));
            tblCamNomActDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Nombre Actual borrado exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal CamNom Actual
     */
    $('#addbtnCamNomActual').on('click', function(e) {
        $("#CamNomActualModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal CamNom Actual
     */
    $('#CamNomActualModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCamNomActuales();
    })
 
    /***
     * funcion que hace reset del Modal de CamNom Actuales
     */
    function ResetTablaCamNomActuales() {
        $('#propietarioscamnomactual').prop('selectedIndex', -1);
        $('#propietarioscamnomactual').selectpicker('refresh'); 
        $("#lblpropietarioscamnomactual").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las CamNom Actuales
     */
    function TablaCamNomActuales() {
        tabla = JSON.parse(localStorage.getItem("camnomactuales"));
        tblCamNomActDT = 
        new $("#CamNomActualesTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********          FUNCIONES CAMBIO DE DOMICILIO            ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Domicilio
     */
    $('#camdomfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#oficinaCamDom').val() && 
            $('#estadoCamDom').val() && 
            $('#nro_solicitudCamDom').val() && 
            $('#fecha_solicitudCamDom').val() &&
            $('#nro_resolucionCamDom').val() &&
            $('#fecha_resolucionCamDom').val() &&
            $('#referenciaclienteCamDom').val() &&
            $('#comentarioCamDom').val()) 
            {

            var camdom = JSON.parse(localStorage.getItem("camdom"));
            var data = {
                'idRow': tblCamDomDT.rows().count() + 1,
                "tmp_camdom_id": tblCamDomDT.rows().count() + 1,
                "client_id": $('#clienteCamDom').val(),
                'client_id_name': $('#clienteCamDom option[value=' + $('#clienteCamDom').val() + ']').text(),
                "oficina_id": $('#oficinaCamDom').val(),
                'oficina_id_name': $('#oficinaCamDom option[value=' + $('#oficinaCamDom').val() + ']').text(),
                "staff_id": $('#staffCamDom').val(),
                'staff_id_name': $('#staffCamDom option[value=' + $('#staffCamDom').val() + ']').text(),
                "estado_id": $('#estadoCamDom').val(),
                'estado_id_name': $('#estadoCamDom option[value=' + $('#estadoCamDom').val() + ']').text(),
                "num_solicitud": $('#nro_solicitudCamDom').val(),
                "fecha_solicitud": $('#fecha_solicitudCamDom').val(),
                "num_resolucion": $('#nro_resolucionCamDom').val(),
                "fecha_resolucion": $('#fecha_resolucionCamDom').val(),
                "referencia_cliente": $('#referenciaclienteCamDom').val(),
                "comentarios": $('#comentarioCamDom').val(),
                "camdomanteriores": localStorage.getItem("camdomanteriores"),
                "camdomactuales": localStorage.getItem("camdomactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camdom_" + (tblCamDomDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCamDom'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            camdom.push(data);
            console.log('camdom', camdom);
            try {
                localStorage.setItem("camdom", JSON.stringify(camdom));
                tblCamDomDT.clear();
                tblCamDomDT.rows.add(JSON.parse(localStorage.getItem("camdom")));
                tblCamDomDT.columns.adjust().draw();
                tblCamDomAnteDT.clear().draw();
                tblCamDomActDT.clear().draw();
                ResetTablaCamDom();
                $("#AddCamDom").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lbloficinaCamDom").css('color', $('#oficinaCamDom').val() ? color_lbl : 'red');
            $("#lblestadoCamDom").css('color', $('#estadoCamDom').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamDom").css('color', $('#nro_solicitudCamDom').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamDom").css('color', $('#fecha_solicitudCamDom').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamDom").css('color', $('#nro_resolucionCamDom').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamDom").css('color', $('#fecha_resolucionCamDom').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamDom").css('color', $('#referenciaclienteCamDom').val() ? color_lbl : 'red');
            $("#lblcomentarioCamDom").css('color', $('#comentarioCamDom').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos el Cambio de Domicilio');
        }
    })
 
    /***
     * funcion para borrar una CamDom
     */
    $(document).on('click', '.deleteCamDom', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camdom = JSON.parse(localStorage.getItem("camdom"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdom.length == 1 ? camdom = [] : camdom.splice(id, 1);
            localStorage.setItem("camdom", JSON.stringify(UpdtIdRow(camdom, 'camdom_')));
            console.log('camdom', JSON.parse(localStorage.getItem("camdom")));
            tblCamDomDT.clear();
            tblCamDomDT.rows.add(JSON.parse(localStorage.getItem("camdom")));
            tblCamDomDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Domicilio borrado exitosamente');
        }
    })

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#AddCamDom').on('hidden.bs.modal', function (e) {
        ResetTablaCamDom();
        $('#AddCamDom a[data-toggle="tab"]')[0].click();
        tblCamDomAnteDT.clear().draw();
        tblCamDomActDT.clear().draw();
        localStorage.setItem('camdomanteriores', JSON.stringify([]));
        localStorage.setItem('camdomactuales', JSON.stringify([]));
    })

    /***
     * funcion que se ejecuta antes de cerrar el Modal
     */
    $('#AddCamDom').on('hide.bs.modal', function (e) {
        if (!($('#clienteCamDom').val() || '') == '' || 
            !($('#oficinaCamDom').val() || '') == '' || 
            !($('#staffCamDom').val() || '') == '' || 
            !($('#estadoCamDom').val() || '') == '' || 
            !($('#nro_solicitudCamDom').val() || '') == '' || 
            !($('#fecha_solicitudCamDom').val() || '') == '' ||
            !($('#nro_resolucionCamDom').val() || '') == '' ||
            !($('#fecha_resolucionCamDom').val() || '') == '' ||
            !($('#referenciaclienteCamDom').val() || '') == '' ||
            !($('#comentarioCamDom').val() || '') == '' ||
            tblCamDomAnteDT.rows().count() > 0 || tblCamDomActDT.rows().count() > 0) 
        {
            if (!confirm('Hay datos sin guardar. ¿Esta seguro que desea salir?')) {
                e.preventDefault();
            }
        }
    })

    /***
     * funcion que hace reset del Modal de CamDom
     */
    function ResetTablaCamDom() {
        $("#camdomfrm")[0].reset();
        $('#clienteCamDom').prop('selectedIndex', 0);
        $('#clienteCamDom').selectpicker('refresh'); 
        $('#oficinaCamDom').prop('selectedIndex', 0);
        $('#oficinaCamDom').selectpicker('refresh'); 
        $('#staffCamDom').prop('selectedIndex', 0);
        $('#staffCamDom').selectpicker('refresh'); 
        $('#estadoCamDom').prop('selectedIndex', 0);
        $('#estadoCamDom').selectpicker('refresh'); 
        $("#lbloficinaCamDom").css('color', color_lbl);
        $("#lblestadoCamDom").css('color', color_lbl);
        $("#lblnro_solicitudCamDom").css('color', color_lbl);
        $("#lblfecha_solicitudCamDom").css('color', color_lbl);
        $("#lblnro_resolucionCamDom").css('color', color_lbl);
        $("#lblfecha_resolucionCamDom").css('color', color_lbl);
        $("#lblreferenciaclienteCamDom").css('color', color_lbl);
        $("#lblcomentarioCamDom").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las CamDom
     */
    function TablaCamDom() {
        tabla = JSON.parse(localStorage.getItem("camdom"));
        tblCamDomDT = 
        new $("#CamDomTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '5%', targets: 5 },
                { width: '5%', targets: 6 },
                { width: '5%', targets: 7 },
                { width: '5%', targets: 8 },
                { width: '5%', targets: 9 },
                { width: '15%', targets: 10 },
                { width: '5%', targets: 11 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'client_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'oficina_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'staff_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'estado_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_solicitud',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'num_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'fecha_resolucion',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'referencia_cliente',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
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



    /* ####################################################################### */
    /* **********       FUNCIONES CAMBIO DE DOMICILIO ANTERIOR         ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Domicilio Anteriores
     */
    $('#AñadirCamDomAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscamdomanterior').val() || []) == '')) 
        {
            var camdomanteriores = JSON.parse(localStorage.getItem("camdomanteriores"));
            rowCount = tblCamDomAnteDT.rows().count();
            const valuesSelect = $('#propietarioscamdomanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscamdomanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_domicilio": 1,
                        "cambio_domicilio_id": tblCamDomDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camdomanteriores_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamDomAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    camdomanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('camdomanteriores', camdomanteriores);
            try {
                $("#CamDomAnteriorModal").modal('hide');
                localStorage.setItem("camdomanteriores", JSON.stringify(camdomanteriores));
                tblCamDomAnteDT.clear();
                tblCamDomAnteDT.rows.add(JSON.parse(localStorage.getItem("camdomanteriores")));
                tblCamDomAnteDT.columns.adjust().draw();
                ResetTablaCamDomAnteriores();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscamdomanterior").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos para el Cambio de Domicilio Anterior');
        }
    })
 
    /***
     * funcion para borrar una CamDom Anterior
     */
    $(document).on('click', '.deleteCamDomAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camdomanteriores = JSON.parse(localStorage.getItem("camdomanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdomanteriores.length == 1 ? camdomanteriores = [] : camdomanteriores.splice(id, 1);
            localStorage.setItem("camdomanteriores", JSON.stringify(UpdtIdRow(camdomanteriores, 'camdomanteriores_')));
            console.log('camdomanteriores', JSON.parse(localStorage.getItem("camdomanteriores")));
            tblCamDomAnteDT.clear();
            tblCamDomAnteDT.rows.add(JSON.parse(localStorage.getItem("camdomanteriores")));
            tblCamDomAnteDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Domicilio Anterior borrado exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal CamDom Anterior
     */
    $('#addbtnCamDomAnterior').on('click', function(e) {
        $("#CamDomAnteriorModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal CamDom Anterior
     */
    $('#CamDomAnteriorModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCamDomAnteriores();
    })
 
    /***
     * funcion que hace reset del Modal de CamDom Anteriores
     */
    function ResetTablaCamDomAnteriores() {
        $('#propietarioscamdomanterior').prop('selectedIndex', -1);
        $('#propietarioscamdomanterior').selectpicker('refresh'); 
        $("#lblpropietarioscamdomanterior").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las CamDom Anteriores
     */
    function TablaCamDomAnteriores() {
        tabla = JSON.parse(localStorage.getItem("camdomanteriores"));
        tblCamDomAnteDT = 
        new $("#CamDomAnterioresTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********       FUNCIONES CAMBIO DE DOMICILIO ACTUAL           ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los Cambios de Domicilio Actuales
     */
    $('#AñadirCamDomActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscamdomactual').val() || []) == '')) 
        {
            var camdomactuales = JSON.parse(localStorage.getItem("camdomactuales"));
            rowCount = tblCamDomActDT.rows().count();
            const valuesSelect = $('#propietarioscamdomactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscamdomactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_domicilio": 2,
                        "cambio_domicilio_id": tblCamDomDT.rows().count() + 1,
                        'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='camdomactuales_" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamDomActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                    }
                    camdomactuales.push(data);
                    rowCount++;
                });
            });
            console.log('camdomactuales', camdomactuales);

            try {
                $("#CamDomActualModal").modal('hide');
                localStorage.setItem("camdomactuales", JSON.stringify(camdomactuales));
                tblCamDomActDT.clear();
                tblCamDomActDT.rows.add(JSON.parse(localStorage.getItem("camdomactuales")));
                tblCamDomActDT.columns.adjust().draw();
                ResetTablaCamDomActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioscamdomactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos para el Cambio de Domicilio Actual');
        }
    })
 
    /***
     * funcion para borrar una CamDom Actual
     */
    $(document).on('click', '.deleteCamDomActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var camdomactuales = JSON.parse(localStorage.getItem("camdomactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdomactuales.length == 1 ? camdomactuales = [] : camdomactuales.splice(id, 1);
            localStorage.setItem("camdomactuales", JSON.stringify(UpdtIdRow(camdomactuales, 'camdomactuales_')));
            console.log('camdomactuales', JSON.parse(localStorage.getItem("camdomactuales")));
            tblCamDomActDT.clear();
            tblCamDomActDT.rows.add(JSON.parse(localStorage.getItem("camdomactuales")));
            tblCamDomActDT.columns.adjust().draw();
            alert_float('success', 'Cambio de Domicilio Actual borrado exitosamente');
        }
    })

    /***
     * funcion para abrir el Modal CamDom Actual
     */
    $('#addbtnCamDomActual').on('click', function(e) {
        $("#CamDomActualModal").modal('show');
        //$("#AddCesion").modal('hide');
    })

    /***
     * funcion que se ejecuta al cerrar el Modal CamDom Actual
     */
    $('#CamDomActualModal').on('hidden.bs.modal', function (e) {
        //$("#AddCesion").modal('show');
        ResetTablaCamDomActuales();
    })
 
    /***
     * funcion que hace reset del Modal de CamDom Actuales
     */
    function ResetTablaCamDomActuales() {
        $('#propietarioscamdomactual').prop('selectedIndex', -1);
        $('#propietarioscamdomactual').selectpicker('refresh'); 
        $("#lblpropietarioscamdomactual").css('color', color_lbl);
    }
 
    /***
     * funcion que configura el Datatable de las CamDom Actuales
     */
    function TablaCamDomActuales() {
        tabla = JSON.parse(localStorage.getItem("camdomactuales"));
        tblCamDomActDT = 
        new $("#CamDomActualesTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: tabla,
            destroy: true,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '85%', targets: 1 },
                { width: '10%', targets: 2 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-center'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES DOCUMENTOS                  ********** */
    /* ####################################################################### */

    /***
     * funcion para guardar el formulario de los documentos
     */
    $("#documentosfrmsubmit").on('click', function(e) {
        e.preventDefault();
        if ($('#doc_descripcion').val() && $('#doc_comentario').val()
            && $('#doc_archivo').val() && $('#doc_archivo').get(0).files[0].type == 'application/pdf') {
                
            documentos = JSON.parse(localStorage.getItem('documentos'));
            rowCount = tblDocumentosDT.rows().count();
            data = {
                'idRow': rowCount + 1,
                'descripcion': $('#doc_descripcion').val(),
                'comentarios': $('#doc_comentario').val(),
                'path': $('#doc_archivo').get(0).files[0].name,
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='documentos_" + (rowCount) + "' class='btn btn-danger col-mrg deleteDocumento'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            /* Creamos un elemento input file duplicado del original para el archivo seleccionado */
            var inputDoc = $('#doc_archivo').clone( true );
            inputDoc.attr('id', 'doc_archivo_' + (rowCount + 1));
            $('#docs_invisible').append( inputDoc );
            
            documentos.push(data);
            console.log('documentos', documentos);
            try {
                localStorage.setItem("documentos", JSON.stringify(documentos));
                tblDocumentosDT.clear();
                tblDocumentosDT.rows.add(JSON.parse(localStorage.getItem("documentos")));
                tblDocumentosDT.columns.adjust().draw();
                ResetTablaDocumento();
                $("#docModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }
        }else if ($('#doc_archivo').val() && $('#doc_archivo').get(0).files[0].type != 'application/pdf'){
            $("#lbldoc_archivo").css('color', 'red');
            $("#lbldoc_descripcion").css('color', $('#doc_descripcion').val() ? color_lbl : 'red');
            $("#lbldoc_comentario").css('color', $('#doc_comentario').val() ? color_lbl : 'red');
            alert_float('danger', 'Solamente se pueden subir archivos PDF');
        }else{
            $("#lbldoc_descripcion").css('color', $('#doc_descripcion').val() ? color_lbl : 'red');
            $("#lbldoc_comentario").css('color', $('#doc_comentario').val() ? color_lbl : 'red');
            $("#lbldoc_archivo").css('color', $('#doc_archivo').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Documento');
        }
    });

    /***
     * funcion para borrar un Documento
     */
    $(document).on('click', '.deleteDocumento', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var documentos = JSON.parse(localStorage.getItem("documentos"));
        if (confirm("¿Esta seguro de eliminar este registro?")) {
            //elimino el doc hidden
            $('#doc_archivo_' + documentos[id].idRow).remove();
            documentos.length == 1 ? documentos = [] : documentos.splice(id, 1);
            localStorage.setItem("documentos", JSON.stringify(UpdtIdRowDoc(documentos, 'documentos_')));
            console.log('DIV', $('#docs_invisible'));
            console.log('documentos', JSON.parse(localStorage.getItem("documentos")));
            tblDocumentosDT.clear();
            tblDocumentosDT.rows.add(JSON.parse(localStorage.getItem("documentos")));
            tblDocumentosDT.columns.adjust().draw();
            alert_float('success', 'Documento eliminado exitosamente');
        }
     });

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#docModal').on('hidden.bs.modal', function (e) {
        ResetTablaDocumento();
    })

    /***
     * funcion que hace reset del Modal de Documento
     */
    function ResetTablaDocumento() {
        $("#documentosFrm")[0].reset();
        $("#lbldoc_descripcion").css('color', color_lbl);
        $("#lbldoc_comentario").css('color', color_lbl);
        $("#lbldoc_archivo").css('color', color_lbl);
    }

    /***
     * funcion que actualiza el IdRow de la tabla Documentos
     */
    function UpdtIdRowDoc(tablaDT){
        jQuery.each(tablaDT, function(index, item) {
            //cambio el ID del input file hidden con el nuevo ID según el idRow
            $('#doc_archivo_' + item.idRow).attr('id', 'doc_archivo_' + (index + 1)); 
            item.acciones = item.acciones.replace("button id='documentos_" + (item.idRow-1) +"'", "button id='documentos_" + index +"'");
            item.idRow = index + 1;
        });
        return tablaDT;
    }

    /***
     * funcion que configura el Datatable de las Documento
     */
    function TablaDocumento() {
        table = JSON.parse(localStorage.getItem("documentos"));
        tblDocumentosDT = 
        new $("#DocTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: table,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '25%', targets: 1 },
                { width: '30%', targets: 2 },
                { width: '30%', targets: 3 },
                { width: '5%', targets: 4 }
            ],
            columns: [
                {
                    data: 'idRow',
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
                    data: 'comentarios',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'path',
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
    }



    /* ####################################################################### */
    /* **********             FUNCIONES FACTURAS                    ********** */
    /* ####################################################################### */

    /***
     * funcion para agregar una nueva factura
     */
    $(document).on('click', '.newfact', function(e) {

        if (!confirm('Archivos de Signo y Documentos deberá agregarlos nuevamente. ¿Está seguro que desea continuar?')) {
                e.preventDefault();
        }else{
            /* Guardamos la info de los forms dentro del localStorage */
            const Formulario = $('#solicitudfrm');
            const data  = new FormData(Formulario[0]);
            const formJSON  = Object.fromEntries(data.entries());
            formJSON.topics = data.getAll("topics");
            formJSON.pais_id = $('#pais_id').val();
            formJSON.solicitantes_id = $('#solicitantes_id').val();
            JSONresults = JSON.stringify(formJSON, null, 2);
            localStorage.setItem("solicitudfrm", JSONresults);
            console.log('formLocalstorage', JSON.parse(localStorage.getItem('solicitudfrm')));
        }
    })

    /***
     * funcion para guardar el formulario de Facturas
     */
    $("#facturaMarcaSubmit").on('click', function(e) {
        e.preventDefault();
        if ($('#facturaId').val()) {
            var facturas = JSON.parse(localStorage.getItem("facturas"));
            var factDet = (invoicesExtra) ? invoicesExtra.find( record => record.id === $('#facturaId').val()) : '';
            console.log('factDet', factDet);
            factFecha = (factDet) ? factDet.date : '';
            factStatus = (factDet) ? factDet.status : '';
            
            var data = {
                'idRow': tblFacturasDT.rows().count() + 1,
                'facturas_id': $('#facturaId').val(),
                'factNum': $("#facturaId option[value=" + $( "#facturaId").val() + "]").text(),
                "factFecha": factFecha,
                'factEstatus': factStatus,
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='facturas_" + (tblFacturasDT.rows().count()) + "' class='btn btn-danger col-mrg deleteFactura'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }

            facturas.push(data);
            console.log('facturas', facturas);
            try {
                localStorage.setItem("facturas", JSON.stringify(facturas));
                tblFacturasDT.clear();
                tblFacturasDT.rows.add(JSON.parse(localStorage.getItem("facturas")));
                tblFacturasDT.columns.adjust().draw();
                ResetTablaFacturas();
                $("#facturaModal").modal('hide');
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }
        }else{
            console.log('Entre al else');
            $("#lblfacturaId").css('color', $('#facturas').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Factura');
        }
    });

    /***
     * funcion para borrar un Documento
     */
    $(document).on('click', '.deleteFactura', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var facturas = JSON.parse(localStorage.getItem("facturas"));
        if (confirm("¿Esta seguro de eliminar este registro?")) {
            //elimino el doc hidden
            $('#doc_archivo_' + facturas[id].idRow).remove();
            facturas.length == 1 ? facturas = [] : facturas.splice(id, 1);
            localStorage.setItem("facturas", JSON.stringify(UpdtIdRowDoc(facturas, 'facturas_')));
            console.log('DIV', $('#docs_invisible'));
            console.log('facturas', JSON.parse(localStorage.getItem("facturas")));
            tblFacturasDT.clear();
            tblFacturasDT.rows.add(JSON.parse(localStorage.getItem("facturas")));
            tblFacturasDT.columns.adjust().draw();
            alert_float('success', 'Factura eliminada exitosamente');
        }
     });

    /***
     * funcion que se ejecuta al cerrar el Modal
     */
    $('#facturaModal').on('hidden.bs.modal', function (e) {
        console.log('Entre al hidden');
        ResetTablaFacturas();
    })

    /***
     * funcion que hace reset del Modal de Documento
     */
    function ResetTablaFacturas() {
        console.log('Entre al ResetTablaFacturas');
        $("#invoiceMarcaFrm")[0].reset();
        $("#lblfacturaId").css('color', color_lbl);
    }

    /***
     * funcion que configura el Datatable de las Facturas
     */
    function TablaFacturas() {
        table = JSON.parse(localStorage.getItem("facturas"));
        tblFacturasDT = 
        new $("#FacturasTbl").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            autoWidth: false,
            data: table,
            destroy: true,
            dataSrc: '',
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '25%', targets: 1 },
                { width: '30%', targets: 2 },
                { width: '30%', targets: 3 },
                { width: '5%', targets: 4 }
            ],
            columns: [
                {
                    data: 'idRow',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'factNum',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'factFecha',
                    render: function (data, type, row)
                    {
                        return "<div class='col-md-12 text-left'>" + data + "</div>"
                    }
                },
                {
                    data: 'factEstatus',
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
    }

    /*
                                                'name'=> 'tipo_registro_id',
                                              'id' => 'tipo_registro_id'
                                            
                                      
                                            
                                                'name' => 'client_id',
                                                'id' => 'client_id'
                                            
                                     
                                            
                                              'name' => 'oficina_id',
                                              'id' => 'oficina_id'
                                            
                                        
                                            
                                              'name' => 'staff_id',
                                              'id' => 'staff_id'
                                            
                                  
                                                'id' => 'pais_id',
                                                'name' => 'pais_id',
                                          
                                                'id' => 'resumen',
                                                'name' => 'resumen',
                                            
                                                'id' => 'inventores_id',
                                                'name' => 'inventores_id',
                                          
                                                'id' => 'solicitantes_id',
                                                'name' => 'solicitantes_id',
                                            
                                                'id' => 'clasificacion',
                                                'name' => 'clasificacion',
                                    
                                                'id' => 'ref_interna',
                                                'name' => 'ref_interna',
                                         
                                                'id' => 'ref_cliente',
                                                'name' => 'ref_cliente',
                                            
                                                'id' => 'carpeta',
                                                'name' => 'carpeta',
                                       
                                                'id' => 'libro',
                                                'name' => 'libro',
                                     
                                                'id' => 'tomo',
                                                'name' => 'tomo',
                                               
                                                'id' => 'folio',
                                                'name' => 'folio',
                                           
                                            
                                                'name' => 'estado_id',
                                                'id' => 'estado_id'
                                            
                                         
                                                'id' => 'solicitud',
                                                'name' => 'solicitud',
                                           
                                                'id' => 'fecha_solicitud',
                                                'name' => 'fecha_solicitud',
                                             
                                                'id' => 'registro',
                                                'name' => 'registro',
                                         
                                                'id' => 'fecha_registro',
                                                'name' => 'fecha_registro',
                                               
                                                'id' => 'certificado',
                                                'name' => 'certificado',
                                          
                                                'id' => 'fecha_certificado',
                                                'name' => 'fecha_certificado',
                            
                                                'id' => 'fecha_vencimiento',
                                                'name' => 'fecha_vencimiento',
                                          
                                                'id' => 'pct_solicitud',
                                                'name' => 'pct_solicitud',
                                            
                                                'id' => 'pct_publicacion',
                                                'name' => 'pct_publicacion',
                                           
                                                'id' => 'pct_anualidad_desde',
                                                'name' => 'pct_anualidad_desde',
                                         
                                                'id' => 'pct_anualidad_hasta',
                                                'name' => 'pct_anualidad_hasta',
                            
                                                'id' => 'comentarios',
                                                'name' => 'comentarios',
                                
    */



        /*
          `id` ,
  `tipo_registro_id`,
  `client_id`  ,
  `oficina_id` ) ,
  `staff_id` ,
  `pais_id` ,
  `titulo` ,
  `resumen` ,
  `clasificacion` ,
  `ref_interna` ,
  `ref_cliente` ,
  `carpeta` ,
  `libro` ,
  `tomo` ,
  `folio` ,
  `estado_id` ,
  `nro_solicitud` ,
  `fecha_solicitud` ,
  `nro_registro` ,
  `fecha_registro` ,
  `nro_certificado` ,
  `fecha_vencimiento_certificado` ,
  `pct_nro_solicitud` ,
  `pct_fecha_solicitud` ,
  `pct_nro_publicacion` ,
  `pct_fecha_publicacion` ,
  `is_pago_anual` tinyint(1) ,
  `anualidad_desde` ,
  `anualidad_hasta` ,
  `comentarios` ,
        */



    /* ##############################FUNCIONES GENERALES############################### */
    /***
     * funcion para guardar la Solicitud de Marca con toda la data
     */
    $(document).on('submit', "#solicitudfrm", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('tipo_registro_id', $('#tipo_registro_id').val());
        formData.append('client_id', $('#client_id').val());
        formData.append('oficina_id', $('#oficina_id').val());
        formData.append('staff_id', $('#staff_id').val());
        //Pais_id fill
       // pais_id = JSON.stringify($('#pais_id').val());
        formData.append('pais_id', $('#pais_id').val());
        formData.append('titulo', $('#titulo').val());
        formData.append('resumen', $('#resumen').val());
       // inventores_id = JSON.stringify($('#inventores_id').val());
        //console.log("inventores_id : ",inventores_id);
        formData.append('inventores_id', $('#inventores_id').val());
        //solicitantes_id fill
        solicitantes_id = JSON.stringify($('#solicitantes_id').val());
        console.log("solicitantes_id : ",solicitantes_id);
        formData.append('solicitantes_id', solicitantes_id);
        formData.append('clasificacion', $('#clasificacion').val());
        formData.append('ref_interna', $('#ref_interna').val());
        formData.append('ref_cliente', $('#ref_cliente').val());
        formData.append('carpeta', $('#carpeta').val());
        formData.append('libro', $('#libro').val());
        formData.append('tomo', $('#tomo').val());
        formData.append('folio', $('#folio').val());
        formData.append('estado_id', $('#estado_id').val());
        formData.append('solicitud', $('#solicitud').val());
        formData.append('fecha_solicitud', $('#fecha_solicitud').val());
        formData.append('registro', $('#registro').val());
        formData.append('fecha_registro', $('#fecha_registro').val());
        formData.append('certificado', $('#certificado').val());
        formData.append('fecha_certificado', $('#fecha_certificado').val());
        formData.append('pct_solicitud',$('#pct_solicitud').val());
        formData.append('pct_publicacion',$('#pct_publicacion').val())
        formData.append('pct_anualidad_desde',$('#pct_anualidad_desde').val())
        formData.append('pct_anualidad_hasta',$('#pct_anualidad_hasta').val())
        formData.append('comentarios', $('#comentarios').val());

        
        

        $.ajax({
            url: '<?php echo admin_url('pi/patentes/SolicitudesController/store'); ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log("response ",response);
                // const obj = JSON.parse(response);
                // if (obj.code == 201) {
                //     alert_float('danger', 'Se han encontrado errores en la Solicitud!');
                //     jQuery.each(obj.error, function(item, val) {
                //         $('.' + item + '_error').html(val);
                //     });
                // }else if (obj.code == 500){
                //     alert_float('danger', obj.error);
                // }else{
                //     alert_float('success', 'Solicitud guardada con éxito!');
                //     location.replace('<?php //echo admin_url("pi/MarcasSolicitudesController/edit/{$id}"); ?>');
                // }
                
            },
            fail: function(request) {
                console.log("Error ");
                <?php //if (ENVIRONMENT != 'production') { ?>
                    //alert(response);
                <?php //} else { ?>
                    //alert('ha ocurrido un error');
                <?php //} ?>
            }
        });
    });

    /*
    $(document).on('submit', "#solicitudfrm", function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('tipo_registro_id', $('#tipo_registro_id').val());
        formData.append('client_id', $('#client_id').val());
        formData.append('oficina_id', $('#oficina_id').val());
        formData.append('staff_id', $('#staff_id').val());
        //Pais_id fill
        pais_id = JSON.stringify($('#pais_id').val());
        formData.append('pais_id', pais_id);
        formData.append('titulo', $('#titulo').val());
        formData.append('resumen', $('#resumen').val());
        inventores_id = JSON.stringify($('#inventores_id').val());
        console.log("inventores_id : ",inventores_id);
        formData.append('inventores_id', inventores_id);
        //solicitantes_id fill
        solicitantes_id = JSON.stringify($('#solicitantes_id').val());
        console.log("solicitantes_id : ",solicitantes_id);
        formData.append('solicitantes_id', solicitantes_id);
        formData.append('clasificacion', $('#clasificacion').val());
        formData.append('ref_interna', $('#ref_interna').val());
        formData.append('ref_cliente', $('#ref_cliente').val());
        formData.append('carpeta', $('#carpeta').val());
        formData.append('libro', $('#libro').val());
        formData.append('tomo', $('#tomo').val());
        formData.append('folio', $('#folio').val());
        formData.append('estado_id', $('#estado_id').val());
        formData.append('solicitud', $('#solicitud').val());
        formData.append('fecha_solicitud', $('#fecha_solicitud').val());
        formData.append('registro', $('#registro').val());
        formData.append('fecha_registro', $('#fecha_registro').val());
        formData.append('certificado', $('#certificado').val());
        formData.append('fecha_certificado', $('#fecha_certificado').val());
        formData.append('pct_solicitud',$('#pct_solicitud').val());
        formData.append('pct_publicacion',$('#pct_publicacion').val())
        formData.append('pct_anualidad_desde',$('#pct_anualidad_desde').val())
        formData.append('pct_anualidad_hasta',$('#pct_anualidad_hasta').val())
        formData.append('comentarios', $('#comentarios').val());

        formData.append('tipo_solicitud_id', $('#tipo_solicitud_id').val());
        //formData.append('primer_uso', $('input[name=primer_uso').val());
        formData.append('prueba_uso', $('#prueba_uso').val());
        formData.append('fecha_vencimiento', $('#fecha_vencimiento').val());

        formData.append('signo_archivo', $('#signo_archivo').val() ? $('#signo_archivo')[0].files[0] : '');
        formData.append('signonom', $('#signonom').val());
        formData.append('signo_archivo_desc', $('#descripcion_signo').val());

        formData.append('tipo_signo_id', $('#tipo_signo_id').val());
        formData.append('clase_niza_id', localStorage.getItem("clase_niza"));
        formData.append('prioridad_id', localStorage.getItem("prioridad"));
        formData.append("publicacion_id", localStorage.getItem("publicacion"));
        formData.append("eventos_id", localStorage.getItem("eventos"));
        formData.append("tareas_id", localStorage.getItem("tareas"));
        formData.append("cesiones_id", localStorage.getItem("cesiones"));
        formData.append("licencias_id", localStorage.getItem("licencias"));
        formData.append("fusiones_id", localStorage.getItem("fusiones"));
        formData.append("camnom_id", localStorage.getItem("camnom"));
        formData.append("camdom_id", localStorage.getItem("camdom"));
        formData.append("doc_id", localStorage.getItem("documentos"));
        
        var docu = JSON.parse(localStorage.getItem("documentos"));
        docu.forEach(function(item){
            formData.append("doc_archivo_" + item.idRow, $("#doc_archivo_" + item.idRow).get(0).files[0]);
        });
        formData.append("facturas_id", localStorage.getItem("facturas"));
        

        $.ajax({
            url: '<?php //echo admin_url('pi/patentes/SolicitudesController/store'); ?>',
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
                    location.replace('<?php //echo admin_url("pi/MarcasSolicitudesController/edit/{$id}"); ?>');
                }
                
            },
            fail: function(request) {
                <?php //if (ENVIRONMENT != 'production') { ?>
                    alert(response);
                <?php //} else { ?>
                    alert('ha ocurrido un error');
                <?php //} ?>
            }
        });
    });
    */
    /***
     * funcion que actualiza el IdRow de cada tabla
     */
    function UpdtIdRow(tablaDT, tipoAnexo){
        jQuery.each(tablaDT, function(index, item) {
            item.acciones = item.acciones.replace("button id='" + tipoAnexo + (item.idRow-1) +"'", "button id='" + tipoAnexo + index +"'");
            item.idRow = index + 1;
        });
        return tablaDT;
    }
    
    /***
     * funcion que restaura el Formulario desde el localstorage
     */
    function RestaurarFormulario() {
        const Form = JSON.parse(localStorage.getItem('solicitudfrm'));
        SetSelectValue($('#tipo_registro_id'), Form['tipo_registro_id']);
        SetSelectValue($('#client_id'), Form['client_id']);
        SetSelectValue($('#oficina_id'), Form['oficina_id']);
        SetSelectValue($('#staff_id'), Form['staff_id']);
        SetSelectValue($('#pais_id'), Form['pais_id']);
        SetSelectValue($('#solicitantes_id'), Form['solicitantes_id']);
        $('#signonom').val(Form['signonom']);
        SetSelectValue($('#tipo_signo_id'), Form['tipo_signo_id']);
        SetSelectValue($('#tipo_solicitud_id'), Form['tipo_solicitud_id']);
        $('#ref_interna').val(Form['ref_interna']);
        $('#ref_cliente').val(Form['ref_cliente']);
        $('#prueba_uso').val(Form['prueba_uso']);
        $('#carpeta').val(Form['carpeta']);
        $('#libro').val(Form['libro']);
        $('#tomo').val(Form['tomo']);
        $('#folio').val(Form['folio']);
        $('#comentarios').val(Form['comentarios']);
        SetSelectValue($('#estado_id'), Form['estado_id']);
        $('#solicitud').val(Form['solicitud']);
        $('#fecha_solicitud').val(Form['fecha_solicitud']);
        $('#registro').val(Form['registro']);
        $('#fecha_registro').val(Form['fecha_registro']);
        $('#certificado').val(Form['certificado']);
        $('#fecha_certificado').val(Form['fecha_certificado']);
        $('#fecha_vencimiento').val(Form['fecha_vencimiento']);
    }
    
    /***
     * funcion que restaura el Formulario desde el localstorage
     */
    function SetSelectValue(select, valor) {
        select.val(valor);
        select.selectpicker('refresh');
    }

    /***
     * funcion para guardar dar formato a la fecha
     */
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

    /***
     * deshabilita escribir en los input calendar
     */
    $(".calendar").on('keyup', function(e) {
        e.preventDefault();
        $(".calendar").val('');
    })

    /***
     * configura los select de 1 selección
     */
    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })

    /***
     * configura los select de selección múltiple
     */
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });

    /***
     * funcion para moverse al siguiente tab
     */
    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    /***
     * funcion para moverse al tab anterior
     */
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    /***
     * AL TERMINAR DE CARGAR LA PÁGINA = $( document ).ready(function() {
     */
    /* Página cargada en su totalidad */
    $(window).on('load', function() {
        /* Cierra el Modal de Carga */
        /* $('#modal-loading').modal('hide');
        
        /* Inicilizamos los Datatables */
        /* TablaClases();
        TablaPrioridad();
        TablaPublicacion();
        TablaEventos();
        TablaTareas();
        TablaCesiones();
        TablaCesionesAnteriores();
        TablaCesionesActuales();
        TablaLicencia();
        TablaLicenciasAnteriores();
        TablaLicenciasActuales();
        TablaFusion();
        TablaFusionesAnteriores();
        TablaFusionesActuales();
        TablaCamNom();
        TablaCamNomAnteriores();
        TablaCamNomActuales();
        TablaCamDom();
        TablaCamDomAnteriores();
        TablaCamDomActuales(); */
    });

    /* Estructura lista */
    $(function() {

        /* Se inicializa el localStorage de Documentos. Se pierde todo si agregan una factura nueva */
        localStorage.setItem('documentos', JSON.stringify([]));
        
        /* Reviso si viene el ID de una factura nueva */
        if ($('#factNumber').val()) {
            /* Restauro el formulario completo */
            RestaurarFormulario();

            /* Inicicio el Datatable de Facturas */
            TablaFacturas();

            /* Agrego la nueva factura al datatable de Facturas */
            if (localStorage.getItem("facturas") == null){
                localStorage.setItem('facturas', JSON.stringify([]));
            }
            var facturas = JSON.parse(localStorage.getItem("facturas"));
            rowCount = tblFacturasDT.rows().count();
            var data = {
                'idRow': rowCount + 1,
                'facturas_id': $('#factId').val(),
                "factNum": $('#factNumber').val(),
                "factFecha": $('#factFecha').val(),
                'factEstatus': $('#factEstatus').val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='facturas_" + (rowCount) + "' class='btn btn-danger col-mrg deleteFactura'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            facturas.push(data);
            localStorage.setItem("facturas", JSON.stringify(facturas));
            console.log('facturas', facturas);
            tblFacturasDT.clear();
            tblFacturasDT.rows.add(JSON.parse(localStorage.getItem("facturas")));
            tblFacturasDT.columns.adjust().draw();

        }else{
            /* Elimino del localStorage el Form si está creado*/
            if (localStorage.getItem("solicitudfrm") != null){
                localStorage.removeItem('solicitudfrm');
            }

            /*Inicializamos el localstorage*/
            localStorage.setItem("clase_niza", JSON.stringify([]));
            localStorage.setItem("prioridad", JSON.stringify([]));
            localStorage.setItem("publicacion", JSON.stringify([]));
            localStorage.setItem('eventos', JSON.stringify([]));
            localStorage.setItem('tareas', JSON.stringify([]));
            localStorage.setItem('cesiones', JSON.stringify([]));
            localStorage.setItem('cesionesanteriores', JSON.stringify([]));
            localStorage.setItem('cesionesactuales', JSON.stringify([]));
            localStorage.setItem('licencias', JSON.stringify([]));
            localStorage.setItem('licenciasanteriores', JSON.stringify([]));
            localStorage.setItem('licenciasactuales', JSON.stringify([]));
            localStorage.setItem('fusiones', JSON.stringify([]));
            localStorage.setItem('fusionesanteriores', JSON.stringify([]));
            localStorage.setItem('fusionesactuales', JSON.stringify([]));
            localStorage.setItem('camnom', JSON.stringify([]));
            localStorage.setItem('camnomanteriores', JSON.stringify([]));
            localStorage.setItem('camnomactuales', JSON.stringify([]));
            localStorage.setItem('camdom', JSON.stringify([]));
            localStorage.setItem('camdomanteriores', JSON.stringify([]));
            localStorage.setItem('camdomactuales', JSON.stringify([]));
            localStorage.setItem('facturas', JSON.stringify([]));
            
            /* Inicicio el Datatable de Facturas */
            TablaFacturas();
        }

        /* Iniciliazamos los Datatables */
        TablaClases();
        TablaPrioridad();
        TablaPublicacion();
        TablaEventos();
        TablaTareas();
        TablaCesiones();
        TablaCesionesAnteriores();
        TablaCesionesActuales();
        TablaLicencia();
        TablaLicenciasAnteriores();
        TablaLicenciasActuales();
        TablaFusion();
        TablaFusionesAnteriores();
        TablaFusionesActuales();
        TablaCamNom();
        TablaCamNomAnteriores();
        TablaCamNomActuales();
        TablaCamDom();
        TablaCamDomAnteriores();
        TablaCamDomActuales();
        TablaDocumento();

        /* CONFIGURA LOS INPUT CALENDAR */
        $(".calendar").datetimepicker({
            maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker: false,
        });

        /* Habilita el tooltip para los elementos */
        $('.nav-tabs > li a[title]').tooltip();

        //Moverse por los tabs haciendo click en el tab
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        //Siguiente Tab a través del botón siguiente
        $(".next-step").click(function(e) {
            var $active = $('#principalWizar .wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });

        //Siguiente Tab a través del botón atrás
        $(".prev-step").click(function(e) {
            var $active = $('#principalWizar .wizard .nav-tabs li.active');
            prevTab($active);
        });
        
        /* Cierra el Modal de Carga */
        $('#modal-loading').modal('hide');
    });

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



    //----------------------------------- Modal Para Añadir y Editar -----------------------------------------------

    //Añadir Documento ---------------------------------------------------------------------------
    /* $(document).on('click', '#documentofrmsubmit', function(e) {
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
    }); */


    //Editar Documento ---------------------------------------------------------------------------
    /* $(document).on('click', '#documentoeditfrmsubmit', function(e) {
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
    }); */
    </script>