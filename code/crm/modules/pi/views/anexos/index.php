<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="_filters _hidden_inputs hidden">
                        <?php echo render_select('states', ["Todos", "Estado 1"], ["form-control"]);?>
                    </div>

                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/anexoscontroller/create');?>"><i class="fas fa-plus"></i> Nuevo Anexo</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($anexos)) {?>
                                            <?php foreach ($anexos as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['tip_ax_id'];?></td>
                                                    <td><?php echo $row['nombre_anexo'];?></td>
                                                    <td><a class="btn btn-light" href="<?php echo admin_url("pi/anexoscontroller/edit/{$row['tip_ax_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                        <a class="btn btn-danger" href="<?php echo admin_url("pi/anexoscontroller/destroy/{$row['tip_ax_id']}");?>" onclick="confirm(¿Esta seguro de eliminar el registro?);"><i class="fas fa-trash"></i>Borrar</a>
                                                    </td>
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

<?php init_tail();?>