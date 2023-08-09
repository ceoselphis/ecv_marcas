<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusquedasController extends AdminController
{
    protected $models = ['Busquedas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        return $CI->load->view('busquedas/index', ["busquedas" => $CI->Busquedas_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        $fields = $CI->Busquedas_model->getFillableFields();
        $clients = $CI->Busquedas_model->getAllClients();
        $staff = $CI->Busquedas_model->getAllStaff();
        $claseNiza = $CI->Busquedas_model->getAllClases();
        $paises = $CI->Busquedas_model->getAllPaises();
        $tipoBusqueda = $CI->Busquedas_model->getTipoBusquedas();
        $oficinas = $CI->Busquedas_model->getOficinas();
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
        $labels = [];
        return $CI->load->view('busquedas/create', ['fields' => $inputs, 'labels' => $labels, 'clients' => $clients, 'oficinas' => $oficinas, 'staff' => $staff, 'claseNiza' => $claseNiza, 'paises' => $paises, 'tipoBusqueda' => $tipoBusqueda, 'id' => (intval($CI->Busquedas_model->last_insert_id()) + 1)]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'marca',
                'label' => 'Marca',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe seleccionar una marca',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $CI = &get_instance();
            $CI->load->model("Busquedas_model");
            $fields = $CI->Busquedas_model->getFillableFields();
            $clients = $CI->Busquedas_model->getAllClients();
            $staff = $CI->Busquedas_model->getAllStaff();
            $claseNiza = $CI->Busquedas_model->getAllClases();
            $paises = $CI->Busquedas_model->getAllPaises();
            $tipoBusqueda = $CI->Busquedas_model->getTipoBusquedas();
            $oficinas = $CI->Busquedas_model->getOficinas();
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
            $labels = [];
            return $CI->load->view('busquedas/create', ['fields' => $inputs, 'labels' => $labels, 'clients' => $clients, 'oficinas' => $oficinas, 'staff' => $staff, 'claseNiza' => $claseNiza, 'paises' => $paises, 'tipoBusqueda' => $tipoBusqueda, 'id' => $data['id']]);
        }
        else
        {
            //we turn the dates
            $data['fecha_solicitud'] = $this->turn_dates($data['fecha_solicitud']);
            $data['fecha_respuesta'] = $this->turn_dates($data['fecha_respuesta']);
            $data['created_at'] = date('Y-m-d h:i:s');
            //we turn the value 0 to NULL
            if($data['busqueda_interna_id'] == 'NULL')
            {
                $data['busqueda_interna_id'] = NULL;
            }
            if($data['busqueda_externa_id'] == 'NULL')
            {
                $data['busqueda_externa_id'] == NULL;
            }
            //we sent the data to the model
            $query = $CI->Busquedas_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/BusquedasController/'.$data['id']));
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
        $CI->load->model("Busquedas_model");
        $CI->load->helper('url');
        $query = $CI->Busquedas_model->find($id);
        $values = $query[0];
        if(empty($values))
        {
            return redirect(admin_url('pi/BusquedasController'));
        }
        $fields = $CI->Busquedas_model->getFillableFields();
        $clients = $CI->Busquedas_model->getAllClients();
        $staff = $CI->Busquedas_model->getAllStaff();
        $claseNiza = $CI->Busquedas_model->getAllClases();
        $paises = $CI->Busquedas_model->getAllPaises();
        $tipoBusqueda = $CI->Busquedas_model->getTipoBusquedas();
        $oficinas = $CI->Busquedas_model->getOficinas();
        $values['fecha_solicitud'] = $this->flip_dates($values['fecha_solicitud']);
        $values['fecha_respuesta'] = $this->flip_dates($values['fecha_respuesta']);
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
        $labels = [];
        return $CI->load->view('busquedas/edit', ['values' => $values, 'fields' => $inputs, 'labels' => $labels, 'clients' => $clients, 'oficinas' => $oficinas, 'staff' => $staff, 'claseNiza' => $claseNiza, 'paises' => $paises, 'tipoBusqueda' => $tipoBusqueda, 'id' => $id]);
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'client_id',
                'label' => 'Cliente',
                'rules' => 'trim|required|selectCheck',
                'errors' => [
                    'required' => 'Debe seleccionar un cliente',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'oficina_id',
                'label' => 'Oficina',
                'rules' => 'trim|required|selectCheck',
                'errors' => [
                    'required' => 'Debe seleccionar una oficina',
                ]
            ],
            [
                'field' => 'oficina_id',
                'label' => 'Oficina',
                'rules' => 'trim|required|selectCheck',
                'errors' => [
                    'required' => 'Debe seleccionar una oficina',
                ]
            ],
            [
                'field' => 'staff_id',
                'label' => 'Responsable',
                'rules' => 'trim|required|selectCheck',
                'errors' => [
                    'required' => 'Debe seleccionar un responsable',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'marca',
                'label' => 'Marca',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe seleccionar una marca',
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
            $query = $CI->Busquedas_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/busquedascontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        $CI->load->helper('url');
        $query = $CI->Busquedas_model->delete($id);
        return redirect('pi/busquedascontroller/');
    }

    public function documents()
    {
        $CI = &get_instance();
        $CI->load->model('Marcas_documentos_model');
        $data = $CI->input->post();
        $query = array(
            'descripcion' => $data['descripcion'],
            'comentarios' => $data['comentarios'],
            'archivo'     => '',
            'busquedas_id' => $data['busquedas_id'],
        );
        $file = '';
        if(!empty($_FILES['archivo']))
        {
            $file = $_FILES['archivo'];
        }
        else{
            $file = NULL;
        }
        if($file != NULL)
        {
            //We fill the data of the         
            $path = FCPATH.'uploads/busquedas/'.$data['busquedas_id'].'-'.$file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $query['archivo'] = $path;
        }
        $insert = $CI->Marcas_documentos_model->insert($query);
        if($insert)
        {
            echo json_encode(['status' => '200', 'message' => 'ok']);
        }
        else{
            echo json_encode(['status' => '500', 'message' => 'error']);
        }
    }

    public function getDocuments($id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Marcas_documentos_model');
        $query = $CI->Marcas_documentos_model->getAllByBusqueda($id);
        $result = array();
        foreach($query as $row)
        {
            $result[] = array(
                'descripcion' => $row['descripcion'],
                'comentarios' => $row[''],
            )
        }

    }

    private function selectCheck($value)
    {
        if($value == 0)
        {
            $CI = &get_instance();
            $CI->form_validation->set_message('selectCheck', "Debe seleccionar una opcion");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    private function flip_dates($date)
    {
        try{
            $wdate = explode('-',$date);
            $cdate = "{$wdate[2]}/{$wdate[1]}/{$wdate[0]}";
            return $cdate;
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    private function turn_dates($date)
    {
        try{
            $wdate = explode('/',$date);
            $cdate = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
            return $cdate;
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}