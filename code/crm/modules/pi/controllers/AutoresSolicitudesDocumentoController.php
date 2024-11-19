<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoresSolicitudesDocumentoController extends AdminController
{
    protected $models = ['AutoresSolicitudesDocumento_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        return $CI->load->view('test/index', ["marcas" => $CI->AutoresSolicitudesDocumento_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $fields = $CI->AutoresSolicitudesDocumento_model->getFillableFields();
        $inputs = array();
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
        $labels = ['Id', 'Nombre del anexo'];
        return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

     public function showDocumentos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $marcas = $CI->AutoresSolicitudesDocumento_model->findAllDocumentosMarcas($id);
        $data = array();
        /*tbl_marcas_solicitudes_documentos`(`id`, `marcas_id`, `descripcion`, `comentario`, `path`)*/
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
              //  'id_solicitud' => $CI->AutoresSolicitudesDocumento_model->BuscarSolicitudesMarcas($row['id_solicitud']),
                'descripcion' => $row['descripcion'],
                'comentario' => $row['comentarios'],
                'path' => '<a target="_blank" href="http://localhost/ecv_marcas/code/crm/uploads/derautor/documentos/' . $row['path'] . '"> Archivo </a>',
                //'acciones' => '<a class="btn btn-sm btn-danger borrarDoc" id="'.$row['id'].'"> <i class="fas fa-trash">  </i> Borrar </a>' 
            );
        }
        echo json_encode($data);
    }

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre_anexo',
                'label' => 'Nombre del Anexo',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre para el anexo',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->AutoresSolicitudesDocumento_model->getFillableFields();
            $inputs = array();
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
            $labels = ['Id', 'Nombre del anexo'];
            return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->AutoresSolicitudesDocumento_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/anexoscontroller/'));
            }
        }
        
    }

    /**
     * Find a single item to show
     */

    public function show(string $id = null)
    {

    }

    public function showSolicitudDocumento(){
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $data = $CI->AutoresSolicitudesDocumento_model->findAllDocumentosMarcas();
        $json = array();
        foreach ($data as $row ) {
            $json[] = array(
                'id ' => $row['id'],
                'marcas_id' => $row['marcas_id'],
                'descripcion' => $row['descripcion'],
                'path' => $row['path'],
            ); 
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function addSolicitudDocumento()
    {
        $CI = &get_instance();
        $data = $CI->input->post();
        $file = $_FILES;
        $doc_arch = '';
        if (empty($file['doc_archivo'])){
            $doc_arch ="No tiene"; 
        }if(!empty($file['doc_archivo'])){
            $fpath = FCPATH.'uploads/derautor/documentos/'.$file['doc_archivo']['name'];
            $fileType = pathinfo($fpath, PATHINFO_EXTENSION);
            // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($file['doc_archivo']['tmp_name'], $fpath)) {
                    echo json_encode(["message" => "El archivo PDF se ha subido exitosamente."]);
                } else {
                    echo json_encode(["message" => "Error al subir el archivo" , 'code' => '500' ]);
                    //throw new Exception('Error al subir el archivo'); 
                }
            
            $doc_arch =$file['doc_archivo']['name']; 
        }
        /*
            formData.append('id_solicitud', id_solicitud);
            formData.append('doc_descripcion', descripcion);
            formData.append('comentario_archivo', comentario_archivo);
            formData.append('doc_archivo', doc_archivo);
        */
        /*
            `id` int(11) NOT NULL,
            `id_solicitud` int(11) NOT NULL,
            `descripcion` text,
            `comentarios` text NOT NULL,
            `path` varchar(250) NOT NULL,
        */
        if (!empty($data)){
            $insert = array(
                'id_solicitud' => $data['id_solicitud'],
                'descripcion' => $data['doc_descripcion'],
                'comentarios' => $data['comentario_archivo'],
                'path' => $doc_arch,
            );

            echo json_encode(['data' => $insert]);
            $CI->load->model("AutoresSolicitudesDocumento_model");
                try{
                    $query = $CI->AutoresSolicitudesDocumento_model->insert($insert);
                        if (isset($query)){
                            echo json_encode(['code' => 200, 'message' => 'Documento Insertado Correctamente']);

                        }else {
                            echo json_encode(['code' => 500, 'message' => 'No se ha podido Insertar']);
                        }
                }catch (Exception $e){
                    return $e;
                }
        }
        else {
            echo json_encode(['message' => 'Not Data' , 'code' => '404']); 
        }
        
    }

    public function DeleteArchivoDocumento(string $archivo){
        $this->load->library('upload');
        $path = site_url('uploads/marcas/documentos/'.$archivo);
        if (file_exists($path)) {
            if (unlink($path)) {
                echo 'El archivo se eliminó correctamente.';
            } else {
                echo 'No se pudo eliminar el archivo.';
            }
        } else {
            echo 'El archivo no existe.';
        }
        
    }
    public function EditDoc(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $query =$CI->AutoresSolicitudesDocumento_model->find($id);
        echo json_encode($query);   
    }

     public function UpdateDocumento(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $query = $CI->AutoresSolicitudesDocumento_model->find($id);
        $data = $CI->input->post();
        $file = $_FILES;
        echo json_encode($data);
        if (!empty($data)){
            $insert = array(
                'descripcion' => $data['doc_descripcion'],
                'comentarios' => $data['comentario_archivo'],
                
            );
            //echo json_encode($insert);
            if (!empty($file)){
                $this->DeleteArchivoDocumento($query[0]['path']);
                $fpath = FCPATH.'uploads/marcas/documentos/'.$file['doc_archivo']['name'];
                if (move_uploaded_file($file['doc_archivo']['tmp_name'], $fpath)) {
                    echo json_encode(["message" => "El archivo PDF se ha subido exitosamente."]);
                } else {
                    
                    throw new Exception('Error al subir el archivo'); 
                }
                $doc_arch =$file['doc_archivo']['name'];
                $insert += ['path' => $doc_arch];
            }
                    $query = $CI->AutoresSolicitudesDocumento_model->update($id, $insert);
                    echo json_encode($query);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }else {
                        echo "no hemos podido Actualizar";
                    }
        } else {
            echo "No tiene Data";
        }         
     }
    /**
     * Shows a form to edit the data
     */

     public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $CI->load->helper('url');
        $query = $CI->AutoresSolicitudesDocumento_model->find($id);
        if(isset($query))
        {
            $labels = ['id', 'marcas_id ','descripcion','comentario' ,'path'];
            return $CI->load->view('solicitud_documento/edit', ['labels' => $labels, 'values' => $query,'id' => $id,
            'marcas' => $CI->AutoresSolicitudesDocumento_model->findAllMarcasSolicitudes()
            ]);
        }
        else{
            return redirect('pi/CorrespondeciaUsuarioController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $idioma = array('us','es','it');
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
            $query = $CI->AutoresSolicitudesDocumento_model->update($id, $data);
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
        $CI->load->model("AutoresSolicitudesDocumento_model");
        $query = $CI->AutoresSolicitudesDocumento_model->find($id);
        $this->DeleteArchivoDocumento($query[0]['path']);
        $CI->load->helper('url');
        $query = $CI->AutoresSolicitudesDocumento_model->delete($id);
        if (isset($query)){
            echo json_encode(['message' => 'Documento Eliminado Correctamente', 'code' => 200]);
        }else {
            echo json_encode(['message' => 'No se Pudo  Eliminar el Documento', 'code' => 500]);
        }
    }
}