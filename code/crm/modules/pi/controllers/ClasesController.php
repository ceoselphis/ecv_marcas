<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClasesController extends AdminController
{
    protected $models = ['Clases_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        return $CI->load->view('clases/index', ["clases" => $CI->Clases_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $fields = $CI->Clases_model->getFillableFields();
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
        $labels = ['Id', 'Nombre de clase','Descripcion', 'Version', 'Activo'];
        return $CI->load->view('clases/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre de la clase',
                'rules' => 'trim|required|min_length[3]|max_length[60]|',
                'errors' => [
                    'required' => 'Debe Indicar un nombre de clase',
                    'min_length' => 'El número debe ser mayor de tres digitos',
                    'max_lenght' => 'El número debe ser menor a sesenta digitos',
                ]
            ],
            [
                'field' => 'descripcion',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[10]',
                'errors' => [
                    'required' => 'Debe indicar los productos de la clase',
                    'min_length' => 'El texto debe ser mayor de 10 caracteres',
                    'max_lenght' => 'El texto debe ser menor a 250 caracteres'
                ]
            ],
            [
                'field' => 'version',
                'label' => 'Version',
                'rules' => 'trim|required|max_length[2]|regex_match[/[0-9][0-9]/]',
                'errors' => [
                    'required' => 'Debe indicar la version de la clase',
                    'max_lenght' => 'El texto debe ser menor a 2 caracteres',
                    'regex_match' => 'El número de versión debe ser númerico'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->Clases_model->getFillableFields();
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
            $labels = ['Id', 'Nombre de clase','Descripcion', 'Version', 'Activo'];
            return $CI->load->view('clases/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->Clases_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/clasescontroller/'));
            }
        }
        
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $query = $CI->Clases_model->find($id);
        if(isset($query))
        {
            $table = '<table class="table"><thead><tr>';
            foreach(['Nombre', 'Productos'] as $item)
            {
                $table .= '<th>'.$item.'</th>';
            }
            $table .= '</thead><tbody><tr>';
            foreach($query as $row)
            {
                $table .= "
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                        ";
            }
            $table .= '</tr></tbody></table>';
            echo $table;
        }
        else{
            $table = '<table class="table"><thead><tr>Nombre</tr><tr>Descripcion</tr></thead><tbody><tr><td colspan="2">Sin Registros</td></tr></tbody></table>';
        }
    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $CI->load->helper('url');
        $query = $CI->Clases_model->find($id);
        if(isset($query))
        {
            $fields = array_keys($query[0]);
            $values = array_values($query[0]);
            $labels = ['Id', 'Nombre de clase','Descripcion', 'Version', 'Activo'];
            return $CI->load->view('clases/edit', ['labels' => $labels, 'values' => $values, 'id' => $id, 'fields' => $fields]);
        }
        else{
            return redirect('pi/clasescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'descripcion',
                'label' => 'Descripcion',
                'rules' => 'trim|required|min_length[10]',
                'errors' => [
                    'required' => 'Debe indicar los productos de la clase',
                    'min_length' => 'El texto debe ser mayor de 10 caracteres',
                    'max_lenght' => 'El texto debe ser menor a 250 caracteres'
                ]
            ],
            [
                'field' => 'version',
                'label' => 'Version',
                'rules' => 'trim|required|max_length[2]|regex_match[/[0-9][0-9]/]',
                'errors' => [
                    'required' => 'Debe indicar la version de la clase',
                    'max_lenght' => 'El texto debe ser menor a 2 caracteres',
                    'regex_match' => 'El número de versión debe ser númerico'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $query = $CI->Clases_model->find($id);
            $fields = array_keys($query[0]);
            $values = array_values($query[0]);
            if(isset($query))
            {
                $labels = ['Id', 'Nombre de clase','Descripcion', 'Version', 'Activo'];
                return $CI->load->view('clases/edit', ['labels' => $labels, 'values' => $values, 'id' => $id, 'fields' => $fields]);
            }
            else{
                return redirect('pi/clasescontroller/');
            }
        }
        else
        {
            //We prepare the data 
            $query = $CI->Clases_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/clasescontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Clases_model");
        $CI->load->helper('url');
        $query = $CI->Clases_model->delete($id);
        return redirect('pi/clasescontroller/');
        
        
    }
}