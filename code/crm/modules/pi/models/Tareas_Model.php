<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Tareas_Model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_tareas';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllTipoTareas()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_tareas');
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

    public function findTipoTareas($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_tareas');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = array();
        foreach($query->result_array() as $row)
        {
            $values[] = array(
                'nombre' => $row['nombre'],
            );
            
        }
        return $values;
    }

    public function findAllTareasMarcas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_marcas_tareas');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values; 
    }
    public function BuscarTipoTareas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_tipos_tareas');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre']; 
    }

    public function insertTask($data = NULL)
    {
        $this->db->insert('tbltasks', $data);
        $insert_id = $this->db->query('SELECT LAST_INSERT_ID()');
        return $insert_id->result_array()[0]['LAST_INSERT_ID()'];
    }
}