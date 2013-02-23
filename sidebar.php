<aside id="sidebar" class="span4">

<?php
	// Widget Area.
	if ( is_active_sidebar( 'widget-area' ) ) : ?>

			<ul class="widget-area">
				<?php dynamic_sidebar( 'widget-area' ); ?>
			</ul>

<?php endif; ?>
			

</aside> <!-- aside -->