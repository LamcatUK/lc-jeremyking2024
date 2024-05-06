<section class="contact">
    <div class="container-xl">
        <div class="row g-5">
            <div class="col-md-6">
                <h2>Get in touch</h2>
                <div class="mb-4">
                    <?=get_field('intro')?>
                </div>
                <div class="mb-2"><i class="fa-solid fa-phone me-2"></i>
                    <?=contact_phone()?>
                </div>
                <div class="mb-4"><i class="fa-solid fa-paper-plane me-2"></i>
                    <?=contact_email()?>
                </div>
                <div class="h3">Connect</div>
                <div class="fs-700"><?=social_icons_inline()?></div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">Send me a message</h2>
                <?=do_shortcode('[contact-form-7 id="' . get_field('form_id') . '"]')?>
            </div>
        </div>
    </div>
</section>