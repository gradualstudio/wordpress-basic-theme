<?php
/**
 * The template for displaying the footer.
 */
?><?php if ( !is_front_page() ) {
	echo '</div> <!-- .main -->';
	} ?>
	<footer class="row">
		<p class="col-lg-12"><small><?php bloginfo( 'name' ); ?> | Wordpress Basic Theme by José Carlos Martínez | <a href="http://www.gradualstudio.com" target="_blank">www.gradualstudio.com</a></small></p>
	</footer>

		<?php wp_footer(); ?>
</div><!-- .container -->

<script src="<?php bloginfo('template_directory'); ?>/js/extra/transit.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/respond.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/my.scripts.js"></script>
</body>
</html>