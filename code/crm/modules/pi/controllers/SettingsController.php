<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        return $CI->load->view("settings/base.php");
    }


    public function menu()
    {
        $CI = &get_instance();
        $item = $CI->input->get('group');
        $base = $CI->load->view("settings/base.php");
        switch($item)
        {
            case 'contadores':
                $query = $CI->db->query("SELECT materia, contador FROM tbl_contador_galena")->result_array();

                return $base . $CI->load->view('settings/contadores/index', ["marcas" => $query[0], "patentes" => $query[1], "autor" => $query[2], "acciones_terceros" => $query[3]]);
                break;
            case 'clases':
                return $base . $CI->load->view('settings/clases/index');
                break;
            case 'publicaciones':
                $base . $CI->load->view('settings/publicaciones/index');
                break;
        }
    }


    /**
     * Salva los contadores
     * 
     * 
     */
    public function saveOrUpdateContadores()
    {
        $CI = &get_instance();
        $data = $CI->input->post();
        $CI->db->query(
            "
            UPDATE tbl_contador_galena
            SET contador = {$data['marcas']}
            WHERE materia = 'Marcas';
            "
        );
        $CI->db->query(
            "
            UPDATE tbl_contador_galena
            SET contador = {$data['patentes']}
            WHERE materia = 'Patentes';
            "
        );
        $CI->db->query(
            "
            UPDATE tbl_contador_galena
            SET contador = {$data['derecho_autor']}
            WHERE materia = 'Derecho de Autor';
            "
        );
        $CI->db->query(
            "
            UPDATE tbl_contador_galena
            SET contador = {$data['acc_terceros']}
            WHERE materia = 'Acciones a Terceros';
            "
        );
        echo json_encode(["code" => '200', "message" => 'ok']);
    }

    /**
     * Carga la tabla de publicaciones en segundo plano
     * 
     * 
     */

     public function getTablePublicaciones()
     {
        $CI = &get_instance();
        $query = $CI->db->query("SELECT * FROM tbl_tipo_publicacion")->result_array();
        $response = array();
        if(!empty($query))
        {
            foreach($query as $key => $value)
            {
                $response[] = ["num" => $value['id'], "nombre" => $value['nombre'], "acciones" => "<button id='{$value['id']}'  class='btn btn-edit btn-sm btn-primary' data-toggle='modal' data-target='#edit-modal'>Editar</button> <button class='btn btn-sm btn-danger' onclick=deleteTipoPublicacion({$value['id']})>Borrar</button>"];
            }
        }
        echo json_encode(["data" => $response]);
        

     }


}