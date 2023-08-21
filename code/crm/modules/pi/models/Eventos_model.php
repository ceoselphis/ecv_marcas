<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Eventos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_eventos';
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
            array_push($keys, $row['materia_id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function getMateria(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_materias");
        $this->db->where("materia_id = ".$id);
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

    public function getAllTipoEvento()
    {
        $query = $this->db->get('tbl_tipos_eventos');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoEvento(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_tipos_eventos");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }
}