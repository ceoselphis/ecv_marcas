<?php 
public function store()
{
  $CI = &get_instance();
  $CI->load->model("MarcasSolicitudes_model");
  $CI->load->helper(['url', 'form']);
  $CI->load->library('form_validation');
  $form = array();
  $data = $CI->input->post();

  if (!empty($data)){
    echo json_encode(['data' => $data]);
    $renovaciones = json_decode($data['renovaciones_id'], TRUE);
    echo json(['message' => 'Renovaciones', 'data' => $renovaciones]);

  } else {
    echo json_encode(['message' => 'not data' , 'code' => 400]);
  }
}


$(document).on('submit', "#solicitudfrm", function(e) {
  e.preventDefault();
  var formData = new FormData();
  formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
  formData.append('id', $("input[name=id]").val());
  formData.append('cod_contador', $('#cod_contador').val());
  formData.append('tipo_registro_id', $('#tipo_registro_id').val());
  formData.append('client_id', $('#client_id').val());
  formData.append('oficina_id', $('#oficina_id').val());
  formData.append('staff_id', $('#staff_id').val());
  id = $("input[name=id]").val();
  pais_id = JSON.stringify($('#pais_id').val());
  formData.append('pais_id', validarPaisesDesignados(pais_id,id));
  solicitantes_id = JSON.stringify($('#solicitantes_id').val());
  formData.append('solicitantes_id', solicitantes_id);
  formData.append('tipo_solicitud_id', $('#tipo_solicitud_id').val());
  formData.append('ref_interna', $('#ref_interna').val());
  formData.append('ref_cliente', $('#ref_cliente').val());
  formData.append('prueba_uso', $('#prueba_uso').val());
  formData.append('carpeta', $('#carpeta').val());
  formData.append('libro', $('#libro').val());
  formData.append('tomo', $('#tomo').val());
  formData.append('folio', $('#folio').val());
  formData.append('comentarios', $('#comentarios').val());
  formData.append('estado_id', $('#estado_id').val());
  formData.append('solicitud', $('#solicitud').val());
  formData.append('fecha_solicitud', $('#fecha_solicitud').val());
  formData.append('registro', $('#registro').val());
  formData.append('fecha_registro', $('#fecha_registro').val());
  formData.append('certificado', $('#certificado').val());
  formData.append('fecha_certificado', $('#fecha_certificado').val());
  formData.append('fecha_vencimiento', $('#fecha_vencimiento').val());
  formData.append('signo_archivo', $('#signo_archivo')[0].files.length > 0 ? $('#signo_archivo')[0].files[0] : '');
  formData.append('signonom', $('#signonom').val());
  formData.append('signo_archivo_desc', $('#descripcion_signo').val());
  formData.append('tipo_signo_id', $('#tipo_signo_id').val());
  let clase_niza = localStorage.getItem("clase_niza") || "[]";
  formData.append('clase_niza_id', validarClaseNiza(clase_niza));
  let prioridad = localStorage.getItem("prioridad") || "[]";
  formData.append('prioridad_id', validarPrioridad(prioridad));
  let publicacion = localStorage.getItem("publicacion") || "[]";
  formData.append("publicacion_id", validarPublicaciones(publicacion));
  let eventos = localStorage.getItem("eventos") || "[]";  
  formData.append("eventos_id", validarEventos(eventos));
  let tareas = localStorage.getItem("tareas") || "[]"; 
  formData.append("tareas_id", validarTareas(tareas));
  let renovaciones = localStorage.getItem("renovaciones") || "[]";
  formData.append("renovaciones_id" , validarRenovaciones(renovaciones));
  let cesiones = localStorage.getItem("cesiones") || "[]";
  formData.append("cesiones_id", validarCesiones(cesiones) );
  let licencias = localStorage.getItem("licencias") || "[]";
  formData.append("licencias_id", validarLicencia(licencias));
  let fusiones = localStorage.getItem("fusiones") || "[]";
  formData.append("fusiones_id", validarFusion(fusiones));
  let camnom = localStorage.getItem("camnom") || "[]";
  formData.append("camnom_id", validarCambioNombre(camnom));
  let camdom = localStorage.getItem("camdom") || "[]";
  formData.append("camdom_id", validarCambioDomicilio(camdom));
  formData.append("doc_id", localStorage.getItem("documentos"));
  var docu = JSON.parse(localStorage.getItem("documentos"));
  docu.forEach(function(item){
      formData.append("doc_archivo_" + item.idRow, $("#doc_archivo_" + item.idRow).get(0).files[0]);
  });
  let facturas = localStorage.getItem("facturas") || "[]";
  formData.append("facturas_id", validarFactura(facturas));
  console.log(" Form Data ",formData);
  $.ajax({
      url: '<?php echo admin_url('pi/MarcasSolicitudesController/store'); ?>',
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
          console.log(" Respuesta : ",response);    
      },
      fail: function(request) {
          console.log(" Error ",request);
     
      }
  });

});
?>

<?php 
public function store()
{
  $CI = &get_instance();
  $CI->load->model("MarcasSolicitudes_model");
  $CI->load->helper(['url', 'form']);
  $CI->load->library('form_validation');
  $form = array();
  $data = $CI->input->post();
  //echo json_encode(['data' => $data]);  

  if (!empty($data)){
   // echo json_encode(['data' => $data]);
   //$form['id'] = $data['id'];



    /*Seteamos el valor del signo*/
    $file = '';
    if (!empty($_FILES['signo_archivo']) ) {
      $file = $_FILES['signo_archivo'];
    } 
    if ($file != NULL) {
      //We fill the data of the         
      $fpath = FCPATH . 'uploads/marcas/signos/' . $data['id'] . '-' . $file['name'];
      $path = site_url('uploads/marcas/signos/' . $data['id'] . '-' . $file['name']);
      move_uploaded_file($file['tmp_name'], $fpath);
      $form['signo_archivo'] = $path;
    }

        /*Seteamos el arreglo para los paises designados*/
      Decodifica el JSON y asegúrate de que sea un array
      $paises_designados = json_decode($data['pais_id'], TRUE);
      $paises_designados = is_array($paises_designados) ? $paises_designados : [];

      Depuración: Verifica la estructura de $paises_designados
     echo json_encode(['message' => 'Paises Designados', 'paises' => $paises_designados]);

     

    foreach ($paises_designados as $row) {
      $paisSol[] = [
        'marcas_id' => $data['id'],
        'pais_id'   => $row
      ];
    }

    if (!empty($paisSol) && is_array($paisSol)){
      foreach ($paisSol as $row) {
        $querypais = $CI->MarcasSolicitudes_model->insertPaisesDesignados($row);
        if (isset($querypais)){
          echo json_encode(['message' => 'Paises Insertado Correctamente']);
        } else {
          echo json_encode(['message' => 'Paises Insertado Correctamente']);
        }
      }
    }
    /*Seteamos el arreglo para los solicitantes */
    foreach (json_decode($data['solicitantes_id'], TRUE) as $row) {
      $solicitantes[] = [
        'marcas_id' => $data['id'],
        'propietario_id' => $row
      ];
    }


    

    /*Seteamos el arreglo para las clases */
    $claseNiza = json_decode($data['clase_niza_id'], TRUE);
    $claseNiza = is_array($claseNiza) ? $claseNiza : [];
    if (!empty($claseNiza)) {
      for ($i = 0; $i < count($claseNiza); ++$i) {
        unset($claseNiza[$i]['idRow']);
        unset($claseNiza[$i]['clase_id_name']);
        unset($claseNiza[$i]['acciones']);
      }
    }


    /*Seteamos el arreglo para las prioridades */
    $prioridades = json_decode($data['prioridad_id'], TRUE);
    $prioridades = is_array($prioridades) ? $prioridades : [];
    for ($i = 0; $i < count($prioridades); ++$i) {
      // unset($prioridades[$i]['idRow']);
      // unset($prioridades[$i]['pais_name']);
      // unset($prioridades[$i]['acciones']);
      $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
    }

    /*Seteamos el arreglo para las publicaciones */
    $publicacion = json_decode($data['publicacion_id'], TRUE);
    $publicacion = is_array($publicacion) ? $publicacion : [];
    for ($i = 0; $i < count($publicacion); ++$i) {
      // unset($publicacion[$i]['idRow']);
      // unset($publicacion[$i]['tipo_pub_name']);
      // unset($publicacion[$i]['boletin_name']);
      // unset($publicacion[$i]['acciones']);
      $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
    }

    /*Seteamos el arreglo para los eventos */
    $eventos = json_decode($data['eventos_id'], TRUE);
    if (is_array($eventos)) { 

      for ($i = 0; $i < count($eventos); ++$i) {
        // unset($eventos[$i]['idRow']);
        // unset($eventos[$i]['tipo_evento_name']);
        // unset($eventos[$i]['acciones']);
        $eventos[$i]['fecha'] = empty($eventos[$i]['fecha']) || '' ? NULL : $this->turn_dates($eventos[$i]['fecha']);
      }
    } else {
      $eventos = [];
    }
  
    /*Seteamos el arreglo para las tareas */
    $tareas = json_decode($data['tareas_id'], TRUE);
    if (is_array($tareas)) {
      for ($i = 0; $i < count($tareas); ++$i) {
        // unset($tareas[$i]['idRow']);
        // unset($tareas[$i]['project_id_name']);
        // unset($tareas[$i]['tipo_tareas_id_name']);
        // unset($tareas[$i]['acciones']);
        $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
      }
    } else {
      $tareas = [];
    }



    $renovaciones = json_decode($data['renovaciones_id'], TRUE);
    $renovaciones = $this->validarRenovaciones($renovaciones);
    echo json_encode(['message' => 'Renovaciones', 'data' => $renovaciones]);
    if (json_last_error() === JSON_ERROR_NONE) {
      //echo json_encode(['message' => 'Renovaciones', 'data' => $renovaciones]);
    } else {
        echo json_encode(['message' => 'Invalid JSON data', 'code' => 400]);
    }

    if (is_array($renovaciones)){
      for ($i = 0; $i < count($renovaciones); ++$i) {
        $renovaciones[$i]['vegencia_desde'] = empty($renovaciones[$i]['vegencia_desde']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['vegencia_desde']);
        $renovaciones[$i]['vegencia_hasta'] = empty($renovaciones[$i]['vegencia_hasta']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['vegencia_hasta']);
        $renovaciones[$i]['fecha_solicitud'] = empty($renovaciones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['fecha_solicitud']);
        $renovaciones[$i]['fecha_resolucion'] = empty($renovaciones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['fecha_resolucion']);
      }
      echo json(['message' => 'Renovaciones', 'data' => $renovaciones]);
    } else {
      $renovaciones = [];
    }
    echo json(['message' => 'Renovaciones', 'data' => $renovaciones]);
    
    



    /*Seteamos el arreglo para las Cesiones */
    $cesiones = json_decode($data['cesiones_id'], TRUE);
    $cesiones_ant_id = array();
    $cesiones_act_id = array();
   // echo json_encode(['cesiones' => $cesiones, 'message' => 'succes' ]);
    if (is_array($cesiones)) {
      for ($i = 0; $i < count($cesiones); ++$i) {
        // unset($cesiones[$i]['idRow']);
        // unset($cesiones[$i]['tmp_cesion_id']);
        // unset($cesiones[$i]['client_id_name']);
        // unset($cesiones[$i]['oficina_id_name']);
        // unset($cesiones[$i]['staff_id_name']);
        // unset($cesiones[$i]['estado_id_name']);
        // unset($cesiones[$i]['acciones']);
        $cesiones_ant_id[$i] = json_decode($cesiones[$i]['cesionesanteriores'], TRUE);
        unset($cesiones[$i]['cesionesanteriores']);
        $cesiones_act_id[$i] = json_decode($cesiones[$i]['cesionesactuales'], TRUE);
        unset($cesiones[$i]['cesionesactuales']);
        $cesiones[$i]['fecha_solicitud'] = empty($cesiones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($cesiones[$i]['fecha_solicitud']);
        $cesiones[$i]['fecha_resolucion'] = empty($cesiones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($cesiones[$i]['fecha_resolucion']);
      }
    } else {
    
      $cesiones = [];
    }




    
    /*Seteamos el arreglo para las Licencias */
    $licencias = json_decode($data['licencias_id'], TRUE);
    $licencias_ant_id = array();
    $licencias_act_id = array();
   // echo json_encode(['message' => 'licencia ' , 'Data' => $licencias] );
    if (is_array($licencias)) {
        for ($i = 0; $i < count($licencias); ++$i) {
            $licencias_ant_id[$i] = json_decode($licencias[$i]['licenciasanteriores'], TRUE);
            unset($licencias[$i]['licenciasanteriores']);
            $licencias_act_id[$i] = json_decode($licencias[$i]['licenciasactuales'], TRUE);
            unset($licencias[$i]['licenciasactuales']);
            $licencias[$i]['fecha_solicitud'] = empty($licencias[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($licencias[$i]['fecha_solicitud']);
            $licencias[$i]['fecha_resolucion'] = empty($licencias[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($licencias[$i]['fecha_resolucion']);
        }

    } else {
        $licencias = [];
    }
    

    /*Seteamos el arreglo para las Fusiones */
    $fusiones = json_decode($data['fusiones_id'], TRUE);
    $fusiones_ant_id = array();
    $fusiones_act_id = array();
    if (is_array($licencias)) { 

      for ($i = 0; $i < count($fusiones); ++$i) {
        $fusiones_ant_id[$i] = json_decode($fusiones[$i]['fusionesanteriores'], TRUE);
        unset($fusiones[$i]['fusionesanteriores']);
        $fusiones_act_id[$i] = json_decode($fusiones[$i]['fusionesactuales'], TRUE);
        unset($fusiones[$i]['fusionesactuales']);
        $fusiones[$i]['fecha_solicitud'] = empty($fusiones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($fusiones[$i]['fecha_solicitud']);
        $fusiones[$i]['fecha_resolucion'] = empty($fusiones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($fusiones[$i]['fecha_resolucion']);
      }
    } else {
      $fusiones = [];
    }



    /*Seteamos el arreglo para los Cambios de Nombre */
    $camnom = json_decode($data['camnom_id'], TRUE);
    $camnom_ant_id = array();
    $camnom_act_id = array();
    //   echo json_encode(['message'  => 'Cambio Nombre' , 'data' => $camnom]);
    if (is_array($camnom)) {
      for ($i = 0; $i < count($camnom); ++$i) {
        $camnom_ant_id[$i] = json_decode($camnom[$i]['camnomanteriores'], TRUE);
        unset($camnom[$i]['camnomanteriores']);
        $camnom_act_id[$i] = json_decode($camnom[$i]['camnomactuales'], TRUE);
        unset($camnom[$i]['camnomactuales']);
        $camnom[$i]['fecha_solicitud'] = empty($camnom[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($camnom[$i]['fecha_solicitud']);
        $camnom[$i]['fecha_resolucion'] = empty($camnom[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($camnom[$i]['fecha_resolucion']);
      }
     
    } else {
      $camnom = [];
    }

    $camdom = json_decode($data['camdom_id'], TRUE);
    $camdom_ant_id = array();
    $camdom_act_id = array();
    
    if (is_array($camdom)) {
      for ($i = 0; $i < count($camdom); ++$i) {
        $camdom_ant_id[$i] = json_decode($camdom[$i]['camdomanteriores'], TRUE);
        unset($camdom[$i]['camdomanteriores']);
        $camdom_act_id[$i] = json_decode($camdom[$i]['camdomactuales'], TRUE);
        unset($camdom[$i]['camdomactuales']);
        $camdom[$i]['fecha_solicitud'] = empty($camdom[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($camdom[$i]['fecha_solicitud']);
        $camdom[$i]['fecha_resolucion'] = empty($camdom[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($camdom[$i]['fecha_resolucion']);
      }
      //echo json_encode(['message' => 'Cambio Domicilio ' , 'data' => $camdom ]);
    } else {
      $camdom = [];
      //echo json_encode(['message' => 'Cambio Domicilio ' , 'data' => $camdom ]);
    }

    $documentos = json_decode($data['doc_id'], TRUE);
    $documentos = is_array($documentos) ? $documentos : [];
    $facturas = json_decode($data['facturas_id'], TRUE);
    if (is_array($facturas)) { 

      for ($i = 0; $i < count($facturas); ++$i) {
        // unset($facturas[$i]['idRow']);
        // unset($facturas[$i]['factNum']);
        // unset($facturas[$i]['factFecha']);
        // unset($facturas[$i]['factEstatus']);
        // unset($facturas[$i]['acciones']);
        $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
      }
    } else {
      $facturas = [];
    }

   
    try {
      $query = $CI->MarcasSolicitudes_model->insert($form);
      if (isset($query)) {
        $id = $data['id'];
        // if (!empty($paises_designados) && is_array($paises_designados)) {
        //   $query = $CI->MarcasSolicitudes_model->insertPaisesDesignados($paises_designados);
        
        // } 
        // if (!empty($claseNiza) && is_array($claseNiza)) {
        //   $CI->MarcasSolicitudes_model->insertSolicitudesClases($claseNiza);
        // }
        // if (!empty($prioridades) && is_array($prioridades)) {
        //   $CI->MarcasSolicitudes_model->insertPrioridades($prioridades);
        // }
        // if (!empty($solicitantes) && is_array($solicitantes)) {
        //   $CI->MarcasSolicitudes_model->insertMarcasSolicitantes($solicitantes);
        // }
        // if (!empty($publicacion) && is_array($publicacion)) {
        //   $CI->MarcasSolicitudes_model->insertPublicaciones($publicacion);
        // }
        // if (!empty($eventos) && is_array($eventos)) {
        //   $CI->MarcasSolicitudes_model->insertEventos($eventos);
        // }
        // if (!empty($tareas) && is_array($tareas) ) {
        //   $CI->MarcasSolicitudes_model->insertTareas($tareas);
        // }
        if (!empty($renovaciones) && is_array($renovaciones)) {
          $query_renovaciones =  $CI->MarcasSolicitudes_model->insertRenovaciones($renovaciones);
          if (isset($query_renovaciones)){
            echo json_encode(['message' => 'Renovaciones Insertado Correctamente']);
          } else {
            echo json_encode(['message' => 'Error al insertar Renovaciones']);
          }
        }
        // if (!empty($cesiones) && is_array($cesiones)) {
        //   //echo json_encode(['message' => 'Tiene Cesiones' , 'cesiones' => $cesiones]);
        //   for ($i = 0; $i < count($cesiones); ++$i) {
        //     /* INSERTO LA CESION Y RETORNO SU ID*/
        //     $cesion_id = $CI->MarcasSolicitudes_model->insertCesiones($cesiones[$i]);
        //     /*Guardamos las cesiones anteriores  */
        //     if (!empty($cesiones_ant_id[0]) && is_array($cesiones_ant_id)) {
        //       echo json_encode(['message' => 'Tiene Cesiones anterior']);
        //       for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j) {
        //         $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
        //       }
        //       $querycesion_anterior = $CI->MarcasSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
        //       if (isset($querycesion_anterior)){
        //         echo json_encode(['message' => 'Insertado Cesion anterior correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Cesion anterior']);
        //       }
        //     }
        //     /*Guardamos las cesiones actuales  */
        //     if (!empty($cesiones_act_id[0]) && is_array($cesiones_act_id)) {
        //        echo json_encode(['message' => 'Tiene Cesiones actual']);
        //         for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j) {
        //           // unset($cesiones_act_id[$i][$j]['idRow']);
        //           // unset($cesiones_act_id[$i][$j]['cedente_id_name']);
        //           // unset($cesiones_act_id[$i][$j]['acciones']);
        //           $cesiones_act_id[$i][$j]['cesion_id'] = $cesion_id;
        //         }
        //       $querycesion_actual =   $CI->MarcasSolicitudes_model->insertCesionesAntAct($cesiones_act_id[$i]);
        //       if (isset($querycesion_actual)){
        //         echo json_encode(['message' => 'Insertado Cesion Actual correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Cesion Actual']);
        //       }
        //     }
        //   }
        // }
        // if (!empty($licencias) && is_array($licencias)) {
        //   for ($i = 0; $i < count($licencias); ++$i) {
        //     /* INSERTO LA LICENCIA Y RETORNO SU ID*/
        //     $licencia_id = $CI->MarcasSolicitudes_model->insertLicencias($licencias[$i]);

        //     /*Guardamos las licencias anteriores  */
        //     if (!empty($licencias_ant_id[0]) && is_array($licencias_ant_id)) {
        //       for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j) {
        //         // unset($licencias_ant_id[$i][$j]['idRow']);
        //         // unset($licencias_ant_id[$i][$j]['propietario_id_name']);
        //         // unset($licencias_ant_id[$i][$j]['acciones']);
        //         $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
        //       }
        //       $querylicencia_anterior = $CI->MarcasSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
        //       if (isset($querylicencia_anterior)){
        //         echo json_encode(['message' => 'Insertado Licencia anterior correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Licencia anterior']);
        //       }
        //     }
        //     /*Guardamos las licencias actuales  */
        //     if (!empty($licencias_act_id[0]) && is_array($licencias_act_id) ) {
        //       for ($j = 0; $j < count($licencias_act_id[$i]); ++$j) {
        //         // unset($licencias_act_id[$i][$j]['idRow']);
        //         // unset($licencias_act_id[$i][$j]['propietario_id_name']);
        //         // unset($licencias_act_id[$i][$j]['acciones']);
        //         $licencias_act_id[$i][$j]['licencia_id'] = $licencia_id;
        //       }
        //       $querylicencia_actual = $CI->MarcasSolicitudes_model->insertLicenciasAntAct($licencias_act_id[$i]);
        //       if (isset($querylicencia_actual)){
        //         echo json_encode(['message' => 'Insertado Licencia actual correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Licencia actual']);
        //       }
        //     }
        //   }
        //  // echo json_encode(['message' => 'Licencia Creada con Exito']);
        // }
        // if (!empty($fusiones) && is_array($fusiones)) {
        //   for ($i = 0; $i < count($fusiones); ++$i) {
        //     /* INSERTO LA FUSION Y RETORNO SU ID*/
        //     $fusion_id = $CI->MarcasSolicitudes_model->insertFusion($fusiones[$i]);

        //     /*Guardamos las fusiones anteriores  */
        //     if (!empty($fusiones_ant_id[0])) {
        //       for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j) {
        //         // unset($fusiones_ant_id[$i][$j]['idRow']);
        //         // unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
        //         // unset($fusiones_ant_id[$i][$j]['acciones']);
        //         $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
        //       }
        //       $queryfusion_anterior =  $CI->MarcasSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
        //       if (isset($queryfusion_anterior)){
        //         echo json_encode(['message' => 'Insertado Fusion anterior correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Fusion anterior']);
        //       }
        //     }
        //     /*Guardamos las fusiones actuales  */
        //     if (!empty($fusiones_act_id[0])) {
        //       for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j) {
        //         // unset($fusiones_act_id[$i][$j]['idRow']);
        //         // unset($fusiones_act_id[$i][$j]['propietario_id_name']);
        //         // unset($fusiones_act_id[$i][$j]['acciones']);
        //         $fusiones_act_id[$i][$j]['fusion_id'] = $fusion_id;
        //       }
        //       $queryfusion_actual = $CI->MarcasSolicitudes_model->insertFusionesAntAct($fusiones_act_id[$i]);
        //       if (isset($queryfusion_actual)){
        //         echo json_encode(['message' => 'Insertado Fusion actual correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Fusion actual']);
        //       }
        //     }
        //   }
        // }
        // if (!empty($camnom) && is_array($camnom)) {
        //   for ($i = 0; $i < count($camnom); ++$i) {
        //     /* INSERTO EL CA'MBIO DE NOMBRE Y RETORNO SU ID*/
        //     $fusion_id = $CI->MarcasSolicitudes_model->insertCamNom($camnom[$i]);
        //     /*Guardamos los 
        //     Cambios de Nombre anteriores  */
        //     if (!empty($camnom_ant_id[0])) {
        //       for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j) {
        //         // unset($camnom_ant_id[$i][$j]['idRow']);
        //         // unset($camnom_ant_id[$i][$j]['propietario_id_name']);
        //         // unset($camnom_ant_id[$i][$j]['acciones']);
        //         $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
        //       }
        //       $querycamnom_anterior = $CI->MarcasSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
        //       if (isset($querycamnom_anterior)){
        //         echo json_encode(['message' => 'Insertado Cambio de Nombre anterior correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Cambio de Nombre anterior']);
        //       }
        //     }
        //     /*Guardamos las Cambios de Nombre actuales  */
        //     if (!empty($camnom_act_id[0])) {
        //       for ($j = 0; $j < count($camnom_act_id[$i]); ++$j) {
        //         // unset($camnom_act_id[$i][$j]['idRow']);
        //         // unset($camnom_act_id[$i][$j]['propietario_id_name']);
        //         // unset($camnom_act_id[$i][$j]['acciones']);
        //         $camnom_act_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
        //       }
        //       $querycamnom_actual = $CI->MarcasSolicitudes_model->insertCamNomAntAct($camnom_act_id[$i]);
        //       if (isset($querycamnom_actual)){
        //         echo json_encode(['message' => 'Insertado Cambio de Nombre actual correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Cambio de Nombre actual']);
        //       }
        //     }
        //   }
        // }

        // if (!empty($camdom) && is_array($camdom)) {
        //   for ($i = 0; $i < count($camdom); ++$i) {
        //     /* INSERTO EL CAMBIO DE DOMICLIO Y RETORNO SU ID*/
        //     $camdom_id = $CI->MarcasSolicitudes_model->insertCamDom($camdom[$i]);
        //     // if (isset($camdom_id)) {
        //     //   echo json_encode(['message' => 'Cambio de Domicilio Insertado Correctamente']);
        //     // }else {
        //     //   echo json_encode(['message' => 'No se pudo insertar el Cambio de Domicilio']);  
        //     // } 
        //             /*Guardamos los Cambios de Domicilio anteriores  */
        //     if (!empty($camdom_ant_id[0])) {
        //       for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j) {
        //         // unset($camdom_ant_id[$i][$j]['idRow']);
        //         // unset($camdom_ant_id[$i][$j]['propietario_id_name']);
        //         // unset($camdom_ant_id[$i][$j]['acciones']);
        //         $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $camdom_id;
        //       }
        //       $querycamdom_anterior = $CI->MarcasSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
        //       if (isset($querycamdom_anterior)) {
        //         echo json_encode(['message' => 'Se inserto Cambio de Domicilio anterior']);
        //       } else {
        //         echo json_encode(['message' => 'Error al insertar Cambio de Domicilio anterior']);
        //       }
  
        //     }
        //     /*Guardamos las Cambios de Domicilio actuales  */
        //     if (!empty($camdom_act_id[0])) {
        //       for ($j = 0; $j < count($camdom_act_id[$i]); ++$j) {
        //         // unset($camdom_act_id[$i][$j]['idRow']);
        //         // unset($camdom_act_id[$i][$j]['propietario_id_name']);
        //         // unset($camdom_act_id[$i][$j]['acciones']);
        //         $camdom_act_id[$i][$j]['cambio_domicilio_id'] = $camdom_id;
        //       }
        //       $querycamdom_actual =  $CI->MarcasSolicitudes_model->insertCamDomAntAct($camdom_act_id[$i]);
        //       if ($querycamdom_actual) {
        //         echo json_encode(['message' => 'Se inserto el Cambio de Docilio Actual Correctamente']);
        //       } else {
        //         echo json_encode(['message' => 'Se inserto Correctamente el Cambio de Domicilio Anterior Correctamente']);
        //       }
        //     }
        //   }
        // } 

       
        // if (!empty($documentos) && is_array($documentos)) {
        //   $file = $_FILES;
        //   if (empty($file)) {
        //     $doc_arch = "No tiene";
        //   } else {
        //     $doc_arch = "Si tiene";
        //     for ($i = 0; $i < count($documentos); ++$i) {
        //       $fpath = FCPATH . 'uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name'];
        //       $path = site_url('uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name']);
        //       // Mover el archivo a la carpeta de destino
        //       if (move_uploaded_file($file['doc_archivo_' . $documentos[$i]['idRow']]['tmp_name'], $fpath)) {
        //         //Guardo el documento
        //         unset($documentos[$i]['idRow']);
        //         unset($documentos[$i]['acciones']);
        //         $documentos[$i]['path'] = $path;
        //         $CI->MarcasSolicitudes_model->insertDocumento($documentos[$i]);
        //       } else {
        //         echo json_encode(['message' => 'Invalid document', 'code' => '400']);
        //         //throw new Exception('Error al subir el archivo'); 
        //       }
        //     }
        //   }
        // }
        // if (!empty($facturas)) {
        //   $CI->MarcasSolicitudes_model->insertMarcaFactura($facturas);
        // }
      

        echo json_encode(['message' => 'succes' , 'code' => 200 , 'id' => $id]);

      } else {
        echo json_encode(['message' => 'danger' , 'code' => 500]);
      }
      
  
   
 
      
    } catch (\Throwable $th) {
      //Activate SYSLOG in the app
      echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
    }

  } else {
    echo json_encode(['message' => 'not data' , 'code' => 400]);
  }
}

?>