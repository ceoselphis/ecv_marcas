<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class RegistrosPrincipales_model extends BaseModel
{
    protected $primaryKey = 'reg_num_id';
    protected $tableName =  'tbl_tm_registros_principales';
    protected $DBgroup = 'default';
    protected $filliable = [];
    
    public function __construct()
    {
        parent::__construct();
    }
}