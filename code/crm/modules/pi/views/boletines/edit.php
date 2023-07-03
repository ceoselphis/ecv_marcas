<?php init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <?php echo form_open(admin_url('pi/boletinescontroller/update/'.$id), 'form'); ?>
                        <div class="col-3">
                            <?php echo form_label($labels[0]);?>
                            <br />
                            <?php echo form_input('boletin_id', $value = (set_value('boletin_id') === '') ? $values[0]['boletin_id'] : set_value('boletin_id') , ['class' => 'form-control']);?>
                            <?php echo form_error('boletin_id', '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3">
                            <?php echo form_label($labels[1]);?>
                            <br />
                            <?php echo form_dropdown('pais_id', $paises, $values[0]['pais_id'], ['class' => 'form-control']);?>
                        </div>
                        <div class="col-4">
                            <?php echo form_label($labels[2]);?>
                            <br />
                            <?php echo form_input('nombre', $values[0]['nombre'], ['class' => 'form-control']);?>
                            <?php echo form_error('nombre', '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-4">
                            <?php echo form_label($labels[3]);?>
                            <br />
                            <?php echo form_input('fecha_publicacion', $values[0]['fecha_publicacion'], ['class' => 'form-control']);?>
                            <?php echo form_error('fecha_publicacion', '<div class="text-danger">', '</div>');?>
                        </div>
                        <div class="col-3">
                            <br />
                            <button class="btn btn-primary" type="submit" >Guardar</button>
                            <button class="btn btn-gray" type="reset" >Limpiar</button>
                            <a href="javascript: history.go(-1)" class="btn btn-success">Volver atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<pre>
    <?php var_dump(set_value('boletin_id'));?>
</pre>

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
    $("#fecha_publicacion"  ).datepicker({
        maxDate: fecha(),
        
    });
  });
  </script>