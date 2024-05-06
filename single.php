<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full') ?? null;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
<main id="main" class="blog">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <div class="container-xl py-5">
        <section class="breadcrumbs">
            <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
$the_date = get_the_date('jS F, Y');
$countries = get_the_tags();
$cats = get_the_category();

?>
        </section>
        <div class="row g-4 pb-4">
            <div class="col-lg-9 blog__content">
                <h1 class="blog__title text-blue-900 mb-3">
                    <?=get_the_title()?>
                </h1>
                <div class="news__meta d-flex align-items-center fs-300 mb-2">
                    <div>Posted on <?=$the_date?></div>
                </div>
                <?php
                if ($img) {
                    ?>
                <img src="<?=$img?>" alt="" class="blog__image">
                <?php
                }
$count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true);
echo $count;

foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            echo '<a id="' . $id . '" class="anchor"></a>';
            $sidebar[$heading] = $id;
        }
    }
    echo render_block($block);
}

echo lc_post_nav();
?>
            </div>
            <div class="col-lg-3">
                <div class="related">
                    <h3 class="text-blue-400">Related Musings</h3>
                    <?php
$cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');
$r = new WP_Query(array(
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID())
));
while ($r->have_posts()) {
    $r->the_post();
    ?>
                    <a class="related__card mb-3"
                        href="<?=get_the_permalink()?>">
                        <div class="fs-200 text-blue-400">
                            <?=get_the_date('jS F, Y')?>
                        </div>
                        <h3 class="fs-400 fw-600">
                            <?=get_the_title()?>
                        </h3>
                    </a>
                    <hr>
                    <?php
}
?>
                </div>
            </div>
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