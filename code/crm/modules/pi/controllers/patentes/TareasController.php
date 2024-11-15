<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TareasController extends AdminController
{
    protected $models = ['PatentesTareas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesTareas_model");
        return $CI->load->view('patente/solicitudes/index');
    }

    

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesTareas_model");
        $data = $CI->input->post();
        $insert = array();
        /* 
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `tipo_tareas_id` int(11) NOT NULL,
            `project_id` int(11) NOT NULL,
            `fecha` date NOT NULL,
            `descripcion` varchar(100) DEFAULT NULL,
            `patentes_id` int(11) NOT NULL,
        */
        
        if (!empty($data)){
            $insert['fecha'] = empty($data['fecha']) || ''? NULL : $this->turn_dates($data['fecha']);
            $insert['project_id'] = $data['project_id'];
            $insert['tipo_tareas_id'] = $data['tipo_tareas_id'];
            $insert['descripcion'] = $data['descripcion'];
            $insert['patentes_id'] = $data['patentes_id'];
            $query = $CI->PatentesTareas_model->insert($insert);
            if (isset($query)){
                echo json_encode(['message' => 'Evento Guardado Correctamente' , 'code' => '200']);
            }else {
                echo json_encode(['message' => 'Error al Guardar Evento' , 'code' => '500']);
            }
        }else {
            echo json_encode(['message' => 'Invalid' , 'code' => '500']);
        }
    }

    /**
     * Recive the data for create a new item
     */

   

  

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


    

    /**
     * Find a single item to show
     */

   

    

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesTareas_model");
        $CI->load->helper('url');
        $query = $CI->PatentesTareas_model->find($id);
        if(isset($query))
        {
          $patente[] = [
              "id" => $query[0]['id'] ,
              "tipo_registro_id" => $query[0]['tipo_registro_id'] ,
              "client_id" => $query[0]['client_id'] ,
              "oficina_id" => $query[0]['oficina_id'] ,
              "staff_id" => $query[0]['staff_id'] ,
              "pais_id" => $query[0]['pais_id'] ,
              "titulo" => $query[0]['titulo'] ,
              "resumen" => $query[0]['resumen'] ,
              "clasificacion" => $query[0]['clasificacion'] ,
              "ref_interna" => $query[0]['ref_interna'] ,
              "ref_cliente" => $query[0]['ref_cliente'] ,
              "carpeta" => $query[0]['carpeta'],
              "libro" => $query[0]['libro'] ,
              "tomo" => $query[0]['tomo'] ,
              "folio" => $query[0]['folio'] ,
              "estado_id" => $query[0]['estado_id'] ,
              "nro_solicitud" => $query[0]['nro_solicitud'] ,
              "fecha_solicitud" => date('d/m/Y', strtotime($query[0]['fecha_solicitud'])),  
              "nro_registro" => $query[0]['nro_registro'],
              "fecha_registro" => date('d/m/Y', strtotime($query[0]['fecha_registro'])) ,
              "nro_certificado" => $query[0]['nro_certificado'] ,
              "fecha_vencimiento_certificado" => date('d/m/Y', strtotime($query[0]['fecha_vencimiento_certificado']))  ,
              "pct_nro_solicitud" => $query[0]['pct_nro_solicitud'] ,
              "pct_fecha_solicitud" =>  date('d/m/Y', strtotime($query[0]['pct_fecha_solicitud'])) ,
              "pct_nro_publicacion" => $query[0]['pct_nro_publicacion'] ,
              "pct_fecha_publicacion" =>  date('d/m/Y', strtotime($query[0]['pct_fecha_publicacion'])) ,
              "is_pago_anual" => $query[0]['is_pago_anual'] ,
              "anualidad_desde" =>  date('d/m/Y', strtotime($query[0]['anualidad_desde'])) ,
              "anualidad_hasta" =>  date('d/m/Y', strtotime($query[0]['anualidad_hasta']))  ,
              "comentarios" => $query[0]['comentarios'],
          ];
            $data = [
                'id'            => $id,
                'tipo_registro' => $CI->PatentesTareas_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesTareas_model->getAllClients(),
                'oficinas'      => $CI->PatentesTareas_model->getAllOficinas(),
                'estado' => $CI->PatentesTareas_model->getAllEstadoExpediente(),
                'responsable'   => $CI->PatentesTareas_model->getAllStaff(),
                'pais_id'       => $CI->PatentesTareas_model->getAllPaises(),
                'inventores'    => $CI->PatentesTareas_model->getAllInventores(),
                'cod_contador'  =>  "P-{$id}",
                'solicitantes'  => $CI->PatentesTareas_model->getAllClients(),
                'solicitantes_selected' => $CI->PatentesTareas_model->findPatenteSolicitantes($id),
                'inventores_selected' => $CI->PatentesTareas_model->findPatenteInventores($id),
                'projects' => $CI->PatentesTareas_model->findAllProjects(),
                'tareas' => $CI->PatentesTareas_model->findAllTipoTarea(),
                'values' => $patente,
                'tipo_evento' => $CI->PatentesTareas_model->findAllTipoEvento(),
                'labels' => array('Id', 'Nombre del anexo')
            ];
            return $CI->load->view('patente/solicitudes/edit', $data);
        }
        else{
            return redirect('pi/patentes/SolicitudesController');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesTareas_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url', 'form']);
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
        if ($CI->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            //We prepare the data 
            $query = $CI->PatentesTareas_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/patentes/SolicitudesController');
            }
        }
    }

    /**
     * Deletes the item
     */

     public function destroyTareas(string $id)
     {
         $CI = &get_instance();
         $CI->load->model("PatentesTareas_model");
         $CI->load->helper('url');
         $query = $CI->PatentesTareas_model->delete($id);
         if (isset($query)){
            echo json_encode(['message' => 'Tarea Eliminado Correctamente', 'code' => '200']);
        } else {
            echo json_encode(['message' => 'No se pudo Eliminar la Tarea', 'code' => '500']);
        }
         
         
         
     }

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesTareas_model");
        $CI->load->helper('url');
        $query = $CI->PatentesTareas_model->delete($id);
        return redirect('pi/patentes/SolicitudesController');
        
        
    }
}
