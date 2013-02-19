<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="Atypical Studio" />

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.jpg" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<script src="http://code.jquery.com/jquery-latest.js"></script>

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
    
    <header class="grey row">
     
     	<div id="logo" class="span3">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>

		
		<nav id="access" role="navigation" class="span13 h_list">
			  	 <?php /*  MENU
		Menu de navegación creado a partir de un elemento de menu. wp_nav_menu inserta un menu personalizado  */ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        
           <?php /* Menu de navegación secundario creado a partir de un elemento de menu.
        wp_nav_menu( array( 'menu' => 'Nombre de Menu que mostrar', 'container_class' => 'Class del contenedor', 'theme_location' => 'secondary' ) ); */?>
        
        
          <?php /* Condicionales para usuarios con o sin login
		if ( is_user_logged_in() ) {
			 wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) );
		} else {
			 wp_nav_menu( array( 'theme_location' => 'logged-out-menu' ) ); 
	    }*/ ?>
		</nav><!-- #access -->
	</header>
	
	<div id="content">