<?php

add_action( 'admin_menu', 'pagina_opciones' );

function pagina_opciones() {
    if ( function_exists( 'add_theme_page' ) ) {
        add_theme_page( 'Opciones', 'Opciones', 8, __FILE__, 'render_pagina' );
    }
}

function render_pagina() {

    if ( isset( $_POST['info_update'] ) ) {
        echo '<div id="message" class="updated fade"><p><strong>';

        $tmp_1 = htmlentities( stripslashes( $_POST['codigo_adsense_1'] ) , ENT_COMPAT );
        update_option( 'codigo_adsense_1', $tmp_1 );

        $tmp_2 = htmlentities( stripslashes( $_POST['codigo_adsense_2'] ) , ENT_COMPAT );
        update_option( 'codigo_adsense_2', $tmp_2 );

        $tmp_3 = htmlentities( stripslashes( $_POST['codigo_analytics'] ) , ENT_COMPAT );
        update_option( 'codigo_analytics', $tmp_3 );

        $tmp_4 = htmlentities( stripslashes( $_POST['email_contacto'] ) , ENT_COMPAT );
        update_option( 'email_contacto', $tmp_4 );

        echo 'Actualizado!';
        echo '</strong></p></div>';
    }
    ?>

    <div class="wrap">
        <h2>Codigos de Adsense</h2>
        
        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
        <input type="hidden" name="info_update" id="info_update" value="true" />

        <fieldset class="options">
        <table width="100%" border="0" cellspacing="0" cellpadding="6">

        <tr valign="top">
            <td width="35%" align="left">
                <strong>Codigo superior:</strong>
                <br>Este se mostrara debajo del titulo de los posts.
            </td>
            <td align="left">
                <textarea style="border:1px solid #3366FF;border-left: 4px solid #3366FF;" name="codigo_adsense_1" rows="10" cols="60"><?php echo get_option( 'codigo_adsense_1' ); ?></textarea>
            </td>
        </tr>

        <tr valign="top">
            <td width="35%" align="left">
                <strong>Codigo inferior</strong>
                <br>Este se mostrara al final de cada post.
            </td>
            <td align="left">
                <textarea style="border:1px solid #3366FF;border-left: 4px solid #3366FF;" name="codigo_adsense_2" rows="10" cols="60"><?php echo get_option( 'codigo_adsense_2' ); ?></textarea>
            </td>
        </tr>

        <tr valign="top">
            <td width="35%" align="left">
                <strong>Codigo Google Analytics</strong>
                <br>Ej: UA-15898899-1
            </td>
            <td align="left">
                <input style="border:1px solid #3366FF;border-left: 4px solid #3366FF;" name="codigo_analytics" value="<?php echo get_option( 'codigo_analytics' ); ?>">
            </td>
        </tr>

        <tr valign="top">
            <td width="35%" align="left">
                <strong>Email para contacto</strong>
                <br>Ej: example@domain.com
            </td>
            <td align="left">
                <input style="border:1px solid #3366FF;border-left: 4px solid #3366FF;" name="email_contacto" value="<?php echo get_option( 'email_contacto' ); ?>">
            </td>
        </tr>

        <tr valign="top">
            <td width="35%" align="left"></td>
            <td align="left">
                <input type="submit" name="info_update" style="color: #fff; display: inline-block; padding: 8px 16px; text-decoration: none; border-radius: 4px; box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.08);background-color: rgb( 74, 61, 117 );border: 1px solid rgb( 44, 37, 59 );" value="<?php _e( 'Actualizar' ); ?> &raquo;" />
            </td>
        </tr>

        </table>
        </fieldset>

        <div class="submit">
            
        </div>

        </form>
    </div>
<?php } 

function mostrar_adsense_1() {
    $encoded_1 = get_option( 'codigo_adsense_1' );
    $decoded_1 = html_entity_decode( $encoded_1, ENT_COMPAT );

    if ( !empty( $decoded_1 ) ) {
        $output .= " $decoded_1";
    }
    return $output;
}

function mostrar_adsense_2() {
    $encoded_2 = get_option( 'codigo_adsense_2' );
    $decoded_2 = html_entity_decode( $encoded_2, ENT_COMPAT );

    if ( !empty( $decoded_2 ) ) {
        $output .= " $decoded_2";
    }
    return $output;
}

function mostrar_analytics() {
    $encoded_3 = get_option( 'codigo_analytics' );
    $decoded_3 = html_entity_decode( $encoded_3, ENT_COMPAT );

    if ( !empty( $decoded_3 ) ) {
        $output .= " $decoded_3";
    }
    return $output;
}

function mostrar_email() {
    $encoded_4 = get_option( 'email_contacto' );
    $decoded_4 = html_entity_decode( $encoded_4, ENT_COMPAT );

    if ( !empty( $decoded_4 ) ) {
        $output .= " $decoded_4";
    }
    return $output;
}
?>