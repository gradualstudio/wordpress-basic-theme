<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>
<section class="span12">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'wbt' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'wbt' ) . '' ); ?>

					<h1><?php the_title(); ?></h1>

						<?php wbt_posted_on(); ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ) ?>
							<h2><?php printf( esc_attr__( 'About %s', 'wbt' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'wbt' ), get_the_author() ); ?>
							</a>
<?php endif; ?>


				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'wbt' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'wbt' ) . '' ); ?>

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>