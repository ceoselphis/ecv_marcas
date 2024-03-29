<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusquedasController extends AdminController
{
    protected $models = ['Busquedas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        return $CI->load->view('busquedas/index', ["busquedas" => $CI->Busquedas_model->findAll()]);
    }

    public function getBusquedas()
    {
        $CI = &get_instance();
        $CI->load->model("Busquedas_model");
        $params = $CI->input->get();
        $query = $CI->Busquedas_model->findAll();
        $staff = $CI->Busquedas_model->getAllStaff();
        $claseNiza = $CI->Busquedas_model->getAllClases();
        $paises = $CI->Busquedas_model->getAllPaises();
        $tipoBusqueda = $CI->Busquedas_model->getTipoBusquedas();
        $response = array();
        foreach($query as $row)
        {
            $busquedaInt = (is_null($row['busqueda_interna_id'])) ? '' : $tipoBusqueda[$row['busqueda_interna_id']]; 
            $busquedaExt = (is_null($row['busqueda_externa_id'])) ? '' : $tipoBusqueda[$row['busqueda_externa_id']]; 
            $response[] = array(
                'id' => $row['id'],
                'clase' => $claseNiza[$row['clase_niza_id']],
                'pais' => $paises[$row['pais_id']],
                'responsable' => $staff[$row['staff_id']],
                'busqueda_interna' => $busquedaInt,
                'busqueda_general' => $busquedaExt,
                'acciones' => "<a href='".admin_url('pi/BusquedasController/edit/'.$row['id'])."'><i class='fa-solid fa-edit'></i> Editar</a>",
                'marca' => $row['marca']
            );
        }
        echo json_encode($response);
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

    //  public function store()
    // {
    //     $CI = &get_instance();
    //     $CI->load->model("Busquedas_model");
    //     $CI->load->helper(['url','form']);
    //     $CI->load->library('form_validation');
    //     $data = $CI->input->post();
        
    //     /*`tbl_marcas_busquedas`(`id`, `comentarios`, `staff_id`, `marca`, `fecha_solicitud`, `fecha_respuesta`, `ref_cliente`, `busqueda_interna_id`, `busqueda_externa_id`, `clase_niza_id`, `pais_id`, `created_at`, `is_deleted`, `client_id`, `oficina_id`) */
    //     $insert = array(
    //         'comentarios' => $data['comentarios'],
    //         'staff_id' => $data['staff_id'],
    //         'marca' => $data['marca'],
    //         'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
    //         'fecha_respuesta' => $this->turn_dates($data['fecha_respuesta']),
    //         'ref_cliente' => $data['ref_cliente'],
    //         'busqueda_interna_id' => $data['busqueda_interna_id'],
    //         'busqueda_externa_id' => $data['busqueda_externa_id'],
    //         'clase_niza_id' => $data['clase_niza_id'],
    //         'pais_id' => $data['pais_id'],
    //         'client_id' => $data['client_id'],
    //         'oficina_id' => $data['oficina_id'],
    //         'is_deleted' => 0,
            
    //     );
    //     echo json_encode($insert);
    //     $CI->load->model("Cesion_model");
    //             try{
    //                 $query = $CI->Cesion_model->insert($insert);
    //                     if (isset($query)){
    //                         echo "Insertado Correctamente";

    //                     }else {
    //                         echo "No hemos podido Insertar";
    //                     }
    //             }catch (Exception $e){
    //                 return $e->getMessage();
    //             }
    //    // "id":"1","client_id":"19","oficina_id":"1","staff_id":"10","marca":"Alvion Marcas ","clase_niza_id":"1","pais_id":"12","fecha_solicitud":"04\/09\/2023","fecha_respuesta":"19\/09\/2023","ref_cliente":"AB-0005","busqueda_interna_id":"1","busqueda_externa_id":"1","comentarios":"Insertando gente en Base de datos"

        
        
    // }

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
            $data['id']='';
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
            $busquedaInt = ($data['busqueda_interna_id'] == 'NULL') ? NULL : $data['busqueda_interna_id']; 
            $busquedaExt = ($data['busqueda_externa_id'] == 'NULL') ? NULL : $data['busqueda_externa_id']; 
            $qInsert = array(
                'staff_id' => $data['staff_id'],
                'marca'    => $data['marca'],
                'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
                'fecha_respuesta' => $this->turn_dates($data['fecha_respuesta']),
                'ref_cliente'   => $data['ref_cliente'],
                'comentarios' => $data['comentarios'],
                'busqueda_interna_id' => $busquedaInt,
                'busqueda_externa_id' => $busquedaExt,
                'is_deleted' => 1,
                'client_id'  => $data['client_id'],
                'oficina_id' => $data['oficina_id'],
            );
            $query = $CI->Busquedas_model->update($id, $qInsert);
            if (isset($query))
            {
                return redirect('pi/BusquedasController/edit/'.$id);
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