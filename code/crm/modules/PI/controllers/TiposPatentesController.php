<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TiposPatentesController extends AdminController
{
    protected $models = ['TipoPatentes_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $data = array();
        foreach($CI->TipoPatentes_model->findAll() as $row)
        {
            $data[] = [
                'tip_pat_id' => $row['tip_pat_id'],
                'nombre_tipo' => $row['nombre_tipo'],
            ];
        }
        return $CI->load->view('TiposPatentes/index', ["TiposPatentes" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $fields = $CI->TipoPatentes_model->getFillableFields();
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
        $labels = ['Id', 'Nombre',];
        return $CI->load->view('TiposPatentes/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre_tipo',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->TipoPatentes_model->getFillableFields();
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
            $labels = ['Id', 'Nombre'];
            return $CI->load->view('TiposPatentes/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->TipoPatentes_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/tipospatentescontroller/'));
            }
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $query = $CI->TipoPatentes_model->find($id);
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
    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $CI->load->helper('url');
        $query = $CI->TipoPatentes_model->find($id);
        if(isset($query))
        {
            $labels = $labels = ['Id', 'Nombre de evento'];
            return $CI->load->view('TiposPatentes/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/tipospatentescontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre_tipo',
                'label' => 'Nombre',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre',
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
            $query = $CI->TipoPatentes_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/tipospatentescontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("TipoPatentes_model");
        $CI->load->helper('url');
        $query = $CI->TipoPatentes_model->delete($id);
        return redirect('pi/tipospatentescontroller/');
        
        
    }
}