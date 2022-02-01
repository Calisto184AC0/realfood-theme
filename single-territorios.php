<?php get_header(); ?>

<main class="irf-container">
    <?php if( have_rows('contenido') ): ?>
        <?php while( have_rows('contenido') ): the_row(); ?>

        <?php if (get_row_layout() == 'elementos_init') : ?>

            <section class="irf-section-12 irf-section-init irf-section-territorios-init">
                <div class="irf-wrap-left">
                    <h1 class="irf-section-title"><?php the_title(); ?></h1>
                    <p class="irf-description"><?php the_sub_field('descripcion'); ?></p>
                    <div class="irf-info">
                        <div class="irf-escudo">
                            <img src="<?php the_field('icono'); ?>" alt="">
                        </div>
                        <div class="irf-rrss">
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

    <?php if( have_rows('contenido_territorio') ): ?>
        <?php while( have_rows('contenido_territorio') ): the_row(); ?>

            <?php if (get_row_layout() == 'producciones') : ?>
            
                <section class="irf-section-3 irf-section-titulo">
                    <h2 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h2>
                </section>

                <?php

                    global $wpdb;

                    $type = "id" . get_sub_field('elementos');

                    $pilar_posts = $wpdb->get_results(
                        "SELECT " . $type . " FROM " . $wpdb->prefix . "relations
                            WHERE idTerritorio=" . get_the_ID()
                    );

                    if ($type == "idProducto") {
                        for ($i = 0; $i < count($pilar_posts); $i++) {
                            for ($j = $i + 1; $j < count($pilar_posts); $j++) {
                                if ($pilar_posts[$i] == $pilar_posts[$j]) {
                                    array_splice($pilar_posts, $j, 1);
                                }
                            }
                        }
                    }

                    if ($type == "idComunidad") {
                        if (get_sub_field('comunidad') == 'empresa-productora') {
                            for ($i = 0; $i < count($pilar_posts); $i++) {
                                if (!has_term('empresa-productora', 'tipo_comunidad', $pilar_posts[$i]->idComunidad)) {
                                    array_splice($pilar_posts, $i, 1);
                                }
                            }
                        } elseif (get_sub_field('comunidad') == 'restaurante') {
                            for ($i = 0; $i < count($pilar_posts); $i++) {
                                if (!has_term('restaurante', 'tipo_comunidad', $pilar_posts[$i]->idComunidad)) {
                                    array_splice($pilar_posts, $i, 1);
                                }
                            }
                        }
                        
                    }

                    for ($i = 0, $row = 0; $i < count($pilar_posts); $row++) :
                ?>  
                <section class="irf-section-5 irf-section-cuadrados">
                    <?php if (count($pilar_posts) == 2 || $row % 2 == 1) : ?>
                        <div></div>
                        <div>
                            <a href="<?php echo get_permalink($pilar_posts[$i]->$type); ?>">
                                <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->$type); ?>" alt="<?php echo get_the_title($pilar_posts[$i]->idComunidad); ?>">
                                <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i]->$type, 'large'); $i++; ?>" alt="">
                            </a>
                        </div>
                        <div></div>
                        <div>
                            <?php if ($i < count($pilar_posts)) : ?>
                            <a href="<?php echo get_permalink($pilar_posts[$i]->$type); ?>">
                                <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->$type); ?>" alt="<?php echo get_the_title($pilar_posts[$i]->$type); ?>">
                                <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i]->$type, 'large'); $i++; ?>" alt="">
                            </a>
                            <?php endif; ?>
                        </div>
                        <div></div>
                    <?php else : ?>
                        <div>
                            <a href="<?php echo get_permalink($pilar_posts[$i]->$type); ?>">
                                <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->$type); ?>" alt="<?php echo get_the_title($pilar_posts[$i]->$type); ?>">
                                <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i]->$type, 'large'); $i++; ?>" alt="">
                            </a>
                        </div>
                        <div></div>
                        <div>
                            <?php if ($i < count($pilar_posts)) : ?>
                            <a href="<?php echo get_permalink($pilar_posts[$i]->$type); ?>">
                                <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->$type); ?>" alt="<?php echo get_the_title($pilar_posts[$i]->$type); ?>">
                                <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i]->$type, 'large'); $i++; ?>" alt="">
                            </a>
                            <?php endif; ?>
                        </div>
                        <div></div>
                        <div>
                            <?php if ($i < count($pilar_posts)) : ?>
                            <a href="<?php echo get_permalink($pilar_posts[$i]->$type); ?>">
                                <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->$type); ?>" alt="<?php echo get_the_title($pilar_posts[$i]->$type); ?>">
                                <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i]->$type, 'large'); $i++; ?>" alt="">
                            </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </section>
                <?php endfor; wp_reset_postdata(); ?>

            <?php elseif (get_row_layout() == 'rutas') : ?>

                <section class="irf-section-3 irf-section-titulo">
                    <h2 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h2>
                </section>

                <section class="irf-section-ruta">

                <?php if( have_rows('dias') ): ?>
                    <?php while ( have_rows('dias') ): the_row(); ?>

                    <div class="irf-ruta-dia">
                        <h3 class="irf-section-subtitle">DÍA <?php echo get_row_index(); ?></h3>

                        <?php if( have_rows('dia') ): ?>
                            <?php while ( have_rows('dia') ): the_row(); ?>
                        
                            <div class="irf-ruta-section">
                                <?php if (get_sub_field('imagen')) : ?>
                                    <img src="<?php the_sub_field('imagen'); ?>" alt="">
                                <?php endif; ?>
                                
                                <h4 class="irf-ruta-section-title"><?php the_sub_field('titulo'); ?></h4>
                                <p class="irf-description"><?php the_sub_field('descripcion'); ?></p>
                            </div>

                        <?php endwhile; endif; ?>
                    </div>

                <?php endwhile; endif; ?>

                </section>
            
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>     

</main>

<?php get_footer(); ?>