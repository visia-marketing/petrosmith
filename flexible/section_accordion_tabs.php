

<div class="fc-section-accordion-tabs">
  <?php get_template_part('flexible/section_header'); ?>

  <?php
  $tabs = get_sub_field('tabs'); 
  if( is_array($tabs) ){
    $tab_count = sizeof( $tabs );
  }else{
    return;
  }
  

  $tabs_id = 'tabs-'.rand(1000,9999);

  ?>

  <?php if( have_rows('tabs') ): ?>



    <div class="row columns "> 
    <div class="row columns">
      <ul class="tabs  <?php echo $tab_count > 4 ? 'stretch-tabs' : ''; ?>" data-tabs id="<?php echo $tabs_id;?>">
        <?php while( have_rows('tabs') ): the_row(); ?>
       
          <li class="tabs-title<?php echo (get_row_index() === 1) ? ' is-active' : ''; ?>">
            <a href="#tab-<?php echo get_row_index(); ?>_<?php echo $tabs_id;?>">
              <?php echo get_sub_field('tab_name'); ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
      <div class="tabs-content" data-tabs-content="<?php echo $tabs_id;?>">
        <?php while( have_rows('tabs') ): the_row(); ?>
          <div class="tabs-panel<?php echo (get_row_index() === 1) ? ' is-active' : ''; ?>" id="tab-<?php echo get_row_index(); ?>_<?php echo $tabs_id;?>">
            <?php if( have_rows('accordion') ): ?>
              <div class="accordion in-tabs">
                <?php while( have_rows('accordion') ): the_row(); ?>
                  <div class="accordion-item">
                    <div class="accordion-topic">
                      <h4><?php echo get_sub_field('heading');?></h4>
                      <div class="accordion-arrow">
                        <span class="accordion-open">
                          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 1C27.3888 1 35 8.61116 35 18C35 27.3888 27.3888 35 18 35C8.61116 35 1 27.3888 1 18C1 8.61116 8.61116 1 18 1Z" stroke="#062F6E" stroke-width="2"/>
                            <path d="M19.2298 16.68H25.8898V19.14H19.2298V25.8H16.7698V19.14H10.1098V16.68H16.7698V10.02H19.2298V16.68Z" fill="#062F6E"/>
                          </svg>
                        </span>
                        <span class="accordion-close">
                          <svg width="36" height="38" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 20C0 10.0589 8.05888 2 18 2C27.9411 2 36 10.0589 36 20C36 29.9411 27.9411 38 18 38C8.05888 38 0 29.9411 0 20Z" fill="#062F6E"/>
                            <path d="M23.1338 21.84H13.8538V18.64H23.1338V21.84Z" fill="white"/>
                          </svg>
                        </span>
                    
                      </div>
                    </div>
                    <div class="accordion-response"><?php echo get_sub_field('content');?></div>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    </div>
  <?php endif; ?>
</div>