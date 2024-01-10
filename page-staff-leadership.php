<!-- this is for pages -->

<?php

get_header();

while (have_posts()) {
    the_post();
    $parentId = wp_get_post_parent_id(get_the_ID());
    $staff_1 = get_field('staff_#1');
    $staff_2 = get_field('staff_#2');
    $staff_3 = get_field('staff_#3');
    $staff_4 = get_field('staff_#4');
    $staff_5 = get_field('staff_#5');
    $staff_6 = get_field('staff_#6');

?>
    <? hero(); ?>
    <!----------- MAIN ------------>
    <main class="mx-[5vw] my-20 max-w-7xl lg:mx-auto lg:my-32">
        <div class="max-w-5xl mx-auto">
            <?php the_content(); ?>
        </div>
        <?
        $staffArray = [$staff_1, $staff_2, $staff_3, $staff_4, $staff_5, $staff_6];
        foreach ($staffArray as $key => $value) {
        ?>
            <dialog class="modal mx-auto max-w-[94vw] sm:max-w-xl border-none shadow-lg">
                <button class="close-button absolute bg-none border-none top-6 right-6">
                    Close
                </button>
                <h3 class="mt-20 text-center"><? echo $value['name']; ?></h3>
                <h5 class="mb-8 text-center"><? echo $value['role']; ?></h5>
                <p class="my-8 px-5 text-base"><? echo $value['bio'] ?></p>
                <p class="px-5">
                    <svg class="inline mr-2" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <circle opacity="0.1" cx="20" cy="20" r="20" fill="#2E5568" />
                        <path d="M27.84 11.1267C27.7 10.9967 27.49 10.9668 27.31 11.0368L8.31 19.0368C8.12 19.1168 8 19.3067 8 19.5167C8 19.7267 8.14003 19.9068 8.34003 19.9768L14 21.8667V27.5068C14 27.7168 14.13 27.9068 14.33 27.9768C14.38 27.9968 14.44 28.0068 14.5 28.0068C14.65 28.0068 14.79 27.9367 14.89 27.8267L17.65 24.4267L22.15 28.8667C22.24 28.9567 22.37 29.0068 22.5 29.0068C22.54 29.0068 22.58 29.0067 22.62 28.9867C22.79 28.9467 22.92 28.8167 22.97 28.6467L27.97 11.6467C28.03 11.4667 27.97 11.2668 27.82 11.1368L27.84 11.1267ZM24.14 13.4567L14.42 20.9367L9.92999 19.4367L24.14 13.4567ZM15.01 21.7467L24.42 14.5068L17.23 23.3567L15.01 26.0867V21.7367V21.7467ZM22.27 27.5567L18.3 23.6368L26.33 13.7467L22.27 27.5567Z" fill="#2E5568" />
                    </svg>
                    <? echo $value['email'] ?>
                </p>
                <p class="px-5">
                    <svg class="inline mr-2" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <circle opacity="0.1" cx="20" cy="20" r="20" fill="#2E5568" />
                        <path d="M24.98 31C23.21 31 21.33 30.5 19.38 29.51C17.59 28.6 15.82 27.29 14.26 25.73C12.7 24.17 11.4 22.4 10.49 20.6C9.5 18.65 9 16.77 9 15C9 13.85 10.07 12.7399 10.53 12.3199C11.19 11.7099 12.23 11 12.99 11C13.37 11 13.81 11.25 14.38 11.77C14.81 12.16 15.28 12.7001 15.76 13.3101C16.05 13.6801 17.49 15.58 17.49 16.49C17.49 17.24 16.64 17.7601 15.75 18.3101C15.4 18.5201 15.05 18.74 14.79 18.95C14.51 19.17 14.47 19.2901 14.46 19.3101C15.41 21.6801 18.31 24.58 20.68 25.52C20.7 25.52 20.82 25.4699 21.04 25.1899C21.25 24.9299 21.47 24.57 21.68 24.23C22.23 23.34 22.75 22.49 23.5 22.49C24.41 22.49 26.31 23.93 26.68 24.22C27.3 24.7 27.83 25.18 28.22 25.6C28.75 26.17 28.99 26.61 28.99 26.99C28.99 27.75 28.28 28.79 27.67 29.45C27.25 29.91 26.14 30.99 24.99 30.99L24.98 31ZM12.97 12C12.7 12 11.98 12.33 11.2 13.05C10.46 13.74 9.99 14.48 9.99 15C9.99 21.73 18.25 30 24.98 30C25.49 30 26.24 29.54 26.92 28.79C27.64 28 27.97 27.28 27.98 27.01C27.95 26.82 27.42 26.08 25.98 24.97C24.74 24.02 23.74 23.51 23.48 23.5C23.46 23.5 23.35 23.55 23.12 23.84C22.92 24.09 22.71 24.43 22.51 24.77C21.95 25.68 21.42 26.54 20.65 26.54C20.53 26.54 20.4 26.52 20.29 26.47C17.67 25.42 14.56 22.3199 13.51 19.6899C13.38 19.3799 13.36 18.8799 13.98 18.3199C14.31 18.0199 14.77 17.74 15.21 17.47C15.54 17.27 15.89 17.06 16.14 16.86C16.43 16.63 16.47 16.52 16.48 16.5C16.48 16.24 15.96 15.24 15.01 14C13.9 12.56 13.16 12.04 12.97 12Z" fill="#2E5568" />
                        <path d="M28.4805 20C28.2005 20 27.9805 19.78 27.9805 19.5C27.9805 15.36 24.6205 12 20.4805 12C20.2005 12 19.9805 11.78 19.9805 11.5C19.9805 11.22 20.2005 11 20.4805 11C22.7505 11 24.8805 11.88 26.4905 13.49C28.1005 15.1 28.9805 17.23 28.9805 19.5C28.9805 19.78 28.7605 20 28.4805 20Z" fill="#2E5568" />
                        <path d="M25.4805 20C25.2005 20 24.9805 19.78 24.9805 19.5C24.9805 17.02 22.9605 15 20.4805 15C20.2005 15 19.9805 14.78 19.9805 14.5C19.9805 14.22 20.2005 14 20.4805 14C23.5105 14 25.9805 16.47 25.9805 19.5C25.9805 19.78 25.7605 20 25.4805 20Z" fill="#2E5568" />
                        <path d="M22.4805 20C22.2005 20 21.9805 19.78 21.9805 19.5C21.9805 18.67 21.3105 18 20.4805 18C20.2005 18 19.9805 17.78 19.9805 17.5C19.9805 17.22 20.2005 17 20.4805 17C21.8605 17 22.9805 18.12 22.9805 19.5C22.9805 19.78 22.7605 20 22.4805 20Z" fill="#2E5568" />
                    </svg>
                    <? echo $value['phone'] ?>
                </p>
            </dialog>
        <?
        }
        // $arr is now array(2, 4, 6, 8)
        unset($value); // break the reference with the last element
        ?>
    </main>

<?
}

get_footer();
