<?php
$select = ['0' => 'Seleccione una opcion']; ?>

<!-- Añadir Evento Modal -->
<div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div class="col-md-6">
            <?php echo form_label('Tipo Evento', 'tipo_evento' , ['id' => 'lbltipo_evento']); ?>
            <?php $tipo_evento = $select + $tipo_evento; ?>
            <?php echo form_dropdown(['name' => 'id_tipo_evento', 'id' => 'id_tipo_evento'], $tipo_evento, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-6">
            <?php echo form_label('Fecha Evento', 'fecha_evento',['id' => 'lblfecha_evento']); ?>
            <?php echo form_input([
              'id' => 'fecha_evento',
              'name' => 'fecha_evento',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Evento'
            ]); ?>
          </div>
          <div class="col-md-12" style= "padding-top : 15px;">
            <?php echo form_label('Comentario', 'evento_comentario', ['id' => 'lblevento_comentario']); ?>
            <?php echo form_textarea(['name' => 'evento_comentario', 'id' => 'evento_comentario'], '', ['class' => 'form-control', 'style' => 'height: 100px;']); ?>
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
          
          <div class="col-md-6">
            <?php echo form_label('Tipo Tareas', 'lbltipo_tarea' , ['class' => 'form-label' , 'id' => 'lbltipo_tarea']); ?>
            <?php $tipo_tareas = $select + $tipo_tareas; ?>
            <?php echo form_dropdown(['name' => 'tipo_tarea', 'id' => 'tipo_tarea'], $tipo_tareas, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-6">
            <?php echo form_label("Fecha de registro" , 'lblfecha_tarea' , ['class' => 'form-label' , 'id' => 'lblfecha_tarea']); ?>
            <?php
            echo form_input([
              'id' => 'fecha_limite',
              'name' => 'fecha_limite',
              'class' => 'form-control calendar',
              'value' => set_value('fecha_limite'),
              'placeholder' => 'Fecha Limite'
            ]); ?>
          </div>
          <div class="col-md-12" style="margin-top: 15px;">
            <?php echo form_label('Descripcion', 'lbldescripcion', ['class' => 'form-label' , 'id' => 'lbldescripcion']); ?>
            <?php echo form_textarea(['name' => 'descripcion', 'id' => 'descripcion'], '', ['class' => 'form-control' ,'style' => 'height:100px;' ]); ?>
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

<!-- Añadir Documento Modal Create -->
<div class="modal fade" id="docModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <?php echo form_label('Descripcion', 'descripcion_archivo', ['id' => 'lbldescripcion_archivo']); ?>
            <?php echo form_input(['name' => 'doc_descripcion', 'id' => 'doc_descripcion'], '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-12" style="padding-top:20px">
            <?php echo form_label('Comentarios', 'comentario_archivo', ['id' => 'lblcomentario_archivo']); ?>
            <?php echo form_textarea(['name' => 'comentario_archivo', 'id' => 'comentario_archivo'], '', ['class' => 'form-control' ,'style' => 'height : 100px' ,]); ?>
          </div>
          <div class="col-md-12" style="padding-top:20px">
            <?php echo form_label('Archivo', 'doc_archivo' , ['id' => 'lbldoc_archivo']); ?>
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