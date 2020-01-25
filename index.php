<?php get_header(); ?>
<?php
  $page_title = '';
  if ( is_front_page() ){
    $page_title = get_bloginfo('name');
  }
  else { 
    $page_title = get_the_archive_title();
  }
  echo '<h1 class="title">'. $page_title . '</h1>';
  
  if(is_search()) {
    $hit_num = $wp_query->found_posts;
    $hit_num_str = '';
    $hit_num_str = '該当件数：' . $hit_num . '件' ;
    $search_tag = '<div><p>'. $hit_num_str . '</p></div>';
    echo $search_tag;
  }

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

      $postTag = '<div class="">';
      $postTag .= '<p>' . $post_date . '</p>';

      $postTag .= '<span><a href="' . $category_link . '"class="tag is-primary">' . $category_name . '</a></span>';

      $postTag .= '<a href="' . $post_link . '"><h2 class="">' . $title . '</h2></a>';
      $postTag .= '<p>' . $post_content . '</p>';
      $postTag .= '</div>';

      echo $postTag;
    }

    get_template_part('/component/to_pagetop');
    get_template_part('/component/pagination');
  }
?>
<?php get_footer(); ?>