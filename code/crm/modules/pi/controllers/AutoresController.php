<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoresController extends AdminController
{
    protected $models = ['Autores_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Autores_model");
        $CI->load->library('pagination');
        $data = [
            'Pais'               => $CI->Autores_model->findAllPaises()
        ];
        return $CI->load->view('Autores/index', ["Autores" => $data]);
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
        $CI->load->model("Autores_model");
        $fields = $CI->Autores_model->getFillableFields();
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
        $data = [
            'Pais'               => $CI->Autores_model->findAllPaises()
        ];
        $labels = ['Id', 'Nombres', 'Apellidos', 'Fecha Nacimiento', 'Pais Nacimiento', 'Cédula', 'RFC', 'Email', 'Teléfono', 'Fax', "Direccion", "Ciudad", "Estado", 'Código Postal', 'Pais Residencia'];
        return $CI->load->view('Autores/create', ['fields' => $inputs, 'labels' => $labels, 'Autores' => $data]);
    }

    private function ValidationsForm(){
        $CI = &get_instance();
        $CI->load->helper(['url','form','email']);
        $CI->load->library('form_validation');
        //we validate the data
         $config = array(
            [
                'field' => 'nombres',
                'label' => 'Nombres',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un Nombre',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
            [
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un Apellido',
                    'min_length' => 'Apellido demasiado corto',
                    'max_lenght' => 'Apellido demasiado largo'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|valid_email|min_length[8]|max_length[100]',
                'errors' => [
                    'min_length' => 'Email demasiado corto',
                    'max_lenght' => 'Email demasiado largo',
                    'valid_email' => 'Email no válido'
                ]
            ],
            [
                'field' => 'cedula',
                'label' => 'Cédula',
                'rules' => 'trim|numeric|min_length[4]|max_length[10]',
                'errors' => [
                    'min_length' => 'Cédula demasiado corta',
                    'max_lenght' => 'Cédula demasiado larga',
                    'numeric' => 'La cédula debe contener solo números'
                ]
            ],
            [
                'field' => 'telefono',
                'label' => 'Teléfono',
                'rules' => 'trim|numeric|min_length[5]|max_length[30]',
                'errors' => [
                    'min_length' => 'Teléfono demasiado corto',
                    'max_lenght' => 'Teléfono demasiado largo',
                    'numeric' => 'El número de Teléfono debe contener solo números'
                ]
            ],
            [
                'field' => 'fax',
                'label' => 'Fax',
                'rules' => 'trim|numeric|min_length[5]|max_length[30]',
                'errors' => [
                    'min_length' => 'Fax demasiado corto',
                    'max_lenght' => 'Fax demasiado largo',
                    'numeric' => 'El número de Fax debe contener solo números'
                ]
            ],
            [
                'field' => 'direccion',
                'label' => 'Dirección',
                'rules' => 'trim|min_length[5]|max_length[200]',
                'errors' => [
                    'min_length' => 'Dirección demasiada corta',
                    'max_lenght' => 'Dirección demasiada larga'
                ]
            ],
            [
                'field' => 'ciudad',
                'label' => 'Ciudad',
                'rules' => 'trim|min_length[3]|max_length[20]',
                'errors' => [
                    'min_length' => 'Ciudad demasiada corta',
                    'max_lenght' => 'Ciudad demasiada larga'
                ]
            ],
            [
                'field' => 'estado',
                'label' => 'Estado',
                'rules' => 'trim|min_length[3]|max_length[20]',
                'errors' => [
                    'min_length' => 'Estado demasiada corto',
                    'max_lenght' => 'Estado demasiada largo'
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
        $CI->load->model("Autores_model");
        if($this->ValidationsForm() == FALSE)
        {
            $this->LoadPage();
        }
        else
        {
            // WE prepare the data
            $data = $CI->input->post();
            foreach($data as $key => $valor){
                $data[$key] = empty($data[$key]) ? null : $valor;
            }
            
            //we sent the data to the model
            $query = $CI->Autores_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/Autorescontroller/'));
            }
        }
        
    }

    public function filterSearch()
    {
        $CI = &get_instance();
        $CI->load->model('Autores_model');
        $form = json_decode($CI->input->post('data'), TRUE);
        $result = array();
        $query = array();
        $url_delete = admin_url('pi/AutoresController/destroy/');
        $url_edit = admin_url('pi/AutoresController/edit/');
        foreach($form as $key => $value)
        {
            if($value === '')
            {
                unset($form[$key]);
            }
        }
        if(empty($form))
        {
            $query = $CI->Autores_model->findAll();
            if(!empty($query))
            {
                foreach($query as $row){

                    $result[] = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombres'],
                        'apellido' => $row['apellidos'],
                        'pais_id_nac'   => $CI->Autores_model->searchPaises($row['pais_id_nac']),
                        'pais_id_res'   => $CI->Autores_model->searchPaises($row['pais_id_res']),
                        'acciones' => "<div class=\"row row-group\">
                        <div class=\"col-md-6\"><a class='btn btn-primary' href='{$url_edit}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a></div>
                        <div class=\"col-md-6\"><form method='DELETE' action='{$url_delete}{$row["id"]}' onsubmit=\"return confirm('¿Esta seguro de eliminar este registro?')\">
                        <button type='submit' class='btn btn-danger col-mrg'><i class='fas fa-trash'></i>Borrar</button>
                        </form></div></div>",
                    );
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);   
            }
            else
            {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            } 
        }
        else{
            $query = $CI->Autores_model->searchWhere($form);
            if(!empty($query))
            {
                foreach($query as $row)
                {
                    $result[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombres'],
                        'apellido' => $row['apellidos'],
                        'pais_id_nac'   => $row['pais_nac'],
                        'pais_id_res'   => $row['pais_res'],
                        'acciones' => "<div class=\"row row-group\">
                        <div class=\"col-md-6\"><a class='btn btn-primary' href='{$url_edit}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a></div>
                        <div class=\"col-md-6\"><form method='DELETE' action='{$url_delete}{$row["id"]}' onsubmit=\"return confirm('¿Esta seguro de eliminar este registro?')\">
                        <button type='submit' class='btn btn-danger col-mrg'><i class='fas fa-trash'></i>Borrar</button>
                        </form></div></div>",
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);   
            }
            else{
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        }
    }

     /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Autores_model");
        $CI->load->helper('url');
        $query = $CI->Autores_model->find($id);

        $fields = $CI->Autores_model->getFillableFields();
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
            array_push($labels, $field['name']);
        }
        $data = [
            'Pais'               => $CI->Autores_model->findAllPaises()
        ];

        if(isset($query))
        {
            //$labels = array('Id', 'Nombres', 'Apellidos', 'fecha_nac', );
            return $CI->load->view('Autores/edit', ['fields' => $inputs, 'labels' => $labels, 'values' => $query[0], 'id' => $id, 'Autores' => $data]);
        }
        else{
            return redirect('pi/Autorescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Autores_model");

        if($this->ValidationsForm() == FALSE)
        {
            $this->edit($id);
        }
        else
        {
            //We prepare the data 
            $data = $CI->input->post();
            foreach($data as $key => $valor){
                $data[$key] = empty($data[$key]) ? null : $valor;
            }

            $query = $CI->Autores_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/Autorescontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Autores_model");
        $CI->load->helper('url');
        $query = $CI->Autores_model->delete($id);
        return redirect('pi/Autorescontroller/');
        
        
    }
}