<!-- this is for individual events -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
    $meta_date = get_field('event_date');
    $eventDate = DateTime::createFromFormat('Ymd', $meta_date);
    $eventTime = get_field('event_time');
    $eventEndTime = get_field('event_end_time');
    $eventLocation = get_field('event_location');
    $buttonLink = get_field('button_link');
    $buttonText = get_field('button_text');
?>
    <? hero(); ?>
    <!----------- MAIN ------------>
    <main class="mx-[5vw] my-20 max-w-6xl xl:mx-auto xl:my-32 flex flex-wrap-reverse gap-14">
        <div class="basis-0 flex-grow-lg min-w-[50%] [&_figure]:max-w-md [&_figure]:mx-auto [&_figure]:my-10 [&_ul]:ml-8 [&_li]:list-disc">
            <?php the_content(); ?>
        </div>
        <div class="flex-grow basis-80">
            <div class="bg-opaqueSecondary p-8">
                <div>
                    <p class="body-link my-0 font-normal">Date</p>
                    <p class="mb-12"><? echo $eventDate->format('l, F jS'); ?></p>
                </div>

                <? if ($eventTime) {
                ?>
                    <div class="mb-12">
                        <p class="body-link mb-4 font-normal">Time</p>
                        <p class="inline"><?php echo $eventTime; ?></p>
                        <? if ($eventEndTime) { ?>
                            <p class="inline"> – <?php echo $eventEndTime ?></p>
                        <? } ?>
                    </div>
                <?
                }

                if ($eventLocation) {
                ?>
                    <div class="mb-12">
                        <p class="body-link my-0 font-normal">Location</p>
                        <p>
                            <?php echo $eventLocation ?>
                        </p>
                    </div>
                <?  }

                if ($buttonLink) {
                ?>
                    <a class="text-xl text-white bg-button py-4 px-10 block text-center" href="<?php echo $buttonLink ?>"><? echo $buttonText ?></a>
                <? } ?>
            </div>
        </div>
    </main>

<?
}

get_footer();
