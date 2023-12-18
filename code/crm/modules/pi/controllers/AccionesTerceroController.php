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
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
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
        
        $form = array();
        echo "<pre>";
        $data = $CI->input->post();
        $form['tipo_solicitud_id'] = $data['tipo_solicitud_id'];
        $form['client_id']         = $data['client_id'];
        $form['oficina_id']        = $data['staff_id'];
        $form['marcas_id']         = $data['marcas_id'];
        $form['fundamento']        = $data['fundamento'];
        $form['marca_opuesta']     = $data['marca_opuesta'];
        $form['clase_niza']        = $data['clase_niza'];
        $form['pais_id']           = $data['pais_id_opuesta'];
        $form['solicitud_nro']     = $data['nro_solicitud_opuesta'];
        $form['fecha_solicitud']   = $data['fecha_solicitud_opuesta'];
        $form['registro_nro']      = $data['nro_registro_opuesta']; 
        $form['fecha_registro']    = $data['fecha_registro_opuesta'];
        $form['propietario']       = $data['propietario_opuesta'];
        $form['agente']            = $data['agente'];
        $form['boletin_id']        = $data['boletin'];
        $form['fecha_boletin']     = $data['fecha_boletin'];
        $form['estado_id']         = $data['estado_id'];
        $form['comentarios']       = $data['comentarios'];
        try {
            $query = $CI->AccionesContraTerceros_model->insert($form);
            $id = $CI->AccionesContraTerceros_model->last_insert_id();
            return redirect("pi/AccionesTerceroController/edit/{$id}");
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
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
        $values = $CI->AccionesContraTerceros_model->find($id);
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
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            'values' => $values[0],
        ];
        return $CI->load->view('acciones_terceros/edit', $data);
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

    public function findDenominacion()
    {
        $CI = &get_instance();
        $CI->load->model('AccionesContraTerceros_model');
        $data = $CI->input->post();
        $denominacion = $CI->AccionesContraTerceros_model->findDenominacionBase($data['marcas_id']);
        $response = array();
        if(!empty($denominacion))
        {
            $clase = $CI->AccionesContraTerceros_model->findClaseNiza($data['marcas_id']);
            if(!empty($clase))
            {
                $clase_id = array();
                foreach($clase as $row)
                {
                    $clase_id[] = $row['clase_id'];
                }
                $denominacion['clase'] = $clase_id;
            }
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $denominacion]);
        }
        else
        {
            echo json_encode(['code' => 404, 'message' => 'not found']);
        }

    }
}