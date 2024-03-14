<?php init_head(); ?>
<?php $CI = &get_instance(); ?>
<style>
    /* From bootstrap.css */
    .row-group {
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 10px;
    }
</style>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a href="<?php echo admin_url('pi/MarcasSolicitudesController/create');?>" 
                            class="btn btn-primary"><i class="fas fa-plus"></i> Nueva
                                Solicitud de marca</a>
                            <button type="button" class="btn btn-default btn-outline pull-right" data-toggle="modal"
                                data-target="#filterModal"><i class="fas fa-filter"></i> Filtrar por</button>
                        </div>
                        <div class="_body">
                            <div class="row" style="padding: 2%;">
                                <div class="col-md-12 pre-scrollable">
                                    <table class="table" id="tableResult">
                                        <thead style="text-align: justify;">
                                            <tr>
                                                <td>Código</td>
                                                <td>Tipo</td>
                                                <td>Propietario</td>
                                                <td>Nombre</td>
                                                <td>Clases</td>
                                                <td>Estado</td>
                                                <td>Solicitud</td>
                                                <td>Fecha Solicitud</td>
                                                <td>Registro</td>
                                                <td>Certificado</td>
                                                <td>Vigencia</td>
                                                <td>Paises</td>
                                                <td>Acciones</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FilterModal -->

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Busqueda de Solicitudes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div role="tabpanel">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Parámetros</a>
                            </li>
                            <li role="presentation">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Más
                                    Parámetros</a>
                            </li>
                            <li role="presentation">
                                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Más
                                    Parámetros</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Código Expediente -->
                                        <div class="col-md-4 col-md-offset-0">
                                            <label for="cod_contador">
                                                <?php echo ('Código Expediente'); ?>
                                            </label>
                                            <?php
                                            echo form_input([
                                                'id' => 'cod_contador',
                                                'name' => 'cod_contador',
                                                'class' => 'form-control',
                                                'value' => set_value('cod_contador', ''),
                                                'placeholder' => 'Código Expediente'
                                            ]); ?>
                                        </div>
                                        <!-- Pais Solicitud -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Pais Solicitud', 'paisSol_id'); ?>
                                            <select name="paisSol_id" id="paisSol_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Pais'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Marca -->
                                        <div class="col-md-4 col-md-offset-0">
                                            <?php echo form_label('Marca'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'marca',
                                                'name' => 'marca',
                                                'class' => 'form-control',
                                                'value' => set_value('marca', ''),
                                                'placeholder' => 'Marca'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Clientes -->
                                        <div class="col-md-4 col-md-offset-0">
                                            <?php echo form_label('Clientes', 'client_id'); ?>
                                            <select class='form-control' name='client_id' id="client_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Clientes'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Pais Cliente -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Pais Cliente', 'paisCli_id'); ?>
                                            <select name="paisCli_id" id="paisCli_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Pais'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Contacto -->
                                        <div class="col-md-4">
                                            <label for="contacto_id">
                                                <?php echo ('Contacto'); ?>
                                            </label>
                                            <select class='form-control' name='contacto_id' id="contacto_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['contactos'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Propietarios -->
                                        <div class="col-md-4">
                                            <label for="propietario_id">
                                                <?php echo ('Propietarios'); ?>
                                            </label>
                                            <select class='form-control' name='propietario_id' id="propietario_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Pais Propietario -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Pais Propietario', 'paisProp_id'); ?>
                                            <select name="paisProp_id" id="paisProp_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Pais'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Clase Niza -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Clase Niza', 'clase_niza_id'); ?>
                                            <select name="clase_niza_id" id="clase_niza_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Clase Niza'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Ref Cliente -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Referencia Cliente'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'refCliente',
                                                'name' => 'refCliente',
                                                'class' => 'form-control',
                                                'value' => set_value('refCliente', ''),
                                                'placeholder' => 'Referencia Cliente'
                                            ]); ?>
                                        </div>
                                        <!-- Referencia Interna -->
                                        <div class="col-md-4 col-md-offset-0">
                                            <?php echo form_label('Referencia Interna'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'refInterna',
                                                'name' => 'refInterna',
                                                'class' => 'form-control',
                                                'value' => set_value('refInterna', ''),
                                                'placeholder' => 'Referencia Interna'
                                            ]); ?>
                                        </div>
                                        <!-- Número de Solicitud -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Número de Solicitud'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'num_solicitud',
                                                'name' => 'num_solicitud',
                                                'class' => 'form-control',
                                                'value' => set_value('num_solicitud', ''),
                                                'placeholder' => 'Número de Solicitud'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Número de Registro -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Número de Registro'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'num_registro',
                                                'name' => 'num_registro',
                                                'class' => 'form-control',
                                                'value' => set_value('num_registro', ''),
                                                'placeholder' => 'Número de Registro'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Fecha Solicitud Desde -->
                                        <div class="col-md-4 col-md-offset-2">
                                            <?php echo form_label('Solicitud Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'soli_desde',
                                                'name' => 'soli_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('soli_desde', ''),
                                                'placeholder' => 'Solicitud Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Fecha Solicitud Hasta -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Solicitud Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'soli_hasta',
                                                'name' => 'soli_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('soli_hasta', ''),
                                                'placeholder' => 'Solicitud Hasta'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Vigencia Desde -->
                                        <div class="col-md-4 col-md-offset-2">
                                            <?php echo form_label('Vigencia Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'vigencia_desde',
                                                'name' => 'vigencia_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('vigencia_desde', ''),
                                                'placeholder' => 'Vigencia Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Vigencia Hasta -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Vigencia Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'vigencia_hasta',
                                                'name' => 'vigencia_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('vigencia_hasta', ''),
                                                'placeholder' => 'Vigencia Hasta'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Estado de Solicitud -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Estado de Solicitud', 'est_sol_id'); ?>
                                            <select name="est_sol_id" id="est_sol_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Estado de Solicitud'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Boletines -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Boletines', 'boletin_id'); ?>
                                            <select class='form-control' name='boletin_id' id="boletin_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Boletines'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Tipo de Publicación -->
                                        <div class="col-md-4">
                                            <label for="tipo_publicacion_id">
                                                <?php echo ('Tipo de Publicación '); ?>
                                            </label>
                                            <select class='form-control' name='tipo_publicacion_id'
                                                id="tipo_publicacion_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['tipo publicacion'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Tipo de Evento -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Tipo de Evento', 'tip_eve_id'); ?>
                                            <select name="tip_eve_id" id="tip_eve_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Tipo de Evento'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Evento Desde -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Evento Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'evento_desde',
                                                'name' => 'evento_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('evento_desde', ''),
                                                'placeholder' => 'Evento Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Evento Hasta -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Evento Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'evento_hasta',
                                                'name' => 'evento_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('evento_hasta', ''),
                                                'placeholder' => 'Evento Hasta'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Tipo de Solicitud -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Tipo de Solicitud', 'tip_sol_id'); ?>
                                            <select name="tip_sol_id" id="tip_sol_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Tipo de Solicitud'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Oficinas -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Oficinas', 'oficina_id'); ?>
                                            <select class='form-control' name='oficina_id' id="oficina_id">
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Oficinas'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Responsables -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Responsables', 'responsable_id'); ?>
                                            <select class='form-control' name='responsable_id' id='responsable_id'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Responsables'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Tipos de Signo -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Tipos de Signo', 'tip_signo_id'); ?>
                                            <select name="tip_signo_id" id="tip_signo_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Tipos de Signo'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Tipo de Registro -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Tipo de Registro', 'tip_reg_id'); ?>
                                            <select name="tip_reg_id" id="tip_reg_id" class='form-control'>
                                                <option value=''>Seleccione una opcion</option>
                                                <?php foreach ($marcas['Tipo de Registro'] as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Cobertura -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Cobertura'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'cobertura',
                                                'name' => 'cobertura',
                                                'class' => 'form-control',
                                                'value' => set_value('cobertura', ''),
                                                'placeholder' => 'Cobertura'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Prueba de Uso -->
                                        <div class="col-md-4 col-md-offset-2">
                                            <?php echo form_label('Prueba de Uso Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'prueba_uso_desde',
                                                'name' => 'prueba_uso_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('prueba_uso_desde', ''),
                                                'placeholder' => 'Prueba de Uso Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Evento Hasta -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Prueba de Uso Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'prueba_uso_hasta',
                                                'name' => 'prueba_uso_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('prueba_uso_hasta', ''),
                                                'placeholder' => 'Prueba de Uso Hasta'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-group">
                                        <!-- Registro -->
                                        <div class="col-md-4 col-md-offset-2">
                                            <?php echo form_label('Registro Desde'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'registro_desde',
                                                'name' => 'registro_desde',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('registro_desde', ''),
                                                'placeholder' => 'Registro Desde'
                                            ]); ?>
                                        </div>
                                        <!-- Evento Hasta -->
                                        <div class="col-md-4">
                                            <?php echo form_label('Registro Hasta'); ?>
                                            <?php
                                            echo form_input([
                                                'id' => 'registro_hasta',
                                                'name' => 'registro_hasta',
                                                'class' => 'form-control calendar',
                                                'value' => set_value('prueba_uso_hasta', ''),
                                                'placeholder' => 'Registro Hasta'
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="limpiar"  type="button" class="btn btn-gray">Limpiar</button>
                <button id="filterSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Buscar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>


<?php init_tail(); ?>

<style>
    th {
        text-align: center;
    }
</style>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    function getFormData() {
        var config = {};
        $('input').each(function () {
            config[this.name] = this.value;
        });
        $("select").each(function () {
            config[this.name] = this.value;
        });
        return config;
    }
</script>
<script>
    //Insertar Solicitudes Marcas
    $(document).on('click', '#InsertarSolicitudesMarcas', function (e) {
        e.preventDefault();
        console.log("LLegue a Insertar Solicitudes Marcas")
        var formData = new FormData();
        var data = getFormData(this);
        const csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        console.log('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/MarcasSolicitudesController/addSolicitudesMarcas"); ?>';
        let solicitudesEdit = '<?php echo admin_url('pi/MarcasSolicitudesController/edit/'); ?>';
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function (response) {
            console.log("response ", response);
            solicitudesEdit = solicitudesEdit + response;
            location.replace(solicitudesEdit);
        }).catch(function (response) {
            alert("No se pudo Insertar Solicitud de Marcas");
        });
    });
</script>
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".table", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script> -->

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    $("#tableResult").DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        },
        destroy: true,
    });
</script>
<script>
    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
    $("select[multiple=multiple]").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });

    $("#limpiar").on('click', function (event) {
        // recorrer todos los campos
        $(':input', '#filter').each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiar los valores de los campos
            if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
            // los checkboxes y radios, le quitamos el checked
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los select quedan con indice -
            else if (tag == 'select'){
                this.selectedIndex = 0;
                $('select').selectpicker('refresh'); 
            }
        });
    });


    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        /* var params = {
            'i.id': $("select[name=pais_id]").val(),
            's.boletin_id': $("select[name=boletin_id]").val(),
            'a.client_id': $("select[name=client_id]").val(),
            'a.oficina_id': $("select[name=oficina_id]").val(),
            'a.staff_id': $("select[name=staff_id]").val(),
            'a.tipo_solicitud_id': $("select[name=tip_sol_id]").val(),
            'a.estado_id': $("select[name=est_sol_id]").val(),
            'a.tipo_signo_id': $("select[name=tip_signo_id]").val(),
            'f.clase_niza_id': $("select[name=clase_niza_id]").val(),
            'a.tipo_registro_id': $("select[name=tip_reg_id]").val(),
            'm.tipo_evento_id': $("select[name=tip_eve_id]").val()
        }; */
        var params = {
            'cod_contador': $("input[name=cod_contador]").val(),
            'id_pais_solicitud': $("select[name=paisSol_id]").val(),
            'marca': $("input[name=marca]").val(),
            'id_cliente': $("select[name=client_id]").val(),
            'id_pais_cliente': $("select[name=paisCli_id]").val(),
            'id_contacto': $("select[name=contacto_id]").val(),
            'id_propietario': $("select[name=propietario_id]").val(),
            'id_pais_propietario': $("select[name=paisProp_id]").val(),
            'clase_niza_id': $("select[name=clase_niza_id]").val(),
            'ref_cliente': $("input[name=refCliente]").val(),
            'ref_interna': $("input[name=refInterna]").val(),
            'num_solicitud': $("input[name=num_solicitud]").val(),
            'num_registro': $("input[name=num_registro]").val(),
            'fecha_solicitud_desde': $("input[name=soli_desde]").val(),
            'fecha_solicitud_hasta': $("input[name=soli_hasta]").val(),
            'fecha_vencimiento_desde': $("input[name=vigencia_desde]").val(),
            'fecha_vencimiento_hasta': $("input[name=vigencia_hasta]").val(),
            'id_estado_solicitud': $("select[name=est_sol_id]").val(),
            'id_boletin': $("select[name=boletin_id]").val(),
            'id_tipo_publicacion': $("select[name=tipo_publicacion_id]").val(),
            'id_tipo_evento': $("select[name=tip_eve_id]").val(),
            'fecha_evento_desde': $("input[name=evento_desde]").val(),
            'fecha_evento_hasta': $("input[name=evento_hasta]").val(),
            'id_solicitud': $("select[name=tip_sol_id]").val(),
            'oficina_id': $("select[name=oficina_id]").val(),
            'id_responsable': $("select[name=responsable_id]").val(),
            'id_tipo_signo': $("select[name=tip_signo_id]").val(),
            'id_tipo_registro': $("select[name=tip_reg_id]").val(),
            'descripcion_niza': $("input[name=cobertura]").val(),
            'prueba_uso_desde': $("input[name=prueba_uso_desde]").val(),
            'prueba_uso_hasta': $("input[name=prueba_uso_hasta]").val(),
            'fecha_registro_desde': $("input[name=registro_desde]").val(),
            'fecha_registro_hasta': $("input[name=registro_hasta]").val()

        };
        $.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/filterSearch') ?>",
            method: "POST",
            data: {
                "csrf_token_name": $("input[name=csrf_token_name]").val(),
                data: JSON.stringify(params),
            },
            success: function (response) {
                table = JSON.parse(response);
                $("#tableResult").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table.data,
                    columns: [
                        { data: 'cod_contador' },
                        { data: 'tipo' },
                        { data: 'propietario' },
                        { data: 'nombre' },
                        { data: 'clase' },
                        { data: 'estado' },
                        { data: 'solicitud' },
                        { data: 'fecha_solicitud' },
                        { data: 'registro' },
                        { data: 'certificado' },
                        { data: 'vigencia' },
                        { data: 'pais' },
                        { data: 'acciones' },
                    ]
                });
            }
        })
    })


    //-----------------------------------------------

    var formData = new FormData();
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
            //maxDate: fecha(),
            weeks: true,
            format: 'd/m/Y',
            timepicker: false,
        });
    });



</script>


</body>

</html>