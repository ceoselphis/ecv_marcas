<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FusionController extends AdminController
{
    protected $models = ['PatentesFusion_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesFusion_model");
        return $CI->load->view('patente/solicitudes/index');
    }

    

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesFusion_model");
        $data = $CI->input->post();
        $insert = array();
        /* 
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `client_id` int(11) DEFAULT NULL,
            `oficina_id` int(11) NOT NULL,
            `patentes_id` int(11) NOT NULL,
            `staff_id` int(11) DEFAULT NULL,
            `estado_id` int(11) NOT NULL,
            `num_solicitud` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
            `fecha_solicitud` date NOT NULL,
            `num_resolucion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
            `fecha_resolucion` date NOT NULL,
            `referencia_cliente` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
            `comentarios`        
        */
        //echo json_encode(['data' => $data]);
        if (!empty($data)){
            $insert['client_id'] = $data['client_id'];
            $insert['oficina_id'] = $data['oficina_id'];
            $insert['staff_id'] = $data['staff_id'];
            $insert['estado_id'] = $data['estado_id'];
            $insert['num_solicitud'] = $data['solicitud_num'];
            $insert['fecha_solicitud'] = empty($data['fecha_solicitud']) || ''? NULL : $this->turn_dates($data['fecha_solicitud']);
            $insert['num_resolucion'] = $data['resolucion_num'];
            $insert['fecha_resolucion'] = empty($data['fecha_resolucion']) || ''? NULL : $this->turn_dates($data['fecha_resolucion']);
            $insert['referencia_cliente'] = $data['referencia_cliente'];
            $insert['comentarios'] = $data['comentarios'];
            $insert['patentes_id'] = $data['patentes_id'];
            $query = $CI->PatentesFusion_model->insert($insert);
            if (isset($query)){
                echo json_encode(['message' => 'Fusion Guardado Correctamente' , 'code' => '200']);
            }else {
                echo json_encode(['message' => 'Error al Guardar la Licencia' , 'code' => '500']);
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
        $CI->load->model("PatentesFusion_model");
        $CI->load->helper('url');
        $query = $CI->PatentesFusion_model->find($id);
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
                'tipo_registro' => $CI->PatentesFusion_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesFusion_model->getAllClients(),
                'oficinas'      => $CI->PatentesFusion_model->getAllOficinas(),
                'estado' => $CI->PatentesFusion_model->getAllEstadoExpediente(),
                'responsable'   => $CI->PatentesFusion_model->getAllStaff(),
                'pais_id'       => $CI->PatentesFusion_model->getAllPaises(),
                'inventores'    => $CI->PatentesFusion_model->getAllInventores(),
                'cod_contador'  =>  "P-{$id}",
                'solicitantes'  => $CI->PatentesFusion_model->getAllClients(),
                'solicitantes_selected' => $CI->PatentesFusion_model->findPatenteSolicitantes($id),
                'inventores_selected' => $CI->PatentesFusion_model->findPatenteInventores($id),
                'projects' => $CI->PatentesFusion_model->findAllProjects(),
                'tareas' => $CI->PatentesFusion_model->findAllTipoTarea(),
                'values' => $patente,
                'tipo_evento' => $CI->PatentesFusion_model->findAllTipoEvento(),
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
        $CI->load->model("PatentesFusion_model");
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
            $query = $CI->PatentesFusion_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/patentes/SolicitudesController');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesFusion_model");
        $CI->load->helper('url');
        $query = $CI->PatentesFusion_model->delete($id);
        return redirect('pi/patentes/SolicitudesController');
        
        
    }
}
