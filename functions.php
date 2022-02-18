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


//filter to add author to singular post
function twentyfifteen_child_singular_author($content)
{

	if (in_the_loop() && is_main_query() && is_singular()) {
		$new_content = '<p id="author">Author: Daniel Costello</p>';
		$content = $content . $new_content;
		return $content;
	}

	return $content;
}
add_filter('the_content', 'twentyfifteen_child_singular_author', 1);
