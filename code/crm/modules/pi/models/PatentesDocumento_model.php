<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesDocumento_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_patentes_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function ShowPantentes($id){
        $this->db->select('*');
        $this->db->from('tbl_patentes_documentos');
        $this->db->where('patentes_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    


}