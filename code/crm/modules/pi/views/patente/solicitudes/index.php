<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$isGridView = 0;
if ($this->session->has_userdata('mindmap_grid_view') && $this->session->userdata('mindmap_grid_view') == 'true') {
    $isGridView = 1;
}
?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="_filters _hidden_inputs hidden">
                        <?php echo render_select('states', ["Todos", "Estado 1"], ["form-control"]);?>
                    </div>

                    <div class="panel-body">
                        <div class="_buttons">
                            <?php if(has_permission('mindmap','','create')){ ?>
                                <a href="<?php echo admin_url('pi/patentes/SolicitudesController/create'); ?>" class="btn btn-info pull-left display-block mright5">Nueva solicitud</a>
                            <?php } ?>
                            <div class="visible-xs">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        <div class="clearfix mtop20"></div>
                        <div class="row" id="mindmap-table">
                            <?php if($isGridView ==0){ ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="bold"><?php echo _l('Filtrar por'); ?></p>
                                    </div>
                                    <?php if(has_permission('mindmap','','view')){ ?>
                                        <div class="col-md-3 mindmap-filter-column">
                                            <?php echo render_select('view_assigned',[],array('staffid',array('firstname','lastname')),'','',array('data-width'=>'100%','data-none-selected-text'=>_l('mindmap_staff')),array(),'no-mbot'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-3 mindmap-filter-column">
                                        <?php echo render_select('view_group',[],array('id',array('name')),'','',array('data-width'=>'100%','data-none-selected-text'=>_l('mindmap_group')),array(),'no-mbot'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr class="hr-panel-heading" />
                            <?php } ?>
                            <div class="col-md-12">
                            <?php render_datatable(array(
                                _l('mindmap_title'),
                                _l('mindmap_desc'),
                                _l('mindmap_staff'),
                                _l('mindmap_group'),
                                _l('mindmap_created_at')
                            ),'mindmap', array('customizable-table'),
                              array(
                                  'id'=>'table-mindmap',
                                  'data-last-order-identifier'=>'mindmap',
                                  'data-default-order'=>get_table_last_order('mindmap'),
                              )); ?>
                        </div>
                        </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mindmap Modal-->
<div class="modal fade mindmap-modal" id="mindmap-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content data">

        </div>
    </div>
</div>
<?php init_tail(); ?>
<script src="<?php echo base_url();?>modules/mindmap/assets/js/mind-elexir.js"></script>
<script>
    var _lnth = 12;
$(function(){
    var TblServerParams = {
        "assigned": "[name='view_assigned']",
        "group": "[name='view_group']",
    };

    if(<?php echo $isGridView ?> == 0) {
        var tAPI = initDataTable('.table-mindmap', admin_url+'mindmap/table', [2, 3], [2, 3], TblServerParams);

        $.each(TblServerParams, function(i, obj) {
            $('select' + obj).on('change', function() {
                $('table.table-mindmap').DataTable().ajax.reload()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });

    }else{
        loadGridView();

        $(document).off().on('click','a.paginate',function(e){
            e.preventDefault();
            console.log("$(this)", $(this).data('ci-pagination-page'))
            var pageno = $(this).data('ci-pagination-page');
            var formData = {
                search: $("input#search").val(),
                start: (pageno-1),
                length: _lnth,
                draw: 1
            }
            gridViewDataCall(formData, function (resposne) {
                $('div#grid-tab').html(resposne)
            })
        });
    }

     // initDataTable('.table-mindmap', admin_url + 'mindmap/table', [2, 3], [2, 3]);
     //    $('.table-goals').DataTable().on('draw', function () {
     //        var rows = $('.table-goals').find('tr');
     //        $.each(rows, function () {
     //            var td = $(this).find('td').eq(6);
     //            var percent = $(td).find('input[name="percent"]').val();
     //            $(td).find('.goal-progress').circleProgress({
     //                value: percent,
     //                size: 45,
     //                animation: false,
     //                fill: {
     //                    gradient: ["#28b8da", "#059DC1"]
     //                }
     //            })
     //        })
     //    });

});
</script>
</body>
</html>
<?php init_head();?>
<?php $CI = &get_instance();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons"> <!--" -->
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/patentes/SolicitudesController/create');?>"><i class="fas fa-plus"></i> Añadir</a>                            
                            <button type="button" class="btn btn-default btn-outline pull-right" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> Filtrar por</button>
                        </div>
                        <div class="_body">
                            <div class="row" style="padding: 2%;">
                                <div class="col-md-12">
                                    <table class="table" id="tableResult">
                                        <thead style="text-align: justify;">
                                            <tr>
                                                <td>Código</td>
                                                <td>Tipo</td>
                                                <td>Propietario</td>
                                                <td>Titulo</td>
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
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open(admin_url('pi/patentes/SolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']);?>
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
            <div class="col-md-4">
                <?php echo form_label('Boletines','boletin_id' );?>
                <select class='form-control' name='boletin_id' id="boletin_id">
                    <option value=''>Seleccione una opcion</option>
                    <?php foreach($marcas['Boletines'] as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?> 
                </select>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Clientes','client_id' );?>
                <select class='form-control' name='client_id' id="client_id">   
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Clientes'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Oficinas','oficina_id' );?>
                <select class='form-control' name='oficina_id' id="oficina_id">
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Oficinas'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Responsables','staff_id' );?>
                <select class='form-control' name='staff_id' id='staff_id'>
                <option value=''>Seleccione una opcion</option>
                    <?php foreach($marcas['Responsables'] as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Solicitud','tip_sol_id' );?>
                <select name="tip_sol_id" id="tip_sol_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Tipo de Solicitud'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <?php echo form_label('Estado de Solicitud','est_sol_id' );?>
                <select name="est_sol_id" id="est_sol_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Estado de Solicitud'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <?php echo form_label('Pais','pais_id' );?>
                <select name="pais_id" id="pais_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Pais'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipos de Signo','tip_signo_id' );?>
                <select name="tip_signo_id" id="tip_signo_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Tipos de Signo'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Clase Niza','clase_niza_id' );?>
                <select name="clase_niza_id" id="clase_niza_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Clase Niza'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Registro','tip_reg_id' );?>
                <select name="tip_reg_id" id="tip_reg_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Tipo de Registro'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Evento','tip_eve_id' );?>
                <select name="tip_eve_id" id="tip_eve_id" class='form-control'>
                    <option value=''>Seleccione una opcion</option>
                        <?php foreach($marcas['Tipo de Evento'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="col-md-4">

            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="reset" class="btn btn-gray">Limpiar</button>
        <button id="filterSubmit" type="button" class="btn btn-primary"  data-dismiss="modal">Buscar</button>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>


<?php init_tail();?>

<style>
    th {
        text-align: center;
    }
</style>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    function getFormData(){
            var config = {};
            $('input').each(function () {
                config[this.name] = this.value;
            });
            $("select").each(function()
            {
                config[this.name] = this.value;
            });
            return config;
        }
</script>
<script>
    //Insertar Solicitudes Marcas
    $(document).on('click','#InsertarSolicitudesMarcas',function(e){
        e.preventDefault();
        console.log("LLegue a Insertar Solicitudes Marcas")
        var formData = new FormData();
        var data = getFormData(this);
        const csrf_token_name = $("input[name=csrf_token_name]").val();
        formData.append('csrf_token_name', csrf_token_name);
        console.log('csrf_token_name', csrf_token_name);
        let url = '<?php echo admin_url("pi/patentes/SolicitudesController/addSolicitudesMarcas");?>';
        let solicitudesEdit = '<?php echo admin_url('pi/patentes/SolicitudesController/edit/');?>';
        $.ajax({
            url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).then(function(response){
            console.log("response ",response);
            solicitudesEdit =solicitudesEdit+response; 
            location.replace(solicitudesEdit);
        }).catch(function(response){
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
        destroy:true,
    });
</script>
<script>
    $("select").selectpicker({
            liveSearch:true,
            virtualScroll: 600
    });
    $("select[multiple=multiple]").selectpicker({
            liveSearch:true,
            virtualScroll: 600
    });
    $("#filterSubmit").on('click', function(event)
    {
        event.preventDefault();
        var params = {
            'i.id'                  : $("select[name=pais_id]").val(),
            's.boletin_id'          : $("select[name=boletin_id]").val(),
            'a.client_id'           : $("select[name=client_id]").val(),
            'a.oficina_id'          : $("select[name=oficina_id]").val(),
            'a.staff_id'            : $("select[name=staff_id]").val(),
            'a.tipo_solicitud_id'   : $("select[name=tip_sol_id]").val(),
            'a.estado_id'           : $("select[name=est_sol_id]").val(),
            'a.tipo_signo_id'       : $("select[name=tip_signo_id]").val(),
            'f.clase_niza_id'       : $("select[name=clase_niza_id]").val(),
            'a.tipo_registro_id'    : $("select[name=tip_reg_id]").val(),
            'm.tipo_evento_id'      : $("select[name=tip_eve_id]").val()
        };
        $.ajax({
            url: "<?php echo admin_url('pi/patentes/SolicitudesController/filterSearch')?>",
            method: "POST",
            data: {
                "csrf_token_name" : $("input[name=csrf_token_name]").val(),
                data: JSON.stringify(params),
            },
            success: function(response)
            {
                table = JSON.parse(response);
                $("#tableResult").DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                    },
                    destroy: true,
                    data: table.data,
                    columns : [
                        { data: 'id'},
                        { data: 'tipo'},
                        { data: 'propietario'},
                        { data: 'nombre'},
                        { data: 'clase'},
                        { data: 'estado'},
                        { data: 'solicitud'},
                        { data: 'fecha_solicitud'},
                        { data: 'registro'},
                        { data: 'certificado'},
                        { data: 'vigencia'},
                        { data: 'pais'},
                        { data: 'acciones'},
                    ]
                });
            } 
        })
    })
    
</script>


</body>
</html>