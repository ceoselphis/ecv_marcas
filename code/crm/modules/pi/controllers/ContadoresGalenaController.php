<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContadoresGalenaController extends AdminController
{
  protected $models = ['ContadoresGalena_model'];

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
   * Shows the form to create a new item
   */

  public function create()
  {
    $CI = &get_instance();
    $CI->load->model("ContadoresGalena_model");
    $fields = $CI->ContadoresGalena_model->getFillableFields();
    $inputs = array();
    $labels = array();
    foreach ($fields as $field) {
      if ($field['type'] == 'INT') {
        $inputs[] = array(
          'name' => $field['name'],
          'id'   => $field['name'],
          'type' => 'range',
          'class' => 'form-control'
        );
      } else {
        $inputs[] = array(
          'name' => $field['name'],
          'id'   => $field['name'],
          'type' => 'text',
          'class' => 'form-control'
        );
      }
    }
    $labels = ['Id', 'Nombre'];
    return $CI->load->view('contadorgalena/index', ['fields' => $inputs, 'labels' => $labels]);
  }

  /**
   * Recive the data for create a new item
   */

  public function store()
  {
    $CI = &get_instance();
    $CI->load->model("ContadoresGalena_model");
    $CI->load->helper('url');
    $data = $CI->input->post();
    //We validate the data
    $CI->load->helper(['url', 'form']);
    //We prepare the data 
    foreach ($data as $key => $value) {
      switch ($key) {
        case 'contador_marca':
          $CI->ContadoresGalena_model->update(1, ['contador' => $value]);
          break;
        case 'contador_patente':
          $CI->ContadoresGalena_model->update(2, ['contador' => $value]);
          break;
        case 'contador_at':
          $CI->ContadoresGalena_model->update(4, ['contador' => $value]);
          break;
        case 'contador_copyright':
          $CI->ContadoresGalena_model->update(3, ['contador' => $value]);
          break;
      }
    }
    return redirect(admin_url('pi/SettingsController/show/contadores'));
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
    $CI->load->model("ContadoresGalena_model");
    $CI->load->helper('url');
    $query = $CI->ContadoresGalena_model->find($id);
    if (isset($query)) {
      $labels = array('Id', 'Nombre');
      return $CI->load->view('contadorgalena/edit', ['labels' => $labels, 'values' => $query, 'id' => $id]);
    } else {
      return redirect('pi/SettingsController/show/contadores');
    }
  }

  /**
   * Recive the data to update
   * 
   */

  public function update(string $id = null)
  {
    
  }

  /**
   * Deletes the item
   */

  public function destroy(string $id)
  {
    $CI = &get_instance();
    $CI->load->model("ContadoresGalena_model");
    $CI->load->helper('url');
    $query = $CI->ContadoresGalena_model->delete($id);
    return redirect('pi/ContadoresGalenaController/');
  }
}
