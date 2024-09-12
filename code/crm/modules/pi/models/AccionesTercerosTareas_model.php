<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AccionesTercerosTareas_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_acciones_terceros_tareas';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findTipoTareas(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_tipos_tareas");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $values =  $query->result_array();
        return $values[0]['nombre'];
    }

    public function findTareasAccionesTerceros($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_acciones_terceros_tareas');
        $this->db->where('acciones_terceros_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

}