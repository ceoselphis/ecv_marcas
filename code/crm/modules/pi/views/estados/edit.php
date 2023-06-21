<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                    <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/estadoscontroller/update/'.$id), 'form'); ?>
                        <div class="col-3">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_input('codigo',$values[0]['codigo'],['class' => 'form-control']);?>
                        </div>
                        <div class="col-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_dropdown('materia_id',$materia, $values[0]['materia_id'], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-4">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input('descripcion', $values[0]['descripcion'], ['class' => 'form-control']);?>
                        </div>
                        <?php echo form_hidden('created_at', $values[0]['created_at']);?>
                        <?php echo form_hidden('last_modified', date('Y-m-d'));?>
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