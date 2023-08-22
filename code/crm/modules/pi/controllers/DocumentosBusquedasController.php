<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentosBusquedasController extends AdminController
{
    protected $models = ['Marcas_documentos_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Marcas_documentos_model");
        $query = $CI->Marcas_documentos_model->getAllByBusqueda($id);
        $result = array();
        if(!empty($query))
        {
            foreach($query as $row)
            {
                $result[] = array(
                    'descripcion' => $row['descripcion'],
                    'comentarios' => $row['comentarios'],
                    'archivo'     => "<a target='_blank' href='{$row['archivo']}'><i class='fa-solid fa-file'></i> Ver Archivo</a>",
                    'acciones'    => "<button id='{$row["id"]}' type='submit' class='btn btn-danger btnsubmit'><i class='fas fa-trash'></i>Borrar</button>",
                );
            }
            echo json_encode($result);
        }
        else {
            echo json_encode(['code' => '404', 'message' => 'no documents']);
        }
        die();
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Marcas_documentos_model");
        $fields = $CI->Marcas_documentos_model->getFillableFields();
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
        $CI->load->model('Marcas_documentos_model');
        $data = $CI->input->post();
        $query = array(
            'descripcion' => $data['descripcion'],
            'comentarios' => $data['comentarios'],
            'archivo'     => '',
            'busquedas_id' => $data['busquedas_id'],
        );
        $file = '';
        if(!empty($_FILES['archivo']))
        {
            $file = $_FILES['archivo'];
        }
        else{
            $file = NULL;
        }
        if($file != NULL)
        {
            //We fill the data of the         
            $fpath = FCPATH.'uploads/busquedas/'.$data['busquedas_id'].'-'.$file['name'];
            $path = site_url('uploads/busquedas/'.$data['busquedas_id'].'-'.$file['name']);
            move_uploaded_file($file['tmp_name'], $fpath);
            $query['archivo'] = $path;
        }
        $insert = $CI->Marcas_documentos_model->insert($query);
        if($insert)
        {
            echo json_encode(['status' => '200', 'message' => 'ok']);
        }
        else{
            echo json_encode(['status' => '500', 'message' => 'error']);
        }
    }

    /**
     * Find a single item to show
     */

    public function show(string $id = null)
    {

    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Marcas_documentos_model");
        $CI->load->helper('url');
        $query = $CI->Marcas_documentos_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/anexoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Marcas_documentos_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
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
            $this->edit($id);
        }
        else
        {
            //We prepare the data 
            $query = $CI->Marcas_documentos_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/anexoscontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Marcas_documentos_model");
        $CI->load->helper('url');
        $query = $CI->Marcas_documentos_model->delete($id);
        echo json_encode(['code' => 200, 'message' => 'success']);
        die();
    }
}