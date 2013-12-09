<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="Gradual Studio" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/extra/bootstrap.min.css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/jquery-1.8.3.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/jquery.cycle.all.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/extra/superfish.js"></script>

<!--[if IE]>
			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie.css" />
<![endif]-->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
    <header class="row">
    
    	<div id="logo" class="col-lg-2">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>
		
		
		<div class="col-md-12 col-lg-10">
			<div class="close-menu"><span class="glyphicon glyphicon-th-list"></span><?php _e('Main Menu', 'wbt'); ?></div>
				<nav class="navbar navbar-inverse" role="navigation">
					<?php /*  Main Menu  */ ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'sf-menu nav navbar-nav' ) ); ?>
					<form class="navbar-form navbar-right" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					      <div class="form-group">
					        <input id="s" type="text" value="" name="s" class="form-control" placeholder="Search">
					      </div>
					      <button id="searchsubmit" type="submit" value="Search" class="submit btn btn-default">Submit</button>
				    </form>
				</nav><!-- .navbar -->
		</div>
	</header>
	
		<?php if ( !is_front_page() ) {
			echo '<div class="row">';
			echo '<div class="col-lg-12">';
			wbt_breadcrumb();
			echo '</div>';
			echo '</div>';
			echo '<div class="row main">';
		} ?>
	