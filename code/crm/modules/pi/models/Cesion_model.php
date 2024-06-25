<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Cesion_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_cesiones';
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

    public function BuscarOficina($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_oficina');
        $this->db->where('oficina_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre']; 
    }
    public function BuscarStaff($id = NULL){
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where('staffid = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['firstname']; 
    }

    
    public function BuscarEstado($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_estado_expediente');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre']; 
    }

    public function BuscarClientes($id = NULL){
        $this->db->select('*');
        $this->db->from('tblclients');
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['company']; 
    }

    public function findAllCesionMarcas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_cesiones');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

    public function CantidadCesion(){
        $this->db->select('max(id) as cantidad');
        $this->db->from('tbl_marcas_cesiones');
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['cantidad']; 
    }
    
    public function InsertarCesion($data){
        $this->db->insert('tbl_marcas_cesiones', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
       
    public function addCesiones($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_cedentes_cesionarios', $params);
        return $query;
    }
}