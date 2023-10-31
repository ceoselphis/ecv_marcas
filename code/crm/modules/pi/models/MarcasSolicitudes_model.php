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
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values);
    }


    public function findClaseDescripcion($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_clase_niza');
        $this->db->where('clase_niza_id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
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
        $query = $this->db->insert('tbl_marcas_clases', $params);
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
        $keys = array('');
        $values = array('Seleccione una opcion');
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

    public function findAllTareas(){
        $this->db->select('*');
        $this->db->from('tbl_marcas_tareas');
        $query = $this->db->get();   
        return $query->result_array();
    }

    public function findAllTipoTareas(){
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

    public function BuscarTipoTareas($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_tipos_tareas');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['nombre']; 
    }

    public function BuscarTipoEventos($id = NULL){
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['descripcion']; 
    }

    public function findAllSolicitudesDocumento()
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes_documentos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAllEventos()
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_eventos');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function searchWhere($params): array
    {
        $this->db->select('a.id, b.nombre as tipo_registro, d.nombre_propietario, a.signonom as marca ,f.nombre as clase_niza, g.nombre as estado_expediente, i.nombre as pais_nom, a.solicitud, a.fecha_solicitud, a.registro, a.certificado, a.fecha_vencimiento');
        $this->db->distinct();
        $this->db->from('tbl_marcas_solicitudes a');
        $this->db->join('tbl_marcas_tipo_registro b', 'a.tipo_registro_id = b.id', 'left outer');
        $this->db->join('tbl_marcas_solicitantes c', 'a.id = c.marcas_id', 'left outer');
        $this->db->join('tbl_propietarios d', 'c.propietario_id = d.id', 'left outer');
        $this->db->join('tbl_marcas_clases e', 'a.id = e.marcas_id', 'left outer');
        $this->db->join('tbl_marcas_clase_niza f', 'e.clase_id = f.clase_niza_id', 'left outer');
        $this->db->join('tbl_estado_expediente g', 'a.estado_id = g.id', 'left outer');
        $this->db->join('tbl_marcas_solicitudes_paises h', 'a.id = h.marcas_id', 'left outer');
        $this->db->join('tbl_paises i', 'h.pais_id = i.id', 'left outer');
        $this->db->join('tblclients j','a.client_id = j.userid ', 'left outer');
        $this->db->join('tbl_tipo_solicitud k', 'k.id = a.tipo_solicitud_id', 'left outer');
        $this->db->join('tbl_tipo_signo l', 'a.tipo_signo_id = l.id', 'left outer');
        $this->db->join('tbl_marcas_eventos m', 'a.id = m.marcas_id', 'left outer');
        $this->db->join('tbl_tipos_eventos n', 'm.tipo_evento_id = n.id', 'left outer');
        $this->db->join('tbl_oficina o', 'a.oficina_id = o.oficina_id', 'left outer');
        $this->db->join('tbl_estado_expediente p', 'a.estado_id = p.id', 'left outer');
        $this->db->join('tbl_marcas_clases q', 'a.id = q.marcas_id', 'left outer');
        $this->db->join('tbl_marcas_clase_niza r', 'r.clase_niza_id = q.clase_id', 'left outer');
        $this->db->join('tbl_marcas_publicaciones s', 's.marcas_id = a.id', 'left outer');
        $this->db->join('tbl_boletines t', 't.id = s.boletin_id', 'left outer');
        $this->db->join('tblstaff u', 'a.staff_id = u.staffid', 'left outer');
        foreach($params as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $this->db->order_by("a.id", 'ASC');
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

    public function findAllMarcasDomicilio()
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_cambio_domicilio');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findAll()
    {
        $this->db->select('a.id, b.nombre as tipo_registro, d.nombre_propietario, a.signonom as marca ,f.nombre as clase_niza, g.nombre as estado_expediente, i.nombre as pais_nom, a.solicitud, a.fecha_solicitud, a.registro, a.certificado, a.fecha_vencimiento');
        $this->db->distinct();
        $this->db->from('tbl_marcas_solicitudes a');
        $this->db->join('tbl_marcas_tipo_registro b', 'a.tipo_registro_id = b.id', 'left outer');
        $this->db->join('tbl_marcas_solicitantes c', 'a.id = c.marcas_id', 'left outer');
        $this->db->join('tbl_propietarios d', 'c.propietario_id = d.id', 'left outer');
        $this->db->join('tbl_marcas_clases e', 'a.id = e.marcas_id', 'left outer');
        $this->db->join('tbl_marcas_clase_niza f', 'e.clase_id = f.clase_niza_id', 'left outer');
        $this->db->join('tbl_estado_expediente g', 'a.estado_id = g.id', 'left outer');
        $this->db->join('tbl_marcas_solicitudes_paises h', 'a.id = h.marcas_id', 'left outer');
        $this->db->join('tbl_paises i', 'h.pais_id = i.id', 'left outer');
        $this->db->join('tblclients j','a.client_id = j.userid ', 'left outer');
        $this->db->join('tbl_tipo_solicitud k', 'k.id = a.tipo_solicitud_id', 'left outer');
        $this->db->join('tbl_tipo_signo l', 'a.tipo_signo_id = l.id', 'left outer');
        $this->db->join('tbl_marcas_eventos m', 'a.id = m.marcas_id', 'left outer');
        $this->db->join('tbl_tipos_eventos n', 'm.tipo_evento_id = n.id', 'left outer');
        $this->db->join('tbl_oficina o', 'a.oficina_id = o.oficina_id', 'left outer');
        $this->db->join('tbl_estado_expediente p', 'a.estado_id = p.id', 'left outer');
        $this->db->join('tbl_marcas_clases q', 'a.id = q.marcas_id', 'left outer');
        $this->db->join('tbl_marcas_clase_niza r', 'r.clase_niza_id = q.clase_id', 'left outer');
        $this->db->join('tbl_marcas_publicaciones s', 's.marcas_id = a.id', 'left outer');
        $this->db->join('tbl_boletines t', 't.id = s.boletin_id', 'left outer');
        $this->db->join('tblstaff u', 'a.staff_id = u.staffid', 'left outer');
        $this->db->limit(150);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function findPublicacionesByMarca($id = NULL)
    {
        if(!is_null($id))
        {
            $this->db->select('a.id, b.descripcion, a.tomo, a.pagina');
            $this->db->from('tbl_marcas_publicaciones a');
            $this->db->join('tbl_boletines b', 'a.boletin_id = b.id');
            $this->db->join('tbl_paises c', 'b.pais_id = c.id');
            $this->db->where('a.marcas_id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                return $query->result_array();
            }
        }
    }

    public function findEventosByMarca($id = NULL)
    {
        if(!is_null($id))
        {
            $this->db->select('a.id, b.descripcion, a.comentarios, a.fecha');
            $this->db->from('tbl_marcas_eventos a');
            $this->db->join('tbl_tipos_eventos b', 'a.tipo_evento_id = b.id');
            $this->db->where('a.marcas_id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                return $query->result_array();
            }
        }
        
    }

    public function findTareasByMarca($id = NULL)
    {
        if(!is_null($id))
        {
            $this->db->select('a.id, b.nombre, a.fecha');
            $this->db->from('tbl_marcas_tareas a');
            $this->db->join('tbl_tipos_tareas b', 'a.tipo_tareas_id = b.id');
            $this->db->where('a.marcas_id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                return $query->result_array();
            }
        }
    }

    public function findAllTipoPublicacion()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipo_publicacion');
        $query = $this->db->get();
        $keys = array('');
        $values = array('Seleccione una opcion');
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['nombre']);
        }
        return array_combine($keys, $values); 
    }

    public function insertRegistroPiloto($id = NULL)
    {
        $this->db->insert($this->tableName,
        [
            'id' => intval($id),
            'tipo_registro_id' => 1,
            'oficina_id' => 1,
        ]);
    }

    public function insertMarcasClases(Array $params = null)
    {
        $query = $this->db->insert('tbl_marcas_clases', $params);
        if($query)
        {
            return TRUE;
        }
    }

    public function getMarcasClases($id = null)
    {
        $this->db->select('a.id, b.nombre, a.descripcion');
        $this->db->from('tbl_marcas_clases a ');
        $this->db->join('tbl_marcas_clase_niza b', 'a.clase_id = b.clase_niza_id');
        $this->db->where("marcas_id = '{$id}'");
        $query = $this->db->get();
        return $query->result_array();
    }


    public function findAllProjects()
    {
        $this->db->select('id, name');
        $this->db->from('tblprojects');
        $this->db->where('status < 4');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values, $row['name']);
        }
        return array_combine($keys, $values); 
    }
    
   
    public function CantidadSolicitudes(){
        $this->db->select('max(id) as cantidad');
        $this->db->from('tbl_marcas_solicitudes');
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['cantidad']; 
    }
}
