<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <?php echo form_open_multipart(admin_url('pi/publicacionesmarcascontroller/store'), 'form'); ?>
            <?php echo form_hidden('staff_id', $_SESSION['staff_user_id'], FALSE)?>
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Solicitud de Registro</h4>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <?php echo form_label('Oficina', $fields[16]['name'])?>
                                <?php echo form_dropdown($fields[16]['name'],$oficinas,set_value($fields[16]['name']),['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Cliente',$fields[15]['name']);?>
                                <?php echo form_dropdown($fields[15]['name'], $clientes, set_value($fields[15]['name']), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Referencia interna', $fields[17]['name']);?>
                                <?php echo form_input($fields[17]['name'], set_value($fields[17]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Referencia cliente', $fields[18]['name']);?>
                                <?php echo form_input($fields[18]['name'], set_value($fields[18]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Carpeta', $fields[19]['name']);?>
                                <?php echo form_input($fields[19]['name'], set_value($fields[19]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Libro', $fields[20]['name']);?>
                                <?php echo form_input($fields[20]['name'], set_value($fields[20]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Tomo', $fields[21]['name']);?>
                                <?php echo form_input($fields[21]['name'], set_value($fields[21]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_label('Folio', $fields[22]['name']);?>
                                <?php echo form_input($fields[22]['name'], set_value($fields[22]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-12">
                                <?php echo form_label('Comentarios', $fields[23]['name']);?>
                                <?php echo form_textarea($fields[23]['name'], set_value($fields[23]['name']), ['class' => 'form-control'])?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <?php echo form_label('Nº de Registro', $fields[13]['name']);?>
                                <?php echo form_input($fields[13]['name'], set_value($fields[13]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Tipo de solicitud', $fields[13]['name']);?>
                                <?php echo form_dropdown($fields[13]['name'], $tipo_solicitud ,set_value($fields[13]['name']), ['class' => 'form-control'])?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Estado de Solicitud', $fields[3]['name']);?>
                                <?php echo form_dropdown($fields[3]['name'], $estados_solicitudes, set_value($fields[3]['name']), ['class' => 'form-control']);?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Fecha de Primer Uso', $fields[13]['name']);?>
                                <?php echo form_input($fields[13]['name'], set_value($fields[13]['name']), ['class' => 'form-control calendar'])?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Prueba de Uso', $fields[14]['name']);?>
                                <?php echo form_input($fields[14]['name'], set_value($fields[14]['name']), ['class' => 'form-control calendar'])?>
                            </div>
                            <div class="col-md-4">
                                <?php echo form_label('Carpeta', $fields[15]['name']);?>
                                <?php echo form_input($fields[15]['name'], set_value($fields[15]['name']), ['class' => 'form-control calendar'])?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-12" style="padding-top: 1.5%">
                                <button class="btn btn-primary" type="submit" >Guardar</button>
                                <button class="btn btn-gray" type="reset" >Limpiar</button>
                                <a href="<?php echo admin_url('pi/publicacionesmarcascontroller/');?>" class="btn btn-success">Volver atrás</a>
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

$.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
   $.datepicker.setDefaults($.datepicker.regional['es']);


   $(".calendar").on('keyup', function(e){
    e.preventDefault();
    $(".calendar").val('');
   })
  $( function() {
    $(".calendar"  ).datepicker();
  });
  </script>
  <style>
    th, td {
        text-align: center;
    }
    
</style>


</body>
</html>