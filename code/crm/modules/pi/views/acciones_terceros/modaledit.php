<!--Editar Modal Publicacion  -->
<div class="modal fade" id="publicacionModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionFrm']);?>
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
            <div style="display: none;">
                <input type="text" class ='form-control' id="id_modal_publicacionEdit" >      
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tipo Publicacion', 'tipo_publicacion');?>
                <?php echo form_dropdown('tipo_publicacion', $tipo_publicaciones, '',['class' => 'form-control','id'=>'tipo_publicacionEdit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Boletin', 'boletin_publicacion');?>
                <?php echo form_dropdown('boletin_publicacion', $boletines , set_value('boletin_publicacion') , ['class' => 'form-control','id'=>'boletin_publicacionEdit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion');?>
                <?php echo form_input('tomo_publicacion',set_value("tomo_publicacion", ''),['class' => 'form-control','id'=>'tomo_publicacionEdit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion');?>
                <?php echo form_input('pag_publicacion',set_value('tomo_publicacion', ''),['class' => 'form-control','id'=>'pag_publicacionEdit']);?>
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

<!-- Editar Modal Evento -->
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
            <div style="display: none;">
                <input type="text" class ='form-control' id="id_modal_eventoEdit" >      
            </div>
            <div class="col-md-12">
                <?php echo form_label('Tipo Evento', 'tipo_evento');?>
                <?php echo form_dropdown(['name'=>'tipo_evento','id'=>'tipo_eventoEdit'], $tipo_evento, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentario', 'evento_comentario');?>
                <?php echo form_textarea(['name'=>'evento_comentario','id'=>'evento_comentarioEdit'],'',['class' => 'form-control']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="eventosfrmsubmitEdit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Modal Documento  -->
<div class="modal fade" id="documentoModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart("", ['method' => 'POST', 'id' => 'documentoFrm']);?>
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
            <div style="display: none;">
                <input type="text" class ='form-control' id="id_modal_documentoEdit" >      
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_archivo');?>
                <?php echo form_input(['name'=>'doc_descripcionEdit','id'=>'doc_descripcionEdit'],'', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_archivo');?>
                <?php echo form_textarea(['name'=>'comentario_archivoEdit', 'id'=>'comentario_archivoEdit'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'doc_archivo');?>
                <?php echo form_input([
                    'id' => 'doc_archivoEdit',
                    'name' => 'doc_archivoEdit',
                    'type' => 'file',
                    'class' => 'form-control',
                    'multiple' => 'multiple',
                ]);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="documentofrmsubmitEdit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Modal Tarea -->
<div class="modal fade" id="tareaModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'tareaFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Tarea</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div style="display: none;">
              <input type="text" class ='form-control' id="id_modal_tareaEdit" >      
            </div>
            <div class="col-md-12">
                <?php echo form_label('Tipo Tarea', 'tipo_tarea');?>
                <?php echo form_dropdown(['name'=>'tipo_tareaEdit','id'=>'tipo_tareaEdit'], $tipo_tarea, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12" style="padding-top:15px;">
              <?php echo form_label('Fecha', 'tarea_fecha'); ?>
              <?php echo form_input([
                  'id'       => 'tarea_fechaEdit',
                  'name'     => 'tarea_fechaEdit',
                  'class'    => 'form-control calendar',
                  'value'    => set_value('tarea_fecha', '', TRUE),
              ]); ?>
            </div>
            <div class="col-md-12" style="padding-top:15px;">
              <?php echo form_label('Descripcion', 'descripcionEdit', ['id' => 'lbltareadescripcionEdit']); ?>
              <?php echo form_textarea(['name' => 'tarea_descripcionEdit', 'id' => 'tarea_descripcionEdit'], '', ['class' => 'form-control']); ?>
            </div>
            
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="tareasfrmsubmitEdit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>