<!-- this is for individual services -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
    $meta_date = get_field('service_date');
    $serviceDate = DateTime::createFromFormat('Ymd', $meta_date);
    $serviceColor = get_field('liturgical_color');
?>
    <? hero(); ?>
    <!----------- MAIN ------------>
    <main class="mx-[5vw] my-20 max-w-7xl lg:mx-auto lg:my-32">
        <h1 class="text-center"><? the_title(); ?></h1>
        <p class="text-center mb-16">
            <svg class="inline mr-1" xmlns="http://www.w3.org/2000/svg" width="17" height="24" viewBox="0 0 17 24" fill="none">
                <path d="M13.5 1H3.5C2.83696 1 2.20107 1.26744 1.73223 1.7435C1.26339 2.21955 1 2.86522 1 3.53846V23L8.5 16.2308L16 23V3.53846C16 2.86522 15.7366 2.21955 15.2678 1.7435C14.7989 1.26744 14.163 1 13.5 1Z" fill="var(--<? echo $serviceColor ?>)" fill-opacity="0.3" stroke="var(--<? echo $serviceColor ?>)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <? echo $serviceDate->format('l, F jS'); ?>
        </p>
        <div class="max-w-5xl mx-auto text-center">
            <?php the_content(); ?>
        </div>
    </main>

<?
}

get_footer();
