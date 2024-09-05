<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasSolicitantes_model extends BaseModel
{
    protected $primaryKey = 'mar_sol_id';
    protected $tableName =  'tbl_marcas_solicitantes';
    protected $DBgroup = 'default';
    protected $filliable = [];
    
    public function __construct()
    {
        parent::__construct();
    }
}