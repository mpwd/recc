<?php

get_header();

while (have_posts()) {
    the_post();
?>

    <main class="background__clip">
      <section class="mx-[5vw] py-20 max-w-7xl lg:mx-auto lg:py-32">
        <h1 class="text-center"><? the_title(); ?></h1>
        <div class="max-w-5xl mx-auto text-center">
            <?php the_content(); ?>
        </div>
      </section>
    </main>
  <?
}


get_footer();

?>
