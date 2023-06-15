<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Clases_model extends BaseModel
{
    protected $primaryKey = 'niza_id';
    protected $tableName =  'tbl_clase_niza';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}