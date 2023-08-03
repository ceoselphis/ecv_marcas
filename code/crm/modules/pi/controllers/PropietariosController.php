<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropietariosController extends AdminController
{
    protected $models = ['Propietarios_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $data = array();
        
        foreach($CI->Propietarios_model->findAll() as $row)
        {
            $data[] = array(
                'id' => $row['id'],
                'codigo' => $row['codigo'],
                'nombre' => $row['propietario'],
                'pais'   => $CI->Propietarios_model->findPaises($row['pais_id']),
                'poder_num' => $CI->Propietarios_model->findAllPoderes($row['id']),
                'fecha_creacion' => $row['created_at'],
                'creado_por' => $CI->Propietarios_model->findStaff($row['created_by'])['name'],
                'fecha_modificacion' => $row['modified_at'],
                'modificado_por' => $CI->Propietarios_model->findStaff($row['modified_by'])['name']
            );
        }
        return $CI->load->view('propietarios/index', ["propietarios" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $fields = $CI->Propietarios_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $paises = $CI->Propietarios_model->getAllPaises();
        $staff  = $CI->Propietarios_model->findStaff();
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
        $labels = ['Id', 'Pais', 'Propietario', 'Estado Civil', 'Representante Legal', 'Direccion', 'Ciudad', 'Estado', 'Código Postal', 'Actividad Comercial', 'Datos de Registro', 'Notas'];
        return $CI->load->view('propietarios/create', ['fields' => $inputs, 'labels' => $labels, 'paises' => $paises, 'staff' => $staff]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        $data['created_at'] = date('Y-m-d');
        $data['modified_at'] = date('Y-m-d');
        $data['created_by'] = $_SESSION['staff_user_id'];
        $data['modified_by'] = $_SESSION['staff_user_id'];
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'propietario',
                'label' => 'Propietario',
                'rules' => 'trim|required|min_length[1]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre de propietario ',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'codigo',
                'label' => 'Código',
                'rules' => 'trim|required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Debe indicar un código',
                    'min_length' => 'Código demasiado corto',
                    'max_lenght' => 'Código demasiado largo'
                ]
            ],         
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {    
            $fields = $CI->Propietarios_model->getFillableFields();
            $inputs = array();
            $labels = array();
            $paises = $CI->Propietarios_model->getAllPaises();
            $staff  = $CI->Propietarios_model->findStaff();
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
            $labels = ['Id', 'Pais', 'Propietario', 'Estado Civil', 'Representante Legal', 'Direccion', 'Ciudad', 'Estado', 'Código Postal', 'Actividad Comercial', 'Datos de Registro', 'Notas'];
            return $CI->load->view('propietarios/create', ['fields' => $inputs, 'labels' => $labels, 'paises' => $paises, 'staff' => $staff]);
        }
        else 
        {
            //we sent the data to the model
            $query = $CI->Propietarios_model->insert($data);
            //We get the last inserted id
            if($query)
            {
                $id = $CI->Propietarios_model->last_insert_id();
                return redirect(admin_url('pi/PropietariosController/edit/'.$id));
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
        $CI->load->model("Propietarios_model");
        $CI->load->helper('url');
        $query = $CI->Propietarios_model->find($id);
        $paises = $CI->Propietarios_model->getAllPaises();
        $staff  = $CI->Propietarios_model->findStaff();
        $poderes = $CI->Propietarios_model->findAllPoderes($id);
        if(isset($query))
        {
            $labels = ['Id', 'Pais', 'Propietario', 'Estado Civil', 'Representante Legal', 'Direccion', 'Ciudad', 'Estado', 'Código Postal', 'Actividad Comercial', 'Datos de Registro', 'Notas'];
            return $CI->load->view('propietarios/edit', ['values' => $query, 'labels' => $labels, 'paises' => $paises, 'staff' => $staff, 'id' => $id, 'poderes' => $poderes]);
        }
        else{
            return redirect('pi/PropietariosController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'propietario',
                'label' => 'Propietario',
                'rules' => 'trim|required|min_length[1]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre de propietario ',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'codigo',
                'label' => 'Código',
                'rules' => 'trim|required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Debe indicar un código',
                    'min_length' => 'Código demasiado corto',
                    'max_lenght' => 'Código demasiado largo'
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
            $query = $CI->Propietarios_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/PropietariosController/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper('url');
        $query = $CI->Propietarios_model->delete($id);
        return redirect('pi/PropietariosController/');
        
        
    }
}