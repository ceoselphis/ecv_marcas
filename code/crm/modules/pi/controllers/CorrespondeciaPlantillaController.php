<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'C:\laragon\www\ecv_marcas\vendor\autoload.php';
require 'C:\laragon\www\ecv_marcas\vendor\michelf\php-markdown\Michelf\Markdown.php';
use League\HTMLToMarkdown\HtmlConverter;
use Michelf\Markdown;
class CorrespondeciaPlantillaController extends AdminController
{
    
    protected $models = ['CorrespondenciaPlantilla_model'];

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ResumirContenido($content){
        $caracter = '=';
        $pos = strpos($content, $caracter);
        if ($pos===false){
            return $content;
        }else {

            $substring = strstr($content, $caracter, true);
            return $substring;
        }
    }

    public function index()
    {   $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        $query = $CI->CorrespondenciaPlantilla_model->findAll();
        $data = array();
        foreach ($query as $row){
            $data[] = array(
                'id' => $row['id'],
                'descripcion' => $row['descripcion'],
                'staff_id' => $CI->CorrespondenciaPlantilla_model->BuscarStaff($row['staff_id']),
                'content' => $this->ResumirContenido($row['content']),
                'materia' => $CI->CorrespondenciaPlantilla_model->BuscarMaterias($row['materia_id']),
                //'idioma' => $row['idioma']
            );
        }
        return $CI->load->view('correspondecia/plantilla/index', array('correspondencia' => $data));
      
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {

        $CI = &get_instance();
        //return  $CI->load->view('correspondecia/create');
        $CI->load->model("CorrespondenciaPlantilla_model");
        $fields = $CI->CorrespondenciaPlantilla_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $data = array();
        $idioma = array('us','es','it');
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

        
        $labels = ['id', 'Descripcion','Staff' ,'Contenido','Materia'];
        //return $CI->load->view('correspondecia/create', ['data' => $data]);
    
        return $CI->load->view('correspondecia/plantilla/create', [
        'fields' => $inputs, 
        'labels' => $labels,
        'materia' => $CI->CorrespondenciaPlantilla_model->findAllMaterias(),
        'staffid' => $CI->CorrespondenciaPlantilla_model->findAllStaff(),
        'idioma' => $idioma
    ]);
    }

    /**
     * Recive the data for create a new item
     */

     public function store()
    {
        $idioma = array('us','es','it');
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        $converter = new HtmlConverter();
        $data['content'] = $converter->convert($data['content']);
        $data['idioma'] = $idioma[$data['idioma']];
        $data['createdAt'] = date('Y-m-d h:i:s');
        $data['updatedAt'] = date('Y-m-d h:i:s');
        $query = $CI->CorrespondenciaPlantilla_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/CorrespondeciaPlantillaController/'));
            }
        
        
    }
    // public function store()
    // {
    //     $CI = &get_instance();
    //     $CI->load->model("CorrespondeciaUsuario_model");
    //     $CI->load->helper(['url','form']);
    //     $CI->load->library('form_validation');
    //     // WE prepare the data
    //     $data = $CI->input->post();
        
    //     //we validate the data
    //     //we set the rules
    //     $config = array(
    //         [
    //             'field' => 'client_id',
    //             'label' => 'Cliente',
    //             'rules' => 'trim|required|min_length[3]|max_length[60]',
    //             'errors' => [
    //                 'required' => 'Debe escoger el nombre del cliente',
    //                 'min_length' => 'Nombre demasiado corto',
    //                 'max_lenght' => 'Nombre demasiado largo'
    //             ]
    //         ],
    //         [
    //             'field' => 'expediente',
    //             'label' => 'Expediente',
    //             'rules' => 'trim|required|min_length[3]|max_length[60]',
    //             'errors' => [
    //                 'required' => 'Introduzca el expediente',
    //                 'min_length' => 'Nombre demasiado corto',
    //                 'max_lenght' => 'Nombre demasiado largo'
    //             ]
    //         ],
    //         [
    //             'field' => 'staff_id',
    //             'label' => 'staff_id',
    //             'rules' => 'trim|required|min_length[1]|max_length[10]',
    //             'errors' => [
    //                 'required' => 'Debe escoger el staff',
    //                 'min_length' => 'Nombre demasiado corto',
    //                 'max_lenght' => 'Nombre demasiado largo'
    //             ]
    //         ],
    //         [
    //             'field' => 'plantilla_id',
    //             'label' => 'plantilla_id',
    //             'rules' => 'trim|required|min_length[1]|max_length[10]',
    //             'errors' => [
    //                 'required' => 'Debe escoger la plantilla_id',
    //                 'min_length' => 'Nombre demasiado corto',
    //                 'max_lenght' => 'Nombre demasiado largo'
    //             ]
    //         ],
    //     );
    //      $CI->form_validation->set_rules($config);
    //     //  var_dump($data);
    //     //  die();
    //     if($CI->form_validation->run() == FALSE)
    //     {
    //         $fields = $CI->CorrespondeciaUsuario_model->getFillableFields();
    //         $inputs = array();
    //         $labels = array();
    //         $data = array();
    //         // var_dump($fields);
    //         // die();
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
        
    //     $labels = ['id', 'Cliente','Expediente','staff_id' ,'Plantilla_id'];
    //     return $CI->load->view('correspondecia/create', [
    //         'fields' => $inputs, 
    //         'labels' => $labels,
    //         'clientes' => $CI->CorrespondeciaUsuario_model->findAllClients(),
    //     ]);
    //     }
    //     else
    //     {
    //         //we sent the data to the model
    //         $query = $CI->CorrespondeciaUsuario_model->insert($data);
    //         if(isset($query))
    //         {
    //             return redirect(admin_url('pi/CorrespondeciaUsuarioController/'));
    //         }
    //     }
        
    // }

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
        $CI->load->model("CorrespondenciaPlantilla_model");
        $CI->load->helper('url');
        $idioma = array('us','es','it');
        $query = $CI->CorrespondenciaPlantilla_model->find($id);
        $clave = array_search( $query[0]['idioma'],$idioma);
        if(isset($query))
        {
            $res = new Markdown();
            $query[0]['content'] = $res->defaultTransform($query[0]['content']);
            $labels = ['id', 'Descripcion','Staff' ,'Contenido','Materia'];
            return $CI->load->view('correspondecia/plantilla/edit', ['labels' => $labels, 'values' => $query, 'id' => $id,
            'materia' => $CI->CorrespondenciaPlantilla_model->findAllMaterias(),
            'staffid' => $CI->CorrespondenciaPlantilla_model->findAllStaff(),
            'idioma' =>  $idioma,
            'clave' => $clave

        ]);
            
        }
        else{
            return redirect('pi/CorrespondeciaPlantillaController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

     public function update(string $id = null)
    {
        $idioma = array('us','es','it');
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['idioma'] = $idioma[$data['idioma']];
        $data['updatedAt'] = date('Y-m-d h:i:s');
        $converter = new HtmlConverter();
        $data['content'] = $converter->convert($data['content']);
            $query = $CI->CorrespondenciaPlantilla_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/CorrespondeciaPlantillaController/');
            }
        
    }
    // public function update(string $id = null)
    // {
    //     $CI = &get_instance();
    //     $CI->load->model("CorrespondeciaUsuario_model");
    //     $CI->load->helper('url');
    //     $data = $CI->input->post();
    //     //We validate the data
    //     $CI->load->helper(['url','form']);
    //     $CI->load->library('form_validation');
    //     //we validate the data
    //     //we set the rules
    //     $config = array(
    //         [
    //             'field' => 'nombre_anexo',
    //             'label' => 'Nombre del Anexo',
    //             'rules' => 'trim|required|min_length[3]|max_length[60]',
    //             'errors' => [
    //                 'required' => 'Debe indicar un nombre para el anexo',
    //                 'min_length' => 'Nombre demasiado corto',
    //                 'max_lenght' => 'Nombre demasiado largo'
    //             ]
    //         ],
    //     );
    //     $CI->form_validation->set_rules($config);
    //     if($CI->form_validation->run() == FALSE)
    //     {
    //         $this->edit($id);
    //     }
    //     else
    //     {
    //         //We prepare the data 
    //         $query = $CI->CorrespondeciaUsuario_model->update($id, $data);
    //         if (isset($query))
    //         {
    //             return redirect('pi/CorrespondeciaPlantillaController/');
    //         }
    //     }
    // }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        $CI->load->helper('url');
        $query = $CI->CorrespondenciaPlantilla_model->delete($id);
        return redirect('pi/CorrespondeciaPlantillaController/');
        
        
    }
}