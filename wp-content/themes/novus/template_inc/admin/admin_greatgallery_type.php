<?php

add_action('init', 'gallery_register');



/**

 * portfolio_register()

 * 

 * @return

 */

function gallery_register() 

{



	$labels = array(

		'name' => _x('Great Gallery', 'post type general name', 'themeple'),

		'singular_name' => _x('Great Gallery Entry', 'post type singular name', 'themeple'),

		'add_new' => _x('Add New', 'gallery', 'themeple'),

		'add_new_item' => __('Add New Gallery Entry', 'themeple'),

		'edit_item' => __('Edit Gallery Entry', 'themeple'),

		'new_item' => __('New Gallery Entry', 'themeple'),

		'view_item' => __('View Gallery Entry', 'themeple'),

		'search_items' => __('Search Gallery Entries', 'themeple'),

		'not_found' =>  __('No Gallery Entries found', 'themeple'),

		'not_found_in_trash' => __('No Gallery Entries found in Trash', 'themeple'), 

		'parent_item_colon' => ''

	);

	

	$slugRule = "great_gallery";

	

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

	

	

	

	register_post_type( 'gallery' , $args );

	

	

	register_taxonomy("gallery_entries", 

		array("gallery"), 

		array(	"hierarchical" => true, 

		"label" => "Great Gallery Categories", 

		"singular_label" => "Gallery Categories", 

		"rewrite" => true,

		"query_var" => true

	));  

}



add_filter("manage_edit-gallery_columns", "prod_edit_gallery_columns");

add_action("manage_posts_custom_column",  "prod_custom_gallery_columns");



/**

 * prod_edit_columns()

 * 

 * @param mixed $columns

 * @return

 */

function prod_edit_gallery_columns($columns)

{

	$newcolumns = array(

		"cb" => "<input type=\"checkbox\" />",

		

		"title" => "Title",

		"gallery_entries" => "Categories"

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

function prod_custom_gallery_columns($column)

{

	global $post;

	switch ($column)

	{

		

	

		case "description":

		

		break;

		case "price":

		

		break;

		case "gallery_entries":

		echo get_the_term_list($post->ID, 'gallery_entries', '', ', ','');

		break;

	}

}

?>