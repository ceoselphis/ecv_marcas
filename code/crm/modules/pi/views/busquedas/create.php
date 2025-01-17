<?php 
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php'); 
?>

<div id="wrapper">
    <div class="content">
        <!-- Loading Modal -->
        <div class="modal" id="modal-loading" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="loading-spinner mb-2"></div>
                        <div>Cargando...</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Crear Solicitud de Busqueda de Marca</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open_multipart("", ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                        
                        
                        <?php echo form_hidden('id', $id);?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Cliente', 'client_id');?>
                                <br />
                                <?php echo form_dropdown('client_id', $clients, set_value('client_id'), ['id' => 'client_id' , 'class' => 'form-control']);?>
                                <?php echo form_error('client_id', '<div class="text-danger">', '</div>');?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Oficina Tramitante', 'oficina_id' );?>
                                <br />
                                <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['id' => 'oficina_id' , 'class' => 'form-control']);?>
                                <?php echo form_error('oficina_id', '<div class="text-danger">', '</div>');?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-4" >
                                <?php echo form_label('Responsable', 'staff_id');?>
                                <?php echo form_dropdown('staff_id', $staff, set_value('staff_id'), ['id' => 'staff_id' , 'class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Marca', 'marca');?>
                                <?php echo form_input('marca', set_value('marca', ''), ['id' => 'marca' ,'class' => 'form-control', 'maxlength' => '255']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Clase', 'clase_niza_id');?>
                                <?php echo form_dropdown('clase_niza_id', $claseNiza, set_value('clase_niza_id'), ['id' => 'clase_niza_id' , 'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-4">
                                <?php echo form_label('Pais', 'pais_id');?>
                                <?php echo form_dropdown('pais_id', $paises, set_value('pais_id'), ['id' => 'pais_id' , 'class' => 'form-control']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Solicitud', 'fecha_solicitud');?>
                                <?php echo form_input('fecha_solicitud', set_value('fecha_solicitud'), ['id' => 'fecha_solicitud' , 'class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-2">
                                <?php echo form_label('Respuesta', 'fecha_respuesta');?>
                                <?php echo form_input('fecha_respuesta', set_value('fecha_respuesta'), ['id' => 'fecha_respuesta' , 'class' => 'form-control calendar']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Ref Cliente', 'ref_cliente');?>
                                <?php echo form_input('ref_cliente', set_value('ref_cliente'), ['id' => 'ref_cliente' ,'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Interna', 'busqueda_interna_id');?>
                                <?php echo form_dropdown('busqueda_interna_id', $tipoBusqueda, set_value('busqueda_interna_id'), ['id' => 'busqueda_interna_id' , 'class' => 'form-control']);?>                                
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Búsqueda Externa', 'busqueda_externa_id');?>
                                <?php echo form_dropdown('busqueda_externa_id', $tipoBusqueda, set_value('busqueda_externa_id'), ['id' => 'busqueda_externa_id', 'class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-12">
                                <?php echo form_label('Comentarios', 'comentarios');?>
                                <?php echo form_textarea('comentarios', set_value('comentarios'), ['id' => 'comentarios' ,'class' => 'form-control' , 'style' => 'height:100px']);?>
                            </div>
                        </div>
                        <div class="row pull-right" style="padding-top: 20px">
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

    $('#modal-loading').modal('show');
    $(function() {
        $("#AddAccion").css({
            "padding-left": "7px",
        });
        
        $('#modal-loading').modal('hide');
    });

    $("#solicitudfrm").on('submit', function(e) {
        e.preventDefault();
        console.log(" Llegue a Solicitud ");
        var formData = new FormData();
        data = {
            'id' : '<?php echo $id; ?>',
            'client_id' : $("#client_id").val(),
            'oficina_id' : $("#oficina_id").val(),
            'staff_id' : $("#staff_id").val(),
            'marca' : $("#marca").val(),
            'clase_niza_id'  : $("#clase_niza_id").val(),
            'pais_id' : $("#pais_id").val(),
            'fecha_solicitud' : $("#fecha_solicitud").val(),
            'fecha_respuesta' : $("#fecha_respuesta").val(),
            'ref_cliente' : $("#ref_cliente").val(),
            'busqueda_interna_id' : $("#busqueda_interna_id").val(),
            'busqueda_externa_id' : $("#busqueda_externa_id").val(),
            'comentarios' : $("#comentarios").val(),
        };
        console.log(" Data ", data);
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        formData.append('id', data.id);
        formData.append('client_id', data.client_id);
        formData.append('oficina_id', data.oficina_id);
        formData.append('staff_id', data.staff_id);
        formData.append('marca', data.marca),
        formData.append('clase_niza_id', data.clase_niza_id),
        formData.append('pais_id', data.pais_id),
        formData.append('fecha_solicitud', data.fecha_solicitud),
        formData.append('fecha_respuesta', data.fecha_respuesta),
        formData.append('ref_cliente', data.ref_cliente),
        formData.append('busqueda_interna_id', data.busqueda_interna_id),
        formData.append('busqueda_externa_id', data.busqueda_externa_id),
        formData.append('comentarios', data.comentarios),
        formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
        
     
        $.ajax({
            url: '<?php echo admin_url('pi/BusquedasController/insertBusqueda'); ?>',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(" Response " , response);
                const obj = JSON.parse(response);
                if (obj.code == 200) {
                    let id = data.id;
                    alert_float('success', 'Solicitud guardada con éxito!');
                    let ruta = '<?php echo admin_url("pi/BusquedasController/edit/"); ?>';
                    ruta = ruta + id;
                    location.replace(ruta);
                } else if (obj.code == 500) {
                    console.log(" Error en Crear la solicitud ");
                    alert_float('danger', 'No se Pudo Guardar la Solicitud ');
                }
            },
            fail: function(request) {
                <?php if (ENVIRONMENT != 'production') { ?>
                    alert(response);
                <?php } else { ?>
                    alert('ha ocurrido un error');
                <?php } ?>
            }
        });
    });
    
    

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