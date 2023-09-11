<tbody>
                                            <?php if (!empty($tareas)) {?>
                                                <?php foreach ($tareas as $row) {?>
                                                    <tr >
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
                                            let tipotareas = '<?php echo admin_url("pi/TareasController/BuscarTipoTareas/1");?>';
                console.log(tipotareas);

                // mostrarTareas();
        // function mostrarTareas(){
            
        //     $.ajax({
        //         url:'<?php echo admin_url("pi/TareasController/showTareas");?>',
        //         type:'GET',
        //         success: function(response){
        //         const listatareas = JSON.parse(response);
        //         console.log(listatareas);
        //          let borrar = '<?php echo admin_url("pi/TareasController/destroy/");?>';
        //          console.log(borrar);
        //         let tipotareas = '<?php echo admin_url("pi/TareasController/BuscarTipoTareas/");?>';
        //          console.log(tipotareas);   
        //          let template = '';
        //          listatareas.forEach((item) =>{
        //             urltipotareas =tipotareas+item.tipo_tareas_id;
        //             console.log(urltipotareas);
        //             $.ajax({
        //                 url:urltipotareas,
        //                 type:'GET',
        //                 success: function(res){
        //                     let tipotarea = JSON.parse(res);
        //                     template += 
        //                         `<tr taskId = "${item.id}"> 
        //                             <td class="text-center">${item.id}</td>
        //                             <td class="text-center">${tipotarea[0]['nombre']}</td>
        //                             <td class="text-center">${item.descripcion}</td>
        //                             <td class="text-center">${item.fecha}</td>
        //                             <form method="DELETE" action="${borrar}${item.id}" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
        //                                  <td>
        //                                      <a id="${item.id}" class="edit btn btn-light"  data-toggle="modal" data-target="#EditTask"><i class="fas fa-edit"></i>Editar</a>
        //                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
        //                                  </td>
        //                                 </form> 
        //                         </tr>
        //                         `
                            
        //                  $('#listatareas').html(template);
        //                 }
                       
        //             })
                
        //         })
        //         }
        //     })
        // }


        <?php if (!empty($tareas)) {?>
                                                <?php foreach ($tareas as $row) {?>
                                                    <tr taskId = "<?php echo $row['id'];?>">
                                                        <td id = 'tareasid' ><?php echo $row['id'];?></td>
                                                        <td><?php echo $row['tipo_tarea'];?></td>
                                                        <td><?php echo $row['descripcion'];?></td>
                                                        <td><?php echo $row['fecha'];?></td>
                                                        <form method="DELETE" action="<?php echo admin_url("pi/TareasController/destroy/{$id}/{$row['id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                            <td>
                                                                <a id="<?php echo $row['id'];?>" class="editTareas btn btn-light"  data-toggle="modal" data-target="#EditTask"><i class="fas fa-edit"></i>Editar</a>
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