<?php $c1_valign = get_sub_field('vertical_alignment_col_1'); ?>
<?php $c2_valign = get_sub_field('vertical_alignment_col_2'); ?>
<?php $c_gap = get_sub_field('column_gap'); ?>
<?php $c_size = get_sub_field('column_width'); ?>


<?php


$c1_size = "6";
$c2_size = "6";

if( $c_size == "30-70" ){
  $c1_size = "3";
  $c2_size = "9";

}else if($c_size == "40-60"){
  $c1_size = "5";
  $c2_size = "7";

}else if($c_size == "50-50"){
  $c1_size = "6";
  $c2_size = "6";

}else if($c_size == "60-40"){
  $c1_size = "7";
  $c2_size = "5";

}else if($c_size == "70-30"){
  $c1_size = "6";
  $c2_size = "3";

}else{
  $c1_size = "6";
  $c2_size = "6";
}

?>



<div class="fc-section-columns column-gap--<?php echo $c_gap;?>">
  <?php get_template_part('flexible/section_header'); ?>  
  <div class="row" data-equalizer>

      <div class="small-12 medium-<?php echo $c1_size;?> columns column-align--<?php echo $c1_valign;?>">
        <div class="content content-columns" data-equalizer-watch>
          <?php echo get_sub_field('column_1'); ?>
        </div>
      </div>

      <div class="small-12 medium-<?php echo $c2_size;?> columns column-align--<?php echo $c2_valign;?>">
        <div class="content content-columns" data-equalizer-watch>
          <?php echo get_sub_field('column_2'); ?>
        </div>
      </div>

  </div>
</div>    