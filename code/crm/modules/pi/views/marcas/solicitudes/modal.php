<?php $select = ['' => '']; ?>
<!-- Clase Niza Modal -->
<div class="modal fade" id="claseNizaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open('', ['method' => 'POST', 'id' => 'claseNizaFrm']); ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Clase</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <?php echo form_label('Clase', 'clase_niza',['id' => 'lblclase_niza']); ?>
            <?php
            $clase_niza_id = $select + $clase_niza_id;
            echo form_dropdown('clase_niza', $clase_niza_id, '', ['class' => 'form-control', 'id' => 'clase_niza']); ?>
          </div>
          <div class="col-md-6">
            <?php echo form_label('Descripcion', 'clase_niza_descripcion',['id' => 'lblclase_niza_descripcion']); ?>
            <?php echo form_input('clase_niza_descripcion', set_value('clase_niza_descripcion', ''), ['class' => 'form-control','id' => 'clase_niza_descripcion']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="claseNizaFrmSubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Prioridad Modal -->
<div class="modal fade" id="prioridadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open('', ['method' => 'POST', 'id' => 'prioridadFrm']); ?>
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
            <?php echo form_label('Pais de la prioridad', 'pais_prioridad',['id' => 'lblpais_prioridad']); ?>
            <?php
            $pais_id = $select + $pais_id;
            echo form_dropdown('pais_prioridad', $pais_id, '', ['class' => 'form-control','id' => 'pais_prioridad']); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_label('Fecha', 'fecha_prioridad',['id' => 'lblfecha_prioridad']); ?>
            <?php echo form_input([
              'id' => 'fecha_prioridad',
              'name' => 'fecha_prioridad',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Prioridad'
            ]); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_label('Número', 'nro_prioridad',['id' => 'lblnro_prioridad']); ?>
            <?php echo form_input([
              'id' => 'nro_prioridad',
              'name' => 'nro_prioridad',
              'class' => 'form-control',
              'placeholder' => 'Número Prioridad',
              'type' => 'number'
            ]); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="prioridadfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Publicacion Modal -->
<div class="modal fade" id="publicacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionFrm']); ?>
  <?php echo form_hidden('pub_id', set_value('pub_id')); ?>
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
          <div class="col-md-3 col-md-offset-3">
            <?php echo form_label('Fecha', 'fecha_publicacion',['id' => 'lblfecha_publicacion']); ?>
            <?php echo form_input([
              'id' => 'fecha_publicacion',
              'name' => 'fecha_publicacion',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Publicación'
            ]); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_label('Tipo', 'tipo_publicacion',['id' => 'lbltipo_publicacion']); ?>
            <?php
            $tipo_publicacion = $select + $tipo_publicacion;
            echo form_dropdown('tipo_publicacion', $tipo_publicacion, set_value('tipo_publicacion'), ['class' => 'form-control','id' => 'tipo_publicacion']); ?>
          </div>
        </div>
        <div class="row" style="padding-top:15px;">
          <div class="col-md-3 col-md-offset-1">
            <?php echo form_label('Boletin', 'boletin_publicacion',['id' => 'lblboletin_publicacion']); ?>
            <?php
            $boletines = $select + $boletines;
            echo form_dropdown('boletin_publicacion', $boletines, set_value('boletin_publicacion'), ['class' => 'form-control','id' => 'boletin_publicacion']); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_label('Tomo', 'tomo_publicacion',['id' => 'lbltomo_publicacion']); ?>
            <?php echo form_input('tomo_publicacion', set_value('tomo_publicacion'), ['class' => 'form-control','id' => 'tomo_publicacion']); ?>
          </div>
          <div class="col-md-3">
            <?php echo form_label('Página', 'pag_publicacion',['id' => 'lblpag_publicacion']); ?>
            <?php echo form_input('pag_publicacion', set_value('pag_publicacion'), ['class' => 'form-control','id' => 'pag_publicacion']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="publicacionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Evento Modal -->
<div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'eventoFrm']); ?>
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
          <div class="col-md-8 col-md-offset-0">
            <?php echo form_label('Tipo Evento', 'tipo_evento',['id' => 'lbltipo_evento']); ?>
            <?php
            $tipo_evento = $select + $tipo_evento;
            echo form_dropdown(['name' => 'tipo_evento', 'id' => 'tipo_evento'], $tipo_evento, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-4">
            <?php echo form_label('Fecha Evento', 'fecha_evento',['id' => 'lblfecha_evento']); ?>
            <?php echo form_input([
              'id' => 'fecha_evento',
              'name' => 'fecha_evento',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Evento'
            ]); ?>
          </div>
        </div>
        <div class="row" style="padding-top:15px;">
          <div class="col-md-12">
            <?php echo form_label('Comentario', 'evento_comentario',['id' => 'lblevento_comentario']); ?>
            <?php echo form_textarea(['name' => 'evento_comentario', 'id' => 'evento_comentario'], '', ['class' => 'form-control']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="eventosfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Tareas Modal -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php echo form_open('', ['method' => 'POST', 'id' => 'tareasfrm']); ?>
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
          <div class="col-md-4">
            <?php echo form_label('Proyecto', 'project_id', ['id' => 'lblproject_id','class' => 'form-label']); ?>
            <?php 
            $projects = $select + $projects;
            echo form_dropdown([
              'name' => 'project_id',
              'id' => 'project_id',
              'class' => 'form-control',
              'options' => $projects
            ]); ?>
          </div>
          <div class="col-md-4">
            <?php echo form_label('Tipo Tareas', 'tipo_tarea',['id' => 'lbltipo_tarea']); ?>
            <?php 
            $tipo_tareas = $select + $tipo_tareas;
            echo form_dropdown(['name' => 'tipo_tarea', 'id' => 'tipo_tarea'], $tipo_tareas, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-4">
            <?php echo form_label('Fecha', 'fecha_tarea',['id' => 'lblfecha_tarea']); ?>
            <?php echo form_input('fecha_tarea', '', ['class' => 'form-control calendar','id' => 'fecha_tarea']); ?>
          </div>
        </div>
        <div class="row" style="padding-top:15px;">
          <div class="col-md-12">
            <?php echo form_label('Descripcion', 'descripcion',['id' => 'lbldescripcion']); ?>
            <?php echo form_textarea(['name' => 'descripcion', 'id' => 'descripcion'], '', ['class' => 'form-control']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="tareasfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Cesion -->
<div class="modal fade" id="AddCesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'cesionesfrm']); ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cesion</h4>
        <button type="button" class="close cerrarCesion" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active"
                  style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#addcesionstep1" data-toggle="tab" aria-controls="step1" role="tab"
                    aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                </li>
                <li role="presentation">
                  <a href="#addcesionstep2" data-toggle="tab" aria-controls="step2" role="tab"
                    aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content" id="main_form_no">
            <!-- Step 1 -->
            <div class="tab-pane active" role="tabpanel" id="addcesionstep1">
              <input type="hidden" id="cesionid">
              <div class="col-md-3">
                <?php echo form_label('Cliente', 'clienteCesion'); ?>
                <?php 
                $clientes = $select + $clientes;
                echo form_dropdown(['name' => 'clienteCesion', 'id' => 'clienteCesion'], $clientes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficinaCesion',['id' => 'lbloficinaCesion']); ?>
                <?php 
                $oficinas = $select + $oficinas;
                echo form_dropdown(['name' => 'oficinaCesion', 'id' => 'oficinaCesion'], $oficinas, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Staff', 'staffCesion'); ?>
                <?php 
                $responsable = $select + $responsable;
                echo form_dropdown(['name' => 'staffCesion', 'id' => 'staffCesion'], $responsable, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Estado', 'estadoCesion',['id' => 'lblestadoCesion']); ?>
                <?php 
                $estados_solicitudes = $select + $estados_solicitudes;
                echo form_dropdown(['name' => 'estadoCesion', 'id' => 'estadoCesion'], $estados_solicitudes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCesion',['id' => 'lblnro_solicitudCesion']); ?>
                <?php echo form_input(['name' => 'nro_solicitudCesion', 'id' => 'nro_solicitudCesion', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCesion',['id' => 'lblfecha_solicitudCesion']); ?>
                <?php echo form_input([
                  'id' => 'fecha_solicitudCesion',
                  'name' => 'fecha_solicitudCesion',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitudCesion'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCesion',['id' => 'lblnro_resolucionCesion']); ?>
                <?php echo form_input(['name' => 'nro_resolucionCesion', 'id' => 'nro_resolucionCesion', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:15px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCesion',['id' => 'lblfecha_resolucionCesion']); ?>
                <?php echo form_input([
                  'id' => 'fecha_resolucionCesion',
                  'name' => 'fecha_resolucionCesion',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_resolucionCesion'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciaclienteCesion',['id' => 'lblreferenciaclienteCesion']); ?>
                <?php echo form_input(['name' => 'referenciaclienteCesion', 'id' => 'referenciaclienteCesion'], '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentarioCesion',['id' => 'lblcomentarioCesion']); ?>
                <?php echo form_textarea(['name' => 'comentarioCesion', 'id' => 'comentarioCesion'], '', ['class' => 'form-control']); ?>
              </div>
            </div><!-- fin step 1 -->
            <!-- step 2 -->
            <div class="tab-pane" role="tabpanel" id="addcesionstep2">
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddCesionanterior" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Cesion Anterior<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddCesionanterior">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCesionAnterior" class="btn btn-primary pull-right">Añadir
                            Cesion Anterior</button>
                          <table id="CesionesAnterioresTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_add_Cesion_anterior">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddCesionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion
                    Actual<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddCesionactual">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCesionActual" class="btn btn-primary pull-right">Añadir Cesion
                            Actual</button>
                          <table id="CesionesActualesTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_add_Cesion_actual">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!--fin Step 2-->
          </div> <!--fin tab-content-->
        </div> <!--fin row-->
      </div><!--fin Panel-Body-->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary cerrarCesion" data-dismiss="modal">Cerrar</button>
        <button id="cesionesfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Cesion Anterior Modal -->
<div class="modal fade" id="CesionAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cesion Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscesionanterior',['id' => 'lblpropietarioscesionanterior']);?>
                <?php 
                //$solicitantes = $select + $solicitantes;
                echo form_dropdown(
                  ['id'=> 'propietarioscesionanterior','name'=> 'propietarioscesionanterior'], 
                  $solicitantes, '',
                  ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscesionanterior')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCesionAnteriorfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cesion Actual Modal -->
<div class="modal fade" id="CesionActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cesion Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscesionactual',['id' => 'lblpropietarioscesionactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscesionactual','name'=> 'propietarioscesionactual'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscesionactual')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCesionActualfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Licencia -->
<div class="modal fade" id="AddLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'licenciasfrm']); ?>
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
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active"
                  style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#addlicenciastep1" data-toggle="tab" aria-controls="step1" role="tab"
                    aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Licencia</i></a>
                </li>
                <li role="presentation">
                  <a href="#addlicenciastep2" data-toggle="tab" aria-controls="step2" role="tab"
                    aria-expanded="false"><span class="round-tab">2</span> <i>Licencia Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content" id="main_form">
            <!-- Step 1 -->
            <div class="tab-pane active" role="tabpanel" id="addlicenciastep1">
              <input type="hidden" id="licenciaid">
              <div class="col-md-3">
                <?php echo form_label('Cliente', 'clienteLicencia'); ?>
                <?php echo form_dropdown(['name' => 'clienteLicencia', 'id' => 'clienteLicencia'], $clientes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficinaLicencia',['id' => 'lbloficinaLicencia']); ?>
                <?php echo form_dropdown(['name' => 'oficinaLicencia', 'id' => 'oficinaLicencia'], $oficinas, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Staff', 'staffLicencia'); ?>
                <?php echo form_dropdown(['name' => 'staffLicencia', 'id' => 'staffLicencia'], $responsable, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Estado', 'estadoLicencia',['id' => 'lblestadoLicencia']); ?>
                <?php echo form_dropdown(['name' => 'estadoLicencia', 'id' => 'estadoLicencia'], $estados_solicitudes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudLicencia',['id' => 'lblnro_solicitudLicencia']); ?>
                <?php echo form_input(['name' => 'nro_solicitudLicencia', 'id' => 'nro_solicitudLicencia', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Solicitud', 'fecha_solicitudLicencia',['id' => 'lblfecha_solicitudLicencia']); ?>
                <?php echo form_input([
                  'id' => 'fecha_solicitudLicencia',
                  'name' => 'fecha_solicitudLicencia',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitudLicencia'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionLicencia',['id' => 'lblnro_resolucionLicencia']); ?>
                <?php echo form_input(['name' => 'nro_resolucionLicencia', 'id' => 'nro_resolucionLicencia', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionLicencia',['id' => 'lblfecha_resolucionLicencia']); ?>
                <?php echo form_input([
                  'id' => 'fecha_resolucionLicencia',
                  'name' => 'fecha_resolucionLicencia',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_resolucionLicencia'),
                  'placeholder' => 'Fecha Resolucion'
                ]); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciaclienteLicencia',['id' => 'lblreferenciaclienteLicencia']); ?>
                <?php echo form_input(['name' => 'referenciaclienteLicencia', 'id' => 'referenciaclienteLicencia'], '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentarioLicencia',['id' => 'lblcomentarioLicencia']); ?>
                <?php echo form_textarea(['name' => 'comentarioLicencia', 'id' => 'comentarioLicencia'], '', ['class' => 'form-control']); ?>
              </div>
            </div> <!--fin step 1-->
            <!-- Step 2 -->
            <div class="tab-pane" role="tabpanel" id="addlicenciastep2">
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddLicenciaanterior" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Licencia Anterior<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddLicenciaanterior">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnLicenciaAnterior" class="btn btn-primary pull-right">Añadir
                            Licencia Anterior</button>
                          <table id="LicenciasAnterioresTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                              <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_add_Licencia_anterior">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddLicenciaactual" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Licencia Actual<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddLicenciaactual">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnLicenciaActual" class="btn btn-primary pull-right">Añadir
                            Licencia Actual</button>
                          <table id="LicenciasActualesTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                              <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_add_Licencia_actual">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!--Fin Step 2-->
          </div> <!--Panel Body-->
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="licenciasfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Licencia Anterior Modal -->
<div class="modal fade" id="LicenciaAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Licencia Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioslicenciaanterior',['id' => 'lblpropietarioslicenciaanterior']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioslicenciaanterior','name'=> 'propietarioslicenciaanterior'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioslicenciaanterior')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirLicenciaAnteriorfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Licencia Actual Modal -->
<div class="modal fade" id="LicenciaActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Licencia Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioslicenciaactual',['id' => 'lblpropietarioslicenciaactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioslicenciaactual','name'=> 'propietarioslicenciaactual'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioslicenciaactual')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirLicenciaActualfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Fusion -->
<div class="modal fade" id="AddFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'fusionesfrm']); ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusión</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active"
                  style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#addfusionstep1" data-toggle="tab" aria-controls="step1" role="tab"
                    aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Fusión</i></a>
                </li>
                <li role="presentation">
                  <a href="#addfusionstep2" data-toggle="tab" aria-controls="step2" role="tab"
                    aria-expanded="false"><span class="round-tab">2</span> <i>Fusión Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content" id="main_form">
            <!-- Step 1 -->
            <div class="tab-pane active" role="tabpanel" id="addfusionstep1">
              <input type="hidden" id="fusionid">
              <div class="col-md-3">
                <?php echo form_label('Cliente', 'clienteFusion'); ?>
                <?php 
                $clientes = $select + $clientes;
                echo form_dropdown(['name' => 'clienteFusion', 'id' => 'clienteFusion'], $clientes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficinaFusion',['id' => 'lbloficinaFusion']); ?>
                <?php echo form_dropdown(['name' => 'oficinaFusion', 'id' => 'oficinaFusion'], $oficinas, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Staff', 'staffFusion'); ?>
                <?php 
                $responsable = $select + $responsable;
                echo form_dropdown(['name' => 'staffFusion', 'id' => 'staffFusion'], $responsable, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Estado', 'estadoFusion',['id' => 'lblestadoFusion']); ?>
                <?php echo form_dropdown(['name' => 'estadoFusion', 'id' => 'estadoFusion'], $estados_solicitudes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudFusion',['id' => 'lblnro_solicitudFusion']); ?>
                <?php echo form_input(['name' => 'nro_solicitudFusion', 'id' => 'nro_solicitudFusion', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudFusion',['id' => 'lblfecha_solicitudFusion']); ?>
                <?php echo form_input([
                  'id' => 'fecha_solicitudFusion',
                  'name' => 'fecha_solicitudFusion',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionFusion',['id' => 'lblnro_resolucionFusion']); ?>
                <?php echo form_input(['name' => 'nro_resolucionFusion', 'id' => 'nro_resolucionFusion', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionFusion',['id' => 'lblfecha_resolucionFusion']); ?>
                <?php echo form_input([
                  'id' => 'fecha_resolucionFusion',
                  'name' => 'fecha_resolucionFusion',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciaclienteFusion',['id' => 'lblreferenciaclienteFusion']); ?>
                <?php echo form_input(['name' => 'referenciaclienteFusion', 'id' => 'referenciaclienteFusion'], '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentarioFusion',['id' => 'lblcomentarioFusion']); ?>
                <?php echo form_textarea(['name' => 'comentarioFusion', 'id' => 'comentarioFusion'], '', ['class' => 'form-control']); ?>
              </div>
            </div><!-- fin step1 -->
            <!-- step 2 -->
            <div class="tab-pane " role="tabpanel" id="addfusionstep2">
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddFusionanterior" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Fusion Anterior<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddFusionanterior">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnFusionAnterior" class="btn btn-primary pull-right">Añadir
                            Fusion Anterior</button>
                          <table id="FusionesAnterioresTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_Fusion_anterior">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddFusionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion
                    Actual<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddFusionactual">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnFusionActual" class="btn btn-primary pull-right">Añadir Fusion
                            Actual</button>
                          <table id="FusionesActualesTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_Fusion_actual">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- fin step 2  -->
          </div><!-- fin tab-content -->
        </div><!-- fin row -->
      </div><!-- fin Modal Body -->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="fusionesfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Fusion Anterior Modal -->
<div class="modal fade" id="FusionAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusión Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietariosfusionanterior',['id' => 'lblpropietariosfusionanterior']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietariosfusionanterior','name'=> 'propietariosfusionanterior'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietariosfusionanterior')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirFusionAnteriorfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Fusion Actual Modal -->
<div class="modal fade" id="FusionActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusión Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietariosfusionactual',['id' => 'lblpropietariosfusionactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietariosfusionactual','name'=> 'propietariosfusionactual'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietariosfusionactual')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirFusionActualfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio de Nombre -->
<div class="modal fade" id="AddCamNom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'camnomfrm']); ?>
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
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active"
                  style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#addcamnomstep1" data-toggle="tab" aria-controls="step1" role="tab"
                    aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio Nombre</i></a>
                </li>
                <li role="presentation">
                  <a href="#addcamnomstep2" data-toggle="tab" aria-controls="step2" role="tab"
                    aria-expanded="false"><span class="round-tab">2</span> <i>Cambio Nombre Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content" id="main_form">
            <!-- Step 1 -->
            <div class="tab-pane active" role="tabpanel" id="addcamnomstep1">
              <input type="hidden" id="camnomid">
              <div class="col-md-3">
                <?php echo form_label('Cliente', 'clienteCamNom'); ?>
                <?php 
                $clientes = $select + $clientes;
                echo form_dropdown(['name' => 'clienteCamNom', 'id' => 'clienteCamNom'], $clientes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficinaCamNom',['id' => 'lbloficinaCamNom']); ?>
                <?php echo form_dropdown(['name' => 'oficinaCamNom', 'id' => 'oficinaCamNom'], $oficinas, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Staff', 'staffCamNom'); ?>
                <?php 
                $responsable = $select + $responsable;
                echo form_dropdown(['name' => 'staffCamNom', 'id' => 'staffCamNom'], $responsable, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Estado', 'estadoCamNom',['id' => 'lblestadoCamNom']); ?>
                <?php echo form_dropdown(['name' => 'estadoCamNom', 'id' => 'estadoCamNom'], $estados_solicitudes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamNom',['id' => 'lblnro_solicitudCamNom']); ?>
                <?php echo form_input(['name' => 'nro_solicitudCamNom', 'id' => 'nro_solicitudCamNom', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamNom',['id' => 'lblfecha_solicitudCamNom']); ?>
                <?php echo form_input([
                  'id' => 'fecha_solicitudCamNom',
                  'name' => 'fecha_solicitudCamNom',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamNom',['id' => 'lblnro_resolucionCamNom']); ?>
                <?php echo form_input(['name' => 'nro_resolucionCamNom', 'id' => 'nro_resolucionCamNom', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamNom',['id' => 'lblfecha_resolucionCamNom']); ?>
                <?php echo form_input([
                  'id' => 'fecha_resolucionCamNom',
                  'name' => 'fecha_resolucionCamNom',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamNom',['id' => 'lblreferenciaclienteCamNom']); ?>
                <?php echo form_input(['name' => 'referenciaclienteCamNom', 'id' => 'referenciaclienteCamNom'], '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentarioCamNom',['id' => 'lblcomentarioCamNom']); ?>
                <?php echo form_textarea(['name' => 'comentarioCamNom', 'id' => 'comentarioCamNom'], '', ['class' => 'form-control']); ?>
              </div>
            </div> <!-- fin step 1-->
            <!-- step 2 -->
            <div class="tab-pane" role="tabpanel" id="addcamnomstep2">
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddCamNomanterior" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Cambio Nombre Anterior<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddCamNomanterior">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCamNomAnterior"
                            class="btn btn-primary pull-right">Añadir Cambio Nombre Anterior</button>
                          <table id="CamNomAnterioresTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_CamNom_anterior">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#addcambio_nombreactual" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Cambio Nombre Actual<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="addcambio_nombreactual">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCamNomActual" class="btn btn-primary pull-right">Añadir
                            Cambio Nombre Actual</button>
                          <table id="CamNomActualesTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_CamNom_actual">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--Fin Step2-->
          </div> <!--fin tab-content-->
        </div><!--Fin row-->
      </div> <!--modal-body-->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="camnomfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
 </div>
 <?php echo form_close(); ?>
</div>

<!-- Añadir Cambio de Nombre Anterior Modal -->
<div class="modal fade" id="CamNomAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Nombre Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscamnomanterior',['id' => 'lblpropietarioscamnomanterior']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscamnomanterior','name'=> 'propietarioscamnomanterior'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscamnomanterior')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamNomAnteriorfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio de Nombre Actual Modal -->
<div class="modal fade" id="CamNomActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Nombre Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscamnomactual',['id' => 'lblpropietarioscamnomactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscamnomactual','name'=> 'propietarioscamnomactual'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscamnomactual ')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamNomActualfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio de Domicilio -->
<div class="modal fade" id="AddCamDom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomfrm']); ?>
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
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active"
                  style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#addcamdomstep1" data-toggle="tab" aria-controls="step1" role="tab"
                    aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio Domicilio</i></a>
                </li>
                <li role="presentation">
                  <a href="#addcamdomstep2" data-toggle="tab" aria-controls="step2" role="tab"
                    aria-expanded="false"><span class="round-tab">2</span> <i>Cambio Domicilio Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content" id="main_form">
            <!-- Step 1 -->
            <div class="tab-pane active" role="tabpanel" id="addcamdomstep1">
              <input type="hidden" id="camdomid">
              <div class="col-md-3">
                <?php echo form_label('Cliente', 'clienteCamDom'); ?>
                <?php 
                $clientes = $select + $clientes;
                echo form_dropdown(['name' => 'clienteCamDom', 'id' => 'clienteCamDom'], $clientes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Oficina', 'oficinaCamDom',['id' => 'lbloficinaCamDom']); ?>
                <?php echo form_dropdown(['name' => 'oficinaCamDom', 'id' => 'oficinaCamDom'], $oficinas, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Staff', 'staffCamDom'); ?>
                <?php 
                $responsable = $select + $responsable;
                echo form_dropdown(['name' => 'staffCamDom', 'id' => 'staffCamDom'], $responsable, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3">
                <?php echo form_label('Estado', 'estadoCamDom',['id' => 'lblestadoCamDom']); ?>
                <?php echo form_dropdown(['name' => 'estadoCamDom', 'id' => 'estadoCamDom'], $estados_solicitudes, '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamDom',['id' => 'lblnro_solicitudCamDom']); ?>
                <?php echo form_input(['name' => 'nro_solicitudCamDom', 'id' => 'nro_solicitudCamDom', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamDom',['id' => 'lblfecha_solicitudCamDom']); ?>
                <?php echo form_input([
                  'id' => 'fecha_solicitudCamDom',
                  'name' => 'fecha_solicitudCamDom',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamDom',['id' => 'lblnro_resolucionCamDom']); ?>
                <?php echo form_input(['name' => 'nro_resolucionCamDom', 'id' => 'nro_resolucionCamDom', 'class' => 'form-control']) ?>
              </div>
              <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamDom',['id' => 'lblfecha_resolucionCamDom']); ?>
                <?php echo form_input([
                  'id' => 'fecha_resolucionCamDom',
                  'name' => 'fecha_resolucionCamDom',
                  'class' => 'form-control calendar',
                  'value' => set_value('fecha_solicitud'),
                  'placeholder' => 'Fecha Solicitud'
                ]); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamDom',['id' => 'lblreferenciaclienteCamDom']); ?>
                <?php echo form_input(['name' => 'referenciaclienteCamDom', 'id' => 'referenciaclienteCamDom'], '', ['class' => 'form-control']); ?>
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <?php echo form_label('Comentario', 'comentarioCamDom',['id' => 'lblcomentarioCamDom']); ?>
                <?php echo form_textarea(['name' => 'comentarioCamDom', 'id' => 'comentarioCamDom'], '', ['class' => 'form-control']); ?>
              </div>
            </div> <!-- fin step 1-->
            <!-- step 2 -->
            <div class="tab-pane" role="tabpanel" id="addcamdomstep2">
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#AddCamDomanterior" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Cambio Domicilio Anterior<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="AddCamDomanterior">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCamDomAnterior"
                            class="btn btn-primary pull-right">Añadir Cambio Domicilio Anterior</button>
                          <table id="CamDomAnterioresTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_CamDom_anterior">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="list-content">
                  <a href="#addcambio_domicilioactual" data-toggle="collapse" aria-expanded="false"
                    aria-controls="listone">Cambio Domicilio Actual<i class="fa fa-chevron-down"></i></a>
                  <div class="collapse" id="addcambio_domicilioactual">
                    <div class="list-box">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" id="addbtnCamDomActual" class="btn btn-primary pull-right">Añadir
                            Cambio Domicilio Actual</button>
                          <table id="CamDomActualesTbl"
                            class="ultimate table table-responsive">
                            <thead>
                              <tr>
                                <th>Nº</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="body_CamDom_actual">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--Fin Step2-->
          </div> <!--fin tab-content-->
        </div><!--Fin row-->
      </div> <!--modal-body-->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="camdomfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
 </div>
 <?php echo form_close(); ?>
</div>

<!-- Añadir Cambio de Domicilio Anterior Modal -->
<div class="modal fade" id="CamDomAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Domicilio Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscamdomanterior',['id' => 'lblpropietarioscamdomanterior']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscamdomanterior','name'=> 'propietarioscamdomanterior'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscamdomanterior')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamDomAnteriorfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio de Domicilio Actual Modal -->
<div class="modal fade" id="CamDomActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio de Domicilio Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietarioscamdomactual',['id' => 'lblpropietarioscamdomactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscamdomactual','name'=> 'propietarioscamdomactual'], $solicitantes, '',
                ['class' => 'form-control','multiple' => 'multiple','selected' => set_value('propietarioscamdomactual ')]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamDomActualfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>



















<!-- Anexo Modal -->
<!-- <div class="modal fade" id="anexoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'anexoFrm']); ?>
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
            <?php echo form_label('Tipo Evento', 'tipo_evento'); ?>
            <?php echo form_dropdown('tipo_evento', $tipo_evento, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-12">
            <?php echo form_label('Comentario', 'evento_comentario'); ?>
            <?php echo form_textarea('evento_comentario', '', ['class' => 'form-control']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="anexofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div> -->

<!-- Añadir Documento Modal Create -->
<div class="modal fade" id="docModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open_multipart("", ['method' => 'POST', 'id' => 'documentoFrm']); ?>
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
            <?php echo form_label('Descripcion', 'descripcion_archivo'); ?>
            <?php echo form_input(['name' => 'doc_descripcion', 'id' => 'doc_descripcion'], '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-12">
            <?php echo form_label('Comentarios', 'comentario_archivo'); ?>
            <?php echo form_textarea(['name' => 'comentario_archivo', 'id' => 'comentario_archivo'], '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-12">
            <?php echo form_label('Archivo', 'doc_archivo'); ?>
            <?php echo form_input([
              'id' => 'doc_archivo',
              'name' => 'doc_archivo',
              'type' => 'file',
              'class' => 'form-control',
              'multiple' => 'multiple',
            ]); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir Signo Modal -->
<div class="modal fade" id="signoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']); ?>
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
            <?php echo form_label('Archivo', 'signo_archivo'); ?>
            <?php echo form_input([
              'id' => 'signo_archivo',
              'name' => 'signo_archivo',
              'type' => 'file',
              'class' => 'form-control',
            ]); ?>
          </div>
          <div class="col-md-12">
            <?php echo form_label('Descripcion', 'descripcion_signo'); ?>
            <?php echo form_textarea('descripcion_signo', '', ['class' => 'form-control','id' => 'descripcion_signo']); ?>
          </div>
          <div class="col-md-12">
            <?php echo form_label('Comentarios', 'comentario_signo'); ?>
            <?php echo form_input('comentario_signo', '', ['class' => 'form-control','id' => 'comentario_signo']); ?>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="signofrmsubmit" type="button" class="btn btn-primary" data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- Añadir factura existente -->
<div class="modal fade" id="facturaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open('', ['name' => "invoiceMarcaFrm", 'id' => "invoiceMarcaFrm"]); ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Factura Existente </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <select class="form-control" name="invoiceID">
              <?php foreach ($invoices as $key => $value) { ?>
                <option value="<?php echo $key; ?>">
                  <?php echo $value; ?>
                </option>
              <?php } ?>
            </select>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="invoiceMarcaSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>