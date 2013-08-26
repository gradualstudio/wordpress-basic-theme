<?php
/**
 * Template Name: Blog
 *
 * Custom Blog Template using basic post type
 */

get_header(); ?>
<section class="col-sm-9 col-lg-9">

			<h1><?php the_title(); ?></h1>

<?php /************************************************************************ START LOOP.*/
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 'post_type' => 'post', 'order' => 'DESC','posts_per_page' => 2, 'post__not_in' => array(10), 'caller_get_posts' => 1, 'paged' => $paged ) ); ?>

<?php if (have_posts()) : ?>

<?php while ( have_posts() ) : the_post(); ?>
	
				
	      <article class="blog-post row">

	            <?php 	/* Get Featured Image Url */
						// $imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), array(270,210) );
						// $imageURL = $imageArray[0]; //php echo $imageURL
				?>
	            
	            <?php if ( has_post_thumbnail() ) { // check featured image
	            ?>
	            	<a href="<?php the_permalink(); ?>">
	 				<?php echo get_the_post_thumbnail($page->ID, array(200,200)); ?>
	 				</a>
				<?php } ?>
				
	
	            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	            
	            <div class="excerpt">
	           
	              <p><?php  the_excerpt();/* Resumen de Contenido*/ ?></p>
	              
	            </div>
	            <a class="btn btn-default" href="<?php the_permalink(); ?>" title="<?php _e("Read More", ""); ?>"><?php _e("Read More", ""); ?></a>
	       </article>
				
	
	<?php endwhile; ?>
	
	
	<?php if(function_exists('wp_pagenavi')) {
		
		wp_pagenavi();
		
		} else { 
	
		previous_posts_link('« Newer Entries', 0);
		next_posts_link('Older Entries »', 0); 
		
		} ?>

	 
	 <?php endif; // End Loop. ?>
						

</section>
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
	
