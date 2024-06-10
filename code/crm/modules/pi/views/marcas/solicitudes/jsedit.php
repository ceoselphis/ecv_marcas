<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>

<script>
    /* Declaramos las variables de Datatable para iniciaizarlas*/
    var tblClaseDT;
    var tblPrioridadDT;
    var tblPublicacionDT;
    var tblEventonDT;
    var tblTareaDT;
    var tblCesionDT;
    var tblCesionActDT;
    var tblCesionAntDT;
    var AddtblCesionAntDT
    var AddtblCesionActDT
    var tblLicenciaDT;
    var tblLicenciaActDT;
    var tblLicenciaAntDT;
    var AddtblLicenciaActDT;
    var AddtblLicenciaAntDT;
    var tblFusionDT;
    var tblFusionActDT;
    var tblFusionAntDT;
    var AddtblFusionActDT;
    var AddtblFusionAntDT;
    var tblCamNomDT;
    var tblCamNomActDT;
    var tblCamNomAntDT;
    var tblCamDomDT;
    var tblCamDomActDT;
    var tblCamDomAntDT;
    var tblDocomentoDT;

    /* Para cambiar el color de los Label  luego de un error*/
    const color_lbl = 'rgb(71 85 105)';
    var formData = new FormData();
   

    /* ####################################################################### */
    /* **********             FUNCIONES SIGNO                       ********** */
    /* ####################################################################### */
    
    /**funcion para editar el signo*/
    $(document).on('click', '#signoEditfrmsubmit', function(e)
    {
        e.preventDefault();


        if (($('#signo_archivo').val() && $('#descripcion_signo').val())
            || (!$('#signo_archivo').val() && $('#signo_archivo_orig').val() && $('#descripcion_signo').val())) {
            $("#lblsigno_archivo").css('color', color_lbl);
            $("#lbldescripcion_signo").css('color', color_lbl);
            $("#signoModalEdit").modal('hide');
        }else{
            $("#lblsigno_archivo").css('color', $('#signo_archivo').val() || (!$('#signo_archivo').val() && $('#signo_archivo_orig').val()) ? color_lbl : 'red');
            $("#lbldescripcion_signo").css('color', $('#descripcion_signo').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Editar el Signo');
        }
    });

    $( "#signo_archivo" ).on( "change", function() {
        const input = document.getElementById('signo_archivo');
        const file = input.files;
        if (file) {
            const fileReader = new FileReader();
            const preview = document.getElementById('img_signo_archivo');
            fileReader.onload = function (event) {
                preview.setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    });


    /* ####################################################################### */
    /* **********             FUNCIONES CLASE                       ********** */
    /* ####################################################################### */

    /***funcion para guardar el formulario de la clase*/
    $(document).on('click', '#claseNizaFrmSubmit', function(e)
    {
        e.preventDefault();
        if ($('#clase_niza').val() && $('#clase_niza_descripcion').val()) {
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
                    $("#claseNizaModal").modal('hide');
                    alert_float('success', 'Clase agregada exitosamente');
                    TablaClases();
                }
            });
        }else{
            $("#lblclase_niza").css('color', $('#clase_niza').val() ? color_lbl : 'red');
            $("#lblclase_niza_descripcion").css('color', $('#clase_niza_descripcion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Clase');
        }
    });
    
    /**** funcion para editar la clase*/
    $(document).on('click', '#claseNizaEditFrmSubmit', function(e)
    {
        e.preventDefault();
        if ($('#clase_niza_edit').val() && $('#clase_niza_descripcion_edit').val()) {
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
                    TablaClases();
                }
            });
        }else{
            $("#lblclase_niza_edit").css('color', $('#clase_niza_edit').val() ? color_lbl : 'red');
            $("#lblclase_niza_descripcion_edit").css('color', $('#clase_niza_descripcion_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Editar la Clase');
        }
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#claseNizaModal').on('hidden.bs.modal', function (e) {
        ResetTablaClases();
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#claseNizaEditModal').on('hidden.bs.modal', function (e) {
        ResetTablaClasesEdit();
    });

    /**** funcion para obtener la descripcion de la clase al editar*/
    $(document).on('change', 'select[name=clase_niza_edit]', function(e)
    {
        e.preventDefault();
        console.log('Entre en el change');
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
    
    /**** funcion para obtener la descripcion de la clase*/
    $(document).on('change', 'select[name=clase_niza]', function(e)
    {
        e.preventDefault();
        var clase_niza = $("select[name=clase_niza]").val();
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
                $("input[name=clase_niza_descripcion]").val(res.data);
            }
        });
    });
    
     /**** funcion para buscar la clase a editar*/
    $(document).on('click', '.editarClase', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblClaseDT, 'id', id);
            console.log('row', row);
            $("#clase_niza_edit").val(row.clase_id);
            $('#clase_niza_edit').selectpicker('refresh'); 
            $('#clase_niza_descripcion_edit').val(row.descripcion); 
            $("input[name=marcas_clase_id]").val(row.id)
            $("#claseNizaEditModal").modal('show');
    })
    
    /**** funcion para borrar la clase*/
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
                TablaClases();
            }
        });
        }
        
    })

    /**** funcion que hace reset del Modal de clase*/
    function ResetTablaClases() {
        $("#claseNizaFrm")[0].reset();
        $("#clase_niza").val('');
        $('#clase_niza').selectpicker('refresh'); 
        $("#lblclase_niza").css('color', color_lbl);
        $("#lblclase_niza_descripcion").css('color', color_lbl);
    };

    /**** funcion que hace reset del Modal de clase*/
    function ResetTablaClasesEdit() {
        $("#claseNizaEditFrm")[0].reset();
        $("#clase_niza_edit").val('');
        $('#clase_niza_edit').selectpicker('refresh'); 
        $("#lblclase_niza_edit").css('color', color_lbl);
        $("#lblclase_niza_descripcion_edit").css('color', color_lbl);
    };

    /**** Genera la tabla de Clases*/
    function TablaClases()
    {
        $.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/getClasesMarcas/'.$id);?>",
            method: "GET",
            success: function(response){
                res = JSON.parse(response);
                data = res.data;
                console.log('Clases', data);
                tblClaseDT = $('#claseTbl').DataTable( {
                    autoWidth: false,
                    destroy: true,
                    data: data,
                    columnDefs: [
                        { width: '10%', targets: 0 },
                        { width: '70%', targets: 1 },
                        { width: '20%', targets: 2 }
                    ],
                    columns: [
                        {
                            data: 'clase',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'descripcion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-break'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'acciones',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'id',
                            visible: false
                        },
                        {
                            data: 'clase_id',
                            visible: false
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    },
                    width: "100%"
                } );
            }
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES PRIORIDAD                   ********** */
    /* ####################################################################### */

    /**** funcion para guardar el formulario de la prioridad*/
    $(document).on('click', '#prioridadfrmsubmit', function(e)
    {
        e.preventDefault();
        if ($('#pais_prioridad').val() && $('#fecha_prioridad').val()
            && $('#nro_prioridad').val()) 
        {
            var pais_prioridad = $("#pais_prioridad").val();
            var numero_prioridad = $("#nro_prioridad").val();
            var fecha_prioridad = $("#fecha_prioridad").val();
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasPrioridadController/addPrioridad')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'pais_prioridad' : pais_prioridad,
                    'numero_prioridad': numero_prioridad,
                    'fecha_prioridad': fecha_prioridad,
                    'marcas_id' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#prioridadModal").modal('hide');
                    alert_float('success', 'Prioridad agregada exitosamente');
                    TablaPrioridades();
                }
            });
        }else{
            $("#lblpais_prioridad").css('color', $('#pais_prioridad').val() ? color_lbl : 'red');
            $("#lblfecha_prioridad").css('color', $('#fecha_prioridad').val() ? color_lbl : 'red');
            $("#lblnro_prioridad").css('color', $('#nro_prioridad').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Prioridad');
        }
    });

    /**** funcion para editar la prioridad*/
    $("#prioridadEditfrmsubmit").on('click', function(e){
        e.preventDefault();
        if ($('#pais_prioridad_edit').val() && $('#fecha_prioridad_edit').val()
            && $('#nro_prioridad_edit').val()) 
        {
            data = {
                'pais_id' : $("#pais_prioridad_edit").val(),
                'fecha_prioridad': $("#fecha_prioridad_edit").val(),
                'numero_prioridad'  : $("#nro_prioridad_edit").val(),
                'id'   : $("input[name=prioridad_edit_id").val(),
            }

            $.ajax({
                url: "<?php echo admin_url('pi/MarcasPrioridadController/update/');?>",
                method: "POST",
                data: data,
                success: function(response)
                {
                    $("#prioridadEditModal").modal('hide');
                    alert_float('success', 'Prioridad editada exitosamente');
                    TablaPrioridades();
                }
            });

        }else{
            $("#lblpais_prioridad_edit").css('color', $('#pais_prioridad_edit').val() ? color_lbl : 'red');
            $("#lblfecha_prioridad_edit").css('color', $('#fecha_prioridad_edit').val() ? color_lbl : 'red');
            $("#lblnro_prioridad_edit").css('color', $('#nro_prioridad_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Editar la Prioridad');
        }
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#prioridadEditModal').on('hidden.bs.modal', function (e) {
        ResetTablaPrioridadesEdit();
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#prioridadModal').on('hidden.bs.modal', function (e) {
        ResetTablaPrioridades();
    });
    
    /**** funcion para borrar la Prioridad*/
    $(document).on('click', '.deletePrioridad', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        if(confirm('¿Esta seguro de eliminar este registro?'))
        {
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasPrioridadController/destroy/');?>"+id,
                method: "POST",
                success: function(response)
                {
                    alert_float('success', 'Prioridad borrada exitosamente');
                    TablaPrioridades();
                }
            });
        }
    })

    /**** funcion para buscar la prioridad a editar*/
    $(document).on('click', '.editarPrioridad', function(e)
        {
            e.preventDefault();
            var id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblPrioridadDT, 'id', id);
            console.log('row', row);
            
            $("#pais_prioridad_edit").val(row.idpais);
            $('#pais_prioridad_edit').selectpicker('refresh');
            $("#fecha_prioridad_edit").val(row.fecha_prioridad);
            $("#nro_prioridad_edit").val(row.numero)
            $("input[name=prioridad_edit_id]").val(row.id)
            $("#prioridadEditModal").modal('show');
    })

    /**** funcion que hace reset del Modal de Prioridad*/
    function ResetTablaPrioridadesEdit() {
        $("#prioridadEditFrm")[0].reset();
        $('#pais_prioridad_edit').val('').trigger('change');
        $("#lblpais_prioridad_edit").css('color', color_lbl);
        $("#lblfecha_prioridad_edit").css('color', color_lbl);
        $("#lblnro_prioridad_edit").css('color', color_lbl);
    };

    /**** funcion que hace reset del Modal de Prioridad*/
    function ResetTablaPrioridades() {
        $("#prioridadEditFrm")[0].reset();
        $('#pais_prioridad').val('').trigger('change');
        $("#lblpais_prioridad").css('color', color_lbl);
        $("#lblfecha_prioridad").css('color', color_lbl);
        $("#lblnro_prioridad").css('color', color_lbl);
    };

    /**** Genera la tabla de Prioridades*/
    function TablaPrioridades(){
            $.ajax({
                url: "<?php echo admin_url('pi/MarcasPrioridadController/getAllPrioridades/'.$id);?>",
                method: "GET",
                success: function(response)
                {
                    table = JSON.parse(response);
                    console.log('Prioridades', table);
                    tblPrioridadDT = $("#prioridadTbl").DataTable({
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                        },
                        autoWidth: false,
                        data: table,
                        destroy: true,
                        dataSrc: '',
                        columnDefs: [
                            { width: '15%', targets: 0 },
                            { width: '40%', targets: 1 },
                            { width: '20%', targets: 2 },
                            { width: '25%', targets: 3 }
                        ],
                        columns : [
                            { data: 'fecha_prioridad'},
                            { data: 'nombre'},
                            { data: 'numero'},
                            { data: 'acciones'},
                        ],
                        columns: [
                            {
                                data: 'fecha_prioridad',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'nombre',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'numero',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'acciones',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                                }
                            },
                            {
                            data: 'idpais',
                            visible: false
                            },
                            {
                            data: 'id',
                            visible: false
                            }
                        ],
                        width: "100%"
                    });
                }
            })
        };


    /* ####################################################################### */
    /* **********             FUNCIONES PUBLICACIONES               ********** */
    /* ####################################################################### */

    /**** funcion para guardar el formulario de la publicacion*/
    $(document).on('click',"#publicacionfrmsubmit" , function(e)
        {
            e.preventDefault();
            if ($('#fecha_publicacion').val() && $('#tipo_publicacion').val() && $('#boletin_publicacion').val()
            && $('#tomo_publicacion').val() && $('#pag_publicacion').val())
            {
                var data = {
                    'csrf_token_name'    : $("input[name=csrf_token_name]").val(),
                    'tipo_publicacion'   : $("#tipo_publicacion").val(),
                    'boletin_publicacion': $("#boletin_publicacion").val(),
                    'tomo_publicacion'   : $("#tomo_publicacion").val(),
                    'pag_publicacion'    : $("#pag_publicacion").val(),
                }
                $.ajax({
                    url: "<?php echo admin_url('pi/PublicacionesMarcasController/addPublicacionMarcas/'.$id);?>",
                    method: 'POST',
                    data: data,
                    success: function(response)
                    {
                        $("#publicacionModal").modal('hide');
                        alert_float('success', 'Publicación agregada exitosamente');
                        TablaPublicaciones();
                    }
                });
            }else{
                $("#lblfecha_publicacion").css('color', $('#fecha_publicacion').val() ? color_lbl : 'red');
                $("#lbltipo_publicacion").css('color', $('#tipo_publicacion').val() ? color_lbl : 'red');
                $("#lblboletin_publicacion").css('color', $('#boletin_publicacion').val() ? color_lbl : 'red');
                $("#lbltomo_publicacion").css('color', $('#tomo_publicacion').val() ? color_lbl : 'red');
                $("#lblpag_publicacion").css('color', $('#pag_publicacion').val() ? color_lbl : 'red');
                alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Publicación');
            }
       });

    /**** funcion para editar la publicacion*/
    $(document).on('click', '#publicacionfrmsubmitEdit', function(e)
    {
        e.preventDefault();
        if ($('#fecha_publicacion_edit').val() && $('#tipo_publicacion_edit').val() && $('#boletin_publicacion_edit').val()
            && $('#tomo_publicacion_edit').val() && $('#pag_publicacion_edit').val())
        {
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
                    TablaPublicaciones();
                    $("#publicacionEditModal").modal('hide');
                }
            });
        }else{
                $("#lblfecha_publicacion_edit").css('color', $('#fecha_publicacion_edit').val() ? color_lbl : 'red');
                $("#lbltipo_publicacion_edit").css('color', $('#tipo_publicacion_edit').val() ? color_lbl : 'red');
                $("#lblboletin_publicacion_edit").css('color', $('#boletin_publicacion_edit').val() ? color_lbl : 'red');
                $("#lbltomo_publicacion_edit").css('color', $('#tomo_publicacion_edit').val() ? color_lbl : 'red');
                $("#lblpag_publicacion_edit").css('color', $('#pag_publicacion_edit').val() ? color_lbl : 'red');
                alert_float('danger', 'Debe seleccionar todos los datos para Añadir la Publicación');
        }
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#publicacionEditModal').on('hidden.bs.modal', function (e) {
        ResetTablaPublicacionesEdit();
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#publicacionModal').on('hidden.bs.modal', function (e) {
        ResetTablaPublicaciones();
    });

    /**** funcion para buscar la publicacion a editar*/
    $(document).on('click', '.editPublicacion', function(e)
    {
            e.preventDefault();
            var id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblPublicacionDT, 'id', id);
            console.log('row', row);
            
            $("#fecha_publicacion_edit").val(row.fecha);
            $('#tipo_publicacion_edit').val(row.id_pub).trigger('change');
            $('#boletin_publicacion_edit').val(row.boletin_id).trigger('change');
            $("#tomo_publicacion_edit").val(row.tomo);
            $("#pag_publicacion_edit").val(row.pagina)
            $("input[name=pub_id_edit]").val(row.id)
            $("#publicacionEditModal").modal('show');
    });

    /**** funcion para borrar la Publicacion*/
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
                    alert_float('success', 'Publicación borrada exitosamente');
                    TablaPublicaciones();
                }
            });
        }            
    });

    /**** funcion que hace reset del Modal de Publicacion*/
    function ResetTablaPublicacionesEdit() {
        $("#publicacionEditFrm")[0].reset();
        $('#tipo_publicacion_edit').val('').trigger('change');
        $('#boletin_publicacion_edit').val('').trigger('change');
        $("#lblfecha_publicacion_edit").css('color', color_lbl);
        $("#lbltipo_publicacion_edit").css('color', color_lbl);
        $("#lblboletin_publicacion_edit").css('color', color_lbl);
        $("#lbltomo_publicacion_edit").css('color', color_lbl);
        $("#lblpag_publicacion_edit").css('color', color_lbl);
    };

    /**** funcion que hace reset del Modal de Publicacion*/
    function ResetTablaPublicaciones() {
        $("#publicacionFrm")[0].reset();
        $('#tipo_publicacion').val('').trigger('change');
        $('#boletin_publicacion').val('').trigger('change');
        $("#lblfecha_publicacion").css('color', color_lbl);
        $("#lbltipo_publicacion").css('color', color_lbl);
        $("#lblboletin_publicacion").css('color', color_lbl);
        $("#lbltomo_publicacion").css('color', color_lbl);
        $("#lblpag_publicacion").css('color', color_lbl);
    };

    /**** Genera la tabla de Publicaciones*/
    function TablaPublicaciones()
    {
        $.ajax({
            url:"<?php echo admin_url('pi/PublicacionesMarcasController/getAllPublicacionesByMarca/'.$id);?>",
            method: "POST",
            success: function(response)
            {
                table = JSON.parse(response);
                console.log('Publicaciones', table.data);
                tblPublicacionDT = $("#publicacionTbl").DataTable({
                    language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                        },
                        autoWidth: false,
                        destroy: true,
                        data: table.data,
                        columnDefs: [
                            { width: '15%', targets: 0 },
                            { width: '25%', targets: 1 },
                            { width: '25%', targets: 2 },
                            { width: '2.5%', targets: 3 },
                            { width: '2.5%', targets: 4 },
                            { width: '30%', targets: 5 }
                        ],
                        columns: [
                                {
                                data: 'fecha',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'nombre',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'descripcion',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'tomo',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'pagina',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12 text-left'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'acciones',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                                }
                            },
                            {
                            data: 'id',
                            visible: false
                            },
                            {
                            data: 'boletin_id',
                            visible: false
                            }
                        ],
                        width: "100%"
                });
            }
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES EVENTOS               ********** */
    /* ####################################################################### */


    //Añadir Evento ---------------------------------------------------------------------------
    $(document).on('click','#eventosfrmsubmit',function(e){
        e.preventDefault();

        if ($('#tipo_evento').val() && $('#fecha_evento').val() && $('#evento_comentario').val())
        {
            $.ajax({
                url: "<?php echo admin_url('pi/EventosController/addEvento')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'tipo_evento' : $('#tipo_evento').val(),
                    'comentarios': $('#evento_comentario').val(),
                    'fecha': $('#fecha_evento').val(),
                    'id_marcas' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#eventoModal").modal('hide');
                    alert_float('success', 'Evento agregado exitosamente');
                    TablaEventos();
                }
            });
        }else{
            $("#lbltipo_evento").css('color', $('#tipo_evento').val() ? color_lbl : 'red');
            $("#lblfecha_evento").css('color', $('#fecha_evento').val() ? color_lbl : 'red');
            $("#lblevento_comentario").css('color', $('#evento_comentario').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Evento');
        }

    });

    //Editar Evento ---------------------------------------------------------------------------
    $(document).on('click','#editeventosfrmsubmit',function(e){
        e.preventDefault();

        if ($('#tipo_evento_edit').val() && $('#fecha_evento_edit').val() && $('#evento_comentario_edit').val())
        {
            $.ajax({
                url: "<?php echo admin_url('pi/EventosController/UpdateMarcasEventos/')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'tipo_evento' : $('#tipo_evento_edit').val(),
                    'comentarios': $('#evento_comentario_edit').val(),
                    'fecha': $('#fecha_evento_edit').val(),
                    'id': $("input[name=even_id_edit]").val(),
                    'id_marcas' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#eventoModalEdit").modal('hide');
                    alert_float('success', 'Evento editado exitosamente');
                    TablaEventos();
                }
            });
        }else{
            $("#lbltipo_evento_edit").css('color', $('#tipo_evento_edit').val() ? color_lbl : 'red');
            $("#lblfecha_evento_edit").css('color', $('#fecha_evento_edit').val() ? color_lbl : 'red');
            $("#lblevento_comentario_edit").css('color', $('#evento_comentario_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Editar el Evento');
        }


        /* var formData = new FormData();
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
            TablaEventos();
        }).catch(function(response){
            alert("No se pudo Editar Evento");
        }); */
    });

    //Al cerrar el modal
    $('#eventoModal').on('hidden.bs.modal', function (e) {
        ResetTablaEventos();
    })

    //Al cerrar el modal
    $('#eventoModalEdit').on('hidden.bs.modal', function (e) {
        ResetTablaEventosEdit();
    })

    //Eliminar Eventos
    $(document).on('click','.evento-delete',function(){
    if (confirm("Quieres eliminar este registro?")){
        let id = $(this).attr('id');
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
            TablaEventos();
        }).catch(function(response){
            alert("No se pudo Eliminar Eventos");
        });
    }
});

    //Modal Edit Eventos
    $(document).on('click','.editeventos',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblEventonDT, 'id', id);
        console.log('row', row);
        
        $('#tipo_evento_edit').val(row.tipo_evento_id).trigger('change');
        $("#fecha_evento_edit").val(row.fecha);
        $("#evento_comentario_edit").val(row.comentarios);
        $("input[name=even_id_edit]").val(row.id);
        $("#eventoModalEdit").modal('show'); 
    })

    /***
     * funcion que hace reset del Modal de Eventos
     */
    function ResetTablaEventos() {
        $("#eventoFrm")[0].reset();
        $('#tipo_evento').val('').trigger('change');
        $("#lbltipo_evento").css('color', color_lbl);
        $("#lblfecha_evento").css('color', color_lbl);
        $("#lblevento_comentario").css('color', color_lbl);
    }

    /***
     * funcion que hace reset del Modal de Eventos
     */
    function ResetTablaEventosEdit() {
        $("#eventoEditFrm")[0].reset();
        $('#tipo_evento_edit').val('').trigger('change');
        $("#lbltipo_evento_edit").css('color', color_lbl);
        $("#lblfecha_evento_edit").css('color', color_lbl);
        $("#lblevento_comentario_edit").css('color', color_lbl);
    }

    // Eventos
    function TablaEventos(){
        let url = '<?php echo admin_url("pi/EventosController/showEventos/$id");?>';
        //let body= ``;
        $.get(url, function(response){
            let eventos = JSON.parse(response);
            console.log('Eventos', eventos);
            tblEventonDT = $("#eventosTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: eventos,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '30%', targets: 1 },
                    { width: '25%', targets: 2 },
                    { width: '15%', targets: 3 },
                    { width: '25%', targets: 4 }
                ],
                columns: [
                    {
                        data: 'id',
                        visible: false,
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'tipo_evento',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'comentarios',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<a id="${row.id}" class="editeventos btn btn-light" style= "background-color: white; "><i class="fas fa-edit"></i>Editar</a>
                            <a id="${row.id}" class="evento-delete btn btn-light" style= "background-color: white; "><i class="fas fa-trash"></i>Borrar</a>`;
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'tipo_evento_id',
                        visible: false
                    }
                ],
                width: "100%"
            });
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES TAREAS                      ********** */
    /* ####################################################################### */
    

    //Añadir Tareas ---------------------------------------------------------------------------
    $(document).on('click','#tareasfrmsubmit',function(e){
        e.preventDefault();

        if ($('#fecha_tarea').val() && $('#project_id').val() && $('#tipo_tarea').val()
            && $('#descripcion').val()) {
            $.ajax({
                url: "<?php echo admin_url('pi/TareasController/addTareas')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'project_id' : $('#project_id').val(),
                    'tipo_tarea': $('#tipo_tarea').val(),
                    'fecha': $('#fecha_evento').val(),
                    'descripcion': $('#descripcion').val(),
                    'id_marcas' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#addTask").modal('hide');
                    alert_float('success', 'Tarea agregada exitosamente');
                    TablaTareas();
                }
            });
        }else{
            $("#lblfecha_tarea").css('color', $('#fecha_tarea').val() ? color_lbl : 'red');
            $("#lblproject_id").css('color', $('#project_id').val() ? color_lbl : 'red');
            $("#lbltipo_tarea").css('color', $('#tipo_tarea').val() ? color_lbl : 'red');
            $("#lbldescripcion").css('color', $('#descripcion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar los datos para para Añadir la Tarea');
        }
    });

    //Editar Tareas ---------------------------------------------------------------------------
    $(document).on('click','#tareaseditfrmsubmit',function(e){
        e.preventDefault();

        if ($('#fecha_tarea_edit').val() && $('#project_id_edit').val() && $('#tipo_tarea_edit').val()
            && $('#descripcion_edit').val()) {
            $.ajax({
                url: "<?php echo admin_url('pi/TareasController/UpdateMarcasTareas/')?>",
                method: "POST",
                data: {
                    'csrf_token_name': $("input[name=csrf_token_name]").val(),
                    'project_id' : $('#project_id_edit').val(),
                    'tipo_tarea': $('#tipo_tarea_edit').val(),
                    'fecha': $('#fecha_tarea_edit').val(),
                    'descripcion': $('#descripcion_edit').val(),
                    'id': $('#Tareaid').val(),
                    'id_marcas' : "<?php echo $id;?>"
                },
                success: function(response)
                {
                    $("#EditTask").modal('hide');
                    alert_float('success', 'Tarea editada exitosamente');
                    TablaTareas();
                }
            });
        }else{
            $("#lblfecha_tarea_edit").css('color', $('#fecha_tarea_edit').val() ? color_lbl : 'red');
            $("#lblproject_id_edit").css('color', $('#project_id_edit').val() ? color_lbl : 'red');
            $("#lbltipo_tarea_edit").css('color', $('#tipo_tarea_edit').val() ? color_lbl : 'red');
            $("#lbldescripcion_edit").css('color', $('#descripcion_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar los datos para para Editar la Tarea');
        }

    });

    //Al cerrar el modal
    $('#addTask').on('hidden.bs.modal', function (e) {
            ResetTablaTareas();
    })

    //Al cerrar el modal
    $('#EditTask').on('hidden.bs.modal', function (e) {
        ResetTablaTareasEdit();
    })

    //Eliminar Tareas
    $(document).on('click','.tarea-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaTareas();
            }).catch(function(response){
                alert("No se pudo Eliminar Tareas");
            });
        }
    });
        
    //Modal Edit Tareas 
    $(document).on('click','.editTareas',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblTareaDT, 'id', id);
        console.log('row', row);
        
        $('#project_id_edit').val(row.project_id).trigger('change');
        $('#tipo_tarea_edit').val(row.tipo_tareas_id).trigger('change');
        $("#fecha_tarea_edit").val(row.fecha);
        $("#descripcion_edit").val(row.descripcion);
        $("#Tareaid").val(row.id);
        $("#EditTask").modal('show'); 
    })

    /***funcion que hace reset del Modal de Tareas*/
    function ResetTablaTareas() {
        $("#tareasfrm")[0].reset();
        $('#project_id').val('').trigger('change');
        $('#tipo_tarea').val('').trigger('change');
        $("#lblfecha_tarea").css('color', color_lbl);
        $("#lblproject_id").css('color', color_lbl);
        $("#lbltipo_tarea").css('color', color_lbl);
        $("#lbldescripcion").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Tareas*/
    function ResetTablaTareasEdit() {
        $("#tareasEditfrm")[0].reset();
        $('#project_id_edit').val('').trigger('change');
        $('#tipo_tarea_edit').val('').trigger('change');
        $("#lblfecha_tarea_edit").css('color', color_lbl);
        $("#lblproject_id_edit").css('color', color_lbl);
        $("#lbltipo_tarea_edit").css('color', color_lbl);
        $("#lbldescripcion_edit").css('color', color_lbl);
    }

    // Tareas
    function TablaTareas(){
        let url = '<?php echo admin_url("pi/TareasController/showTareas/$id");?>';
        $.get(url, function(response){
            let tareas = JSON.parse(response);
            console.log('Tareas', tareas);
            tblTareaDT = $("#tareasTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: tareas,
                destroy: true,
                columnDefs: [
                    { width: '20%', targets: 0 },
                    { width: '20%', targets: 1 },
                    { width: '20%', targets: 2 },
                    { width: '15%', targets: 3 },
                    { width: '25%', targets: 4 }
                ],
                columns: [
                    {
                        data: 'project_name',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'tipo_tarea',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'descripcion',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<a id="${row.id}" class="editTareas btn btn-light"><i class="fas fa-edit"></i>Editar</a>
                            <a id="${row.id}" class="tarea-delete btn btn-light" style= "background-color: white; "><i class="fas fa-trash"></i>Borrar</a>`;
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'tipo_tareas_id',
                        visible: false
                    },
                    {
                        data: 'project_id',
                        visible: false
                    },
                    {
                        data: 'id',
                        visible: false
                    }
                ],
                width: "100%"
            });

        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CESION                      ********** */
    /* ####################################################################### */
 
    //Añadir Cesion ---------------------------------------------------------------------------
    $(document).on('click','#AddCesionfrmsubmit',function(e){
        e.preventDefault();

        if ($('#oficinaCesion').val() && 
            $('#estadoCesion').val() && 
            $('#nro_solicitudCesion').val() && 
            $('#fecha_solicitudCesion').val() &&
            $('#nro_resolucionCesion').val() &&
            $('#fecha_resolucionCesion').val() &&
            $('#referenciaclienteCesion').val() &&
            $('#comentarioCesion').val()) 
            {
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
                TablaCesion()
            }).catch(function(response){
                alert("No se pudo Añadir Cesion");
            });

        }else{
            $("#lbloficinaCesion").css('color', $('#oficinaCesion').val() ? color_lbl : 'red');
            $("#lblestadoCesion").css('color', $('#estadoCesion').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCesion").css('color', $('#nro_solicitudCesion').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCesion").css('color', $('#fecha_solicitudCesion').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCesion").css('color', $('#nro_resolucionCesion').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCesion").css('color', $('#fecha_resolucionCesion').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCesion").css('color', $('#referenciaclienteCesion').val() ? color_lbl : 'red');
            $("#lblcomentarioCesion").css('color', $('#comentarioCesion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Añadir la Cesión');
        }


    });

    //Editar Cesion ---------------------------------------------------------------------------
    $(document).on('click','#EditCesionfrmsubmit',function(e){
        e.preventDefault();

        if ($('#oficinaCesion_edit').val() && 
            $('#estadoCesion_edit').val() && 
            $('#nro_solicitudCesion_edit').val() && 
            $('#fecha_solicitudCesion_edit').val() &&
            $('#nro_resolucionCesion_edit').val() &&
            $('#fecha_resolucionCesion_edit').val() &&
            $('#referenciaclienteCesion_edit').val() &&
            $('#comentarioCesion_edit').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#cesionid').val();
            var cliente =  $('#clienteCesion_edit').val();
            var oficina = $('#oficinaCesion_edit').val();
            var staff =  $('#staffCesion_edit').val();
            var estado =  $('#estadoCesion_edit').val();
            var nro_solicitud =  $('#nro_solicitudCesion_edit').val();
            var fecha_solicitud = $('#fecha_solicitudCesion_edit').val();
            var nro_resolucion =  $('#nro_resolucionCesion_edit').val();
            var fecha_resolucion = $('#fecha_resolucionCesion_edit').val();
            var referenciacliente =  $('#referenciaclienteCesion_edit').val();
            var comentario =  $('#comentarioCesion_edit').val();
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
                TablaCesion()
            }).catch(function(response){
                alert("No se pudo Editar Cesion");
            });
        }else{
            $("#lbloficinaCesion_edit").css('color', $('#oficinaCesion_edit').val() ? color_lbl : 'red');
            $("#lblestadoCesion_edit").css('color', $('#estadoCesion_edit').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCesion_edit").css('color', $('#nro_solicitudCesion_edit').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCesion_edit").css('color', $('#fecha_solicitudCesion_edit').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCesion_edit").css('color', $('#nro_resolucionCesion_edit').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCesion_edit").css('color', $('#fecha_resolucionCesion_edit').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCesion_edit").css('color', $('#referenciaclienteCesion_edit').val() ? color_lbl : 'red');
            $("#lblcomentarioCesion_edit").css('color', $('#comentarioCesion_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Editar la Cesión');
        }

    });

    //Al abrir el modal de agregar cesion
    $('#AddCesion').on('shown.bs.modal', function (e) {
        /*Inicializamos el localstorage*/
        localStorage.setItem('cesionesanteriores', JSON.stringify([]));
        localStorage.setItem('cesionesactuales', JSON.stringify([]));
        $('#propietarioscesionanterior').prop('selectedIndex', -1).trigger('change');
        $('#propietarioscesionactual').prop('selectedIndex', -1).trigger('change');
        TablaCesionAnterior_Add();
        TablaCesionActual_Add();
    })

    //Al cerrar el modal
    $('#AddCesion').on('hidden.bs.modal', function (e) {
        /*Borramos el localstorage*/
        localStorage.removeItem('cesionesanteriores');
        localStorage.removeItem('cesionesactuales');
        AddtblCesionAntDT.clear();
        TablaCesionAnterior_Add()
        AddtblCesionActDT.clear();
        TablaCesionActual_Add()
        ResetTablaCesiones();
    })

    //Al cerrar el modal
    $('#EditCesion').on('hidden.bs.modal', function (e) {
        ResetTablaCesionesEdit();
    })

    //Eliminar Cesion
    $(document).on('click','.cesion-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaCesion();
            }).catch(function(response){
                alert("No se pudo Eliminar Cesion");
            });
        }
    });

    //Modal Edit Cesion 
    $(document).on('click','.EditCesion',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblCesionDT, 'id', id);
        console.log('row', row);
        
        $('#clienteCesion_edit').val(row.client_id).trigger('change');
        $('#oficinaCesion_edit').val(row.oficina_id).trigger('change');
        $('#staffCesion_edit').val(row.staff_id).trigger('change');
        $('#estadoCesion_edit').val(row.estado_id).trigger('change');
        $("#nro_solicitudCesion_edit").val(row.num_solicitud);
        $("#fecha_solicitudCesion_edit").val(row.fecha_solicitud);
        $("#nro_resolucionCesion_edit").val(row.num_resolucion);
        $("#fecha_resolucionCesion_edit").val(row.fecha_resolucion);
        $("#referenciaclienteCesion_edit").val(row.referencia_cliente);
        $("#comentarioCesion_edit").val(row.comentarios);
        $("#cesionid").val(row.id);
        TablaCesionActual(row.id);
        TablaCesionAnterior(row.id);
        $("#EditCesion").modal('show'); 
    })

    /***funcion que hace reset del Modal de Cesiones*/
    function ResetTablaCesiones() {
        $("#cesionesfrm")[0].reset();
        $('#clienteCesion').val('').trigger('change');
        $('#oficinaCesion').val('').trigger('change');
        $('#staffCesion').val('').trigger('change');
        $('#estadoCesion').val('').trigger('change');
        $("#lbloficinaCesion").css('color', color_lbl);
        $("#lblestadoCesion").css('color', color_lbl);
        $("#lblnro_solicitudCesion").css('color', color_lbl);
        $("#lblfecha_solicitudCesion").css('color', color_lbl);
        $("#lblnro_resolucionCesion").css('color', color_lbl);
        $("#lblfecha_resolucionCesion").css('color', color_lbl);
        $("#lblreferenciaclienteCesion").css('color', color_lbl);
        $("#lblcomentarioCesion").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Cesiones*/
    function ResetTablaCesionesEdit() {
        $("#cesionesEditfrm")[0].reset();
        $('#clienteCesion_edit').val('').trigger('change');
        $('#oficinaCesion_edit').val('').trigger('change');
        $('#staffCesion_edit').val('').trigger('change');
        $('#estadoCesion_edit').val('').trigger('change');
        $("#lbloficinaCesion_edit").css('color', color_lbl);
        $("#lblestadoCesion_edit").css('color', color_lbl);
        $("#lblnro_solicitudCesion_edit").css('color', color_lbl);
        $("#lblfecha_solicitudCesion_edit").css('color', color_lbl);
        $("#lblnro_resolucionCesion_edit").css('color', color_lbl);
        $("#lblfecha_resolucionCesion_edit").css('color', color_lbl);
        $("#lblreferenciaclienteCesion_edit").css('color', color_lbl);
        $("#lblcomentarioCesion_edit").css('color', color_lbl);
    }
   
    // Cesion
    function TablaCesion(){
        let url = '<?php echo admin_url("pi/CesionController/showCesion/$id");?>';
        $.get(url, function(response){
            let cesion = JSON.parse(response);
            console.log('Cesion', cesion);
            tblCesionDT = $("#CesionTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: cesion,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '1%', targets: 1 },
                    { width: '1%', targets: 2 },
                    { width: '1%', targets: 3 },
                    { width: '1%', targets: 4 },
                    { width: '5%', targets: 5 },
                    { width: '5%', targets: 6 },
                    { width: '5%', targets: 7 },
                    { width: '5%', targets: 8 },
                    { width: '5%', targets: 9 },
                    { width: '15%', targets: 10 },
                    { width: '30%', targets: 11 }
                ],
                columns: [
                    {
                        data: 'cliente',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'oficina',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'staff',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'estado',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'num_solicitud',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha_solicitud',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'num_resolucion',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha_resolucion',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'referencia_cliente',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'comentarios',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCesion btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="cesion-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'id',
                        visible:false
                    },
                    {
                        data: 'client_id',
                        visible:false
                    },
                    {
                        data: 'oficina_id',
                        visible:false
                    },
                    {
                        data: 'staff_id',
                        visible:false
                    },
                    {
                        data: 'estado_id',
                        visible:false
                    }
                ],
                width: "100%"
            });                       

                
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CESION ANTERIOR             ********** */
    /* ####################################################################### */

        
    //Editar Cesion Anterior  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCesionAnteriorfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        let id = $('#CesionAnterior_id').val();
        var row = FindRowDTbyColumn(tblCesionAntDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.cesion_id;
        var propietarios =  $('#Editarpropietarioscesionanterior').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoCesionController/UpdateTipoCesion/");?>';
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
            $("#EditarCesionAnteriorModal").modal('hide');
            TablaCesionAnterior(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Cesion Anterior");
        });
    });

    // Cambiar de Modal de Editar Cesion por Editar Cesion Anterior 
    $(document).on('click','.EditCesionAnt',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CesionAnterior_id').val(id);
        var row = FindRowDTbyColumn(tblCesionAntDT, 'id', id);
        console.log('row', row);
        $('#Editarpropietarioscesionanterior').val(row.cedente_id).trigger('change');
        $("#EditarCesionAnteriorModal").modal('show');
    });

    //Eliminar Cesion Anterior
    $(document).on('click','.Cesion-Anterior-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCesionAntDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.cesion_id;
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
                TablaCesionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Cesion Anterior");
            });
        }
    });

    // Cesion Anterior
    function TablaCesionAnterior(id_cambio){
        let url = '<?php echo admin_url("pi/TipoCesionController/showCesionAnterior/");?>';
        url = url+id_cambio;

        $.get(url, function(response){
            let cesionant = JSON.parse(response);
            console.log('Cesion Anterior', cesionant);
            tblCesionAntDT = $("#CesionAnteriorTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: cesionant,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCesionAnt btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Cesion-Anterior-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cesion_id',
                        visible:false
                    },
                    {
                        data: 'cedente_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /***funcion para guardar el formulario de las Cesiones Anteriores*/
    $('#AñadirCesionAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscesionanterior').val() || []) == '')) 
        {
            var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
            rowCount = AddtblCesionAntDT.rows().count();
            const valuesSelect = $('#propietarioscesionanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscesionanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "cedente_id": parseInt($(this).val()),
                        'cedente_id_name': $(this).text(),
                        "tipo_cedente": 1,
                        "cesion_id": tblCesionDT.rows().count() + 1,
                        'acciones': '<div class="col-md-6"><a id="cesionesanteriores_' + (rowCount) + '" class="deleteCesionAnterior btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    cesionesanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('cesionesanteriores', cesionesanteriores);
            try {
                $("#CesionAnteriorModal").modal('hide');
                localStorage.setItem("cesionesanteriores", JSON.stringify(cesionesanteriores));
                AddtblCesionAntDT.clear();
                AddtblCesionAntDT.rows.add(JSON.parse(localStorage.getItem("cesionesanteriores")));
                AddtblCesionAntDT.columns.adjust().draw();
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

    //Añadir Cesion Anterior 
    $(document).on('click','#AñadirCesionAnteriorfrmsubmitOLD',function(e){
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
 
    /**** funcion para borrar una Cesion Anterior*/
    $(document).on('click', '.deleteCesionAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var cesionesanteriores = JSON.parse(localStorage.getItem("cesionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesanteriores.length == 1 ? cesionesanteriores = [] : cesionesanteriores.splice(id, 1);
            localStorage.setItem("cesionesanteriores", JSON.stringify(UpdtIdRow(cesionesanteriores, 'cesionesanteriores_')));
            console.log('cesionesanteriores', JSON.parse(localStorage.getItem("cesionesanteriores")));
            AddtblCesionAntDT.clear();
            AddtblCesionAntDT.rows.add(JSON.parse(localStorage.getItem("cesionesanteriores")));
            AddtblCesionAntDT.columns.adjust().draw();
            alert_float('success', 'Cesión Anterior borrada exitosamente');
        }
    })

    /***funcion que se ejecuta al cerrar el Modal Cesion Anterior*/
    $('#CesionAnteriorModal').on('hidden.bs.modal', function (e) {
        ResetTablaCesionesAnteriores();
    })
 
    /***funcion que hace reset del Modal de Cesiones Anteriores*/
    function ResetTablaCesionesAnteriores() {
        $('#propietarioscesionanterior').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietarioscesionanterior").css('color', color_lbl);
    }

    /***funcion que configura el Datatable de las Cesiones Anteriores*/
    function TablaCesionAnterior_Add() {
        tabla = JSON.parse(localStorage.getItem("cesionesanteriores"));
        AddtblCesionAntDT = 
        new $("#CesionAnteriorTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'cedente_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CESION ACTUAL               ********** */
    /* ####################################################################### */
    
   
    //Editar Cesion Actual  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCesionActualfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        let id = $('#CesionActual_id').val();
        var row = FindRowDTbyColumn(tblCesionActDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.cesion_id;
        var propietarios =  $('#Editpropietarioscesionactual').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoCesionController/UpdateTipoCesion/");?>';
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
            $("#EditCesionActualModal").modal('hide');
            TablaCesionActual(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Cesion Actual");
        });
    });

     // Cambiar de Modal de Editar Cesion por Editar Cesion Actual 
    $(document).on('click','.EditCesionAct',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CesionActual_id').val(id);
        var row = FindRowDTbyColumn(tblCesionActDT, 'id', id);
        console.log('row', row);
        $('#Editpropietarioscesionactual').val(row.cedente_id).trigger('change');
        $("#EditCesionActualModal").modal('show');
    });
 
    //Eliminar Cesion Actual
    $(document).on('click','.Cesion-Actual-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCesionActDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.cesion_id;
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
                TablaCesionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Cesion Actual");
            });
        }
    });
  
    //Cesion Actual
    function TablaCesionActual(id_cambio){
        let url = '<?php echo admin_url("pi/TipoCesionController/showCesionActual/");?>';
        url = url+id_cambio;
        $.get(url, function(response){
            let cesionact = JSON.parse(response);
            console.log('Cesion Actual', cesionact);
            tblCesionActDT = $("#CesionActualTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: cesionact,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCesionAct btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Cesion-Actual-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cesion_id',
                        visible:false
                    },
                    {
                        data: 'cedente_id',
                        visible:false
                    }
                    
                ],
                width: "100%"
            }); 
        })


        
    }


    /***funcion para guardar el formulario de las Cesiones Actuales*/
    $('#AñadirCesionActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioscesionactual').val() || []) == '')) 
        {
            var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
            rowCount = AddtblCesionActDT.rows().count();
            const valuesSelect = $('#propietarioscesionactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioscesionactual option[value=' + value + ']').each(function() {
                    var data = {
                    'idRow': rowCount + 1,
                    "cedente_id": parseInt($(this).val()),
                    'cedente_id_name': $(this).text(),
                    "tipo_cedente": 2,
                    "cesion_id": tblCesionDT.rows().count() + 1,
                    'acciones': '<div class="col-md-6"><a id="cesionesactuales_' + (rowCount) + '" class="deleteCesionActual btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    cesionesactuales.push(data);
                    rowCount++;
                });
            });

            console.log('cesionesactuales', cesionesactuales);
            try {
                $("#CesionActualModal").modal('hide');
                localStorage.setItem("cesionesactuales", JSON.stringify(cesionesactuales));
                AddtblCesionActDT.clear();
                AddtblCesionActDT.rows.add(JSON.parse(localStorage.getItem("cesionesactuales")));
                AddtblCesionActDT.columns.adjust().draw();
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

    //Añadir Cesion Actual  ---------------------------------------------------------------------------
    $(document).on('click','#AñadirCesionActualfrmsubmitOLD',function(e){
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
            TablaCesionActual(id_cambio);
        }).catch(function(response){
            alert("No se pudo Añadir Cesion Actual");
        });
    });
    
    /***funcion para borrar una Cesion Actual*/
    $(document).on('click', '.deleteCesionActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var cesionesactuales = JSON.parse(localStorage.getItem("cesionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            cesionesactuales.length == 1 ? cesionesactuales = [] : cesionesactuales.splice(id, 1);
            localStorage.setItem("cesionesactuales", JSON.stringify(UpdtIdRow(cesionesactuales, 'cesionesactuales_')));
            console.log('cesionesactuales', JSON.parse(localStorage.getItem("cesionesactuales")));
            AddtblCesionActDT.clear();
            AddtblCesionActDT.rows.add(JSON.parse(localStorage.getItem("cesionesactuales")));
            AddtblCesionActDT.columns.adjust().draw();
            alert_float('success', 'Cesión Actual borrada exitosamente');
        }
    })

    /***funcion que se ejecuta al cerrar el Modal Cesion Anterior*/
    $('#CesionActualModal').on('hidden.bs.modal', function (e) {
        ResetTablaCesionesActuales();
    })
 
    /***funcion que hace reset del Modal de Cesiones Actuales*/
    function ResetTablaCesionesActuales() {
        $('#propietarioscesionactual').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietarioscesionactual").css('color', color_lbl);
    }

    /***funcion que configura el Datatable de las Cesiones Actuales*/
    function TablaCesionActual_Add() {
        tabla = JSON.parse(localStorage.getItem("cesionesactuales"));
        AddtblCesionActDT = 
        new $("#CesionActualTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'cedente_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA                    ********** */
    /* ####################################################################### */
       
    
    //Añadir Licencia ---------------------------------------------------------------------------
    $(document).on('click','#addlicenciafrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaLicencia').val() && 
            $('#estadoLicencia').val() && 
            $('#nro_solicitudLicencia').val() && 
            $('#fecha_solicitudLicencia').val() &&
            $('#nro_resolucionLicencia').val() &&
            $('#fecha_resolucionLicencia').val() &&
            $('#referenciaclienteLicencia').val() &&
            $('#comentarioLicencia').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var cliente =  $('#clienteLicencia').val();
            var oficina = $('#oficinaLicencia').val();
            var staff =  $('#staffLicencia').val();
            var estado =  $('#estadoLicencia').val();
            var nro_solicitud =  $('#nro_solicitudLicencia').val();
            var fecha_solicitud = $('#fecha_solicitudLicencia').val();
            var nro_resolucion =  $('#nro_resolucionLicencia').val();
            var fecha_resolucion = $('#fecha_resolucionLicencia').val();
            var referenciacliente =  $('#referenciaclienteLicencia').val();
            var comentario =  $('#comentarioLicencia').val();
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
                TablaLicencia()
            }).catch(function(response){
                alert("No se pudo Añadir Licencia");
            });
        }else{
            $("#lbloficinaLicencia").css('color', $('#oficinaLicencia').val() ? color_lbl : 'red');
            $("#lblestadoLicencia").css('color', $('#estadoLicencia').val() ? color_lbl : 'red');
            $("#lblnro_solicitudLicencia").css('color', $('#nro_solicitudLicencia').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudLicencia").css('color', $('#fecha_solicitudLicencia').val() ? color_lbl : 'red');
            $("#lblnro_resolucionLicencia").css('color', $('#nro_resolucionLicencia').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionLicencia").css('color', $('#fecha_resolucionLicencia').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteLicencia").css('color', $('#referenciaclienteLicencia').val() ? color_lbl : 'red');
            $("#lblcomentarioLicencia").css('color', $('#comentarioLicencia').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Añadir la Licencia');
        }
    });
    
    //Editar Licencia
    $(document).on('click','#editlicenciafrmsubmit',function(e){
        e.preventDefault();

        if ($('#oficinaLicencia_edit').val() && 
            $('#estadoLicencia_edit').val() && 
            $('#nro_solicitudLicencia_edit').val() && 
            $('#fecha_solicitudLicencia_edit').val() &&
            $('#nro_resolucionLicencia_edit').val() &&
            $('#fecha_resolucionLicencia_edit').val() &&
            $('#referenciaclienteLicencia_edit').val() &&
            $('#comentarioLicencia_edit').val()) 
            {

            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#licenciaid').val();
            var cliente =  $('#clienteLicencia_edit').val();
            var oficina = $('#oficinaLicencia_edit').val();
            var staff =  $('#staffLicencia_edit').val();
            var estado =  $('#estadoLicencia_edit').val();
            var nro_solicitud =  $('#nro_solicitudLicencia_edit').val();
            var fecha_solicitud = $('#fecha_solicitudLicencia_edit').val();
            var nro_resolucion =  $('#nro_resolucionLicencia_edit').val();
            var fecha_resolucion = $('#fecha_resolucionLicencia_edit').val();
            var referenciacliente =  $('#referenciaclienteLicencia_edit').val();
            var comentario =  $('#comentarioLicencia_edit').val();
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
                TablaLicencia()
            }).catch(function(response){
                alert("No se pudo Editar Licencia");
            });
        }else{
            $("#lbloficinaLicencia_edit").css('color', $('#oficinaLicencia_edit').val() ? color_lbl : 'red');
            $("#lblestadoLicencia_edit").css('color', $('#estadoLicencia_edit').val() ? color_lbl : 'red');
            $("#lblnro_solicitudLicencia_edit").css('color', $('#nro_solicitudLicencia_edit').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudLicencia_edit").css('color', $('#fecha_solicitudLicencia_edit').val() ? color_lbl : 'red');
            $("#lblnro_resolucionLicencia_edit").css('color', $('#nro_resolucionLicencia_edit').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionLicencia_edit").css('color', $('#fecha_resolucionLicencia_edit').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteLicencia_edit").css('color', $('#referenciaclienteLicencia_edit').val() ? color_lbl : 'red');
            $("#lblcomentarioLicencia_edit").css('color', $('#comentarioLicencia_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Editar la Licencia');
        }
    });

    //Al abrir el modal de agregar cesion
    $('#AddLicencia').on('shown.bs.modal', function (e) {
        /*Inicializamos el localstorage*/
        localStorage.setItem('licenciasanteriores', JSON.stringify([]));
        localStorage.setItem('licenciasactuales', JSON.stringify([]));
        $('#propietarioslicenciaanterior').prop('selectedIndex', -1).trigger('change');
        $('#propietarioslicenciaactual').prop('selectedIndex', -1).trigger('change');
        TablaLicenciaAnterior_Add();
        TablaLicenciaActual_Add();
    })

    //Al cerrar el modal
    $('#AddLicencia').on('hidden.bs.modal', function (e) {
        /*Borramos el localstorage*/
        localStorage.removeItem('licenciasanteriores');
        localStorage.removeItem('licenciasactuales');
        AddtblLicenciaAntDT.clear();
        TablaLicenciaAnterior_Add()
        AddtblLicenciaActDT.clear();
        TablaLicenciaActual_Add()
        ResetTablaLicencia();
    })

    //Al cerrar el modal
    $('#EditLicencia').on('hidden.bs.modal', function (e) {
        ResetTablaLicenciaEdit();
    })

    //Eliminar Licencia
    $(document).on('click','.licencia-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaLicencia();
            }).catch(function(response){
                alert("No se pudo Eliminar Licencia");
            });
        }
    });

    //Modal Edit Licencia
    $(document).on('click','.EditLicencia',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblLicenciaDT, 'id', id);
        console.log('row', row);
        
        $('#clienteLicencia_edit').val(row.client_id).trigger('change');
        $('#oficinaLicencia_edit').val(row.oficina_id).trigger('change');
        $('#staffLicencia_edit').val(row.staff_id).trigger('change');
        $('#estadoLicencia_edit').val(row.estado_id).trigger('change');
        $("#nro_solicitudLicencia_edit").val(row.num_solicitud);
        $("#fecha_solicitudLicencia_edit").val(row.fecha_solicitud);
        $("#nro_resolucionLicencia_edit").val(row.num_resolucion);
        $("#fecha_resolucionLicencia_edit").val(row.fecha_resolucion);
        $("#referenciaclienteLicencia_edit").val(row.referencia_cliente);
        $("#comentarioLicencia_edit").val(row.comentarios);
        $("#licenciaid").val(row.id);
        TablaLicenciaAnterior(row.id);
        TablaLicenciaActual(row.id);
        $("#EditLicencia").modal('show'); 
    })

    /***funcion que hace reset del Modal de Licencia*/
    function ResetTablaLicencia() {
        $("#licenciafrm")[0].reset();
        $('#clienteLicencia').val('').trigger('change');
        $('#oficinaLicencia').val('').trigger('change');
        $('#staffLicencia').val('').trigger('change');
        $('#estadoLicencia').val('').trigger('change');
        $("#lbloficinaLicencia").css('color', color_lbl);
        $("#lblestadoLicencia").css('color', color_lbl);
        $("#lblnro_solicitudLicencia").css('color', color_lbl);
        $("#lblfecha_solicitudLicencia").css('color', color_lbl);
        $("#lblnro_resolucionLicencia").css('color', color_lbl);
        $("#lblfecha_resolucionLicencia").css('color', color_lbl);
        $("#lblreferenciaclienteLicencia").css('color', color_lbl);
        $("#lblcomentarioLicencia").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Licencia*/
    function ResetTablaLicenciaEdit() {
        $("#licenciaEditfrm")[0].reset();
        $('#clienteLicencia_edit').val('').trigger('change');
        $('#oficinaLicencia_edit').val('').trigger('change');
        $('#staffLicencia_edit').val('').trigger('change');
        $('#estadoLicencia_edit').val('').trigger('change');
        $("#lbloficinaLicencia_edit").css('color', color_lbl);
        $("#lblestadoLicencia_edit").css('color', color_lbl);
        $("#lblnro_solicitudLicencia_edit").css('color', color_lbl);
        $("#lblfecha_solicitudLicencia_edit").css('color', color_lbl);
        $("#lblnro_resolucionLicencia_edit").css('color', color_lbl);
        $("#lblfecha_resolucionLicencia_edit").css('color', color_lbl);
        $("#lblreferenciaclienteLicencia_edit").css('color', color_lbl);
        $("#lblcomentarioLicencia_edit").css('color', color_lbl);
    }
    
    // Licencia
    function TablaLicencia(){
    let url = '<?php echo admin_url("pi/LicenciaController/showLicencia/$id");?>';
    $.get(url, function(response){
        let licencias = JSON.parse(response);
        console.log('Licencia', licencias);
        tblLicenciaDT = $("#LicenciaTbl").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: licencias,
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
                        data: 'cliente',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'oficina',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'staff',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'estado',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'num_solicitud',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha_solicitud',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'num_resolucion',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fecha_resolucion',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'referencia_cliente',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'comentarios',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditLicencia btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;"></i>Editar</a></div>
                            <div class='col-md-6' style='padding-left: 10px;'><a id="${row.id}" class="licencia-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'id',
                        visible:false
                    },
                    {
                        data: 'client_id',
                        visible:false
                    },
                    {
                        data: 'oficina_id',
                        visible:false
                    },
                    {
                        data: 'staff_id',
                        visible:false
                    },
                    {
                        data: 'estado_id',
                        visible:false
                    }
                ],
                width: "100%"
            });

            
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA ANTERIOR           ********** */
    /* ####################################################################### */


    //Editar Licencia Anterior  ---------------------------------------------------------------------------
    $(document).on('click','#EditarLicenciaAnteriorfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#LicenciaAnterior_id').val();
        var row = FindRowDTbyColumn(tblLicenciaAntDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.licencia_id;
        var propietarios =  $('#Editarpropietarioslicenciaanterior').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoLicenciaController/UpdateTipoLicencia/");?>';
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
            $("#EditarLicenciaAnteriorModal").modal('hide');
            TablaLicenciaAnterior(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Licencia Anterior");
        });
    });

    // Cambiar de Modal de Editar Licencia por Licencia Anterior 
    $(document).on('click','.EditLicenciaAnt',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#LicenciaAnterior_id').val(id);
        var row = FindRowDTbyColumn(tblLicenciaAntDT, 'id', id);
        console.log('row', row);
        $('#Editarpropietarioslicenciaanterior').val(row.propietario_id).trigger('change');
        $("#EditarLicenciaAnteriorModal").modal('show');
    });

    //Eliminar Licencia Anterior
    $(document).on('click','.Licencia-Anterior-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblLicenciaAntDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.licencia_id;
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
                TablaLicenciaAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Licencia Anterior");
            });
        }
    });

    // Licencia Anterior
    function TablaLicenciaAnterior(id_cambio){
        let url = '<?php echo admin_url("pi/TipoLicenciaController/showLicenciaAnterior/");?>';
        url = url+id_cambio;
         $.get(url, function(response){
            let licenciaant = JSON.parse(response);
            console.log('Licencia Anterior', licenciaant);
            tblLicenciaAntDT = $("#LicenciaAnteriorTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: licenciaant,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditLicenciaAnt btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Licencia-Anterior-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'licencia_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /***funcion para guardar el formulario de las Licencias Anteriores*/
    $('#AñadirLicenciaAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioslicenciaanterior').val() || []) == '')) 
        {
            var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
            rowCount = AddtblLicenciaAntDT.rows().count();
            const valuesSelect = $('#propietarioslicenciaanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioslicenciaanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_licenciante": 1,
                        "licencia_id": tblLicenciaDT.rows().count() + 1,
                        'acciones': '<div class="col-md-6"><a id="licenciasanteriores_' + (rowCount) + '" class="deleteLicenciaAnterior btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    licenciasanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('licenciasanteriores', licenciasanteriores);
            try {
                $("#LicenciaAnteriorModal").modal('hide');
                localStorage.setItem("licenciasanteriores", JSON.stringify(licenciasanteriores));
                AddtblLicenciaAntDT.clear();
                AddtblLicenciaAntDT.rows.add(JSON.parse(localStorage.getItem("licenciasanteriores")));
                AddtblLicenciaAntDT.columns.adjust().draw();
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
 
    /**** funcion para borrar una Licencia Anterior*/
    $(document).on('click', '.deleteLicenciaAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var licenciasanteriores = JSON.parse(localStorage.getItem("licenciasanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasanteriores.length == 1 ? licenciasanteriores = [] : licenciasanteriores.splice(id, 1);
            localStorage.setItem("licenciasanteriores", JSON.stringify(UpdtIdRow(licenciasanteriores, 'licenciasanteriores_')));
            console.log('licenciasanteriores', JSON.parse(localStorage.getItem("licenciasanteriores")));
            AddtblLicenciaAntDT.clear();
            AddtblLicenciaAntDT.rows.add(JSON.parse(localStorage.getItem("licenciasanteriores")));
            AddtblLicenciaAntDT.columns.adjust().draw();
            alert_float('success', 'Licencia Anterior borrada exitosamente');
        }
    })

    /***funcion que se ejecuta al cerrar el Modal Licencia Anterior*/
    $('#LicenciaAnteriorModal').on('hidden.bs.modal', function (e) {
        ResetTablaLicenciasAnteriores();
    })
 
    /***funcion que hace reset del Modal de Licencias Anteriores*/
    function ResetTablaLicenciasAnteriores() {
        $('#propietarioslicenciaanterior').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietarioslicenciaanterior").css('color', color_lbl);
    }

    /***funcion que configura el Datatable de las licencias Anteriores*/
    function TablaLicenciaAnterior_Add() {
        tabla = JSON.parse(localStorage.getItem("licenciasanteriores"));
        AddtblLicenciaAntDT = 
        new $("#LicenciaAnteriorTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }



    /* ####################################################################### */
    /* **********             FUNCIONES LICENCIA ACTUAL             ********** */
    /* ####################################################################### */
     
    
    //Editar Licencia Actual  ---------------------------------------------------------------------------
    $(document).on('click','#EditarLicenciaActualfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#LicenciaActual_id').val();
        var row = FindRowDTbyColumn(tblLicenciaActDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.licencia_id;
        var propietarios =  $('#Editpropietarioslicenciaactual').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoLicenciaController/UpdateTipoLicencia/");?>';
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
            $("#EditLicenciaActualModal").modal('hide');
            TablaLicenciaActual(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Licencia Actual");
        });
    });

    // Cambiar de Modal de Editar Licencia por Editar Licencia Actual 
    $(document).on('click','.EditLicenciaAct',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#LicenciaActual_id').val(id);
        var row = FindRowDTbyColumn(tblLicenciaActDT, 'id', id);
        console.log('row', row);
        $('#Editpropietarioslicenciaactual').val(row.propietario_id).trigger('change');
        $("#EditLicenciaActualModal").modal('show');
    });
        
    //Eliminar Licencia Actual
    $(document).on('click','.Licencia-Actual-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblLicenciaActDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.licencia_id;
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
                TablaLicenciaActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Licencia Actual");
            });
        }
    });

    //Licencia Actual
    function TablaLicenciaActual(id_cambio){
        let url = '<?php echo admin_url("pi/TipoLicenciaController/showLicenciaActual/");?>';
        url = url+id_cambio;
        $.get(url, function(response){
            let licenciaact = JSON.parse(response);
            console.log('Licencia Actual', licenciaact);
            tblLicenciaActDT = $("#LicenciaActualTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: licenciaact,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditLicenciaAct btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Licencia-Actual-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'licencia_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /***funcion para guardar el formulario de las Licencias Actuales*/
    $('#AñadirLicenciaActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietarioslicenciaactual').val() || []) == '')) 
        {
            var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
            rowCount = AddtblLicenciaActDT.rows().count();
            const valuesSelect = $('#propietarioslicenciaactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietarioslicenciaactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_licenciante": 1,
                        "licencia_id": tblLicenciaDT.rows().count() + 1,
                        'acciones': '<div class="col-md-6"><a id="licenciasactuales_' + (rowCount) + '" class="deleteLicenciaActual btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    licenciasactuales.push(data);
                    rowCount++;
                });
            });
            console.log('licenciasactuales', licenciasactuales);
            try {
                $("#LicenciaActualModal").modal('hide');
                localStorage.setItem("licenciasactuales", JSON.stringify(licenciasactuales));
                AddtblLicenciaActDT.clear();
                AddtblLicenciaActDT.rows.add(JSON.parse(localStorage.getItem("licenciasactuales")));
                AddtblLicenciaActDT.columns.adjust().draw();
                ResetTablaLicenciasActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietarioslicenciaactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Licencia Anterior');
        }
    })
 
    /**** funcion para borrar una Licencia Anterior*/
    $(document).on('click', '.deleteLicenciaActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var licenciasactuales = JSON.parse(localStorage.getItem("licenciasactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            licenciasactuales.length == 1 ? licenciasactuales = [] : licenciasactuales.splice(id, 1);
            localStorage.setItem("licenciasactuales", JSON.stringify(UpdtIdRow(licenciasactuales, 'licenciasactuales_')));
            console.log('licenciasactuales', JSON.parse(localStorage.getItem("licenciasactuales")));
            AddtblLicenciaActDT.clear();
            AddtblLicenciaActDT.rows.add(JSON.parse(localStorage.getItem("licenciasactuales")));
            AddtblLicenciaActDT.columns.adjust().draw();
            alert_float('success', 'Licencia Anterior borrada exitosamente');
        }
    })

    /***funcion que se ejecuta al cerrar el Modal Licencia Anterior*/
    $('#LicenciaActualModal').on('hidden.bs.modal', function (e) {
        ResetTablaLicenciasActuales();
    })
 
    /***funcion que hace reset del Modal de Licencias Actuales*/
    function ResetTablaLicenciasActuales() {
        $('#propietarioslicenciaactual').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietarioslicenciaactual").css('color', color_lbl);
    }

    /***funcion que configura el Datatable de las licencias Actuales*/
    function TablaLicenciaActual_Add() {
        tabla = JSON.parse(localStorage.getItem("licenciasactuales"));
        AddtblLicenciaActDT = 
        new $("#LicenciaActualTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES FUSION                      ********** */
    /* ####################################################################### */


    //Añadir Fusion ---------------------------------------------------------------------------
    $(document).on('click','#addfusionfrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaFusion').val() && 
            $('#estadoFusion').val() && 
            $('#estadoFusion').val() && 
            $('#fecha_solicitudFusion').val() &&
            $('#nro_resolucionFusion').val() &&
            $('#fecha_resolucionFusion').val() &&
            $('#referenciaclienteFusion').val() &&
            $('#comentarioFusion').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var cliente =  $('#clienteFusion').val();
            var oficina = $('#oficinaFusion').val();
            var staff =  $('#staffFusion').val();
            var estado =  $('#estadoFusion').val();
            var nro_solicitud =  $('#nro_solicitudFusion').val();
            var fecha_solicitud = $('#fecha_solicitudFusion').val();
            var nro_resolucion =  $('#nro_resolucionFusion').val();
            var fecha_resolucion = $('#fecha_resolucionFusion').val();
            var referenciacliente =  $('#referenciaclienteFusion').val();
            var comentario =  $('#comentarioFusion').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
            formData.append('cliente', cliente);
            formData.append('oficina',oficina);
            formData.append('staff', staff);
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
                TablaFusion()
            }).catch(function(response){
                alert("No se pudo Añadir Fusion");
            });
        }else{
            $("#lbloficinaFusion").css('color', $('#oficinaFusion').val() ? color_lbl : 'red');
            $("#lblestadoFusion").css('color', $('#estadoFusion').val() ? color_lbl : 'red');
            $("#lblnro_solicitudFusion").css('color', $('#nro_solicitudFusion').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudFusion").css('color', $('#fecha_solicitudFusion').val() ? color_lbl : 'red');
            $("#lblnro_resolucionFusion").css('color', $('#nro_resolucionFusion').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionFusion").css('color', $('#fecha_resolucionFusion').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteFusion").css('color', $('#referenciaclienteFusion').val() ? color_lbl : 'red');
            $("#lblcomentarioFusion").css('color', $('#comentarioFusion').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion');
        }
    });
    
    //Editar Fusion
    $(document).on('click','#editfusionfrmsubmit',function(e){
        e.preventDefault();

        if ($('#oficinaFusion_edit').val() && 
            $('#estadoFusion_edit').val() && 
            $('#nro_solicitudFusion_edit').val() && 
            $('#fecha_solicitudFusion_edit').val() &&
            $('#nro_resolucionFusion_edit').val() &&
            $('#fecha_resolucionFusion_edit').val() &&
            $('#referenciaclienteFusion_edit').val() &&
            $('#comentarioFusion_edit').val()) 
            {

            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#fusionid').val();
            var cliente =  $('#clienteFusion_edit').val();
            var oficina = $('#oficinaFusion_edit').val();
            var staff =  $('#staffFusion_edit').val();
            var estado =  $('#estadoFusion_edit').val();
            var nro_solicitud =  $('#nro_solicitudFusion_edit').val();
            var fecha_solicitud = $('#fecha_solicitudFusion_edit').val();
            var nro_resolucion =  $('#nro_resolucionFusion_edit').val();
            var fecha_resolucion = $('#fecha_resolucionFusion_edit').val();
            var referenciacliente =  $('#referenciaclienteFusion_edit').val();
            var comentario =  $('#comentarioFusion_edit').val();
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
            let url = '<?php echo admin_url("pi/FusionController/UpdateFusion/");?>'
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
                TablaFusion();
            }).catch(function(response){
                alert("No se pudo Editar la Fusion");
            });
        }else{
            $("#lbloficinaFusion_edit").css('color', $('#oficinaFusion_edit').val() ? color_lbl : 'red');
            $("#lblestadoFusion_edit").css('color', $('#estadoFusion_edit').val() ? color_lbl : 'red');
            $("#lblnro_solicitudFusion_edit").css('color', $('#nro_solicitudFusion_edit').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudFusion_edit").css('color', $('#fecha_solicitudFusion_edit').val() ? color_lbl : 'red');
            $("#lblnro_resolucionFusion_edit").css('color', $('#nro_resolucionFusion_edit').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionFusion_edit").css('color', $('#fecha_resolucionFusion_edit').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteFusion_edit").css('color', $('#referenciaclienteFusion_edit').val() ? color_lbl : 'red');
            $("#lblcomentarioFusion_edit").css('color', $('#comentarioFusion_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Editar la Fusion');
        }
    });

    //Al abrir el modal de agregar fusion
    $('#AddFusion').on('shown.bs.modal', function (e) {
        /*Inicializamos el localstorage*/
        localStorage.setItem('fusionesanteriores', JSON.stringify([]));
        localStorage.setItem('fusionesactuales', JSON.stringify([]));
        $('#propietariosfusionanterior').prop('selectedIndex', -1).trigger('change');
        $('#propietariosfusionactual').prop('selectedIndex', -1).trigger('change');
        TablaFusionesAnterior_Add();
        TablaFusionesActual_Add();
    })

    //Al cerrar el modal
    $('#AddFusion').on('hidden.bs.modal', function (e) {
        /*Borramos el localstorage*/
        localStorage.removeItem('fusionesanteriores');
        localStorage.removeItem('fusionesanteriores');
        AddtblFusionAntDT.clear();
        TablaFusionesAnterior_Add()
        AddtblFusionActDT.clear();
        TablaFusionesActual_Add()
        ResetTablaFusion();
    })

    //Al cerrar el modal
    $('#EditFusion').on('hidden.bs.modal', function (e) {
        ResetTablaFusionEdit();
    })

    //Eliminar Fusion
    $(document).on('click','.fusion-delete',function(){
        console.log("Eliminar Fusion");
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaFusion();
            }).catch(function(response){
                alert("No se pudo Eliminar Fusion");
            });
        }
    });

    //Modal Edit Fusion
    $(document).on('click','.editFusion',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblFusionDT, 'id', id);
        console.log('row', row);
        
        $('#clienteFusion_edit').val(row.client_id).trigger('change');
        $('#oficinaFusion_edit').val(row.oficina_id).trigger('change');
        $('#staffFusion_edit').val(row.staff_id).trigger('change');
        $('#estadoFusion_edit').val(row.estado_id).trigger('change');
        $("#nro_solicitudFusion_edit").val(row.num_solicitud);
        $("#fecha_solicitudFusion_edit").val(row.fecha_solicitud);
        $("#nro_resolucionFusion_edit").val(row.num_resolucion);
        $("#fecha_resolucionFusion_edit").val(row.fecha_resolucion);
        $("#referenciaclienteFusion_edit").val(row.referencia_cliente);
        $("#comentarioFusion_edit").val(row.comentarios);
        $("#fusionid").val(row.id);
        TablaFusionAnterior(row.id);
        TablaFusionActual(row.id);
        $("#EditFusion").modal('show'); 
    })

    /***funcion que hace reset del Modal de Fusion*/
    function ResetTablaFusion() {
        $("#fusionFrm")[0].reset();
        $('#clienteFusion').val('').trigger('change');
        $('#oficinaFusion').val('').trigger('change');
        $('#staffFusion').val('').trigger('change');
        $('#estadoFusion').val('').trigger('change');
        $("#lbloficinaFusion").css('color', color_lbl);
        $("#lblestadoFusion").css('color', color_lbl);
        $("#lblnro_solicitudFusion").css('color', color_lbl);
        $("#lblfecha_solicitudFusion").css('color', color_lbl);
        $("#lblnro_resolucionFusion").css('color', color_lbl);
        $("#lblfecha_resolucionFusion").css('color', color_lbl);
        $("#lblreferenciaclienteFusion").css('color', color_lbl);
        $("#lblcomentarioFusion").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Fusion*/
    function ResetTablaFusionEdit() {
        $("#fusionEditfrm")[0].reset();
        $('#clienteFusion_edit').val('').trigger('change');
        $('#oficinaFusion_edit').val('').trigger('change');
        $('#staffFusion_edit').val('').trigger('change');
        $('#estadoFusion_edit').val('').trigger('change');
        $("#lbloficinaFusion_edit").css('color', color_lbl);
        $("#lblestadoFusion_edit").css('color', color_lbl);
        $("#lblnro_solicitudFusion_edit").css('color', color_lbl);
        $("#lblfecha_solicitudFusion_edit").css('color', color_lbl);
        $("#lblnro_resolucionFusion_edit").css('color', color_lbl);
        $("#lblfecha_resolucionFusion_edit").css('color', color_lbl);
        $("#lblreferenciaclienteFusion_edit").css('color', color_lbl);
        $("#lblcomentarioFusion_edit").css('color', color_lbl);
    }
    
    // Fusion
    function TablaFusion(){
        let url = '<?php echo admin_url("pi/FusionController/showFusion/$id");?>';
        $.get(url, function(response){
            let fusion = JSON.parse(response);
            console.log('Fusion', fusion);
            tblFusionDT = $("#FusionTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: fusion,
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
                            data: 'cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'oficina',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'staff',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'estado',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'referencia_cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentarios',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: '',
                            render: function (data, type, row)
                            {
                                data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="editFusion btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;"></i>Editar</a></div>
                                <div class='col-md-6' style='padding-left: 10px;'><a id="${row.id}" class="fusion-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                                return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'id',
                            visible:false
                        },
                        {
                            data: 'client_id',
                            visible:false
                        },
                        {
                            data: 'oficina_id',
                            visible:false
                        },
                        {
                            data: 'staff_id',
                            visible:false
                        },
                        {
                            data: 'estado_id',
                            visible:false
                        }
                    ],
                    width: "100%"
                });
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES FUSION ANTERIOR             ********** */
    /* ####################################################################### */
 
    //Editar Fusion Anterior  ---------------------------------------------------------------------------
    $(document).on('click','#EditarFusionAnteriorfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#FusionAnterior_id').val();
        var row = FindRowDTbyColumn(tblFusionAntDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.fusion_id;
        var propietarios =  $('#Editarpropietariosfusionanterior').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoFusionController/UpdateTipoFusion/");?>';
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
            $("#EditarFusionAnteriorModal").modal('hide');
            TablaFusionAnterior(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Fusion Anterior");
        });
    });

    // Cambiar de Modal de Editar Fusion por Editar Fusion Anterior 
    $(document).on('click','.EditFusionAnt',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#FusionAnterior_id').val(id);
        var row = FindRowDTbyColumn(tblFusionAntDT, 'id', id);
        console.log('row', row);
        $('#Editarpropietariosfusionanterior').val(row.propietario_id).trigger('change');
        $("#EditarFusionAnteriorModal").modal('show');
    });
    
    //Eliminar Fusion Anterior
    $(document).on('click','.Fusion-Anterior-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblFusionAntDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.fusion_id;
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
                TablaFusionAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Fusion Anterior");
            });
        }
    });
    
    // Fusion Anterior
    function TablaFusionAnterior(id_cambio){
        let url = '<?php echo admin_url("pi/TipoFusionController/showFusionAnterior/");?>';
        url = url+id_cambio;
        $.get(url, function(response){
            let fusionant = JSON.parse(response);
            console.log('Fusion Anterior', fusionant);
            tblFusionAntDT = $("#FusionAnteriorTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: fusionant,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditFusionAnt btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Fusion-Anterior-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fusion_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /***funcion para guardar el formulario de las Fusiones Anteriores*/
    $('#AñadirFusionAnteriorfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietariosfusionanterior').val() || []) == '')) 
        {
            var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
            rowCount = AddtblFusionAntDT.rows().count();
            const valuesSelect = $('#propietariosfusionanterior').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietariosfusionanterior option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_participante": 1,
                        "fusion_id": tblFusionDT.rows().count() + 1,
                        'acciones': '<div class="col-md-6"><a id="fusionesanteriores_' + (rowCount) + '" class="deleteFusionAnterior btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    fusionesanteriores.push(data);
                    rowCount++;
                });
            });
            console.log('fusionesanteriores', fusionesanteriores);
            try {
                $("#FusionAnteriorModal").modal('hide');
                localStorage.setItem("fusionesanteriores", JSON.stringify(fusionesanteriores));
                AddtblFusionAntDT.clear();
                AddtblFusionAntDT.rows.add(JSON.parse(localStorage.getItem("fusionesanteriores")));
                AddtblFusionAntDT.columns.adjust().draw();
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
 
    /**** funcion para borrar una Fusion Anterior*/
    $(document).on('click', '.deleteFusionAnterior', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var fusionesanteriores = JSON.parse(localStorage.getItem("fusionesanteriores"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesanteriores.length == 1 ? fusionesanteriores = [] : fusionesanteriores.splice(id, 1);
            localStorage.setItem("fusionesanteriores", JSON.stringify(UpdtIdRow(fusionesanteriores, 'fusionesanteriores_')));
            console.log('fusionesanteriores', JSON.parse(localStorage.getItem("fusionesanteriores")));
            AddtblFusionAntDT.clear();
            AddtblFusionAntDT.rows.add(JSON.parse(localStorage.getItem("fusionesanteriores")));
            AddtblFusionAntDT.columns.adjust().draw();
            alert_float('success', 'Fusion Anterior borrada exitosamente');
        }
    })

    /**** funcion que se ejecuta al cerrar el Modal Fusion Anterior*/
    $('#FusionAnteriorModal').on('hidden.bs.modal', function (e) {
        ResetTablaFusionesAnteriores();
    })
 
    /**** funcion que hace reset del Modal de Fusiones Anteriores*/
    function ResetTablaFusionesAnteriores() {
        $('#propietariosfusionanterior').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietariosfusionanterior").css('color', color_lbl);
    }
 
    /**** funcion que configura el Datatable de las Fusiones Anteriores*/
    function TablaFusionesAnterior_Add() {
        tabla = JSON.parse(localStorage.getItem("fusionesanteriores"));
        AddtblFusionAntDT = 
        new $("#FusionAnteriorTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES FUSION ACTUAL               ********** */
    /* ####################################################################### */
    
    //Editar Fusion Actual  ---------------------------------------------------------------------------
    $(document).on('click','#EditarFusionActualfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#FusionActual_id').val();
        var row = FindRowDTbyColumn(tblFusionActDT, 'id', id);
        console.log('row', row);
        let id_cambio = row.fusion_id;
        var propietarios =  $('#Editpropietariosfusionactual').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoFusionController/UpdateTipoFusion/");?>';
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
            $("#EditFusionActualModal").modal('hide');
            TablaFusionActual(id_cambio);
        }).catch(function(response){
            alert("No se pudo Editar Fusion Actual");
        });
    });

    // Cambiar de Modal de Editar Fusion por Editar Fusion Actual 
    $(document).on('click','.EditFusionAct',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#FusionActual_id').val(id);
        var row = FindRowDTbyColumn(tblFusionActDT, 'id', id);
        console.log('row', row);
        $('#Editpropietariosfusionactual').val(row.propietario_id).trigger('change');
        $("#EditFusionActualModal").modal('show');
    });
    
    //Eliminar Fusion Actual
    $(document).on('click','.Fusion-Actual-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblFusionActDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.fusion_id;
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
                TablaFusionActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Fusion Actual");
            });
        }
    });

    //Fusion Actual
    function TablaFusionActual(id_cambio){
        let url = '<?php echo admin_url("pi/TipoFusionController/showFusionActual/");?>';
        url = url+id_cambio;
        $.get(url, function(response){
            let fusionact = JSON.parse(response);
            console.log('Fusion Actual', fusionact);
            tblFusionActDT = $("#FusionActualTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: fusionact,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditFusionAct btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="Fusion-Actual-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'fusion_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /***funcion para guardar el formulario de las Fusiones Anteriores*/
    $('#AñadirFusionActualfrmsubmit').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!(($('#propietariosfusionactual').val() || []) == '')) 
        {
            var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
            rowCount = AddtblFusionActDT.rows().count();
            const valuesSelect = $('#propietariosfusionactual').val().toString().split(',');
            valuesSelect.forEach(function(value) {
                $('#propietariosfusionactual option[value=' + value + ']').each(function() {
                    var data = {
                        'idRow': rowCount + 1,
                        "propietario_id": parseInt($(this).val()),
                        'propietario_id_name': $(this).text(),
                        "tipo_participante": 1,
                        "fusion_id": tblFusionDT.rows().count() + 1,
                        'acciones': '<div class="col-md-6"><a id="fusionesactuales_' + (rowCount) + '" class="deleteFusionActual btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>'
                    }
                    fusionesactuales.push(data);
                    rowCount++;
                });
            });
            console.log('fusionesactuales', fusionesactuales);
            try {
                $("#FusionActualModal").modal('hide');
                localStorage.setItem("fusionesactuales", JSON.stringify(fusionesactuales));
                AddtblFusionActDT.clear();
                AddtblFusionActDT.rows.add(JSON.parse(localStorage.getItem("fusionesactuales")));
                AddtblFusionActDT.columns.adjust().draw();
                ResetTablaFusionesActuales();
                alert_float('success', 'Registro guardado exitosamente');
            } catch (error) {
                alert(error);
            }

        }else{
            $("#lblpropietariosfusionactual").css('color', 'red');
            alert_float('danger', 'Debe introducir todos los datos la Fusion Actual');
        }
    })
 
    /**** funcion para borrar una Fusion Actual*/
    $(document).on('click', '.deleteFusionActual', function(e) {
        e.preventDefault();
        var id = parseInt($(this).attr('id').split('_')[1]);
        var fusionesactuales = JSON.parse(localStorage.getItem("fusionesactuales"));
        if (confirm('¿Esta seguro de eliminar este registro?')) {
            fusionesactuales.length == 1 ? fusionesactuales = [] : fusionesactuales.splice(id, 1);
            localStorage.setItem("fusionesactuales", JSON.stringify(UpdtIdRow(fusionesactuales, 'fusionesactuales_')));
            console.log('fusionesactuales', JSON.parse(localStorage.getItem("fusionesactuales")));
            AddtblFusionActDT.clear();
            AddtblFusionActDT.rows.add(JSON.parse(localStorage.getItem("fusionesactuales")));
            AddtblFusionActDT.columns.adjust().draw();
            alert_float('success', 'Fusion Actual borrada exitosamente');
        }
    })

    /**** funcion que se ejecuta al cerrar el Modal Fusion Actual*/
    $('#FusionActualModal').on('hidden.bs.modal', function (e) {
        ResetTablaFusionesActuales();
    })
 
    /**** funcion que hace reset del Modal de Fusiones Actuales*/
    function ResetTablaFusionesActuales() {
        $('#propietariosfusionactual').prop('selectedIndex', -1).trigger('change');
        $("#lblpropietariosfusionactual").css('color', color_lbl);
    }
 
    /**** funcion que configura el Datatable de las Fusiones Actuales*/
    function TablaFusionesActual_Add() {
        tabla = JSON.parse(localStorage.getItem("fusionesactuales"));
        AddtblFusionActDT = 
        new $("#FusionActualTbl_add").DataTable({
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
                        return "<div class='col-12'>" + data + "</div>"
                    }
                },
                {
                    data: 'propietario_id_name',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                    }
                },
                {
                    data: 'acciones',
                    render: function (data, type, row)
                    {
                        return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                    }
                }
            ],
            width: "100%"
        });
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE NOMBRE            ********** */
    /* ####################################################################### */


    //Añadir Cambio de Nombre -----------------------------------------------------------------
    $(document).on('click','#AddCambioNombrefrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaCamNom').val() && 
            $('#estadoCamNom').val() && 
            $('#estadoCamNom').val() && 
            $('#fecha_solicitudCamNom').val() &&
            $('#nro_resolucionCamNom').val() &&
            $('#fecha_resolucionCamNom').val() &&
            $('#referenciaclienteCamNom').val() &&
            $('#comentarioCamNom').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var cliente =  $('#clienteCamNom').val();
            var oficina = $('#oficinaCamNom').val();
            var staff =  $('#staffCamNom').val();
            var estado =  $('#estadoCamNom').val();
            var nro_solicitud =  $('#nro_solicitudCamNom').val();
            var fecha_solicitud = $('#fecha_solicitudCamNom').val();
            var nro_resolucion =  $('#nro_resolucionCamNom').val();
            var fecha_resolucion = $('#fecha_resolucionCamNom').val();
            var referenciacliente =  $('#referenciaclienteCamNom').val();
            var comentario =  $('#comentarioCamNom').val();
            var csrf_token_name = $("input[name=csrf_token_name]").val();
            formData.append('id_marcas',id_marcas);
            formData.append('cliente', cliente);
            formData.append('oficina',oficina);
            formData.append('staff', staff);
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
                TablaCambioNombre();
            }).catch(function(response){
                alert("No se pudo Añadir Cambio de Nombre");
            });
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
    }); 

    //Editar Cambio de Nombre -----------------------------------------------------------------
    $(document).on('click','#EditCambioNombrefrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaCamNom_edit').val() && 
            $('#estadoCamNom_edit').val() && 
            $('#nro_solicitudCamNom_edit').val() && 
            $('#fecha_solicitudCamNom_edit').val() &&
            $('#nro_resolucionCamNom_edit').val() &&
            $('#fecha_resolucionCamNom_edit').val() &&
            $('#referenciaclienteCamNom_edit').val() &&
            $('#comentarioCamNom_edit').val()) 
            {

            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camnomid').val();
            var cliente =  $('#clienteCamNom_edit').val();
            var oficina = $('#oficinaCamNom_edit').val();
            var staff =  $('#staffCamNom_edit').val();
            var estado =  $('#estadoCamNom_edit').val();
            var nro_solicitud =  $('#nro_solicitudCamNom_edit').val();
            var fecha_solicitud = $('#fecha_solicitudCamNom_edit').val();
            var nro_resolucion =  $('#nro_resolucionCamNom_edit').val();
            var fecha_resolucion = $('#fecha_resolucionCamNom_edit').val();
            var referenciacliente =  $('#referenciaclienteCamNom_edit').val();
            var comentario =  $('#comentarioCamNom_edit').val();
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
                TablaCambioNombre();
            }).catch(function(response){
                alert("No se pudo Editar Cambio de Nombre");
            });
        }else{
            $("#lbloficinaCamNom_edit").css('color', $('#oficinaCamNom_edit').val() ? color_lbl : 'red');
            $("#lblestadoCamNom_edit").css('color', $('#estadoCamNom_edit').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamNom_edit").css('color', $('#nro_solicitudCamNom_edit').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamNom_edit").css('color', $('#fecha_solicitudCamNom_edit').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamNom_edit").css('color', $('#nro_resolucionCamNom_edit').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamNom_edit").css('color', $('#fecha_resolucionCamNom_edit').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamNom_edit").css('color', $('#referenciaclienteCamNom_edit').val() ? color_lbl : 'red');
            $("#lblcomentarioCamNom_edit").css('color', $('#comentarioCamNom_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Editar el Cambio de Nombre');
        }
    
    }); 

    //Al cerrar el modal
    $('#AddCambioNombre').on('hidden.bs.modal', function (e) {
        ResetTablaCambioNombre();
    })

    //Al cerrar el modal
    $('#EditCambioNombre').on('hidden.bs.modal', function (e) {
        ResetTablaCambioNombreEdit();
    })
        
    //Eliminar Cambio Nombre
    $(document).on('click','.Cambio-Nombre-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaCambioNombre();
            }).catch(function(response){
                alert("No se pudo Eliminar Cambio Nombre");
            });
        }
    });

    //Modal Edit Cambio Nombre
    $(document).on('click','.editCamNom',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblCamNomDT, 'id', id);
        console.log('row', row);
        
        $('#clienteCamNom_edit').val(row.client_id).trigger('change');
        $('#oficinaCamNom_edit').val(row.oficina_id).trigger('change');
        $('#staffCamNom_edit').val(row.staff_id).trigger('change');
        $('#estadoCamNom_edit').val(row.estado_id).trigger('change');
        $("#nro_solicitudCamNom_edit").val(row.num_solicitud);
        $("#fecha_solicitudCamNom_edit").val(row.fecha_solicitud);
        $("#nro_resolucionCamNom_edit").val(row.num_resolucion);
        $("#fecha_resolucionCamNom_edit").val(row.fecha_resolucion);
        $("#referenciaclienteCamNom_edit").val(row.referencia_cliente);
        $("#comentarioCamNom_edit").val(row.comentarios);
        $("#camnomid").val(row.id);
        TablaCambioNombreAnterior(row.id);
        TablaCambioNombreActual(row.id);
        $("#EditCambioNombre").modal('show'); 
    })
 
    /***funcion que hace reset del Modal de Cambio de Nombre*/
    function ResetTablaCambioNombre() {
        $("#camnomFrm")[0].reset();
        $('#clienteCamNom').val('').trigger('change');
        $('#oficinaCamNom').val('').trigger('change');
        $('#staffCamNom').val('').trigger('change');
        $('#estadoCamNom').val('').trigger('change');
        $("#lbloficinaCamNom").css('color', color_lbl);
        $("#lblestadoCamNom").css('color', color_lbl);
        $("#lblnro_solicitudCamNom").css('color', color_lbl);
        $("#lblfecha_solicitudCamNom").css('color', color_lbl);
        $("#lblnro_resolucionCamNom").css('color', color_lbl);
        $("#lblfecha_resolucionCamNom").css('color', color_lbl);
        $("#lblreferenciaclienteCamNom").css('color', color_lbl);
        $("#lblcomentarioCamNom").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Cambio de Nombre*/
    function ResetTablaCambioNombreEdit() {
        $("#camnomEditFrm")[0].reset();
        $('#clienteCamNom_edit').val('').trigger('change');
        $('#oficinaCamNom_edit').val('').trigger('change');
        $('#staffCamNom_edit').val('').trigger('change');
        $('#estadoCamNom_edit').val('').trigger('change');
        $("#lbloficinaCamNom_edit").css('color', color_lbl);
        $("#lblestadoCamNom_edit").css('color', color_lbl);
        $("#lblnro_solicitudCamNom_edit").css('color', color_lbl);
        $("#lblfecha_solicitudCamNom_edit").css('color', color_lbl);
        $("#lblnro_resolucionCamNom_edit").css('color', color_lbl);
        $("#lblfecha_resolucionCamNom_edit").css('color', color_lbl);
        $("#lblreferenciaclienteCamNom_edit").css('color', color_lbl);
        $("#lblcomentarioCamNom_edit").css('color', color_lbl);
    }
    
    // Cambio de Nombre
    function TablaCambioNombre(){
        let url = '<?php echo admin_url("pi/CambioNombreController/showCambioNombre/$id");?>';
        $.get(url, function(response){
            let cambioNombre = JSON.parse(response);
            console.log('CambioNombre', cambioNombre);
            tblCamNomDT = $("#CambioNombreTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: cambioNombre,
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
                            data: 'cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'oficina',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'staff',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'estado',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'referencia_cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentarios',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: '',
                            render: function (data, type, row)
                            {
                                data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="editCamNom btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;"></i>Editar</a></div>
                                <div class='col-md-6' style='padding-left: 10px;'><a id="${row.id}" class="Cambio-Nombre-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                                return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'id',
                            visible:false
                        },
                        {
                            data: 'client_id',
                            visible:false
                        },
                        {
                            data: 'oficina_id',
                            visible:false
                        },
                        {
                            data: 'staff_id',
                            visible:false
                        },
                        {
                            data: 'estado_id',
                            visible:false
                        }
                    ],
                    width: "100%"
                });
        
        
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE NOMBRE ANTERIOR   ********** */
    /* ####################################################################### */


    //Editar Cambio de Nombre Anterior  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCamNomAnteriorfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#CamNomAnterior_id').val();
        var row = FindRowDTbyColumn(tblCamNomAntDT, 'id', id);
        console.log('row', row);
        var id_cambionombre = row.cambio_nombre_id;
        var propietarios =  $('#Editarpropietarioscamnomanterior').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
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
            $("#EditarCambioNombreAnteriorModal").modal('hide');
            TablaCambioNombreAnterior(id_cambionombre);
        }).catch(function(response){
            alert("No se pudo Editar Cambio de Nombre Anterior");
        });
    });

    // Cambiar de Modal de Editar Cambio Nombre por Editar Cambio Nombre Anterior 
    $(document).on('click','.EditCamNomAnt',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CamNomAnterior_id').val(id);
        var row = FindRowDTbyColumn(tblCamNomAntDT, 'id', id);
        console.log('row', row);
        $('#Editarpropietarioscamnomanterior').val(row.propietario_id).trigger('change');
        $("#EditarCambioNombreAnteriorModal").modal('show');
    });
    
    //Eliminar Nombre Anterior
    $(document).on('click','.CamNom-Anterior-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCamNomAntDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.cambio_nombre_id;
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
                TablaCambioNombreAnterior(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Nombre Anterior");
            });
        }
    });

    //Cambio Nombre Anterior
    function TablaCambioNombreAnterior(id_cambionombre){
        let url = '<?php echo admin_url("pi/TipoCambioNombreController/showCambioNombreAnterior/");?>';
        url = url+id_cambionombre;
        $.get(url, function(response){
            let camnomant = JSON.parse(response);
            console.log('CamNom Anterior', camnomant);
            tblCamNomAntDT = $("#CamNomAnteriorTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: camnomant,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCamNomAnt btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="CamNom-Anterior-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cambio_nombre_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE NOMBRE ACTUAL     ********** */
    /* ####################################################################### */


    //Editar Cambio de Nombre Actual  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCamNomActualfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#CamNomActual_id').val();
        var row = FindRowDTbyColumn(tblCamNomActDT, 'id', id);
        console.log('row', row);
        var id_cambionombre = row.cambio_nombre_id;
        var propietarios =  $('#Editpropietarioscamnomactual').val();
        var csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('propietarios',propietarios);
        formData.append('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/TipoCambioNombreController/UpdateTipoCambioNombre/");?>';
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
            $("#EditCambioNombreActualModal").modal('hide');
            TablaCambioNombreActual(id_cambionombre);
        }).catch(function(response){
            alert("No se pudo Editar Cambio de Nombre Actual");
        });
    });

    // Cambiar de Modal de Editar Cambio Nombre por Editar Cambio Nombre Actual 
    $(document).on('click','.EditCamNomAct',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CamNomActual_id').val(id);
        var row = FindRowDTbyColumn(tblCamNomActDT, 'id', id);
        console.log('row', row);
        $('#Editpropietarioscamnomactual').val(row.propietario_id).trigger('change');
        $("#EditCambioNombreActualModal").modal('show');

    });
    
    //Eliminar Nombre Anterior
    $(document).on('click','.CamNom-Actual-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCamNomActDT, 'id', id);
            console.log('row', row);
            let id_cambio = row.cambio_nombre_id;
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
                TablaCambioNombreActual(id_cambio);
            }).catch(function(response){
                alert("No se pudo Eliminar Nombre Actual");
            });
        }
    });

    //Cambio Nombre Actual
    function TablaCambioNombreActual(id_cambionombre){
        let url = '<?php echo admin_url("pi/TipoCambioNombreController/showCambioNombreActual/");?>';
        url = url+id_cambionombre;
        $.get(url, function(response){
            let camnomact = JSON.parse(response);
            console.log('CamNom Actual', camnomact);
            tblCamNomActDT = $("#CamNomActualTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: camnomact,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCamNomAct btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="CamNom-Actual-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cambio_nombre_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE DOMICILIO         ********** */
    /* ####################################################################### */


    //Añadir Cambio Domicilio ----------------------------------------------------------------------
    $(document).on('click','#AddCambioDomiciliofrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaCamDom').val() && 
            $('#estadoCamDom').val() && 
            $('#estadoCamDom').val() && 
            $('#fecha_solicitudCamDom').val() &&
            $('#nro_resolucionCamDom').val() &&
            $('#fecha_resolucionCamDom').val() &&
            $('#referenciaclienteCamDom').val() &&
            $('#comentarioCamDom').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var cliente =  $('#clienteCamDom').val();
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
                TablaCambioDomicilio();
            }).catch(function(response){
                alert("No se pudo Añadir Cambio Domicilio");
            });
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
    });

    //Editar Cambio Domicilio ----------------------------------------------------------------------
    $(document).on('click','#EditCambioDomiciliofrmsubmit',function(e){
        e.preventDefault();
        if ($('#oficinaCamDom_edit').val() && 
            $('#estadoCamDom_edit').val() && 
            $('#nro_solicitudCamDom_edit').val() && 
            $('#fecha_solicitudCamDom_edit').val() &&
            $('#nro_resolucionCamDom_edit').val() &&
            $('#fecha_resolucionCamDom_edit').val() &&
            $('#referenciaclienteCamDom_edit').val() &&
            $('#comentarioCamDom_edit').val()) 
            {
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#camdomid').val();
            var cliente =  $('#clienteCamDom_edit').val();
            var oficina = $('#oficinaCamDom_edit').val();
            var staff =  $('#staffCamDom_edit').val();
            var estado =  $('#estadoCamDom_edit').val();
            var nro_solicitud =  $('#nro_solicitudCamDom_edit').val();
            var fecha_solicitud = $('#fecha_solicitudCamDom_edit').val();
            var nro_resolucion =  $('#nro_resolucionCamDom_edit').val();
            var fecha_resolucion = $('#fecha_resolucionCamDom_edit').val();
            var referenciacliente =  $('#referenciaclienteCamDom_edit').val();
            var comentario =  $('#comentarioCamDom_edit').val();
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
                TablaCambioDomicilio();
            }).catch(function(response){
                alert("No se pudo Editar Cambio Domicilio");
            });
        }else{
            $("#lbloficinaCamDom_edit").css('color', $('#oficinaCamDom_edit').val() ? color_lbl : 'red');
            $("#lblestadoCamDom_edit").css('color', $('#estadoCamDom_edit').val() ? color_lbl : 'red');
            $("#lblnro_solicitudCamDom_edit").css('color', $('#nro_solicitudCamDom_edit').val() ? color_lbl : 'red');
            $("#lblfecha_solicitudCamDom_edit").css('color', $('#fecha_solicitudCamDom_edit').val() ? color_lbl : 'red');
            $("#lblnro_resolucionCamDom_edit").css('color', $('#nro_resolucionCamDom_edit').val() ? color_lbl : 'red');
            $("#lblfecha_resolucionCamDom_edit").css('color', $('#fecha_resolucionCamDom_edit').val() ? color_lbl : 'red');
            $("#lblreferenciaclienteCamDom_edit").css('color', $('#referenciaclienteCamDom_edit').val() ? color_lbl : 'red');
            $("#lblcomentarioCamDom_edit").css('color', $('#comentarioCamDom_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe introducir todos los datos para Editar el Cambio de Domicilio');
        }
    });

    //Al cerrar el modal
    $('#AddCambioDomicilio').on('hidden.bs.modal', function (e) {
        ResetTablaCambioDomicilio();
    })

    //Al cerrar el modal
    $('#EditCambioDomicilio').on('hidden.bs.modal', function (e) {
        ResetTablaCambioDomicilioEdit();
    })

    //Eliminar Cambio Domicilio
    $(document).on('click','.Cambio-Domicilio-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
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
                TablaCambioDomicilio();
            }).catch(function(response){
                alert("No se pudo Eliminar Cambio Domicilio");
            });
        }
    });

    //Modal Edit Cambio de Domicilio
    $(document).on('click','.editCamDom',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblCamDomDT, 'id', id);
        console.log('row', row);
        
        $('#clienteCamDom_edit').val(row.client_id).trigger('change');
        $('#oficinaCamDom_edit').val(row.oficina_id).trigger('change');
        $('#staffCamDom_edit').val(row.staff_id).trigger('change');
        $('#estadoCamDom_edit').val(row.estado_id).trigger('change');
        $("#nro_solicitudCamDom_edit").val(row.num_solicitud);
        $("#fecha_solicitudCamDom_edit").val(row.fecha_solicitud);
        $("#nro_resolucionCamDom_edit").val(row.num_resolucion);
        $("#fecha_resolucionCamDom_edit").val(row.fecha_resolucion);
        $("#referenciaclienteCamDom_edit").val(row.referencia_cliente);
        $("#comentarioCamDom_edit").val(row.comentarios);
        $("#camdomid").val(row.id);
        TablaCambioDomicilioAnterior(row.id);
        TablaCambioDomicilioActual(row.id);
        $("#EditCambioDomicilio").modal('show'); 
    });

    /***funcion que hace reset del Modal de Cambio de Domicilio*/
    function ResetTablaCambioDomicilio() {
        $("#camdomFrm")[0].reset();
        $('#clienteCamDom').val('').trigger('change');
        $('#oficinaCamDom').val('').trigger('change');
        $('#staffCamDom').val('').trigger('change');
        $('#estadoCamDom').val('').trigger('change');
        $("#lbloficinaCamDom").css('color', color_lbl);
        $("#lblestadoCamDom").css('color', color_lbl);
        $("#lblnro_solicitudCamDom").css('color', color_lbl);
        $("#lblfecha_solicitudCamDom").css('color', color_lbl);
        $("#lblnro_resolucionCamDom").css('color', color_lbl);
        $("#lblfecha_resolucionCamDom").css('color', color_lbl);
        $("#lblreferenciaclienteCamDom").css('color', color_lbl);
        $("#lblcomentarioCamDom").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Cambio de Domicilio*/
    function ResetTablaCambioDomicilioEdit() {
        $("#camdomEditFrm")[0].reset();
        $('#clienteCamDom_edit').val('').trigger('change');
        $('#oficinaCamDom_edit').val('').trigger('change');
        $('#staffCamDom_edit').val('').trigger('change');
        $('#estadoCamDom_edit').val('').trigger('change');
        $("#lbloficinaCamDom_edit").css('color', color_lbl);
        $("#lblestadoCamDom_edit").css('color', color_lbl);
        $("#lblnro_solicitudCamDom_edit").css('color', color_lbl);
        $("#lblfecha_solicitudCamDom_edit").css('color', color_lbl);
        $("#lblnro_resolucionCamDom_edit").css('color', color_lbl);
        $("#lblfecha_resolucionCamDom_edit").css('color', color_lbl);
        $("#lblreferenciaclienteCamDom_edit").css('color', color_lbl);
        $("#lblcomentarioCamDom_edit").css('color', color_lbl);
    }

    //Cambio Domicilio
    function TablaCambioDomicilio(){
        let url = '<?php echo admin_url("pi/MarcasDomicilioController/showCambioDomicilio/$id");?>';
        $.get(url, function(data){
            let listadomicilio = JSON.parse(data);
            console.log('CambioDomicilio', listadomicilio);
            tblCamDomDT = $("#CambioDomicilioTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: listadomicilio,
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
                            data: 'cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'oficina',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'staff',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'estado',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_solicitud',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'num_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'fecha_resolucion',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'referencia_cliente',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentarios',
                            render: function (data, type, row)
                            {
                                return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                            }
                        },
                        {
                            data: '',
                            render: function (data, type, row)
                            {
                                data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="editCamDom btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;"></i>Editar</a></div>
                                <div class='col-md-6' style='padding-left: 10px;'><a id="${row.id}" class="Cambio-Domicilio-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                                return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'id',
                            visible:false
                        },
                        {
                            data: 'client_id',
                            visible:false
                        },
                        {
                            data: 'oficina_id',
                            visible:false
                        },
                        {
                            data: 'staff_id',
                            visible:false
                        },
                        {
                            data: 'estado_id',
                            visible:false
                        }
                    ],
                    width: "100%"
                });


        })
            
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE DOMICILIO ANTERIOR********** */
    /* ####################################################################### */

    //Editar Cambio de Domiclio Anterior  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCamDomAnteriorfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#CamDomAnterior_id').val();
        var row = FindRowDTbyColumn(tblCamDomAntDT, 'id', id);
        console.log('row', row);
        var id_cambiodomiclio = row.cambio_domicilio_id;
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
            TablaCambioDomicilioAnterior(id_cambiodomiclio);
        }).catch(function(response){
            alert("No se pudo Añadir Cambio de Domiclio Anterior");
        });
    });

    // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Anterior 
    $(document).on('click','.EditCamDomAnt',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CamDomAnterior_id').val(id);
        var row = FindRowDTbyColumn(tblCamDomAntDT, 'id', id);
        console.log('row', row);
        $('#Editarpropietarioscamdomanterior').val(row.propietario_id).trigger('change');
        $("#EditarCambioDomicilioAnteriorModal").modal('show');
    });
    
    //Eliminar Domicilio Anterior
    $(document).on('click','.CamDom-Anterior-delete',function(){
        //$("#EditCambioDomicilio").modal('hide');
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCamDomAntDT, 'id', id);
            console.log('row', row);
            let id_cambiodomiclio = row.cambio_domicilio_id;
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
                TablaCambioDomicilioAnterior(id_cambiodomiclio);
            }).catch(function(response){
                alert("No se pudo Eliminar Domicilio Anterior");
            });
        }
    });

    //Cambio Domicilio Anterior
    function TablaCambioDomicilioAnterior(id_cambiodomiclio){
        let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/showCambioDomicilioAnterior/");?>';
        url = url+id_cambiodomiclio;
        $.get(url, function(response){
            let camdomant = JSON.parse(response);
            console.log('CamDom Anterior', camdomant);
            tblCamDomAntDT = $("#CamDomAnteriorTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: camdomant,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCamDomAnt btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="CamDom-Anterior-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cambio_domicilio_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES CAMBIO DE DOMICILIO ACTUAL  ********** */
    /* ####################################################################### */

    
    //Editar Cambio de Domiclio Actual  ---------------------------------------------------------------------------
    $(document).on('click','#EditarCamDomActualfrmsubmit',function(e){
        e.preventDefault();
        var formData = new FormData();
        var data = getFormData(this);
        var id = $('#CamDomActual_id').val();
        var row = FindRowDTbyColumn(tblCamDomActDT, 'id', id);
        console.log('row', row);
        var id_cambiodomiclio = row.cambio_domicilio_id;
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
            TablaCambioDomicilioActual(id_cambiodomiclio);
        }).catch(function(response){
            alert("No se pudo Editar Cambio de Domiclio Actual ");
        });
    });
    
    // Cambiar de Modal de Editar Cambio Domiclio por Editar Cambio Domicilio Actual 
    $(document).on('click','.EditCamDomAct',function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $('#CamDomActual_id').val(id);
        var row = FindRowDTbyColumn(tblCamDomActDT, 'id', id);
        console.log('row', row);
        $('#Editpropietarioscamdomactual').val(row.propietario_id).trigger('change');
        $("#EditCambioDomicilioActualModal").modal('show');

    });

    //Eliminar Domicilio Actual
    $(document).on('click','.CamDom-Actual-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            let id = $(this).attr('id');
            var row = FindRowDTbyColumn(tblCamDomActDT, 'id', id);
            console.log('row', row);
            let id_cambiodomiclio = row.cambio_domicilio_id;
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
                TablaCambioDomicilioActual(id_cambiodomiclio);
            }).catch(function(response){
                alert("No se pudo Eliminar Domicilio Actual");
            });
        }
    });

    //Cambio Domicilio Actual
    function TablaCambioDomicilioActual(id_cambiodomiclio){
        let url = '<?php echo admin_url("pi/TipoMarcasDomicilioController/showCambioDomicilioActual/");?>';
        url = url+id_cambiodomiclio;
        $.get(url, function(response){
            let camdomact = JSON.parse(response);
            console.log('CamDom Actual', camdomact);
            tblCamDomActDT = $("#CamDomActualTbl_edit").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                autoWidth: false,
                data: camdomact,
                destroy: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '65%', targets: 1 },
                    { width: '20%', targets: 2 }
                ],
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'propietario',
                        render: function (data, type, row)
                        {
                            return "<div class='col-12 text-left text-nowrap'>" + data + "</div>"
                        }
                    },
                    {
                        data: '',
                        render: function (data, type, row)
                        {
                            data = `<div class='col-md-6' style='padding-left: 0px;'><a id="${row.id}" class="EditCamDomAct btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-edit" style="top: 5px;padding-right: 15px;"></i>Editar</a></div>
                            <div class='col-md-6'><a id="${row.id}" class="CamDom-Actual-delete btn btn-light link-style" style= "background-color: white;padding-top: 0px;"><i class="fas fa-trash" style="top: 5px;"></i>Borrar</a></div>`;
                            return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                        }
                    },
                    {
                        data: 'cambio_domicilio_id',
                        visible:false
                    },
                    {
                        data: 'propietario_id',
                        visible:false
                    }
                ],
                width: "100%"
            }); 
        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES DOCUMENTOS                  ********** */
    /* ####################################################################### */


    //Añadir Documento ---------------------------------------------------------------------------
    $(document).on('click','#documentofrmsubmit',function(e){
        e.preventDefault();
        if ($('#doc_descripcion').val() && $('#doc_comentario').val()
            && $('#doc_archivo').val() && $('#doc_archivo').get(0).files[0].type == 'application/pdf') {
            var formData = new FormData();
            var data = getFormData(this);
            const id_marcas = '<?php echo $id?>';
            var description =  $('#doc_descripcion').val();
            var comentario_archivo = $('#doc_comentario').val();
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
                console.log(response);
                alert_float('success', "Insertado Correctamente");
                $("#docModal").modal('hide');
                TablaDocumentos();
            }).catch(function(response){
                alert("Error al Subir el Archvio ",response.name);
            });
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

    //Editar Documento ---------------------------------------------------------------------------
    $(document).on('click','#documentoeditfrmsubmit',function(e){
        e.preventDefault();
        if ($('#doc_descripcion_edit').val() && $('#doc_comentario_edit').val()) {
            var formData = new FormData();
            var data = getFormData(this);
            var id = $('#Documento_id').val();
            var description =  $('#doc_descripcion_edit').val();
            var comentario_archivo = $('#doc_comentario_edit').val();
            var doc_archivo = $('#doc_archivo_edit')[0].files[0];
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
                TablaDocumentos();
            }).catch(function(response){
                alert("No se pudo Editar Documento");
            });
        /* }else if ($('#doc_archivo_edit').val() && $('#doc_archivo_edit').get(0).files[0].type != 'application/pdf'){
            $("#lbldoc_archivo_edit").css('color', 'red');
            $("#lbldoc_descripcion_edit").css('color', $('#doc_descripcion_edit').val() ? color_lbl : 'red');
            $("#lbldoc_comentario_edit").css('color', $('#doc_comentario_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Solamente se pueden subir archivos PDF'); */
        }else{
            $("#lbldoc_descripcion_edit").css('color', $('#doc_descripcion_edit').val() ? color_lbl : 'red');
            $("#lbldoc_comentario_edit").css('color', $('#doc_comentario_edit').val() ? color_lbl : 'red');
            //$("#lbldoc_archivo_edit").css('color', $('#doc_archivo_edit').val() ? color_lbl : 'red');
            alert_float('danger', 'Debe seleccionar todos los datos para Añadir el Documento');
        }

    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#docModal').on('hidden.bs.modal', function (e) {
        ResetTablaDocumento();
    });

    /**** funcion que se ejecuta al cerrar el Modal*/
    $('#docModalEdit').on('hidden.bs.modal', function (e) {
        ResetTablaDocumentoEdit();
    });

    //Eliminar Documentos
    $(document).on('click','.documentos-delete',function(){
        if (confirm("Quieres eliminar este registro?")){
            var id = $(this).attr('id');
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
                TablaDocumentos();
            }).catch(function(response){
                alert("No se pudo Eliminar Documentos");
            });
        }
});

    //Modal Edit Documento
    $(document).on('click','.editdoc',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var row = FindRowDTbyColumn(tblDocomentoDT, 'id', id);
        console.log('row', row);
        
        $("#doc_descripcion_edit").val(row.descripcion);
        $("#doc_comentario_edit").val(row.comentario);
        $("#Documento_id").val(row.id);
        $("#docModalEdit").modal('show'); 
    });

    /***funcion que hace reset del Modal de Cambio de Domicilio*/
    function ResetTablaDocumento() {
        $("#documentoFrm")[0].reset();
        $("#lbldoc_descripcion").css('color', color_lbl);
        $("#lbldoc_comentario").css('color', color_lbl);
        $("#lbldoc_archivo").css('color', color_lbl);
    }

    /***funcion que hace reset del Modal de Cambio de Domicilio*/
    function ResetTablaDocumentoEdit() {
        $("#documentoFrmedit")[0].reset();
        $("#lbldoc_descripcion_edit").css('color', color_lbl);
        $("#lbldoc_comentario_edit").css('color', color_lbl);
        $("#doc_comentario_edit").css('color', color_lbl);
    }

    // Documentos
    function TablaDocumentos(){
        let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/showDocumentos/$id");?>';
        $.get(url, function(response){
            let documentos = JSON.parse(response);
            console.log('Documentos', documentos);
             tblDocomentoDT = $("#DocumentosTbl").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    autoWidth: false,
                    data: documentos,
                    destroy: true,
                    columnDefs: [
                        { width: '5%', targets: 0 },
                        { width: '25%', targets: 1 },
                        { width: '25%', targets: 2 },
                        { width: '25%', targets: 3 },
                        { width: '15%', targets: 4 }
                    ],
                    columns: [
                         {
                            data: 'descripcion',
                            render: function (data, type, row)
                            {
                                return "<div class='row text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'comentario',
                            render: function (data, type, row)
                            {
                                return "<div class='row text-left'>" + data + "</div>"
                            }
                        },
                        {
                            data: 'path',
                            render: function (data, type, row)
                            {
                                data =`<a href="${data}" target="_blank">Ver Documento</a>`;
                                return "<div class='row'>" + data + "</div>"
                            }
                        },
                        {
                            data: '',
                            render: function (data, type, row)
                            {
                                data = `<div class='col-md-6' style="padding: 0;"><a id="${row.id}" class="editdoc btn btn-light" style="padding: 0;"><i class="fas fa-edit" style="margin: 0;"></i>Editar</a></div>
                                <div class='col-md-6' style="padding: 0;"><a id="${row.id}" class="documentos-delete btn btn-light" style= "background-color: white;padding: 0;"><i class="fas fa-trash" style="margin: 0;"></i>Borrar</a></div>`;
                                return "<div  class='row text-nowrap'>" + data + "</div>"

                            }
                        },
                        {
                            data: 'id',
                            visible:false
                        }
                    ],
                    width: "100%"
                });


        })
    }


    /* ####################################################################### */
    /* **********             FUNCIONES FACTURAS                    ********** */
    /* ####################################################################### */
    
    
    function TablaFacturas()
        {
            $.ajax({
                url:"<?php echo admin_url("pi/MarcasSolicitudesController/getInvoicesByMarca/{$id}");?>",
                method:"GET",
                success: function(response){
                    res = JSON.parse(response);
                    console.log('Facturas', res.data);
                    $('#tblInvoices').DataTable( {
                        autoWidth: false,
                        destroy: true,
                        data: res.data,
                        columnDefs: [
                            { width: '15%', targets: 0 },
                            { width: '30%', targets: 1 },
                            { width: '30%', targets: 2 },
                            { width: '25%', targets: 3 }
                        ],
                        columns: [
                            {
                                data: 'factura',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'fecha',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'estatus',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12'>" + data + "</div>"
                                }
                            },
                            {
                                data: 'acciones',
                                render: function (data, type, row)
                                {
                                    return "<div class='col-12' style='padding: 0px 1.5em;'>" + data + "</div>"
                                }
                            },
                        ],
                        width: "100%",
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                        }
                    });
                }
            })
        }




    /* ####################################################################### */
    /* **********             FUNCIONES VARIAS                      ********** */
    /* ####################################################################### */


    //**Funcion para guardar formulario */
    $("#solicitudfrm").on('submit', function(e){
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
        //clase_niza = JSON.stringify($("select[name=clase_niza_id]").val());
        //formData.append('clase_niza', clase_niza);
        //solicitantes fill
        solicitantes = JSON.stringify($("select[name=solicitantes_id]").val());//**revisar insert */
        formData.append('solicitantes_id', solicitantes);
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
        /* alert($("input[name=id]").val());
        // Display the key/value pairs
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        return; */
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
        
    //**Función para Buscar una Fila dentro de un Datatable Segun Columna y su valor */
    function FindRowDTbyColumn(DT, column, value) {
        return DT
            .row( function ( idx, data, node ) {
                    return data[column] === value ?
                        true : false;
                })
            .data();
    }

    //**Función para Input sólo numéricos */
    $(".numberOnly").keypress(function (e) {
        //e.preventDefault();
        var key = e.charCode || e.keyCode || 0;
        return (
            key == 8 || 
            key == 127 ||
            (key >= 48 && key <= 57));
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

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

    $(".calendar").on('keyup', function(e){
        e.preventDefault();
        $(".calendar").val('');
    })

    $("select").selectpicker({
        liveSearch:true,
        virtualScroll: 600,
    });

    $("select[multiple=multiple]").selectpicker({
        liveSearch:true,
        virtualScroll: 600
    });

    /***funcion que actualiza el IdRow de cada tabla*/
    function UpdtIdRow(tablaDT, tipoAnexo){
        jQuery.each(tablaDT, function(index, item) {
            item.acciones = item.acciones.replace(tipoAnexo + (item.idRow-1), tipoAnexo + index);
            item.idRow = index + 1;
        });
        return tablaDT;
    }


        //**Al cargar la pagina */
    $(function() {
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

        $(".calendar").datetimepicker({
                maxDate: fecha(),
                weeks: true,
                format: 'd/m/Y',
                timepicker:false,
        });

        TablaClases();
        TablaPrioridades();
        TablaPublicaciones();
        TablaEventos();
        TablaTareas();
        TablaCesion();
        TablaLicencia();
        TablaFusion();
        TablaCambioNombre();
        TablaCambioDomicilio();
        TablaDocumentos();
        TablaFacturas();

    });







        


  


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
            //Añadir Licencia Anterior  ---------------------------------------------------------------------------
            $(document).on('click','#AñadirLicenciaAnteriorfrmsubmitOLD',function(e){
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


        //Añadir Licencia Actual  ---------------------------------------------------------------------------
        $(document).on('click','#AñadirLicenciaActualfrmsubmitOLD',function(e){
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

        // ------------------------------------------- Eliminar Registros ----------------------------------------------------------------------------------------------------------

        //Eliminar Nombre Anterior
        //Eliminar Domicilio Anterior
 
 
 
 
    
    // Cambiar de Modal de Editar Cesion por Añadir Cesion Actual 
         


    /* ####################################################################### */
    /* **********             FUNCIONES CESION ANTERIOR             ********** */
    /* ####################################################################### */


    //  --------------------------------Añadir y Editar los siguientes Modulos---------------------------------------------

    // Cambiar de Modal de Añadir Fusion por Añadir Fusion Actual 
    $(document).on('click','#addbtnFusionActualOLD',function(e){
        console.log("Fusion Actual")
        e.preventDefault();
        ActualizarFusion();
        $("#AddFusion").modal('hide');
        $("#FusionActualModal").modal('show');
    });

    // Cambiar de Modal de Añadir Fusion por Añadir Fusion Anterior 
    $(document).on('click','#addbtnFusionAnteriorOLD',function(e){
        e.preventDefault();
        ActualizarFusion();
        $("#AddFusion").modal('hide');
        $("#FusionAnteriorModal").modal('show');
    });




    </script>