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
                        <div class="col-md-12">
                            <?php echo form_label('Tipo Evento', 'tipo_evento');?>
                            <?php echo form_dropdown(['name'=>'tipo_evento_id','id'=>'tipo_evento_id', 'class' => 'form-control'], $tipo_evento,$values[0]['tipo_evento_id'] );?>
                        </div>
                        <div class="col-md-12" style="margin-top : 15px">
                            <?php echo form_label('Comentario', 'evento_comentario');?>
                            <?php echo form_textarea(['name'=>'comentarios','id'=>'comentarios' , 'value' => $values[0]['comentarios']],'',['class' => 'form-control']);?>
                        </div>
                        <div class="col-md-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atras</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

let tipotareas = '<?php echo admin_url("pi/TareasController/BuscarTipoTareas/");?>'
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