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
        $CI->load->library('pagination');
        $query = $CI->MarcasSolicitudes_model->findAll();
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
            'query'                 => $query
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
        $data = array();
        $tarea = $CI->MarcasSolicitudes_model->findAllTareas();
        foreach ($tarea as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->MarcasSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->MarcasSolicitudes_model->findAllEventos();
        $datos = array();
        foreach ($eventos as $row){
            $datos[] = array(
                'id' => $row['id'],
                'tipo_evento' => $CI->MarcasSolicitudes_model->BuscarTipoEventos($row['tipo_evento_id']),
                'comentarios' => $row['comentarios'],
                'fecha' => $row['fecha'],
            );
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
            'id'                    => intval($CI->MarcasSolicitudes_model->setCountPK()),
            'SolDoc'                => $CI->MarcasSolicitudes_model->findAllSolicitudesDocumento(),
            'eventos'               => $datos,
            'tipo_tareas'           => $CI->MarcasSolicitudes_model->findAllTipoTareas(),
            'tareas'                => $data,
            'boletines'             => $CI->MarcasSolicitudes_model->findAllBoletines(),
            
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
        $data = array();
        $tarea = $CI->MarcasSolicitudes_model->findAllTareas();
        foreach ($tarea as $row){
            $data[] = array(
                'id' => $row['id'],
                'tipo_tarea' => $CI->MarcasSolicitudes_model->BuscarTipoTareas($row['tipo_tareas_id']),
                'descripcion' => $row['descripcion'],
                'fecha' => $row['fecha'],
            );
        }
        $eventos = $CI->MarcasSolicitudes_model->findAllEventos();
        $datos = array();
        foreach ($eventos as $row){
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
            'id'                    => $id,
            'SolDoc'                => $CI->MarcasSolicitudes_model->findAllSolicitudesDocumento(),
            'eventos'               => $datos,
            'tipo_tareas'           => $CI->MarcasSolicitudes_model->findAllTipoTareas(),
            'tareas'                => $data,

/*            'publicaciones'         => $CI->MarcasSolicitudes_model->findPublicacionesByMarca($id),
            'eventos'               => $CI->MarcasSolicitudes_model->findEventosByMarca($id),
            'tareas'                => $CI->MarcasSolicitudes_model->findTareasByMarca($id),
            'id'                    => $id,
            'tipo_publicacion'      => $CI->MarcasSolicitudes_model->findAllTipoPublicacion(),
*/
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
        $params = $CI->input->post('data');
        $query = json_decode($params);
        $q = array();
        $result = array();
        foreach($query as $row)
        {
            if($row != '[]')
            {
                switch($row)
                {
                    case 'pais_id':
                        foreach(json_decode($row['pais_id']) as $i)
                        {
                            $q[] = [
                                'h.pais_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'boletin_id':
                        foreach($row['boletin_id'] as $i)
                        {
                            $q[] = [
                                'b.boletin_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 1);
                        break;
                    case 'client_id':
                        foreach($row['client_id'] as $i)
                        {
                            $q[] = [
                                'a.client_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 4);
                        break;
                    case 'oficina_id':
                        foreach($row['oficina_id'] as $i)
                        {
                            $q[] = [
                                'a.oficina_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 8);
                        break;
                    case 'staff_id':
                        foreach($row['staff_id'] as $i)
                        {
                            $q[] = [
                                'a.staff_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 2);
                        break;
                    case 'tip_sol_id':
                        foreach($row['tip_sol_id'] as $i)
                        {
                            $q[] = [
                                'a.tipo_solicitud_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, );
                        break;
                    case 'est_sol_id':
                        foreach($row['a.estado_id'] as $i)
                        {
                            $q[] = [
                                'a.estado_id' => $i
                            ];
                        }

                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 9);
                        break;
                    case 'tip_signo_id':
                        foreach($row['tip_signo_id'] as $i)
                        {
                            $q[] = [
                                'a.tipo_signo_id' => $i
                            ];
                        }
                        $result[] = $CI->MarcasSolicitudes_model->searchWhere($q, 6);
                        break;
                }
            }
        }

        
        /*$boletin_id = json_decode($params['boletin_id'], TRUE);
        $pais_id = json_decode($params['pais_id'], TRUE);
        $client_id = json_decode($params['client_id'],TRUE);
        $oficina_id = json_decode($params['oficina_id'], TRUE);
        $staff_id = json_decode($params['staff_id'], TRUE);
        $tip_sol_id = json_decode($params['tip_sol_id'], TRUE);
        $est_sol_id = json_decode($params['est_sol_id'], TRUE);
        $tip_signo_id = json_decode($params['tip_signo_id'], TRUE);
        $clase_niza_id = json_decode($params['clase_niza_id'], TRUE);
        $tip_eve_id = json_decode($params['tip_eve_id'], TRUE);    
        */
        var_dump($result);
        /*if($query)
        {
            foreach($query as $row)
            {
                $table[] = [
                    'id' => $row['id'],
                    'tipo' => $row['tipo_nom'],
                    'propietario' => $row['nombre_propietario'],
                    'nombre' => $row['signo'],
                    'clases' => $row['clase_niza'],
                    'estado' => $row['estado_nom'],
                    'solicitud' => $row['solicitud'],
                    'fecha_solicitud' => $row['fecha_solicitud'],
                    'registro' => $row['registro'],
                    'certificado' => $row['certificado'],
                    'vigencia' => $row['fecha_vencimiento'],
                    'paises' => $row['pais_nom'],
                ];
            }     
        }*/
     }

    public function flip_dates($date)
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

    public function turn_dates($date)
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
