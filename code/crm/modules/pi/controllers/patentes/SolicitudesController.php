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
   * Recive the data for create a new item
   */
  public function store()
  {
    $CI = &get_instance();
    $CI->load->model("PatentesSolicitudes_model");
    if ($this->ValidationsForm() == FALSE) {
      echo json_encode(['code' => 201, 'error' => $CI->form_validation->error_array()]);
    } else {
      // Preparamos la data
      $form = $CI->input->post();
      /*Inicializamos los arreglos*/
      $solicitud = array();
      $paisSol = array();
      $solicitantes = array();
      $inventores = array();
      /*Seteamos el arreglo para la solicitud */
      $solicitud['id']                  = $form['id'];
      $solicitud["cod_contador"]        = intval(preg_replace("/[^0-9]+/", '', $form['cod_contador']));
      $solicitud['resumen']             = $form['resumen'];
      $solicitud['tipo_registro_id']    = $form['tipo_registro_id'];
      $solicitud['clasificacion']       = $form['clasificacion'];
      $solicitud['client_id']           = $form['client_id'];
      $solicitud['oficina_id']          = $form['oficina_id'];
      $solicitud['staff_id']            = $form['staff_id'];
      $solicitud['pais_id']             = $form['pais_id'];
      $solicitud['titulo']              = $form["titulo"];
      $solicitud['tipo_registro_id']    = $form['tipo_registro_id'];
      $solicitud['ref_interna']         = "P" . str_pad(intval(preg_replace("/[^0-9]+/", '', $form['cod_contador'])), 6, "0", STR_PAD_LEFT);
      $solicitud['ref_cliente']         = $form['ref_cliente'];
      $solicitud['carpeta']             = $form['carpeta'];
      $solicitud['libro']               = $form['libro'];
      $solicitud['folio']               = $form['folio'];
      $solicitud['tomo']                = $form['tomo'];
      $solicitud['comentarios']         = $form['comentarios'];
      $solicitud['estado_id']           = $form['estado_id'];
      $solicitud['nro_solicitud']       = $form['solicitud'];
      $solicitud['fecha_solicitud']     = empty($form['fecha_solicitud']) || '' ? NULL : $this->turn_dates($form['fecha_solicitud']);
      $solicitud['nro_registro']        = $form['registro'];
      $solicitud['fecha_registro']      = empty($form['fecha_registro']) || '' ? NULL : $this->turn_dates($form['fecha_registro']);
      $solicitud['nro_certificado']     = $form['certificado'];
      //$solicitud['fecha_vencimiento_certificado'] = empty($form['fecha_certificado']) || '' ? NULL : $this->turn_dates($form['fecha_certificado']);
      $solicitud['fecha_vencimiento_certificado'] = empty($form['fecha_vencimiento']) || '' ? NULL : $this->turn_dates($form['fecha_vencimiento']);
      /*Seteamos el arreglo para los solicitantes */
      foreach (json_decode($form['solicitantes_id'], TRUE) as $row) {
        $solicitantes[] = [
          'patente_id' => $form['id'],
          'client_id' => $row
        ];
      }

      /*Seteamos el arreglo para las prioridades */
      $prioridades = json_decode($form['prioridad_id'], TRUE);
      if (!empty($prioridades)) {
        for ($i = 0; $i < count($prioridades); ++$i) {
          unset($prioridades[$i]['idRow']);
          unset($prioridades[$i]['pais_name']);
          unset($prioridades[$i]['acciones']);
          $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
        }
      }


      /*Seteamos el arreglo para las publicaciones */
      $publicacion = json_decode($form['publicacion_id'], TRUE);
      if(!empty($publicacion))
      {
        for ($i = 0; $i < count($publicacion); ++$i) {
          unset($publicacion[$i]['idRow']);
          unset($publicacion[$i]['tipo_pub_name']);
          unset($publicacion[$i]['boletin_name']);
          unset($publicacion[$i]['acciones']);
          $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para los eventos */
      $eventos = json_decode($form['eventos_id'], TRUE);
      if(!empty($eventos))
      {
        for ($i = 0; $i < count($eventos); ++$i) {
          unset($eventos[$i]['idRow']);
          unset($eventos[$i]['tipo_evento_name']);
          unset($eventos[$i]['acciones']);
          $eventos[$i]['fecha'] = empty($eventos[$i]['fecha']) || '' ? NULL : $this->turn_dates($eventos[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para las tareas */
      $tareas = json_decode($form['tareas_id'], TRUE);
      if(!empty($tareas))
      {
        for ($i = 0; $i < count($tareas); ++$i) {
          unset($tareas[$i]['idRow']);
          unset($tareas[$i]['project_id_name']);
          unset($tareas[$i]['tipo_tareas_id_name']);
          unset($tareas[$i]['acciones']);
          $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para las Cesiones */
      $cesiones = json_decode($form['cesiones_id'], TRUE);
      $cesiones_ant_id = array();
      $cesiones_act_id = array();
      if(!empty($cesiones))
      {
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
      }
      

      /*Seteamos el arreglo para las Licencias */
      $licencias = json_decode($form['licencias_id'], TRUE);
      $licencias_ant_id = array();
      $licencias_act_id = array();
      if(!empty($licencias))
      {
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
      }
      

      /*Seteamos el arreglo para las Fusiones */
      $fusiones = json_decode($form['fusiones_id'], TRUE);
      $fusiones_ant_id = array();
      $fusiones_act_id = array();
      if(!empty($fusiones))
      {
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
      }
      

      /*Seteamos el arreglo para los Cambios de Nombre */
      $camnom = json_decode($form['camnom_id'], TRUE);
      $camnom_ant_id = array();
      $camnom_act_id = array();
      if(!empty($camnom))
      {
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
      }
      

      /*Seteamos el arreglo para los Cambios de Domicilio */
      $camdom = json_decode($form['camdom_id'], TRUE);
      $camdom_ant_id = array();
      $camdom_act_id = array();
      if(!empty($camdom))
      {
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
      }
      

      /*Seteamos el arreglo para los Documentos */
      $documentos = json_decode($form['doc_id'], TRUE);

      /*Seteamos el arreglo para los Documentos */
      $facturas = json_decode($form['facturas_id'], TRUE);
      if(!empty($facturas))
      {
        for ($i = 0; $i < count($facturas); ++$i) {
          unset($facturas[$i]['idRow']);
          unset($facturas[$i]['factNum']);
          unset($facturas[$i]['factFecha']);
          unset($facturas[$i]['factEstatus']);
          unset($facturas[$i]['acciones']);
          $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
        }
      }
      

      /*Seteamos el arreglo para los inventores */
      $inventoresfrm = json_decode($form['inventores_id'], TRUE);
      foreach ($inventoresfrm as $key => $value) {
        $inventores[] = ["inventor_id" => $value, 'patente_id' => $form['id']];
      }



      try {
        $CI->PatentesSolicitudes_model->insert($solicitud);
        if (!empty($inventores)) {
          $CI->PatentesSolicitudes_model->insertInventores($inventores);
        }
        if (!empty($claseNiza)) {
          $CI->PatentesSolicitudes_model->insertSolicitudesClases($claseNiza);
        }
        if (!empty($prioridades)) {
          $CI->PatentesSolicitudes_model->insertPrioridades($prioridades);
        }
        if (!empty($solicitantes)) {
          $CI->PatentesSolicitudes_model->insertPatentesSolicitantes($solicitantes);
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
            if (!empty($cesiones_ant_id)) {
              for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j) {
                unset($cesiones_ant_id[$i][$j]['idRow']);
                unset($cesiones_ant_id[$i][$j]['cedente_id_name']);
                unset($cesiones_ant_id[$i][$j]['acciones']);
                $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
            }
            /*Guardamos las cesiones actuales  */
            if (!empty($cesiones_act_id)) {
              for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j) {
                unset($cesiones_act_id[$i][$j]['idRow']);
                unset($cesiones_act_id[$i][$j]['cedente_id_name']);
                unset($cesiones_act_id[$i][$j]['acciones']);
                $cesiones_act_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_act_id[$i]);
            }
          }
        }
        if (!empty($licencias)) {
          for ($i = 0; $i < count($licencias); ++$i) {
            /* INSERTO LA LICENCIA Y RETORNO SU ID*/
            $licencia_id = $CI->PatentesSolicitudes_model->insertLicencias($licencias[$i]);

            /*Guardamos las licencias anteriores  */
            if (!empty($licencias_ant_id)) {
              for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j) {
                unset($licencias_ant_id[$i][$j]['idRow']);
                unset($licencias_ant_id[$i][$j]['propietario_id_name']);
                unset($licencias_ant_id[$i][$j]['acciones']);
                $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
            }
            /*Guardamos las licencias actuales  */
            if (!empty($licencias_act_id)) {
              for ($j = 0; $j < count($licencias_act_id[$i]); ++$j) {
                unset($licencias_act_id[$i][$j]['idRow']);
                unset($licencias_act_id[$i][$j]['propietario_id_name']);
                unset($licencias_act_id[$i][$j]['acciones']);
                $licencias_act_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_act_id[$i]);
            }
          }
        }
        if (!empty($fusiones)) {
          for ($i = 0; $i < count($fusiones); ++$i) {
            /* INSERTO LA FUSION Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertFusion($fusiones[$i]);

            /*Guardamos las fusiones anteriores  */
            if (!empty($fusiones_ant_id)) {
              for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j) {
                unset($fusiones_ant_id[$i][$j]['idRow']);
                unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
                unset($fusiones_ant_id[$i][$j]['acciones']);
                $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
            }
            /*Guardamos las fusiones actuales  */
            if (!empty($fusiones_act_id)) {
              for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j) {
                unset($fusiones_act_id[$i][$j]['idRow']);
                unset($fusiones_act_id[$i][$j]['propietario_id_name']);
                unset($fusiones_act_id[$i][$j]['acciones']);
                $fusiones_act_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_act_id[$i]);
            }
          }
        }
        if (!empty($camnom)) {
          for ($i = 0; $i < count($camnom); ++$i) {
            /* INSERTO EL CAMBIO DE NOMBRE Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamNom($camnom[$i]);

            /*Guardamos los Cambios de Nombre anteriores  */
            if (!empty($camnom_ant_id)) {
              for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j) {
                unset($camnom_ant_id[$i][$j]['idRow']);
                unset($camnom_ant_id[$i][$j]['propietario_id_name']);
                unset($camnom_ant_id[$i][$j]['acciones']);
                $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
            }
            /*Guardamos las Cambios de Nombre actuales  */
            if (!empty($camnom_act_id)) {
              for ($j = 0; $j < count($camnom_act_id[$i]); ++$j) {
                unset($camnom_act_id[$i][$j]['idRow']);
                unset($camnom_act_id[$i][$j]['propietario_id_name']);
                unset($camnom_act_id[$i][$j]['acciones']);
                $camnom_act_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_act_id[$i]);
            }
          }
        }
        if (!empty($camdom)) {
          for ($i = 0; $i < count($camdom); ++$i) {
            /* INSERTO EL CAMBIO DE DOMICLIO Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamDom($camdom[$i]);

            /*Guardamos los Cambios de Domicilio anteriores  */
            if (!empty($camdom_ant_id)) {
              for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j) {
                unset($camdom_ant_id[$i][$j]['idRow']);
                unset($camdom_ant_id[$i][$j]['propietario_id_name']);
                unset($camdom_ant_id[$i][$j]['acciones']);
                $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
            }
            /*Guardamos las Cambios de Domicilio actuales  */
            if (!empty($camdom_act_id)) {
              for ($j = 0; $j < count($camdom_act_id[$i]); ++$j) {
                unset($camdom_act_id[$i][$j]['idRow']);
                unset($camdom_act_id[$i][$j]['propietario_id_name']);
                unset($camdom_act_id[$i][$j]['acciones']);
                $camdom_act_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_act_id[$i]);
            }
          }
        }
        if (!empty($documentos)) {
          $file = $_FILES;
          if (empty($file)) {
            $doc_arch = "No tiene";
          } else {
            $doc_arch = "Si tiene";
            for ($i = 0; $i < count($documentos); ++$i) {
              $fpath = FCPATH . 'uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name'];
              $path = site_url('uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name']);
              // Mover el archivo a la carpeta de destino
              if (move_uploaded_file($file['doc_archivo_' . $documentos[$i]['idRow']]['tmp_name'], $fpath)) {
                //Guardo el documento
                unset($documentos[$i]['idRow']);
                unset($documentos[$i]['acciones']);
                $documentos[$i]['path'] = $path;
                $CI->PatentesSolicitudes_model->insertDocumento($documentos[$i]);
              } else {

                //throw new Exception('Error al subir el archivo'); 
              }
            }
          }
        }
        if (!empty($facturas)) {
          $CI->PatentesSolicitudes_model->insertMarcaFactura($facturas);
        }

        echo json_encode(['code' => 200, 'error' => '']);
      } catch (\Throwable $th) {
        //Activate SYSLOG in the app
        echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
      }
    }
  }

  private function ValidationsForm()
  {
    $CI = &get_instance();
    $CI->load->helper(['url', 'form']);
    $CI->load->library('form_validation');

    //we validate the data
    $config = array(
      [
        'field' => 'tipo_registro_id',
        'label' => 'Tipo de solicitud',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Debe indicar el Tipo de Solicitud'
        ]
      ],
      [
        'field' => 'client_id',
        'label' => 'Cliente',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Debe indicar el Cliente'
        ]
      ],
      [
        'field' => 'oficina_id',
        'label' => 'Oficina',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Debe indicar la Oficina'
        ]
      ],
      [
        'field' => 'staff_id',
        'label' => 'Responsable',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Debe indicar el Responsable'
        ]
      ],
      [
        'field' => 'ref_interna',
        'label' => 'Referencia Interna',
        'rules' => 'trim|min_length[2]|max_length[20]',
        'errors' => [
          'min_length' => 'Referencia Interna demasiado corta',
          'max_length' => 'Referencia Interna demasiado larga'
        ]
      ],
      [
        'field' => 'ref_cliente',
        'label' => 'Referencia Cliente',
        'rules' => 'trim|min_length[2]|max_length[20]',
        'errors' => [
          'min_length' => 'Referencia Cliente demasiado corta',
          'max_length' => 'Referencia Cliente demasiado larga'
        ]
      ],
      [
        'field' => 'carpeta',
        'label' => 'Carpeta',
        'rules' => 'trim|max_length[20]',
        'errors' => [
          'max_length' => 'Carpeta demasiado larga'
        ]
      ],
      [
        'field' => 'libro',
        'label' => 'Libro',
        'rules' => 'trim|max_length[20]',
        'errors' => [
          'max_length' => 'Libro demasiado largo'
        ]
      ],
      [
        'field' => 'tomo',
        'label' => 'Tomo',
        'rules' => 'trim|max_length[20]',
        'errors' => [
          'max_length' => 'Tomo demasiado largo'
        ]
      ],
      [
        'field' => 'folio',
        'label' => 'Folio',
        'rules' => 'trim|max_length[20]',
        'errors' => [
          'max_length' => 'Folio demasiado largo'
        ]
      ],
      [
        'field' => 'comentarios',
        'label' => 'Comentarios',
        'rules' => 'trim|min_length[5]|max_length[200]',
        'errors' => [
          'min_length' => 'Comentarios demasiado corto',
          'max_length' => 'Comentarios demasiado largo'
        ]
      ],
      [
        'field' => 'estado_id',
        'label' => 'Estado de Solicitud',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Debe indicar el Estado de Solicitud'
        ]
      ],
      [
        'field' => 'solicitud',
        'label' => 'Nº de Solicitud',
        'rules' => 'trim|max_length[20]',
        'errors' => [
          'max_length' => 'Nº de Solicitud demasiado largo'
        ]
      ],
      [
        'field' => 'registro',
        'label' => 'Nº de Registro',
        'rules' => 'trim|min_length[2]|max_length[20]',
        'errors' => [
          'min_length' => 'Nº de Registro demasiado corto',
          'max_length' => 'Nº de Registro demasiado largo'
        ]
      ],
      [
        'field' => 'certificado',
        'label' => 'Nº de Certificado',
        'rules' => 'trim|min_length[2]|max_length[20]',
        'errors' => [
          'min_length' => 'Nº de Certificado demasiado corto',
          'max_length' => 'Nº de Certificado demasiado largo'
        ]
      ]
    );
    //we set the rules
    $CI->form_validation->set_rules($config);
    return $CI->form_validation->run();
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
    $CI->load->model("PatentesSolicitudes_model");
    //We get the data
    $values = $CI->PatentesSolicitudes_model->find($id)[0];
    if (is_null($values) || empty($values)) {
      return redirect(admin_url('pi/patentes/SolicitudesController/create'));
    }
    /* Se verifica si se viene de agregar una factura */
    $factId = null;
    $invoicesBD = array();
    if (!is_null($this->session->flashdata('factId'))) {
      $id = intval($this->session->flashdata('marca_id'));
      $factId = intval($this->session->flashdata('factId'));
      /* Busco la factura agregada  */
      $dataInv = $CI->PatentesSolicitudes_model->getInvoice($factId);
      $invoicesBD = array(
        'id_factura' => $factId,
        'num_factura' => $dataInv[0]['prefix'] . '-' . $dataInv[0]['number'],
        'date' =>  date_format(new DateTime($dataInv[0]['date']), 'd/m/Y'),
        'status' => format_invoice_status($dataInv[0]['status'], '', true)
      );
      //$CI->load->model('invoices_model');
      //$statusInv = $CI->invoices_model->get_statuses();
      //$a = format_invoice_status(1, '', false);
    } else {
      $id_fact = intval($CI->PatentesSolicitudes_model->setCountPK());
    }
    $solicitantes = $CI->PatentesSolicitudes_model->findPatentesSolicitantes($id);
    $data = array();
    $tarea = $CI->PatentesSolicitudes_model->findAllTareas();
    foreach ($tarea as $row) {
      $data[] = array(
        'id' => $row['id'],
        'tipo_tarea' => $CI->PatentesSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
        'descripcion' => $row['descripcion'],
        'fecha' => $row['fecha'],
      );
    }
    $eventos = $CI->PatentesSolicitudes_model->findAllEventos();
    $datos = array();
    foreach ($eventos as $row) {
      $datos[] = array(
        'id' => $row['id'],
        'tipo_evento' => $CI->PatentesSolicitudes_model->BuscarTipoEventos($row['tipo_evento_id']),
        'comentarios' => $row['comentarios'],
        'fecha' => $row['fecha'],
      );
    }
    $values['solicitantes_id'] = $solicitantes;
    $values['fecha_vencimiento_certificado'] = $this->flip_dates($values['fecha_vencimiento_certificado']);
    $values['fecha_registro'] = is_null($values['fecha_registro']) ? '' : $this->flip_dates($values['fecha_registro']);
    $values['fecha_solicitud'] = is_null($values['fecha_solicitud']) ? '' : $this->flip_dates($values['fecha_solicitud']);
    $values['projects'] = $CI->PatentesSolicitudes_model->findProjectByPatente($id);
    return $CI->load->view('patente/solicitudes/edit', [
      'values'                => $values,
      'inventores'            => $CI->PatentesSolicitudes_model->getAllInventores(),
      'oficinas'              => $CI->PatentesSolicitudes_model->findAllOficinas(),
      'clientes'              => $CI->PatentesSolicitudes_model->findAllClients(),
      'solicitantes'          => $CI->PatentesSolicitudes_model->findAllPropietarios(),
      'responsable'           => $CI->PatentesSolicitudes_model->findAllStaff(),
      'tipo_solicitud'        => $CI->PatentesSolicitudes_model->findAllTipoSolicitud(),
      'estados_solicitudes'   => $CI->PatentesSolicitudes_model->findAllEstadosSolicitudes(),
      'pais_id'               => $CI->PatentesSolicitudes_model->findAllPaises(),
      'tipo_registro'         => $CI->PatentesSolicitudes_model->findAllTiposRegistros(),
      'tipo_evento'           => $CI->PatentesSolicitudes_model->findAllTipoEvento(),
      'boletines'             => $CI->PatentesSolicitudes_model->findAllBoletines(),
      'id'                    => $id,
      'SolDoc'                => $CI->PatentesSolicitudes_model->findAllSolicitudesDocumento(),
      'eventos'               => $datos,
      'tipo_tareas'           => $CI->PatentesSolicitudes_model->findAllTipoTareas(),
      'tareas'                => $data,
      'projects'              => $CI->PatentesSolicitudes_model->findAllProjects(),
      'tipo_publicacion'      => $CI->PatentesSolicitudes_model->findAllTipoPublicacion(),
      "inventores_id"         => $CI->PatentesSolicitudes_model->findInventoresByPatentes($id),
      "solicitantes_id"       => $CI->PatentesSolicitudes_model->findSolicitantesByPatentes($id),
      'invoices'              => (!empty($invoices)) ? $invoices[0] : '',
      'invoicesExtra'         => (!empty($invoices)) ? $invoices[1] : '',
    ]);
  }

  /**
   * Recive the data to update
   * 
   */

  public function update(string $id = null)
  {
    $CI = &get_instance();
    $CI->load->model("PatentesSolicitudes_model");
    if ($this->ValidationsForm() == FALSE) {
      echo json_encode(['code' => 201, 'error' => $CI->form_validation->error_array()]);
    } else {
      // Preparamos la data
      $form = $CI->input->post();
      /*Inicializamos los arreglos*/
      $solicitud = array();
      $paisSol = array();
      $solicitantes = array();
      $inventores = array();
      /*Seteamos el arreglo para la solicitud */
      $solicitud['id']                  = $form['id'];
      $solicitud["cod_contador"]        = intval(preg_replace("/[^0-9]+/", '', $form['cod_contador']));
      $solicitud['resumen']             = $form['resumen'];
      $solicitud['tipo_registro_id']    = $form['tipo_registro_id'];
      $solicitud['clasificacion']       = $form['clasificacion'];
      $solicitud['client_id']           = $form['client_id'];
      $solicitud['oficina_id']          = $form['oficina_id'];
      $solicitud['staff_id']            = $form['staff_id'];
      $solicitud['pais_id']             = $form['pais_id'];
      $solicitud['titulo']              = $form["titulo"];
      $solicitud['tipo_registro_id']    = $form['tipo_registro_id'];
      $solicitud['ref_interna']         = "P" . str_pad(intval(preg_replace("/[^0-9]+/", '', $form['cod_contador'])), 6, "0", STR_PAD_LEFT);
      $solicitud['ref_cliente']         = $form['ref_cliente'];
      $solicitud['carpeta']             = $form['carpeta'];
      $solicitud['libro']               = $form['libro'];
      $solicitud['folio']               = $form['folio'];
      $solicitud['tomo']                = $form['tomo'];
      $solicitud['comentarios']         = $form['comentarios'];
      $solicitud['estado_id']           = $form['estado_id'];
      $solicitud['nro_solicitud']       = $form['solicitud'];
      $solicitud['fecha_solicitud']     = empty($form['fecha_solicitud']) || '' ? NULL : $this->turn_dates($form['fecha_solicitud']);
      $solicitud['nro_registro']        = $form['registro'];
      $solicitud['fecha_registro']      = empty($form['fecha_registro']) || '' ? NULL : $this->turn_dates($form['fecha_registro']);
      $solicitud['nro_certificado']     = $form['certificado'];
      //$solicitud['fecha_vencimiento_certificado'] = empty($form['fecha_certificado']) || '' ? NULL : $this->turn_dates($form['fecha_certificado']);
      $solicitud['fecha_vencimiento_certificado'] = empty($form['fecha_vencimiento']) || '' ? NULL : $this->turn_dates($form['fecha_vencimiento']);
      /*Seteamos el arreglo para los solicitantes */
      foreach (json_decode($form['solicitantes_id'], TRUE) as $row) {
        $solicitantes[] = [
          'patente_id' => $form['id'],
          'client_id' => $row
        ];
      }

      /*Seteamos el arreglo para las prioridades */
      $prioridades = json_decode($form['prioridad_id'], TRUE);
      if (!empty($prioridades)) {
        for ($i = 0; $i < count($prioridades); ++$i) {
          unset($prioridades[$i]['idRow']);
          unset($prioridades[$i]['pais_name']);
          unset($prioridades[$i]['acciones']);
          $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
        }
      }


      /*Seteamos el arreglo para las publicaciones */
      $publicacion = json_decode($form['publicacion_id'], TRUE);
      if(!empty($publicacion))
      {
        for ($i = 0; $i < count($publicacion); ++$i) {
          unset($publicacion[$i]['idRow']);
          unset($publicacion[$i]['tipo_pub_name']);
          unset($publicacion[$i]['boletin_name']);
          unset($publicacion[$i]['acciones']);
          $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para los eventos */
      $eventos = json_decode($form['eventos_id'], TRUE);
      if(!empty($eventos))
      {
        for ($i = 0; $i < count($eventos); ++$i) {
          unset($eventos[$i]['idRow']);
          unset($eventos[$i]['tipo_evento_name']);
          unset($eventos[$i]['acciones']);
          $eventos[$i]['fecha'] = empty($eventos[$i]['fecha']) || '' ? NULL : $this->turn_dates($eventos[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para las tareas */
      $tareas = json_decode($form['tareas_id'], TRUE);
      if(!empty($tareas))
      {
        for ($i = 0; $i < count($tareas); ++$i) {
          unset($tareas[$i]['idRow']);
          unset($tareas[$i]['project_id_name']);
          unset($tareas[$i]['tipo_tareas_id_name']);
          unset($tareas[$i]['acciones']);
          $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
        }
      }
      

      /*Seteamos el arreglo para las Cesiones */
      $cesiones = json_decode($form['cesiones_id'], TRUE);
      $cesiones_ant_id = array();
      $cesiones_act_id = array();
      if(!empty($cesiones))
      {
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
      }
      

      /*Seteamos el arreglo para las Licencias */
      $licencias = json_decode($form['licencias_id'], TRUE);
      $licencias_ant_id = array();
      $licencias_act_id = array();
      if(!empty($licencias))
      {
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
      }
      

      /*Seteamos el arreglo para las Fusiones */
      $fusiones = json_decode($form['fusiones_id'], TRUE);
      $fusiones_ant_id = array();
      $fusiones_act_id = array();
      if(!empty($fusiones))
      {
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
      }
      

      /*Seteamos el arreglo para los Cambios de Nombre */
      $camnom = json_decode($form['camnom_id'], TRUE);
      $camnom_ant_id = array();
      $camnom_act_id = array();
      if(!empty($camnom))
      {
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
      }
      

      /*Seteamos el arreglo para los Cambios de Domicilio */
      $camdom = json_decode($form['camdom_id'], TRUE);
      $camdom_ant_id = array();
      $camdom_act_id = array();
      if(!empty($camdom))
      {
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
      }
      

      /*Seteamos el arreglo para los Documentos */
      $documentos = json_decode($form['doc_id'], TRUE);

      /*Seteamos el arreglo para los Documentos */
      $facturas = json_decode($form['facturas_id'], TRUE);
      if(!empty($facturas))
      {
        for ($i = 0; $i < count($facturas); ++$i) {
          unset($facturas[$i]['idRow']);
          unset($facturas[$i]['factNum']);
          unset($facturas[$i]['factFecha']);
          unset($facturas[$i]['factEstatus']);
          unset($facturas[$i]['acciones']);
          $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
        }
      }
      

      /*Seteamos el arreglo para los inventores */
      $inventoresfrm = json_decode($form['inventores_id'], TRUE);
      foreach ($inventoresfrm as $key => $value) {
        $inventores[] = ["inventor_id" => $value, 'patente_id' => $form['id']];
      }



      try {
        $CI->PatentesSolicitudes_model->insert($solicitud);
        if (!empty($inventores)) {
          $CI->PatentesSolicitudes_model->insertInventores($inventores);
        }
        if (!empty($claseNiza)) {
          $CI->PatentesSolicitudes_model->insertSolicitudesClases($claseNiza);
        }
        if (!empty($prioridades)) {
          $CI->PatentesSolicitudes_model->insertPrioridades($prioridades);
        }
        if (!empty($solicitantes)) {
          $CI->PatentesSolicitudes_model->insertPatentesSolicitantes($solicitantes);
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
            if (!empty($cesiones_ant_id)) {
              for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j) {
                unset($cesiones_ant_id[$i][$j]['idRow']);
                unset($cesiones_ant_id[$i][$j]['cedente_id_name']);
                unset($cesiones_ant_id[$i][$j]['acciones']);
                $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
            }
            /*Guardamos las cesiones actuales  */
            if (!empty($cesiones_act_id)) {
              for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j) {
                unset($cesiones_act_id[$i][$j]['idRow']);
                unset($cesiones_act_id[$i][$j]['cedente_id_name']);
                unset($cesiones_act_id[$i][$j]['acciones']);
                $cesiones_act_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->PatentesSolicitudes_model->insertCesionesAntAct($cesiones_act_id[$i]);
            }
          }
        }
        if (!empty($licencias)) {
          for ($i = 0; $i < count($licencias); ++$i) {
            /* INSERTO LA LICENCIA Y RETORNO SU ID*/
            $licencia_id = $CI->PatentesSolicitudes_model->insertLicencias($licencias[$i]);

            /*Guardamos las licencias anteriores  */
            if (!empty($licencias_ant_id)) {
              for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j) {
                unset($licencias_ant_id[$i][$j]['idRow']);
                unset($licencias_ant_id[$i][$j]['propietario_id_name']);
                unset($licencias_ant_id[$i][$j]['acciones']);
                $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
            }
            /*Guardamos las licencias actuales  */
            if (!empty($licencias_act_id)) {
              for ($j = 0; $j < count($licencias_act_id[$i]); ++$j) {
                unset($licencias_act_id[$i][$j]['idRow']);
                unset($licencias_act_id[$i][$j]['propietario_id_name']);
                unset($licencias_act_id[$i][$j]['acciones']);
                $licencias_act_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->PatentesSolicitudes_model->insertLicenciasAntAct($licencias_act_id[$i]);
            }
          }
        }
        if (!empty($fusiones)) {
          for ($i = 0; $i < count($fusiones); ++$i) {
            /* INSERTO LA FUSION Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertFusion($fusiones[$i]);

            /*Guardamos las fusiones anteriores  */
            if (!empty($fusiones_ant_id)) {
              for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j) {
                unset($fusiones_ant_id[$i][$j]['idRow']);
                unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
                unset($fusiones_ant_id[$i][$j]['acciones']);
                $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
            }
            /*Guardamos las fusiones actuales  */
            if (!empty($fusiones_act_id)) {
              for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j) {
                unset($fusiones_act_id[$i][$j]['idRow']);
                unset($fusiones_act_id[$i][$j]['propietario_id_name']);
                unset($fusiones_act_id[$i][$j]['acciones']);
                $fusiones_act_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertFusionesAntAct($fusiones_act_id[$i]);
            }
          }
        }
        if (!empty($camnom)) {
          for ($i = 0; $i < count($camnom); ++$i) {
            /* INSERTO EL CAMBIO DE NOMBRE Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamNom($camnom[$i]);

            /*Guardamos los Cambios de Nombre anteriores  */
            if (!empty($camnom_ant_id)) {
              for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j) {
                unset($camnom_ant_id[$i][$j]['idRow']);
                unset($camnom_ant_id[$i][$j]['propietario_id_name']);
                unset($camnom_ant_id[$i][$j]['acciones']);
                $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
            }
            /*Guardamos las Cambios de Nombre actuales  */
            if (!empty($camnom_act_id)) {
              for ($j = 0; $j < count($camnom_act_id[$i]); ++$j) {
                unset($camnom_act_id[$i][$j]['idRow']);
                unset($camnom_act_id[$i][$j]['propietario_id_name']);
                unset($camnom_act_id[$i][$j]['acciones']);
                $camnom_act_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamNomAntAct($camnom_act_id[$i]);
            }
          }
        }
        if (!empty($camdom)) {
          for ($i = 0; $i < count($camdom); ++$i) {
            /* INSERTO EL CAMBIO DE DOMICLIO Y RETORNO SU ID*/
            $fusion_id = $CI->PatentesSolicitudes_model->insertCamDom($camdom[$i]);

            /*Guardamos los Cambios de Domicilio anteriores  */
            if (!empty($camdom_ant_id)) {
              for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j) {
                unset($camdom_ant_id[$i][$j]['idRow']);
                unset($camdom_ant_id[$i][$j]['propietario_id_name']);
                unset($camdom_ant_id[$i][$j]['acciones']);
                $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
            }
            /*Guardamos las Cambios de Domicilio actuales  */
            if (!empty($camdom_act_id)) {
              for ($j = 0; $j < count($camdom_act_id[$i]); ++$j) {
                unset($camdom_act_id[$i][$j]['idRow']);
                unset($camdom_act_id[$i][$j]['propietario_id_name']);
                unset($camdom_act_id[$i][$j]['acciones']);
                $camdom_act_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->PatentesSolicitudes_model->insertCamDomAntAct($camdom_act_id[$i]);
            }
          }
        }
        if (!empty($documentos)) {
          $file = $_FILES;
          if (empty($file)) {
            $doc_arch = "No tiene";
          } else {
            $doc_arch = "Si tiene";
            for ($i = 0; $i < count($documentos); ++$i) {
              $fpath = FCPATH . 'uploads/patentes/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name'];
              $path = site_url('uploads/patentes/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name']);
              // Mover el archivo a la carpeta de destino
              if (move_uploaded_file($file['doc_archivo_' . $documentos[$i]['idRow']]['tmp_name'], $fpath)) {
                //Guardo el documento
                unset($documentos[$i]['idRow']);
                unset($documentos[$i]['acciones']);
                $documentos[$i]['path'] = $path;
                $CI->PatentesSolicitudes_model->insertDocumento($documentos[$i]);
              } else {

                //throw new Exception('Error al subir el archivo'); 
              }
            }
          }
        }
        if (!empty($facturas)) {
          $CI->PatentesSolicitudes_model->insertMarcaFactura($facturas);
        }

        echo json_encode(['code' => 200, 'error' => '']);
      } catch (\Throwable $th) {
        //Activate SYSLOG in the app
        echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
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

  public function flip_dates($date)
  {
    if ($date != '') {
      try {
        $wdate = explode('-', $date);
        $cdate = "{$wdate[2]}/{$wdate[1]}/{$wdate[0]}";
        return $cdate;
      } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    } elseif ($date == '0000-00-00') {
      try {
        $wdate = explode('-', $date);
        $cdate = "{$wdate[2]}/{$wdate[1]}/{$wdate[0]}";
        return $cdate;
      } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    } else {
      return '';
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


  public function create()
  {
    $this->LoadPage();
  }

  private function LoadPage()
  {
    $CI = &get_instance();
    $CI->load->model("PatentesSolicitudes_model");
    /* Se verifica si se viene de agregar una factura */
    $factId = null;
    $invoicesBD = array();
    if (!is_null($this->session->flashdata('factId'))) {
      $id = intval($this->session->flashdata('marca_id'));
      $factId = intval($this->session->flashdata('factId'));
      /* Busco la factura agregada  */
      $dataInv = $CI->PatentesSolicitudes_model->getInvoice($factId);
      $invoicesBD = array(
        'id_factura' => $factId,
        'num_factura' => $dataInv[0]['prefix'] . '-' . $dataInv[0]['number'],
        'date' =>  date_format(new DateTime($dataInv[0]['date']), 'd/m/Y'),
        'status' => format_invoice_status($dataInv[0]['status'], '', true)
      );
      //$CI->load->model('invoices_model');
      //$statusInv = $CI->invoices_model->get_statuses();
      //$a = format_invoice_status(1, '', false);
    } else {
      $id = intval($CI->PatentesSolicitudes_model->setCountPK());
    }
    $fields = $CI->PatentesSolicitudes_model->getFillableFields();
    $inputs = array();
    $labels = array();
    foreach ($fields as $field) {
      if ($field['type'] == 'INT') {
        $inputs[$field['name']] = array(
          'name' => $field['name'],
          'id'   => $field['name'],
          'type' => 'range',
          'class' => 'form-control'
        );
      } else {
        $inputs[$field['name']] = array(
          'name' => $field['name'],
          'id'   => $field['name'],
          'type' => 'text',
          'class' => 'form-control'
        );
      }
    }
    $data = array();
    $tarea = $CI->PatentesSolicitudes_model->findAllTareas();
    foreach ($tarea as $row) {
      $data[] = array(
        'id' => $row['id'],
        'tipo_tarea' => $CI->PatentesSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
        'descripcion' => $row['descripcion'],
        'fecha' => $row['fecha'],
      );
    }
    $eventos = $CI->PatentesSolicitudes_model->findAllEventos();
    $datos = array();
    foreach ($eventos as $row) {
      $datos[] = array(
        'id' => $row['id'],
        'tipo_evento' => $CI->PatentesSolicitudes_model->BuscarTipoEventos($row['tipo_evento_id']),
        'comentarios' => $row['comentarios'],
        'fecha' => $row['fecha'],
      );
    }
    $cod_contador = 'M-' . ($CI->PatentesSolicitudes_model->CantidadSolicitudes() + 1);
    $labels = ['Nº Solicitud', 'Nº de Registro', 'Tipo Solicitud', 'Estado de solicitud', ''];
    $invoices = $CI->PatentesSolicitudes_model->findAllInvoices();
    return $CI->load->view('patente/solicitudes/create', [
      'fields'                => $inputs,
      'labels'                => $labels,
      'oficinas'              => $CI->PatentesSolicitudes_model->findAllOficinas(),
      'clientes'              => $CI->PatentesSolicitudes_model->findAllClients(),
      'solicitantes'          => $CI->PatentesSolicitudes_model->findAllPropietarios2(),
      'responsable'           => $CI->PatentesSolicitudes_model->findAllStaff(),
      'tipo_solicitud'        => $CI->PatentesSolicitudes_model->findAllTipoSolicitud(),
      'estados_solicitudes'   => $CI->PatentesSolicitudes_model->findAllEstadosSolicitudes(),
      'pais_id'               => $CI->PatentesSolicitudes_model->findAllPaises(),
      'tipo_registro'         => $CI->PatentesSolicitudes_model->findAllTiposRegistros(),
      'tipo_evento'           => $CI->PatentesSolicitudes_model->findAllTipoEvento(),
      'id'                    => $id,
      'SolDoc'                => $CI->PatentesSolicitudes_model->findAllSolicitudesDocumento(),
      'eventos'               => $datos,
      'tipo_tareas'           => $CI->PatentesSolicitudes_model->findAllTipoTareas(),
      'tareas'                => $data,
      'boletines'             => $CI->PatentesSolicitudes_model->findAllBoletines(),
      'tipo_publicacion'      => $CI->PatentesSolicitudes_model->findAllTipoPublicacion(),
      'projects'              => $CI->PatentesSolicitudes_model->findAllProjects(),
      'invoices'              => (!empty($invoices)) ? $invoices[0] : '',
      'invoicesExtra'         => (!empty($invoices)) ? $invoices[1] : '',
      'cod_contador'          => $cod_contador,
      'invoicesBD'            => $invoicesBD,
      "inventores"            => $CI->PatentesSolicitudes_model->getAllInventores()
    ]);
  }
}
