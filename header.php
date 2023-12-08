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
    ?>

    <!----------- NAV ------------>
    <header id="header" class="px-[5vw]">
        <div class="py-2 flex items-center justify-between">
            <a href="<?php echo site_url('/'); ?>" class="flex items-center font-serif">
                <img src=<?php echo get_theme_file_uri('/images/logo.png') ?> class="w-11 md:w-14 lg:w-16" alt="logo" />
                <span class="max-w-[22ch] leading-tight mx-3">Ravenswood Evangelical Covenant Church</span>
            </a>
            <svg id="hamburger" width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 52">
                    <rect id="Rectangle 21" width="25" height="2" fill="#2B2D31" />
                    <rect id="Rectangle 22" y="7" width="25" height="2" fill="#2B2D31" />
                    <rect id="Rectangle 23" y="14" width="25" height="2" fill="#2B2D31" />
                </g>
            </svg>
        </div>
        <nav id="nav" class="hidden fixed z-20 top-0 h-full w-full bg-primary text-white">
            <svg id="close-nav-button" class="absolute top-8 right-8" xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28" fill="none">
                <rect x="1.57422" y="0.816162" width="35" height="1.3" transform="rotate(45 1.57422 0.816162)" fill="white" />
                <rect x="0.664062" y="26.2646" width="35" height="1.3" transform="rotate(-45 0.664062 26.2646)" fill="white" />
            </svg>

            <div class="flex flex-col items-center justify-between">

                <!-- ABOUT US -->
                <a class="<? if (is_page('our-beliefs') or is_page('our-story') or is_page('our-building') or is_page('leadership')) echo 'nav-active' ?>" href="<?php echo site_url('/about-us'); ?>">About us
                </a>

                <!-- OUR COMMUNITY -->
                <ul>
                    <span>Our Community ▼</span>
                    <?php

                    $our_community = new WP_Query(
                        array(
                            'post_type'      => 'page',
                            'post_parent'    =>  61, // the id for the 'our community' page
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order'
                        )
                    );

                    if ($our_community->have_posts()) : ?>
                        <?php while ($our_community->have_posts()) : $our_community->the_post(); ?>

                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>

                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </ul>

                <!-- WORSHIP ARCHIVES -->
                <ul>
                    <span>Worship Archives</span>
                    <?php

                    $args = array(
                        'posts_per_page' => 5,
                        'post_type' => 'service',
                        'meta_key' => 'service_date',
                        'orderby' => 'meta_value',
                        'order' => 'DES',
                    );

                    $worship_archives = new WP_Query($args);

                    if ($worship_archives->have_posts()) : ?>
                        <?php while ($worship_archives->have_posts()) : $worship_archives->the_post();
                            $serviceDate = DateTime::createFromFormat('Ymd', get_field('service_date'));
                        ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php echo $serviceDate->format('D, M jS'); ?></a>
                            </li>

                        <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </ul>

                <!-- STAFF & LEADERSHIP -->
                <a class="<? if (is_page('staff-leadership')) echo 'nav-active' ?>" href="<?php echo site_url('/staff-leadership'); ?>">
                    Staff & leadership
                </a>

                <!-- GIVE -->
                <a href="https://giving.covchurch.org/">
                    Give
                </a>
            </div>
        </nav>
    </header>