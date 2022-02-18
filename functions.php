<?php

// load parent and child style sheet
function twentyfifteen_child_enqueue_styles()
{

	$parent_style = 'parent-style';

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style),
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'twentyfifteen_child_enqueue_styles');

//action to add meta data to head
function twentyfifteen_child_add_meta_data()
{
?>
  <meta name="keywords" content="Tafe, Wordpress, Child Theme">
<?php
}
add_action('wp_head', 'twentyfifteen_child_add_meta_data');