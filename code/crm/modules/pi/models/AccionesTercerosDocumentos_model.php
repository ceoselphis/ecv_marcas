<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AccionesTercerosDocumentos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_acciones_tercero_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    

    public function findDocumentosAccionesTerceros($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_acciones_tercero_documentos');
        $this->db->where('acciones_terceros_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

}