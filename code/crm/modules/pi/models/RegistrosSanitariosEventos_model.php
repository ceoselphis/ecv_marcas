<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class RegistrosSanitariosEventos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_registros_sanitarios_eventos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findRegistroSanitarios($id)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id_solicitud = '.$id);
        $query = $this->db->get();
        return $query->result();
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

    

}