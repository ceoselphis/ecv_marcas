<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class RegistrosPrincipales_model extends BaseModel
{
    protected $primaryKey = 'sol_cla_id';
    protected $tableName =  'solicitud_id';
    protected $DBgroup = 'default';
    protected $filliable = [];
    
    public function __construct()
    {
        parent::__construct();
    }
}