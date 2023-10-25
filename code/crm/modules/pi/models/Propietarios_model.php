<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Propietarios_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_propietarios';
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
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where("id = ".$id);
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
        $this->db->from('tbl_poderes');
        $this->db->where("propietario_id = ".$propietario_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findApoderados($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_apoderados');
        $this->db->where("poder_id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertPoder($params = NULL)
    {
        $this->db->insert('tbl_poderes', $params);
        $insert_id = $this->db->count_all('tbl_poderes');
        return $insert_id;
    }

    public function insertDocument($params = NULL)
    {
        $query = $this->db->insert('tbl_propietarios_documentos', $params);
        return $query;
    }


}