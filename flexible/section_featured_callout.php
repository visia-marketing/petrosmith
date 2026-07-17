<?php

$design = get_sub_field('callout_design');
$background_color = $design['background'];
$image = $design['callout_image'];

$content = get_sub_field('callout_content');

?>


<div class="featured-callout">
    <div class="row">

        <div class="column small-10 large-10 small-offset-1 callout-column">

            <div class="callout-content callout-background--<?php echo $background_color; ?>">

                <?php if( $image ): ?>
                   <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
                <?php endif; ?>

                <?php if( $content ): ?>
                   <p><?php echo $content; ?></p>
                <?php endif; ?>

            </div>

        </div>

    </div>
</div>