<!-- this is for individual events -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
    $fm_date = get_field('date');
    $fm_time = get_field('time');
    $fm_location = get_field('location');
    $fm_link = get_field('link');
?>
    <? hero(); ?>
    <!----------- MAIN ------------>
    <main class="mx-[5vw] my-20 max-w-6xl xl:mx-auto xl:my-32 flex flex-wrap-reverse gap-14">
        <div class="basis-0 flex-grow-lg min-w-[50%] [&_figure]:max-w-md [&_figure]:mx-auto [&_figure]:my-10 [&_figure]:aspect-video [&_figure]:overflow-hidden">
            <?php the_content(); ?>
        </div>
        <div class="flex-grow basis-80">
            <div class="bg-opaqueSecondary p-8">
                <div>
                    <p class="body-link my-0 font-normal">Date</p>
                    <p class="mb-12"><? echo $fm_date; ?></p>
                </div>

                <div class="mb-12">
                    <p class="body-link mb-4 font-normal">Time</p>
                    <p class="inline"><?php echo $fm_time; ?></p>
                </div>

                <div class="mb-12">
                    <p class="body-link my-0 font-normal">Location</p>
                    <p>
                        <?php echo $fm_location; ?>
                    </p>
                </div>
                <a class="text-xl text-white bg-button py-4 px-10 block text-center" target="_blank" href="<? echo $fm_link['url']; ?>"><? echo $fm_link['link_text']; ?></a>
            </div>
        </div>
    </main>
<?
}

get_footer();
