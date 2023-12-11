<?php

get_header();

?>

<main>
    <!----------- HERO ------------>
    <section class="bg-top" style="
          background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
              url(<? echo get_theme_file_uri('/images/service-archives.png'); ?>);
        ">
        <div class="mx-auto">
            <h1 class="text-4xl font-serif text-white py-24 lg:py-36 text-center">
                Worship Archives
            </h1>
            <p class="">
            </p>
        </div>
    </section>

    <!----------- SERVICES LIST ------------>
    <section class="mx-[5vw] lg:mx-auto">
        <ul>
            <?php
            while (have_posts()) : the_post();
                $meta_date = get_field('service_date');
                $serviceDate = DateTime::createFromFormat('Ymd', $meta_date);
                $serviceColor = get_field('liturgical_color');
                $youtubeLink = get_field('youtube_link');

            ?>
                <li class="md:mx-auto my-20 text-center md:text-left max-w-5xl flex flex-col gap-7 md:gap-10 items-center md:flex-row">
                    <div>
                        <iframe class="mx-auto" height="200" width="350" src="<? echo $youtubeLink; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div>
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
                        <p class="max-w-xs md:max-w-none">
                            <?php if (has_excerpt()) {
                                echo wp_trim_words(get_the_excerpt(), 21);
                            } else {
                                echo wp_trim_words(get_the_content(), 21);
                            }  ?>
                        </p>
                        <a class="text-xl body-link" href="<?php echo $bulletinLink ?>" target="_blank">View bulletin</a>
                    </div>
                </li>
            <?
            endwhile;
            // endif;
            ?>
        </ul>
        <div class="flex gap-6 text-xl items-center justify-center py-10">
            <?php echo paginate_links(
                array(
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;'
                )
            ); ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>