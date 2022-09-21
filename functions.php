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

    // 1. Load filters functions
    require_once get_template_directory() . '/inc/filters-add-attributes-to-bootstrap-style-and-script.php';

    // 2. Stylesheets
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css', '5.2.1');
    wp_register_style('bootstrap-icons',  'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', '1.9.1');
    add_filter('style_loader_tag', 'ch_add_attributes_to_bootstrap_stylesheet', 10, 3);
    wp_register_style('choucroute', get_template_directory_uri() . '/style.css', array('bootstrap', 'bootstrap-icons'), $theme->get('Version'));
    wp_enqueue_style('choucroute');

    // 3. Scripts
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js', array(), '5.2.1', true);
    add_filter('script_loader_tag', 'ch_add_attributes_to_bootstrap_script', 10, 3);
    wp_register_script('choucroute', get_template_directory_uri() . '/src/assets/scripts/script.js', array('jquery', 'bootstrap'), $theme->get('Version'), true);
    wp_enqueue_script('choucroute');
}
add_action('wp_enqueue_scripts', 'ch_load_styles_and_scripts');


/**
 * Initialize the theme
 *
 * 1. Declare the main menu
 * 2. Add a walker class to use bootstrap classes in the menu
 * 3. Add a filter to use bootstrap 5 dropdowns in the menu
 * 4. Load the theme's text domain
 * 5. Add support for post thumbnails
 * 6. Add a custom image size for bootstrap cards
 * 7. add support for the custom logo
 * 8. Add filter to add bootstrap classes to the custom logo
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

    // 2.Add a class to use bootstrap layout @see https://github.com/wp-bootstrap/wp-bootstrap-navwalker and load filters to use bootstrap 5 dropdowns
    require_once get_template_directory() . '/inc/class-walker-bootstrap-menu.php';
    require_once get_template_directory() . '/inc/filters-bootstrap5-navbar-dropdown.php';

    // 3.Launch a filter to use dropdowns menu in bootstrap navbar
    add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);

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

    // 7.Add support for custom logo and add bt5 classes to the custom logo
    add_theme_support('custom-logo', array(
        'height' => 64,
        'width' => 64,
    ));
    require_once get_template_directory() . '/inc/filters-bootstrap5-custom-logo-classes.php';

    // 8. Add class to the custom logo
    add_filter('get_custom_logo', 'ch_filter_custom_logo');

    // 9. Add comments fields and button filters to have bootstrap style
    require_once get_template_directory() . '/inc/filters-bootstrap-comments-form.php';
}
add_action('after_setup_theme', 'ch_setup_theme');

//Création d'une zone de widget dans le footer
function ch_add_sidebars()
{
    register_sidebar(array(
        'id' => 'greg_footer_widget_zone',
        'name' => 'Zone du footer',
        'description' => 'Apparait dans le footer',
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'id' => "ch_article_widget_zone",
        'name' => 'Single article sidebar',
        'description' => 'Single article sidebar',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'ch_add_sidebars');
