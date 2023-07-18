<?php 
$CI = &get_instance();
init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
                <div class="col-md-12">
                <?php echo form_open_multipart(admin_url('pi/MarcasSoliictudesController/store'),['id' => 'solicitudfrm' , 'name' => 'solicitudfrm']);?>
                <?php echo form_hidden('solicitud_id', $solicitud_id);?>
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
                                            <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">8</span> <i> Documentos</i></a>
                                        </li>
                                    </ul>
                            </div>
                            
                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Tipo de solicitud', 'tipo_registro_id');?>
                                            <?php echo form_dropdown('tipo_registro_id', $tipo_registro ,set_value('tipo_registro_id'), ['class' => 'form-control'])?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Oficina', $fields[16]['name'])?>
                                            <?php echo form_dropdown($fields[16]['name'],$oficinas,set_value($fields[16]['name']),['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Cliente',$fields[15]['name']);?>
                                            <?php echo form_dropdown($fields[15]['name'], $clientes, set_value($fields[15]['name']), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Responsable','staff_id');?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control']);?>
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
                                                'required' => 'required'
                                            ]);?>
                                    </div>
                                    <div class="col-md-2">
                                        
                                        <?php echo form_label('Signo', 'descripcion');?>
                                        <?php echo form_input([
                                            'id'    =>   'descripcion-signo',
                                            'name'  =>   'descripcion-signo',
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
                                            'required' => 'required'
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
                                            'required' => 'required'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Solicitantes', 'solicitantes_id');?>
                                        <?php echo form_dropdown([
                                            'id'       => 'solicitantes_id',
                                            'name'     => 'solicitantes_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $clientes,
                                            'required' => 'required'
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
                                    <div class="col-md-6">
                                        <?php echo form_label('Tipo Solicitud', 'tipo_id');?>
                                        <?php echo form_dropdown([
                                            'id'        => 'tipo_id',
                                            'name'      => 'tipo_id',
                                            'class'     => 'form-control',
                                            'options'   => $tipo_solicitud,
                                            'selected'  => set_value('tipo_id', '1'),
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Clase Nacional', 'clase_nacional');?>
                                        <?php echo form_input('clase_nacional', set_value('clase_nacional'), ['class' => 'form-control', 'type' => 'range']);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Referencia interna', $fields[17]['name']);?>
                                        <?php echo form_input($fields[17]['name'], set_value($fields[17]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Referencia cliente', $fields[18]['name']);?>
                                        <?php echo form_input($fields[18]['name'], set_value($fields[18]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Primer Uso','primer_uso');?>
                                        <?php echo form_input('primer_uso', set_value('primer_uso', ''), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Prueba Uso', 'prueba_uso');?>
                                        <?php echo form_input('prueba_uso', set_value('prueba_uso', ''), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_label('Carpeta', $fields[19]['name']);?>
                                        <?php echo form_input($fields[19]['name'], set_value($fields[19]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_label('Libro', $fields[20]['name']);?>
                                        <?php echo form_input($fields[20]['name'], set_value($fields[20]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_label('Tomo', $fields[21]['name']);?>
                                        <?php echo form_input($fields[21]['name'], set_value($fields[21]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_label('Folio', $fields[22]['name']);?>
                                        <?php echo form_input($fields[22]['name'], set_value($fields[22]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#prioridad" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Prioridades<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="prioridad">
                                                    <div class="list-box">
                                                        <div class="col-12" >
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#prioridadModal">Añadir prioridad</button>
                                                        </div>
                                                        <div class="col-12" style="padding: 1% 1% 1% 0%;">    
                                                            <table class="table table-responsive table-dark">
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
                                    <div class="col-md-12">
                                        <?php echo form_label('Comentarios', 'comentarios');?>
                                        <?php echo form_textarea('comentarios', set_value('comentarios'), ['class' => 'form-control']);?>
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
                                        <?php echo form_label('Estado de Solicitud', $fields[3]['name']);?>
                                        <?php echo form_dropdown($fields[3]['name'], $estados_solicitudes, set_value($fields[3]['name']), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_solicitud',
                                            'name' => 'num_solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('num_solicitud'),
                                            'placeholder' => 'Nº de Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_solicitud',
                                            'name' => 'fecha_solicitud',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_registro',
                                            'name' => 'num_registro',
                                            'class' => 'form-control',
                                            'value' => set_value('num_registro'),
                                            'placeholder' => 'Nº Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de registro"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_registro',
                                            'name' => 'fecha_registro',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_registro'),
                                            'placeholder' => 'Fecha de Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'num_certificado',
                                            'name' => 'num_certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('num_certificado'),
                                            'placeholder' => 'Nº de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label("Fecha de certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_certificado',
                                            'name' => 'fecha_certificado',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_certificado'),
                                            'placeholder' => 'Fecha de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha de Vencimiento'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_vencimiento',
                                            'name' => 'fecha_vencimiento',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_vencimiento'),
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">Añadir publicacion</button>
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
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="col-md-12" >
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
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
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Creado por</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
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
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#">Añadir Anexo</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Tipo</th>
                                                    <th>Estado</th>
                                                    <th>Solicitud</th>
                                                    <th>Creacion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Archivo</th>
                                                    <th>Descripcion</th>
                                                    <th>Creado Por</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
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
<!-- Prioridad Modal -->
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
<!-- Publicacion Modal -->
<div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionFrm']);?>
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
                <?php echo form_label('Tipo', 'pais_publicacion');?>
                <?php echo form_dropdown('pais_prioridad', $pais_id, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Boletin', 'boletin_publicacion');?>
                <?php echo form_input('boletin_publicacion', '', ['class' => 'form-control calendar']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion');?>
                <?php echo form_input('tomo_publicacion','',['class' => 'form-control']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion');?>
                <?php echo form_input('pag_publicacion','',['class' => 'form-control']);?>
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
<!-- Evento Modal -->
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
        <button id="eventosfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
<!-- Documento Modal -->
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
                <?php echo form_input('doc_descripcion','', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_archivo');?>
                <?php echo form_textarea('comentario_archivo','',['class' => 'form-control']);?>
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

<!-- Signo Modal -->
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
                <?php echo form_label('Archivo', 'doc_archivo');?>
                <?php echo form_input([
                    'id' => 'signo_archivo',
                    'name' => 'signo_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_signo');?>
                <?php echo form_textarea('doc_descripcion','', ['class' => 'form-control']);?>
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




<?php init_tail();?>

    <script>
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
        new DataTable(".table-responsive", {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            }
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
        $("#solicitudfrm").on('submit', function(e)
        {
            e.preventDefault();
            var formData = new FormData();
            var data = getFormData(this);
            formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
            formData.append('signo_archivo' , document.getElementById('signo_archivo').files[0]);
            formData.append('doc_descripcion', $("textarea[name=doc_descripcion]").val());
            formData.append('comentario_signo', $("input[name=comentario_signo").val())
            formData.append('solicitud', JSON.stringify(data));
            formData.append('comentarios', $("textarea[name=comentarios]").val());
            formData.append('paises_solicitantes', $("#pais_id").val());
            formData.append('clase_niza_id', $("#clase_niza_id").val());
            formData.append('solicitantes_id', $("#solicitantes_id").val());
            $.ajax({
                url:'<?php echo admin_url('pi/MarcasSolicitudesController/store');?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).then(function(response){
                location.href = '<?php echo admin_url("pi/MarcasSolicitudesController/edit/{$solicitud_id}");?>';
            }).catch(function(response){
                <?php if(ENVIRONMENT != 'production') { ?>
                 alert(response);
                <?php } else { ?>
                    alert('ha ocurrido un error');
                <?php } ?>
            });
        });


        $("#prioridadfrmsubmit").on('click', function(e){
            e.preventDefault();
            data = {
                'pais_prioridad' : $("select[name=pais_prioridad").val(),
                'fecha_prioridad': $("input[name=fecha_prioridad]").val(),
                'nro_prioridad'  : $("input[name=nro_prioridad").val(),
                'solicitud_id'   : $("input[name=solicitud_id").val(),
            }
            $.ajax({
                url: '<?php echo admin_url("pi/MarcasPrioridadController/addPrioridad");?>',
                method: 'POST',
                data : data
            }).then(function(response){
                new DataTable("#prioridadTbl", {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    ajax: JSON.parse(response.data),
                }
                });
                $("#prioridadModal").modal('hide');
            }).catch(function(response){
                alert("No puede agregar una prioridad sin registro de la solicitud");
            });
        });









        // ------------step-wizard-------------
    $(document).ready(function () {
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
</body>
</html>