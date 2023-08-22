<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/BusquedasController/store'), 'form'); ?>
                        <?php echo form_hidden('id', $id);?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Cliente', 'client_id');?>
                                <br />
                                <?php echo form_dropdown('client_id', $clients, set_value('client_id'), ['class' => 'form-control']);?>
                                <?php echo form_error('client_id', '<div class="text-danger">', '</div>');?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Oficina Tramitante', 'oficina_id' );?>
                                <br />
                                <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['class' => 'form-control']);?>
                                <?php echo form_error('oficina_id', '<div class="text-danger">', '</div>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_label('Responsable', 'staff_id');?>
                                <?php echo form_dropdown('staff_id', $staff, set_value('staff_id'), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Marca', 'marca');?>
                                <?php echo form_input('marca', set_value('marca', ''), ['class' => 'form-control', 'maxlength' => '255']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Clase', 'clase_niza_id');?>
                                <?php echo form_dropdown('clase_niza_id', $claseNiza, set_value('clase_niza_id'), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo form_label('Pais', 'pais_id');?>
                                <?php echo form_dropdown('pais_id', $paises, set_value('pais_id'), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Solicitud', 'fecha_solicitud');?>
                                <?php echo form_input('fecha_solicitud', set_value('fecha_solicitud'), ['class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Respuesta', 'fecha_respuesta');?>
                                <?php echo form_input('fecha_respuesta', set_value('fecha_respuesta'), ['class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Ref Cliente', 'ref_cliente');?>
                                <?php echo form_input('ref_cliente', set_value('ref_cliente'), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Interna', 'busqueda_interna_id');?>
                                <?php echo form_dropdown('busqueda_interna_id', $tipoBusqueda, set_value('busqueda_interna_id'), ['class' => 'form-control']);?>                                
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Externa', 'busqueda_externa_id');?>
                                <?php echo form_dropdown('busqueda_externa_id', $tipoBusqueda, set_value('busqueda_externa_id'), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_label('Comentarios', 'comentarios');?>
                                <?php echo form_textarea('comentarios', set_value('comentarios'), ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row pull-right" style="padding: 1%">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit" >Guardar</button>
                                <button class="btn btn-gray" type="reset" >Limpiar</button>
                                <a href="<?php echo admin_url('pi/BusquedasController/');?>" class="btn btn-success">Volver atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php init_tail();?>
<script>
    function fecha(){
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if(dd<10){
            dd = '0'+dd;
        }
        else if(mm<10){
            mm = '0'+mm;
        }
        fecha = dd+"/"+mm+"/"+yy;
        return fecha;
    }


    $(".calendar").on('keyup', function(e){
        e.preventDefault();
        $(".calendar").val('');
    })
    $( function() {
        $(".calendar").datetimepicker({
            maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker:false,
        });
    });
</script>
<script>
        $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600,
        });
</script>
</body>
</html>