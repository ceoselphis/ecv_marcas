/*
    marca_id,
    marca_nombre,
    marca_clase_niza_id,
    marca_nombre_niza,
    marca_num_solicitud,
    marca_num_registro,
    marca_propietario_id,
    marca_pais_id,
    marca_opuesta_id,
    marca_opuesta_tipo_solicitud_id,
    marca_opuesta_client_id,
    marca_opuesta_estado_id,
    marca_opuesta_pais_id,
    marca_opuesta_nombre,
    marca_opuesta_clase_niza,
    marca_opuesta_solicitud,
    marca_opuesta_registro,
    marca_opuesta_fecha_solicitud,
    marca_opuesta_fecha_registro,
    marca_opuesta_propietario,
    marca_opuesta_pais,
    marca_tipo_expediente,
    marca_codigo_expediente,
    marca_nombre_solictud,
    marca_ref_interna,
    marca_estado_solicitud,
    marca_boletin,
    marca_publicacion,
    marca_tipo_evento,
    marca_descripcion_evento,
    marca_cliente,
    marca_nombre_cliente,
    marca_pais_cliente,
    marca_nombre_pais_cliente,
    marca_contacto,
    marca_ref_cliente
    
    */
                                  

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
                        <select class='form-control' name='marca_id' id="marca_id">
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
                                                'id' => 'marca_opuesta_fecha_solicitud',
                                                'name' => 'marca_opuesta_fecha_solicitud',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('marca_opuesta_fecha_solicitud', ''),
                                                'placeholder' => 'Solicitud Desde'
                                            ]); ?>
                    </div>
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
                        <select class='form-control' name='tipo_solicitud' id="tipo_solicitud">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['tipo_solicitud'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Registro', 'nro_registro'); ?>
                        <?php echo form_input('marca_num_registro', set_value('marca_num_registro'), ['class' => 'form-control','id'=>'marca_num_registro']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Propietario', 'propietario_id'); ?>
                        <select class='form-control' name='marca_propietario_id' id='marca_propietario_id'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
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
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="reset" class="btn btn-gray">Limpiar</button>
                <button id="filterSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Buscar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>