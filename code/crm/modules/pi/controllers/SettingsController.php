<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $response = array();
        switch ($item) {
            case 'contadores':
                $query = $CI->db->query("SELECT materia, contador FROM tbl_contador_galena")->result_array();

                return $base . $CI->load->view('settings/contadores/index', ["marcas" => $query[0], "patentes" => $query[1], "autor" => $query[2], "acciones_terceros" => $query[3]]);
                break;
            case 'clases':
                $query = $CI->db->query("SELECT * FROM tbl_marcas_clase_niza")->result_array();
                if (!empty($query)) {
                    foreach ($query as $key => $value) {
                        $response[] = array(
                            "num" => $value["clase_niza_id"],
                            "nombre" => $value["nombre"],
                            "descripcion" => $value["descripcion"],
                            "acciones" =>
                            "<a href='" . admin_url("pi/ClasesController/edit/") . "{$value['clase_niza_id']}'  class='btn btn-sm btn-primary'>Editar</a> <a class='btn btn-sm btn-danger' href='" . admin_url("pi/ClasesController/destroy/") . "{$value['clase_niza_id']}' onclick='confirm(\"¿Desea eliminar el archivo?\");' >Borrar</a>"
                        );
                    }
                }
                return $base . $CI->load->view('settings/clases/index', ["table" => $response]);
                break;
            case 'publicaciones':
                $query = $CI->db->query("SELECT * FROM tbl_tipo_publicacion")->result_array();

                if (!empty($query)) {
                    foreach ($query as $key => $value) {
                        $response[] = array("num" => $value['id'], "nombre" => $value['nombre'], "acciones" => "<a href='" . admin_url("pi/TipoPublicacionesController/edit/") . "{$value['id']}'  class='btn btn-sm btn-primary'>Editar</a> <a class='btn btn-sm btn-danger' href='" . admin_url("pi/TipoPublicacionesController/destroy/") . "{$value['id']}' onclick='confirm(\"¿Desea eliminar el archivo?\");' >Borrar</a>");
                    }
                }
                $base . $CI->load->view('settings/publicaciones/index', ["table" => $response]);
                break;
            case 'propietarios':
                $query = $CI->db->query("SELECT * FROM tblview_propietarios")->result_array();
                if (!empty($query)) {
                    foreach ($query as $key => $value) {
                        $response[] = array(
                            "num" => $value['id'],
                            "nombre" => $value['nombre_propietario'],
                            "representante_legal" => $value['representante_legal'],
                            "acciones" => "<a href='" . admin_url("pi/PropietariosController/edit/") . "{$value['id']}'  class='btn btn-sm btn-primary'>Editar</a> <a class='btn btn-sm btn-danger' href='" . admin_url("pi/PropietariosController/destroy/") . "{$value['id']}' onclick='confirm(\"¿Desea eliminar el archivo?\");' >Borrar</a>"
                        );
                    }
                }
                $base . $CI->load->view('settings/propietarios/index', ["table" => $response]);
                break;
            case 'eventos':
                $query = $CI->db->query("SELECT * FROM tbl_tipos_eventos")->result_array();
                if (!empty($query)) {
                    foreach ($query as $key => $value) {
                        $response[] = array(
                            "num" => $value['id'],
                            "materia" => $value['materia_id'],
                            "nombre" => $value['descripcion'],
                            "acciones" => "<a href='" . admin_url("pi/TiposEventosController/edit/") . "{$value['id']}'  class='btn btn-sm btn-primary'>Editar</a> <a class='btn btn-sm btn-danger' href='" . admin_url("pi/TiposEventosController/destroy/") . "{$value['id']}' onclick='confirm(\"¿Desea eliminar el archivo?\");' >Borrar</a>"
                        );
                    }
                }
                $base . $CI->load->view('settings/tipos_eventos/index', ["table" => $response]);
                break;
            case 'tareas':
                $query = $CI->db->query("SELECT * FROM tbl_tipos_tareas")->result_array();
                if (!empty($query)) {
                    foreach ($query as $key => $value) {
                        $response[] = array(
                            "num" => $value['id'],
                            "nombre" => $value['nombre'],
                            "acciones" => "<a href='" . admin_url("pi/TareasAdminController/edit/") . "{$value['id']}'  class='btn btn-sm btn-primary'>Editar</a> <a class='btn btn-sm btn-danger' href='" . admin_url("pi/TareasAdminController/destroy/") . "{$value['id']}' onclick='confirm(\"¿Desea eliminar el archivo?\");' >Borrar</a>"
                        );
                    }
                }
                $base . $CI->load->view('settings/tipos_tareas/index', ["table" => $response]);
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
}
