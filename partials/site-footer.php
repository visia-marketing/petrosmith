<footer class="main-footer">
  <div class="row">   
    <div class="small-12 medium-4 columns">
      <div class="footer-logo">
        <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php the_field('footer_logo', 'option');?>" alt="<?php bloginfo('name'); ?>"></a>
        <?php echo bloginfo('description'); ?>
      </div>
    </div>
    <div class="small-12 medium-3 columns show-for-medium">   
      <?php
      if (has_nav_menu('footer_navigation_1')) :
      wp_nav_menu(['theme_location' => 'footer_navigation_1', 'depth' => 2, 'menu_class' => 'footer-menu' ]); 
      endif;
      ?>
    </div>
    <div class="small-12 medium-3 columns footer-contact">   
      <?php
      echo get_field( 'footer_contact_info', 'option' );
      ?>
    </div>
    <div class="small-12 medium-2 columns footer-cta"> 
      
      <?php if( get_field( 'footer_cta_button', 'option' ) ): ?>
        <?php 
          $button = get_field( 'footer_cta_button', 'option' ); 
        ?>
        <a href="<?php echo esc_url( $button['url'] ); ?>" class="footer-cta-button" target="<?php echo esc_attr( $button['target'] ); ?>">
          <?php echo esc_html( $button['title'] ); ?>
        </a>
      <?php endif; ?>
      
      
    </div>
    <div class="small-12 medium-3 columns">
      
    </div>
  </div>

  <div class="row columns">
    <div class="footer-copyright">
      <div class="copyright">
        <?php echo get_field('copyright', 'options');?>
      </div>
      <?php
        if (has_nav_menu('footer_navigation_legal')) :
        wp_nav_menu(['theme_location' => 'footer_navigation_legal', 'depth' => 1, 'menu_class' => 'footer-menu-legal' ]); 
        endif;
      ?>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <strong class="footer-tagline">
        <?php echo get_field('footer_tagline', 'options');?>
      </strong>
    </div>
  </div>
</footer>