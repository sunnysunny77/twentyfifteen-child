<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if (has_nav_menu('primary') || has_nav_menu('social') || is_active_sidebar('sidebar-1')) : ?>
	<div id="secondary" class="secondary">

		<?php if (has_nav_menu('primary')) : ?>
			<nav id="site-navigation" class="main-navigation">
				<h2>Nav</h2>
				<?php
				// Primary navigation menu.
				wp_nav_menu(
					array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
						'before'               => '<h2>',
						'after'                => '</h2>',
					)
				);
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

	</div><!-- .secondary -->

<?php endif; ?>