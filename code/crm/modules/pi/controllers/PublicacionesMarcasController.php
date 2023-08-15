<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicacionesMarcasController extends AdminController
{
    protected $models = ['PublicacionesMarcas_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        return $CI->load->view('marcas/publicaciones/index', ["publicaciones" => $CI->PublicacionesMarcas_model->findAll()]);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $fields = $CI->PublicacionesMarcas_model->getFillableFields();
        $boletines = array();
        foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
        {
            $boletines[$row['id']] = $row['descripcion'];

        }
        $paises = array();
        foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
        {
            $paises[$row['id']] = $row['nombre'];
        }
        $tipoPub = array();
        foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
        {
            $tipoPub[$row['id']] = $row['nombre'];
        }
        $solicitud = array();
        /*if(!empty($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas()))
        {
            foreach($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas() as $row)
            {
                $solicitud[$row['solicitud_id']] = $row['reg_num_id'];
            }
        }*/
        
        $inputs = array();
        $labels = array();
        foreach($fields as $field)
        {
            if($field['type'] == 'INT')
            {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
        return $CI->load->view('marcas/publicaciones/create', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        // WE prepare the data
        $data = $CI->input->post();
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'tipo_pub_id',
                'label' => 'Tipo Publicacion',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un tipo de solicitud',
                    'regex_match' => 'El tipo de solicitud no es valido',
                ]
            ],
            [
                'field' => 'boletin_id',
                'label' => 'Boletin',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un boletin de procedencia',
                    'regex_match' => 'El número de boletin no es valído',
                ]
            ],
            [
                'field' => 'solicitud_id',
                'label' => 'Solcitud',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar la solicitud de marcas',
                    'regex_match' => 'El número de solictud no es valido',
                ]
            ],
            [
                'field' => 'tomo',
                'label' => 'Tomo',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de tomo',
                    'regex_match' => 'El número de tomo no es valido',
                ]
            ],
            [
                'field' => 'pagina',
                'label' => 'Pagina',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de Pagina',
                    'regex_match' => 'El número de Pagina no es valido',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $fields = $CI->PublicacionesMarcas_model->getFillableFields();
            $boletines = array();
            foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
            {
                $boletines[$row['boletin_id']] = $row['nombre'];

            }
            $paises = array();
            foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
            {
                $paises[$row['pais_id']] = $row['nombre'];
            }
            $tipoPub = array();
            foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
            {
                $tipoPub[$row['tipo_pub_id']] = $row['nombre'];
            }
            $solicitud = array(); //TO-DO
            $inputs = array();
            $labels = array();
            foreach($fields as $field)
            {
                if($field['type'] == 'INT')
                {
                    $inputs[] = array(
                        'name' => $field['name'],
                        'id'   => $field['name'],
                        'type' => 'range',
                        'class' => 'form-control'
                    );
                }
                else{
                    $inputs[] = array(
                        'name' => $field['name'],
                        'id'   => $field['name'],
                        'type' => 'text',
                        'class' => 'form-control'
                    );
                }
            }
            $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
            return $CI->load->view('marcas/publicaciones/create', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud]);
        }
        else
        {
            //we sent the data to the model
            $query = $CI->PublicacionesMarcas_model->insert($data);
            if(isset($query))
            {
                return redirect(admin_url('pi/publicacionesmarcascontroller/'));
            }
        }
        
    }

    /**
     * Find a single item to show
     */

    public function show(string $id = null)
    {

    }

    /**
     * Shows a form to edit the data
     */

    public function edit(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $query = $CI->PublicacionesMarcas_model->find($id);
        $fields = $CI->PublicacionesMarcas_model->getFillableFields();
        $boletines = array();
        foreach($CI->PublicacionesMarcas_model->findAllBoletines() as $row)
        {
            $boletines[$row['boletin_id']] = $row['nombre'];

        }
        $paises = array();
        foreach($CI->PublicacionesMarcas_model->findAllPaises() as $row)
        {
            $paises[$row['pais_id']] = $row['nombre'];
        }
        $tipoPub = array();
        foreach($CI->PublicacionesMarcas_model->findAllTipoPublicaciones() as $row)
        {
            $tipoPub[$row['tipo_pub_id']] = $row['nombre'];
        }
        $solicitud = array();
        foreach($CI->PublicacionesMarcas_model->findAllSolicitudesMarcas() as $row)
        {
            $solicitud[$row['solicitud_id']] = $row['reg_num_id'];
        }
        $inputs = array();
        $labels = array();
        foreach($fields as $field)
        {
            if($field['type'] == 'INT')
            {
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'range',
                    'class' => 'form-control'
                );
            }
            else{
                $inputs[] = array(
                    'name' => $field['name'],
                    'id'   => $field['name'],
                    'type' => 'text',
                    'class' => 'form-control'
                );
            }
        }
        if(!empty($query))
        {
            $labels = ['Id','Solicitud', 'Boletin', 'Tipo de Publicacion', 'Tomo', 'Página'];
            return $CI->load->view('marcas/publicaciones/edit', ['fields' => $inputs, 'labels' => $labels, 'boletines' => $boletines, 'tipoPub' => $tipoPub, 'solicitud' => $solicitud, 'id' => $id, 'values' => $query]);
        }
        else{
            return redirect('pi/publicacionesmarcascontroller/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        //We validate the data
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        //we validate the data
        //we set the rules
        $config = array(
            [
                'field' => 'tipo_pub_id',
                'label' => 'Tipo Publicacion',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un tipo de solicitud',
                    'regex_match' => 'El tipo de solicitud no es valido',
                ]
            ],
            [
                'field' => 'boletin_id',
                'label' => 'Boletin',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar un boletin de procedencia',
                    'regex_match' => 'El número de boletin no es valído',
                ]
            ],
            [
                'field' => 'solicitud_id',
                'label' => 'Solcitud',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar la solicitud de marcas',
                    'regex_match' => 'El número de solictud no es valido',
                ]
            ],
            [
                'field' => 'tomo',
                'label' => 'Tomo',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de tomo',
                    'regex_match' => 'El número de tomo no es valido',
                ]
            ],
            [
                'field' => 'pagina',
                'label' => 'Pagina',
                'rules' => 'trim|required|regex_match[/[0-9]*/]',
                'errors' => [
                    'required' => 'Debe indicar el numero de Pagina',
                    'regex_match' => 'El número de Pagina no es valido',
                ]
            ],
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else
        {
            //We prepare the data 
            $query = $CI->PublicacionesMarcas_model->update($id, $data);
            if (isset($query))
            {
                return redirect('pi/publicacionesmarcascontroller/');
            }
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("PublicacionesMarcas_model");
        $CI->load->helper('url');
        $query = $CI->PublicacionesMarcas_model->delete($id);
        return redirect('pi/publicacionesmarcascontroller/');
        
        
    }
}