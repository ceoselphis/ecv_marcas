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

    public function find_Expediente($id) {
        $this->db->select('*');
        $this->db->from('tbl_expediente_facturas');
        $this->db->where('facturas_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Registro_Sanitarios($id) {
        $this->db->select('*');
        $this->db->from('tblview_registros_sanitarios');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Patente($id) {
        $this->db->select('*');
        $this->db->from('tblview_patentes');
        $this->db->where('codigo', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_derecho_autor($id) {
        $this->db->select('*');
        $this->db->from('tblview_derecho_autor');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
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
        $this->db->where('marca_opuesta_id', $id);
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

    public function get_Item_Group($id){
        $this->db->select('*');
        $this->db->from('tblitems');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res[0]['group_id'];
    }
    
}