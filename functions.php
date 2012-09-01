<?php
/**
 * Half-Baked Base functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, half_baked_setup(), sets up the theme by registering support
 * for various features in WordPress, such as a custom background and a navigation menu.
 *
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 770; /* pixels */

/**
 * half_baked_setup()
 *
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_setup() {
	/**
	 * Declaring the theme language domain
	 */
	load_theme_textdomain('half_baked_base');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote' ) );
	register_nav_menu( 'primary', __( 'Primary Menu', 'half_baked_base' ) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 450, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'half_baked_setup' );


/**
 * half_baked_scripts_styles()
 *
 * Enqueue scripts (JavaScript files) and styles (CSS files) for front-end.
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_scripts_styles() {
	// Comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'plugins_js', get_template_directory_uri() . '/js/plugins.min.js', array('jquery') );
	// Responsive.js - contains responsive scripts
	wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/scripts.min.js', array('jquery', 'plugins_js') );
	// Main CSS file
	wp_enqueue_style( 'half_baked_base-main', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'half_baked_scripts_styles' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'half_baked_page_menu_args' );

/**
 * half_baked_widgets_init()
 * Registers widget areas
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'half_baked_base' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Homepage template, which uses its own set of widgets', 'half_baked_base' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Widgets', 'half_baked_base' ),
		'id' => 'sidebar-home',
		'description' => __( 'Appears when using the optional homepage template with a page set as Static Front Page', 'half_baked_base' ),
		'before_widget' => '<div class="home-widget"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar(array(
    'name' => __('Header Widget', 'half_baked_base' ),
    'id'   => 'header-widget',
    'description' => __( 'Upper right section of Header', 'half_baked_base' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ));

	register_sidebar(array(
	    'name' => __('Footer Widget', 'half_baked_base' ),
	    'id'   => 'footer-widget',
	    'description' => __( 'Footer text or acknowledgements', 'half_baked_base' ),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h4>',
	    'after_title'   => '</h4>'
	  ));
}
add_action( 'widgets_init', 'half_baked_widgets_init' );

if ( ! function_exists( 'half_baked_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'half_baked_base' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'half_baked_base' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'half_baked_base' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif;

if ( ! function_exists( 'half_baked_comment' ) ) :
/**
 * half_baked_comment()
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'half_baked_base' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'half_baked_base' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<div class="avatar-container">
				<?php
					echo get_avatar( $comment, 48 ); ?>
				</div><!--/.avatar-container -->
				<?php
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'half_baked_base' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'half_baked_base' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'half_baked_base' ); ?></p>
			<?php endif; ?>

			<section class="comment post-content">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'half_baked_base' ), '<p class="edit-link">', '</p>' ); ?>
			</section>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'half_baked_base' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'half_baked_entry_meta' ) ) :
/**
 * half_baked_entry_meta()
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * @since Half-Baked Base 1.0
 */
function half_baked_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'half_baked_base' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'half_baked_base' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'half_baked_base' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( '' != $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s by %4$s.', 'half_baked_base' );
	} elseif ( '' != $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s by %4$s.', 'half_baked_base' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s by %4$s.', 'half_baked_base' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;