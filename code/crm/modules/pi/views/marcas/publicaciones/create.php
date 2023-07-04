<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/publicacionesmarcascontroller/store'), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[3],$fields[3]['name']);?>
                            <?php echo form_dropdown($fields[4]['name'],$tipoPub, set_value($fields[4]['name'], [0]),['class' => 'form-control']);?>
                            <?php echo form_error($fields[4]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1],$labels[1]);?>
                            <?php echo form_dropdown($fields[5]['name'],$solicitud,set_value($fields[5]['name'],[0 => 'Sin solicitudes cargadas']),['class' => 'form-control']) ?>
                            <?php echo form_error($fields[5]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[2],$fields[1]['name'], ['class' => 'form-label']);?>
                            <?php echo form_dropdown($fields[1]['name'],$boletines,set_value($fields[1]['name'], 1),['class' => 'form-control']);?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_label($labels[4], $fields[4]['name']);?>
                            <?php echo form_input($fields[2]['name'],set_value($fields[2]['name'],'0'),['class' => 'form-control']);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-1">
                            <?php echo form_label($labels[5], $fields[5]['name']);?>
                            <?php echo form_input($fields[3]['name'],set_value($fields[3]['name'],'0'),['class' => 'form-control']);?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4" style="padding-top: 1.5%">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/publicacionesmarcascontroller/');?>" class="btn btn-success">Volver atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>