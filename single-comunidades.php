<?php
    get_header();

    global $wpdb;

    $relacion_row = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "relations WHERE idComunidad=" . get_the_ID());

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
                    <div class="irf-info-producto">
                        <a class="irf-escudo" href="<?php echo esc_url(get_permalink($idTerritorio)); ?>">
                            <img src="<?php the_field('icono', $idTerritorio); ?>" alt="">
                        </a>
                        <div class="irf-escudo-com"">
                            <img src="<?php the_field('icono'); ?>" alt="">
                        </div>
                        <div class="irf-rrss" >
                            <?php if ( have_rows('rrss') ) : while ( have_rows('rrss') ) : the_row(); ?>
                                <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('red_social'); ?></a>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="irf-wrap-right">
                    <img id="irf_img" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                </div>
            </section>
        
        <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
    
    <?php require_once( __DIR__ . '/templates/elementos.php'); ?>

</main>

<?php get_footer(); ?>