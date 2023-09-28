<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicacionesMarcasController extends AdminController
{
    protected $models = ['PublicacionesMarcas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $data = $CI->PublicacionesMarcas_model->findAll();
        $publicaciones = array();
        foreach($data as $row){
            $publicaciones[] = array(
                'id' => $row['id'],
                'tipo_pub_id' => $CI->PublicacionesMarcas_model->findTipoPublicaciones($row['tipo_pub_id']),
                'marcas_id'=>  $CI->PublicacionesMarcas_model->findSolicitudesMarcas($row['marcas_id']),
                'boletin_id' => $CI->PublicacionesMarcas_model->findBoletin($row['boletin_id']),
                'tomo' => $row['tomo'],
                'pagina' => $row['pagina']
            );

        }
        
        return $CI->load->view('marcas/publicaciones/index', ["publicaciones" => $publicaciones]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $fields = $CI->PublicacionesMarcas_model->getFillableFields();
        $boletines = array();
        foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
        {
            $boletines[$row['id']] = $row['descripcion'];

        }
        $paises = array();
        foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
        {
            $paises[$row['id']] = $row['nombre'];
        }
        $tipoPub = array();
        foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
        {
            $tipoPub[$row['id']] = $row['nombre'];
        }
        $solicitud = $CI->PublicacionesMarcas_model->findAllSolicitudesMarcas();
        /*if(!empty($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas()))
        {
            foreach($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas() as $row)
            {
                $solicitud[$row['solicitud_id']] = $row['reg_num_id'];
            }
        }*/
        
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
        $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
        return $CI->load->view('marcas/publicaciones/create', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'tipo_pub_id',
                'label' => 'Tipo Publicacion',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un tipo de solicitud',
                    'regex_match' => 'El tipo de solicitud no es valido',
                ]
            ],
            [
                'field' => 'boletin_id',
                'label' => 'Boletin',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un boletin de procedencia',
                    'regex_match' => 'El número de boletin no es valído',
                ]
            ],
            [
                'field' => 'marcas_id',
                'label' => 'Solcitud',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar la solicitud de marcas',
                    'regex_match' => 'El número de solictud no es valido',
                ]
            ],
            [
                'field' => 'tomo',
                'label' => 'Tomo',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de tomo',
                    'regex_match' => 'El número de tomo no es valido',
                ]
            ],
            [
                'field' => 'pagina',
                'label' => 'Pagina',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de Pagina',
                    'regex_match' => 'El número de Pagina no es valido',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->PublicacionesMarcas_model->getFillableFields();
            $boletines = array();
            foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
            {
                $boletines[$row['id']] = $row['descripcion'];

            }
            $paises = array();
            foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
            {
                $paises[$row['id']] = $row['nombre'];
            }
            $tipoPub = array();
            foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
            {
                $tipoPub[$row['id']] = $row['nombre'];
            }
            $solicitud = array(); //TO-DO
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
            $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
            return $CI->load->view('marcas/publicaciones/create', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->PublicacionesMarcas_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/publicacionesmarcascontroller/'));
            }
        }
        
    }

    /**
     * Find a single item to show
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $query = $CI->PublicacionesMarcas_model->find($id);
        if(!empty($query))
        {
           echo json_encode($query[0]);
        }
        else{
            echo json_encode(['code' => '404', 'message' => 'not found']);
        }
    }

    /**
     * Shows a form to edit the data
     */

     public function edit(string $id = null)
     {
         $CI = &get_instance();
         $CI->load->model("PublicacionesMarcas_model");
         $CI->load->helper('url');
         $query = $CI->PublicacionesMarcas_model->find($id);
         if(isset($query))
         {
            $solicitud = $CI->PublicacionesMarcas_model->findAllSolicitudesMarcas();
            $tipoPub = $CI->PublicacionesMarcas_model->findAllTipoPublicacionesAct();
            $boletines = $CI->PublicacionesMarcas_model->findAllBoletinesAct();
            $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
            return $CI->load->view('marcas/publicaciones/edit', [ 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud, 'id' => $id, 'values' => $query]);
         }
         else{
            return redirect('pi/publicacionesmarcascontroller/');
         }
     }

     public function showPublicacion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $marcas = $CI->PublicacionesMarcas_model->findAll();
        $data = array();
        /*tbl_marcas_publicaciones`(`id`, `tipo_pub_id`, `marcas_id`, `boletin_id`, `tomo`, `pagina` */
        foreach ($marcas as $row){
            $data[] = array(
            'id' => $row['id'],
            'tipo_pub_id' => $CI->PublicacionesMarcas_model->findTipoPublicaciones($row['tipo_pub_id']),   
            'boletin_id' => $CI->PublicacionesMarcas_model->findBoletin($row['boletin_id']),
            'tomo' => $row['tomo'],
            'pagina' => $row['pagina'],
            
            );
        }
        echo json_encode($data);

     }

     public function addPublicacion(){
        $CI = &get_instance();
        $data = $CI->input->post();
        echo json_encode($data);
        if (!empty($data)){
            /*tbl_marcas_publicaciones`(`id`, `tipo_pub_id`, `marcas_id`, `boletin_id`, `tomo`, `pagina` */
            $insert = array(
                            'tipo_pub_id' => $data['tipo_publicacion'],
                            'marcas_id' => 1,
                            'boletin_id' => $data['boletin_publicacion'],
                            'tomo' => $data['tomo_publicacion'],
                            'pagina' => $data['pag_publicacion'],
                    );

            $CI->load->model("PublicacionesMarcas_model");
                try{
                    $query = $CI->PublicacionesMarcas_model->insert($insert);
                        if (isset($query)){
                            echo "Insertado Correctamente";

                        }else {
                            echo "No hemos podido Insertar";
                        }
                }catch (Exception $e){
                    return $e->getMessage();
                }
        }
        else {
            echo "No tiene Data";
        }
     }

     public function EditPublicacion(string $id = null){
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $query =$CI->PublicacionesMarcas_model->find($id);
        echo json_encode($query);   
     }

     public function UpdatePublicaciones(string $id = null){
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $data = $CI->input->post();
        if (!empty($data)){
            $insert = array(
                        'tipo_pub_id' => $data['tipo_publicacion'],
                        'boletin_id' => $data['boletin_publicacion'],
                        'tomo' => $data['tomo_publicacion'],
                        'pagina' => $data['pag_publicacion'],
                    );
                   

                    $query = $CI->PublicacionesMarcas_model->update($id, $insert);
                    if (isset($query))
                    {
                        echo "Actualizado Correctamente";
                    }
        } else {
            echo "No tiene Data";
        }
    }
    // public function edit(string $id = null)
    // {
    //     $CI = &get_instance();
    //     $CI->load->model("PublicacionesMarcas_model");
    //     $CI->load->helper('url');
    //     $query = $CI->PublicacionesMarcas_model->find($id);
    //     $fields = $CI->PublicacionesMarcas_model->getFillableFields();
    //     $boletines = array();
    //     foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
    //     {
    //         $boletines[$row['boletin_id']] = $row['nombre'];

    //     }
    //     $paises = array();
    //     foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
    //     {
    //         $paises[$row['pais_id']] = $row['nombre'];
    //     }
    //     $tipoPub = array();
    //     foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
    //     {
    //         $tipoPub[$row['tipo_pub_id']] = $row['nombre'];
    //     }
    //     $solicitud = array();
    //     foreach($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas() as $row)
    //     {
    //         $solicitud[$row['solicitud_id']] = $row['reg_num_id'];
    //     }
    //     $inputs = array();
    //     $labels = array();
    //     foreach($fields as $field)
    //     {
    //         if($field['type'] == 'INT')
    //         {
    //             $inputs[] = array(
    //                 'name' => $field['name'],
    //                 'id'   => $field['name'],
    //                 'type' => 'range',
    //                 'class' => 'form-control'
    //             );
    //         }
    //         else{
    //             $inputs[] = array(
    //                 'name' => $field['name'],
    //                 'id'   => $field['name'],
    //                 'type' => 'text',
    //                 'class' => 'form-control'
    //             );
    //         }
    //     }
    //     if(!empty($query))
    //     {
    //         $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
    //         return $CI->load->view('marcas/publicaciones/edit', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud, 'id' => $id, 'values' => $query]);
    //     }
    //     else{
    //         return redirect('pi/publicacionesmarcascontroller/');
    //     }
    // }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'tipo_pub_id',
                'label' => 'Tipo Publicacion',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un tipo de solicitud',
                    'regex_match' => 'El tipo de solicitud no es valido',
                ]
            ],
            [
                'field' => 'boletin_id',
                'label' => 'Boletin',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un boletin de procedencia',
                    'regex_match' => 'El número de boletin no es valído',
                ]
            ],
            [
                'field' => 'tomo',
                'label' => 'Tomo',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de tomo',
                    'regex_match' => 'El número de tomo no es valido',
                ]
            ],
            [
                'field' => 'pagina',
                'label' => 'Pagina',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de Pagina',
                    'regex_match' => 'El número de Pagina no es valido',
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
            $query = $CI->PublicacionesMarcas_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/publicacionesmarcascontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $query = $CI->PublicacionesMarcas_model->delete($id);
        return redirect('pi/publicacionesmarcascontroller/');
        
        
    }

    public function addPublicacionMarcas($id = null)
    {
        $CI = &get_instance();
        $CI->load->model('PublicacionesMarcas_model');
        $form = $CI->input->post();
        $query = $CI->PublicacionesMarcas_model->insert([
            'tipo_pub_id' => $form['tipo_publicacion'],
            'boletin_id'  => $form['boletin_publicacion'],
            'marcas_id'   => $id,
            'tomo'        => $form['tomo_publicacion'],
            'pagina'      => $form['pag_publicacion'],
            'fecha'       => date('Y-m-d'),
        ]);
        if($query)
        {
            echo json_encode(['code' => 200, 'message' => 'Publicacion cargada exitosamente']);
        }
    }

    public function getAllPublicacionesByMarca($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model('PublicacionesMarcas_model');
        $query = $CI->PublicacionesMarcas_model->findAllByMarcas($id);
        $result = array();
        if(!empty($query))
        {
            foreach($query as $row)
            {
                $result[] = [
                    'fecha'         => date('d/m/Y', strtotime($row['fecha'])),
                    'boletin_id'    => $row['boletin_id'],
                    'tomo'          => $row['tomo'],
                    'pagina'        => $row['pagina'],
                    'nombre'        => $row['nombre'],
                    'acciones'      => '<button class="btn btn-light editPublicacion" id='.$row['id'].'><i class="fas fa-edit"></i>Editar</button>
                                        <button type="button" class="btn btn-danger deletePublicacion" id='.$row['id'].'><i class="fas fa-trash"></i>Borrar</button>'
                ];
            }
            echo json_encode(['code' => 200, 'message' => 'Consulta realizada exitosamente', 'data' => $result]);
        }
    }

    public function updatePublicacionByMarca($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model('PublicacionesMarcas_model');
        $form = $CI->input->post();
        $data = array(
            'tipo_pub_id' => $form['tipo_pub_id'],
            'boletin_id'  => $form['boletin_id'],
            'tomo'        => $form['tomo'],
            'pagina'      => $form['pagina'],
            'marcas_id'   => $form['marcas_id'],
        );
        $query = $CI->PublicacionesMarcas_model->update($form['id'], $data);
        if($query)
        {
            echo json_encode(['code' => 200, 'message' => 'editado exitosamente']);
        }
    }

    public function deletePublicacionByMarca($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model('PublicacionesMarcas_model');
        $query = $CI->PublicacionesMarcas_model->delete($id);
        if($query)
        {
            echo json_encode(['code' => 200, 'message' => 'borrado exitosamente']);
        }
    }

    public function destroyPublicacion(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $query = $CI->PublicacionesMarcas_model->delete($id);
        if (isset($query)){
            echo "Eliminado Correctamente";
        }else {
            echo "No se ha podido Eliminar";
        }
        
        
    }
}