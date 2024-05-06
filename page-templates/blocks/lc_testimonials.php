<?php
$class = $block['className'] ?? 'py-5';

$s = 'carousel' . random_str(3);
?>
<section class="testimonials <?=$class?>">
    <div class="testimonials__overlay"></div>
    <div class="container-xl">
        <div id="<?=$s?>"
            class="testimonials__carousel carousel slide w-lg-75 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php

            $q = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1
            ));
$a = 'active';
$c = 0;
while ($q->have_posts()) {
    $q->the_post();
    ?>
                <div class="carousel-item <?=$a?>">
                    <a class="testimonials__link"
                        href="/testimonials/#<?=acf_slugify(get_the_title())?>">
                        <div class="testimonials__content text-pretty mb-3">
                            <?php
                $content = get_the_content();
    $content = preg_replace('/<!--.*?-->/', '', $content);
    $content = preg_replace('/<p>/', '', $content);
    $content = preg_replace('/<\/p>/', '', $content);
    echo $content;
    ?>
                        </div>
                        <div class="testimonials__title text-center">
                            <?=get_the_title()?>
                        </div>
                        <div class="testimonials__loca text-center">
                            <?=get_field('location', get_the_ID())?>
                        </div>
                    </a>
                </div>
                <?php
    $a = '';
    $c++;
}
?>
            </div>
            <div class="carousel-indicators">
                <?php
                $a = 'active';
for ($x = 0; $x < $c; $x++) {
    ?>
                <button type="button" data-bs-target="#<?=$s?>"
                    data-bs-slide-to="<?=$x?>"
                    class="<?=$a?>"></button>
                <?php
    $a = '';
}
?>
            </div>
        </div>
        <div class="text-center">
            <a href="/testimonials/" class="btn btn-outline-blue">Read more</a>
        </div>
    </div>
</section>