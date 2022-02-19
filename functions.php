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

// plug theme setup to remover comment-list html 5 support
if (!function_exists('twentyfifteen_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Fifteen 1.0
	 */
	function twentyfifteen_setup()
	{

		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
		 * If you're building a theme based on twentyfifteen, use a find and replace
		 * to change 'twentyfifteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain('twentyfifteen');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See: https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(825, 510, true);

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'twentyfifteen'),
				'social'  => __('Social Links Menu', 'twentyfifteen'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for custom logo.
		 *
		 * @since Twenty Fifteen 1.5
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 248,
				'width'       => 248,
				'flex-height' => true,
			)
		);

		$color_scheme  = twentyfifteen_get_color_scheme();
		$default_color = trim($color_scheme[0], '#');

		// Setup the WordPress core custom background feature.

		add_theme_support(
			'custom-background',
			/**
			 * Filters Twenty Fifteen custom-background support arguments.
			 *
			 * @since Twenty Fifteen 1.0
			 *
			 * @param array $args {
			 *     An array of custom-background support arguments.
			 *
			 *     @type string $default-color      Default color of the background.
			 *     @type string $default-attachment Default attachment of the background.
			 * }
			 */
			apply_filters(
				'twentyfifteen_custom_background_args',
				array(
					'default-color'      => $default_color,
					'default-attachment' => 'fixed',
				)
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url()));

		// Load regular editor styles into the new block-based editor.
		add_theme_support('editor-styles');

		// Load default block styles.
		add_theme_support('wp-block-styles');

		// Add support for responsive embeds.
		add_theme_support('responsive-embeds');

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __('Dark Gray', 'twentyfifteen'),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __('Light Gray', 'twentyfifteen'),
					'slug'  => 'light-gray',
					'color' => '#f1f1f1',
				),
				array(
					'name'  => __('White', 'twentyfifteen'),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __('Yellow', 'twentyfifteen'),
					'slug'  => 'yellow',
					'color' => '#f4ca16',
				),
				array(
					'name'  => __('Dark Brown', 'twentyfifteen'),
					'slug'  => 'dark-brown',
					'color' => '#352712',
				),
				array(
					'name'  => __('Medium Pink', 'twentyfifteen'),
					'slug'  => 'medium-pink',
					'color' => '#e53b51',
				),
				array(
					'name'  => __('Light Pink', 'twentyfifteen'),
					'slug'  => 'light-pink',
					'color' => '#ffe5d1',
				),
				array(
					'name'  => __('Dark Purple', 'twentyfifteen'),
					'slug'  => 'dark-purple',
					'color' => '#2e2256',
				),
				array(
					'name'  => __('Purple', 'twentyfifteen'),
					'slug'  => 'purple',
					'color' => '#674970',
				),
				array(
					'name'  => __('Blue Gray', 'twentyfifteen'),
					'slug'  => 'blue-gray',
					'color' => '#22313f',
				),
				array(
					'name'  => __('Bright Blue', 'twentyfifteen'),
					'slug'  => 'bright-blue',
					'color' => '#55c3dc',
				),
				array(
					'name'  => __('Light Blue', 'twentyfifteen'),
					'slug'  => 'light-blue',
					'color' => '#e9f2f9',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support('customize-selective-refresh-widgets');
	}
endif; // twentyfifteen_setup()
add_action('after_setup_theme', 'twentyfifteen_setup');

//edit custom logo
if (!function_exists('twentyfifteen_the_custom_logo')) {

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
