<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Materias_model extends BaseModel
{
    protected $primaryKey = 'materia_id';
    protected $tableName =  'tbl_materias';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}