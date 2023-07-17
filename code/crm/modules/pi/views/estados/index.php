<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/EstadosController/create');?>"><i class="fas fa-plus"></i> Nuevo Estado</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Código</th>
                                            <th>Materia</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de Creacion</th>
                                            <th>Fecha de Modificacion</th>
                                            <th>Creado por</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estados)) {?>
                                            <?php foreach ($estados as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['estado_id'];?></td>
                                                    <td><?php echo $row['codigo'];?></td>
                                                    <td><?php echo $row['materia_id'];?></td>
                                                    <td><?php echo $row['descripcion'];?></td>
                                                    <td><?php echo $row['created_at'];?></td>
                                                    <td><?php echo $row['last_modified'];?></td>
                                                    <td><?php echo $row['created_by'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/EstadosController/destroy/{$row['estado_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/EstadosController/edit/{$row['estado_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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

<style>
    th {
        text-align: center;
    }
</style>

<?php init_tail();?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".table", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>


</body>
</html>