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

<!-- Tareas Modal -->
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

<!-- Tareas Modal Edit -->
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
        <button id="tareaseditfrmsubmit" type="button" class="btn btn-primary">Actualizar</button>
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
                <?php echo form_dropdown('boletin_publicacion', $boletines, set_value('boletin_publicacion') , ['class' => 'form-control']);?>
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
<!-- Evento Modal Edit -->
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
            <?php echo form_label('Fecha de Solicitud', 'fecha_solicitud');?>
            <?php echo form_input([
                                            'id' => 'fecha_solicitudlicencia',
                                            'name' => 'fecha_solicitudlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
            </div>   
            <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Nº de Resolucion	', 'nro_resolucion');?>
                <?php echo form_input(['name'=>'nro_resolucionlicencia','id'=>'nro_resolucionlicencia','class' => 'form-control'])?>
               
            </div>
            <div class="col-md-3" style="margin-top:10px">
            <?php echo form_label('Fecha de Resolucion', 'fecha_resolucion');?>
            <?php echo form_input([
                                            'id' => 'fecha_resolucionlicencia',
                                            'name' => 'fecha_resolucionlicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
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
                                            'value' => set_value('fecha_solicitud'),
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
                                            'value' => set_value('fecha_solicitud'),
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

<!-- Clase Modal -->
<div class="modal fade" id="claseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'claseFrm']);?>
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
                <?php echo form_label('Clases', 'clase_niza_id');?>
                <select class="form-control"  name="clase_niza_id" id="clase_niza_id">
                    <option value="">Seleccione una opcion</option>
                    <?php foreach($clase_niza_id as $key => $value){?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class='col-md-6'>
                <?php echo form_label('Descripcion', 'clase_descripcion');?>
                <?php echo form_textarea([
                    'id'     => 'clase_descripcion',
                    'name'   => 'clase_descripcion',
                    'class'  => 'form-control',
                    'value'  => set_value('clase_descripcion')
                ]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="claseFrmSubmit" type="button" class="btn btn-primary">Añadir</button>
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


<!-- Documento Modal Create -->
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

<!-- Documento Modal Edit -->
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

<!-- No puede ingresar -->
<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Problemas al entrar este modulo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <h1 class="row" style="text-align: center;"> Primero Guarde antes entrar a este modulo</h1>
                <div style="justify-content: center; text-align: center;">

                    <img src = "http://localhost/ecv_marcas/code/crm/assets/images/Save.png" style="justify-content: center;" height="300px" width="300px">
                </div>
            </div>
         
            
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>