<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CesionController extends AdminController
{
    protected $models = ['Cesion_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->Cesion_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
        $fields = $CI->Cesion_model->getFillableFields();
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
        return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */
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
     public function addCesion(){
        $CI = &get_instance();
        $data = $CI->input->post();
        //echo json_encode($data);
        if (!empty($data)){
            /*`tbl_marcas_cesiones`(`id`, `client_id`, `oficina_id`, `marcas_id`, `staff_id`, `estado_id`, `solicitud_num`, `fecha_solicitud`, `resolucion_num`, `fecha_resolucion`, `referencia_cliente`, `comentarios`)*/ 
            $insert = array(
                            'client_id' => $data['cliente'],
                            'oficina_id' => $data['oficina'],
                            'staff_id' => $data['staff'],
                            'marcas_id' => 1,
                            'estado_id' => $data['estado'],
                            'solicitud_num' => $data['nro_solicitud'],
                            'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
                            'resolucion_num' => $data['nro_resolucion'],
                            'fecha_resolucion' => $this->turn_dates($data['fecha_resolucion']),
                            'referencia_cliente' => $data['referenciacliente'],
                            'comentarios' => $data['comentario'],
                    );

            $CI->load->model("Cesion_model");
                try{
                    $query = $CI->Cesion_model->insert($insert);
                        if (isset($query)){
                            echo "Insertado Correctamente";

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo "No tiene Data";
        }
     }

     public function EditCesion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
        $query =$CI->Cesion_model->find($id);
        echo json_encode($query);   
     }
     public function showCesion(){
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
        $marcas = $CI->Cesion_model->findAll();
        $data = array();
        foreach ($marcas as $row){
            $data[] = array(
            'id' => $row['id'],
            'cliente' => $CI->Cesion_model->BuscarClientes($row['client_id']),   
            'oficina' => $CI->Cesion_model->BuscarOficina($row['oficina_id']),
            'estado' => $CI->Cesion_model->BuscarEstado($row['estado_id']),
            'staff' => $CI->Cesion_model->BuscarStaff($row['staff_id']),
            'num_solicitud' => $row['solicitud_num'],
            'fecha_solicitud' => $row['fecha_solicitud'],
            'num_resolucion' => $row['resolucion_num'],
            'fecha_resolucion' => $row['fecha_resolucion'],
            'referencia_cliente' => $row['referencia_cliente'],
            'comentarios' => $row['comentarios'],
            );
        }
        echo json_encode($data);

     }
    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
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
            $fields = $CI->Cesion_model->getFillableFields();
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
            return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->Cesion_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/CesionController/'));
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
        $CI->load->model("Cesion_model");
        $CI->load->helper('url');
        $query = $CI->Cesion_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/CesionController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
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
            $query = $CI->Cesion_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/CesionController/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Cesion_model");
        $CI->load->helper('url');
        $query = $CI->Cesion_model->delete($id);
        return redirect('pi/CesionController/');
        
        
    }
}