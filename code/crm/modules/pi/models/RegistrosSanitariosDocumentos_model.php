<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class RegistrosSanitariosDocumentos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_registros_sanitarios_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findRegistrosSanitarios($id) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id_solicitud = '. $id);
        $query = $this->db->get();
        return $query->result_array();
    }

   

    

}