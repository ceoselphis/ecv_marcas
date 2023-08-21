<tbody>
                                            <?php if (!empty($tareas)) {?>
                                                <?php foreach ($tareas as $row) {?>
                                                    <tr>
                                                        <td><?php echo $row['id'];?></td>
                                                        <td><?php echo $row['tipo_tarea'];?></td>
                                                        <td><?php echo $row['descripcion'];?></td>
                                                        <td><?php echo $row['fecha'];?></td>
                                                        <form method="DELETE" action="<?php echo admin_url("pi/MarcasSolicitudesDocumentoController/destroy/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                            <td>
                                                                <a id="<?php echo $row['id'];?>" class="edit btn btn-light"  data-toggle="modal" data-target="#EditTask"><i class="fas fa-edit"></i>Editar</a>
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