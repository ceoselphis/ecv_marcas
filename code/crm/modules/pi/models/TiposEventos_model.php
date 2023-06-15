<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TiposEventos_model extends BaseModel
{
    protected $primaryKey = 'tipo_eve_id';
    protected $tableName =  'tbl_tipo_evento';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}