<?php 
  $page_header_content = get_field('page_header_content');
  $page_header_style = get_field('page_header_style');
  $show_page_header = get_field('show_page_header');
  $show_home_hero = false;

  $show_page_breadcrumbs = get_field('show_page_breadcrumbs');

  if( is_front_page() ){
    $show_page_header = false;
    $show_home_hero = true;
  }


  if( array_key_exists( 'heading', $page_header_content) ){
    if( $page_header_content['heading'] ){
      $page_heading = $page_header_content['heading'];
    }    
  }else{
    $page_heading = get_the_title();
  }


  $hero_class = "";

  if( is_front_page() ){
    $hero_class = "fc-section-hero-frontpage";
  }

  $parent = wp_get_post_parent_id( get_the_ID() );
  $parent_name = get_the_title( $parent );

  $grandparent = wp_get_post_parent_id( $parent );
  $grandparent_name = get_the_title( $grandparent );

  $great_grandparent = wp_get_post_parent_id( $grandparent );
  $great_grandparent_name = get_the_title( $great_grandparent );

?>


<?php if( $show_page_header  ): ?>
  <header class="fc-page-header page-header" id="page_header_<?php echo get_the_ID();?>">
    <div class="page-header-content-wrapper fc-section <?php echo $hero_class;?>" >
      <div class="row">
        <div class="small-12 large-10 <?php if( is_front_page() ): ?> small-centered text-center<?php endif; ?>  columns">
          <div class="page-header-content">
            <h1 class="page-header-heading"><?php echo $page_heading; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>

<?php if( $show_page_breadcrumbs ): ?>
  <div class="page-breadcrumbs">
    <div class="row">
      <div class="medium-12 columns">
        <nav class="">      
          <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
        </nav>     
      </div>
    </div>  
  </div>

<?php endif; ?>







<?php if( $show_home_hero): ?>

  <?php get_template_part( 'partials/home', 'hero' ); ?>

<?php endif; ?>
