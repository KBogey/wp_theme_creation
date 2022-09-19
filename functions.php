<?php

/**
 * Load all scripts and styles for the front-end
 *
 * @return void
 *
 * @since 1.0.0
 */
function ch_load_styles_and_scripts(): void
{
    $theme = wp_get_theme();

    // Stylesheets
    wp_register_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.css', '5.2.1');
    wp_register_style( 'choucroute', get_template_directory_uri() . '/style.css', array('bootstrap'), $theme->get( 'Version' ) );
    wp_enqueue_style( 'choucroute' );

    // Scripts
    wp_register_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.2.1',
        true
    );
    wp_register_script('choucroute', get_template_directory_uri() . '/src/assets/scripts/script.js', array('jquery', 'bootstrap'), $theme->get('Version'), true);
        wp_enqueue_script('choucroute');
}
add_action( 'wp_enqueue_scripts', 'ch_load_styles_and_scripts' );

/**
 * Load the theme's text domain
 *
 * @return void
 *
 * @since 1.0.0
 */
function ch_load_text_domain() {
    load_theme_textdomain('choucroute', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'ch_load_text_domain');
