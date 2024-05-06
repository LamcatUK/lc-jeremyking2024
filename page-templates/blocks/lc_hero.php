<?php
$img = wp_get_attachment_image_url(get_field('background'), 'full') ?: get_stylesheet_directory_uri() . '/img/missing-image.png';
// $img = get_stylesheet_directory_uri() . '/img/missing-image.png';
?>
<link rel="preload" href="<?=$img?>" as="image">
<section class="hero" style="background-image:url(<?=$img?>)">
    <div class="overlay"></div>
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6 order-2 order-md-1 d-flex flex-column justify-content-center align-items-start">
                <h1 class="text-white">
                    <?=get_field('title')?>
                </h1>
            </div>
        </div>
    </div>
</section>
<?php
if (!is_front_page()) {
    ?>
<section class="breadcrumbs pt-4 container-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
</section>
<?php
}
?>