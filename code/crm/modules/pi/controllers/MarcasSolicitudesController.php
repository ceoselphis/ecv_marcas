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
        $fields = $CI->MarcasSolicitudes_model->getFillableFields();
        $inputs = array();
        $labels = array();
        foreach($fields as $field)
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
            'id'                    => intval($CI->MarcasSolicitudes_model->last_insert_id()) + 1,
            'SolDoc'                => $CI->MarcasSolicitudes_model->findAllSolicitudesDocumento()
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
        $solicitud['primer_uso'] =$this->turn_dates($form['primer_uso']);
        $solicitud['ref_cliente'] = $form['ref_cliente'];
        $solicitud['prueba_uso'] =$this->turn_dates($form['prueba_uso']);
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
        $solicitud['certificado'] 	= $form['certificado'];
        $solicitud['fecha_certificado'] = $this->turn_dates($form['fecha_certificado']);
        $solicitud['fecha_vencimiento']	= $this->turn_dates($form['fecha_vencimiento']);

        /*Seteamos el valor del signo*/
        $file = '';
        if(!empty($_FILES['signo_archivo']))
        {
            $file = $_FILES['signo_archivo'];
        }
        else{
            $file = NULL;
        }
        if($file != NULL)
        {
            //We fill the data of the         
            $fpath = FCPATH.'uploads/marcas/signos/'.$form['id'].'-'.$file['name'];
            $path = site_url('uploads/marcas/signos/'.$form['id'].'-'.$file['name']);
            move_uploaded_file($file['tmp_name'], $fpath);
            $solicitud['signo_archivo'] = $path;
        }        
        /*Seteamos el arreglo para los paises designados*/
        foreach(json_decode($form['pais_id'],TRUE) as $row)
        {
            $paisSol[] = [
                'marcas_id' => $solicitud['id'],
                'pais_id'   => $row
            ];
        }
        /*Seteamos el arreglo para la clase niza*/
        foreach(json_decode($form['clase_niza'], TRUE) as  $row)
        {
            $claseNiza[] = array(
                'marcas_id' => $solicitud['id'],
                'clase_id' => $row
            );
        }
        /*Seteamos el arreglo para los solicitantes */
        foreach(json_decode($form['solicitantes_id'], TRUE) as $row)
        {
            $solicitantes[] = [
                'marcas_id' => $solicitud['id'],
                'propietario_id' => $row
            ];
        }
        //TODO: Recoger la solicitud de los anexos, tareas, y demas desde aca
        try {
            $CI->MarcasSolicitudes_model->insert($solicitud);
            $CI->MarcasSolicitudes_model->insertPaisesDesignados($paisSol);
            $CI->MarcasSolicitudes_model->insertSolicitudesClases($claseNiza);
            $CI->MarcasSolicitudes_model->insertMarcasSolicitantes($solicitantes);
            return redirect(admin_url('pi/MarcasSolicitudesController/edit/'.$solicitud['id']));
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
        $pais_id = $CI->MarcasSolicitudes_model->findPaisesDesignados($id);
        $clase_id = $CI->MarcasSolicitudes_model->findClasesSolicitudes($id);
        $solicitantes = $CI->MarcasSolicitudes_model->findMarcasSolicitantes($id);
        $values['pais_id'] = $pais_id;
        $values['clase_niza_id'] = $clase_id;
        $values['solicitantes_id'] = $solicitantes;
        $values['fecha_certificado'] = $this->flip_dates($values['fecha_certificado']);
        $values['fecha_vencimiento'] = $this->flip_dates($values['fecha_vencimiento']);
        $values['fecha_registro'] = $this->flip_dates($values['fecha_registro']);
        $values['fecha_solicitud'] = $this->flip_dates($values['fecha_solicitud']);
        $values['prueba_uso'] = $this->flip_dates($values['prueba_uso']);
        $values['primer_uso'] = $this->flip_dates($values['primer_uso']);
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
            'id'                    => $id
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
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // Preparamos la data
        $form = $CI->input->post();
        /*Inicializamos los arreglos*/
        $solicitud = array();
        $paisSol = array();
        $claseNiza = array();
        $solicitantes = array();
       /* var_dump($form);
        die();*/
        
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
        $solicitud['certificado'] 	= $form['certificado'];
        $solicitud['fecha_certificado'] = $this->turn_dates($form['fecha_certificado']);
        $solicitud['fecha_vencimiento']	= $this->turn_dates($form['fecha_vencimiento']);
        
        /*Seteamos el valor del signo*/
        $file = '';
        if(!empty($_FILES['signo_archivo']) || $form['signo_archivo'] != 'undefined')
        {
            $file = $_FILES['signo_archivo'];
        }
        if($file != NULL)
        {
            //We fill the data of the         
            $fpath = FCPATH.'uploads/marcas/'.$form['id'].'-'.$file['name'];
            $path = site_url('uploads/marcas/signos/'.$form['id'].'-'.$file['name']);
            move_uploaded_file($file['tmp_name'], $fpath);
            $solicitud['signo_archivo'] = $path;
        }
        $isset = $CI->MarcasSolicitudes_model->deletePaisesDesignadosBySolicitud($id);
        if($isset)
        {
            /*Seteamos el arreglo para los paises designados*/
            foreach(json_decode($form['pais_id'],TRUE) as $row)
            {
                $paisSol[] = [
                    'marcas_id' => $id,
                    'pais_id'   => $row 
                ];
            }
        }
        unset($isset);
        $isset = $CI->MarcasSolicitudes_model->deleteClasesNizaBySolicitud($id);
        if($isset)
        {
            /*Seteamos el arreglo para la clase niza*/
            foreach(json_decode($form['clase_niza'], TRUE) as  $row)
            {
                $claseNiza[] = array(
                    'marcas_id' => $id,
                    'clase_id' => $row
                );
            }
        }
        
        unset($isset);
        $isset = $CI->MarcasSolicitudes_model->deleteMarcasSolicitantesBySolicitud($id);
        if($isset)
        {
            /*Seteamos el arreglo para los solicitantes */
            foreach(json_decode($form['solicitantes_id'], TRUE) as $row)
            {
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
        $CI->load->helper(['url','form']);
        $CI->load->library('pagination');
        //We send the data
        $params = $CI->input->post();
        var_dump($params);
     }

    private function flip_dates($date)
    {
        if($date != '')
        {
            try{
                $wdate = explode('-',$date);
                $cdate = "{$wdate[2]}/{$wdate[1]}/{$wdate[0]}";
                return $cdate;
            }
            catch (Exception $e)
            {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        elseif ($date == '0000-00-00') {
            try{
                $wdate = explode('-',$date);
                $cdate = "{$wdate[2]}/{$wdate[1]}/{$wdate[0]}";
                return $cdate;
            }
            catch (Exception $e)
            {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        else{
            return '';
        }
    }

    private function turn_dates($date)
    {
        if($date != ''){
            try{
                $wdate = explode('/',$date);
                $cdate = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                return $cdate;
            }
            catch (Exception $e)
            {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        else{
            return NULL;
        }
        
    }
}
