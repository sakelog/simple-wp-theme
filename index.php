<?php get_header(); ?>
<?php
  $page_title = '';
  if ( is_front_page() ){
    $page_title = get_bloginfo('name');
  }
  elseif ( is_archive() ){ 
    $page_title = get_the_archive_title();
  }
  echo '<h1 class="title">'. $page_title . '</h1>';

  $postTag = '';
  if ( have_posts() ) {
    while (have_posts() ){
      the_post();
      $title = get_the_title();
      $post_link = esc_url( get_the_permalink() );
      $post_content = get_the_excerpt();
      $post_date = get_the_date();

      $post_cat = get_the_category()[0];
      $category_name = get_category($post_cat) -> cat_name;
      $category_link = get_category_link($post_cat);

      //$category_tag = get_category_tag($post_category);

      $postTag = '<div class="columns">';
      $postTag .= '<div class="column">';
      $postTag .= '<p>' . $post_date . '</p>';
      $postTag .= '<span><a href="' . $category_link . '"class="tag is-primary">' . $category_name . '</a></span>';
    
      $postTag .= '<a href="' . $post_link . '"><h2 class="">' . $title . '</h2></a>';
      $postTag .= '<p>' . $post_content . '</p>';
      $postTag .= '</div></div>';

      echo $postTag;
    }

    $paginationTag = '';

    $paginate_settings = array(
      'show_all'           => False,
      'end_size'           => 1,
      'mid_size'           => 2,
      'prev_next'          => True,
      'prev_text'          => '前へ',
      'next_text'          => '次へ',
      'type'               => 'list',
    );

    $paginationTag = '<nav class="pagination">';
    $paginationTag .= paginate_links($paginate_settings);
    $paginationTag .= '</nav>';

    echo $paginationTag;
  }
?>
<?php get_footer(); ?>