<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatentePrioridadController extends AdminController
{
    protected $models = ['PatentesPrioridad_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $query = $CI->PatentesPrioridad_model->findAll();
        $data = array();
        foreach($query as $row)
        {
            $data[] = [
                'pri_pat_id' => $row['pri_pat_id'],
                'sol_pat_id' => $CI->PatentesPrioridad_model->findPatentes($row['sol_pat_id'])[0]['titulo'],
                'fecha'      => date('d/m/Y', strtotime($row['fecha'])),
                'pais_id'    => $CI->PatentesPrioridad_model->findPais($row['pais_id'])[0]['nombre'],
            ];
        }
        return $CI->load->view('patente/prioridad/index', ["prioridades" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $fields = $CI->PatentesPrioridad_model->getFillableFields();
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
        $labels = ['Id', 'Solicitud', 'Fecha', 'Pais'];
        return $CI->load->view('patente/prioridad/create', ['fields' => $inputs, 'labels' => $labels, 'pais' => $CI->PatentesPrioridad_model->findAllPais(), "solicitud" => $CI->PatentesPrioridad_model->findAllPatentes()]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'sol_pat_id',
                'label' => 'Nº de Solicitud',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe seleccionar una solicitud de patente',
                ]
            ],
            [
                'field' => 'fecha',
                'label' => 'Fecha',
                'rules' => 'trim|required|max_length[10]',
                'errors' => [
                    'required' => 'Debe indicar una fecha',
                    'max_lenght' => 'Fecha demasiado larga'
                ]
            ],
            [
                'field' => 'pais_id',
                'label' => 'Pais de procedencia',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar un pais de procedencia',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->PatentesPrioridad_model->getFillableFields();
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
            $labels = ['Id', 'Solicitud', 'Fecha', 'Pais'];
        return $CI->load->view('patente/prioridad/create', ['fields' => $inputs, 'labels' => $labels, 'pais' => $CI->PatentesPrioridad_model->findAllPais(), "solicitud" => $CI->PatentesPrioridad_model->findAllPatentes()]);
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
                'field' => 'sol_pat_id',
                'label' => 'Nº de Solicitud',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe seleccionar una solicitud de patente',
                ]
            ],
            [
                'field' => 'fecha',
                'label' => 'Fecha',
                'rules' => 'trim|required|max_length[10]',
                'errors' => [
                    'required' => 'Debe indicar una fecha',
                    'max_lenght' => 'Fecha demasiado larga'
                ]
            ],
            [
                'field' => 'pais_id',
                'label' => 'Pais de procedencia',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar un pais de procedencia',
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