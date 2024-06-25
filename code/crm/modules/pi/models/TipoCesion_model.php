<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TipoCesion_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_cedentes_cesionarios';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function findAllOficina(){
        $this->db->select('*');
        $this->db->from('tbl_oficina');
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

    public function BuscarCesion($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_cesiones');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['comentarios']; 
    }
    public function BuscarPropietarios($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_propietarios');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre_propietario']; 
    }

    
    public function BuscarEstado($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_estado_expediente');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre']; 
    }

    public function findAllCesion($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_cedentes_cesionarios');
        $this->db->where('cesion_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }
    
    public function addCesiones($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_cedentes_cesionarios', $params);
        return $query;
    }

}