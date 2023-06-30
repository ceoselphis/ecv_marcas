<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoletinesController extends AdminController
{
    protected $models = ['Boletines_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Boletines_model");
        $data = array();
        foreach($CI->Boletines_model->findAll() as $row)
        {
            $data[] = array(
                'boletin_id' => $row['boletin_id'],
                'fecha_publicacion'    => $row['fecha_publicacion'],
                'pais_id'=> ucfirst($CI->Boletines_model->findPaises($row['pais_id'])[0]['nombre']),
                'nombre' => ucfirst($row['nombre']),
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
                'field' => 'boletin_id',
                'label' => 'Nº de Boletin',
                'rules' => 'trim|required|min_length[3]|max_length[5]',
                'errors' => [
                    'required' => 'Debe Indicar un numero de boletin',
                    'min_length' => 'El numero debe ser mayor de tres digitos',
                    'max_lenght' => 'El numero debe ser menor a cinco digitos'
                ]
            ],
            [
                'field' => 'nombre',
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
        if(isset($query))
        {
            $labels = array('Nº Boletin', 'Pais', 'Nombre', 'Fecha de Publicacion');
            return $CI->load->view('boletines/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'paises' => $select]);
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
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[5]',
                'errors' => [
                    'required' => 'Debe Indicar un nombre',
                    'min_length' => 'El nombre debe ser mayor de tres caracteres',
                    'max_lenght' => 'El nombre debe ser menor a cinco caracteres'
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
        if(!$CI->form_validation->run() == FALSE)
        {
            //We prepare the data 
            $query = $CI->Boletines_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/boletinescontroller/');
            }
        }
        else {
            return redirect(admin_url('pi/boletinescontroller/edit/'.$id));
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