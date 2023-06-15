<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Eventos_model extends BaseModel
{
    protected $primaryKey = 'eve_id';
    protected $tableName =  'tbl_eventos';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}