<?php

$lightbox_gallery = get_sub_field('lightbox_gallery');

?>


<div class="flexible-lightbox-gallery">

    <?php if( $lightbox_gallery ): ?>
        <div class="lightbox-gallery row">
            <?php foreach( $lightbox_gallery as $image ): ?>
                <div class="column small-12 medium-6 large-4">
                    <a href="<?php echo wp_get_attachment_image_src( $image['image'], 'full' )[0]; ?>" data-lightbox="gallery" class="lightbox-anchor">
                        <img src="<?php echo wp_get_attachment_image_src( $image['image'], 'thumbnail' )[0]; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>



    <script>
    jQuery(document).ready(function($) {
        if ($('[data-lightbox="gallery"]').length) {

            var options = {
                overlayOpacity: 1,
            };

            new SimpleLightbox('[data-lightbox="gallery"]',  options );

        }
    });
    </script>


</div>