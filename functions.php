<?php

// Variable declarations

// Includes
include(get_theme_file_path('/includes/front/enqueue.php'));
include(get_theme_file_path('/includes/front/head.php'));
include(get_theme_file_path('/includes/back/editor.php'));

// Hooks
add_action('wp_enqueue_scripts', 'recc_enqueue');
add_action('wp_head', 'recc_head', 5);
add_action('after_setup_theme', 'recc_features');
add_filter('default_content', 'my_editor_content', 10, 2);
// add_filter('ai1wm_exclude_content_from_export', 'ignoreFiles');