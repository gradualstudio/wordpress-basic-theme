<?php
/**
 * The template for displaying Tag Archive pages.
 *
 */

get_header(); ?>
<section class="col-sm-9 col-lg-9">

				<h1><?php
					printf( __( 'Tag Archives: %s', 'wbt' ), '' . single_tag_title( '', false ) . '' );
				?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>