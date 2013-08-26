<?php
/**
 * Template Name: Projects
 *
**/

get_header(); ?>
<section class="row">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
				<h1 class="col-lg-12"><?php the_title(); ?></h1>
				<?php the_content(); ?>
<?php endwhile; ?>

</section>
<section class="row">
    <?php $project = new WP_Query( array ( 'post_type' => 'project', 'orderby' => 'menu_order', 'order' => 'ASC'));  ?>
    <?php if ($project->have_posts()) :  while ($project->have_posts()) : $project->the_post();  ?>
        

		      	        <?php /* Get Featured Image Url */
						$imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), array(270,270) );
						$imageURL = $imageArray[0];
						?>
	      <article class="project col-xs-12 col-sm-6 col-lg-4">
	      		
	      		<?php if ( has_post_thumbnail() ) { ?>
		      		<a class="thumbnail fx-scale" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo $imageURL; ?>)">
			      			<?php //the_post_thumbnail(array(300,300)); ?>
			      	</a>
		      	<?php } ?> 
	      		<div class="caption">
		      		<h2><?php the_title(); ?></h2>
		            <p class="txt">
			            <?php the_excerpt(); ?>
		            </p>
		            <a class="btn btn-default" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php _e('View', 'wbt'); ?></a>
	      		</div>

	       </article>
	       
        <?php endwhile; // Fin del while de Loop. ?>
      
    <?php endif;  // Final del Loop. ?> 
	
	 <?php wp_reset_query(); ?> 
	 
</section>

<?php get_footer(); ?>