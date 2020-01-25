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
/*-----------------------------------------------------------------------------
  js登録
  -----------------------------------------------------------------------------*/
if (! function_exists('my_register_scripts')){
  function my_register_scripts() {
    //navMenu
    wp_enqueue_script('navMenu', 
    get_template_directory_uri() . '/scripts/dist/navmenu.min.js', 
    array(), false, true);

    //jQuery
    if (! is_admin()) {
      wp_deregister_script( 'jquery' );
      wp_enqueue_script('jquery', 
      get_template_directory_uri() . '/scripts/myjquery.min.js', 
      array(), '3.4.1', true);
    }
  }
  add_action( 'wp_enqueue_scripts', 'my_register_scripts' );
}
/*-----------------------------------------------------------------------------
  get_the_archive_title 余分な文字削除
  -----------------------------------------------------------------------------*/
  add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
      $title = single_cat_title('',false);
    } elseif (is_tag()) {
      $title = single_tag_title('',false);
    } elseif (is_tax()) {
      $title = single_term_title('',false);
    } elseif (is_post_type_archive() ){
      $title = post_type_archive_title('',false);
    } elseif (is_date()) {
      $title = get_the_time('Y年n月');
    } elseif (is_search()) {
      $title = '「'.esc_html( get_search_query(false) ) . '」検索結果';
    } else {
  
    }
    return $title;
  });