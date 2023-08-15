<?php init_head();?>


<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                    <div class="modal-body"> 
                        <?php echo form_open(admin_url('pi/CorrespondeciaPlantillaController/store')); ?>
                        <div class="col-md-4">
                            <?php echo form_label($labels[1],$labels[1]);?>
                            <br />
                            <?php echo form_input($fields[1],set_value($fields[1]['name']));?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2],$labels[2]);?>
                            <br />
                            <?php echo form_dropdown(['name'=>'staff_id','class' => 'form-control', 'id' => 'staff_id'], $staffid  );?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4" >
                            <?php echo form_label('Materia','materia' );?>
                            <!-- <?php //echo form_label($labels[1],$labels[1]);?> -->
                            <br />
                            <?php echo form_dropdown(['name'=>'materia_id','class' => 'form-control', 'id' => 'materia_id'], $materia  );?>
                            <!-- <?php //echo form_input($fields[1],set_value($fields[1]['name']));?>
                            <?php echo form_error('materia', '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-4" style="padding-top: 15px;">
                            <?php echo form_label($labels[3],$labels[3]);?>
                            <br/>
                            <?php echo form_input($fields[3],set_value($fields[3]['name']));?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        
                       
                        
                        
                        
                        <br><br><br><br><br><br><br>
                        <div class="col-md-4">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/CorrespondeciaPlantillaController/');?>" class="btn btn-success">Volver atrás</a>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>

</body>
</html>