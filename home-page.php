<?php
/*
 * Template Name: Home
 *
 * Custom Home Page
 */

get_header(); ?>

<div id="wrapper-slider" class="clearfix clear">
	
    <div id="slider-home" class="slider clearfix">
        <div class="slide s1" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/slider/slide_1.jpg)">
	        <div class="content span14">
	        	<p class="font-xxl"><strong>Wordpress</strong> Basic <strong>Theme</strong></p>
	        	<p class="font-l no-margin"><em>A fully integrated wordpress basic theme with bootstrap, js libraries and personalized css/grids.</em></p>
	        	</div>
        </div>
       	<div class="slide s2" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/slider/slide_2.jpg)">
	       	<div class="content span14">
	       		<p class="font-xxl">by <strong>Atypical Studio</strong></p>
	       		<p class="font-l no-margin"><em>www.atypical-studio.com</em></p>
	       	</div>
       	</div>
    </div>
</div>

<div class="slider-controls clearfix clear">
    <div class="controlNav pagination"></div>
    <div class="prev btn">Prev</div>
    <div class="next btn">Next</div>
</div>

<h1 class="title">Wordpress Basic Theme</h1>
					<p class="lead">Lorem <strong>ipsum dolor sit</strong> amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
<section class="clearfix">

<?php while ( have_posts() ) : the_post(); // Home Content   ?>
	<h3>WELCOME TO WBT</h3>
	<p>Custom Wordpress Home Content:</p>

<?php the_content(); ?>

<?php endwhile; // End the loop. Whew. ?>
				
					
					

					<h2>Simple & Responsive 16 Columns Grid System</h2>
					<div class="clearfix">
						<div class="span5"><div class="gut">5 columns</div></div>
						<div class="span11"><div class="gut">11 columns</div></div>
					</div>
					<div class="clearfix">
						<div class="span2">2 columns</div>
						<div class="span6"><div class="gut">6 columns</div></div>
						<div class="span8">8 columns</div>
					</div>
					<div class="clearfix">
						<div class="span8">8 columns</div>
						<div class="span8">8 columns</div>
					</div>
					<div class="clearfix">
						<div class="span4">4 columns</div>
						<div class="span4 offset2">4 columns</div>
						<div class="span4 offset2">4 columns</div>
					</div>


				
</section>

<section class="clearfix">
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


</section>



<?php get_footer(); ?>