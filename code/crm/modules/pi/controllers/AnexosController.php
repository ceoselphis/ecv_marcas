<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnexosController extends AdminController
{
    protected $models = ['Anexos_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Anexos_model");
        return $CI->load->view('anexos/index', ["anexos" => $CI->Anexos_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Anexos_model");
        $fields = $CI->Anexos_model->getFillableFields();
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
        $CI->load->model("Anexos_model");
        $CI->load->helper('url');
        // WE prepare the data
        $data = $CI->input->post();
        $fill = array();

        //we validate the data

        //we sent the data to the model
        $query = $CI->Anexos_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/anexoscontroller/'));
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
        $CI->load->model("Anexos_model");
        $CI->load->helper('url');
        $query = $CI->Anexos_model->find($id);
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
        $CI->load->model("Anexos_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        //TODO
        //We prepare the data 
        $query = $CI->Anexos_model->update($id, $data);
        if (isset($query))
        {
            return redirect('pi/anexoscontroller/');
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Anexos_model");
        $CI->load->helper('url');
        $query = $CI->Anexos_model->delete($id);
        if (isset($query))
        {
            return redirect('pi/anexoscontroller/');
        }
    }
}