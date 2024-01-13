<?php
//
//function mythem_enqueue_style()
//{
//    $cache = (WP_DEBUG) ? microtime() : null;
//
//    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/bw-style.css', null, $cache);
//    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/bw-script.js', array('jquery'), $cache, true);
//}
//
//add_action('wp_enqueue_scripts', 'mythem_enqueue_style');

//// Detect old browsers
//function detectOldBrowsers()
//{
//    $user_agent = $_SERVER['HTTP_USER_AGENT'];
//
//    $deprecated_browsers = array('MSIE', 'Trident', 'Firefox/3.6', 'Opera Mini');
//
//    foreach ($deprecated_browsers as $browser) {
//        if (stripos($user_agent, $browser) !== false) {
//            return true;
//        }
//    }
//
//    return false;
//}
//
//// Load custom page for outdated browser
//add_action('template_redirect', 'browserCheck');
//function browserCheck()
//{
//    if (!detectOldBrowsers()) {
//        return;
//    }
//
//    include get_stylesheet_directory() . '/outdated-browser.php';
//    exit();
//}

// Customize theme
add_action('after_setup_theme', 'customizeTheme');
function customizeTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', [
        'script',
        'style'
    ]);

    // Register menu(s)
     register_nav_menus([
     'header_menu' => 'Header menu',
     'footer_menu' => 'Footer menu',
     'footer_bottom' => 'Footer bottom',
     ]);


}

// Custom admin logo
//add_action('login_head', function () {
//
//    $logo = get_bloginfo('template_directory') . '/assets/img/logo.svg';
//
//    if (file_exists($logo)) {
//        echo '<style>h1 a { background-image:url(' . $logo . ')!important; background-size: contain !important;}</style>';
//    }
//});

// Add custom css to dashboard
//add_action('admin_enqueue_scripts', 'addDashboardStyles');
//function addDashboardStyles()
//{
//    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/admin.css');
//}

// Remove category & tag text before title
 add_filter('get_the_archive_title', function ($title) {
   return preg_replace('~^[^:]+: ~', '', $title);
 });

// Add contact info to admin
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Information',
        'menu_title' => 'Information',
        'menu_slug'  => 'information',
        'post_id'    => 'information',
        'icon_url'   => '/wp-content/themes/sushijo/assets/images/icon-logo.svg',
        'position'   => 3,
        'redirect'   => true,
        'autoload'   => true
    ));
}
