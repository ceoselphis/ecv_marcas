<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Inventores_model extends BaseModel
{
    protected $primaryKey = 'inventor_id';
    protected $tableName =  'tbl_patentes_inventores';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllPais()
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
    
    public function findPais(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_paises");
        $this->db->where("pais_id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }
}