<?php

get_header();

?>

<main>
    <!----------- HERO ------------>
    <section class="bg-cover bg-center" style="
          background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
              url(<? echo get_theme_file_uri('/images/event-archives.jpg'); ?>);
        ">
        <div class="mx-auto">
            <h1 class="text-4xl font-serif text-white py-24 lg:py-36 text-center">
                Events
            </h1>
            <p class="">
            </p>
        </div>
    </section>

    <!----------- EVENTS LIST ------------>
    <section class="mx-[5vw] lg:mx-auto">
        <?php
        while (have_posts()) : the_post();
            $last_name = get_field('last_name');
        ?>
            <div>
                <?php echo the_content(); ?>
            </div>
        <?
        endwhile;
        ?>
        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>