<?php

add_filter('manage_edit-tcflexslider_columns', 'add_new_tcflexslider_columns');
function add_new_tcflexslider_columns($tcflexslider_columns) {


  $new_columns= array(
    'cb' => '<input type="checkbox" />',
    'title' => __( 'Title' ),
    'featured_image' => __( 'Slider Images' ),
    'author' => __( 'Author' ),
    'date' => __( 'Date' )
  );


    return $new_columns;
}

add_action('manage_tcflexslider_posts_custom_column', 'manage_tcflexslider_columns', 10, 2);
function get_tc_slider_img($post_ID)
{
    $tc_slider_img_id = get_post_thumbnail_id($post_ID);
    return $tc_slider_img_url = wp_get_attachment_image_src($tc_slider_img_id, array(40,40), true);
}

function manage_tcflexslider_columns( $column,$post_ID) {
  $lider_img=get_tc_slider_img($post_ID);
    switch ( $column ) {
	case 'featured_image' :
		global $post;
		$slug = '' ;
		$slug = $post->ID;
    $featured_image ='<img src="' . $lider_img[0] . '"/>';
    echo $featured_image;
    break;
    }
}


 ?>
