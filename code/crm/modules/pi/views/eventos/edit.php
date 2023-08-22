<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php $CI = &get_instance();?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open(admin_url('pi/EventosController/update/'.$id), 'form'); ?>
                        <div class="col-md-4">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown('tipo_eve_id', $tipoEvento, $values[0]['tipo_eve_id'], ['class' => 'form-control'] );?>
                        </div>
                        <div class="col-md-3">
                            <br />
                            <?php echo form_hidden('created_at',date('Y-m-d h:i:s'), false);?>
                            <?php echo form_hidden('staff_id',$_SESSION['staff_user_id'],false);?>
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atras</a>
                        </div>
                        <div class="col-md-3">
                            <pre>
                                <?php var_dump($values);?>
                            </pre>
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