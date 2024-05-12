<?php
$class = $block['className'] ?? '';
$bgcolour = get_field('background') ?: 'white';

$btn = $bgcolour == 'white' || $bgcolour == 'grey'  ? 'btn-outline-blue' : 'btn-outline-white';
$formID = get_field('form_id') ?? null;
?>
<section
    class="form_cta pt-5 pb-4 bg-<?=$bgcolour?> <?=$class?>">
    <div class="container-xl">
        <h2 class="mb-3 text-center">
            <?=get_field('title')?>
        </h2>
        <?php
        if (get_field('intro') ?? null) {
            ?>
        <div class="pb-4 text-center">
            <?=get_field('intro')?>
        </div>
        <?php
        }
?>
        <?=do_shortcode('[contact-form-7 id="' . $formID . '"]')?>
    </div>
</section>