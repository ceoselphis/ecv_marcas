<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoresController extends AdminController
{
    protected $models = ['Inventores_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $query = $CI->Inventores_model->findAll();
        $data = array();
        foreach($query as $row)
        {
            $data[] = [
                'inventor_id' => $row['inventor_id'],
                'pais_id'     => $CI->Inventores_model->findPais($row['pais_id'])[0]['nombre'],
                'nombre'      => $row['nombre'],
                'apellid'    => $row['apellid'],
                'direccion'   => $row['direccion'],
                'nacionalidad'=> $row['nacionalidad']
            ];
        }
        return $CI->load->view('inventores/index', ["inventores" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $fields = $CI->Inventores_model->getFillableFields();
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
        $labels = ['Id', 'Pais', 'Nombre', 'Apellido', "Direccion", "Domicilio", "Nacionalidad"];
        return $CI->load->view('inventores/create', ['fields' => $inputs, 'labels' => $labels, 'pais' => $CI->Inventores_model->findAllPais()]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'apellid',
                'label' => 'Apellido',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un apellido',
                    'min_length' => 'Apellido demasiado corto',
                    'max_lenght' => 'Apellido demasiado largo'
                ]
            ],
            [
                'field' => 'direccion',
                'label' => 'Direccion',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Debe indicar una direccion',
                    'min_length' => 'Direccion demasiado corta',
                ]
            ],
            [
                'field' => 'domicilio',
                'label' => 'Domicilio',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Debe indicar un domicilio',
                    'min_length' => 'Domicilio demasiado corto',
                ]
            ],
            [
                'field' => 'nacionalidad',
                'label' => 'Nacionalidad',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una nacionalidad',
                    'min_length' => 'Nacionalidad demasiado corta',
                    'max_lenght' => 'Nacionalidad demasiado larga'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->Inventores_model->getFillableFields();
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
            $labels = ['Id', 'Pais', 'Nombre', 'Apellido', "Direccion", "Domicilio", "Nacionalidad"];
            return $CI->load->view('inventores/create', ['fields' => $inputs, 'labels' => $labels, 'pais' => $CI->Inventores_model->findAllPais()]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->Inventores_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/inventorescontroller/'));
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
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $query = $CI->Inventores_model->find($id);
        $paises = $CI->Inventores_model->findAllPais();
        if(isset($query))
        {
            $labels = array('Id', "Pais"  ,'Nombre', "Apellido", 'Direccion');
            return $CI->load->view('inventores/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'pais' => $paises]);
        }
        else{
            return redirect('pi/inventorescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'apellid',
                'label' => 'Apellido',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un apellido',
                    'min_length' => 'Apellido demasiado corto',
                    'max_lenght' => 'Apellido demasiado largo'
                ]
            ],
            [
                'field' => 'direccion',
                'label' => 'Direccion',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Debe indicar una direccion',
                    'min_length' => 'Direccion demasiado corta',
                ]
            ],
            [
                'field' => 'domicilio',
                'label' => 'Domicilio',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Debe indicar un domicilio',
                    'min_length' => 'Domicilio demasiado corto',
                ]
            ],
            [
                'field' => 'nacionalidad',
                'label' => 'Nacionalidad',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una nacionalidad',
                    'min_length' => 'Nacionalidad demasiado corta',
                    'max_lenght' => 'Nacionalidad demasiado larga'
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
            $query = $CI->Inventores_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/inventorescontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $query = $CI->Inventores_model->delete($id);
        return redirect('pi/inventorescontroller/');
        
        
    }
}