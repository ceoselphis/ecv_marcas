<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PropietariosController/create');?>"><i class="fas fa-plus"></i> Nuevo propietario</a>
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PropietariosController/generateReport');?>"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 50px 10px 50px;">
                            
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Pais</th>
                                            <th>Nº Poder</th>
                                            <th>Fecha Creacion</th>
                                            <th>Creado por</th>
                                            <th>Fecha Modificacion</th>
                                            <th>Modificado Por</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_propietarios">
                                        <?php if (!empty($propietarios)) {?>
                                            <?php foreach ($propietarios as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['codigo'];?></td>
                                                    <td><?php echo $row['nombre'];?></td>
                                                    <td><?php echo $row['pais'][0]['nombre'];?></td>
                                                    <td><?php 
                                                    $poder = empty($row['numero']) ? ('') : ($row['numero']);
                                                    echo $poder;
                                                    ?></td>
                                                    <td><?php echo $row['fecha_creacion'];?></td>
                                                    <td>
                                                        <?php 
                                                            $staff_by = empty($row['creado_por']) ? ('') : ($row['creado_por'][1]) ;
                                                            echo $staff_by;?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $fecha_mod = empty($row['fecha_modificacion']) ? ('') : $row['fecha_modificacion'];
                                                            echo $fecha_mod;
                                                        ?>
                                                    </td>
                                                    <td><?php 
                                                    $mod_by = empty($row['modificado_por']) ? ('') : $row['modificado_por'][1] ;?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/PropietariosController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/PropietariosController/edit/{$row['id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr >
                                            <td colspan="8">Sin Registros</td>
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


<script>

</script>
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