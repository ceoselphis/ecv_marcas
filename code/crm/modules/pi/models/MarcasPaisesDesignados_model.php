<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasPaisesDesignados_model extends BaseModel
{
    protected $primaryKey = 'pais_design_id';
    protected $tableName =  'tbl_tm_paises_designados';
    protected $DBgroup = 'default';
    protected $filliable = [];
    
    public function __construct()
    {
        parent::__construct();
    }
}