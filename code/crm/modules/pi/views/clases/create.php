<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/clasescontroller/store'), 'form'); ?>
                        <div class="col-md-6">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_input($fields[1]);?>
                            <br />
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_textarea($fields[2]);?>
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>