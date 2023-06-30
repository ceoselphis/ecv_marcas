<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TipoPatentes_model extends BaseModel
{
    protected $primaryKey = 'tip_pat_id';
    protected $tableName =  'tbl_tipos_patentes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}