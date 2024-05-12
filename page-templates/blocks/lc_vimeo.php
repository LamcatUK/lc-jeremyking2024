<?php
$w = get_field('width');
$width = ($w === '100') ? null :
         (($w === '75') ? 'w-md-75' :
         (($w === '50') ? 'w-sm-75 w-md-50' : null));

$class = $block['className'] ?? 'py-5';
?>
<section class="vimeo <?=$class?>">
    <div class="container-xl">
        <div class="video__container <?=$width?> mx-auto my-auto"
            style="background-color:#1a1a1a">
            <?php
            $bg = get_vimeo_data_from_id(get_field('vimeo_id'), 'thumbnail_url');
?>
            <div class="ratio ratio-16x9 mx-auto">
                <!-- <iframe src="https://player.vimeo.com/video/<?=get_field('vimeo_id')?>?byline=0&portrait=0"
                allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen
                allowfullscreen></iframe> -->
                <lite-vimeo
                    videoid="<?=get_field('vimeo_id')?>"
                    style="background-image:url('<?=$bg?>');"></lite-vimeo>
            </div>
        </div>
    </div>
</section>
<script type=module src="https://cdn.jsdelivr.net/npm/@slightlyoff/lite-vimeo@0.1.1/lite-vimeo.js"></script>