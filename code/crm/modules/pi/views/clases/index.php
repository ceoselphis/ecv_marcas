<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/clasescontroller/create');?>"><i class="fas fa-plus"></i> Nueva Clase</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-responsive" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Version</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($clases)) {?>
                                            <?php foreach ($clases as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['niza_id'];?></td>
                                                    <td><?php echo $row['nombre'];?></td>
                                                    <td><?php echo $row['version'];?></td>
                                                <?php if($row['is_activate'] == '1'){ ?>
                                                    <td>Activo</td>
                                                <?php } else { ?>
                                                    <td>Desactivado</td>
                                                    <?php } ?>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/clasescontroller/destroy/{$row['niza_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-link detail" href="<?php echo admin_url("pi/clasescontroller/show/{$row['niza_id']}");?>"><i class="fas fa-details"></i>Detalles</a>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/clasescontroller/edit/{$row['niza_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr colspan="3">
                                            <td>Sin Registros</td>
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
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                <span class="add-title">Detalles de clase</span>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="detailTable">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>




<?php init_tail();?>

<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>

<script>
    $(".detail").on('click', function(e){
        e.preventDefault();
        request = $.ajax({
            url: $(".detail").prop('href'),
            method: "GET",
            success: function(response){
                $(".detailTable").html(response)
            }
        });
        $("#modalDetail").modal('show');
    });

    

</script>



