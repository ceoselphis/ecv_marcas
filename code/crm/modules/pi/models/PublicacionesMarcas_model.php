<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PublicacionesMarcas_model extends BaseModel
{
    protected $primaryKey = 'pub_id';
    protected $tableName =  'tbl_marcas_publicaciones';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllBoletines()
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_boletines');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findBoletin($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_boletines');
        $this->db->where('boletin_id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findAllTipoPublicaciones()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findTipoPublicaciones($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $this->db->where('tipo_pub_id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findAllSolicitudesMarcas()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findSolicitudesMarcas($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $this->db->where('solicitud_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


}