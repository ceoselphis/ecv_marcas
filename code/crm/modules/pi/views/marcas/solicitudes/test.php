<script>
    $(document).on('submit', "#solicitudfrm", function(e) {
        e.preventDefault();
        var formData = new FormData();
        console.log(" client_id ",$('#client_id').val() , " Staff_id  ",$('#staff_id').val() , " estado_id ", $('#estado_id').val() , " Fecha solicitud ",$('#fecha_solicitud').val()  ); 
        console.log(" LLegue a Enviar la Marca ");
        console.log(" Signo Archivo ",$('#signo_archivo').val());
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
        formData.append('clase_niza_id', localStorage.getItem("clase_niza"));
        formData.append('prioridad_id', localStorage.getItem("prioridad"));
        formData.append("publicacion_id", localStorage.getItem("publicacion"));
        var eventos = localStorage.getItem("eventos");
        eventos = eventos ? JSON.parse(eventos) : []; 
        console.log(" Eventos ",eventos);
        formData.append("eventos_id", JSON.stringify(eventos)); 
        formData.append("tareas_id", localStorage.getItem("tareas"));
        formData.append("cesiones_id", localStorage.getItem("cesiones"));
        formData.append("licencias_id", localStorage.getItem("licencias"));
        formData.append("fusiones_id", localStorage.getItem("fusiones"));
        formData.append("camnom_id", localStorage.getItem("camnom"));
        formData.append("camdom_id", localStorage.getItem("camdom"));
        formData.append("doc_id", localStorage.getItem("documentos"));
        var docu = JSON.parse(localStorage.getItem("documentos"));
        docu.forEach(function(item){
            formData.append("doc_archivo_" + item.idRow, $("#doc_archivo_" + item.idRow).get(0).files[0]);
        });
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
</script>

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
         if (!empty($claseNiza)) {
           for ($i = 0; $i < count($claseNiza); ++$i) {
             unset($claseNiza[$i]['idRow']);
             unset($claseNiza[$i]['clase_id_name']);
             unset($claseNiza[$i]['acciones']);
           }
         }
         $prioridades = json_decode($data['prioridad_id'], TRUE);
         for ($i = 0; $i < count($prioridades); ++$i) {
           unset($prioridades[$i]['idRow']);
           unset($prioridades[$i]['pais_name']);
           unset($prioridades[$i]['acciones']);
           $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
         }
         $publicacion = json_decode($data['publicacion_id'], TRUE);
         for ($i = 0; $i < count($publicacion); ++$i) {
           unset($publicacion[$i]['idRow']);
           unset($publicacion[$i]['tipo_pub_name']);
           unset($publicacion[$i]['boletin_name']);
           unset($publicacion[$i]['acciones']);
           $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
         }
         if (isset($data['eventos_id']) && !empty($data['eventos_id'])) {
             $eventos_json = trim($data['eventos_id']);
             $eventos_json = stripslashes($eventos_json); 
             $eventos_json = htmlspecialchars_decode($eventos_json); 
             $eventos = json_decode($eventos_json, true);
             if (json_last_error() !== JSON_ERROR_NONE) {
                 echo json_encode([
                     'error' => 'Error al decodificar JSON',
                     'json_error' => json_last_error_msg(),
                     'eventos_id_enviado' => $eventos_json 
                 ]);
                 die();
             }
             echo json_encode(['eventos_decodificado' => $eventos]);
         } else {
             echo json_encode(['error' => 'No se recibió eventos_id']);
         }  
       } else {
         echo json_encode(['message' => 'not data' , 'code' => '400']);
       }
     }
?>