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

    public function findAll(){
        $CI = &get_instance();
        $result = $CI->db->get(db_prefix()."_materias");
        return $result->result_array();
    }


    public function find($id = null)
    {
        $CI = &get_instance();
        $result = $CI->db->where('materia_id', $id);
        return $result->result_array();
    }

    public function insert(Array $params)
    {
        $CI = &get_instance();
        $result = $CI->db->insert($params);
        return $result;
    }
}