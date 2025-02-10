<?php tengo un error cuando envio la informacio en el backend  
  public function store()
  {
    $CI = &get_instance();
    $CI->load->model("MarcasSolicitudes_model");
    $CI->load->helper(['url', 'form']);
    $CI->load->library('form_validation');
    $form = array();
    $data = $CI->input->post();
    if (!empty($data)){
      $form['id'] = $data['id'];
      $form['cod_contador'] = $data['cod_contador'];
      $form['tipo_registro_id'] = $data['tipo_registro_id'];
      $form['client_id'] = $data['client_id'];
      $form['oficina_id'] = $data['oficina_id'];
      $form['staff_id'] = $data['staff_id'];
      $form['signonom'] = $data['signonom'];
      $form['signo_archivo_desc'] = $data['signo_archivo_desc'];
      $form['tipo_signo_id'] = $data['tipo_signo_id'];
      $form['tipo_solicitud_id'] = $data['tipo_solicitud_id'];
      $form['ref_interna'] = $data['ref_interna'];
      $form['primer_uso'] = empty($data['primer_uso']) || '' ? NULL : $this->turn_dates($data['primer_uso']);
      $form['ref_cliente'] = $data['ref_cliente'];
      $form['prueba_uso'] = empty($data['prueba_uso']) || '' ? NULL : $this->turn_dates($data['prueba_uso']);
      $form['carpeta'] = $data['carpeta'];
      $form['libro'] = $data['libro'];
      $form['folio'] = $data['folio'];
      $form['tomo'] = $data['tomo'];
      $form['comentarios'] = $data['comentarios'];
      $form['estado_id'] = $data['estado_id'];
      $form['solicitud'] = $data['solicitud'];
      $form['fecha_solicitud'] = empty($data['fecha_solicitud']) || '' ? NULL : $this->turn_dates($data['fecha_solicitud']);
      $form['registro'] = $data['registro'];
      $form['fecha_registro'] = empty($data['fecha_registro']) || '' ? NULL : $this->turn_dates($data['fecha_registro']);
      $form['certificado']     = $data['certificado'];
      $form['fecha_certificado'] = empty($data['fecha_certificado']) || '' ? NULL : $this->turn_dates($data['fecha_certificado']);
      $form['fecha_vencimiento'] = empty($data['fecha_vencimiento']) || '' ? NULL : $this->turn_dates($data['fecha_vencimiento']);
      $file = '';
      if (empty($_FILES['signo_archivo']) ) {
      } else {
        $file = $_FILES['signo_archivo'];
      }
      if ($file != NULL) {    
        $fpath = FCPATH . 'uploads/marcas/signos/' . $data['id'] . '-' . $file['name'];
        $path = site_url('uploads/marcas/signos/' . $data['id'] . '-' . $file['name']);
        move_uploaded_file($file['tmp_name'], $fpath);
        $form['signo_archivo'] = $path;
      }
      foreach (json_decode($data['pais_id'], TRUE) as $row) {
        $paisSol[] = [
          'marcas_id' => $data['id'],
          'pais_id'   => $row
        ];
      }
      foreach (json_decode($data['solicitantes_id'], TRUE) as $row) {
        $solicitantes[] = [
          'marcas_id' => $data['id'],
          'propietario_id' => $row
        ];
      }
      $claseNiza = json_decode($data['clase_niza_id'], TRUE);
      $claseNiza = is_array($claseNiza) ? $claseNiza : [];
      $prioridades = json_decode($data['prioridad_id'], TRUE);
      $prioridades = is_array($prioridades) ? $prioridades : [];

     
      $publicacion = json_decode($data['publicacion_id'], TRUE);
      $publicacion = is_array($publicacion) ? $publicacion : [];

      
      $eventos = json_decode($data['eventos_id']);
      $eventos = is_array($eventos) ? $eventos : [];
      $tareas = json_decode($data['tareas_id'], TRUE);
      if (is_array($tareas)) {
        for ($i = 0; $i < count($tareas); ++$i) {
          $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
        }
      } else {
        $tareas = [];
      }



      $renovaciones = json_decode($data['renovaciones_id'], TRUE);
      if (is_array($renovaciones)){

        for ($i = 0; $i < count($renovaciones); ++$i) {
          $renovaciones[$i]['vegencia_desde'] = empty($renovaciones[$i]['vegencia_desde']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['vegencia_desde']);
          $renovaciones[$i]['vegencia_hasta'] = empty($renovaciones[$i]['vegencia_hasta']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['vegencia_hasta']);
          $renovaciones[$i]['fecha_solicitud'] = empty($renovaciones[$i]['fecha_solicitud']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['fecha_solicitud']);
          $renovaciones[$i]['fecha_resolucion'] = empty($renovaciones[$i]['fecha_resolucion']) || '' ? NULL : $this->turn_dates($renovaciones[$i]['fecha_resolucion']);
        }
      } else {
        $renovaciones = [];
      }



      /*Seteamos el arreglo para las Cesiones */
      $cesiones = json_decode($data['cesiones_id'], TRUE);
      $cesiones_ant_id = array();
      $cesiones_act_id = array();
      if (is_array($cesiones)) {
        for ($i = 0; $i < count($cesiones); ++$i) {
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
      $licencias = json_decode($data['licencias_id'], TRUE);
      $licencias_ant_id = array();
      $licencias_act_id = array();
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
      $camnom = json_decode($data['camnom_id'], TRUE);
      $camnom_ant_id = array();
      $camnom_act_id = array();
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
      } else {
        $camdom = [];
      }

      $documentos = json_decode($data['doc_id'], TRUE);
      $documentos = is_array($documentos) ? $documentos : [];
      $facturas = json_decode($data['facturas_id'], TRUE);
      if (is_array($facturas)) { 
        for ($i = 0; $i < count($facturas); ++$i) {
          $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
        }
      } else {
        $facturas = [];
      }
      try {
        $CI->MarcasSolicitudes_model->insert($form);
        $id = $data['id'];
        if (!empty($paisSol)) {
          $CI->MarcasSolicitudes_model->insertPaisesDesignados($paisSol);
        }
        if (!empty($claseNiza)) {
          $CI->MarcasSolicitudes_model->insertSolicitudesClases($claseNiza);
        }
        if (!empty($prioridades)) {
          $CI->MarcasSolicitudes_model->insertPrioridades($prioridades);
        }
        if (!empty($solicitantes)) {
          $CI->MarcasSolicitudes_model->insertMarcasSolicitantes($solicitantes);
        }
        if (!empty($publicacion)) {
          $CI->MarcasSolicitudes_model->insertPublicaciones($publicacion);
        }
        if (!empty($eventos)) {
          $CI->MarcasSolicitudes_model->insertEventos($eventos);
        }
        if (!empty($tareas)) {
          $CI->MarcasSolicitudes_model->insertTareas($tareas);
        }
        if (!empty($renovaciones)) {
          $CI->MarcasSolicitudes_model->insertRenovaciones($renovaciones);
        }
        if (!empty($cesiones)) {
          for ($i = 0; $i < count($cesiones); ++$i) {
            $cesion_id = $CI->MarcasSolicitudes_model->insertCesiones($cesiones[$i]);
            if (!empty($cesiones_ant_id)) {
              for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j) {
                unset($cesiones_ant_id[$i][$j]['idRow']);
                unset($cesiones_ant_id[$i][$j]['cedente_id_name']);
                unset($cesiones_ant_id[$i][$j]['acciones']);
                $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->MarcasSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
            }
            if (!empty($cesiones_act_id)) {
              for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j) {
                unset($cesiones_act_id[$i][$j]['idRow']);
                unset($cesiones_act_id[$i][$j]['cedente_id_name']);
                unset($cesiones_act_id[$i][$j]['acciones']);
                $cesiones_act_id[$i][$j]['cesion_id'] = $cesion_id;
              }
              $CI->MarcasSolicitudes_model->insertCesionesAntAct($cesiones_act_id[$i]);
            }
          }
        }
        if (!empty($licencias)) {
          for ($i = 0; $i < count($licencias); ++$i) {
            $licencia_id = $CI->MarcasSolicitudes_model->insertLicencias($licencias[$i]);
            if (!empty($licencias_ant_id)) {
              for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j) {
                unset($licencias_ant_id[$i][$j]['idRow']);
                unset($licencias_ant_id[$i][$j]['propietario_id_name']);
                unset($licencias_ant_id[$i][$j]['acciones']);
                $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->MarcasSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
            }
            if (!empty($licencias_act_id)) {
              for ($j = 0; $j < count($licencias_act_id[$i]); ++$j) {
                unset($licencias_act_id[$i][$j]['idRow']);
                unset($licencias_act_id[$i][$j]['propietario_id_name']);
                unset($licencias_act_id[$i][$j]['acciones']);
                $licencias_act_id[$i][$j]['licencia_id'] = $licencia_id;
              }
              $CI->MarcasSolicitudes_model->insertLicenciasAntAct($licencias_act_id[$i]);
            }
          }
        }
        if (!empty($fusiones)) {
          for ($i = 0; $i < count($fusiones); ++$i) {
            $fusion_id = $CI->MarcasSolicitudes_model->insertFusion($fusiones[$i]);
            if (!empty($fusiones_ant_id)) {
              for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j) {
                unset($fusiones_ant_id[$i][$j]['idRow']);
                unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
                unset($fusiones_ant_id[$i][$j]['acciones']);
                $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
            }
            if (!empty($fusiones_act_id)) {
              for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j) {
                unset($fusiones_act_id[$i][$j]['idRow']);
                unset($fusiones_act_id[$i][$j]['propietario_id_name']);
                unset($fusiones_act_id[$i][$j]['acciones']);
                $fusiones_act_id[$i][$j]['fusion_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertFusionesAntAct($fusiones_act_id[$i]);
            }
          }
        }
        if (!empty($camnom)) {
          for ($i = 0; $i < count($camnom); ++$i) {
            $fusion_id = $CI->MarcasSolicitudes_model->insertCamNom($camnom[$i]);
            if (!empty($camnom_ant_id)) {
              for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j) {
                unset($camnom_ant_id[$i][$j]['idRow']);
                unset($camnom_ant_id[$i][$j]['propietario_id_name']);
                unset($camnom_ant_id[$i][$j]['acciones']);
                $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
            }
            if (!empty($camnom_act_id)) {
              for ($j = 0; $j < count($camnom_act_id[$i]); ++$j) {
                unset($camnom_act_id[$i][$j]['idRow']);
                unset($camnom_act_id[$i][$j]['propietario_id_name']);
                unset($camnom_act_id[$i][$j]['acciones']);
                $camnom_act_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertCamNomAntAct($camnom_act_id[$i]);
            }
          }
        }
        if (!empty($camdom)) {
          for ($i = 0; $i < count($camdom); ++$i) {
            $fusion_id = $CI->MarcasSolicitudes_model->insertCamDom($camdom[$i]);
            if (!empty($camdom_ant_id)) {
              for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j) {
                unset($camdom_ant_id[$i][$j]['idRow']);
                unset($camdom_ant_id[$i][$j]['propietario_id_name']);
                unset($camdom_ant_id[$i][$j]['acciones']);
                $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
            }
            if (!empty($camdom_act_id)) {
              for ($j = 0; $j < count($camdom_act_id[$i]); ++$j) {
                unset($camdom_act_id[$i][$j]['idRow']);
                unset($camdom_act_id[$i][$j]['propietario_id_name']);
                unset($camdom_act_id[$i][$j]['acciones']);
                $camdom_act_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
              }
              $CI->MarcasSolicitudes_model->insertCamDomAntAct($camdom_act_id[$i]);
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
              if (move_uploaded_file($file['doc_archivo_' . $documentos[$i]['idRow']]['tmp_name'], $fpath)) {
                unset($documentos[$i]['idRow']);
                unset($documentos[$i]['acciones']);
                $documentos[$i]['path'] = $path;
                $CI->MarcasSolicitudes_model->insertDocumento($documentos[$i]);
              } else {
                echo json_encode(['message' => 'Invalid document', 'code' => '400']);
              }
            }
          }
        }
        if (!empty($facturas)) {
          $CI->MarcasSolicitudes_model->insertMarcaFactura($facturas);
        }
        echo json_encode(['message' => 'succes', 'code' => 200, 'id' => $id]);
      } catch (\Throwable $th) {
        echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
      }

    } else {
      echo json_encode(['message' => 'not data' , 'code' => '400']);
    }
  } y aqui esta la informacion que viene del fronentd  $(document).on('submit', "#solicitudfrm", function(e) {
        e.preventDefault();
        var formData = new FormData();
                formData.append('csrf_token_name', $("input[name=csrf_token_name]").val());
                formData.append('id', $("input[name=id]").val());
                formData.append('cod_contador', $('#cod_contador').val());
                formData.append('tipo_registro_id', $('#tipo_registro_id').val());
                formData.append('client_id', $('#client_id').val());
                formData.append('oficina_id', $('#oficina_id').val());
                formData.append('staff_id', $('#staff_id').val());
                pais_id = JSON.stringify($('#pais_id').val());
                formData.append('pais_id', pais_id);
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
                formData.append("cesiones_id", validarCesiones(localStorage.getItem("cesiones") === null ? [] : localStorage.getItem("cesiones") ) );
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
                formData.append("facturas_id", localStorage.getItem("facturas"));
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
                        <?php if (ENVIRONMENT != 'production') { ?>
                            alert(response);
                        <?php } else { ?>
                            alert('ha ocurrido un error');
                        <?php } ?>
                    }
                });

    });