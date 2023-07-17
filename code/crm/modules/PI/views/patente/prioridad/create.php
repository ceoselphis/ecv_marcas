<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/PatentePrioridadController/store'), ['form', 'form-inline']); ?>
                        <div class="col-md-2">
                            <?php echo form_label($labels[1],$labels[1]);?>
                            <?php echo form_dropdown($fields[1]['name'],$solicitud, set_value($fields[1]['name']), ['class' => 'form-control'])?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[2],$labels[2]);?>
                            <?php echo form_input($fields[2],set_value($fields[2]['name']));?>
                            <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label($labels[3],$labels[3]);?>
                            <?php echo form_dropdown($fields[3]['name'],$pais,set_value($fields[3]['name']), ['class' => 'form-control']);?>
                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3" style="padding-top: 1.5%;">
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="<?php echo admin_url('pi/PatentePrioridadController/');?>" class="btn btn-success">Volver atrás</a>
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


   $("#fecha").on('keyup', function(e){
    e.preventDefault();
    $("#fecha").val('');
   })
  $( function() {
    $("#fecha"  ).datepicker();
  });
  </script>
  <style>
    th, td {
        text-align: center;
    }
    
</style>


</body>
</html>