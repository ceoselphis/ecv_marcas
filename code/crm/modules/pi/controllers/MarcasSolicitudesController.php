<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MarcasSolicitudesController extends AdminController
{
    protected $models = ['MarcasSolicitudes_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->library('pagination');
        //$query = $CI->MarcasSolicitudes_model->findAll();
        $data = [
            'Boletines'             => $CI->MarcasSolicitudes_model->findAllBoletines(),
            'Oficinas'              => $CI->MarcasSolicitudes_model->findAllOficinas(),
            'Clientes'              => $CI->MarcasSolicitudes_model->findAllClients(),
            'Responsables'           => $CI->MarcasSolicitudes_model->findAllStaff(),
            'Tipo de Solicitud'        => $CI->MarcasSolicitudes_model->findAllTipoSolicitud(),
            'Estado de Solicitud'   => $CI->MarcasSolicitudes_model->findAllEstadosSolicitudes(),
            'Pais'               => $CI->MarcasSolicitudes_model->findAllPaises(),
            'Tipos de Signo'        => $CI->MarcasSolicitudes_model->findAllTipoSigno(),
            'Clase Niza'         => $CI->MarcasSolicitudes_model->findAllClases(),
            'Tipo de Registro'         => $CI->MarcasSolicitudes_model->findAllTiposRegistros(),
            'Tipo de Evento'           => $CI->MarcasSolicitudes_model->findAllTipoEvento(),
            'contactos'           => $CI->MarcasSolicitudes_model->findAllContactos(),
            'propietarios'           => $CI->MarcasSolicitudes_model->findAllPropietarios2(),
            'tipo publicacion'           => $CI->MarcasSolicitudes_model->findAllTipoPublicacion(),
            //'query'                 => $query
        ];
        return $CI->load->view('marcas/solicitudes/index', ["marcas" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $this->LoadPage();
    }

    private function LoadPage(){
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        /* Se verifica si se viene de agregar una factura */
        $factId = null;
        $invoicesBD = array();
      if (!is_null($this->session->flashdata('factId'))) {
            $id = intval($this->session->flashdata('marca_id'));
            $factId = intval($this->session->flashdata('factId'));
            /* Busco la factura agregada  */
            $dataInv = $CI->MarcasSolicitudes_model->getInvoice($factId);
            $invoicesBD = array(
                'id_factura' => $factId,
                'num_factura' => $dataInv[0]['prefix'] . '-' . $dataInv[0]['number'],
                'date' =>  date_format(new DateTime($dataInv[0]['date']), 'd/m/Y'),
                'status' => format_invoice_status($dataInv[0]['status'], '', true)
            );
            //$CI->load->model('invoices_model');
            //$statusInv = $CI->invoices_model->get_statuses();
            //$a = format_invoice_status(1, '', false);
        }else {
            $id = intval($CI->MarcasSolicitudes_model->setCountPK());
        }
        $fields = $CI->MarcasSolicitudes_model->getFillableFields();
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
        $tarea = $CI->MarcasSolicitudes_model->findAllTareas();
        foreach ($tarea as $row) {
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->MarcasSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->MarcasSolicitudes_model->findAllEventos();
        $datos = array();
        foreach ($eventos as $row) {
            $datos[] = array(
                'id' => $row['id'],
                'tipo_evento' => $CI->MarcasSolicitudes_model->BuscarTipoEventos($row['tipo_evento_id']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
        }
        $cod_contador = 'M-' . ($CI->MarcasSolicitudes_model->CantidadSolicitudes() + 1);
        $labels = ['Nº Solicitud', 'Nº de Registro', 'Tipo Solicitud', 'Estado de solicitud', ''];
        $invoices = $CI->MarcasSolicitudes_model->findAllInvoices();
        return $CI->load->view('marcas/solicitudes/create', [
            'fields'                => $inputs,
            'labels'                => $labels,
            'oficinas'              => $CI->MarcasSolicitudes_model->findAllOficinas(),
            'clientes'              => $CI->MarcasSolicitudes_model->findAllClients(),
            'solicitantes'          => $CI->MarcasSolicitudes_model->findAllPropietarios(),
            'responsable'           => $CI->MarcasSolicitudes_model->findAllStaff(),
            'tipo_solicitud'        => $CI->MarcasSolicitudes_model->findAllTipoSolicitud(),
            'estados_solicitudes'   => $CI->MarcasSolicitudes_model->findAllEstadosSolicitudes(),
            'pais_id'               => $CI->MarcasSolicitudes_model->findAllPaises(),
            'tipos_signo_id'        => $CI->MarcasSolicitudes_model->findAllTipoSigno(),
            'clase_niza_id'         => $CI->MarcasSolicitudes_model->findAllClases(),
            'tipo_registro'         => $CI->MarcasSolicitudes_model->findAllTiposRegistros(),
            'tipo_evento'           => $CI->MarcasSolicitudes_model->findAllTipoEvento(),
            'id'                    => $id,
            'SolDoc'                => $CI->MarcasSolicitudes_model->findAllSolicitudesDocumento(),
            'eventos'               => $datos,
            'tipo_tareas'           => $CI->MarcasSolicitudes_model->findAllTipoTareas(),
            'tareas'                => $data,
            'boletines'             => $CI->MarcasSolicitudes_model->findAllBoletines(),
            'tipo_publicacion'      => $CI->MarcasSolicitudes_model->findAllTipoPublicacion(),
            'projects'              => $CI->MarcasSolicitudes_model->findAllProjects(),
            'invoices'              => (!empty($invoices)) ? $invoices[0] : '',
            'invoicesExtra'         => (!empty($invoices)) ? $invoices[1] : '',
            'cod_contador'          => $cod_contador,
            'invoicesBD'            => $invoicesBD
        ]);
    }

    public function addSolicitudesMarcas()
    {
        $CI = &get_instance();
        //$data = $CI->input->post();
        /*`INSERT INTO `tbl_marcas_solicitudes`(`id`, `tipo_registro_id`, `client_id`, `oficina_id`, `staff_id`, `signo_archivo`, `signonom`, `tipo_signo_id`, `tipo_solicitud_id`, `ref_interna`, `primer_uso`, `ref_cliente`, `prueba_uso`, `carpeta`, `libro`, `folio`, `tomo`, `comentarios`, `estado_id`, `solicitud`, `fecha_solicitud`, `registro`, `fecha_registro`, `certificado`, `fecha_certificado`, `fecha_vencimiento`)*/
        $insert = array(
            'tipo_registro_id' => '1',
            'cod_contador' => '',
            'client_id' => '1',
            'oficina_id' => '1',
            'staff_id' => '1',
            'signo_archivo' => '',
            'signonom' => '',
            'tipo_signo_id' => '1',
            'tipo_solicitud_id' => '1',
            'ref_interna' => '',
            'primer_uso' => '',
            'ref_cliente' => '',
            'prueba_uso' => '',
            'carpeta' => '',
            'libro' => '',
            'folio' => '',
            'tomo' => '',
            'comentarios' => '',
            'estado_id' => '1',
            'solicitud' => '',
            'fecha_solicitud' => '',
            'registro' => '',
            'fecha_registro' => '',
            'certificado' => '',
            'fecha_certificado' => '',
            'fecha_vencimiento' => '',
        );
        //echo json_encode($insert);
        $CI->load->model("MarcasSolicitudes_model");
        try {
            $cantidad = $CI->MarcasSolicitudes_model->CantidadSolicitudes();
            $insert['cod_contador'] = 'M-' . ($cantidad + 1);
            $query = $CI->MarcasSolicitudes_model->insert($insert);
            if (isset($query)) {
                //$cantidad = $CI->MarcasSolicitudes_model->CantidadSolicitudes();
                echo $cantidad;
            } else {
                echo "No hemos podido Insertar";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Recive the data for create a new item
     */
    private function ValidationsForm(){
        $CI = &get_instance();
        $CI->load->helper(['url','form']);
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
                'field' => 'signonom',
                'label' => 'Signo',
                'rules' => 'trim|min_length[2]|max_length[255]',
                'errors' => [
                    'min_length' => 'Signo demasiado corto',
                    'max_length' => 'Signo demasiado largo'
                ]
            ],
            [
                'field' => 'tipo_signo_id',
                'label' => 'Tipo Signo',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar el Tipo Signo'
                ]
            ],
            [
                'field' => 'tipo_solicitud_id',
                'label' => 'Tipo Solicitud',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar el Tipo Solicitud'
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
                'field' => 'fecha_solicitud',
                'label' => 'Fecha de Solicitud',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar la Fecha de Solicitud'
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

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        if($this->ValidationsForm() == FALSE)
        {
            echo json_encode(['code' => 201, 'error' => $CI->form_validation->error_array()]);
        }
        else{
            // Preparamos la data
            $form = $CI->input->post();
            /*Inicializamos los arreglos*/
            $solicitud = array();
            $paisSol = array();
            $claseNiza = array();
            $solicitantes = array();
            /*Seteamos el arreglo para la solicitud */

            $solicitud['id'] = $form['id'];
            $solicitud['cod_contador'] = $form['cod_contador'];
            $solicitud['tipo_registro_id'] = $form['tipo_registro_id'];
            $solicitud['client_id'] = $form['client_id'];
            $solicitud['oficina_id'] = $form['oficina_id'];
            $solicitud['staff_id'] = $form['staff_id'];
            $solicitud['signonom'] = $form['signonom'];
            $solicitud['signo_archivo_desc'] = $form['signo_archivo_desc'];
            $solicitud['tipo_signo_id'] = $form['tipo_signo_id'];
            $solicitud['tipo_solicitud_id'] = $form['tipo_solicitud_id'];
            $solicitud['ref_interna'] = $form['ref_interna'];
            $solicitud['primer_uso'] = empty($form['primer_uso']) || '' ? NULL : $this->turn_dates($form['primer_uso']);
            $solicitud['ref_cliente'] = $form['ref_cliente'];
            $solicitud['prueba_uso'] = empty($form['prueba_uso']) || '' ? NULL : $this->turn_dates($form['prueba_uso']);
            $solicitud['carpeta'] = $form['carpeta'];
            $solicitud['libro'] = $form['libro'];
            $solicitud['folio'] = $form['folio'];
            $solicitud['tomo'] = $form['tomo'];
            $solicitud['comentarios'] = $form['comentarios'];
            $solicitud['estado_id'] = $form['estado_id'];
            $solicitud['solicitud'] = $form['solicitud'];
            $solicitud['fecha_solicitud'] = empty($form['fecha_solicitud']) || '' ? NULL : $this->turn_dates($form['fecha_solicitud']);
            $solicitud['registro'] = $form['registro'];
            $solicitud['fecha_registro'] = empty($form['fecha_registro']) || '' ? NULL : $this->turn_dates($form['fecha_registro']);
            $solicitud['certificado']     = $form['certificado'];
            $solicitud['fecha_certificado'] = empty($form['fecha_certificado']) || '' ? NULL : $this->turn_dates($form['fecha_certificado']);
            $solicitud['fecha_vencimiento'] = empty($form['fecha_vencimiento']) || '' ? NULL : $this->turn_dates($form['fecha_vencimiento']);

            /*Seteamos el valor del signo*/
            $file = '';
            if (!empty($_FILES['signo_archivo']) || $form['signo_archivo'] != 'undefined') {
                $file = $_FILES['signo_archivo'];
            }
            if ($file != NULL) {
                //We fill the data of the         
                $fpath = FCPATH . 'uploads/marcas/signos/' . $form['id'] . '-' . $file['name'];
                $path = site_url('uploads/marcas/signos/' . $form['id'] . '-' . $file['name']);
                move_uploaded_file($file['tmp_name'], $fpath);
                $solicitud['signo_archivo'] = $path;
            }

            /*Seteamos el arreglo para los paises designados*/
            foreach (json_decode($form['pais_id'], TRUE) as $row) {
                $paisSol[] = [
                    'marcas_id' => $form['id'],
                    'pais_id'   => $row
                ];
            }
            /*Seteamos el arreglo para los solicitantes */
            foreach (json_decode($form['solicitantes_id'], TRUE) as $row) {
                $solicitantes[] = [
                    'marcas_id' => $form['id'],
                    'propietario_id' => $row
                ];
            }

            /*Seteamos el arreglo para las clases */
            $claseNiza = json_decode($form['clase_niza_id'], TRUE);
            for ($i = 0; $i < count($claseNiza); ++$i){
                unset($claseNiza[$i]['idRow']);
                unset($claseNiza[$i]['clase_id_name']);
                unset($claseNiza[$i]['acciones']);
            }

            /*Seteamos el arreglo para las prioridades */
            $prioridades = json_decode($form['prioridad_id'], TRUE);
            for ($i = 0; $i < count($prioridades); ++$i){
                unset($prioridades[$i]['idRow']);
                unset($prioridades[$i]['pais_name']);
                unset($prioridades[$i]['acciones']);
                $prioridades[$i]['fecha_prioridad'] = empty($prioridades[$i]['fecha_prioridad']) || '' ? NULL : $this->turn_dates($prioridades[$i]['fecha_prioridad']);
            }

            /*Seteamos el arreglo para las publicaciones */
            $publicacion = json_decode($form['publicacion_id'], TRUE);
            for ($i = 0; $i < count($publicacion); ++$i){
                unset($publicacion[$i]['idRow']);
                unset($publicacion[$i]['tipo_pub_name']);
                unset($publicacion[$i]['boletin_name']);
                unset($publicacion[$i]['acciones']);
                $publicacion[$i]['fecha'] = empty($publicacion[$i]['fecha']) || '' ? NULL : $this->turn_dates($publicacion[$i]['fecha']);
            }

            /*Seteamos el arreglo para los eventos */
            $eventos = json_decode($form['eventos_id'], TRUE);
            for ($i = 0; $i < count($eventos); ++$i){
                unset($eventos[$i]['idRow']);
                unset($eventos[$i]['tipo_evento_name']);
                unset($eventos[$i]['acciones']);
                $eventos[$i]['fecha'] = empty($eventos[$i]['fecha']) || '' ? NULL : $this->turn_dates($eventos[$i]['fecha']);
            }

            /*Seteamos el arreglo para las tareas */
            $tareas = json_decode($form['tareas_id'], TRUE);
            for ($i = 0; $i < count($tareas); ++$i){
                unset($tareas[$i]['idRow']);
                unset($tareas[$i]['project_id_name']);
                unset($tareas[$i]['tipo_tareas_id_name']);
                unset($tareas[$i]['acciones']);
                $tareas[$i]['fecha'] = empty($tareas[$i]['fecha']) || '' ? NULL : $this->turn_dates($tareas[$i]['fecha']);
            }

            /*Seteamos el arreglo para las Cesiones */
            $cesiones = json_decode($form['cesiones_id'], TRUE);
            $cesiones_ant_id = array();
            $cesiones_act_id = array();
            for ($i = 0; $i < count($cesiones); ++$i){
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
            $licencias = json_decode($form['licencias_id'], TRUE);
            $licencias_ant_id = array();
            $licencias_act_id = array();
            for ($i = 0; $i < count($licencias); ++$i){
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
            $fusiones = json_decode($form['fusiones_id'], TRUE);
            $fusiones_ant_id = array();
            $fusiones_act_id = array();
            for ($i = 0; $i < count($fusiones); ++$i){
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
            $camnom = json_decode($form['camnom_id'], TRUE);
            $camnom_ant_id = array();
            $camnom_act_id = array();
            for ($i = 0; $i < count($camnom); ++$i){
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
            $camdom = json_decode($form['camdom_id'], TRUE);
            $camdom_ant_id = array();
            $camdom_act_id = array();
            for ($i = 0; $i < count($camdom); ++$i){
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

            /*Seteamos el arreglo para los Documentos */
            $documentos = json_decode($form['doc_id'], TRUE);

            /*Seteamos el arreglo para los Documentos */
            $facturas = json_decode($form['facturas_id'], TRUE);
            for ($i = 0; $i < count($facturas); ++$i){
                unset($facturas[$i]['idRow']);
                unset($facturas[$i]['factNum']);
                unset($facturas[$i]['factFecha']);
                unset($facturas[$i]['factEstatus']);
                unset($facturas[$i]['acciones']);
                $facturas[$i]['staff_id'] = $_SESSION['staff_user_id'];
            }
            

            try {
                $CI->MarcasSolicitudes_model->insert($solicitud);
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
                if (!empty($cesiones)) {
                    for ($i = 0; $i < count($cesiones); ++$i){
                        /* INSERTO LA CESION Y RETORNO SU ID*/
                        $cesion_id = $CI->MarcasSolicitudes_model->insertCesiones($cesiones[$i]);

                        /*Guardamos las cesiones anteriores  */
                        if (!empty($cesiones_ant_id)) {
                            for ($j = 0; $j < count($cesiones_ant_id[$i]); ++$j){
                                unset($cesiones_ant_id[$i][$j]['idRow']);
                                unset($cesiones_ant_id[$i][$j]['cedente_id_name']);
                                unset($cesiones_ant_id[$i][$j]['acciones']);
                                $cesiones_ant_id[$i][$j]['cesion_id'] = $cesion_id;
                            }
                            $CI->MarcasSolicitudes_model->insertCesionesAntAct($cesiones_ant_id[$i]);
                        }
                        /*Guardamos las cesiones actuales  */
                        if (!empty($cesiones_act_id)) {
                            for ($j = 0; $j < count($cesiones_act_id[$i]); ++$j){
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
                    for ($i = 0; $i < count($licencias); ++$i){
                        /* INSERTO LA LICENCIA Y RETORNO SU ID*/
                        $licencia_id = $CI->MarcasSolicitudes_model->insertLicencias($licencias[$i]);

                        /*Guardamos las licencias anteriores  */
                        if (!empty($licencias_ant_id)) {
                            for ($j = 0; $j < count($licencias_ant_id[$i]); ++$j){
                                unset($licencias_ant_id[$i][$j]['idRow']);
                                unset($licencias_ant_id[$i][$j]['propietario_id_name']);
                                unset($licencias_ant_id[$i][$j]['acciones']);
                                $licencias_ant_id[$i][$j]['licencia_id'] = $licencia_id;
                            }
                            $CI->MarcasSolicitudes_model->insertLicenciasAntAct($licencias_ant_id[$i]);
                       }
                       /*Guardamos las licencias actuales  */
                       if (!empty($licencias_act_id)) {
                            for ($j = 0; $j < count($licencias_act_id[$i]); ++$j){
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
                    for ($i = 0; $i < count($fusiones); ++$i){
                        /* INSERTO LA FUSION Y RETORNO SU ID*/
                        $fusion_id = $CI->MarcasSolicitudes_model->insertFusion($fusiones[$i]);

                        /*Guardamos las fusiones anteriores  */
                        if (!empty($fusiones_ant_id)) {
                            for ($j = 0; $j < count($fusiones_ant_id[$i]); ++$j){
                                unset($fusiones_ant_id[$i][$j]['idRow']);
                                unset($fusiones_ant_id[$i][$j]['propietario_id_name']);
                                unset($fusiones_ant_id[$i][$j]['acciones']);
                                $fusiones_ant_id[$i][$j]['fusion_id'] = $fusion_id;
                            }
                            $CI->MarcasSolicitudes_model->insertFusionesAntAct($fusiones_ant_id[$i]);
                       }
                       /*Guardamos las fusiones actuales  */
                       if (!empty($fusiones_act_id)) {
                            for ($j = 0; $j < count($fusiones_act_id[$i]); ++$j){
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
                    for ($i = 0; $i < count($camnom); ++$i){
                        /* INSERTO EL CAMBIO DE NOMBRE Y RETORNO SU ID*/
                        $fusion_id = $CI->MarcasSolicitudes_model->insertCamNom($camnom[$i]);

                        /*Guardamos los Cambios de Nombre anteriores  */
                        if (!empty($camnom_ant_id)) {
                            for ($j = 0; $j < count($camnom_ant_id[$i]); ++$j){
                                unset($camnom_ant_id[$i][$j]['idRow']);
                                unset($camnom_ant_id[$i][$j]['propietario_id_name']);
                                unset($camnom_ant_id[$i][$j]['acciones']);
                                $camnom_ant_id[$i][$j]['cambio_nombre_id'] = $fusion_id;
                            }
                            $CI->MarcasSolicitudes_model->insertCamNomAntAct($camnom_ant_id[$i]);
                       }
                       /*Guardamos las Cambios de Nombre actuales  */
                       if (!empty($camnom_act_id)) {
                            for ($j = 0; $j < count($camnom_act_id[$i]); ++$j){
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
                    for ($i = 0; $i < count($camdom); ++$i){
                        /* INSERTO EL CAMBIO DE DOMICLIO Y RETORNO SU ID*/
                        $fusion_id = $CI->MarcasSolicitudes_model->insertCamDom($camdom[$i]);

                        /*Guardamos los Cambios de Domicilio anteriores  */
                        if (!empty($camdom_ant_id)) {
                            for ($j = 0; $j < count($camdom_ant_id[$i]); ++$j){
                                unset($camdom_ant_id[$i][$j]['idRow']);
                                unset($camdom_ant_id[$i][$j]['propietario_id_name']);
                                unset($camdom_ant_id[$i][$j]['acciones']);
                                $camdom_ant_id[$i][$j]['cambio_domicilio_id'] = $fusion_id;
                            }
                            $CI->MarcasSolicitudes_model->insertCamDomAntAct($camdom_ant_id[$i]);
                       }
                       /*Guardamos las Cambios de Domicilio actuales  */
                       if (!empty($camdom_act_id)) {
                            for ($j = 0; $j < count($camdom_act_id[$i]); ++$j){
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
                    if (empty($file)){
                        $doc_arch ="No tiene"; 
                    }else{
                        $doc_arch ="Si tiene"; 
                        for ($i = 0; $i < count($documentos); ++$i){
                            $fpath = FCPATH.'uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name'];
                            $path = site_url('uploads/marcas/documentos/' . $form['id'] . '-' . $file['doc_archivo_' . $documentos[$i]['idRow']]['name']);
                            // Mover el archivo a la carpeta de destino
                            if (move_uploaded_file($file['doc_archivo_'.$documentos[$i]['idRow']]['tmp_name'], $fpath)) {
                                //Guardo el documento
                                unset($documentos[$i]['idRow']);
                                unset($documentos[$i]['acciones']);
                                $documentos[$i]['path'] = $path;
                                $CI->MarcasSolicitudes_model->insertDocumento($documentos[$i]);
                            } else {
                                
                                //throw new Exception('Error al subir el archivo'); 
                            }
                    }
                    }
                }
                if (!empty($facturas)) {
                    $CI->MarcasSolicitudes_model->insertMarcaFactura($facturas);
                }

                echo json_encode(['code' => 200, 'error' => '']);
            } catch (\Throwable $th) {
                //Activate SYSLOG in the app
                echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
            }

        }
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
        $CI->load->model("MarcasSolicitudes_model");
        //We get the data
        $values = $CI->MarcasSolicitudes_model->find($id)[0];
        if(is_null($values) || empty($values))
        {
            return redirect(admin_url('pi/MarcasSolicitudesController/create'));
        }
        $pais_id = $CI->MarcasSolicitudes_model->findPaisesDesignados($id);
        $clase_id = $CI->MarcasSolicitudes_model->findClasesSolicitudes($id);
        $solicitantes = $CI->MarcasSolicitudes_model->findMarcasSolicitantes($id);
        $data = array();
        $tarea = $CI->MarcasSolicitudes_model->findAllTareas();
        foreach ($tarea as $row) {
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->MarcasSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->MarcasSolicitudes_model->findAllEventos();
        $datos = array();
        foreach ($eventos as $row) {
            $datos[] = array(
                'id' => $row['id'],
                'tipo_evento' => $CI->MarcasSolicitudes_model->BuscarTipoEventos($row['tipo_evento_id']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
        }
        $values['pais_id'] = $pais_id;
        $values['clase_niza_id'] = $clase_id;
        $values['solicitantes_id'] = $solicitantes;
        $values['fecha_certificado'] = $this->flip_dates($values['fecha_certificado']);
        $values['fecha_vencimiento'] = $this->flip_dates($values['fecha_vencimiento']);
        $values['fecha_registro'] = is_null($values['fecha_registro']) ? '' : $this->flip_dates($values['fecha_registro']);
        $values['fecha_solicitud'] = is_null($values['fecha_solicitud']) ? '' : $this->flip_dates($values['fecha_solicitud']);
        $values['prueba_uso'] = is_null($values['prueba_uso']) ? '' : $this->flip_dates($values['prueba_uso']);
        $values['primer_uso'] = is_null($values['primer_uso']) ? '' : $this->flip_dates($values['primer_uso']);
        $values['projects'] = $CI->MarcasSolicitudes_model->findProjectByMarca($id);
        return $CI->load->view('marcas/solicitudes/edit', [
            'values'                => $values,
            'oficinas'              => $CI->MarcasSolicitudes_model->findAllOficinas(),
            'clientes'              => $CI->MarcasSolicitudes_model->findAllClients(),
            'solicitantes'          => $CI->MarcasSolicitudes_model->findAllPropietarios(),
            'responsable'           => $CI->MarcasSolicitudes_model->findAllStaff(),
            'tipo_solicitud'        => $CI->MarcasSolicitudes_model->findAllTipoSolicitud(),
            'estados_solicitudes'   => $CI->MarcasSolicitudes_model->findAllEstadosSolicitudes(),
            'pais_id'               => $CI->MarcasSolicitudes_model->findAllPaises(),
            'tipos_signo_id'        => $CI->MarcasSolicitudes_model->findAllTipoSigno(),
            'clase_niza_id'         => $CI->MarcasSolicitudes_model->findAllClases(),
            'tipo_registro'         => $CI->MarcasSolicitudes_model->findAllTiposRegistros(),
            'tipo_evento'           => $CI->MarcasSolicitudes_model->findAllTipoEvento(),
            'boletines'             => $CI->MarcasSolicitudes_model->findAllBoletines(),
            'id'                    => $id,
            'SolDoc'                => $CI->MarcasSolicitudes_model->findAllSolicitudesDocumento(),
            'eventos'               => $datos,
            'tipo_tareas'           => $CI->MarcasSolicitudes_model->findAllTipoTareas(),
            'tareas'                => $data,
            'projects'              => $CI->MarcasSolicitudes_model->findAllProjects(),
            'tipo_publicacion'      => $CI->MarcasSolicitudes_model->findAllTipoPublicacion(),
        ]);
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        // Preparamos la data
        $form = $CI->input->post();
        /*Inicializamos los arreglos*/
        $solicitud = array();
        $paisSol = array();
        $claseNiza = array();
        $solicitantes = array();
        /*Seteamos el arreglo para la solicitud */

        $solicitud['id'] = $form['id'];
        $solicitud['tipo_registro_id'] = $form['tipo_registro_id'];
        $solicitud['client_id'] = $form['client_id'];
        $solicitud['oficina_id'] = $form['oficina_id'];
        $solicitud['staff_id'] = $form['staff_id'];
        $solicitud['signonom'] = $form['signonom'];
        $solicitud['tipo_signo_id'] = $form['tipo_signo_id'];
        $solicitud['tipo_solicitud_id'] = $form['tipo_solicitud_id'];
        $solicitud['ref_interna'] = $form['ref_interna'];
        $solicitud['primer_uso'] = $this->turn_dates($form['primer_uso']);
        $solicitud['ref_cliente'] = $form['ref_cliente'];
        $solicitud['prueba_uso'] = $this->turn_dates($form['prueba_uso']);
        $solicitud['carpeta'] = $form['carpeta'];
        $solicitud['libro'] = $form['libro'];
        $solicitud['folio'] = $form['folio'];
        $solicitud['tomo'] = $form['tomo'];
        $solicitud['comentarios'] = $form['comentarios'];
        $solicitud['estado_id'] = $form['estado_id'];
        $solicitud['solicitud'] = $form['solicitud'];
        $solicitud['fecha_solicitud'] = $this->turn_dates($form['fecha_solicitud']);
        $solicitud['registro'] = $form['registro'];
        $solicitud['fecha_registro'] = $this->turn_dates($form['fecha_registro']);
        $solicitud['certificado']     = $form['certificado'];
        $solicitud['fecha_certificado'] = $this->turn_dates($form['fecha_certificado']);
        $solicitud['fecha_vencimiento']    = $this->turn_dates($form['fecha_vencimiento']);

        /*Seteamos el valor del signo*/
        $file = '';
        if (!empty($_FILES['signo_archivo']) || $form['signo_archivo'] != 'undefined') {
            $file = $_FILES['signo_archivo'];
        }
        if ($file != NULL) {
            //We fill the data of the         
            $fpath = FCPATH . 'uploads/marcas/' . $form['id'] . '-' . $file['name'];
            $path = site_url('uploads/marcas/signos/' . $form['id'] . '-' . $file['name']);
            move_uploaded_file($file['tmp_name'], $fpath);
            $solicitud['signo_archivo'] = $path;
        }
        $isset = $CI->MarcasSolicitudes_model->deletePaisesDesignadosBySolicitud($id);
        if ($isset) {
            /*Seteamos el arreglo para los paises designados*/
            foreach (json_decode($form['pais_id'], TRUE) as $row) {
                $paisSol[] = [
                    'marcas_id' => $id,
                    'pais_id'   => $row
                ];
            }
        }
        unset($isset);
        $isset = $CI->MarcasSolicitudes_model->deleteClasesNizaBySolicitud($id);
        if ($isset) {
            /*Seteamos el arreglo para la clase niza*/
            foreach (json_decode($form['clase_niza'], TRUE) as  $row) {
                $claseNiza[] = array(
                    'marcas_id' => $id,
                    'clase_id' => $row
                );
            }
        }

        unset($isset);
        $isset = $CI->MarcasSolicitudes_model->deleteMarcasSolicitantesBySolicitud($id);
        if ($isset) {
            /*Seteamos el arreglo para los solicitantes */
            foreach (json_decode($form['solicitantes_id'], TRUE) as $row) {
                $solicitantes[] = [
                    'marcas_id' => $id,
                    'propietario_id' => $row
                ];
            }
        }
        try {
            $CI->MarcasSolicitudes_model->update($id, $solicitud);
            $CI->MarcasSolicitudes_model->insertPaisesDesignados($paisSol);
            $CI->MarcasSolicitudes_model->insertSolicitudesClases($claseNiza);
            $CI->MarcasSolicitudes_model->insertMarcasSolicitantes($solicitantes);
            echo  json_encode(['code' => 200, 'message' => 'Cambios realizados exitosamente']);
        } catch (\Throwable $th) {
            //Activate SYSLOG in the app
            echo json_encode(['code' => 500, 'error' => $th->getMessage()]);
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudes_model->delete($id);
        return redirect('pi/MarcasSolicitudesController/');
    }

    public function search()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('pagination');
        //We send the data
        $params = $CI->input->post('data');
        $query = json_decode($params);
        $q = array();
        $result = array();
        foreach ($query as $row) {
            if ($row != '[]') {
                switch ($row) {
                    case 'pais_id':
                        foreach (json_decode($row['pais_id']) as $i) {
                            $q[] = [
                                'h.pais_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'boletin_id':
                        foreach ($row['boletin_id'] as $i) {
                            $q[] = [
                                'b.boletin_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 1);
                        break;
                    case 'client_id':
                        foreach ($row['client_id'] as $i) {
                            $q[] = [
                                'a.client_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 4);
                        break;
                    case 'oficina_id':
                        foreach ($row['oficina_id'] as $i) {
                            $q[] = [
                                'a.oficina_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 8);
                        break;
                    case 'staff_id':
                        foreach ($row['staff_id'] as $i) {
                            $q[] = [
                                'a.staff_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'tip_sol_id':
                        foreach ($row['tip_sol_id'] as $i) {
                            $q[] = [
                                'a.tipo_solicitud_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q,);
                        break;
                    case 'est_sol_id':
                        foreach ($row['a.estado_id'] as $i) {
                            $q[] = [
                                'a.estado_id' => $i
                            ];
                        }

                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 9);
                        break;
                    case 'tip_signo_id':
                        foreach ($row['tip_signo_id'] as $i) {
                            $q[] = [
                                'a.tipo_signo_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 6);
                        break;
                }
            }
        }
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

    public function filterSearch()
    {
        $CI = &get_instance();
        $CI->load->model('MarcasSolicitudes_model');
        $form = json_decode($CI->input->post('data'), TRUE);
        $result = array();
        $query = array();
        $url = admin_url('pi/MarcasSolicitudesController/edit/');
        foreach ($form as $key => $value) {
            if ($value === '') {
                unset($form[$key]);
            }
        }
        if (empty($form)) {
            $query = $CI->MarcasSolicitudes_model->findAll();
            if (!empty($query)) {
                foreach ($query as $row) {
                    $result[] =  [
                        'cod_contador' => $row['cod_contador'],
                        'tipo' =>  $row['tipo_registro'],
                        'propietario' => $row['nombre_propietario'],
                        'nombre' => $row['signonom'],
                        'clase' =>  $row['clase_niza'],
                        'estado' => $row['estado_expediente'],
                        'solicitud' => $row['solicitud'],
                        'fecha_solicitud' => is_null($row['fecha_solicitud']) ? '' : date('d/m/Y', strtotime($row['fecha_solicitud'])),
                        'registro' => $row['registro'],
                        'certificado' => $row['certificado'],
                        'vigencia' => is_null($row['fecha_vencimiento']) ? '' : date('d/m/Y', strtotime($row['fecha_vencimiento'])),
                        'pais' => $row['pais_nom'],
                        'acciones' => "<a class='btn btn-primary' href='{$url}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a>",
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
            } else {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        } else {
            //$query = $CI->MarcasSolicitudes_model->searchWhere($form);
            $query = $CI->MarcasSolicitudes_model->searchWhere2($form);
            if (!empty($query)) {
                foreach ($query as $row) {
                    $result[] = [
                        'cod_contador' => $row['cod_contador'],
                        'tipo' => $row['tipo_registro'],
                        'propietario' => $row['nombre_propietario'],
                        'nombre' => $row['marca'],
                        'clase' => $row['clase_niza'],
                        'estado' => $row['solicitud'],
                        'solicitud' => $row['estado_expediente'],
                        'fecha_solicitud' => date('d/m/Y', strtotime($row['fecha_solicitud'])),
                        'registro' => $row['registro'],
                        'certificado' => $row['certificado'],
                        'vigencia' => date('d/m/Y', strtotime($row['fecha_vencimiento'])),
                        'pais' => $row['pais_nom'],
                        'acciones' => "<a class='btn btn-primary' href='{$url}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a>",
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
            } else {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        }
    }

    public function insertClases()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        $form = $CI->input->post();
        $params = [
            'marcas_id' => $form['marcas_id'],
            'clase_id'  => $form['clase_id'],
            'descripcion' => $form['clase_descripcion']
        ];
        $query = $CI->MarcasSolicitudes_model->insertMarcasClases($params);
        if ($query) {
            echo json_encode(['code' => 200, 'message' => 'success']);
        } else {
            echo json_encode(['code' => 500, 'message' => 'error']);
        }
    }

    public function getClasesMarcas($marcas_id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        $query = $CI->MarcasSolicitudes_model->getMarcasClases($marcas_id);
        $result = array();
        $acciones = "<div class='col-md-6' style='padding-left: 0px;'>";
        $acciones .= "<a id='#idclase#'class='editarClase btn btn-light link-style' style= 'background-color: white;padding-top: 0px;'><i class='fas fa-edit' style='top: 5px;position: unset;'></i>Editar</a></div>";
        $acciones .= "<div class='col-md-6' style='padding-left: 10px;'>";
        $acciones .= "<a id='#idclase#' class='borrarClase btn btn-light link-style' style='background-color: white;padding-top: 0px;'><i class='fas fa-trash' style='top: 5px;position: unset;'></i>Borrar</a></div>";

        if (!empty($query)) {
            foreach ($query as $row) {
                $auxAcc = $acciones;
                $result[] = [
                    'id'            => $row['id'],
                    'clase'         => $row['nombre'],
                    'descripcion'   => $row['descripcion'],
                    'clase_id'   => $row['clase_id'],
                    'acciones' => str_replace('#idclase#', $row['id'], $auxAcc)
                ];
            }
        }
        echo json_encode(['code' => 200, 'data' => $result]);
    }

    public function marcasInvoice($marcas_id = null)
    {
        $CI = &get_instance();
        return is_null($marcas_id) ? null : redirect(admin_url("invoices/invoice?marca_id={$marcas_id}"));
    }

    public function getInvoicesByMarca($marcaid = null)
    {
        $CI = &get_instance();
        $CI->load->model('MarcasSolicitudes_model');
        $query = $CI->MarcasSolicitudes_model->getInvoicesByMarca($marcaid);
        $response = array();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $invoice = $CI->MarcasSolicitudes_model->getInvoice($value['facturas_id']);
                $row = array();
                $row['factura'] = $invoice[0]['id'];
                $row['fecha']   = date('d/m/Y', strtotime($invoice[0]['date']));
                $row['estatus'] = format_invoice_status($invoice[0]['status'], '', true);
                $acciones = "<div class='col-md-6' style='padding: 0;'>";
                $acciones .= "<a href= '".admin_url("invoices/invoice/".$invoice[0]['id'])."'class='btn btn-light' style='padding: 0;'>";
                $acciones .= "<i class='fas fa-edit' style='margin: 0;'></i>Editar</a></div>";
                $acciones .= "<div class='col-md-6' style='padding: 0;'>";
                $acciones .= "<a class='factura-delete btn btn-light' style= 'background-color: white;padding: 0;'>";
                $acciones .= "<i class='fas fa-trash' style='margin: 0;'></i>Borrar</a></div>";
                
                $row['acciones'] = $acciones;
                //$row['acciones'] = '<a href="'.admin_url("invoices/invoice/".$invoice[0]['id']).'" class="btn btn-primary"><i class="fas fa-edit"></i> Editar </a>';
                $response[] = $row;
            }
            echo json_encode(['status' => 200, "data" => $response]);
        }
    }
}
