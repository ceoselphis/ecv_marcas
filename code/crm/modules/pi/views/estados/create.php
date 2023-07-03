<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/estadoscontroller/store'), 'form'); ?>
                        <div class="col-md-1">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input($fields[6],set_value($fields[6]['name']),['form-input']);?>
                            <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown($fields[1], $materias, set_value($fields[1]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2], set_value($fields[2]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <?php echo form_hidden('created_at',date('Y-m-d'),FALSE);?>
                        <?php echo form_hidden('last_modified',date('Y-m-d'),FALSE);?>
                        <?php echo form_hidden('created_by',$_SESSION['staff_user_id'],false);?>
                        <div class="col-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/estadoscontroller/');?>" class="btn btn-success">Volver atras</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>