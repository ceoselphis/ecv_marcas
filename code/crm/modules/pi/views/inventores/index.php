<?php init_head();?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="_buttons">
                            <a class="btn btn-primary" href="<?php echo admin_url('pi/InventoresController/create');?>"><i class="fas fa-plus"></i>Registrar Inventor</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="min-w-full text-left text-sm font-light table" id="tableResult" >
                                    <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                        <tr>
                                            <th  scope="col" class="px-6 py-4">Código</th>
                                            <th  scope="col" class="px-6 py-4">Pais</th>
                                            <th  scope="col" class="px-6 py-4">Nombre</th>
                                            <th  scope="col" class="px-6 py-4">Apellido</th>
                                            <th  scope="col" class="px-6 py-4">Nacionalidad</th>
                                            <th  scope="col" class="px-6 py-4">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($inventores)) {?>
                                            <?php foreach ($inventores as $row) {?>
                                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $row['inventor_id'];?></td>
                                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row['pais_id'];?></td>
                                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row['nombre'];?></td>
                                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row['apellid'];?></td>
                                                    <td class="whitespace-nowrap px-6 py-4"><?php echo $row['nacionalidad'];?></td>
                                                    <form method="DELETE" action="<?php echo admin_url("pi/InventoresController/destroy/{$row['inventor_id']}");?>" onsubmit="confirm('¿Esta seguro de eliminar este registro?')">
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <a class="btn btn-light" href="<?php echo admin_url("pi/InventoresController/edit/{$row['inventor_id']}");?>"><i class="fas fa-edit"></i>Editar</a>
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                                                        </td>
                                                    </form> 
                                                </tr>
                                            <?php } ?>
                                        <?php }
                                        else {
                                        ?>
                                        <tr colspan="5"  class="whitespace-nowrap px-6 py-4 font-medium">
                                            <td class="whitespace-nowrap px-6 py-4">Sin Registros</td>
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
