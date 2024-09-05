<?php 
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/BaseModel.php';

class Anexos_model extends BaseModel
{
    protected $primaryKey = 'tip_ax_id';
    protected $tableName =  'tbl_tipo_anexo';
    protected $DBgroup = 'default';
    
    public function __construct()
    {
        parent::__construct();
    }
}