<?php 
$CI = &get_instance();
init_head();?>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked">
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=1');?>"><i class="fas fa-edit"></i> Registro</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=2');?>"><i class="fas fa-file"></i> Solicitud</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=3');?>"><i class="fas fa-calendar-plus"></i> Extra</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=4');?>"><i class="fas fa-folder"></i> Expediente</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=5');?>"><i class="fas fa-calendar-days"></i> Eventos</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=6');?>"><i class="fas fa-list-check"></i> Tareas</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=7');?>"><i class="fas fa-diagram-subtask"></i> Anexos</a></li>
                    <li><a href="<?php echo admin_url('pi/marcassolicitudescontroller/create?s=8');?>"><i class="fas fa-folder-open"></i> Docs</a></li>
                </ul>
            </div>
            <?php switch($CI->input->get('s'))
            {
                case '1':?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=1'));?>
                                <h4>Solicitud de Registro</h4>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <?php echo form_label('Tipo de solicitud', 'tipo_registro');?>
                                        <?php echo form_dropdown('tipo_registro', $tipo_registro ,set_value($fields[13]['name']), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Oficina', $fields[16]['name'])?>
                                        <?php echo form_dropdown($fields[16]['name'],$oficinas,set_value($fields[16]['name']),['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Cliente',$fields[15]['name']);?>
                                        <?php echo form_dropdown($fields[15]['name'], $clientes, set_value($fields[15]['name']), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Responsable','staff_id');?>
                                        <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-12" style="padding: 1.5%;">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="<?php echo admin_url('pi/marcassolicitudescontroller');?>" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php break; ?>
                <?php case '2': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=2'));?>
                                <div class="col-md-12">
                                    <?php echo form_label('Paises Designados', 'pais_id');?>
                                    <?php echo form_dropdown([
                                            'id'       => 'pais_id',
                                            'name'     => 'pais_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'true',
                                            'options' => $pais_id
                                        ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Signo', 'descripcion');?>
                                    <?php echo form_input([
                                        'id'    =>   'descripcion-signo',
                                        'name'  =>   'descripcion-signo',
                                        'class' =>   'form-control',
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Tipo Signo', 'tipo_signo_id');?>
                                    <?php echo form_dropdown([
                                        'id'        => 'tipo_signo_id',
                                        'name'      => 'tipo_signo_id',
                                        'class'     => 'form-control',
                                        'options'   =>  $tipos_signo_id,
                                    ]);?>
                                </div>
                                <div class="col-md-12">
                                    <?php echo form_label('Clases', 'clase_niza_id');?>
                                    <?php echo form_dropdown([
                                        'id'       => 'clase_niza_id',
                                        'name'     => 'clase_niza_id',
                                        'class'    => 'form-control',
                                        'multiple' => 'true',
                                        'options' => $clase_niza_id
                                    ]);?>
                                </div>
                                <div class="col-md-12">
                                    <?php echo form_label('Solicitantes', 'solicitantes_id');?>
                                    <?php echo form_dropdown([
                                        'id'       => 'solicitantes_id',
                                        'name'     => 'solicitantes_id',
                                        'class'    => 'form-control',
                                        'multiple' => 'true',
                                        'options' => $clientes
                                    ]);?>
                                </div>
                                <div class="col-md-12" style="padding: 1.5%;">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?php echo admin_url('pi/marcassolicitudescontroller');?>" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php break; ?>
                <?php case '3': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=3'));?>
                                <div class="col-md-6">
                                    <?php echo form_label('Tipo Solicitud', 'tipo_solicitud');?>
                                    <?php echo form_dropdown([
                                        'id'        => 'tipo_solicitud',
                                        'name'      => 'tipo_solicitud',
                                        'class'     => 'form-control',
                                        'options'   => $tipo_solicitud,
                                        'selected'  => set_value('tipo_solicitud', '1'),
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Clase Nacional', 'clase_nacional');?>
                                    <?php echo form_input('clase_nacional', set_value('clase_nacional'), ['class' => 'form-control', 'type' => 'range']);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Referencia interna', $fields[17]['name']);?>
                                    <?php echo form_input($fields[17]['name'], set_value($fields[17]['name']), ['class' => 'form-control'])?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Referencia cliente', $fields[18]['name']);?>
                                    <?php echo form_input($fields[18]['name'], set_value($fields[18]['name']), ['class' => 'form-control'])?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Fecha de Primer Uso', $fields[13]['name']);?>
                                    <?php echo form_input($fields[13]['name'], set_value($fields[13]['name']), ['class' => 'form-control calendar'])?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Prueba Uso', $fields[14]['name']);?>
                                    <?php echo form_input($fields[14]['name'], set_value($fields[14]['name']), ['class' => 'form-control calendar'])?>
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
                                    <br />
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#">Añadir Prioridad</button>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Pais</th>
                                                <th>Número</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-12" style="padding: 1.5%;">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?php echo admin_url('pi/marcassolicitudescontroller');?>" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php break;?>
                <?php case '4': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                            <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=4'));?>
                                <div class="col-md-12">
                                    <?php echo form_label('Estado de Solicitud', $fields[3]['name']);?>
                                    <?php echo form_dropdown($fields[3]['name'], $estados_solicitudes, set_value($fields[3]['name']), ['class' => 'form-control']);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Nº de Solicitud'); ?>
                                    <?php echo form_input([
                                        'id' => 'num_solicitud',
                                        'name' => 'num_solicitud',
                                        'class' => 'form-control',
                                        'value' => set_value('num_solicitud'),
                                        'placeholder' => 'Nº de Solicitud'
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Fecha de Solicitud'); ?>
                                    <?php echo form_input([
                                        'id' => 'fecha_solicitud',
                                        'name' => 'fecha_solicitud',
                                        'class' => 'form-control calendar',
                                        'value' => set_value('fecha_solicitud'),
                                        'placeholder' => 'Fecha Solicitud'
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Nº de Registro'); ?>
                                    <?php echo form_input([
                                        'id' => 'num_registro',
                                        'name' => 'num_registro',
                                        'class' => 'form-control',
                                        'value' => set_value('num_registro'),
                                        'placeholder' => 'Nº Registro'
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label("Nº de Certificado"); ?>
                                    <?php echo form_input([
                                        'id' => 'num_certificado',
                                        'name' => 'num_certificado',
                                        'class' => 'form-control',
                                        'value' => set_value('num_certificado'),
                                        'placeholder' => 'Nº de Certificado'
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label("Fecha de certificado"); ?>
                                    <?php echo form_input([
                                        'id' => 'fecha_certificado',
                                        'name' => 'fecha_certificado',
                                        'class' => 'form-control calendar',
                                        'value' => set_value('fecha_certificado'),
                                        'placeholder' => 'Fecha de Certificado'
                                    ]);?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo form_label('Fecha de Vencimiento'); ?>
                                    <?php echo form_input([
                                        'id' => 'fecha_vencimiento',
                                        'name' => 'fecha_vencimiento',
                                        'class' => 'form-control calendar',
                                        'value' => set_value('fecha_vencimiento'),
                                        'placeholder' => 'Fecha Vencimiento'
                                    ]);?>
                                </div>
                                <!-- Publicaciones -->
                                <div class="col-md-12">
                                    <br />
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#">Añadir Publicacion</button>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Pais</th>
                                                <th>Número</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                
                                
                                <div class="col-md-12" style="padding: 1.5%;">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="<?php echo admin_url('pi/marcassolicitudescontroller');?>" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                            </div>
                        </div>
                    </div>
                <?php break;?>
                <?php case '5': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=5'));?>
                            </div>
                        </div>
                    </div>
                <?php break;?>
                <?php case '6': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=6'));?>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#">Añadir Evento</button>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Pais</th>
                                                <th>Número</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php break;?>
                <?php case '7': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=7'));?>
                            </div>
                        </div>
                    </div>
                <?php break;?>
                <?php case '8': ?>
                    <div class="col-md-10">
                        <div class="panel_s">
                            <div class="panel-body">
                                <?php echo form_open(admin_url('pi/marcassolicitudescontroller/store?s=8'));?>
                            </div>
                        </div>
                    </div>
                <?php break;?>
            <?php } ?>
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