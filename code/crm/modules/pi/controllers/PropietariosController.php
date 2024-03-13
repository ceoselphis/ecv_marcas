<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropietariosController extends AdminController
{
    protected $models = ['Propietarios_model'];

    public function __construct()
    {
        parent::__construct();
    }
      
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->library('pagination');
        $data = array();
        $data = [
            //'propiertarios'             => $CI->Propietarios_model->findAllPropietarios(),
            'pais'              => $CI->Propietarios_model->findAllPaises(), 
            //'num_poder'              => $CI->Propietarios_model->findAllPoderes2(),
        ];
        
        /* foreach($CI->Propietarios_model->findAll() as $row)
        {
            $data[] = array(
                'id' => $row['id'],
                'codigo' => $row['codigo'],
                'nombre' => $row['nombre_propietario'],
                'pais'   => $CI->Propietarios_model->findPaises($row['pais_id']),
                'poder_num' => $CI->Propietarios_model->findAllPoderes($row['id']),
                'fecha_creacion' => $row['created_at'],
                'creado_por' => $CI->Propietarios_model->findStaff($row['created_by']),
                'fecha_modificacion' => $row['modified_at'],
                'modificado_por' => $CI->Propietarios_model->findStaff($row['modified_by'])
            );
        } */
        return $CI->load->view('propietarios/index', ["propietarios" => $data]);
    }

    public function filterSearch()
    {
        $CI = &get_instance();
        $CI->load->model('Propietarios_model');
        $form = json_decode($CI->input->post('data'), TRUE);
        $result = array();
        $query = array();
        $url_delete = admin_url('pi/PropietariosController/destroy/');
        $url_edit = admin_url('pi/PropietariosController/edit/');
        foreach($form as $key => $value)
        {
            if($value === '')
            {
                unset($form[$key]);
            }
        }
        if(empty($form))
        {
            $query = $CI->Propietarios_model->findAll();
            if(!empty($query))
            {
                foreach($query as $row){

                    $result[] = array(
                        /* 'id' => $row['id'], */
                        'codigo' => $row['codigo'],
                        'nombre' => $row['nombre_propietario'],
                        'pais'   => $CI->Propietarios_model->searchPaises($row['pais_id']),
                        'poder_num' => $CI->Propietarios_model->searchAllPoderes($row['id']),
                        'fecha_creacion' => $row['created_at'],
                        'creado_por' => $CI->Propietarios_model->searchStaff($row['created_by']),
                        'fecha_modificacion' => $row['modified_at'],
                        'modificado_por' => $CI->Propietarios_model->searchStaff($row['modified_by']),
                        'acciones' => "<div class=\"row row-group\">
                        <div class=\"col-xs-6\"><a class='btn btn-primary' href='{$url_edit}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a></div>
                        <div class=\"col-xs-6\"><form method='DELETE' action='{$url_delete}{$row["id"]}' onsubmit=\"return confirm('¿Esta seguro de eliminar este registro?')\">
                        <button type='submit' class='btn btn-danger col-mrg'><i class='fas fa-trash'></i>Borrar</button>
                        </form></div></div>",
                    );
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);   
            }
            else
            {
                echo json_encode(['code' => 404, 'message' => 'not found']);
            } 
        }
        else{
            $query = $CI->Propietarios_model->searchWhere($form);
            if(!empty($query))
            {
                foreach($query as $row)
                {
                    $result[] = [
                        /* 'id' => $row['id'], */
                        'codigo' => $row['codigo'],
                        'nombre' => $row['nombre_propietario'],
                        'pais'   => $row['nombre'],
                        'poder_num' => $row['numero'],
                        'fecha_creacion' => $row['created_at'],
                        'creado_por' => $row['firstname_created'].' '.$row['lastname_created'],
                        'fecha_modificacion' => $row['modified_at'],
                        'modificado_por' => $row['firstname_modif'].' '.$row['lastname_modif'],
                        'acciones' => "<div class=\"row row-group\">
                        <div class=\"col-md-6\"><a class='btn btn-primary' href='{$url_edit}{$row["id"]}')}'><i class='fas fa-edit'></i> Editar</a></div>
                        <div class=\"col-md-6\"><form method='DELETE' action='{$url_delete}{$row["id"]}' onsubmit=\"return confirm('¿Esta seguro de eliminar este registro?')\">
                        <button type='submit' class='btn btn-danger col-mrg'><i class='fas fa-trash'></i>Borrar</button>
                        </form></div></div>",
                    ];
                }
                echo json_encode(['code' => 200, 'message' => 'success', 'data' => $result]);   
            }
            else{
                echo json_encode(['code' => 404, 'message' => 'not found']);
            }
        }
    }

    public function search()
     {

     }

    public function showPropietarios(){
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $data = array();
        $propietarios = $CI->Propietarios_model->findAll();
        foreach ($propietarios as $row){
            $data[] = array(
                'id' => $row['id'],
                'codigo' => $row['codigo'],
                'nombre' => $row['nombre_propietario'],
                'pais'   => $CI->Propietarios_model->searchPaises($row['pais_id']),
                'poder_num' => $CI->Propietarios_model->searchAllPoderes($row['id']),
                'fecha_creacion' => $row['created_at'],
                'creado_por' => $CI->Propietarios_model->searchStaff($row['created_by']),
                'fecha_modificacion' => $row['modified_at'],
                'modificado_por' => $CI->Propietarios_model->searchStaff($row['modified_by'])
            );
        }
        echo json_encode($data);
    }

    /**
     * Shows the form to create a new item
     */

    public function create()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $fields = $CI->Propietarios_model->getFillableFields();
        $inputs = array();
        $labels = array();
        $paises = $CI->Propietarios_model->getAllPaises();
        $staff  = $CI->Propietarios_model->findAllStaff();
        $id = intval($CI->Propietarios_model->last_insert_id()) + 1;
        
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
        $labels = ['Id', 'Pais', 'Propietario', 'Estado Civil', 'Representante Legal', 'Direccion', 'Ciudad', 'Estado', 'Código Postal', 'Actividad Comercial', 'Datos de Registro', 'Notas'];
        return $CI->load->view('propietarios/create', ['fields' => $inputs, 'labels' => $labels, 'paises' => $paises, 'staff' => $staff, 'id' => $id]);
    }

    /**
     * Recive the data for create a new item
     */

    public function store()
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = json_decode($CI->input->post()['data'], TRUE);
        $id = $data['id'];
        $wdate = '' ? '' : explode('/', $data['fecha']);
        $data['fecha'] = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
        //We prepare the data 
        $poder = [
            'numero' => $data['numero'],
            'fecha'     => $data['fecha'],
            'origen'    => $data['origen'],
            'propietario_id' => $id,
        ];
        $propietarios = [
            'id'      => $data['id'],
            'pais_id' => $data['pais_id'],
            'codigo'  => $data['codigo'],
            'nombre_propietario' => $data['nombre_propietario'],
            'estado_civil' => $data['estado_civil'],
            'representante_legal' => $data['representante_legal'],
            'direccion' => $data['direccion'],
            'ciudad' => $data['ciudad'],
            'estado' => $data['estado'],
            'codigo_postal' => $data['codigo_postal'],
            'actividad_comercial' => $data['actividad_comercial'],
            'datos_registro' => $data['datos_registro'],
            'notas' => $data['notas'],
            'modified_at' => date('Y-m-d'),
            'modified_by' => $_SESSION['staff_user_id'],
        ];
        $query = $CI->Propietarios_model->insert($propietarios);
        $poder_id = $CI->Propietarios_model->insertPoder($poder);
        /*Iteramos sobre los apoderados para insertar dentro de la tabla de apoderados*/
        $dsApoderados = array();
        foreach($data['apoderados'] as $row)
        {
            $dsApoderados[] = [
                'poder_id' => $poder_id,
                'staff_id' => intval($row),
            ];
        }
        /*Insertamos en la tabla*/
        unset($query);
        $query = $CI->Propietarios_model->insertApoderados($dsApoderados);
        /*Devolvemos el resultado*/
        if (isset($query))
        {
            echo json_encode(['code' => 200, 'message' => 'success']);
        }
        else
        {
            echo json_encode(['code' => 500, 'message' => 'error']);
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
        $CI->load->model("Propietarios_model");
        $CI->load->helper('url');
        $query = $CI->Propietarios_model->find($id);
        $paises = $CI->Propietarios_model->getAllPaises();
        $staff  = $CI->Propietarios_model->findAllStaff();
        $poderes = $CI->Propietarios_model->findAllPoderes($id);
        $apoderados = $CI->Propietarios_model->findApoderados($id);
        if(isset($query))
        {
            $labels = ['Id', 'Pais', 'Propietario', 'Estado Civil', 'Representante Legal', 'Direccion', 'Ciudad', 'Estado', 'Código Postal', 'Actividad Comercial', 'Datos de Registro', 'Notas'];
            return $CI->load->view('propietarios/edit', ['values' => $query, 'labels' => $labels, 'paises' => $paises, 'staff' => $staff, 'id' => $id, 'poderes' => $poderes, "apoderados" => $apoderados]);
        }
        else{
            return redirect('pi/PropietariosController/');
        }
    }

    /**
     * Recive the data to update
     * 
     */

    public function update(string $id = null)
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper(['url','form']);
        $CI->load->library('form_validation');
        $data = $CI->input->post();
        $wdate = '' ? '' : explode('/', $data['fecha']);
        $data['fecha'] = "{$wdate[2]}-{$wdate[1]}-{$wdate[0]}";
        //We prepare the data 
        $poder = [
            'numero' => $data['numero'],
            'fecha'     => $data['fecha'],
            'origen'    => $data['origen'],
            'propietario_id' => $id,
        ];
        $propietarios = [
            'pais_id' => $data['pais_id'],
            'codigo'  => $data['codigo'],
            'nombre_propietario' => $data['nombre_propietario'],
            'estado_civil' => $data['estado_civil'],
            'representante_legal' => $data['representante_legal'],
            'direccion' => $data['direccion'],
            'ciudad' => $data['ciudad'],
            'estado' => $data['estado'],
            'codigo_postal' => $data['codigo_postal'],
            'actividad_comercial' => $data['actividad_comercial'],
            'notas' => $data['notas'],
            'modified_at' => date('Y-m-d'),
            'modified_by' => $_SESSION['staff_user_id'],
        ];
        $query = $CI->Propietarios_model->update($id, $propietarios);
        $poderResult = $CI->Propietarios_model->updatePoder($data['poder_id'], $poder);
        /*Iteramos sobre los apoderados para insertar dentro de la tabla de apoderados*/
        $dsApoderados = array();
        foreach($data['apoderados'] as $row)
        {
            $dsApoderados[] = [
                'poder_id' => $data['poder_id'],
                'staff_id' => intval($row),
            ];
        }
        unset($query);
        $query = $CI->Propietarios_model->updateApoderados($dsApoderados);
        if (isset($query))
        {
            echo json_encode(['code' => 200, 'message' => 'success']);
        }
        else
        {
            echo json_encode(['code' => 500, 'message' => 'not found']);
        }
    }

    /**
     * Deletes the item
     */

    public function destroy(string $id)
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper('url');
        $query = $CI->Propietarios_model->delete($id);
        return redirect('pi/PropietariosController/');
        
        
    }

    public function storeDocument($id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model("Propietarios_model");
        $CI->load->helper('url');
        $data = $CI->input->post();
        $query = [
            'propietario_id' => $id,
            'comentarios' => $data['comentarios'],
            'archivo' => '',
            'descripcion' => $data['descripcion']
        ];
        $file = '';
        if(!empty($_FILES['archivo']))
        {
            $file = $_FILES['archivo'];
        }
        else{
            $file = NULL;
        }
        if($file != NULL)
        {
            //We fill the data of the         
            $path = FCPATH.'uploads/propietarios/documentos/'.$file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $query['archivo'] = $path;
            $result = $CI->Propietarios_model->insertDocument($query);
            if($result)
            {
                echo json_encode(['message' => 'success']);
            }
            else 
            {
                echo json_encode(['message' => 'No se puede añadir un documento sin haber guardado antes el propietario']);
            }
        }
    }

    public function getDocument($id = null)
    {
        $CI = &get_instance();
        $CI->load->model('PropietariosDocumentos_model');
        $query = $CI->PropietariosDocumentos_model->findAllDocumentsByPropietarios($id);
        if(!empty($query))
        {
            echo json_encode(['code' => 200, 'message' => 'success', 'data' => $query]);
        }
        else
        {
            echo json_encode(['code' => 404, 'message' => 'not found']);
        }
    }
}