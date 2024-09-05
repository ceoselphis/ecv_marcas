<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AutoresEventos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_derecho_autor_eventos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTipoEvento()
    {
        $query = $this->db->get('tbl_tipos_eventos');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
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

    public function findAllEventosMarcas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_derecho_autor_eventos');
        $this->db->where('id_solicitud = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }
}