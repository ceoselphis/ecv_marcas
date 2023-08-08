<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Busquedas_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_busquedas';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllClients()
    {
        $this->db->select('userid, company');
        $this->db->from('tblclients');
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

    public function getAllStaff()
    {
        $this->db->select('staffid, firstname, lastname');
        $this->db->from('tblstaff');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, "{$row['firstname']} {$row['lastname']}");
        }
        return array_combine($keys, $values);
    }

    public function getAllClases()
    {
        $this->db->select('id, nombre');
        $this->db->from('tbl_marcas_clase_niza');
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

    public function getAllPaises()
    {
        $this->db->select('id, nombre');
        $this->db->from('tbl_paises');
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

    public function getTipoBusquedas()
    {
        $this->db->select('id, nombre');
        $this->db->from('tbl_marcas_tipo_busqueda');
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
}