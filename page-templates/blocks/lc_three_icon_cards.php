<?php
$class = $block['className'] ?? 'py-5';
?>
<section class="icon_cards <?=$class?>">
    <div class="container-xl py-4">
        <div class="row g-5">
            <?php
            while (have_rows('cards')) {
                the_row();
                ?>
            <div class="col-lg-4">
                <a href="<?=get_sub_field('link')?>"
                    class="icon_cards__card">
                    <div class="icon_cards__icon text-center mb-3">
                        <i
                            class="<?=get_sub_field('icon')?> fa-3x"></i>
                    </div>
                    <h2 class="text-center mb-2 text-blue-400">
                        <?=get_sub_field('title')?>
                    </h2>
                    <div class="text-center text-balance text-black">
                        <?=get_sub_field('description')?>
                    </div>
                </a>
            </div>
            <?php
            }
?>
        </div>
    </div>
</section>