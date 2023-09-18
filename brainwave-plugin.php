<?php
/*
Plugin Name: BrainWave
Description: Custom create block for Gutenberg with Acf
Version: 1.1.0
Author: Dima Oleinik
Author URI: https://doleinik-portfolio.netlify.app/
Copyright: Doleinik
Text Domain: brainwave
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/functions/blocks-include.php';
require_once __DIR__ . '/functions/admin-styles.php';
require_once __DIR__ . '/functions/post-types.php';
require_once __DIR__ . '/functions/customize.php';
require_once __DIR__ . '/functions/helpers.php';
require_once __DIR__ . '/functions/images.php';
require_once __DIR__ . '/functions/plugin-dashboard.php';
