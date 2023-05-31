<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Marcas_model extends App_Model
{
    protected $primaryKey = 'marca_id';
    protected $tableName = 'tbl_marcas';
    protected $DBgroup = 'default';

    public function __construct()
    {
        $CI = &get_instance();
        $CI->load->database($this->DBgroup);
        parent::__construct();
    }

    public function findAll()
    {
        $this->db->select("*");
        $this->db->from($this->tableName);
        $result = $this->db->get();
        return $result;
    }

    public function find($id = null)
    {

    }

    public function insert(Array $params)
    {

    }

    public function edit($id = null)
    {

    }

    public function delete($id = null)
    {

    }

    public function findAllByUser($user = null)
    {
        
    }

}