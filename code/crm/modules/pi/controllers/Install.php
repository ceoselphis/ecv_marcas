<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends AdminController
{
    /**
     * Module Install
     * 
     * This module has the objetive to install all the Database Schema
     * to use this CRM.
     * 
     *
     * Date: 05-2023.
     * 
     * 
     * 
     */

     /**
      * Method to shows the installer
      */
     public function index()
     {
        $CI = &get_instance();
        return $CI->load->view('installer/install');
     }
}