<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorrespondeciaUsuarioController extends AdminController
{
    protected $models = ['CorrespondeciaUsuario_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {   
        $CI = &get_instance();
        return $CI->load->view('correspondecia/usuario/index');
    }

    //**Cargar data al Datatable */
    public function loadData(){
        $CI = &get_instance();
        $CI->load->model("CorrespondeciaUsuario_model");
        $query = $CI->CorrespondeciaUsuario_model->findAll();
        $url_delete = admin_url('pi/CorrespondeciaUsuarioController/destroy/');
        $url_edit = admin_url('pi/CorrespondeciaUsuarioController/edit/');
        $result = array();
        $data = array();
        if(!empty($query)){
            foreach ($query as $row){
                $data[] = array(
                    'id' => $row['id'],
                    'cliente' => $row['company'],
                    'expediente' => $row['expediente'],
                    'staff_id' => $row['staff'],
                    'plantilla_id' => $row['descripcion'],
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
        $CI->load->model("CorrespondeciaUsuario_model");
        $fields = $CI->CorrespondeciaUsuario_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $data = array();
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
        
        $labels = ['id', 'Cliente','Expediente','Staff' ,'Plantilla'];
    
        return $CI->load->view('correspondecia/usuario/create', [
            'fields' => $inputs, 
            'labels' => $labels,
            'clientes' => $CI->CorrespondeciaUsuario_model->findAllClients(),
            'staffid' => $CI->CorrespondeciaUsuario_model->findAllStaff(),
            'plantilla' => $CI->CorrespondeciaUsuario_model->findAllPlantilla()
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
        $CI->load->model("CorrespondeciaUsuario_model");
        if($this->ValidationsForm() == FALSE){
            $this->LoadPage();
        }else{
            // WE prepare the data
            $data = $CI->input->post();
            $data['createdAt'] = date('Y-m-d h:i:s');
            $data['updatedAt'] = date('Y-m-d h:i:s');
            $query = $CI->CorrespondeciaUsuario_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/CorrespondeciaUsuarioController/'));
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
                'field' => 'cliente',
                'label' => 'Cliente',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar un Cliente'
                ]
            ],
            [
                'field' => 'expediente',
                'label' => 'Expediente',
                'rules' => 'trim|required|min_length[2]|max_length[10]',
                'errors' => [
                    'required' => 'Debe indicar un Expediente',
                    'min_length' => 'Expediente demasiado corto',
                    'max_length' => 'Expediente demasiado largo'
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
                'field' => 'plantilla_id',
                'label' => 'Plantilla',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Debe indicar una Plantilla'
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
        $CI->load->model("CorrespondeciaUsuario_model");
        $CI->load->helper('url');
        $query = $CI->CorrespondeciaUsuario_model->find($id);
        if(isset($query))
        {
            $labels = ['id', 'Cliente','Expediente','Staff' ,'Plantilla'];
            return $CI->load->view('correspondecia/usuario/edit', [
            'labels' => $labels, 
            'values' => $query, 
            'id' => $id,
            'clientes' => $CI->CorrespondeciaUsuario_model->findAllClients(),
            'staffid' => $CI->CorrespondeciaUsuario_model->findAllStaff(),
            'plantilla' => $CI->CorrespondeciaUsuario_model->findAllPlantilla()
        ]);
        }
        else{
            return redirect('pi/CorrespondeciaUsuarioController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

     public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondeciaUsuario_model");
        if($this->ValidationsForm() == FALSE){
            $this->edit($id);
        }else{
            $data = $CI->input->post();
            $data['updatedAt'] = date('Y-m-d h:i:s');
            $query = $CI->CorrespondeciaUsuario_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/CorrespondeciaUsuarioController/');
            }
    
        }
    }


    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondeciaUsuario_model");
        $CI->load->helper('url');
        $query = $CI->CorrespondeciaUsuario_model->delete($id);
        return redirect('pi/CorrespondeciaUsuarioController/');
        
        
    }
}