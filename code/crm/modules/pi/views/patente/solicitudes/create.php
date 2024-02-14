<?php 
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php');
?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart(admin_url('pi/MarcasSolicitudesController/store'),['id' => 'solicitudfrm' , 'name' => 'solicitudfrm']);?>
                <?php echo form_hidden('id', $id);?>
                    <div class="panel_s">
                        <div class="panel-body">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                        <li role="presentation" class="active">
                                            <a href="#step1"  data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Registro</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step2"  data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step3"  data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Extra</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step4"  data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step5"  data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Eventos</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step6"  data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Tareas</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step7"  data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Anexos</i></a>
                                        </li>
                                        <li role="presentation" >
                                            <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab" style="background-color:#4BB543; color: white; border-color: white">8</span> <i style="color:#4BB543"> Documentos</i></a>
                                        </li>
                                    </ul>
                            </div>
                            
                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <?php echo form_label('Tipo de solicitud', 'tipo_registro_id');?>
                                            <?php echo form_dropdown(['name'=>'tipo_registro_id','id'=>'tipo_registro_id'], $tipo_registro ,set_value('tipo_registro_id'), ['class' => 'form-control'])?>
                                        </div>
                                        <div class="col-md-6" >
                                            <?php echo form_label('Cliente','client_id');?>
                                            <?php echo form_dropdown('client_id', $clientes, set_value('client_id'), ['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Oficina', 'oficina_id')?>
                                            <?php echo form_dropdown('oficina_id',$oficinas,set_value('oficina_id'),['class' => 'form-control']);?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Responsable','staff_id');?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control']);?>
                                        </div>                    
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="col-md-2">
                                        <?php echo form_label('Pais', 'pais_id');?>
                                        <?php echo form_dropdown([
                                                'id'       => 'pais_id',
                                                'name'     => 'pais_id',
                                                'class'    => 'form-control',
                                                'multiple' => 'multiple',
                                                'options' => $pais_id,
                                        ]);?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Titulo', 'titulo'); ?>
                                        <?php echo form_input([
                                            'id' => 'titulo',
                                            'name' => 'titulo',
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'value' => set_value('titulo', ''),
                                        ]); ?>
                                    </div>
                                    
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Solicitantes', 'solicitantes_id');?>
                                        <?php echo form_dropdown([
                                            'id'       => 'solicitantes_id',
                                            'name'     => 'solicitantes_id',
                                            'class'    => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $solicitantes,
                                        ]);?>
                                    </div>
                                    <!-- Clase niza -->                                  
                                    <div class='col-md-12' style="padding: 2%;">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#clase_marcas" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Clases <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="clase_marcas">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#claseNizaModal">Añadir clase</button>
                                                                <table id="claseTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Clase</th>
                                                                            <th>Descripcion</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="col-md-2">
                                        <?php echo form_label('Tipo Solicitud', 'tipo_solicitud_id');?>
                                        <?php echo form_dropdown([
                                            'id'        => 'tipo_solicitud_id',
                                            'name'      => 'tipo_solicitud_id',
                                            'class'     => 'form-control',
                                            'options'   => $tipo_solicitud,
                                            'selected'  => set_value('tipo_solicitud_id', '1'),
                                        ]);?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Referencia interna', 'ref_interna');?>
                                        <?php echo form_input('ref_interna', set_value('ref_interna'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Referencia cliente', 'ref_cliente');?>
                                        <?php echo form_input('ref_cliente', set_value('ref_cliente'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Fecha de Primer Uso','primer_uso');?>
                                        <?php echo form_input('primer_uso', set_value('primer_uso'), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Prueba Uso', 'prueba_uso');?>
                                        <?php echo form_input('prueba_uso', set_value('prueba_uso'), ['class' => 'form-control calendar'])?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_label('Carpeta', 'carpeta');?>
                                        <?php echo form_input('carpeta', set_value('carpeta'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2" style="padding-top:15px;">
                                        <?php echo form_label('Libro', 'libro');?>
                                        <?php echo form_input('libro', set_value('libro'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2" style="padding-top:15px;">
                                        <?php echo form_label('Tomo', 'tomo');?>
                                        <?php echo form_input('tomo', set_value('tomo'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-2" style="padding-top:15px;">
                                        <?php echo form_label('Folio', 'folio');?>
                                        <?php echo form_input('folio', set_value('folio'), ['class' => 'form-control'])?>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#prioridad" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Prioridades<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="prioridad">
                                                    <div class="list-box">
                                                        <div class="col-12" >
                                                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#prioridadModal">Añadir prioridad</button>
                                                        </div>
                                                        <div class="col-12" style="padding: 1% 1% 1% 0%;">    
                                                            <table id="prioridadTbl" class="table table-responsive table-dark">
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
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Comentarios', 'comentarios');?>
                                        <?php echo form_textarea('comentarios', set_value('comentarios'), ['class' => 'form-control']);?>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="col-md-12">
                                        <?php echo form_label('Estado de Solicitud', 'estado_id');?>
                                        <?php echo form_dropdown('estado_id', $estados_solicitudes, set_value($fields[3]['name']), ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_solicitud',
                                            'name' => 'num_solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('num_solicitud'),
                                            'placeholder' => 'Nº de Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Fecha de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_solicitud',
                                            'name' => 'fecha_solicitud',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php echo form_input([
                                            'id' => 'num_registro',
                                            'name' => 'num_registro',
                                            'class' => 'form-control',
                                            'value' => set_value('num_registro'),
                                            'placeholder' => 'Nº Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Fecha de registro"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_registro',
                                            'name' => 'fecha_registro',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_registro'),
                                            'placeholder' => 'Fecha de Registro'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'num_certificado',
                                            'name' => 'num_certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('num_certificado'),
                                            'placeholder' => 'Nº de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Fecha de certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_certificado',
                                            'name' => 'fecha_certificado',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_certificado'),
                                            'placeholder' => 'Fecha de Certificado'
                                        ]);?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Fecha de Vencimiento'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_vencimiento',
                                            'name' => 'fecha_vencimiento',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_vencimiento'),
                                            'placeholder' => 'Fecha Vencimiento'
                                        ]);?>
                                    </div>
                                    <div class="col-md-12" style="padding: 1.5% 1.5% 1.5% 1.5%;">
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#publicaciones" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Publicaciones <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="publicaciones">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#publicacionModal">Añadir publicacion</button>
                                                                <table id="publicacionTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Boletin</th>
                                                                            <th>Tomo</th>
                                                                            <th>Pagina</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="col-md-12" >
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 20px;">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Tipo Evento</th>
                                                    <th>Comentario</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (!empty($eventos)) {?>
                                                <?php foreach ($eventos as $row) {?>
                                                    <tr eventosid = "<?php echo $row['id'];?>">
                                                        <td><?php echo $row['id'];?></td>
                                                        <td><?php echo $row['tipo_evento'];?></td>
                                                        <td><?php echo $row['comentarios'];?></td>
                                                        <td><?php echo $row['fecha'];?></td>
                                                        <form method="DELETE" action="<?php echo admin_url("pi/EventosController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                            <td>
                                                                <a class="editeventos btn btn-light"  data-toggle="modal" data-target="#eventoModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                            </td>
                                                        </form> 
                                                    </tr>
                                                <?php } ?>
                                            <?php }
                                            else {
                                            ?>
                                            <tr colspan="3">
                                                <td>Sin Registros</td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTask">Añadir Tarea</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="table table-responsive" id="tareas">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Tipo de Tarea</th>
                                                    <th>Descripcion</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 7 -->
                                <div class="tab-pane" role="tabpanel" id="step7">
                                    <div class="col-md-12" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cesion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cesion<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cesion">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCesion">Añadir Cesion</button>
                                                                <table id="cesionTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Cliente</th>
                                                                            <th>Oficina</th>
                                                                            <th>Staff</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                          
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_cesion">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#licencia" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Licencia<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="licencia">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddLicencia">Añadir licencia</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Cliente</th>
                                                                            <th>Oficina</th>
                                                                            <th>Staff</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_licencia">
                                                                    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#fusion" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Fusion<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="fusion">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddFusion">Añadir Fusion</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_fusion">
                                                                    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cambio_nombre" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Nombre<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cambio_nombre">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioNombre">Añadir Cambio de nombre</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="body_cambio_nombre">
                                                                    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#cambio_domicilio" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Cambio de Domicilio<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="cambio_domicilio">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#AddCambioDomicilio">Añadir cambio de domicilio</button>
                                                                <table id="licenciaTbl" class="table table-responsive w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Oficina</th>
                                                                            <th>Staff</th>
                                                                            <th>Estado</th>
                                                                            <th>Nº de Solicitud</th>
                                                                            <th>Fecha de Solicitud</th>
                                                                            <th>Nº de Resolucion</th>
                                                                            <th>Fecha de Resolucion</th>
                                                                            <th>Referencia Cliente</th>
                                                                            <th>Comentarios</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id = "body_cambio_domicilio">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 8 -->
                                <div class="tab-pane" role="tabpanel" id="step8">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table id = "soldocTbl" class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Creado Por</th>
                                                    <th>Descripcion</th>
                                                    <th>Archivo</th>
                                                    <th>Comentarios</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                            <?php if (!empty($SolDoc)) {?>
                                                <?php foreach ($SolDoc as $row) {?>
                                                    <tr docid = "<?php echo $row['id'];?>">
                                                        <td><?php echo $row['id'];?></td>
                                                        <td><?php echo $row['marcas_id'];?></td>
                                                        <td><?php echo $row['descripcion'];?></td>
                                                        <td><?php echo $row['path'];?></td>
                                                        <td><?php echo $row['comentarios'];?></td>
                                                        <form method="DELETE" action="<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                            <td>
                                                                <a class="editdoc btn btn-light"  data-toggle="modal" data-target="#docModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                            </td>
                                                        </form> 
                                                    </tr>
                                                <?php } ?>
                                            <?php }
                                            else {
                                            ?>
                                            <tr colspan="3">
                                                <td>Sin Registros</td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('marcas/solicitudes/modal.php');?>
<?php init_tail();?>
<?php $CI->load->view('marcas/solicitudes/js.php');?>
</body>
</html>
