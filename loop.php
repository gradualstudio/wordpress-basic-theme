
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<?php next_posts_link( __( '&larr; Older posts', 'wbt' ) ); ?>
		<?php previous_posts_link( __( 'Newer posts &rarr;', 'wbt' ) ); ?>
<?php endif; ?>



<?php
	/* 
	 * Start the Loop.
	 */ ?>
	 
<?php while ( have_posts() ) : the_post(); ?>

<article class="clearfix">

		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<?php the_excerpt(); ?>
			<?php the_date(); ?>
	<?php else : ?>
			<?php the_content( __( 'Continue reading &rarr;', 'wbt' ) ); ?>
		
	<?php endif; ?>

</article>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<?php next_posts_link( __( '&larr; Older posts', 'wbt' ) ); ?>
				<?php previous_posts_link( __( 'Newer posts &rarr;', 'wbt' ) ); ?>
<?php endif; ?>