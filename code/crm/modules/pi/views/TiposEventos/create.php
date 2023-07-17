<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/TiposEventosController/store'), 'form'); ?>
                        <div class="col-md-4">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_input($fields[1]['name'], set_value($fields[1]['name']), ['class' => "form-control"]);?>
                            <?php echo form_error($fields[1]['name'], '<div class="text-danger has-error">', '</div>');?>
                            <br />
                        </div>
                        <div class="col-md-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_dropdown('materia_id', $materias, [0], ['class' => 'form-control']);?>
                            <?php echo form_hidden("created_at", date('Y-m-d h:i:s'),false);?>
                            <?php echo form_hidden("modified_at", date('Y-m-d h:i:s'),false);?>
                            <?php echo form_hidden('created_by', $_SESSION['staff_user_id'], FALSE)?>
                        </div>
                        <div class="col-2">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <a href="<?php echo admin_url('pi/TiposEventosController/');?>" class="btn btn-success">Volver atras</a>
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


  $( function() {
    $("name=[materia_id]"  ).datepicker();
  });
  </script>
