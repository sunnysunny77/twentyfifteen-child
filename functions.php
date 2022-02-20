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

//remove html 5 comment list and widget after parent at 11
function twentyfifteen_the_remove_setup()
{

	remove_action( 'widgets_init', 'twentyfifteen_widgets_init' ); 
	remove_theme_support('html5');
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);
}
add_action('after_setup_theme', 'twentyfifteen_the_remove_setup', 11);

//edit custom logo
function twentyfifteen_the_custom_logo()
{
	if (function_exists('the_custom_logo')) {
?>
		<label>
			<?php
			the_custom_logo();
			?>
			The Author</label>
	<?php
	}
}

//action to add meta data to head
function twentyfifteen_child_add_meta_data()
{

	?>
	<meta name="keywords" content="Tafe, Wordpress, Child Theme">
<?php
}
add_action('wp_head', 'twentyfifteen_child_add_meta_data');

//widget initialization
function twentyfifteen_child_widget_init()
{
	register_sidebar(array(
		'name' => 'Footer Wiget',
		'id' => 'footer_widget',
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'twentyfifteen_child_widget_init');

//filter to add author to singular post
function twentyfifteen_child_singular_author($content)
{

	if (in_the_loop() && is_main_query() && is_singular('post')) {
		$new_content = '<p>Author: Daniel Costello</p>';
		$content = $content . $new_content;
		return $content;
	}
	return $content;
}
add_filter('the_content', 'twentyfifteen_child_singular_author', 1);
