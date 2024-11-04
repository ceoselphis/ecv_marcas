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
        return $CI->load->view('patente/solicitudes/index');
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $data = [
            'id'            => $CI->PatentesSolicitudes_model->last_insert_id(),
            'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
            'clientes'      => $CI->PatentesSolicitudes_model->getAllClients(),
            'oficinas'      => $CI->PatentesSolicitudes_model->getAllOficinas(),
            'responsable'   => $CI->PatentesSolicitudes_model->getAllStaff(),
            'pais_id'       => $CI->PatentesSolicitudes_model->getAllPaises(),
            'inventores'    => $CI->PatentesSolicitudes_model->getAllInventores(),
            'estado' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
            'cod_contador'  => "P-{$CI->PatentesSolicitudes_model->last_insert_id()}",
            'tipo_evento'           => $CI->PatentesSolicitudes_model->findAllTipoEvento(),
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
        echo json_encode("Llegue a formulario con data");
        // $query = $CI->PatentesSolicitudes_model->searchWhere2($form);
        // if (!empty($query)) {
        //   foreach ($query as $row) {
        //     $result[] = [
        //       'cod_contador' => $row['cod_contador'],
        //       'tipo' => $row['tipo_registro'],
        //       'propietario' => $row['nombre_propietario'],
        //       'nombre' => $row['marca'],
        //       'clase' => $row['clase_niza'],
        //       'estado' => $row['solicitud'],
        //       'solicitud' => $row['estado_expediente'],
        //       'fecha_solicitud' => date('d/m/Y', strtotime($row['fecha_solicitud'])),
        //       'registro' => $row['registro'],
        //       'certificado' => $row['certificado'],
        //       'vigencia' => date('d/m/Y', strtotime($row['fecha_vencimiento'])),
        //       'pais' => $row['pais_nom'],
        //       'acciones' => "<a class='btn btn-primary' href='{$url}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a>",
        //     ];
        //   }
        //   echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
        // } else {
        //   echo json_encode(['code' => 404, 'message' => 'not found']);
        // }
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
                'id'            => $CI->PatentesSolicitudes_model->last_insert_id(),
                'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesSolicitudes_model->getAllClients(),
                'oficinas'      => $CI->PatentesSolicitudes_model->getAllOficinas(),
                'estado' => $CI->PatentesSolicitudes_model->getAllEstadoExpediente(),
                'responsable'   => $CI->PatentesSolicitudes_model->getAllStaff(),
                'pais_id'       => $CI->PatentesSolicitudes_model->getAllPaises(),
                'inventores'    => $CI->PatentesSolicitudes_model->getAllInventores(),
                'cod_contador'  => $id,
                'solicitantes'  => $CI->PatentesSolicitudes_model->getAllClients(),
                'solicitantes_selected' => $CI->PatentesSolicitudes_model->findPatenteSolicitantes($id),
                'inventores_selected' => $CI->PatentesSolicitudes_model->findPatenteInventores($id),
                'projects' => $CI->PatentesSolicitudes_model->findAllProjects(),
                'tareas' => $CI->PatentesSolicitudes_model->findAllTipoTarea(),
                'values' => $patente,
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
            $query = $CI->PatentesSolicitudes_model->update($id, $data);
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
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->PatentesSolicitudes_model->delete($id);
        return redirect('pi/patentes/SolicitudesController');
        
        
    }
}
