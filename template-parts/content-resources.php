<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amber-ic
 */

?>
<div class="resource-card">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    	<div class="resource-thumb">
		    <?php if ( has_post_thumbnail() ) : ?>
		        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		    <?php endif; ?>
		</div>
		<div class="resource-summary">
			<h6><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h6>
			<p><?php the_excerpt(); ?></p>
		</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
</div>