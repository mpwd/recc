<!-- this is for pages -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
?>
    <main>
        <!----------- HEADER ------------>
        <section class="" style="
          background-image: linear-gradient(
              90deg,
              #000000 0%,
              rgba(0, 0, 0, 0) 92.6%
            ),
            url(<?php if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail_url();
                } else {
                    echo get_theme_file_uri('/images/generic.png');
                }
                ?>);
        ">
            <div class="">
                <h1 class="">
                    <?php the_title(); ?>
                </h1>
                <p class="">
                </p>
            </div>
        </section>

        <!----------- MAIN ------------>
        <section class="">
            <div class="">
                <?php the_content(); ?>
            </div>
        </section>
    </main>

<?
}

get_footer();

?>