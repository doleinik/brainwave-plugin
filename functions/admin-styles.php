<?php


add_action('admin_head', function () {
    wp_enqueue_style('admin-brainwave-style',  '/wp-content/plugins/brainwave/index.css');
});

add_action('after_setup_theme', function () {
    add_theme_support('editor-styles');
    add_editor_style('/assets/css/bw-style.css');
});

function enqueue_custom_styles() {
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/assets/css/bw-style.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function custom_gutenberg_admin_scripts()
{
    wp_enqueue_script(
        'custom-gutenberg-admin-script',
        get_template_directory_uri() . '/assets/js/bw-script.js',
        array(),
        true,
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_gutenberg_admin_scripts');

add_action('enqueue_block_editor_assets', 'custom_gutenberg_admin_scripts');

add_filter('show_admin_bar', '__return_false');

function create_page_and_set_as_home()
{
    $page_title = 'Home';
    $page_slug = 'home';
    $page_content = 'Содержимое страницы';

    $page_check = get_page_by_path($page_slug);

    if (!$page_check) {
        $page_data = array(
            'post_type' => 'page',
            'post_title' => $page_title,
            'post_name' => $page_slug,
            'post_content' => $page_content,
            'post_status' => 'publish',
        );

        $page_id = wp_insert_post($page_data);
    } else {
        $page_id = $page_check->ID;
    }

    update_option('page_on_front', $page_id);
    update_option('show_on_front', 'page');
}

function change_permalink_structure()
{
    $permalink_structure = '/%postname%/';

    if (get_option('permalink_structure') !== $permalink_structure) {
        update_option('permalink_structure', $permalink_structure);
    }

    if (!get_option('rewrite_rules')) {
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
}

//function hide_default_post_type() {
//    remove_menu_page('edit.php');
//}
//add_action('admin_menu', 'hide_default_post_type');

function custom_settings()
{
    // Change permalink structure
//    change_permalink_structure();

    // Create home page
    create_page_and_set_as_home();
}

add_action('admin_init', 'custom_settings');

// Ограничить количество ревизий до 5
function limit_post_revisions($num, $post)
{
    return 5;
}

add_filter('wp_revisions_to_keep', 'limit_post_revisions', 10, 2);
