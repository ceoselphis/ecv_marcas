<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Clases_model extends BaseModel
{
    protected $primaryKey = 'clase_niza_id';
    protected $tableName =  'tbl_marcas_clase_niza';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}