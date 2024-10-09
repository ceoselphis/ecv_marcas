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

   
    
}