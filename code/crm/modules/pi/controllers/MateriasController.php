<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriasController extends AdminController
{
    protected $models = ['Materias_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        return $CI->load->view('materias/index', ["materias" => $CI->Materias_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        $fields = $CI->Materias_model->getFillableFields();
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
        $labels = ['Id', 'Descripcion'];
        return $CI->load->view('materias/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        // get the data
        $data = $CI->input->post();
        //we validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we set the rules
        $config = array(
            [
                'field' => 'descripcion',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una descripcion',
                    'min_length' => 'Descripcion demasiado corta',
                    'max_lenght' => 'Descripcion demasiado larga'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->Materias_model->getFillableFields();
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
            $labels = ['Id', 'Descripcion'];
            return $CI->load->view('materias/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->Materias_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/materiascontroller/'));
            }
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        $query = $CI->Materias_model->find($id);
        if(isset($query))
        {
            $table = '<table class="table"><thead><tr>';
            foreach(['Descripcion'] as $item)
            {
                $table .= '<th>'.$item.'</th>';
            }
            $table .= '</thead><tbody><tr>';
            foreach($query as $row)
            {
                $table .= "
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
        $CI->load->model("Materias_model");
        $CI->load->helper('url');
        $query = $CI->Materias_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Descripcion');
            return $CI->load->view('materias/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/materiascontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        //we validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'descripcion',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una descripcion',
                    'min_length' => 'Descripcion demasiado corta',
                    'max_lenght' => 'Descripcion demasiado larga'
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
            $query = $CI->Materias_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/materiascontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Materias_model");
        $CI->load->helper('url');
        $query = $CI->Materias_model->delete($id);
        return redirect('pi/materiascontroller/');
        
        
    }
}