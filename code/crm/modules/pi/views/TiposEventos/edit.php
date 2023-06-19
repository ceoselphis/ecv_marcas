<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <?php $CI = &get_instance();?>
                        <?php echo form_open(admin_url('pi/TiposEventoscontroller/update/'.$id), 'form'); ?>
                        <div class="col-md-3">
                            <?php echo form_label('Nombre de evento', 'nombre', ['form-label']);?>
                            <?php echo form_input('nombre', $values[0]['nombre'], ['class' => 'form-control']);?>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label('Materia', 'materia_id', ['form-label']);?>
                            <?php echo form_dropdown('materia_id', $CI->TiposEventos_model->getAllMaterias() , $CI->TiposEventos_model->getMateria($values[0]['materia_id']), ['class' => 'form-control']);?>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label('Fecha de Creacion', 'created_at', ['form-label']);?>
                            <?php echo form_input('created_at', $values[0]['created_at'], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <br />
                            <?php echo form_hidden('tipo_eve_id', $values[0]['tipo_eve_id'], false);?>
                            <?php echo form_hidden('created_by', $values[0]['created_by'], false);?>
                            <?php echo form_hidden('modified_at', date('Y-m-d h:i:s'), false);?>
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atras</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>