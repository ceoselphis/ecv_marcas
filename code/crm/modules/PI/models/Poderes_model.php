<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Poderes_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_propietarios_poderes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPaises()
    {
        $query = $this->db->get('tbl_paises');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['pais_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where("pais_id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllStaff()
    {
        $query = $this->db->get('tblstaff');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, strtoupper("{$row['firstname']} {$row['lastname']}"));
        }
        return array_combine($keys, $values);
    }

    public function findStaff($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where("staffid = ".$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, strtoupper("{$row['firstname']} {$row['lastname']}"));
        }
        return array_combine($keys, $values);
    }

    public function findAllPoderes($propietario_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_propietarios_poderes');
        $this->db->where("propietario_id = ".$propietario_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findApoderados($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_propietarios_poderes');
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllApoderados()
    {
        $this->db->select('*');
        $this->db->from('tbl_poderes_apoderados');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertPoder($params = NULL)
    {
        $query = $this->db->insert_batch('tbl_propietarios_poderes', $params);
        return $query;
    }

}