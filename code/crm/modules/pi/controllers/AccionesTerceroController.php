<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccionesTerceroController extends AdminController
{
    protected $models = ['AccionesContraTerceros_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        return $CI->load->view('acciones_terceros/index');
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $data = [
            'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
        ];
        
        
        return $CI->load->view('acciones_terceros/create', $data);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nro_solicitud',
                'label' => 'Numero de solicitud',
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
            $fields = $CI->AccionesContraTerceros_model->getFillableFields();
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
            $data = [
                'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
                'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
                'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
                'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
                'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
                'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
                'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
                'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
                'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
                'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            ];
            return $CI->load->view('acciones_terceros/create', $data);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->AccionesContraTerceros_model->insert($data);
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
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper('url');
        $query = $CI->AccionesContraTerceros_model->find($id);
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
        $CI->load->model("AccionesContraTerceros_model");
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
            $query = $CI->AccionesContraTerceros_model->update($id, $data);
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
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper('url');
        $query = $CI->AccionesContraTerceros_model->delete($id);
        return redirect('pi/anexoscontroller/');
        
        
    }
}