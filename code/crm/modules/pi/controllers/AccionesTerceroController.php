<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AccionesTerceroController extends AdminController
{
    protected $models = ['AccionesContraTerceros_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $data = [
            'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            'expediente' => $CI->AccionesContraTerceros_model->getAllExpediente(),
            'tipo_evento' => $CI->AccionesContraTerceros_model->getAllTipoEvento(),
        ];
        return $CI->load->view('acciones_terceros/index', ['marcas' => $data]);
    }

    public function ShowAccionesTerceros()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $query = $CI->AccionesContraTerceros_model->findAll();
        $table = array();
        if (!empty($query)) {
            foreach ($query as $row) {
              
                $table[] = [
                    'codigo'            => $row['id'],
                    'tipo'              => $CI->AccionesContraTerceros_model->getTipoSolicitudes()[$row['tipo_solicitud_id']],
                    'demandante'        => $CI->AccionesContraTerceros_model->findCliente($row['client_id'])[0]['company'],
                    'demandado'         => $row['propietario'],
                    'objeto'            => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['signonom'],
                    'nro_solicitud'     => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['registro'],
                    'fecha_solicitud'   => date('d/m/Y', strtotime($row['fecha_solicitud'])),
                    'estado'            => $CI->AccionesContraTerceros_model->findEstatus($row['estado_id'])[0]['descripcion'],
                    'pais'              => $CI->AccionesContraTerceros_model->findPais($row['pais_id'])[0]['nombre'],
                    
                ];
            }
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $table]);
        }
        else
        {
            $table[] = [
                'codigo'            => '',
                'tipo'              => '',
                'demandante'        => '',
                'demandado'         => '',
                'objeto'            =>'',
                'nro_solicitud'     => '',
                'fecha_solicitud'   => '',
                'estado'            => '',
                'pais'              => '',
                'acciones'          => ''
            ];
            echo json_encode(['code' => 404, 'message' => 'not found', 'data' => $table]);
        }
       // echo json_encode($data);
    }

    public function ShowIndex(){
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $data = [
            'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            'expediente' => $CI->AccionesContraTerceros_model->getAllExpediente(),
        ];
        echo json_encode($data);
    }

    public function filterSearch(){
        $CI = &get_instance();
        $CI->load->model('AccionesContraTerceros_model');
        $form = json_decode($CI->input->post('data'), TRUE);
        $result = array();
        $query = array();
        $url = admin_url('pi/AccionesTerceroController/edit/');
        //echo json_encode($form);
        foreach ($form as $key => $value) {
            if ($value === '') {
                unset($form[$key]);
            }
        }
        if (empty($form)) {
           
            $query = $CI->AccionesContraTerceros_model->findAll();
            //   echo json_encode($query);
            if (!empty($query)) {
                foreach ($query as $row) {
                    $href = admin_url('pi/AccionesTerceroController/edit/').$row['id'];
                    $table[] = [
                        'codigo'            => '<a  href="'.$href.'">'.$row['id'].'</a>',
                        'tipo'              => $CI->AccionesContraTerceros_model->getTipoSolicitudes()[$row['tipo_solicitud_id']],
                        'demandante'        => $CI->AccionesContraTerceros_model->findCliente($row['client_id'])[0]['company'],
                        'demandado'         => $row['propietario'],
                        'objeto'            => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['signonom'],
                        'nro_solicitud'     => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['registro'],
                        'fecha_solicitud'   => date('d/m/Y', strtotime($row['fecha_solicitud'])),
                        'estado'            => $CI->AccionesContraTerceros_model->findEstatus($row['estado_id'])[0]['descripcion'],
                        'pais'              => $CI->AccionesContraTerceros_model->findPais($row['pais_id'])[0]['nombre'],
                        'acciones'          => '<a class="btn btn-primary" href="'.$href.'"><i class="fas fa-edit"></i> Editar</a>'
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $table]);
            } else {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        } else {
            
            
            $query = $CI->AccionesContraTerceros_model->searchWhere2($form);
            
            if (!empty($query)) {
                foreach ($query as $row) {
                    $href = admin_url('pi/AccionesTerceroController/edit/').$row['marca_opuesta_id'];
                    $result[] = [
                        'codigo'            => '<a  href="'.$href.'">'.$row['marca_opuesta_id'].'</a>',
                        'tipo'              => $CI->AccionesContraTerceros_model->getTipoSolicitudes()[$row['marca_opuesta_tipo_solicitud_id']],
                        'demandante'        => $CI->AccionesContraTerceros_model->findCliente($row['marca_opuesta_client_id'])[0]['company'],
                        'demandado'         => $row['marca_opuesta_propietario'],
                        'objeto'            => $CI->AccionesContraTerceros_model->findMarca($row['marca_id'])[0]['signonom'],
                        'nro_solicitud'     => $CI->AccionesContraTerceros_model->findMarca($row['marca_id'])[0]['registro'],
                        'fecha_solicitud'   => date('d/m/Y', strtotime($row['marca_opuesta_fecha_solicitud'])),
                        'estado'            => $CI->AccionesContraTerceros_model->findEstatus($row['marca_opuesta_estado_id'])[0]['descripcion'],
                        'pais'              => $CI->AccionesContraTerceros_model->findPais($row['marca_opuesta_pais'])[0]['nombre'],
                        'acciones'          => '<a class="btn btn-primary" href="'.$href.'"><i class="fas fa-edit"></i> Editar</a>'
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
            } else {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        }
    }


    public function getAcciones()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $query = $CI->AccionesContraTerceros_model->findAll();
        $table = array();
        if (!empty($query)) {
            foreach ($query as $row) {
                $href = admin_url('pi/AccionesTerceroController/edit/').$row['id'];
                $table[] = [
                    'codigo'            => $row['id'],
                    'tipo'              => $CI->AccionesContraTerceros_model->getTipoSolicitudes()[$row['tipo_solicitud_id']],
                    'demandante'        => $CI->AccionesContraTerceros_model->findCliente($row['client_id'])[0]['company'],
                    'demandado'         => $row['propietario'],
                    'objeto'            => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['signonom'],
                    'nro_solicitud'     => $CI->AccionesContraTerceros_model->findMarca($row['marcas_id'])[0]['registro'],
                    'fecha_solicitud'   => date('d/m/Y', strtotime($row['fecha_solicitud'])),
                    'estado'            => $CI->AccionesContraTerceros_model->findEstatus($row['estado_id'])[0]['descripcion'],
                    'pais'              => $CI->AccionesContraTerceros_model->findPais($row['pais_id'])[0]['nombre'],
                    'acciones'          => '<a class="btn btn-primary" href="'.$href.'"><i class="fas fa-edit"></i> Editar</a>'
                ];
            }
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $table]);
        }
        else
        {
            $table[] = [
                'codigo'            => '',
                'tipo'              => '',
                'demandante'        => '',
                'demandado'         => '',
                'objeto'            =>'',
                'nro_solicitud'     => '',
                'fecha_solicitud'   => '',
                'estado'            => '',
                'pais'              => '',
                'acciones'          => ''
            ];
            echo json_encode(['code' => 404, 'message' => 'not found', 'data' => $table]);
        }
    }

    

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $data = [
            
            'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            'tipo_evento' => $CI->AccionesContraTerceros_model->getAllTipoEvento(),
            'tipo_tarea' => $CI->AccionesContraTerceros_model->getAllTiposTareas(),
            'cod_contador' => 'M-' . ($CI->AccionesContraTerceros_model->CantidadSolicitudes() + 1),
            'cod_id' => $CI->AccionesContraTerceros_model->CantidadSolicitudes() + 1,
        ];

       

        return $CI->load->view('acciones_terceros/create', $data);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');

        $form = array();
        $data = $CI->input->post();
        $fecha_solicitud_opuesta = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud_opuesta'])->format('Y-m-d');
        $fecha_registro_opuesta = DateTime::createFromFormat('d/m/Y', $data['fecha_registro_opuesta'])->format('Y-m-d');
        $fecha_boletin = DateTime::createFromFormat('d/m/Y', $data['fecha_boletin'])->format('Y-m-d');
        $form['tipo_solicitud_id'] = $data['tipo_solicitud_id'];
        $form['client_id']         = $data['client_id'];
        $form['oficina_id']        = $data['staff_id'];
        $form['marcas_id']         = $data['marcas_id'];
        $form['fundamento']        = $data['fundamento'];
        $form['marca_opuesta']     = $data['marca_opuesta'];
        $form['clase_niza']        = $data['clase_niza'];
        $form['pais_id']           = $data['pais_id_opuesta'];
        $form['solicitud_nro']     = $data['nro_solicitud_opuesta'];
        $form['fecha_solicitud']   = $fecha_solicitud_opuesta;
        $form['registro_nro']      = $data['nro_registro_opuesta'];
        $form['fecha_registro']    = $fecha_registro_opuesta;
        $form['propietario']       = $data['propietario_opuesta'];
        $form['agente']            = $data['agente'];
        $form['boletin_id']        = $data['boletin'];
        $form['fecha_boletin']     = $fecha_boletin;
        $form['estado_id']         = $data['estado_id'];
        $form['comentarios']       = $data['comentarios'];
        //$form['fecha_solicitud'] = $data['fecha_solicitud'];
        try {
            $query = $CI->AccionesContraTerceros_model->insert($form);
            $id = $CI->AccionesContraTerceros_model->last_insert_id();
            return redirect("pi/AccionesTerceroController/edit/{$id}");
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
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
        $CI->load->model("AccionesContraTerceros_model");
        $values = $CI->AccionesContraTerceros_model->find($id);
        $data = [
            'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            'tipo_evento' => $CI->AccionesContraTerceros_model->getAllTipoEvento(),
            'tipo_tarea' => $CI->AccionesContraTerceros_model->getAllTiposTareas(),
            'values' => $values[0],
            'fecha_solictud' =>  date('d/m/Y', strtotime($values[0]['fecha_solicitud'])),
            'fecha_registro' =>  date('d/m/Y', strtotime($values[0]['fecha_registro'])),
            'fecha_boletin' =>  date('d/m/Y', strtotime($values[0]['fecha_boletin'])),
            'registro_nro' => $values[0]['registro_nro'],
            'cod_contador' => 'M-' . ($id),
            'cod_id' => $id
        ];
        return $CI->load->view('acciones_terceros/edit', $data);
    }

    public function Mostrar(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $values = $CI->AccionesContraTerceros_model->find($id);
        $data = [
            // // 'tipo_solicitud' => $CI->AccionesContraTerceros_model->getTipoSolicitudes(),
            // // 'clientes'       => $CI->AccionesContraTerceros_model->getAllClients(),
            // // 'oficinas'       => $CI->AccionesContraTerceros_model->getAllOficinas(),
            // // 'responsable'    => $CI->AccionesContraTerceros_model->getAllStaff(),
            // // 'marcas'         => $CI->AccionesContraTerceros_model->getAllMarcas(),
            // // 'clase_niza'     => $CI->AccionesContraTerceros_model->getAllClases(),
            // // 'paises'         => $CI->AccionesContraTerceros_model->getAllPaises(),
            // // 'propietarios'   => $CI->AccionesContraTerceros_model->getAllPropietarios(),
            // // 'boletines'      => $CI->AccionesContraTerceros_model->getAllBoletines(),
            // // 'estados_solicitudes' => $CI->AccionesContraTerceros_model->getAllEstadoExpediente(),
            // // 'tipo_publicaciones' => $CI->AccionesContraTerceros_model->getAllTiposPublicaciones(),
            // // 'tipo_evento' => $CI->AccionesContraTerceros_model->getAllTipoEvento(),
            // // 'tipo_tarea' => $CI->AccionesContraTerceros_model->getAllTiposTareas(),
            // // 'values' => $values[0],
            // // 'fecha_solictud' =>  date('d/m/Y', strtotime($values[0]['fecha_solicitud'])),
            // // 'fecha_registro' =>  date('d/m/Y', strtotime($values[0]['fecha_registro'])),
            // // 'fecha_boletin' =>  date('d/m/Y', strtotime($values[0]['fecha_boletin'])),
            'registro_nro' => $values[0]['registro_nro'],
            'cod_contador' => 'M-' . ($id),
            'cod_id' => $id
        ];
        echo json_encode($values);
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper('url');
        $form = array();
        $data = $CI->input->post();
        $fecha_solicitud_opuesta = DateTime::createFromFormat('d/m/Y', $data['fecha_solicitud_opuesta'])->format('Y-m-d');
        $fecha_registro_opuesta = DateTime::createFromFormat('d/m/Y', $data['fecha_registro_opuesta'])->format('Y-m-d');
        $fecha_boletin = DateTime::createFromFormat('d/m/Y', $data['fecha_boletin'])->format('Y-m-d');
        $form['tipo_solicitud_id'] = $data['tipo_solicitud_id'];
        $form['client_id']         = $data['client_id'];
        $form['oficina_id']        = $data['staff_id'];
        $form['marcas_id']         = $data['marcas_id'];
        $form['fundamento']        = $data['fundamento'];
        $form['marca_opuesta']     = $data['marca_opuesta'];
        $form['clase_niza']        = $data['clase_niza'];
        $form['pais_id']           = $data['pais_id_opuesta'];
        $form['solicitud_nro']     = $data['nro_solicitud_opuesta'];
        $form['fecha_solicitud']   = $fecha_solicitud_opuesta;
        $form['registro_nro']      = $data['nro_registro_opuesta'];
        $form['fecha_registro']    = $fecha_registro_opuesta;
        $form['propietario']       = $data['propietario_opuesta'];
        $form['agente']            = $data['agente'];
        $form['boletin_id']        = $data['boletin'];
        $form['fecha_boletin']     = $fecha_boletin;
        $form['estado_id']         = $data['estado_id'];
        $form['comentarios']       = $data['comentarios'];
        try {
            $query = $CI->AccionesContraTerceros_model->update($id, $form);
            return redirect("pi/AccionesTerceroController");
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("AccionesContraTerceros_model");
        $CI->load->helper('url');
        $query = $CI->AccionesContraTerceros_model->delete($id);
        return redirect('pi/anexoscontroller/');
    }

    public function findDenominacion()
    {
        $CI = &get_instance();
        $CI->load->model('AccionesContraTerceros_model');
        $data = $CI->input->post();
        $denominacion = $CI->AccionesContraTerceros_model->findDenominacionBase($data['marcas_id']);
        $response = array();
        if (!empty($denominacion)) {
            $clase = $CI->AccionesContraTerceros_model->findClaseNiza($data['marcas_id']);
            if (!empty($clase)) {
                $clase_id = array();
                foreach ($clase as $row) {
                    $clase_id[] = $row['clase_id'];
                }
                $denominacion['clase'] = $clase_id;
            }
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $denominacion]);
        } else {
            echo json_encode(['code' => 404, 'message' => 'not found']);
        }
    }
}