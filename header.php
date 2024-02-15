<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
</head>

<body>
  <?php
  // the id of the current page's parent
  $parentId = wp_get_post_parent_id(get_the_ID());

  $our_community = new WP_Query(
    array(
      'post_type'      => 'page',
      'post_parent'    =>  61, // the id for the 'our community' page
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    )
  );

  $worship_archives = new WP_Query(
    array(
      'posts_per_page' => 5,
      'post_type' => 'service',
      'meta_key' => 'service_date',
      'orderby' => 'meta_value',
      'order' => 'DES',
    )
  );
  ?>

  <header id="header" class="px-[5vw] nav-shadow">
    <div class="py-2 flex items-center justify-between">
      <a href="<?php echo site_url('/'); ?>" class="flex items-center font-serif">
        <img src=<?php echo get_theme_file_uri('/images/logo.png') ?> class="w-11 md:w-14 lg:w-16" alt="logo" />
        <span class="max-w-[22ch] text-lg leading-tight md:text-xl md:leading-6 lg:text-2xl lg:leading-7 mx-3">Ravenswood Evangelical Covenant Church</span>
      </a>

      <!----------- NAV (DESKTOP) ------------>
      <nav class="hidden lg:flex items-center text-center">
        <div class="flex items-center gap-8">

          <!-- ABOUT US -->
          <a class="<? if (is_page('about-us')) echo 'body-link' ?>" href="<?php echo site_url('/about-us'); ?>">About us
          </a>

          <!-- OUR COMMUNITY -->
          <div class="nav-hover cursor-pointer">
            <span class="pb-2 <? if ($parentId == 61 or get_post_type() == 'event') echo 'body-link' ?>">Our Community
              <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="15" height="9" viewBox="0 0 15 9" fill="none">
                <path d="M8.19934 8.48782L14.6617 1.78594C14.8768 1.57336 14.8768 1.21533 14.6617 0.991557C14.4574 0.767788 14.1133 0.767788 13.8983 0.991557L8.36063 6.75361C8.36063 6.75361 8.13016 6.99366 7.82908 6.99366C7.528 6.99366 7.31292 6.75361 7.28536 6.75361L1.74773 0.991557C1.53268 0.767788 1.19934 0.767788 0.984289 0.991557C0.876762 1.10344 0.822998 1.24889 0.822998 1.38315C0.822998 1.51741 0.876762 1.67405 0.984289 1.77475L7.4359 8.48782C7.6402 8.7004 7.98429 8.7004 8.19934 8.48782Z" fill="#2B2D31" />
              </svg>
            </span>
            <ul class="hidden absolute nav-shadow bg-white text-center z-20 py-1 min-w-[200px]">
              <li class="py-3">
                <a href="<? echo site_url('/events') ?>">Events</a>
              </li>
              <?php
              if ($our_community->have_posts()) : ?>
                <?php while ($our_community->have_posts()) : $our_community->the_post(); ?>

                  <li class="py-3">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>

                <?php endwhile; ?>
              <?php endif;
              wp_reset_postdata(); ?>
            </ul>
          </div>

          <!-- WORSHIP ARCHIVES -->
          <div class="nav-hover cursor-pointer">
            <a href="<?php echo site_url('/services'); ?>" class="<? if (get_post_type() == 'service') echo 'body-link' ?>">Worship Archives
              <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="15" height="9" viewBox="0 0 15 9" fill="none">
                <path d="M8.19934 8.48782L14.6617 1.78594C14.8768 1.57336 14.8768 1.21533 14.6617 0.991557C14.4574 0.767788 14.1133 0.767788 13.8983 0.991557L8.36063 6.75361C8.36063 6.75361 8.13016 6.99366 7.82908 6.99366C7.528 6.99366 7.31292 6.75361 7.28536 6.75361L1.74773 0.991557C1.53268 0.767788 1.19934 0.767788 0.984289 0.991557C0.876762 1.10344 0.822998 1.24889 0.822998 1.38315C0.822998 1.51741 0.876762 1.67405 0.984289 1.77475L7.4359 8.48782C7.6402 8.7004 7.98429 8.7004 8.19934 8.48782Z" fill="#2B2D31" />
              </svg>
            </a>
            <ul class="hidden absolute nav-shadow bg-white text-center z-20 py-1 min-w-[200px]">
              <?php
              if ($worship_archives->have_posts()) : ?>
                <?php while ($worship_archives->have_posts()) : $worship_archives->the_post();
                  $serviceDate = DateTime::createFromFormat('Ymd', get_field('service_date'));
                ?>
                  <li class="py-3">
                    <a href="<?php the_permalink(); ?>"><?php echo $serviceDate->format('D, M jS'); ?></a>
                  </li>

                <?php endwhile; ?>
              <?php endif;
              wp_reset_postdata(); ?>
            </ul>
          </div>

          <!-- STAFF & LEADERSHIP -->
          <a class="<? if (is_page('staff-leadership')) echo 'body-link' ?>" href="<?php echo site_url('/staff-leadership'); ?>">
            Staff & leadership
          </a>

          <!-- GIVE -->
          <a class="bg-button px-10 py-2 text-white" href="<? echo site_url('/giving'); ?>">
            Give
          </a>
        </div>
      </nav>

      <!-- HAMBURGER (FOR MOBILE NAV) -->
      <svg class="lg:hidden" id="hamburger" width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="Group 52">
          <rect id="Rectangle 21" width="25" height="2" fill="#2B2D31" />
          <rect id="Rectangle 22" y="7" width="25" height="2" fill="#2B2D31" />
          <rect id="Rectangle 23" y="14" width="25" height="2" fill="#2B2D31" />
        </g>
      </svg>
    </div>
  </header>

  <!-- MOBILE NAV -->
  <nav id="nav" class="right-full fixed top-0 z-20 h-full w-full bg-primary text-white flex flex-col items-center justify-center">
    <svg id="close-nav-button" class="absolute top-8 right-8" xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28" fill="none">
      <rect x="1.57422" y="0.816162" width="35" height="1.3" transform="rotate(45 1.57422 0.816162)" fill="white" />
      <rect x="0.664062" y="26.2646" width="35" height="1.3" transform="rotate(-45 0.664062 26.2646)" fill="white" />
    </svg>

    <div class="flex flex-col items-center gap-8">

      <!-- ABOUT US -->
      <a class="<? if (is_page('about-us')) echo 'body-link' ?> text-3xl" href="<?php echo site_url('/about-us'); ?>">About us
      </a>

      <!-- OUR COMMUNITY -->
      <div>
        <span class="text-3xl <? if ($parentId == 61 or get_post_type() == 'event') echo 'body-link' ?>">Our Community</span>
        <ul class="text-center py-1 text-lg">
          <li class="py-3">
            <a href="<? echo site_url('/events') ?>">Events</a>
          </li>
          <?php
          if ($our_community->have_posts()) : ?>
            <?php while ($our_community->have_posts()) : $our_community->the_post(); ?>

              <li class="py-1">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>

            <?php endwhile; ?>
          <?php endif;
          wp_reset_postdata(); ?>
        </ul>
      </div>

      <!-- WORSHIP ARCHIVES -->
      <div>
        <a href="<?php echo site_url('/services'); ?>" class="<? if (get_post_type() == 'service') echo 'body-link' ?> text-3xl">Worship Archives</a>
        <ul class="text-center py-1 text-lg">
          <?php
          if ($worship_archives->have_posts()) : ?>
            <?php while ($worship_archives->have_posts()) : $worship_archives->the_post();
              $serviceDate = DateTime::createFromFormat('Ymd', get_field('service_date'));
            ?>
              <li class="py-1">
                <a href="<?php the_permalink(); ?>"><?php echo $serviceDate->format('D, M jS'); ?></a>
              </li>

            <?php endwhile; ?>
          <?php endif;
          wp_reset_postdata(); ?>
        </ul>
      </div>

      <!-- STAFF & LEADERSHIP -->
      <a class="<? if (is_page('staff-leadership')) echo 'body-link' ?> text-3xl" href="<?php echo site_url('/staff-leadership'); ?>">
        Staff & leadership
      </a>

      <!-- GIVE -->
      <a class="text-3xl" href="<? echo site_url('/giving'); ?>">
        Give
      </a>
    </div>
  </nav>
<?
