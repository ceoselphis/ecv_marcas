<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class PatentesSolicitantes_model extends BaseModel
{
    protected $primaryKey = 'id';
    protected $tableName =  'tbl_patentes_solicitantes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    


}