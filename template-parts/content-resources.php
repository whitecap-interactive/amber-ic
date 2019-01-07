<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amber-ic
 */

?>

<?php 
	
	$url1 = rwmb_meta('amberic_url');
	$url2 = rwmb_meta('amberic_url2');

	//if ($url1!='') { echo '<p>URL1 = ' . $url1 . '</p>'; }
	//if ($url2!='') { echo '<p>URL2 = ' . $url2 . '</p>'; }

	$files = rwmb_meta( 'amberic_pdf' );


?>

<div class="resource-card">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    
		<div class="resource-thumb">
		    <?php if ( has_post_thumbnail() ) : ?>
		        <?php the_post_thumbnail(); ?>
		    <?php endif; ?>
		</div>
		<div class="resource-summary">
			<h6><?php echo the_title(); ?></h6>
			<p><?php the_excerpt(); ?></p>
			<?php 
				if ($files!=null) {
					foreach ( $files as $file ) { 
				?>
	    			<a class="amberic-button" href="<?php echo $file['url']; ?>" target="_blank">View the Resource</a>
			<?php } } 
				if ($url1!='') { ?>
					<a class="amberic-button" href="<?php echo $url1 ?>" target="_blank">View the Resource</a>
			<?php } 
				if ($url2!='') { ?>
					<a class="amberic-button" href="<?php echo $url2 ?>" target="_blank">View the Resource</a>
			<?php } ?>

		</div>
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>