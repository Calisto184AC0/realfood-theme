<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <header class="irf-header">
        <a href="<?php echo home_url(); ?>" class="irf-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon/logo.svg" alt=""></a>
        <div class="irf-header-wrap">
            <a href="" class="irf-logo-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon/logo-2.svg" alt=""></a>
            <img id="irf-open-menu" src="<?php echo get_template_directory_uri(); ?>/assets/icon/hamburguesa.svg" alt="">
        </div>
        <nav class="irf-nav">
            <div class="irf-nav-close-menu-container">
                <img id="irf-close-menu" src="<?php echo get_template_directory_uri(); ?>/assets/icon/close.svg" alt="">
            </div>
            <ul class="irf-nav-menu">
                <?php
                    $args_menu_header = array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'echo' => false,
                        'items_wrap' => '%3$s',
                        'depth' => 0
                    );

                    echo strip_tags(wp_nav_menu( $args_menu_header ), '<a>' );
                ?>
            </ul>
            <ul class="irf-nav-rrss">
                <?php
                    $args_menu_header_rrss = array(
                        'theme_location' => 'header-menu-rrss',
                        'container' => false,
                        'echo' => false,
                        'items_wrap' => '%3$s',
                        'depth' => 0
                    );

                    echo strip_tags(wp_nav_menu( $args_menu_header_rrss ), '<a><img>' );
                ?>
            </ul>
        </nav>
    </header>