<?php
/**
 * Generates search form
 * Use <?php get_search_form(); ?> in your theme or copy and paste this form.
 *
 */
?>
<form class="form-inline" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
		<input id="s" type="text" value="" name="s" class="form-control" placeholder="Search">
	</div>
	<button id="searchsubmit" type="submit" value="Search" class="submit btn btn-primary">Submit</button>
</form>