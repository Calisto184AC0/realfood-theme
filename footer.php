<footer class="irf-container irf-footer">
        <section class="irf-section-12 irf-footer-links">
            <?php
                $args_menu_footer = array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'irf-footer-menu',
                );

                wp_nav_menu($args_menu_footer);
            ?>
            <div class="irf-footer-newsletter">
                <input type="email" name="" id="" placeholder="Suscríbete a nuestra newsletter">
                <p>Nullam vel lacinia quam, sit amet maximus est. Aliquam efficitur aliquam ornare. Nam bibendum ante id interdum cursus. Cras ut facilisis sapien. Nunc mi justo, pulvinar nec urna sit amet, tempus sollicitudin massa. </p>
            </div>
            <div class="irf-footer-info">
                <p>Iberian Real Food<br>
                    Av. València 46<br>
                    09090 València<br>
                    <br><br>
                    +34 666 666 666<br>
                    info@iberianrealfood.com<br>
                    </p>
            </div>
            <?php
                $args_menu_footer_rrss = array(
                    'theme_location' => 'footer-menu-rrss',
                    'container' => false,
                    'menu_class' => 'irf-footer-rrss',
                );

                wp_nav_menu($args_menu_footer_rrss);
            ?>
        </section>
        <section class="irf-section-12 irf-footer-more-info">
            <?php
                $args_menu_footer_legal = array(
                    'theme_location' => 'footer-menu-legal',
                    'container' => false,
                    'menu_class' => 'irf-footer-legal',
                );

                wp_nav_menu($args_menu_footer_legal);
            ?>
            <a href="" class="irf-footer-siteby">Site by LaBase</a>
        </section>
        <section class="irf-section-12 irf-footer-cta-container">
            <div class="irf-footer-cta">
                <h2>Pide información sobre nuestro sello de calidad</h2>
                <p>¿Quieres más información? ¿Tienes un restaurante o producto y quieres que cuente con el certificado IBERIAN REAL FOOD®? 
                    <br><br>
                    ¡Escríbenos y te contestaremos lo antes posible!</p>
                <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/icon/logo-2.svg" alt=""></a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nick-karvounis-Ciqxn7FE4vE-unsplash (1).png" alt="" class="irf-footer-cta-img">
        </section>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>