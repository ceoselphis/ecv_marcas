<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccionesTercerosPublicacionesController extends AdminController
{
    protected $models = ['AccionesTercerosPublicaciones_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $data = array();
        foreach($CI->AccionesTercerosPublicaciones_model->findAll() as $row)
        {
            $data[] = [
                'eve_id' => $row['id'],
                'tipo_eve_id' => $CI->AccionesTercerosPublicaciones_model->findTipoEvento($row['tipo_evento_id'])[0]['nombre'],
                'created_at' => $row['created_at'],
                'staff_id' => $CI->AccionesTercerosPublicaciones_model->getStaff($row['staff_id'])[0]['firstname'].' '.$CI->AccionesTercerosPublicaciones_model->getStaff($row['staff_id'])[0]['lastname']
            ];
        }
        return $CI->load->view('Publicaciones/index', ["Publicaciones" => $data]);
    }

    public function showPublicaciones(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $marcas = $CI->AccionesTercerosPublicaciones_model->findPublicacionesAccionesTerceros($id);
       
        $data = array();
        /*`tbl_marcas_Publicaciones`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_publicacion' => $CI->AccionesTercerosPublicaciones_model->findTipoPublicacion($row['tipo_pub_id']),
                'boletin' => $CI->AccionesTercerosPublicaciones_model->findBolentines($row['boletin_id']),
                'tomo' => $row['tomo'],
                'pagina' => $row['pagina'],
                'fecha' => date('d/m/Y', strtotime($row['fecha'])),
            );
        }
        echo json_encode($data);
    }

    /**
     * Shows the form to create a new item
     */

    public function findPublicacion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $marcas = $CI->AccionesTercerosPublicaciones_model->find($id);
       // $marcas = $CI->AccionesTercerosPublicaciones_model->findAll();
        $data = array();
        /*`tbl_marcas_Publicaciones`(`id`, `tipo_evento_id`, `marcas_id`, `comentarios`, `fecha`) */
        foreach ($marcas as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_publicacion' => $CI->AccionesTercerosPublicaciones_model->findTipoPublicacion($row['tipo_pub_id']),
                'boletin' => $CI->AccionesTercerosPublicaciones_model->findBolentines($row['boletin_id']),
                'tomo' => $row['tomo'],
                'pagina' => $row['pagina'],
                'fecha' => date('d/m/Y', strtotime($row['fecha'])),
            );
        }
        echo json_encode($data);
    }

     public function addPublicacion(){
        $CI = &get_instance();
        $data = $CI->input->post();
        $fecha_hoy = date("Y-m-d");
        //echo $fecha_hoy;
        
        if (!empty($data)){
            $insert = array(
                            'tipo_pub_id' => $data['tipo_publicacion'],
                            'acciones_terceros_id' => $data['acc_ter_id'],
                            'boletin_id' => $data['boletin_publicacion'],
                            'tomo' => $data['tomo'],
                            'pagina' => $data['pagina'],
                            'fecha' =>  $fecha_hoy,
                    );
           
            $CI->load->model("AccionesTercerosPublicaciones_model");
                try{
                    $query = $CI->AccionesTercerosPublicaciones_model->insert($insert);
                        if (isset($query)){
                            echo json_encode([ 'mensaje'=>'Evento registrado con éxito', 'status'=>true]);

                        }else {
                            echo json_encode([ 'mensaje'=>'No hemos podido Insertar el Evento', 'status'=>false]);
                            
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo json_encode([ 'mensaje'=>'No hay Publicaciones', 'status'=>false]);

        }
     }

     public function EditPublicaciones(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $query =$CI->AccionesTercerosPublicaciones_model->find($id);
        echo json_encode($query);   
     }

     

     public function UpdatePublicaciones(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $data = $CI->input->post();
        $fecha_hoy = date("Y-m-d");
        echo json_encode($data);

        if (!empty($data)){
            $insert = array(
                    'tipo_pub_id' => $data['tipo_publicacion'],
                    'boletin_id' => $data['boletin_publicacion'],
                    'tomo' => $data['tomo'],
                    'pagina' => $data['pagina'],
                    'fecha' =>  $fecha_hoy,
                    );
            $query = $CI->AccionesTercerosPublicaciones_model->update($id, $insert);
            if (isset($query))
            {
                echo json_encode(['mensaje' => 'Evento Actualizado Correctamente ','status'=>true]);
            }
            else{
                echo json_encode(['mensaje' => 'No se pudo Actualizar el Evento','status'=>false]);
            }
        } else {
            echo json_encode(['mensaje' => 'No tiene datos ','status'=>false]);
        } 
    }

    public function UpdateMarcasPublicaciones(){
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $data = $CI->input->post();
        
        if (!empty($data)){
            $insert = array(
                            'tipo_evento_id' => $data['tipo_evento'],
                            'comentarios' => $data['comentarios'],
                            'fecha' => $this->turn_dates($data['fecha'])
                    );
            $query = $CI->AccionesTercerosPublicaciones_model->update($data['id'], $insert);
            if (isset($query))
            {
                echo "Actualizado Correctamente";
            }
        }  
    }


    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $fields = $CI->AccionesTercerosPublicaciones_model->getFillableFields();
        $select = $CI->AccionesTercerosPublicaciones_model->getAllTipoEvento();
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
        return $CI->load->view('Publicaciones/create', ['fields' => $fields, 'labels' => $labels, 'select' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $CI->load->helper('url');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //TODO
        //we sent the data to the model
        $query = $CI->AccionesTercerosPublicaciones_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/Publicacionescontroller/'));
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $query = $CI->AccionesTercerosPublicaciones_model->find($id);
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
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosPublicaciones_model->find($id);
        $select = $CI->AccionesTercerosPublicaciones_model->getAllTipoEvento();
        if(isset($query))
        {
            $labels = array('Id', 'Tipo de Evento', 'Comentario');
            
            return $CI->load->view('Publicaciones/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'tipo_evento' => $select]);
        }
        else{
            return redirect('pi/Publicacionescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['fecha'] = date('Y-m-d');
        //We validate the data
        //TODO
        //We prepare the data 
        $query = $CI->AccionesTercerosPublicaciones_model->update($id, $data);
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
        $CI->load->model("AccionesTercerosPublicaciones_model");
        $CI->load->helper('url');
        $query = $CI->AccionesTercerosPublicaciones_model->delete($id);
        if (isset($query)){

            echo json_encode(['mensaje' => 'Publicacion Eliminado Correctamente ','status'=>true]);
        }else {
            echo json_encode(['mensaje' => 'No se ha podido Eliminar el Publicacion ','status'=>false]);
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