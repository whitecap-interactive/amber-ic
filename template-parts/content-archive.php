<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amber-ic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="flex-container">
    	<div class="archive-thumb">
		    <?php if ( has_post_thumbnail() ) : ?>
		        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		    <?php endif; ?>
		</div>
		<div class="archive-summary">
			<h4><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h4>
			<?php the_author(); ?> | <?php echo the_date(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
