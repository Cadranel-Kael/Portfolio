<?php

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register existing navigation menus
register_nav_menu('main', 'Main navigation on the website');
//register_nav_menu('footer', 'Navigation de pied de page');
//register_nav_menu('social-media', 'Liens vers les réseaux sociaux');
register_nav_menu('social-media', 'Links of my socials');

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

        foreach ($attributes as $attribute) {
            $link->$attribute = get_field($attribute, $item->ID);
        }

        $links[] = $link;
    }

    // 3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
    return $links;
}

// Activate thumbnail on our posts:
add_theme_support('post-thumbnails');
add_image_size('animal_thumbnail', 400, 400, true);

// Enregistrer un custom post type :
function kc_register_custom_post_types()
{
    register_post_type('project',
        [
            'label' => 'Project',
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
    $base = '<span class="row">';
    $replacements = [
        '::star-black::' => '<svg role="img" width="28" height="28"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--black"></use></svg>',
        '::star-white::' => '<svg role="img" width="28" height="28"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--white"></use></svg>',
        '<br>' => '&nbsp</span><span class="row">',
        '<br/>' => '&nbsp</span><span class="row">',
    ];

    $base .= strtr($field, $replacements);

    $base .= '</span>';

    return $base;
}

function kc_star(float $number = 28, bool $black = false)
{
    if ($black) {
        return '<svg role="img" width="' . $number . '" height="' . $number . '"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--black"></use></svg>';
    }
    return '<svg role="img" width="' . $number . '" height="' . $number . '"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--white"></use></svg>';
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
function acf_wysiwyg_remove_wpautop()
{
    remove_filter('acf_the_content', 'wpautop');
}

add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

// removes the wysiwyg editor by default
add_action('init', function () {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
}, 100);


function word_per_line(string $content, string $custom_class = '')
{
    $words = explode(' ', $content);

    $formatted_words = array();

    foreach ($words as $word) {
        $formatted_words[] = '<span class="row' . $custom_class . '">' . $word . '</span>';
    }
    $formatted_words = implode(' ', $formatted_words);

    return $formatted_words;
}

add_filter('the_content', 'word_per_line');

function fields_to_var()
{
    $acf_fields = get_fields();
    extract($acf_fields);
}

/**
 * Custom function to insert an image with custom classes.
 *
 * @param int    $attachment_id ID of the image attachment.
 * @param string $size          Image size (e.g., 'thumbnail', 'medium', 'large', 'full').
 * @param array  $classes       Array of custom classes to be added to the image element.
 */
function kc_insert_image($attachment_id, $size = 'thumbnail', $classes = array()) {
    $image = wp_get_attachment_image($attachment_id, $size);

    // Add custom classes to the image element
    $class_string = implode(' ', $classes);
    $image_with_classes = str_replace('<img', '<img class="' . esc_attr($class_string) . '"', $image);

    echo $image_with_classes;
}


