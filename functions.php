<?php
function jetpackme_responsive_videos_setup() {
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jetpackme_responsive_videos_setup' );
add_editor_style();
add_action( 'after_setup_theme', 'nexnet_setup' );
function nexnet_setup()
{
	load_theme_textdomain( 'nexnet', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 300, true);

	global $content_width;
	if ( ! isset( $content_width ) ) 
		$content_width = 1120;

	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'nexnet' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'nexnet_load_scripts' );
function nexnet_load_scripts()
{
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'nexnet_enqueue_comment_reply_script' );
function nexnet_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'nexnet_title' );

function nexnet_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'nexnet_filter_wp_title' );
function nexnet_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'nexnet_widgets_init' );

function nexnet_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Bottom Left Widget Area', 'nexnet' ),
		'id' => 'bottom-left-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Bottom Center Widget Area', 'nexnet' ),
		'id' => 'bottom-center-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Bottom Right Widget Area', 'nexnet' ),
		'id' => 'bottom-right-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
function nexnet_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'nexnet_comments_number' );
	
function nexnet_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}