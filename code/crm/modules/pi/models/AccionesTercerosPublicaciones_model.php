<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AccionesTercerosPublicaciones_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_acciones_tercero_publicaciones';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findTipoPublicacion(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_tipo_publicacion");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $values =  $query->result_array();
        return $values[0]['nombre'];
    }

    public function findBolentines(string $id)
    {
        $this->db->select('*');
        $this->db->from("tbl_boletines");
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $values =  $query->result_array();
        return $values[0]['descripcion'];
    }

    public function findPublicacionesAccionesTerceros($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_acciones_tercero_publicaciones');
        $this->db->where('acciones_terceros_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }

}