<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Configuration_model extends App_Model
{
    /**
     * Class to initializate the schema
     */
    protected $primaryKey = '';
    protected $tableName = '';
    protected $DBgroup = '';

    public function findAll()
    {
        $CI = &get_instance();
        $DB = $CI->load->database('default');
        $DB->select('*');
        $DB->from('');
    }
}
