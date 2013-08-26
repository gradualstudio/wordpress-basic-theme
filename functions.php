<?php
/*
 * Functions.
 */
 
 add_action( 'after_setup_theme', 'wbt_setup' );
function wbt_setup() {

		/* Add theme support for automatic feed links. */
	add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'wbt' ) );

		// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
		// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	
		// Add excerpt support
	add_post_type_support( 'page', 'excerpt' );
	
		// Remove auto html
	remove_filter( 'the_excerpt', 'wpautop' );
	remove_filter( 'the_content', 'wpautop' );
}

function wbt_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'wbt' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'wbt' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'wbt' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'wbt_filter_wp_title', 10, 2 );

/*
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function wbt_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wbt_page_menu_args' );

/*
 * Sets the post excerpt length to 40 characters.
 */
function wbt_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wbt_excerpt_length' );

/*
 * Sets special limit to content() and excerpt(). Example: content(20); select 20 words to display.
 */

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

/*
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 */
function wbt_widgets_init() {
	// Widget Area, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Widget Area', 'wbt' ),
		'id' => 'widget-area',
		'description' => __( 'My first widget area', 'wbt' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/* Register sidebars by running wbt_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'wbt_widgets_init' );

/*
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function wbt_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'wbt_remove_recent_comments_style' );


if ( ! function_exists( 'wbt_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 */
function wbt_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'wbt' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'wbt' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s', 'wbt' ),
							sprintf( '%s', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'wbt' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'wbt' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wbt' ); ?></em>
					<br />
				<?php endif; ?>

			</header>

			<div class="comment-content border-radius"><?php comment_text(); ?></div>

			<div class="reply btn btn-default">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'wbt' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for wbt_comment()


if ( ! function_exists( 'wbt_posted_on' ) ) :
/*
 * Prints HTML with meta information for the current post—date/time and author.
 */
function wbt_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wbt' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;


// remove junk
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link ');
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );




function wbt_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'wbt' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

/*
 * Breadcrumb.
 */

function wbt_breadcrumb() {

	global $post; 

        echo '<ul class="breadcrumb row">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li>";
        
        if (is_single()) {
        		if ('project' == get_post_type()){
        		$id_template = get_page_ID_by_page_template('projects-page.php');
        		
            		echo '<li class="project"><a href="';
            		echo get_permalink($id_template);
            		echo '" title="';
            		echo get_the_title($id_template);
            		echo '">';
            		echo get_the_title($id_template);
            		echo '</a></li>';
            	}
            	if ('post' == get_post_type()){
        		$id_template = get_page_ID_by_page_template('blog-page.php');
        		
            		echo '<li class="blog"><a href="';
            		echo get_permalink($id_template);
            		echo '" title="';
            		echo get_the_title($id_template);
            		echo '">';
            		echo get_the_title($id_template);
            		echo '</a></li>';
            	}

            	if (is_category()){
	        		echo '<li class="category">';
	        		echo the_category('', '', '');
	        		echo the_terms( $post->ID, 'project_category', '', '' );
	        		echo '</li>';
	        	}
	        	
	        echo '<li>';
            echo the_title();
            echo '</li>';
                
        } elseif (is_page()) {
        	$parents = get_post_ancestors($post->ID);
	        $id_parent = ($parents) ? $parents[count($parents)-1]: $post->ID;
	        
        	if ($id_parent !== $post->ID){
	        	echo '<li><a href=' . get_permalink($id_parent) . ' ' . 'title=' . get_the_title($id_parent) . '>' . get_the_title($id_parent) . '</a></li>';
	        	
	        	$parent_title = get_the_title($post->post_parent);
	        	if ($id_parent !== $post->post_parent) {
					echo '<li><a href=' . get_permalink($post->post_parent) .
					 ' ' . 'title=' . $parent_title . '>' . $parent_title . '</a></li>';
				} 
        	}
        	
            echo '<li>';
            echo the_title();
            echo '</li>';
            
        } 	elseif (is_tag()) {echo '<li>'; single_tag_title(); echo '</li>';}
		    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
		    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
		    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
		    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
		    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
		    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
		    echo '</ul>';
}
/*
 * Get template links.
 */

/*-- Get page ID by Page Template --*/
function get_page_ID_by_page_template($template_name)
{
    global $wpdb;
    $page_ID = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '$template_name' AND meta_key = '_wp_page_template'");
    return $page_ID;
}

/*
 * Custom Post Type: Project.
 */

function custom_post_project() {
	$labels = array(
		'name'               => _x( 'Project', 'post type general name' ),
		'singular_name'      => _x( 'Project', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Project' ),
		'edit_item'          => __( 'Edit Project' ),
		'new_item'           => __( 'New Project' ),
		'all_items'          => __( 'All Projects' ),
		'view_item'          => __( 'View Project' ),
		'search_items'       => __( 'Search Projects' ),
		'not_found'          => __( 'Not found' ),
		'not_found_in_trash' => __( 'Not found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Projects'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Add your projects or services',
		'public'        => true,
		'menu_position' => 5,
		'rewrite' => array('slug'=>'project'),
		'menu_icon' 	=> 'https://cdn2.iconfinder.com/data/icons/linecons/32/note-16.png',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' => array('project_category'),
		'has_archive'   => true,
	);
	register_post_type( 'project', $args );	
	
	register_taxonomy_for_object_type('project_category','project');
}
add_action( 'init', 'custom_post_project' );



// Custom Taxonomies for custom_post_project
function projects_taxonomies() {
	$labels = array(
		'name'              => _x( 'Project Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Categories' ),
		'all_items'         => __( 'All Project Categories' ),
		'parent_item'       => __( 'Parent Project Category' ),
		'parent_item_colon' => __( 'Parent Project Category:' ),
		'edit_item'         => __( 'Edit Project Category' ), 
		'update_item'       => __( 'Update Project Category' ),
		'add_new_item'      => __( 'Add New Project Category' ),
		'new_item_name'     => __( 'New Project Category' ),
		'menu_name'         => __( 'Categories' )
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'project_category', 'project', $args );
}
add_action( 'init', 'projects_taxonomies', 0 );


/*
 * Custom Post Type: Slide.
 */

function custom_post_slide() {
	$labels = array(
		'name'               => _x( 'Slide', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Slide' ),
		'edit_item'          => __( 'Edit Slide' ),
		'new_item'           => __( 'New Slide' ),
		'all_items'          => __( 'All Slides' ),
		'view_item'          => __( 'View Slide' ),
		'search_items'       => __( 'Search Slides' ),
		'not_found'          => __( 'Not found' ),
		'not_found_in_trash' => __( 'Not found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slides'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Add your slides',
		'public'        => true,
		'menu_position' => 5,
		'rewrite' => array('slug'=>'slide'),
		'menu_icon' 	=> 'https://cdn2.iconfinder.com/data/icons/linecons/32/note-16.png',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'   => false,
	);
	register_post_type( 'slide', $args );	
	
}
add_action( 'init', 'custom_post_slide' );


?>