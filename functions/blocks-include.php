<?php
function my_acf_init()
{
    if (function_exists('acf_register_block')) {
//        foreach (glob(get_template_directory() . "/components/*") as $file) {
//            $filename = basename($file);
//            $title = ucfirst(str_replace('-', ' ', $filename));
//
//            acf_register_block([
//                'name' => $filename,
//                'title' => $title,
//                'description' => __('A custom ' . $title),
//                'render_template' => get_template_directory() . "/components/{$filename}/index.php",
//                'category' => 'brainwave-component',
//                'icon' => [
//                    'foreground' => '#0074d9',
//                    'src' => 'shortcode'
//                ],
//                'multiple' => true,
//                'example' => [
//                    'attributes' => [
//                        'mode' => 'preview',
//                    ]
//                ]
//            ]);
//        }

        foreach (glob(get_template_directory() . "/blocks/*", GLOB_ONLYDIR) as $file) {
            $filename = basename($file);
            $title = ucfirst(str_replace('-', ' ', $filename));

            acf_register_block(array(
                'name' => $filename,
                'title' => $title,
                'description' => __('A custom ' . $title),
                'render_template' => get_template_directory() . "/blocks/{$filename}/index.php",
                'category' => 'brainwave-component',
                'multiple' => true,
                'icon' => array(
                    'foreground' => '#0074d9',
                    'src' => 'shortcode'
                ),
                'example' => [
                    'attributes' => [
                        'mode' => 'preview',
                    ]
                ]
            ));
        }
    }
}
add_action('acf/init', 'my_acf_init');

function my_acf_json_load_points($paths)
{
    $custom_acf_json_dirs = [];
    foreach (glob(get_template_directory() . "/blocks/*", GLOB_ONLYDIR) as $file) {
        $custom_acf_json_dirs[] = get_template_directory() . '/blocks/' . basename($file);
        foreach (glob($file . '/*', GLOB_ONLYDIR) as $file) {
            $custom_acf_json_dirs[] = get_template_directory() . '/blocks/' . basename($file);
        }
    }
    $custom_acf_json_dirs[] = get_template_directory() . '/acf-json';
    $paths = array_merge($paths, $custom_acf_json_dirs);

    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_points');

function deleteFolder($folderPath)
{
    if (is_dir($folderPath)) {
        $files = glob($folderPath . '/*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } elseif (is_dir($file)) {
                deleteFolder($file);
            }
        }
        rmdir($folderPath);
        return true;
    } else {
        return false;
    }
}

function my_acf_json_save_point()
{
    $group = acf_get_field_group();
    $group_name = str_replace(' ', '-', strtolower($group['title']));
    $custom_path = get_stylesheet_directory() . '/blocks/' . $group_name;

    if (!file_exists($custom_path)) {
        $custom_path =  get_stylesheet_directory() . '/acf-json';
    }
    return $custom_path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');