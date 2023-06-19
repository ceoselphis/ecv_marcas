<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/tiposeventoscontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Evento</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/eventoscontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Evento</a>    
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-dark" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Materia</th>
                                            <th>Nombre</th>
                                            <th>Fecha de Creacion</th>
                                            <th>Fecha de Modificacion</th>
                                            <th>Creado por </th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($TiposEventos)) {?>
                                            <?php foreach ($TiposEventos as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['tipo_eve_id'];?></td>
                                                    <td><?php echo $row['materia_id'];?></td>
                                                    <td><?php echo $row['nombre'];?></td>
                                                    <td><?php echo $row['created_at'];?></td>
                                                    <td><?php echo $row['modified_at'];?></td>
                                                    <td><?php echo $row['created_by'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/tiposeventoscontroller/destroy/{$row['tipo_eve_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/tiposeventoscontroller/edit/{$row['tipo_eve_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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