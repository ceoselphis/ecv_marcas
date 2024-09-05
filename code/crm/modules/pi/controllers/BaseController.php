<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class BaseController extends AdminController
{
    protected $CI;
    protected $user;
    protected $models = [];
    public $app_modules = [];

    /**
     * We set the variables during the load
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModels();
    }

    private function loadModels(): void
    {
        foreach($this->models as $item)
        {
            $this->load->model($item);
        }
    }
}

?>