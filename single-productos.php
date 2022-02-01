<?php
    get_header();

    global $wpdb;

    $relacion_row = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "relations WHERE idProducto=" . get_the_ID());

    $idTerritorio = intval($relacion_row->idTerritorio);
?>

<main class="irf-container">
    <?php if( have_rows('contenido') ): ?>
        <?php while( have_rows('contenido') ): the_row(); ?>

        <?php if (get_row_layout() == 'elementos_init') : ?>

            <section class="irf-section-12 irf-section-init irf-section-territorios-init">
                <div class="irf-wrap-left">
                    <h1 class="irf-section-title"><?php the_title(); ?></h1>
                    <p class="irf-description"><?php the_sub_field('descripcion'); ?></p>
                    <div class="irf-info">
                        <a class="irf-escudo" href="<?php echo esc_url(get_permalink($idTerritorio)); ?>">
                            <img src="<?php the_field('icono', $idTerritorio); ?>" alt="">
                        </a>
                        <div class="irf-rrss" >
                            <?php if ( have_rows('rrss') ) : while ( have_rows('rrss') ) : the_row(); ?>
                                <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('red_social'); ?></a>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="irf-wrap-right">
                    <?php if(get_sub_field('video')): ?>
                        <?php echo wp_video_shortcode( array('mp4' => get_sub_field('video')) ); ?>
                    <?php else: ?>
                        <img id="irf_img" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                    <?php endif; ?>
                    
                </div>
            </section>
        
        <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php require_once( __DIR__ . '/templates/elementos.php'); ?>

    <?php if(get_field('descripcion_producto')): ?>

        <section class="irf-section-12 irf-section-2-sides">
            <p class="irf-description"><?php the_field('descripcion_producto'); ?></p>
            <div class="irf-description irf-nutricion">
                <p class="irf-receta-ingredientes-title irf-description">Ingredientes</p>
                <ul class="irf-receta-ingredientes-lista">

                    <?php if (have_rows('ingredientes')) : ?>
                        <?php while(have_rows('ingredientes')): the_row(); ?>

                            <li><?php the_sub_field('ingrediente') ?></li>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </ul>
                <p class="irf-receta-ingredientes-title irf-description">Valor nutricional</p>
                <ul class="irf-receta-ingredientes-lista irf-tabla-nutricional">
                    
                    <?php if (have_rows('valor_nutricional_producto')) : ?>
                        <?php while(have_rows('valor_nutricional_producto')): the_row(); ?>

                            <li>
                                <span><?php the_sub_field('etiqueta'); ?></span>
                                <span><?php the_sub_field('valor'); ?></span>
                            </li>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </ul>
            </div>
        </section>

    <?php endif; ?>

    <?php if(have_rows('recetas')): ?>
        <?php while(have_rows('recetas')): the_row(); ?>
        
        <section class="irf-section-12 irf-section-2-sides irf-section-receta">
            <img src="<?php the_sub_field('imagen'); ?>" alt="">
            <div class="irf-receta-pasos">
                <h3 class="irf-receta-title"><?php the_sub_field('titulo_receta'); ?></h3>
                <p class="irf-receta-subtitle irf-description"><?php the_sub_field('subtitulo'); ?></p>

                <p class="irf-receta-ingredientes-title irf-description">Ingredientes</p>
                <ul class="irf-receta-ingredientes-lista">
                    <?php if (have_rows('ingredientes')) : ?>
                        <?php while(have_rows('ingredientes')): the_row(); ?>

                            <li><?php the_sub_field('ingrediente') ?></li>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>

                <p class="irf-description"><?php the_sub_field('instrucciones'); ?></p>
            </div>
        </section>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>