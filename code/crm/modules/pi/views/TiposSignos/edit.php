<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/tipossignoscontroller/update/'.$id), 'form'); ?>
                        <div class="col-4">
                            <?php echo form_label($labels[1],$labels[1]);?>
                            <br />
                            <?php echo form_input('nombre',set_value('nombre',$values[0]['nombre']), ['class' => 'form-control']);?>
                            <?php echo form_error('nombre', '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/tipossignoscontroller/');?>" class="btn btn-success">Volver atrás</a>
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