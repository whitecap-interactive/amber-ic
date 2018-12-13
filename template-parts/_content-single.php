<?php
/**
 * @package amber-ic
 */
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php the_author(); ?> | <?php the_date(); ?>
		</div><!-- .entry-meta -->
        <?php if (has_post_thumbnail() ): ?>
            <div class="post-image"><?php the_post_thumbnail(); ?></div>
        <?php endif ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
        
	</div><!-- .entry-content -->

	<footer class="entry-footer">


		<?php edit_post_link( __( 'Edit', 'tribaldb' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
