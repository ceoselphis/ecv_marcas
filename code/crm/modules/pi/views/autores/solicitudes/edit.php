<?php
$CI = &get_instance();
init_head();
$CI->load->view('marcas/solicitudes/css.php');
$select = ['' => '']; ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart(admin_url('pi/AutoresSolicitudesController/update/' . $id), ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
                <?php echo form_hidden('id', $id); ?>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist" style="display:flex">
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                            aria-expanded="true"><span class="round-tab">1 </span> <i>Inicio</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                            aria-expanded="false"><span class="round-tab">2</span> <i>Solicitud</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                                class="round-tab">3</span> <i>Extra</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                                class="round-tab">4</span> <i>Expediente</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span
                                                class="round-tab">5</span> <i> Eventos</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span
                                                class="round-tab">6</span> <i> Tareas</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span
                                                class="round-tab">7</span> <i> Documentos</i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6" style="padding-top:15px;">
                                                <?php echo form_label('Tipo de solicitud', 'id_tipo_solicitud'); ?>
                                                <?php
                                                $tipo_solicitud = $select + $tipo_solicitud;
                                                echo form_dropdown(
                                                    [
                                                        'id' => 'id_tipo_solicitud',
                                                        'name' => 'id_tipo_solicitud',
                                                        'class' => 'form-control',
                                                        'options' => $tipo_solicitud,
                                                        'selected' => set_value('id_tipo_solicitud', $values['id_tipo_solicitud'])
                                                    ]
                                                ); ?>
                                                <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                            <div class="col-md-6" style="padding-top:15px;">
                                                <?php echo form_label('Cliente', 'client_id'); ?>
                                                <?php $clientes = $select + $clientes; ?>
                                                <?php echo form_dropdown('client_id', $clientes, set_value('client_id', $values['client_id']), ['class' => 'form-control']); ?>
                                                <?php echo form_error($fields[3]['name'], '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="padding-top:15px;">
                                                <?php echo form_label('Oficina', 'oficina_id') ?>
                                                <?php $oficinas = $select + $oficinas; ?>
                                                <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id', $values['oficina_id']), ['class' => 'form-control']); ?>
                                                <?php echo form_error($fields[4]['name'], '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                            <div class="col-md-6" style="padding-top:15px;">
                                                <?php echo form_label('Responsable', 'staff_id'); ?>
                                                <?php $responsable = $select + $responsable; ?>
                                                <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id', $values['staff_id']), ['class' => 'form-control']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Paises Designados', 'id_pais'); ?>
                                        <?php $id_pais = $select + $id_pais; ?>
                                        <?php echo form_dropdown([
                                            'id' => 'id_pais',
                                            'name' => 'id_pais',
                                            'class' => 'form-control',
                                            //'multiple' => 'multiple',
                                            'options' => $id_pais,
                                            'selected' => set_value('id_pais', $values['id_pais'])
                                        ]); ?>
                                        <?php echo form_error($fields[6]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Titulo', 'titulo'); ?>
                                        <?php echo form_input([
                                            'id' => 'titulo',
                                            'name' => 'titulo',
                                            'class' => 'form-control',
                                            'value' => set_value('titulo', $values['titulo'])
                                        ]); ?>
                                        <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Descripcion', 'descripcion'); ?>
                                        <?php echo form_textarea('descripcion', set_value('descripcion', $values['descripcion']), ['class' => 'form-control', 'maxlength' => '200']); ?>
                                        <?php echo form_error($fields[8]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Autores', 'id_autor'); ?>
                                        <?php //$autores = $select + $autores;  ?>
                                        <?php echo form_dropdown([
                                            'id' => 'id_autor[]',
                                            'name' => 'id_autor[]',
                                            'class' => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $autores,
                                            'selected' => set_value('id_autor', $values['autores'])
                                        ]); ?>
                                        <?php echo form_error($fields[28]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Solicitantes', 'id_propietario'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'id_propietario[]',
                                            'name' => 'id_propietario[]',
                                            'class' => 'form-control',
                                            'multiple' => 'multiple',
                                            'options' => $solicitantes,
                                            'selected' => set_value('id_propietario', $values['solicitantes'])
                                        ]); ?>
                                        <?php echo form_error($fields[29]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button"
                                                class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Clasificación', 'id_clasificacion'); ?>
                                        <?php $clasificacion = $select + $clasificacion; ?>
                                        <?php echo form_dropdown([
                                            'id' => 'id_clasificacion',
                                            'name' => 'id_clasificacion',
                                            'class' => 'form-control',
                                            'options' => $clasificacion,
                                            'selected' => set_value('id_clasificacion', $values['id_clasificacion']),
                                        ]); ?>
                                        <?php echo form_error($fields[9]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Origen', 'id_origen'); ?>
                                        <?php $origen = $select + $origen; ?>
                                        <?php echo form_dropdown([
                                            'id' => 'id_origen',
                                            'name' => 'id_origen',
                                            'class' => 'form-control',
                                            'options' => $origen,
                                            'selected' => set_value('id_origen', $values['id_origen']),
                                        ]); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Titulo Clasificación', 'titulo_clasif'); ?>
                                        <?php echo form_input('titulo_clasif', set_value('titulo_clasif', $values['titulo_clasif']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[11]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Autor Clasificación', 'autor_clasif'); ?>
                                        <?php echo form_input('autor_clasif', set_value('autor_clasif', $values['autor_clasif']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[12]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Fecha', 'fecha_clasif'); ?>
                                        <?php echo form_input('fecha_clasif', set_value('fecha_clasif', $values['fecha_clasif']), ['class' => 'form-control calendar']) ?>
                                        <?php echo form_error($fields[13]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Referencia interna', 'ref_interna'); ?>
                                        <?php echo form_input('ref_interna', set_value('ref_interna', $values['ref_interna']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[14]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Referencia cliente', 'ref_cliente'); ?>
                                        <?php echo form_input('ref_cliente', set_value('ref_cliente', $values['ref_cliente']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[15]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4" style="padding-top:15px;">
                                        <?php echo form_label('Carpeta', 'carpeta'); ?>
                                        <?php echo form_input('carpeta', set_value('carpeta', $values['carpeta']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[16]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-4" style="padding-top:15px;">
                                        <?php echo form_label('Libro', 'libro'); ?>
                                        <?php echo form_input('libro', set_value('libro', $values['libro']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[17]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-4" style="padding-top:15px;">
                                        <?php echo form_label('Tomo', 'tomo'); ?>
                                        <?php echo form_input('tomo', set_value('tomo', $values['tomo']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[18]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4" style="padding-top:15px;">
                                        <?php echo form_label('Folio', 'folio'); ?>
                                        <?php echo form_input('folio', set_value('folio', $values['folio']), ['class' => 'form-control']) ?>
                                        <?php echo form_error($fields[19]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Comentarios', 'comentarios'); ?>
                                        <?php echo form_textarea('comentarios', set_value('comentarios', $values['comentarios']), ['class' => 'form-control', 'maxlength' => '200']); ?>
                                        <?php echo form_error($fields[20]['name'], '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button"
                                                class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 4 -->
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12" style="padding-top:15px;">
                                        <?php echo form_label('Estado de Solicitud', 'id_estado'); ?>
                                        <?php $estados_solicitudes = $select + $estados_solicitudes; ?>
                                        <?php echo form_dropdown('id_estado', $estados_solicitudes, set_value('id_estado', $values['id_estado']), ['class' => 'form-control']); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Solicitud'); ?>
                                        <?php echo form_input([
                                            'id' => 'solicitud',
                                            'name' => 'solicitud',
                                            'class' => 'form-control',
                                            'value' => set_value('solicitud', $values['solicitud']),
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
                                            'value' => set_value('fecha_solicitud', $values['fecha_solicitud']),
                                            'placeholder' => 'Fecha Solicitud'
                                        ]); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label('Nº de Registro'); ?>
                                        <?php
                                        echo form_input([
                                            'id' => 'registro',
                                            'name' => 'registro',
                                            'class' => 'form-control',
                                            'value' => set_value('registro', $values['registro']),
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
                                            'value' => set_value('fecha_registro', $values['fecha_registro']),
                                            'placeholder' => 'Fecha de Registro'
                                        ]); ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6" style="padding-top:15px;">
                                        <?php echo form_label("Nº de Certificado"); ?>
                                        <?php echo form_input([
                                            'id' => 'certificado',
                                            'name' => 'certificado',
                                            'class' => 'form-control',
                                            'value' => set_value('certificado', $values['certificado']),
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
                                            'value' => set_value('fecha_vencimiento', $values['fecha_vencimiento']),
                                            'placeholder' => 'Fecha Vencimiento'
                                        ]); ?>
                                    </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button"
                                                class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                                            data-target="#eventoModal">Añadir Evento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_eventos">
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button"
                                                class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                                            data-target="#addTask">Añadir Tarea</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Tipo de Tarea</th>
                                                    <th>Comentarios</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_tareas">


                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button"
                                                class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 7 -->
                                <div class="tab-pane" role="tabpanel" id="step8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>
                                                <?php echo form_label('N° Expediente Solicitud: ', ''); ?><strong>
                                                    <?php echo ' ' . $values['cod_contador']; ?>
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                                            data-target="#docModal">Añadir Documento</button>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 1.5%;">
                                        <table class="ultimate table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Archivo</th>
                                                    <th>Descripcion</th>
                                                    <th>Comentarios</th>
                                                    <th>Documento</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_documentos">

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
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $CI->load->view('autores/solicitudes/modal.php'); ?>

<?php init_tail(); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php $CI->load->view('autores/solicitudes/js.php'); ?>


</body>

</html>
<?php init_tail(); ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".ultimate", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>
<!-- <script>
    new DataTable(".anexo", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script> -->