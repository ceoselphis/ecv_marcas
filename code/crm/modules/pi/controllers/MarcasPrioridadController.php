<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasPrioridadController extends AdminController
{
    protected $models = ['MarcasPrioridad_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->MarcasPrioridad_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $fields = $CI->MarcasPrioridad_model->getFillableFields();
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
        $labels = ['Id', 'Nombre del anexo'];
        return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre_anexo',
                'label' => 'Nombre del Anexo',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre para el anexo',
                    'min_length' => 'Nombre demasiado corto',
                    'max_lenght' => 'Nombre demasiado largo'
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->MarcasPrioridad_model->getFillableFields();
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
            $labels = ['Id', 'Nombre del anexo'];
            return $CI->load->view('anexos/create', ['fields' => $inputs, 'labels' => $labels]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->MarcasPrioridad_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/anexoscontroller/'));
            }
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
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->MarcasPrioridad_model->find($id);
        if(isset($query))
        {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('anexos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
        }
        else{
            return redirect('pi/anexoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'nombre_anexo',
                'label' => 'Nombre del Anexo',
                'rules' => 'trim|required|min_length[3]|max_length[60]',
                'errors' => [
                    'required' => 'Debe indicar un nombre para el anexo',
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
            $query = $CI->MarcasPrioridad_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/anexoscontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("MarcasPrioridad_model");
        $CI->load->helper('url');
        $query = $CI->MarcasPrioridad_model->delete($id);
        return redirect('pi/anexoscontroller/');
        
        
    }

    /**
     * Method which set the data via AJAX
     */

    public function addPrioridad()
    {
        $CI = &get_instance();
        $data = $CI->input->post();
        $CI->load->model("MarcasPrioridad_model");
        $wDate = explode('/', $data['fecha_prioridad']);
        $insert = array(
            'pais_id' => $data['pais_prioridad'],
            'num_prioridad' => $data['nro_prioridad'],
            'fecha_prioridad' => "{$wDate[2]}-{$wDate[1]}-{$wDate[0]}",
            'solicitud_id'    => $data['solicitud_id']
        );
        try
        {
            $CI->MarcasPrioridad_model->insert($insert);
            $query = $CI->MarcasPrioridad_model->findAll();
            $data = array();
            foreach($query as $row)
            {
                $data[] = array(
                    'fecha_prioridad' => $row['fecha_prioridad'], 
                    'pais_id' => $row['pais_id'],
                    'num_prioridad' => $row['num_prioridad'],
                    'acciones' => '<form method="DELETE" action='.admin_url("pi/marcasprioridadcontroller/destroy/{$row["prioridad_id"]}").' onsubmit="borrarPrioridad();">
                    <td>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Borrar</button>
                    </td>
                    </form> ',
                );
            }

            $json = json_encode($data);
            echo $json;
        } catch (Exception $e){
            return $e;
        }
    }
}