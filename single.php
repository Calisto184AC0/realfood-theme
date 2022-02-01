<?php get_header(); ?>

<main class="irf-container irf-blog">

    <section class="irf-section-3 irf-section-titulo">
        <h1 class="irf-section-subtitle"><?php the_title(); ?></h1>
    </section>

    <?php if( have_rows('contenido') ): ?>
        <?php while( have_rows('contenido') ): the_row(); ?>

            <?php if (get_row_layout() == 'blog_subtitulos') : ?>
                <section class="irf-section-3 irf-section-titulo">
                    <?php if (get_sub_field('nivel') == 'h2') : ?>
                        <h2 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h2>
                    <?php elseif (get_sub_field('nivel') == 'h3') : ?>
                        <h3 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h3>
                    <?php elseif (get_sub_field('nivel') == 'h4') : ?>
                        <h4 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h4>
                    <?php elseif (get_sub_field('nivel') == 'h5') : ?>
                        <h5 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h5>
                    <?php elseif (get_sub_field('nivel') == 'h6') : ?>
                        <h6 class="irf-section-subtitle"><?php the_sub_field('titulo'); ?></h6>
                    <?php endif; ?>
                    
                </section>
            <?php elseif (get_row_layout() == 'blog_texto_y_texto') : ?>
                <section class="irf-section-12 irf-section-2-sides">
                    <p class="irf-description"><?php the_sub_field('texto_1'); ?></p>
                    <p class="irf-description"><?php the_sub_field('texto_2'); ?></p>
                </section>
            <?php elseif (get_row_layout() == 'blog_imagen') : $imagen = get_sub_field('imagen'); ?>
                <section class="irf-section-10 irf-section-img-blog">
                    <img src="<?php echo esc_url($imagen['url']) ?>" alt="<?php echo $imagen['alt'] ?>">
                    <p><?php echo $imagen['caption'] ?></p>
                </section>
            <?php elseif (get_row_layout() == 'blog_galeria') : ?>
                <section class="irf-section-galeria">
                    <div class="irf-galeria-container">
                        <?php if (get_sub_field('galeria')): ?>
                            <?php $imagenes = get_sub_field('galeria'); foreach($imagenes as $imagen) : ?>
                                <img src="<?php echo $imagen; ?>" alt="">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'blog_video') : ?>
                <div class="embed-container">
                        <?php
                            $embed = get_sub_field('video');
                            echo $embed;
                        ?>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>