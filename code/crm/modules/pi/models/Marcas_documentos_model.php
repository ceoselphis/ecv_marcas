<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Marcas_documentos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_busquedas_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllByBusqueda($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where(" `busquedas_id` = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    } 
}