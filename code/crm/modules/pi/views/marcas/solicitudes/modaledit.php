<!-- Clase Niza Modal -->
<div class="modal fade" id="claseNizaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'claseNizaFrm']);?>
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
                <?php echo form_label('Clase', 'clase_niza');?>
                <?php echo form_dropdown('clase_niza', $clase_niza_id, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Descripcion', 'clase_niza_descripcion');?>
                <?php echo form_input('clase_niza_descripcion',set_value('descripcion', ''),['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="claseNizaFrmSubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!--Clase niza Editar -->
<div class="modal fade" id="claseNizaEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'claseNizaEditFrm']);?>
    <input name="marcas_clase_id" type="hidden">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Clase</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_label('Clase', 'clase_niza_edit');?>
                <?php echo form_dropdown('clase_niza_edit', $clase_niza_id, set_value('clase_niza_edit', ''),['class' => 'form-control']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Descripcion', 'clase_niza_descripcion_edit');?>
                <?php echo form_input('clase_niza_descripcion_edit',set_value('clase_niza_descripcion_edit', ''),['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="claseNizaEditFrmSubmit" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Prioridad Modal -->
<div class="modal fade" id="prioridadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'prioridadFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir</h4>
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
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist" style="display:flex">
                  <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                      <a href="#addlicenciastep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Licencia</i></a>
                  </li>
                  <li role="presentation" >
                      <a href="#addlicenciastep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Licencia Anterior y Actual</i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="tab-content" id="main_form">
              <!-- Step 1 -->
                <div class="tab-pane active" role="tabpanel" id="addlicenciastep1">
                  <input type="hidden" id="licenciaid">
                  <div class="col-md-3">
                    <?php echo form_label('Cliente', 'cliente');?>
                    <?php echo form_dropdown(['name'=>'clientelicencia','id'=>'clientelicencia'], $clientes, '',['class' => 'form-control']);?>
                  </div>
                  <div class="col-md-3">
                    <?php echo form_label('Oficina', 'oficina');?>
                    <?php echo form_dropdown(['name'=>'oficinalicencia','id'=>'oficinalicencia'], $oficinas, '',['class' => 'form-control']   );?>
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
                </div> <!--fin step 1-->
                <!-- Step 2 -->
                <div class="tab-pane" role="tabpanel" id="addlicenciastep2">
                    <div class="col-md-12">
                      <div class="list-content">
                          <a href="#AddLicenciaanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia Anterior<i class="fa fa-chevron-down"></i></a>
                              <div class="collapse" id="AddLicenciaanterior">
                                  <div class="list-box">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <button type="button" id="addbtnLicenciaAnterior" class="btn btn-primary pull-right" >Añadir Licencia Anterior</button>
                                                  <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead>
                                                      <tr>
                                                          <th>Nº</th>
                                                          <th>Licencia</th>
                                                          <th>Tipo de Licencia</th>
                                                          <th>Propietario</th>
                                                          <th>Acciones</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody id = "body_add_Licencia_anterior">
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
                      <a href="#AddLicenciaactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia Actual<i class="fa fa-chevron-down"></i></a>
                          <div class="collapse" id="AddLicenciaactual">
                              <div class="list-box">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <button type="button" id = "addbtnLicenciaActual" class="btn btn-primary pull-right"  >Añadir Licencia Actual</button>
                                              <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead>
                                                  <tr>
                                                      <th>Nº</th>
                                                      <th>Licencia</th>
                                                      <th>Tipo de Licencia</th>
                                                      <th>Propietario</th>
                                                      <th>Acciones</th>
                                                  </tr>
                                                </thead>
                                                <tbody id = "body_add_Licencia_actual">
                                                </tbody>
                                              </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>   <!--Fin Step 2-->                 
              </div> <!--Panel Body-->
            </div>
    </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditlicenciaAbrirModalfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
        <div class="wizard">
          <div class="wizard-inner">
            <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist" style="display:flex">
                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                  <a href="#licenciastep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Licencia</i></a>
                </li>
                <li role="presentation" >
                    <a href="#licenciastep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Licencia Anterior y Actual</i></a>
                </li>
              </ul>
            </div>
          </div>
            <div class="tab-content" id="main_form">
              <!-- Step 1 -->
              <div class="tab-pane active" role="tabpanel" id="licenciastep1">
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
              </div> <!--fin step 1-->
            <!-- Step 2 -->
            <div class="tab-pane" role="tabpanel" id="licenciastep2">
              <div class="col-md-12">
                <div class="list-content">
                    <a href="#EditarLicenciaanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia Anterior<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="EditarLicenciaanterior">
                            <div class="list-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="btnLicenciaAnterior" class="btn btn-primary pull-right" >Añadir Licencia Anterior</button>
                                            <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead>
                                                        <tr>
                                                            <th>Nº</th>
                                                            <th>Licencia</th>
                                                            <th>Tipo de Licencia</th>
                                                            <th>Propietario</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                </thead>
                                                    <tbody id = "body_Licencia_anterior">
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
                    <a href="#EditarLicenciaactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia Actual<i class="fa fa-chevron-down"></i></a>
                        <div class="collapse" id="EditarLicenciaactual">
                            <div class="list-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id = "btnLicenciaActual" class="btn btn-primary pull-right">Añadir Licencia Actual</button>
                                            <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead>
                                                        <tr>
                                                            <th>Nº</th>
                                                            <th>Licencia</th>
                                                            <th>Tipo de Licencia</th>
                                                            <th>Propietario</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                </thead>
                                                    <tbody id = "body_Licencia_actual">
                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div> <!--fin Step2-->
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#addcesionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addcesionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addcesionstep1">
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
                        </div><!-- fin step 1 -->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="addcesionstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#AddCesionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddCesionanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="addbtnCesionAnterior" class="btn btn-primary pull-right" >Añadir Cesion Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cesion</th>
                                                                <th>Tipo de Cesion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_add_Cesion_anterior">
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
                                    <a href="#AddCesionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddCesionactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right"  >Añadir Cesion Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cesion</th>
                                                                <th>Tipo de Cesion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_add_Cesion_actual">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="EditcesionAbrirModalfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#editcesionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#editcesionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="editcesionstep1">
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
                        </div><!--Fin Step 1 -->
                        <!-- step 2 -->
                        <div class="tab-pane " role="tabpanel" id="editcesionstep2">                              
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#EditarCesionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="EditarCesionanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnCesionAnterior" class="btn btn-primary pull-right" >Añadir Cesion Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cesion</th>
                                                                <th>Tipo de Cesion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_Cesion_anterior">
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
                                    <a href="#EditarCesionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="EditarCesionactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right"  >Añadir Cesion Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                                <tr>
                                                                    <th>Nº</th>
                                                                    <th>Cesion</th>
                                                                    <th>Tipo de Cesion</th>
                                                                    <th>Propietario</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id = "body_Cesion_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- fin step 2 -->
                    </div> <!-- fin tab-content -->
                </div> <!-- fin row -->
            </div> <!--Fin Modal Body -->
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#addcamdomstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio de Domicilio</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addcamdomstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cambio de Domicilio Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addcamdomstep1">
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
                        </div><!-- Fin Step 1 -->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="addcamdomstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#Addcambio_domicilioanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Addcambio_domicilioanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="addbtnCambioDomicilioAnterior" class="btn btn-primary pull-right" >Añadir Cambio Domicilio Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_add_cambio_domicilio_anterior">
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
                                    <a href="#Addcambio_domicilioactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Addcambio_domicilioactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "addbtnCambioDomicilioActual" class="btn btn-primary pull-right"  >Añadir Cambio Domicilio Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_add_cambio_domicilio_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--Fin step 2 -->
                    </div><!--Fin tab-content -->
                </div><!--Fin row -->
            </div><!--Fin panel-body -->
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="EditCambioDomicilioAbrirModalfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#Editcamdomstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio de Domicilio</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#Editcamdomstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cambio de Domicilio Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="Editcamdomstep1">
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
                        </div> <!-- Fin Step 1 -->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="Editcamdomstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#Editarcambio_domicilioanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_domicilioanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnCambioDomicilioAnterior" class="btn btn-primary pull-right" >Añadir Cambio Domicilio Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_domicilio_anterior">
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
                                    <a href="#Editarcambio_domicilioactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Domicilio Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_domicilioactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnCambioDomicilioActual" class="btn btn-primary pull-right"  >Añadir Cambio Domicilio Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Domicilio</th>
                                                                <th>Tipo de Domicilio</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_domicilio_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--Fin step 2 -->
                    </div> <!--Fin tab-content -->
                </div> <!--Fin row -->
            </div> <!--Fin modal_body -->
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
    <?php echo form_open("", ['method' => 'POST', 'id' => 'fusionFrm']);?>
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#addfusionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addfusionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addfusionstep1">
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
                        </div><!-- fin step1 -->
                        <!-- step 2 -->
                        <div class="tab-pane " role="tabpanel" id="addfusionstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#AddFusionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddFusionanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="addbtnFusionAnterior" class="btn btn-primary pull-right" >Añadir Fusion Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Fusion</th>
                                                                <th>Tipo de Fusion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                    <tbody id = "body_Fusion_anterior">
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
                                    <a href="#AddFusionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="AddFusionactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "addbtnFusionActual" class="btn btn-primary pull-right"  >Añadir Fusion Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Fusion</th>
                                                                <th>Tipo de Fusion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_Fusion_actual">
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
        <button id="EditfusionAbrirModalfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist" style="display:flex">
                            <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                <a href="#editfusionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cesion</i></a>
                            </li>
                            <li role="presentation" >
                                <a href="#editfusionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cesion Anterior y Actual</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="main_form">
                    <!-- Step 1 -->
                    <div class="tab-pane active" role="tabpanel" id="editfusionstep1">
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
                    </div><!--fin Step 1-->
                    <!-- step 2 -->
                    <div class="tab-pane " role="tabpanel" id="editfusionstep2">                 
                        <div class="col-md-12">
                            <div class="list-content">
                                <a href="#EditarFusionanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Anterior<i class="fa fa-chevron-down"></i></a>
                                <div class="collapse" id="EditarFusionanterior">
                                    <div class="list-box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" id="btnFusionAnterior" class="btn btn-primary pull-right" >Añadir Fusion Anterior</button>
                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Fusion</th>
                                                                <th>Tipo de Fusion</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody id = "body_add_Fusion_anterior">
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
                                <a href="#EditarFusionactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion Actual<i class="fa fa-chevron-down"></i></a>
                                <div class="collapse" id="EditarFusionactual">
                                    <div class="list-box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" id = "btnFusionActual" class="btn btn-primary pull-right"  >Añadir Fusion Actual</button>
                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead>
                                                        <tr>
                                                            <th>Nº</th>
                                                            <th>Fusion</th>
                                                            <th>Tipo de Fusion</th>
                                                            <th>Propietario</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id = "body_add_Fusion_actual">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--fin Step 2-->
                </div> <!--fin panel-body -->
            </div><!--fin row-->
        </div> <!--fin modal-body -->
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditfusionAbrirModalfrmsubmit" type="button" class="btn btn-primary">Editar</button>
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#addcamnomstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio Nombre</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addcamnomstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cambio Nombre Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addcamnomstep1">
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
                        </div> <!-- fin step 1-->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="addcamnomstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#Addcambio_nombreanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Nombre Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Addcambio_nombreanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="addbtnCambioNombreAnterior" class="btn btn-primary pull-right" >Añadir Cambio Nombre Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Nombre</th>
                                                                <th>Tipo de Nombre</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody id = "body_add_cambio_nombre_anterior">
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
                                    <a href="#addcambio_nombreactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Nombre Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="addcambio_nombreactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "addbtnCambioNombreActual" class="btn btn-primary pull-right"  >Añadir Cambio Nombre Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Nombre</th>
                                                                <th>Tipo de Nombre</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_add_cambio_nombre_actual">
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
                <button id="EditCambioNombreAbrirModalfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
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
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                <li role="presentation" class="active" style="justify-content: center;text-align: center; margin-left: 230px;">
                                    <a href="#editcamnomstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Cambio Nombre</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#editcamnomstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Cambio Nombre Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="editcamnomstep1">
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
                        </div> <!--fin step 1-->
                        <!-- step 2 -->
                        <div class="tab-pane" role="tabpanel" id="editcamnomstep2">
                            <div class="col-md-12">
                                <div class="list-content">
                                    <a href="#Editarcambio_nombreanterior" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Nombre Anterior<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_nombreanterior">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnCambioNombreAnterior" class="btn btn-primary pull-right" >Añadir Cambio Nombre Anterior</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Nombre</th>
                                                                <th>Tipo de Nombre</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_nombre_anterior">
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
                                    <a href="#Editarcambio_nombreactual" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio Nombre Actual<i class="fa fa-chevron-down"></i></a>
                                    <div class="collapse" id="Editarcambio_nombreactual">
                                        <div class="list-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id = "btnCambioNombreActual" class="btn btn-primary pull-right"  >Añadir Cambio Nombre Actual</button>
                                                    <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
                                                                <th>Cambio de Nombre</th>
                                                                <th>Tipo de Nombre</th>
                                                                <th>Propietario</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "body_cambio_nombre_actual">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--fin step 2-->
                    </div> <!-- fin tab-content -->
                </div> <!--fin row-->
            </div> <!-- fin panel-body -->
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

<!-- Añadir Cambio Domicilio Actual Modal -->
<div class="modal fade" id="CambioDomicilioActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio Domicilio Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscamdomactual','name'=> 'propietarioscamdomactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamDomActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio Domicilio Actual Modal -->
<div class="modal fade" id="EditCambioDomicilioActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio Domicilio Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CamDomActual_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editpropietarioscamdomactual','name'=> 'Editpropietarioscamdomactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCamDomActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio Domicilio Anterior Modal -->
<div class="modal fade" id="CambioDomicilioAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio Domicilio Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscamdomanterior','name'=> 'propietarioscamdomanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamDomAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio Domicilio Anterior Modal -->
<div class="modal fade" id="EditarCambioDomicilioAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio Domicilio Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CamDomAnterior_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editarpropietarioscamdomanterior','name'=> 'Editarpropietarioscamdomanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCamDomAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio Nombre Actual Modal -->
<div class="modal fade" id="CambioNombreActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio Nombre Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscamnomactual','name'=> 'propietarioscamnomactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamNomActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio Nombre Actual Modal -->
<div class="modal fade" id="EditCambioNombreActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio Nombre Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CamNomActual_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editpropietarioscamnomactual','name'=> 'Editpropietarioscamnomactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCamNomActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Cambio Nombre Anterior Modal -->
<div class="modal fade" id="CambioNombreAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Cambio Nombre Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscamnomanterior','name'=> 'propietarioscamnomanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCamNomAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cambio Nombre Anterior Modal -->
<div class="modal fade" id="EditarCambioNombreAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cambio Nombre Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CamNomAnterior_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editarpropietarioscamnomanterior','name'=> 'Editarpropietarioscamnomanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCamNomAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
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
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusion Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietariosfusionactual','name'=> 'propietariosfusionactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirFusionActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Fusion Actual Modal -->
<div class="modal fade" id="EditFusionActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Fusion Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="FusionActual_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editpropietariosfusionactual','name'=> 'Editpropietariosfusionactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarFusionActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Añadir Fusion Anterior Modal -->
<div class="modal fade" id="FusionAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Fusion Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietariosfusionanterior','name'=> 'propietariosfusionanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirFusionAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Fusion Anterior Modal -->
<div class="modal fade" id="EditarFusionAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Fusion Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="FusionAnterior_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editarpropietariosfusionanterior','name'=> 'Editarpropietariosfusionanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarFusionAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
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
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioslicenciaactual','name'=> 'propietarioslicenciaactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirLicenciaActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Licencia Actual Modal -->
<div class="modal fade" id="EditLicenciaActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Licencia Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="LicenciaActual_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editpropietarioslicenciaactual','name'=> 'Editpropietarioslicenciaactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarLicenciaActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
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
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioslicenciaanterior','name'=> 'propietarioslicenciaanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirLicenciaAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Licencia Anterior Modal -->
<div class="modal fade" id="EditarLicenciaAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Licencia Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="LicenciaAnterior_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editarpropietarioslicenciaanterior','name'=> 'Editarpropietarioslicenciaanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarLicenciaAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
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
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscesionactual','name'=> 'propietarioscesionactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCesionActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cesion Actual Modal -->
<div class="modal fade" id="EditCesionActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cesion Actual</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CesionActual_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editpropietarioscesionactual','name'=> 'Editpropietarioscesionactual'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCesionActualfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
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
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'propietarioscesionanterior','name'=> 'propietarioscesionanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="AñadirCesionAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Cesion Anterior Modal -->
<div class="modal fade" id="EditarCesionAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Cesion Anterior</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="CesionAnterior_id">
            <div class="col-md-12">
                <?php echo form_label('Propietario', 'propietario');?>
                <?php echo form_dropdown(['id'=> 'Editarpropietarioscesionanterior','name'=> 'Editarpropietarioscesionanterior'], $solicitantes, '',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="EditarCesionAnteriorfrmsubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>