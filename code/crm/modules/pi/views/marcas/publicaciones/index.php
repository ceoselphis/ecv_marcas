<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/PublicacionesMarcasController/create');?>"><i class="fas fa-plus"></i> Nueva Publicacion</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead style="text-align: justify;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Solicitud</th>
                                            <th>Boletin</th>
                                            <th>Tomo</th>
                                            <th>Pagina</th>
                                            <th>Tipo Publicacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($publicaciones)) {?>
                                            <?php foreach ($publicaciones as $row) {?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['id'];?></td>
                                                    <td class="text-center"><?php echo $row['marcas_id'];?></td>
                                                    <td class="text-center"><?php echo $row['boletin_id'];?></td>
                                                    <td class="text-center"><?php echo $row['tomo'];?></td>
                                                    <td class="text-center"><?php echo $row['pagina'];?></td>
                                                    <td class="text-center"><?php echo $row['tipo_pub_id'];?>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/PublicacionesMarcasController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td class="text-center">
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/PublicacionesMarcasController/edit/{$row['id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">Sin Registros</td>
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

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".table", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>