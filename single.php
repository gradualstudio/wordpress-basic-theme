<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>
<section class="col-sm-9 col-lg-9">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					
					<header class="cabecera">
						<h1><?php the_title(); ?></h1>
						<p clas="date"><?php wbt_posted_on(); ?></p>
					</header>
					
					<div class="post-content">
						<?php the_content(); ?>
					</div>
					
					<p><?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'wbt' ), 'after' => '' ) ); ?></p>
					<p><span class="glyphicon glyphicon-tags"></span><?php the_tags('',' | '); ?></p>
					
					<?php if ( get_the_author_meta( 'description' ) ) : // Show a bio on their entries  ?>				
						<footer class="author-info">
						
							<div class="author-avatar col-lg-3">
							<?php
							if (function_exists('get_wp_user_avatar')){
								echo get_wp_user_avatar('', 120, '');
							} else{
								 echo get_avatar('', 120, '');
							} ?>
							</div>
							
							<div class="author-bio col-lg-9">
							<h2><?php the_author(); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
							
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'Other post by %s', 'wbt' ), get_the_author() ); ?>
							</a>
							</div>
							<div class="clearfix"></div>
						</footer>
					
					<?php endif; ?>

					<div class="post-links">
						<?php //previous_post_link( '%link', '%title'); ?><?php //next_post_link( '%link', '%title'); ?>
					</div>
				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>