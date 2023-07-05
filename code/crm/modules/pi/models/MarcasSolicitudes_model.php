<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasSolicitudes_model extends BaseModel
{
    protected $primaryKey = 'solicitud_id';
    protected $tableName =  'tbl_marcas_solicitudes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getFieldsRegistros()
    {
        $query = $this->db->query("SHOW fields FROM tbl_tm_registros_principales");
        return $query->result_array();
        
    }

    public function findAllRegistros()
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_registros_principales');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findRegistros($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_registros_principales');
        $this->db->where('reg_num_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllTipoSolicitud()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoSolicitud($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
        $this->db->where('tipo_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllEstadosSolicitudes()
    {
        $this->db->select('*');
        $this->db->from('tbl_estados_solicitudes');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['cod_estado_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findEstadosSolicitudes($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_estados_solicitudes');
        $this->db->where('cod_estado_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['cod_estado_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllOficinas()
    {
        $query = $this->db->get('tbl_oficinas');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['oficina_id']);
            array_push($values, $row['direccion']);
        }
        return array_combine($keys, $values);
    }

    public function findOficinas($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_oficinas');
        $this->db->where('oficina_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllClients()
    {
        $query = $this->db->get('tblclients');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['userid']);
            array_push($values, $row['company']);
        }
        return array_combine($keys, $values);
    }

    public function findClients($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblclients');
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['userid']);
            array_push($values, $row['company']);
        }
        return array_combine($keys, $values);
    }

}