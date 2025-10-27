<?php $c1_valign = get_sub_field('vertical_alignment_col_1'); ?>
<?php $c2_valign = get_sub_field('vertical_alignment_col_2'); ?>
<?php $c_gap = get_sub_field('column_gap'); ?>

<div class="fc-section-columns column-gap--<?php echo $c_gap;?>">
  <?php get_template_part('flexible/section_header'); ?>  
  <div class="row" data-equalizer>

      <div class="small-12 medium-6 columns column-align--<?php echo $c1_valign;?>">
        <div class="content content-columns" data-equalizer-watch>
          <?php echo get_sub_field('column_1'); ?>
        </div>
      </div>

      <div class="small-12 medium-6 columns column-align--<?php echo $c2_valign;?>">
        <div class="content content-columns" data-equalizer-watch>
          <?php echo get_sub_field('column_2'); ?>
        </div>
      </div>

  </div>
</div>    