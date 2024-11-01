<?php

function tc_flexslider_trigger(){
?>

<script type="text/javascript">

jQuery(document).ready(function(){

jQuery('.flexslider').flexslider({
  animation: "slide"
});

});

</script>

<?php
}
add_action('wp_footer','tc_flexslider_trigger');
// Add Shortcode
function tc_tcflexslider_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'posts' => "-1",
			'order' => '',
			'orderby' => '',
			'title' => 'yes',
		), $atts )
	);


	$tc_view ='<div class="flexslider">';

  	$tc_view.='<ul class="slides">';

	query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts, 'post_type' => 'tcflexslider'));
		if (have_posts()) :
			while (have_posts()) : the_post();
      $tc_view.='<li>';

           if ( has_post_thumbnail() ) {

          $tc_view.= the_post_thumbnail('slider');

          }

      $tc_view.='</li>';
			endwhile;
		endif;
	$tc_view.='</ul> </div>';

	wp_reset_query();

	return $tc_view;
}
add_shortcode('tc-flexslider', 'tc_tcflexslider_shortcode' );

 ?>
