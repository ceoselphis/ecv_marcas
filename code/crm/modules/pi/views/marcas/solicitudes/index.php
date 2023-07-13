<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/marcassolicitudescontroller/create');?>"><i class="fas fa-plus"></i> Nueva Solicitud de marca</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableResult">
                                    <thead style="text-align: justify;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nº de Registro</th>
                                            <th>Tipo de Solicitud</th>
                                            <th>Estado</th>
                                            <th>Fecha Solicitud</th>
                                            <th>Nº de Certificado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($marcas)) {?>
                                            <?php foreach ($marcas as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['solicitud_id'];?></td>
                                                    <td><?php echo $row['reg_num_id'];?></td>
                                                    <td><?php echo $row['tipo_id'][2];?></td>
                                                    <td><?php echo $row['cod_estado_id'][1];?></td>
                                                    <td><?php echo $row['fecha_solicitud'];?></td>
                                                    <td><?php echo $row['num_certificado'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/marcassolicitudescontroller/destroy/{$row['solicitud_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/marcassolicitudescontroller/edit/{$row['solicitud_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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

<pre>
    <?php var_dump($marcas);?>
</pre>

<style>
    th {
        text-align: center;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap.min.js"></script>
<script>
    new DataTable(".table", {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        }
    });
</script>

<?php init_tail();?>
</body>
</html>