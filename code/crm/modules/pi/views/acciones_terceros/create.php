<?php
$CI = &get_instance();
init_head();
$CI->load->view('acciones_terceros/css.php');
?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart(admin_url('pi/AccionesTerceroController/store'), ['id' => 'solicitudfrm', 'name' => 'solicitudfrm']); ?>
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
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Marca Base</i></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Marca Opuesta</i></a>
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
                                        <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i> Documentos</i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="main_form">
                                <!-- Step 1 -->
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Tipo de solicitud', 'tipo_solicitud_id'); ?>
                                            <?php
                                            echo form_dropdown(
                                                ['name' => 'tipo_solicitud_id', 'id' => 'tipo_solicitud_id'],
                                                $tipo_solicitud,
                                                set_value('tipo_solicitud_id'),
                                                ['class' => 'form-control']
                                            ) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Cliente', 'client_id'); ?>
                                            <?php echo form_dropdown('client_id', $clientes, set_value('client_id'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Oficina', 'oficina_id') ?>
                                            <?php echo form_dropdown('oficina_id', $oficinas, set_value('oficina_id'), ['class' => 'form-control']); ?>
                                        </div>
                                        <div class="col-md-6" style="padding-top:15px;">
                                            <?php echo form_label('Responsable', 'staff_id'); ?>
                                            <?php echo form_dropdown('staff_id', $responsable, set_value('staff_id'), ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <!-- Step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">

                                    <div class="col-md-12">
                                        <?php echo form_label('Denominacion', 'marcas_id'); ?>
                                        <?php echo form_dropdown([
                                            'id'       => 'marcas_id',
                                            'name'     => 'marcas_id',
                                            'class'    => 'form-control',
                                            'options' => $marcas,
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Clase', 'clase_id'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'clase_id',
                                            'name' => 'clase_id',
                                            'class' => 'form-control',
                                            'options' => $clase_niza
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Pais', 'pais_id'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'pais_id',
                                            'name' => 'pais_id',
                                            'class' => 'form-control',
                                            'options' => $paises
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Nº Solicitud', 'nro_solicitud'); ?>
                                        <?php echo form_input([
                                            'id'       => 'nro_solicitud',
                                            'name'     => 'nro_solicitud',
                                            'class'    => 'form-control',
                                            'value'    => set_value('nro_solicitud', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha Solicitud', 'fecha_solicitud'); ?>
                                        <?php echo form_input([
                                            'id'       => 'fecha_solicitud',
                                            'name'     => 'fecha_solicitud',
                                            'class'    => 'form-control calendar',
                                            'value'    => set_value('fecha_solicitud', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Nº Registro', 'nro_registro'); ?>
                                        <?php echo form_input([
                                            'id'       => 'nro_registro',
                                            'name'     => 'nro_registro',
                                            'class'    => 'form-control',
                                            'value'    => set_value('nro_registro', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha Registro', 'fecha_registro'); ?>
                                        <?php echo form_input([
                                            'id'       => 'fecha_registro',
                                            'name'     => 'fecha_registro',
                                            'class'    => 'form-control calendar',
                                            'value'    => set_value('fecha_registro', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-12">
                                        <?php echo form_label('Propietario', 'propietario_id'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'propietario_id',
                                            'name' => 'propietario_id',
                                            'class' => 'form-control',
                                            'options' => $propietarios
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Ciudad', 'ciudad_propietario'); ?>
                                        <?php echo form_input([
                                            'id'       => 'ciudad_propietario',
                                            'name'     => 'ciudad_propietario',
                                            'class'    => 'form-control',
                                            'value'    => set_value('ciudad_propietario', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Pais', 'pais_propietario'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'pais_propietario',
                                            'name' => 'pais_propietario',
                                            'class' => 'form-control',
                                            'options' => $paises
                                        ]); ?>
                                    </div>

                                    <div class="col-md-12">
                                        <?php echo form_label('Fundamento', 'fundamento'); ?>
                                        <?php echo form_textarea([
                                            'id' => 'fundamento',
                                            'name' => 'fundamento',
                                            'class' => 'form-control',
                                        ]); ?>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
                                    </ul>


                                </div>
                                <!-- Step 3 --->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="col-md-12">
                                        <?php echo form_label('Denominacion', 'marca_opuesta'); ?>
                                        <?php echo form_input([
                                            'id'       => 'marca_opuesta',
                                            'name'     => 'marca_opuesta',
                                            'class'    => 'form-control',
                                            'value'    => set_value('marca_opuesta', '')
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Clase', 'clase_niza'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'clase_niza',
                                            'name' => 'clase_niza',
                                            'class' => 'form-control',
                                            'options' => $clase_niza
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Pais', 'pais_id'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'pais_id_opuesta',
                                            'name' => 'pais_id_opuesta',
                                            'class' => 'form-control',
                                            'options' => $paises
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Nº Solicitud', 'nro_solicitud'); ?>
                                        <?php echo form_input([
                                            'id'       => 'nro_solicitud_opuesta',
                                            'name'     => 'nro_solicitud_opuesta',
                                            'class'    => 'form-control',
                                            'value'    => set_value('nro_solicitud_opuesta', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha Solicitud', 'fecha_solicitud_opuesta'); ?>
                                        <?php echo form_input([
                                            'id'       => 'fecha_solicitud_opuesta',
                                            'name'     => 'fecha_solicitud_opuesta',
                                            'class'    => 'form-control calendar',
                                            'value'    => set_value('fecha_solicitud_opuesta', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Nº Registro', 'nro_registro'); ?>
                                        <?php echo form_input([
                                            'id'       => 'nro_registro',
                                            'name'     => 'nro_registro_opuesta',
                                            'class'    => 'form-control',
                                            'value'    => set_value('nro_registro', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha Registro', 'fecha_registro_opuesta'); ?>
                                        <?php echo form_input([
                                            'id'       => 'fecha_registro_opuesta',
                                            'name'     => 'fecha_registro_opuesta',
                                            'class'    => 'form-control calendar',
                                            'value'    => set_value('fecha_registro_opuesta', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-12">
                                        <?php echo form_label('Propietario', 'propietario_opuesta'); ?>
                                        <?php echo form_input([
                                            'id' => 'propietario_opuesta',
                                            'name' => 'propietario_opuesta',
                                            'class' => 'form-control',
                                            'value' => set_value('propietario_opuesta', '')
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Ciudad', 'ciudad_propietario_opuesta'); ?>
                                        <?php echo form_input([
                                            'id'       => 'ciudad_propietario_opuesta',
                                            'name'     => 'ciudad_propietario_opuesta',
                                            'class'    => 'form-control',
                                            'value'    => set_value('ciudad_propietario_opuesta', '', TRUE),
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Pais', 'pais_propietario_opuesta'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'pais_propietario_opuesta',
                                            'name' => 'pais_propietario_opuesta',
                                            'class' => 'form-control',
                                            'options' => $paises
                                        ]); ?>
                                    </div>

                                    <div class="col-md-12">
                                        <?php echo form_label('Agente', 'agente'); ?>
                                        <?php echo form_input([
                                            'id' => 'agente',
                                            'name' => 'agente',
                                            'class' => 'form-control',
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Boletin', 'boletin'); ?>
                                        <?php echo form_dropdown([
                                            'id' => 'boletin',
                                            'name' => 'boletin',
                                            'class' => 'form-control',
                                            'options' => $boletines
                                        ]); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo form_label('Fecha', 'fecha_boletin'); ?>
                                        <?php echo form_input([
                                            'id' => 'fecha_boletin',
                                            'name' => 'fecha_boletin',
                                            'class' => 'form-control calendar',
                                            'value' => set_value('fecha', ''),
                                        ]); ?>
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
                                        <?php echo form_label('Estado de Solicitud', 'estado_id'); ?>
                                        <?php echo form_dropdown('estado_id', $estados_solicitudes, set_value('estado_id', ''), ['class' => 'form-control']); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo form_label('Comentarios', 'comentarios'); ?>
                                        <?php echo form_textarea([
                                            'id' => 'comentarios',
                                            'name' => 'comentarios',
                                            'class' => 'form-control',
                                            'value' => set_value('comentarios', '')
                                        ]); ?>
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
                                    <div class="col-md-12">
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
                                                <?php if (!empty($eventos)) { ?>
                                                    <?php foreach ($eventos as $row) { ?>
                                                        <tr eventosid="<?php echo $row['id']; ?>">
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row['tipo_evento']; ?></td>
                                                            <td><?php echo $row['comentarios']; ?></td>
                                                            <td><?php echo $row['fecha']; ?></td>
                                                            <form method="DELETE" action="<?php echo admin_url("pi/EventosController/destroy/{$row['id']}"); ?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                                <td>
                                                                    <a class="editeventos btn btn-light" data-toggle="modal" data-target="#eventoModalEdit"><i class="fas fa-edit"></i>Editar</a>
                                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else {
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
                                    <div class="col-md-12">

                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Atrás</button></li>
                                        <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                                        <li><button type="button" class="default-btn btn-primary next-step">Siguiente</button></li>
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
<?php $CI->load->view('acciones_terceros/modal.php');?>
<?php init_tail(); ?>

<?php $CI->load->view('acciones_terceros/js.php');?>
</body>

</html>