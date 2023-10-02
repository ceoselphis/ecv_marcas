<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PublicacionesMarcas_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_publicaciones';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findPublicacionesMarcas($id = null){
        $this->db->select('*');
        $this->db->from('tbl_marcas_publicaciones');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values;
    }   
    public function findAllBoletines()
    {
        $this->db->select('*');
        $this->db->from('tbl_boletines');
        $this->db->order_by('pais_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findAllBoletinesAct()
    {
        $this->db->select('*');
        $this->db->from('tbl_boletines');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    
    public function findBoletin($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_boletines');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['descripcion'];
    }

    public function findAllTipoPublicaciones()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findAllTipoPublicacionesAct()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoPublicaciones($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['nombre'];
    }

    public function findAllSolicitudesMarcas()
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

   

    public function findSolicitudesMarcas($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['signo_archivo'];
    }

    public function findAllPaises()
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function findPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where('pais_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllByMarcas($id = NULL)
    {
        $this->db->select('a.id, a.fecha, b.nombre, a.boletin_id, a.tomo, a.pagina');
        $this->db->from('tbl_marcas_publicaciones a');
        $this->db->join('tbl_tipo_publicacion b', 'a.tipo_pub_id = b.id');
        $this->db->where('a.marcas_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

}