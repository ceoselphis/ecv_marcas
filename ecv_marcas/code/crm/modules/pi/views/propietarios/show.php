<?php
$CI = &get_instance();
init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="tab-content" id="main_form">
                            <!-- Step 1 -->
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo form_label('Código', 'codigo'); ?>
                                        <?php echo form_input([
                                            'id' => 'codigo',
                                            'name' => 'codigo',
                                            'required' => 'required',
                                            'class' => 'form-control',
                                            "disabled" => "disabled",
                                            'value' => set_value('codigo', $propietario['codigo']),
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Pais', 'pais_id'); ?>
                                        <?php echo form_dropdown('pais_id', $paises, set_value('pais_id', $propietario['pais_id']), ['class' => 'form-control', 'disabled' => 'disabled']) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Propietario', 'propietario') ?>
                                        <?php echo form_input([
                                            'id' => 'nombre_propietario',
                                            "name" => 'nombre_propietario',
                                            "value" => set_value('propietario', $propietario['nombre_propietario']),
                                            "class" => "form-control",
                                            "disabled" => "disabled",
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Estado Civil',); ?>
                                        <?php echo form_dropdown(
                                            [
                                                'id' => 'estado_civil',
                                                'name' => 'estado_civil',
                                                'options' => ['Soltero(a)', 'Casado(a)', 'Divorciado(a)', 'Viudo(a)', 'Concubinato(a)'],
                                                'selected' => set_value('estado_civil', $propietario['estado_civil']),
                                                'class' => 'form-control',
                                                'disabled' => 'disabled'
                                            ]
                                        ); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Representante Legal', 'representante_legal'); ?>
                                        <?php echo form_input('representante_legal',  set_value('representante_legal', $propietario['representante_legal']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo form_label('Direccion', 'direccion'); ?>
                                        <?php echo form_textarea('direccion',  set_value('direccion', $propietario['direccion']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Ciudad', 'ciudad'); ?>
                                        <?php echo form_input('ciudad',  set_value('ciudad', $propietario['ciudad']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Estado', 'estado'); ?>
                                        <?php echo form_input('estado',  set_value('estado', $propietario['estado']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Código Postal', 'codigo_postal'); ?>
                                        <?php echo form_input('codigo_postal',  set_value('codigo_postal', $propietario['codigo_postal']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_label('Actividad Comercial', 'actividad_comercial'); ?>
                                        <?php echo form_input('actividad_comercial',  set_value('actividad_comercial', $propietario['actividad_comercial']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php echo form_label('Datos Registro', 'actividad_comercial'); ?>
                                        <?php echo form_textarea('datos_registro',  set_value('datos_registro', $propietario['datos_registro']), ['class' => 'form-control', 'disabled' => 'disabled']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th></th>
                                    <th>Pais</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($marcas)) {
                                    foreach ($marcas as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['cod_contador']; ?></td>
                                            <td><?php echo $value['nombre']; ?></td>
                                            <td><?php echo $value['marca']; ?></td>
                                            <td><?php echo $value['signo']; ?></td>
                                            <td><?php echo $value['pais_nombre']; ?></td>
                                            <td><?php echo $value['company']; ?></td>
                                            <td><?php echo $value['estado']; ?></td>
                                            <td><a class="btn btn-sm btn-primary" href="<?php echo admin_url("pi/MarcasSolicitudesController/edit/" . $value['marca_id']); ?>"> Ver</a>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td> Sin marcas asociadas</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php init_tail(); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
<script>
    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
</script>
<script>
    new DataTable(".table-responsive", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>

</body>

</html>