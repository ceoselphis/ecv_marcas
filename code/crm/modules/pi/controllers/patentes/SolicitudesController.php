<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SolicitudesController extends AdminController
{
    protected $models = ['PatentesSolicitudes_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $marcas = [
          'pais' => $CI->PatentesSolicitudes_model->getAllPaises(),
          'inventores' => $CI->PatentesSolicitudes_model->getAllInventores(),
          'clientes' => $CI->PatentesSolicitudes_model->getAllClients(),
        ];
        return $CI->load->view('patente/solicitudes/index', $marcas);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $id = intval($CI->PatentesSolicitudes_model->last_insert_id()) + 1;
        $data = [
            'id'            => $id,
            'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
            'clientes'      => $CI->PatentesSolicitudes_model->getAllClients(),
            'boletines' => $CI->PatentesSolicitudes_model->getAllBoletines(),
            'oficinas'      => $CI->PatentesSolicitudes_model->getAllOficinas(),
            'responsable'   => $CI->PatentesSolicitudes_model->getAllStaff(),
            'pais_id'       => $CI->PatentesSolicitudes_model->getAllPaises(),
            'inventores'    => $CI->PatentesSolicitudes_model->getAllInventores(),
            'estado' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
            'cod_contador'  => "P-{$id}",
            'tipo_evento'           => $CI->PatentesSolicitudes_model->findAllTipoEvento(),
            'tipo_publicacion'           => $CI->PatentesSolicitudes_model->getAllTiposPublicaciones(),
            'solicitantes'  => $CI->PatentesSolicitudes_model->getAllClients(),
            'projects' => $CI->PatentesSolicitudes_model->findAllProjects(),
            'tareas' => $CI->PatentesSolicitudes_model->findAllTipoTarea(),
        ];
        return $CI->load->view('patente/solicitudes/create', $data);
    }

    /**
     * Recive the data for create a new item
     */

    public function InsertarSolicitantes() {
      $CI = &get_instance();
      $CI->load->model("PatentesSolicitantes_model");
      $form = array();
      $data = $CI->input->post();
      if (!empty($data['solicitantes'])){
        $array_solicitantes = explode(',', $data['solicitantes']);
        foreach ($array_solicitantes as $solicitante) {
          $form['id'] = $data['id'];
          $form['client_id'] =  $solicitante;
          $query = $CI->PatentesSolicitantes_model->insert($form);
          if(isset($query))
          {
            echo json_encode(['message' => 'success', 'code' => '200']);              
          }else {
            echo json_encode(['error' => $query,'code' => '500']);
          }
        }

      } else {
        echo json_encode(['message' => 'No hay Solicitantes', 'code' => '200']);
      }
    }

    public function InsertarInventores() {
      $CI = &get_instance();
      $CI->load->model("PatentesInventores_model");
      $form = array();
      $data = $CI->input->post();

      if (!empty($data['inventores'])){
        $array_inventores = explode(',', $data['inventores']);
        foreach ($array_inventores as $inventores) {
          $form['id'] = $data['id'];
          $form['inventor_id'] =  $inventores;
          $query = $CI->PatentesInventores_model->insert($form);
          if(isset($query))
          {
            echo json_encode(['message' => 'success', 'code' => '200']);              
          }else {
            echo json_encode(['error' => $query,'code' => '500']);
          }
        }
      } else {
        echo json_encode(['message' => 'No hay Inventores', 'code' => '200']);
      }
    }

    public function showDocumentos($id){
      $CI = &get_instance();
      $CI->load->model("PatentesDocumento_model");
      $data = $CI->PatentesDocumento_model->ShowPantentes($id);
      $patente = array();
      foreach ( $data as $row){
        $patente[] = [
          'id' => $row['id'],
          'descripcion' => $row['descripcion'],
          'fecha' =>  date('d/m/Y', strtotime($row['fecha'])) ,
          'path' => $row['path'],
          'patente_id' => $row['patentes_id']
        ];
      }
      
      echo json_encode($patente);
    }

    public function showPrioridad($id){
      $CI = &get_instance();
      $CI->load->model("PatentesPrioridad_model");
      $data = $CI->PatentesPrioridad_model->ShowPantentes($id);
      $patente = array();
      foreach ( $data as $row){
        $patente[] = [
          'id' => $row['id'],
          'numero' => $row['numero'],
          'fecha' =>  date('d/m/Y', strtotime($row['fecha_prioridad'])) ,
          'pais' => $CI->PatentesPrioridad_model->findPais($row['pais_id']),
          'patente_id' => $row['patentes_id']
        ];
      }
      
      echo json_encode($patente);
    }

    public function showPublicaciones($id){
      $CI = &get_instance();
      $CI->load->model("PatentesPublicaciones_model");
      $data = $CI->PatentesPublicaciones_model->ShowPantentes($id);
      $publicaciones = array();
      foreach ( $data as $row){
        $publicaciones[] = [
          'id' => $row['id'],
          'fecha' =>  date('d/m/Y', strtotime($row['fecha'])) ,
          'tipo_publicacion' => $CI->PatentesPublicaciones_model->findTipoPublicaciones($row['tipo_pub_id']),
          'boletin' => $CI->PatentesPublicaciones_model->findBoletines($row['boletin_id']),
          'tomo' => $row['tomo'],
          'pagina' => $row['pagina'],
          'patente_id' => $row['patentes_id']
        ];
      }
      
      echo json_encode($publicaciones);
    }

    public function showEventos($id){
      $CI = &get_instance();
      $CI->load->model("PatentesEventos_model");
      $data = $CI->PatentesEventos_model->ShowPantentes($id);
      $eventos = array();
      foreach ( $data as $row){
        $eventos[] = [
          'id' => $row['id'],
          'fecha' =>  date('d/m/Y', strtotime($row['fecha'])) ,
          'tipo_evento' => $CI->PatentesEventos_model->findTipoEvento($row['tipo_evento_id']),
          'comentarios' => $row['comentarios'],
          'patente_id' => $row['patentes_id']
        ];
      }
      
      echo json_encode($eventos);
    }

    public function showTareas($id){
      $CI = &get_instance();
      $CI->load->model("PatentesTareas_model");
      $data = $CI->PatentesTareas_model->ShowPantentes($id);
      $tareas = array();
      foreach ( $data as $row){
        $tareas[] = [
          'id' => $row['id'],
          'fecha' =>  date('d/m/Y', strtotime($row['fecha'])) ,
          'tipo_tareas' => $CI->PatentesTareas_model->findTipoTareas($row['tipo_tareas_id']),
          'proyecto' => $CI->PatentesTareas_model->findProyectos($row['project_id']),
          'descripcion' => $row['descripcion'],
          'patente_id' => $row['patentes_id']
        ];
      }
      
      echo json_encode($tareas);
    }

    public function showCesion($id){
      $CI = &get_instance();
      $CI->load->model("PatentesCesiones_model");
      $data = $CI->PatentesCesiones_model->ShowPantentes($id);
      $cesion = array();
    
      foreach ( $data as $row){
        $cesion[] = [
          'id' => $row['id'],
          'cliente' => $CI->PatentesCesiones_model->findClientes($row['client_id']),
          'oficina' => $CI->PatentesCesiones_model->findOficinas($row['oficina_id']),
          'patente_id' => $row['patentes_id'],
          'staff' => $CI->PatentesCesiones_model->findStaff($row['staff_id']),
          'estado' => $CI->PatentesCesiones_model->findEstadoExpediente($row['estado_id']),
          'solicitud_num' => $row['solicitud_num'],

          'fecha_solicitud' =>  date('d/m/Y', strtotime($row['fecha_solicitud'])),
          'resolucion_num' => $row['resolucion_num'],
          'fecha_resolucion' =>  date('d/m/Y', strtotime($row['fecha_resolucion'])),
          'referencia_cliente' => $row['referencia_cliente'],
          'comentarios' => $row['comentarios']
        ];
      }
      
      echo json_encode($cesion);
    }

    public function showLicencia($id){
      $CI = &get_instance();
      $CI->load->model("PatentesLicencia_model");
      $data = $CI->PatentesLicencia_model->ShowPantentes($id);
      $licencia = array();
    
      foreach ( $data as $row){
        $licencia[] = [
          'id' => $row['id'],
          'cliente' => $CI->PatentesLicencia_model->findClientes($row['client_id']),
          'oficina' => $CI->PatentesLicencia_model->findOficinas($row['oficina_id']),
          'patente_id' => $row['patentes_id'],
          'staff' => $CI->PatentesLicencia_model->findStaff($row['staff_id']),
          'estado' => $CI->PatentesLicencia_model->findEstadoExpediente($row['estado_id']),
          'solicitud_num' => $row['num_solicitud'],

          'fecha_solicitud' =>  date('d/m/Y', strtotime($row['fecha_solicitud'])),
          'resolucion_num' => $row['num_resolucion'],
          'fecha_resolucion' =>  date('d/m/Y', strtotime($row['fecha_resolucion'])),
          'referencia_cliente' => $row['referencia_cliente'],
          'comentarios' => $row['comentarios']
        ];
      }
      
      echo json_encode($licencia);
    }

    public function showFusion($id){
      $CI = &get_instance();
      $CI->load->model("PatentesFusion_model");
      $data = $CI->PatentesFusion_model->ShowPantentes($id);
      $licencia = array();
    
      foreach ( $data as $row){
        $licencia[] = [
          'id' => $row['id'],
          'cliente' => $CI->PatentesFusion_model->findClientes($row['client_id']),
          'oficina' => $CI->PatentesFusion_model->findOficinas($row['oficina_id']),
          'patente_id' => $row['patentes_id'],
          'staff' => $CI->PatentesFusion_model->findStaff($row['staff_id']),
          'estado' => $CI->PatentesFusion_model->findEstadoExpediente($row['estado_id']),
          'solicitud_num' => $row['num_solicitud'],

          'fecha_solicitud' =>  date('d/m/Y', strtotime($row['fecha_solicitud'])),
          'resolucion_num' => $row['num_resolucion'],
          'fecha_resolucion' =>  date('d/m/Y', strtotime($row['fecha_resolucion'])),
          'referencia_cliente' => $row['referencia_cliente'],
          'comentarios' => $row['comentarios']
        ];
      }
      
      echo json_encode($licencia);
    }

    public function showCambioNombre($id){
      $CI = &get_instance();
      $CI->load->model("PatentesCambioNombre_model");
      $data = $CI->PatentesCambioNombre_model->ShowPantentes($id);
      $licencia = array();
    
      foreach ( $data as $row){
        $licencia[] = [
          'id' => $row['id'],
          'cliente' => $CI->PatentesCambioNombre_model->findClientes($row['client_id']),
          'oficina' => $CI->PatentesCambioNombre_model->findOficinas($row['oficina_id']),
          'patente_id' => $row['patentes_id'],
          'staff' => $CI->PatentesCambioNombre_model->findStaff($row['staff_id']),
          'estado' => $CI->PatentesCambioNombre_model->findEstadoExpediente($row['estado_id']),
          'solicitud_num' => $row['num_solicitud'],

          'fecha_solicitud' =>  date('d/m/Y', strtotime($row['fecha_solicitud'])),
          'resolucion_num' => $row['num_resolucion'],
          'fecha_resolucion' =>  date('d/m/Y', strtotime($row['fecha_resolucion'])),
          'referencia_cliente' => $row['referencia_cliente'],
          'comentarios' => $row['comentarios']
        ];
      }
      
      echo json_encode($licencia);
    }

    public function showCambioDomicilio($id){
      $CI = &get_instance();
      $CI->load->model("PatentesCambioDomicilio_model");
      $data = $CI->PatentesCambioDomicilio_model->ShowPantentes($id);
      $licencia = array();
    
      foreach ( $data as $row){
        $licencia[] = [
          'id' => $row['id'],
          'cliente' => $CI->PatentesCambioDomicilio_model->findClientes($row['client_id']),
          'oficina' => $CI->PatentesCambioDomicilio_model->findOficinas($row['oficina_id']),
          'patente_id' => $row['patentes_id'],
          'staff' => $CI->PatentesCambioDomicilio_model->findStaff($row['staff_id']),
          'estado' => $CI->PatentesCambioDomicilio_model->findEstadoExpediente($row['estado_id']),
          'solicitud_num' => $row['num_solicitud'],

          'fecha_solicitud' =>  date('d/m/Y', strtotime($row['fecha_solicitud'])),
          'resolucion_num' => $row['num_resolucion'],
          'fecha_resolucion' =>  date('d/m/Y', strtotime($row['fecha_resolucion'])),
          'referencia_cliente' => $row['referencia_cliente'],
          'comentarios' => $row['comentarios']
        ];
      }
      
      echo json_encode($licencia);
    }

   
    public function deleteDocumentos($id){ 
      $CI = &get_instance();
      $CI->load->model("PatentesDocumento_model");
      $query = $CI->PatentesDocumento_model->delete($id);
      if (isset($query)){

        echo json_encode(['message' => 'Documento Eliminado Correctamente', 'code' => '200']);
      } else {
        echo json_encode(['message' => 'No se ha podido Eliminar', 'code' => '500']);
      }

    }

    public function addDocumentos(){
      $CI = &get_instance();
      $data = $CI->input->post();
      $file = $_FILES;
      $doc_arch = '';
      $fecha_documento = "";
     
      if (empty($file['doc_archivo'])){
          $doc_arch ="No tiene";
      }if(!empty($file['doc_archivo'])){
        $fpath = FCPATH.'uploads/patentes/documentos/' . $data['patente_id'] . '-' .$file['doc_archivo']['name'];
        $path = site_url('uploads/patentes/documentos/' . $data['patente_id'] . '-' .$file['doc_archivo']['name']);
      //  echo json_encode(['mesage' => $data , 'archivo' => $fpath]);
         // $fileType = pathinfo($fpath, PATHINFO_EXTENSION);
          // Mover el archivo a la carpeta de destino
              if (move_uploaded_file($file['doc_archivo']['tmp_name'], $fpath)) {
                  echo json_encode(['message' => "El archivo PDF se ha subido exitosamente.", 'code ' => '200']);
              } else {
                echo json_encode(['message' => "Error al subir el archivo", 'code' => '500']);
                 // throw new Exception('Error al subir el archivo');
              }

          $doc_arch = $path;
        
      }
      if (!empty($data)){
          if (!empty($data['fecha_documento'])){
            $fecha_documento = DateTime::createFromFormat('d/m/Y', $data['fecha_documento'])->format('Y-m-d');
          }
          $insert = array(
              'patentes_id' => $data['patente_id'],
              'descripcion' => $data['doc_descripcion'],
              'fecha' => $fecha_documento,
              'path' => $doc_arch,
          );
          //echo json_encode(['data' => $insert]);

          $CI->load->model("PatentesDocumento_model");
              try{
                  $query = $CI->PatentesDocumento_model->insert($insert);
                      if (isset($query)){
                          echo json_encode(['code' => 200, 'message' => 'Insertado Correctamente']);

                      }else {
                          echo json_encode(['code' => 500, 'message' => 'No se ha podido Insertado']);
                      }
              }catch (Exception $e){
                  return $e;
              }
      }
      else {
          echo json_encode(['code' => 500, 'message' => 'No tiene Data']);

      }
  }

  /* 
   public function store()
  {
      $CI = &get_instance();
      $CI->load->model("PatentesSolicitudes_model");
      $CI->load->helper(['url', 'form']);
      $CI->load->library('form_validation');
  
      $form = array();
      $data = $CI->input->post();
      
      //-------------- Step 1 ---------------
      $form['tipo_registro_id'] = $data['tipo_registro_id'];
      $form['client_id'] = $data['client_id'];
      $form['oficina_id'] = $data['oficina_id'];
      $form['staff_id'] = $data['staff_id'];
      // ------------- Step 2 ----------------
      $form['pais_id'] = $data['pais_id'];
      $form['titulo'] = $data['titulo'];
      $form['resumen'] = $data['resumen'];
      //--------------- Step 3 -----------------
      $form['clasificacion'] = $data['clasificacion'];
      $form['ref_interna'] = $data['ref_interna'];
      $form['ref_cliente'] = $data['ref_cliente'];
      $form['carpeta'] = $data['carpeta'];
      $form['libro'] = $data['libro'];
      $form['tomo'] = $data['tomo'];
      $form['folio'] = $data['folio'];
      //--------------- Step 4 ----------------------
      $form['estado_id'] = $data['estado_id'];
      $form['nro_solicitud'] = $data['solicitud'];
  
      // Validar y formatear fechas si tienen datos
      if (!empty($data['fecha_solicitud'])) {
          $form['fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud'])->format('Y-m-d');
      }
      $form['nro_registro'] = $data['registro'];
      if (!empty($data['fecha_registro'])) {
          $form['fecha_registro'] = DateTime::createFromFormat('d/m/Y', $data['fecha_registro'])->format('Y-m-d');
      }
      $form['nro_certificado'] = $data['certificado'];
      if (!empty($data['fecha_certificado'])) {
          $form['fecha_vencimiento_certificado'] = DateTime::createFromFormat('d/m/Y', $data['fecha_certificado'])->format('Y-m-d');
      }
      $form['pct_nro_solicitud'] = $data['pct_solicitud'];
      if (!empty($data['pct_fecha_solicitud'])) {
          $form['pct_fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_solicitud'])->format('Y-m-d');
      }
      $form['pct_nro_publicacion'] = $data['pct_publicacion'];
      if (!empty($data['pct_fecha_publicacion'])) {
          $form['pct_fecha_publicacion'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_publicacion'])->format('Y-m-d');
      }
      $form['is_pago_anual'] = true;
      if (!empty($data['pct_anualidad_desde'])) {
          $form['anualidad_desde'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_desde'])->format('Y-m-d');
      }
      if (!empty($data['pct_anualidad_hasta'])) {
          $form['anualidad_hasta'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_hasta'])->format('Y-m-d');
      }
      //--------------- Step 5 ----------------------
      $form['comentarios'] = $data['comentarios'];
  
      try {
          $query = $CI->PatentesSolicitudes_model->insert($form);
  
          if (isset($query)) {
              $id = $CI->PatentesSolicitudes_model->last_insert_id();
              echo json_encode(['message' => 'success', 'id' => $id, 'code' => '200']);
          } else {
              echo json_encode(['error' => $query, 'code' => '500']);
          }
      } catch (\Throwable $th) {
          echo json_encode(['message' => $th->getMessage(), 'code' => '500']);
      }
  }
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

  // public function InsertarPrioridades($params) {
  //   $CI = &get_instance();
  //   $CI->load->model("PatentesSolicitudes_model");
    
  // }

  public function store()
  {
      $CI = &get_instance();
      $CI->load->model("PatentesSolicitudes_model");
      $CI->load->helper(['url', 'form']);
      $CI->load->library('form_validation');
      $form = array();
      $data = $CI->input->post();
      //-------------- Step 1 ---------------
      $form['tipo_registro_id'] = $data['tipo_registro_id'];
      $form['client_id'] = $data['client_id'];
      $form['oficina_id'] = $data['oficina_id'];
      $form['staff_id'] = $data['staff_id'];
      // ------------- Step 2 ----------------
      $form['pais_id'] = $data['pais_id'];
      $form['titulo'] = $data['titulo'];
      $form['resumen'] = $data['resumen'];
      //--------------- Step 3 -----------------
      $form['clasificacion'] = $data['clasificacion'];
      $form['ref_interna'] = $data['ref_interna'];
      $form['ref_cliente'] = $data['ref_cliente'];
      $form['carpeta'] = $data['carpeta'];
      $form['libro'] = $data['libro'];
      $form['tomo'] = $data['tomo'];
      $form['folio'] = $data['folio'];
      //--------------- Step 4 ----------------------
      $form['estado_id'] = $data['estado_id'];
      $form['nro_solicitud'] = $data['solicitud'];
  
      // Validar y formatear fechas si tienen datos
      if (!empty($data['fecha_solicitud'])) {
          $form['fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud'])->format('Y-m-d');
      }
      $form['nro_registro'] = $data['registro'];
      if (!empty($data['fecha_registro'])) {
          $form['fecha_registro'] = DateTime::createFromFormat('d/m/Y', $data['fecha_registro'])->format('Y-m-d');
      }
      $form['nro_certificado'] = $data['certificado'];
      if (!empty($data['fecha_certificado'])) {
          $form['fecha_vencimiento_certificado'] = DateTime::createFromFormat('d/m/Y', $data['fecha_certificado'])->format('Y-m-d');
      }
      $form['pct_nro_solicitud'] = $data['pct_solicitud'];
      if (!empty($data['pct_fecha_solicitud'])) {
          $form['pct_fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_solicitud'])->format('Y-m-d');
      }
      $form['pct_nro_publicacion'] = $data['pct_publicacion'];
      if (!empty($data['pct_fecha_publicacion'])) {
          $form['pct_fecha_publicacion'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_publicacion'])->format('Y-m-d');
      }
      $form['is_pago_anual'] = true;
      if (!empty($data['pct_anualidad_desde'])) {
          $form['anualidad_desde'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_desde'])->format('Y-m-d');
      }
      if (!empty($data['pct_anualidad_hasta'])) {
          $form['anualidad_hasta'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_hasta'])->format('Y-m-d');
      }
      //--------------- Step 5 ----------------------
      $form['comentarios'] = $data['comentarios'];

        /*Seteamos el arreglo para las prioridades */
        $prioridades = json_decode($data['prioridad_id'], TRUE);
        for ($i = 0; $i < count($prioridades); ++$i) {
          unset($prioridades[$i]['idRow']);
          unset($prioridades[$i]['pais_name']);
          unset($prioridades[$i]['acciones']);
          $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
        }
  
        /*Seteamos el arreglo para las publicaciones */
        $publicacion = json_decode($data['publicacion_id'], TRUE);
        for ($i = 0; $i < count($publicacion); ++$i) {
          unset($publicacion[$i]['idRow']);
          unset($publicacion[$i]['tipo_pub_name']);
          unset($publicacion[$i]['boletin_name']);
          unset($publicacion[$i]['acciones']);
          $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
        }
  
        /*Seteamos el arreglo para los eventos */
        $eventos = json_decode($data['eventos_id'], TRUE);
        for ($i = 0; $i < count($eventos); ++$i) {
          unset($eventos[$i]['idRow']);
          unset($eventos[$i]['tipo_evento_name']);
          unset($eventos[$i]['acciones']);
          $eventos[$i]['fecha'] = empty($eventos[$i]['fecha']) || '' ? NULL : $this->turn_dates($eventos[$i]['fecha']);
        }
  
        /*Seteamos el arreglo para las tareas */
        $tareas = json_decode($data['tareas_id'], TRUE);
        for ($i = 0; $i < count($tareas); ++$i) {
          unset($tareas[$i]['idRow']);
          unset($tareas[$i]['project_id_name']);
          unset($tareas[$i]['tipo_tareas_id_name']);
          unset($tareas[$i]['acciones']);
          $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
        }
  
        /*Seteamos el arreglo para las Cesiones */
        $cesiones = json_decode($data['cesiones_id'], TRUE);
        $cesiones_ant_id = array();
        $cesiones_act_id = array();
        $cesion_anterior = array();
        for ($i = 0; $i < count($cesiones); ++$i) {
          unset($cesiones[$i]['idRow']);
          unset($cesiones[$i]['tmp_cesion_id']);
          unset($cesiones[$i]['client_id_name']);
          unset($cesiones[$i]['oficina_id_name']);
          unset($cesiones[$i]['staff_id_name']);
          unset($cesiones[$i]['estado_id_name']);
          unset($cesiones[$i]['acciones']);
          $cesiones_ant_id[$i] = json_decode($cesiones[$i]['cesionesanteriores'], TRUE);
          unset($cesiones[$i]['cesionesanteriores']);
          $cesiones_act_id[$i] = json_decode($cesiones[$i]['cesionesactuales'], TRUE);
          unset($cesiones[$i]['cesionesactuales']);
          $cesiones[$i]['fecha_solicitud'] = empty($cesiones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($cesiones[$i]['fecha_solicitud']);
          $cesiones[$i]['fecha_resolucion'] = empty($cesiones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($cesiones[$i]['fecha_resolucion']);
        }

        /*Seteamos el arreglo para las Licencias */
        $licencias = json_decode($data['licencias_id'], TRUE);
        $licencias_ant_id = array();
        $licencias_act_id = array();
        for ($i = 0; $i < count($licencias); ++$i) {
          unset($licencias[$i]['idRow']);
          unset($licencias[$i]['tmp_licencia_id']);
          unset($licencias[$i]['client_id_name']);
          unset($licencias[$i]['oficina_id_name']);
          unset($licencias[$i]['staff_id_name']);
          unset($licencias[$i]['estado_id_name']);
          unset($licencias[$i]['acciones']);
          $licencias_ant_id[$i] = json_decode($licencias[$i]['licenciasanteriores'], TRUE);
          unset($licencias[$i]['licenciasanteriores']);
          $licencias_act_id[$i] = json_decode($licencias[$i]['licenciasactuales'], TRUE);
          unset($licencias[$i]['licenciasactuales']);
          $licencias[$i]['fecha_solicitud'] = empty($licencias[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($licencias[$i]['fecha_solicitud']);
          $licencias[$i]['fecha_resolucion'] = empty($licencias[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($licencias[$i]['fecha_resolucion']);
        }
  
        /*Seteamos el arreglo para las Fusiones */
        $fusiones = json_decode($data['fusiones_id'], TRUE);
        $fusiones_ant_id = array();
        $fusiones_act_id = array();
        for ($i = 0; $i < count($fusiones); ++$i) {
          unset($fusiones[$i]['idRow']);
          unset($fusiones[$i]['tmp_fusion_id']);
          unset($fusiones[$i]['client_id_name']);
          unset($fusiones[$i]['oficina_id_name']);
          unset($fusiones[$i]['staff_id_name']);
          unset($fusiones[$i]['estado_id_name']);
          unset($fusiones[$i]['acciones']);
          $fusiones_ant_id[$i] = json_decode($fusiones[$i]['fusionesanteriores'], TRUE);
          unset($fusiones[$i]['fusionesanteriores']);
          $fusiones_act_id[$i] = json_decode($fusiones[$i]['fusionesactuales'], TRUE);
          unset($fusiones[$i]['fusionesactuales']);
          $fusiones[$i]['fecha_solicitud'] = empty($fusiones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($fusiones[$i]['fecha_solicitud']);
          $fusiones[$i]['fecha_resolucion'] = empty($fusiones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($fusiones[$i]['fecha_resolucion']);
        }
  
        /*Seteamos el arreglo para los Cambios de Nombre */
        $camnom = json_decode($data['camnom_id'], TRUE);
        $camnom_ant_id = array();
        $camnom_act_id = array();
        for ($i = 0; $i < count($camnom); ++$i) {
          unset($camnom[$i]['idRow']);
          unset($camnom[$i]['tmp_camnom_id']);
          unset($camnom[$i]['client_id_name']);
          unset($camnom[$i]['oficina_id_name']);
          unset($camnom[$i]['staff_id_name']);
          unset($camnom[$i]['estado_id_name']);
          unset($camnom[$i]['acciones']);
          $camnom_ant_id[$i] = json_decode($camnom[$i]['camnomanteriores'], TRUE);
          unset($camnom[$i]['camnomanteriores']);
          $camnom_act_id[$i] = json_decode($camnom[$i]['camnomactuales'], TRUE);
          unset($camnom[$i]['camnomactuales']);
          $camnom[$i]['fecha_solicitud'] = empty($camnom[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($camnom[$i]['fecha_solicitud']);
          $camnom[$i]['fecha_resolucion'] = empty($camnom[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($camnom[$i]['fecha_resolucion']);
        }
  
        /*Seteamos el arreglo para los Cambios de Domicilio */
        $camdom = json_decode($data['camdom_id'], TRUE);
        $camdom_ant_id = array();
        $camdom_act_id = array();
        for ($i = 0; $i < count($camdom); ++$i) {
          unset($camdom[$i]['idRow']);
          unset($camdom[$i]['tmp_camdom_id']);
          unset($camdom[$i]['client_id_name']);
          unset($camdom[$i]['oficina_id_name']);
          unset($camdom[$i]['staff_id_name']);
          unset($camdom[$i]['estado_id_name']);
          unset($camdom[$i]['acciones']);
          $camdom_ant_id[$i] = json_decode($camdom[$i]['camdomanteriores'], TRUE);
          unset($camdom[$i]['camdomanteriores']);
          $camdom_act_id[$i] = json_decode($camdom[$i]['camdomactuales'], TRUE);
          unset($camdom[$i]['camdomactuales']);
          $camdom[$i]['fecha_solicitud'] = empty($camdom[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($camdom[$i]['fecha_solicitud']);
          $camdom[$i]['fecha_resolucion'] = empty($camdom[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($camdom[$i]['fecha_resolucion']);
        }

        $facturas = json_decode($data['facturas_id'], TRUE);
        for ($i = 0; $i < count($facturas); ++$i) {
          unset($facturas[$i]['idRow']);
          unset($facturas[$i]['factNum']);
          unset($facturas[$i]['factFecha']);
          unset($facturas[$i]['factEstatus']);
          unset($facturas[$i]['acciones']);
          $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
        }
   
  
        
      try {
        if (!empty($prioridades)) {
          $CI->PatentesSolicitudes_model->insertPrioridades($prioridades);
        }
        if (!empty($publicacion)) {
          $CI->PatentesSolicitudes_model->insertPublicaciones($publicacion);
        }

        if (!empty($eventos)) {
          $CI->PatentesSolicitudes_model->insertEventos($eventos);
        }
        if (!empty($tareas)) {
          $CI->PatentesSolicitudes_model->insertTareas($tareas);
        }

        if (!empty($cesiones)) {
          for ($i = 0; $i < count($cesiones); ++$i) {
            /* INSERTO LA CESION Y RETORNO SU ID*/
            $cesion_id = $CI->PatentesSolicitudes_model->insertCesiones($cesiones[$i]);

            /*Guardamos las cesiones anteriores  */
            if (!empty($cesiones_ant_id[0])) {
              for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j) {
                unset($cesiones_ant_id[$i][$j]['idRow']);
                unset($cesiones_ant_id[$i][$j]['cedente_id_name']);
                unset($cesiones_ant_id[$i][$j]['acciones']);
                $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
                $cesiones_ant_id[$i][$j]['tipo_cedente'] = '1';
              }
              $cesion_anterior = $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
              echo json_encode(['message' => 'Success' , 'data' => $cesion_anterior ]);
            }
            /*Guardamos las cesiones actuales  */
            if (!empty($cesiones_act_id[0])) {
              for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j) {
                unset($cesiones_act_id[$i][$j]['idRow']);
                unset($cesiones_act_id[$i][$j]['cedente_id_name']);
                unset($cesiones_act_id[$i][$j]['acciones']);
                $cesiones_act_id[$i][$j]['cesion_id'] = $cesion_id;
                $cesiones_ant_id[$i][$j]['tipo_cedente'] = '2';
              }
              $cesion_actual = $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_act_id[$i]);
              echo json_encode(['message' => 'Success' , 'data' => $cesion_actual ]);
            }
          }
        }

        if (!empty($licencias)) {
          for ($i = 0; $i < count($licencias); ++$i) {
            /* INSERTO LA LICENCIA Y RETORNO SU ID*/
            $licencia_id = $CI->PatentesSolicitudes_model->insertLicencias($licencias[$i]);

            /*Guardamos las licencias anteriores  */
            if (!empty($licencias_ant_id[0])) {
              for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j) {
                unset($licencias_ant_id[$i][$j]['idRow']);
                unset($licencias_ant_id[$i][$j]['propietario_id_name']);
                unset($licencias_ant_id[$i][$j]['acciones']);
                $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
                
              }
              $licencia_anterior = $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $licencia_anterior]);
            }
            /*Guardamos las licencias actuales  */
            if (!empty($licencias_act_id[0])) {
              for ($j = 0; $j < count($licencias_act_id[$i]); ++$j) {
                unset($licencias_act_id[$i][$j]['idRow']);
                unset($licencias_act_id[$i][$j]['propietario_id_name']);
                unset($licencias_act_id[$i][$j]['acciones']);
                $licencias_act_id[$i][$j]['licencia_id'] = $licencia_id;
                 
              }
              $licencia_actual = $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_act_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $licencia_actual]);
            }
          }
        }

        if (!empty($fusiones)) {
          for ($i = 0; $i < count($fusiones); ++$i) {
            /* INSERTO LA FUSION Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertFusion($fusiones[$i]);

            /*Guardamos las fusiones anteriores  */
            if (!empty($fusiones_ant_id[0])) {
              for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j) {
                unset($fusiones_ant_id[$i][$j]['idRow']);
                unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
                unset($fusiones_ant_id[$i][$j]['acciones']);
                $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $fusion_anterior = $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $fusion_anterior]);
            }
            /*Guardamos las fusiones actuales  */
            if (!empty($fusiones_act_id[0])) {
              for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j) {
                unset($fusiones_act_id[$i][$j]['idRow']);
                unset($fusiones_act_id[$i][$j]['propietario_id_name']);
                unset($fusiones_act_id[$i][$j]['acciones']);
                $fusiones_act_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $fusion_actual = $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_act_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $fusion_actual]);
            }
          }
        }

        if (!empty($camnom)) {
          for ($i = 0; $i < count($camnom); ++$i) {
            /* INSERTO EL CAMBIO DE NOMBRE Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamNom($camnom[$i]);

            /*Guardamos los Cambios de Nombre anteriores  */
            if (!empty($camnom_ant_id[0])) {
              for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j) {
                unset($camnom_ant_id[$i][$j]['idRow']);
                unset($camnom_ant_id[$i][$j]['propietario_id_name']);
                unset($camnom_ant_id[$i][$j]['acciones']);
                $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $camnom_anterior = $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $camnom_anterior]);
            }
            /*Guardamos las Cambios de Nombre actuales  */
            if (!empty($camnom_act_id[0])) {
              for ($j = 0; $j < count($camnom_act_id[$i]); ++$j) {
                unset($camnom_act_id[$i][$j]['idRow']);
                unset($camnom_act_id[$i][$j]['propietario_id_name']);
                unset($camnom_act_id[$i][$j]['acciones']);
                $camnom_act_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $camnom_actual = $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_act_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $camnom_anterior]);
            }
          }
        }

        if (!empty($camdom)) {
          for ($i = 0; $i < count($camdom); ++$i) {
            /* INSERTO EL CAMBIO DE DOMICLIO Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamDom($camdom[$i]);

            /*Guardamos los Cambios de Domicilio anteriores  */
            if (!empty($camdom_ant_id[0])) {
              for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j) {
                unset($camdom_ant_id[$i][$j]['idRow']);
                unset($camdom_ant_id[$i][$j]['propietario_id_name']);
                unset($camdom_ant_id[$i][$j]['acciones']);
                $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $camdom_anterior = $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $camdom_anterior]);
            }
            /*Guardamos las Cambios de Domicilio actuales  */
            if (!empty($camdom_act_id[0])) {
              for ($j = 0; $j < count($camdom_act_id[$i]); ++$j) {
                unset($camdom_act_id[$i][$j]['idRow']);
                unset($camdom_act_id[$i][$j]['propietario_id_name']);
                unset($camdom_act_id[$i][$j]['acciones']);
                $camdom_act_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $camdom_actual = $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_act_id[$i]);
              echo json_encode(['message' => 'Success', 'data' => $camdom_actual]);
            }
          }
        }

        // if (!empty($facturas)) {
        //   $CI->PatentesSolicitudes_model->insertPatenteFactura($facturas);
        // }

        $query = $CI->PatentesSolicitudes_model->insert($form);
  
        if (isset($query)) {
          $id = $CI->PatentesSolicitudes_model->CantidadSolicitudes();
          echo json_encode(['message' => 'success', 'id' => $id, 'code' => '200']);
        } else {
          echo json_encode(['error' => $query, 'code' => '500']);
        }
      } catch (\Throwable $th) {
          echo json_encode(['message' => $th->getMessage(), 'code' => '500']);
      }
  }
  
    

    /**
     * Find a single item to show
     */

    public function show(string $id = null)
    {
    }

    public function filterSearch()
    {
      $CI = &get_instance();
      $CI->load->model('PatentesSolicitudes_model');
      $form = json_decode($CI->input->post('data'), TRUE);
      $result = array();
      $query = array();
      $url = admin_url('pi/SolicitudesController/edit/');
      foreach ($form as $key => $value) {
        if ($value === '') {
          unset($form[$key]);
        }
      }
      //echo json_encode(['form '=> $form]);
      if (empty($form)) {
        $query = $CI->PatentesSolicitudes_model->getAllPatentes();
        //$query = $CI->PatentesSolicitudes_model->findAll();
        if (!empty($query)) {
          foreach ($query as $row) {
            $result[] =  [
              'codigo' => $row['codigo'],
              'tipo' => $row['tipo'],
              'propietario' => $row['cliente'],
              'titulo' => $row['titulo'],
              'estado' => $row['nombre_estado'],
              'solicitud' => $row['solicitud'],
              'fecha_solicitud' => is_null($row['fecha_solicitud']) ? '' : date('d/m/Y', strtotime($row['fecha_solicitud'])),
              'registro' => $row['registro'],
              'pais' => $row['pais'],
            ];
          }
          echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
        } else {
          echo json_encode(['code' => 404, 'message' => 'not found']);
        }
      } else {
        //$query = $CI->PatentesSolicitudes_model->searchWhere($form);
     //   echo json_encode(['message' => 'success' , 'formulario' => $form]);
        $query = $CI->PatentesSolicitudes_model->searchWhere2($form);
        if (!empty($query)) {
          foreach ($query as $row) {
            $result[] = [
              'codigo' => $row['codigo'],
              'tipo' => $row['tipo'],
              'propietario' => $row['cliente'],
              'titulo' => $row['titulo'],
              'estado' => $row['nombre_estado'],
              'solicitud' => $row['solicitud'],
              'fecha_solicitud' => is_null($row['fecha_solicitud']) ? '' : date('d/m/Y', strtotime($row['fecha_solicitud'])),
              'registro' => $row['registro'],
              'pais' => $row['pais'],
            ];
          }
          echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
        } else {
          echo json_encode(['code' => 404, 'message' => 'not found']);
        }
      }
    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->PatentesSolicitudes_model->find($id);
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
                'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesSolicitudes_model->getAllClients(),
                'oficinas'      => $CI->PatentesSolicitudes_model->getAllOficinas(),
                'estado' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
                'responsable'   => $CI->PatentesSolicitudes_model->getAllStaff(),
                'pais_id'       => $CI->PatentesSolicitudes_model->getAllPaises(),
                'inventores'    => $CI->PatentesSolicitudes_model->getAllInventores(),
                'cod_contador'  =>  "P-{$id}",
                'solicitantes'  => $CI->PatentesSolicitudes_model->getAllClients(),
                'solicitantes_selected' => $CI->PatentesSolicitudes_model->findPatenteSolicitantes($id),
                'inventores_selected' => $CI->PatentesSolicitudes_model->findPatenteInventores($id),
                'projects' => $CI->PatentesSolicitudes_model->findAllProjects(),
                'tareas' => $CI->PatentesSolicitudes_model->findAllTipoTarea(),
                'values' => $patente,
                'tipo_evento' => $CI->PatentesSolicitudes_model->findAllTipoEvento(),
                'tipo_publicacion'           => $CI->PatentesSolicitudes_model->getAllTiposPublicaciones(),
                'boletines' => $CI->PatentesSolicitudes_model->getAllBoletines(),
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
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        $form = array();
        $data = $CI->input->post();
        //-------------- Step 1 ---------------
        $form['tipo_registro_id'] = $data['tipo_registro_id'];
        $form['client_id'] = $data['client_id'];
        $form['oficina_id'] = $data['oficina_id'];
        $form['staff_id'] = $data['staff_id'];
        // ------------- Step 2 ----------------
        $form['pais_id'] = $data['pais_id'];
        $form['titulo'] = $data['titulo'];
        $form['resumen'] = $data['resumen'];
        //--------------- Step 3 -----------------
        $form['clasificacion'] = $data['clasificacion'];
        $form['ref_interna'] = $data['ref_interna'];
        $form['ref_cliente'] = $data['ref_cliente'];
        $form['carpeta'] = $data['carpeta'];
        $form['libro'] = $data['libro'];
        $form['tomo'] = $data['tomo'];
        $form['folio'] = $data['folio'];
        //--------------- Step 4 ----------------------
        $form['estado_id'] = $data['estado_id'];
        $form['nro_solicitud'] = $data['solicitud'];
  
        // Validar y formatear fechas si tienen datos
        if (!empty($data['fecha_solicitud'])) {
            $form['fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud'])->format('Y-m-d');
        }
        $form['nro_registro'] = $data['registro'];
        if (!empty($data['fecha_registro'])) {
            $form['fecha_registro'] = DateTime::createFromFormat('d/m/Y', $data['fecha_registro'])->format('Y-m-d');
        }
        $form['nro_certificado'] = $data['certificado'];
        if (!empty($data['fecha_certificado'])) {
            $form['fecha_vencimiento_certificado'] = DateTime::createFromFormat('d/m/Y', $data['fecha_certificado'])->format('Y-m-d');
        }
        $form['pct_nro_solicitud'] = $data['pct_solicitud'];
        if (!empty($data['pct_fecha_solicitud'])) {
            $form['pct_fecha_solicitud'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_solicitud'])->format('Y-m-d');
        }
        $form['pct_nro_publicacion'] = $data['pct_publicacion'];
        if (!empty($data['pct_fecha_publicacion'])) {
            $form['pct_fecha_publicacion'] = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_publicacion'])->format('Y-m-d');
        }
        $form['is_pago_anual'] = true;
        if (!empty($data['pct_anualidad_desde'])) {
            $form['anualidad_desde'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_desde'])->format('Y-m-d');
        }
        if (!empty($data['pct_anualidad_hasta'])) {
            $form['anualidad_hasta'] = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_hasta'])->format('Y-m-d');
        }
        //--------------- Step 5 ----------------------
        $form['comentarios'] = $data['comentarios'];
        //we validate the data
        //we set the rules
        try {
        
          $query = $CI->PatentesSolicitudes_model->update($id, $form);
    
          if (isset($query)) {
            echo json_encode(['message' => 'success', 'code' => '200']);
          } else {
            echo json_encode(['error' => $query, 'code' => '500']);
          }
        } catch (\Throwable $th) {
            echo json_encode(['message' => $th->getMessage(), 'code' => '500']);
        }
        // $config = array(
        //     [
        //         'field' => 'nombre_anexo',
        //         'label' => 'Nombre del Anexo',
        //         'rules' => 'trim|required|min_length[3]|max_length[60]',
        //         'errors' => [
        //             'required' => 'Debe indicar un nombre para el anexo',
        //             'min_length' => 'Nombre demasiado corto',
        //             'max_lenght' => 'Nombre demasiado largo'
        //         ]
        //     ],
        // );
        // $CI->form_validation->set_rules($config);
        // if ($CI->form_validation->run() == FALSE) {
        //     $this->edit($id);
        // } else {
        //     //We prepare the data 
        //     $query = $CI->PatentesSolicitudes_model->update($id, $data);
        //     if (isset($query))
        //     {
        //         return redirect('pi/patentes/SolicitudesController');
        //     }
        // }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->PatentesSolicitudes_model->delete($id);
        return redirect('pi/patentes/SolicitudesController');
        
        
    }
}
