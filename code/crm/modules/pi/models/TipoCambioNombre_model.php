<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TipoCambioNombre_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_cambio_nombre_participantes';
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

    public function BuscarCambioNombre($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_cambio_nombre');
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

    public function findAllCambioNombre($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_cambio_nombre_participantes');
        $this->db->where('cambio_nombre_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }
         
    public function addCamNom($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_cambio_nombre_participantes', $params);
        return $query;
    }

}