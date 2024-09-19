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
        $this->db->select('id, tipo_solicitud, nombre_solicitud, cliente_id, nombre_cliente, nombre_niza as clase_niza, nombre_solictud as estado_expediente, nombre_pais_solicitud as pais_nom, num_solicitud as solicitud, fecha_solicitud, num_registro as registro, certificado, fecha_vencimiento');
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
                case 'cod_contador':
                case 'marca':
                case 'ref_cliente':
                case 'ref_interna':
                case 'num_solicitud':
                case 'num_registro':
                case 'descripcion_niza':
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
                case 'fecha_vencimiento_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_vencimiento >=', $data);
                    break;
                case 'fecha_vencimiento_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_vencimiento <=', $data);
                    break;
                case 'fecha_evento_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_evento >=', $data);
                    break;
                case 'fecha_evento_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_evento <=', $data);
                    break;
                case 'prueba_uso_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('prueba_uso >=', $data);
                    break;
                case 'prueba_uso_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('prueba_uso <=', $data);
                    break;
                case 'fecha_registro_desde':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_registro >=', $data);
                    break;
                case 'fecha_registro_hasta':
                    $wdate = '' ? '' : explode('/', $value);
                    $data = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
                    $this->db->where('fecha_registro <=', $data);
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