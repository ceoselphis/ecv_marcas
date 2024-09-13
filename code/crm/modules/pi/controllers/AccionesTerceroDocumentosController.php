<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccionesTerceroDocumentosController extends AdminController
{
    protected $models = ['AccionesTercerosDocumentos_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $data = array();
        foreach($CI->AccionesTercerosDocumentos_model->findAll() as $row)
        {
            $data[] = [
                'eve_id' => $row['id'],
                'tipo_eve_id' => $CI->AccionesTercerosDocumentos_model->findTipoDocumentos($row['tipo_evento_id'])[0]['nombre'],
                'created_at' => $row['created_at'],
                'staff_id' => $CI->AccionesTercerosDocumentos_model->getStaff($row['staff_id'])[0]['firstname'].' '.$CI->AccionesTercerosDocumentos_model->getStaff($row['staff_id'])[0]['lastname']
            ];
        }
        return $CI->load->view('Documentos/index', ["Documentos" => $data]);
    }

    public function showDocumentos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $marcas = $CI->AccionesTercerosDocumentos_model->findDocumentosAccionesTerceros($id);
        $data = array();
        /*`tbl_marcas_Documentos`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'descripcion' => $row['descripcion'],
                'comentarios' => $row['comentarios'],
                'archivo' => $row['archivo'],
            );
        }
        echo json_encode($marcas);
    }

    /**
     * Shows the form to create a new item
     */

    public function findDocumentos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $marcas = $CI->AccionesTercerosDocumentos_model->find($id);
       // $marcas = $CI->AccionesTercerosDocumentos_model->findAll();
        $data = array();
        /*`tbl_marcas_Documentos`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        // foreach ($marcas as $row){
        //     $data[] = array(
        //         'id' => $row['id'],
        //         'tipo_evento' => $CI->AccionesTercerosDocumentos_model->findTipoDocumentos($row['tipo_evento_id']),
        //         'comentarios' => $row['comentarios'],
        //         'tipo_evento_id' => $row['tipo_evento_id'],
        //         'fecha' => date('d/m/Y', strtotime($row['fecha'])),
        //     );
        // }
        echo json_encode($marcas);
    }

    public function addDocumentos(){
        $CI = &get_instance();
        $data = $CI->input->post();
        $file = $_FILES;
        $doc_arch = '';
        if (empty($file['doc_archivo'])){
            $doc_arch ="No tiene";
        }if(!empty($file['doc_archivo'])){
            $fpath = FCPATH.'uploads/acciones_terceros/documentos/' . $data['acc_ter_id'] . '-' .$file['doc_archivo']['name'];
            $path = site_url('uploads/acciones_terceros/documentos/' . $data['acc_ter_id'] . '-' .$file['doc_archivo']['name']);
           // $fileType = pathinfo($fpath, PATHINFO_EXTENSION);
            // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($file['doc_archivo']['tmp_name'], $fpath)) {
                    echo "El archivo PDF se ha subido exitosamente.";
                } else {

                    throw new Exception('Error al subir el archivo');
                }

            $doc_arch = $path;
        }
        if (!empty($data)){
            $insert = array(
                'acciones_terceros_id' => $data['acc_ter_id'],
                'descripcion' => $data['doc_descripcion'],
                'comentarios' => $data['comentario_archivo'],
                'archivo' => $doc_arch,
            );

            $CI->load->model("AccionesTercerosDocumentos_model");
                try{
                    $query = $CI->AccionesTercerosDocumentos_model->insert($insert);
                        if (isset($query)){
                            echo json_encode(['code' => 200, 'message' => 'Insertado Correctamente']);

                        }else {
                            echo json_encode(['code' => 500, 'message' => 'No se ha podido Insertado']);
                        }
                }catch (Exception $e){
                    return $e;
                }
        }
        else {
            echo json_encode(['code' => 500, 'message' => 'No tiene Data']);

        }
    }



     public function EditDocumentos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $query =$CI->AccionesTercerosDocumentos_model->find($id);
        echo json_encode($query);
     }

     public function DeleteArchivoDocumento(string $archivo){
        $this->load->library('upload');
        $path = $archivo;
        $str_file = explode('/', $path);
        $file = $str_file[count($str_file) - 1];
        $fpath = FCPATH.'uploads/marcas/documentos/' . $file;
        if (file_exists($fpath)) {
            if (unlink($fpath)) {
                echo 'El archivo se eliminó correctamente.';
            } else {
                echo 'No se pudo eliminar el archivo.';
            }
        } else {
            echo 'El archivo no existe.';
        }
        
    }



    public function UpdateDocumentos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $query = $CI->AccionesTercerosDocumentos_model->find($id);
        $data = $CI->input->post();
        $file = $_FILES;
    
        if (!empty($data)){
            $insert = array(
                'descripcion' => $data['doc_descripcion'],
                'comentarios' => $data['comentario_archivo'],
                
            );
           
            if (!empty($file)){
                $this->DeleteArchivoDocumento($query[0]['archivo']);
                $fpath = FCPATH.'uploads/acciones_terceros/documentos/' . $query[0]['acciones_terceros_id'] . '-' .$file['doc_archivo']['name'];
                $path = site_url('uploads/acciones_terceros/documentos/' . $query[0]['acciones_terceros_id'] . '-' . $file['doc_archivo']['name']);
                if (move_uploaded_file($file['doc_archivo']['tmp_name'], $fpath)) {
                    echo "El archivo PDF se ha subido exitosamente.";
                } else {
                    
                    throw new Exception('Error al subir el archivo'); 
                }
                //$doc_arch =$file['doc_archivo']['name'];
                $insert += ['archivo' => $path];
            } 
           // echo json_encode($insert);

                    $query = $CI->AccionesTercerosDocumentos_model->update($id, $insert);
                  
                    if (isset($query))
                    {
                        echo json_encode(['code' => 200, 'message' => 'Actualizado Correctamente']);
                        
                    }else {
                        echo json_encode(['code' => 500, 'message' => 'no hemos podido Actualizar']);
                    }
        } else {
            echo json_encode(['code' => 500, 'message' => 'No tiene Data']);
        }    
    }

    /*
     $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $data = $CI->input->post();
        $fecha_hoy = date("Y-m-d");

        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'comentarios' => $data['evento_comentario'],
                            'fecha' => $fecha_hoy
                    );
            $query = $CI->AccionesTercerosDocumentos_model->update($id, $insert);
            if (isset($query))
            {
                echo json_encode(['mensaje' => 'Documentos Actualizado Correctamente ','status'=>true]);
            }
            else{
                echo json_encode(['mensaje' => 'No se pudo Actualizar el Documentos','status'=>false]);
            }
        } else {
            echo json_encode(['mensaje' => 'No tiene datos ','status'=>false]);
        }
    */

    public function UpdateMarcasDocumentos(){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $data = $CI->input->post();

        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'comentarios' => $data['comentarios'],
                            'fecha' => $this->turn_dates($data['fecha'])
                    );
            $query = $CI->AccionesTercerosDocumentos_model->update($data['id'], $insert);
            if (isset($query))
            {
                echo "Actualizado Correctamente";
            }
        }
    }


    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $fields = $CI->AccionesTercerosDocumentos_model->getFillableFields();
        $select = $CI->AccionesTercerosDocumentos_model->getAllTipoDocumentos();
        $labels = array();
        foreach($fields as $field)
        {
            if($field['type'] == 'INT')
            {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        $labels = ['Id', 'Tipo de evento'];
        return $CI->load->view('Documentos/create', ['fields' => $fields, 'labels' => $labels, 'select' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $CI->load->helper('url');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //TODO
        //we sent the data to the model
        $query = $CI->AccionesTercerosDocumentos_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/Documentoscontroller/'));
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $query = $CI->AccionesTercerosDocumentos_model->find($id);
        if(isset($query))
        {
            $table = '<table class="table"><thead><tr>';
            foreach(['Nombre', 'Productos'] as $item)
            {
                $table .= '<th>'.$item.'</th>';
            }
            $table .= '</thead><tbody><tr>';
            foreach($query as $row)
            {
                $table .= "
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                        ";
            }
            $table .= '</tr></tbody></table>';
            echo $table;
        }
    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosDocumentos_model->find($id);
        $select = $CI->AccionesTercerosDocumentos_model->getAllTipoDocumentos();
        if(isset($query))
        {
            $labels = array('Id', 'Tipo de Documentos', 'Comentario');

            return $CI->load->view('Documentos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'tipo_evento' => $select]);
        }
        else{
            return redirect('pi/Documentoscontroller/');
        }
    }

    /**
     * Recive the data to update
     *
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['fecha'] = date('Y-m-d');
        //We validate the data
        //TODO
        //We prepare the data
        $query = $CI->AccionesTercerosDocumentos_model->update($id, $data);
        if (isset($query))
        {
            return redirect('pi/MarcasSolicitudesController/create');
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosDocumentos_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosDocumentos_model->delete($id);
        if (isset($query)){

            echo json_encode(['mensaje' => 'Documentos Eliminado Correctamente ','status'=>true]);
        }else {
            echo json_encode(['mensaje' => 'No se ha podido Eliminar el Documentos ','status'=>false]);
        }
    }
     public function turn_dates($date)
     {
         if ($date != '') {
             try {
                 $wdate = explode('/', $date);
                 $cdate = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                 return $cdate;
             } catch (Exception $e) {
                 echo 'Caught exception: ',  $e->getMessage(), "\n";
             }
         } else {
             return NULL;
         }
     }


}