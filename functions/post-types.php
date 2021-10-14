<?php

function irf_create_territorios_post_type() {
    $labels = array(
        'name'                  => 'Territorios',
        'singular_name'         => 'Territorio',
        'menu_name'             => 'Territorios',
        'all_items'             => 'Todos los territorios',
        'view_item'             => 'Ver territorio',
        'add_new_item'          => 'Añadir nuevo territorio',
        'add_new'               => 'Añadir nuevo territorio',
        'edit_item'             => 'Editar territorio',
        'update_item'           => 'Actualizar territorio',
        'search_item'           => 'Buscar territorio',
        'not_found'             => 'No encontrado',
        'not_found_in_trash'    => 'No encontrado en la papelera'
    );

    $args = array(
        'label'                 => 'territorios',
        'description'           => 'Territorios',
        'labels'                => $labels,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-location-alt',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'show_in_rest'          => true,
        'capibility_type'       => 'page'
    );

    register_post_type( 'territorios', $args );
}

function irf_create_comunidad_post_type() {
    $labels = array(
        'name'                  => 'Comunidades',
        'singular_name'         => 'Comunidad',
        'menu_name'             => 'Comunidades',
        'all_items'             => 'Todas las comunidades',
        'view_item'             => 'Ver comunidad',
        'add_new_item'          => 'Añadir nueva comunidad',
        'add_new'               => 'Añadir nueva comunidad',
        'edit_item'             => 'Editar comunidad',
        'update_item'           => 'Actualizar comunidad',
        'search_item'           => 'Buscar comunidad',
        'not_found'             => 'No encontrado',
        'not_found_in_trash'    => 'No encontrado en la papelera'
    );

    $args = array(
        'label'                 => 'comunidades',
        'description'           => 'Comunidades',
        'labels'                => $labels,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-building',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'show_in_rest'          => true,
        'capibility_type'       => 'page'
    );

    register_post_type( 'comunidades', $args );

    $labels = array(
        'name'                  => 'Tipo de comunidad',
        'singular_name'         => 'Tipo de comunidad',
        'search_items'          => 'Buscar tipo de comunidad',
        'all_items'             => 'Todos los tipo de comunidad',
        'edit_item'             => 'Editar tipo de comunidad',
        'update_item'           => 'Actualizar tipo de comunidad',
        'add_new_item'          => 'Añadir nuevo tipo de comunidad',
        'new_item_name'         => 'Nuevo tipo de comunidad',
        'menu_name'             => 'Tipo de comunidad'
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'show_in_rest'          => true
    );

    register_taxonomy( 'tipo_comunidad', array('comunidades'), $args );
}

function irf_create_productos_post_type() {
    $labels = array(
        'name'                  => 'Productos',
        'singular_name'         => 'Producto',
        'menu_name'             => 'Productos',
        'all_items'             => 'Todos los productos',
        'view_item'             => 'Ver producto',
        'add_new_item'          => 'Añadir nuevo producto',
        'add_new'               => 'Añadir nuevo producto',
        'edit_item'             => 'Editar producto',
        'update_item'           => 'Actualizar producto',
        'search_item'           => 'Buscar producto',
        'not_found'             => 'No encontrado',
        'not_found_in_trash'    => 'No encontrado en la papelera'
    );

    $args = array(
        'label'                 => 'productos',
        'description'           => 'Productos',
        'labels'                => $labels,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-food',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'show_in_rest'          => true,
        'capibility_type'       => 'page'
    );

    register_post_type( 'productos', $args );
}

add_action( 'init', 'irf_create_territorios_post_type', 0 );
add_action( 'init', 'irf_create_comunidad_post_type', 0 );
add_action( 'init', 'irf_create_productos_post_type', 0 );
add_theme_support( 'post-thumbnails' );