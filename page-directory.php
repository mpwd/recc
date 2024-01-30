<!-- this is for pages -->

<?php

get_header();

?>

<main class="mx-[5vw] lg:mx-auto">
  <h1 class="text-center my-12 md:my-28">Church directory</h1>
  <section class="flex items-start justify-center gap-1 sm:gap-8">
    <div class="letters-column">
      <a href="#A" id="sidebar-#A" class="block py-1 px-2 sm:py-2 sm:px-4 active-letter">A</a>
      <a href="#B" id="sidebar-#B" class="block py-1 px-2 sm:py-2 sm:px-4">B</a>
      <a href="#C" id="sidebar-#C" class="block py-1 px-2 sm:py-2 sm:px-4">C</a>
      <a href="#D" id="sidebar-#D" class="block py-1 px-2 sm:py-2 sm:px-4">D</a>
      <a href="#E" id="sidebar-#E" class="block py-1 px-2 sm:py-2 sm:px-4">E</a>
      <a href="#F" id="sidebar-#F" class="block py-1 px-2 sm:py-2 sm:px-4">F</a>
      <a href="#G" id="sidebar-#G" class="block py-1 px-2 sm:py-2 sm:px-4">G</a>
      <a href="#H" id="sidebar-#H" class="block py-1 px-2 sm:py-2 sm:px-4">H</a>
      <a href="#I" id="sidebar-#I" class="block py-1 px-2 sm:py-2 sm:px-4">I</a>
      <a href="#J" id="sidebar-#J" class="block py-1 px-2 sm:py-2 sm:px-4">J</a>
      <a href="#K" id="sidebar-#K" class="block py-1 px-2 sm:py-2 sm:px-4">K</a>
      <a href="#L" id="sidebar-#L" class="block py-1 px-2 sm:py-2 sm:px-4">L</a>
      <a href="#M" id="sidebar-#M" class="block py-1 px-2 sm:py-2 sm:px-4">M</a>
      <a href="#N" id="sidebar-#N" class="block py-1 px-2 sm:py-2 sm:px-4">N</a>
      <a href="#O" id="sidebar-#O" class="block py-1 px-2 sm:py-2 sm:px-4">O</a>
      <a href="#P" id="sidebar-#P" class="block py-1 px-2 sm:py-2 sm:px-4">P</a>
      <a href="#Q" id="sidebar-#Q" class="block py-1 px-2 sm:py-2 sm:px-4">Q</a>
      <a href="#R" id="sidebar-#R" class="block py-1 px-2 sm:py-2 sm:px-4">R</a>
      <a href="#S" id="sidebar-#S" class="block py-1 px-2 sm:py-2 sm:px-4">S</a>
      <a href="#T" id="sidebar-#T" class="block py-1 px-2 sm:py-2 sm:px-4">T</a>
      <a href="#U" id="sidebar-#U" class="block py-1 px-2 sm:py-2 sm:px-4">U</a>
      <a href="#V" id="sidebar-#V" class="block py-1 px-2 sm:py-2 sm:px-4">V</a>
      <a href="#W" id="sidebar-#W" class="block py-1 px-2 sm:py-2 sm:px-4">W</a>
      <a href="#X" id="sidebar-#X" class="block py-1 px-2 sm:py-2 sm:px-4">X</a>
      <a href="#Y" id="sidebar-#Y" class="block py-1 px-2 sm:py-2 sm:px-4">Y</a>
      <a href="#Z" id="sidebar-#Z" class="block py-1 px-2 sm:py-2 sm:px-4">Z</a>
    </div>
    <div class="directory-cards-container">
      <?

      $args = array(
        'post_type' => 'contact',
        'meta_key' => 'last_name',
        'orderby' => 'meta_value',
        'order' => 'ASC',
      );
      $loop = new WP_Query($args);
      if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
      ?>
          <div class="max-w-6xl mx-auto [&_span]:text-xl [&_span]:font-light text-[#444]" data-first-character="<?php echo mb_substr(get_field('last_name'), 0, 1); ?>">
            <? echo the_content(); ?>
          </div>
      <?
        endwhile;
      endif;

      ?>
    </div>
  </section>
</main>

<? get_footer();
