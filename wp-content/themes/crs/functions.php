<?php
	/* ========================================================================== */
	/* = Constants
	/* ========================================================================== */
	define('THEMEROOT', get_stylesheet_directory_uri());
	define('IMAGES', THEMEROOT . '/img');
	define('JSCRIPTS', THEMEROOT . '/js');
	define('CSSROOT', THEMEROOT . '/css');
	define('VIDEOS', THEMEROOT . '/video');

	/* ========================================================================== */
	/* = Theme Settings
	/* ========================================================================== */	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}
	
	function register_main_menu() {
		  register_nav_menu('header-menu',__( 'Header Menu' ));
		  register_nav_menu('footer-menu',__( 'Footer Menu' ));
	}
	add_action( 'init', 'register_main_menu' );
	
	/* ========================================================================== */
	/* = Hide the Admin Bar
	/* ========================================================================== */
	add_filter( 'show_admin_bar', '__return_false' );

	function sp_hide_admin_bar_settings() {
	?>
		<style type="text/css">
			.show-admin-bar {
				display: none;
			}
		</style>
	<?php
	}
	
	function sp_disable_admin_bar() {
	    add_filter( 'show_admin_bar', '__return_false' );
	    add_action( 'admin_print_scripts-profile.php', 'sp_hide_admin_bar_settings' );
	}
	add_action( 'init', 'sp_disable_admin_bar' , 9 );

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	/* ========================================================================== */
	/* = Register Sidebars
	/* ========================================================================== */
	/*
	register_sidebar(array(
		'name' => 'Navigation Sidebar',
		'id' => 'navsidebar',
		'description' => 'The Nav Sidebar',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	*/
	// Changing excerpt more
   	function new_excerpt_more($more) {
		global $post;
		return '...';
   	}
	   add_filter('excerpt_more', 'new_excerpt_more');
	   
	function change_excerpt_length( $length ) {
		return 35;
	}
	add_filter( 'excerpt_length', 'change_excerpt_length', 999 );

	require_once('functions/post-types.php');

	// Move Yoast to bottom
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');	
	
	// Register Custom Navigation Walker
	require_once('class-wp-bootstrap-navwalker.php');

	add_image_size( 'fullhd', 1920, 1080 );

	// use the ACF Options Page.
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}
?>