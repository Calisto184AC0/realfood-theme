<?php

require_once( __DIR__ . '/functions/post-types.php');
require_once( __DIR__ . '/functions/relations.php');

// Agregar javascripts y css
function irf_scripts_styles() {
    // Estilos
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0>');
    wp_enqueue_script('script', get_template_directory_uri() .'/assets/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('classes', get_template_directory_uri() .'/assets/js/classes.js', array(), '1.0.1');
}

add_action( 'wp_enqueue_scripts', 'irf_scripts_styles' );

// Agregar menús de navegación
function irf_menus() {
    $locations = array(
        'header-menu' => __('Menú Header', 'realfood'),
        'footer-menu' => __('Menú Footer', 'realfood'),
        'header-menu-rrss' => __('Menú Header RRSS', 'realfood'),
        'footer-menu-rrss' => __('Menú Footer RRSS', 'realfood'),
        'footer-menu-legal' => __('Menú Footer Legal', 'realfood')
    );

    register_nav_menus($locations);
}

add_action('init', 'irf_menus');

function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );