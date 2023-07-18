<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url("pi/ClasesController/update/{$id}"), 'form'); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1], $labels[1]);?>
                            <br />
                            <?php echo form_input('nombre', set_value($fields[1],$values[1]) ,['class' => 'form-control']);?>
                            <?php echo form_error($fields[1], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[3], $labels[3]);?>
                            <br />
                            <?php echo form_input($fields[3], set_value($values[3] , $values[3]), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[3], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[4], $labels[4]);?>
                            <br />
                            <?php 
                            if(empty(set_value($values[4])))
                            {
                                echo form_checkbox([
                                    'name' => $fields[4],
                                    'id'   => $fields[4],
                                    'value'=> $values[4],
                                    'style'=> 'form-control' 
                                ]);
                            }
                            else
                            {
                                echo form_checkbox([
                                    'name' => $fields[4],
                                    'id'   => $fields[4],
                                    'value'=> set_value($values[4]),
                                    'style'=> 'form-control' 
                                ]);
                            }
                            ?>
                            <?php echo form_error($fields[4], '<div class="text-danger">', '</div>');?>
                        </div>
                        <br />
                        <div class="col-md-12">
                        <?php echo form_label($labels[2], $labels[2]);?>
                            <br />
                            <?php echo form_textarea($fields[2], empty($values) ? set_value($values[1]) : $values[2], ['class' => 'form-control']);?>
                            <?php echo form_error($fields[2], '<div class="text-danger">', '</div>');?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">     
                        <div style="padding-top: 1%;">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/ClasesController/');?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    th, td {
        text-align: center;
    }
    
</style>

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