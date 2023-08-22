<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/EventosController/create');?>"><i class="fas fa-plus"></i> Nuevo Evento</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/TiposEventosController/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Evento</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>Nº Evento</th>
                                            <th>Tipo de Evento</th>
                                            <th>Fecha de creacion</th>
                                            <th>Creado por </th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($eventos)) {?>
                                            <?php foreach ($eventos as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['eve_id'];?></td>
                                                    <td><?php echo $row['tipo_eve_id'];?></td>
                                                    <td><?php echo $row['created_at'];?></td>
                                                    <td><?php echo $row['staff_id'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/EventosController/destroy/{$row['eve_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/EventosController/edit/{$row['eve_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr colspan="5" class="text-center">
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

<style>
    th {
        text-align: center;
    }
</style>

<?php init_tail();?>
</body>
</html>

