<?php
/*
 * Error 404.
 */

get_header(); ?>

<section class="col-sm-12 col-lg-12">

<h1><?php _e( 'Not Found', 'wbt' ); ?></h1>
<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wbt' ); ?></p>
<p>
	<?php get_search_form(); ?>
</p>

</section>
<?php get_footer(); ?>