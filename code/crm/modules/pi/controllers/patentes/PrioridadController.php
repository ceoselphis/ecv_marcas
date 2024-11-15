<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrioridadController extends AdminController
{
    protected $models = ['PatentesPrioridad_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        return $CI->load->view('patente/solicitudes/index');
    }



    

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $data = $CI->input->post();
        $insert = array();
        /* 
            `pais_id` int(11) NOT NULL,
            `fecha_prioridad` date NOT NULL,
            `numero` int(11) NOT NULL,
            `patentes_id` int(11) DEFAULT NULL,
        */
        if (!empty($data)){
            $insert['pais_id'] = $data['pais_id'];
            $insert['fecha_prioridad'] = empty($data['fecha_prioridad']) || ''? NULL : $this->turn_dates($data['fecha_prioridad']);
            $insert['numero'] = $data['numero'];
            $insert['patentes_id'] = $data['patentes_id'];
            $query = $CI->PatentesPrioridad_model->insert($insert);
            if (isset($query)){

                echo json_encode(['message' => 'Prioridad Guardado Correctamente' , 'code' => '200']);
            }else {
                echo json_encode(['message' => 'Error al Guardar Prioridad' , 'code' => '500']);
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
        $CI->load->model("PatentesPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->PatentesPrioridad_model->find($id);
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
                'tipo_registro' => $CI->PatentesPrioridad_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesPrioridad_model->getAllClients(),
                'oficinas'      => $CI->PatentesPrioridad_model->getAllOficinas(),
                'estado' => $CI->PatentesPrioridad_model->getAllEstadoExpediente(),
                'responsable'   => $CI->PatentesPrioridad_model->getAllStaff(),
                'pais_id'       => $CI->PatentesPrioridad_model->getAllPaises(),
                'inventores'    => $CI->PatentesPrioridad_model->getAllInventores(),
                'cod_contador'  =>  "P-{$id}",
                'solicitantes'  => $CI->PatentesPrioridad_model->getAllClients(),
                'solicitantes_selected' => $CI->PatentesPrioridad_model->findPatenteSolicitantes($id),
                'inventores_selected' => $CI->PatentesPrioridad_model->findPatenteInventores($id),
                'projects' => $CI->PatentesPrioridad_model->findAllProjects(),
                'tareas' => $CI->PatentesPrioridad_model->findAllTipoTarea(),
                'values' => $patente,
                'tipo_evento' => $CI->PatentesPrioridad_model->findAllTipoEvento(),
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
        $CI->load->model("PatentesPrioridad_model");
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
            $query = $CI->PatentesPrioridad_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/patentes/SolicitudesController');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroyPrioridad($id) {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->PatentesPrioridad_model->delete($id);
        if (isset($query)){
            echo json_encode(['message' => 'Prioridad Eliminada Correctamente', 'code' => '200']);
        } else {
            echo json_encode(['message' => 'No se pudo Eliminar la Prioridad Correctamente', 'code' => '500']);
        }
        
    }

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->PatentesPrioridad_model->delete($id);
        return redirect('pi/patentes/SolicitudesController');
        
        
    }
}
