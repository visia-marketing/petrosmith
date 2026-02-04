<?php
$cards = get_sub_field('cards');
$per_row = get_sub_field('cards_per_row');
$card_style = 'primary';
$card_hover = get_sub_field('hover_effect') ?? 'disable';



$class = 'columns cards cards-style--'.$card_style;



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


?>

<div class="fc-section-columns fc-section-cards">

  <div class="row padding-row" data-equalizer>
    <?php get_template_part('flexible/section_header'); ?>
    
    <?php $delay = 0; ?>
    <?php foreach( $cards as $card ): ?>
        <?php $delay += 100; ?>

      <div class="<?php echo $class. ' card-hover--'.$card_hover.' card-background--'.$card['bg_group']['card_background']; ?> ">
        <div class="content content-cards" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>" data-equalizer-watch>

        <?php if( array_key_exists( 'card_link', $card) ): ?>
            <?php if( is_array( $card['card_link']) ): ?>
                <a href="<?php echo $card['card_link']['url']; ?>" class="card-link-wrapper" aria-label="<?php echo $card['card_title']; ?>">
            <?php endif; ?>
        <?php endif; ?>


            <div class="card-image">
                <?php
                if( $card['bg_group']['card_background'] == 'image' ) {
                    $image = wp_get_attachment_image($card['bg_group']['card_icon'], 'thumbnail');
                }else{
                    $image = false;
                }
                 
                  ?>
                
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

      
    </div>

</div>