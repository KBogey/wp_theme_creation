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

    // 1. Stylesheets
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css', '5.2.1');
    wp_register_style('bootstrap-icons',  'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', '1.9.1');
    add_filter('style_loader_tag', 'ch_add_attributes_to_bootstrap_stylesheet', 10, 3);
    wp_register_style( 'choucroute', get_template_directory_uri() . '/style.css', array('bootstrap', 'bootstrap-icons'), $theme->get( 'Version' ) );
    wp_enqueue_style( 'choucroute' );

    // 2. Scripts
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
 *
 * @return void
 *
 * @since 1.0.0
 */
function ch_setup_theme(): void
{
    // 1.Declare the main menu
    register_nav_menu(
        'main-menu',
        __('Main Menu in the bootstrap navbar', 'choucroute')
    );

    // 2.Add a class to use bootstrap layout @see https://github.com/wp-bootstrap/wp-bootstrap-navwalker
    require_once get_template_directory() . '/inc/class-walker-bootstrap-menu.php';

    // 3.Launch a filter to use dropdowns menu in bootstrap navbar
    add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );

    // 4.Load the theme's text domain
    load_theme_textdomain(
        'choucroute',
        get_template_directory() . '/languages'
    );

    // 5.Add support for post thumbnails
    add_theme_support('post-thumbnails',);

    // 6.Add new image size
    add_image_size(
        'bootstrap-card',
        300,
        200,
        true
    );

    // 7.Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 64,
        'width' => 64,
    ));
}
add_action('after_setup_theme', 'ch_setup_theme');

/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array
 *
 * @link https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}