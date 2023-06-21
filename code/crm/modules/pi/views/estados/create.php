<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/estadoscontroller/store'), 'form'); ?>
                        <div class="col-3">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input($fields[6]);?>
                        </div>
                        <div class="col-3">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown($fields[1], $materias, [0], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2]);?>
                        </div>
                        <?php echo form_hidden('created_at',date('Y-m-d'),FALSE);?>
                        <?php echo form_hidden('last_modified',date('Y-m-d'),FALSE);?>
                        <?php echo form_hidden('created_by',$_SESSION['staff_user_id'],false);?>
                        <div class="col-3">
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