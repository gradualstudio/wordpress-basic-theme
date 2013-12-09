<?php
/*
 * Template Name: Home
 *
 * Custom Home Page
 */

get_header(); ?>

<div class="row">
	<div id="wrapper-slider" class="col-lg-12 box-shadow">
		
	    <div id="slider-home" class="slider">
	    <?php $post_number = 1; ?>
	    
	     <?php $slide = new WP_Query( array ( 'post_type' => 'slides', 'orderby' => 'menu_order', 'order' => 'ASC'));  ?>
	    <?php if ($slide->have_posts()) :  while ($slide->have_posts()) : $slide->the_post();  ?>
	        
			      	        <?php /* Get Featured Image Url */
							$imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full' );
							$imageURL = $imageArray[0];
							?>
		      <div class="slide s<?php echo $post_number ?>" style="background-image: url(<?php echo $imageURL; ?>">
		        <div class="content">
		        	<h2 class="font-xxl"><?php the_title(); ?></h2>
		        	<p class="font-l"><?php the_content(); ?></p>
		        </div>
		      </div>
		      <?php $post_number++; ?>
	        <?php endwhile; // Fin del while de Loop. ?>
	        
	    <?php endif;  // Final del Loop. ?> 
		
		 <?php wp_reset_query(); ?> 
		 
	    </div>
	</div>
</div>

<div class="slider-controls row">
	<div class="col-lg-12">
	    <ul class="controlNav pagination"></ul>
	    <div class="clearfix"></div>
	    <div class="prev btn btn-default">Prev</div>
	    <div class="next btn btn-default">Next</div>
	</div>
</div>


<section class="row">
	<div class="col-lg-12">
		<h1 class="title">Wordpress Basic Theme</h1>
		<p class="lead">Lorem <strong>ipsum dolor sit</strong> amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		</p>
	
		<?php while ( have_posts() ) : the_post(); // Home Content   ?>
			<p>Custom Wordpress Home Content:</p>
		<?php the_content(); ?>
	
		<?php endwhile; // End the loop. Whew. ?>
	</div>
</section>				

<section class="row">
	<div class="col-lg-12">		
		<h2>Twitter Bootstrap 3 Grid System</h2>
		
		<div class="row">
			<div class="col-sm-4 col-lg-6 grey">Column 1</div>
			<div class="col-sm-8 col-lg-6 grey">Column 2</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-4 col-lg-6 coral">Column 1</div>
			<div class="col-sm-8 col-lg-2 coral">Column 2</div>
			<div class="col-sm-12 col-lg-4 coral">Column 3</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-4 col-lg-5 grey">Column 1</div>
			<div class="col-12 col-lg-7 grey">Column 2</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-12 col-lg-4 coral">Column 1</div>
			<div class="col-12 col-lg-4 coral">Column 2</div>
			<div class="col-12 col-lg-4 coral">Column 3</div>
		</div>
	</div>
</section>

<section class="row">
	<div class="col-lg-12">
		<h2>Font Size Helpers</h2>
		
			<p class="font-s">Font Size S</p>
			<p class="font-m">Font Size M</p>
			<p class="font-l">Font Size L</p>
			<p class="font-xl">Font Size XL</p>
			<p class="font-xxl">Font Size XXL</p>
			
			
		<h2>Font Weight Helpers</h2>
			
			<p class="font-normal">Font Normal</p>
			<p class="font-lighter">Font Lighter</p>
			<p class="font-bold">Font Bold</p>
			<p class="font-bolder">Font Bolder</p>
	</div>
</section>

<?php get_footer(); ?>