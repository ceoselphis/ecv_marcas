<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesSolicitudes_model extends BaseModel
{
  protected $primaryKey = 'id';
  protected $tableName =  'tbl_patentes_solicitudes';
  protected $DBgroup = 'default';
  protected $countPK  = 0;

  public function __construct()
  {
    parent::__construct();
  }

  public function findAllTiposRegistros()
  {
    $options = [
      1 => "PCT",
      2 => "Diseño Industrial",
      3 => "Invencion",
      4 => "Modelo de Utilidad",
    ];
    return $options;
    /*$this->db->select('*');
        $this->db->from('tbl_patentes_tipos');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);*/
  }

  public function getAllClients()
  {
    $this->db->select('userid, company');
    $this->db->from('tblclients');
    $query = $this->db->get();
    $result = array();
    foreach ($query->result_array() as $row) {
      $result[$row['userid']] = $row['company'];
    }
    return $result;
  }

  public function getAllOficinas()
  {
    $query = $this->db->get('tbl_oficina');
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['oficina_id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function getAllStaff()
  {
    $this->db->select('*');
    $this->db->from('tblstaff');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['staffid']);
      array_push($values, $row['firstname'] . ' ' . $row['lastname']);
    }
    return array_combine($keys, $values);
  }

  public function getAllClases()
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_clase_niza');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['clase_niza_id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function getAllPaises()
  {
    $this->db->select('*');
    $this->db->from('tbl_paises');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function getAllPropietarios()
  {
    $this->db->select('*');
    $this->db->from('tbl_propietarios');
    $query = $this->db->get();
    $keys = array('');
    $values = array('Seleccione una opcion');
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre_propietario']);
    }
    return array_combine($keys, $values);
  }

  public function getAllBoletines()
  {
    $this->db->select('*');
    $this->db->from('tbl_boletines');
    $query = $this->db->get();
    $keys = array('');
    $values = array('Seleccione una opcion');
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['descripcion']);
    }
    return array_combine($keys, $values);
  }

  public function getAllTipoEvento()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipos_eventos');
    //$this->db->where('materia_id  = 1');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['descripcion']);
    }
    return array_combine($keys, $values);
  }

  public function getAllEstadoExpediente()
  {
    $this->db->select('*');
    $this->db->from('tbl_estado_expediente');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, "{$row['nombre']}");
    }
    return array_combine($keys, $values);
  }

  public function getAllTiposPublicaciones()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipo_publicacion');
    $query = $this->db->get();
    $keys = array('');
    $values = array('Seleccione una opcion');
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findDenominacionBase($id = null)
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_solicitudes');
    $this->db->where('id = ', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findClaseNiza($marcas_id = null)
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_clases');
    $this->db->where('marcas_id = ', $marcas_id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findCliente($id = null)
  {
    $this->db->select('company');
    $this->db->from('tblclients');
    $this->db->where('userid = ' . $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findMarca($id = null)
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_solicitudes');
    $this->db->where('id = ' . $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findEstatus($id = NULL)
  {
    $this->db->select('*');
    $this->db->from('tbl_tipos_eventos');
    $this->db->where('id  = ' . $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findPais($id = NULL)
  {
    $this->db->select('*');
    $this->db->from('tbl_paises');
    $this->db->where('id = ' . $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getAllInventores()
  {
    $this->db->select('*');
    $this->db->from('tbl_patentes_inventores');
    $query = $this->db->get();
    $keys = array('');
    $values = array('Seleccione una opcion');
    if (!empty($query)) {
      foreach ($query->result_array() as $key => $value) {
        array_push($keys, $value['id_inventor']);
        array_push($values, $value['codigo'] . '-' . $value['nombre'] . ' ' . $value['apellido']);
      }
      return array_combine($keys, $values);
    } else {
      return [];
    }
  }
  public function getCountPK()
  {
    return $this->countPK;
  }

  public function setCountPK()
  {
    $query = $this->db->query("SELECT id FROM {$this->tableName} ORDER by id DESC LIMIT 1");
    if (empty($query->result_array())) {
      $this->countPK = 1;
      return $this->countPK;
    } else {
      $this->countPK = intval($query->result_array()[0]['id']) + 1;
      return $this->countPK;
    }
  }
  public function findAllTareas()
  {
    $this->db->select('*');
    $this->db->from('tbl_patentes_tareas');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findAllEventos()
  {
    $this->db->select('*');
    $this->db->from('tbl_patentes_eventos');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function CantidadSolicitudes()
  {
    $this->db->select('contador');
    $this->db->from('tbl_contador_galena');
    $this->db->where("materia = 'Patentes'");
    $query = $this->db->get();
    $values = $query->result_array();
    return $values[0]['contador'];
  }

  public function findAllInvoices()
  {
    $this->db->select("a.id, CONCAT(a.prefix, '-', a.number) as name, a.date as date, a.status as status");
    $this->db->from("tblinvoices a");
    $query = $this->db->get();
    $keys = array();
    $values = array();
    $invExtra = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['name']);
      $data = array(
        'id' => $row['id'],
        'date' => date_format(new DateTime($row['date']), 'd/m/Y'),
        'status' => format_invoice_status($row['status'], '', true)
      );
      array_push($invExtra, $data);
    }
    return [array_combine($keys, $values), $invExtra];
  }

  public function findAllOficinas()
  {
    $query = $this->db->get('tbl_oficina');
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['oficina_id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findAllClients()
  {
    $query = $this->db->get('tblclients');
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['userid']);
      array_push($values, "{$row['code']} - {$row['company']}");
    }
    return array_combine($keys, $values);
  }

  public function findAllPropietarios2()
  {
    $this->db->select('*');
    $this->db->from('tbl_propietarios');
    $this->db->order_by("nombre_propietario", 'ASC');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, "{$row['codigo']} {$row['nombre_propietario']}");
    }
    return array_combine($keys, $values);
  }

  public function findAllStaff()
  {
    $this->db->select('*');
    $this->db->from('tblstaff');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['staffid']);
      array_push($values, $row['firstname'] . ' ' . $row['lastname']);
    }
    return array_combine($keys, $values);
  }

  public function findAllTipoSolicitud()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipo_solicitud');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findAllEstadosSolicitudes()
  {
    $this->db->select('*');
    $this->db->from('tbl_estado_expediente');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findAllPaises()
  {
    $this->db->select('*');
    $this->db->from('tbl_paises');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findTiposRegistros($id = NULL)
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_tipo_registro');
    $this->db->where('id = ' . $id);
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  /*public function findAllTiposRegistros()
  {
    $this->db->select('*');
    $this->db->from('tbl_marcas_tipo_registro');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }*/

  public function findAllTipoEvento()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipos_eventos');
    $this->db->where('materia_id  = 1');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['descripcion']);
    }
    return array_combine($keys, $values);
  }

  public function findAllSolicitudesDocumento()
  {
    $this->db->select('*');
    $this->db->from('tbl_patentes_documentos');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function findAllTipoTareas()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipos_tareas');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findAllBoletines()
  {
    $this->db->select('*');
    $this->db->from('tbl_boletines');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['descripcion']);
    }
    return array_combine($keys, $values);
  }

  public function findAllTipoPublicacion()
  {
    $this->db->select('*');
    $this->db->from('tbl_tipo_publicacion');
    $this->db->order_by("nombre", 'ASC');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre']);
    }
    return array_combine($keys, $values);
  }

  public function findAllProjects()
  {
    $this->db->select('id, name');
    $this->db->from('tblprojects');
    $this->db->where('status < 4');
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['name']);
    }
    return array_combine($keys, $values);
  }

  public function BuscarTipoTareas($id)
  {
    $this->db->select("*");
    $this->db->from("tbl_tipos_tareas");
    $query = $this->db->get();
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['name']);
    }
    return array_combine($keys, $values);
  }

  public function insertPatentesSolicitantes($params)
  {
    $query = $this->db->insert_batch('tbl_patentes_solicitantes', $params);
    return $query;
  }

  public function updatePatentesSolicitantes($id, $params)
  {
    $query = $this->db->update_batch('tbl_patentes_solicitantes', $params);
    return $query;
  }

  public function findEventos($id)
  {
    $this->db->select("*");
    $this->db->from("tbl_patentes_eventos");
    $this->db->where("patentes_id = {$id}");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findInvoices($id)
  {
    $this->db->select("*");
    $this->db->from("tbl_patentes_facturas");
    $this->db->where("patentes_id = {$id}");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findPatentesSolicitantes($id)
  {
    $this->db->select("client_id");
    $this->db->from("tbl_patentes_solicitantes");
    $this->db->where("patente_id = {$id}");
    $query = $this->db->get();
    $keys = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['client_id']);
    }
    return $keys;
  }

  public function findProjectByPatente($id)
  {
    $this->db->select("*");
    $this->db->from("tbl_patentes_solicitantes");
    $this->db->where("patente_id = {$id}");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function findAllPropietarios()
  {
    $this->db->select('*');
    $this->db->from('tbl_propietarios');
    $query = $this->db->get();
    //$keys = array('');
    //$values = array('Seleccione una opcion');
    $keys = array();
    $values = array();
    foreach ($query->result_array() as $row) {
      array_push($keys, $row['id']);
      array_push($values, $row['nombre_propietario']);
    }
    return array_combine($keys, $values);
  }

  public function findInventoresByPatentes($id)
  {
    $this->db->select('inventor_id');
    $this->db->from('tbl_patentes_inventores_solicitudes');
    $this->db->where("patente_id = {$id}");
    $query = $this->db->get();
    $keys = array();
    foreach ($query->result_array() as $key => $value) {
      array_push($keys, $value['inventor_id']);
    }
    return $keys;
  }

  public function insertInventores ($params)
  {
    $query = $this->db->insert_batch('tbl_patentes_inventores_solicitudes', $params);
    return $query;
  }

  public function updateInventores ($params)
  {
    $query = $this->db->update_batch('tbl_patentes_inventores_solicitudes', $params);
    return $query;
  }

  public function findSolicitantesByPatentes($id)
  {
    $this->db->select('client_id');
    $this->db->from('tbl_patentes_solicitantes');
    $this->db->where("patente_id = {$id}");
    $query = $this->db->get();
    $keys = array();
    foreach ($query->result_array() as $key => $value) {
      array_push($keys, $value['client_id']);
    }
    return $keys;
  }
}
