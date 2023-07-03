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


    $CI->app_menu->add_sidebar_menu_item('51', [
        'name'     => 'SPI', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 11, // The menu position
        'icon'     => 'fa-solid fa-feather', // Font awesome icon
    ]);  

    if(!$CI->db->table_exists("{$dbPrefix}_paises"))
    {
        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'pi_setup', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Instalacion', // The name if the item
            'href'     => site_url('pi/install'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-hand-holding-magic', // Font awesome icon
        ]);
    }
    else
    {
        $CI->app_menu->add_sidebar_menu_item('52', [
            'name'     => 'Marcas', // The name if the item
            'collapse' => true, // Indicates that this item will have submitems
            'position' => 11, // The menu position
            'icon'     => 'fa-solid fa-feather', // Font awesome icon
        ]); 

        // The first paremeter is the parent menu ID/Slug
        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'marcas', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Marcas', // The name if the item
            'href'     => site_url('pi/marca'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-passport', // Font awesome icon
        ]);

        // The first paremeter is the parent menu ID/Slug
        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'publicaciones-marcas', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Publicaciones de Marcas', // The name if the item
            'href'     => site_url('pi/publicacionesmarcascontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-passport', // Font awesome icon
        ]);

        // The first paremeter is the parent menu ID/Slug
        /*$CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'marcas', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Marcas', // The name if the item
            'href'     => site_url('pi/marca'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-passport', // Font awesome icon
        ]);*/

        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'patentes', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Patentes', // The name if the item
            'href'     => site_url('pi/patente'), // URL of the item
            'position' => 12, // The menu position
            'icon'     => 'fa-solid fa-microscope', // Font awesome icon
        ]);

        $CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'copyright', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Derecho de Autor', // The name if the item
            'href'     => site_url('pi/copyright'), // URL of the item
            'position' => 12, // The menu position
            'icon'     => 'fa-solid fa-copyright', // Font awesome icon
        ]);

        /*$CI->app_menu->add_sidebar_children_item('51', [
            'slug'     => 'registro-sanitario', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Registros Sanitarios', // The name if the item
            'href'     => site_url('pi/sanitarios'), // URL of the item
            'position' => 13, // The menu position
            'icon'     => 'fa-sharp fa-solid fa-passport', // Font awesome icon
        ]);*/

        //Menu de configuracion
        $CI->app_menu->add_sidebar_menu_item('52', [
            'slug'     => 'config', // Required ID/slug UNIQUE for the child menu
            'name'     => 'SPI Configuracion', // The name if the item
            'position' => 13, // The menu position
            'icon'     => 'fa-sharp fa-solid fa-gear', // Font awesome icon
        ]);
        
        //Anexos
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'anexos', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Cambios Anteriores al registro', // The name if the item
            'href'     => site_url('pi/anexoscontroller'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //Clases
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'clases', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de clases', // The name if the item
            'href'     => site_url('pi/clasescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //Eventos
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'tipos-eventos', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Tipos de Eventos', // The name if the item
            'href'     => site_url('pi/tiposeventoscontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //Inventores
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'inventores', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Inventores', // The name if the item
            'href'     => site_url('pi/inventorescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //Prioridades
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'patentes-prioridad', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Prioridades de patentes', // The name if the item
            'href'     => site_url('pi/patenteprioridadcontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //Publicaciones
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'publicaciones', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Publicaciones', // The name if the item
            'href'     => site_url('pi/publicacionescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
         //Responsables
         $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'responsables', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Responsables', // The name if the item
            'href'     => site_url('pi/responsablescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
         //Solicitantes
         $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'solicitantes', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Solicitantes', // The name if the item
            'href'     => site_url('pi/solicitantescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        //materias
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'materias', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de materias', // The name if the item
            'href'     => site_url('pi/materiascontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'estados', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Estados', // The name if the item
            'href'     => site_url('pi/estadoscontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'boletines', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Boletines', // The name if the item
            'href'     => site_url('pi/Boletinescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'tipos-patentes', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Tipos de Patentes', // The name if the item
            'href'     => site_url('pi/tipospatentescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
        $CI->app_menu->add_sidebar_children_item('52', [
            'slug'     => 'tipos-publicaciones', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Administrador de Tipos de Publicaciones', // The name if the item
            'href'     => site_url('pi/tipopublicacionescontroller'), // URL of the item
            'position' => 11, // The menu position
            //'icon'     => 'fa fa-plus', // Font awesome icon
        ]);
    }

}


