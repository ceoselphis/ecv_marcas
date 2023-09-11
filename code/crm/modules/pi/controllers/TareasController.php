<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TareasController extends AdminController
{
    protected $models = ['Tareas_Model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->Tareas_Model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $fields = $CI->Tareas_Model->getFillableFields();
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

     public function showTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $marcas = $CI->Tareas_Model->findAllTareasMarcas($id);
        $data = array();
        /*`tbl_marcas_eventos`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->Tareas_Model->BuscarTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        echo json_encode($data);

     }

     public function addTareas(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                            'tipo_tareas_id' => $data['tipo_tarea'],
                            'marcas_id' => $data['id_marcas'],
                            'descripcion' => $data['descripcion'],
                            'fecha' => date('Y-m-d'),
                    );

            $CI->load->model("Tareas_Model");
                try{
                    $query = $CI->Tareas_Model->insert($insert);
                        if (isset($query)){
                            echo "Insertado Correctamente";

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo "No tiene Data";
        }
     }

    

    
     public function EditTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $query =$CI->Tareas_Model->find($id);
        echo json_encode($query);   
     }

     public function BuscarTipoTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $query =$CI->Tareas_Model->findTipoTareas($id);
        echo json_encode($query);

     }

     public function UpdateTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                            'tipo_tareas_id' => $data['tipo_tarea'],
                            'descripcion' => $data['descripcion'],
                            'fecha' => date('Y-m-d'),
                    );
                    $query = $CI->Tareas_Model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Insertado Correctamente";
                    }
        }            
     }
    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
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
            $fields = $CI->Tareas_Model->getFillableFields();
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
            $query = $CI->Tareas_Model->insert($data);
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

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Tareas_Model");
        $CI->load->helper('url');
        $query = $CI->Tareas_Model->find($id);
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
        $CI->load->model("Tareas_Model");
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
            $query = $CI->Tareas_Model->update($id, $data);
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
        $CI->load->model("Tareas_Model");
        $CI->load->helper('url');
        $query = $CI->Tareas_Model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}