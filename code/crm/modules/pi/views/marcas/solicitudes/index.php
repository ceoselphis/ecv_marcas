<?php init_head();?>
<?php $CI = &get_instance();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/MarcasSolicitudesController/create');?>"><i class="fas fa-plus"></i> Nueva Solicitud de marca</a>                            
                            <button type="button" class="btn btn-default btn-outline pull-right" data-toggle="modal" data-target="#filterModal"><i class="fas fa-filter"></i> Filtrar por</button>
                        </div>
                        <div class="_body">
                            <div class="row" style="padding: 2%;">
                                <div class="col-md-12" >
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
                                        <tbody >
                                            <?php 
                                            if(!empty($marcas['query']))
                                            {
                                                foreach($marcas['query'] as $row){ ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['tipo_registro'] ?></td>
                                                    <td><?php echo $row['nombre_propietario'] ?></td>
                                                    <td><?php echo $row['signonom'] ?></td>
                                                    <td><?php echo $row['clase_niza'] ?></td>
                                                    <td><?php echo $row['estado_expediente'] ?></td>
                                                    <td><?php echo $row['solicitud'] ?></td>
                                                    <td>
                                                        <?php 
                                                        if($row['fecha_solicitud'] == '' || is_null($row['fecha_solicitud']))
                                                        {
                                                            echo $row['fecha_solicitud'];
                                                        }
                                                        else{
                                                            echo date('d/m/Y', strtotime($row['fecha_solicitud']));
                                                        }?>
                                                    </td>
                                                    <td><?php echo $row['registro'] ?></td>
                                                    <td><?php echo $row['certificado'] ?></td>
                                                    <td>
                                                        <?php 
                                                        if($row['fecha_vencimiento'] == '' || is_null($row['fecha_vencimiento'])){
                                                            echo $row['fecha_vencimiento'];
                                                        }
                                                        else{
                                                            echo date('d/m/Y', strtotime($row['fecha_vencimiento']));
                                                        }?>
                                                    </td>
                                                    <td><?php echo $row['pais_nom'] ?></td>
                                                    <td><a href="<?php echo admin_url('pi/MarcasSolicitudesController/edit/'.$row['id']) ?>"><i class="fas fa-edit"></i> Editar</a></td>
                                                </tr>
                                            <?php }
                                            } ?>
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
    <?php echo form_open(admin_url('pi/MarcasSolicitudesController/search'), ['method' => 'POST', 'name' => 'filter', 'id' => 'filter']);?>
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
                <?php echo form_dropdown('boletin_id', $marcas['Boletines'] , ['class' => 'form-control', 'id' => 'boletin_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Clientes','client_id' );?>
                <?php echo form_dropdown('client_id', $marcas['Clientes'] , ['class' => 'form-control', 'id' => 'client_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Oficinas','oficina_id' );?>
                <?php echo form_dropdown('oficina_id', $marcas['Oficinas'] , ['class' => 'form-control', 'id' => 'oficina_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Responsables','staff_id' );?>
                <?php echo form_dropdown('staff_id', $marcas['Responsables'] , ['class' => 'form-control', 'id' => 'staff_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Solicitud','tip_sol_id' );?>
                <?php echo form_dropdown('tip_sol_id', $marcas['Tipo de Solicitud'] , ['class' => 'form-control', 'id' => 'tip_sol_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Estado de Solicitud','est_sol_id' );?>
                <?php echo form_dropdown('est_sol_id', $marcas['Estado de Solicitud'] , ['class' => 'form-control', 'id' => 'est_sol_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Pais','pais_id' );?>
                <br />
                <?php echo form_dropdown('pais_id', $marcas['Pais'] , ['class' => 'form-control', 'id' => 'pais_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipos de Signo','tip_signo_id' );?>
                <?php echo form_dropdown('tip_signo_id', $marcas['Tipos de Signo'] , ['class' => 'form-control', 'id' => 'tip_signo_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Clase Niza','clase_niza_id' );?>
                <?php echo form_dropdown('clase_niza_id', $marcas['Clase Niza'] , ['class' => 'form-control', 'id' => 'clase_niza_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Registro','tip_reg_id' );?>
                <?php echo form_dropdown('tip_reg_id', $marcas['Tipo de Registro'] , ['class' => 'form-control', 'id' => 'tip_reg_id']);?>
            </div>
            <div class="col-md-4">
                <?php echo form_label('Tipo de Evento','tip_eve_id' );?>
                <?php echo form_dropdown('tip_eve_id', $marcas['Tipo de Evento'] , ['class' => 'form-control', 'id' => 'tip_eve_id']);?>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="padding-top: 1.5%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
    $("#tableResult").DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        },
        destroy:true,
    });
</script>
<script>
    $("select[multiple=multiple]").selectpicker({
            liveSearch:true,
            virtualScroll: 600
        });
    $("#filterSubmit").on('click', function(event)
    {
        event.preventDefault();
        var params = {
            'pais_id'         : JSON.stringify($("select[name=pais_id]").val()),
            'boletin_id'      : JSON.stringify($("select[name=boletin_id]").val()),
            'client_id'       : JSON.stringify($("select[name=client_id]").val()),
            'oficina_id'      : JSON.stringify($("select[name=oficina_id]").val()),
            'staff_id'        : JSON.stringify($("select[name=staff_id]").val()),
            'tip_sol_id'      : JSON.stringify($("select[name=tip_sol_id]").val()),
            'est_sol_id'      : JSON.stringify($("select[name=est_sol_id]").val()),
            'tip_signo_id'    : JSON.stringify($("select[name=tip_signo_id]").val()),
            'clase_niza_id'   : JSON.stringify($("select[name=clase_niza_id]").val()),
            'tip_reg_id'      : JSON.stringify($("select[name=tip_reg_id]").val()),
            'tip_eve_id'      : JSON.stringify($("select[name=tip_eve_id]").val())
        };
        console.log(params);
        $.ajax({
            url: "<?php echo admin_url('pi/MarcasSolicitudesController/search')?>",
            method: "POST",
            data: {
                "csrf_token_name" : $("input[name=csrf_token_name]").val(),
                data: JSON.stringify(params),
            },
            success: function(response)
            {
                console.log(response);
            } 
        })
    })
    
</script>


</body>
</html>