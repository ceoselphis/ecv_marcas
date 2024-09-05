<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <pre>
                    <?php var_dump($values);?>
                </pre>
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/EstadosController/update/'.$id), 'form'); ?>
                        <div class="col-md-1">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php 
                            if(empty(set_value('codigo',$values[0]['codigo'])))
                            {
                                echo form_input(
                                    [
                                        'name' => 'codigo',
                                        'class'=> 'form-control',
                                        'id'   => 'codigo',
                                        'value'=> $values[0]['codigo']
                                    ]);
                            }
                            else
                            {
                                echo form_input(
                                    [
                                        'name' => 'codigo',
                                        'class'=> 'form-control',
                                        'id'   => 'codigo',
                                        'value'=> set_value($values[0]['codigo'])
                                    ]);
                            }
                            echo form_error('codigo', '<div class="text-danger">', '</div>');
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php 
                            if(empty(set_value('nombre',$values[0]['nombre'])))
                            {
                                echo form_input('nombre', $values[0]['nombre'], ['class' => 'form-control']);
                            }
                            else
                            {
                                echo form_input('nombre', set_value('nombre', $values[0]['nombre']), ['class' => 'form-control']);
                            }
                            ?>
                            <?php echo form_error('nombre', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="col-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/EstadosController/');?>" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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