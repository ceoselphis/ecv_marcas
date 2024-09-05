<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Inventores_model extends BaseModel
{
    protected $primaryKey = 'id_inventor';
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
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }
    
    public function findPais(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_paises");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search(array $params = []): array
    {
      $data = array();
      if(!empty($params["pais_id"]) && !empty($params["nacionalidad"]))
      {
        $porPais = $this->getByPais($params["pais_id"]);
        $porNacionalidad = $this->getByNacionalidad($params["nacionalidad"]);
        return array_merge($porPais, $porNacionalidad);
      }
      else if(!empty($params["pais_id"]))
      {
        $porPais = $this->getByPais($params["pais_id"]);
        return $porPais;
      }
      else if(!empty($params["nacionalidad"]))
      {
        $porNacionalidad = $this->getByNacionalidad($params["nacionalidad"]);
        return $porNacionalidad;
      }
    }

    public function getByPais(string $params)
    {
      $this->db->select('*');
      $this->db->from($this->tableName);
      $paises = "";
      if(str_contains($params, ",")){
        $paises = explode(",",  $params);
        foreach($paises as $key => $value)
        {
          $this->db->or_where("pais_id = ", $value);
        }
      }
      else{
        $paises = $params;
        $this->db->where("pais_id = ", $paises);
      }
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function getByNacionalidad($params)
    {
      if($params != '')
      {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where("nacionalidad LIKE '%{$params}%'", );
        $query = $this->db->get()->result_array();
        return $query;
      }

    }
}