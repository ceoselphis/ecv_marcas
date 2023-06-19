<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/inventorescontroller/store'), 'form'); ?>
                        <div class="col-md-6">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown("pais_id",$pais, [0], ['class' => "form-control"]);?>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2],'',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input($fields[3],'',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_label($labels[4])?>
                            <br />
                            <?php echo form_textarea($fields[4], '', ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-12">
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