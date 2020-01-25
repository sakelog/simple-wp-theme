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
      $post_content = get_the_content();
      $post_date = get_the_date();

      if(is_single()){
        $post_cat = get_the_category()[0];
        $category_name = get_category($post_cat) -> cat_name;
        $category_link = get_category_link($post_cat);
      }

      $postTag = '<div class="content">';

      if (is_single()) {
      $postTag .= '<p>' . $post_date . '</p>';
        $postTag .= '<span><a href="' . $category_link . '"class="tag is-primary">' . $category_name . '</a></span>';
      }

      $postTag .= '<h1>' . $title . '</h1>';
      $postTag .= '<hr />';
      $postTag .= '<p>' . $post_content . '</p>';
      $postTag .= '</div>';

      echo $postTag;
      
      if (is_single()){
        $prev_next_Tag = '<hr>';
        $prev_next_Tag .= '<div class="columns">';
        $prev_next_Tag .= '<div class="column">';
        $prev_next_Tag .= get_previous_post_link('前： %link');
        $prev_next_Tag .= '</div>';
        $prev_next_Tag .= '<div class="column has-text-right">';
        $prev_next_Tag .= get_next_post_link('%link ：次');
        $prev_next_Tag .= '</div>';
        $prev_next_Tag .= '</div>';

        echo $prev_next_Tag;
      }
    }
    get_template_part('/component/to_pagetop');
  }
?>
<?php get_footer(); ?>