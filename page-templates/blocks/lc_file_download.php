<?php
$file = get_field('file');
$pdf_thumbnail = wp_get_attachment_image($file['ID'], 'full');
$file_path = get_attached_file($file['ID']);
$file_size = filesize($file_path);
$fileSize = formatBytes($file_size);
?>
<section class="file_download">
    <div class="container-xl py-5">
        <div class="row g-4">
            <div class="col-md-8">
                <h2><?=get_field('title')?></h2>
                <div class="mb-4">
                    <?=get_field('content')?>
                </div>
                <div class="text-center text-md-start">
                    <a href="<?=$file['url']?>"
                        target="_blank" download
                        class="btn btn-primary"><?=get_field('button_label')?>
                        (<?=$fileSize?>)</a>
                </div>
            </div>
            <div class="col-md-4">
                <a href="<?=$file['url']?>"
                    target="_blank" class="file_download__preview">
                    <?=$pdf_thumbnail?>
                </a>
            </div>
        </div>
    </div>
</section>