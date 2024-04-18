<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesSolicitudes_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_patentes_solicitudes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoSolicitudes()
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
        foreach($query->result_array() as $row)
        {
            $result[$row['userid']] = $row['company'];
        }
        return $result;
    }

    public function getAllOficinas()
    {
        $query = $this->db->get('tbl_oficina');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, $row['firstname'].' '.$row['lastname']);
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
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);      
    }

    public function getAllTipoEvento()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('materia_id  = 1');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
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
        foreach($query->result_array() as $row)
        {
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
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findMarca($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findEstatus($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('id  = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findPais($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where('id = '.$id);
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
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['codigo'].'-'.$row['nombre'].' '.$row['apellido']);
        }
        return array_combine($keys, $values); 
    }


}