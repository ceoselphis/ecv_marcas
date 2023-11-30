<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AccionesContraTerceros_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_acciones_terceros';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoSolicitudes()
    {
        return [
            1  => 'Oposición',
            2  => 'Cancelación',
            3  => 'Nulidad',
            4  => 'Infracción',
            5  => 'Abandono',
            6  => 'Uso Indebido',
            7  => 'Medida en Frontera',
            8  => 'Tutela',
            9  => 'Demanda',
            10 => 'Denuncia',
            11 => 'Contencioso Adtvo.',
            12 => 'Objeción',
            13 => 'Licencia'
        ];
    }

    public function getAllClients()
    {
        $this->db->select('userid, company');
        $this->db->from('tblclients');
        $query = $this->db->get();
        $result = array();
        foreach($query->result_array() as $row)
        {
            $result[$row['userid']] = $row['company'];
        }
        return $result;
    }

    public function getAllOficinas()
    {
        $query = $this->db->get('tbl_oficina');
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['oficina_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function getAllStaff()
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

    public function getAllMarcas()
    {
        $this->db->select('id, ref_interna, signonom');
        $this->db->from('tbl_marcas_solicitudes');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['ref_interna'].' - '.$row['signonom']);
        }
        return array_combine($keys, $values);
    }

    public function getAllClases()
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_clase_niza');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['clase_niza_id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function getAllPaises()
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
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

    public function getAllPropietarios()
    {
        $this->db->select('*');
        $this->db->from('tbl_propietarios');
        $query = $this->db->get();
        $keys = array('');
        $values = array('Seleccione una opcion');
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre_propietario']);
        }
        return array_combine($keys, $values);      
    }

    public function getAllBoletines()
    {
        $this->db->select('*');
        $this->db->from('tbl_boletines');
        $query = $this->db->get();
        $keys = array('');
        $values = array('Seleccione una opcion');
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['descripcion']);
        }
        return array_combine($keys, $values);      
    }

    public function getAllTipoEvento()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('materia_id  = 1');
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

    public function getAllEstadoExpediente()
    {
        $this->db->select('*');
        $this->db->from('tbl_estado_expediente');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, "{$row['codigo']} - {$row['nombre']}");
        }
        return array_combine($keys, $values);
    }

}