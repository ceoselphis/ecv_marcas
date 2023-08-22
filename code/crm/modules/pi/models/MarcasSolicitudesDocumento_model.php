<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasSolicitudesDocumento_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_solicitudes_documentos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllMarcasSolicitudes()
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['signo_archivo']);
        }
        return array_combine($keys, $values);
    }
}