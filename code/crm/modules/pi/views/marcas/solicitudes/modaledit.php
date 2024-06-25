<?php $select = ['' => '']; ?>

<!-- Añadir Signo Modal -->
<div class="modal fade" id="signoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir Signo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'signo_archivoAdd');?>
                <?php echo form_input([
                    'id' => 'signo_archivoAdd',
                    'name' => 'signo_archivoAdd',
                    'type' => 'file',
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_signo');?>
                <?php echo form_textarea('descripcion_signoAdd','', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'comentario_signo');?>
                <?php echo form_input('comentario_signoAdd','',['class' => 'form-control']);?>
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
<div class="modal fade" id="signoModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open_multipart('', ['method' => 'POST', 'id' => 'signoFrmEdit']);?>
    <?php echo form_input([
            'name' => 'signo_archivo_orig', 
            'type'=>'hidden', 
            'id' =>'signo_archivo_orig',
            'value' => $values['signo_archivo']
          ]);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Signo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'signo_archivo', ['id' => 'lblsigno_archivo']);?>
                <?php echo form_input([
                    'id' => 'signo_archivo',
                    'name' => 'signo_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    'accept' => 'image/png, image/gif, image/jpeg',
                ]);?>
            </div>
            <div class="invisible">
            <?php echo form_input([
                    'id' => 'signo_archivo_hidde',
                    'name' => 'signo_archivo_hidde',
                    'type' => 'file',
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Descripcion', 'descripcion_signo', ['id' => 'lbldescripcion_signo']);?>
                <?php echo form_textarea(
                    'descripcion_signo', 
                    $values['signo_archivo_desc'] , 
                    ['class' => 'form-control', 
                    'id' => 'descripcion_signo']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            <?php if(isset($values['signo_archivo'])) { ?>
                <img id="img_signo_archivo" class="img-responsive" src="<?php echo $values['signo_archivo'];?>" alt="<?php echo $values['signonom'];?>">
            <?php } ?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="signoEditfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

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
                <?php 
                $clase_niza_id = $select + $clase_niza_id;
                echo form_label('Clase', 'clase_niza', ['id' => 'lblclase_niza']);?>
                <?php echo form_dropdown('clase_niza', $clase_niza_id, '',['class' => 'form-control', 'id' => 'clase_niza']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Descripcion', 'clase_niza_descripcion', ['id' => 'lblclase_niza_descripcion']);?>
                <?php echo form_input('clase_niza_descripcion',set_value('descripcion', ''),['class' => 'form-control', 'id' => 'clase_niza_descripcion']);?>
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
                <?php echo form_label('Clase', 'clase_niza_edit', ['id' => 'lblclase_niza_edit']);?>
                <?php echo form_dropdown('clase_niza_edit', $clase_niza_id, set_value('clase_niza_edit', ''),['class' => 'form-control', 'id' => 'clase_niza_edit']);?>
            </div>
            <div class="col-md-6">
                <?php echo form_label('Descripcion', 'clase_niza_descripcion_edit', ['id' => 'lblclase_niza_descripcion_edit']);?>
                <?php echo form_input('clase_niza_descripcion_edit',set_value('clase_niza_descripcion_edit', ''),['class' => 'form-control', 'id' => 'clase_niza_descripcion_edit']);?>
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
        <h4 class="modal-title" id="exampleModalLabel">Añadir Prioridad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_label('Pais de la prioridad', 'pais_prioridad', ['id' => 'lblpais_prioridad']);?>
                <?php 
                $pais_id = $select + $pais_id;
                echo form_dropdown('pais_prioridad', $pais_id, '',['class' => 'form-control', 'id' => 'pais_prioridad']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Fecha', 'fecha_prioridad', ['id' => 'lblfecha_prioridad']);?>
                <?php echo form_input('fecha_prioridad', '', ['class' => 'form-control calendar', 'id' => 'fecha_prioridad']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Número', 'nro_prioridad', ['id' => 'lblnro_prioridad']);?>
                <?php echo form_input('nro_prioridad','',['class' => 'form-control numberOnly', 'id' => 'nro_prioridad']);?>
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

<!-- Editar Prioridad Modal -->
<div class="modal fade" id="prioridadEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'prioridadEditFrm']);?>
    <input name="prioridad_edit_id" type="hidden">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Prioridad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_label('Pais de la prioridad', 'pais_prioridad_edit', ['id' => 'lblpais_prioridad_edit']);?>
                <?php echo form_dropdown('pais_prioridad_edit', $pais_id, '',['class' => 'form-control', 'id' => 'pais_prioridad_edit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Fecha', 'fecha_prioridad_edit', ['id' => 'lblfecha_prioridad_edit']);?>
                <?php echo form_input('fecha_prioridad_edit', '', ['class' => 'form-control calendar', 'id' => 'fecha_prioridad_edit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Número', 'nro_prioridad_edit', ['id' => 'lblnro_prioridad_edit']);?>
                <?php echo form_input('nro_prioridad_edit','',['class' => 'form-control numberOnly', 'id' => 'nro_prioridad_edit']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="prioridadEditfrmsubmit" type="button" class="btn btn-primary">Editar</button>
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
          <div class="col-md-3 col-md-offset-3">
            <?php echo form_label('Fecha', 'fecha_publicacion', ['id' => 'lblfecha_publicacion']); ?>
            <?php echo form_input([
              'id' => 'fecha_publicacion',
              'name' => 'fecha_publicacion',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Publicación'
            ]); ?>
          </div>
            <div class="col-md-3">
                <?php echo form_label('Tipo', 'tipo_publicacion', ['id' => 'lbltipo_publicacion']);?>
                <?php 
                $tipo_publicacion = $select + $tipo_publicacion;
                echo form_dropdown('tipo_publicacion', $tipo_publicacion, set_value('tipo_publicacion'),['class' => 'form-control','id' => 'tipo_publicacion']);?>
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-3 col-md-offset-1">
                <?php echo form_label('Boletin', 'boletin_publicacion', ['id' => 'lblboletin_publicacion']);?>
                <?php 
                $boletines = $select + $boletines;
                echo form_dropdown('boletin_publicacion', $boletines, set_value('boletin_publicacion') , ['class' => 'form-control','id' => 'boletin_publicacion']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion', ['id' => 'lbltomo_publicacion']);?>
                <?php echo form_input('tomo_publicacion',set_value('tomo_publicacion'),['class' => 'form-control','id' => 'tomo_publicacion']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion', ['id' => 'lblpag_publicacion']);?>
                <?php echo form_input('pag_publicacion',set_value('pag_publicacion'),['class' => 'form-control','id' => 'pag_publicacion']);?>
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
    <?php echo form_open("", ['method' => 'POST', 'id' => 'publicacionEditFrm']);?>
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
          <div class="col-md-3 col-md-offset-3">
            <?php echo form_label('Fecha', 'fecha_publicacion_edit', ['id' => 'lblfecha_publicacion_edit']); ?>
            <?php echo form_input([
              'id' => 'fecha_publicacion_edit',
              'name' => 'fecha_publicacion_edit',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Publicación'
            ]); ?>
          </div>
            <div class="col-md-3">
                <?php echo form_label('Tipo', 'tipo_publicacion_edit', ['id' => 'lbltipo_publicacion_edit']);?>
                <?php echo form_dropdown('tipo_publicacion_edit', $tipo_publicacion, set_value('tipo_publicacion_edit'),['class' => 'form-control','id' => 'tipo_publicacion_edit']);?>
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-3 col-md-offset-1">
                <?php echo form_label('Boletin', 'boletin_publicacion_edit', ['id' => 'lblboletin_publicacion_edit']);?>
                <?php echo form_dropdown('boletin_publicacion_edit', $boletines, set_value('boletin_publicacion_edit') , ['class' => 'form-control','id' => 'boletin_publicacion_edit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Tomo', 'tomo_publicacion_edit', ['id' => 'lbltomo_publicacion_edit']);?>
                <?php echo form_input('tomo_publicacion_edit',set_value('tomo_publicacion_edit'),['class' => 'form-control','id' => 'tomo_publicacion_edit']);?>
            </div>
            <div class="col-md-3">
                <?php echo form_label('Página', 'pag_publicacion_edit', ['id' => 'lblpag_publicacion_edit']);?>
                <?php echo form_input('pag_publicacion_edit',set_value('pag_publicacion_edit'),['class' => 'form-control','id' => 'pag_publicacion_edit']);?>
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
            <?php echo form_label('Tipo Evento', 'tipo_evento', ['id' => 'lbltipo_evento']); ?>
            <?php
            $tipo_evento = $select + $tipo_evento;
            echo form_dropdown(['name' => 'tipo_evento', 'id' => 'tipo_evento'], $tipo_evento, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-4">
            <?php echo form_label('Fecha Evento', 'fecha_evento', ['id' => 'lblfecha_evento']); ?>
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
            <?php echo form_label('Comentario', 'evento_comentario', ['id' => 'lblevento_comentario']); ?>
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

<!-- Editar Evento Modal Edit -->
<div class="modal fade" id="eventoModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <?php echo form_open("", ['method' => 'POST', 'id' => 'eventoEditFrm']); ?>
  <?php echo form_hidden('even_id_edit', set_value('even_id_edit'));?>
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
          <div class="col-md-8 col-md-offset-0">
            <?php echo form_label('Tipo Evento', 'tipo_evento_edit', ['id' => 'lbltipo_evento_edit']); ?>
            <?php
            $tipo_evento = $select + $tipo_evento;
            echo form_dropdown(['name' => 'tipo_evento_edit', 'id' => 'tipo_evento_edit'], $tipo_evento, '', ['class' => 'form-control']); ?>
          </div>
          <div class="col-md-4">
            <?php echo form_label('Fecha Evento', 'fecha_evento_edit', ['id' => 'lblfecha_evento_edit']); ?>
            <?php echo form_input([
              'id' => 'fecha_evento_edit',
              'name' => 'fecha_evento_edit',
              'class' => 'form-control calendar',
              'placeholder' => 'Fecha Evento'
            ]); ?>
          </div>
        </div>
        <div class="row" style="padding-top:15px;">
          <div class="col-md-12">
            <?php echo form_label('Comentario', 'evento_comentario_edit', ['id' => 'lblevento_comentario_edit']); ?>
            <?php echo form_textarea(['name' => 'evento_comentario_edit', 'id' => 'evento_comentario_edit'], '', ['class' => 'form-control']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="editeventosfrmsubmit" type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
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
            <div class="col-md-4">
              <?php echo form_label('Proyecto', 'project_id', ['class' => 'form-label', 'id' => 'lblproject_id']);?>
              <?php 
              $projects = $select + $projects;
              echo form_dropdown([
                'name' => 'project_id',
                'id' => 'project_id',
                'class' => 'form-control',
                'selected' => set_value('project_id', $values['projects']), 
                'options' => $projects
              ]);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo Tareas', 'tipo_tarea', ['class' => 'form-label', 'id' => 'lbltipo_tarea']);?>
                <?php 
                $tipo_tareas = $select + $tipo_tareas;
                echo form_dropdown(['name'=>'tipo_tarea','id'=>'tipo_tarea'], $tipo_tareas, '',['class' => 'form-control']);?>
            </div>
            <div class="col-md-4">
              <?php echo form_label('Fecha', 'fecha_tarea', ['id' => 'lblfecha_tarea']); ?>
              <?php echo form_input('fecha_tarea', '', ['class' => 'form-control calendar', 'id' => 'fecha_tarea']); ?>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <?php echo form_label('Descripcion', 'descripcion', ['id' => 'lbldescripcion']);?>
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
    <?php echo form_open('', ['method' => 'POST', 'id' => 'tareasEditfrm']);?>
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
            <div class="col-md-4">
              <?php echo form_label('Proyecto', 'project_id_edit', ['class' => 'form-label', 'id' => 'lblproject_id_edit']);?>
              <?php echo form_dropdown([
                'name' => 'project_id_edit',
                'id' => 'project_id_edit',
                'class' => 'form-control',
                'selected' => set_value('project_id', $values['projects']), 
                'options' => $projects
              ]);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo Tareas', 'tipo_tarea_edit', ['class' => 'form-label', 'id' => 'lbltipo_tarea_edit']);?>
                <?php echo form_dropdown(['name'=>'tipo_tarea_edit','id'=>'tipo_tarea_edit','class' => 'form-control'], $tipo_tareas  );?>
            </div>
            <div class="col-md-4">
              <?php echo form_label('Fecha', 'fecha_tarea_edit', ['id' => 'lblfecha_tarea_edit']); ?>
              <?php echo form_input('fecha_tarea_edit', '', ['class' => 'form-control calendar', 'id' => 'fecha_tarea_edit']); ?>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <?php echo form_label('Descripcion', 'descripcion_edit', ['class' => 'form-label', 'id' => 'lbldescripcion_edit']);?>
                <?php echo form_textarea(['name'=>'descripcion_edit','id'=>'descripcion_edit'],'',['class' => 'form-control']);?>
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

<!-- Añadir Cesion -->
<div class="modal fade" id="AddCesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'cesionesfrm']);?>
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
                            <div class="col-md-3">
                                <?php echo form_label('Cliente', 'cliente');?>
                                <?php 
                                $clientes = $select + $clientes;
                                echo form_dropdown(['name'=>'clienteCesion','id'=>'clienteCesion'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCesion', ['id' => 'lbloficinaCesion']);?>
                                <?php 
                                $oficinas = $select + $oficinas;
                                echo form_dropdown(['name'=>'oficinaCesion','id'=>'oficinaCesion'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staff');?>  
                                <?php 
                                $responsable = $select + $responsable;
                                echo form_dropdown(['name'=>'staffCesion','id'=>'staffCesion'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCesion', ['id' => 'lblestadoCesion']);?>
                                <?php 
                                $estados_solicitudes = $select + $estados_solicitudes;
                                echo form_dropdown(['name'=>'estadoCesion','id'=>'estadoCesion'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCesion', ['id' => 'lblnro_solicitudCesion']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCesion','id'=>'nro_solicitudCesion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCesion', ['id' => 'lblfecha_solicitudCesion']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCesion',
                                            'name' => 'fecha_solicitudCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitudCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCesion', ['id' => 'lblnro_resolucionCesion']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCesion','id'=>'nro_resolucionCesion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCesion', ['id' => 'lblfecha_resolucionCesion']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCesion',
                                            'name' => 'fecha_resolucionCesion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionCesion'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCesion', ['id' => 'lblreferenciaclienteCesion']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCesion','id'=>'referenciaclienteCesion'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCesion', ['id' => 'lblcomentarioCesion']);?>
                                <?php echo form_textarea(['name'=>'comentarioCesion','id'=>'comentarioCesion','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="addbtnCesionAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                                    data-target="#CesionAnteriorModal">Añadir Cesion Anterior</button>
                                                    <table id="CesionAnteriorTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                                    data-target="#CesionActualModal">Añadir Cesion Actual</button>
                                                    <table id="CesionActualTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                <button id="AddCesionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div>

<!-- Editar Cesion -->
<div class="modal fade" id="EditCesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'cesionesEditfrm']);?>
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
                                <?php echo form_label('Cliente', 'clienteCesion');?>
                                <?php echo form_dropdown(['name'=>'clienteCesion_edit','id'=>'clienteCesion_edit'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCesion_edit', ['id' => 'lbloficinaCesion_edit']);?>
                                <?php echo form_dropdown(['name'=>'oficinaCesion_edit','id'=>'oficinaCesion_edit'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staffCesion_edit');?>  
                                <?php echo form_dropdown(['name'=>'staffCesion_edit','id'=>'staffCesion_edit'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCesion_edit', ['id' => 'lblestadoCesion_edit']);?>
                                <?php echo form_dropdown(['name'=>'estadoCesion_edit','id'=>'estadoCesion_edit'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCesion_edit', ['id' => 'lblnro_solicitudCesion_edit']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCesion_edit','id'=>'nro_solicitudCesion_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Fecha de Solicitud', 'fecha_solicitudCesion_edit', ['id' => 'lblfecha_solicitudCesion_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCesion_edit',
                                            'name' => 'fecha_solicitudCesion_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCesion_edit', ['id' => 'lblnro_resolucionCesion_edit']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCesion_edit','id'=>'nro_resolucionCesion_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:15px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCesion_edit', ['id' => 'lblfecha_resolucionCesion_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCesion_edit',
                                            'name' => 'fecha_resolucionCesion_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCesion_edit', ['id' => 'lblreferenciaclienteCesion_edit']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCesion_edit','id'=>'referenciaclienteCesion_edit'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCesion_edit', ['id' => 'lblcomentarioCesion_edit']);?>
                                <?php echo form_textarea(['name'=>'comentarioCesion_edit','id'=>'comentarioCesion_edit','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="btnCesionAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CesionAnteriorModal">Añadir Cesion Anterior</button>
                                                    <table id="CesionAnteriorTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "btnCesionActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CesionActualModal">Añadir Cesion Actual</button>
                                                    <table id="CesionActualTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                                <tr>
                                                                    <th>Nº</th>
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
                <?php echo form_label('Propietario', 'propietario', ['id' => 'lblpropietarioscesionactual']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscesionactual','name'=> 'propietarioscesionactual', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                <?php echo form_label('Propietario', 'propietario', ['id' => 'lblpropietarioscesionanterior']);?>
                <?php 
                echo form_dropdown(['id'=> 'propietarioscesionanterior','name'=> 'propietarioscesionanterior', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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

<!-- Añadir Licencia -->
<div class="modal fade" id="AddLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'licenciafrm']);?>
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
                  <div class="col-md-3">
                    <?php echo form_label('Cliente', 'cliente');?>
                    <?php echo form_dropdown(['name'=>'clienteLicencia','id'=>'clienteLicencia'], $clientes, '',['class' => 'form-control']);?>
                  </div>
                  <div class="col-md-3">
                    <?php echo form_label('Oficina', 'oficinaLicencia',['id' => 'lbloficinaLicencia']);?>
                    <?php echo form_dropdown(['name'=>'oficinaLicencia','id'=>'oficinaLicencia'], $oficinas, '',['class' => 'form-control']   );?>
                  </div>
                  <div class="col-md-3">
                    <?php echo form_label('Staff', 'staff');?>  
                    <?php echo form_dropdown(['name'=>'staffLicencia','id'=>'staffLicencia'], $responsable, '',['class' => 'form-control']);?>
                  </div>
                  <div class="col-md-3">
                    <?php echo form_label('Estado', 'estadoLicencia',['id' => 'lblestadoLicencia']);?>
                    <?php echo form_dropdown(['name'=>'estadoLicencia','id'=>'estadoLicencia'], $estados_solicitudes, '',['class' => 'form-control']);?>
                  </div>
                  <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Nº de Solicitud	', 'nro_solicitudLicencia',['id' => 'lblnro_solicitudLicencia']);?>
                    <?php echo form_input(['name'=>'nro_solicitudLicencia','id'=>'nro_solicitudLicencia','class' => 'form-control'])?>
                  </div>
                  <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Fecha de Solicitud', 'fecha_solicitudLicencia',['id' => 'lblfecha_solicitudLicencia']);?>
                    <?php echo form_input([
                                            'id' => 'fecha_solicitudLicencia',
                                            'name' => 'fecha_solicitudLicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitudLicencia'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                  </div>   
                  <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Nº de Resolucion	', 'nro_resolucionLicencia',['id' => 'lblnro_resolucionLicencia']);?>
                    <?php echo form_input(['name'=>'nro_resolucionLicencia','id'=>'nro_resolucionLicencia','class' => 'form-control'])?>
                  </div>
                  <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionLicencia',['id' => 'lblfecha_resolucionLicencia']);?>
                    <?php echo form_input([
                                            'id' => 'fecha_resolucionLicencia',
                                            'name' => 'fecha_resolucionLicencia',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionLicencia'),
                                            'placeholder' => 'Fecha Resolucion'
                                        ]);?>
                  </div> 
                  <div class="col-md-12" style="margin-top:10px">
                    <?php echo form_label('Referencia Cliente', 'referenciaclienteLicencia',['id' => 'lblreferenciaclienteLicencia']);?>
                    <?php echo form_input(['name'=>'referenciaclienteLicencia','id'=>'referenciaclienteLicencia'],'',['class' => 'form-control']);?>
                  </div>
                  <div class="col-md-12" style="margin-top:10px">
                    <?php echo form_label('Comentario', 'comentarioLicencia',['id' => 'lblcomentarioLicencia']);?>
                    <?php echo form_textarea(['name'=>'comentarioLicencia','id'=>'comentarioLicencia','rows'=>1],'',['class' => 'form-control']);?>
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
                                              <button type="button" id="addbtnLicenciaAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                                    data-target="#LicenciaAnteriorModal">Añadir Licencia Anterior</button>
                                                <table id="LicenciaAnteriorTbl_add" class="ultimate table table-responsive">
                                                    <thead>
                                                      <tr>
                                                          <th>Nº</th>
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
                                          <button type="button" id = "addbtnLicenciaActual" class="btn btn-primary pull-right"  data-toggle="modal"
                                                                    data-target="#LicenciaActualModal">Añadir Licencia Actual</button>
                                            <table id="LicenciaActualTbl_add" class="ultimate table table-responsive">
                                                <thead>
                                                  <tr>
                                                      <th>Nº</th>
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
        <button id="addlicenciafrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Licencia -->
<div class="modal fade" id="EditLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'licenciaEditfrm']);?>
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
                  <?php echo form_label('Cliente', 'clienteLicencia_edit');?>
                  <?php echo form_dropdown(['name'=>'clienteLicencia_edit','id'=>'clienteLicencia_edit'], $clientes, '',['class' => 'form-control']);?>
                </div>
                <div class="col-md-3">
                  <?php echo form_label('Oficina', 'oficinaLicencia_edit',['id' => 'lbloficinaLicencia_edit']);?>
                  <?php echo form_dropdown(['name'=>'oficinaLicencia_edit','id'=>'oficinaLicencia_edit'], $oficinas, '',['class' => 'form-control']);?>
                </div>
                <div class="col-md-3">
                    <?php echo form_label('Staff', 'staffLicencia_edit');?>  
                    <?php echo form_dropdown(['name'=>'staffLicencia_edit','id'=>'staffLicencia_edit'], $responsable, '',['class' => 'form-control']);?>
                </div>
                <div class="col-md-3">
                    <?php echo form_label('Estado', 'estadoLicencia_edit',['id' => 'lblestadoLicencia_edit']);?>
                    <?php echo form_dropdown(['name'=>'estadoLicencia_edit','id'=>'estadoLicencia_edit'], $estados_solicitudes, '',['class' => 'form-control']);?>
                </div>
                <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Nº de Solicitud	', 'nro_solicitudLicencia_edit',['id' => 'lblnro_solicitudLicencia_edit']);?>
                    <?php echo form_input(['name'=>'nro_solicitudLicencia_edit','id'=>'nro_solicitudLicencia_edit','class' => 'form-control'])?>
                </div>
                <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Fecha de Solicitud', 'fecha_solicitudLicencia_edit',['id' => 'lblfecha_solicitudLicencia_edit']);?>
                    <?php echo form_input([
                                            'id' => 'fecha_solicitudLicencia_edit',
                                            'name' => 'fecha_solicitudLicencia_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                </div>   
                <div class="col-md-3" style="margin-top:10px">
                    <?php echo form_label('Nº de Resolucion	', 'nro_resolucionLicencia_edit',['id' => 'lblnro_resolucionLicencia_edit']);?>
                    <?php echo form_input(['name'=>'nro_resolucionLicencia_edit','id'=>'nro_resolucionLicencia_edit','class' => 'form-control'])?>
               
                </div>
                <div class="col-md-3" style="margin-top:10px">
                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionLicencia_edit',['id' => 'lblfecha_resolucionLicencia_edit']);?>
                <?php echo form_input([
                                            'id' => 'fecha_resolucionLicencia_edit',
                                            'name' => 'fecha_resolucionLicencia_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                </div> 
                <div class="col-md-12" style="margin-top:10px">
                    <?php echo form_label('Referencia Cliente', 'referenciaclienteLicencia_edit',['id' => 'lblreferenciaclienteLicencia_edit']);?>
                    <?php echo form_input(['name'=>'referenciaclienteLicencia_edit','id'=>'referenciaclienteLicencia_edit'],'',['class' => 'form-control']);?>
                </div>
                <div class="col-md-12" style="margin-top:10px">
                    <?php echo form_label('Comentario', 'comentarioLicencia_edit',['id' => 'lblcomentarioLicencia_edit']);?>
                    <?php echo form_textarea(['name'=>'comentarioLicencia_edit','id'=>'comentarioLicencia_edit','rows'=>1],'',['class' => 'form-control']);?>
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
                                        <button type="button" id="btnLicenciaAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                        data-target="#LicenciaAnteriorModal">Añadir Licencia Anterior</button>
                                          <table id="LicenciaAnteriorTbl_edit" class="ultimate table table-responsive">
                                                <thead>
                                                        <tr>
                                                            <th>Nº</th>
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
                                        <button type="button" id = "btnLicenciaActual" class="btn btn-primary pull-right" data-toggle="modal"
                                        data-target="#LicenciaActualModal">Añadir Licencia Actual</button>
                                          <table id="LicenciaActualTbl_edit" class="ultimate table table-responsive">
                                                <thead>
                                                        <tr>
                                                            <th>Nº</th>
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
                <?php echo form_label('Propietario', 'propietario',['id' => 'lblpropietarioslicenciaactual']);?>
                <?php echo form_dropdown(['id'=> 'propietarioslicenciaactual','name'=> 'propietarioslicenciaactual', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                <?php echo form_label('Propietario', 'propietario',['id' => 'lblpropietarioslicenciaanterior']);?>
                <?php echo form_dropdown(['id'=> 'propietarioslicenciaanterior','name'=> 'propietarioslicenciaanterior', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                                    <a href="#addfusionstep1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registrar Fusion</i></a>
                                </li>
                                <li role="presentation" >
                                    <a href="#addfusionstep2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Fusion Anterior y Actual</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="main_form">
                        <!-- Step 1 -->
                        <div class="tab-pane active" role="tabpanel" id="addfusionstep1">
                          <div class="col-md-3">
                            <?php echo form_label('Cliente', 'clienteFusion');?>
                            <?php echo form_dropdown(['name'=>'clienteFusion','id'=>'clienteFusion'], $clientes, '',['class' => 'form-control']);?>
                          </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaFusion',['id'=>'lbloficinaFusion']);?>
                                <?php echo form_dropdown(['name'=>'oficinaFusion','id'=>'oficinaFusion'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staffFusion');?>  
                                <?php echo form_dropdown(['name'=>'staffFusion','id'=>'staffFusion'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoFusion',['id'=>'lblestadoFusion']);?>
                                <?php echo form_dropdown(['name'=>'estadoFusion','id'=>'estadoFusion'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudFusion',['id'=>'lblnro_solicitudFusion']);?>
                                <?php echo form_input(['name'=>'nro_solicitudFusion','id'=>'nro_solicitudFusion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudFusion',['id'=>'lblfecha_solicitudFusion']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudFusion',
                                            'name' => 'fecha_solicitudFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionFusion',['id'=>'lblnro_resolucionFusion']);?>
                                <?php echo form_input(['name'=>'nro_resolucionFusion','id'=>'nro_resolucionFusion','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionFusion',['id'=>'lblfecha_resolucionFusion']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionFusion',
                                            'name' => 'fecha_resolucionFusion',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteFusion',['id'=>'lblreferenciaclienteFusion']);?>
                                <?php echo form_input(['name'=>'referenciaclienteFusion','id'=>'referenciaclienteFusion'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioFusion',['id'=>'lblcomentarioFusion']);?>
                                <?php echo form_textarea(['name'=>'comentarioFusion','id'=>'comentarioFusion','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="addbtnFusionAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                                    data-target="#FusionAnteriorModal">Añadir Fusion Anterior</button>
                                                      <table id="FusionAnteriorTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "addbtnFusionActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                                    data-target="#FusionActualModal">Añadir Fusion Actual</button>
                                                      <table id="FusionActualTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
        <button id="addfusionfrmsubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>

<!-- Editar Fusion -->
<div class="modal fade" id="EditFusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'fusionEditfrm']);?>
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
                        <div class="col-md-3">
                          <?php echo form_label('Cliente', 'clienteFusion_edit');?>
                          <?php echo form_dropdown(['name'=>'clienteFusion_edit','id'=>'clienteFusion_edit'], $clientes, '',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label('Oficina', 'oficinaFusion_edit',['id' => 'lbloficinaFusion_edit']);?>
                            <?php echo form_dropdown(['name'=>'oficinaFusion_edit','id'=>'oficinaFusion_edit'], $oficinas, '',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                          <?php echo form_label('Staff', 'staffFusion_edit');?>  
                          <?php echo form_dropdown(['name'=>'staffFusion_edit','id'=>'staffFusion_edit'], $responsable, '',['class' => 'form-control']);?>
                      </div>
                        <div class="col-md-3">
                            <?php echo form_label('Estado', 'estadoFusion_edit',['id' => 'lblestadoFusion_edit']);?>
                            <?php echo form_dropdown(['name'=>'estadoFusion_edit','id'=>'estadoFusion_edit'], $estados_solicitudes, '',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3" style="margin-top:10px">
                            <?php echo form_label('Nº de Solicitud	', 'nro_solicitudFusion_edit',['id' => 'lblnro_solicitudFusion_edit']);?>
                            <?php echo form_input(['name'=>'nro_solicitudFusion_edit','id'=>'nro_solicitudFusion_edit','class' => 'form-control'])?>
              
                        </div>
                        <div class="col-md-3" style="margin-top:10px">
                            <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudFusion_edit',['id' => 'lblfecha_solicitudFusion_edit']);?>
                            <?php echo form_input([
                                            'id' => 'fecha_solicitudFusion_edit',
                                            'name' => 'fecha_solicitudFusion_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                        </div>   
                        <div class="col-md-3" style="margin-top:10px">
                            <?php echo form_label('Nº de Resolucion	', 'nro_resolucionFusion_edit',['id' => 'lblnro_resolucionFusion_edit']);?>
                            <?php echo form_input(['name'=>'nro_resolucionFusion_edit','id'=>'nro_resolucionFusion_edit','class' => 'form-control'])?>
                        </div>
                        <div class="col-md-3" style="margin-top:10px">
                            <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionFusion_edit',['id' => 'lblfecha_resolucionFusion_edit']);?>
                            <?php echo form_input([
                                            'id' => 'fecha_resolucionFusion_edit',
                                            'name' => 'fecha_resolucionFusion_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                        </div> 
                        <div class="col-md-12" style="margin-top:10px">
                            <?php echo form_label('Referencia Cliente', 'referenciaclienteFusion_edit',['id' => 'lblreferenciaclienteFusion_edit']);?>
                            <?php echo form_input(['name'=>'referenciaclienteFusion_edit','id'=>'referenciaclienteFusion_edit'],'',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-12" style="margin-top:10px">
                            <?php echo form_label('Comentario', 'comentarioFusion_edit',['id' => 'lblcomentarioFusion_edit']);?>
                            <?php echo form_textarea(['name'=>'comentarioFusion_edit','id'=>'comentarioFusion_edit','rows'=>1],'',['class' => 'form-control']);?>
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
                                                <button type="button" id="btnFusionAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                data-target="#FusionAnteriorModal">Añadir Fusion Anterior</button>
                                                <table id="FusionAnteriorTbl_edit" class="ultimate table table-responsive">
                                                    <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                <button type="button" id = "btnFusionActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                data-target="#FusionActualModal">Añadir Fusion Actual</button>
                                                <table id="FusionActualTbl_edit" class="ultimate table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Nº</th>
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
        <button id="editfusionfrmsubmit" type="button" class="btn btn-primary">Editar</button>
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
                <?php echo form_label('Propietario', 'propietario',['id' => 'lblpropietariosfusionactual']);?>
                <?php echo form_dropdown(['id'=> 'propietariosfusionactual','name'=> 'propietariosfusionactual', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                <?php echo form_label('Propietario', 'propietario',['id' => 'lblpropietariosfusionanterior']);?>
                <?php echo form_dropdown(['id'=> 'propietariosfusionanterior','name'=> 'propietariosfusionanterior', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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

<!-- Añadir Cambio de Nombre -->
<div class="modal fade" id="AddCambioNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camnomFrm']);?>
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
                            <div class="col-md-3">
                                <?php echo form_label('Cliente', 'clienteCamNom');?>
                                <?php echo form_dropdown(['name'=>'clienteCamNom','id'=>'clienteCamNom'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCamNom',['id'=>'lbloficinaCamNom']);?>
                                <?php echo form_dropdown(['name'=>'oficinaCamNom','id'=>'oficinaCamNom'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staffCamNom');?>  
                                <?php echo form_dropdown(['name'=>'staffCamNom','id'=>'staffCamNom'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCamNom',['id'=>'lblestadoCamNom']);?>
                                <?php echo form_dropdown(['name'=>'estadoCamNom','id'=>'estadoCamNom'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamNom',['id'=>'lblnro_solicitudCamNom']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCamNom','id'=>'nro_solicitudCamNom','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamNom',['id'=>'lblfecha_solicitudCamNom']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCamNom',
                                            'name' => 'fecha_solicitudCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamNom',['id'=>'lblnro_resolucionCamNom']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCamNom','id'=>'nro_resolucionCamNom','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamNom',['id'=>'lblfecha_resolucionCamNom']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCamNom',
                                            'name' => 'fecha_resolucionCamNom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamNom',['id'=>'lblreferenciaclienteCamNom']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCamNom','id'=>'referenciaclienteCamNom'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCamNom',['id'=>'lblcomentarioCamNom']);?>
                                <?php echo form_textarea(['name'=>'comentarioCamNom','id'=>'comentarioCamNom','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="addbtnCambioNombreAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamNomAnteriorModal">Añadir Cambio Nombre Anterior</button>
                                                    <table id="CamNomAnteriorTbl_add" class="ultimate table table-responsive">
                                                    <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "addbtnCambioNombreActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamNomActualModal">Añadir Cambio Nombre Actual</button>
                                                    <table id="CamNomActualTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                <button id="AddCambioNombrefrmsubmit" type="button" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div>

<!-- Editar Cambio de Nombre -->
<div class="modal fade" id="EditCambioNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camnomEditFrm']);?>
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
                            <div class="col-md-3">
                                <?php echo form_label('Cliente', 'clienteCamNom_edit');?>
                                <?php echo form_dropdown(['name'=>'clienteCamNom_edit','id'=>'clienteCamNom_edit'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCamNom_edit',['id'=>'lbloficinaCamNom_edit']);?>
                                <?php echo form_dropdown(['name'=>'oficinaCamNom_edit','id'=>'oficinaCamNom_edit'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staffCamNom_edit');?>  
                                <?php echo form_dropdown(['name'=>'staffCamNom_edit','id'=>'staffCamNom_edit'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCamNom_edit',['id'=>'lblestadoCamNom_edit']);?>
                                <?php echo form_dropdown(['name'=>'estadoCamNom_edit','id'=>'estadoCamNom_edit'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamNom_edit',['id'=>'lblnro_solicitudCamNom_edit']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCamNom_edit','id'=>'nro_solicitudCamNom_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamNom_edit',['id'=>'lblfecha_solicitudCamNom_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCamNom_edit',
                                            'name' => 'fecha_solicitudCamNom_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamNom_edit',['id'=>'lblnro_resolucionCamNom_edit']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCamNom_edit','id'=>'nro_resolucionCamNom_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamNom_edit',['id'=>'lblfecha_resolucionCamNom_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCamNom_edit',
                                            'name' => 'fecha_resolucionCamNom_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamNom_edit',['id'=>'lblreferenciaclienteCamNom_edit']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCamNom_edit','id'=>'referenciaclienteCamNom_edit'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCamNom_edit',['id'=>'lblcomentarioCamNom_edit']);?>
                                <?php echo form_textarea(['name'=>'comentarioCamNom_edit','id'=>'comentarioCamNom_edit','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="btnCambioNombreAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamNomAnteriorModal">Añadir Cambio Nombre Anterior</button>
                                                    <table id="CamNomAnteriorTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "btnCambioNombreActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamNomActualModal">Añadir Cambio Nombre Actual</button>
                                                    <table id="CamNomActualTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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

<!-- Añadir Cambio Nombre Actual Modal -->
<div class="modal fade" id="CamNomActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo form_label('Propietario', 'propietarioscamnomactual',['id' => 'lblpropietarioscamnomactual']);?>
                <?php echo form_dropdown(['id'=> 'propietarioscamnomactual','name'=> 'propietarioscamnomactual', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
<div class="modal fade" id="CamNomAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo form_label('Propietario', 'propietarioscamnomanterior',['id' => 'lblpropietarioscamnomanterior']);?>
                <?php echo form_dropdown(['id'=> 'propietarioscamnomanterior','name'=> 'propietarioscamnomanterior', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                            <div class="col-md-3">
                                <?php echo form_label('Cliente', 'clienteCamNom');?>
                                <?php echo form_dropdown(['name'=>'clienteCamNom','id'=>'clienteCamNom'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCamDom',['id'=>'lbloficinaCamDom']);?>
                                <?php echo form_dropdown(['name'=>'oficinaCamDom','id'=>'oficinaCamDom'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staff');?>  
                                <?php echo form_dropdown(['name'=>'staffCamDom','id'=>'staffCamDom'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCamDom',['id'=>'lblestadoCamDom']);?>
                                <?php echo form_dropdown(['name'=>'estadoCamDom','id'=>'estadoCamDom'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamDom',['id'=>'lblnro_solicitudCamDom']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCamDom','id'=>'nro_solicitudCamDom','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamDom',['id'=>'lblfecha_solicitudCamDom']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCamDom',
                                            'name' => 'fecha_solicitudCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamDom',['id'=>'lblnro_resolucionCamDom']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCamDom','id'=>'nro_resolucionCamDom','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamDom',['id'=>'lblfecha_resolucionCamDom']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCamDom',
                                            'name' => 'fecha_resolucionCamDom',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_resolucionCamDom'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamDom',['id'=>'lblreferenciaclienteCamDom']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCamDom','id'=>'referenciaclienteCamDom'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCamDom',['id'=>'lblcomentarioCamDom']);?>
                                <?php echo form_textarea(['name'=>'comentarioCamDom','id'=>'comentarioCamDom','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="addbtnCambioDomicilioAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamDomAnteriorModal">Añadir Cambio Domicilio Anterior</button>
                                                    <table id="CamDomAnteriorTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "addbtnCambioDomicilioActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamDomActualModal">Añadir Cambio Domicilio Actual</button>
                                                    <table id="CamDomActualTbl_add" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                <button id="AddCambioDomiciliofrmsubmit" type="button" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div>

<!-- Editar Cambio de Domicilio -->
<div class="modal fade" id="EditCambioDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open("", ['method' => 'POST', 'id' => 'camdomEditFrm']);?>
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
                            <div class="col-md-3">
                                <?php echo form_label('Cliente', 'clienteCamDom_edit');?>
                                <?php echo form_dropdown(['name'=>'clienteCamDom_edit','id'=>'clienteCamDom_edit'], $clientes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Oficina', 'oficinaCamDom_edit',['id'=>'lbloficinaCamDom_edit']);?>
                                <?php echo form_dropdown(['name'=>'oficinaCamDom_edit','id'=>'oficinaCamDom_edit'], $oficinas, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Staff', 'staffCamDom_edit');?>  
                                <?php echo form_dropdown(['name'=>'staffCamDom_edit','id'=>'staffCamDom_edit'], $responsable, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Estado', 'estadoCamDom_edit',['id'=>'lblestadoCamDom_edit']);?>
                                <?php echo form_dropdown(['name'=>'estadoCamDom_edit','id'=>'estadoCamDom_edit'], $estados_solicitudes, '',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Solicitud	', 'nro_solicitudCamDom_edit',['id'=>'lblnro_solicitudCamDom_edit']);?>
                                <?php echo form_input(['name'=>'nro_solicitudCamDom_edit','id'=>'nro_solicitudCamDom_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Solicitud	', 'fecha_solicitudCamDom_edit',['id'=>'lblfecha_solicitudCamDom_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_solicitudCamDom_edit',
                                            'name' => 'fecha_solicitudCamDom_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div>   
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Nº de Resolucion	', 'nro_resolucionCamDom_edit',['id'=>'lblnro_resolucionCamDom_edit']);?>
                                <?php echo form_input(['name'=>'nro_resolucionCamDom_edit','id'=>'nro_resolucionCamDom_edit','class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3" style="margin-top:10px">
                                <?php echo form_label('Fecha de Resolucion', 'fecha_resolucionCamDom_edit',['id'=>'lblfecha_resolucionCamDom_edit']);?>
                                <?php echo form_input([
                                            'id' => 'fecha_resolucionCamDom_edit',
                                            'name' => 'fecha_resolucionCamDom_edit',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                            </div> 
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Referencia Cliente', 'referenciaclienteCamDom_edit',['id'=>'lblreferenciaclienteCamDom_edit']);?>
                                <?php echo form_input(['name'=>'referenciaclienteCamDom_edit','id'=>'referenciaclienteCamDom_edit'],'',['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-12" style="margin-top:10px">
                                <?php echo form_label('Comentario', 'comentarioCamDom_edit',['id'=>'lblcomentarioCamDom_edit']);?>
                                <?php echo form_textarea(['name'=>'comentarioCamDom_edit','id'=>'comentarioCamDom_edit','rows'=>1],'',['class' => 'form-control']);?>
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
                                                    <button type="button" id="btnCambioDomicilioAnterior" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamDomAnteriorModal">Añadir Cambio Domicilio Anterior</button>
                                                    <table id="CamDomAnteriorTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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
                                                    <button type="button" id = "btnCambioDomicilioActual" class="btn btn-primary pull-right" data-toggle="modal"
                                                    data-target="#CamDomActualModal">Añadir Cambio Domicilio Actual</button>
                                                    <table id="CamDomActualTbl_edit" class="ultimate table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº</th>
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

<!-- Añadir Cambio Domicilio Actual Modal -->
<div class="modal fade" id="CamDomActualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo form_label('Propietario', 'propietarioscamdomactual',['id' => 'lblpropietarioscamdomactual']);?>
                <?php echo form_dropdown(['id'=> 'propietarioscamdomactual','name'=> 'propietarioscamdomactual', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
<div class="modal fade" id="CamDomAnteriorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <?php echo form_label('Propietario', 'propietarioscamdomanterior',['id' => 'lblpropietarioscamdomanterior']);?>
                <?php echo form_dropdown(['id'=> 'propietarioscamdomanterior','name'=> 'propietarioscamdomanterior', 'multiple' => 'multiple'], $solicitantes, '',['class' => 'form-control']);?>
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
                <?php echo form_label('Descripcion', 'doc_descripcion', ['id' => 'lbldoc_descripcion']);?>
                <?php echo form_input(['name'=>'doc_descripcion','id'=>'doc_descripcion'],'', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'doc_comentario', ['id' => 'lbldoc_comentario']);?>
                <?php echo form_textarea(['name'=>'doc_comentario', 'id'=>'doc_comentario'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'doc_archivo', ['id' => 'lbldoc_archivo']);?>
                <?php echo form_input([
                    'id' => 'doc_archivo',
                    'name' => 'doc_archivo',
                    'type' => 'file',
                    'class' => 'form-control',
                    //'multiple' => 'multiple',
                    'accept' => 'application/pdf',
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
                <?php echo form_label('Descripcion', 'doc_descripcion_edit', ['id' => 'lbldoc_descripcion_edit']);?>
                <?php echo form_input(['name'=>'doc_descripcion_edit','id'=>'doc_descripcion_edit'],'', ['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Comentarios', 'doc_comentario_edit', ['id' => 'lbldoc_comentario_edit']);?>
                <?php echo form_textarea(['name'=>'doc_comentario_edit', 'id'=>'doc_comentario_edit'],'',['class' => 'form-control']);?>
            </div>
            <div class="col-md-12">
                <?php echo form_label('Archivo', 'doc_archivo_edit', ['id' => 'lbldoc_archivo_edit']);?>
                <?php echo form_input([
                    'id' => 'doc_archivo_edit',
                    'name' => 'doc_archivo_edit',
                    'type' => 'file',
                    'class' => 'form-control',
                    //'multiple' => 'multiple',
                    'accept' => 'application/pdf',
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

<!-- Factura Modal -->
<div class="modal fade" id="facturaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('', ['method' => 'POST', 'id' => 'facturaExistenteFrm']);?>
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Añadir factura existente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <?php echo form_label('Factura', 'facturaId', ['id' => 'lblfacturaId']); ?>
            <?php
            $invoices = $select + $invoices;
            echo form_dropdown('facturaId', $invoices, '', ['class' => 'form-control', 'id' => 'facturaId']); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="facturaMarcaSubmit" type="button" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>




<!-- Anexo Modal -->
<!-- <div class="modal fade" id="anexoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->
