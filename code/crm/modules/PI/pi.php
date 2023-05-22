<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Propiedad Intelectual
Description: Modulo de gestion de propiedad intelectual.
Version: 2.3.0
Requires at least: 2.3.*
*/

hooks()->add_action('admin_init', 'pi_menu_item_collapsible');

function pi_menu_item_collapsible()
{
    $CI = &get_instance();

    $CI->app_menu->add_sidebar_menu_item('56', [
        'name'     => 'Propiedad Intelectual', // The name if the item
        'collapse' => true, // Indicates that this item will have submitems
        'position' => 11, // The menu position
        'icon'     => 'fa-solid fa-briefcase', // Font awesome icon
    ]);

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

}


hooks()->add_action('clients_init', "pi_clients_area_menu_items");

function pi_clients_area_menu_items()
{
    add_theme_menu_item('56', [
        'Name' => 'Propiedad Intelectual',
        'href' => site_url('pi'),
        'position' => 11
    ]);
}
