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
            'tipo publicacion'           => $CI->MarcasSolicitudes_model->findAllTipoPublicacion2(),
            //'query'                 => $query
        ];
        return $CI->load->view('marcas/solicitudes/index', ["marcas" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $id = intval($CI->MarcasSolicitudes_model->setCountPK());
        $fields = $CI->MarcasSolicitudes_model->getFillableFields();
        $inputs = array();
        $labels = array();
        foreach ($fields as $field) {
            if ($field['type'] == 'INT') {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            } else {
                $inputs[] = array(
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
            'invoices'              => $CI->MarcasSolicitudes_model->findAllInvoices(),
            'contador'              => $id
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

    public function store()
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
        $solicitud['cod_contador'] = $form['cod_contador'];
        $solicitud['tipo_registro_id'] = $form['tipo_registro_id'];
        $solicitud['client_id'] = $form['client_id'];
        $solicitud['oficina_id'] = $form['oficina_id'];
        $solicitud['staff_id'] = $form['staff_id'];
        $solicitud['signonom'] = $form['signonom'];
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
            $fpath = FCPATH . 'uploads/marcas/' . $form['id'] . '-' . $file['name'];
            $path = site_url('uploads/marcas/signos/' . $form['id'] . '-' . $file['name']);
            move_uploaded_file($file['tmp_name'], $fpath);
            $solicitud['signo_archivo'] = $path;
        }

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
        /*Seteamos el arreglo para los paises designados*/
        foreach (json_decode($form['pais_id'], TRUE) as $row) {
            $paisSol[] = [
                'marcas_id' => $form['id'],
                'pais_id'   => $row
            ];
        }
        $claseNiza = json_decode($form['clase_niza_id'], TRUE);
        /*Seteamos el arreglo para los solicitantes */
        foreach (json_decode($form['solicitantes_id'], TRUE) as $row) {
            $solicitantes[] = [
                'marcas_id' => $form['id'],
                'propietario_id' => $row
            ];
        }
        try {
            $CI->MarcasSolicitudes_model->insert($solicitud);
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
        if (!empty($query)) {
            foreach ($query as $row) {

                $result[] = [
                    'clase'         => $row['nombre'],
                    'descripcion'   => $row['descripcion'],
                    'acciones' => '<button type="button" class="btn btn-primary editarClase" id="' . $row['id'] . '"><i class="fas fa-edit"></i> Editar</button> <button type="button" class="btn btn-danger borrarClase" id="' . $row['id'] . '"><i class="fas fa-trash"></i> Borrar</button>',
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
                $row['fecha']   = $invoice[0]['datecreated'];
                switch ($invoice[0]['status']) {
                    case '2':
                        $row['estatus'] = '<span class="label label-success  s-status invoice-status-2">Pagada</span>';
                        break;
                    case '6':
                        $row['estatus'] = '<span class="label label-default  s-status invoice-status-6">Borrador</span>';
                        break;
                    default:

                        break;
                }
                $row['acciones'] = '<a href="'.admin_url("invoices/invoice/".$invoice[0]['id']).'" class="btn btn-primary"><i class="fas fa-edit"></i> Editar </a>';
                $response[] = $row;
            }
            echo json_encode(['status' => 200, "data" => $response]);
        }
    }
}
