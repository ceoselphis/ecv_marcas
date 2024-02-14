<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventoresController extends AdminController
{
    protected $models = ['Inventores_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        return $CI->load->view('patente/inventores/index');
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $paises = $CI->Inventores_model->findAllPais();
        $data = ['paises' => $paises, 'codigo' => $CI->Inventores_model->last_insert_id()];
        return  $CI->load->view(
            'patente/inventores/create', $data
        );
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper(['url', 'form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we sent the data to the model
        $query = $CI->Inventores_model->insert($data);
        if (isset($query)) {
            return redirect(admin_url('pi/patentes/InventoresController/'));
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
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $query = $CI->Inventores_model->find($id);
        $paises = $CI->Inventores_model->findAllPais();
        if (isset($query)) {
            $labels = array('Id', 'Nombre del anexo');
            return $CI->load->view('patente/inventores/edit', ['labels' => $labels, 'values' => $query, 'id' => $id, 'paises' => $paises]);
        } else {
            return redirect('pi/patentes/InventoresController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        try {
            $query = $CI->Inventores_model->update($id, $data);
            return redirect('pi/patentes/InventoresController');
        } catch (\Throwable $th) {
            echo $th;
        }
        
        
        
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $CI->load->helper('url');
        $query = $CI->Inventores_model->delete($id);
        return redirect('pi/patentes/InventoresController/');
    }

    public function getInventores()
    {
        $CI = &get_instance();
        $CI->load->model("Inventores_model");
        $data = array();
        $query = $CI->Inventores_model->findAll();
        if(!empty($query))
        {
            foreach($query as $key => $value)
            {
                $data[] = [
                    'codigo'  => $value['codigo'],
                    'pais' => $CI->Inventores_model->findPais($value['pais_id'])[0]['nombre'],
                    'nombre' => $value['nombre'],
                    'apellido' => $value['apellido'],
                    'nacionalidad' => $value['nacionalidad'],
                    'acciones' => '<a class="btn btn-primary" href="'.admin_url('pi/patentes/InventoresController/edit/').$value['id'].'"><i class="fas fa-edit"></i> Editar</a>'
                ];
                
            }
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $data]);
        }
        else{
            $data[] = [
                'codigo' => '',
                'pais'   => '',
                'nombre' => '',
                'apellido' => '',
                'nacionalidad' => '',
                'acciones' => ''
            ];
            echo json_encode(['code' => 404, 'message' => 'not found', 'data' => $data]);
        }
    }
}
