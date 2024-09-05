<?php init_head(); ?>
   <h1 class="text-center"><?php if($headerMain != "") echo $headerMain; else echo "Sin título"; ?></h1>
    <br>
    <table class="min-w-full text-left text-sm font-light table" id="tableResult">
        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
            <tr>
                <th scope="col" class="px-6 py-4">Código</th>
                <th scope="col" class="px-6 py-4">Pais</th>
                <th scope="col" class="px-6 py-4">Nombre</th>
                <th scope="col" class="px-6 py-4">Apellido</th>
                <th scope="col" class="px-6 py-4">Nacionalidad</th>
                <th scope="col" class="px-6 py-4">Acciones</th>
            </tr>
        </thead>
        <tbody><!--Tbody for show table from table inventores-->
            <?php if (!empty($inventores)) {?>
                <?php foreach ($inventores as $row) {?>
                    <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                        <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $row['inventor_id'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $row['pais_id'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $row['nombre'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $row['apellido'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $row['direccion'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $row['nacionalidad'];?></td> 
                    </tr>
                <?php } ?>
            <?php }
            else {
            ?>
            <tr colspan="5"  class="whitespace-nowrap px-6 py-4 font-medium">
                <td class="whitespace-nowrap px-6 py-4">Sin Registros</td>
            </tr>
            <?php } ?>
        </tbody><!--Tbody for show table from table inventores-->
    </table>
<?php init_tail(); ?>