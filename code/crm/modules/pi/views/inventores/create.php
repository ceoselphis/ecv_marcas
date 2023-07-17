<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body" style="padding-bottom: 0%;">
                        <?php echo form_open(admin_url('pi/InventoresController/store'), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown("pais_id",$pais, [0], ['class' => "form-control"]);?>
                            <br />
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[6]);?>
                            <br />
                            <?php echo form_input($fields[6],set_value($fields[6]['name']),['class' => 'form-control']);?>
                            <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2],set_value($fields[2]['name']),['class' => 'form-control']);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input($fields[3],set_value($fields[3]['name']),['class' => 'form-control']);?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding-top: 0%;">
                        <div class="col-md-6">
                            <?php echo form_label($labels[4])?>
                            <br />
                            <?php echo form_textarea($fields[4], set_value($fields[4]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[4]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_label($labels[5])?>
                            <br />
                            <?php echo form_textarea($fields[5], set_value($fields[5]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[5]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3" style="padding-top: 19%;">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/InventoresController');?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>