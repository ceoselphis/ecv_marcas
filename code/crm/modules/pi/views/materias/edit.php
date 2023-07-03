<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/materiascontroller/update/'.$id), 'form'); ?>
                        <div class="col-md-6">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php 
                            $input = [
                                'name' => 'descripcion',
                                'id'   => 'descripcion',
                                'class'=> 'form-control',
                                'maxlength' => '60',
                            ];
                            if(empty(set_value('descripcion',  )))
                            {
                                $input['value'] = $values[0]['descripcion'];
                            }
                            else
                            {
                                $input['value'] = set_value('descripcion',$values[0]['descripcion']);
                            }
                            echo form_input($input);?>
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