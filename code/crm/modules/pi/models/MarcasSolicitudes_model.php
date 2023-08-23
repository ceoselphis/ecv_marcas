<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasSolicitudes_model extends BaseModel
{
    protected $primaryKey = 'id';
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
        $query = $this->db->query("SELECT id FROM {$this->tableName} ORDER by id DESC LIMIT 1");
        if(empty($query->result_array()))
        {
            $this->countPK = 1;
            return $this->countPK;    
        }
        else
        {
            $this->countPK = intval($query->result_array()[0]['id']) + 1;
            return $this->countPK ;
        }
    }

    public function getFieldsRegistros()
    {
        $query = $this->db->query("SHOW fields FROM tbl_tm_registros_principales");
        return $query->result_array();
        
    }

    public function getLastIdRegistros()
    {
        $query = $this->db->query("SELECT reg_num_id FROM tbl_tm_registros_principales ORDER by reg_num_id DESC LIMIT 1");
        if(empty($query->result_array()))
        {
            return 1;
        }
        else{
            return (intval($query->result_array()[0]['reg_num_id']) + 1);
        }
        
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
        $this->db->from('tbl_marcas_tipo_registro');
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
    public function findTiposRegistros($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_tipo_registro');
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

    public function findAllTipoSolicitud()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
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

    public function findTipoSolicitud($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_solicitud');
        $this->db->where('tipo_id = '.$id);
        $query = $this->db->get();
        $tipo_id = '';
        foreach($query->result_array() as $row)
        {
            $tipo_id = $row['nombre'];
        }
        return $tipo_id;
    }

    public function findAllEstadosSolicitudes()
    {
        $this->db->select('*');
        $this->db->from('tbl_estado_expediente');
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

    public function findEstadosSolicitudes($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_estados');
        $this->db->where('estado_id = '.$id);
        $query = $this->db->get();
        $estado_id  = '';
        foreach($query->result_array() as $row)
        {
           
            $estado_id = $row['descripcion'];
        }
        return $estado_id;
    }

    public function findAllOficinas()
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
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }

    public function findPais($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
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
        $this->db->from('tbl_tipo_signo');
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

    public function findTipoSigno($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_signo');
        $this->db->where('id = '.$id);
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
        $this->db->from('tbl_marcas_clase_niza');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['clase_niza_id']);
            array_push($values, $row['nombre'].' - '.$row['descripcion']);
        }
        return array_combine($keys, $values);
    }

    public function findClases($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_clase_niza');
        $this->db->where('clase_niza_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['clase_niza_id']);
            array_push($values, $row['nombre'].' - '.$row['descripcion']);
        }
        return $keys;
    }

    public function findAllTipoEvento()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('materia_id  = 2');
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

    public function findTipoEvento($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->join('tbl_materias', 'tbl_materias.materia_id = tbl_tipos_eventos.materia_id');
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

    public function insertPaisesDesignados($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_solicitudes_paises', $params);
        return $query;
    }

    public function updatePaisesDesignados($id, $params)
    {
        $query = $this->db->update_batch('tbl_marcas_solicitudes_paises', $params);
        return $query;
    }

    public function insertSolicitudesClases($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_clases', $params);
        return $query;
    }

    public function updateSolicitudesClases($id, $params)
    {
        $query = $this->db->update_batch('tbl_marcas_clases', $params);
        return $query;
    }

    public function insertMarcasSolicitantes($params)
    {
        $query = $this->db->insert_batch('tbl_marcas_solicitantes', $params);
        return $query;
    }

    public function updateMarcasSolicitantes($id, $params)
    {
        $query = $this->db->update_batch('tbl_marcas_solicitantes', $params);
        return $query;
    }

    public function findMarcasSolicitantes($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitantes a');
        $this->db->join('tbl_propietarios b', 'a.propietario_id = b.id');
        $this->db->where('a.marcas_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['marcas_id']);
            array_push($values, $row['propietario_id']);
        }
        return array_combine($keys, $values);
    }

    public function findPaisesDesignados($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes_paises a');
        $this->db->join('tbl_paises b', 'a.id = b.id');
        $this->db->where('a.marcas_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['pais_id']);
            array_push($values, $row['nombre']);
        }
        return $keys;
    }

    public function insertMarcasSignos($params)
    {
        $query = $this->db->insert('tbl_signos_solicitud_marcas', $params);
        return $query;
    }
    
    public function updateMarcasSignos($id, $params)
    {
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->update('tbl_signos_solicitud_marcas', $params);
        return $query;
    }

    public function findSignosMarcas($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_signos_solicitud_marcas');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findPublicacionesMarcas($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_publicaciones');
        $this->db->where('marcas_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findClasesSolicitudes($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_clases a');
        $this->db->join('tbl_marcas_clase_niza b', 'a.clase_id = b.clase_niza_id');
        $this->db->where('a.marcas_id = '.$id);
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['clase_id']);
            array_push($values, $row['descripcion']);
        }
        return $keys;
    }

    public function findAllBoletines()
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

    public function search($params = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes a');
        /*$this->db->join('tbl_estado_expediente g', 'g.id = a.cod_estado_id');
        /*$this->db->join('tbl_tipo_solicitud h', 'h.tipo_id = a.tipo_id');*/
        if(empty($params) || is_null($params)){
            $query = $this->db->get();
            return $query;
        }
        else{
            if(!empty($params['oficina_id']))
            {
                $where = array();
                foreach($params['oficina_id'] as $row)
                {
                    $where[] = ['a.oficina_id' => $row]; 
                }
                $this->db->where($where);
            }

            if(!empty($params['staff_id']))
            {
                $where = array();
                foreach($params['staff_id'] as $row)
                {
                    $where[] = ['a.staff_id' => $row]; 
                }
            }

            if(!empty($params['client_id']))
            {
                $where = array();
                foreach($params['client_id'] as $row)
                {
                    $where[] = ['a.client_id' => $row];
                }
            }

            if(!empty($params['tip_reg_id']))
            {
                $where = array();
                foreach($params['tip_reg_id'] as $row)
                {
                    $where[] = ['a.tipo_registro_id' => $row];
                }
            }
            $query = $this->db->get();
            return $query;
        }
    }

    public function findAllPropietarios()
    {
        $this->db->select('*');
        $this->db->from('tbl_propietarios');
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

    public function deletePaisesDesignadosBySolicitud($id = null)
    {
        $this->db->delete('tbl_marcas_solicitudes_paises', ['marcas_id' => $id]);
        return true;
    }

    public function deleteClasesNizaBySolicitud($id = NULL)
    {
        $this->db->delete('tbl_marcas_clases', ['marcas_id' => $id]);
        return true;
    }

    public function deleteMarcasSolicitantesBySolicitud($id = NULL)
    {
        $this->db->delete('tbl_marcas_solicitantes', ['marcas_id' => $id]);
        return true;
    }
    
    public function searchWhere($params, $where)
    {
        $this->db->select('a.id, a.signonom, c.nombre as tipo_nom, e.nombre_propietario, g.nombre as clase_niza, h.nombre as estado_nom, a.fecha_solicitud, a.registro, a.certificado, a.fecha_vencimiento, j.nombre as pais_nom');
        $this->db->from('tbl_marcas_solicitudes a');
        $this->db->join('tbl_marcas_publicaciones b', 'a.id = b.marcas_id');
        $this->db->join('tbl_marcas_tipo_registro c', 'a.tipo_registro_id = c.id');
        $this->db->join('tbl_marcas_solicitantes d', 'a.id = d.marcas_id');
        $this->db->join('tbl_propietarios e', 'd.propietario_id = e.id');
        $this->db->join('tbl_marcas_clases f', 'a.id = f.marcas_id');
        $this->db->join('tbl_marcas_clase_niza g', 'f.clase_id = g.clase_niza_id');
        $this->db->join('tbl_estado_expediente h', 'a.estado_id = h.id');
        $this->db->join('tbl_marcas_solicitudes_paises i', 'a.id = i.marcas_id');
        $this->db->join('tbl_paises j', 'i.pais_id = j.id');
        switch($where){
            case 1:
                $this->db->join('tbl_boletines k', 'b.boletin_id = k.id');
                $this->db->where($params);     
                break;
            case 2:
                $this->db->where($params);
                break;
            case 3:
                $this->db->where($params);
                break;
            case 4:
                $this->db->join('tblclients j', 'a.client_id = j.userid');
                $this->db->where($params);
                break;
            case 5:
                $this->db->join('tbl_tipo_solicitud j', 'j.id = a.tipo_solicitud_id');
                $this->db->where('a.tipo_solicitud_id', $params);
                break;
            case 6:
                $this->db->join('tbl_tipo_signo j',' a.tipo_signo_id = j.id');
                $this->db->where('a.tipo_signo_id', $params);
                break;
            case 7:
                $this->db->join('tbl_marcas_eventos j', 'a.id = j.marcas_id');
                $this->db->join('tbl_tipos_eventos k', 'j.tipo_evento_id = k.id');
                $this->db->where('k.id', $params);
                break;
            case 8:
                $this->db->join('tbl_oficina j', 'a.oficina_id = j.oficina_id');
                $this->db->where('a.oficina_id', $params);
                break;
            case 9:
                $this->db->join('tbl_estado_expediente j', 'a.estado_id = j.id');
                $this->db->where('a.estado_id', $params);
                break;
            case 10:
                $this->db->join('tbl_marcas_clase_niza k', 'k.clase_niza_id = j.clase_id');
                $this->db->where('j.clase_id', $params);
                break;
        }
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }

}
