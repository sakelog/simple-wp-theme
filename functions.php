<?php
if (! function_exists('my_setup') ) {
  function my_setup() {
    add_theme_support('title-tag');

    add_theme_support( 'post-thumbnails' );
	
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    add_post_type_support( 'page', 'excerpt' );
  }
  add_action('after_setup_theme', 'my_setup');
}

if ( ! function_exists('set_excerpt_length') ) {
  function set_excerpt_length( $length ) {
    return 160;
  }
  add_filter('excerpt_length', 'set_excerpt_length', 999);
}
/*-----------------------------------------------------------------------------
  CSS登録
  -----------------------------------------------------------------------------*/
if ( ! function_exists('my_register_style') ){
  function my_register_style() {
    wp_enqueue_style('my-style', get_template_directory_uri() . '/styles/mystyle.min.css', array());
  }
  add_action('wp_enqueue_scripts', 'my_register_style');
}