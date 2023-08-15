<?php init_head();?>


<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                    <div class="modal-body"> 
                        <?php echo form_open(admin_url('pi/CorrespondeciaUsuarioController/store')); ?>
                        <div class="col-md-4">
                            <?php echo form_label('Clientes','cliente' );?>
                            <!-- <?php //echo form_label($labels[1],$labels[1]);?> -->
                            <br />
                            <?php echo form_dropdown(['name'=>'cliente','class' => 'form-control', 'id' => 'cliente'], $clientes  );?>
                            <!-- <?php //echo form_input($fields[1],set_value($fields[1]['name']));?>
                            <?php echo form_error('cliente', '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2],$labels[2]);?>
                            <br />
                            <?php echo form_input($fields[2],set_value($fields[2]['name']));?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        
                        <div class="col-md-4">
                            <?php echo form_label($labels[3],$labels[3]);?>
                            <br />
                            <?php echo form_dropdown(['name'=>'staff_id','class' => 'form-control', 'id' => 'staff_id'], $staffid  );?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-4" style="padding-top: 15px;">
                            <?php echo form_label($labels[4],$labels[4]);?>
                            <br/>
                            <?php echo form_input($fields[6],set_value($fields[6]['name']));?>
                            <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <br><br><br><br><br><br><br>
                        <div class="col-md-4">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/CorrespondeciaUsuarioController/');?>" class="btn btn-success">Volver atrás</a>
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