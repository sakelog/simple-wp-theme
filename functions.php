<?php
/*-----------------------------------------------------------------------------
  WordPress機能
  -----------------------------------------------------------------------------*/
if (! function_exists('my_setup') ) {
  function my_setup() {
    add_theme_support('title-tag');
	
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
if (!function_exists('disable_meta')) {
  function disable_meta() {
  remove_action('wp_head', 'wp_generator'); 
  remove_action('wp_head', 'wlwmanifest_link'); 
  remove_action('wp_head', 'rsd_link');
  }
  add_action ('init', 'disable_meta');
}
if (!function_exists('disable_emojis')) {
  function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );     
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  }
  add_action( 'init', 'disable_emojis' );
}
if (!function_exists('remove_block_library_style')) {
  function remove_block_library_style() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
  }
  add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );
}
/*-----------------------------------------------------------------------------
  Menu登録
  -----------------------------------------------------------------------------*/
if ( !function_exists('my_register_menu') ) {
  function my_register_menu() {
    register_nav_menus(array(
      'global' => 'グローバルナビ',
    ));
  }
  add_action('after_setup_theme', 'my_register_menu');
}
/*-----------------------------------------------------------------------------
  CSS登録
  -----------------------------------------------------------------------------*/
if ( ! function_exists('my_register_style') ){
  function my_register_style() {
    wp_enqueue_style('my-style', get_template_directory_uri() . '/styles/mystyle.min.css', array());
    //wp_enqueue_style('my-style', get_template_directory_uri() . '/styles/mystyle.css', array());
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

    //toTopPage
    wp_enqueue_script('toTopPage', 
    get_template_directory_uri() . '/scripts/dist/to_topPage.min.js', 
    array(), false, true);
    //jQuery
    if (! is_admin()) {
      wp_deregister_script( 'jquery' );
      wp_enqueue_script('jquery', 
      'https://cdn.jsdelivr.net/npm/jquery@3.4.1', 
      array(), false, true);
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