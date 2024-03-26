<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AutoresSolicitudesController extends AdminController
{
    protected $models = ['AutoresSolicitudes_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        $CI->load->library('pagination');
        //$query = $CI->AutoresSolicitudes_model->findAll();
        $data = [
            'Oficinas'              => $CI->AutoresSolicitudes_model->findAllOficinas(),
            'clientes'              => $CI->AutoresSolicitudes_model->findAllClients(),
            'Responsables'           => $CI->AutoresSolicitudes_model->findAllStaff(),
            'tipo_solicitud'        => $CI->AutoresSolicitudes_model->findAllTipoSolicitud(),
            'estados_solicitudes'   => $CI->AutoresSolicitudes_model->findAllEstadosSolicitudes(),
            'id_pais'               => $CI->AutoresSolicitudes_model->findAllPaises(),
            'paisCli'               => $CI->AutoresSolicitudes_model->findAllPaisesClientes(),
            'tipo_evento'           => $CI->AutoresSolicitudes_model->findAllTipoEvento(),
            'propietarios'           => $CI->AutoresSolicitudes_model->findAllPropietarios2(),
        ];
        return $CI->load->view('autores/solicitudes/index', $data);
    }

    //**Get fields from database */
    private function getFields()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        $fields = $CI->AutoresSolicitudes_model->getFillableFields();
        $inputs = array();
        //$labels = array();

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

        //AGREGO LOS CAMPOS FALTANTES
        $inputs[] = array(
            'name' => 'id_autor[]',
            'id'   => 'id_autor[]',
            'type' => 'range',
            'class' => 'form-control'
        );
        $inputs[] = array(
            'name' => 'id_propietario[]',
            'id'   => 'id_propietario[]',
            'type' => 'range',
            'class' => 'form-control'
        );
        return $inputs;
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
        $CI->load->model("AutoresSolicitudes_model");
        $id = intval($CI->AutoresSolicitudes_model->setCountPK());

        $inputs = $this->getFields();

        $data = array();
        $tarea = $CI->AutoresSolicitudes_model->findAllTareasTipos();
        foreach ($tarea as $row) {
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $row['nombre'],//$CI->AutoresSolicitudes_model->BuscarTipoTareas($row['id_tipo_tareas']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->AutoresSolicitudes_model->findAllEventosTipos();
        $datos = array();
        foreach ($eventos as $row) {
            $datos[] = array(
                'id' => $row['id'],
                'tipo_evento' => $row['descripcion'],//$CI->AutoresSolicitudes_model->BuscarTipoEventos($row['id_tipo_evento']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
        }
        $cod_contador = 'I-' . ($CI->AutoresSolicitudes_model->CantidadSolicitudes() + 1);
        //$labels = ['Nº Solicitud', 'Nº de Registro', 'Tipo Solicitud', 'Estado de solicitud', ''];
        return $CI->load->view('autores/solicitudes/create', [
            'fields'                => $inputs,
            //'labels'                => $labels,
            'id'                    => $id,
            'eventos'               => $datos,
            'tareas'                => $data,
            'cod_contador'          => $cod_contador,
            'oficinas'              => $CI->AutoresSolicitudes_model->findAllOficinas(),
            'clientes'              => $CI->AutoresSolicitudes_model->findAllClients(),
            'solicitantes'          => $CI->AutoresSolicitudes_model->findAllPropietarios2(),
            'responsable'           => $CI->AutoresSolicitudes_model->findAllStaff(),
            'tipo_solicitud'        => $CI->AutoresSolicitudes_model->findAllTipoSolicitud(),
            'estados_solicitudes'   => $CI->AutoresSolicitudes_model->findAllEstadosSolicitudes(),
            'id_pais'               => $CI->AutoresSolicitudes_model->findAllPaises(),
            'tipo_evento'           => $CI->AutoresSolicitudes_model->findAllTipoEvento(),
            'SolDoc'                => $CI->AutoresSolicitudes_model->findAllSolicitudesDocumento(),
            'tipo_tareas'           => $CI->AutoresSolicitudes_model->findAllTipoTareas(),
            'projects'              => $CI->AutoresSolicitudes_model->findAllProjects(),
            'autores'               => $CI->AutoresSolicitudes_model->findAllAutores(),
            'clasificacion'         => $CI->AutoresSolicitudes_model->findAllClasificacion(),
            'origen'                => $CI->AutoresSolicitudes_model->findAllOrigen()

        ]);
    }

    private function ValidationsForm(){
        $CI = &get_instance();
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        
        //we validate the data
         $config = array(
            [
                'field' => 'id_tipo_solicitud',
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
                'field' => 'id_pais',
                'label' => 'Paises Designados',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar el País designado'
                ]
            ],
            [
                'field' => 'titulo',
                'label' => 'Título',
                'rules' => 'trim|required|min_length[5]|max_length[100]',
                'errors' => [
                    'min_length' => 'Título demasiado corto',
                    'max_lenght' => 'Título demasiado largo',
                    'required' => 'Debe indicar un Título'
                ]
            ],
            [
                'field' => 'descripcion',
                'label' => 'Descripción',
                'rules' => 'trim|required|min_length[5]|max_length[200]',
                'errors' => [
                    'min_length' => 'Descripción demasiado corta',
                    'max_lenght' => 'Descripción demasiado larga',
                    'required' => 'Debe indicar una Descripción'
                ]
            ],
            [
                'field' => 'id_autor[]',
                'label' => 'Autores',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar el o los Autores'
                ]
            ],
            [
                'field' => 'id_propietario[]',
                'label' => 'Solicitantes',
                'rules' => 'trim|required',
                //'rules' => 'trim|required|callback_validar_propietario',
                'errors' => [
                    'required' => 'Debe indicar el o los Solicitantes',
                    //'validar_propietario' => 'Debe indicar el o los Solicitantes'
                ]
            ],
            [
                'field' => 'id_clasificacion',
                'label' => 'Clasificación',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar una Clasificación'
                ]
            ],
            [
                'field' => 'titulo_clasif',
                'label' => 'Titulo Clasificación',
                'rules' => 'trim|required|min_length[5]|max_length[100]',
                'errors' => [
                    'min_length' => 'Titulo Clasificación demasiado corto',
                    'max_lenght' => 'Titulo Clasificación demasiado largo',
                    'required' => 'Debe indicar un Titulo para la Clasificación'
                ]
            ],
            [
                'field' => 'autor_clasif',
                'label' => 'Autor Clasificación',
                'rules' => 'trim|required|min_length[5]|max_length[100]',
                'errors' => [
                    'min_length' => 'Autor Clasificación demasiado corto',
                    'max_lenght' => 'Autor Clasificación demasiado largo',
                    'required' => 'Debe indicar un Autor para la Clasificación'
                ]
            ],
            [
                'field' => 'fecha_clasif',
                'label' => 'Fecha',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar una Fecha de Clasificación'
                ]
            ],
            [
                'field' => 'ref_interna',
                'label' => 'Referencia Interna',
                'rules' => 'trim|min_length[2]|max_length[20]',
                'errors' => [
                    'min_length' => 'Referencia Interna demasiado corta',
                    'max_lenght' => 'Referencia Interna demasiado larga'
                ]
            ],
            [
                'field' => 'ref_cliente',
                'label' => 'Referencia Cliente',
                'rules' => 'trim|min_length[2]|max_length[20]',
                'errors' => [
                    'min_length' => 'Referencia Cliente demasiado corta',
                    'max_lenght' => 'Referencia Cliente demasiado larga'
                ]
            ],
            [
                'field' => 'carpeta',
                'label' => 'Carpeta',
                'rules' => 'trim|min_length[1]|max_length[20]',
                'errors' => [
                    'min_length' => 'Carpeta demasiado corta',
                    'max_lenght' => 'Carpeta demasiado larga'
                ]
            ],
            [
                'field' => 'libro',
                'label' => 'Libro',
                'rules' => 'trim|min_length[1]|max_length[20]',
                'errors' => [
                    'min_length' => 'Libro demasiado corto',
                    'max_lenght' => 'Libro demasiado largo'
                ]
            ],
            [
                'field' => 'tomo',
                'label' => 'Tomo',
                'rules' => 'trim|min_length[1]|max_length[20]',
                'errors' => [
                    'min_length' => 'Tomo demasiado corto',
                    'max_lenght' => 'Tomo demasiado largo'
                ]
            ],
            [
                'field' => 'folio',
                'label' => 'Folio',
                'rules' => 'trim|min_length[1]|max_length[20]',
                'errors' => [
                    'min_length' => 'Folio demasiado corto',
                    'max_lenght' => 'Folio demasiado largo'
                ]
            ],
            [
                'field' => 'comentarios',
                'label' => 'Comentarios',
                'rules' => 'trim|min_length[5]|max_length[200]',
                'errors' => [
                    'min_length' => 'Comentarios demasiado corto',
                    'max_lenght' => 'Comentarios demasiado largo'
                ]
            ],
            [
                'field' => 'solicitud',
                'label' => 'Nº de Solicitud',
                'rules' => 'trim|min_length[2]|max_length[20]',
                'errors' => [
                    'min_length' => 'Nº de Solicitud demasiado corta',
                    'max_lenght' => 'Nº de Solicitud demasiado larga'
                ]
            ],
            [
                'field' => 'registro',
                'label' => 'Nº de Registro',
                'rules' => 'trim|min_length[2]|max_length[20]',
                'errors' => [
                    'min_length' => 'Nº de Registro demasiado corto',
                    'max_lenght' => 'Nº de Registro demasiado largo'
                ]
            ],
            [
                'field' => 'certificado',
                'label' => 'Nº de Certificado',
                'rules' => 'trim|min_length[2]|max_length[20]',
                'errors' => [
                    'min_length' => 'Nº de Certificado demasiado corto',
                    'max_lenght' => 'Nº de Certificado demasiado largo'
                ]
            ]

            
        );
        //we set the rules
        $CI->form_validation->set_rules($config);
       return $CI->form_validation->run();
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        if($this->ValidationsForm() == FALSE)
        {
            $this->LoadPage();
        }
        else
        {
            $form = $CI->input->post();
            $solicitud = array();

            // WE prepare the data
            $solicitud['id'] = empty($form['id']) ? null : $form['id'];
            $solicitud['cod_contador'] = empty($form['cod_contador']) ? null : $form['cod_contador'];
            $solicitud['id_tipo_solicitud'] = empty($form['id_tipo_solicitud']) ? null : $form['id_tipo_solicitud'];
            $solicitud['client_id'] = empty($form['client_id']) ? null : $form['client_id'];
            $solicitud['oficina_id'] = empty($form['oficina_id']) ? null : $form['oficina_id'];
            $solicitud['staff_id'] = empty($form['staff_id']) ? null : $form['staff_id'];
            $solicitud['id_pais'] = empty($form['id_pais']) ? null : $form['id_pais'];
            $solicitud['titulo'] = empty($form['titulo']) ? null : $form['titulo'];
            $solicitud['descripcion'] = empty($form['descripcion']) ? null : $form['descripcion'];
            $solicitud['id_clasificacion'] = empty($form['id_clasificacion']) ? null : $form['id_clasificacion'];
            $solicitud['id_origen'] = empty($form['id_origen']) ? null : $form['id_origen'];
            $solicitud['titulo_clasif'] = empty($form['titulo_clasif']) ? null : $form['titulo_clasif'];
            $solicitud['autor_clasif'] = empty($form['autor_clasif']) ? null : $form['autor_clasif'];
            $solicitud['fecha_clasif'] = empty($form['fecha_clasif']) ? null : $this->turn_dates($form['fecha_clasif']);
            $solicitud['ref_interna'] = empty($form['ref_interna']) ? null : $form['ref_interna'];
            $solicitud['ref_cliente'] = empty($form['ref_cliente']) ? null : $form['ref_cliente'];
            $solicitud['carpeta'] = empty($form['carpeta']) ? null : $form['carpeta'];
            $solicitud['libro'] = empty($form['libro']) ? null : $form['libro'];
            $solicitud['tomo'] = empty($form['tomo']) ? null : $form['tomo'];
            $solicitud['folio'] = empty($form['folio']) ? null : $form['folio'];
            $solicitud['comentarios'] = empty($form['comentarios']) ? null : $form['comentarios'];
            $solicitud['id_estado'] = empty($form['id_estado']) ? null : $form['id_estado'];
            $solicitud['solicitud'] = empty($form['solicitud']) ? null : $form['solicitud'];
            $solicitud['fecha_solicitud'] = empty($form['fecha_solicitud']) ? null : $this->turn_dates($form['fecha_solicitud']);
            $solicitud['registro'] = empty($form['registro']) ? null : $form['registro'];
            $solicitud['fecha_registro'] = empty($form['fecha_registro']) ? null : $this->turn_dates($form['fecha_registro']);
            $solicitud['certificado']     = empty($form['certificado']) ? null : $form['certificado'];
            $solicitud['fecha_vencimiento']    = empty($form['fecha_vencimiento']) ? null : $this->turn_dates($form['fecha_vencimiento']);
    
             /*Seteamos el arreglo para los Autores designados*/
            foreach($form['id_autor'] as $key => $valor){
                $autoresSol[] = [
                    'id_solicitud' => $solicitud['id'],
                    'id_autor'   => $valor
                ];
            }

            /*Seteamos el arreglo para los Solicitantes designados*/
            foreach($form['id_propietario'] as $key => $valor){
                $propietariosSol[] = [
                    'id_solicitud' => $solicitud['id'],
                    'id_propietario'   => $valor
                ];
            }    
            //TODO: Recoger la solicitud de los anexos, tareas, y demas desde aca
            try {
                $CI->AutoresSolicitudes_model->insert($solicitud);
                $CI->AutoresSolicitudes_model->insertAutoresDesignados($autoresSol);
                $CI->AutoresSolicitudes_model->insertSolicitantesDesignados($propietariosSol);
                return redirect(admin_url('pi/AutoresSolicitudesController/edit/' . $solicitud['id']));
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
        $this->LoadPageEdit($id);
    }

    private function LoadPageEdit(string $id = null){
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        $inputs = $this->getFields();
        //We get the data
        $values = $CI->AutoresSolicitudes_model->find($id)[0];
        $autores = $CI->AutoresSolicitudes_model->findAutoresDesignados($id);
        $solicitantes = $CI->AutoresSolicitudes_model->findAutorSolicitantes($id);
        $data = array();
        $tarea = $CI->AutoresSolicitudes_model->findAllTareasTipos();
        foreach ($tarea as $row) {
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $row['nombre'],//$CI->AutoresSolicitudes_model->BuscarTipoTareas($row['id_tipo_tareas']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->AutoresSolicitudes_model->findAllEventosTipos();
        $datos = array();
        foreach ($eventos as $row) {
            $datos[] = array(
                'id' => $row['id'],
                'tipo_evento' => $row['descripcion'],//$CI->AutoresSolicitudes_model->BuscarTipoEventos($row['id_tipo_evento']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
        }
        $values['autores'] = $autores;
        $values['solicitantes'] = $solicitantes;
        $values['fecha_vencimiento'] = $this->flip_dates($values['fecha_vencimiento']);
        $values['fecha_registro'] = $this->flip_dates($values['fecha_registro']);
        $values['fecha_solicitud'] = $this->flip_dates($values['fecha_solicitud']);
        $values['fecha_clasif'] = $this->flip_dates($values['fecha_clasif']);
        $values['projects'] = $CI->AutoresSolicitudes_model->findProjectByAutor($id);
        return $CI->load->view('autores/solicitudes/edit', [
            'fields'                => $inputs,
            'id'                    => $id,
            'values'                => $values,
            'eventos'               => $datos,
            'tareas'                => $data,
            'oficinas'              => $CI->AutoresSolicitudes_model->findAllOficinas(),
            'clientes'              => $CI->AutoresSolicitudes_model->findAllClients(),
            'solicitantes'          => $CI->AutoresSolicitudes_model->findAllPropietarios2(),
            'responsable'           => $CI->AutoresSolicitudes_model->findAllStaff(),
            'tipo_solicitud'        => $CI->AutoresSolicitudes_model->findAllTipoSolicitud(),
            'estados_solicitudes'   => $CI->AutoresSolicitudes_model->findAllEstadosSolicitudes(),
            'id_pais'               => $CI->AutoresSolicitudes_model->findAllPaises(),
            'tipo_evento'           => $CI->AutoresSolicitudes_model->findAllTipoEvento(),
            'SolDoc'                => $CI->AutoresSolicitudes_model->findAllSolicitudesDocumento(),
            'tipo_tareas'           => $CI->AutoresSolicitudes_model->findAllTipoTareas(),
            'projects'              => $CI->AutoresSolicitudes_model->findAllProjects(),
            'autores'               => $CI->AutoresSolicitudes_model->findAllAutores(),
            'clasificacion'         => $CI->AutoresSolicitudes_model->findAllClasificacion(),
            'origen'                => $CI->AutoresSolicitudes_model->findAllOrigen()
        ]);
    }


    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        if($this->ValidationsForm() == FALSE)
        {
            $this->LoadPageEdit($id);
        }
        else
        {

            // Preparamos la data
            $form = $CI->input->post();
            /*Inicializamos los arreglos*/
            $solicitud = array();

            // WE prepare the data
            $solicitud['id'] = empty($form['id']) ? null : $form['id'];
            $solicitud['id_tipo_solicitud'] = empty($form['id_tipo_solicitud']) ? null : $form['id_tipo_solicitud'];
            $solicitud['client_id'] = empty($form['client_id']) ? null : $form['client_id'];
            $solicitud['oficina_id'] = empty($form['oficina_id']) ? null : $form['oficina_id'];
            $solicitud['staff_id'] = empty($form['staff_id']) ? null : $form['staff_id'];
            $solicitud['id_pais'] = empty($form['id_pais']) ? null : $form['id_pais'];
            $solicitud['titulo'] = empty($form['titulo']) ? null : $form['titulo'];
            $solicitud['descripcion'] = empty($form['descripcion']) ? null : $form['descripcion'];
            $solicitud['id_clasificacion'] = empty($form['id_clasificacion']) ? null : $form['id_clasificacion'];
            $solicitud['id_origen'] = empty($form['id_origen']) ? null : $form['id_origen'];
            $solicitud['titulo_clasif'] = empty($form['titulo_clasif']) ? null : $form['titulo_clasif'];
            $solicitud['autor_clasif'] = empty($form['autor_clasif']) ? null : $form['autor_clasif'];
            $solicitud['fecha_clasif'] = empty($form['fecha_clasif']) ? null : $this->turn_dates($form['fecha_clasif']);
            $solicitud['ref_interna'] = empty($form['ref_interna']) ? null : $form['ref_interna'];
            $solicitud['ref_cliente'] = empty($form['ref_cliente']) ? null : $form['ref_cliente'];
            $solicitud['carpeta'] = empty($form['carpeta']) ? null : $form['carpeta'];
            $solicitud['libro'] = empty($form['libro']) ? null : $form['libro'];
            $solicitud['tomo'] = empty($form['tomo']) ? null : $form['tomo'];
            $solicitud['folio'] = empty($form['folio']) ? null : $form['folio'];
            $solicitud['comentarios'] = empty($form['comentarios']) ? null : $form['comentarios'];
            $solicitud['id_estado'] = empty($form['id_estado']) ? null : $form['id_estado'];
            $solicitud['solicitud'] = empty($form['solicitud']) ? null : $form['solicitud'];
            $solicitud['fecha_solicitud'] = empty($form['fecha_solicitud']) ? null : $this->turn_dates($form['fecha_solicitud']);
            $solicitud['registro'] = empty($form['registro']) ? null : $form['registro'];
            $solicitud['fecha_registro'] = empty($form['fecha_registro']) ? null : $this->turn_dates($form['fecha_registro']);
            $solicitud['certificado']     = empty($form['certificado']) ? null : $form['certificado'];
            $solicitud['fecha_vencimiento']    = empty($form['fecha_vencimiento']) ? null : $this->turn_dates($form['fecha_vencimiento']);

            unset($isset);
            $isset = $CI->AutoresSolicitudes_model->deleteAutoresDesignadosBySolicitud($id);
            if ($isset) {
                /*Seteamos el arreglo para los Autores designados*/
                foreach($form['id_autor'] as $key => $valor){
                    $autoresSol[] = [
                        'id_solicitud' => $solicitud['id'],
                        'id_autor'   => $valor
                    ];
                }
            }
            unset($isset);
            $isset = $CI->AutoresSolicitudes_model->deletePropietariosDesignadosBySolicitud($id);
            if ($isset) {
                /*Seteamos el arreglo para los Solicitantes designados*/
                foreach($form['id_propietario'] as $key => $valor){
                    $propietariosSol[] = [
                        'id_solicitud' => $solicitud['id'],
                        'id_propietario'   => $valor
                    ];
                }   
            } 
            try {
                $CI->AutoresSolicitudes_model->update($id, $solicitud);
                $CI->AutoresSolicitudes_model->insertAutoresDesignados($autoresSol);
                $CI->AutoresSolicitudes_model->insertSolicitantesDesignados($propietariosSol);
                return redirect(admin_url('pi/AutoresSolicitudesController/edit/' . $id));
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
        $CI->load->model("AutoresSolicitudes_model");
        $CI->load->helper('url');
        $query = $CI->AutoresSolicitudes_model->delete($id);
        return redirect('pi/AutoresSolicitudesController/');
    }

    public function search()
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
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
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'boletin_id':
                        foreach ($row['boletin_id'] as $i) {
                            $q[] = [
                                'b.boletin_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 1);
                        break;
                    case 'client_id':
                        foreach ($row['client_id'] as $i) {
                            $q[] = [
                                'a.client_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 4);
                        break;
                    case 'oficina_id':
                        foreach ($row['oficina_id'] as $i) {
                            $q[] = [
                                'a.oficina_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 8);
                        break;
                    case 'staff_id':
                        foreach ($row['staff_id'] as $i) {
                            $q[] = [
                                'a.staff_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'tip_sol_id':
                        foreach ($row['tip_sol_id'] as $i) {
                            $q[] = [
                                'a.tipo_solicitud_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q,);
                        break;
                    case 'est_sol_id':
                        foreach ($row['a.estado_id'] as $i) {
                            $q[] = [
                                'a.estado_id' => $i
                            ];
                        }

                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 9);
                        break;
                    case 'tip_signo_id':
                        foreach ($row['tip_signo_id'] as $i) {
                            $q[] = [
                                'a.tipo_signo_id' => $i
                            ];
                        }
                        $result[] = $CI->AutoresSolicitudes_model->searchWhere($q, 6);
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
        $CI->load->model('AutoresSolicitudes_model');
        $form = json_decode($CI->input->post('data'), TRUE);
        $result = array();
        $query = array();
        $url = admin_url('pi/AutoresSolicitudesController/edit/');
        foreach ($form as $key => $value) {
            if ($value === '') {
                unset($form[$key]);
            }
        }
        if (empty($form)) {
            $query = $CI->AutoresSolicitudes_model->findAll();
            if (!empty($query)) {
                foreach ($query as $row) {
                    $result[] =  [
                        'cod_contador' => $row['cod_contador'],
                        'tipo' =>  $row['descripcion'],
                        'titulo' =>  $row['titulo'],
                        'estado_exp' =>  is_null($row['estado_exp']) ? '' : $row['estado_exp'],
                        'solicitud' => is_null($row['solicitud']) ? '' : $row['solicitud'],
                        'fecha_solicitud' => is_null($row['fecha_solicitud']) ? '' : date('d/m/Y', strtotime($row['fecha_solicitud'])),
                        'registro' => $row['registro'],
                        'pais' => $row['pais'],
                        'acciones' => "<a class='btn btn-primary' href='{$url}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a>",
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);
            } else {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        } else {
            $query = $CI->AutoresSolicitudes_model->searchWhere2($form);
            if (!empty($query)) {
                foreach ($query as $row) {
                    $result[] = [
                        'cod_contador' => $row['cod_contador'],
                        'tipo' =>  $row['descripcion'],
                        'titulo' =>  $row['titulo'],
                        'estado_exp' =>  is_null($row['estado_exp']) ? '' : $row['estado_exp'],
                        'solicitud' => is_null($row['solicitud']) ? '' : $row['solicitud'],
                        'fecha_solicitud' => is_null($row['fecha_solicitud']) ? '' : date('d/m/Y', strtotime($row['fecha_solicitud'])),
                        'registro' => $row['registro'],
                        'pais' => $row['pais'],
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
        $CI->load->model("AutoresSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        $form = $CI->input->post();
        $params = [
            'marcas_id' => $form['marcas_id'],
            'clase_id'  => $form['clase_id'],
            'descripcion' => $form['clase_descripcion']
        ];
        $query = $CI->AutoresSolicitudes_model->insertMarcasClases($params);
        if ($query) {
            echo json_encode(['code' => 200, 'message' => 'success']);
        } else {
            echo json_encode(['code' => 500, 'message' => 'error']);
        }
    }

    public function getClasesMarcas($marcas_id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("AutoresSolicitudes_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        $query = $CI->AutoresSolicitudes_model->getMarcasClases($marcas_id);
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
        $CI->load->model('AutoresSolicitudes_model');
        $query = $CI->AutoresSolicitudes_model->getInvoicesByMarca($marcaid);
        $response = array();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $invoice = $CI->AutoresSolicitudes_model->getInvoice($value['facturas_id']);
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
