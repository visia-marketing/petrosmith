<?php

$video = get_field('home_hero_background_video');
$image = get_field('home_hero_background_image');

$headline = get_field('home_hero_headline');
?>

<header class="fc-page-header page-header" id="page_header_home_page">


    <div class="page-header-content-wrapper fc-section fc-section-<?php echo $page_heading_background;?> <?php echo $hero_class;?> page-header-<?php echo $page_heading_size; ?>">
        <?php if( $headline ): ?>
            <h1 class="fc-page-header-heading"><?php echo esc_html( $headline ); ?></h1>
        <?php endif; ?>
    </div>
    

    <video autoplay muted loop playsinline class="fc-page-header-video <?php if( !$video ){ echo 'fc-page-header-video--hidden'; } ?>">
        <?php if( $video ): ?>
            <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
        <?php endif; ?>
        Your browser does not support the video tag.
    </video>


</header>

