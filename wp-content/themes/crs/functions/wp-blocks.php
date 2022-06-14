<?php

// Show styles in Gutenberg
function sp_theme_setup() {
	add_theme_support( 'editor-styles' );
    add_editor_style( 'css/wp-blocks.css' );
}
add_action( 'after_setup_theme', 'sp_theme_setup' );

function custom_block_category( $categories ) {
    $custom_block = array(
        'slug'  => 'stories_blocks',
        'title' => __( 'CRS Stories', 'stories_blocks' ),
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}

add_filter( 'block_categories', 'custom_block_category', 11, 2);


add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'crs_stories_gallery',
			'title'				=> __('Story Gallery'),
			'description'		=> __('Photo gallery with lightbox and captions'),
			'render_template'	=> 'blocks/stories-gallery/stories-gallery.php',
			'category'			=> 'stories_blocks',
			'icon'				=> 'editor-textcolor',
			'keywords'			=> array( 'content, text' ),
		));
    }

}

?>