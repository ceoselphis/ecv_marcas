<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class RegistrosSanitariosSolicitantes_model extends BaseModel
{
    protected $primaryKey = 'id_solicitud';
    protected $tableName =  'tbl_registros_sanitarios_solicitantes';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }

    


}