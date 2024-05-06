<?php
$class = $block['className'] ?? '';
$bgcolour = get_field('background') ?: 'white';

$btn = $bgcolour == 'white' ? 'btn-outline-blue' : 'btn-outline-white';
$l = get_field('link') ?? null;
?>
<section
    class="cta py-5 bg-<?=$bgcolour?> <?=$class?>">
    <div class="container-xl text-center">
        <h2 class="mb-3">
            <?=get_field('title')?>
        </h2>
        <div class="fs-500 cta__content">Call
            <strong><?=contact_phone()?></strong> or email
            <strong><?=contact_email()?></strong>
        </div>
        <?php
        if ($l) {
            ?>
        <div class="mt-4 text-center">
            <a href="<?=$l['url']?>"
                target="<?=$l['target']?>"
                class="btn <?=$btn?>"><?=$l['title']?></a>
        </div>
        <?php
        }
?>
    </div>
</section>