<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PatentePrioridadController/create');?>"><i class="fas fa-plus"></i> Nueva prioridad de Patente</a>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-light justify-center" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Solicitud</th>
                                            <th>Fecha</th>
                                            <th>Pais</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($prioridades)) {?>
                                            <?php foreach ($prioridades as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['tip_pat_id'];?></td>
                                                    <td><?php echo $row['nombre_tipo'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/PatentePrioridadController/destroy/{$row['pri_pat_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/PatentePrioridadController/edit/{$row['pri_pat_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr >
                                            <td colspan="5">Sin Registros</td>
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
    tbody, thead > * {
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