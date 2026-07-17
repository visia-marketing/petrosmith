<?php
$style = get_sub_field('faq_style');
$fields = get_sub_field('questions_and_answers');
$length = 0;
if( is_array($fields) ){
    $length = count($fields);
}


$faq_container_class = 'fc-faq-section';
$faq_class = '';
$faq_item_class = 'faq_item';

$question_class = 'faq_question';
$answer_class = 'faq_answer';

// FAQs always collapse into the UI Kit accordion; 'separated' keeps its spacing variant.
$faq_container_class .= ' fc-section-accordion-simple';
$faq_class .= 'accordion';
$faq_item_class .= ' accordion-item';
$question_class = 'accordion-topic';
$answer_class = 'accordion-response';
if( $style == 'separated' ){
    $faq_class .= ' separated';
}

?>

<div class="fc-section-columns <?php echo $faq_container_class;?>" id="<?php //echo $anchor;?>">
 <?php get_template_part('flexible/section_header'); ?>
  <?php if( have_rows('questions_and_answers') ): ?>
  <div class="row columns "> 
    <div class="row columns">
      <div class="<?php echo $faq_class; ?>">
      <?php while ( have_rows('questions_and_answers' ) ): the_row(); ?>
          <div class="<?php echo $faq_item_class;?>">
            <div class="<?php echo $question_class; ?>">
              <h4><?php echo get_sub_field('question');?></h4>
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
            <div class="<?php echo $answer_class; ?>"><?php echo get_sub_field('answer');?></div>
          </div>
      <?php endwhile; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            <?php while ( have_rows('questions_and_answers' ) ): the_row(); //echo get_row_index(); ?>
            
                {
                    "@type": "Question",
                    "name": "<?php echo htmlspecialchars( get_sub_field('question') ); ?>",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "<?php echo htmlspecialchars( get_sub_field('answer') ); ?>"
                    }
                }
                <?php if( $length != get_row_index()  ): ?>
                    ,
                <?php endif;?>

            <?php endwhile; ?>
        ]
}

</script>