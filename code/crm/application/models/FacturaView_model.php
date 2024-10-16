<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class FacturaView_model extends BaseModel
{
    protected $primaryKey = 'factura_id';
    protected $tableName =  'tblview_facturas';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_Marcas($id){
        $this->db->select('*');
        $this->db->from('tblview_marcas_solicitudes');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Oposicion($id){
        $this->db->select('*');
        $this->db->from('tblview_acciones_terceros');
        $this->db->where('marca_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
   
    public function get_Factura_Pdf($id){
        $this->db->select('*');
        $this->db->from('tblview_facturas_pdf');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}