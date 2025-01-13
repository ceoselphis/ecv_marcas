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
        if (is_array($params)) {
            return $this->db->insert_batch('tbl_patentes_facturas', [$params]);
        } else {
            log_message('error', 'El parámetro pasado no es un array en insertPatenteFactura.');
            return false;
        }
    }

    public function insertRegistroSanitariosFactura($params)
    {
        if (is_array($params)) {
            return $this->db->insert_batch('tbl_registros_sanitarios_facturas', [$params]);
        } else {
            log_message('error', 'El parámetro pasado no es un array en insertRegistroSanitariosFactura.');
            return false;
        }
    }

    public function insertDerechoAutorFactura($params)
    {
        if (is_array($params)) {
            return $this->db->insert_batch('tbl_derecho_autor_facturas', [$params]); // Asegúrate que el argumento sea un array multidimensional
        } else {
            log_message('error', 'El parámetro pasado no es un array en insertDerechoAutorFactura.');
            return false;
        }
    }

    public function insertAccionesTercerosFactura($params){
        if (is_array($params)) {
            return $this->db->insert_batch('tbl_acciones_terceros_facturas', [$params]);
        } else {
            log_message('error', 'El parámetro pasado no es un array en insertAccionesTercerosFactura.');
            return false;
        }
    }

    public function insertExpedienteFactura($params){
        if (is_array($params)) {
            return $this->db->insert_batch('tbl_expediente_facturas', [$params]);
        } else {
            log_message('error', 'El parámetro pasado no es un array en insertAccionesTercerosFactura.');
            return false;
        }
    }
     



   
    
}