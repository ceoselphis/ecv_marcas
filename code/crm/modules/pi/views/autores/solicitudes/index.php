<?php init_head(); ?>
<?php $CI = &get_instance();
$select = ['' => '']; ?>

<style>
    /* From bootstrap.css */
    .row-group {
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 10px;
    }

    .text-wrap {
        white-space: nowrap;
        text-align: left;
    }

</style>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a href="<?php echo admin_url('pi/AutoresSolicitudesController/create'); ?>"
                                class="btn btn-primary"><i class="fas fa-plus"></i> Nueva
                                Solicitud de Derecho Autor</a>
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
                                                <td>Título</td>
                                                <td>Estado</td>
                                                <td>Solicitud</td>
                                                <td>Fecha Solicitud</td>
                                                <td>Registro</td>
                                                <td>Pais</td>
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


                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Pais Solicitud -->
                            <div class="col-md-6  col-md-offset-3">
                                <?php echo form_label('Pais Solicitud', 'paisSol_id'); ?>
                                <?php $id_pais = $select + $id_pais; ?>
                                <?php echo form_dropdown([
                                    'id' => 'id_pais',
                                    'name' => 'id_pais',
                                    'class' => 'form-control',
                                    'options' => $id_pais,
                                    'selected' => set_value('id_pais'),
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Título Derecho Autor -->
                            <div class="col-md-3 col-md-offset-0">
                                <?php echo form_label('Título', 'titulo'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'titulo',
                                    'name' => 'titulo',
                                    'class' => 'form-control',
                                    'value' => set_value('titulo', ''),
                                    'placeholder' => 'Título Derecho Autor'
                                ]); ?>
                            </div>
                            <!-- Tipo -->
                            <div class="col-md-3">
                                <?php echo form_label('Tipo Derecho Autor', 'id_tipo_solicitud'); ?>
                                <?php $tipo_solicitud = $select + $tipo_solicitud;
                                echo form_dropdown(
                                    [
                                        'id' => 'id_tipo_solicitud',
                                        'name' => 'id_tipo_solicitud',
                                        'class' => 'form-control',
                                        'options' => $tipo_solicitud,
                                        'value' => set_value('id_tipo_solicitud')
                                    ],
                                ); ?>
                            </div>
                            <!-- Código Expediente -->
                            <div class="col-md-3 col-md-offset-0">
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
                            <!-- Referencia Interna -->
                            <div class="col-md-3 col-md-offset-0">
                                <?php echo form_label('Referencia Interna'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'ref_interna',
                                    'name' => 'ref_interna',
                                    'class' => 'form-control',
                                    'value' => set_value('ref_interna', ''),
                                    'placeholder' => 'Referencia Interna'
                                ]); ?>
                            </div>

                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Número de Solicitud -->
                            <div class="col-md-3 col-md-offset-0">
                                <?php echo form_label('Número de Solicitud'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'solicitud',
                                    'name' => 'solicitud',
                                    'class' => 'form-control',
                                    'value' => set_value('solicitud', ''),
                                    'placeholder' => 'Número de Solicitud'
                                ]); ?>
                            </div>
                            <!-- Número de Registro -->
                            <div class="col-md-3">
                                <?php echo form_label('Número de Registro'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'registro',
                                    'name' => 'registro',
                                    'class' => 'form-control',
                                    'value' => set_value('registro', ''),
                                    'placeholder' => 'Número de Registro'
                                ]); ?>
                            </div>
                            <!-- Fecha Solicitud Desde -->
                            <div class="col-md-3 col-md-offset-0">
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
                            <div class="col-md-3">
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
                            <div class="col-md-6 col-md-offset-0">
                                <?php echo form_label('Estado del Expediente', 'id_estado'); ?>
                                <?php $estados_solicitudes = $select + $estados_solicitudes;
                                echo form_dropdown(
                                    [
                                        'id' => 'id_estado',
                                        'name' => 'id_estado',
                                        'class' => 'form-control',
                                        'options' => $estados_solicitudes,
                                        'value' => set_value('id_estado')
                                    ],
                                ); ?>
                            </div>
                            <div class="col-md-6 col-md-offset-0">
                                <?php echo form_label('Tipo de Evento', 'tipo_evento'); ?>
                                <?php $tipo_evento = $select + $tipo_evento;
                                echo form_dropdown(
                                    [
                                        'id' => 'id_tipo_evento',
                                        'name' => 'id_tipo_evento',
                                        'class' => 'form-control',
                                        'options' => $tipo_evento,
                                        'value' => set_value('id_tipo_evento')
                                    ],
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Clientes -->
                            <div class="col-md-3 col-md-offset-0">
                                <?php echo form_label('Clientes', 'clientes'); ?>
                                <?php $clientes = $select + $clientes;
                                echo form_dropdown(
                                    [
                                        'id' => 'client_id',
                                        'name' => 'client_id',
                                        'class' => 'form-control',
                                        'options' => $clientes,
                                        'value' => set_value('client_id')
                                    ],
                                ); ?>
                            </div>
                            <!-- Pais Cliente -->
                            <div class="col-md-3">
                                <?php echo form_label('Pais Cliente', 'paisCli_id'); ?>
                                <?php $paisCli = $select + $paisCli; ?>
                                <?php echo form_dropdown([
                                    'id' => 'country',
                                    'name' => 'country',
                                    'class' => 'form-control',
                                    'options' => $paisCli,
                                    'selected' => set_value('country'),
                                ]); ?>
                            </div>
                            <!-- Propietarios -->
                            <div class="col-md-3 col-md-offset-0">
                                <?php echo form_label('Propietarios', 'propietarios'); ?>
                                <?php $propietarios = $select + $propietarios; ?>
                                <?php echo form_dropdown([
                                    'id' => 'id_propietario',
                                    'name' => 'id_propietario',
                                    'class' => 'form-control',
                                    'options' => $propietarios,
                                    'selected' => set_value('id_propietario'),
                                ]); ?>
                            </div>
                            <!-- Pais Propietario -->
                            <div class="col-md-3">
                                <?php echo form_label('Pais Propietario', 'paisProp_id'); ?>
                                <?php echo form_dropdown([
                                    'id' => 'paisProp_id',
                                    'name' => 'paisProp_id',
                                    'class' => 'form-control',
                                    'options' => $id_pais,
                                    'selected' => set_value('paisProp_id'),
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="limpiar" type="button" class="btn btn-gray">Limpiar</button>
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable("#tableResult", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });

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
        $(':input', '#filter').each(function () {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiar los valores de los campos
            if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = '';
            // los checkboxes y radios, le quitamos el checked
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los select quedan con indice -
            else if (tag == 'select') {
                this.selectedIndex = 0;
                $('select').selectpicker('refresh');
            }
        });
    });


    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        var params = {
            'id_pais': $("select[name=id_pais]").val(),
            'titulo': $("input[name=titulo]").val(),
            'id_tipo_solicitud': $("select[name=id_tipo_solicitud]").val(),
            'cod_contador': $("input[name=cod_contador]").val(),
            'ref_interna': $("input[name=ref_interna]").val(),
            'solicitud': $("input[name=solicitud]").val(),
            'registro': $("input[name=registro]").val(),
            'fecha_solicitud_desde': $("input[name=soli_desde]").val(),
            'fecha_solicitud_hasta': $("input[name=soli_hasta]").val(),
            'id_estado': $("select[name=id_estado]").val(),
            'id_tipo_evento': $("select[name=id_tipo_evento]").val(),
            'client_id': $("select[name=client_id]").val(),
            'country': $("select[name=country]").val(),
            'id_propietario': $("select[name=id_propietario]").val(),
            'paisProp_id': $("select[name=paisProp_id]").val(),

        };
        $.ajax({
            url: "<?php echo admin_url('pi/AutoresSolicitudesController/filterSearch') ?>",
            method: "POST",
            data: {
                "csrf_token_name": $("input[name=csrf_token_name]").val(),
                data: JSON.stringify(params),
            },
            success: function (response) {
                alert(response);
                table = JSON.parse(response);
                $("#tableResult").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table.data,
                    columns: [
                        { data: 'cod_contador' },
                        { data: 'tipo',
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }
                        },
                        { data: 'titulo',
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }
                        },
                        { data: 'estado_exp',
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }
                        },
                        { data: 'solicitud' },
                        { data: 'fecha_solicitud' },
                        { data: 'registro' },
                        { data: 'pais',
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }
                        },
                        { data: 'acciones' }
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