<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccionesTerceroTareasController extends AdminController
{
    protected $models = ['AccionesTercerosTareas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $data = array();
        foreach($CI->AccionesTercerosTareas_model->findAll() as $row)
        {
            $data[] = [
                'eve_id' => $row['id'],
                'tipo_eve_id' => $CI->AccionesTercerosTareas_model->findTipoTareas($row['tipo_evento_id'])[0]['nombre'],
                'created_at' => $row['created_at'],
                'staff_id' => $CI->AccionesTercerosTareas_model->getStaff($row['staff_id'])[0]['firstname'].' '.$CI->AccionesTercerosTareas_model->getStaff($row['staff_id'])[0]['lastname']
            ];
        }
        return $CI->load->view('Tareas/index', ["Tareas" => $data]);
    }

    public function showTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $marcas = $CI->AccionesTercerosTareas_model->findTareasAccionesTerceros($id);
        $data = array();
        /*`tbl_marcas_Tareas`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->AccionesTercerosTareas_model->findTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => date('d/m/Y', strtotime($row['fecha'])),
            );
        }
        echo json_encode($data);
    }

    /**
     * Shows the form to create a new item
     */

    public function findTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $marcas = $CI->AccionesTercerosTareas_model->find($id);
       
        $data = array();
        /*`tbl_marcas_Tareas`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->AccionesTercerosTareas_model->findTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => date('d/m/Y', strtotime($row['fecha'])),
            );
        }
        echo json_encode($data);
    }

     public function addTareas(){
        $CI = &get_instance();
        $data = $CI->input->post();
        $fecha_hoy = date("Y-m-d");
        //echo $fecha_hoy;
        //echo json_encode($data);
        if (!empty($data)){
            $fecha_formateada = DateTime::createFromFormat('d/m/Y', $data['tarea_fecha'])->format('Y-m-d');
            $insert = array(
                            'tipo_tareas_id' => $data['tipo_tarea'],
                            'acciones_terceros_id' => $data['acc_ter_id'],
                            'descripcion' => $data['tarea_descripcion'],
                            'fecha' =>  $fecha_formateada ,
                    );
           // echo json_encode($insert);
            $CI->load->model("AccionesTercerosTareas_model");
                try{
                    $query = $CI->AccionesTercerosTareas_model->insert($insert);
                        if (isset($query)){
                            echo json_encode([ 'mensaje'=>'Tareas registrado con éxito', 'status'=>true]);

                        }else {
                            echo json_encode([ 'mensaje'=>'No hemos podido Insertar el Tareas', 'status'=>false]);
                            
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo json_encode([ 'mensaje'=>'No hay Tareas', 'status'=>false]);

        }
     }

     public function EditTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $query =$CI->AccionesTercerosTareas_model->find($id);
        echo json_encode($query);   
     }

     

     public function UpdateTareas(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $data = $CI->input->post();
        //$fecha_hoy = date("Y-m-d");
        
        if (!empty($data)){
            $fecha_formateada = DateTime::createFromFormat('d/m/Y', $data['tarea_fecha'])->format('Y-m-d');
            $insert = array(
                'tipo_tareas_id' => $data['tipo_tarea'],
                'descripcion' => $data['tarea_descripcion'],
                'fecha' =>  $fecha_formateada ,
            );
            
            $query = $CI->AccionesTercerosTareas_model->update($id, $insert);
            if (isset($query))
            {
                echo json_encode(['mensaje' => 'Tareas Actualizado Correctamente ','status'=>true]);
            }
            else{
                echo json_encode(['mensaje' => 'No se pudo Actualizar la Tareas','status'=>false]);
            }
        } else {
            echo json_encode(['mensaje' => 'No tiene datos ','status'=>false]);
        } 
    }

    public function UpdateMarcasTareas(){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $data = $CI->input->post();
        
        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'comentarios' => $data['comentarios'],
                            'fecha' => $this->turn_dates($data['fecha'])
                    );
            $query = $CI->AccionesTercerosTareas_model->update($data['id'], $insert);
            if (isset($query))
            {
                echo "Actualizado Correctamente";
            }
        }  
    }


    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $fields = $CI->AccionesTercerosTareas_model->getFillableFields();
        $select = $CI->AccionesTercerosTareas_model->getAllTipoTareas();
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
        $labels = ['Id', 'Tipo de evento'];
        return $CI->load->view('Tareas/create', ['fields' => $fields, 'labels' => $labels, 'select' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $CI->load->helper('url');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //TODO
        //we sent the data to the model
        $query = $CI->AccionesTercerosTareas_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/Tareascontroller/'));
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $query = $CI->AccionesTercerosTareas_model->find($id);
        if(isset($query))
        {
            $table = '<table class="table"><thead><tr>';
            foreach(['Nombre', 'Productos'] as $item)
            {
                $table .= '<th>'.$item.'</th>';
            }
            $table .= '</thead><tbody><tr>';
            foreach($query as $row)
            {
                $table .= "
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                        ";
            }
            $table .= '</tr></tbody></table>';
            echo $table;
        }
    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosTareas_model->find($id);
        $select = $CI->AccionesTercerosTareas_model->getAllTipoTareas();
        if(isset($query))
        {
            $labels = array('Id', 'Tipo de Tareas', 'Comentario');
            
            return $CI->load->view('Tareas/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'tipo_evento' => $select]);
        }
        else{
            return redirect('pi/Tareascontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['fecha'] = date('Y-m-d');
        //We validate the data
        //TODO
        //We prepare the data 
        $query = $CI->AccionesTercerosTareas_model->update($id, $data);
        if (isset($query))
        {
            return redirect('pi/MarcasSolicitudesController/create');
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosTareas_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosTareas_model->delete($id);
        if (isset($query)){

            echo json_encode(['mensaje' => 'Tareas Eliminado Correctamente ','status'=>true]);
        }else {
            echo json_encode(['mensaje' => 'No se ha podido Eliminar el Tareas ','status'=>false]);
        }
    }
     public function turn_dates($date)
     {
         if ($date != '') {
             try {
                 $wdate = explode('/', $date);
                 $cdate = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                 return $cdate;
             } catch (Exception $e) {
                 echo 'Caught exception: ',  $e->getMessage(), "\n";
             }
         } else {
             return NULL;
         }
     }
 

}