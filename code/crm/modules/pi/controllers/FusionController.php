<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FusionController extends AdminController
{
    protected $models = ['Fusion_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->Fusion_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

     public function EditFusion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        $query =$CI->Fusion_model->find($id);
        echo json_encode($query);   
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
 
     public function UpdateFusion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                        'oficina_id' => $data['oficina'],
                        'estado_id' => $data['estado'],
                        'num_solicitud' => $data['nro_solicitud'],
                        'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
                        'num_resolucion' => $data['nro_resolucion'],
                        'fecha_resolucion' => $this->turn_dates($data['fecha_resolucion']),
                        'referencia_cliente' => $data['referenciacliente'],
                        'comentarios' => $data['comentario'],
                    );
                   
                    echo json_encode($insert);
                    $query = $CI->Fusion_model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }
        }  else {
            echo "No tiene Data";
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

     public function addFusionShowModal(){
        $CI = &get_instance();
        $data = $CI->input->post();
            /*`tbl_marcas_fusion`(`id`, `marcas_id`, `oficina_id`, `num_solicitud`, `fecha_solicitud`, `estado_id`, `num_resolucion`, `fecha_resolucion`, `referencia_cliente`, `comentarios`) */ 
            $insert = array(
                            'oficina_id' => "1",
                            'marcas_id' => $data['id_marcas'],
                            'estado_id' => "1",
                            'num_solicitud' => "",
                            'fecha_solicitud' => "",
                            'num_resolucion' => "",
                            'fecha_resolucion' => "",
                            'referencia_cliente' => "",
                            'comentarios' => "",
                    );
            //echo json_encode($insert);
            $CI->load->model("Fusion_model");
                try{
                    $query = $CI->Fusion_model->insert($insert);
                        if (isset($query)){
                            $cantidad = $CI->Fusion_model->CantidadFusion();
                            echo $cantidad;

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
      
        
    }
    public function addFusion(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                            'client_id' => $data['cliente'],
                            'oficina_id' => $data['oficina'],
                            'staff_id' => $data['staff'],
                            'marcas_id' => $data['id_marcas'],
                            'estado_id' => $data['estado'],
                            'num_solicitud' => $data['nro_solicitud'],
                            'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
                            'num_resolucion' => $data['nro_resolucion'],
                            'fecha_resolucion' => $this->turn_dates($data['fecha_resolucion']),
                            'referencia_cliente' => $data['referenciacliente'],
                            'comentarios' => $data['comentario'],
                    );
            echo "Fusion ",json_encode($insert);
            $CI->load->model("Fusion_model");
                try{
                    $query = $CI->Fusion_model->insert($insert);
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
    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        $fields = $CI->Fusion_model->getFillableFields();
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

    public function showFusion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        $marcas = $CI->Fusion_model->findAllFusionMarcas($id);
        $data = array();
        foreach ($marcas as $row){
            $data[] = array(
            'id' => $row['id'],
            'cliente' => $row['client_id'] ? $CI->Fusion_model->BuscarClientes($row['client_id']) : '', 
            'oficina' => $CI->Fusion_model->BuscarOficina($row['oficina_id']),
            'estado' => $CI->Fusion_model->BuscarEstado($row['estado_id']),
            'staff' => $row['staff_id'] ? $CI->Fusion_model->BuscarStaff($row['staff_id']) : '',
            'num_solicitud' => $row['num_solicitud'],
            'fecha_solicitud' => date('d/m/Y', strtotime($row['fecha_solicitud'])),
            'num_resolucion' => $row['num_resolucion'],
            'fecha_resolucion' => date('d/m/Y', strtotime($row['fecha_resolucion'])),
            'referencia_cliente' => $row['referencia_cliente'],
            'comentarios' => $row['comentarios'],
            'client_id' => $row['client_id'],
            'oficina_id' => $row['oficina_id'],
            'staff_id' => $row['staff_id'],
            'estado_id' => $row['estado_id'],
            );
        }
        echo json_encode($data);

     }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
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
            $fields = $CI->Fusion_model->getFillableFields();
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
            $query = $CI->Fusion_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/FusionController/'));
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
        $CI->load->model("Fusion_model");
        $CI->load->helper('url');
        $query = $CI->Fusion_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/FusionController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
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
            $query = $CI->Fusion_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/FusionController/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Fusion_model");
        $CI->load->helper('url');
        $query = $CI->Fusion_model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}