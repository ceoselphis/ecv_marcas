<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/boletinescontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Boletin</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;"> 
                                <table class="table table-responsive" id="tableResult" >
                                    <thead style="padding-left: 10%;">
                                        <tr>
                                            <th>Nº Boletin</th>
                                            <th>Fecha de Publicacion</th>
                                            <th>Pais</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($boletines)) {?>
                                            <?php foreach ($boletines as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['boletin_id'];?></td>
                                                    <td><?php echo date('d/m/Y',strtotime($row['fecha_publicacion']));?></td>
                                                    <td><?php echo $row['pais_id'];?></td>
                                                    <td><?php echo $row['nombre'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/boletinescontroller/destroy/{$row['boletin_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td>
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/boletinescontroller/edit/{$row['boletin_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
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
</body>
</html>