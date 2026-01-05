<?php

$per_page = get_sub_field('posts_per_page') ?? 9;
$exclude = get_sub_field('exclude_posts') ?? false;

$query = array(
    'post_type' => 'post',
    'posts_per_page' => $per_page,
    'post__not_in' => $exclude ? wp_list_pluck( $exclude, 'ID' ) : array(),
    'fields' => 'ID',
);
$posts = new WP_Query( $query );

?>

<div class="fc-section-news-grid fc-section-news-grid--posts">
    <div class="row">
        <div class="column small-12 medium-6 large-4">
            <?php foreach( $posts->posts as $news_post ): ?>
                <?php get_template_part( 'partials/content', 'news-card', array( 'post_id' => $news_post ) ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>