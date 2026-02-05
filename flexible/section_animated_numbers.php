<?php

$column_1 = get_sub_field('number_group_1');
$column_2 = get_sub_field('number_group_2');
$column_3 = get_sub_field('number_group_3');

$number_columns = array( $column_1, $column_2, $column_3 );

// echo '<pre>';
// print_r($number_columns );
// echo '</pre>';

?>


<div class="fc-section-columns animated-numbers">

    <div class="animated-numbers-grid">

        <?php $delay = 0; ?>
        <?php foreach( $number_columns as $number_group ): ?>
            <?php $delay += 500; ?>

            <div class="number-container">
                <div class="number-ring" data-aos="zoom-out" data-aos-delay="<?php echo $delay; ?>"></div>
                <?php if( !empty( $number_group['number'] ) ): ?>
                    <div class="petro-animated-number">
                        <span class="number-span" data-delay="<?php echo $delay; ?>" data-target="<?php echo esc_attr( $number_group['number'] ); ?>">0</span><?php if( $number_group['append']): ?><span class="append"><?php echo $number_group['append']; ?></span><?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if( !empty( $number_group['text'] ) ): ?>
                    <div class="number-label"><?php echo esc_html( $number_group['text'] ); ?></div>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

</div> 