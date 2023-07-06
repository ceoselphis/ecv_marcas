<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TiposSignos_model extends BaseModel
{
    protected $primaryKey = 'tipos_signo_id';
    protected $tableName =  'tbl_tipos_signos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}