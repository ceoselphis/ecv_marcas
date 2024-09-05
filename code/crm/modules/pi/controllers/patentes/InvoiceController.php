<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InvoiceController extends AdminController
{
    protected $models = ['PatentesSolicitudes_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PatentesSolicitudes_model");
        return $CI->load->view('patente/solicitudes/index');
    }

    /**
     * Shows the form to create a new item
     */

    public function create($id)
    {
      return is_null($id) ? null : redirect(admin_url("invoices/invoice?patente_id={$id}"));
        
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        
    }
}
