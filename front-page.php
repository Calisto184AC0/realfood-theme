<?php get_header(); ?>

<main class="irf-container">
    <?php if( have_rows('contenido') ): ?>
        <?php while( have_rows('contenido') ): the_row(); ?>

            <?php if (get_row_layout() == 'inicio_init') : ?>
                <section class="irf-section-3 irf-section-home-init">
                <?php while( have_rows('pilares') ): the_row(); $id_post = get_sub_field('pilar'); ?>
                    <a href="<?php echo get_permalink($id_post); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($id_post); ?>)" class="irf-pilar"><h2><?php echo get_the_title($id_post); ?></h2></a>
                <?php endwhile; ?>
                </section>

            <?php elseif (get_row_layout() == 'inicio_articulos') : ?>
                <section class="irf-section-3 irf-section-titulo">
                    <h1 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h1>
                </section>

                <?php
                    $query = new WP_Query(array(
                        'category_name'     => 'blog',
                        'post_status' => 'publish',
                        'posts_per_page'    => 6        // Se puede seleccionar el número de páginas desde el ACF
                    ));

                    $query_posts = $query->get_posts();

                    for ($i = 0; $i < count($query_posts); $i += 3):
                ?>
                <section class="irf-section-3 irf-section-home-articulos-img">
                    <a href="<?php echo get_permalink($query_posts[$i]); ?>"><?php echo get_the_post_thumbnail($query_posts[$i], 'large'); ?></a>
                    <?php if (empty($query_posts[$i + 1])): ?>
                    <div></div>
                    <div></div>
                    <?php elseif (empty($query_posts[$i + 2])): ?>
                    <a href="<?php echo get_permalink($query_posts[$i + 1]); ?>"><?php echo get_the_post_thumbnail($query_posts[$i + 1], 'large'); ?></a>
                    <div></div>
                    <?php else: ?>
                    <a href="<?php echo get_permalink($query_posts[$i + 1]); ?>"><?php echo get_the_post_thumbnail($query_posts[$i + 1], 'large'); ?></a>
                    <a href="<?php echo get_permalink($query_posts[$i + 2]); ?>"><?php echo get_the_post_thumbnail($query_posts[$i + 2], 'large'); ?></a>  
                    <?php endif; ?>
                </section>
                <section class="irf-section-3 irf-section-home-articulos-text">
                    <div class="irf-articulo-text-container">
                        <h2 class="irf-articulo-title"><a href="<?php echo get_permalink($query_posts[$i]); ?>"><?php echo get_the_title($query_posts[$i]) ?></a></h2>
                        <p class="irf-description"><?php echo get_the_excerpt($query_posts[$i]) ?></p>
                    </div>
                    <div class="irf-articulo-text-container">
                        <?php if(!empty($query_posts[$i + 1])): ?>
                        <h2 class="irf-articulo-title"><a href="<?php echo get_permalink($query_posts[$i + 1]); ?>"><?php echo get_the_title($query_posts[$i + 1]) ?></a></h2>
                        <p class="irf-description"><?php echo get_the_excerpt($query_posts[$i + 1]) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="irf-articulo-text-container">
                        <?php if(!empty($query_posts[$i + 2])): ?>
                        <h2 class="irf-articulo-title"><a href="<?php echo get_permalink($query_posts[$i + 2]); ?>"><?php echo get_the_title($query_posts[$i + 2]) ?></a></h2>
                        <p class="irf-description"><?php echo get_the_excerpt($query_posts[$i + 2]) ?></p>
                        <?php endif; ?>
                    </div>
                </section>
                <?php endfor; wp_reset_postdata(); ?>
                
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>