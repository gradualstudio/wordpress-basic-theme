<?php
/**
 * Template Name: Full Width
 *
 * A custom page template without sidebar.
**/
get_header(); ?>
<section class="clear">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
						<h1><?php the_title(); ?></h1>
						

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</section>

<?php get_footer(); ?>