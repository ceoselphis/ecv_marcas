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
            'solicitantes'  => $CI->PatentesSolicitudes_model->getAllClients(),
        ];
        return $CI->load->view('patente/solicitudes/create', $data);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        echo json_encode(['message' => 'success','data' => $data]); 
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
            $data = [
                'id'            => $CI->PatentesSolicitudes_model->last_insert_id(),
                'tipo_registro' => $CI->PatentesSolicitudes_model->getTipoSolicitudes(),
                'clientes'      => $CI->PatentesSolicitudes_model->getAllClients(),
                'oficinas'      => $CI->PatentesSolicitudes_model->getAllOficinas(),
                'responsable'   => $CI->PatentesSolicitudes_model->getAllStaff(),
                'pais_id'       => $CI->PatentesSolicitudes_model->getAllPaises(),
                'inventores'    => $CI->PatentesSolicitudes_model->getAllInventores(),
                'cod_contador'  => $id,
                'solicitantes'  => $CI->PatentesSolicitudes_model->getAllClients(),
                'values' => $query,
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
