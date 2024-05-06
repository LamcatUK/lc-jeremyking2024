<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$page_for_posts = get_option('page_for_posts');
$img = get_the_post_thumbnail_url($page_for_posts, 'full');

get_header();

?>
<link rel="preload" href="<?=$img?>" as="image">
<main id="main">
    <section class="hero" style="background-image:url(<?=$img?>)">
        <div class="overlay"></div>
        <div class="container-xl">
            <div class="row g-4">
                <div class="col-md-6 order-2 order-md-1 d-flex flex-column justify-content-center align-items-start">
                    <h1 class="text-white">
                        Blog &amp; Musings
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="breadcrumbs pt-4 container-xl">
        <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
?>
    </section>

    <div class="container-xl pb-5">
        <?php

    if (get_the_content(null, false, $page_for_posts)) {
        echo '<div class="mt-3 mb-4">' . get_the_content(null, false, $page_for_posts) . '</div><hr>';
    }



while (have_posts()) {
    the_post();
    $the_date = get_the_date('jS F, Y');
    ?>
        <div class="news_row mb-4">
            <a href="<?=get_the_permalink()?>">
                <h3 class="h5 mb-2">
                    <?=get_the_title()?>
                </h3>
                <div class="news__excerpt text-grey-900 mb-2">
                    <?=wp_trim_words(get_the_content(), 40)?>
                </div>
            </a>
            <div class="news__meta d-flex align-items-center fs-300">
                <div>Posted on <?=$the_date?></div>
            </div>
        </div>
        <hr>
        <?php
}

?>
    </div>
    <?php
        numeric_posts_nav();
?>
    </div>
    </div>
    <section class="cta py-5 bg-green-400">
        <div class="container-xl text-center">
            <h2 class="mb-3">Start your new leadership journey</h2>
            <div class="fs-500 mb-4 cta__content">Call
                <strong><?=contact_phone()?></strong> or
                email
                <strong><?=contact_email()?></strong>
            </div>
            <div class="text-center">
                <a href="/contact/" class="btn btn-outline-white">Contact Me Today</a>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
?>