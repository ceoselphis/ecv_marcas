<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasClasesController extends AdminController
{
    protected $models = ['MarcasClases_model'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getClaseByMarcas()
    {
        $CI = &get_instance();
        $data = $CI->input->post();
        $CI->load->model("MarcasClases_model");
        $query = $CI->MarcasClases_model->find($data['id']);
        if(!empty($query))
        {
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $query[0]]);
        }
        else
        {
            echo json_encode(['code' => 404, 'message' => 'not_found']);
        }
        

    }

    public function update()
    {
        $CI = &get_instance();
        $CI->load->model('MarcasClases_model');
        $data = $CI->input->post();
        $dataset = [
            'clase_id' => $data['clase_niza'],
            'descripcion' => $data['descripcion'],
        ];
        $query = $CI->MarcasClases_model->update($data['id'], $dataset);
        if($query)
        {
            echo json_encode(['code' => '200', 'status' => 'success']);
        }
        else{
            echo json_encode(['code' => '500', 'status' => 'error']);
        }
        
    }


}