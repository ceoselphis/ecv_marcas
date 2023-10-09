<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoFusionController extends AdminController
{
    protected $models = ['TipoFusion_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->TipoFusion_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        $fields = $CI->TipoFusion_model->getFillableFields();
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

    public function EditFusion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        $query =$CI->TipoFusion_model->find($id);
        echo json_encode($query);   
    }

    // public function UpdateFusion(string $id = null){
    //     $CI = &get_instance();
    //     $CI->load->model("TipoFusion_model");
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
    //                 $query = $CI->TipoFusion_model->update($id, $insert);
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
    public function addFusionAnterior(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
        /*INSERT INTO `tbl_marcas_fusion_participantes`(`id`, `fusion_id`, `tipo_participante`, `propietario_id`)
        */ 
        $insert = array(
            'fusion_id' => $data['id_cambio'],
            'tipo_participante' => 1,
            'propietario_id' => $data['propietarios'],
        );
        
        $CI->load->model("TipoFusion_model");
            try{
                $query = $CI->TipoFusion_model->insert($insert);
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
    public function addFusionActual(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
        /*INSERT INTO `tbl_marcas_fusion_participantes`(`id`, `fusion_id`, `tipo_participante`, `propietario_id`)
        */ 
        $insert = array(
            'fusion_id' => $data['id_cambio'],
            'tipo_participante' => 2,
            'propietario_id' => $data['propietarios'],
        );
        $CI->load->model("TipoFusion_model");
            try{
                $query = $CI->TipoFusion_model->insert($insert);
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
    public function showFusionAnterior(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        $marcas = $CI->TipoFusion_model->findAllFusion($id);
        //INSERT INTO `tbl_marcas_fusion_participantes`(`id`, `fusion_id`, `tipo_participante`, `propietario_id`)
        $data = array();
        foreach ($marcas as $row){
            if ($row['tipo_participante']==1){
                $data[] = array(
                'id' => $row['id'],
                'fusion' => $CI->TipoFusion_model->BuscarFusion($row['fusion_id']),
                'tipo_participante' => 'Anterior',
                'propietario' => $CI->TipoFusion_model->BuscarPropietarios($row['propietario_id']),
                );
            }
        }
        echo json_encode($data);

    }

    public function showFusionActual(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        $marcas = $CI->TipoFusion_model->findAllFusion($id);
        //INSERT INTO `tbl_marcas_fusion_participantes`(`id`, `fusion_id`, `tipo_participante`, `propietario_id`)
        $data = array();
        foreach ($marcas as $row){
            if ($row['tipo_participante']==2){
                $data[] = array(
                'id' => $row['id'],
                'fusion' => $CI->TipoFusion_model->BuscarFusion($row['fusion_id']),
                'tipo' => 'Actual',
                'propietario' => $CI->TipoFusion_model->BuscarPropietarios($row['propietario_id']),
                );
            }
        }
        echo json_encode($data);

    }

   

    public function UpdateTipoFusion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("TipoFusion_model");
        $data = $CI->input->post();
        echo json_encode($data);
        if (!empty($data)){
            $insert = array(
                    'propietario_id' => $data['propietarios'],
                    );
                    
                    echo json_encode($insert);
                    $query = $CI->TipoFusion_model->update($id, $insert);
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
        $CI->load->model("TipoFusion_model");
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
            $fields = $CI->TipoFusion_model->getFillableFields();
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
            $query = $CI->TipoFusion_model->insert($data);
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
        $CI->load->model("TipoFusion_model");
        $CI->load->helper('url');
        $query = $CI->TipoFusion_model->find($id);
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
        $CI->load->model("TipoFusion_model");
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
            $query = $CI->TipoFusion_model->update($id, $data);
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
        $CI->load->model("TipoFusion_model");
        $CI->load->helper('url');
        $query = $CI->TipoFusion_model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}