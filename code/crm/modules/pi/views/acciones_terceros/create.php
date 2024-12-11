<?php
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php'); 
$select = ['' => '']; ?>
<style>
    .link-style {
        color: red !important;
    }
    .link-style:hover {
        color: #333 !important;
    }
</style>
<div id="wrapper">
    <div class="content">
         <!-- Loading Modal -->
         <div class="modal" id="modal-loading" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="loading-spinner mb-2"></div>
                        <div>Cargando...</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Crear Solicitud de Acciones a Terceros</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12"> <!--admin_url('pi/AccionesTerceroController/store')-->
            <?php echo form_open_multipart("", ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Inicio</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Marca Base</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Marca Opuesta</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Eventos</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Tareas</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Documentos</i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Tipo de solicitud', 'tipo_solicitud_id'); ?>
                                            <?php
                                            echo form_dropdown(
                                                ['name' => 'tipo_solicitud_id', 'id' => 'tipo_solicitud_id'],
                                                $tipo_solicitud,
                                                set_value('tipo_solicitud_id'),
                                                ['class' => 'form-control']
                                            ) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Cliente', 'client_id'); ?>
                                            <?php echo form_dropdown('client_id', $clientes, set_value('client_id'), ['class' => 'form-control','id' => 'client_id']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:10px;">
                                            <?php echo form_label('Oficina', 'oficina_id') ?>
                                            <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['class' => 'form-control','id' => 'oficina_id']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:10px;">
                                            <?php echo form_label('Responsable', 'staff_id'); ?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control','id' => 'staff_id']); ?>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" id="ValidadorInicio" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                                                    <?php echo ' '; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>     
                                    <div class="row">

                                        <div class="col-md-12">
                                            <?php echo form_label('Denominacion', 'marcas_id'); ?>
                                            <?php echo form_dropdown([
                                                'id'       => 'marcas_id',
                                                'name'     => 'marcas_id',
                                                'class'    => 'form-control',
                                                'options' => $marcas,
                                            ]); ?>
                                        </div>
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Clase', 'clase_id'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'clase_id',
                                                'name' => 'clase_id',
                                                'class' => 'form-control',
                                                'options' => $clase_niza,
                                                
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Pais', 'pais_id'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'pais_id',
                                                'name' => 'pais_id',
                                                'class' => 'form-control',
                                                'options' => $paises,
                                               // 'selected' => set_value('clase_id' , '226')
                                            ]); ?>
                                        </div>
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Nº Solicitud', 'nro_solicitud'); ?>
                                            <?php echo form_input([
                                                'id'       => 'nro_solicitud',
                                                'name'     => 'nro_solicitud',
                                                'class'    => 'form-control',
                                                'value'    => set_value('nro_solicitud', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Fecha Solicitud', 'fecha_solicitud'); ?>
                                            <?php echo form_input([
                                                'id'       => 'fecha_solicitud',
                                                'name'     => 'fecha_solicitud',
                                                'class'    => 'form-control calendar',
                                                'value'    => set_value('fecha_solicitud', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Nº Registro', 'nro_registro'); ?>
                                            <?php echo form_input([
                                                'id'       => 'nro_registro',
                                                'name'     => 'nro_registro',
                                                'class'    => 'form-control',
                                                'value'    => set_value('nro_registro', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Fecha Registro', 'fecha_registro'); ?>
                                            <?php echo form_input([
                                                'id'       => 'fecha_registro',
                                                'name'     => 'fecha_registro',
                                                'class'    => 'form-control calendar',
                                                'value'    => set_value('fecha_registro', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-12" style = "padding-top : 10px">
                                            <?php echo form_label('Propietario', 'propietario_id'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'propietario_id',
                                                'name' => 'propietario_id',
                                                'class' => 'form-control',
                                                'options' => $propietarios
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Ciudad', 'ciudad_propietario'); ?>
                                            <?php echo form_input([
                                                'id'       => 'ciudad_propietario',
                                                'name'     => 'ciudad_propietario',
                                                'class'    => 'form-control',
                                                'value'    => set_value('ciudad_propietario', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Pais', 'pais_propietario'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'pais_propietario',
                                                'name' => 'pais_propietario',
                                                'class' => 'form-control',
                                                'options' => $paises,
                                                'selected' => set_value('clase_id' , '226')
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-12" style = "padding-top : 10px">
                                            <?php echo form_label('Fundamento', 'fundamento'); ?>
                                            <?php echo form_textarea([
                                                'id' => 'fundamento',
                                                'name' => 'fundamento',
                                                'class' => 'form-control',
                                                'style' => 'height: 150px',
                                            ]); ?>
                                        </div>
                                    </div>       

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" id="ValidadorMarcaBase" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>


                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <?php echo form_label('Denominacion', 'marca_opuesta'); ?>
                                            <?php echo form_input([
                                                'id'       => 'marca_opuesta',
                                                'name'     => 'marca_opuesta',
                                                'class'    => 'form-control',
                                                'value'    => set_value('marca_opuesta', '')
                                            ]); ?>
                                        </div>
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Clase', 'clase_niza'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'clase_niza',
                                                'name' => 'clase_niza',
                                                'class' => 'form-control',
                                                'options' => $clase_niza
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Pais', 'pais_id'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'pais_id_opuesta',
                                                'name' => 'pais_id_opuesta',
                                                'class' => 'form-control',
                                                'options' => $paises
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Nº Solicitud', 'nro_solicitud'); ?>
                                            <?php echo form_input([
                                                'id'       => 'nro_solicitud_opuesta',
                                                'name'     => 'nro_solicitud_opuesta',
                                                'class'    => 'form-control',
                                                'value'    => set_value('nro_solicitud_opuesta', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Fecha Solicitud', 'fecha_solicitud_opuesta'); ?>
                                            <?php echo form_input([
                                                'id'       => 'fecha_solicitud_opuesta',
                                                'name'     => 'fecha_solicitud_opuesta',
                                                'class'    => 'form-control calendar',
                                                'value'    => set_value('fecha_solicitud_opuesta', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Nº Registro', 'nro_registro'); ?>
                                            <?php echo form_input([
                                                'id'       => 'nro_registro',
                                                'name'     => 'nro_registro_opuesta',
                                                'class'    => 'form-control',
                                                'value'    => set_value('nro_registro', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Fecha Registro', 'fecha_registro_opuesta'); ?>
                                            <?php echo form_input([
                                                'id'       => 'fecha_registro_opuesta',
                                                'name'     => 'fecha_registro_opuesta',
                                                'class'    => 'form-control calendar',
                                                'value'    => set_value('fecha_registro_opuesta', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-12" style = "padding-top : 10px">
                                            <?php echo form_label('Propietario', 'propietario_opuesta'); ?>
                                            <?php echo form_input([
                                                'id' => 'propietario_opuesta',
                                                'name' => 'propietario_opuesta',
                                                'class' => 'form-control',
                                                'value' => set_value('propietario_opuesta', '')
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Ciudad', 'ciudad_propietario_opuesta'); ?>
                                            <?php echo form_input([
                                                'id'       => 'ciudad_propietario_opuesta',
                                                'name'     => 'ciudad_propietario_opuesta',
                                                'class'    => 'form-control',
                                                'value'    => set_value('ciudad_propietario_opuesta', '', TRUE),
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Pais', 'pais_propietario_opuesta'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'pais_propietario_opuesta',
                                                'name' => 'pais_propietario_opuesta',
                                                'class' => 'form-control',
                                                'options' => $paises
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-12" style = "padding-top : 10px">
                                            <?php echo form_label('Agente', 'agente'); ?>
                                            <?php echo form_input([
                                                'id' => 'agente',
                                                'name' => 'agente',
                                                'class' => 'form-control',
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Boletin', 'boletin'); ?>
                                            <?php echo form_dropdown([
                                                'id' => 'boletin',
                                                'name' => 'boletin',
                                                'class' => 'form-control',
                                                'options' => $boletines
                                            ]); ?>
                                        </div>
    
                                        <div class="col-md-6" style = "padding-top : 10px">
                                            <?php echo form_label('Fecha', 'fecha_boletin'); ?>
                                            <?php echo form_input([
                                                'id' => 'fecha_boletin',
                                                'name' => 'fecha_boletin',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('fecha', ''),
                                            ]); ?>
                                        </div>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" id="ValidarMarcaOpuesta" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <?php echo form_label('Estado de Solicitud', 'estado_id'); ?>
                                            <?php echo form_dropdown('estado_id', $estados_solicitudes, set_value('estado_id', ''), ['class' => 'form-control', 'id'=>'estado_id']); ?>
                                        </div>
                                        <div class="col-md-12" style = "padding-top:10px">
                                            <?php echo form_label('Comentarios', 'comentarios'); ?>
                                            <?php echo form_textarea([
                                                'id' => 'comentarios',
                                                'name' => 'comentarios',
                                                'class' => 'form-control',
                                                'style' => 'height: 150px',
                                                'value' => set_value('comentarios', '')
                                            ]); ?>
                                        </div>
                                        <div class="col-md-12" style="padding: 1.5% 1.5% 1.5% 1.5%;">
                                            <div class="all-info-container">
                                                <div class="list-content">
                                                    <a href="#publicaciones" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Publicaciones <i class="fa fa-chevron-down"></i></a>
                                                    <div class="collapse" id="publicaciones">
                                                        <div class="list-box">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div style="display: flex; padding-top:20px ; padding-bottom:20px; justify-content: flex-end;">
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">Añadir publicacion</button>
                                                                    </div>
                                                                    <table id="publicacionTbl" class="table table-responsive" style="width: 100% !important;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>id</th>
                                                                                <th>Tipo de  publicacion</th>
                                                                                <th>Boletin</th>
                                                                                <th>Tomo</th>
                                                                                <th>Pagina</th>
                                                                                <th>Fecha</th>
                                                                                <th>Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="body_publicaciones">

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
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" id="ValidarExpediente" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 20px;">
                                            <table id="eventoTbl" class="table table-responsive" style="width: 100% !important;" >

                                                <thead>
                                                    <tr>
                                                        <th>Nº</th>
                                                        <th>Tipo Evento</th>
                                                        <th>Comentario</th>
                                                        <th>Fecha</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body_eventos">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tareaModal">Añadir Tarea</button>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 1.5%;">
                                            <table class="table table-responsive" id="tareaTbl" style="width: 100% !important;">
                                                <thead>
                                                    <tr>
                                                        <th>Nro</th>
                                                        <th>Tipo de Tarea</th>
                                                        <th>Descripcion</th>
                                                        <th>Fecha</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody > <!--id="body_tareas"-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 7 -->
                                <div class="tab-pane" role="tabpanel" id="step7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#documentoModal">Añadir Documentos</button>
                                        </div>
                                        <div class="col-md-12" style="padding-top: 1.5%;">
                                            <table class="table table-responsive" id="documentoTbl" style="width: 100% !important;">
                                                <thead>
                                                    <tr>
                                                        <th>Nro</th>
                                                        <th>Descripcion</th>
                                                        <th>Comentarios</th>
                                                        <th>Archivos</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody > <!--id="body_documentos"-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <!--
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $CI->load->view('acciones_terceros/modal.php');?>
<?php //$CI->load->view('acciones_terceros/modaledit.php');?>
<?php init_tail(); ?>
<?php $CI->load->view('acciones_terceros/js.php');?>
<?php $CI->load->view('acciones_terceros/js/anexos.php');?>
<?php $CI->load->view('acciones_terceros/js/script.php');?>
<script>
     $("#solicitudfrm").on('submit', function(e) {
        e.preventDefault();
        console.log(" Llegue a Solicitud ");
        var formData = new FormData();
     
        /*
              //-------------- Step 1 ---------------
        $form['tipo_solicitud_id'] = $data['tipo_solicitud_id'];
        $form['client_id'] = $data['client_id'];
        $form['oficina_id'] = $data['oficina_id'];
        $form['staff_id']  = $data['staff_id'];
        // ------------- Step 2 ----------------
        $form['marcas_id']  = $data['marcas_id'];
        $form['marca_pais_id'] = $data['pais_id'];
        $form['marca_propietario'] = is_null($data['propietario_id']) ? '' : $data['propietario_id'];
        $form['marca_ciudad']  = $data['ciudad_propietario'];
        $form['marca_pais_propietario_id'] = $data['pais_propietario'];
        $form['fundamento']        = $data['fundamento'];
        //--------------- Step 3 -----------------
        $form['marca_opuesta']     = $data['marca_opuesta'];
        $form['clase_niza']        = $data['clase_niza'];
        $form['pais_id']  = $data['pais_id_opuesta'];
        $form['solicitud_nro'] = $data['nro_solicitud_opuesta'];
        if (!empty($data['fecha_solicitud_opuesta'])) {
            $form['fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud_opuesta'])->format('Y-m-d');
        }
        $form['registro_nro']  = $data['nro_registro_opuesta'];
        if (!empty($data['fecha_registro_opuesta'])) {
            $form['fecha_registro'] = DateTime::createFromFormat('d/m/Y', $data['fecha_registro_opuesta'])->format('Y-m-d');
        }
        $form['propietario']  = $data['propietario_opuesta'];
        $form['ciudad_propietario'] = $data['ciudad_propietario_opuesta'];
        $form['pais_propietario_id'] = $data['pais_propietario_opuesta'];
        $form['agente']            = $data['agente'];
        $form['boletin_id']        = $data['boletin'];
        if (!empty($data['fecha_boletin'])) {
            $form['fecha_boletin'] = DateTime::createFromFormat('d/m/Y', $data['fecha_boletin'])->format('Y-m-d');
        }
        //--------------- Step 4 ----------------------
        $form['estado_id']         = $data['estado_id'];
        $form['comentarios']       = $data['comentarios'];
        */

        

        data = {
            // ------------- Step 1 ---------------
            'id' : '<?php echo $cod_id; ?>',
            'id_tipo_solicitud' : $("#tipo_solicitud_id").val(),
            'client_id' : $("#client_id").val(),
            'oficina_id' : $("#oficina_id").val(),
            'staff_id' : $("#staff_id").val(),
            //-------------- Step 2 ---------------
            'marcas_id' : $("#marcas_id").val(),
            'tipo_solicitud_id'  : $("#tipo_solicitud_id").val(),
            'clase_id' : $("#clase_id").val(),
            'pais_id' : $("#pais_id").val(),
            'nro_solicitud' : $("#nro_solicitud").val(),
            'fecha_solicitud' : $("#fecha_solicitud").val(),
            'nro_registro' : $("#nro_registro").val(),
            'fecha_registro' : $("#fecha_registro").val(),
            'propietario_id' : $("#propietario_id").val(),
            'ciudad_propietario' : $("#ciudad_propietario").val(),
            'pais_propietario' : $("#pais_propietario").val(),
            'fundamento' : $("#fundamento").val(),
            'marca_opuesta' : $("#marca_opuesta").val(),
            'clase_niza' : $("#clase_niza").val(),
            'pais_id_opuesta' : $("#pais_id_opuesta").val(),
            'nro_solicitud_opuesta' : $("#nro_solicitud_opuesta").val(),
            'fecha_solicitud_opuesta' : $("#fecha_solicitud_opuesta").val(),
            'nro_registro' : $("#nro_registro").val(),
            'fecha_registro_opuesta' : $("#fecha_registro_opuesta").val(),
            'propietario_opuesta' : $("#propietario_opuesta").val(),
            'ciudad_propietario_opuesta' : $("#ciudad_propietario_opuesta").val(),
            'pais_propietario_opuesta' : $("#pais_propietario_opuesta").val(),
            'agente' : $("#agente").val(),
            'boletin' : $("#boletin").val(),
            'fecha_boletin' : $("#fecha_boletin").val(),
            'estado_id' : $("#estado_id").val(),
            'comentarios' : $("#comentarios").val(),
        };
          console.log(" Data ", data);
      //  console.log(" Data ", data.id_estado);
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id', data.id);
        // ------------- Step 1 ----------------
        formData.append('id_tipo_solicitud' , data.id_tipo_solicitud);
        formData.append('client_id', data.client_id);
        formData.append('oficina_id', data.oficina_id);
        formData.append('staff_id', data.staff_id);

        //-------------- Step 2 ----------------
        formData.append('marcas_id', data.marcas_id),
        formData.append('tipo_solicitud_id', data.tipo_solicitud_id),
        formData.append('clase_id', data.clase_id),
        formData.append('pais_id', data.pais_id),
        formData.append('nro_solicitud', data.nro_solicitud),
        formData.append('fecha_solicitud', data.fecha_solicitud),
        formData.append('nro_registro', data.nro_registro),
        formData.append('fecha_registro', data.fecha_registro),
        formData.append('propietario_id', data.propietario_id),
        formData.append('ciudad_propietario', data.ciudad_propietario),
        formData.append('pais_propietario', data.pais_propietario),
        formData.append('fundamento', data.fundamento),
        formData.append('marca_opuesta', data.marca_opuesta),
        formData.append('clase_niza', data.clase_niza),
        formData.append('pais_id_opuesta', data.pais_id_opuesta),
        formData.append('nro_solicitud_opuesta', data.nro_solicitud_opuesta),
        formData.append('fecha_solicitud_opuesta', data.fecha_solicitud_opuesta),
        formData.append('nro_registro', data.nro_registro),
        formData.append('fecha_registro_opuesta', data.fecha_registro_opuesta),
        formData.append('propietario_opuesta', data.propietario_opuesta),
        formData.append('ciudad_propietario_opuesta', data.ciudad_propietario_opuesta),
        formData.append('pais_propietario_opuesta', data.pais_propietario_opuesta),
        formData.append('agente', data.agente),
        formData.append('boletin', data.boletin),
        formData.append('fecha_boletin', data.fecha_boletin),
        formData.append('estado_id', data.estado_id),
        formData.append('comentarios', data.comentarios),
     
        $.ajax({
            url: '<?php echo admin_url('pi/AccionesTerceroController/store'); ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(" Response " , response);
                // const obj = JSON.parse(response);
                // if (obj.code == 200) {
                //     let id = data.id;

                //     $.ajax({
                //     url: url_propietarios,
                //     method: 'POST',
                //     data: formPropietario,
                //     processData: false,
                //     contentType: false
                //     }).then(function (response) {
                //         console.log(" Response ", response);
                //     }).catch(function (response) {
                //         console.log(response.responseText);
                //         //alert_float('danger', 'No se pudo crear el Solicitante');
                //     });

                //     $.ajax({
                //         url: url_autores,
                //         method: 'POST',
                //         data: formAutor,
                //         processData: false,
                //         contentType: false
                //     }).then(function (response) {
                //         console.log(" Response ", response);
                //     }).catch(function (response) {
                //         console.log(response.responseText);
                //        // alert_float('danger', 'No se pudo crear la Patente');
                //     });

                //     alert_float('success', 'Solicitud guardada con éxito!');
                //     let ruta = '<?php echo admin_url("pi/AutoresSolicitudesController/edit/"); ?>';
                //     ruta = ruta + id;
                //     location.replace(ruta);
                // } else if (obj.code == 500) {
                //     console.log(" ")
                //     alert_float('danger', 'No se Pudo Guardar la Solicitud ');
                // }
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
</script>
</body>


</html>

