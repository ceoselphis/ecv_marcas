<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * This class can access the CI framework to build some kind of ORM
 * to accelerate the development of the module
 */

abstract class BaseModel extends CI_Model
{
    /**
     * Variables to set for use the Base Model
     */
    protected $primaryKey;
    protected $tableName;
    protected $DBgroup;
    protected $fields = [];

    public function __construct()
    {
        $this->load->database($this->DBgroup);
        $this->setMetadataTable();
        parent::__construct();
    }

    /**
     * Find all rows of table
     */

    public function findAll()
    {
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    /**
     * Find a single row of table
     */

    public function find($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where($this->primaryKey." = ".$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Insert a row on the table
     */

    public function insert(Array $params)
    {
        $query = $this->db->insert($this->tableName, $params);
        return $query;
    }

    /**
     * Insert multiple rows in the table
     */

    public function insertMultiple(Array $params)
    {
        $query = $this->db->insert_batch($this->tableName, $params);
        return $query;
    }

    /**
     * Update a row in the table
     */

    public function update($id = null, Array $params)
    {
        $this->db->where($this->primaryKey.' = '.$id);
        $this->db->set($params);
        $query = $this->db->update($this->tableName);
        return $query;
    }

    /**
     * Update multiple rows in a table
     */
    public function updateMultiple(Array $params)
    {
        $query = $this->db->update_batch($this->tableName, $params);
        return $query;
    }

    /**
     * Deletes a row in the table
     */
    public function delete($id = null)
    {
        $query = $this->db->delete($this->tableName, [$this->primaryKey => $id]);
        return $query;
    }

    /**
     * Get the metadata of the Table
     */
    public function getMetadataTable()
    {
        return $this->fields;
    }

    /**
     * Set the metadata of the table
     */

    public function setMetadataTable()
    {
        $query = $this->db->query("SHOW fields FROM ".$this->tableName);
        $this->fields = $query->result_array();
        return $this->fields;
    }

    /**
     * return fillable fields to get a form
     */
    public function getFillableFields()
    {
        $result = [];
        foreach($this->fields as $row)
        {
            $result[] = array(
                'name'  => $row['Field'],
                'id'    => $row['Field'],
                'type'  => $row['Type'],
            );
        }
        return $result;
    }

    /**/
    public function last_insert_id()
    {
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}

?>