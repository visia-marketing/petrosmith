<?php
$cards = get_sub_field('cards');
$per_row = get_sub_field('cards_per_row');
$card_style = 'primary';

$card_hover = get_sub_field('hover_effect') ?? 'disabled';
$slider = get_sub_field('card_display') ?? 0;


$class = 'columns cards cards-style--'.$card_style;

if( $card_hover != 'disable'){
    $class .= ' card-hover--enable';
    $class .= ' card-hover--'.$card_hover;
}else{
    $class .= ' card-hover--disable';
}

$component = 'grid';

if( $slider ){
    $component = 'slider';
}

$rand_id = $component . '_' . wp_generate_uuid4();


if( !$slider ){
    switch ($per_row) {
        case 2:
            $class .= ' small-12 medium-6';
            break;
        case 3:
            $class .= ' small-12 medium-4';
            break;
        case 4:
            $class .= ' small-12 medium-3';
            break; 
        default:
            $class .= ' small-12 medium-4'; // Default to 3 per row
    }
    
}



?>

<div class="fc-section-columns fc-section-cards" id="<?php echo $rand_id; ?>">

  <div class="row padding-row" data-equalizer>
    
    <?php get_template_part('flexible/section_header'); ?>
    
    <?php if($slider): ?><div class="carousel-wrapper"> <?php endif; ?>
        <?php foreach( $cards as $card ): ?>


        <div class="<?php echo $class; ?>">
            <div class="content content-cards" data-equalizer-watch>

            <?php if( array_key_exists( 'card_link', $card) ): ?>
                <?php if( is_array( $card['card_link']) ): ?>
                    <a href="<?php echo $card['card_link']['url']; ?>" class="card-link-wrapper" aria-label="<?php echo $card['card_title']; ?>">
                <?php endif; ?>
            <?php endif; ?>


                <div class="card-image">

                    <?php $image = wp_get_attachment_image($card['card_icon'], 'medium');  ?>
                    
                    <?php if( $image ): ?>
                        <div class="card-image-inner">
                            <?php echo $image; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-content">

                        

                    <h3 class="card-title">
                        <?php echo $card['card_title']; ?>
                    </h3>
                
                    <p class="card-p">
                        <?php echo $card['card_description']; ?>
                    </p>

                    <?php if( array_key_exists( 'card_link', $card) ): ?>
                        <?php if( is_array( $card['card_link']) ): ?>
                            <a href="<?php echo $card['card_link']['url']; ?>" class="card-button">
                                <span class="button-text">
                                    <?php if($card['card_link']['title']): ?>
                                        <?php echo $card['card_link']['title']; ?>
                                    <?php else: ?>
                                        Read More
                                    <?php endif; ?>
                                </span>
                                <div class="arrow">

                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>


                <?php if( array_key_exists( 'card_link', $card) ): ?>
                    <?php if( is_array( $card['card_link']) ): ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            
            </div>
        </div>

        <?php endforeach; ?>
    <?php if($slider): ?></div> <?php endif; ?>
      
    </div>

</div>

<style>
    #<?php echo $rand_id;?> .carousel-wrapper .slick-prev:before,
    #<?php echo $rand_id;?> .carousel-wrapper .slick-next:before{
        content: '';


    }
    #<?php echo $rand_id;?> .carousel-wrapper svg *{
        stroke: #fff;
    }
</style>

<script>
    jQuery(function($) {
        $('#<?php echo $rand_id;?> .carousel-wrapper').slick({
            infinite: true,
            slidesToShow: <?php echo $per_row; ?>,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button type="button" class="slick-prev cards-next"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="41" viewBox="0 0 23 41" fill="none"> <path d="M21.123 1.5L2.12129 20.5018L21.123 39.5035" stroke="#062F6E" stroke-width="3" stroke-linecap="round"/></svg></button>',
            nextArrow: '<button type="button" class="slick-next cards-prev"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="41" viewBox="0 0 23 41" fill="none"><path d="M1.5 39.5034L20.5018 20.5017L1.5 1.4999" stroke="#062F6E" stroke-width="3" stroke-linecap="round"/></svg></button>',
        });
    });
</script>