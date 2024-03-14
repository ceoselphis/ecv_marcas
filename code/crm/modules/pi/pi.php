<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');
define('PI_CRM_MODULE_NAME', 'pi_setup');

/*
Module Name: Propiedad Intelectual
Description: Modulo de gestion de propiedad intelectual.
Version: 2.3.0
Requires at least: 2.3.*
*/

hooks()->add_action('admin_init', 'pi_menu_item_collapsible');

//hooks()->add_action('clients_init', pi_client_menu_item_collapsible());


/**
 * Menu Items
 */
function pi_menu_item_collapsible()
{
    $CI = &get_instance();
    $dbPrefix = db_prefix();

    /**
     * Option only to install
     */

     //Menu de configuracion 2
    $CI->app_menu->add_sidebar_menu_item('51', [
        'slug'     => 'config-2', // Required ID/slug UNIQUE for the child menu
        'name'     => 'SPI Configuracion 2', // The name if the item
        'position' => 11, // The menu position
        'icon'     => 'fa-sharp fa-solid fa-gear', // Font awesome icon
    ]);

    //Propietarios
    $CI->app_menu->add_sidebar_children_item('51', [
        'slug'   => 'propietarios-admin',
        'name'  => 'Administrador de Propietarios',
        'href'  => admin_url('pi/PropietariosController'),
        'position' => 11,
    ]);
    //Correspondecia Usuario
    $CI->app_menu->add_sidebar_children_item('51', [
        'slug'   => 'correspondenciausuario-admin',
        'name'  => 'Correspondencia Usuario',
        'href'  => admin_url('pi/CorrespondeciaUsuarioController'),
        'position' => 11,
    ]);
    //Correspondecia Plantilla
    $CI->app_menu->add_sidebar_children_item('51', [
        'slug'   => 'correspondenciaplantilla-admin',
        'name'  => 'Correspondencia Plantilla',
        'href'  => admin_url('pi/CorrespondeciaPlantillaController'),
        'position' => 11,
    ]);
    //Administrador de Tareas
    $CI->app_menu->add_sidebar_children_item('51',[
        'slug'   => 'tareas-admin',
        'name'  => 'Administrador de Tareas',
        'href'  => admin_url('pi/TareasAdminController'),
        'position' => 11,
    ]);


     //Menu de configuracion
    $CI->app_menu->add_sidebar_menu_item('52', [
        'slug'     => 'configuracion', // Required ID/slug UNIQUE for the child menu
        'name'     => 'SPI Configuracion', // The name if the item
        'position' => 11, // The menu position
        'icon'     => 'fa-sharp fa-solid fa-gear', // Font awesome icon
    ]);
    
    //Clases
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-clases', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Clase Niza', // The name if the item
        'href'     => admin_url('pi/ClasesController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    //Eventos
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-eventos', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Tipos de Eventos', // The name if the item
        'href'     => admin_url('pi/TiposEventosController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    
    //materias
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-materias', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de materias', // The name if the item
        'href'     => admin_url('pi/MateriasController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    //Estados
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-estados', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Estados', // The name if the item
        'href'     => admin_url('pi/EstadosController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    //Boletines
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-boletines', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Boletines', // The name if the item
        'href'     => admin_url('pi/BoletinesController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    //Tipos de publicaciones
    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'tipos-publicaciones', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Tipos de Publicaciones', // The name if the item
        'href'     => admin_url('pi/TipoPublicacionesController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    $CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'configuracion-signos', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Tipos de Signos', // The name if the item
        'href'     => admin_url('pi/TiposSignosController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    // Publicaciones de Marcas
    /*$CI->app_menu->add_sidebar_children_item('52', [
        'slug'     => 'publicaciones-marcas', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Publicaciones de Marcas', // The name if the item
        'href'     => admin_url('pi/PublicacionesMarcasController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-passport', // Font awesome icon
    ]);*/

    
    


    /**
     * Marcas Menú
     */
     $CI->app_menu->add_sidebar_menu_item('53', [
        'name'     => 'Marcas', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 11, // The menu position
        'icon'     => 'fa-solid fa-passport', // Font awesome icon
    ]);
    $CI->app_menu->add_sidebar_children_item('53', [
        'slug'     => 'marcas-busquedas', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Busquedas', // The name if the item
        'href'     => admin_url('pi/BusquedasController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    
    
    //Acciones contra terceros
    $CI->app_menu->add_sidebar_children_item('53', [
        'slug'     => 'cambios-terceros', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Acciones a Terceros', // The name if the item
        'href'     => admin_url('pi/AccionesTerceroController/'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    // Solicitudes de Marcas
    $CI->app_menu->add_sidebar_children_item('53', [
        'slug'     => 'solicitudes-marcas', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Solicitudes de Marcas', // The name if the item
        'href'     => admin_url('pi/MarcasSolicitudesController'), // URL of the item
        'position' => 11, // The menu position
        //'icon'     => 'fa fa-passport', // Font awesome icon
    ]);

    /**
     * Patentes
     */
    $CI->app_menu->add_sidebar_menu_item('54', [
        'name'     => 'Patentes', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 12, // The menu position
        'icon'     => 'fa-solid fa-microscope', // Font awesome icon
    ]);
    //Solicitudes
    $CI->app_menu->add_sidebar_children_item('54', [
        'slug'     => 'solicitudes-patentes', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Solicitudes de patentes', // The name if the item
        'href'     => admin_url('pi/patentes/SolicitudesController'), // URL of the item
        'position' => 12, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);
    //Inventores
    $CI->app_menu->add_sidebar_children_item('54', [
        'slug'     => 'inventores-patentes', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Inventores', // The name if the item
        'href'     => admin_url('pi/patentes/InventoresController'), // URL of the item
        'position' => 12, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    /*$CI->app_menu->add_sidebar_children_item('54', [
        'slug'     => 'tipospatentes', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Administrador de Tipos de Patentes', // The name if the item
        'href'     => admin_url('pi/TiposPatentesController'), // URL of the item
        'position' => 12, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);*/

    /**
     * Derecho de Autor
     */
    $CI->app_menu->add_sidebar_menu_item('56', [
        'slug'     => 'copyright', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Derecho de Autor', // The name if the item
        'position' => 11, // The menu position
        'icon'     => 'fa-sharp fa-solid fa-copyright', // Font awesome icon
    ]);

    $CI->app_menu->add_sidebar_children_item('56', [
        'slug'     => 'copyright-solicitudes', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Solicitudes', // The name if the item
        'href'     => admin_url('pi/AutoresSolicitudController'), // URL of the item
        'position' => 12, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    $CI->app_menu->add_sidebar_children_item('56', [
        'slug'     => 'copyright-autores', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Autores', // The name if the item
        'href'     => admin_url('pi/AutoresController'), // URL of the item
        'position' => 12, // The menu position
        //'icon'     => 'fa fa-plus', // Font awesome icon
    ]);

    /**
     * 
     */
    /*$CI->app_menu->add_sidebar_menu_item('57', [
        'slug'     => 'registro-sanitario', // Required ID/slug UNIQUE for the child menu
        'name'     => 'Registro Sanitario', // The name if the item
        'position' => 11, // The menu position
        'icon'     => 'fa-sharp fa-solid fa-copyright', // Font awesome icon
    ]);
    */
    if(!$CI->db->table_exists("{$dbPrefix}_paises"))
    {
        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'pi_setup', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Instalacion', // The name if the item
            'href'     => admin_url('pi/Install'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-hand-holding-magic', // Font awesome icon
        ]);
    }
    

}


