<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TiposEventosController extends AdminController
{
    protected $models = ['TiposEventos_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $data = array();
        foreach($CI->TiposEventos_model->findAll() as $row)
        {
            $data[] = [
                'tipo_eve_id' => $row['tipo_eve_id'],
                'nombre' => $row['nombre'],
                'materia_id' => $CI->TiposEventos_model->getMateria($row['materia_id'])[0]['descripcion'],
                'created_at' => $row['created_at'],
                'modified_at' => $row['modified_at'],
                'created_by'  => $CI->TiposEventos_model->getStaff($row['created_by'])[0]['firstname'].' '.$CI->TiposEventos_model->getStaff($row['created_by'])[0]['lastname'],
            ];
        }
        return $CI->load->view('TiposEventos/index', ["TiposEventos" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $fields = $CI->TiposEventos_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $materias = $CI->TiposEventos_model->getAllMaterias();
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
        $labels = ['Id', 'Nombre de tipo de evento', "Materia", "Fecha de Creacion"];
        return $CI->load->view('TiposEventos/create', ['fields' => $inputs, 'labels' => $labels, "materias" => $materias]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre del tipo de evento',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre para el evento',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->TiposEventos_model->getFillableFields();
            $inputs = array();
            $labels = array();
            $materias = $CI->TiposEventos_model->getAllMaterias();
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
            $labels = ['Id', 'Nombre de tipo de evento', "Materia", "Fecha de Creacion"];
            return $CI->load->view('TiposEventos/create', ['fields' => $inputs, 'labels' => $labels, "materias" => $materias]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->TiposEventos_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/TiposEventoscontroller/'));
            }
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $query = $CI->TiposEventos_model->find($id);
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
        $CI->load->model("TiposEventos_model");
        $CI->load->helper('url');
        $query = $CI->TiposEventos_model->find($id);
        if(isset($query))
        {
            $labels = $labels = ['Id', 'Nombre de tipo de evento', "Materia", "Fecha de Creacion"];
            return $CI->load->view('TiposEventos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/TiposEventoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        //We validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre',
                'label' => 'Nombre del tipo de evento',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre para el evento',
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
            $unwantDate = explode('/',$data['created_at']);
            $data['created_at'] = date('Y-m-d h:i:s', strtotime($unwantDate[2].'-'.$unwantDate[1].'-'.$unwantDate[0]));
            $query = $CI->TiposEventos_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/TiposEventoscontroller/');
            }
        }
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("TiposEventos_model");
        $CI->load->helper('url');
        $query = $CI->TiposEventos_model->delete($id);
        return redirect('pi/TiposEventoscontroller/');
        
        
    }
}