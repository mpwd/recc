<?php

function recc_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function my_editor_content($content, $post)
{

    switch ($post->post_type) {
        case 'slide':
            $content = 'This subheading should be no more than 150 characters or 20–25 words. Otherwise, you may encounter issues in the visual layout.';
            break;
        case 'event':
            $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula nunc ex, ultrices interdum nunc sollicitudin eu. Nam et auctor elit. Praesent mollis massa id metus vehicula bibendum. Sed feugiat volutpat gravida. Mauris non massa elit. Morbi vehicula maximus est, nec feugiat mauris mattis eu. Duis non purus egestas, luctus massa eu, porttitor mi.';
        default:
            $content = '';
            break;
    }

    return $content;
}

function ignoreFiles($exclude_filters)
{
    $exclude_filters[] = 'themes/recc/node_modules';
    return $exclude_filters;
}
