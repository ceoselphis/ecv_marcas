<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Materias_model extends App_Model
{
    /**
     * Class to initializate the schema
     */
    protected $primaryKey = '';
    protected $tableName = 'materias';
    protected $DBgroup = '';

    public function getAllMeta()
    {
        $CI = &get_instance();
        $result = $CI->db->query("SHOW field.id, field.name FROM tbl_materias");
        return $result->result_array();
    }

    public function findAll(){
        $CI = &get_instance();
        $result = $CI->db->get(db_prefix()."_materias");
        return $result->result_array();
    }
}