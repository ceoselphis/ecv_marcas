<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Pais_model extends BaseModel
{
    protected $primaryKey = 'pais_id';
    protected $tableName =  'tbl_paises';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}