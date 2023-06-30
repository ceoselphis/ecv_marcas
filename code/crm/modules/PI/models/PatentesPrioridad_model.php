<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesPrioridad_model extends BaseModel
{
    protected $primaryKey = 'pri_pat_id';
    protected $tableName =  'tbl_patentes_prioridad';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}