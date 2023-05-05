<?php

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register existing navigation menus
register_nav_menu('main', 'Main navigation on the website');
//register_nav_menu('footer', 'Navigation de pied de page');
//register_nav_menu('social-media', 'Liens vers les réseaux sociaux');

// Custom function that returns a menu structure for given location
function kc_get_menu(string $location, ?array $attributes = []): array
{
    // 1. Récupérer les liens en base de données pour la location $location
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location];
    $items = wp_get_nav_menu_items($menuId);

    // 2. Formater les liens récupérés en objets qui contiennent les attributs suivants :
        // - href : l'URL complète pour ce lien
        // - label : le libellé affichable pour ce lien
    $links = [];
    
    foreach ($items as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;

        foreach($attributes as $attribute) {
            $link->$attribute = get_field($attribute, $item->ID);
        }

        $links[] = $link;
    }

    // 3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
    return $links;
}

// Activate thumbnail on our posts:
add_theme_support( 'post-thumbnails' );
add_image_size('animal_thumbnail', 400, 400, true);

// Enregistrer un custom post type :
function kc_register_custom_post_types()
{
    register_post_type('projects',
        [
            'label' => 'Projects',
            'description' => 'My projects',
            'public' => true,
            'menu_position' => 20,
            // https://developer.wordpress.org/resource/dashicons/#cloud-saved
            'menu_icon' => 'dashicons-admin-customizer',
            'supports' => ['title', 'thumbnail'],
	        'has_archive' => true,
        ]
    );
}

add_action('init', 'kc_register_custom_post_types');

load_theme_textdomain('kc', get_template_directory() . '/locales');

function __kc(string $field)
{
    $base = '';
    $replacements = [
        '::star::' => '<svg role="img" width="28" height="28"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--black"></use></svg>',
    ];

    foreach ($replacements as $key => $value) {
        $base .= str_replace($key, $value, $field);
    }

    return $base;
}

function __hepl(string $translation, array $replacements = [])
{
    $base = __($translation, 'hepl');

    foreach ($replacements as $key => $value) {
            $variable = ':' . $key;
            $base = str_replace($variable, $value, $base);
    }
    return $base;
}

// Remove the 'p' tag automatically added by wp
// Remove p tags from ACF WYSIWYG field
function acf_wysiwyg_remove_wpautop() {
    // remove p tags //
    remove_filter('acf_the_content', 'wpautop' );
    // add line breaks before all newlines //
//    add_filter( 'acf_the_content', 'nl2br' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');


///**
// * Under Maintenance
// */
//
//// Add options checkbox to Settings / General
//function mythemename_settings_general_maintenance()
//{
//    add_settings_section(
//        'my_settings_section', // Section ID
//        'ADDITIONAL SETTINGS', // Section Title
//        'my_section_options_callback', // Content Callback
//        'general' // Show under "General" settings page
//    );
//    add_settings_field(
//        'maintenance_mode', // Option ID
//        'Maintenance mode', // Option Label
//        'maintenance_mode_callback', // Callback for Arguments
//        'general', // Show under "General" settings page
//        'my_settings_section', // Name of the section
//        array( // The $args to pass to the callback
//            'maintenance_mode' // Should match Option ID
//        )
//    );
//    register_setting('general', 'maintenance_mode', 'esc_attr');
//}
//
//function maintenance_mode_callback($args)
//{
//    // Checkbox Callback
//    $value = get_option($args[0]);
//    $checked = ($value == "on") ? "checked" : "";
//    echo "<label>
//      <input type=\"checkbox\" id=\"$args[0]\" name=\"$args[0]\" $checked />
//      <span>Check to activate Maintenance Mode page</span>
//    </label><p>A general <i>Under Maintenance</i> page will be shown to non-admin users.</p>";
//}
//add_action('admin_init', 'mythemename_settings_general_maintenance');
//
//// Handle Maintenance page
//if (!function_exists('wp_under_maintenance')) :
//    function wp_under_maintenance()
//    {
//        $isLoginPage = basename($_SERVER['PHP_SELF']) == 'wp-login.php';
//        $isMaintenanceModeOn = get_option('maintenance_mode') == "on";
//
//        if (
//            $isMaintenanceModeOn &&
//            !$isLoginPage &&
//            !is_user_logged_in() &&
//            !is_admin() &&
//            !current_user_can("update_plugins")
//        ) {
//            get_template_part('maintenance');
//            wp_redirect(get_site_url(). '/maintenance');
//            exit();
//        }
//    }
//endif;
//add_action('init', 'wp_under_maintenance', 30);

// remove wp WYSISYG default editor on all post and pages
function init_remove_support(){
    remove_post_type_support( 'post', 'editor');
    remove_post_type_support( 'page', 'editor');
}
add_action('init', 'init_remove_support',100);
