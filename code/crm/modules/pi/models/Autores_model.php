<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Autores_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_autores';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllPaises()
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


    public function searchPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $pais= $query->result_array();
        if (empty($pais)){
            return '';
        }else{
            return $pais[0]['nombre'];
        }
    }

    public function searchWhere($params): array{
        $this->db->select('a.id, a.nombres, a.apellidos, d.nombre as pais_nac, c.nombre as pais_res');
        $this->db->from('tbl_autores a');
        $this->db->join('tbl_paises c', 'a.pais_id_res = c.id', 'left outer');
        $this->db->join('tbl_paises d', 'a.pais_id_nac = d.id', 'left outer');

        foreach($params as $key => $value)
        {
            switch ($key) {
                case 'a.nombres':
                case 'a.apellidos':
                    $this->db->like($key,$value);
                    break;
                default:
                    $this->db->where($key, $value);
            }
        }
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else
        {
            return [];
        }

    }



}