<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PropietariosDocumentos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_propietarios_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllDocumentsByPropietarios($id_propietarios = null)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('propietario_id', $id_propietarios);
        $query = $this->db->get();
        return $query->result_array();
    }
}