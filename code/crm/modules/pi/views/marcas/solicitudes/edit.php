<?php 
$CI = &get_instance();
init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart('',['id' => 'solicitudfrm' , 'name' => 'solicitudfrm']);?>
                <?php echo form_hidden('id', $id);?>
                    <div class="panel_s">
                        <div class="panel-body">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                        <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registro</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Extra</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Eventos</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Tareas</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Anexos</i></a>
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
                                            <?php echo form_label('Tipo de solicitud', 'tipo_registro_id');?>
                                            <?php echo form_dropdown('tipo_registro_id', $tipo_registro ,set_value('tipo_registro_id', $values['tipo_registro_id']), ['class' => 'form-control'])?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Cliente','client_id');?>
                                            <?php echo form_dropdown('client_id', $clientes, set_value('client_id', $values['client_id']), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Oficina', 'oficina_id')?>
                                            <?php echo form_dropdown('oficina_id',$oficinas,set_value('oficina_id', $values['oficina_id']),['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Responsable','staff_id');?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id', $values['staff_id']), ['class' => 'form-control']);?>
                                        </div>                    
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="col-md-6">
                                        <?php echo form_label('Paises Designados', 'pais_id');?>
                                        <?php echo form_dropdown([
                                                'id'       => 'pais_id',
                                                'name'     => 'pais_id',
                                                'class'    => 'form-control',
                                                'multiple' => 'multiple',
                                                'options' => $pais_id,
                                                'selected' => set_value('pais_id', $values['pais_id'])
                                        ]);?>
                                    </div>
                                    <div class="col-md-2">  
                                        <?php echo form_label('Signo', 'signonom');?>
                                        <?php echo form_input([
                                            'id'    =>   'signonom',
                                            'name'  =>   'signonom',
                                            'class' =>   'form-control',
                                            'value' =>  set_value('signonom', $values['signonom'])
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
                                        <?php echo form_label('Clases', 'clase_niza_id');?>
                                        <?php echo form_dropdown([
                                            'id'       => 'clase_niza_id',
                                            'name'     => 'clase_niza_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $clase_niza_id,
                                            'selected' => set_value('clase_niza_id', $values['clase_niza_id'])
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Solicitantes', 'solicitantes_id');?>
                                        <?php echo form_dropdown([
                                            'id'       => 'solicitantes_id',
                                            'name'     => 'solicitantes_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $solicitantes,
                                            'selected' => set_value('solicitantes_id', $values['solicitantes_id'])
                                        ]);?>
                                    </div>
                                    
                                    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="col-md-2">
                                        <?php echo form_label('Tipo Solicitud', 'tipo_solicitud_id');?>
                                        <?php echo form_dropdown([
                                            'id'        => 'tipo_solicitud_id',
                                            'name'      => 'tipo_solicitud_id',
                                            'class'     => 'form-control',
                                            'options'   => $tipo_solicitud,
                                            'selected'  => set_value('tipo_solicitud_id', $values['tipo_solicitud_id']),
                                        ]);?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Referencia interna', 'ref_interna');?>
                                        <?php echo form_input('ref_interna', set_value('ref_interna', $values['ref_interna']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Referencia cliente', 'ref_cliente');?>
                                        <?php echo form_input('ref_cliente', set_value('ref_cliente', $values['ref_cliente']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Fecha de Primer Uso','primer_uso');?>
                                        <?php echo form_input('primer_uso', set_value('primer_uso', $values['primer_uso']), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Prueba Uso', 'prueba_uso');?>
                                        <?php echo form_input('prueba_uso', set_value('prueba_uso', $values['prueba_uso']), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Carpeta', 'carpeta');?>
                                        <?php echo form_input('carpeta', set_value('carpeta', $values['carpeta']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Libro', 'libro');?>
                                        <?php echo form_input('libro', set_value('libro', $values['libro']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Tomo', 'tomo');?>
                                        <?php echo form_input('tomo', set_value('tomo', $values['tomo']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Folio', 'folio');?>
                                        <?php echo form_input('folio', set_value('folio', $values['folio']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#prioridad" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Prioridades<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="prioridad">
                                                    <div class="list-box">
                                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#prioridadModal">Añadir prioridad</button>
                                                        <table class="table table-responsive" id="prioridadTbl">
                                                            <thead>
                                                                <tr>
                                                                    <th>Fecha</th>
                                                                    <th>Pais</th>
                                                                    <th>Número</th>
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
                                    <div class="col-md-12">
                                        <?php echo form_label('Comentarios', 'comentarios');?>
                                        <?php echo form_textarea('comentarios', set_value('comentarios', $values['comentarios']), ['class' => 'form-control']);?>
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
                                        <?php echo form_label('Estado de Solicitud', 'estado_id');?>
                                        <?php echo form_dropdown('estado_id', $estados_solicitudes, set_value('estado_id', $values['estado_id']), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_solicitud',
                                            'name' => 'num_solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('num_solicitud', $values['solicitud']),
                                            'placeholder' => 'Nº de Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Solicitud'); ?>
                                        <?php 
                                        echo form_input([
                                            'id' => 'fecha_solicitud',
                                            'name' => 'fecha_solicitud',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud', $values['fecha_solicitud']),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php 
                                        echo form_input([
                                            'id' => 'num_registro',
                                            'name' => 'num_registro',
                                            'class' => 'form-control',
                                            'value' => set_value('num_registro', $values['registro']),
                                            'placeholder' => 'Nº Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de registro"); ?>
                                        <?php 
                                        echo form_input([
                                            'id' => 'fecha_registro',
                                            'name' => 'fecha_registro',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_registro', $values['fecha_registro']),
                                            'placeholder' => 'Fecha de Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'num_certificado',
                                            'name' => 'num_certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('num_certificado', $values['certificado']),
                                            'placeholder' => 'Nº de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de certificado"); ?>
                                        <?php 
                                        echo form_input([
                                            'id' => 'fecha_certificado',
                                            'name' => 'fecha_certificado',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_certificado', $values['fecha_certificado']),
                                            'placeholder' => 'Fecha de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Vencimiento'); ?>
                                        <?php 
                                        echo form_input([
                                            'id' => 'fecha_vencimiento',
                                            'name' => 'fecha_vencimiento',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_vencimiento', $values['fecha_vencimiento']),
                                            'placeholder' => 'Fecha Vencimiento'
                                        ]);?>
                                    </div>
                                    <div class="col-md-12" style="padding: 1.5% 1.5% 1.5% 1.5%;">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#publicaciones" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Publicaciones <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="publicaciones">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#publicacionModal">Añadir publicacion</button>
                                                                <table id="publicacionTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Tipo de Publicacion</th>
                                                                            <th>Boletin</th>
                                                                            <th>Tomo</th>
                                                                            <th>Pagina</th>
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
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="col-md-12" >
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id= "body_eventos">
                                            </tbody>
                                        </table>
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
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTask">Añadir Tarea</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Tipo de Tarea</th>
                                                    <th>Comentarios</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id = "body_tareas">

                                            
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
                                    <div class="col-md-12" >
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
                                                                            <th>Acciones</th>
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
                                    <div class="col-md-12" >
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
                                                                            <th>Acciones</th>
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
                                    <div class="col-md-12" >
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
                                                                            <th>Acciones</th>
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
                                    <div class="col-md-12" >
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
                                                                            <th>Acciones</th>
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
                                    <div class="col-md-12" >
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
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                </thead>
                                                                    <tbody id = "body_cambio_domicilio">

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
                                <!-- Step 8 -->
                                <div class="tab-pane" role="tabpanel" id="step8">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Archivo</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Documento</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_documentos">
                                            
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
                <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Añadir Prioridad Modal -->
<div class="modal fade" id="prioridadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'prioridadFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Prioridad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_label('Pais de la prioridad', 'pais_prioridad');?>
                <?php echo form_dropdown('pais_prioridad', $pais_id, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Fecha', 'fecha_prioridad');?>
                <?php echo form_input('fecha_prioridad', '', ['class' => 'form-control calendar']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Número', 'nro_prioridad');?>
                <?php echo form_input('nro_prioridad','',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="prioridadfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Tareas Modal -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'tareasfrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Tareas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Tipo Tareas', 'tipo_tarea');?>
                <?php echo form_dropdown(['name'=>'tipo_tarea','id'=>'tipo_tarea'], $tipo_tareas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <?php echo form_label('Descripcion', 'descripcion');?>
                <?php echo form_textarea(['name'=>'descripcion','id'=>'descripcion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="tareasfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Editar Tareas Modal  -->
<div class="modal fade" id="EditTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'tareasfrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Tareas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="Tareaid">
            <div class="col-md-12">
                <?php echo form_label('Tipo Tareas', 'tipo_tarea');?>
                <?php echo form_dropdown(['name'=>'edittipo_tarea','id'=>'edittipo_tarea','class' => 'form-control'], $tipo_tareas  );?>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <?php echo form_label('Descripcion', 'descripcion');?>
                <?php echo form_textarea(['name'=>'editdescripcion','id'=>'editdescripcion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="tareaseditfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Publicacion Modal -->
<div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionFrm']);?>
    <?php echo form_hidden('pub_id', set_value('pub_id'));?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <?php echo form_label('Tipo', 'tipo_publicacion');?>
                <?php echo form_dropdown('tipo_publicacion', $tipo_publicacion, set_value('tipo_publicacion'),['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Boletin', 'boletin_publicacion');?>
                <?php echo form_dropdown('boletin_publicacion', $boletines, set_value('boletin_publicacion') , ['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion');?>
                <?php echo form_input('tomo_publicacion',set_value('tomo_publicacion'),['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion');?>
                <?php echo form_input('pag_publicacion',set_value('pag_publicacion'),['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="publicacionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Editar Publicacion Modal -->
<div class="modal fade" id="publicacionEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionFrm']);?>
    <?php echo form_hidden('pub_id_edit', set_value('pub_id_edit'));?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <?php echo form_label('Tipo', 'tipo_publicacion_edit');?>
                <?php echo form_dropdown('tipo_publicacion_edit', $tipo_publicacion, set_value('tipo_publicacion_edit'),['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Boletin', 'boletin_publicacion_edit');?>
                <?php echo form_dropdown('boletin_publicacion_edit', $boletines, set_value('boletin_publicacion_edit') , ['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion_edit');?>
                <?php echo form_input('tomo_publicacion_edit',set_value('tomo_publicacion_edit'),['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion_edit');?>
                <?php echo form_input('pag_publicacion_edit',set_value('pag_publicacion_edit'),['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="publicacionfrmsubmitEdit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Evento Modal -->
<div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'eventoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Tipo Evento', 'tipo_evento');?>
                <?php echo form_dropdown(['name'=>'tipo_evento','id'=>'tipo_evento'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'evento_comentario','id'=>'evento_comentario'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="eventosfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Editar Evento Modal Edit -->
<div class="modal fade" id="eventoModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'eventoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="Eventoid">
            <div class="col-md-12">
                <?php echo form_label('Tipo Evento', 'tipo_evento');?>
                <?php echo form_dropdown(['name'=>'edittipo_evento','id'=>'edittipo_evento'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editevento_comentario','id'=>'editevento_comentario'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="editeventosfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Licencia -->
<div class="modal fade" id="AddLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Licencia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="licenciaid">
        <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'clientelicencia','id'=>'clientelicencia'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinalicencia','id'=>'oficinalicencia'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'stafflicencia','id'=>'stafflicencia'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadolicencia','id'=>'estadolicencia'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudlicencia','id'=>'nro_solicitudlicencia','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud', 'fecha_solicitudlicencia');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudlicencia',
                                            'name' => 'fecha_solicitudlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitudlicencia'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionlicencia','id'=>'nro_resolucionlicencia','class' => 'form-control'])?>
               
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionlicencia');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionlicencia',
                                            'name' => 'fecha_resolucionlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionlicencia'),
                                            'placeholder' => 'Fecha Resolucion'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclientelicencia','id'=>'referenciaclientelicencia'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentario');?>
                <?php echo form_textarea(['name'=>'comentariolicencia','id'=>'comentariolicencia'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="addlicenciafrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Licencia -->
<div class="modal fade" id="EditLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Licencia</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="licenciaid">
        <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'editclientelicencia','id'=>'editclientelicencia'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinalicencia','id'=>'editoficinalicencia'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'editstafflicencia','id'=>'editstafflicencia'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadolicencia','id'=>'editestadolicencia'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudlicencia','id'=>'editnro_solicitudlicencia','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudlicencia',
                                            'name' => 'editfecha_solicitudlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucionlicencia','id'=>'editnro_resolucionlicencia','class' => 'form-control'])?>
               
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_resolucion');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionlicencia',
                                            'name' => 'editfecha_resolucionlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclientelicencia','id'=>'editreferenciaclientelicencia'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentario');?>
                <?php echo form_textarea(['name'=>'editcomentariolicencia','id'=>'editcomentariolicencia'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="editlicenciafrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cesion -->
<div class="modal fade" id="AddCesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cesion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="cesionid">
        <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'clienteCesion','id'=>'clienteCesion'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinaCesion','id'=>'oficinaCesion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'staffCesion','id'=>'staffCesion'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoCesion','id'=>'estadoCesion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudCesion','id'=>'nro_solicitudCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudCesion',
                                            'name' => 'fecha_solicitudCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitudCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionCesion','id'=>'nro_resolucionCesion','class' => 'form-control'])?>
               
            </div>
            <div class="col-md-3" style="margin-top:15px">
            <?php echo form_label('Fecha de Resolucion', 'fecharesolucion');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionCesion',
                                            'name' => 'fecha_resolucionCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteCesion','id'=>'referenciaclienteCesion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioCesion','id'=>'comentarioCesion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AddCesionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cesion -->
<div class="modal fade" id="EditCesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cesion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="cesionid">
        <div class="col-md-3">
                <?php echo form_label('Cliente', 'cliente');?>
                <?php echo form_dropdown(['name'=>'editclienteCesion','id'=>'editclienteCesion'], $clientes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinaCesion','id'=>'editoficinaCesion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'editstaffCesion','id'=>'editstaffCesion'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoCesion','id'=>'editestadoCesion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudCesion','id'=>'editnro_solicitudCesion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:15px">
            <?php echo form_label('Fecha de Solicitud', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudCesion',
                                            'name' => 'editfecha_solicitudCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucionCesion','id'=>'editnro_resolucionCesion','class' => 'form-control'])?>
               
            </div>
            <div class="col-md-3" style="margin-top:15px">
            <?php echo form_label('Fecha de Resolucion', 'fecharesolucion');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionCesion',
                                            'name' => 'editfecha_resolucionCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteCesion','id'=>'editreferenciaclienteCesion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioCesion','id'=>'editcomentarioCesion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditCesionfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Cambio de Domicilio -->
<div class="modal fade" id="AddCambioDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Domicilio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="camdomid">
        <div class="col-md-4">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinaCamDom','id'=>'oficinaCamDom'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'staffCamDom','id'=>'staffCamDom'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoCamDom','id'=>'estadoCamDom'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudCamDom','id'=>'nro_solicitudCamDom','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudCamDom',
                                            'name' => 'fecha_solicitudCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionCamDom','id'=>'nro_resolucionCamDom','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionCamDom',
                                            'name' => 'fecha_resolucionCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteCamDom','id'=>'referenciaclienteCamDom'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioCamDom','id'=>'comentarioCamDom'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AddCambioDomiciliofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio de Domicilio -->
<div class="modal fade" id="EditCambioDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio de Domicilio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="camdomid">
        <div class="col-md-4">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinaCamDom','id'=>'editoficinaCamDom'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Staff', 'staff');?>  
                <?php echo form_dropdown(['name'=>'editstaffCamDom','id'=>'editstaffCamDom'], $responsable, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoCamDom','id'=>'editestadoCamDom'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudCamDom','id'=>'editnro_solicitudCamDom','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudCamDom',
                                            'name' => 'editfecha_solicitudCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucionCamDom','id'=>'editnro_resolucionCamDom','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionCamDom',
                                            'name' => 'editfecha_resolucionCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteCamDom','id'=>'editreferenciaclienteCamDom'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioCamDom','id'=>'editcomentarioCamDom'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditCambioDomiciliofrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Fusion -->
<div class="modal fade" id="AddFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="fusionid">
        <div class="col-md-6">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinaFusion','id'=>'oficinaFusion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoFusion','id'=>'estadoFusion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudFusion','id'=>'nro_solicitudFusion','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudFusion',
                                            'name' => 'fecha_solicitudFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucion','id'=>'nro_resolucionFusion','class' => 'form-control'])?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionFusion',
                                            'name' => 'fecha_resolucionFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteFusion','id'=>'referenciaclienteFusion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioFusion','id'=>'comentarioFusion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="addfusionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Fusion -->
<div class="modal fade" id="EditFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Fusion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="fusionid">
        <div class="col-md-6">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinaFusion','id'=>'editoficinaFusion'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoFusion','id'=>'editestadoFusion'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudFusion','id'=>'editnro_solicitudFusion','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudFusion',
                                            'name' => 'editfecha_solicitudFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucion','id'=>'editnro_resolucionFusion','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionFusion',
                                            'name' => 'editfecha_resolucionFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteFusion','id'=>'editreferenciaclienteFusion'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioFusion','id'=>'editcomentarioFusion'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="editfusionfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Cambio de Nombre -->
<div class="modal fade" id="AddCambioNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Nombre</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="camnomid">
        <div class="col-md-6">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'oficinaCamNom','id'=>'oficinaCamNom'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'estadoCamNom','id'=>'estadoCamNom'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'nro_solicitudCamNom','id'=>'nro_solicitudCamNom','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudCamNom',
                                            'name' => 'fecha_solicitudCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionCamNom','id'=>'nro_resolucionCamNom','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionCamNom',
                                            'name' => 'fecha_resolucionCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'referenciaclienteCamNom','id'=>'referenciaclienteCamNom'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'comentarioCamNom','id'=>'comentarioCamNom'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AddCambioNombrefrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio de Nombre -->
<div class="modal fade" id="EditCambioNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio de Nombre</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="camnomid">
        <div class="col-md-6">
                <?php echo form_label('Oficina', 'oficina');?>
             
                <?php echo form_dropdown(['name'=>'editoficinaCamNom','id'=>'editoficinaCamNom'], $oficinas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Estado', 'estado');?>
                <?php echo form_dropdown(['name'=>'editestadoCamNom','id'=>'editestadoCamNom'], $estados_solicitudes, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitud');?>
                <?php echo form_input(['name'=>'editnro_solicitudCamNom','id'=>'editnro_solicitudCamNom','class' => 'form-control'])?>
              
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_solicitudCamNom',
                                            'name' => 'editfecha_solicitudCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'editnro_resolucionCamNom','id'=>'editnro_resolucionCamNom','class' => 'form-control'])?>
                <?php //echo form_dropdown(['name'=>'nro_solicitud','id'=>'nro_solicitud'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'editfecha_resolucionCamNom',
                                            'name' => 'editfecha_resolucionCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div> 
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciacliente');?>
                <?php echo form_input(['name'=>'editreferenciaclienteCamNom','id'=>'editreferenciaclienteCamNom'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'editcomentarioCamNom','id'=>'editcomentarioCamNom'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditCambioNombrefrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Anexo Modal -->
<div class="modal fade" id="anexoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'anexoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Anexo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Tipo Evento', 'tipo_evento');?>
                <?php echo form_dropdown('tipo_evento', $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea('evento_comentario','',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="anexofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Documento Modal Create -->
<div class="modal fade" id="docModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart("", ['method' => 'POST', 'id' => 'documentoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_archivo');?>
                <?php echo form_input(['name'=>'doc_descripcion','id'=>'doc_descripcion'],'', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_archivo');?>
                <?php echo form_textarea(['name'=>'comentario_archivo', 'id'=>'comentario_archivo'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'doc_archivo');?>
                <?php echo form_input([
                    'id' => 'doc_archivo',
                    'name' => 'doc_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    'multiple' => 'multiple',
                ]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Editar Documento Modal Edit -->
<div class="modal fade" id="docModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart("", ['method' => 'POST', 'id' => 'documentoFrmedit']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="Documento_id">
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_archivo');?>
                <?php echo form_input(['name'=>'editdoc_descripcion','id'=>'editdoc_descripcion'],'', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_archivo');?>
                <?php echo form_textarea(['name'=>'editcomentario_archivo', 'id'=>'editcomentario_archivo'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'doc_archivo');?>
                <?php echo form_input([
                    'id' => 'editdoc_archivo',
                    'name' => 'editdoc_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    'multiple' => 'multiple',
                ]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentoeditfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Añadir Signo Modal -->
<div class="modal fade" id="signoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'signo_archivo');?>
                <?php echo form_input([
                    'id' => 'signo_archivo',
                    'name' => 'signo_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_signo');?>
                <?php echo form_textarea('descripcion_signo','', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_signo');?>
                <?php echo form_input('comentario_signo','',['class' => 'form-control']);?>
            </div>
            
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="signofrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- Editar Signo Modal -->
<div class="modal fade" id="signoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'signo_archivo');?>
                <?php echo form_input([
                    'id' => 'signo_archivo',
                    'name' => 'signo_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_signo');?>
                <?php echo form_textarea('descripcion_signo', '' , ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_signo');?>
                <?php echo form_input('comentario_signo','',['class' => 'form-control']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            <?php if(isset($values['signo_archivo'])) { ?>
                <img class="img-responsive" src="<?php echo $values['signo_archivo'];?>" alt="<?php echo $values['signonom'];?>">
            <?php } ?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="signofrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>




<?php init_tail();?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        function CambioDomicilio(){
            let url = '<?php echo admin_url("pi/MarcasDomicilioController/showCambioDomicilio/$id");?>';
            let body= ``;
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
                                            <a class="editCamDom btn btn-light" style= "background-color: white;" data-toggle="modal" data-target="#EditCambioDomicilio"><i class="fas fa-edit"></i>Editar</a>
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
                                            <a class="editCamNom btn btn-light" style= "background-color: white; " data-toggle="modal" data-target="#EditCambioNombre"><i class="fas fa-edit"></i>Editar</a>
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
        })

          //Modal Edit Cambio Nombre
          $(document).on('click','.editCamNom',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('CamNomid');
            let url = '<?php  echo admin_url("pi/CambioNombreController/EditCambioNombre/");?>';
            url = url + id;
            $.post(url,{id},function(response){
            let fusion =JSON.parse(response);
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
            let url = '<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/addSolicitudDocumento");?>'
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
            console.log('id', id); 
            console.log('tipo_evento' , tipo_evento);
            console.log('comentarios', comentarios);
            console.log('csrf_token_name', csrf_token_name);
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
    

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        body{
            font-family: 'Roboto', sans-serif;
        }
        * {
            margin: 0;
            padding: 0;
        }
        i {
            margin-right: 10px;
        }

        /*------------------------*/
        input:focus,
        button:focus,
        .form-control:focus{
            outline: none;
            box-shadow: none;
        }
        .form-control:disabled, .form-control[readonly]{
            background-color: #fff;
        }
        /*----------step-wizard------------*/
        .d-flex{
            display: flex;
        }
        .justify-content-center{
            justify-content: center;
        }
        .align-items-center{
            align-items: center;
        }

        /*---------signup-step-------------*/
        .bg-color{
            background-color: #333;
        }
        .signup-step-container{
            padding: 150px 0px;
            padding-bottom: 60px;
        }




            .wizard .nav-tabs {
                position: relative;
                margin-bottom: 0;
                border-bottom-color: transparent;
            }

            .wizard > div.wizard-inner {
                position: relative;
            }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 90%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 30px;
            height: 30px;
            line-height: 30px;
            display: inline-block;
            border-radius: 50%;
            background: #fff;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 16px;
            color: #0e214b;
            font-weight: 500;
            border: 1px solid #ddd;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
                background: rgb(29 78 216);
            color: #fff;
            border-color: rgb(29 78 216);
        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }
        .wizard .nav-tabs > li.active > a i{
            color: rgb(29 78 216);
        }

        .wizard .nav-tabs > li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: red;
            transition: 0.1s ease-in-out;
        }



        .wizard .nav-tabs > li a {
            width: 30px;
            height: 30px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
            background-color: transparent;
            position: relative;
            top: 0;
        }
        .wizard .nav-tabs > li a i{
            position: absolute;
            top: -15px;
            font-style: normal;
            font-weight: 400;
            white-space: nowrap;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: 700;
            color: #000;
        }

            .wizard .nav-tabs > li a:hover {
                background: transparent;
            }

        .wizard .tab-pane {
            position: relative;
            padding-top: 20px;
        }


        .wizard h3 {
            margin-top: 0;
        }
        .prev-step,
        .next-step{
            font-size: 13px;
            padding: 8px 24px;
            border: none;
            border-radius: 4px;
            margin-top: 30px;
        }
        .next-step{
            background-color: #0db02b;
        }
        .skip-btn{
            background-color: #cec12d;
        }
        .step-head{
            font-size: 20px;
            text-align: center;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .term-check{
            font-size: 14px;
            font-weight: 400;
        }
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 40px;
            margin-bottom: 0;
        }
        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 40px;
            margin: 0;
            opacity: 0;
        }
        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: 40px;
            padding: .375rem .75rem;
            font-weight: 400;
            line-height: 2;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }
        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 38px;
            padding: .375rem .75rem;
            line-height: 2;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 .25rem .25rem 0;
        }
        .footer-link{
            margin-top: 30px;
        }
        .all-info-container{

        }
        .list-content{
            margin-bottom: 10px;
        }
        .list-content a{
            padding: 10px 15px;
            width: 100%;
            display: inline-block;
            background-color: #f5f5f5;
            position: relative;
            color: #565656;
            font-weight: 400;
            border-radius: 4px;
        }
        .list-content a[aria-expanded="true"] i{
            transform: rotate(180deg);
        }
        .list-content a i{
            text-align: right;
            position: absolute;
            top: 15px;
            right: 10px;
            transition: 0.5s;
        }
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: #fdfdfd;
        }
        .list-box{
            padding: 10px;
        }
        .signup-logo-header .logo_area{
            width: 200px;
        }
        .signup-logo-header .nav > li{
            padding: 0;
        }
        .signup-logo-header .header-flex{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /*-----------custom-checkbox-----------*/
        /*----------Custom-Checkbox---------*/
        input[type="checkbox"]{
            position: relative;
            display: inline-block;
            margin-right: 5px;
        }
        input[type="checkbox"]::before,
        input[type="checkbox"]::after {
            position: absolute;
            content: "";
            display: inline-block;   
        }
        input[type="checkbox"]::before{
            height: 16px;
            width: 16px;
            border: 1px solid #999;
            left: 0px;
            top: 0px;
            background-color: #fff;
            border-radius: 2px;
        }
        input[type="checkbox"]::after{
            height: 5px;
            width: 9px;
            left: 4px;
            top: 4px;
        }
        input[type="checkbox"]:checked::after{
            content: "";
            border-left: 1px solid #fff;
            border-bottom: 1px solid #fff;
            transform: rotate(-45deg);
        }
        input[type="checkbox"]:checked::before{
            background-color: #18ba60;
            border-color: #18ba60;
        }

        .btn-primary {
            background-color: rgb(29 78 216);
        }






        @media (max-width: 767px){
            .sign-content h3{
                font-size: 40px;
            }
            .wizard .nav-tabs > li a i{
                display: none;
            }
            .signup-logo-header .navbar-toggle{
                margin: 0;
                margin-top: 8px;
            }
            .signup-logo-header .logo_area{
                margin-top: 0;
            }
            .signup-logo-header .header-flex{
                display: block;
            }
        }

        th, td {
            text-align: center;
        }


        
    </style>
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

    
</body>
</html>