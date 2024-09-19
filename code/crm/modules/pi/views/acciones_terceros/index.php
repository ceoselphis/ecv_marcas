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
                    <div class="row">
                        <div class="col-md-12">
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
                                <tbody id="body_accionesterceros">

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
                                            <select class='form-control' name='denominacion' id="denominacion">
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
                                            <select class='form-control' name='clase_niza' id="clase_niza">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <?php echo form_label('Solicitud', 'solicitud'); ?>
                                            <?php echo form_input('solicitud', set_value('solicitud'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Registro', 'nro_registro'); ?>
                                            <?php echo form_input('nro_registro', set_value('nro_registro'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Propietario', 'propietario_id'); ?>
                                            <select class='form-control' name='propietario_id' id='propietario_id'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Pais', 'pais_marca'); ?>
                                            <select name="pais_marca" id="pais_marca" class='form-control'>
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
                                            <?php echo form_label('Marca', 'denominacion_opuesta'); ?>
                                            <?php echo form_input('denominacion_opuesta', set_value('denominacion_opuesta'), ['class' => 'form-control']); ?>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <?php echo form_label('Clases', 'clase_niza_opuesta'); ?>
                                            <select class='form-control' name='clase_niza_opuesta' id="clase_niza_opuesta">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <?php echo form_label('Solicitud', 'solicitud_opuesta'); ?>
                                            <?php echo form_input('solicitud_opuesta', set_value('solicitud_opuesta'), ['class' => 'form-control']); ?>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Registro', 'registro_opuesta'); ?>
                                            <?php echo form_input('registro_opuesta', set_value('registro_opuesta'), ['class' => 'form-control']); ?>
                                        </div>

                                        <!-- Fecha Solicitud Desde -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Solicitud Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'soli_desde',
                                                'name' => 'soli_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('soli_desde', ''),
                                                'placeholder' => 'Solicitud Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Fecha Solicitud Hasta -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Solicitud Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'soli_hasta',
                                                'name' => 'soli_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('soli_hasta', ''),
                                                'placeholder' => 'Solicitud Hasta'
                                            ]); ?>
                                        </div>
                                        
                                        <!-- Propietario  -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Propietario'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'propietario_opuesta',
                                                'name' => 'propietario_opuesta',
                                                'class' => 'form-control',
                                                'value' => set_value('propietario_opuesta', ''),
                                                'placeholder' => 'Nombre del Propietario'
                                            ]); ?>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Pais', 'pais_marca_opuesta'); ?>
                                            <select name="pais_marca_opuesta" id="pais_marca_opuesta" class='form-control'>
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
                                            <select name="tip_sol_id" id="tip_sol_id" class='form-control'>
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
                                                'id' => 'codigo_expediente',
                                                'name' => 'codigo_expediente',
                                                'class' => 'form-control',
                                                'value' => set_value('codigo_expediente', ''),
                                                'placeholder' => 'Expediente'
                                            ]); ?>
                                        </div>
                                        <!-- Referencia Interna -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Referencia Interna'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'ref_interna',
                                                'name' => 'ref_interna',
                                                'class' => 'form-control',
                                                'value' => set_value('ref_interna', ''),
                                                'placeholder' => 'Referencia Interna'
                                            ]); ?>
                                        </div>
                                        <!-- Tipo de Expediente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Estado'); ?>
                                            <select name="expediente_id" id="expediente_id" class='form-control'>
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
                                            <select name="boletin_id" id="boletin_id" class='form-control'>
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
                                            <select name="publicaciones_id" id="publicaciones_id" class='form-control'>
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
                                            <select name="evento_id" id="evento_id" class='form-control'>
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
                                            <select name="clientes_id" id="clientes_id" class='form-control'>
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
                                            <select name="pais_cliente_id" id="pais_cliente_id" class='form-control'>
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
                                                'id' => 'contacto',
                                                'name' => 'contacto',
                                                'class' => 'form-control',
                                                'value' => set_value('contacto', ''),
                                                'placeholder' => 'Nombre y Apellido del Contacto'
                                            ]); ?>
                                        </div>

                                        <!-- Referencia del Cliente -->
                                        <div class="col-md-4" style="padding-top: 10px;">
                                            <?php echo form_label('Referencia del Cliente'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'ref_cliente',
                                                'name' => 'ref_cliente',
                                                'class' => 'form-control',
                                                'value' => set_value('ref_cliente', ''),
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


<!-- id="search" -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Búsqueda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!--Denominacion-->
                    <div class="col-md-4">
                        <?php echo form_label('Marca', 'denominacion'); ?>
                        <select class='form-control' name='denominacion' id="denominacion">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['marcas'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Solicitud Desde'); ?>
                        <?php
                                            echo form_input([
                                                'id' => 'soli_desde',
                                                'name' => 'soli_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('soli_desde', ''),
                                                'placeholder' => 'Solicitud Desde'
                                            ]); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Clases', 'clase_niza'); ?>
                        <select class='form-control' name='clase_niza' id="clase_niza">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Solicitud', 'solicitud'); ?>
                        <select class='form-control' name='tipo_solicitud' id="tipo_solicitud">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['tipo_solicitud'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Registro', 'nro_registro'); ?>
                        <?php echo form_input('nro_registro', set_value('nro_registro'), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Propietario', 'propietario_id'); ?>
                        <select class='form-control' name='propietario_id' id='propietario_id'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Pais', 'pais_marca'); ?>
                        <select name="pais_marca" id="pais_marca" class='form-control'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['paises'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="reset" class="btn btn-gray">Limpiar</button>
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
<script>
    AccionesTerceros()
    // Mostrar Todo Acciones a Terceros
    function AccionesTerceros() {
        let url = '<?php echo admin_url("pi/AccionesTerceroController/ShowAccionesTerceros");?>';
        console.log(url);
        let body = ``;
        $.get(url, function (response) {

            let lista = JSON.parse(response).data;
            console.log("Acciones a Terceros ", lista);

            if (lista.length === 0) {
                $('#body_accionesterceros').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                url = "<?php echo admin_url("
                pi / AccionesTerceroController / edit / "); ?>";
                url = url + item.codigo;
                body += `<tr AccionesTercerosid = "${item.id}"> 
                                    <td class="text-center">${item.codigo}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.demandante}</td>
                                    <td class="text-center">${item.demandado}</td>
                                    <td class="text-center">${item.objeto}</td>
                                    <td class="text-center">${item.nro_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.pais}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" href="${url}" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="AccionesTerceros-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_accionesterceros').html(body);
        })
    }

    /*
      
                        <select class='form-control' name='denominacion' id="denominacion">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['marcas'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                 
                        <select class='form-control' name='tipo_solicitud' id="tipo_solicitud">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['tipo_solicitud'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                   
                        <select class='form-control' name='clase_niza' id="clase_niza">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                   
                        <select class='form-control' name='propietario_id' id='propietario_id'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                  
                        <?php echo form_input('nro_registro', set_value('nro_registro'), ['class' => 'form-control']); ?>

                    
                        <select name="pais_marca" id="pais_marca" class='form-control'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['paises'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>

                   
                        <?php echo form_input('marca_opuesta', set_value('marca_opuesta'), ['class' => 'form-control']); ?>
                    

                 
                        <select class='form-control' name='clase_niza_opuesta' id="clase_niza_opuesta">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                   
                        <?php echo form_input('registro_opuesta', set_value('registro_opuesta'), ['class' => 'form-control']); ?>
                    
                        <?php echo form_input('solicitud_opuesta', set_value('solicitud_opuesta'), ['class' => 'form-control']); ?>
                  
                        <?php echo form_input('solicitud_desde', set_value('solicitud_desde'), ['class' => 'form-control calendar']); ?>
                  
                        <?php echo form_input('solicitud_hasta', set_value('solicitud_hasta'), ['class' => 'form-control calendar']); ?>
                    
    */
    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        var params = {
            'denominacion': $("select[name=denominacion]").val(),
            'tipo_solicitud': $("select[name=tipo_solicitud]").val(),
            'clase_niza': $("select[name=clase_niza]").val(),
            'propietario_id': $("select[name=propietario_id]").val(),
            'nro_registro': $("input[name=nro_registro]").val(),
            'pais_marca': $("select[name=pais_marca]").val(),
            'marca_opuesta': $("input[name=marca_opuesta]").val(),
            'clase_niza_opuesta': $("select[name=clase_niza_opuesta]").val(),
            'registro_opuesta': $("input[name=registro_opuesta]").val(),
            'solicitud_opuesta': $("input[name=solicitud_opuesta]").val(),
            'solicitud_desde': $("input[name=solicitud_desde]").val(),
            'solicitud_hasta': $("input[name=solicitud_hasta]").val(),
        };
        console.log(" Parametros ", params);
        // $.ajax({
        //     url: "<?php echo admin_url('pi/AccionesTerceroController/ShowAccionesTerceros') ?>",
        //     method: "POST",
        //     data: {
        //         "csrf_token_name": $("input[name=csrf_token_name]").val(),
        //         data: JSON.stringify(params),
        //     },
        //     success: function (response) {
        //         console.log("Respuesta ",response);
        //         table = JSON.parse(response);
        //         $("#tableResult").DataTable({
        //             language: {
        //                 url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        //             },
        //             destroy: true,
        //             data: table.data,
        //             columns: [
        //                 { data: 'cod_contador' },
        //                 { 
        //                     data: 'tipo',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { 
        //                     data: 'propietario',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { 
        //                     data: 'nombre',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { 
        //                     data: 'clase',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { 
        //                     data: 'estado',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { 
        //                     data: 'solicitud',
        //                     render: function (data, type, row)
        //                     {
        //                         data = data ? data : '';
        //                         return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
        //                     }
        //                 },
        //                 { data: 'fecha_solicitud' },
        //                 { data: 'registro' },
        //                 { data: 'certificado' },
        //                 { data: 'vigencia' },
        //                 { data: 'pais' },
        //                 { data: 'acciones' },
        //             ]
        //         });
        //     }
        // })
    })

    // new DataTable("#tableResult", {
    //     destroy: true,
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
    //     },
    //     ajax: {
    //         url: '<?php echo admin_url('pi/AccionesTerceroController/ShowAccionesTerceros'); ?>',
    //         dataSrc: 'data'
    //     },
    //     columns: [{
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

    $(".calendar").on('keyup', function (e) {
        e.preventDefault();
        $(".calendar").val('');
    })
    $(function () {
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
    $("#filter").on('submit', function (e) {
        e.preventDefault();
        var data = {
            'denominacion': $("select[name=denominacion]").val(),
            'solicitud': $("input[name=solicitud]").val(),
            'clase_niza': $("select[name=clase_niza]").val(),
            'propietario': $("select[name=propietario_id]").val(),
            'nro_registro': $("input[name=nro_registro]").val(),
            'pais_marca': $("select[name=pais_marca]").val(),
            'marca_opuesta': $("input[name=marca_opuesta]").val(),
            'clase_niza_opuesta': $("select[name=clase_niza_opuesta]").val(),
            'registro_opuesta': $("input[name=registro_opuesta]").val(),
            'solicitud_opuesta': $("input[name=solicitud_opuesta]").val(),
            'solicitud_desde': $("input[name=solicitud_desde]").val(),
            'solicitud_hasta': $("input[name=solicitud_hasta]").val(),
            'csrf_token_name': $("input[name=csrf_token_name]").val()
        }

        // $.ajax({
        //     url: < ? php echo admin_url('pi/AccionesTerceroController/search'); ? > ,
        //     method : "POST",
        //     data: data,
        //     success: function (response) {
        //         console.log(response);
        //     }
        // })
    });
</script>


<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    function getFormData() {
        var config = {};
        $('input').each(function () {
            config[this.name] = this.value;
        });
        $("select").each(function () {
            config[this.name] = this.value;
        });
        return config;
    }
</script>





<script>
    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });

    $("#limpiar").on('click', function (event) {
        // recorrer todos los campos
        $(':input', '#filter').each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiar los valores de los campos
            if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
            // los checkboxes y radios, le quitamos el checked
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los select quedan con indice -
            else if (tag == 'select'){
                this.selectedIndex = 0;
                $('select').selectpicker('refresh'); 
            }
        });
    });


    // $("#filterSubmit").on('click', function (event) {
    //     event.preventDefault();
    //     /* var params = {
    //         'i.id': $("select[name=pais_id]").val(),
    //         's.boletin_id': $("select[name=boletin_id]").val(),
    //         'a.client_id': $("select[name=client_id]").val(),
    //         'a.oficina_id': $("select[name=oficina_id]").val(),
    //         'a.staff_id': $("select[name=staff_id]").val(),
    //         'a.tipo_solicitud_id': $("select[name=tip_sol_id]").val(),
    //         'a.estado_id': $("select[name=est_sol_id]").val(),
    //         'a.tipo_signo_id': $("select[name=tip_signo_id]").val(),
    //         'f.clase_niza_id': $("select[name=clase_niza_id]").val(),
    //         'a.tipo_registro_id': $("select[name=tip_reg_id]").val(),
    //         'm.tipo_evento_id': $("select[name=tip_eve_id]").val()
    //     }; */
    //     var params = {
    //         'cod_contador': $("input[name=cod_contador]").val(),
    //         'id_pais_solicitud': $("select[name=paisSol_id]").val(),
    //         'marca': $("input[name=marca]").val(),
    //         'id_cliente': $("select[name=client_id]").val(),
    //         'id_pais_cliente': $("select[name=paisCli_id]").val(),
    //         'id_contacto': $("select[name=contacto_id]").val(),
    //         'id_propietario': $("select[name=propietario_id]").val(),
    //         'id_pais_propietario': $("select[name=paisProp_id]").val(),
    //         'clase_niza_id': $("select[name=clase_niza_id]").val(),
    //         'ref_cliente': $("input[name=refCliente]").val(),
    //         'ref_interna': $("input[name=refInterna]").val(),
    //         'num_solicitud': $("input[name=num_solicitud]").val(),
    //         'num_registro': $("input[name=num_registro]").val(),
    //         'fecha_solicitud_desde': $("input[name=soli_desde]").val(),
    //         'fecha_solicitud_hasta': $("input[name=soli_hasta]").val(),
    //         'fecha_vencimiento_desde': $("input[name=vigencia_desde]").val(),
    //         'fecha_vencimiento_hasta': $("input[name=vigencia_hasta]").val(),
    //         'id_estado_solicitud': $("select[name=est_sol_id]").val(),
    //         'id_boletin': $("select[name=boletin_id]").val(),
    //         'id_tipo_publicacion': $("select[name=tipo_publicacion_id]").val(),
    //         'id_tipo_evento': $("select[name=tip_eve_id]").val(),
    //         'fecha_evento_desde': $("input[name=evento_desde]").val(),
    //         'fecha_evento_hasta': $("input[name=evento_hasta]").val(),
    //         'id_solicitud': $("select[name=tip_sol_id]").val(),
    //         'oficina_id': $("select[name=oficina_id]").val(),
    //         'id_responsable': $("select[name=responsable_id]").val(),
    //         'id_tipo_signo': $("select[name=tip_signo_id]").val(),
    //         'id_tipo_registro': $("select[name=tip_reg_id]").val(),
    //         'descripcion_niza': $("input[name=cobertura]").val(),
    //         'prueba_uso_desde': $("input[name=prueba_uso_desde]").val(),
    //         'prueba_uso_hasta': $("input[name=prueba_uso_hasta]").val(),
    //         'fecha_registro_desde': $("input[name=registro_desde]").val(),
    //         'fecha_registro_hasta': $("input[name=registro_hasta]").val()

    //     };
    //     $.ajax({
    //         url: "<?php echo admin_url('pi/MarcasSolicitudesController/filterSearch') ?>",
    //         method: "POST",
    //         data: {
    //             "csrf_token_name": $("input[name=csrf_token_name]").val(),
    //             data: JSON.stringify(params),
    //         },
    //         success: function (response) {
    //             console.log("Respuesta ",response);
    //             table = JSON.parse(response);
    //             $("#tableResult").DataTable({
    //                 language: {
    //                     url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
    //                 },
    //                 destroy: true,
    //                 data: table.data,
    //                 columns: [
    //                     { data: 'cod_contador' },
    //                     { 
    //                         data: 'tipo',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { 
    //                         data: 'propietario',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { 
    //                         data: 'nombre',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { 
    //                         data: 'clase',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { 
    //                         data: 'estado',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { 
    //                         data: 'solicitud',
    //                         render: function (data, type, row)
    //                         {
    //                             data = data ? data : '';
    //                             return "<div class='col-md-12 text-left text-nowrap'>" + data + "</div>"
    //                         }
    //                     },
    //                     { data: 'fecha_solicitud' },
    //                     { data: 'registro' },
    //                     { data: 'certificado' },
    //                     { data: 'vigencia' },
    //                     { data: 'pais' },
    //                     { data: 'acciones' },
    //                 ]
    //             });
    //         }
    //     })
    // })


    //-----------------------------------------------

    var formData = new FormData();
    function fecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if (dd < 10) {
            dd = '0' + dd;
        }
        else if (mm < 10) {
            mm = '0' + mm;
        }
        fecha = dd + "/" + mm + "/" + yy;
        return fecha;
    }

    $(".calendar").on('keyup', function (e) {
        e.preventDefault();
        $(".calendar").val('');
    })

    $(function () {
        $(".calendar").datetimepicker({
            //maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker: false,
        });
    });



</script>

</body>

</html>


