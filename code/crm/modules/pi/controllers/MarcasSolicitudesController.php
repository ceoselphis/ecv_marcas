<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasSolicitudesController extends AdminController
{
    protected $models = ['MarcasSolicitudes_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $data = array();
        if(!empty($CI->MarcasSolicitudes_model->findAll()))
        {
            foreach($CI->MarcasSolicitudes_model->findAll() as $row)
            {
                $data[] = array(
                    'solicitud_id' => $row['solicitud_id'],
                    'reg_num_id'   => $row['reg_num_id'],
                    'tipo_id'      => $CI->MarcasSolicitudes_model->findTipoSolicitud($row['tipo_id'])[0]['nombre'],
                    'cod_estado_id'=> $CI->MarcasSolicitudes_model->findEstadosSolicitudes($row['cod_estado_id'])[0]['nombre'],
                    'primer_uso'   => date('d/m/Y', strtotime($row['primer_uso'])),
                    'prueba_uso'   => date('d/m/Y', strtotime($row['prueba_uso'])),
                    'carpeta'      => $row['carpeta'],
                    'numero_solicitud' => $row['numero_solicitud'],
                    'fecha_solicitud'  => date('d/m/Y', $row['fecha_solicitud']),
                    'fecha_registro'  => date('d/m/Y', $row['fecha_registro']),
                    'fecha_certificado'  => date('d/m/Y', $row['fecha_certificado']),
                    'num_certificado'  => $row['num_certificado'],
                    'fecha_vencimiento'  => date('d/m/Y', $row['fecha_vencimiento']),
                    );
            }
        }
        return $CI->load->view('marcas/solicitudes/index', ["marcas" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        //We get the fields of the register table
        $regFields = $CI->MarcasSolicitudes_model->getFieldsRegistros();
        //We get the fields of Request table
        $solFields = $CI->MarcasSolicitudes_model->getFillableFields();
        //We get all the offices
        $oficinas = $CI->MarcasSolicitudes_model->findAllOficinas();
        $inputs = array();
        $labels = array();
        foreach($solFields as $field)
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
        foreach($regFields as $regField){
            if($regField['Type'] == 'int')
            {
                $inputs[] = array(
                    'name' => $regField['Field'],
                    'id'   => $regField['Field'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $regField['Field'],
                    'id'   => $regField['Field'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        $labels = ['Nº Solicitud', 'Nº de Registro', 'Tipo Solicitud', 'Estado de solicitud', ''];
        return $CI->load->view('marcas/solicitudes/create', 
                                [
                                    'fields'                => $inputs, 
                                    'labels'                => $labels, 
                                    'oficinas'              => $CI->MarcasSolicitudes_model->findAllOficinas(), 
                                    'clientes'              => $CI->MarcasSolicitudes_model->findAllClients(),
                                    'tipo_solicitud'        => $CI->MarcasSolicitudes_model->findAllTipoSolicitud(),
                                    'estados_solicitudes'   => $CI->MarcasSolicitudes_model->findAllEstadosSolicitudes()
                                ]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url','form']);
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
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->MarcasSolicitudes_model->getFillableFields();
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
            return $CI->load->view('marcas/solicitudes/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->MarcasSolicitudes_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/marcassolicitudescontroller/'));
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
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudes_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('marcas/solicitudes/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/marcassolicitudescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
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
            $query = $CI->MarcasSolicitudes_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/marcassolicitudescontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudes_model->delete($id);
        return redirect('pi/marcassolicitudescontroller/');
        
        
    }
}