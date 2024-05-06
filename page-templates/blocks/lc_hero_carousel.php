<?php
$s = 'carousel' . random_str(3);
?>
<section class="hero_carousel">
    <div id="<?=$s?>" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = 'active';
$c = 0;
while (have_rows('slides')) {
    the_row();
    ?>
            <div class="carousel-item <?=$active?>">
                <div class="overlay"></div>
                <?=wp_get_attachment_image(get_sub_field('background'), 'full', false, array('class' => 'd-block w-100'))?>
                <div class="container-xl">
                    <div class="hero_carousel__words">
                        <span class="h1">
                            <?=get_sub_field('caption')?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
    $active = '';
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
</section>