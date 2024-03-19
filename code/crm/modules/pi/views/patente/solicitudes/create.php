<?php
$CI = &get_instance();
init_head();
$CI->load->view('patente/solicitudes/css.php');
?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart(admin_url('pi/patentes/SolicitudesController/store'),['id' => 'solicitudfrm' , 'name' => 'solicitudfrm']);?>
                <?php echo form_hidden('id', $id);?>
                    <div class="panel_s">
                        <div class="panel-body">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                        <li role="presentation" class="active">
                                            <a href="#step1"  data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registro</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step2"  data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step3"  data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Extra</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step4"  data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step5"  data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Eventos</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step6"  data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Tareas</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step7"  data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Anexos</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab" style="background-color:#4BB543; color: white; border-color: white">8</span> <i style="color:#4BB543"> Documentos</i></a>
                                        </li>
                                    </ul>
                            </div>

                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Tipo de solicitud', 'tipo_registro_id'); ?>
                                            <?php echo form_dropdown(['name' => 'tipo_registro_id', 'id' => 'tipo_registro_id'], $tipo_registro, set_value('tipo_registro_id'), ['class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Cliente', 'client_id'); ?>
                                            <?php echo form_dropdown('client_id', $clientes, set_value('client_id'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Oficina', 'oficina_id') ?>
                                            <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Responsable', 'staff_id'); ?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    
                                    <div class="col-md-2">
                                        <?php echo form_label('Paises Designados', 'pais_id');?>
                                        <?php echo form_dropdown([
                                            'id'       => 'pais_id',
                                            'name'     => 'pais_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $pais_id,
                                            'value' => set_value('pais_id', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-2">  
                                        <?php echo form_label('Signo', 'signonom');?>
                                        <?php echo form_input([
                                            'id'    =>   'signonom',
                                            'name'  =>   'signonom',
                                            'class' =>   'form-control',
                                        ]);?>
                                    </div>
                                    <div class="col-md-1" style="padding-left:1%; padding-top:1.75%">
                                        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#signoModal"><i class="fas fa-paperclip"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_label('Tipo Signo', 'tipo_signo_id');?>
                                        <?php echo form_dropdown([
                                            'id'        => 'tipo_signo_id',
                                            'name'      => 'tipo_signo_id',
                                            'class'     => 'form-control',
                                            'options'   =>  $tipos_signo_id,
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Propietarios'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'propietarios',
                                            'name' => 'propietarios',
                                            'options' => $propietarios,
                                            'class' => 'form-control',
                                            'multiple' => 'multiple',
                                            'value' => set_value('propietarios', ''),
                                        ]); ?>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="col-md-6">
                                        <?php echo form_label('Clasificacion', 'clasificacion'); ?>
                                        <?php echo form_input([
                                            'id' => 'clasificacion',
                                            'name' => 'clasificacion',
                                            'class' => 'form-control',
                                            'value' => set_value('clasificacion', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Referencia Interna', 'ref_interna'); ?>
                                        <?php echo form_input([
                                            'id' => 'ref_interna',
                                            'name' => 'ref_interna',
                                            'class' => 'form-control',
                                            'value' => set_value('ref_interna', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Carpeta', 'carpeta'); ?>
                                        <?php echo form_input([
                                            'id' => 'carpeta',
                                            'name' => 'carpeta',
                                            'class' => 'form-control',
                                            'value' => set_value('carpeta', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Libro', 'libro'); ?>
                                        <?php echo form_input([
                                            'id' => 'libro',
                                            'name' => 'libro',
                                            'class' => 'form-control',
                                            'value' => set_value('libro', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Tomo', 'tomo'); ?>
                                        <?php echo form_input([
                                            'id' => 'tomo',
                                            'name' => 'tomo',
                                            'class' => 'form-control',
                                            'value' => set_value('tomo', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Folio', 'folio'); ?>
                                        <?php echo form_input([
                                            'id' => 'folio',
                                            'name' => 'folio',
                                            'class' => 'form-control',
                                            'value' => set_value('folio', ''),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 2%">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#prioridades" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Prioridades <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="prioridades">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#prioridadModal">Añadir</button>
                                                                <table id="prioridadTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Pais</th>
                                                                            <th>Número</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#publicaciones" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Publicaciones <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="publicaciones">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">Añadir</button>
                                                                <table id="publicacionesTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tipo</th>
                                                                            <th>Fecha</th>
                                                                            <th>Boletin</th>
                                                                            <th>Tomo</th>
                                                                            <th>Página</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
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
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="col-md-12">
                                        <?php echo form_label('Estado Actual', 'estado_id'); ?>
                                        <?php echo form_dropdown('estado_id', $estados_solicitudes, set_value('estado_id', ''), ['class' => 'form-control']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_solicitud',
                                            'name' => 'num_solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('num_solicitud'),
                                            'placeholder' => 'Nº de Solicitud'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_solicitud',
                                            'name' => 'fecha_solicitud',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_registro',
                                            'name' => 'num_registro',
                                            'class' => 'form-control',
                                            'value' => set_value('num_registro'),
                                            'placeholder' => 'Nº Registro'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de registro"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_registro',
                                            'name' => 'fecha_registro',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_registro'),
                                            'placeholder' => 'Fecha de Registro'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'num_certificado',
                                            'name' => 'num_certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('num_certificado'),
                                            'placeholder' => 'Nº de Certificado'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_certificado',
                                            'name' => 'fecha_certificado',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_certificado'),
                                            'placeholder' => 'Fecha de Certificado'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Solicitud"); ?>
                                        <?php echo form_input([
                                            'id' => 'num_solicitud_patente',
                                            'name' => 'num_solicitud_patente',
                                            'class' => 'form-control',
                                            'value' => set_value('num_solicitud_patente'),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha Solicitud"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_solicitud_patente',
                                            'name' => 'fecha_solicitud_patente',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('num_solicitud_patente'),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Publicacion"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_publicacion_patente',
                                            'name' => 'fecha_publicacion_patente',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_publicacion_patente'),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha Publicacion"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_publicacion_patente',
                                            'name' => 'fecha_publicacion_patente',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_publicacion_patente'),
                                        ]); ?>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="col-md-12">
                                        <?php echo form_label('Comentarios', 'comentarios'); ?>
                                        <?php echo form_textarea([
                                            'id' => 'comentarios',
                                            'name' => 'comentarios',
                                            'class' => 'form-control',
                                            'value' => set_value('comentarios', ''),
                                        ]); ?>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addEvento">Agregar</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive" id="eventos">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Creado por</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 7 -->
                                <div class="tab-pane" role="tabpanel" id="step7">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTarea">Agregar</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive" id="tareas">
                                            <thead>
                                                <tr>
                                                    <th>Asunto</th>
                                                    <th>Vencimiento</th>
                                                    <th>Finalizacion</th>
                                                    <th>Creado por</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 8 -->
                                <div class="tab-pane" role="tabpanel" id="step8">
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cesion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cesion">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCesion">Añadir Cesion</button>
                                                                <table id="cesionTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
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

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_cesion">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#licencia" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="licencia">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddLicencia">Añadir licencia</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
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

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_licencia">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#fusion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="fusion">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddFusion">Añadir Fusion</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_fusion">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cambio_nombre" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Nombre<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cambio_nombre">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioNombre">Añadir Cambio de nombre</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_cambio_nombre">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cambio_domicilio" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Domicilio<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cambio_domicilio">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioDomicilio">Añadir cambio de domicilio</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Staff</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_cambio_domicilio">

                                                                    </tbody>
                                                                </table>
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
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 9 -->
                                <div class="tab-pane" role="tabpanel" id="step9">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table id="soldocTbl" class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Creado Por</th>
                                                    <th>Descripcion</th>
                                                    <th>Archivo</th>
                                                    <th>Comentarios</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($SolDoc)) { ?>
                                                    <?php foreach ($SolDoc as $row) { ?>
                                                        <tr docid="<?php echo $row['id']; ?>">
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row['marcas_id']; ?></td>
                                                            <td><?php echo $row['descripcion']; ?></td>
                                                            <td><?php echo $row['path']; ?></td>
                                                            <td><?php echo $row['comentarios']; ?></td>
                                                            <form method="DELETE" action="<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/destroy/{$row['id']}"); ?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                                <td>
                                                                    <a class="editdoc btn btn-light" data-toggle="modal" data-target="#docModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else {
                                                ?>
                                                    <tr colspan="3">
                                                        <td>Sin Registros</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
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
<?php $CI->load->view('patente/solicitudes/modal.php'); ?>
<?php init_tail(); ?>
<?php $CI->load->view('patente/solicitudes/js.php'); ?>
</body>

</html>