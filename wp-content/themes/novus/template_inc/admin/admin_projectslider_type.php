<?php

add_action('init', 'projectslider_register');



/**

 * portfolio_register()

 * 

 * @return

 */

function projectslider_register() 

{



	$labels = array(

		'name' => _x('Project Slider', 'post type general name', 'themeple'),

		'singular_name' => _x('Project Slider Entry', 'post type singular name', 'themeple'),

		'add_new' => _x('Add New', 'gallery', 'themeple'),

		'add_new_item' => __('Add New Slide', 'themeple'),

		'edit_item' => __('Edit Slide', 'themeple'),

		'new_item' => __('New Slide', 'themeple'),

		'view_item' => __('View Slides', 'themeple'),

		'search_items' => __('Search Slides', 'themeple'),

		'not_found' =>  __('No Slides Entries found', 'themeple'),

		'not_found_in_trash' => __('No Slides found in Trash', 'themeple'), 

		'parent_item_colon' => ''

	);

	

	$slugRule = "projectslider";

	

	$args = array(

		'labels' => $labels,

		'public' => true,

		'show_ui' => true,

		'capability_type' => 'post',

		'hierarchical' => false,

		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),

		'query_var' => true,

		'show_in_nav_menus'=> false,

		'supports' => array('title','thumbnail','editor')

	);

	

	

	

	register_post_type( 'projectslide' , $args );

	

	

	register_taxonomy("projectslide_entries", 

		array("projectslide"), 

		array(	"hierarchical" => true, 

		"label" => "Project Slides Categories", 

		"singular_label" => "Slide Categories", 

		"rewrite" => true,

		"query_var" => true

	));  

}



add_filter("manage_edit-gallery_columns", "prod_edit_project_columns");

add_action("manage_posts_custom_column",  "prod_custom_project_columns");



/**

 * prod_edit_columns()

 * 

 * @param mixed $columns

 * @return

 */

function prod_edit_project_columns($columns)

{

	$newcolumns = array(

		"cb" => "<input type=\"checkbox\" />",

		

		"title" => "Title",

		"projectslide_entries" => "Categories"

	);

	

	$columns= array_merge($newcolumns, $columns);

	

	return $columns;

}



/**

 * prod_custom_columns()

 * 

 * @param mixed $column

 * @return

 */

function prod_custom_project_columns($column)

{

	global $post;

	switch ($column)

	{

		

	

		case "description":

		

		break;

		case "price":

		

		break;

		case "projectslide_entries":

		echo get_the_term_list($post->ID, 'projectslide_entries', '', ', ','');

		break;

	}

}

?>