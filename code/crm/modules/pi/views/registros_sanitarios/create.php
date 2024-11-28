<?php
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php'); 
$select = ['' => ''];?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4>Crear Solicitud de Registro Sanitarios</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12"> <!--admin_url('pi/AutoresSolicitudesController/store/') -->
                <?php echo form_open_multipart("", ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                <?php echo form_hidden('id', $id); ?>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Inicio</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Extra</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Expediente</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i> Eventos</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i> Tareas</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">7</span> <i> Documentos</i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                            <?php echo form_hidden('cod_contador', $cod_contador); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top:15px;">
                                            <?php echo form_label('Grupo', 'lbl_grupo'); ?>
                                            <?php 
                                                $grupo = $select + $grupo;
                                                echo form_dropdown([
                                                    'id'       => 'grupo_id', 
                                                    'name'     => 'grupo_id', 
                                                    'class'    => 'form-control',
                                                    'options'  => $grupo,
                                                    'value'    => set_value('grupo_id'),
                                                    'data-placeholder' => 'grupo_id'
                                                ],
                                                );?>
                                                <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Nombre Cliente', 'lblnombre_cliente'); ?>
                                            <?php echo form_input([
                                                'id'    =>   'nombre_cliente',
                                                'name'  =>   'nombre_cliente',
                                                'class' =>   'form-control',
                                                'value' =>   set_value('nombre_cliente')
                                            ]); ?>
                                            <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>

                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Contacto', 'lblcontacto'); ?>
                                            <?php $contacto = $select + $contacto; ?>
                                            <?php echo form_dropdown('contacto_id', $contacto, set_value('contacto_id'), ['class' => 'form-control', 'id' => 'contacto_id']); ?>
                                            <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Oficina', 'oficina_id') ?>
                                            <?php $oficinas = $select + $oficinas; ?>
                                            <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['class' => 'form-control' , 'id' => 'oficina_id']); ?>
                                            <?php echo form_error($fields[4]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Responsable', 'staff_id'); ?>
                                            <?php $responsable = $select + $responsable; ?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control' , 'id' => 'staff_id']); ?>
                                         </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                        <div class="col-md-12" style="padding-top:15px;">
                                            <?php echo form_label('País Designado', 'id_pais'); ?>
                                            <?php $id_pais = $select + $id_pais; ?>
                                            <?php echo form_dropdown([
                                                'id'       => 'id_pais',
                                                'name'     => 'id_pais',
                                                'class'    => 'form-control',
                                                'options' => $id_pais,
                                                'selected' => set_value('id_pais',226),
                                            ]); ?>
                                            <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-12" style="padding-top:15px;">
                                            <?php echo form_label('Título', 'titulo'); ?>
                                            <?php echo form_input([
                                                'id'    =>   'titulo',
                                                'name'  =>   'titulo',
                                                'class' =>   'form-control',
                                                'value' =>   set_value('titulo')
                                            ]); ?>
                                            <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-12" style="padding-top:15px;">
                                            <?php echo form_label('Descripción', 'descripcion'); ?>
                                            <?php echo form_textarea('descripcion', set_value('descripcion'), ['class' => 'form-control', 'id' =>  'descripcion_der', 'style' => 'height : 100px' ,  'maxlength' => '200']); ?>
                                            <?php echo form_error($fields[8]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Nombre del Fabricante', 'fabricante_nombre'); ?>
                                            <?php echo form_input([
                                                'id'    =>   'fabricante_nombre',
                                                'name'  =>   'fabricante_nombre',
                                                'class' =>   'form-control',
                                                'value' =>   set_value('fabricante_nombre')
                                            ]); ?>
                                            <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Cidad del Fabricante', 'fabricante_ciudad'); ?>
                                            <?php echo form_input([
                                                'id'    =>   'fabricante_ciudad',
                                                'name'  =>   'fabricante_ciudad',
                                                'class' =>   'form-control',
                                                'value' =>   set_value('titulo')
                                            ]); ?>
                                            <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('País del Fabricante', 'fabricante_pais'); ?>
                                            <?php $id_pais = $select + $id_pais; ?>
                                            <?php echo form_dropdown([
                                                'id'       => 'fabricante_pais',
                                                'name'     => 'fabricante_pais',
                                                'class'    => 'form-control',
                                                'options' => $id_pais,
                                                'selected' => set_value('fabricante_pais',226),
                                            ]); ?>
                                            <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Solicitantes', 'id_propietario'); ?>
                                            <?php //$solicitantes = $select + $solicitantes; ?>
                                            <?php echo form_dropdown([
                                                'id'       => 'id_propietario',
                                                'name'     => 'id_propietario',
                                                'class'    => 'form-control',
                                                'multiple' => 'multiple',
                                                'options' => $solicitantes,
                                                'selected'  => set_value('id_propietario'),
                                            ]); ?>
                                            <?php echo form_error($fields[29]['name'], '<div class="text-danger">', '</div>'); ?>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Referencia Interna', 'ref_interna'); ?>
                                            <?php echo form_input('ref_interna', set_value('ref_interna'), ['class' => 'form-control' , 'id' => 'ref_interna']); ?>
                                            <?php echo form_error($fields[14]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Referencia Cliente', 'ref_cliente'); ?>
                                            <?php echo form_input('ref_cliente', set_value('ref_cliente'), ['class' => 'form-control' , 'id' => 'ref_cliente']); ?>
                                            <?php echo form_error($fields[15]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Carpeta', 'carpeta'); ?>
                                            <?php echo form_input('carpeta', set_value('carpeta'), ['class' => 'form-control' , 'id' => 'carpeta']); ?>
                                            <?php echo form_error($fields[16]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Libro', 'libro'); ?>
                                            <?php echo form_input('libro', set_value('libro'), ['class' => 'form-control' , 'id' => 'libro']); ?>
                                            <?php echo form_error($fields[17]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Tomo', 'tomo'); ?>
                                            <?php echo form_input('tomo', set_value('tomo'), ['class' => 'form-control' , 'id' => 'tomo']); ?>
                                            <?php echo form_error($fields[18]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Folio', 'folio'); ?>
                                            <?php echo form_input('folio', set_value('folio'), ['class' => 'form-control' , 'id' => 'folio']); ?>
                                            <?php echo form_error($fields[19]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Marca', 'lblmarca'); ?>
                                            <?php $marcas = $select + $marcas; ?>
                                            <?php echo form_dropdown('marca_id', $marcas, set_value('marca_id'), ['class' => 'form-control' , 'id' => 'marca_id']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Clase Niza', 'lblclase_niza'); ?>
                                            <?php $niza = $select + $niza; ?>
                                            <?php echo form_dropdown('clase_niza_id', $niza, set_value('clase_niza_id'), ['class' => 'form-control' , 'id' => 'clase_niza_id']); ?>
                                        </div>
                                        <div class="col-md-12" style="padding-top:15px;">
                                            <?php echo form_label('Comentarios', 'comentarios'); ?>
                                            <?php echo form_textarea('comentarios', set_value('comentarios'), ['class' => 'form-control', 'id' => 'comentarios_der' , 'maxlength' => '200' , 'style' => 'height  : 100px']); ?>
                                            <?php echo form_error($fields[20]['name'], '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Estado de Solicitud', 'id_estado'); ?>
                                        <?php $estados_solicitudes = $select + $estados_solicitudes; ?>
                                        <?php echo form_dropdown('id_estado', $estados_solicitudes, set_value('estado_id'), ['class' => 'form-control' , 'id' => 'id_estado']); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'solicitud',
                                            'name' => 'solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('solicitud'),
                                            'placeholder' => 'Nº de Solicitud'
                                        ]); ?>
                                        <?php echo form_error($fields[22]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Fecha de Solicitud'); ?>
                                        <?php
                                        echo form_input([
                                            'id' => 'fecha_solicitud',
                                            'name' => 'fecha_solicitud',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_solicitud'),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php
                                        echo form_input([
                                            'id' => 'registro',
                                            'name' => 'registro',
                                            'class' => 'form-control',
                                            'value' => set_value('registro'),
                                            'placeholder' => 'Nº Registro'
                                        ]); ?>
                                        <?php echo form_error($fields[24]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Fecha de registro"); ?>
                                        <?php
                                        echo form_input([
                                            'id' => 'fecha_registro',
                                            'name' => 'fecha_registro',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_registro'),
                                            'placeholder' => 'Fecha de Registro'
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'certificado',
                                            'name' => 'certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('certificado'),
                                            'placeholder' => 'Nº de Certificado'
                                        ]); ?>
                                        <?php echo form_error($fields[26]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Fecha de Vencimiento'); ?>
                                        <?php
                                        echo form_input([
                                            'id' => 'fecha_vencimiento',
                                            'name' => 'fecha_vencimiento',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha_vencimiento'),
                                            'placeholder' => 'Fecha Vencimiento'
                                        ]); ?>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#eventoModal">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive" id="eventosTbl">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Tipo Evento</th>
                                                    <th>Fecha</th>
                                                    <th>Comentarios</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addTask">Añadir Tarea</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive" id="tareaTbl">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Tipo de Tarea</th>
                                                    <th>Fecha</th>
                                                    <th>Comentarios</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                           
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 7 -->
                                <div class="tab-pane" role="tabpanel" id="step8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong><?php echo ' ' . $cod_contador; ?></strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive" id ="docTbl">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Archivo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                         
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
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $CI->load->view('autores/solicitudes/modal.php'); ?>

<?php init_tail(); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php $CI->load->view('autores/solicitudes/anexos.php'); ?>


</body>

</html>
<?php //init_tail(); ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    // new DataTable(".ultimate", {
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
    //     }
    // });
</script>
<!-- <script>
    new DataTable(".anexo", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script> -->