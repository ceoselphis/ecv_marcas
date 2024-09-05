<?php
$CI = &get_instance();
init_head();
$CI->load->view('patente/solicitudes/css.php');
$select = ['' => '']; ?>

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
        <?php echo form_open_multipart('', ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
        <?php echo form_hidden('id', $id); ?>
        <?php echo form_input([
          'type'  => 'hidden',
          'name'  => 'cod_contador',
          'id'    => 'cod_contador',
          'value' => $cod_contador
        ]); ?>
        <?php
        echo form_input([
          'type'  => 'hidden',
          'name'  => 'factId',
          'id'    => 'factId',
          'value' => (!isset($invoicesBD) || empty($invoicesBD)) ? '' : $invoicesBD['id_factura']
        ]);
        echo form_input([
          'type'  => 'hidden',
          'name'  => 'factNumber',
          'id'    => 'factNumber',
          'value' => (!isset($invoicesBD) || empty($invoicesBD)) ? '' : $invoicesBD['num_factura']
        ]);
        echo form_input([
          'type'  => 'hidden',
          'name'  => 'factFecha',
          'id'    => 'factFecha',
          'value' => (!isset($invoicesBD) || empty($invoicesBD)) ? '' : $invoicesBD['date']
        ]);
        echo form_input([
          'type'  => 'hidden',
          'name'  => 'factEstatus',
          'id'    => 'factEstatus',
          'value' => (!isset($invoicesBD) || empty($invoicesBD)) ? '' : $invoicesBD['status']
        ]); ?>
        <div class="panel_s">
          <div class="panel-body" id="principalWizar">
            <div class="wizard">
              <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist" style="display:flex">
                  <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Inicio</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Extra</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Comentarios</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Eventos</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Tareas</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">8</span> <i> Anexos</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step9" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">9</span> <i> Documentos</i></a>
                  </li>
                  <li role="presentation">
                    <a href="#step10" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">10</span> <i> Facturas</i></a>
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
                      <?php echo form_label('Tipo de solicitud', 'tipo_registro_id'); ?>
                      <?php
                      $tipo_registro = $select + $tipo_registro;
                      echo form_dropdown(
                        'tipo_registro_id',
                        $tipo_registro,
                        set_value('tipo_registro_id'),
                        ['class' => 'form-control', 'id' => 'tipo_registro_id']
                      )
                      ?>
                      <div class="text-danger tipo_registro_id_error"></div>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label('Cliente', 'client_id'); ?>
                      <?php
                      $clientes = $select + $clientes;
                      echo form_dropdown(
                        'client_id',
                        $clientes,
                        set_value('client_id'),
                        ['class' => 'form-control', 'id' => 'client_id']
                      );
                      ?>
                      <div class="text-danger client_id_error"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Oficina', 'oficina_id') ?>
                      <?php
                      $oficinas = $select + $oficinas;
                      echo form_dropdown(
                        'oficina_id',
                        $oficinas,
                        set_value('oficina_id'),
                        ['class' => 'form-control', 'id' => 'oficina_id']
                      );
                      ?>
                      <div class="text-danger oficina_id_error"></div>
                    </div>
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Responsable', 'staff_id'); ?>
                      <?php
                      $responsable = $select + $responsable;
                      echo form_dropdown(
                        'staff_id',
                        $responsable,
                        set_value('staff_id'),
                        ['class' => 'form-control', 'id' => 'staff_id']
                      );
                      ?>
                      <div class="text-danger staff_id_error"></div>
                    </div>
                  </div>
                  <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-primary next-step">Siguiente</button>
                    </li>
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
                      <?php echo form_label('Pais', 'pais_id'); ?>
                      <?php echo form_dropdown([
                        'id' => 'pais_id',
                        'name' => 'pais_id',
                        'class' => 'form-control',
                        'options' => $pais_id,
                        'selected' => set_value('pais_id', 226) //'226',
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_label('Titulo', 'titulo'); ?>
                      <?php echo form_input([
                        "id" => 'titulo',
                        "name" => 'titulo',
                        "class" => "form-control",
                        "value" => set_value("titulo", ''),
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo form_label('Inventores', 'inventores_id'); ?>
                      <?php echo form_dropdown([
                        'id' => 'inventores_id',
                        'name' => 'inventores_id',
                        'multiple' => 'multiple',
                        'options' => $inventores,
                        //'selected' => set_value('inventores_id'),
                        "class" => "form-control"
                      ]);
                      ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label('Solicitantes', 'solicitantes_id'); ?>
                      <?php echo form_dropdown([
                        'id' => 'solicitantes_id',
                        'name' => 'solicitantes_id',
                        'multiple' => 'multiple',
                        'options' => $clientes,
                        //'selected' => set_value('solicitantes_id'),
                        "class" => "form-control"
                      ]);
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_label('Resumen', "resumen"); ?>
                      <?php echo form_textarea([
                        'id' => 'resumen',
                        'name' => 'resumen',
                        'class' => 'form-control' 
                      ]);
                      ?>
                    </div>
                  </div>


                  <ul class="list-inline pull-right">
                    <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                    <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                    <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                  </ul>
                </div>
                <!-- Step 3 --->
                <div class="tab-pane" role="tabpanel" id="step3">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>
                        <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                          <?php echo ' ' ?>
                        </strong>
                      </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_label("Clasificacion", 'clasificacion'); ?>
                      <?php echo form_input([
                        'id' => 'clasificacion',
                        'name' => 'clasificacion',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Referencia Interna", 'ref_interna'); ?>
                      <?php echo form_input([
                        'id' => 'ref_interna',
                        'name' => 'ref_interna',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Referencia Cliente", 'ref_cliente'); ?>
                      <?php echo form_input([
                        'id' => 'ref_cliente',
                        'name' => 'ref_cliente',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Carpeta", 'carpeta'); ?>
                      <?php echo form_input([
                        'id' => 'carpeta',
                        'name' => 'carpeta',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Libro", 'libro'); ?>
                      <?php echo form_input([
                        'id' => 'libro',
                        'name' => 'libro',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Tomo", 'tomo'); ?>
                      <?php echo form_input([
                        'id' => 'tomo',
                        'name' => 'tomo',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo form_label("Folio", 'folio'); ?>
                      <?php echo form_input([
                        'id' => 'folio',
                        'name' => 'folio',
                        "class" => 'form-control'
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding-top: 1.5%">
                      <div class="all-info-container">
                        <div class="list-content">
                          <a href="#prioridad" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Prioridades<i class="fa fa-chevron-down"></i></a>
                          <div class="collapse" id="prioridad">
                            <div class="list-box">
                              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#prioridadModal">Añadir
                                prioridad</button>
                              <table id="prioridadTbl" class="ultimate table table-responsive">
                                <thead>
                                  <tr>
                                    <th>N°</th>
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
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding: 1.5% 1.5% 1.5% 1.5%;">
                      <div class="all-info-container">
                        <div class="list-content">
                          <a href="#publicaciones" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Publicaciones <i class="fa fa-chevron-down"></i></a>
                          <div class="collapse" id="publicaciones">
                            <div class="list-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#publicacionModal">Añadir
                                    publicacion</button>
                                  <table id="publicacionTbl" class="ultimate table table-responsive">
                                    <thead>
                                      <tr>
                                        <th>N°</th>
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
                  </div>
                  <ul class="list-inline pull-right">
                    <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                    <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                    <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                  </ul>
                </div>
                <!-- Step 4 -->
                <div class="tab-pane" role="tabpanel" id="step4">
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
                      <?php echo form_label('Estado de Solicitud', 'estado_id'); ?>
                      <?php

                      echo form_dropdown(
                        'estado_id',
                        $estados_solicitudes,
                        set_value('estado_id'),
                        ['class' => 'form-control', 'id' => 'estado_id']
                      );
                      ?>
                      <div class="text-danger estado_id_error"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Solicitud'); ?>
                      <?php echo form_input([
                        'id' => 'solicitud',
                        'name' => 'solicitud',
                        'class' => 'form-control',
                        'value' => set_value('solicitud'),
                        'placeholder' => 'Nº de Solicitud'
                      ]); ?>
                      <div class="text-danger solicitud_error"></div>
                    </div>
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Fecha'); ?>
                      <?php
                      echo form_input([
                        'id' => 'fecha_solicitud',
                        'name' => 'fecha_solicitud',
                        'class' => 'form-control calendar',
                        'value' => set_value('fecha_solicitud'),
                        'placeholder' => 'Fecha Solicitud'
                      ]); ?>
                      <div class="text-danger fecha_solicitud_error"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Registro'); ?>
                      <?php
                      echo form_input([
                        'id' => 'registro',
                        'name' => 'registro',
                        'class' => 'form-control',
                        'value' => set_value('registro'),
                        'placeholder' => 'Nº Registro'
                      ]); ?>
                      <div class="text-danger registro_error"></div>
                    </div>
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label("Fecha"); ?>
                      <?php
                      echo form_input([
                        'id' => 'fecha_registro',
                        'name' => 'fecha_registro',
                        'class' => 'form-control calendar',
                        'value' => set_value('fecha_registro'),
                        'placeholder' => 'Fecha de Registro'
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label("Certificado"); ?>
                      <?php echo form_input([
                        'id' => 'certificado',
                        'name' => 'certificado',
                        'class' => 'form-control',
                        'value' => set_value('certificado'),
                        'placeholder' => 'Nº de Certificado'
                      ]); ?>
                      <div class="text-danger certificado_error"></div>
                    </div>
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label("Fecha"); ?>
                      <?php
                      echo form_input([
                        'id' => 'fecha_certificado',
                        'name' => 'fecha_certificado',
                        'class' => 'form-control calendar',
                        'value' => set_value('fecha_certificado'),
                        'placeholder' => 'Fecha de Certificado'
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label('Fecha Vencimiento'); ?>
                      <?php
                      echo form_input([
                        'id' => 'fecha_vencimiento',
                        'name' => 'fecha_vencimiento',
                        'class' => 'form-control calendar',
                        'value' => set_value('fecha_vencimiento'),
                        'placeholder' => 'Fecha Vencimiento'
                      ]); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label("Anualidad desde"); ?>
                      <?php echo form_input([
                        'id' => 'pct_anualidad_desde',
                        'name' => 'pct_anualidad_desde',
                        'class' => 'form-control calendar',
                        'value' => set_value('pct_anualidad_desde'),
                        'placeholder' => 'Fecha Anualidad'
                      ]); ?>
                      <div class="text-danger certificado_error"></div>
                    </div>
                    <div class="col-md-6" style="padding-top:15px;">
                      <?php echo form_label("Fecha"); ?>
                      <?php
                      echo form_input([
                        'id' => 'pct_anualidad_hasta',
                        'name' => 'pct_anualidad_hasta',
                        'class' => 'form-control calendar',
                        'value' => set_value('pct_anualidad_hasta'),
                        'placeholder' => 'Fecha Anualidad'
                      ]); ?>
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
                  <div class="row">
                    <?php echo form_label("Comentarios", 'comentarios'); ?>
                    <?php echo form_textarea([
                      'id' => 'comentarios',
                      'name' => 'comentarios',
                      'class' => 'form-control',
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
                  <div class="row">
                    <div class="col-md-6">
                      <h4>
                        <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                          <?php echo ' ' ?>
                        </strong>
                      </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                    </div>
                    <div class="col-md-12" style="padding-top: 1.5%;">
                      <table id="eventosTbl" class="ultimate table table-responsive">
                        <thead>
                          <tr>
                            <th>N°</th>
                            <th>Evento</th>
                            <th>Comentarios</th>
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
                <!-- Step 7 -->
                <div class="tab-pane" role="tabpanel" id="step7">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>
                        <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                          <?php echo ' ' ?>
                        </strong>
                      </h4>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTask">Añadir Tarea</button>
                  </div>
                  <div class="col-md-12" style="padding-top: 1.5%;">
                    <table id="tareasTbl" class="ultimate table table-responsive">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Proyecto</th>
                          <th>Tipo de Tarea</th>
                          <th>Descripción</th>
                          <th>Fecha</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="body_tareas">


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
                  <div class="row">
                    <div class="col-md-6">
                      <h4>
                        <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                          <?php echo ' '; ?>
                        </strong>
                      </h4>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="all-info-container">
                      <div class="list-content">
                        <a href="#cesion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="cesion">
                          <div class="list-box">
                            <div class="row">
                              <div class="col-md-12">
                                <button type="button" class="btn btn-primary pull-right" id="AddCesionAbrirModal" data-toggle="modal" data-target="#AddCesion">Añadir Cesion</button>
                              </div>
                            </div>
                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md-12 pre-scrollable">
                                <table id="CesionTbl" class="ultimate table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>N°</th>
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
                  <div class="col-md-12">
                    <div class="all-info-container">
                      <div class="list-content">
                        <a href="#licencia" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="licencia">
                          <div class="list-box">
                            <div class="row">
                              <div class="col-md-12">
                                <button type="button" class="btn btn-primary pull-right" id="AddLicenciaAbrirModal" data-toggle="modal" data-target="#AddLicencia">Añadir licencia</button>
                              </div>
                            </div>
                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md-12 pre-scrollable">
                                <table id="LicenciaTbl" class="ultimate table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>N°</th>
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
                  <div class="col-md-12">
                    <div class="all-info-container">
                      <div class="list-content">
                        <a href="#fusion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="fusion">
                          <div class="list-box">
                            <div class="row">
                              <div class="col-md-12">
                                <button type="button" class="btn btn-primary pull-right" id="AddFusionAbrirModal" data-toggle="modal" data-target="#AddFusion">Añadir Fusion</button>
                              </div>
                            </div>
                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md-12 pre-scrollable">
                                <table id="FusionTbl" class="ultimate table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>N°</th>
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
                                <button type="button" class="btn btn-primary pull-right" id="AddCambioNombreAbrirModal" data-toggle="modal" data-target="#AddCamNom">Añadir Cambio de
                                  Nombre</button>
                              </div>
                            </div>
                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md-12 pre-scrollable">
                                <table id="CamNomTbl" class="ultimate table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>N°</th>
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
                                <button type="button" id="AddCambioDomicilioAbrirModal" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCamDom">Añadir cambio de
                                  domicilio</button>
                              </div>
                            </div>
                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md-12 pre-scrollable">
                                <table id="CamDomTbl" class="ultimate table table-responsive">
                                  <thead>
                                    <tr>
                                      <th>N°</th>
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
                  <div class="row">
                    <div class="col-md-6">
                      <h4>
                        <?php echo form_label("N° Expediente Solicitud: {$cod_contador}"); ?><strong>
                          <?php echo ' '; ?>
                        </strong>
                      </h4>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                  </div>
                  <div class="col-md-12" style="padding-top: 1.5%;">
                    <table id="DocTbl" class="ultimate table table-responsive">
                      <thead>
                        <tr>
                          <th>Nº</th>
                          <!-- <th>Archivo</th> -->
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
                    <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                  </ul>
                </div>
                <!-- Step 10 -->
                <div class="tab-pane" role="tabpanel" id="step10">
                  <div class="row">
                    <a class="btn btn-primary newfact pull-right" href="<?php echo admin_url("pi/patentes/InvoiceController/create/" . $id); ?>"><i class="fas fa-plus"></i> Añadir nueva factura</a>
                    <!-- <a class="btn btn-primary testFact" href="#"><i class="fas fa-plus"></i> Restaurar</a> -->
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 15px;" data-toggle="modal" data-target="#facturaModal"><i class="fas fa-plus"></i> Añadir factura
                      existente</button>
                  </div>
                  <div class="col-md-12" style="padding-top: 1.5%;">
                    <table class="ultimate table table-responsive" id="FacturasTbl">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Factura</th>
                          <th>Fecha Factura</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
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
<?php $CI->load->view('patente/solicitudes/base64.php'); ?>

<?php init_tail(); ?>



<?php $CI->load->view('patente/solicitudes/js.php'); ?>

<!--Select -->
<script>
  $("select[multiple=multiple]").selectpicker({
    liveSearch: true,
    virtualScroll: 600
  });
  $("select").selectpicker({
    liveSearch: true,
    virtualScroll: 600
  });

  /***
   * funcion para guardar dar formato a la fecha
   */
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

  /***
   * deshabilita escribir en los input calendar
   */
  $(".calendar").on('keyup', function(e) {
    e.preventDefault();
    $(".calendar").val('');
  })

  $(".calendar").datetimepicker({
    maxDate: fecha(),
    weeks: true,
    format: 'd/m/Y',
    timepicker: false,
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
</script>