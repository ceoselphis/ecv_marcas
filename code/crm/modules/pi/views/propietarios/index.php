<?php init_head(); ?>
<style>
    /* From bootstrap.css */
    .row-group {
        margin-left: 2px;
        margin-right: 2px;
        margin-bottom: 10px;
    }
    .text-wrap{
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
                            <a class="btn btn-primary"
                                href="<?php echo admin_url('pi/PropietariosController/create'); ?>"><i
                                    class="fas fa-plus"></i> Nuevo propietario</a>
                            <a class="btn btn-primary"
                                href="<?php echo admin_url('pi/PropietariosController/generateReport'); ?>"><i
                                    class="fas fa-file-pdf"></i> Generar Reporte</a>
                            <button type="button" class="btn btn-default btn-outline pull-right" data-toggle="modal"
                                data-target="#filterModal"><i class="fas fa-filter"></i> Filtrar por</button>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 pre-scrollable">
                            <table class="table" id="tableResult">
                                <thead>
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Pais</th>
                                        <th>Nº Poder</th>
                                        <th>Fecha Creacion</th>
                                        <th>Creado por</th>
                                        <th>Fecha Modificacion</th>
                                        <th>Modificado Por</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="body_propietarios">

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

<!-- FilterModal -->

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Busqueda de Propietarios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Código Propietario -->
                            <div class="col-md-4 col-md-offset-0">
                                <label for="codigo_id">
                                    <?php echo ('Código Propietario'); ?>
                                </label>
                                <?php
                                echo form_input([
                                    'id' => 'codigo_id',
                                    'name' => 'codigo_id',
                                    'class' => 'form-control',
                                    'value' => set_value('codigo_id', ''),
                                    'placeholder' => 'Código Propietario'
                                ]); ?>
                            </div>
                            <!-- Nombre -->
                            <div class="col-md-4">
                                <?php echo form_label('Nombre', 'nombre'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'nombre',
                                    'name' => 'nombre',
                                    'class' => 'form-control',
                                    'value' => set_value('nombre', ''),
                                    'placeholder' => 'Nombre'
                                ]); ?>
                            </div>
                            <!-- Pais -->
                            <div class="col-md-4">
                                <?php echo form_label('Pais', 'id_pais'); ?>
                                <select name="id_pais" id="id_pais" class='form-control'>
                                    <option value=''>Seleccione una opcion</option>
                                    <?php foreach ($propietarios['pais'] as $key => $value) { ?>
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
                            <!-- N° Poder -->
                            <div class="col-md-4">
                                <?php echo form_label('N° Poder', 'num_poder'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'num_poder',
                                    'name' => 'num_poder',
                                    'class' => 'form-control',
                                    'value' => set_value('num_poder', ''),
                                    'placeholder' => 'N° Poder'
                                ]); ?>
                            </div>
                            <!-- Fecha Creación Desde -->
                            <div class="col-md-4">
                                <?php echo form_label('Fecha Creación Desde', 'fecha_desde'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'fecha_desde',
                                    'name' => 'fecha_desde',
                                    'class' => 'form-control calendar',
                                    'value' => set_value('fecha_desde', ''),
                                    'placeholder' => 'Fecha Creación Desde'
                                ]); ?>
                            </div>
                            <!-- Fecha Creación Hasta -->
                            <div class="col-md-4">
                                <?php echo form_label('Fecha Creación Hasta', 'fecha_hasta'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'fecha_hasta',
                                    'name' => 'fecha_hasta',
                                    'class' => 'form-control calendar',
                                    'value' => set_value('fecha_hasta', ''),
                                    'placeholder' => 'Fecha Creación Hasta'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding-top: 1.5%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="reset" class="btn btn-gray">Limpiar</button>
                <button id="filterSubmit" type="button" class="btn btn-primary" data-dismiss="modal">Buscar</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php init_tail(); ?>

<style>
    th,
    td {
        text-align: center;
    }
</style>

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
</script>
<script>
    /* $(document).ready(function () {
        $("#BotonFiltrar").click(function () {
            console.log("Boton Filtrar");
            $("#FiltrarPropietarios").modal('show');
        });
    }) */
    //Propietarios();
    function Propietarios() {
        let url = '<?php echo admin_url("pi/PropietariosController/showPropietarios/"); ?>';
        let eliminar = '<?php echo admin_url("pi/PropietariosController/destroy/"); ?>';
        let modificar = '<?php echo admin_url("pi/PropietariosController/edit/"); ?>'
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
            let listadomicilio = JSON.parse(response);
            console.log(listadomicilio);
            listadomicilio.forEach(item => {
                eliminar = eliminar + item.id;
                modificar = modificar + item.id;
                body += `<tr Propietariosid = "${item.id}"> 
                                    <td >${item.codigo}</td>
                                    <td >${item.nombre}</td>
                                    <td >${item.pais}</td>
                                    <td >${item.poder_num}</td>
                                    <td >${item.fecha_creacion}</td>
                                    <td >${item.creado_por}</td>
                                    <td >${item.fecha_modificacion}</td>
                                    <td >${item.modificado_por}</td>
                                    <form method="DELETE" action="${eliminar}" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                    <td>
                                        <a class="btn btn-light" href="${modificar}"><i class="fas fa-edit"></i>Editar</a>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                    </td>
                                    </form> 
                                </tr>
                            `
            });
            $('#body_propietarios').html(body);
        })
    }


    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        var params = {
            'a.codigo': $("input[name=codigo_id]").val(),
            'a.nombre_propietario': $("input[name=nombre]").val(),
            'a.pais_id': $("select[name=id_pais]").val(),
            'b.numero': $("input[name=num_poder]").val(),
            'fecha_desde': $("input[name=fecha_desde]").val(),
            'fecha_hasta': $("input[name=fecha_hasta]").val()

        };
        $.ajax({
            url: "<?php echo admin_url('pi/PropietariosController/filterSearch') ?>",
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
                        //{ data: 'id' },
                        { data: 'codigo' },
                        { data: 'nombre'/* ,
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }  */
                        },
                        { data: 'pais' },
                        { data: 'poder_num' },
                        { data: 'fecha_creacion' },
                        { data: 'creado_por' },
                        { data: 'fecha_modificacion' },
                        { data: 'modificado_por' },
                        { data: 'acciones' },
                    ]
                });
            }
        })
    })

    $("select").selectpicker({
        liveSearch: true,
        virtualScroll: 600
    });
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
</script>
</body>

</html>