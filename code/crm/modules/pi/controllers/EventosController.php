<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventosController extends AdminController
{
    protected $models = ['Eventos_model'];
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $data = array();
        foreach($CI->Eventos_model->findAll() as $row)
        {
            $data[] = [
                'eve_id' => $row['eve_id'],
                'tipo_eve_id' => $CI->Eventos_model->findTipoEvento($row['tipo_eve_id'])[0]['nombre'],
                'created_at' => $row['created_at'],
                'staff_id' => $CI->Eventos_model->getStaff($row['staff_id'])[0]['firstname'].' '.$CI->Eventos_model->getStaff($row['staff_id'])[0]['lastname']
            ];
        }
        return $CI->load->view('eventos/index', ["eventos" => $data]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $fields = $CI->Eventos_model->getFillableFields();
        $select = $CI->Eventos_model->getAllTipoEvento();
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
        $labels = ['Id', 'Tipo de evento'];
        return $CI->load->view('eventos/create', ['fields' => $fields, 'labels' => $labels, 'select' => $select]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        // get the data
        $data = $CI->input->post();
        //we validate the data
        //TODO
        //we sent the data to the model
        $query = $CI->Eventos_model->insert($data);
        if(isset($query))
        {
            return redirect(admin_url('pi/eventoscontroller/'));
        }
    }

    /**
     * Find a single item to show, in this case, can show the products of the niza class
     */

    public function show(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $query = $CI->Eventos_model->find($id);
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
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        $query = $CI->Eventos_model->find($id);
        $select = $CI->Eventos_model->getAllTipoEvento();
        if(isset($query))
        {
            $labels = array('Id', 'Tipo de Evento');
            
            return $CI->load->view('eventos/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'tipoEvento' => $select]);
        }
        else{
            return redirect('pi/eventoscontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        //TODO
        //We prepare the data 
        $query = $CI->Eventos_model->update($id, $data);
        if (isset($query))
        {
            return redirect('pi/eventoscontroller/');
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Eventos_model");
        $CI->load->helper('url');
        $query = $CI->Eventos_model->delete($id);
        return redirect('pi/eventoscontroller/');
    }
}