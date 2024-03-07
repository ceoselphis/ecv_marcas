<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Propietarios_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_propietarios';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPaises()
    {
        $query = $this->db->get('tbl_paises');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllPropietarios()
    {
        $this->db->select('*');
        $this->db->from('tbl_propietarios');
        $this->db->order_by("nombre_propietario", 'ASC');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre_propietario']);
        }
        return array_combine($keys, $values);
    }

    public function findAllPaises()
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->order_by("nombre", 'ASC');
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

    public function findAllPoderes2($propietario_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_poderes');
        $this->db->order_by("numero", 'ASC');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['numero']);
        }
        return array_combine($keys, $values);
    }

    public function findPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function searchPaises($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where("id = ".$id);
        $query = $this->db->get();
        $pais= $query->result_array();
        return $pais[0]['nombre'];
    }

    public function findAllStaff()
    {
        $query = $this->db->get('tblstaff');
        $result = array();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, strtoupper("{$row['firstname']} {$row['lastname']}"));
        }
        return array_combine($keys, $values);
    }

    public function findStaff($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where("staffid = ".$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, strtoupper("{$row['firstname']} {$row['lastname']}"));
        }
        return array_combine($keys, $values);
    }

    public function searchStaff($id= NULL){
        $this->db->select('*');
        $this->db->from('tblstaff');
        $this->db->where("staffid = ".$id);
        $query = $this->db->get();
       
        $values = array();
        foreach($query->result_array() as $row)
        {
            
            array_push($values, strtoupper("{$row['firstname']} {$row['lastname']}"));
        }
        return $values[0];
    }

    public function findAllPoderes($propietario_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_poderes');
        $this->db->where("propietario_id = ".$propietario_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function searchAllPoderes($propietario_id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_poderes');
        $this->db->where("propietario_id = ".$propietario_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $resultado= $query->result_array();
        if (empty($resultado)){
            return '';
        }else{
            return $resultado[0]['numero'];
        }
    }
    public function findApoderados($id = null)
    {
        $this->db->select('staffid');
        $this->db->from('tbl_apoderados a');
        $this->db->join('tblstaff b', 'a.staff_id = b.staffid');
        $this->db->join('tbl_poderes c', 'a.poder_id = c.id');
        $this->db->where("c.propietario_id = ".$id);
        $query = $this->db->get();
        $keys = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
        }
        return $keys;
    }

    public function insertPoder($params = NULL)
    {
        $this->db->insert('tbl_poderes', $params);
        $insert_id = $this->db->query('SELECT LAST_INSERT_ID()');
        return $insert_id->result_array()[0]['LAST_INSERT_ID()'];
    }

    public function insertApoderados($params = NULL)
    {
        $this->db->insert_batch('tbl_apoderados', $params);
        return true;
    }

    public function insertDocument($params = NULL)
    {
        $query = $this->db->insert('tbl_propietarios_documentos', $params);
        return $query;
    }

    public function updatePoder($poder_id, $data)
    {
        $query = $this->db->update('tbl_poderes', $data, "id = {$poder_id}");
        return $query;
    }

    public function updateApoderados($data)
    {
        $query = $this->db->update_batch('tbl_poderes', $data);
        return $query;
    }
    public function searchWhere($params): array{
        $this->db->select('a.id, a.codigo, a.nombre_propietario, c.nombre, b.numero, a.created_at, d.firstname as firstname_created, d.lastname as lastname_created, a.modified_at, e.firstname as firstname_modif, e.lastname as lastname_modif');
        $this->db->from('tbl_propietarios a');
        $this->db->join('tbl_poderes b', 'a.id = b.propietario_id', 'left outer');
        $this->db->join('tbl_paises c', 'a.pais_id = c.id', 'left outer');
        $this->db->join('tblstaff d', 'a.created_by = d.staffid', 'left outer');
        $this->db->join('tblstaff e', 'a.created_by = e.staffid', 'left outer');

        foreach($params as $key => $value)
        {
            switch ($key) {
                case 'a.codigo':
                case 'a.nombre_propietario':
                case 'b.numero':
                    $this->db->like($key,$value);
                    break;
                case 'fecha_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('a.created_at >=', $data);
                    break;
                case 'fecha_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('a.created_at <=', $data);
                    break;
                default:
                    $this->db->where($key, $value);
            }
        }
        $this->db->order_by("a.nombre_propietario", 'ASC');
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else
        {
            return [];
        }

    }

}