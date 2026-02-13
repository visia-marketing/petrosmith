<?php 
$rand_id = 'markets-icon-row-' . wp_generate_uuid4();
$markets = get_sub_field('choose_markets');

$slider = get_sub_field('display');
$per_row = get_sub_field('row_display');
$class = ''; 

$count_markets = count($markets);

if( $count_markets < $per_row ){
    $per_row = $count_markets;
}



if( $slider == 1 ){
    $class .= ' display-slider';  
}else{
    $class .= ' display-grid'; 
}



if(  count($markets) == 7 && $per_row == 8 ){
    $per_row = 7;
}

if(  count($markets) == 5 && $per_row == 6 ){
    $per_row = 5;
}

if(  count($markets) == 3 && $per_row == 4 ){
    $per_row = 3;
}

?>
<div class="row flexible-market-icons" id="<?php echo $rand_id; ?>">
    <div class="columns small-12">
        <div class="icon-row <?php echo $class; ?>">
        <?php foreach($markets as $m_id ): ?>
            <div class="icon-column">
                <div class="market-icon-card">
                    <a href="<?php echo get_the_permalink($m_id); ?>">
                        <?php 
                            $icon = get_field('market_icon', $m_id);
                            $name = get_the_title( $m_id );
                        ?>
                        <?php if( $icon ): ?>
                            <div class="market-icon-card__icon">
                                <?php echo wp_get_attachment_image( $icon, 'thumnmail' ); ?> 
                            </div>
                        <?php endif; ?>
                        <div class="market-icon-card__name">
                            <?php echo esc_html( $name ); ?>
                        </div>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    </div>
</div>

<style>
    #<?php echo $rand_id; ?> .icon-row.display-grid {
        display: grid;
        grid-template-columns: repeat(<?php echo esc_html( $per_row ); ?>, 1fr);
        gap: 20px;
    }

    #<?php echo $rand_id; ?> .icon-row.display-slider {
        display: flex;
    }

    .flexible-market-icons .slick-prev,
    .flexible-market-icons .slick-next {
        height: auto;
    }

    .flexible-market-icons .slick-prev:before,
    .flexible-market-icons .slick-next:before {
        display: none;
    }

</style>

<?php if( $slider == 1 ): ?>

<script>
    jQuery(function($) {
        $('#<?php echo $rand_id;?> .icon-row').slick({
            infinite: true,
            slidesToShow: <?php echo $per_row; ?>,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button type="button" class="slick-prev cards-next"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="41" viewBox="0 0 23 41" fill="none"> <path d="M21.123 1.5L2.12129 20.5018L21.123 39.5035" stroke="#062F6E" stroke-width="3" stroke-linecap="round"/></svg></button>',
            nextArrow: '<button type="button" class="slick-next cards-prev"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="41" viewBox="0 0 23 41" fill="none"><path d="M1.5 39.5034L20.5018 20.5017L1.5 1.4999" stroke="#062F6E" stroke-width="3" stroke-linecap="round"/></svg></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                    }
                }
            ]
        });
    });
</script>

<?php endif; ?>