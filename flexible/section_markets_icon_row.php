<?php 

$markets = get_sub_field('choose_markets');

$class = '';  

if(  count($markets) > 8 ){
    $class = 'icon-row--more-than-8';
}

?>
<div class="row">
    <div class="columns small-12">
        <div class="icon-row <?php echo $class; ?>">
        <?php foreach($markets as $m_id ): ?>
            <div class="icon-column">
                <div class="market-icon-card">
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
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    </div>
</div>
