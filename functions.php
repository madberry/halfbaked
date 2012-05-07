<?php

if ( ! isset( $content_width ) )
  $content_width = 697; /* pixels */


function show_posts_nav() {
   global $wp_query;
   return ($wp_query->max_num_pages > 1);
}

################################################################################
// Enqueue Scripts
################################################################################

function halfbaked_script_loader() {
    wp_deregister_script( 'jquery' );
    // Register Scripts
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    // Queue Scripts
    wp_enqueue_script('jquery');
    //wp_enqueue_script('modernizer', get_template_directory_uri() . '/js/modernizer-2.5.3.js', array('jquery'), 2.0, false);
    wp_enqueue_script('google-fonts', get_template_directory_uri() . '/js/google-fonts.js', array('jquery'), '', false);
}


add_action('wp_enqueue_scripts', 'halfbaked_script_loader');

################################################################################
// Enqueue CSS Styles
################################################################################
  function halfbaked_css_loader() {
    wp_enqueue_style('halfbaked.css', get_template_directory_uri().'/stylesheets/halfbaked.css', false ,'1.0', 'all' );
      }
  add_action('wp_enqueue_scripts', 'halfbaked_css_loader');
################################################################################
// Add theme sidebars
################################################################################

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  	'name' => __( 'Primary Widget Area' ),
		'id' => 'primary-widget-area',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
	));
}


/**function new_excerpt_more($more) {
       global $post;
  return '...<p><a href="'. get_permalink($post->ID) . '">Continue Reading...</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');**/


################################################################################
// Loading Custom Post Type for Code
################################################################################

add_action( 'init', 'halfbaked_code_post_type' );
function halfbaked_code_post_type() {
  register_post_type( 'code',
    array(
      'labels' => array(
        'name' => __( 'Code' ),
        'singular_name' => __( 'Code' )
      ),
    'public' => true,
    'has_archive' => true,
    )
  );
}


################################################################################
// Add theme support for needed elements
################################################################################

function halfbaked_theme_setup() {
  add_theme_support( 'post-thumbnails', array('post') ); // Add it for posts & all custom post types
    //adding custom image sizes
    add_image_size( 'excerpt-thumb', 500, 450 );
    add_image_size( 'full-size', 999, 999 );

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'nav-menus' );

  //adding support for post formats
  add_theme_support( 'post-formats', array( 'link', 'image', 'quote', 'status', 'chat', 'audio', 'aside' ) );

  register_nav_menus( array(
	   'primary' => __( 'Primary Navigation' ),
  ) );
}

add_action( 'after_setup_theme' , 'halfbaked_theme_setup');
################################################################################
// Adding Custom Image Sizes to Media Gallery
################################################################################
add_filter( 'image_size_names_choose', 'halfbaked_custom_image_sizes' );
function halfbaked_custom_image_sizes( $sizes ) {
    $halfbaked_img_sizes = array(
        'excerpt-thumb' => 'Decent Size',
        'full-size' => 'Full Size'
    );
    return array_merge( $sizes, $halfbaked_img_sizes );
}


################################################################################
// Comment formatting
################################################################################

function halfbaked_theme_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
    <?php
}



