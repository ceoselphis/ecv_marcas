<?php
$CI = &get_instance();
init_head(); ?>
<style>
    /* From bootstrap.css */
    .row-group {
        margin-top: 15px;
        margin-right: 0px;
    }
</style>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">

                        <?php echo form_open(admin_url('pi/AutoresController/update/'.$id), ['id' => 'autoresFrm', 'name' => 'autoresFrm']); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Nombres', 'nombres'); ?>
                                <?php echo form_input([
                                    'id' => 'nombres',
                                    'name' => 'nombres',
                                    'required' => 'required',
                                    'class' => 'form-control',
                                    'maxlength' => '50',
                                    'value' => set_value('nombres', $values['nombres'])
                                ]); ?>
                                <?php echo form_error($fields[1]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Apellidos', 'apellidos'); ?>
                                <?php echo form_input([
                                    'id' => 'apellidos',
                                    'name' => 'apellidos',
                                    'required' => 'required',
                                    'class' => 'form-control',
                                    'maxlength' => '50',
                                    'value' => set_value('apellidos', $values['apellidos'])
                                ]); ?>
                                <?php echo form_error($fields[2]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Fec. Nacimiento', 'fecha_nac'); ?>
                                <?php echo form_input([
                                    'id' => 'fecha_nac',
                                    'name' => 'fecha_nac',
                                    'class' => 'form-control calendar',
                                    'value' => set_value('fecha_nac', $values['fecha_nac'])
                                ]); ?>
                            </div><!-- echo($values['pais_id_nac'] = strval($key) ? 'selected' : '') -->
                            <div class="col-md-6">
                                <?php echo form_label('Pais Nacimiento', 'pais_id_nac'); ?>
                                <select name="pais_id_nac" id="pais_id_nac" class='form-control'>
                                    <option value=''>Seleccione una opcion</option>
                                    <?php foreach ($Autores['Pais'] as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>" <?php  echo ($values['pais_id_nac'] == strval($key)) ? 'selected' : '';?>>
                                            <?php echo $value; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Cédula', 'cedula'); ?>
                                <?php echo form_input([
                                    'id' => 'cedula',
                                    'name' => 'cedula',
                                    'class' => 'form-control',
                                    'maxlength' => '10',
                                    'value' => set_value('cedula', $values['cedula']),
                                ]); ?>
                                <?php echo form_error($fields[5]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('RFC', 'rfc'); ?>
                                <?php echo form_input([
                                    'id' => 'rfc',
                                    'name' => 'rfc',
                                    'class' => 'form-control',
                                    'maxlength' => '20',
                                    'value' => set_value('rfc', $values['rfc']),
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Email', 'email'); ?>
                                <?php echo form_input([
                                    'id' => 'email',
                                    'name' => 'email',
                                    'class' => 'form-control',
                                    'maxlength' => '100',
                                    'value' => set_value('email', $values['email']),
                                ]); ?>
                                <?php echo form_error($fields[7]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Teléfono', 'telefono'); ?>
                                <?php echo form_input([
                                    'id' => 'telefono',
                                    'name' => 'telefono',
                                    'class' => 'form-control',
                                    'maxlength' => '30',
                                    'value' => set_value('telefono', $values['telefono']),
                                ]); ?>
                                <?php echo form_error($fields[8]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Fax', 'fax'); ?>
                                <?php echo form_input([
                                    'id' => 'fax',
                                    'name' => 'fax',
                                    'class' => 'form-control',
                                    'maxlength' => '30',
                                    'value' => set_value('fax', $values['fax']),
                                ]); ?>
                                <?php echo form_error($fields[9]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_label('Direccion', 'direccion'); ?>
                                <?php echo form_textarea('direccion', set_value('direccion', $values['direccion']), ['class' => 'form-control', 'maxlength' => '200']); ?>
                                <?php echo form_error($fields[10]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Ciudad', 'ciudad'); ?>
                                <?php echo form_input([
                                    'id' => 'ciudad',
                                    'name' => 'ciudad',
                                    'class' => 'form-control',
                                    'maxlength' => '20',
                                    'value' => set_value('ciudad', $values['ciudad']),
                                ]); ?>
                                <?php echo form_error($fields[11]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Estado', 'estado'); ?>
                                <?php echo form_input([
                                    'id' => 'estado',
                                    'name' => 'estado',
                                    'class' => 'form-control',
                                    'maxlength' => '20',
                                    'value' => set_value('estado', $values['estado']),
                                ]); ?>
                                <?php echo form_error($fields[12]['name'], '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo form_label('Código Postal', 'codigo_postal'); ?>
                                <?php echo form_input([
                                    'id' => 'codigo_postal',
                                    'name' => 'codigo_postal',
                                    'class' => 'form-control',
                                    'maxlength' => '10',
                                    'value' => set_value('codigo_postal', $values['codigo_postal']),
                                ]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo form_label('Pais Residencia', 'pais_id_res'); ?>
                                <select name="pais_id_res" id="pais_id_res" class='form-control'>
                                    <option value=''>Seleccione una opcion</option>
                                    <?php foreach ($Autores['Pais'] as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>" <?php echo ($values['pais_id_res'] == strval($key)) ? 'selected' : '';?>>
                                            <?php echo $value; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-group">
                            <ul class="list-inline pull-right mt-5">
                                <li><button id="cancelar" type="button" class="btn btn-secondary">Cancelar</button>
                                </li>
                                <li><button type="submit" class="btn btn-success"> Guardar</button></li>
                            </ul>
                        </div>
                        <?php echo form_close(); ?>
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
    function fecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if (dd < 10) {
            dd = '0' + dd;
        }
        else if (mm < 10) {
            mm = '0' + mm;
        }
        fecha = dd + "/" + mm + "/" + yy;
        return fecha;
    }


    $(".calendar").on('keyup', function (e) {
        e.preventDefault();
        $(".calendar").val('');
    })
    $(function () {
        $(".calendar").datetimepicker({
            maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker: false,
        });
    });

    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600,
    })
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });

    $("#cancelar").on('click', function (event) {
        location.href = "<?php echo site_url('pi/Autorescontroller/index'); ?>";
    });

</script>


<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    body {
        font-family: 'Roboto', sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
    }

    i {
        margin-right: 10px;
    }

    /*------------------------*/
    input:focus,
    button:focus,
    .form-control:focus {
        outline: none;
        box-shadow: none;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fff;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: #fdfdfd;
    }

    th,
    td {
        text-align: center;
    }
</style>

</body>

</html>