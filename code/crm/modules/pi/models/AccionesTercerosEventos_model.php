<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AccionesTercerosEventos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_acciones_tercero_eventos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findTipoEvento(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_tipos_eventos");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $values =  $query->result_array();
        return $values[0]['descripcion'];
    }

    public function findEventosAccionesTerceros($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_acciones_tercero_eventos');
        $this->db->where('acciones_terceros_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

}