<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/TareasAdminController/update/'.$id), 'form'); ?>
                        <div class="col-md-9">
                            <?php foreach($values as $key => $value){?>
                                <?php echo form_label('Nombre de Tarea');?>
                                <br />
                                <?php echo form_input(
                                    array(
                                        'name' => 'nombre',
                                        'id'   => 'nombre',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $value['nombre'])
                                );?>
                                <?php echo form_error('nombre', '<div class="text-danger">', '</div>');?>
                            <?php } ?>
                        </div>
                        <div class="col-md-3 pull-right">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/SettingsController/menu?group=tareas');?>" class="btn btn-success">Volver atrás</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>