<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class MarcasPrioridad_model extends BaseModel
{
    protected $primaryKey = 'prioridad_id';
    protected $tableName =  'tbl_marcas_prioridad';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}