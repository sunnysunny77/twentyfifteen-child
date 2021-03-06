<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

</div><!-- .site-content -->

<footer id="colophon" class="site-footer">
	<ul class="site-info">

		<?php if (dynamic_sidebar('footer_widget')) : else : endif; ?>

	</ul><!-- .site-info -->
</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>

</html>