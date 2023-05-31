<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends AdminController
{
    /**
     * Module Configuration
     * 
     * This module has the objetive to administrate all to concern 
     * about the configuration managment using this CRM.
     * 
     * 
     * Date: 05-2023.
     * 
     * 
     * 
     */

     public function __construct()
     {
      parent::__construct();
      $this->load->model('Marcas_model');

     }
     /**
      * Method to show all rows in the view
      */
     public function index()
     {
        $query = $this->Marcas_model->findAll();
        $CI = &get_instance();
        return $CI->load->view('marca/index.php', $query->result_array());
     }

     /**
      * Method to show a single record of brand
      */

      public function show($id = null)
      {

      }

      /**
       * Method to create a new brand 
       */

       public function create()
       {

       }

       /**
        * Method to edit a record of brand
        */

        public function edit()
        {

        }

        /**
         * Method to delete a record of brand (Safe delete)
         */
        public function delete()
        {

        }
}