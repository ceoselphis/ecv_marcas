<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class AutoresSolicitantes_model extends BaseModel
{
    protected $primaryKey = 'id_solicitud';
    protected $tableName =  'tbl_derecho_autor_solicitantes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}