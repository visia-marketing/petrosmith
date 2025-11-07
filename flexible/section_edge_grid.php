<?php

$grid = get_sub_field('edge_grid');
$content = get_sub_field('section_content');
?>


<div class="fc-section-columns fc-section-edge-grid column-gap--0">
  <?php get_template_part('flexible/section_header'); ?>  
  <div class="row" data-equalizer>

      <div class="small-12 large-6 columns">
        <div class="content content-columns" data-equalizer-watch>
          <?php echo $content; ?>
        </div>
      </div>

      <div class="small-12 large-6 columns">
        <div class="content edge-grid-container" data-equalizer-watch>
            

            <?php foreach( $grid as $grid_cell): ?>

                <div class="grid-cell">
                    <?php if( $grid_cell['cell_image'] ): ?>
                        <?php echo wp_get_attachment_image( $grid_cell['cell_image'], 'thumbnail' ); ?>
                    <?php endif; ?>

                    <?php if( $grid_cell['cell_title'] ): ?>
                        <span class="edge-cell-title"><?php  echo $grid_cell['cell_title']; ?></span>
                    <?php endif; ?>

                    <?php if( $grid_cell['cell_description'] ): ?>
                        <span class="edge-cell-descr"><?php  echo $grid_cell['cell_description']; ?><span>
                    <?php endif; ?>

                </div>

                

            <?php endforeach; ?>
        </div>
      </div>

  </div>
</div>    