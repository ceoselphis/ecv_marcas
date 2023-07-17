<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/AnexosController/update/'.$id), 'form'); ?>
                        <div class="col-md-4">
                            <?php foreach($values as $key => $value){?>
                                <?php echo form_label('Nombre del Anexo');?>
                                <br />
                                <?php echo form_input(
                                    array(
                                        'name' => 'nombre_anexo',
                                        'id'   => 'nombre_anexo',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $value['nombre_anexo'])
                                );?>
                                <?php echo form_error('nombre_anexo', '<div class="text-danger">', '</div>');?>
                            <?php } ?>
                        </div>
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