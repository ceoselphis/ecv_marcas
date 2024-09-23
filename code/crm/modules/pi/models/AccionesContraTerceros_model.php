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

    

    public function searchWhere2($params): array{
        $this->db->select(
        '
        	marca_id,
            marca_nombre,
            marca_clase_niza_id,
            marca_nombre_niza,
            marca_num_solicitud,
            marca_num_registro,
            marca_id_propietario,
            marca_id_pais_solicitud,
            marca_opuesta_id,
            marca_opuesta_tipo_solicitud_id,
            marca_opuesta_client_id,
            marca_opuesta_estado_id,
            marca_opuesta_pais_id,
            marca_opuesta_marca_opuesta,
            marca_opuesta_clase_niza,
            marca_opuesta_solicitud_nro,
            marca_opuesta_registro_nro,
            marca_opuesta_fecha_solicitud,
            marca_opuesta_fecha_registro,
            marca_opuesta_propietario,
            marca_opuesta_pais,
            marca_tipo_solicitud,
            marca_nombre_solictud,
            marca_ref_interna,
            marca_estado_solicitud,
            marca_boletin_id,
            marca_nombre_contacto,
            marca_ref_cliente
        '
        );
        $this->db->distinct();
        $this->db->from('tblview_acciones_terceros');
        /*
          <td class="text-center">${item.codigo}</td>
                                    <td class="text-center">${item.tipo}</td>
                                    <td class="text-center">${item.demandante}</td>
                                    <td class="text-center">${item.demandado}</td>
                                    <td class="text-center">${item.objeto}</td>
                                    <td class="text-center">${item.nro_solicitud}</td>
                                    <td class="text-center">${item.fecha_solicitud}</td>
                                    <td class="text-center">${item.estado}</td>
                                    <td class="text-center">${item.pais}</td>


  
        */
        foreach($params as $key => $value)
        {
            switch ($key) {
                case 'solicitud':
                case 'nro_registro':
                case 'denominacion_opuesta':
                case 'solicitud_opuesta':
                case 'registro_opuesta':
                case 'propietario_opuesta':
                case 'codigo_expediente':
                case 'contacto':
                case 'ref_cliente':
                    $this->db->like($key,$value);
                    break;
                case 'fecha_solicitud_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_solicitud >=', $data);
                    break;
                case 'fecha_solicitud_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_solicitud <=', $data);
                    break;
                    
                default:
                    $this->db->where($key, $value);
            }
        }
        //$this->db->order_by("id", 'ASC');
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

    public function CantidadSolicitudes(){
        $this->db->select('max(id) as cantidad');
        $this->db->from('tbl_acciones_terceros');
        $query = $this->db->get();
        $values = $query->result_array();
        return $values[0]['cantidad']; 
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

    public function getAll(){
        
    }

    public function getAllExpediente()
    {
        $this->db->select('*');
        $this->db->from('tbl_estado_expediente');
        $query = $this->db->get();
        $keys = array();
        $values = array();
        foreach($query->result_array() as $row)
        {
            array_push($keys, $row['id']);
            array_push($values,$row['nombre']);
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
        $keys = array();
        $values = array();
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

    public function getAllTiposPublicaciones()
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

    public function getAllTiposTareas()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_tareas');
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

    public function findDenominacionBase($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $this->db->where('id = ', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findClaseNiza($marcas_id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_clases');
        $this->db->where('marcas_id = ', $marcas_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findCliente($id = null)
    {
        $this->db->select('company');
        $this->db->from('tblclients');
        $this->db->where('userid = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    

    public function findMarca($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_marcas_solicitudes');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findEstatus($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_tipos_eventos');
        $this->db->where('id  = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function findPais($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('tbl_paises');
        $this->db->where('id = '.$id);
        $query = $this->db->get();
        return $query->result_array();
    }


}