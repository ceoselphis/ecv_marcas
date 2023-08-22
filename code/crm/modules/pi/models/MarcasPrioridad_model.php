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
        $this->db->select('a.id, b.nombre, a.fecha_prioridad, a.numero_prioridad');
        $this->db->from($this->tableName.' a');
        $this->db->join('tbl_paises b', 'a.pais_id = b.id');
        $this->db->where('a.marcas_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }
}