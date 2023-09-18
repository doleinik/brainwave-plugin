<?php
//function get_image_sizes($unset_disabled = true)
//{
//    $wais = &$GLOBALS['_wp_additional_image_sizes'];
//
//    $sizes = array();
//
//    foreach (get_intermediate_image_sizes() as $_size) {
//        if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
//            $sizes[$_size] = array(
//                'width'  => get_option("{$_size}_size_w"),
//                'height' => get_option("{$_size}_size_h"),
//                'crop'   => (bool) get_option("{$_size}_crop")
//            );
//        } elseif (isset($wais[$_size])) {
//            $sizes[$_size] = array(
//                'width'  => $wais[$_size]['width'],
//                'height' => $wais[$_size]['height'],
//                'crop'   => $wais[$_size]['crop']
//            );
//        }
//
//        if ($unset_disabled && ($sizes[$_size]['width'] == 0) && ($sizes[$_size]['height'] == 0)) {
//            unset($sizes[$_size]);
//        }
//    }
//    return $sizes;
//}


add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    }
    else {
        $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
    }

    if( $dosvg ){
        if( current_user_can('manage_options') ){

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        else {
            $data['ext']  = false;
            $data['type'] = false;
        }
    }
    return $data;
}


