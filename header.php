<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="Atypical Studio" />

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/custom.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.5.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/my.scripts.js"></script>

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

    <div id="wrapper">
    
    <header class="clearfix">
     
     	<div id="logo" class="span3">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>

		<div class="close-menu"><span class="icon-chevron-down"></span>menu</div>
		<nav id="access" role="navigation" class="span13 h-list">
		<?php /*  Main Menu  */ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		
		</nav><!-- #access -->
		
		
		<?php wbt_breadcrumb(); ?>
	</header>
	
	<div id="content" class="rclearfix">