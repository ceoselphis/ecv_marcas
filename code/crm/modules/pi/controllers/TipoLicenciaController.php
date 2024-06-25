<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoLicenciaController extends AdminController
{
    protected $models = ['TipoLicencia_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->TipoLicencia_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $fields = $CI->TipoLicencia_model->getFillableFields();
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

    public function EditLicencia(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $query =$CI->TipoLicencia_model->find($id);
        echo json_encode($query);   
    }

    // public function UpdateLicencia(string $id = null){
    //     $CI = &get_instance();
    //     $CI->load->model("TipoLicencia_model");
    //     $data = $CI->input->post();
    //     if (!empty($data)){
    //         $insert = array(
    //                     'oficina_id' => $data['oficina'],
    //                     'estado_id' => $data['estado'],
    //                     'staff_id' => $data['staff'],
    //                     'num_solicitud' => $data['nro_solicitud'],
    //                     'fecha_solicitud' => $this->turn_dates($data['fecha_solicitud']),
    //                     'num_resolucion' => $data['nro_resolucion'],
    //                     'fecha_resolucion' => $this->turn_dates($data['fecha_resolucion']),
    //                     'referencia_cliente' => $data['referenciacliente'],
    //                     'comentarios' => $data['comentario'],
    //                 );
    //                 echo json_encode($insert);
    //                 $query = $CI->TipoLicencia_model->update($id, $insert);
    //                 if (isset($query))
    //                 {
    //                     echo "Actualizado Correctamente";
    //                 }else {
    //                     echo "No hemos podido Actualizar";
    //                 }
    //     }  else {
    //         echo "No tiene Data";
    //     }
    // }
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
       
    public function addLicencia(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
        
            $propietarios = explode(',', $data['propietarios']);
            $insert = array();
            foreach ($propietarios as $p) {
                $arr_propietario = array(
                    'licencia_id' => $data['id_cambio'],
                    'tipo_licenciante' => $data['tipo_licenciante'],
                    'propietario_id' => $p,
                );
                array_push($insert, $arr_propietario);
            }
            
            $CI->load->model("TipoLicencia_model");
            try{
                $query = $CI->TipoLicencia_model->addLicencias($insert);
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

    public function addLicenciaAnterior(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
        /*INSERT INTO `tbl_marcas_licenciantes`(`id`, `licencia_id`, `tipo_licenciante`, `propietario_id`)
        */ 
        $insert = array(
            'licencia_id' => $data['id_cambio'],
            'tipo_licenciante' => 1,
            'propietario_id' => $data['propietarios'],
        );
        
        $CI->load->model("TipoLicencia_model");
            try{
                $query = $CI->TipoLicencia_model->insert($insert);
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
    public function addLicenciaActual(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
        /*INSERT INTO `tbl_marcas_licenciantes`(`id`, `licencia_id`, `tipo_licenciante`, `propietario_id`)
        */ 
        $insert = array(
            'licencia_id' => $data['id_cambio'],
            'tipo_licenciante' => 2,
            'propietario_id' => $data['propietarios'],
        );
        $CI->load->model("TipoLicencia_model");
            try{
                $query = $CI->TipoLicencia_model->insert($insert);
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
    public function showLicenciaAnterior(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $marcas = $CI->TipoLicencia_model->findAllLicencia($id);
        $data = array();
        foreach ($marcas as $row){
            if ($row['tipo_licenciante']==1){
                $data[] = array(
                'id' => $row['id'],
                'licencia' => $CI->TipoLicencia_model->BuscarLicencia($row['licencia_id']),
                'tipo' => 'Anterior',
                'propietario' => $CI->TipoLicencia_model->BuscarPropietarios($row['propietario_id']),
                'licencia_id' => $id,
                'propietario_id' => $row['propietario_id']
                );
            }
        }
        echo json_encode($data);

    }

    public function showLicenciaActual(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $marcas = $CI->TipoLicencia_model->findAllLicencia($id);
        $data = array();
        foreach ($marcas as $row){
            if ($row['tipo_licenciante']==2){
                $data[] = array(
                'id' => $row['id'],
                'licencia' => $CI->TipoLicencia_model->BuscarLicencia($row['licencia_id']),
                'tipo' => 'Actual',
                'propietario' => $CI->TipoLicencia_model->BuscarPropietarios($row['propietario_id']),
                'licencia_id' => $id,
                'propietario_id' => $row['propietario_id']
                );
            }
        }
        echo json_encode($data);

    }


    public function UpdateTipoLicencia(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $data = $CI->input->post();
        echo json_encode($data);
        if (!empty($data)){
            $insert = array(
                    'propietario_id' => $data['propietarios'],
                    );
                    
                    echo json_encode($insert);
                    $query = $CI->TipoLicencia_model->update($id, $insert);
                    echo json_encode($query);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }
                    else{
                        echo "No se Actualizado Correctamente";
                    }
        }  else {
            echo "No tiene Data";
        }
    }
    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
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
            $fields = $CI->TipoLicencia_model->getFillableFields();
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
            $query = $CI->TipoLicencia_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/MarcasDomicilioController/'));
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
        $CI->load->model("TipoLicencia_model");
        $CI->load->helper('url');
        $query = $CI->TipoLicencia_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/MarcasDomicilioController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
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
            $query = $CI->TipoLicencia_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/MarcasDomicilioController/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("TipoLicencia_model");
        $CI->load->helper('url');
        $query = $CI->TipoLicencia_model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}