<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Estados_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_estado_expediente';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllMaterias()
    {
        $query = $this->db->get('tbl_materias');
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

    public function findMaterias($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_materias');
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getStaff(string $id)
    {
        $this->db->select('firstname, lastname');
        $this->db->from("tblstaff");
        $this->db->where("staffid = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }
}