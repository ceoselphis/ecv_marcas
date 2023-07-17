<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $data = array();
        if(!empty($CI->MarcasSolicitudes_model->findAll()))
        {
            foreach($CI->MarcasSolicitudes_model->findAll() as $row)
            {
                $data[] = array(
                    'solicitud_id' => $row['solicitud_id'],
                    'reg_num_id'   => $row['reg_num_id'],
                    'tipo_id'      => $CI->MarcasSolicitudes_model->findTipoSolicitud($row['tipo_id']),
                    'cod_estado_id'=> $CI->MarcasSolicitudes_model->findEstadosSolicitudes($row['cod_estado_id']),
                    'primer_uso'   => date('d/m/Y', strtotime($row['primer_uso'])),
                    'prueba_uso'   => date('d/m/Y', strtotime($row['prueba_uso'])),
                    'carpeta'      => $row['carpeta'],
                    'numero_solicitud' => $row['numero_solicitud'],
                    'fecha_solicitud'  => date('d/m/Y', strtotime($row['fecha_solicitud'])),
                    'fecha_registro'  => date('d/m/Y', strtotime($row['fecha_registro'])),
                    'fecha_certificado'  => date('d/m/Y', strtotime($row['fecha_certificado'])),
                    'num_certificado'  => $row['num_certificado'],
                    'fecha_vencimiento'  => date('d/m/Y', strtotime($row['fecha_vencimiento'])),
                    );
            }
        }
        return $CI->load->view('marcas/solicitudes/index', ["marcas" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $count = $CI->MarcasSolicitudes_model->setCountPK();
        //We get the fields of the register table
        $regFields = $CI->MarcasSolicitudes_model->getFieldsRegistros();
        //We get the fields of Request table
        $solFields = $CI->MarcasSolicitudes_model->getFillableFields();
        $inputs = array();
        $labels = array();
        foreach($solFields as $field)
        {
            if($field['type'] == 'INT')
            {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        foreach($regFields as $regField){
            if($regField['Type'] == 'int')
            {
                $inputs[] = array(
                    'name' => $regField['Field'],
                    'id'   => $regField['Field'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $regField['Field'],
                    'id'   => $regField['Field'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        $labels = ['Nº Solicitud', 'Nº de Registro', 'Tipo Solicitud', 'Estado de solicitud', ''];
        return $CI->load->view('marcas/solicitudes/create', 
                                [
                                    'fields'                => $inputs, 
                                    'labels'                => $labels, 
                                    'oficinas'              => $CI->MarcasSolicitudes_model->findAllOficinas(), 
                                    'clientes'              => $CI->MarcasSolicitudes_model->findAllClients(),
                                    'responsable'           => $CI->MarcasSolicitudes_model->findAllStaff(),
                                    'tipo_solicitud'        => $CI->MarcasSolicitudes_model->findAllTipoSolicitud(),
                                    'estados_solicitudes'   => $CI->MarcasSolicitudes_model->findAllEstadosSolicitudes(),
                                    'pais_id'               => $CI->MarcasSolicitudes_model->findAllPaises(),
                                    'tipos_signo_id'        => $CI->MarcasSolicitudes_model->findAllTipoSigno(),
                                    'clase_niza_id'         => $CI->MarcasSolicitudes_model->findAllClases(),
                                    'tipo_registro'         => $CI->MarcasSolicitudes_model->findAllTiposRegistros(),
                                    'tipo_evento'           => $CI->MarcasSolicitudes_model->findAllTipoEvento(),
                                    'solicitud_id'          => $count
                                ]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $form = $CI->input->post();
        $data = json_decode($form['solicitud'],TRUE);
        $file = '';
        if(!empty($_FILES['signo_archivo']))
        {
            $file = $_FILES['signo_archivo'];
        }
        else{
            $file = NULL;
        }
        $reg_num_id = $CI->MarcasSolicitudes_model->getLastIdRegistros();
        $solicitud_id = $CI->MarcasSolicitudes_model->setCountPK();
        //We fill the first table
        $registroPrincipal = array(
            'reg_num_id'        => $reg_num_id,
            'staff_id'          => $data['staff_id'],
            'client_id'         => $data['client_id'],
            'oficina_id'        => $data['oficina_id'],
            'ref_interna'       => $data['ref_interna'],
            'ref_cliente'       => $data['ref_cliente'],
            'carpeta'           => $data['carpeta'], 
            'libro'             => $data['libro'],
            'tomo'              => $data['tomo'],
            'folio'             => $data['folio'],
            'comentarios'       => $form['comentarios'],
            'tipo_registro_id'  => $data['tipo_registro_id']
        );
        //We fill the data of second table
        
        $solicitudMarca = array(
            'solicitud_id'          => $solicitud_id,
            'reg_num_id'            => $reg_num_id,
            'tipo_id'               => $data['tipo_id'],
            'cod_estado_id'         => $data['cod_estado_id'],
            'primer_uso'            => $data['primer_uso'],                   
            'prueba_uso'            => $data['prueba_uso'],               
            'carpeta'               => $data['carpeta'],            
            'numero_solicitud'      => $data['num_solicitud'],      
            'fecha_solicitud'       => NULL,    
            'fecha_registro'        => NULL,
            'fecha_certificado'     => NULL,                            
            'num_certificado'       => $data['num_certificado'],            
            'fecha_vencimiento'     => NULL,
        );
        if($data['fecha_solicitud'] != '')
        {
            $fecha_solicitud = explode('/', $data['fecha_solicitud']);
            $solicitudMarca['fecha_solicitud'] = "{$fecha_solicitud[2]}-{$fecha_solicitud[1]}-{$fecha_solicitud[0]}";    
        }
        if($data["fecha_registro"] != '')
        {
            $fecha_registro = explode('/', $data['fecha_registro']);
            $solicitudMarca['fecha_registro'] = "{$fecha_registro[2]}-{$fecha_registro[1]}-{$fecha_registro[0]}";
        }

        if($data['fecha_certificado'] != '')
        {
            $fecha_certificado = explode('/', $data['fecha_certificado']);
            $solicitud['fecha_certificado'] = "{$fecha_certificado[2]}-{$fecha_certificado[1]}-{$fecha_certificado[0]}";
        }

        if($data['fecha_vencimiento'] != '')
        {
            $fecha_vencimiento = explode('/',$data['fecha_vencimiento']);
            $solicitud['fecha_vencimiento'] = "{$fecha_vencimiento[2]}-{$fecha_vencimiento[1]}-{$fecha_vencimiento[0]}";
        }
        //We fill the data of the fourth table
        $clasesMarca = explode(',',$form['clase_niza_id']);
        $claseMarca = array();
        foreach($clasesMarca as $row)
        {
            $claseMarca[] = array(
                'solicitud_id' => $solicitud_id,
                'clase_niza_id' => $row
            );
        }
        //We fill the data of the         
        $path = FCPATH.'uploads/signos/'.$solicitud_id;
        //wE FILL THE SIGNOS Table
        $signosSolicitud = array(
            'solicitud_id'   => $solicitud_id,
            'tipo_signo_id'  => $data['tipo_signo_id'],
            'descripcion'    => $data['descripcion-signo'],
            'clasificacion'  => $data['comentario_signo'],
            'path'           => NULL,
        );
        if($file != NULL)
        {
            move_uploaded_file($file['tmp_name'], $path);
            $signosSolicitud['path'] = $path;
        }
        //We insert the data in the first table
        $CI->MarcasSolicitudes_model->insertRegistro($registroPrincipal);
        //We insert the data in the second table
        $CI->MarcasSolicitudes_model->insert($solicitudMarca);
        //We insert the data in the third table
        $CI->MarcasSolicitudes_model->insertSolicitudesClases($claseMarca);
        echo json_encode(['message' => 'success',  'solicitud_id' => $solicitud_id]);
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
        $CI->load->helper('url');
        $query = $CI->MarcasSolicitudes_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('marcas/solicitudes/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/MarcasSolicitudesController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasSolicitudes_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
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
        if($CI->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else
        {
            //We prepare the data 
            $query = $CI->MarcasSolicitudes_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/MarcasSolicitudesController/');
            }
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
}