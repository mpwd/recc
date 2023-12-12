<?php get_header();
?>
<!-- SLIDER -->
<div class="relative">
    <button id="slide-backward" class="hidden md:block absolute top-1/2 left-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="40" viewBox="0 0 23 40" fill="none">
            <path d="M1.10211 21.0753L20.2503 39.5392C20.8577 40.1536 21.8807 40.1536 22.52 39.5392C23.1593 38.9555 23.1593 37.9724 22.52 37.3579L6.05699 21.5361C6.05699 21.5361 5.37113 20.8776 5.37113 20.0174C5.37113 19.1572 6.05699 18.5426 6.05699 18.4639L22.52 2.64209C23.1593 2.02765 23.1593 1.07527 22.52 0.460831C22.2003 0.15361 21.7848 0 21.4012 0C21.0176 0 20.57 0.15361 20.2823 0.460831L1.10211 18.894C0.494734 19.4777 0.494734 20.4608 1.10211 21.0753Z" fill="white" />
        </svg>
    </button>
    <ul id="slider" class="flex overflow-x-auto overflow-y-hidden snap-x snap-mandatory h-[75vh]">
        <?php
        $args = array(
            'posts_per_page' => 6,
            'post_type' => 'slide',
            'meta_key' => 'order',
            'orderby' => 'meta_value',
            'order' => 'ASC',
        );

        $homepageSlider = new WP_Query($args);
        if ($homepageSlider->have_posts()) :
            $numberOfSlides = $homepageSlider->found_posts;

            while ($homepageSlider->have_posts()) : $homepageSlider->the_post();
                $slideNumber = get_field('order');
        ?>
                <li id="slide-<? echo $slideNumber ?>" class="slide text-white text-center shrink-0 basis-full snap-center">
                    <div class="bg-secondary bg-center bg-cover h-full flex flex-col justify-center" style="<? if (has_post_thumbnail()) : ?>
                    background-image: linear-gradient(
                        rgba(0, 0, 0, 0.5), 
                        rgba(0, 0, 0, 0.5)), 
                        url('<?php the_post_thumbnail_url(); ?>');">
                    <? endif ?>
                    <div class="mx-auto px-4 py-10 max-w-5xl md:[&_h5]:mx-10">
                        <h1><? the_title(); ?></h1>
                        <? the_content(); ?>
                    </div>
                    </div>
                </li>
        <? endwhile;
        endif;
        ?>
    </ul>
    <button id="slide-forward" class="hidden md:block absolute top-1/2 right-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="40" viewBox="0 0 23 40" fill="none">
            <path d="M21.8975 18.9247L2.74929 0.460829C2.14191 -0.15361 1.11897 -0.15361 0.479627 0.460829C-0.159713 1.04455 -0.159713 2.02765 0.479627 2.64209L16.9426 18.4639C16.9426 18.4639 17.6285 19.1224 17.6285 19.9826C17.6285 20.8428 16.9426 21.4574 16.9426 21.5361L0.479627 37.3579C-0.159713 37.9724 -0.159713 38.9247 0.479627 39.5392C0.799297 39.8464 1.21487 40 1.59847 40C1.98208 40 2.42961 39.8464 2.71732 39.5392L21.8975 21.106C22.5049 20.5223 22.5049 19.5392 21.8975 18.9247Z" fill="white" />
        </svg>
    </button>
    <div id="dots" class="absolute bottom-8 right-1/2 translate-x-1/2 flex gap-2"> </div>
</div>

<? while (have_posts()) {
    the_post();
?>
    <!-- BANNER - Get Directions -->
    <div class="bg-secondary py-2 text-center [&_p]:inline [&_p]:text-base [&_p]:md:text-xl [&_a]:underline [&_a]:decoration-1"><? the_excerpt(); ?> </div>

    <!-- MOST RECENT SERVICE -->
    <?php
    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'service',
        'meta_key' => 'service_date',
        'orderby' => 'meta_value',
        'order' => 'DES',
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :

        while ($loop->have_posts()) : $loop->the_post();
            $meta_date = get_field('service_date');
            $serviceDate = DateTime::createFromFormat('Ymd', $meta_date);
            $serviceColor = get_field('liturgical_color');
            $youtubeLink = get_field('youtube_link');
    ?>
            <section class="mx-[5vw] md:mx-auto my-20 text-center md:text-left max-w-5xl md:grid md:grid-cols-2 items-center gap-[6%]">
                <div class="mx-auto">
                    <iframe class="mx-auto" width="350" height="235" src="<? echo $youtubeLink; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="mx-auto max-w-xs md:max-w-none">
                    <h2 class="mb-5">
                        <svg class="inline mr-1" xmlns="http://www.w3.org/2000/svg" width="17" height="24" viewBox="0 0 17 24" fill="none">
                            <path d="M13.5 1H3.5C2.83696 1 2.20107 1.26744 1.73223 1.7435C1.26339 2.21955 1 2.86522 1 3.53846V23L8.5 16.2308L16 23V3.53846C16 2.86522 15.7366 2.21955 15.2678 1.7435C14.7989 1.26744 14.163 1 13.5 1Z" fill="var(--<? echo $serviceColor ?>)" fill-opacity="0.3" stroke="var(--<? echo $serviceColor ?>)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <a href="<?php echo the_permalink(); ?>" class="align-middle"><?php the_title(); ?></a>
                    </h2>
                    <p class="">
                        <svg class="inline mr-1" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                            <path d="M18.5 1H16V0.5C16 0.22 15.78 0 15.5 0C15.22 0 15 0.22 15 0.5V1H5V0.5C5 0.22 4.78 0 4.5 0C4.22 0 4 0.22 4 0.5V1H1.5C0.67 1 0 1.67 0 2.5V16.5C0 17.33 0.67 18 1.5 18H18.5C19.33 18 20 17.33 20 16.5V2.5C20 1.67 19.33 1 18.5 1ZM1.5 2H4V3.5C4 3.78 4.22 4 4.5 4C4.78 4 5 3.78 5 3.5V2H15V3.5C15 3.78 15.22 4 15.5 4C15.78 4 16 3.78 16 3.5V2H18.5C18.78 2 19 2.22 19 2.5V5H1V2.5C1 2.22 1.22 2 1.5 2ZM18.5 17H1.5C1.22 17 1 16.78 1 16.5V6H19V16.5C19 16.78 18.78 17 18.5 17Z" fill="#2E5568" />
                            <path d="M15.5 10H4.5C4.22 10 4 9.78 4 9.5C4 9.22 4.22 9 4.5 9H15.5C15.78 9 16 9.22 16 9.5C16 9.78 15.78 10 15.5 10Z" fill="#2E5568" />
                            <path d="M15.5 12H4.5C4.22 12 4 11.78 4 11.5C4 11.22 4.22 11 4.5 11H15.5C15.78 11 16 11.22 16 11.5C16 11.78 15.78 12 15.5 12Z" fill="#2E5568" />
                            <path d="M9.5 14H4.5C4.22 14 4 13.78 4 13.5C4 13.22 4.22 13 4.5 13H9.5C9.78 13 10 13.22 10 13.5C10 13.78 9.78 14 9.5 14Z" fill="#2E5568" />
                        </svg>
                        <span class="align-middle">
                            <?php echo $serviceDate->format('l, F jS'); ?>
                        </span>
                    </p>
                    <p class="mx-auto">
                        <?php if (has_excerpt()) {
                            echo wp_trim_words(get_the_excerpt(), 21);
                        } else {
                            echo wp_trim_words(get_the_content(), 21);
                        }  ?>
                    </p>
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <a class="text-xl text-white bg-primary py-4 px-10" href="<?php echo $bulletinLink ?>" target="_blank">View bulletin</a>
                        <a class="text-xl body-link" href="<?php echo $bulletinLink ?>" target="_blank">View worship archives</a>
                    </div>
                </div>
            </section>
    <?php

        endwhile;
    endif;
    wp_reset_postdata();
    ?>
    <!----------- MAIN ------------>
    <main class="w-screen my-20 lg:my-32">
        <?php the_content(); ?>
    </main>
<?
}

get_footer();

// [&_a]:bg-primary
// slider-link is-style-outline