<?php

$video = get_field('home_hero_background_video');
$image = get_field('home_hero_background_image');

$headline = get_field('home_hero_headline');
$subheadline = get_field('home_hero_subheadline');
?>

<header class="fc-page-header page-header" id="page_header_home_page">


    <div class="page-header-content-wrapper fc-section fc-section-<?php echo $page_heading_background;?> <?php echo $hero_class;?> page-header-<?php echo $page_heading_size; ?>">
        <?php if( $headline ): ?>
            <h1 class="fc-page-header-heading"><?php echo esc_html( $headline ); ?></h1>
        <?php endif; ?>

        <?php if( $subheadline ): ?>
            <p class="fc-page-header-subheading"><?php echo esc_html( $subheadline ); ?></p>
        <?php endif; ?>

        <div class="scroll-down">
            <a href="#fc-section-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="23" viewBox="0 0 41 23" fill="none">
                    <path d="M1.5 1.5L20.5018 20.5018L39.5035 1.5" stroke="white" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </a>
        </div>
    </div>
    

    <video autoplay muted loop playsinline class="fc-page-header-video <?php if( !$video ){ echo 'fc-page-header-video--hidden'; } ?>">
        <?php if( $video ): ?>
            <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
        <?php endif; ?>
        Your browser does not support the video tag.
    </video>


</header>

