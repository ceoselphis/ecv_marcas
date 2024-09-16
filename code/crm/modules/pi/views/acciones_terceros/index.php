<?php

use PayPalHttp\Serializer\Form;

init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/AccionesTerceroController/create'); ?>"><i class="fas fa-plus"></i> Nueva Accion a Terceros</a>
                            <button class="btn btn-white pull-right" data-toggle="modal" data-target="#search"><i class="fas fa-filter"></i> </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="tableResult">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Tipo</th>
                                        <th>Demandante</th>
                                        <th>Demandado</th>
                                        <th>Objeto</th>
                                        <th>Nº solicitud</th>
                                        <th>Fecha Solicitud</th>
                                        <th>Estado</th>
                                        <th>Pais</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="body_accionesterceros" >
                                   
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

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']); ?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Búsqueda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo form_label('Marca', 'denominacion'); ?>
                        <select class='form-control' name='denominacion' id="denominacion">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['marcas'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Solicitud', 'solicitud'); ?>
                        <?php echo form_input('solicitud', set_value('solicitud', ''), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Clases', 'clase_niza'); ?>
                        <select class='form-control' name='clase_niza' id="clase_niza">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Propietario', 'propietario_id'); ?>
                        <select class='form-control' name='propietario_id' id='propietario_id'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['propietarios'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Registro', 'nro_registro'); ?>
                        <?php echo form_input('nro_registro', set_value('nro_registro'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Pais', 'pais_marca'); ?>
                        <select name="pais_marca" id="pais_marca" class='form-control'>
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['paises'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Marca opuesta', 'marca_opuesta'); ?>
                        <?php echo form_input('marca_opuesta', set_value('marca_opuesta'), ['class' => 'form-control']); ?>
                    </div>

                    <div class="col-md-4">
                        <?php echo form_label('Clase opuesta', 'clase_niza_opuesta'); ?>
                        <select class='form-control' name='clase_niza_opuesta' id="clase_niza_opuesta">
                            <option value=''>Seleccione una opcion</option>
                            <?php foreach ($marcas['clase_niza'] as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Nº registro opuesta', 'registro_opuesta'); ?>
                        <?php echo form_input('registro_opuesta', set_value('registro_opuesta'), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Nº Solicitud opuesta', 'solicitud_opuesta'); ?>
                        <?php echo form_input('solicitud_opuesta', set_value('solicitud_opuesta'), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Solicitud desde', 'solicitud_desde'); ?>
                        <?php echo form_input('solicitud_desde', set_value('solicitud_desde'), ['class' => 'form-control calendar']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_label('Solicitud hasta', 'solicitud_hasta'); ?>
                        <?php echo form_input('solicitud_hasta', set_value('solicitud_hasta'), ['class' => 'form-control calendar']); ?>
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

<style>
    th,
    td {
        text-align: center;
    }
</style>

<?php init_tail(); ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>

    AccionesTerceros()
       // Mostrar Todo Acciones a Terceros
    function AccionesTerceros() {
        let url = '<?php echo admin_url("pi/AccionesTerceroController/ShowAccionesTerceros");?>';
        console.log(url);
        let body = ``;
        $.get(url, function (response) {
           
            let lista = JSON.parse(response).data;
            console.log("Acciones a Terceros ",lista);

            if (lista.length === 0) {
                $('#body_accionesterceros').html(`
                        <tr colspan="3">
                            <td>Sin Registros</td>
                        </tr>`);
            }
            lista.forEach(item => {
                url = "<?php echo admin_url("pi/AccionesTerceroController/edit/"); ?>";
                url = url + item.codigo;
                body += `<tr AccionesTercerosid = "${item.id}"> 
                                    <td class="text-center">${item.codigo}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.demandante}</td>
                                    <td class="text-center">${item.demandado}</td>
                                    <td class="text-center">${item.objeto}</td>
                                    <td class="text-center">${item.nro_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.pais}</td>
                                        <td class="text-center">
                                            <a class="btn btn-light" href="${url}" style= "background-color: white;" ><i class="fas fa-edit"></i>Editar</a>
                                            <button id="AccionesTerceros-delete" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Borrar
                                            </button>
                                        </td>
                                </tr>
                            `
            });
            $('#body_accionesterceros').html(body);
        })
    }

    // new DataTable("#tableResult", {
    //     destroy: true,
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
    //     },
    //     ajax: {
    //         url: '<?php echo admin_url('pi/AccionesTerceroController/ShowAccionesTerceros'); ?>',
    //         dataSrc: 'data'
    //     },
    //     columns: [{
    //             data: 'codigo'
    //         },
    //         {
    //             data: 'tipo'
    //         },
    //         {
    //             data: 'demandante'
    //         },
    //         {
    //             data: 'demandado'
    //         },
    //         {
    //             data: 'objeto'
    //         },
    //         {
    //             data: 'nro_solicitud'
    //         },
    //         {
    //             data: 'fecha_solicitud'
    //         },
    //         {
    //             data: 'estado'
    //         },
    //         {
    //             data: 'pais'
    //         },
    //         {
    //             data: 'acciones'
    //         }
    //     ]
    // });


    function fecha() {
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth() + 1;
        var yy = hoy.getFullYear();
        var fecha = '';
        if (dd < 10) {
            dd = '0' + dd;
            var formData = new FormData();

            function fecha() {
                var hoy = new Date();
                var dd = hoy.getDate();
                var mm = hoy.getMonth() + 1;
                var yy = hoy.getFullYear();
                var fecha = '';
                if (dd < 10) {
                    dd = '0' + dd;
                } else if (mm < 10) {
                    mm = '0' + mm;
                }
                fecha = dd + "/" + mm + "/" + yy;
                return fecha;
            }
        }
    }

    $(".calendar").on('keyup', function(e) {
        e.preventDefault();
        $(".calendar").val('');
    })
    $(function() {
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
</script>

<script>
    $("#filter").on('submit', function(e){
        e.preventDefault();
        var data = {
            'denominacion'          : $("select[name=denominacion]").val(),
            'solicitud'             : $("input[name=solicitud]").val(),
            'clase_niza'            : $("select[name=clase_niza]").val(),
            'propietario'           : $("select[name=propietario_id]").val(),
            'nro_registro'          : $("input[name=nro_registro]").val(),
            'pais_marca'            : $("select[name=pais_marca]").val(),
            'marca_opuesta'         : $("input[name=marca_opuesta]").val(),
            'clase_niza_opuesta'    : $("select[name=clase_niza_opuesta]").val(),
            'registro_opuesta'      : $("input[name=registro_opuesta]").val(),
            'solicitud_opuesta'     : $("input[name=solicitud_opuesta]").val(),
            'solicitud_desde'       : $("input[name=solicitud_desde]").val(),
            'solicitud_hasta'       : $("input[name=solicitud_hasta]").val(),
            'csrf_token_name'       : $("input[name=csrf_token_name]").val()
        }

        $.ajax({
            url: <?php echo admin_url('pi/AccionesTerceroController/search');?>,
            method: "POST",
            data: data,
            success: function (response)
            {
                console.log(response);
            }
        })
    });
</script>


</body>

</html>


 <!-- 
 <?php //if (!empty($acciones)) { ?>
                                        <?php //foreach ($acciones as $row) { ?>
                                            <tr>
                                                <td><?php //echo $row['id']; ?></td>
                                                <td><?php //echo $row['tipo_solicitud']; ?></td>
                                                <td><?php //echo $row['cliente']; ?></td>
                                                <td><?php //echo $row['propietario']; ?></td>
                                                <td><?php //echo $row['marca']; ?></td>
                                                <td><?php //echo $row['nro_solicitud']; ?></td>
                                                <td><?php //echo $row['fecha_solicitud']; ?></td>
                                                <td><?php //echo $row['marca']; ?></td>
                                                <form method="DELETE" action="<?php //echo admin_url("pi/AccionesTerceroController/destroy/{$row['tip_ax_id']}"); ?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                    <td>
                                                        <a class="btn btn-light" href="<?php //echo admin_url("pi/AccionesTerceroController/edit/{$row['tip_ax_id']}"); ?>"><i class="fas fa-edit"></i>Editar</a>
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        <?php //} ?>
                                    <?php //} else {
                                    ?>
                                        <tr colspan="9">
                                            <td>Sin Registros</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php //} ?>

-->