<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/inventorescontroller/update/'.$id), 'form'); ?>
                        <div class="col-md-6">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown("pais_id",$pais, $values[0]['pais_id'], ['class' => "form-control"]);?>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input('nombre',$values[0]['nombre'],['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input('apellid',$values[0]['apellid'],['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_label($labels[4])?>
                            <br />
                            <?php echo form_textarea('direccion', $values[0]['direccion'], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_label($labels[4])?>
                            <br />
                            <?php echo form_textarea('domicilio', $values[0]['domicilio'], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input('nacionalidad',$values[0]['nacionalidad'],['class' => 'form-control']);?>
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