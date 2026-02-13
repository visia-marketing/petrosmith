<?php

$footer_images = get_field('footer_images', 'option');
$footer_logo = $footer_images['footer_logo'];
$footer_badge = $footer_images['footer_badge'];

$footer_links = get_field('footer_links', 'option');
$button = $footer_links['cta_button'];
$linkedin_url = $footer_links['linkedin_url'];

$terms = get_field('terms_and_conditions', 'option');

?>

<footer class="main-footer">
  <div class="row">   
    <div class="small-12 large-4 columns">
      <div class="footer-logo">
        <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo $footer_logo; ?>" alt="<?php bloginfo('name'); ?>"></a>
        <div class="footer-badges" style="display: flex; flex-direction: row; gap: 10px;">
        <?php if ( have_rows('footer_badges', 'option') ) : ?>
          <?php while ( have_rows('footer_badges', 'option') ) : the_row(); 
            $footer_badge = get_sub_field('footer_badge'); // URL or array

            // Support either return format
            if ( is_array($footer_badge) && isset($footer_badge['url']) ) {
              $footer_badge_url = $footer_badge['url'];
              $footer_badge_alt = !empty($footer_badge['alt']) ? $footer_badge['alt'] : get_bloginfo('name');
            } else {
              $footer_badge_url = $footer_badge;
              $footer_badge_alt = get_bloginfo('name');
            }

            if ( empty($footer_badge_url) ) continue;
          ?>
            <img src="<?php echo esc_url($footer_badge_url); ?>"
            alt="<?php echo esc_attr($footer_badge_alt); ?>"
            class="footer-badge">
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
    <div class="small-12 medium-4 medium-offset-1 large-offset-0 large-3 columns">   
      <?php
      if (has_nav_menu('footer_navigation_1')) :
      wp_nav_menu(['theme_location' => 'footer_navigation_1', 'depth' => 2, 'menu_class' => 'footer-menu' ]); 
      endif;
      ?>
    </div>
    <div class="small-12 medium-4 medium-offset-1 large-offset-0 large-3 columns footer-contact">   
      <?php
      echo get_field( 'footer_contact_info', 'option' );
      ?>
    </div>
    <div class="small-12 large-2 columns footer-cta"> 
      
      <?php if( $button ): ?>
        <a href="<?php echo esc_url( $button['url'] ); ?>" class="button footer-cta-button" target="<?php echo esc_attr( $button['target'] ); ?>">
          <?php echo esc_html( $button['title'] ); ?>
        </a>
      <?php endif; ?>

      <?php if( $linkedin_url ): ?>
        <a href="<?php $linkedin_url; ?>" class="linkedin-link" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="28" viewBox="0 0 25 28" fill="none">
            <path d="M3.57143 1.75C1.60156 1.75 0 3.31953 0 5.25V22.75C0 24.6805 1.60156 26.25 3.57143 26.25H21.4286C23.3984 26.25 25 24.6805 25 22.75V5.25C25 3.31953 23.3984 1.75 21.4286 1.75H3.57143ZM3.85045 11.0578H7.56138V22.75H3.85045V11.0578ZM7.85156 7.35547C7.85156 7.91387 7.62521 8.44941 7.2223 8.84426C6.81939 9.23911 6.27293 9.46094 5.70312 9.46094C5.13332 9.46094 4.58686 9.23911 4.18395 8.84426C3.78104 8.44941 3.55469 7.91387 3.55469 7.35547C3.55469 6.79706 3.78104 6.26153 4.18395 5.86668C4.58686 5.47183 5.13332 5.25 5.70312 5.25C6.27293 5.25 6.81939 5.47183 7.2223 5.86668C7.62521 6.26153 7.85156 6.79706 7.85156 7.35547ZM17.74 22.75V17.0625C17.74 15.7063 17.7121 13.9617 15.8147 13.9617C13.8839 13.9617 13.5882 15.4383 13.5882 16.9641V22.75H9.88281V11.0578H13.4375V12.6547H13.4877C13.9844 11.7359 15.1953 10.768 16.9978 10.768C20.7478 10.768 21.4453 13.1906 21.4453 16.3406V22.75H17.74Z" fill="#31969E"/>
          </svg>
          Connect with Us
        </a>
      <?php endif; ?>
      
      
    </div>
    <div class="small-12 large-3 columns">
      
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