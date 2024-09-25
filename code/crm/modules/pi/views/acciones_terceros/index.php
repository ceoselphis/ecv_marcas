<?php

use PayPalHttp\Serializer\Form;

init_head(); ?>
<?php $CI = &get_instance(); ?>
<style>
    /* From bootstrap.css */
    .row-group {
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 10px;
    }
</style>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary"
                                href="<?php echo admin_url('pi/AccionesTerceroController/create'); ?>"><i
                                    class="fas fa-plus"></i> Nueva Accion a Terceros</a>
                            <button class="btn btn-white pull-right" data-toggle="modal" data-target="#search"><i
                                    class="fas fa-filter"></i> </button>
                        </div>
                    </div>
                    <!--
                <div class="col-md-12 pre-scrollable">
                            <table class="table" id="tableResult">
                -->
                    <div class="row">
                        <div class="col-md-12 ">
                        <table class="table" id="tableResult">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Tipo</th>
                                        <th>Demandante</th>
                                        <th>Demandado</th>
                                        <th>Objeto</th>
                                        <th>Nº solicitud</th>
                                        <th>Fecha Solicitud</th>
                                        <th>Estado</th>
                                        <th>Pais</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- FilterModal -->

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Busqueda de Acciones a Terceros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Marca Base</a>
                            </li>
                            <li role="presentation">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Objeto</a>
                            </li>
                            <li role="presentation">
                                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Más Parámetros</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <?php echo form_label('Marca', 'denominacion'); ?>
                                            <select class='form-control' name='marca_id' id="marca_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['marcas'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!--
                                        <div class="col-md-4">
                                            <?php //echo form_label('Marca', 'denominacion'); ?>
                                            <?php //echo form_input('denominacion', set_value('denominacion'), ['class' => 'form-control']); ?>
                                        </div>-->
                                        <div class="col-md-4">
                                            <?php echo form_label('Clases', 'clase_niza'); ?>
                                            <select class='form-control' name='marca_clase_niza_id' id="marca_clase_niza_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <?php echo form_label('Solicitud', 'solicitud'); ?>
                                            <?php echo form_input('marca_num_solicitud', set_value('marca_num_solicitud'), ['class' => 'form-control','id'=>'marca_num_solicitud']); ?>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Registro', 'nro_registro'); ?>
                                            <?php echo form_input('marca_num_registro', set_value('marca_num_registro'), ['class' => 'form-control','id'=>'marca_num_registro']); ?>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Propietario', 'marca_propietario_id'); ?>
                                            <select class='form-control' name='marca_propietario_id' id='marca_propietario_id'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Pais', 'pais_marca'); ?>
                                            <select name="marca_pais_id" id="marca_pais_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['paises'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <div class="col-md-4">
                                            <?php echo form_label('Marca', 'marca_opuesta_nombre'); ?>
                                            <?php echo form_input('marca_opuesta_nombre', set_value('marca_opuesta_nombre'), ['class' => 'form-control','id'=> 'marca_opuesta_nombre']); ?>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <?php echo form_label('Clases', 'marca_opuesta_clase_niza'); ?>
                                            <select class='form-control' name='marca_opuesta_clase_niza' id="marca_opuesta_clase_niza">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <?php echo form_label('Solicitud', 'marca_opuesta_solicitud'); ?>
                                            <?php echo form_input('marca_opuesta_solicitud', set_value('marca_opuesta_solicitud'), ['class' => 'form-control','id'=>'marca_opuesta_solicitud']); ?>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Registro', 'marca_opuesta_registro'); ?>
                                            <?php echo form_input('marca_opuesta_registro', set_value('marca_opuesta_registro'), ['class' => 'form-control','id'=>'marca_opuesta_registro']); ?>
                                        </div>

                                        <!-- Fecha Solicitud Desde -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Solicitud Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_opuesta_fecha_solicitud',
                                                'name' => 'marca_opuesta_fecha_solicitud',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('marca_opuesta_fecha_solicitud', ''),
                                                'placeholder' => 'Solicitud Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Fecha Solicitud Hasta -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Solicitud Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_opuesta_fecha_registro',
                                                'name' => 'marca_opuesta_fecha_registro',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('marca_opuesta_fecha_registro', ''),
                                                'placeholder' => 'Solicitud Hasta'
                                            ]); ?>
                                        </div>
                                        
                                        <!-- Propietario  -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Propietario'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_opuesta_propietario',
                                                'name' => 'marca_opuesta_propietario',
                                                'class' => 'form-control',
                                                'value' => set_value('marca_opuesta_propietario', ''),
                                                'placeholder' => 'Nombre del Propietario'
                                            ]); ?>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Pais', 'marca_opuesta_pais'); ?>
                                            <select name="marca_opuesta_pais" id="marca_opuesta_pais" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['paises'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Tipo de Solicitud -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Tipo de Solicitud', 'tip_sol_id'); ?>
                                            <select name="marca_tipo_solicitud" id="marca_tipo_solicitud" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['tipo_solicitud'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Expdiente -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Codigo'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_codigo_expediente',
                                                'name' => 'marca_codigo_expediente',
                                                'class' => 'form-control',
                                                'value' => set_value('marca_codigo_expediente', ''),
                                                'placeholder' => 'Expediente'
                                            ]); ?>
                                        </div>
                                        <!-- Referencia Interna -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Referencia Interna'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_ref_interna',
                                                'name' => 'marca_ref_interna',
                                                'class' => 'form-control',
                                                'value' => set_value('marca_ref_interna', ''),
                                                'placeholder' => 'Referencia Interna'
                                            ]); ?>
                                        </div>
                                        <!-- Tipo de Expediente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Estado'); ?>
                                            <select name="marca_tipo_expediente" id="marca_tipo_expediente" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['expediente'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Boletin -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Boletin'); ?>
                                            <select name="marca_boletin" id="marca_boletin" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['boletines'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Tipo de Publicacione -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Tipo Publicacion'); ?>
                                            <select name="marca_publicacion" id="marca_publicacion" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['tipo_publicaciones'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Tipo de Evento -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Tipo de Evento'); ?>
                                            <select name="marca_tipo_evento" id="marca_tipo_evento" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['tipo_evento'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Cliente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Cliente'); ?>
                                            <select name="marca_cliente" id="marca_cliente" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['clientes'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Pais Cliente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Pais del cliente'); ?>
                                            <select name="marca_pais_cliente" id="marca_pais_cliente" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['paises'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Contacto -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Contacto'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_contacto',
                                                'name' => 'marca_contacto',
                                                'class' => 'form-control',
                                                'value' => set_value('marca_contacto', ''),
                                                'placeholder' => 'Nombre y Apellido del Contacto'
                                            ]); ?>
                                        </div>

                                        <!-- Referencia del Cliente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Referencia del Cliente'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca_ref_cliente',
                                                'name' => 'marca_ref_cliente',
                                                'class' => 'form-control',
                                                'value' => set_value('marca_ref_cliente', ''),
                                                'placeholder' => 'Referencia del Cliente'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="limpiar" type="button" class="btn btn-gray">Limpiar</button>
                <button id="filterSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Buscar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>




<style>
    th,
    td {
        text-align: center;
    }
</style>

<?php init_tail(); ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    new DataTable("#tableResult", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>
<script>
    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        
        var params = {

            'marca_id': $("#marca_id").val(),
            'marca_clase_niza_id': $("#marca_clase_niza_id").val(),
            'marca_num_solicitud': $("#marca_num_solicitud").val(),
            'marca_num_registro': $("#marca_num_registro").val(),
            'marca_propietario_id': $("#marca_propietario_id").val(),
            'marca_pais_id': $("#marca_pais_id").val(),
            'marca_opuesta_nombre': $("#marca_opuesta_nombre").val(),
            'marca_opuesta_clase_niza': $("#marca_opuesta_clase_niza").val(),
            'marca_opuesta_solicitud': $("#marca_opuesta_solicitud").val(),
            'marca_opuesta_registro': $("#marca_opuesta_registro").val(),
            'marca_opuesta_fecha_solicitud': $("#marca_opuesta_fecha_solicitud").val(),
            'marca_opuesta_fecha_registro': $("#marca_opuesta_fecha_registro").val(),
            'marca_opuesta_propietario': $("#marca_opuesta_propietario").val(),
            'marca_opuesta_pais': $("#marca_opuesta_pais").val(),
            'marca_tipo_solicitud': $("#marca_tipo_solicitud").val(),
            'marca_codigo_expediente': $("#marca_codigo_expediente").val(),
            'marca_ref_interna': $("#marca_ref_interna").val(),
            'marca_tipo_expediente': $("#marca_tipo_expediente").val(),
            'marca_boletin': $("#marca_boletin").val(),
            'marca_publicacion': $("#marca_publicacion").val(),
            'marca_tipo_evento': $("#marca_tipo_evento").val(),
            'marca_cliente': $("#marca_cliente").val(),
            'marca_pais_cliente': $("#marca_pais_cliente").val(),
            'marca_contacto': $("#marca_contacto").val(),
            'marca_ref_cliente': $("#marca_ref_cliente").val(),
        };
        console.log("Parametros ",params);
        $.ajax({
            url: "<?php echo admin_url('pi/AccionesTerceroController/filterSearch') ?>",
            method: "POST",
            data: {
                "csrf_token_name": $("input[name=csrf_token_name]").val(),
                data: JSON.stringify(params),
            },
            success: function (response) {
                console.log("Respuesta ",response);
                table = JSON.parse(response);
                $("#tableResult").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table.data,
                    columns: [
                        {
                            data: 'codigo'
                        },
                        {
                            data: 'tipo'
                        },
                        {
                            data: 'demandante'
                        },
                        {
                            data: 'demandado'
                        },
                        {
                            data: 'objeto'
                        },
                        {
                            data: 'nro_solicitud'
                        },
                        {
                            data: 'fecha_solicitud'
                        },
                        {
                            data: 'estado'
                        },
                        {
                            data: 'pais'
                        },
                        {
                            data: 'acciones'
                        }
                        // { data: 'cod_contador' },
                        // { 
                        //     data: 'tipo',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { 
                        //     data: 'propietario',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { 
                        //     data: 'nombre',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { 
                        //     data: 'clase',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { 
                        //     data: 'estado',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { 
                        //     data: 'solicitud',
                        //     render: function (data, type, row)
                        //     {
                        //         data = data ? data : '';
                        //         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
                        //     }
                        // },
                        // { data: 'fecha_solicitud' },
                        // { data: 'registro' },
                        // { data: 'certificado' },
                        // { data: 'vigencia' },
                        // { data: 'pais' },
                        // { data: 'acciones' },
                    ]
                });
            }
        })
    })

    // new DataTable("#tableResult", {
    //     destroy: true,
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
    //     },
    //     ajax: {
    //         url: '<?php echo admin_url('pi/AccionesTerceroController/getAcciones'); ?>',
    //         dataSrc: 'data'
    //     },
    //     columns: [
    //         {
    //             data: 'codigo'
    //         },
    //         {
    //             data: 'tipo'
    //         },
    //         {
    //             data: 'demandante'
    //         },
    //         {
    //             data: 'demandado'
    //         },
    //         {
    //             data: 'objeto'
    //         },
    //         {
    //             data: 'nro_solicitud'
    //         },
    //         {
    //             data: 'fecha_solicitud'
    //         },
    //         {
    //             data: 'estado'
    //         },
    //         {
    //             data: 'pais'
    //         },
    //         {
    //             data: 'acciones'
    //         }
    //     ]
    // });


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
    $("#filter").on('submit', function(e){
        e.preventDefault();
        // var data = {
        //     'denominacion'          : $("select[name=denominacion]").val(),
        //     'solicitud'             : $("input[name=solicitud]").val(),
        //     'clase_niza'            : $("select[name=clase_niza]").val(),
        //     'propietario'           : $("select[name=propietario_id]").val(),
        //     'nro_registro'          : $("input[name=nro_registro]").val(),
        //     'pais_marca'            : $("select[name=pais_marca]").val(),
        //     'marca_opuesta'         : $("input[name=marca_opuesta]").val(),
        //     'clase_niza_opuesta'    : $("select[name=clase_niza_opuesta]").val(),
        //     'registro_opuesta'      : $("input[name=registro_opuesta]").val(),
        //     'solicitud_opuesta'     : $("input[name=solicitud_opuesta]").val(),
        //     'solicitud_desde'       : $("input[name=solicitud_desde]").val(),
        //     'solicitud_hasta'       : $("input[name=solicitud_hasta]").val(),
        //     'csrf_token_name'       : $("input[name=csrf_token_name]").val()
        // }

        $.ajax({
            url: <?php echo admin_url('pi/AccionesTerceroController/search');?>,
            method: "POST",
            data: data,
            success: function (response)
            {
                console.log(response);
            }
        })
    });
</script>

</body>

</html>


