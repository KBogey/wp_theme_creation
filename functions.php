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
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css', '5.2.1');
    add_filter('style_loader_tag', 'ch_add_attributes_to_bootstrap_stylesheet', 10, 3);
    wp_register_style( 'choucroute', get_template_directory_uri() . '/style.css', array('bootstrap'), $theme->get( 'Version' ) );
    wp_enqueue_style( 'choucroute' );

    // Scripts
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js', array(), '5.2.1', true);
    add_filter('script_loader_tag', 'ch_add_attributes_to_bootstrap_script', 10, 3);
    wp_register_script('choucroute', get_template_directory_uri() . '/src/assets/scripts/script.js', array('jquery', 'bootstrap'), $theme->get('Version'), true);
        wp_enqueue_script('choucroute');
}
add_action( 'wp_enqueue_scripts', 'ch_load_styles_and_scripts' );

/**
 * Add integrity and crossorigin to bootstrap cdn stylesheet
 *
 * @param $link_element - Element HTML link
 * @param $handle - Stylesheet name (handle)
 * @param $url - Stylesheet url
 *
 * @return string - filtered Link element
 *
 * @since 1.0.0
 */
function ch_add_attributes_to_bootstrap_stylesheet($link_element, $handle, $url) : string {
    //    var_dump($handle); die;
    if ( $handle === "bootstrap") {
        $integrity_token = 'sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT';
        $new_link = str_replace(
            "href='$url'",
            "href='$url' integrity='$integrity_token' crossorigin='anonymous'",
            $link_element
        );
        return $new_link;
    }
    return $link_element;

}

/**
 * Add integrity and crossorigin to bootstrap cdn script
 *
 * @param $script_element - Element script
 * @param $handle - Script name (handle)
 * @param $src - Script url
 *
 * @return string - filtered script element
 *
 * @since 1.0.0
 */
function ch_add_attributes_to_bootstrap_script($script_element, $handle, $src) : string {
    if ( $handle === "bootstrap") {
        $integrity_token = 'sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8';
        return str_replace(
            "src='$src'",
            "src='$src' integrity='$integrity_token' crossorigin='anonymous'",
            $script_element
        );
    }
    return $script_element;

}
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
