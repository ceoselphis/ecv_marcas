<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url("pi/PublicacionesMarcasController/update/{$id}"), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[3],$labels[3]);?>
                            <?php echo form_dropdown(['name'=>'tipo_pub_id','class' => 'form-control', 'id' => 'tipo_pub_id'], $tipoPub , $values[0]['tipo_pub_id'] );?>
                            <!-- <?php // echo form_dropdown($fields[4]['name'],$tipoPub, set_value($fields[4]['name'], $values[$fields[4]['name']]),['class' => 'form-control']);?>
                            <?php //echo form_error('tipo_publicacion', '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1],$labels[1]);?>
                            <?php echo form_dropdown(['name'=>'marcas_id','class' => 'form-control', 'id' => 'marcas_id'], $solicitud , $values[0]['marcas_id'] );?>
                            <!-- <?php //echo form_dropdown($fields[5]['name'],$solicitud,set_value($fields[5]['name'],$values[$fields[5]['name']]),['class' => 'form-control']) ?>
                            <?php //echo form_error('solicitud', '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[2],$labels[2], ['class' => 'form-label']);?>
                            <?php echo form_dropdown(['name'=>'boletin_id','class' => 'form-control', 'id' => 'boletin_id'], $boletines , $values[0]['boletin_id'] );?>
                            <!-- <?php //echo form_dropdown($fields[1]['name'],$boletines,set_value($fields[1]['name'], $values[$fields[1]['name']]),['class' => 'form-control']);?>
                            <?php //echo form_error('boletines', '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-1">
                            <?php echo form_label($labels[4], $labels[4]);?>
                            <?php echo form_input( array(
                                        'name' => 'tomo',
                                        'id'   => 'tomo',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['tomo'])
                                );?>
                            <!-- <?php //echo form_input($fields[2]['name'],set_value($fields[2]['name'],$values[$fields[2]['name']]),['class' => 'form-control']);?>
                            <?php //echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-1">
                            <?php echo form_label($labels[5], $labels[5]);?>
                            <?php echo form_input( array(
                                        'name' => 'pagina',
                                        'id'   => 'pagina',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'value' => $values[0]['pagina'])
                                );?>
                            <!-- <?php //echo form_input($fields[3]['name'],set_value($fields[3]['name'],$values[$fields[3]['name']]),['class' => 'form-control']);?>
                            <?php //echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?> -->
                        </div>
                        <div class="col-md-4" style="padding-top: 1.5%">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/PublicacionesMarcasController/');?>" class="btn btn-success">Volver atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php init_tail();?>

<?php init_tail();?>


<script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        })
        $("select[multiple=multiple]").selectpicker({
            liveSearch:true,
            virtualScroll: 600
        });
</script>

</body>
</html>