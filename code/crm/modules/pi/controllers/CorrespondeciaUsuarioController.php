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
    {   $CI = &get_instance();
        $CI->load->model("CorrespondeciaUsuario_model");
        $query = $CI->CorrespondeciaUsuario_model->findAll();
        $data = array();
        foreach ($query as $row){
         //   $cliente = $CI->CorrespondeciaUsuario_model->findClients($row['cliente']);
          // $staff = $CI->CorrespondeciaUsuario_model->findStaff($row['staff_id']);
            $data[] = array(
                'id' => $row['id'],
                'cliente' => $CI->CorrespondeciaUsuario_model->BuscarClients($row['cliente']),
                'expediente' => $row['expediente'],
                'staff_id' => $CI->CorrespondeciaUsuario_model->BuscarStaff($row['staff_id']),
                'plantilla_id' => $row['plantilla_id'],
            );
        }
        
        return $CI->load->view('correspondecia/usuario/index', array('correspondencia' => $data));
      
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {

        $CI = &get_instance();
        //return  $CI->load->view('correspondecia/create');
        $CI->load->model("CorrespondeciaUsuario_model");
        $fields = $CI->CorrespondeciaUsuario_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $data = array();
        // var_dump($fields);
        // die();
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
        //return $CI->load->view('correspondecia/create', ['data' => $data]);
    
        return $CI->load->view('correspondecia/usuario/create', [
        'fields' => $inputs, 
        'labels' => $labels,
        'clientes' => $CI->CorrespondeciaUsuario_model->findAllClients(),
        'staffid' => $CI->CorrespondeciaUsuario_model->findAllStaff()
    ]);
    }

    /**
     * Recive the data for create a new item
     */

     public function store()
    {
        $CI = &get_instance();
        $CI->load->model("CorrespondeciaUsuario_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
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
        $CI->load->model("CorrespondeciaUsuario_model");
        $CI->load->helper('url');
        $query = $CI->CorrespondeciaUsuario_model->find($id);
        if(isset($query))
        {
            $labels = ['id', 'Cliente','Expediente','Staff' ,'Plantilla'];
            return $CI->load->view('correspondecia/usuario/edit', ['labels' => $labels, 'values' => $query, 'id' => $id,'clientes' => $CI->CorrespondeciaUsuario_model->findAllClients(),
            'staffid' => $CI->CorrespondeciaUsuario_model->findAllStaff()]);
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
        $CI->load->helper('url');
        $data = $CI->input->post();
        $data['updatedAt'] = date('Y-m-d h:i:s');
        //We validate the data
        //we validate the data
        //we set the rules
        //We prepare the data 
            $query = $CI->CorrespondeciaUsuario_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/CorrespondeciaUsuarioController/');
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
    //             return redirect('pi/CorrespondeciaUsuarioController/');
    //         }
    //     }
    // }

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