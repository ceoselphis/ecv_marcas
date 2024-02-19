<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SolicitudesController extends AdminController
{
    protected $models = ['PatentesSolicitudes_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        return $CI->load->view('patente/solicitudes/index', [
            'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
        ]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $fields = $CI->PatentesSolicitudes_model->getFillableFields();
        $inputs = array();
        $labels = array();
        foreach ($fields as $field) {
            if ($field['type'] == 'INT') {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            } else {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        $labels = ['Id', 'Nombre del anexo'];
        return $CI->load->view('patente/solicitudes/create', [
            'fields' => $inputs,
            'labels' => $labels,
            'id' => $CI->PatentesSolicitudes_model->last_insert_id(),
            'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
            'clientes' => $CI->PatentesSolicitudes_model->getAllClients(),
            'oficinas' => $CI->PatentesSolicitudes_model->getAllOficinas(),
            'responsable' => $CI->PatentesSolicitudes_model->getAllStaff(),
            'pais_id' => $CI->PatentesSolicitudes_model->getAllPaises(),
            'propietarios' => $CI->PatentesSolicitudes_model->getAllPropietarios(),
            'inventores' => $CI->PatentesSolicitudes_model->getAllInventores(),
            'estados_solicitudes' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
        ]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper(['url', 'form']);
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

        if ($CI->form_validation->run() == FALSE) {
            $fields = $CI->PatentesSolicitudes_model->getFillableFields();
            $inputs = array();
            $labels = array();
            foreach ($fields as $field) {
                if ($field['type'] == 'INT') {
                    $inputs[] = array(
                        'name' => $field['name'],
                        'id'   => $field['name'],
                        'type' => 'range',
                        'class' => 'form-control'
                    );
                } else {
                    $inputs[] = array(
                        'name' => $field['name'],
                        'id'   => $field['name'],
                        'type' => 'text',
                        'class' => 'form-control'
                    );
                }
            }
            $labels = ['Id', 'Nombre del anexo'];
            return $CI->load->view('patente/solicitudes/create', [
                'fields' => $inputs,
                'labels' => $labels,
                'id' => $CI->PatentesSolicitudes_model->last_insert_id(),
                'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
                'clientes' => $CI->PatentesSolicitudes_model->getAllClients(),
                'oficinas' => $CI->PatentesSolicitudes_model->getAllOficinas(),
                'responsable' => $CI->PatentesSolicitudes_model->getAllStaff(),
                'pais_id' => $CI->PatentesSolicitudes_model->getAllPaises(),
                'propietarios' => $CI->PatentesSolicitudes_model->getAllPropietarios(),
                'inventores' => $CI->PatentesSolicitudes_model->getAllInventores(),
                'estados_solicitudes' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
            ]);
        } else {
            //we sent the data to the model
            $query = $CI->PatentesSolicitudes_model->insert($data);
            if (isset($query)) {
                return redirect(admin_url('pi/patentes/SolicitudesController/'));
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
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->PatentesSolicitudes_model->find($id);
        if (isset($query)) {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('patente/solicitudes/edit', [
                'labels' => $labels, 
                'values' => $query, 
                'id' => $id,
                'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
                'clientes' => $CI->PatentesSolicitudes_model->getAllClients(),
                'oficinas' => $CI->PatentesSolicitudes_model->getAllOficinas(),
                'responsable' => $CI->PatentesSolicitudes_model->getAllStaff(),
                'pais_id' => $CI->PatentesSolicitudes_model->getAllPaises(),
                'propietarios' => $CI->PatentesSolicitudes_model->getAllPropietarios(),
                'inventores' => $CI->PatentesSolicitudes_model->getAllInventores(),
                'estados_solicitudes' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
            ]);
        } else {
            return redirect('pi/patentes/SolicitudesController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url', 'form']);
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
        if ($CI->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            //We prepare the data 
            $query = $CI->PatentesSolicitudes_model->update($id, $data);
            if (isset($query)) {
                return redirect('pi/patentes/SolicitudesController/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->PatentesSolicitudes_model->delete($id);
        return redirect('pi/patentes/SolicitudesController/');
    }
}
