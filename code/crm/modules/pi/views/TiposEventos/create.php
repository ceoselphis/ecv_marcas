<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/TiposEventoscontroller/store'), 'form'); ?>
                        <div class="col-md-4">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_input($fields[1]);?>
                            <br />
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <select name="materia_id" id="materia_id" class="form-control"><?php echo $labels[2];?>
                                <?php foreach($materias as $row){?>
                                    <option value="<?php echo $row['materia_id'];?>"><?php echo $row['descripcion'];?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_hidden("created_at", date('Y-m-d h:i:s'),false);?>
                            <?php echo form_hidden("modified_at", date('Y-m-d h:i:s'),false);?>
                            <?php echo form_hidden('created_by', $_SESSION['staff_user_id'], FALSE)?>
                        </div>
                        <div class="col-md-2">
                            <br />
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

