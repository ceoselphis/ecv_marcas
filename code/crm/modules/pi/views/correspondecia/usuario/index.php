<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/CorrespondeciaUsuarioController/create');?>"><i class="fas fa-plus"></i> Nueva Correspondencia Usuario</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Cliente</th>
                                            <th>Expediente</th>
                                            <th>Staff</th>
                                            <th>Plantilla</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($correspondencia)) {?>
                                            <?php foreach ($correspondencia as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>
                                                    <td><?php echo $row['cliente'];?></td>
                                                    <td><?php echo $row['expediente'];?></td>
                                                    <td><?php echo $row['staff_id'];?></td>
                                                    <td><?php echo $row['plantilla_id'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/CorrespondeciaUsuarioController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/CorrespondeciaUsuarioController/edit/{$row['id']}");?>"><i class="fas fa-edit"></i> Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
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
    th, td {
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