<?php

use function PHPSTORM_META\map;

defined('BASEPATH') OR exit('No direct script access allowed');

class AutorTareasController extends AdminController
{
    protected $models = ['AutorTareas_Model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->AutorTareas_Model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        $fields = $CI->AutorTareas_Model->getFillableFields();
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

     public function showTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        $marcas = $CI->AutorTareas_Model->findAllTareasMarcas($id);
        $data = array();
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->AutorTareas_Model->BuscarTipoTareas($row['id_tipo_tareas']),
                'descripcion' => $row['descripcion'],
                'fecha' => $this->flip_dates($row['fecha']),
             //   'acciones' => '<a class="btn btn-sm btn-danger borrarTarea" id="'.$row['id'].'"> <i class="fas fa-trash">  </i> Borrar </a>' 
            );
        }
        echo json_encode($data);
     }

     public function addTareas(){
        $CI = &get_instance();
        $data = $CI->input->post();
        /*
        {"project":"50","fecha_limite":"13\/11\/2024","tipo_tarea":"4","descripcion":"asdasdasd","id_solicitud":"4"}
        */
        /*
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_tipo_tareas` int(11) NOT NULL,
            `id_solicitud` int(11) NOT NULL,
            `project_id` int(11) DEFAULT NULL,
            `fecha` date NOT NULL,
            `descripcion` text,
        */
        if (!empty($data)){
            $fecha = '';
            if (!empty($data['fecha_limite'])) {
                $fecha = DateTime::createFromFormat('d/m/Y', $data['fecha_limite'])->format('Y-m-d');
            }
            $insert = array(
                            'id_tipo_tareas' => $data['tipo_tarea'],
                            'id_solicitud' => $data['id_solicitud'],
                            'project_id' => $data['project'],
                            'descripcion' => $data['descripcion'],
                            'fecha' => $fecha,
                    );
            $CI->load->model("AutorTareas_Model");
                try{
                    $query = $CI->AutorTareas_Model->insert($insert);
                        if (isset($query)){
                            echo json_encode([ 'message' => ' Tarea Insertada Correctamente ', 'code' => '200']);

                        }else {
                            echo json_encode([ 'message' => ' Tarea Insertada Correctamente ', 'code' => '500']);
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo json_encode(['message' => 'No tiene Data' , 'code' => '400' ]) ;
        }
     }

    

    
     public function EditTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        $query =$CI->AutorTareas_Model->find($id);
        echo json_encode($query);   
     }

     public function BuscarTipoTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        $query =$CI->AutorTareas_Model->findTipoTareas($id);
        echo json_encode($query);

     }

     public function UpdateTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                            'tipo_tareas_id' => $data['tipo_tarea'],
                            'descripcion' => $data['descripcion'],
                            'fecha' => date('Y-m-d'),
                            'project_id' => $data['project_id'],
                            'task_id' => $data['task_id'],
                    );
                    $query = $CI->AutorTareas_Model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Insertado Correctamente";
                    }
        }            
     }
    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AutorTareas_Model");
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
            $fields = $CI->AutorTareas_Model->getFillableFields();
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
            $query = $CI->AutorTareas_Model->insert($data);
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
        $CI->load->model("AutorTareas_Model");
        $CI->load->helper('url');
        $query = $CI->AutorTareas_Model->find($id);
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
        $CI->load->model("AutorTareas_Model");
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
            $query = $CI->AutorTareas_Model->update($id, $data);
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
        $CI->load->model("AutorTareas_Model");
        $CI->load->helper('url');
        $query = $CI->AutorTareas_Model->delete($id);
        if (isset($query)){
            echo json_encode(['message' => 'Tarea Eliminado Correctamente' , 'code' => 200]);
        }else {
            echo json_encode(['message' => 'No se pudo Eliminar la Tarea' , 'code' => 500]);
        }
        
        
    }

    /*Añadimos tareas a los proyectos*/ 
    public function addTaskToMarcasAndProject()
    {
        $CI = &get_instance();
        $CI->load->model('AutorTareas_Model');
        $CI->load->helper('url');
        $request = $CI->input->post();
        $data = json_decode($request['data'], true);
        
        /*Invertimos las fechas */
        $fecha = $this->turn_dates($data['fecha_limite']);
        /*Obtenemos los demas datos*/
        $tipoTarea = $CI->AutorTareas_Model->findTipoTareas($data['tipo_tarea'])[0]['nombre'];
        $task = [
            'name'        => $tipoTarea,
            'description' => $data['descripcion'],
            'priority'    => '1',
            'dateadded'   => date('Y-m-d'),
            'startdate'   => date('Y-m-d'),
            'duedate'     => $fecha,
            'addedfrom'   => '1',
            'is_added_from_contact' => '0',
            'status'      => '4',
            'recurring'   => '0',
            'cycles'      => '0',
            'total_cycles'=> '0',
            'custom_recurring' => '0',
            'rel_id'      => $data['project_id'],
            'rel_type'    => 'project',
            'is_public'   => '0',
            'billable'   => '1',
            'billed'      => '0',
            'invoice_id'  => '0',
            'hourly_rate' => '0.00',
            "milestone"   => '1',
            'kanban_order'=> '1',
            'milestone_order' => '0',
            'visible_to_client' => '0',
            'deadline_notified' => '0',
        ];        
        $task_id = $CI->AutorTareas_Model->insertTask($task);
        $tarea = [
            'id_tipo_tareas' => $data['tipo_tarea'],
            'id_solicitud'      => $data['solicitud_id'],
            'fecha'          => date('Y-m-d'),
            'descripcion'    => $data['descripcion'],
            'project_id'     => $data['project_id'],
            'task_id'        => $task_id
        ];
        $query = $CI->AutorTareas_Model->insert($tarea);
        if($query)
        {
            echo json_encode(['code' => 200, 'message' => 'tarea registrada con exito']);
        }
        else
        {
            echo json_encode(['code' => 500, 'message' => 'error']);
        }
    }

    public function flip_dates($date)
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

    public function turn_dates($date)
    {
        if($date != ''){
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
        else{
            return NULL;
        }
        
    }

    public function findDetailTask($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model('AutorTareas_Model');
        $CI->load->helper('url');
        $query = $CI->AutorTareas_Model->findTaskDetail($id);

    }

}