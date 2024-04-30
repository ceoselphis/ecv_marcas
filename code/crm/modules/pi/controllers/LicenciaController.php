<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LicenciaController extends AdminController
{
    protected $models = ['Licencia_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->Licencia_model->findAll()]);
    }

    public function showLicencia(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
        $marcas = $CI->Licencia_model->findAllLicenciaMarcas($id);
        $data = array();
        foreach ($marcas as $row){
            $data[] = array(
            'id' => $row['id'],
            'cliente' => $CI->Licencia_model->BuscarClientes($row['client_id']),   
            'oficina' => $CI->Licencia_model->BuscarOficina($row['oficina_id']),
            'estado' => $CI->Licencia_model->BuscarEstado($row['estado_id']),
            'staff' => $CI->Licencia_model->BuscarStaff($row['staff_id']),
            'num_solicitud' => $row['num_solicitud'],
            'fecha_solicitud' => date('d/m/Y', strtotime($row['fecha_solicitud'])),
            'num_resolucion' => $row['num_resolucion'],
            'fecha_resolucion' => date('d/m/Y', strtotime($row['fecha_resolucion'])),
            'referencia_cliente' => $row['referencia_cliente'],
            'comentarios' => $row['comentarios'],
            );
        }
        echo json_encode($data);

     }
     public function EditLicencia(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
        $query =$CI->Licencia_model->find($id);
        echo json_encode($query);   
     }

     public function UpdateLicencia(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
        $data = $CI->input->post();
        echo json_encode($data);
        if (!empty($data)){
            $insert = array(
                        'client_id' => $data['cliente'],
                        'oficina_id' => $data['oficina'],
                        'staff_id' => $data['staff'],
                        'estado_id' => $data['estado'],
                        'num_solicitud' => $data['nro_solicitud'],
                        'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
                        'num_resolucion' => $data['nro_resolucion'],
                        'fecha_resolucion' => $this->turn_dates($data['fecha_resolucion']),
                        'referencia_cliente' => $data['referenciacliente'],
                        'comentarios' => $data['comentario'],
                    );
                   

                    $query = $CI->Licencia_model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }
        }  else {
            echo "No tiene Data";
        }
    }
    /**
     * Shows the form to create a new item
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

    public function addLicenciaShowModal(){
        $CI = &get_instance();
        $data = $CI->input->post();
            /*`tbl_marcas_licencia`(`id`, `marcas_id`, `client_id`, `oficina_id`, `staff_id`, `estado_id`, `num_solicitud`, `fecha_solicitud`, `num_resolucion`, `fecha_resolucion`, `referencia_cliente`, `comentarios`)*/ 
            $insert = array(
                            'client_id' => "1",
                            'oficina_id' => "1",
                            'staff_id' => "1",
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
            $CI->load->model("Licencia_model");
                try{
                    $query = $CI->Licencia_model->insert($insert);
                        if (isset($query)){
                            $cantidad = $CI->Licencia_model->CantidadLicencia();
                            echo $cantidad;

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
      
        
    }

     public function addLicencia(){
        $CI = &get_instance();
        $data = $CI->input->post();
        
        if (!empty($data)){
            /*`tbl_marcas_licencia`(`id`, `marcas_id`, `client_id`, `oficina_id`, `staff_id`, `estado_id`, `num_solicitud`, `fecha_solicitud`, `num_resolucion`, `fecha_resolucion`, `referencia_cliente`, `comentarios`)*/ 
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
            
            $CI->load->model("Licencia_model");
                try{
                    $query = $CI->Licencia_model->insert($insert);
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
        $CI->load->model("Licencia_model");
        $fields = $CI->Licencia_model->getFillableFields();
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

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
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
            $fields = $CI->Licencia_model->getFillableFields();
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
            $query = $CI->Licencia_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/LicenciaController/'));
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
        $CI->load->model("Licencia_model");
        $CI->load->helper('url');
        $query = $CI->Licencia_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/LicenciaController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
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
            $query = $CI->Licencia_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/LicenciaController/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Licencia_model");
        $CI->load->helper('url');
        $query = $CI->Licencia_model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}