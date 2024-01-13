<?php
//add_action('init', 'register_portfolio_post_type');
//function register_portfolio_post_type()
//{
//    register_post_type('portfolio', [
//        'label' => 'Portfolio',
//        'labels' => array(
//            'name' => 'Portfolio',
//            'singular_name' => 'Portfolio',
//            'menu_name' => 'Portfolio',
//            'all_items' => 'All Portfolio',
//            'add_new' => 'Add portfolio',
//            'add_new_item' => 'Add portfolio',
//            'edit' => 'Edit portfolio',
//            'edit_item' => 'Edit portfolio',
//            'new_item' => 'New portfolio',
//        ),
//        'public' => true,
//        'has_archive' => true,
//        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
//        'rewrite' => array('slug' => 'portfolio'),
//        'menu_position' => 5,
//        'menu_icon' => 'dashicons-businessperson',
//        'show_in_rest' => true,
//        'taxonomies' => array( 'type' ),
//    ]);
//
//    register_taxonomy('type', ['portfolio'], [
//        'label' => 'Type',
//        'labels' => [
//            'name' => 'Type',
//            'singular_name' => 'Type',
//            'search_items' => 'Search Type',
//            'all_items' => 'All Type',
//            'view_item ' => 'View Type',
//            'parent_item' => 'Parent Type',
//            'parent_item_colon' => 'Parent Type:',
//            'edit_item' => 'Edit Type',
//            'update_item' => 'Update Type',
//            'add_new_item' => 'Add New Type',
//            'new_item_name' => 'New Type Name',
//            'menu_name' => 'Type',
//            'back_to_items' => '← Back to Type',
//        ],
//        'description' => '',
//        'public' => true,
//        'hierarchical' => true,
//        'rewrite' => true,
//        'capabilities' => array(),
//        'meta_box_cb' => 'post_categories_meta_box',
//        'show_admin_column' => true,
//        'show_in_rest' => null,
//        'rest_base' => null
//    ]);
//}