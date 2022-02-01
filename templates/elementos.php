<?php if( have_rows('contenido') ): ?>
    <?php while( have_rows('contenido') ): the_row(); ?>

    <?php if (get_row_layout() == 'elementos_galeria') : ?>

        <section class="irf-section-galeria">
            <div class="irf-galeria-container">
                <?php if (get_sub_field('galeria')): ?>
                    <?php $imagenes = get_sub_field('galeria'); foreach($imagenes as $imagen) : ?>
                        <img src="<?php echo $imagen; ?>" alt="">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

    <?php elseif (get_row_layout() == 'elementos_titulo_texto') : ?>

        <section class="irf-section-12 irf-section-2-sides">
            <h2 class="irf-section-title"><?php the_sub_field('titulo'); ?></h2>
            <p class="irf-description"><?php the_sub_field('texto'); ?></p>
        </section>

    <?php elseif (get_row_layout() == 'elementos_texto_texto') : ?>

        <section class="irf-section-12 irf-section-2-sides">
            <p class="irf-description"><?php the_sub_field('texto_1'); ?></p>
            <p class="irf-description"><?php the_sub_field('texto_2'); ?></p>
        </section>

    <?php endif; ?>
    

    <?php endwhile; ?>
<?php endif; ?>