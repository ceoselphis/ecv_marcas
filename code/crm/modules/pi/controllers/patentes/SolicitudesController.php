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
        ];
        return $CI->load->view('patente/solicitudes/create', $data);
    }

    /**
     * Recive the data for create a new item
     */

      /*
       'tipo_registro_id', $('#tipo_registro_id').val());
       'client_id', $('#client_id').val());
       'oficina_id', $('#oficina_id').val());
       'staff_id', $('#staff_id').val());
       'pais_id', $('#pais_id').val());
       'titulo', $('#titulo').val());
       'resumen', $('#resumen').val());
       'inventores_id', $('#inventores_id').val());
       'solicitantes_id', $('#solicitantes_id').val());
       'clasificacion', $('#clasificacion').val());
       'ref_interna', $('#ref_interna').val());
       'ref_cliente', $('#ref_cliente').val());
       'carpeta', $('#carpeta').val());
       'libro', $('#libro').val());
       'tomo', $('#tomo').val());
       'folio', $('#folio').val());
       'estado_id', $('#estado_id').val());
       'solicitud', $('#solicitud').val());
       'fecha_solicitud', $('#fecha_solicitud').val());
       'registro', $('#registro').val());
       'fecha_registro', $('#fecha_registro').val());
       'certificado', $('#certificado').val());
       'fecha_certificado', $('#fecha_certificado').val());
       'pct_solicitud',$('#pct_solicitud').val());
       'pct_publicacion',$('#pct_publicacion').val())
       'pct_anualidad_desde',$('#pct_anualidad_desde').val())
       'pct_anualidad_hasta',$('#pct_anualidad_hasta').val())
       'comentarios', $('#comentarios').val());
        */
            /*
          `id` ,
  `tipo_registro_id`,
  `client_id`  ,
  `oficina_id` ) ,
  `staff_id` ,
  `pais_id` ,
  `titulo` ,
  `resumen` ,
  `clasificacion` ,
  `ref_interna` ,
  `ref_cliente` ,
  `carpeta` ,
  `libro` ,
  `tomo` ,
  `folio` ,
  `estado_id` ,
  `nro_solicitud` ,
  `fecha_solicitud` ,
  `nro_registro` ,
  `fecha_registro` ,
  `nro_certificado` ,
  `fecha_vencimiento_certificado` ,
  `pct_nro_solicitud` ,
  `pct_fecha_solicitud` ,
  `pct_nro_publicacion` ,
  `pct_fecha_publicacion` ,
  `is_pago_anual` tinyint(1) ,
  `anualidad_desde` ,
  `anualidad_hasta` ,
  `comentarios` ,
        */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $form = array();
        $data = $CI->input->post();
        //-------------- Step 1 ---------------
        $form['tipo_registro_id'] = $data['tipo_registro_id'];
        $form['client_id'] = $data['client_id'];
        $form['oficina_id'] = $data['oficina_id'];
        $form['staff_id']  = $data['staff_id'];
        // ------------- Step 2 ----------------
        $form['pais_id']  = $data['pais_id'];
        $form['titulo'] = $data['titulo'];
        $form['resumen'] = $data['resumen'];
        //--------------- Step 3 -----------------
        $form['clasificacion']     = $data['clasificacion'];
        $form['ref_interna']        = $data['ref_interna'];
        $form['ref_cliente']  = $data['ref_cliente'];
        $form['carpeta'] = $data['carpeta'];
        $form['libro']  = $data['libro'];
        $form['tomo']  = $data['tomo'];
        $form['folio'] = $data['folio'];
        //--------------- Step 4 ----------------------
        $form['estado_id'] = $data['estado_id'];
        $form['nro_solicitud']  = $data['solicitud'];
        $form['fecha_solicitud']  = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud'])->format('Y-m-d');
        $form['nro_registro']      = $data['registro'];
        $form['fecha_registro']   = DateTime::createFromFormat('d/m/Y', $data['fecha_registro'])->format('Y-m-d');
        $form['nro_certificado']   = $data['certificado'];
        $form['fecha_vencimiento_certificado'] = DateTime::createFromFormat('d/m/Y', $data['fecha_certificado'])->format('Y-m-d');
        $form['pct_nro_solicitud']    = $data['pct_solicitud'];
        $form['pct_fecha_solicitud']   = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_solicitud'])->format('Y-m-d');
        $form['pct_nro_publicacion']    = $data['pct_publicacion'];
        
        $form['pct_fecha_publicacion']     = DateTime::createFromFormat('d/m/Y', $data['pct_fecha_publicacion'])->format('Y-m-d');
        $form['is_pago_anual']     = true;
        $form['anualidad_desde']     = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_desde'])->format('Y-m-d');
        $form['anualidad_hasta']     = DateTime::createFromFormat('d/m/Y', $data['pct_anualidad_hasta'])->format('Y-m-d');
        //--------------- Step 5 ----------------------
        $form['comentarios']       = $data['comentarios'];
       
        
        try {
            $query = $CI->PatentesSolicitudes_model->insert($form);
            if(isset($query))
            {
              $id = $CI->PatentesSolicitudes_model->last_insert_id();
              echo json_encode(['message' => 'success','id' => $id, 'code' => '200']);
            // return redirect("pi/patentes/SolicitudesController/edit/{$id}");
            }else {
              echo json_encode(['error' => $query,'code' => '500']);
              //   return redirect(admin_url('pi/patentes/SolicitudesController/'));
            }
         //   return redirect("pi/patentes/SolicitudesController/edit/{$id}");
        } catch (\Throwable $th) {
            echo json_encode(['message' => $th->getMessage(),'code' => '500']);
        }
         
        //we validate the data
        //we set the rules
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
        
        // if($CI->form_validation->run() == FALSE)
        // {
        //     $fields = $CI->PatentesSolicitudes_model->getFillableFields();
        //     $inputs = array();
        //     $labels = array();
        //     foreach ($fields as $field) {
        //         if ($field['type'] == 'INT') {
        //             $inputs[] = array(
        //                 'name' => $field['name'],
        //                 'id'   => $field['name'],
        //                 'type' => 'range',
        //                 'class' => 'form-control'
        //             );
        //         } else {
        //             $inputs[] = array(
        //                 'name' => $field['name'],
        //                 'id'   => $field['name'],
        //                 'type' => 'text',
        //                 'class' => 'form-control'
        //             );
        //         }
        //     }
        //     $labels = ['Id', 'Nombre del anexo'];
        //     return $CI->load->view('patente/solicitudes/create', ['fields' => $inputs, 'labels' => $labels]);
        // }
        // else
        // {
        //     //we sent the data to the model
        //     $query = $CI->PatentesSolicitudes_model->insert($data);
        //     if(isset($query))
        //     {
        //         return redirect(admin_url('pi/patentes/SolicitudesController/'));
        //     }
        // }
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
              "fecha_registro" => $query[0]['fecha_registro'] ,
              "nro_certificado" => $query[0]['nro_certificado'] ,
              "fecha_vencimiento_certificado" => $query[0]['fecha_vencimiento_certificado'] ,
              "pct_nro_solicitud" => $query[0]['pct_nro_solicitud'] ,
              "pct_fecha_solicitud" => $query[0]['pct_fecha_solicitud'] ,
              "pct_nro_publicacion" => $query[0]['pct_nro_publicacion'] ,
              "pct_fecha_publicacion" => $query[0]['pct_fecha_publicacion'],
              "is_pago_anual" => $query[0]['is_pago_anual'] ,
              "anualidad_desde" => $query[0]['anualidad_desde'],
              "anualidad_hasta" => $query[0]['anualidad_hasta'] ,
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
