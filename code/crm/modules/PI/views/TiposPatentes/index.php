<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/tipospatentescontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Tipo de Patente</a>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-light justify-center" id="tableResult">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($TiposPatentes)) {?>
                                            <?php foreach ($TiposPatentes as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['tip_pat_id'];?></td>
                                                    <td><?php echo $row['nombre_tipo'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/tipospatentescontroller/destroy/{$row['tip_pat_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/tipospatentescontroller/edit/{$row['tip_pat_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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
    th, td {
        text-align: center;
    }
    
</style>

<?php init_tail();?>
</body>
</html>