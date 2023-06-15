<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/tiposeventoscontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Evento</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($eventos)) {?>
                                            <?php foreach ($eventos as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['eve_id'];?></td>
                                                    <td><?php echo $row['nombre_anexo'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/tiposeventoscontroller/destroy/{$row['tip_ax_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/tiposeventoscontroller/edit/{$row['tip_ax_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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

<?php init_tail();?>

<script>
    $("#tableResult").DataTable(
        {
            paging: true,
            select : true,
        }
    );
</script>