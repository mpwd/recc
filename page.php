<!-- this is for pages -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
?>
    <? hero(); ?>
    <!----------- MAIN ------------>
    <main class="mx-[5vw] my-20 max-w-7xl lg:mx-auto lg:my-32">
        <div class="max-w-5xl mx-auto">
            <?php the_content(); ?>
        </div>
    </main>

<?
}

get_footer();
