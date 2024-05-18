<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasPrioridad_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_prioridades';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllPrioridadByMarcas($id = null)
    {
        $this->db->select('a.id, b.nombre, a.fecha_prioridad, a.numero_prioridad, b.id idpais');
        $this->db->from($this->tableName.' a');
        $this->db->join('tbl_paises b', 'a.pais_id = b.id');
        $this->db->where('a.marcas_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllPrioridadMarcas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_prioridades');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

    public function BuscarPais($id = null){
        
            $this->db->select('*');
            $this->db->from('tbl_paises');
            $this->db->where('id = '.$id);
            $query = $this->db->get();
            $values = $query->result_array();
            return $values[0]['nombre']; 
        
    }
}