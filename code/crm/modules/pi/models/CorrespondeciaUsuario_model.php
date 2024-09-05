<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class CorrespondeciaUsuario_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_correspondecia_usuario';
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

    public function findAllPlantilla()
    {
        $query = $this->db->get('tbl_correspondencia_plantilla');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findPlantilla($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_correspondencia_plantilla');
        $this->db->where('id = '.$id);
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
    public function BuscarPlantilla($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_correspondencia_plantilla');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        
        $values = array();
        foreach($query->result_array() as $row)
        {
            
            array_push($values, $row['descripcion']);
        }
        return $values[0];
    }

    public function findAll(){
        $this->db->select('a.id, b.company, a.expediente, CONCAT(c.firstname, " ", c.lastname) as staff, d.descripcion');
        $this->db->distinct();
        $this->db->from('tbl_correspondecia_usuario a');
        $this->db->join('tblclients b', 'a.cliente = b.userid', 'left outer');
        $this->db->join('tblstaff c', 'a.staff_id = c.staffid', 'left outer');
        $this->db->join('tbl_correspondencia_plantilla d', 'a.plantilla_id = d.id', 'left outer');
        try{
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                return $query->result_array();
            }
        }catch (Exception $e){
            log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
            //return $e->getMessage();
        }
    }

    

}