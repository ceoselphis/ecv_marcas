<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoletinesController extends AdminController
{
    protected $models = ['Boletines_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $data = array();
        foreach($CI->Boletines_model->findAll() as $row)
        {
            $data[] = array(
                'boletin_id' => $row['id'],
                'fecha_publicacion'    => $row['fecha_publicacion'],
                'pais_id'=> ucfirst($CI->Boletines_model->findPaises($row['pais_id'])[0]['nombre']),
                'nombre' => ucfirst($row['descripcion']),
            );
        }
        return $CI->load->view('boletines/index', ["boletines" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $fields = $CI->Boletines_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $select = $CI->Boletines_model->getAllPaises();
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
        $labels = ['Nº Boletin', 'Pais', 'Nombre', 'Fecha Publicacion'];
        return $CI->load->view('boletines/create', ['fields' => $inputs, 'labels' => $labels, 'paises' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we set the rules
        $config = array(
            [
                'field' => 'id',
                'label' => 'Nº de Boletin',
                'rules' => 'trim|required|min_length[3]|max_length[5]|regex_match[/[0-9][0-9][0-9]/]',
                'errors' => [
                    'required' => 'Debe Indicar un numero de boletin',
                    'min_length' => 'El número debe ser mayor de tres digitos',
                    'max_lenght' => 'El número debe ser menor a cinco digitos',
                    'regex_match' => "El número de boletin debe ser númerico"
                ]
            ],
            [
                'field' => 'descripcion',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe Indicar un nombre',
                    'min_length' => 'El nombre debe ser mayor de 3 caracteres',
                    'max_lenght' => 'El nombre debe ser menor a 60 caracteres'
                ]
            ],
            [
                'field' => 'fecha_publicacion',
                'label' => 'Fecha de Publicacion',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe Indicar una fecha',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->Boletines_model->getFillableFields();
            $inputs = array();
            $labels = array();
            $select = $CI->Boletines_model->getAllPaises();
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
            $labels = ['Nº Boletin', 'Pais', 'Nombre', 'Fecha Publicacion'];
            return $CI->load->view('boletines/create', ['fields' => $inputs, 'labels' => $labels, 'paises' => $select]);
        }
        else
        {
            //we sent the data to the model
            $unwantDate = explode('/',$data['fecha_publicacion']);
            $data['fecha_publicacion'] = date('Y-m-d h:i:s', strtotime($unwantDate[2].'-'.$unwantDate[1].'-'.$unwantDate[0]));
            $query = $CI->Boletines_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/boletinescontroller/'));
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
        $CI->load->model("Boletines_model");
        $CI->load->helper('url');
        $query = $CI->Boletines_model->find($id);
        $select = $CI->Boletines_model->getAllPaises();
        $fields = $CI->Boletines_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $select = $CI->Boletines_model->getAllPaises();
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
        if(!empty($query))
        {
            $labels = array('Nº Boletin', 'Pais', 'Nombre', 'Fecha de Publicacion');
            return $CI->load->view('boletines/edit', ['fields' => $inputs, 'labels' => $labels, 'paises' => $select, 'id' => $id, 'values' => $query]);
        }
        else{
            return redirect('pi/boletinescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'id',
                'label' => 'Nº de Boletin',
                'rules' => 'trim|required|min_length[3]|max_length[5]|regex_match[/[0-9][0-9][0-9]/]',
                'errors' => [
                    'required' => 'Debe Indicar un numero de boletin',
                    'min_length' => 'El número debe ser mayor de tres digitos',
                    'max_lenght' => 'El número debe ser menor a cinco digitos',
                    'regex_match' => "El número de boletin debe ser númerico"
                ]
            ],
            [
                'field' => 'descripcion',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe Indicar un nombre',
                    'min_length' => 'El nombre debe ser mayor de 3 caracteres',
                    'max_lenght' => 'El nombre debe ser menor a 60 caracteres'
                ]
            ],
            [
                'field' => 'fecha_publicacion',
                'label' => 'Fecha de Publicacion',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe Indicar una fecha',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else {
            //We prepare the data
            $unwantDate = explode('/',$data['fecha_publicacion']);
            $data['fecha_publicacion'] = date('Y-m-d h:i:s', strtotime($unwantDate[2].'-'.$unwantDate[1].'-'.$unwantDate[0]));
            $query = $CI->Boletines_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/boletinescontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $CI->load->helper('url');
        $query = $CI->Boletines_model->delete($id);
        return redirect('pi/boletinescontroller/');
        
        
    }
}