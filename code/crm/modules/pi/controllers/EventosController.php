<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventosController extends AdminController
{
    protected $models = ['Eventos_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $data = array();
        foreach($CI->Eventos_model->findAll() as $row)
        {
            $data[] = [
                'eve_id' => $row['eve_id'],
                'tipo_eve_id' => $CI->Eventos_model->findTipoEvento($row['tipo_eve_id'])[0]['nombre'],
                'created_at' => $row['created_at'],
                'staff_id' => $CI->Eventos_model->getStaff($row['staff_id'])[0]['firstname'].' '.$CI->Eventos_model->getStaff($row['staff_id'])[0]['lastname']
            ];
        }
        return $CI->load->view('eventos/index', ["eventos" => $data]);
    }

    public function showEventos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $marcas = $CI->Eventos_model->findAllEventosMarcas($id);
        $data = array();
        /*`tbl_marcas_eventos`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_evento' => $CI->Eventos_model->findTipoEvento($row['tipo_evento_id']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
        }
        echo json_encode($data);

     }

    /**
     * Shows the form to create a new item
     */

     public function addEvento(){
        $CI = &get_instance();
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'marcas_id' => $data['id_marcas'],
                            'comentarios' => $data['evento_comentario'],
                            'fecha' => date('Y-m-d'),
                    );

            $CI->load->model("Eventos_model");
                try{
                    $query = $CI->Eventos_model->insert($insert);
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

     public function EditEventos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $query =$CI->Eventos_model->find($id);
        echo json_encode($query);   
     }

     public function UpdateEventos(string $id = null){
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $data = $CI->input->post();
        
        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'comentarios' => $data['comentarios'],
                            'fecha' => date('Y-m-d'),
                    );
                   

                    $query = $CI->Eventos_model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }
        }  
    }
    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $fields = $CI->Eventos_model->getFillableFields();
        $select = $CI->Eventos_model->getAllTipoEvento();
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
        return $CI->load->view('eventos/create', ['fields' => $fields, 'labels' => $labels, 'select' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //TODO
        //we sent the data to the model
        $query = $CI->Eventos_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/eventoscontroller/'));
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $query = $CI->Eventos_model->find($id);
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
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        $query = $CI->Eventos_model->find($id);
        $select = $CI->Eventos_model->getAllTipoEvento();
        if(isset($query))
        {
            $labels = array('Id', 'Tipo de Evento', 'Comentario');
            
            return $CI->load->view('eventos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'tipo_evento' => $select]);
        }
        else{
            return redirect('pi/eventoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['fecha'] = date('Y-m-d');
        //We validate the data
        //TODO
        //We prepare the data 
        $query = $CI->Eventos_model->update($id, $data);
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
         $CI->load->model("Eventos_model");
         $CI->load->helper('url');
         $query = $CI->Eventos_model->delete($id);
         if (isset($query)){
             echo "Eliminado Correctamente";
         }else {
             echo "No se ha podido Eliminar";
         }
         
         
     }
}