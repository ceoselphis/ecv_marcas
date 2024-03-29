<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class CorrespondenciaPlantilla_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_correspondencia_plantilla';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllClients()
    {
        $query = $this->db->get('tblclients');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['userid']);
            array_push($values, $row['company']);
        }
        return array_combine($keys, $values);
    }

    public function findClients($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblclients');
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['userid']);
            array_push($values, $row['company']);
        }
        return array_combine($keys, $values);
    }

    public function BuscarClients($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblclients');
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        $values = array();
        foreach($query->result_array() as $row)
        {
            
            array_push($values, $row['company']);
        }
        return  $values[0];
    }

    public function findAllStaff()
    {
        $query = $this->db->get('tblstaff');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, $row['firstname']);
        }
        return array_combine($keys, $values);
    }

    public function findStaff($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where('staffid = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, $row['firstname']);
        }
        return array_combine($keys, $values);
    }
    public function BuscarStaff($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where('staffid = '.$id);
        $query = $this->db->get();
        
        $values = array();
        foreach($query->result_array() as $row)
        {
            
            array_push($values, $row['firstname']);
        }
        return $values[0];
    }

    public function findAllMaterias()
    {
        $query = $this->db->get('tbl_materias');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }
    public function findMaterias($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_materias');
        $this->db->where('id = '.$id);
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

    public function BuscarMaterias($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_materias');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        
        $values = array();
        foreach($query->result_array() as $row)
        {
            
            array_push($values, $row['nombre']);
        }
        return $values[0];
    }

}