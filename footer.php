<?php
/**
 * The template for displaying the footer.
 */
?><?php if ( !is_front_page() ) {
	echo '</div> <!-- .main -->';
	} ?>
	<footer class="row">
		<small><p><?php bloginfo( 'name' ); ?> | Wordpress Basic Theme by Atypical Studio | <a href="http://www.atypical-studio.com" target="_blank">www.atypical-studio.com</a></p></small>
	</footer>

		<?php wp_footer(); ?>
</div><!-- .container -->

<script src="<?php bloginfo('template_directory'); ?>/js/extra/transit.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/respond.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/my.scripts.js"></script>
</body>
</html>