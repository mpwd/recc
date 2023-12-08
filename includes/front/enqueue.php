<?php

function recc_enqueue()
{
    wp_register_style(
        'recc_google_fonts',
        'https://fonts.googleapis.com/css2?family=Lusitana&family=Signika+Negative&family=Signika:wght@300;400&display=swap',
        [],
        null
    );
    wp_register_style(
        'recc_tailwind_dist',
        get_theme_file_uri('dist/output.css')
    );
    wp_register_script('recc_main_js', get_theme_file_uri('/main.js'), NULL, '1.0', true);

    wp_enqueue_style('recc_google_fonts');
    wp_enqueue_style('recc_tailwind_dist');
    wp_enqueue_script('recc_main_js');
}
