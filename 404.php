<?php
/*
 * Error 404.
 */

get_header(); ?>

<section class="col-sm-12 col-lg-12">

<h1><?php _e( 'Not Found', 'wbt' ); ?></h1>
<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wbt' ); ?></p>
<p>
	<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
			<input id="s" type="text" value="" name="s" class="form-control" placeholder="Search">
		</div>
		<button id="searchsubmit" type="submit" value="Search" class="submit btn btn-default">Submit</button>
	</form>
</p>
</section>
<?php get_footer(); ?>