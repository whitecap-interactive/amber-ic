<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amber-ic
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<div class="home-container">
				<?php
				while ( have_posts() ) :
					the_post();

					the_content();


				endwhile; // End of the loop.
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
