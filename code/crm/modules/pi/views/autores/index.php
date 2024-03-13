<?php 
$CI = &get_instance();
init_head(); ?>
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

    .col-mrg {
        margin-left: 15px;
        margin-right: 20px;
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
                                href="<?php echo admin_url('pi/AutoresController/create'); ?>"><i
                                    class="fas fa-plus"></i> Nuevo Autor</a>
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
                                        <th>Apellido</th>
                                        <th>Pais Nacimiento</th>
                                        <th>Pais Residencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="body_autores">

                                </tbody>
                            </table>
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
                <h4 class="modal-title" id="exampleModalLabel">Busqueda de Autores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row row-group">
                            <!-- Nombre -->
                            <div class="col-md-4">
                                <?php echo form_label('Nombres', 'nombres'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'nombres',
                                    'name' => 'nombres',
                                    'class' => 'form-control objsrc',
                                    'value' => set_value('nombres', ''),
                                    'placeholder' => 'Nombres'
                                ]); ?>
                            </div>
                            <!-- Apellidos -->
                            <div class="col-md-4">
                                <?php echo form_label('Apellidos', 'apellidos'); ?>
                                <?php
                                echo form_input([
                                    'id' => 'apellidos',
                                    'name' => 'apellidos',
                                    'class' => 'form-control objsrc',
                                    'value' => set_value('apellidos', ''),
                                    'placeholder' => 'Apellidos'
                                ]); ?>
                            </div>
                            <!-- Pais Nacimiento-->
                            <div class="col-md-4">
                                <?php echo form_label('Pais Residencia', 'pais_id_res'); ?>
                                <select name="pais_id_res" id="pais_id_res" class='form-control objsrc'>
                                    <option value=''>Seleccione una opcion</option>
                                    <?php foreach ($Autores['Pais'] as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>">
                                            <?php echo $value; ?>
                                        </option>
                                    <?php } ?>
                                </select>
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
        virtualScroll: 600,
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
                //this.value = '';
                this.selectedIndex = 0;
                $('select').selectpicker('refresh'); 
            }
        });
    });

    $("#filterSubmit").on('click', function (event) {
        event.preventDefault();
        var params = {
            'a.nombres': $("input[name=nombres]").val(),
            'a.apellidos': $("input[name=apellidos]").val(),
            'a.pais_id_res': $("select[name=pais_id_res]").val()
        };
        $.ajax({
            url: "<?php echo admin_url('pi/AutoresController/filterSearch') ?>",
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
                        { data: 'id' },
                        { data: 'nombre'/* ,
                            render: function (data, type, row)
                            {
                                return "<div class='text-wrap'>" + data + "</div>"
                            }  */
                        },
                        { data: 'apellido' },
                        { data: 'pais_id_nac' },
                        { data: 'pais_id_res' },
                        { data: 'acciones' },
                    ]
                });
            }
        })
    })




</script>
