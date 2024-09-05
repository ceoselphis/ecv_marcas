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
    $CI->load->model("ContadoresGalena_model");
    $contador = $CI->ContadoresGalena_model->findAll();
    $inputs = array();
    if (!empty($contador)) {
      foreach ($contador as $key => $value) {
        switch ($value["materia"]) {
          case 'Marcas':
            $inputs["contador_marca"] = $value["contador"];
            break;
          case 'Patentes':
            $inputs["contador_patente"] = $value["contador"];
            break;
          case 'Derecho de Autor':
            $inputs["contador_copyright"] = $value["contador"];
            break;
          case 'Acciones a Terceros':
            $inputs["contador_at"] = $value["contador"];
            break;
        }
      }
    } else {
      $inputs = [
        "contador_marca" => 0,
        "contador_patente" => 0,
        "contador_copyright" => 0,
        "contador_at" => 0
      ];
    }

    return $CI->load->view('settings/index', $inputs);
  }
  /**
   * Find a single item to show, in this case, can show the products of the niza class
   */

  public function show(string $id = null)
  {
    $CI = &get_instance();
    $CI->load->model("ContadoresGalena_model");
    $contador = $CI->ContadoresGalena_model->findAll();
    $inputs = array();
    if (!empty($contador)) {
      foreach ($contador as $key => $value) {
        switch ($value["materia"]) {
          case 'Marcas':
            $inputs["contador_marca"] = $value["contador"];
            break;
          case 'Patentes':
            $inputs["contador_patente"] = $value["contador"];
            break;
          case 'Derecho de Autor':
            $inputs["contador_copyright"] = $value["contador"];
            break;
          case 'Acciones a Terceros':
            $inputs["contador_at"] = $value["contador"];
            break;
        }
      }
    } else {
      $inputs = [
        "contador_marca" => 0,
        "contador_patente" => 0,
        "contador_copyright" => 0,
        "contador_at" => 0
      ];
    }
    $inputs["id"] = $id;
    switch ($id) {
      case 'contadores':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'boletines':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'paises':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'publicaciones':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'eventos':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'patentes':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'signos':
        $CI->load->view("settings/index", $inputs);
        break;
      case 'tareas':
        $CI->load->view("settings/index", $inputs);
        break;
      default:
        # code...
        break;
    }
  }
}
