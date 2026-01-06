<?php 
  $page_header_content = get_field('page_header_content');
  $page_header_style = get_field('page_header_style');
  $show_page_header = get_field('show_page_header');

  $show_page_breadcrumbs = get_field('show_page_breadcrumbs');
  // if( is_front_page() ){
  //   $show_page_header = false;
  // }


  if( array_key_exists( 'heading', $page_header_content) ){
    if( $page_header_content['heading'] ){
      $page_heading = $page_header_content['heading'];
    }    
  }

  if( array_key_exists( 'letter_case', $page_header_content) ){
    if( $page_header_content['letter_case'] ){
      $letter_case = $page_header_content['letter_case'];
    }    
  }

  if( array_key_exists( 'sub_heading', $page_header_content) ){
    if( $page_header_content['sub_heading'] ){
      $page_sub_heading = $page_header_content['sub_heading'];
    }    
  }
  if( array_key_exists( 'heading_text', $page_header_content) ){
    if( $page_header_content['heading_text'] ){
      $page_heading_text = $page_header_content['heading_text'];
    }    
  }

  if( array_key_exists( 'background', $page_header_style) ){
    if( $page_header_style['background'] ){
      $page_heading_background = $page_header_style['background'];
    }    
  }
  if( array_key_exists( 'background_image', $page_header_style) ){
    if( $page_header_style['background_image'] ){
      $page_heading_background_image = $page_header_style['background_image'];
    }    
  }
  if( array_key_exists( 'header_size', $page_header_style) ){
    if( $page_header_style['header_size'] ){
      $page_heading_size = $page_header_style['header_size'];
    }    
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
    <?php 
    if( $page_heading_background === 'image' ){
        echo wp_get_attachment_image( $page_heading_background_image, 'large', false, array( "class" => "page-header-image" ) );
    }
    ?>
    <div class="page-header-content-wrapper fc-section fc-section-<?php echo $page_heading_background;?> <?php echo $hero_class;?> page-header-<?php echo $page_heading_size; ?>">
      <div class="row">
        <div class="small-12 large-10 <?php if( is_front_page() ): ?> small-centered text-center<?php endif; ?>  columns">
          <div class="page-header-content">

              <?php if ( !empty($page_sub_heading) ): ?>
                <p class="g-section-subtitle">
                  <?php echo esc_html($page_sub_heading); ?>
               </p>
              <?php endif; ?>
              <h1 class="letter-case--<?php echo $letter_case;?>"><?php if ( $page_heading ): echo esc_html($page_heading); else: the_title(); endif; ?></h1>
              <?php if ( !empty($page_heading_text) ): ?>
                <p>
                    <?php echo esc_html($page_heading_text); ?>
                </p>
            <?php  endif; ?>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>

<?php if( $show_page_breadcrumbs ): ?>

<div class="row breadcrumbs-container">
  <div class="column small-12">
  <ul class="breadcrumbs">

  <li>
    <a href="/">Home</a>
  </li>

  <?php if( $great_grandparent ): ?>
    <li>
      <a href="<?php echo get_the_permalink($great_grandparent); ?>"><?php echo $great_grandparent_name; ?></a>
    </li>
  <?php endif; ?>

  <?php if( $grandparent ): ?>
    <li>
      <a href="<?php echo get_the_permalink($grandparent); ?>"><?php echo $grandparent_name; ?></a>
    </li>
  <?php endif; ?>

  <?php if( $parent ): ?>
    <li>
      <a href="<?php echo get_the_permalink($parent); ?>"><?php echo $parent_name; ?></a>
    </li>
  <?php endif; ?>

  <li>
    <?php echo get_the_title( get_the_ID() ); ?>
  </li>

  </ul>
  </div>
</div>

<?php endif; ?>
