<?php 
// $terms = get_terms( 'dlm_download_category' );
// foreach ( $terms as $term ) {
// 	echo "<h2>" . $term->name . "</h2>";
// 	$slug = $term->slug;
// 	echo do_shortcode( "[downloads category='$slug']" );
// }
/*
<?php if( $post_objects ): ?> 
<div class="brochure-grid">
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
    <div>
    <?php setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title();?>"><?php the_post_thumbnail( 'thumb' );?></a>
        <br>
        <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a>
    <?php wp_reset_postdata(); ?>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
*/

// query downloads and organize them by category 

//$terms = get_terms( 'dlm_download_category' );

$terms = get_sub_field("download_category_ids");

foreach ( $terms as $term ) {
    echo '<div class="row category-title-row"><div class="column small-12">';
    echo '<h2 class="download-category-title">' . esc_html( $term->name ) . '</h2>';
    echo '</div></div>';

    $args = array(
        'post_type' => 'dlm_download',
        'tax_query' => array(
            array(
                'taxonomy' => 'dlm_download_category',
                'field'    => 'slug',
                'terms'    => $term->slug,
            ),
        ),
        'posts_per_page' => -1,
    );

    $downloads = new WP_Query( $args );

    if ( $downloads->have_posts() ) {
        echo '<div class="download-grid row">';
        while ( $downloads->have_posts() ) {
            $downloads->the_post();
            ?>
            <div class="download-item">
                <a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title_attribute(); ?>">
                    <div class="download-thumbnail">
                        <?php the_post_thumbnail( 'thumb' ); ?>
                    </div>
                </a>
                <br>
                <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No downloads found in this category.</p>';
    }
}

?>