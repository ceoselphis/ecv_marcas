<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dnda extends AdminController
{
    /**
     * Module Dnda
     * 
     * This module has the objetive to administrate all to concern 
     * about the Copyright managment using this CRM.
     * 
     *
     * Date: 05-2023.
     * 
     * 
     * 
     */

     /**
      * Method to shows a view in the admin panel
      */
     public function index()
     {
        $CI = &get_instance();
        $CI->load->library('pagination');
        return $CI->load->view('marca/index.php');
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