<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/MarcasSolicitudesDocumentoController/update/'.$id), 'form'); ?>
                            <?php foreach($values as $key => $value){?>
                                <div class="col-md-6">
                                    <?php echo form_label($labels[1],$labels[1]);?>
                                    <br />
                                    <?php echo form_dropdown(['name'=>'marcas_id','class' => 'form-control', 'id' => 'staff_id'], $marcas ,$values[0]['marcas_id'] );?>
                                    <?php echo form_error('marcas_id', '<div class="text-danger">', '</div>');?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label($labels[2],$labels[2]);?>
                                     <br />
                                     <?php echo form_input(array(
                                        'name' => 'descripcion',
                                        'id'   => 'descripcion',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['descripcion'])
                                );?>
                                    <?php echo form_error('descripcion', '<div class="text-danger">', '</div>');?>
                                </div>

                                <div class="col-md-12" style="padding-top: 15px;">
                                    <?php echo form_label($labels[3],$labels[3]);?>
                                    <br/>
                                    <?php echo form_textarea(array(
                                        'name' => 'comentario',
                                        'id'   => 'comentario',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['comentario'])
                                );?>
                                    <?php echo form_error('content', '<div class="text-danger">', '</div>');?>
                                </div>

                                <div class="col-md-12" style="padding-top: 15px;">
                                    <?php echo form_label('Archivo', 'doc_archivo');?>
                                    <?php echo form_input([
                                    'id' => 'path',
                                    'name' => 'path',
                                    'type' => 'file',
                                    'class' => 'form-control',
                                    'multiple' => 'multiple',
                                    ]);?>
                                </div>
                       
                            <?php } ?>
                        
                        <br><br><br><br><br><br><br>
                        <div class="col-md-4">
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
</div>


<?php init_tail();?>
