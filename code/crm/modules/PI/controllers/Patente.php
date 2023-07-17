<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patente extends AdminController
{
    /**
     * Module Patente
     * 
     * This module has the objetive to administrate all to concern 
     * about the patent managment using this CRM.
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
    }

     /**
      * Method to shows a view in the admin panel
      */
     public function index()
     {
        $CI = &get_instance();
        return $CI->load->view('patente/index.php');
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