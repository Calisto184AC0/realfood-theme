<?php get_header(); ?>

<?php

$category = get_the_category();

if (!empty($category)) :
if (get_the_category()[0]->slug == 'pilar') : 
    
?>

<main class="irf-container">
    <?php if( have_rows('contenido') ): ?>
        <?php while( have_rows('contenido') ): the_row(); ?>



        <?php if (get_row_layout() == 'pilar_init') : ?>

            <section class="irf-section-12 irf-section-init irf-section-territorios-init">
                <div class="irf-wrap-left">
                    <h1 class="irf-section-title"><?php the_title(); ?></h1>
                    <p class="irf-description"><?php the_sub_field('descripcion'); ?></p>
                </div>
                <script>
                    let carouselElements = new Array();
                    let carouselIndex = 0;

                    <?php
                    
                        $query_pilar = new WP_Query(array(
                            'post_type' => get_sub_field('elementos'),
                            'post_status' => 'publish',
                            'posts_per_page'    => -1
                        ));

                        while ($query_pilar->have_posts()) : $query_pilar->the_post();
                    ?>
                    carouselElements.push(new CarouselElement("<?php the_post_thumbnail_url('large'); ?>", "<?php the_title(); ?>", "<?php the_permalink(); ?>"))
                    <?php endwhile; wp_reset_postdata(); ?>
                </script>
                
                <div class="irf-wrap-right" id="irf_carousel">
                    <a href=""><img id="irf_img" src="#" alt=""></a>
                    <div class="irf-carousel-controller-container">
                        <p id="irf_text"></p>
                        <div class="irf-carousel-controller">
                            <svg id="irf_left" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewbox="0 0 48 48">
                                <g transform="translate(48) rotate(90)">
                                    <path class="orange" data-name="Trazado 196" d="M48,24A24,24,0,1,1,24,0,24,24,0,0,1,48,24ZM25.5,15a1.5,1.5,0,0,0-3,0V29.379l-6.439-6.441a1.5,1.5,0,0,0-2.124,2.124l9,9a1.5,1.5,0,0,0,2.124,0l9-9a1.5,1.5,0,1,0-2.124-2.124L25.5,29.379Z" fill="" fill-rule="evenodd"/>
                                </g>
                            </svg>
                            <svg id="irf_right" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewbox="0 0 48 48">
                                <g transform="translate(0 48) rotate(-90)">
                                    <path class="orange" data-name="Trazado 196" d="M48,24A24,24,0,1,1,24,0,24,24,0,0,1,48,24ZM25.5,15a1.5,1.5,0,0,0-3,0V29.379l-6.439-6.441a1.5,1.5,0,0,0-2.124,2.124l9,9a1.5,1.5,0,0,0,2.124,0l9-9a1.5,1.5,0,1,0-2.124-2.124L25.5,29.379Z" fill="" fill-rule="evenodd"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'pilar_elementos') : ?>
        
            <section class="irf-section-3 irf-section-titulo">
                <h2 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h2>
            </section>

            <?php

                $array_tax = '';

                if (get_sub_field('elementos') == 'comunidades') { $array_tax = array('taxonomy' => 'tipo_comunidad', 'field' => 'slug', 'terms' => get_sub_field('tipo_comunidad')); }

                $query_pilar = new WP_Query(array(
                    'post_type' => get_sub_field('elementos'),
                    'tax_query' => array($array_tax),
                    'post_status' => 'publish',
                    'posts_per_page'    => -1
                ));
                $pilar_posts = $query_pilar->get_posts();
                for ($i = 0, $row = 0; $i < count($pilar_posts); $row++) :
            ?>  
            <section class="irf-section-5 irf-section-cuadrados">
                <?php if (count($pilar_posts) == 2 || $row % 2 == 1) : ?>
                    <div></div>
                    <div>
                        <a href="<?php echo get_permalink($pilar_posts[$i]); ?>">
                            <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->ID); ?>" alt="">
                            <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i], 'large'); $i++; ?>" alt="">
                        </a>
                    </div>
                    <div></div>
                    <div>
                        <?php if ($i < count($pilar_posts)) : ?>
                        <a href="<?php echo get_permalink($pilar_posts[$i]); ?>">
                            <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->ID); ?>" alt="">
                            <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i], 'large'); $i++; ?>" alt="">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div></div>
                <?php else : ?>
                    <div>
                        <a href="<?php echo get_permalink($pilar_posts[$i]); ?>">
                            <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->ID); ?>" alt="">
                            <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i], 'large'); $i++; ?>" alt="">
                        </a>
                    </div>
                    <div></div>
                    <div>
                        <?php if ($i < count($pilar_posts)) : ?>
                        <a href="<?php echo get_permalink($pilar_posts[$i]); ?>">
                            <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->ID); ?>" alt="">
                            <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i], 'large'); $i++; ?>" alt="">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div></div>
                    <div>
                        <?php if ($i < count($pilar_posts)) : ?>
                        <a href="<?php echo get_permalink($pilar_posts[$i]); ?>">
                            <img class="irf-bottom-img" src="<?php the_field('icono', $pilar_posts[$i]->ID); ?>" alt="">
                            <img class="irf-top-img" src="<?php echo get_the_post_thumbnail_url($pilar_posts[$i], 'large'); $i++; ?>" alt="">
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </section>
            <?php endfor; wp_reset_postdata(); ?>
        
        <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php endif;endif; ?>

<?php get_footer(); ?>