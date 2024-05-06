<?php
$class = $block['className'] ?? 'pt-5';
?>
<section class="all_testimonials <?=$class?>">
    <div class="container-xl">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => -1
        ));
while ($q->have_posts()) {
    $q->the_post();
    ?>
        <a id="<?=acf_slugify(get_the_title())?>" class="anchor"></a>
        <div class="row g-5 justify-content-center">
            <div class="col-md-9 testimonials__words">
                <div class="text-start">
                    <?=the_content()?>
                </div>
                <div class="testimonials__title text-center text-md-end">
                    <?=get_the_title()?>
                </div>
                <div class="testimonials__loca text-center text-md-end">
                    <?=get_field('location', get_the_ID())?>
                </div>
                <hr class="my-5">
            </div>
        </div>
        <?php
}
?>
    </div>
</section>