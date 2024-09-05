<?php 
$CI = &get_instance();

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('application/force-download');
header('application/octet-stream');
header('application/download');
header('Content-Type: application/vnd.ms-excel');  // Use this for Excel downloads
header('Content-Disposition: attachment; filename="Inventores-Reporte.xlsx"'); // Set the filename with proper extension
?>
 

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
        </tbody><!--Tbody for show table from table inventores-->
    </table>

<?php //return $CI->load->view('patente/inventores/index'); */ ?>

<?php 

$CI = &get_instance();


// Prepare Excel data
$excelData = [];
$excelData[] = ['Código', 'Pais', 'Nombre', 'Apellido', 'Nacionalidad']; // Header row
foreach ($inventores as $row) {
  $excelData[] = [
    $row['inventor_id'],
    $row['pais_id'],
    $row['nombre'],
    $row['apellid'],
    $row['nacionalidad'],
    // Combine actions into a single cell (adjust as needed)
    //$row['nombre'] . ' - Editar | ' . $row['apellid'] . ' - Borrar'
  ];
}


$sheet = $fileG->getActiveSheet();

// Add data and formatting (optional)
$sheet->fromArray($excelData, null, 'A1');

// Set column widths (optional)
// ...

// Generate and Download Excel File
$filename = 'inventores_' . date('Ymd') . '.xlsx'; // Generate unique filename
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer = PHPExcel_IOFactory::createWriter($fileG, 'Excel2007');
$writer->save('php://output');  // Output to browser

// Exit script after download (prevents further execution)
exit; 
?>