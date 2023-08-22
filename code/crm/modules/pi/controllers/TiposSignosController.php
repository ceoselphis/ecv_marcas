<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TiposSignosController extends AdminController
{
    protected $models = ['TiposSignos_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("TiposSignos_model");
        return $CI->load->view('TiposSignos/index', ["tiposigno" => $CI->TiposSignos_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("TiposSignos_model");
        $fields = $CI->TiposSignos_model->getFillableFields();
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
        $labels = ['Id', 'Nombre del tipo de signo'];
        return $CI->load->view('TiposSignos/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("TiposSignos_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre del tipo de signo',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->TiposSignos_model->getFillableFields();
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
            return $CI->load->view('TiposSignos/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->TiposSignos_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/tipossignoscontroller/'));
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
        $CI->load->model("TiposSignos_model");
        $CI->load->helper('url');
        $query = $CI->TiposSignos_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre tipo de signo');
            return $CI->load->view('TiposSignos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/tipossignoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TiposSignos_model");
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
                'label' => 'Nombre del tipo de signo',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
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
            $query = $CI->TiposSignos_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/tipossignoscontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("TiposSignos_model");
        $CI->load->helper('url');
        $query = $CI->TiposSignos_model->delete($id);
        return redirect('pi/tipossignoscontroller/');
        
        
    }
}