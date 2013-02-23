<?php
/*
 * Error 404.
 */

get_header(); ?>



<h1><?php _e( 'Not Found', 'wbt' ); ?></h1>
<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wbt' ); ?></p>
<?php get_search_form(); ?>


<?php get_footer(); ?>