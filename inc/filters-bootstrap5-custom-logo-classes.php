<?php

/**
 * Add bootstrap class to the custom logo
 *
 * @return string
 *
 * @since 1.0.0
 */
function ch_filter_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    return sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
        esc_url( home_url( '/' ) ),
        wp_get_attachment_image( $custom_logo_id, 'full', false, array(
            'class'    => 'custom-logo img-fluid navbar-brand',
        ) )
    );
}