<?php

// CREAR LA TABLA SI NO EXISTE TODO: ELEMINAR CUANDO SE DESINSTALE EL TEMA
function irf_create_relation_table() {
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . 'relations';
    $table_post = $wpdb->prefix . 'posts';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        idTerritorio bigint(20) unsigned NOT NULL,
        idComunidad bigint(20) unsigned NOT NULL,
        idProducto bigint(20) unsigned NOT NULL,
        PRIMARY KEY (idProducto, idTerritorio, idComunidad),
        FOREIGN KEY (idTerritorio) REFERENCES $table_post(ID) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idComunidad) REFERENCES $table_post(ID) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idProducto) REFERENCES $table_post(ID) ON DELETE CASCADE ON UPDATE CASCADE
    ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

    dbDelta($sql);
}

add_action('after_switch_theme', 'irf_create_relation_table' );

// AÑADIR PÁGINA DE CONFIGURACIÓN PARA AÑADIR LA RELACIÓN

function irf_add_settings_page_relation_table() {
    add_menu_page( 'Configuración de relaciones', 'Relaciones', 'manage_options', 'irf-setting-page', 'irf_render_settings_page', 'dashicons-database', 9);
}

add_action('admin_menu', 'irf_add_settings_page_relation_table');

// PROCESAR LA INFORMACIÓN

if (!empty($_POST['territorio'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'relations';

    $wpdb->insert(
        $table_name,
        array(
            'idTerritorio' => $_POST['territorio'],
            'idComunidad' => $_POST['comunidad'],
            'idProducto' => $_POST['producto']
        )
    );
}

if (!empty($_POST['del_territorio'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'relations';

    $wpdb->delete(
        $table_name,
        array(
            'idTerritorio' => $_POST['del_territorio'],
            'idComunidad' => $_POST['del_comunidad'],
            'idProducto' => $_POST['del_producto']
        )
    );
}

// EL FORMULARIO PARA AÑADIR DATOS A LA TABLA

function irf_render_settings_page () {
    $territorio_posts = new WP_Query(array(
        'post_type' => 'territorios',
        'posts_per_page' => -1
    ));

    $comunidad_posts = new WP_Query(array(
        'post_type' => 'comunidades',
        'posts_per_page' => -1
    ));

    $productos_posts = new WP_Query(array(
        'post_type' => 'productos',
        'posts_per_page' => -1
    ));

    global $wpdb;
    $table_name = $wpdb->prefix . 'relations';

    $filas = $wpdb->get_results( "SELECT * FROM $table_name" );
?>
    <h1>Relaciones</h1>
    <form action="" method="post">
        <select name="territorio" id="">
        <?php while ($territorio_posts->have_posts()) : $territorio_posts->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
        <?php endwhile; ?>
        </select>
        <select name="comunidad" id="">
        <?php while ($comunidad_posts->have_posts()) : $comunidad_posts->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
        <?php endwhile; ?>
        </select>
        <select name="producto" id="">
        <?php while ($productos_posts->have_posts()) : $productos_posts->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
        <?php endwhile; ?>
        </select>
        <?php submit_button(); ?> 
    </form>
    <table style="border: 1px solid black;border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black;">Territorio</th>
            <th style="border: 1px solid black;">Comunidad</th>
            <th style="border: 1px solid black;">Producto</th>
            <th style="border: 1px solid black;"></th>
        </tr>
        <?php foreach ($filas as $fila) :?>
            <tr>
                <td style="border: 1px solid black;padding: 1rem;"><?php echo get_the_title($fila->idTerritorio); ?></td>
                <td style="border: 1px solid black;padding: 1rem;"><?php echo get_the_title($fila->idComunidad); ?></td>
                <td style="border: 1px solid black;padding: 1rem;"><?php echo get_the_title($fila->idProducto); ?></td>
                <td style="border: 1px solid black;padding: 1rem;">
                    <form action="" method="post">
                        <input type="hidden" name="del_territorio" value="<?php echo $fila->idTerritorio ?>">
                        <input type="hidden" name="del_comunidad" value="<?php echo $fila->idComunidad ?>">
                        <input type="hidden" name="del_producto" value="<?php echo $fila->idProducto ?>">
                        <input type="submit" value="Eliminar relación">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
}