<?php
/*
 * Default Home Page
 */

get_header(); ?>

<div id="wrapper-slider" class="row clearfix">
	<div id="caption" class="black span16"></div>
    <div id="slider-home" class="slider">
        <img class="slide s1" src="<?php bloginfo('template_directory'); ?>/img/slider/slide_1.jpg" alt="Slide1" />
       	<img class="slide s2" src="<?php bloginfo('template_directory'); ?>/img/slider/slide_2.jpg" alt="Slide2" />
    </div>
</div>

<div class="controlNav"></div>
<div class="next">Next</div>
<div class="prev">Prev</div>



<section class="row clearfix">
				
					<h1 class="title">WELCOME TO WBT</h1>
					<h2>Wordpress Basic Theme</h2>
					<p class="lead">Lorem <strong>ipsum dolor sit</strong> amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
					<h2>Simple & Responsive 16 Columns Grid System</h2>
					<div class="row">
						<div class="span5">5 columns</div>
						<div class="span11">11 columns</div>
					</div>
					<div class="row">
						<div class="span2">2 columns</div>
						<div class="span6">6 columns</div>
						<div class="span8">8 columns</div>
					</div>
					<div class="row">
						<div class="span8">8 columns</div>
						<div class="span8">8 columns</div>
					</div>
					<div class="row">
						<div class="span4">4 columns</div>
						<div class="span4 offset2">4 columns</div>
						<div class="span4 offset2">4 columns</div>
					</div>
				
</section>



<?php get_footer(); ?>