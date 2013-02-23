<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
**/
get_header(); ?>
<section class="row">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php if ( is_front_page() ) { ?>
						<h2><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1><?php the_title(); ?></h1>
					<?php } ?>			

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</section>

<?php get_footer(); ?>