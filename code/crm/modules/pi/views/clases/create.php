<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/clasescontroller/store'), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1], $labels[1]);?>
                            <br />
                            <?php echo form_input($fields[1], set_value($fields[1]['name']));?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[3], $labels[3]);?>
                            <br />
                            <?php echo form_input($fields[3], set_value($fields[3]['name']), ['form-control']);?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[4], $labels[4]);?>
                            <br />
                            <?php echo form_checkbox($fields[4]['name'], set_value($fields[4]['name']),TRUE,['form-control']);?>
                            <?php echo form_error($fields[4]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <br />
                        <div class="col-md-12">
                        <?php echo form_label($labels[2], $labels[2]);?>
                            <br />
                            <?php echo form_textarea($fields[2], set_value($fields[2]['name']), []);?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">     
                        <div class="col-md-12" style="padding-top: 1%;">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/clasescontroller/');?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>