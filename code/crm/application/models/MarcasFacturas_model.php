<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasFacturas_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_marcas_facturas';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function insertPatenteFactura($params)
    {
        $query = $this->db->insert_batch('tbl_patentes_facturas', $params);
        return $query;
    }

    public function insertRegistroSanitariosFactura($params)
    {
        $query = $this->db->insert_batch('tbl_registros_sanitarios_solicitudes', $params);
        return $query;
    }

    public function insertDerechoAutorFactura($params)
    {
        $query = $this->db->insert_batch('tbl_derecho_autor_solicitudes', $params);
        return $query;
    }

    public function insertAccionesTercerosFactura($params){
        $query = $this->db->insert_batch('tbl_acciones_terceros', $params);
        return $query;
    }

     



   
    
}