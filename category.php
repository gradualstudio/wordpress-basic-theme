<?php
/**
 * The template for displaying Category Archive pages.
 *
 */

get_header(); ?>
<section class="col-sm-9 col-lg-9">

				<h1><?php
					printf( __( 'Category Archives: %s', 'wbt' ), '' . single_cat_title( '', false ) . '' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
				
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>