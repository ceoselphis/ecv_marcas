

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
