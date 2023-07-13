<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasSolicitudes_model extends BaseModel
{
    protected $primaryKey = 'solicitud_id';
    protected $tableName =  'tbl_marcas_solicitudes';
    protected $DBgroup = 'default';
    protected $countPK  = 0;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getCountPK()
    {
        return $this->countPK;
    }

    public function setCountPK()
    {
        $query = $this->db->query("SHOW TABLE STATUS LIKE '{$this->tableName}'");
        $this->countPK = $query->result_array()[0]['Auto_increment'];
        return $this->countPK ;
        
    }

    public function getFieldsRegistros()
    {
        $query = $this->db->query("SHOW fields FROM tbl_tm_registros_principales");
        return $query->result_array();
        
    }

    public function getLastIdRegistros()
    {
        $query = $this->db->query("SHOW TABLE STATUS LIKE 'tbl_tm_registros_principales'");
        return (intval($query->result_array()[0]['Auto_increment']) + 1);
    }



    public function findAllRegistros()
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_registros_principales');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findRegistros($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tm_registros_principales');
        $this->db->where('reg_num_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllTiposRegistros()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_registro');
        $this->db->where("materia = 'MARCAS'");
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_registro_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }
    public function findTiposRegistros($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_registro');
        $this->db->where('materia = MARCAS');
        $this->db->where('tipo_registro_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_registro_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllTipoSolicitud()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoSolicitud($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
        $this->db->where('tipo_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllEstadosSolicitudes()
    {
        $this->db->select('*');
        $this->db->from('tbl_estados');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['estado_id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findEstadosSolicitudes($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_estados');
        $this->db->where('estado_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['estado_id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findAllOficinas()
    {
        $query = $this->db->get('tbl_oficinas');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['oficina_id']);
            array_push($values, $row['direccion']);
        }
        return array_combine($keys, $values);
    }

    public function findOficinas($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_oficinas');
        $this->db->where('oficina_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
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

    public function findAllPaises()
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['pais_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findPais($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where('pais_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['pais_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllStaff()
    {
        $this->db->select('*');
        $this->db->from('tblstaff');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['staffid']);
            array_push($values, $row['firstname'].' '.$row['lastname']);
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
            array_push($values, $row['firstname'].' '.$row['lastname']);
        }
        return array_combine($keys, $values);
    }

    public function findAllTipoSigno()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_signos');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipos_signo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoSigno($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_signos');
        $this->db->where('tipos_signos_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipos_signo_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findAllClases()
    {
        $this->db->select('*');
        $this->db->from('tbl_clase_niza');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['niza_id']);
            array_push($values, $row['nombre'].' - '.$row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findClases($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_clase_niza');
        $this->db->where('niza_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['niza_id']);
            array_push($values, $row['nombre'].' - '.$row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findAllTipoEvento()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_evento');
        $this->db->join('tbl_materias', 'tbl_materias.materia_id = tbl_tipo_evento.materia_id');
        $this->db->where('tbl_materias.descripcion = "Marcas"');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_eve_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findTipoEvento($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_evento');
        $this->db->join('tbl_materias', 'tbl_materias.materia_id = tbl_tipo_evento.materia_id');
        $this->db->where('tbl_materias.descripcion = "Marcas"');
        $this->db->where('tipo_eve_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['tipo_eve_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function insertRegistro($params)
    {
        $query = $this->db->insert('tbl_tm_registros_principales', $params);
        return $query;
    }

}