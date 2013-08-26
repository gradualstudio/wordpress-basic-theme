<?php
/**
 * This template will be used to display page content.
 */
get_header(); ?>
<section class="col-sm-9 col-lg-9">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


						<h1><?php the_title(); ?></h1>		

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>