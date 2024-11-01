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

?>
<div class="flexslider">

<ul class="slides">
<?php
	query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts, 'post_type' => 'tcflexslider'));
		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
      <li>

          <?php    if ( has_post_thumbnail() ) {

            the_post_thumbnail();

            }
         ?>
         <p class="flex-caption"> <?php echo the_title(); ?> </p>
       </li>
    <?php
			endwhile;
		endif;
    ?>
   </ul> </div>
<?php
	wp_reset_query();


}
add_shortcode('tc-flexslider', 'tc_tcflexslider_shortcode' );

 ?>
