<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesEventos_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_patentes_eventos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    

    public function findAllPatentes()
    {
        $this->db->select('sol_pat_id, titulo');
        $this->db->from('tbl_tm_solicitud_patentes');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findPatentes($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_solicitud_patentes');
        $this->db->where('sol_pat_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findPais($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $respuesta = $query->result_array();
        return $respuesta[0]['nombre'];
    }

    public function findAllPais()
    {
        $query = $this->db->get('tbl_paises');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['pais_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function ShowPantentes($id){
        $this->db->select('*');
        $this->db->from('tbl_patentes_eventos');
        $this->db->where('patentes_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function findTipoEvento($id){
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['descripcion'];
    }

    public function findBoletines($id){
        $this->db->select('*');
        $this->db->from('tbl_boletines');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['descripcion'];
    }
 



}