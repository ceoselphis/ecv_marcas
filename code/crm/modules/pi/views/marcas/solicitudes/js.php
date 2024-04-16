<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    $('#modal-loading').modal('show');
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

    /* Para cambiar el color de los Label  luego de una error*/
    const color_lbl = 'rgb(71 85 105)';


    /* ####################################################################### */
    /* **********             FUNCIONES CLASE NIZA                  ********** */
    /* ####################################################################### */
    
    /***
     * funcion para obtener la descripcion de la clase
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

    /***
     * funcion para guardar el formulario de la clase
     */
    $(document).on('click', '#claseNizaFrmSubmit', function(e) {    
        e.preventDefault();
        if ($("select[name=clase_niza]").val() && $("input[name=clase_niza_descripcion]").val()) {
            var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
            var data = {
                'idRow': tblClaseDT.rows().count() + 1,
                'clase_id': $("select[name=clase_niza]").val(),
                'clase_id_name': $("select[name=clase_niza] option:selected").text(),
                'descripcion': $("input[name=clase_niza_descripcion]").val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblClaseDT.rows().count()) + "' class='btn btn-danger col-mrg borrarClase'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lblclase_niza").css('color', $("select[name=clase_niza]").val() ? color_lbl : 'red');
            $("#lblclase_niza_descripcion").css('color', $("input[name=clase_niza_descripcion]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Clase');
        }
    });

    /***
     * funcion para borrar una clase
     */
    $(document).on('click', '.borrarClase', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var claseNiza = JSON.parse(localStorage.getItem("clase_niza"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            claseNiza.length == 1 ? claseNiza = [] : claseNiza.splice(id, 1);
            localStorage.setItem("clase_niza", JSON.stringify(UpdtIdRow(claseNiza)));
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
        $('select[name=clase_niza]').prop('selectedIndex', 0);
        $('select[name=clase_niza]').selectpicker('refresh'); 
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
        if ($("select[name=pais_prioridad]").val() && $("input[name=fecha_prioridad]").val()
            && $("input[name=nro_prioridad]").val()) {
            
            prioridad = JSON.parse(localStorage.getItem('prioridad'));
            data = {
                'idRow': tblPrioridadDT.rows().count() + 1,
                'pais_id': $("select[name=pais_prioridad]").val(),
                'pais_name': $("select[name=pais_prioridad] option:selected").text(),
                'fecha_prioridad': $("input[name=fecha_prioridad]").val(),
                'numero_prioridad': $("input[name=nro_prioridad").val(),
                'marcas_id': $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblPrioridadDT.rows().count()) + "' class='btn btn-danger col-mrg borrarPrioridad'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lblpais_prioridad").css('color', $("select[name=pais_prioridad]").val() ? color_lbl : 'red');
            $("#lblfecha_prioridad").css('color', $("input[name=fecha_prioridad]").val() ? color_lbl : 'red');
            $("#lblnro_prioridad").css('color', $("input[name=nro_prioridad]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Prioridad');
        }
    });

    /***
     * funcion para borrar una Prioridad
     */
    $(document).on('click', '.borrarPrioridad', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var prioridad = JSON.parse(localStorage.getItem("prioridad"));
        if (confirm("¿Esta seguro de eliminar este registro?")) {
            prioridad.length == 1 ? prioridad = [] : prioridad.splice(id, 1);
            localStorage.setItem("prioridad", JSON.stringify(UpdtIdRow(prioridad)));
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
        $('select[name=pais_prioridad]').prop('selectedIndex', 0);
        $('select[name=pais_prioridad]').selectpicker('refresh'); 
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
    $(document).on('click', "#publicacionfrmsubmit", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("input[name=fecha_publicacion]").val() && $("select[name=tipo_publicacion]").val() && $("select[name=boletin_publicacion]").val()
            && $("input[name=tomo_publicacion]").val() && $("input[name=pag_publicacion]").val()) {
            
            var publicacion = JSON.parse(localStorage.getItem("publicacion"));
            var data = {
                'idRow': tblPublicacionDT.rows().count() + 1,
                "fecha": $("input[name=fecha_publicacion]").val(),
                "tipo_pub_id": $("select[name=tipo_publicacion]").val(),
                'tipo_pub_name': $("select[name=tipo_publicacion] option:selected").text(),
                "boletin_id": $("select[name=boletin_publicacion]").val(),
                'boletin_name': $("select[name=boletin_publicacion] option:selected").text(),
                "tomo": $("input[name=tomo_publicacion]").val(),
                "pagina": $("input[name=pag_publicacion]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblPublicacionDT.rows().count()) + "' class='btn btn-danger col-mrg deletePublicacion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lblfecha_publicacion").css('color', $("input[name=fecha_publicacion]").val() ? color_lbl : 'red');
            $("#lbltipo_publicacion").css('color', $("select[name=tipo_publicacion]").val() ? color_lbl : 'red');
            $("#lblboletin_publicacion").css('color', $("select[name=boletin_publicacion]").val() ? color_lbl : 'red');
            $("#lbltomo_publicacion").css('color', $("input[name=tomo_publicacion]").val() ? color_lbl : 'red');
            $("#lblpag_publicacion").css('color', $("input[name=pag_publicacion]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para la Añadir la Publicación');
        }
    });

    /***
     * funcion para borrar una Publicación
     */
    $(document).on('click', '.deletePublicacion', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var id = parseInt($(this).attr('id'));
        var publicacion = JSON.parse(localStorage.getItem("publicacion"));
        if (confirm("¿Desea eliminar este registro?")) {
            publicacion.length == 1 ? publicacion = [] : publicacion.splice(id, 1);
            localStorage.setItem("publicacion", JSON.stringify(UpdtIdRow(publicacion)));
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
        $('select[name=tipo_publicacion]').prop('selectedIndex', 0);
        $('select[name=tipo_publicacion]').selectpicker('refresh'); 
        $('select[name=boletin_publicacion]').prop('selectedIndex', 0);
        $('select[name=boletin_publicacion]').selectpicker('refresh'); 
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
    $(document).on('click', '#eventosfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=tipo_evento]").val() && $("input[name=fecha_evento]").val() && $("textarea[name=evento_comentario]").val()) {
            
            var eventos = JSON.parse(localStorage.getItem("eventos"));
            var data = {
                'idRow': tblEventosDT.rows().count() + 1,
                "fecha": $("input[name=fecha_evento]").val(),
                "tipo_evento_id": $("select[name=tipo_evento]").val(),
                'tipo_evento_name': $("select[name=tipo_evento] option:selected").text(),
                "comentarios": $("textarea[name=evento_comentario]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblEventosDT.rows().count()) + "' class='btn btn-danger col-mrg deleteEvento'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lbltipo_evento").css('color', $("select[name=tipo_evento]").val() ? color_lbl : 'red');
            $("#lblfecha_evento").css('color', $("input[name=fecha_evento]").val() ? color_lbl : 'red');
            $("#lblevento_comentario").css('color', $("textarea[name=evento_comentario]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Evento');
        }

    });

    /***
     * funcion para borrar un Evento
     */
    $(document).on('click', '.deleteEvento', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var eventos = JSON.parse(localStorage.getItem("eventos"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            eventos.length == 1 ? eventos = [] : eventos.splice(id, 1);
            localStorage.setItem("eventos", JSON.stringify(UpdtIdRow(eventos)));
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
        $('select[name=tipo_evento]').prop('selectedIndex', 0);
        $('select[name=tipo_evento]').selectpicker('refresh'); 
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
    $(document).on('click', '#tareasfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("input[name=fecha_tarea]").val() && $("select[name=project_id]").val() && $("select[name=tipo_tarea]").val()
            && $("textarea[name=descripcion]").val()) {
            
            var tareas = JSON.parse(localStorage.getItem("tareas"));
            var data = {
                'idRow': tblTareasDT.rows().count() + 1,
                "fecha": $("input[name=fecha_tarea]").val(),
                "project_id": $("select[name=project_id]").val(),
                'project_id_name': $("select[name=project_id] option:selected").text(),
                "tipo_tareas_id": $("select[name=tipo_tarea]").val(),
                'tipo_tareas_id_name': $("select[name=tipo_tarea] option:selected").text(),
                "descripcion": $("textarea[name=descripcion]").val(),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblTareasDT.rows().count()) + "' class='btn btn-danger col-mrg deleteTarea'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lblfecha_tarea").css('color', $("select[name=fecha_tarea]").val() ? color_lbl : 'red');
            $("#lblproject_id").css('color', $("input[name=project_id]").val() ? color_lbl : 'red');
            $("#lbltipo_tarea").css('color', $("select[name=tipo_tarea]").val() ? color_lbl : 'red');
            $("#lbldescripcion").css('color', $("textarea[name=descripcion]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar los datos para para Añadir la Tarea');
        }
    })
 
    /***
     * funcion para borrar una Tarea
     */
    $(document).on('click', '.deleteTarea', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var tareas = JSON.parse(localStorage.getItem("tareas"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            tareas.length == 1 ? tareas = [] : tareas.splice(id, 1);
            localStorage.setItem("tareas", JSON.stringify(UpdtIdRow(tareas)));
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
        $('select[name=project_id]').prop('selectedIndex', 0);
        $('select[name=project_id]').selectpicker('refresh'); 
        $('select[name=tipo_tarea]').prop('selectedIndex', 0);
        $('select[name=tipo_tarea]').selectpicker('refresh'); 
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
    $(document).on('click', '#cesionesfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=oficinaCesion]").val() && 
            $("select[name=estadoCesion]").val() && 
            $("input[name=nro_solicitudCesion]").val() && 
            $("input[name=fecha_solicitudCesion]").val() &&
            $("input[name=nro_resolucionCesion]").val() &&
            $("input[name=fecha_resolucionCesion]").val() &&
            $("input[name=referenciaclienteCesion]").val() &&
            $("textarea[name=comentarioCesion]").val()) 
            {
            
            var cesiones = JSON.parse(localStorage.getItem("cesiones"));
            var data = {
                'idRow': tblCesionesDT.rows().count() + 1,
                "tmp_cesion_id": tblCesionesDT.rows().count() + 1,
                "client_id": $("select[name=clienteCesion]").val(),
                'client_id_name': $("select[name=clienteCesion] option:selected").text(),
                "oficina_id": $("select[name=oficinaCesion]").val(),
                'oficina_id_name': $("select[name=oficinaCesion] option:selected").text(),
                "staff_id": $("select[name=staffCesion]").val(),
                'staff_id_name': $("select[name=staffCesion] option:selected").text(),
                "estado_id": $("select[name=estadoCesion]").val(),
                'estado_id_name': $("select[name=estadoCesion] option:selected").text(),
                "solicitud_num": $("input[name=nro_solicitudCesion]").val(),
                "fecha_solicitud": $("input[name=fecha_solicitudCesion]").val(),
                "resolucion_num": $("input[name=nro_resolucionCesion]").val(),
                "fecha_resolucion": $("input[name=fecha_resolucionCesion]").val(),
                "referencia_cliente": $("input[name=referenciaclienteCesion]").val(),
                "comentarios": $("textarea[name=comentarioCesion]").val(),
                "cesionesanteriores": localStorage.getItem("cesionesanteriores"),
                "cesionesactuales": localStorage.getItem("cesionesactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblCesionesDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCesion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
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
            $("#lbloficinaCesion").css('color', $("select[name=oficinaCesion]").val() ? color_lbl : 'red');
            $("#lblestadoCesion").css('color', $("select[name=estadoCesion]").val() ? color_lbl : 'red');
            $("#lblnro_solicitudCesion").css('color', $("input[name=nro_solicitudCesion]").val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCesion").css('color', $("input[name=fecha_solicitudCesion]").val() ? color_lbl : 'red');
            $("#lblnro_resolucionCesion").css('color', $("input[name=nro_resolucionCesion]").val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCesion").css('color', $("input[name=fecha_resolucionCesion]").val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCesion").css('color', $("input[name=referenciaclienteCesion]").val() ? color_lbl : 'red');
            $("#lblcomentarioCesion").css('color', $("textarea[name=comentarioCesion]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Cesión');
        }
    })
    
    /***
     * funcion para borrar una Cesion
     */
    $(document).on('click', '.deleteCesion', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var cesiones = JSON.parse(localStorage.getItem("cesiones"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesiones.length == 1 ? cesiones = [] : cesiones.splice(id, 1);
            localStorage.setItem("cesiones", JSON.stringify(UpdtIdRow(cesiones)));
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
        if (!($("select[name=clienteCesion]").val() || '') == '' || 
            !($("select[name=oficinaCesion]").val() || '') == '' || 
            !($("select[name=staffCesion]").val() || '') == '' || 
            !($("select[name=estadoCesion]").val() || '') == '' || 
            !($("input[name=nro_solicitudCesion]").val() || '') == '' || 
            !($("input[name=fecha_solicitudCesion]").val() || '') == '' ||
            !($("input[name=nro_resolucionCesion]").val() || '') == '' ||
            !($("input[name=fecha_resolucionCesion]").val() || '') == '' ||
            !($("input[name=referenciaclienteCesion]").val() || '') == '' ||
            !($("textarea[name=comentarioCesion]").val() || '') == '' ||
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
        $('select[name=clienteCesion]').prop('selectedIndex', 0);
        $('select[name=clienteCesion]').selectpicker('refresh'); 
        $('select[name=oficinaCesion]').prop('selectedIndex', 0);
        $('select[name=oficinaCesion]').selectpicker('refresh'); 
        $('select[name=staffCesion]').prop('selectedIndex', 0);
        $('select[name=staffCesion]').selectpicker('refresh'); 
        $('select[name=estadoCesion]').prop('selectedIndex', 0);
        $('select[name=estadoCesion]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCesionAnteriorfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscesionanterior]").val() || []) == '')) 
        {
            var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
            rowCount = tblCesionesAnteDT.rows().count();
            $('select[name=propietarioscesionanterior] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "cedente_id": parseInt($(this).val()),
                    'cedente_id_name': $(this).text(),
                    "tipo_cedente": 1,
                    "cesion_id": tblCesionesDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCesionAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                cesionesanteriores.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesanteriores.length == 1 ? cesionesanteriores = [] : cesionesanteriores.splice(id, 1);
            localStorage.setItem("cesionesanteriores", JSON.stringify(UpdtIdRow(cesionesanteriores)));
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
    $(document).on('click', '#addbtnCesionAnterior', function(e) {
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
        $('select[name=propietarioscesionanterior]').prop('selectedIndex', -1);
        $('select[name=propietarioscesionanterior]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCesionActualfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscesionactual]").val() || []) == '')) 
        {
            var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
            rowCount = tblCesionesActDT.rows().count();
            $('select[name=propietarioscesionactual] > option:selected').each(function() {
                var data = {
                'idRow': rowCount + 1,
                "cedente_id": parseInt($(this).val()),
                'cedente_id_name': $(this).text(),
                "tipo_cedente": 2,
                "cesion_id": tblCesionesDT.rows().count() + 1,
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCesionActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                cesionesactuales.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesactuales.length == 1 ? cesionesactuales = [] : cesionesactuales.splice(id, 1);
            localStorage.setItem("cesionesactuales", JSON.stringify(UpdtIdRow(cesionesactuales)));
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
    $(document).on('click', '#addbtnCesionActual', function(e) {
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
        $('select[name=propietarioscesionactual]').prop('selectedIndex', -1);
        $('select[name=propietarioscesionactual]').selectpicker('refresh'); 
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
    $(document).on('click', '#licenciasfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=oficinaLicencia]").val() && 
            $("select[name=estadoLicencia]").val() && 
            $("input[name=nro_solicitudLicencia]").val() && 
            $("input[name=fecha_solicitudLicencia]").val() &&
            $("input[name=nro_resolucionLicencia]").val() &&
            $("input[name=fecha_resolucionLicencia]").val() &&
            $("input[name=referenciaclienteLicencia]").val() &&
            $("textarea[name=comentarioLicencia]").val()) 
            {
            
            var licencias = JSON.parse(localStorage.getItem("licencias"));
            var data = {
                'idRow': tblLicenciasDT.rows().count() + 1,
                "tmp_licencia_id": tblLicenciasDT.rows().count() + 1,
                "client_id": $("select[name=clienteLicencia]").val(),
                'client_id_name': $("select[name=clienteLicencia] option:selected").text(),
                "oficina_id": $("select[name=oficinaLicencia]").val(),
                'oficina_id_name': $("select[name=oficinaLicencia] option:selected").text(),
                "staff_id": $("select[name=staffLicencia]").val(),
                'staff_id_name': $("select[name=staffLicencia] option:selected").text(),
                "estado_id": $("select[name=estadoLicencia]").val(),
                'estado_id_name': $("select[name=estadoLicencia] option:selected").text(),
                "num_solicitud": $("input[name=nro_solicitudLicencia]").val(),
                "fecha_solicitud": $("input[name=fecha_solicitudLicencia]").val(),
                "num_resolucion": $("input[name=nro_resolucionLicencia]").val(),
                "fecha_resolucion": $("input[name=fecha_resolucionLicencia]").val(),
                "referencia_cliente": $("input[name=referenciaclienteLicencia]").val(),
                "comentarios": $("textarea[name=comentarioLicencia]").val(),
                "licenciasanteriores": localStorage.getItem("licenciasanteriores"),
                "licenciasactuales": localStorage.getItem("licenciasactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblLicenciasDT.rows().count()) + "' class='btn btn-danger col-mrg deleteLicencia'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lbloficinaLicencia").css('color', $("select[name=oficinaLicencia]").val() ? color_lbl : 'red');
            $("#lblestadoLicencia").css('color', $("select[name=estadoLicencia]").val() ? color_lbl : 'red');
            $("#lblnro_solicitudLicencia").css('color', $("input[name=nro_solicitudLicencia]").val() ? color_lbl : 'red');
            $("#lblfecha_solicitudLicencia").css('color', $("input[name=fecha_solicitudLicencia]").val() ? color_lbl : 'red');
            $("#lblnro_resolucionLicencia").css('color', $("input[name=nro_resolucionLicencia]").val() ? color_lbl : 'red');
            $("#lblfecha_resolucionLicencia").css('color', $("input[name=fecha_resolucionLicencia]").val() ? color_lbl : 'red');
            $("#lblreferenciaclienteLicencia").css('color', $("input[name=referenciaclienteLicencia]").val() ? color_lbl : 'red');
            $("#lblcomentarioLicencia").css('color', $("textarea[name=comentarioLicencia]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Licencia');
        }
    })
 
    /***
     * funcion para borrar una Licencia
     */
    $(document).on('click', '.deleteLicencia', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var licencias = JSON.parse(localStorage.getItem("licencias"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licencias.length == 1 ? licencias = [] : licencias.splice(id, 1);
            localStorage.setItem("licencias", JSON.stringify(UpdtIdRow(licencias)));
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
        if (!($("select[name=clienteLicencia]").val() || '') == '' || 
            !($("select[name=oficinaLicencia]").val() || '') == '' || 
            !($("select[name=staffLicencia]").val() || '') == '' || 
            !($("select[name=estadoLicencia]").val() || '') == '' || 
            !($("input[name=nro_solicitudLicencia]").val() || '') == '' || 
            !($("input[name=fecha_solicitudLicencia]").val() || '') == '' ||
            !($("input[name=nro_resolucionLicencia]").val() || '') == '' ||
            !($("input[name=fecha_resolucionLicencia]").val() || '') == '' ||
            !($("input[name=referenciaclienteLicencia]").val() || '') == '' ||
            !($("textarea[name=comentarioLicencia]").val() || '') == '' ||
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
        $('select[name=clienteLicencia]').prop('selectedIndex', 0);
        $('select[name=clienteLicencia]').selectpicker('refresh'); 
        $('select[name=oficinaLicencia]').prop('selectedIndex', 0);
        $('select[name=oficinaLicencia]').selectpicker('refresh'); 
        $('select[name=staffLicencia]').prop('selectedIndex', 0);
        $('select[name=staffLicencia]').selectpicker('refresh'); 
        $('select[name=estadoLicencia]').prop('selectedIndex', 0);
        $('select[name=estadoLicencia]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirLicenciaAnteriorfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioslicenciaanterior]").val() || []) == '')) 
        {
            var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
            rowCount = tblLicenciasAnteDT.rows().count();
            $('select[name=propietarioslicenciaanterior] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_licenciante": 1,
                    "licencia_id": tblLicenciasDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteLicenciaAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                licenciasanteriores.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasanteriores.length == 1 ? licenciasanteriores = [] : licenciasanteriores.splice(id, 1);
            localStorage.setItem("licenciasanteriores", JSON.stringify(UpdtIdRow(licenciasanteriores)));
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
    $(document).on('click', '#addbtnLicenciaAnterior', function(e) {
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
        $('select[name=propietarioslicenciaanterior]').prop('selectedIndex', 1);
        $('select[name=propietarioslicenciaanterior]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirLicenciaActualfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioslicenciaactual]").val() || []) == '')) 
        {
            var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
            rowCount = tblLicenciasActDT.rows().count();
            $('select[name=propietarioslicenciaactual] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_licenciante": 2,
                    "licencia_id": tblLicenciasDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteLicenciaActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                licenciasactuales.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasactuales.length == 1 ? licenciasactuales = [] : licenciasactuales.splice(id, 1);
            localStorage.setItem("licenciasactuales", JSON.stringify(UpdtIdRow(licenciasactuales)));
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
    $(document).on('click', '#addbtnLicenciaActual', function(e) {
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
        $('select[name=propietarioslicenciaactual]').prop('selectedIndex', -1);
        $('select[name=propietarioslicenciaactual]').selectpicker('refresh'); 
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
    $(document).on('click', '#fusionesfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=oficinaFusion]").val() && 
            $("select[name=estadoFusion]").val() && 
            $("input[name=nro_solicitudFusion]").val() && 
            $("input[name=fecha_solicitudFusion]").val() &&
            $("input[name=nro_resolucionFusion]").val() &&
            $("input[name=fecha_resolucionFusion]").val() &&
            $("input[name=referenciaclienteFusion]").val() &&
            $("textarea[name=comentarioFusion]").val()) 
            {
            
            var fusiones = JSON.parse(localStorage.getItem("fusiones"));
            var data = {
                'idRow': tblFusionesDT.rows().count() + 1,
                "tmp_fusion_id": tblFusionesDT.rows().count() + 1,
                "client_id": $("select[name=clienteFusion]").val(),
                'client_id_name': $("select[name=clienteFusion] option:selected").text(),
                "oficina_id": $("select[name=oficinaFusion]").val(),
                'oficina_id_name': $("select[name=oficinaFusion] option:selected").text(),
                "staff_id": $("select[name=staffFusion]").val(),
                'staff_id_name': $("select[name=staffFusion] option:selected").text(),
                "estado_id": $("select[name=estadoFusion]").val(),
                'estado_id_name': $("select[name=estadoFusion] option:selected").text(),
                "num_solicitud": $("input[name=nro_solicitudFusion]").val(),
                "fecha_solicitud": $("input[name=fecha_solicitudFusion]").val(),
                "num_resolucion": $("input[name=nro_resolucionFusion]").val(),
                "fecha_resolucion": $("input[name=fecha_resolucionFusion]").val(),
                "referencia_cliente": $("input[name=referenciaclienteFusion]").val(),
                "comentarios": $("textarea[name=comentarioFusion]").val(),
                "fusionesanteriores": localStorage.getItem("fusionesanteriores"),
                "fusionesactuales": localStorage.getItem("fusionesactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblFusionesDT.rows().count()) + "' class='btn btn-danger col-mrg deleteFusion'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lbloficinaFusion").css('color', $("select[name=oficinaFusion]").val() ? color_lbl : 'red');
            $("#lblestadoFusion").css('color', $("select[name=estadoFusion]").val() ? color_lbl : 'red');
            $("#lblnro_solicitudFusion").css('color', $("input[name=nro_solicitudFusion]").val() ? color_lbl : 'red');
            $("#lblfecha_solicitudFusion").css('color', $("input[name=fecha_solicitudFusion]").val() ? color_lbl : 'red');
            $("#lblnro_resolucionFusion").css('color', $("input[name=nro_resolucionFusion]").val() ? color_lbl : 'red');
            $("#lblfecha_resolucionFusion").css('color', $("input[name=fecha_resolucionFusion]").val() ? color_lbl : 'red');
            $("#lblreferenciaclienteFusion").css('color', $("input[name=referenciaclienteFusion]").val() ? color_lbl : 'red');
            $("#lblcomentarioFusion").css('color', $("textarea[name=comentarioFusion]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion');
        }
    })
 
    /***
     * funcion para borrar una Fusion
     */
    $(document).on('click', '.deleteFusion', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var fusiones = JSON.parse(localStorage.getItem("fusiones"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusiones.length == 1 ? fusiones = [] : fusiones.splice(id, 1);
            localStorage.setItem("fusiones", JSON.stringify(UpdtIdRow(fusiones)));
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
        if (!($("select[name=clienteFusion]").val() || '') == '' || 
            !($("select[name=oficinaFusion]").val() || '') == '' || 
            !($("select[name=staffFusion]").val() || '') == '' || 
            !($("select[name=estadoFusion]").val() || '') == '' || 
            !($("input[name=nro_solicitudFusion]").val() || '') == '' || 
            !($("input[name=fecha_solicitudFusion]").val() || '') == '' ||
            !($("input[name=nro_resolucionFusion]").val() || '') == '' ||
            !($("input[name=fecha_resolucionFusion]").val() || '') == '' ||
            !($("input[name=referenciaclienteFusion]").val() || '') == '' ||
            !($("textarea[name=comentarioFusion]").val() || '') == '' ||
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
        $('select[name=clienteFusion]').prop('selectedIndex', 0);
        $('select[name=clienteFusion]').selectpicker('refresh'); 
        $('select[name=oficinaFusion]').prop('selectedIndex', 0);
        $('select[name=oficinaFusion]').selectpicker('refresh'); 
        $('select[name=staffFusion]').prop('selectedIndex', 0);
        $('select[name=staffFusion]').selectpicker('refresh'); 
        $('select[name=estadoFusion]').prop('selectedIndex', 0);
        $('select[name=estadoFusion]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirFusionAnteriorfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietariosfusionanterior]").val() || []) == '')) 
        {
            var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
            rowCount = tblFusionesAnteDT.rows().count();
            $('select[name=propietariosfusionanterior] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_participante": 1,
                    "fusion_id": tblCesionesDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteFusionAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                fusionesanteriores.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesanteriores.length == 1 ? fusionesanteriores = [] : fusionesanteriores.splice(id, 1);
            localStorage.setItem("fusionesanteriores", JSON.stringify(UpdtIdRow(fusionesanteriores)));
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
    $(document).on('click', '#addbtnFusionAnterior', function(e) {
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
        $('select[name=propietariosfusionanterior]').prop('selectedIndex', -1);
        $('select[name=propietariosfusionanterior]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirFusionActualfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietariosfusionactual]").val() || []) == '')) 
        {
            var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
            rowCount = tblFusionesActDT.rows().count();
            $('select[name=propietariosfusionactual] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_participante": 2,
                    "fusion_id": tblFusionesDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteFusionActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                fusionesactuales.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesactuales.length == 1 ? fusionesactuales = [] : fusionesactuales.splice(id, 1);
            localStorage.setItem("fusionesactuales", JSON.stringify(UpdtIdRow(fusionesactuales)));
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
    $(document).on('click', '#addbtnFusionActual', function(e) {
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
        $('select[name=propietariosfusionactual]').prop('selectedIndex', 1);
        $('select[name=propietariosfusionactual]').selectpicker('refresh'); 
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
    $(document).on('click', '#camnomfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=oficinaCamNom]").val() && 
            $("select[name=estadoCamNom]").val() && 
            $("input[name=nro_solicitudCamNom]").val() && 
            $("input[name=fecha_solicitudCamNom]").val() &&
            $("input[name=nro_resolucionCamNom]").val() &&
            $("input[name=fecha_resolucionCamNom]").val() &&
            $("input[name=referenciaclienteCamNom]").val() &&
            $("textarea[name=comentarioCamNom]").val()) 
            {
            
            var camnom = JSON.parse(localStorage.getItem("camnom"));
            var data = {
                'idRow': tblCamNomDT.rows().count() + 1,
                "tmp_camnom_id": tblCamNomDT.rows().count() + 1,
                "client_id": $("select[name=clienteCamNom]").val(),
                'client_id_name': $("select[name=clienteCamNom] option:selected").text(),
                "oficina_id": $("select[name=oficinaCamNom]").val(),
                'oficina_id_name': $("select[name=oficinaCamNom] option:selected").text(),
                "staff_id": $("select[name=staffCamNom]").val(),
                'staff_id_name': $("select[name=staffCamNom] option:selected").text(),
                "estado_id": $("select[name=estadoCamNom]").val(),
                'estado_id_name': $("select[name=estadoCamNom] option:selected").text(),
                "num_solicitud": $("input[name=nro_solicitudCamNom]").val(),
                "fecha_solicitud": $("input[name=fecha_solicitudCamNom]").val(),
                "num_resolucion": $("input[name=nro_resolucionCamNom]").val(),
                "fecha_resolucion": $("input[name=fecha_resolucionCamNom]").val(),
                "referencia_cliente": $("input[name=referenciaclienteCamNom]").val(),
                "comentarios": $("textarea[name=comentarioCamNom]").val(),
                "camnomanteriores": localStorage.getItem("camnomanteriores"),
                "camnomactuales": localStorage.getItem("camnomactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblCamNomDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCamNom'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
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
            $("#lbloficinaCamNom").css('color', $("select[name=oficinaCamNom]").val() ? color_lbl : 'red');
            $("#lblestadoCamNom").css('color', $("select[name=estadoCamNom]").val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamNom").css('color', $("input[name=nro_solicitudCamNom]").val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamNom").css('color', $("input[name=fecha_solicitudCamNom]").val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamNom").css('color', $("input[name=nro_resolucionCamNom]").val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamNom").css('color', $("input[name=fecha_resolucionCamNom]").val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamNom").css('color', $("input[name=referenciaclienteCamNom]").val() ? color_lbl : 'red');
            $("#lblcomentarioCamNom").css('color', $("textarea[name=comentarioCamNom]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos el Cambio de Nombre');
        }
    })
 
    /***
     * funcion para borrar una CamNom
     */
    $(document).on('click', '.deleteCamNom', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var camnom = JSON.parse(localStorage.getItem("camnom"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnom.length == 1 ? camnom = [] : camnom.splice(id, 1);
            localStorage.setItem("camnom", JSON.stringify(UpdtIdRow(camnom)));
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
        if (!($("select[name=clienteCamNom]").val() || '') == '' || 
            !($("select[name=oficinaCamNom]").val() || '') == '' || 
            !($("select[name=staffCamNom]").val() || '') == '' || 
            !($("select[name=estadoCamNom]").val() || '') == '' || 
            !($("input[name=nro_solicitudCamNom]").val() || '') == '' || 
            !($("input[name=fecha_solicitudCamNom]").val() || '') == '' ||
            !($("input[name=nro_resolucionCamNom]").val() || '') == '' ||
            !($("input[name=fecha_resolucionCamNom]").val() || '') == '' ||
            !($("input[name=referenciaclienteCamNom]").val() || '') == '' ||
            !($("textarea[name=comentarioCamNom]").val() || '') == '' ||
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
        $('select[name=clienteCamNom]').prop('selectedIndex', 0);
        $('select[name=clienteCamNom]').selectpicker('refresh'); 
        $('select[name=oficinaCamNom]').prop('selectedIndex', 0);
        $('select[name=oficinaCamNom]').selectpicker('refresh'); 
        $('select[name=staffCamNom]').prop('selectedIndex', 0);
        $('select[name=staffCamNom]').selectpicker('refresh'); 
        $('select[name=estadoCamNom]').prop('selectedIndex', 0);
        $('select[name=estadoCamNom]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCamNomAnteriorfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscamnomanterior]").val() || []) == '')) 
        {
            var camnomanteriores = JSON.parse(localStorage.getItem("camnomanteriores"));
            rowCount = tblCamNomAnteDT.rows().count();
            $('select[name=propietarioscamnomanterior] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_nombre": 1,
                    "cambio_nombre_id": tblCamNomDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamNomAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                camnomanteriores.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var camnomanteriores = JSON.parse(localStorage.getItem("camnomanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnomanteriores.length == 1 ? camnomanteriores = [] : camnomanteriores.splice(id, 1);
            localStorage.setItem("camnomanteriores", JSON.stringify(UpdtIdRow(camnomanteriores)));
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
    $(document).on('click', '#addbtnCamNomAnterior', function(e) {
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
        $('select[name=propietarioscamnomanterior]').prop('selectedIndex', -1);
        $('select[name=propietarioscamnomanterior]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCamNomActualfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscamnomactual]").val() || []) == '')) 
        {
            var camnomactuales = JSON.parse(localStorage.getItem("camnomactuales"));
            rowCount = tblCamNomActDT.rows().count();
            $('select[name=propietarioscamnomactual] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_nombre": 2,
                    "cambio_nombre_id": tblCamNomDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamNomActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                camnomactuales.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var camnomactuales = JSON.parse(localStorage.getItem("camnomactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camnomactuales.length == 1 ? camnomactuales = [] : camnomactuales.splice(id, 1);
            localStorage.setItem("camnomactuales", JSON.stringify(UpdtIdRow(camnomactuales)));
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
    $(document).on('click', '#addbtnCamNomActual', function(e) {
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
        $('select[name=propietarioscamnomactual]').prop('selectedIndex', -1);
        $('select[name=propietarioscamnomactual]').selectpicker('refresh'); 
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
    $(document).on('click', '#camdomfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($("select[name=oficinaCamDom]").val() && 
            $("select[name=estadoCamDom]").val() && 
            $("input[name=nro_solicitudCamDom]").val() && 
            $("input[name=fecha_solicitudCamDom]").val() &&
            $("input[name=nro_resolucionCamDom]").val() &&
            $("input[name=fecha_resolucionCamDom]").val() &&
            $("input[name=referenciaclienteCamDom]").val() &&
            $("textarea[name=comentarioCamDom]").val()) 
            {
            console.log('validado');
            var camdom = JSON.parse(localStorage.getItem("camdom"));
            console.log('leido el localStorage');
            var data = {
                'idRow': tblCamDomDT.rows().count() + 1,
                "tmp_camdom_id": tblCamDomDT.rows().count() + 1,
                "client_id": $("select[name=clienteCamDom]").val(),
                'client_id_name': $("select[name=clienteCamDom] option:selected").text(),
                "oficina_id": $("select[name=oficinaCamDom]").val(),
                'oficina_id_name': $("select[name=oficinaCamDom] option:selected").text(),
                "staff_id": $("select[name=staffCamDom]").val(),
                'staff_id_name': $("select[name=staffCamDom] option:selected").text(),
                "estado_id": $("select[name=estadoCamDom]").val(),
                'estado_id_name': $("select[name=estadoCamDom] option:selected").text(),
                "num_solicitud": $("input[name=nro_solicitudCamDom]").val(),
                "fecha_solicitud": $("input[name=fecha_solicitudCamDom]").val(),
                "num_resolucion": $("input[name=nro_resolucionCamDom]").val(),
                "fecha_resolucion": $("input[name=fecha_resolucionCamDom]").val(),
                "referencia_cliente": $("input[name=referenciaclienteCamDom]").val(),
                "comentarios": $("textarea[name=comentarioCamDom]").val(),
                "camdomanteriores": localStorage.getItem("camdomanteriores"),
                "camdomactuales": localStorage.getItem("camdomactuales"),
                "marcas_id": $("input[name=id]").val(),
                'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (tblCamDomDT.rows().count()) + "' class='btn btn-danger col-mrg deleteCamDom'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
            }
            console.log('agregada la data []');
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
            $("#lbloficinaCamDom").css('color', $("select[name=oficinaCamDom]").val() ? color_lbl : 'red');
            $("#lblestadoCamDom").css('color', $("select[name=estadoCamDom]").val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamDom").css('color', $("input[name=nro_solicitudCamDom]").val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamDom").css('color', $("input[name=fecha_solicitudCamDom]").val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamDom").css('color', $("input[name=nro_resolucionCamDom]").val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamDom").css('color', $("input[name=fecha_resolucionCamDom]").val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamDom").css('color', $("input[name=referenciaclienteCamDom]").val() ? color_lbl : 'red');
            $("#lblcomentarioCamDom").css('color', $("textarea[name=comentarioCamDom]").val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos el Cambio de Domicilio');
        }
    })
 
    /***
     * funcion para borrar una CamDom
     */
    $(document).on('click', '.deleteCamDom', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id'));
        var camdom = JSON.parse(localStorage.getItem("camdom"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdom.length == 1 ? camdom = [] : camdom.splice(id, 1);
            localStorage.setItem("camdom", JSON.stringify(UpdtIdRow(camdom)));
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
        if (!($("select[name=clienteCamDom]").val() || '') == '' || 
            !($("select[name=oficinaCamDom]").val() || '') == '' || 
            !($("select[name=staffCamDom]").val() || '') == '' || 
            !($("select[name=estadoCamDom]").val() || '') == '' || 
            !($("input[name=nro_solicitudCamDom]").val() || '') == '' || 
            !($("input[name=fecha_solicitudCamDom]").val() || '') == '' ||
            !($("input[name=nro_resolucionCamDom]").val() || '') == '' ||
            !($("input[name=fecha_resolucionCamDom]").val() || '') == '' ||
            !($("input[name=referenciaclienteCamDom]").val() || '') == '' ||
            !($("textarea[name=comentarioCamDom]").val() || '') == '' ||
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
        $('select[name=clienteCamDom]').prop('selectedIndex', 0);
        $('select[name=clienteCamDom]').selectpicker('refresh'); 
        $('select[name=oficinaCamDom]').prop('selectedIndex', 0);
        $('select[name=oficinaCamDom]').selectpicker('refresh'); 
        $('select[name=staffCamDom]').prop('selectedIndex', 0);
        $('select[name=staffCamDom]').selectpicker('refresh'); 
        $('select[name=estadoCamDom]').prop('selectedIndex', 0);
        $('select[name=estadoCamDom]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCamDomAnteriorfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscamdomanterior]").val() || []) == '')) 
        {
            var camdomanteriores = JSON.parse(localStorage.getItem("camdomanteriores"));
            rowCount = tblCamDomAnteDT.rows().count();
            $('select[name=propietarioscamdomanterior] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_domicilio": 1,
                    "cambio_domicilio_id": tblCamDomDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamDomAnterior'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                camdomanteriores.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var camdomanteriores = JSON.parse(localStorage.getItem("camdomanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdomanteriores.length == 1 ? camdomanteriores = [] : camdomanteriores.splice(id, 1);
            localStorage.setItem("camdomanteriores", JSON.stringify(UpdtIdRow(camdomanteriores)));
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
    $(document).on('click', '#addbtnCamDomAnterior', function(e) {
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
        $('select[name=propietarioscamdomanterior]').prop('selectedIndex', -1);
        $('select[name=propietarioscamdomanterior]').selectpicker('refresh'); 
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
    $(document).on('click', '#AñadirCamDomActualfrmsubmit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($("select[name=propietarioscamdomactual]").val() || []) == '')) 
        {
            var camdomactuales = JSON.parse(localStorage.getItem("camdomactuales"));
            rowCount = tblCamDomActDT.rows().count();
            $('select[name=propietarioscamdomactual] > option:selected').each(function() {
                var data = {
                    'idRow': rowCount + 1,
                    "propietario_id": parseInt($(this).val()),
                    'propietario_id_name': $(this).text(),
                    "tipo_domicilio": 2,
                    "cambio_domicilio_id": tblCamDomDT.rows().count() + 1,
                    'acciones': "<div class='row row-group'><div class='col-md-2 col-md-offset-0'><button id='" + (rowCount) + "' class='btn btn-danger col-mrg deleteCamDomActual'><i class='fas fa-trash'></i>Eliminar</button></div></div>"
                }
                camdomactuales.push(data);
                rowCount++;
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
        var id = parseInt($(this).attr('id'));
        var camdomactuales = JSON.parse(localStorage.getItem("camdomactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            camdomactuales.length == 1 ? camdomactuales = [] : camdomactuales.splice(id, 1);
            localStorage.setItem("camdomactuales", JSON.stringify(UpdtIdRow(camdomactuales)));
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
    $(document).on('click', '#addbtnCamDomActual', function(e) {
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
        $('select[name=propietarioscamdomactual]').prop('selectedIndex', -1);
        $('select[name=propietarioscamdomactual]').selectpicker('refresh'); 
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









    /* ##############################FUNCIONES GENERALES############################### */
    /***
     * funcion para guardar la Solicitud de Marca con toda la data
     */
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
        formData.append("cesiones_id", localStorage.getItem("cesiones"));
        formData.append("licencias_id", localStorage.getItem("licencias"));
        formData.append("fusiones_id", localStorage.getItem("fusiones"));
        formData.append("camnom_id", localStorage.getItem("camnom"));
        formData.append("camdom_id", localStorage.getItem("camdom"));

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

    /***
     * funcion que actualiza el IdRow de cada tabla de Cesiones Actuales
     */
    function UpdtIdRow(tablaDT){
        jQuery.each(tablaDT, function(index, item) {
            item.acciones = item.acciones.replace("button id='" + (item.idRow-1) +"'", "button id='" + index +"'");
            item.idRow = index + 1;
        });
        return tablaDT;
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

        /* Inicilizamos los Datatables */
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

    });













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
    /* $(document).on('click', '.editdoc', function() {
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
    }) */

    //Modal Edit Eventos
    /* $(document).on('click', '.editeventos', function() {
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
    }) */

    //Modal Edit Cesion
    /* $(document).on('click', '.EditCesion', function() {
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
    }) */

    //Modal Edit Licencia
    /* $(document).on('click', '.EditLicencia', function() {
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
    }) */

    //Modal Edit Fusion
    /* $(document).on('click', '.editFusion', function() {
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
    }) */

    //Modal Edit Cambio Nombre
    /* $(document).on('click', '.editCamNom', function() {
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
    }) */
    //Modal Edit Cambio de Domicilio
    /* $(document).on('click', '.editCamDom', function() {
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
    }) */
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

    //Añadir Cesion ---------------------------------------------------------------------------
    /* $(document).on('click', '#AddCesionfrmsubmit', function(e) {
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
    }); */

    //Editar Cesion ---------------------------------------------------------------------------
    /* $(document).on('click', '#EditCesionfrmsubmit', function(e) {
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
    }); */

    //Añadir Licencia ---------------------------------------------------------------------------
    /* $(document).on('click', '#addlicenciafrmsubmit', function(e) {
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
    }); */

    //Editar Licencia ---------------------------------------------------------------------------
    /* $(document).on('click', '#editlicenciafrmsubmit', function(e) {
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
    }); */



    //Añadir Fusion ---------------------------------------------------------------------------
    /* $(document).on('click', '#addfusionfrmsubmit', function(e) {
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
    }); */

    //Editar Fusion ---------------------------------------------------------------------------
    /* $(document).on('click', '#editfusionfrmsubmit', function(e) {
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
    }); */

    //Añadir Cambio de Nombre -----------------------------------------------------------------
    /* $(document).on('click', '#AddCambioNombrefrmsubmit', function(e) {
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
    }); */

    //Editar Cambio de Nombre -----------------------------------------------------------------
    /* $(document).on('click', '#EditCambioNombrefrmsubmit', function(e) {
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
    }); */

    //Añadir Cambio Domicilio ----------------------------------------------------------------------
    /* $(document).on('click', '#AddCambioDomiciliofrmsubmit', function(e) {
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
    }); */

    //Editar Cambio Domicilio ----------------------------------------------------------------------
    /* $(document).on('click', '#EditCambioDomiciliofrmsubmit', function(e) {
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
    }); */



    //Editar Evento ---------------------------------------------------------------------------
    /* $(document).on('click', '#editeventosfrmsubmit', function(e) {
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
    }); */


</script>


<script>
    /* function mostrar_tarea() {
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
    } */
</script>


<script>
    /* $(document).on('click', '#tareasfrmeditsubmit', function(e) {
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
    }) */
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