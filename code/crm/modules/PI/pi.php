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


    $CI->app_menu->add_sidebar_menu_item('56', [
        'name'     => 'Propiedad Intelectual', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 11, // The menu position
        'icon'     => 'fa-solid fa-feather', // Font awesome icon
    ]);

    if(!$CI->db->table_exists("{$dbPrefix}_paises"))
    {
        $CI->app_menu->add_sidebar_children_item('56', [
            'slug'     => 'pi_setup', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Instalacion', // The name if the item
            'href'     => site_url('pi/install'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-hand-holding-magic', // Font awesome icon
        ]);
    }
    else
    {

        // The first paremeter is the parent menu ID/Slug
        $CI->app_menu->add_sidebar_children_item('56', [
            'slug'     => 'marcas', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Marcas', // The name if the item
            'href'     => site_url('pi/marca'), // URL of the item
            'position' => 11, // The menu position
            'icon'     => 'fa fa-passport', // Font awesome icon
        ]);

        $CI->app_menu->add_sidebar_children_item('56', [
            'slug'     => 'patentes', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Patentes', // The name if the item
            'href'     => site_url('pi/patente'), // URL of the item
            'position' => 12, // The menu position
            'icon'     => 'fa-solid fa-microscope', // Font awesome icon
        ]);

        $CI->app_menu->add_sidebar_children_item('56', [
            'slug'     => 'dnda', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Derecho de Autor', // The name if the item
            'href'     => site_url('pi/dnda'), // URL of the item
            'position' => 13, // The menu position
            'icon'     => 'fa-sharp fa-solid fa-copyright', // Font awesome icon
        ]);

        $CI->app_menu->add_sidebar_children_item('56', [
            'slug'     => 'config', // Required ID/slug UNIQUE for the child menu
            'name'     => 'Configuracion', // The name if the item
            'href'     => site_url('pi/configuration'), // URL of the item
            'position' => 13, // The menu position
            'icon'     => 'fa-sharp fa-solid fa-gear', // Font awesome icon
        ]);
    }

}


