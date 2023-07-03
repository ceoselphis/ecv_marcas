<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class TiposPublicaciones_model extends BaseModel
{
    protected $primaryKey = 'tipo_pub_id';
    protected $tableName =  'tbl_tipo_publicacion';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}