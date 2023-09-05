<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasSolicitudesDocumentoController extends AdminController
{
    protected $models = ['MarcasSolicitudesDocumento_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        return $CI->load->view('test/index', ["marcas" => $CI->MarcasSolicitudesDocumento_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $fields = $CI->MarcasSolicitudesDocumento_model->getFillableFields();
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

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
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
            $fields = $CI->MarcasSolicitudesDocumento_model->getFillableFields();
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
            $query = $CI->MarcasSolicitudesDocumento_model->insert($data);
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
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $data = $CI->MarcasSolicitudesDocumento_model->findAll();
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
        $doc_arch =$file['doc_archivo']['name'];
        if (!empty($data)){
            $insert = array(
                            'marcas_id' => 1,
                            'descripcion' => $data['doc_descripcion'],
                            'comentario' => $data['comentario_archivo'],
                            'path' => $doc_arch,
                    );
            $CI->load->model("MarcasSolicitudesDocumento_model");
                try{
                    $query = $CI->MarcasSolicitudesDocumento_model->insert($insert);
                        if (isset($query)){
                            echo "Insertado Correctamente";

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e;
                }
        }
        else {
            echo "No tiene Data";
        }
        
    }
    public function EditDoc(string $id = null){
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $query =$CI->MarcasSolicitudesDocumento_model->find($id);
        echo json_encode($query);   
     }

     public function UpdateDocumento(string $id = null){
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $data = $CI->input->post();
        $file = $_FILES;
        $doc_arch =$file['doc_archivo']['name'];
        //echo json_encode($doc_arch);
  
        if (!empty($data)){
            $insert = array(
                            'marcas_id' => 1,
                            'descripcion' => $data['doc_descripcion'],
                            'comentario' => $data['comentario_archivo'],
                            'path' => $doc_arch,
                    );
                    $query = $CI->MarcasSolicitudesDocumento_model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }else {
                        echo "no hemos podido Actualizar";
                    }
        }            
     }
    /**
     * Shows a form to edit the data
     */

     public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudesDocumento_model->find($id);
        if(isset($query))
        {
            $labels = ['id', 'marcas_id ','descripcion','comentario' ,'path'];
            return $CI->load->view('solicitud_documento/edit', ['labels' => $labels, 'values' => $query,'id' => $id,
            'marcas' => $CI->MarcasSolicitudesDocumento_model->findAllMarcasSolicitudes()
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
         $CI->load->model("MarcasSolicitudesDocumento_model");
         $CI->load->helper('url');
         $data = $CI->input->post();
             $query = $CI->MarcasSolicitudesDocumento_model->update($id, $data);
             if (isset($query))
             {
                 return redirect('pi/MarcasSolicitudesController/create');
             }
         
     }

    /**
     * Deletes the item
     */

    public function destroy(string $id,string $identificacion)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudesDocumento_model");
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudesDocumento_model->delete($identificacion);
        return redirect('pi/MarcasSolicitudesController/edit/'.$id);
        
        
    }
}