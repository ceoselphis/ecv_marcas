<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/AccionesTerceroController/create');?>"><i class="fas fa-plus"></i> Nueva Accion a Terceros</a>
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
                                    <tbody>
                                        <?php if (!empty($acciones)) {?>
                                            <?php foreach ($acciones as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>
                                                    <td><?php echo $row['tipo_solicitud'];?></td>
                                                    <td><?php echo $row['cliente'];?></td>
                                                    <td><?php echo $row['propietario'];?></td>
                                                    <td><?php echo $row['marca'];?></td>
                                                    <td><?php echo $row['nro_solicitud'];?></td>
                                                    <td><?php echo $row['fecha_solicitud'];?></td>
                                                    <td><?php echo $row['marca'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/AccionesTerceroController/destroy/{$row['tip_ax_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/AccionesTerceroController/edit/{$row['tip_ax_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
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
    new DataTable("#tableResult", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>


</body>
</html>