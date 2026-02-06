<?php 

$download_category = get_sub_field('download_category_ids');

if($download_category):

    $grid_title = get_sub_field('title');

    $term = get_term( $download_category->term_id , 'dlm_download_category');

    $download_query = new WP_Query(array(
        'post_type' => 'dlm_download',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'dlm_download_category',
            'field'    => 'slug',
            'terms'    => $term->slug,
        ),
        )
    ));

    // echo "<pre>";
    // print_r($dlm_downloads);
    // echo "</pre>";
    ?>

    <div class="row download-category-grid">
        <div class="columns small-12">

            <h2 class="download-category-title">
                <?php if( $grid_title): ?>
                    <?php echo $grid_title; ?>
                <?php else: ?>
                    <?php echo $term->name; ?>
                <?php endif; ?>
            </h2>

            <div class="download-grid">

                <?php foreach ($download_query->posts as $download): ?>

                    <?php 
                    if ( ! $download ) {
                        continue;
                    }
                    try {
                        $dlm_download = download_monitor()->service( 'download_repository' )->retrieve_single( $download->ID );
                    } catch ( Exception $exception ) {
                        $dlm_download = null;
                    }

                    if ( $dlm_download && method_exists($dlm_download, 'the_download_link') && method_exists($dlm_download, 'the_title') ) : ?>

                        <div class="download-cell">  
                            <a href="<?php echo $dlm_download->the_download_link(); ?>" class="download-cell" target="_blank" data-order="<?php echo get_field('order_number');?>">
                                <?php echo $dlm_download->the_image(); ?>
                                <span class="download-title"><?php echo $dlm_download->the_title(); ?></span>
                            </a>
                        </div>

                    <?php endif; ?>   

                <?php endforeach; ?>

            </div>
             
        </div>
    </div>

<?php endif;?>
