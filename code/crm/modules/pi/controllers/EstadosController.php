<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadosController extends AdminController
{
    protected $models = ['Estados_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Estados_model");
        $data = array();
        foreach($CI->Estados_model->findAll() as $row)
        {
            $data[] = array(
                'id' => $row['id'],
                'codigo'    => $row['codigo'],
                'nombre' => ucfirst($row['nombre']),
            );
        }
        return $CI->load->view('estados/index', ["estados" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Estados_model");
        $fields = $CI->Estados_model->getFillableFields();
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
        $labels = ['Id', 'Materia', 'Descripcion', 'Código'];
        return $CI->load->view('estados/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Estados_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'codigo',
                'label' => 'Código',
                'rules' => 'trim|required|min_length[1]|max_length[3]',
                'errors' => [
                    'required' => 'Debe indicar un código ',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'nombre',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[5]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una descripcion',
                    'min_length' => 'Descripción demasiado corta',
                    'max_lenght' => 'Descripción demasiado larga'
                ]
            ],            
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->Estados_model->getFillableFields();
            $inputs = array();
            $labels = array();
            $select = $CI->Estados_model->getAllMaterias();
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
            $labels = ['Id', 'Materia', 'Descripcion', 'Código'];
            return $CI->load->view('estados/create', ['fields' => $inputs, 'labels' => $labels, 'materias' => $select]);
        }
        else 
        {
            //we sent the data to the model
            $query = $CI->Estados_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/Estadoscontroller/'));
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
        $CI->load->model("Estados_model");
        $CI->load->helper('url');
        $query = $CI->Estados_model->find($id);
        $select = $CI->Estados_model->getAllMaterias();
        if(isset($query))
        {
            $labels = array('Id', 'Codigo', 'Materia', 'Descripcion');
            return $CI->load->view('estados/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'materia' => $select]);
        }
        else{
            return redirect('pi/Estadoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Estados_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'codigo',
                'label' => 'Código',
                'rules' => 'trim|required|min_length[1]|max_length[3]',
                'errors' => [
                    'required' => 'Debe indicar un código ',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'nombre',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[5]|max_length[120]',
                'errors' => [
                    'required' => 'Debe indicar una descripcion',
                    'min_length' => 'Descripción demasiado corta',
                    'max_lenght' => 'Descripción demasiado larga'
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
            $query = $CI->Estados_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/Estadoscontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Estados_model");
        $CI->load->helper('url');
        $query = $CI->Estados_model->delete($id);
        return redirect('pi/Estadoscontroller/');
        
        
    }
}