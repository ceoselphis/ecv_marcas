<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasPrioridadController extends AdminController
{
    protected $models = ['MarcasPrioridad_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->MarcasPrioridad_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

     public function showPrioridad(string $id = null){
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $marcas = $CI->MarcasPrioridad_model->findAllPrioridadMarcas($id);
        $data = array();
        /*
        INSERT INTO `tbl_marcas_prioridades`(`id`, `marcas_id`, `pais_id`, `fecha_prioridad`, `numero_prioridad`)
         */
        foreach ($marcas as $row){
            $data[] = array(
            'id' => $row['id'],
            'pais' => $CI->MarcasPrioridad_model->BuscarPais($row['pais_id']),   
            'num_solicitud' => $row['num_solicitud'],
            'fecha_prioridad' => $row['fecha_prioridad'],
            'numero_prioridad' => $row['num_resolucion'],
            );
        }
        echo json_encode($data);

     }
    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $fields = $CI->MarcasPrioridad_model->getFillableFields();
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
        $CI->load->model("MarcasPrioridad_model");
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
            $fields = $CI->MarcasPrioridad_model->getFillableFields();
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
            $query = $CI->MarcasPrioridad_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/anexoscontroller/'));
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
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->MarcasPrioridad_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/anexoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
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
            $query = $CI->MarcasPrioridad_model->update($id, $data);
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
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->MarcasPrioridad_model->delete($id);
        echo json_encode(['code' => 200, 'success' => 'Eliminado exitosamente']);
    }

    /**
     * Method which set the data via AJAX
     */

    public function addPrioridad()
    {
        $CI = &get_instance();
        $data = $CI->input->post();
        $CI->load->model("MarcasPrioridad_model");
        $wDate = explode('/', $data['fecha_prioridad']);
        $insert = array(
            'pais_id' => $data['pais_prioridad'],
            'numero_prioridad' => $data['nro_prioridad'],
            'fecha_prioridad' => "{$wDate[2]}-{$wDate[1]}-{$wDate[0]}",
            'marcas_id'    => $data['solicitud_id']
        );
        try
        {
            $CI->MarcasPrioridad_model->insert($insert);
            echo json_encode(['code' => 200, 'message' => 'success']);
        } catch (Exception $e){
            return $e;
        }
    }
    
    public function getAllPrioridades($marcas_id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $data = $CI->MarcasPrioridad_model->findAllPrioridadByMarcas($marcas_id);
        $response = array();
        $acciones = "<div class='col-md-6' style='padding-left: 0px;'>";
        $acciones .= "<a id='#id#'class='editarPrioridad btn btn-light link-style' style= 'background-color: white;padding-top: 0px;'><i class='fas fa-edit' style='top: 5px;position: unset;'></i>Editar</a></div>";
        $acciones .= "<div class='col-md-6' style='padding-left: 10px;'>";
        $acciones .= "<a id='#id#' class='deletePrioridad btn btn-light link-style' style='background-color: white;padding-top: 0px;'><i class='fas fa-trash' style='top: 5px;position: unset;'></i>Borrar</a></div>";
        foreach($data as $row)
        {
            $auxAcc = $acciones;
            $response[] = [
                'id' => $row['id'],
                'fecha_prioridad' => $this->flip_dates($row['fecha_prioridad']),
                'nombre' => $row['nombre'],
                'numero' => $row['numero_prioridad'],
                'acciones' => str_replace('#id#', $row['id'], $auxAcc)
                //'acciones' => '<button id="'.$row['id'].'" class="btn btn-danger borrarPrioridad"><i class="fas fa-trash"></i> Borrar</button>',
            ];
        }
        echo json_encode($response);
    }

    private function flip_dates($date)
    {
        if($date != '')
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
        elseif ($date == '0000-00-00') {
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
        else{
            return '';
        }
    }

}