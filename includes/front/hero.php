<?php

function hero()
{
?>
    <!----------- HERO ------------>
    <section class="bg-cover bg-center" style="
          background-image: linear-gradient(
                rgba(0, 0, 0, 0.5), 
                rgba(0, 0, 0, 0.5)), 
              url(<?php if (has_post_thumbnail()) {
                        echo get_the_post_thumbnail_url();
                    } else {
                        echo get_theme_file_uri('/images/generic.png');
                    }
                    ?>);
        ">
        <div class="mx-auto">
            <h1 class="text-4xl font-serif text-white py-24 lg:py-36 text-center">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>
<?
};
