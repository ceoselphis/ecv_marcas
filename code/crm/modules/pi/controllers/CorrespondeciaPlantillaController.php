<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'modules/pi/vendor/autoload.php';
#require 'C:\laragon\www\ecv_marcas\vendor\michelf\php-markdown\Michelf\Markdown.php';
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
        return $CI->load->view('correspondecia/plantilla/index');
    }
    
    //**Cargar data al Datatable */
    public function loadData(){
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        $query = $CI->CorrespondenciaPlantilla_model->findAll();
        $url_delete = admin_url('pi/CorrespondeciaPlantillaController/destroy/');
        $url_edit = admin_url('pi/CorrespondeciaPlantillaController/edit/');
        $result = array();
        $data = array();
        if(!empty($query)){
            foreach ($query as $row){
                $data[] = array(
                    'id' => $row['id'],
                    'descripcion' => $row['descripcion'],
                    'staff_id' => $row['staff'],
                    'content' => $this->ResumirContenido($row['content']),
                    'materia' => $row['nombre'],
                    'acciones' => "<div class=\"row row-group\">
                    <div class=\"col-md-2 col-md-offset-2\"><a class='btn btn-primary' href='{$url_edit}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a></div>
                    <div class=\"col-md-8\"><form method='DELETE' action='{$url_delete}{$row["id"]}' onsubmit=\"return confirm('¿Esta seguro de eliminar este registro?')\">
                    <button type='submit' class='btn btn-danger col-mrg'><i class='fas fa-trash'></i>Borrar</button>
                    </form></div></div>"
                );
            }
            $result['data'] = $data;
        }else{
            $result['data'] = [];
        }
        echo json_encode($result);
    }

    private function LoadPage(){
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
     * Shows the form to create a new item
     */

    public function create()
    {
        $this->LoadPage();
    }

    /**
     * Recive the data for create a new item
     */

     public function store()
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        if($this->ValidationsForm() == FALSE){
            $this->LoadPage();
        }else{
            // WE prepare the data
            //$idioma = array('us','es','it');
            $data = $CI->input->post();
            $converter = new HtmlConverter();
            $data['content'] = $converter->convert($data['content']);
            //$data['idioma'] = $idioma[$data['idioma']];
            $data['createdAt'] = date('Y-m-d h:i:s');
            $data['updatedAt'] = date('Y-m-d h:i:s');
            $query = $CI->CorrespondenciaPlantilla_model->insert($data);
                if(isset($query))
                {
                    return redirect(admin_url('pi/CorrespondeciaPlantillaController/'));
                }
            }
    }

    private function ValidationsForm(){
        $CI = &get_instance();
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
         $config = array(
            [
                'field' => 'descripcion',
                'label' => 'Descripción',
                'rules' => 'trim|required|min_length[5]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar una Descripción',
                    'min_length' => 'Descripción demasiada corta',
                    'max_length' => 'Descripción demasiada larga'
                ]
            ],
            [
                'field' => 'staff_id',
                'label' => 'Staff',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar un Responsable'
                ]
            ],
            [
                'field' => 'materia_id',
                'label' => 'Materia',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar una Materia'
                ]
            ],
            [
                'field' => 'content',
                'label' => 'Contenido',
                'rules' => 'trim|required|min_length[10]',
                'errors' => [
                    'required' => 'Debe indicar un Contenido',
                    'min_length' => 'Contenido demasiado corto'
                ]
            ]
        );
        //we set the rules
        $CI->form_validation->set_rules($config);
       return $CI->form_validation->run();
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
        $CI->load->model("CorrespondenciaPlantilla_model");
        $CI->load->helper('url');
        $query = $CI->CorrespondenciaPlantilla_model->find($id);
        if(isset($query))
        {
            $res = new Markdown();
            $query[0]['content'] = $res->defaultTransform($query[0]['content']);
            $labels = ['id', 'Descripcion','Staff' ,'Contenido','Materia'];
            return $CI->load->view('correspondecia/plantilla/edit', ['labels' => $labels, 'values' => $query, 'id' => $id,
            'materia' => $CI->CorrespondenciaPlantilla_model->findAllMaterias(),
            'staffid' => $CI->CorrespondenciaPlantilla_model->findAllStaff(),
            ]);
            
        }else{
            return redirect('pi/CorrespondeciaPlantillaController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

     public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondenciaPlantilla_model");
        if($this->ValidationsForm() == FALSE){
            $this->edit($id);
        }else{
            $data = $CI->input->post();
            $data['updatedAt'] = date('Y-m-d h:i:s');
            $converter = new HtmlConverter();
            $data['content'] = $converter->convert($data['content']);
            $query = $CI->CorrespondenciaPlantilla_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/CorrespondeciaPlantillaController/');
            }
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
    //                 'max_length' => 'Nombre demasiado largo'
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